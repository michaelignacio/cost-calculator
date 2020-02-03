<?php
require_once('Forecast.php');

/**
 * The Forecast Table class
 * creates the array that holds
 * the results from the computation.
*/
class ForecastTable {
	public function __construct( $studies, $growth, $months ) {
		$this->_studies = $studies * date('t');
		$this->_growth = $growth;
		$this->_months = $months;
		$this->startingMonth = new DateTime();
		$this->table = array();
	}

	public function populateTable() {
		for ($i=0; $i<$this->_months; $i++) {
			if ( $i===0 ) {
				$row = new Forecast( $this->_studies );
				$month = $this->startingMonth;
			} else {
				$row = new Forecast( $this->_studies * ( 1 + ($this->_growth / 100) ) );
				$month = $this->startingMonth->add(new DateInterval('P1M'));
			}

			$forecast = $row->getForecast();
			$this->_studies = $forecast['studies'];

			$this->table[$i]['month'] = $month->format('M Y');
			$this->table[$i]['studies'] = number_format($forecast['studies']);
			$this->table[$i]['cost'] = '$' . number_format($forecast['cost'], 2, '.', ',');
		}

		return $this->table;
	}
}
