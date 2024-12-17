<?php 

function connection(){
$pdo = new PDO('mysql:dbname=avocatconnect;host=localhost','root','root');
return $pdo;
}


function Listusers(){
    $pdo = connection();
    $listSpecialite = $pdo->query('SELECT * FROM users')->fetchAll(PDO::FETCH_OBJ);
    return $listSpecialite;
    }

    
function InsertUsers(){
    $pdo = connection();
   $sqlusers = $pdo->prepare("INSERT INTO users(full_name,pass_word ,age, email, matricule, numeroTelephone) VALUES(?,?,?,?,?,?)");
    $password_ha = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $sqlusers->execute([$_POST['name'],$password_ha,$_POST['age'],$_POST['email'],$_POST['matricule'],$_POST['number']]);

    }
 

    function verifyUser($email, $password) {
        $pdo = connection();
    
        $stmt = $pdo->prepare("SELECT pass_word FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
    
        $user = $stmt->fetch(PDO::FETCH_OBJ);
    
        if ($user) {

            if (password_verify($password, $user->$pass_word)) {
                return true;
            } else {
            }
        } else {
        }
    }
     
?>