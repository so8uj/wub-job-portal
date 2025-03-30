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

function all_jobs_with_filters($filters,$relation=0){

    $status_filter = "";
    $query_building = "SELECT jobs.*";

    if($relation == 1){
        $retaion_add = ",users.name FROM jobs INNER JOIN users ON jobs.user_id = users.id";
        $query_building = $query_building
        .$retaion_add;
    }else{
        $query_building = $query_building." FROM jobs";
    }  

    if(isset($filters['status'])){
        $status = $filters['status'];
        $status_filter = " WHERE `status` = '$status'";
        $query_building = $query_building
                          .$status_filter;
    }  


    $query_building = $query_building. " ORDER BY `id` desc";  
              
    return mysqli_query(con_global(),$query_building);
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