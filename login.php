<?php

require "dbBroker.php";
require "model/user.php";

session_start();
if (isset($_POST['usrname']) && isset($_POST['usrpass'])) {
    $usrname = $_POST['usrname'];
    $usrpass = $_POST['usrpass'];

    $answer = User::logIn($usrname, $usrpass, $conn);

    if ($answer->num_rows == 1) {
        $loginuser = mysqli_fetch_assoc($answer);
        $_SESSION['user_id'] = $loginuser['id'];
        header('Location: home.php');
        exit();
    } else {
        echo 'Neuspešno logovanje!';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="img/home.png" />
    <title>Prijavi se</title>
</head>
<body class="container">
<form method="POST" action="#" class="login-form">
    <div class="input-row">
        <label>Korisničko ime</label>
        <input type="text" name="usrname" required>
    </div>

    <div class="input-row">
        <label for="password">Lozinka</label>
        <input type="password" name="usrpass" required>
    </div>

    <div class="input-row">
        <button type="submit">Prijavi se</button>
    </div>
</form>
</body>
</html>