<?php
/**
 * Created by PhpStorm.
 * User: fsoul
 * Date: 22.04.2015
 * Time: 16:11
 */
class V{
    public static function dump($str, $die = null) {
        echo '<pre>';
        print_r($str);
        echo '</pre>';
        if ($die != null){
            die('DIE');
        }
    }
}