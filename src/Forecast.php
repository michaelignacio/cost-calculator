<?php
define('COST_OF_RAM', .00553);
define('COST_OF_STORAGE', .10);

/**
 * @author Michael Ignacio <mikelignacio@gmail.com>
 * @link http://github.com/michaelignacio/cost-calculator
 */
class Forecast {
	/**
	 * Constructs the Forecast object
	 * @param int $studies Number of studies for the forecast
	 */
	public function __construct( $studies ) {
		$this->_studies = $studies;
		$this->getForecast();
	}

	/**
	 * Returns the number of studies
	 * @return int $this->_studies
	 */
	public function getStudies() {
		return (int) $this->_studies;
	}

	/**
	 * Returns the number of RAM needed, where 1000 studies require 500 MB of RAM
	 * @return int $this->ram
	 */
	public function getRamNeeded() {
		$this->ram = ($this->_studies / 1000) * 500;

		return $this->ram;
	}

	/**
	 * Returns the cost of RAM where 1 GB of RAM per hour costs 0.0053USD,
	 * and the cost is computed for one day of study
	 * @return int $this->ramCost
	 */
	public function getRamCost() {
		$this->ramCost = ( ( $this->getRamNeeded() / 1000 ) * COST_OF_RAM ) * 24;

		return $this->ramCost;
	}

	/**
	 * Returns the storage cost where 1 study uses 10 MB of storage,
	 * and 1 GB of storage costs .10USD per month
	 * @return int $this->storageCost
	 */
	public function getStorageCost() {
		$this->spaceNeeded = $this->_studies * 10;
		$this->storageCost = ( $this->spaceNeeded / 1000 ) * COST_OF_STORAGE;

		return $this->storageCost;
	}

	/**
	 * Returns the total cost where total = RAM + Storage costs
	 * @return int
	 */
	public function getTotalCost() {
		$this->cost = $this->getRamCost() + $this -> getStorageCost();

		return $this->cost;
	}

	/**
	 * Returns an array that contains the computed values
	 * @return array
	 */
	public function getForecast() {
		$this->forecast['studies'] = $this->getStudies();
		$this->forecast['cost'] = $this->getTotalCost();

		return $this->forecast;
	}
}
