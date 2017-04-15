<?php
/**
 * Created by IntelliJ IDEA.
 * User: tema_on
 * Date: 15.03.17
 * Time: 18:29
 */
function uploader($post_type, $id){
    $target_dir = realpath(__DIR__.'/../upload/');
    $full_path = $target_dir.'/'.$post_type.'/'.$id;
//    var_dump($target_dir, $full_path);
//    die;
    if(!is_dir($full_path)){
        if (!mkdir($full_path, 777, true)) {
            die('Не удалось создать директории...');
        }
    }
    $base_name = basename($_FILES["fileToUpload"]["name"]);
    $target_file = $full_path . $base_name;
    if (!empty($_FILES["file"])) {
        if ($_FILES["file"]["error"] > 0) {
            echo "Error: " . $_FILES["file"]["error"] . "<br>";
        } else {
            move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
            return $base_name;
        }
    }
}
