<?php
include_once 'php/Role.php';
include_once 'php/pages_config.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/register.css">
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
        <li><a class="active" href="register.php">Register</a></li>
        <li><a href="about_owner.php">About owner</a></li>
        <?php
        if(!empty($_SESSION['user_email']) && $_SESSION['user_email'] === Role::ADMIN_EMAIL) {
            echo "<script>$('nav li').css('width', '20%')</script>";
            echo "<li style='width: 20%'><a href='users.php'>Users page</a></li>";
        }
        ?>
    </ul>
</nav>

<main>
    <div class="container">
        <h1>Register</h1>
        <form method="POST" name="register_form" action="/php/register_user.php">
            <label for="fname">Enter your first name: </label>
            <input type="text" id="fname"  name="fname" placeholder="Mihai"
            pattern="[a-zA-Z]+" required oninput="validate_fname()">
            <span>&#9989;</span>
            <br><br>
            <label for="lname">Enter your last name:</label>
            <input type="text" id="lname" name="lname" placeholder="Pop"
            pattern="[a-zA-Z]+" required oninput="validate_lname()">
            <span>&#9989;</span>
            <br><br>
            <label for="email">Enter email here, based on the pattern:</label>
            <input type="text" id="email" name="email"
                   placeholder="mihaipop@yahoo.com" pattern=".+@.+" required
                    oninput="validate_email()">
            <span>&#9989;</span>
            <br><br>
            <label for="passw">Enter password here(min 8 characters)</label>
            <input type="password" id="passw" name="passw" required minlength="8"
            oninput="validate_password()">
            <span>&#9989;</span>
            <br>
            <p style="display: inline-block">Choose gender:</p>
            <label for="male_gender">Male</label>
            <input type="radio" id="male_gender" name="gender" value="Male"
                onclick="validate_gender()">
            <label for="female_gender">Female</label>
            <input type="radio" id="female_gender" name="gender" value="Female"
                onclick="validate_gender()">
            <br>
            <label for="city">Choose City: </label>
            <select size="5" name="city" id="city" onchange="region_pick()">
                <option value="Bucuresti">Bucuresti</option>
                <option value="Washington">Washington</option>
                <option value="Beijing">Beijing</option>
                <option value="Rome">Rome</option>
                <option value="Praga">Praga</option>
                <option value="Chisinau">Chisinau</option>
                <option value="Varsovia">Varsovia</option>
                <option value="Londra">Londra</option>
                <option value="Copenhaga">Copenhaga</option>
                <option value="Berlin">Berlin</option>
            </select>
            <label>Country: </label>
            <input disabled value="Pick a city" name="country" id="country">
            <span>&#9989;</span>
            <br><br>
            <label for="cityFilter">Filter cities to pick here: </label>
            <input id="cityFilter" type="text" onkeyup="filter_cities()">
            <br><br>
            <input type="submit" value="Sign up"
                   style="margin-left: 45%; height: 25px" onclick="return validate_register()">
        </form>
    </div>
</main>

<footer>
    <p>Ownership: Dolha Raul</p>
    <p>Information contact: <a href="mailto:rauldolha2002@yahoo.com">rauldolha2002@yahoo.com</a></p>
</footer>


<!-- Include jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Include the Select2 JS file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

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
</body>
</html>