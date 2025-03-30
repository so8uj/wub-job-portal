<?php

if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['auth_id'])){
    echo "Access Denied!";
    exit(401);
}
if($_SERVER['REQUEST_METHOD'] !== 'POST' && !isset($_POST['action_type'])){
    echo "Access Denied!";
    exit(401);
}

include("./database.php");

$user_id = $_SESSION['auth_id'];
$title = $_POST['title'];
$description = $_POST['description'];
$deadline = $_POST['deadline'];
$area = $_POST['area'];
$salary = $_POST['salary'];
$office_time = $_POST['office_time'];
$weekends = $_POST['weekends'];

if($_POST['action_type'] == 'Add'){
    $query = "INSERT INTO `jobs`(`user_id`,`title`, `description`, `deadline`, `area`, `salary`, `office_time`, `weekends`) VALUES ('$user_id','$title','$description','$deadline','$area','$salary','$office_time','$weekends')";
    $msg = "Job Added Successfully. Waiting for Admin Approval!";
}else{
    $job_id = $_POST['job_id'];
    $query = "UPDATE `jobs` SET `title`='$title',`description`='$description',`deadline`='$deadline',`area`='$area',`salary`='$salary',`office_time`='$office_time',`weekends`='$weekends' WHERE `id` = '$job_id'";
    $msg = "Job Updated Successfully.";
}

$execute = mysqli_query($conection,$query);
if($execute){
    header("Location: ../my-jobs.php?action=success&msg=$msg");
}else{
    header("Location: ../my-jobs.php?action=invalid&msg=Execution Error");
}

mysqli_close($conection);
exit();