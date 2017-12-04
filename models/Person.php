<?php

class Person {

    protected $id;
    protected $db;

    public $firstName;
    public $lastName;
    public $birthDate;
    public $biography;
    public $filmography;

    public function __construct(int $id)
    {
        $this->id = $id;
        $this->db = DB::getInstance();
    }

    public function getInformation()
    {
        $request = $this->db->prepare("SELECT * FROM personne WHERE personne.id = :id");
        $request->execute([
            ':id' => $this->id,
        ]);

        return $request->fetchAll(PDO::FETCH_ASSOC)[0];
    }

    public function getBaseInformation()
    {
        $request = $this->db->prepare("SELECT * FROM personne JOIN personne_has_photo ON personne.id = personne_has_photo.id_personne JOIN photo on personne_has_photo.id_photo = photo.id WHERE personne.id = :id");
        $request->execute([
            ':id' => $this->id,
        ]);

        return $request->fetchAll(PDO::FETCH_ASSOC)[0];
    }

    public static function getAllPersons()
    {
        $db = Db::getInstance();
        $request = $db->prepare("SELECT * FROM personne");
        $request->execute();

        return $request->fetchAll(PDO::FETCH_ASSOC);
    }

    public function save()
    {
        $request = $this->db->prepare("UPDATE personne SET prenom = :firstName, nom = :lastName, dateDeNaissance = :birthDate, biographie = :biography, filmographie = :filmography WHERE id = :id");

        return $request->execute([
            ':id' => $this->id,
            ':firstName' => $this->firstName,
            ':lastName' => $this->lastName,
            ':birthDate' => $this->birthDate,
            ':biography' => $this->biography,
            ':filmography' => $this->filmography,
        ]);
    }

    public function add()
    {
        $request = $this->db->prepare("INSERT INTO personne (id, prenom, nom, dateDeNaissance, biographie, filmographie) VALUES(:id, :firstName, :lastName, :birthDate, :biography, :filmography)");

        return $request->execute([
            ':id' => $this->id,
            ':firstName' => $this->firstName,
            ':lastName' => $this->lastName,
            ':birthDate' => $this->birthDate,
            ':biography' => $this->biography,
            ':filmography' => $this->filmography,
        ]);
    }

    public function delete()
    {
        $request = $this->db->prepare("DELETE FROM personne WHERE id = :id");

        return $request->execute([
            ':id' => $this->id,
        ]);
    }
}
