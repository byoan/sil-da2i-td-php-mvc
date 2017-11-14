<?php

class Director extends Person {

    protected $id;
    protected $db;

    public function __construct(int $id)
    {
        $this->id = $id;
        $this->db = initDbConnection();
    }

    public static function getAllDirectors()
    {
        $db = initDbConnection();
        $result = mysqli_query($db, "SELECT * FROM personne JOIN film_has_personne ON personne.id = film_has_personne.id_personne WHERE role like 'Réalisateur' ORDER BY nom ASC");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
