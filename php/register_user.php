<?php
session_start();
include_once 'DataBaseProperties.php';
include_once 'DataBaseOperations.php';
$firstName = $lastName = $email = $password = $gender = $city = NULL;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $firstName = $_POST["fname"];
    $lastName = $_POST["lname"];
    $email = $_POST["email"];
    $password = $_POST["passw"];
    $gender = $_POST["gender"];
    $city = $_POST["city"];
}

$status = DataBaseOperations::createUser($firstName , $lastName, $email, $password, $gender, $city);

if ($status === true) {
    $_SESSION['user_email'] = $email;
    echo "<script>alert('Utilizatorul a fost creat cu succes!')</script>";
    echo "<script>window.location.href = '../home.css/login.php'</script>";
} else {
    echo "<script>alert('Utilizatorul nu a putut fi creat!')</script>";
    echo "<script>window.location.href = '../home.css/register.php'</script>";
}



