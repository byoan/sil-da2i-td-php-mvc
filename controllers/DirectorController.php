<?php

class DirectorController extends Controller {

    /**
     * Displays the director page information
     */
    public static function display(int $id)
    {
        $director = new Director($id);

        $data['personne'] = $director->getBaseInformation();

        return parent::loadTemplate('person', $data);
    }
}
