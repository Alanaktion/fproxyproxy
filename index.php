<?php

// Kickstart the framework
$f3=require('lib/base.php');

// Preload libraries
require 'app/inc/phpquery.php';

// Check base requirements
$f3->set('DEBUG',1);
if ((float)PCRE_VERSION<7.9)
	trigger_error('PCRE version is out of date');

// Set some defaults
$f3->mset(array(
	'DEBUG' => 0,
	'AUTOLOAD' => 'app',
	'UI' => 'ui/',
));

// Load configuration
$f3->config('config.ini');

// Load routes
$f3->config('app/routes.ini');

// Run the app
$f3->run();
