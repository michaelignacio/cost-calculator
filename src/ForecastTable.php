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
		$this->_studies = $studies;
		$this->_growth = $growth;
		$this->_months = $months;
		$this->startingMonth = new DateTime();
		$this->basePlusGrowth = $this->_studies;
		$this->multiplier = 1;
		$this->table = array();
	}

	/**
	 * Populates the forecast table based on user input
	 * @return array $this->table Array that contains the whole forecast table
	 */
	public function populateTable() {
		for ($i=0; $i<$this->_months; $i++) {
			if ( $i<1 ) {
				// Forecast for the starting month
				$month = $this->startingMonth;
			} else {
				// Forecast for the remaining months considering study growth
				$month = $this->startingMonth->add(new DateInterval('P1M'));
				$this->multiplier = 1 + ($this->_growth / 100);
				$this->basePlusGrowth *= $this->multiplier;
			}

			$row = new Forecast( $this->basePlusGrowth * $month->format('t') * $this->multiplier );

			$forecast = $row->getForecast();
			$this->table[$i]['month'] = $month->format('M Y');
			$this->table[$i]['studies'] = number_format($forecast['studies']);
			$this->table[$i]['cost'] = '$' . number_format($forecast['cost'], 2, '.', ',');
		}

		return $this->table;
	}
}
