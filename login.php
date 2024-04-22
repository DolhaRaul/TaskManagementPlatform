<?php
include_once 'php/Role.php';
include_once 'php/pages_config.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/nav_links.css">
    <link rel="stylesheet" href="css/footer.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Login ToDoList</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <script src="javascript/login_register_validation.js"></script>
</head>

<body>
<nav>
    <ul>
        <li><a href="home.php">Home</a></li>
        <li><a class="active" href="login.php">Login</a></li>
        <li><a href="register.php">Register</a></li>
        <li><a href="about_owner.php">About owner</a></li>
        <?php
            if(!empty($_SESSION['user_email']) && $_SESSION['user_email'] === Role::ADMIN_EMAIL) {
                echo "<script>$('nav li').css('width', '20%')</script>";
                echo "<li style='width: 20%'><a href='users.php'>Users page</a></li>";
            }
        ?>
    </ul>
</nav>
<div id="container">
    <div id="loginDiv">
        <h1>Login</h1>
        <form name="login_form" method="POST" action="/php/login_user.php">
            <label for="email">Email </label>
            <input type="email" id="email" name="email" title="something@.com"
                   placeholder="xenya_god@com..." pattern=".+@.+"
                   style="margin-left: 25%" required oninput="validate_email()">
            <span>&#9989;</span>
            <br><br>
            <label for="passw">Password</label>
            <input type="password" id="passw" name="passw" required minlength="8"
                   title="At least 8 characters" style="margin-left: 21%"
                    oninput="validate_password()">
            <span>&#9989;</span>
            <p>The password should containt AT LEAST 8 characters</p>
            <input type="submit" id="loginButton" value="Sign In"
                   style="height: 35px; margin-left: 25%" onclick="validate_login()">
        </form>
        <h2>
            <q><i>One thing a disorganised person does in a certain
                amount of time is the time needed to do 100 things for an
                organised person</i></q>
        </h2>
    </div>
    <div id="imgContainer">
        <picture title="Click this image to go to the register section...">
            <a href="register.php"><img src="images/todofavico.png" alt="todo_img"></a>
        </picture>
        <table id="stats">
            <caption>Statistics about Users</caption>
            <tr>
                <th>Country</th>
                <th>Capital</th>
                <th>Number of Users</th>
            </tr>
            <tr>
                <td>Romania</td>
                <td>Bucuresti</td>
                <td>114</td>
            </tr>
            <tr>
                <td>United States</td>
                <td>Washington</td>
                <td>253</td>
            </tr>
            <tr>
                <td>China</td>
                <td>Beijing</td>
                <td>2343</td>
            </tr>
            <tr>
                <td>Italy</td>
                <td>Rome</td>
                <td>23</td>
            </tr>
            <tr>
                <td>Czech Republic</td>
                <td>Praga</td>
                <td>38</td>
            </tr>
            <tr>
                <td>Moldova</td>
                <td>Chisinau</td>
                <td>28</td>
            </tr>
            <tr>
                <td>Poland</td>
                <td>Varsovia</td>
                <td>167</td>
            </tr>
        </table>
<!--        <div id="registerSection">-->
<!--            <h3>Do not have an account yet? Create an account here!</h3>-->
<!--            <a href="register.php"><img src = "images/register_img.png" alt="Register buttom"></a>-->
<!--        </div>-->
    </div>

<script src="javascript/table_manipulation.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function (){
        sort_by_columns();
    })
</script>
<script>let checkWindowClosed = setInterval(function() {
            if (!window) {
                clearInterval(checkWindowClosed);
                // Make an AJAX call to a PHP script to destroy the session
                let xhr = new XMLHttpRequest();
                xhr.open('GET', 'php/destroy_session.php', true);
                xhr.send();
            }
        }, 1000); // Check every second
</script>
</div>
</body>
</html>