<?php

define('MD_CRYPT_METHOD', 'aes-128-ecb');

define('BASE_PATH', dirname($_SERVER['SCRIPT_NAME']));
#define('BASE_PATH', '/')

define('DB_FILENAME', 'env/slides.db');
define('DB_BUILD_SOURCE', 'src/build.sql');
