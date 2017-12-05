<?php

class FaqController extends Controller {

    /**
     * Displays the home page of the app
     */
    public static function displayFaq()
    {
        $data['ajaxUrl'] = '' . _BASE_URL_ . 'asideAjax';
        return parent::loadTemplate('faq', $data);
    }

    public static function displayFaqContentOnly()
    {
        return parent::loadTemplate('faqContent');
    }

}
