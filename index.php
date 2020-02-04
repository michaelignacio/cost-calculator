<?php
require_once('src/View.php');

/**
 * Entry point for displaying the template file
 */

$view = new View();
echo $view->output();
