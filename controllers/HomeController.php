<?php

class HomeController extends Controller {

    /**
     * Displays the home page of the app
     */
    public static function displayHome()
    {
        $data['moviesList'] = Movie::getAllMovies();
        $data['actorsList'] = Actor::getAllActors();
        $data['directorsList'] = Director::getAllDirectors();

        return parent::loadTemplate('home', $data);
    }

}
