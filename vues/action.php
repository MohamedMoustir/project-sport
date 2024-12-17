

<?php 
require_once("../controlers/controlers.php");

switch ($action = $_GET["action"]) {
    case 'insertClient':
        insertAction();
        break;
    case 'verify':
        
      verifyUserAction();
      header('localhost:../vues/Account_avocat.php');
        break;
            
    }
  

?>