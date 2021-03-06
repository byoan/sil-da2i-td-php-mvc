<?php

class ActorController extends Controller {

    /**
     * Displays the actor page with its information retrieved from database
     *
     * @param int $id
     * @return void
     */
    public static function display(int $id)
    {
        $actor = new Actor($id);
        $data['personne'] = $actor->getBaseInformation();

        return parent::loadTemplate('person', $data);
    }
}
