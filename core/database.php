<?php

    $server = "localhost";
    $username = "root";
    $pass = "";
    $db_name = "wub_job_portal";

    $conection = mysqli_connect($server,$username,$pass,$db_name);

    if (!$conection) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit;
    }

?>