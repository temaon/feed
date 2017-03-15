<?php
/**
 * Created by IntelliJ IDEA.
 * User: tema_on
 * Date: 11.03.17
 * Time: 14:51
 */

require_once '../lib/flash_messages.php';

if(!empty($_SESSION['auth_user'])){
    unset($_SESSION['auth_user']);
    session_destroy();
    return header('Location:/');
}

