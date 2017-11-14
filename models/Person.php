<?php

class Person {

    protected $id;
    protected $db;

    public function __construct(int $id)
    {
        $this->id = $id;
        $this->db = initDbConnection();
    }

    public function getBaseInformation()
    {
        $result = mysqli_query($this->db, "SELECT * FROM personne JOIN personne_has_photo ON personne.id = personne_has_photo.id_personne JOIN photo on personne_has_photo.id_photo = photo.id WHERE personne.id = $this->id");
        return mysqli_fetch_all($result, MYSQLI_ASSOC)[0];
    }

}
