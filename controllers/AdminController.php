<?php

class AdminController extends Controller {

    /**
     * Displays the home administration page
     *
     * @return void
     */
    public static function displayAdminHome()
    {
        $data['moviesList'] = Movie::getAllMovies();
        $data['personList'] = Person::getAllPersons();

        return parent::loadAdminTemplate('home', $data);
    }

    /**
     * Handles the received admin action
     *
     * @param array $request The request query, as an exploded array
     * @return void
     */
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

    /**
     * Allows to handle an add action in the query
     *
     * @param array $explodedRequest The request query, as an exploded array
     * @return void
     */
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

    /**
     * Allows to handle an edit action in the query
     *
     * @param array $explodedRequest The request query, as an exploded array
     * @return void
     */
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

    /**
     * Allows to handle a delete action in the query
     *
     * @param array $explodedRequest The request query, as an exploded array
     * @return void
     */
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

    /**
     * Creates a movie using the information received in $_POST
     *
     * @return void
     */
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

    /**
     * Creates a person using the information received in $_POST
     *
     * @return void
     */
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

    /**
     * Deletes the movie associated to the idMovie passed through $_POST
     *
     * @return void
     */
    private function deleteMovie()
    {
        $db = Db::getInstance();

        $movie = new Movie((int)$_POST['idMovie']);

        return $movie->delete();
    }

    /**
     * Deletes the person associated to the idPerson passed through $_POST
     *
     * @return void
     */
    private function deletePerson()
    {
        $db = Db::getInstance();

        $person = new Person((int)$_POST['idPerson']);

        return $person->delete();
    }

    /**
     * Displays the movie deletion form
     *
     * @param int $idMovie The movie's id to associate to the form
     * @return void
     */
    private function displayDeleteMovieForm($idMovie)
    {
        $movie = new Movie((int)$idMovie);

        return parent::loadAdminTemplate('form/deleteMovie', $movie->getMovieInformation());
    }

    /**
     * Displays the person deletion form
     *
     * @param int $idPerson The person's id to associate to the form
     * @return void
     */
    private function displayDeletePersonForm($idPerson)
    {
        $person = new Person((int)$idPerson);

        return parent::loadAdminTemplate('form/deletePerson', $person->getInformation());
    }

    /**
     * Displays the movie edition form
     *
     * @param int $idMovie The id movie to edit
     * @return void
     */
    private function displayEditMovieForm($idMovie)
    {
        $movie = new Movie((int)$idMovie);

        return parent::loadAdminTemplate('form/editMovie', $movie->getMovieInformation());
    }

    /**
     * Displays the person edition form
     *
     * @param int $idPerson The id person to edit
     * @return void
     */
    private function displayEditPersonForm($idPerson)
    {
        $person = new Person((int)$idPerson);

        return parent::loadAdminTemplate('form/editPerson', $person->getBaseInformation());
    }

    /**
     * Updates the movie information for the given id movie, through $_POST
     *
     * @param int $idMovie The movie id to update
     * @return void
     */
    private function updateMovieInformation($idMovie)
    {
        $movie = new Movie((int)$idMovie);
        list('title' => $movie->title,
             'synopsis' => $movie->synopsis,
             'releaseDate' => $movie->releaseDate,
             'rating' => $movie->rating) = $_POST;

        return $movie->save();
    }

    /**
     * Updates the person information for the given id person, through $_POST
     *
     * @param int $idPerson The person id to update
     * @return void
     */
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
