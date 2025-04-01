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

// Jobs for Backend
function all_jobs_with_filters($filters=[],$relation=0,$my_jobs=0){

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
    if($my_jobs == 1){
        $user_id = isset($_SESSION['auth_id']) ? $_SESSION['auth_id'] : 1;
        $operatior = isset($filters['status']) ? " AND" : " WHERE";
        $my_jobs_query = $operatior." `user_id` = '$user_id'";
        $query_building = $query_building
                          .$my_jobs_query;
    }

    $query_building = $query_building. " ORDER BY `id` desc";       
    return mysqli_query(con_global(),$query_building);
}

// Jobs For Frontend
function get_jobs($filters=[],$limit=0,$order_by='oldest'){

    $job_query = "SELECT jobs.*, users.name FROM jobs INNER JOIN users ON jobs.user_id = users.id";

    if(isset($filters['title']) && !empty($filters['title'])){
        $title = $filters['title'];
        $add_search_filter = " WHERE `title` LIKE '%$title%'";
        $job_query = $job_query.$add_search_filter;
    }

    if(isset($filters['location']) && !empty($filters['location'])){
        $location = $filters['location'];
        $operator = isset($filters['title']) ? " AND" : " WHERE";
        $add_location_filter = $operator." `area` LIKE '%$location%'";
        $job_query = $job_query.$add_location_filter;
    }

    if($order_by != 'oldest'){
        $job_query = $job_query." ORDER BY `id` desc";
    }
    if($limit != 0){
        $job_query = $job_query." LIMIT $limit";
    }
    
    return mysqli_query(con_global(),$job_query);
}
function get_single_job($id){
    $query = "SELECT jobs.*, users.name FROM jobs INNER JOIN users ON jobs.user_id = users.id WHERE jobs.`id` = '$id'";
    return mysqli_query(con_global(),$query);
    exit;
}
// Fetch Data by a specific filed
function get_single_data($table_name,$table_field,$table_value){
    return mysqli_query(con_global(),"SELECT * FROM `$table_name` WHERE `$table_field` = '$table_value' ORDER BY `id` desc");
    exit;
}

function update_jobstatus($id,$status){
    return mysqli_query(con_global(),"UPDATE `jobs` SET `status`='$id' WHERE `id` = '$status'");
    exit;
}

// Delete All Data by a Specific Field
function delete_data($table_name,$table_field,$table_value){
    mysqli_query(con_global(),"DELETE FROM `$table_name` WHERE `$table_field` = '$table_value'");
    return;
    exit;
}

// Count Function
function count_data($table_name,$filed_name=0,$filed_value=0,$by_user=0){

    $buld_query = "SELECT COUNT(*) AS cnt FROM `$table_name`"; 
    if($filed_name != 0 && $filed_value != 0){
        $buld_query = $buld_query." WHERE `$filed_name` = '$filed_value'";
    }
    if($by_user != 0){
        $operatior = ($filed_name != 0 && $filed_value != 0) ? " AND" : " WHERE";
        $user_condition = $operatior." `user_id` = '$by_user'";
        $buld_query = $buld_query.$user_condition;
    }
    $count_query = mysqli_query(con_global(),$buld_query);
    $get_data = mysqli_fetch_assoc($count_query);
    if($get_data['cnt'] > 0){
        return $get_data['cnt']; 
    }else{
        return 0;
    }
    exit;
}

?>