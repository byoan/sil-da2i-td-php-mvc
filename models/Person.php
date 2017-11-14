<?php

class Person {

    protected $id;
    protected $db;

    public function __construct(int $id)
    {
        $this->id = $id;
        $this->db = DB::getInstance();
    }

    public function getBaseInformation()
    {
        $request = $this->db->prepare("SELECT * FROM personne JOIN personne_has_photo ON personne.id = personne_has_photo.id_personne JOIN photo on personne_has_photo.id_photo = photo.id WHERE personne.id = :id");
        $request->execute([
            ':id' => $this->id,
        ]);

        return $request->fetchAll(PDO::FETCH_ASSOC)[0];
    }

}
