<?php
/**
 * Created by IntelliJ IDEA.
 * User: tema_on
 * Date: 04.03.17
 * Time: 12:24
 */
require_once 'db_connect.php';

function select_records($table_name, $field_name = false, $params = false, $first_record_force = false){
    $records = [];
    $query_string = "SELECT * FROM $table_name";
    if($field_name && $params){
        $query_string .= " WHERE $field_name=$params";
    }
    global $connect;
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
    $query_string = "DELETE FROM $table_name WHERE $field = $params";
    global $connect;
    $result = mysqli_query($connect, $query_string);
    return $result;
}


/**
 * @param $table_name String #Имя таблицы
 * @param $params Array #Ассоциативный массив - ключ - это имя поля, значение
 */
function create_record($table_name, $params){
    if(empty($params)) return false;
    $query_string = "INSERT INTO `$table_name` ";
    $field_names = '('.implode(array_keys($params), ', ').')';
    global $connect;
    $field_values = ' VALUES (' . implode(array_map(function($value) use ($connect){
        return '\''. mysqli_real_escape_string($connect, $value) . '\'';
//
    }, $params), ', ') . ')';
    $query_string .= $field_names.$field_values;
    mysqli_query($connect, $query_string);
    return mysqli_insert_id($connect);
}

function update_record($table_name, $params, $field_name = ''){
    $query_string = "UPDATE `$table_name` SET ";
    global $connect;
    $force_id = null;
    if(array_key_exists('id',$params)){
        $force_id = $params['id'];
        unset($params['id']);
    }
    array_walk($params, function(&$value, $key) use ($connect, $query_string){
        $value = "$key = '" . mysqli_real_escape_string($connect, $value) . '\'';
    });
    $query_string.= implode($params, ', ');
    if(($field_name && $params[$field_name]) || $force_id){
        if(!$field_name || ($field_name && !array_key_exists($field_name, $params))){
            $field_name = 'id';
            $field_value = mysqli_real_escape_string($connect, $force_id);
        }else{
            $field_value = mysqli_real_escape_string($connect, $params[$field_name]);
        }
        $query_string .= "WHERE $field_name = $field_value";
    }
    return mysqli_query($connect, $query_string);
}