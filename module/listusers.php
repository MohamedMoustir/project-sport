<?php 

function connection(){
$pdo = new PDO('mysql:dbname=avocatconnect;host=localhost','root','root');
return $pdo;
}

function customHashPassword($password) {
    return hash('sha256', $password);  // SHA-256 hashing
}



function Listusers(){
    $pdo = connection();
    $Listusers = $pdo->query('SELECT * FROM users')->fetchAll(PDO::FETCH_OBJ);
    return $Listusers;
    }

    function listspecialite(){
        $pdo = connection();
        $listSpecialite = $pdo->query('SELECT * FROM specialite')->fetchAll(PDO::FETCH_OBJ);
        return $listSpecialite;
        }
    
    

    function InsertUsers(){
    $pdo = connection();
    $matricule = isset($_POST['matricule']) && $_POST['matricule'] !== '' ? $_POST['matricule'] : NULL;
    $Specialite = isset($_POST['Specialite']) && $_POST['Specialite'] !== '' ? $_POST['Specialite'] : NULL;
   $sqlusers = $pdo->prepare("INSERT INTO users(full_name,pass_word ,age, email, matricule, numeroTelephone,idSpecialite) VALUES(?,?,?,?,?,?,?)");
    $password_ha = md5($_POST['password']);
    $sqlusers->execute([$_POST['name'],$password_ha,$_POST['age'],$_POST['email'],$matricule,$_POST['number'],$Specialite]);

    }
 
    function verifyUser($email, $password) {
        $pdo = connection();
     $hashedPassword = md5($password);
        $stmt = $pdo->prepare("SELECT pass_word FROM users WHERE email = :email AND pass_word = :password");
        $stmt->execute(['email' => $email, 'password' => $hashedPassword]);
        
    
        $user = $stmt->fetch(PDO::FETCH_OBJ);
    
        if ($user) {
           
            if ($hashedPassword === $user->pass_word) {
                return true; 
            } else {
                return false;
            }
        } else {
                return false;

        }
    }
    
    function editeProfile() {
        $pdo = connection();
    
        $sqlusers = $pdo->prepare("UPDATE users SET 
            full_name = :name, 
            age = :age, 
            email = :email, 
            img = :img, 
            matricule = :matricule, 
            biography = :biography, 
            numeroTelephone = :number, 
            pass_word = :password 
            WHERE id = :id"); 
    
        $sqlusers->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
        $sqlusers->bindParam(':age', $_POST['age'], PDO::PARAM_INT);
        $sqlusers->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
        $sqlusers->bindParam(':img', $_POST['img'], PDO::PARAM_STR);
        $sqlusers->bindParam(':matricule', $_POST['matricule'], PDO::PARAM_STR);
        $sqlusers->bindParam(':biography', $_POST['biography'], PDO::PARAM_STR);
        $sqlusers->bindParam(':number', $_POST['number'], PDO::PARAM_STR);
        $sqlusers->bindParam(':password', $_POST['password'], PDO::PARAM_STR);
        $sqlusers->bindParam(':id', $_GET['id'], PDO::PARAM_INT); 
    
       
        if ($sqlusers->execute()) {
            echo "تم تحديث الملف الشخصي بنجاح.";
        } else {
            echo "حدث خطأ أثناء التحديث.";
        }
    }
    
    function displayListAvocat(){
        $pdo = connection();
        $ListAvocat = $pdo->query('SELECT users.full_name, specialite.label FROM users JOIN specialite on users.idSpecialite = specialite.idSP ')->fetchAll(PDO::FETCH_OBJ);
        return $ListAvocat;
        }
    
?>