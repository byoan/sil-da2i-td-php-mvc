<?php

class AdminController extends Controller {

    public static function displayAdminHome()
    {
        $data['moviesList'] = Movie::getAllMovies();
        $data['personList'] = Person::getAllPersons();
        // $data['actorsList'] = Actor::getAllActors();
        // $data['directorsList'] = Director::getAllDirectors();

        return parent::loadAdminTemplate('home', $data);
    }

    public function handleAdminAction(array $request)
    {
        switch ($request['1']) {
            case 'add':
                return $this->handleAddAction($request);

            case 'edit':
                return $this->handleEditAction($request);

            case 'delete':
                return $this->handleDeleteAction($request);

            default:
                die('404');
                break;
        }
    }

    public function handleAddAction(array $explodedRequest)
    {
        switch ($explodedRequest['2']) {
            case 'movie':
                if (!empty($_POST['title'])) {
                    if ($this->createMovie()) {
                        return header('Location: ../');
                    } else {
                        die('Error');
                    }
                }
                return parent::loadAdminTemplate('form/addMovie');

            case 'person':
                if (!empty($_POST['firstName'])) {
                    if ($this->createPerson()) {
                        return header('Location: ../');
                    } else {
                        die('Error');
                    }
                }
                return parent::loadAdminTemplate('form/addPerson');
        }
    }

    public function handleEditAction(array $explodedRequest)
    {
        switch ($explodedRequest['2']) {
            case 'movie':
                // If this value is not empty, we are in a form submit request
                if (!empty($_POST['title'])) {
                    if ($this->updateMovieInformation((int)$explodedRequest['3'])) {
                        return header('Location: ../../');
                    } else {
                        die('Error');
                    }
                }
                return $this->displayEditMovieForm((int)$explodedRequest['3']);

            case 'person':
                if (!empty($_POST['firstName'])) {
                    if ($this->updatePersonInformation((int)$explodedRequest['3'])) {
                        return header('Location: ../../');
                    } else {
                        die('Error');
                    }
                }
                return $this->displayEditPersonForm((int)$explodedRequest['3']);
                break;
        }
    }

    public function handleDeleteAction(array $explodedRequest)
    {
        switch ($explodedRequest['2']) {
            case 'movie':
                // If this value is not empty, we are in a form submit request
                if (!empty($_POST['id'])) {
                    if ($this->deleteMovie((int)$explodedRequest['3'])) {
                        return header('Location: ../../');
                    } else {
                        die('Error');
                    }
                }
                return $this->displayDeleteMovieForm((int)$explodedRequest['3']);

            case 'person':
                if (!empty($_POST['idPerson'])) {
                    if ($this->deletePerson((int)$explodedRequest['3'])) {
                        return header('Location: ../../');
                    } else {
                        die('Error');
                    }
                }
                return $this->displayDeletePersonForm((int)$explodedRequest['3']);
        }
    }

    private function createMovie()
    {
        $db = Db::getInstance();
        $latestId = Db::getLatestId('film');

        $movie = new Movie((int)$latestId + 1);
        list('title' => $movie->title,
             'synopsis' => $movie->synopsis,
             'releaseDate' => $movie->releaseDate,
             'rating' => $movie->rating) = $_POST;

        return $movie->add();
    }

    private function createPerson()
    {
        $db = Db::getInstance();
        $latestId = Db::getLatestId('personne');

        $person = new Person((int)$latestId + 1);
        list('firstName' => $person->firstName,
             'lastName' => $person->lastName,
             'birthDate' => $person->birthDate,
             'biography' => $person->biography,
             'filmography' => $person->filmography) = $_POST;

        return $person->add();
    }

    private function deleteMovie()
    {
        $db = Db::getInstance();

        $movie = new Movie((int)$_POST['idMovie']);

        return $movie->delete();
    }

    private function deletePerson()
    {
        $db = Db::getInstance();

        $person = new Person((int)$_POST['idPerson']);

        return $person->delete();
    }

    private function displayDeleteMovieForm($idMovie)
    {
        $movie = new Movie((int)$idMovie);

        return parent::loadAdminTemplate('form/deleteMovie', $movie->getMovieInformation());
    }

    private function displayDeletePersonForm($idPerson)
    {
        $person = new Person((int)$idPerson);

        return parent::loadAdminTemplate('form/deletePerson', $person->getInformation());
    }

    private function displayEditMovieForm($idMovie)
    {
        $movie = new Movie((int)$idMovie);

        return parent::loadAdminTemplate('form/editMovie', $movie->getMovieInformation());
    }

    private function displayEditPersonForm($idPerson)
    {
        $person = new Person((int)$idPerson);

        return parent::loadAdminTemplate('form/editPerson', $person->getBaseInformation());
    }

    private function updateMovieInformation($idMovie)
    {
        $movie = new Movie((int)$idMovie);
        list('title' => $movie->title,
             'synopsis' => $movie->synopsis,
             'releaseDate' => $movie->releaseDate,
             'rating' => $movie->rating) = $_POST;

        return $movie->save();
    }

    private function updatePersonInformation($idPerson)
    {
        $person = new Person((int)$idPerson);
        list('firstName' => $person->firstName,
             'lastName' => $person->lastName,
             'birthDate' => $person->birthDate,
             'biography' => $person->biography,
             'filmography' => $person->filmography) = $_POST;

        return $person->save();
    }

}
