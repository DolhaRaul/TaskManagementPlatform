<?php
session_start();
include_once 'DataBaseProperties.php';
include_once 'DataBaseOperations.php';

$email = $password = NULL;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"];
    $password = $_POST["passw"];
}

$status = DataBaseOperations::verifyUser($email, $password);

if($status === true){
    $_SESSION['user_email'] = $email;
    $name_user = DataBaseOperations::getUsersName($email);
    echo "<script>alert('Logarea s-a facut cu succes!')</script>";
    echo "<script>alert('Bine ai venit $name_user !')</script>";
    echo "<script>window.location.href = '../home.css/home.php'</script>";
}
else
    echo "<script>alert('Nu exista un utilizator cu astfel de credentiale!')</script>";
    echo "<script>window.location.href = '../home.css/login.php'</script>";




