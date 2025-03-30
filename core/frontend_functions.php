<?php

include("query_functions.php");

$user_id = isset($_SESSION['auth_id']) ? $_SESSION['auth_id'] : 1;

$my_jobs = get_single_data('jobs','user_id',$user_id);
