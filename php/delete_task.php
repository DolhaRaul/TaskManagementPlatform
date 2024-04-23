<?php
include_once 'DataBaseOperations.php';
include_once 'pages_config.php';
if( isset($_GET['task_id']) ){
    $id = $_GET['task_id'];
    $status = DataBaseOperations::deleteTask($id);
    if($status){
        echo "<script>alert('Task ul s-a sters cu succes!')</script>";
        echo "<script>window.location.href = '../home.php'</script>";
    }
}
