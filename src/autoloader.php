<?php

spl_autoload_register(function ($class) {
    if (is_file('models/' . $class . '.php')) {
        include 'models/' . $class . '.php';
    } else if (is_file('controllers/' . $class . '.php')) {
        include 'controllers/' . $class . '.php';
    }
});
