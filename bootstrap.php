<?php

require_once('src/config.php');
require_once('src/autoloader.php');

// Substr to remove /sitesDyn/
$request = parse_url(substr($_SERVER['REQUEST_URI'], strlen(_BASE_URL_)));
$explodedRequest = explode('/', $request['path']);

// Handle the request
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

    case 'admin':
    case 'admin/':
        return AdminController::displayAdminHome();

    case 'faq':
    case 'faq/':
        return FaqController::displayFaq();

    case 'asideAjax':
    case 'asideAjax/':
        sleep(1);
        die(FaqController::displayFaqContentOnly());
        break;

    case (preg_match('/\/admin\/[a-z]+\/[a-z]+\/*/', '/' . $request['path']) ? true : false):
        return (new AdminController())->handleAdminAction($explodedRequest);

    default:
        return header("HTTP/1.1 404 Not Found");
}
