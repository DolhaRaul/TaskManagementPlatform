<?php
session_start();
include_once 'DataBaseProperties.php';
include_once 'DataBaseOperations.php';

$email = $password = NULL;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"];
    $password = $_POST["passw"];
}

$status = DataBaseOperations::getUser($email, $password);

if($status === true){
    $_SESSION['user_email'] = $email;
    echo "<script>alert('Logarea s-a facut cu succes!')</script>";
    header("Location:../home.css/home.php");
}
else
    echo "<script>alert('Nu exista un utilizator cu astfel de credentiale!')</script>";
    echo "<script>window.location.href = '../home.css/login.php'</script>";




