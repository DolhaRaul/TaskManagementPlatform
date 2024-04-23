<?php
//include_once 'pages_config.php';
include_once 'DataBaseOperations.php';
include_once 'User.php';

if( isset($_POST['update']) ) {
    $id = $_POST['updatedid'];
    $firstName = $_POST['fname'];
    $lastname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['passw'];
    $role = User::getRole($email);
    $gender = $_POST['gender'];
    $city = $_POST['city'];

    $status = DataBaseOperations::updateUser($id, $firstName, $lastname, $email, $password,
                                            $role, $gender, $city);
    if($status){
        echo "<script>alert('Modificarea datelor utilizatorului s-a facut cu succes!')</script>";
        header("Location:../users.php");
    }
    else
        echo "<script>alert('Modificarea datelor utilizatorului nu s-a' +
                ' facut corespunzator criteriilor!')</script>";
}
echo "<script>alert('Informatiile utilizatorului NU SE VOR automcompleta!')</script>"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/register.css">
    <link rel="stylesheet" href="../css/nav_links.css">
    <link rel="stylesheet" href="../css/footer.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <script src="javascript/login_register_validation.js"></script>
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Register ToDoList</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
</head>

<body>


<main>
    <div class="container">
        <h1>Update</h1>
        <form method="POST" name="update_form" action="update_user.php">
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
            <br><br>
            <br><br>
            <input type="submit" value="Update" name="update"
                   style="margin-left: 45%; height: 25px" ">
            <input type="hidden" name="updatedid" value="<?php echo $_GET['updatedid']; ?>">
        </form>
    </div>
</main>
