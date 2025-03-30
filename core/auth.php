<?php

if($_SERVER['REQUEST_METHOD'] !== 'POST' && !isset($_POST['auth_for'])){
    echo "Access Denied!";
    exit(401);
}

if(!isset($_SESSION)){
    session_start();
}

include("./database.php");

$email = $_POST['email'];

if($_POST['auth_for'] === 'Signup'){

    $name = $_POST['name'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $insert = mysqli_query($conection,"INSERT INTO `users`(`name`, `email`, `password`) VALUES ('$name','$email','$password')");

    $inserted_id = mysqli_insert_id($conection);

    $_SESSION['auth_id'] = $inserted_id;

    header("Location: ../dashboard.php?id_opned=true");
}else{

    $check_email = mysqli_query($conection,"SELECT * FROM `users` WHERE `email` = '$email'");
    if($check_email && mysqli_num_rows($check_email) > 0){
        $user_data = mysqli_fetch_assoc($check_email);
        if(password_verify($_POST['password'],$user_data['password'])){
            
            $_SESSION['auth_id'] = $user_data['id'];
            header("Location: ../dashboard.php");
            
        }else{
            header("Location: ../sign-in.php?error=Invalid Password!");
        }
    }else{
        header("Location: ../sign-in.php?error=Invalid Email!");
    }
}
mysqli_close($conection);
exit();


?>