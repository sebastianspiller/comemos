<?php
// Konfigurationsdatei
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'comemos');

define('BASE_URL', 'http://localhost/comemos');
define('SITE_NAME', 'Comemos');

// Fehlerberichterstattung (in Produktion auf 0 setzen)
error_reporting(E_ALL);
ini_set('display_errors', 1);

define('DEFAULT_THEME', 'default'); 