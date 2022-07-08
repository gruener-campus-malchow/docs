<?php

error_reporting(E_ALL);
require_once 'env/config.php';



spl_autoload_register(function ($classname) {

	$try_include = function ($filename) {
		if (!file_exists($filename)) return false;
		require_once $filename;
	};

	if ($try_include("src/$classname.php")) return;
	if ($try_include("lib/$classname.php")) return;
});



$database_exists = file_exists(DB_FILENAME);
Database::connect(DB_FILENAME);
if (!$database_exists) Database::build(DB_BUILD_SOURCE);

$LOCAL_PATH = substr($_SERVER['REQUEST_URI'], strlen(BASE_PATH));
SlidesController::serve($LOCAL_PATH);
