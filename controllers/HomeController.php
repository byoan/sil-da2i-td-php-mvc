<?php

class HomeController extends Controller {

    public static function displayHome()
    {
        $data['moviesList'] = Movie::getAllMovies();
        $data['actorsList'] = Actor::getAllActors();
        $data['directorsList'] = Director::getAllDirectors();

        return parent::loadTemplate('home', $data);
    }

}
