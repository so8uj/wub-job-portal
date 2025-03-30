<?php

include("query_functions.php");

$user_id = isset($_SESSION['auth_id']) ? $_SESSION['auth_id'] : 1;

$get_auth_user = get_single_data('users','id',$user_id);
$auth_user = mysqli_fetch_assoc($get_auth_user);
$my_jobs = get_single_data('jobs','user_id',$user_id);
