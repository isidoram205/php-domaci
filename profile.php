<?php

require "dbBroker.php";
require "model/user.php";

session_start();
if (!isset($_SESSION['usrid'])) {
    header('Location:home.php');
    exit();
}

$id = $_SESSION['usrid'];
$user = User::getUserById($id, $conn);
$row = $user->fetch_array();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="img/home.png" />
    <title>Moj profil</title>
    <script src="https://code.jquery.com/jquery-3.6.4.js"
            integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

</head>
<body class="container">

<div class="input-row">
    <label for="username">Username</label>
    <input name="username" type="text" value=<?php echo $row["username"]; ?> >
</div>

<div class="input-row">
    <label for="password">Password</label>
    <input name="password" type="text" value=<?php echo $row["password"]; ?>>
</div>

<div class="input-row">
    <label for="email">Email</label>
    <input name="email" type="text" value=<?php echo $row["email"]; ?>>
</div>

<div class="profile-form-button">
    <a class="button-styles" href="home.php"> ⇤ Početna strana</a>
    <button onclick="updateUser(<?php echo $row['id'] ?>) ">
        Sačuvaj promene
    </button>
</div>


<script src="js/script.js"></script>
</body>
</html>