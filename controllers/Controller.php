<?php

class Controller {

    public static function loadTemplate($templateName, $args = null)
    {
        // Define the received data parameter so we can use it in the template
        if (!empty($args)) {
            $data = $args;
        }

        include dirname(dirname(__FILE__)) . '/views/' . $templateName . '.php';
    }

    public static function loadAdminTemplate($templateName, $args = null)
    {
        // Define the received data parameter so we can use it in the template
        if (!empty($args)) {
            $data = $args;
        }

        include dirname(dirname(__FILE__)) . '/views/admin/' . $templateName . '.php';
    }
}
