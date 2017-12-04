<?php

require_once('src/config.php');
require_once('src/autoloader.php');

// Substr to remove /sitesDyn/
$request = parse_url(substr($_SERVER['REQUEST_URI'], strlen(_BASE_URL_)));

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

    case 'actor.php':
        $actorId = (int)$_GET['id'];
        return ActorController::display($actorId);

    default:
        header("HTTP/1.0 404 Not Found");
        die('404');
}
