<?php
require "../module/listusers.php";

function listusersAction(){
    $listSpecialite =  Listusers();
    return $listSpecialite;
    require_once "../vues/Account_avocat.php";
}

function insertAction(){
    
    $inserted = InsertUsers();
   
    if ($inserted) {
        header('location:../vues/Account_avocat.php');
    } else {
       
    }
    
}

function verifyUserAction($email, $password){
   
    $inserte = verifyUser($email, $password);
   
    if ($inserte) {
        header('location:../vues/Account_avocat.php');
    } else {
       
    } 
}
?>