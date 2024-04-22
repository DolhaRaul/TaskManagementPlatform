<?php
include_once 'php/Role.php';
include_once 'php/pages_config.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="stylesheet" type="text/css" href="css/nav_links.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0;">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>ToDoList</title>
</head>

<body>
    <nav>
            <ul>
                <li><a class="active" href="home.php">Home</a></li>
                <li><a href="login.php">Login</a></li>
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

    <section id="first_sec">
        <h1 id="homeheader">
            This application is used to sort the daily tasks one has, during several days.
            One may have more tasks, other may have nothing planned to do. As the famous phrase says:
            <br>
            <br>
            <cite>
                <q>Go confidently in the direction of your dreams!</q>
            </cite>
        </h1>
    </section>

    <div id="main">
        <div id="MakeList">
            <h2 id="h2ListMarker">My To Do List</h2>
            <label for="taskAdder" id="forTaskAdder"> Add the task here</label>
            <input type="text" name="taskToAdd" id="taskAdder"  placeholder="Title...">
            <input type="button" onclick="add_task()" value="Add task">
        </div>
            <div id="currentList">
                <ul id = "taskList"  class="scrollable-list" >
                    <li>Go to the gym!</li>
                    <li>
                        <ul>
                            <li>Go play football</li>
                            <li>Score goals</li>
                            <li>Be MVP</li>
                        </ul>
                    </li>
                    <li>Meet Daniel</li>
                    <li>Go watch some tennis</li>
                    <li>Start eating healty</li>
                    <li>Learn PHP, hopefully</li>
                    <li>Start Solo Leveling</li>
                    <li>Put the manga away</li>
                    <li>Go to the gym again!</li>
                </ul>
            </div>
    </div>

    <footer>
        <p>Ownership: Dolha Raul</p>
        <p>Information contact: <a href="mailto:rauldolha2002@yahoo.com">rauldolha2002@yahoo.com</a></p>
        <button id="logoutBtn"><a href="php/destroy_session.php">Logout</a></button>
    </footer>
    <script src="javascript/tasks_handling.js"></script>
</body>
</html>