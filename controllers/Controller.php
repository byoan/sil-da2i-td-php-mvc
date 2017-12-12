<?php

class Controller {

    /**
     * Loads the received template if it exists, and assign the $args var as a
     *
     * @param string $templateName The template name in the 'views' folder
     * @param array $args The optionnal data to pass to the template
     * @return void
     */
    public static function loadTemplate($templateName, $args = null)
    {
        // Define the received data parameter so we can use it in the template
        if (!empty($args)) {
            $data = $args;
        }
        // $data['contentOnly'] = true;
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == "XMLHttpRequest") {
            $data['contentOnly'] = true;
        } else {
            $data['contentOnly'] = false;
        }

        $data['ajaxUrl'] = '' . _BASE_URL_ . 'asideAjax';
        include dirname(dirname(__FILE__)) . '/views/' . $templateName . '.php';
    }

    /**
     * Loads the received admin template if it exists, and assign the $args var as a
     *
     * @param string $templateName The template name in the 'views/admin' folder
     * @param array $args The optionnal data to pass to the template
     * @return void
     */
    public static function loadAdminTemplate($templateName, $args = null)
    {
        // Define the received data parameter so we can use it in the template
        if (!empty($args)) {
            $data = $args;
        }
        // $data['contentOnly'] = true;
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == "XMLHttpRequest") {
            $data['contentOnly'] = true;
        } else {
            $data['contentOnly'] = false;
        }


        $data['ajaxUrl'] = '' . _BASE_URL_ . 'asideAjax';
        include dirname(dirname(__FILE__)) . '/views/admin/' . $templateName . '.php';
    }
}
