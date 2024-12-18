<?php
require "../module/listusers.php";

function listusersAction(){
    $listSpecialite =  Listusers();
    return $listSpecialite;
    require_once "../vues/Account_avocat.php";
}
function listspecialiteAction(){
    $Specialite = listspecialite();
    return  $Specialite;
    require_once "../vues/create_account.php";
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
        header('localhost:../vues/Account_avocat.php');
        exit();
    } else {
       
    } 
}
?>