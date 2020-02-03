<?php
define('COST_OF_RAM', .00553);
define('COST_OF_STORAGE', .10);

/**
 * The Forecast class
 * contains the computations needed
 * for the infrastructure cost forecast.
*/
class Forecast {
	public function __construct( $studies ) {
		$this->_studies = $studies;
		$this->_spaceNeeded = $this->_studies * 10;
		$this->getForecast();
	}

	public function getStudies() {
		return (int) $this->_studies;
	}

	public function getRamNeeded() {
		$this->ram = $this->_studies / 2.0;

		return $this->ram;
	}

	public function getRamCost() {
		$this->ramCost = ( $this->getRamNeeded() / 1000 ) * COST_OF_RAM;

		return $this->ramCost;
	}

	public function getStorageCost() {
		$this->storageCost = ( $this->_spaceNeeded / 1000 ) * COST_OF_STORAGE;

		return $this->storageCost;
	}

	public function getTotalCost() {
		$this->cost = $this->getRamCost() + $this -> getStorageCost();

		return round($this->cost, 2);
	}

	public function getForecast() {
		$this->forecast['studies'] = $this->getStudies();
		$this->forecast['cost'] = $this->getTotalCost();

		return $this->forecast;
	}
}
