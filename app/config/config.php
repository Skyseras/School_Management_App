<?php
//Database params
define('DB_HOST', 'localhost'); //Add your db host
define('DB_USER', 'root'); // Add your DB root
define('DB_PASS', ''); //Add your DB pass
define('DB_NAME', 'test'); //Add your DB Name

//APPROOT
define('APPROOT', dirname(dirname(__FILE__)));

//URLROOT (Dynamic links)
define('URLROOT', 'http://localhost/mvcloginregister');



define('BASE_REQUEST_URL',preg_replace('#^/mvcloginregister/pages/#i','',parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH)));
//Sitename
define('SITENAME', 'School Management Application');
