<?php

/**
 * Actor Entity
 */
class Actor extends Person {

    protected $id;
    protected $db;

    public function __construct(int $id)
    {
        $this->id = $id;
        $this->db = DB::getInstance();
    }

    /**
     * Allows to retrieve all actors related to a movie as Actor
     *
     * @return void
     */
    public static function getAllActors()
    {
        $db = DB::getInstance();

        $request = $db->prepare("SELECT * FROM personne JOIN film_has_personne ON personne.id = film_has_personne.id_personne WHERE role like :role ORDER BY nom ASC");
        $request->execute([
            ':role' => 'Acteur',
        ]);

        return $request->fetchAll(PDO::FETCH_ASSOC);
    }

}
