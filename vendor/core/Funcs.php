<?php
namespace core;

abstract class Funcs
{
    public static function debug($data){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
    public static function debug_var($data){
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
    }
}