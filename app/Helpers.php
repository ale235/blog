<?php

namespace App;

class Helpers {
    /*
     * 
     */

    public static function generateRandomString($length = 10) {
        //$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $characters = 'abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /*
     * 
     */

    public static function generateRandomString2($length = 10) {
        return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
    }

    /*
     * 
     */

    public static function getDate() {
        $date = date('Y');
        return $date;
    }

    /**
     * 
     */
    public static function get_timestamp() {
        $now = new DateTime();
        $timestamp = $now->format('Y-m-d H:i:s');    // MySQL datetime format
        return $timestamp;
    }

    /*
     * 
     */

    public static function no_cache() {
        header('Cache-Control: no-store, no-cache, must-revalidate');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
    }

    /*
     * 
     */

    public static function print_r($array, $exit = false) {
        echo '<pre>';
        print_r($array);
        echo '</pre>';
        if ($exit) {exit;}
    }

    /*
     * 
     */

    public static function errors_treatment($errors_array) {
        $error = '';
        foreach ($errors_array as $value) {
            $error .= $value . '<br>';
        }
        return $error;
    }

}
