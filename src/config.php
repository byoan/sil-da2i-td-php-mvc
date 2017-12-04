<?php

define('_DB_HOST_', 'localhost');
define('_DB_DATABASE_', 'moviesWebsite');
define('_DB_USER_', 'root');
define('_DB_PASSWORD_', 'root');
define('_DB_DSN_', 'mysql:host=' . _DB_HOST_ . ';dbname=' . _DB_DATABASE_ . ';charset=utf8');

define('_DEBUG_', false);
define('_BASE_URL_', '/sitesDyn/');

if (_DEBUG_) {
    ini_set('error_reporting', -1);
    ini_set('display_errors', 'on');
}
