<?php

/**
 * Created by PhpStorm.
 * User: PHP acedemy
 * Date: 01.03.2016
 * Time: 20:52
 */
abstract class Router
{
    public static function redirect($uri)
    {
        header("Location: {$uri}");
        die;
    }
}