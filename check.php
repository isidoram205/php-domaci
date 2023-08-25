<?php
require "dbBroker.php";
require "model/user.php";

if (isset($_POST['name'])) {
   
    $answer = User::getUserByName($_POST['name'], $conn);
    
    if ($answer->num_rows == 1) {
        echo 'Failed';
    } else {
        echo 'Success';
    }

}