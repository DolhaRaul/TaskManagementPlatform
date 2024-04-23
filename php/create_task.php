<?php
include_once 'pages_config.php';
include_once 'DataBaseOperations.php';
//Putem adauga in baza de date DOAR daca utilizatorul e autentificat
if( isset($_SESSION['user_email']) ){
  $email = $_SESSION['user_email'];
  $user_id = DataBaseOperations::getUserId($email);
  if(empty($user_id)) {
      echo "<script>alert('Eroare la obtinerea ID ului utilizatorului de emai $email')</script>";
      echo "<script>window.location.href = '../home.css/home.php'</script>";
  }
   // echo "<script>alert('ID ul utilizatorului de emai $email s-a obtinut cu succes!')</script>";
  $task_info = $_POST['taskToAdd'];
  //echo "<script>alert('$task_info')</script>";
  $status = DataBaseOperations::createTask($task_info, $user_id);
  if($status){
      echo "<script>window.location.href = '../home.css/home.php'</script>";
      echo "<script>alert('Task ul s-a adaugat cu succes!')</script>";
  }
  else {
      echo "<script>alert('Eroare la adaugarea task ului')</script>";
      echo "<script>window.location.href = '../home.css/home.php'</script>";
  }
}
else {
    echo "<script>alert('Trebuie sa te loghezi pentru a gestiona task uri!')</script>";
    echo "<script>window.location.href = '../home.css/home.php'</script>";
}
