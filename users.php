<?php
include_once 'php/DataBaseOperations.php';
include_once 'php/Role.php';
include_once 'php/pages_config.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/users.css">
    <link rel="stylesheet" href="css/nav_links.css">
    <link rel="stylesheet" href="css/footer.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <script src="javascript/login_register_validation.js"></script>
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Register ToDoList</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
</head>

<body>
<nav>
    <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Register</a></li>
        <li><a href="about_owner.php">About owner</a></li>
        <?php
        if(!empty($_SESSION['user_email']) && $_SESSION['user_email'] === Role::ADMIN_EMAIL) {
            echo "<script>$('nav li').css('width', '20%')</script>";
            echo "<li class='active' style='background-color: #97dcf7; width: 20%'><a href='users.php'>Users page</a></li>";
        }
        ?>
    </ul>
</nav>

<main>
    <h1>Users</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>Email</th>
            <th>Password</th>
            <th>Role</th>
            <th>Gender</th>
            <th>City</th>
            <th style="color: springgreen">Update</th>
            <th style="color: red" >Delete</th>
        </tr>
        <?php
            $result = DataBaseOperations::getAllUsers();
            if($result -> num_rows > 0){
                while($row = $result -> fetch_assoc()){
                    echo "<tr>";
                    echo "<td>" .$row['id'] . "</td>";
                    echo "<td>" .$row['firstName'] . "</td>";
                    echo "<td>" .$row['lastName'] . "</td>";
                    echo "<td>" .$row['email'] . "</td>";
                    echo "<td>" .$row['password'] . "</td>";
                    if($row['role'] == Role::ADMIN)
                        echo "<td style='font-size: 200%'>" .$row['role'] . "</b></td>";
                    else
                        echo "<td>" .$row['role'] . "</td>";
                    echo "<td>" .$row['gender'] . "</td>";
                    echo "<td>" .$row['city'] . "</td>";
                    echo "<td><button class='update'><a href='php/update_user.php?updatedid=" . $row['id'] . "'>Update user</a></button></td>";
                    echo "<td><button class='delete'><a href='php/delete_user.php?deletedid=" . $row['id'] . "'>Delete user</a></button></td>";
                    echo "</tr>";
                }
            }
        ?>
    </table>
</main>

<footer>
    <p>Ownership: Dolha Raul</p>
    <p>Information contact: <a href="mailto:rauldolha2002@yahoo.com">rauldolha2002@yahoo.com</a></p>
</footer>


<!-- Include jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Include the Select2 JS file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

</body>
</html>