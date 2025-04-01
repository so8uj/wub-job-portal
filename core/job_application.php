<?php 

if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    echo "Access Denied!";
    exit(401);
}

include("./database.php");

function con_global(){
    global $conection;
    return $conection;
}

$job_id = $_POST['job_id'];
$title = $_POST['title'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$cover_latter = $_POST['cover_latter'];
$cv = $_FILES['cv'];


if(check_unique_email($job_id,$email) === true){
    header("Location: ../single-job.php?title=$title&id=".base64_encode($job_id)."&error=You have already applied for the job with this Email!");
}


$upload_dir = $_SERVER['DOCUMENT_ROOT']."/wub-job-portal/uploads/";

$file_ext = pathinfo($cv['name'], PATHINFO_EXTENSION);
$cv_path = $upload_dir."cv-".time().".".strtolower($file_ext);
move_uploaded_file($cv['tmp_name'], $cv_path);

$insert = mysqli_query(con_global(),"INSERT INTO `job_applications`(`job_id`, `name`, `email`, `phone`, `cover_latter`, `cv`) VALUES ('$job_id','$name','$email','$phone','$cover_latter','$cv_path')");

if($insert){
    header("Location: ../single-job.php?title=$title&id=".base64_encode($job_id)."&success=Congratulations! You have successfully applied to the job.");
}

function check_unique_email($job_id,$email){
    $check_unique_query = "SELECT * FROM `job_applications` WHERE `job_id` = '$job_id' AND `email` = '$email'";
    $get_qunique_data = mysqli_query(con_global(), $check_unique_query);
    if(mysqli_num_rows($get_qunique_data) > 0){
        return true;
        exit;
    }
}