<?php
class View {
	public function __construct() {
		$this->template = 'public/template.php';
	}

	public function output() {
		require_once($this->template);
	}
}
