<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 19.1.25
 * Time: 13.38
 */

namespace App\Classes;

/**
 * Redirect to specific page
 * Class Redirect
 * @package App\Classes
 */
class Redirect
{
    public static function to($page)
    {
        header("location: $page");
    }

    /**
     * Redirect to same page
     */
    public static function back()
    {
        $uri = $_SERVER['REQUEST_URI'];
        header("location: $uri");
    }
}