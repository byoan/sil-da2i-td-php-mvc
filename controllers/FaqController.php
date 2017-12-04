<?php

class FaqController extends Controller {

    /**
     * Displays the home page of the app
     */
    public static function displayFaq()
    {
        return parent::loadTemplate('faq', $data);
    }

}
