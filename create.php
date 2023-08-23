<?php

require "dbBroker.php";
require "model/user.php";

if (isset($_POST['submit'])) {
    $usremail = $_POST['usremail'];
    $usrpass = $_POST['usrpass'];
    $usrname = $_POST['usrname'];

    $answer = User::getUserByName($usrname, $conn);
    if ($answer->num_rows == 1) {
        echo 'Neuspešno. Ovo ime već postoji!';
    } else {
        $result = User::createUser($usremail, $usrname, $usrpass, $conn);
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
    <link rel="icon" href="img/home.png"/>
    <title>Napravi nalog</title>
</head>
<body class="container">

<form method="POST" action="#">

    <div class="input-row">
        <label for="email">E-mail adresa</label>
        <input type="text" name="usremail" required>
    </div>

    <div class="input-row">
        <label for="name">Korisničko ime</label>
        <input type="text" name="usrname" required>
    </div>

    <div class="input-row">
        <label for="password">Lozinka</label>
        <input type="password" name="usrpass" required>
    </div>

    <button type="submit" name="submit">Kreiraj nalog</button>

</form>

</body>
</html>