<?php
/**
 * 	This class handles all the data you can get from a Movie
 *
 *	@package TMDB-V3-PHP-API
 * 	@author Alvaro Octal | <a href="https://twitter.com/Alvaro_Octal">Twitter</a>
 * 	@version 0.2
 * 	@date 02/04/2016
 * 	@link https://github.com/Alvaroctal/TMDB-PHP-API
 * 	@copyright Licensed under BSD (http://www.opensource.org/licenses/bsd-license.php)
 */
class Movie extends ApiBaseObject{

	private $_tmdb;

	//------------------------------------------------------------------------------
	// Get Variables
	//------------------------------------------------------------------------------

	/**
	 * 	Get the Movie's title
	 *
	 * 	@return string
	 */
	public function getTitle() {
		return $this->_data['title'];
	}

	/**
	 * 	Get the Movie's tagline
	 *
	 * 	@return string
	 */
	public function getTagline() {
		return $this->_data['tagline'];
	}

	/**
	 * 	Get the Movie Directors IDs
	 *
	 * 	@return array(int)
	 */
	public function getDirectorIds() {

		$director_ids = [];

		$crew = $this->getCrew();

		/** @var Person $crew_member */
        foreach ($crew as $crew_member) {

			if ($crew_member->getJob() === Person::JOB_DIRECTOR){
				$director_ids[] = $crew_member->getID();
			}
		}
		return $director_ids;
	}

	/**
	 * 	Get the Movie's trailers
	 *
	 * 	@return array
	 */
	public function getTrailers() {
		return $this->_data['trailers'];
	}

	/**
	 * 	Get the Movie's trailer
	 *
	 * 	@return string
	 */
	public function getTrailer() {
		$trailers = $this->getTrailers();
		return $trailers['youtube'][0]['source'];
	}

	/**
	 * 	Get the Movie's genres
	 *
	 * 	@return Genre[]
	 */
	public function getGenres() {
		$genres = array();

		foreach ($this->_data['genres'] as $data) {
			$genres[] = new Genre($data);
		}

		return $genres;
	}

	/**
	 * 	Get the Movie's reviews
	 *
	 * 	@return Review[]
	 */
	public function getReviews() {
		$reviews = array();

		foreach ($this->_data['review']['result'] as $data) {
			$reviews[] = new Review($data);
		}

		return $reviews;
	}

	/**
	 * 	Get the Movie's companies
	 *
	 * 	@return Company[]
	 */
	public function getCompanies() {
		$companies = array();

		foreach ($this->_data['production_companies'] as $data) {
			$companies[] = new Company($data);
		}

		return $companies;
	}

	//------------------------------------------------------------------------------
	// Import an API instance
	//------------------------------------------------------------------------------

	/**
	 *	Set an instance of the API
	 *
	 *	@param TMDB $tmdb An instance of the api, necessary for the lazy load
	 */
	public function setAPI($tmdb){
		$this->_tmdb = $tmdb;
	}

	//------------------------------------------------------------------------------
	// Export
	//------------------------------------------------------------------------------

	/**
	 * 	Get the JSON representation of the Movie
	 *
	 * 	@return string
	 */
	public function getJSON() {
		return json_encode($this->_data, JSON_PRETTY_PRINT);
	}


	/**
	 * @return string
	 */
	public function getMediaType(){
		return self::MEDIA_TYPE_MOVIE;
	}
}

class ApiBaseObject
{
    //------------------------------------------------------------------------------
    // Class Constants
    //------------------------------------------------------------------------------

    const MEDIA_TYPE_MOVIE = 'movie';
    const CREDITS_TYPE_CAST = 'cast';
    const CREDITS_TYPE_CREW = 'crew';
    const MEDIA_TYPE_TV = 'tv';

    //------------------------------------------------------------------------------
    // Class Variables
    //------------------------------------------------------------------------------

    protected $_data;

    /**
     * 	Construct Class
     *
     * 	@param array $data An array with the data of the ApiObject
     */
    public function __construct($data) {
        $this->_data = $data;
    }

    /**
     * 	Get the ApiObject id
     *
     * 	@return int
     */
    public function getID() {
        return $this->_data['id'];
    }

    /**
     * 	Get the ApiObject Poster
     *
     * 	@return string
     */
    public function getPoster() {
        return $this->_data['poster_path'];
    }

    /**
     * 	Get the ApiObjects vote average
     *
     * 	@return int
     */
    public function getVoteAverage() {
        return $this->_data['vote_average'];
    }

    /**
     * 	Get the ApiObjects vote count
     *
     * 	@return int
     */
    public function getVoteCount() {
        return $this->_data['vote_count'];
    }

    /**
     * Get the ApiObjects Cast
     * @return array of Person
     */
    public function getCast(){
        return $this->getCredits(self::CREDITS_TYPE_CAST);
    }

    /**
     * Get the Cast or the Crew of an ApiObject
     * @param string $key
     * @return array of Person
     */
    protected function getCredits($key){
        $persons = [];

        foreach ($this->_data['credits'][$key] as $data) {
            $persons[] = new Person($data);
        }

        return $persons;
    }

    /**
     * Get the ApiObject crew
     * @return array of Person
     */
    public function getCrew(){
        return $this->getCredits(self::CREDITS_TYPE_CREW);
    }

    /**
     *  Get Generic.<br>
     *  Get a item of the array, you should not get used to use this, better use specific get's.
     *
     * 	@param string $item The item of the $data array you want
     * 	@return array
     */
    public function get($item = ''){

        if(empty($item)){
            return $this->_data;
        }

        if(array_key_exists($item, $this->_data)){
            return $this->_data[$item];
        }

        return null;
    }
}
