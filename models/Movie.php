<?php

class Movie {

    public function __construct(int $id)
    {
        $this->id = $id;
        $this->db = initDbConnection();
    }

    public function getMovieInformation()
    {
        $result = mysqli_query($this->db, "SELECT * FROM film where id = $this->id");
        return mysqli_fetch_all($result, MYSQLI_ASSOC)[0];
    }

    public static function getAllMovies()
    {
        $db = initDbConnection();
        $result = mysqli_query($db, "SELECT * FROM film ORDER BY titre ASC");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getMoviePhotos()
    {
        $result = mysqli_query($this->db, "SELECT * FROM photo JOIN film_has_photo On photo.id = film_has_photo.id_photo WHERE id_film = " . $this->id);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getDirector()
    {
        $result = mysqli_query($this->db, "SELECT chemin, legende FROM photo JOIN personne_has_photo ON photo.id = personne_has_photo.id_photo JOIN film_has_personne ON personne_has_photo.id_personne = film_has_personne.id_personne JOIN film ON film_has_personne.id_film = film.id WHERE film.id = " . $this->id . " AND film_has_personne.role = 'Réalisateur'");
        return mysqli_fetch_all($result, MYSQLI_ASSOC)[0];
    }

    public function getActorImages()
    {
        $result = mysqli_query($this->db, "SELECT DISTINCT * FROM photo JOIN personne_has_photo ON photo.id = personne_has_photo.id_photo JOIN film_has_personne ON film_has_personne.id_personne = personne_has_photo.id_personne JOIN film ON film_has_personne.id_film = film.id WHERE film.id = " . $this->id . " AND film_has_personne.role <> 'Réalisateur'");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

}
