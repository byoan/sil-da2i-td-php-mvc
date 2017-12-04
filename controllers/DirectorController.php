<?php

class DirectorController {

    /**
     * Displays the director page information
     */
    public static function display(int $id)
    {
        $director = new Director($id);

        $data['personne'] = $director->getBaseInformation();

        return Controller::loadTemplate('person', $data);
    }
}
