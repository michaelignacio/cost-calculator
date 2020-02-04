<?php
require_once('Forecast.php');

/**
 * @author Michael Ignacio <mikelignacio@gmail.com>
 * @link http://github.com/michaelignacio/cost-calculator
 */
class ForecastTable
{
	/**
	 * Constructs the ForecastTable object
     * @param int $studies Number of studies for the forecast
     * @param int $growth Study growth in percentage
     * @param int $months Number of months to be forecasted
     */
	public function __construct( $studies, $growth, $months ) {
		$this->_studies = $studies * date('t');
		$this->_growth = $growth;
		$this->_months = $months;
		$this->startingMonth = new DateTime();
		$this->table = array();
	}

	/**
	 * Populates the forecast table based on user input
	 * @return array $this->table Array that contains the whole forecast table
	 */
	public function populateTable() {
		for ($i=0; $i<$this->_months; $i++) {
			if ( $i===0 ) {
				// Forecast for the starting month
				$row = new Forecast( $this->_studies );
				$month = $this->startingMonth;
			} else {
				// Forecast for the remaining months considering study growth
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
