<?php
/**
 * Created by IntelliJ IDEA.
 * User: tema_on
 * Date: 15.03.17
 * Time: 18:29
 */
function uploader(){
    $target_dir = "uploads/";
    if (!mkdir($dir, 0777, true)) {
        die('Не удалось создать директории...');
    }
    $base_name = basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . $base_name;
    if (!empty($_FILES["file"])) {
        if ($_FILES["file"]["error"] > 0) {
            echo "Error: " . $_FILES["file"]["error"] . "<br>";
        } else {
            move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
            return $base_name;
        }
    }
}
