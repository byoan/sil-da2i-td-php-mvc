<?php

// Database configuration
define('_DB_HOST_', 'localhost');
define('_DB_DATABASE_', 'moviesWebsite');
define('_DB_USER_', 'root');
define('_DB_PASSWORD_', 'root');
define('_DB_DSN_', 'mysql:host=' . _DB_HOST_ . ';dbname=' . _DB_DATABASE_ . ';charset=utf8');

// This variable is used for URL generation (useful when the folder is served as localhost:8000/projectFolder/)
define('_BASE_URL_', '/sitesDyn/');

// Allow error display
define('_DEBUG_', false);
if (_DEBUG_) {
    ini_set('error_reporting', -1);
    ini_set('display_errors', 'on');
}
