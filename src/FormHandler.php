<?php
require_once('ForecastTable.php');

/**
 * @author Michael Ignacio <mikelignacio@gmail.com>
 * @link http://github.com/michaelignacio/cost-calculator
 */
class FormHandler
{
	/**
	 * Constructs the FormHandler object
     * @param int $studies Starting number of studies for the forecast
     * @param int $growth Study growth in percentage
     * @param int $months Number of months to be forecasted
	 */
	public function __construct( $studies, $growth, $months ) {
		$this->table = new ForecastTable($studies, $growth, $months);
	}

	/**
	 * Shows the output of the table
	 * @return json Array converted into JSON for rendering
	 */
	public function show() {
		header('Content-Type: application/json');
		return json_encode($this->table->populateTable());
	}
}

// Receives the fetch call from the form
if ( !empty($_POST) ) {
	$formHandler = new FormHandler($_POST['studies'], $_POST['growth'], $_POST['months']);
	echo $formHandler->show();
}
