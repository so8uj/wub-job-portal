<?php

include("database.php");

// Assign Database Connection Global
function con_global(){
    global $conection;
    return $conection;
}


// Fetch All Data
function get_all_data($table_name){
    return mysqli_query(con_global(),"SELECT * FROM `$table_name` ORDER BY `id` desc");
    exit;
}

// Fetch Data by a specific filed
function get_single_data($table_name,$table_field,$table_value){
    return mysqli_query(con_global(),"SELECT * FROM `$table_name` WHERE `$table_field` = '$table_value' ORDER BY `id` desc");
    exit;
}


// Delete All Data by a Specific Field
function delete_data($table_name,$table_field,$table_value){
    mysqli_query(con_global(),"DELETE FROM `$table_name` WHERE `$table_field` = '$table_value'");
    return;
    exit;
}



?>