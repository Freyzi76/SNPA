<?php

class Autoload {

    static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoloader'));
    }

    static function autoloader($class) 
    {
        $class = str_replace('HM\\', '', $class);
        $class = str_replace('\\', '', $class);
        require 'app/' . $class . '.php';
    }


}