<?php
require "dbBroker.php";
require  "model/item.php";

if(isset($_POST['id'])){
    
    $status = Item::deleteItem($_POST['id'], $conn);
    if($status){
        echo 'Success';
    }else{
        echo 'Failed';
    }
}