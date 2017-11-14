<?php

class Movie {

    private $id;
    private $db;

    public function __construct(int $id)
    {
        $this->id = $id;
        $this->db = DB::getInstance();
    }

    public function getMovieInformation()
    {
        $request = $this->db->prepare("SELECT * FROM film where id = :id");
        $request->execute([
            ':id' => $this->id,
        ]);

        return $request->fetchAll(PDO::FETCH_ASSOC)[0];
    }

    public static function getAllMovies()
    {
        $db = DB::getInstance();

        $request = $db->prepare("SELECT * FROM film ORDER BY titre ASC");
        $request->execute();

        return $request->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMoviePhotos()
    {
        $request = $this->db->prepare("SELECT * FROM photo JOIN film_has_photo On photo.id = film_has_photo.id_photo WHERE id_film = :id");
        $request->execute([
            ':id' => $this->id,
        ]);

        return $request->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDirector()
    {
        $request = $this->db->prepare("SELECT chemin, legende FROM photo JOIN personne_has_photo ON photo.id = personne_has_photo.id_photo JOIN film_has_personne ON personne_has_photo.id_personne = film_has_personne.id_personne JOIN film ON film_has_personne.id_film = film.id WHERE film.id = :id AND film_has_personne.role = :role");
        $request->execute([
            ':id' => $this->id,
            ':role' => 'Réalisateur',
        ]);

        return $request->fetchAll(PDO::FETCH_ASSOC)[0];
    }

    public function getActorImages()
    {
        $request = $this->db->prepare("SELECT DISTINCT * FROM photo JOIN personne_has_photo ON photo.id = personne_has_photo.id_photo JOIN film_has_personne ON film_has_personne.id_personne = personne_has_photo.id_personne JOIN film ON film_has_personne.id_film = film.id WHERE film.id = :id AND film_has_personne.role <> :role");
        $request->execute([
            ':id' => $this->id,
            ':role' => 'Réalisateur',
        ]);

        return $request->fetchAll(PDO::FETCH_ASSOC);
    }

}
