<?php
/**
 * Created by IntelliJ IDEA.
 * User: tema_on
 * Date: 04.03.17
 * Time: 14:51
 */

session_start();

function set_flash_message($key, $message_text){
    $_SESSION[$key] = $message_text;
}

function show_flash_message($key){
    $message = '';
    if(!empty($_SESSION[$key])){
        $message = $_SESSION[$key];
        unset($_SESSION[$key]);
    }
    return $message;
}

function flash_exists($key){
    return !empty($_SESSION[$key]);
}