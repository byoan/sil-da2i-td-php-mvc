<?php

/**
 * The Movie entity
 */
class Movie {

    private $db;

    /**
     * The Movie id
     *
     * @var int
     */
    private $id;

    /**
     * The movie title
     *
     * @var string
     */
    public $title;

    /**
     * The movie synopsis
     *
     * @var string
     */
    public $synopsis;

    /**
     * The movie release date
     *
     * @var date
     */
    public $releaseDate;

    /**
     * The movie rating on a scale from 0 to 5
     *
     * @var float
     */
    public $rating;

    public function __construct(int $id)
    {
        $this->id = $id;
        $this->db = DB::getInstance();
    }

    /**
     * Allows to retrieve all the movie fields
     *
     * @return void
     */
    public function getMovieInformation()
    {
        $request = $this->db->prepare("SELECT * FROM film where id = :id");
        $request->execute([
            ':id' => $this->id,
        ]);

        return $request->fetchAll(PDO::FETCH_ASSOC)[0];
    }

    /**
     * Retrieves all the movies available in the ‘film‘ table
     *
     * @return void
     */
    public static function getAllMovies()
    {
        $db = DB::getInstance();

        $request = $db->prepare("SELECT * FROM film ORDER BY titre ASC");
        $request->execute();

        return $request->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Retrieves all the pictures associated to the current id movie
     *
     * @return void
     */
    public function getMoviePhotos()
    {
        $request = $this->db->prepare("SELECT * FROM photo JOIN film_has_photo On photo.id = film_has_photo.id_photo WHERE id_film = :id");
        $request->execute([
            ':id' => $this->id,
        ]);

        return $request->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Gets the current movie's director
     *
     * @return void
     */
    public function getDirector()
    {
        $request = $this->db->prepare("SELECT chemin, legende FROM photo JOIN personne_has_photo ON photo.id = personne_has_photo.id_photo JOIN film_has_personne ON personne_has_photo.id_personne = film_has_personne.id_personne JOIN film ON film_has_personne.id_film = film.id WHERE film.id = :id AND film_has_personne.role = :role");
        $request->execute([
            ':id' => $this->id,
            ':role' => 'RÃ©alisateur',
        ]);

        return $request->fetchAll(PDO::FETCH_ASSOC)[0];
    }

    /**
     * Gets all the actors image for the current id movie
     *
     * @return void
     */
    public function getActorImages()
    {
        $request = $this->db->prepare("SELECT DISTINCT * FROM photo JOIN personne_has_photo ON photo.id = personne_has_photo.id_photo JOIN film_has_personne ON film_has_personne.id_personne = personne_has_photo.id_personne JOIN film ON film_has_personne.id_film = film.id WHERE film.id = :id AND film_has_personne.role <> :role");
        $request->execute([
            ':id' => $this->id,
            ':role' => 'RÃ©alisateur',
        ]);

        return $request->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Saves the current entity in database by mapping the class attributes with the table fields
     */
    public function save()
    {
        $request = $this->db->prepare("UPDATE film SET titre = :titre, dateDeSortie = :releaseDate, synopsis = :synopsis, note = :rating WHERE id = :id");

        return $request->execute([
            ':id' => $this->id,
            ':titre' => $this->title,
            ':releaseDate' => $this->releaseDate,
            ':synopsis' => $this->synopsis,
            ':rating' => $this->rating,
        ]);
    }

    /**
     * Adds the current entity in database by mapping the class attributes with the table fields
     */
    public function add()
    {
        $request = $this->db->prepare("INSERT INTO film (id, titre, dateDeSortie, synopsis, note) VALUES (:id, :title, :releaseDate, :synopsis, :rating)");

        return $request->execute([
            ':id' => $this->id,
            ':title' => $this->title,
            ':releaseDate' => $this->releaseDate,
            ':synopsis' => $this->synopsis,
            ':rating' => $this->rating,
        ]);
    }

    /**
     * Deletes the current entity in database by mapping the class attributes with the table fields
     */
    public function delete()
    {
        $request = $this->db->prepare("DELETE * FROM film WHERE id = :id");

        return $request->execute([
            ':id' => $this->id,
        ]);
    }
}
