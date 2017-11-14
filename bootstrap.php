<?php

ini_set('error_reporting', -1);
ini_set('display_errors', 'on');

require_once('functions.php');

spl_autoload_register(function ($class) {
    if (is_file('models/' . $class . '.php')) {
        include 'models/' . $class . '.php';
    } else if (is_file('controllers/' . $class . '.php')) {
        include 'controllers/' . $class . '.php';
    }
});
// Init data array which will contain all our app's
$data = array();

// Substr to remove /sitesDyn/
$request = parse_url(substr($_SERVER['REQUEST_URI'], 10));

switch ($request['path']) {
    case 'index.php':
    case '':
        return HomeController::displayHome();

    case 'film.php':
        $movieId = (int)$_GET['id'];
        return MovieController::display($movieId);

    case 'director.php':
        $directorId = (int)$_GET['id'];
        return DirectorController::display($directorId);
        break;

    case 'actor.php':
        $actorId = (int)$_GET['id'];
        return ActorController::display($actorId);

    default:
        header("HTTP/1.0 404 Not Found");
        die('404');
}
