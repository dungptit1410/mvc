<?php

define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));
use Vendor\Dispatcher;

require('../vendor/autoload.php');

// require(ROOT . 'Config/core.php');
// require(ROOT . 'router.php');
// require(ROOT . 'request.php');
//require(ROOT . 'dispatcher.php');
/*  echo ROOT. 'dispatcher.php';
 die(); */
 
$dispatch = new Dispatcher;
$dispatch->dispatch();

?>