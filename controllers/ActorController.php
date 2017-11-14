<?php

class ActorController {

    public static function display(int $id)
    {
        $actor = new Actor($id);

        $data['personne'] = $actor->getBaseInformation();

        return Controller::loadTemplate('person', $data);
    }
}
