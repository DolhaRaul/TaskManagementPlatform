<?php
include_once 'pages_config.php';
include_once 'DataBaseOperations.php';
if( isset($_GET['deletedid']) ){
    $id = $_GET['deletedid'];
    $status = DataBaseOperations::deleteUser($id);
    if($status === TRUE){
        echo 'Utilizatorul s-a sters cu succes!';
        header("Location:../users.php");
    }
    else
        echo 'Utilizatorul nu s-a putut sterge';
}
