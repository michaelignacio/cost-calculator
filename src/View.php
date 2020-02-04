<?php
/**
 * @author Michael Ignacio <mikelignacio@gmail.com>
 * @link http://github.com/michaelignacio/cost-calculator
 */
class View {
	/**
	 * Constructs the View object
	 */
	public function __construct() {
		$this->template = 'public/template.php';
	}

	/**
	 * Outputs the PHP template file
	 */
	public function output() {
		require_once($this->template);
	}
}
