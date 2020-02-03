<?php
require_once('ForecastTable.php');

class FormHandler {
	public function __construct( $studies, $growth, $months ) {
		$this->table = new ForecastTable($studies, $growth, $months);
	}

	public function show() {
		header('Content-Type: application/json');
		return json_encode($this->table->populateTable());
	}
}

if ( !empty($_POST) ) {
	$formHandler = new FormHandler($_POST['studies'], $_POST['growth'], $_POST['months']);
	echo $formHandler->show();
}
