<?php

class Person {

    protected $db;

    /**
     * The person id
     *
     * @var int
     */
    protected $id;

    /**
     * The person first name
     *
     * @var string
     */
    public $firstName;

    /**
     * The person last name
     *
     * @var string
     */
    public $lastName;

    /**
     * The person birth date
     *
     * @var date
     */
    public $birthDate;

    /**
     * The person biography
     *
     * @var string
     */
    public $biography;

    /**
     * The person filmography
     *
     * @var string
     */
    public $filmography;

    public function __construct(int $id)
    {
        $this->id = $id;
        $this->db = DB::getInstance();
    }

    /**
     * Retrieves all the fields of the ‘personne‘ table using the current entity id
     *
     * @return void
     */
    public function getInformation()
    {
        $request = $this->db->prepare("SELECT * FROM personne WHERE personne.id = :id");
        $request->execute([
            ':id' => $this->id,
        ]);

        return $request->fetchAll(PDO::FETCH_ASSOC)[0];
    }

    /**
     * Retrieves all the information related to the current id person, including pictures
     *
     * @return void
     */
    public function getBaseInformation()
    {
        $request = $this->db->prepare("SELECT * FROM personne JOIN personne_has_photo ON personne.id = personne_has_photo.id_personne JOIN photo on personne_has_photo.id_photo = photo.id WHERE personne.id = :id");
        $request->execute([
            ':id' => $this->id,
        ]);

        return $request->fetchAll(PDO::FETCH_ASSOC)[0];
    }

    /**
     * Gets all the persons listed in the table
     *
     * @return void
     */
    public static function getAllPersons()
    {
        $db = Db::getInstance();
        $request = $db->prepare("SELECT * FROM personne");
        $request->execute();

        return $request->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Saves the current entity in database by mapping the class attributes with the table fields
     */
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

    /**
     * Adds the current entity in database by mapping the class attributes with the table fields
     */
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

    /**
     * Deletes the current entity in database by mapping the class attributes with the table fields
     */
    public function delete()
    {
        $request = $this->db->prepare("DELETE FROM personne WHERE id = :id");

        return $request->execute([
            ':id' => $this->id,
        ]);
    }
}
