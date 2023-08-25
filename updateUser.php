<?php
require "dbBroker.php";
require "model/user.php";

if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['pass']) && isset($_POST['email'])) {

    $answer= User::updateUser($_POST['id'], $_POST['name'], $_POST['pass'], $_POST['email'],  $conn);

    if ($answer) {
        echo 'Success';
    } else {
        echo 'Failed';
    }

}