<?php
require "dbBroker.php";
require "model/item.php";

if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['purpose']) && isset($_POST['date'])){
    
    $answer = Item::createItem($_POST['id'], $_POST['name'], $_POST['purpose'], $_POST['date'], $conn);
    if($answer){
        echo 'Success';
    }else{
        echo 'Failed';
    }

}