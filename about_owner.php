<?php
include_once 'php/Role.php';
include_once 'php/pages_config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/nav_links.css">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0;">
    <title>About</title>
</head>

<body>
<nav>
    <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Register</a></li>
        <li><a class="active" href="about_owner.php">About owner</a></li>
        <?php
        if(!empty($_SESSION['user_email']) && $_SESSION['user_email'] === Role::ADMIN_EMAIL) {
            echo "<script>$('nav li').css('width', '20%')</script>";
            echo "<li style='width: 20%'><a href='users.php'>Users page</a></li>";
        }
        ?>
    </ul>
</nav>

<section>
    <div id="profileSection">
        <h2 style="display: inline-block">Choose my profile picture</h2>
        <ul id="imgProfilePick">
            <li><i class="material-icons">cloud</i></li>
            <li><i class="material-icons">favorite</i></li>
            <li><i class="material-icons">attachment</i></li>
            <li><i class="material-icons">computer</i></li>
            <li><i class="material-icons">traffic</i></li>
        </ul>
        <button onclick="limit_profile_pictures()">Toggle View more profile pictures</button>
        <h2>My Profile Image</h2>
        <div class="material-icons" id="imageContainer">ceva</div>
    </div>
</section>

<main>
    <div id="mainContent">
        <div class="aboutUs">
            <h1 id="contentSpecifier">About owner</h1>
        </div>
        <div class="aboutUs">
            <p style="display: inline-block">Pick search type here(default is case insensitive): </p>
            <input class="searchStyle" id="searchSensitive" type="radio"
                   value="case_sensitive" name="searchType">
            <label for="searchSensitive">Case Sensitive</label>
            <input class="searchStyle" id="searchInsensitive" type="radio" value="case_insensitive"
                   name="searchType">
            <label for="searchInsensitive">Case Insensitive</label>
            <br>
            <label for="textToFind">Enter text to search here</label> <br>
            <input id="textToFind" type="text" onkeyup="text_search()" placeholder="Text to find...">
            <table id="contentAboutOwner">
                <tr>
                    <th>FirstName</th>
                    <td>Raul</td>
                    <td>Lucian</td>
                </tr>
                <tr>
                    <th>LastName</th>
                    <td colspan="2">Dolha</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>rauldolha2002@yahoo.com</td>
                    <td>sDarkness@gmail.com</td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td colspan="2">Male</td>
                </tr>
                <tr>
                    <th>Date of birth</th>
                    <td colspan="2">2002-11-27</td>
                </tr>
                <tr>
                    <th>Studies</th>
                    <td style="text-align: center"> Pre University level
                        <table style="border: 3px solid black">
                            <tr>
                                <td>Scoala Gimnaziala <q><em>Stefan cel Mare</em></q></td>
                            </tr>
                            <tr>
                                <td>Liceul National <q><em>Liviu Rebreanu</em></q></td>
                            </tr>
                        </table>
                    </td>
                    <td style="text-align: center"> University level
                        <table style="border: 3px solid black">
                            <tbody>
                            <tr>
                                <td>
                                    University <q><i>Babes-Bolyai, Faculty of Mathematics and Informatics</i></q>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                    </td>
                </tr>
            </table>

        </div>
    </div>
</main>

<footer>
    <p>Ownership: Dolha Raul</p>
    <p>Information contact: <a href="mailto:rauldolha2002@yahoo.com">rauldolha2002@yahoo.com</a></p>
    <button id="logoutBtn"><a href="php/destroy_session.php">Logout</a></button>
</footer>

<script src="javascript/profile_image_picker.js"></script>
<script src="javascript/table_manipulation.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function (){
        limit_profile_pictures();
    });
    document.addEventListener("DOMContentLoaded", function (){
        profile_picture_choose();
    })
</script>

</body>
</html>