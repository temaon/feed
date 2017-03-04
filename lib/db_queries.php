<?php
/**
 * Created by IntelliJ IDEA.
 * User: tema_on
 * Date: 04.03.17
 * Time: 12:24
 */

function select_records($table_name, $field_name = false, $params = false, $first_record_force = false){
    require_once 'db_connect.php';
    $records = [];
    $query_string = "SELECT * FROM $table_name";
    if($field_name && $params){
        $query_string .= " WHERE $field_name=$params";
    }
    $query = mysqli_query($connect, $query_string);
    if($first_record_force){
        $records = mysqli_fetch_object($query);
    }else{
        while($result = mysqli_fetch_object($query)){
            $records[] = $result;
        }
    }
    return $records;
}

function delete_record($table_name, $field, $params){
    require_once 'db_connect.php';
    $query_string = "DELETE FROM $table_name WHERE $field = $params";
    $result = mysqli_query($connect, $query_string);
    return $result;
}