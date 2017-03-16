<?php
/**
 * Created by IntelliJ IDEA.
 * User: tema_on
 * Date: 01.03.17
 * Time: 19:29
 */

require_once 'lib/auth_check.php';
require_once 'lib/flash_messages.php';
require_once 'lib/db_queries.php';

$post_data = [
    'title' => $_POST['title'],
    'description' => $_POST['description']
];

var_dump($_FILES);
die;

//if(!$result = create_record('posts', $post_data)){
//    print_r(mysqli_error_list($connect));
//}else{
//    set_flash_message('message', "Ваш пост сохранен! {$post_data['title']}");
//    return header('Location:/');
//}

