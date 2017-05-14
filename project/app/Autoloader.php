<?php

/**
 * Created by PhpStorm.
 * User: Aster
 * Date: 12/05/2017
 * Time: 19:31
 */
class Autoloader
{

    static  function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload')); //CLASS contient le nom de la classe courante
    }

    static function autoload($class_name)
    {
        require __DIR__ . '/' . $class_name . '.php';

    }
}