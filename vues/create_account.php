
<?php

require_once '../database.php';
$matricule = isset($_POST['matricule']) && $_POST['matricule'] !== '' ? $_POST['matricule'] : NULL;
  $Specialite = isset($_POST['Specialite']) && $_POST['Specialite'] !== '' ? $_POST['Specialite'] : NULL;
  
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (empty($_POST['name']) ||empty($_POST['Specialite'])||empty($_POST['age'])||empty($_POST['email'])||empty($_POST['password'])||empty($_POST['number'])||empty($_POST['matricule'])) {
//  header("location:../vues\create_account.php");
  } else {
  if (empty($_FILES['avatar']['name'])) {
    $errors['avatar'] = 'Avatar image is required';
  } else {
    $avatar = $_FILES['avatar']['name'];
  }
  if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      echo "   .";
      return;
  }
  if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {

    $permited = array('jpg', 'png', 'jpeg', 'gif');
    $file_name = $_FILES['avatar']['name'];
    $file_size = $_FILES['avatar']['size'];
    $file_temp = $_FILES['avatar']['tmp_name'];


    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));

    if (in_array($file_ext, $permited)) {
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $upload_img = "upload/" . $unique_image;
    
        if (move_uploaded_file($file_temp, $upload_img)) {
           
        } else {
          
            $upload_img = NULL; 
        }
    }
  }

  $password_ha = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $sqlusers = $pdo->prepare("INSERT INTO users (full_name, pass_word, age, email, matricule, numeroTelephone, idSpecialite,img,roles) VALUES (?, ?, ?, ?, ?,?,?,?,?)");
  $sqlusers->execute([$_POST['name'], $password_ha, $_POST['age'], $_POST['email'], $matricule, $_POST['number'], $Specialite,$upload_img,$_POST['roles']]);

if ($sqlusers) {
 header("location:../vues/login.php");
}
}
}

$Listusers = $pdo->query('SELECT * FROM specialite')->fetchAll(PDO::FETCH_OBJ);

require_once '../vues/nav.php';
require_once '../vues/alert.php';
?>






<div id="alert-2" class="hidden items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 fixed top-4 right-4 z-50" role="alert">
  <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
  </svg>
  <span class="sr-only">Error</span>
  <div class="ms-3 text-sm font-medium" id="error"></div>
  <button onclick='hideAlert()' type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
    <span class="sr-only">Close</span>
    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
    </svg>
  </button>
</div>

   

<div class="mb-[100px]">
      <div class="text-center  min-h-[160px] sm:p-6 p-4" style="backround-image:url('../imgs/original.jpg')">
        <h4 id ="Inscription" class="sm:text-3xl text-2xl font-bold text-white"> Inscription avocat</h4>
      </div>

      <div class="mx-4 mb-4 -mt-16">
        <form method="POST" class="max-w-4xl mx-auto bg-white shadow-[0_2px_13px_-6px_rgba(0,0,0,0.4)] sm:p-8 p-4 rounded-md"  enctype="multipart/form-data">
          <div class="grid md:grid-cols-2 gap-8">
        
            <button  name="avocat" value="avocat" onclick="getvalue(this.value)" type="button"
              class="w-full px-6 py-3 flex items-center justify-center rounded-md text-gray-800 text-sm tracking-wider font-semibold border-none outline-none bg-gray-100 hover:bg-gray-200">
              <i class="fas fa-user-tie role-icon"></i>
              Vous êtes un avocat
            </button>
            <button name="utilisateur" value="utilisateur" onclick="getvalue(this.value)"  type="button"
              class="w-full px-6 py-3 flex items-center justify-center rounded-md text-white text-sm tracking-wider font-semibold border-none outline-none bg-black hover:bg-[#333]">
            <i class="fas fa-user-circle role-icon p-2"></i>
              Vous êtes un utilisateur
            </button>
     
            <input type="hidden" name="selected_role" id="selected_role">
        <!-- <button type="submit" class="hidden">Submit</button> -->
          </div>

          <div
            class="my-8 flex items-center before:mt-0.5 before:flex-1 before:border-t before:border-neutral-300 after:mt-0.5 after:flex-1 after:border-t after:border-neutral-300">
            <p
              class="mx-4 text-center">
              Or
            </p>
          </div>

          <div class="grid md:grid-cols-2 gap-8">
            <div>
              
              <label class="text-gray-800 text-sm mb-2 block">full name</label>
              <input name="name" type="text" class="bg-gray-100 focus:bg-transparent w-full text-sm text-gray-800 px-4 py-3 rounded-md outline-blue-500 transition-all" placeholder="Enter name" />
            </div>
            <div>
              <label class="text-gray-800 text-sm mb-2 block">age</label>
              <input name="age" type="number" class="bg-gray-100 focus:bg-transparent w-full text-sm text-gray-800 px-4 py-3 rounded-md outline-blue-500 transition-all" placeholder="Enter last name" />
            </div>
            <div>
              <label class="text-gray-800 text-sm mb-2 block">Email </label>
              <input  name="email" type="text" class="bg-gray-100 focus:bg-transparent w-full text-sm text-gray-800 px-4 py-3 rounded-md outline-blue-500 transition-all" placeholder="Enter email" />
            </div>
            <div>
              <label class="text-gray-800 text-sm mb-2 block">password</label>
              <input  name="password" type="password" class="bg-gray-100 focus:bg-transparent w-full text-sm text-gray-800 px-4 py-3 rounded-md outline-blue-500 transition-all" placeholder="Enter confirm password" />
            </div>
            <div id="Mobile">
              <label  class="text-gray-800 text-sm mb-2 block">Mobile No.</label>
              <input  name="number" type="text" class="bg-gray-100 focus:bg-transparent w-full text-sm text-gray-800 px-4 py-3 rounded-md outline-blue-500 transition-all" placeholder="Enter mobile number" />
            </div>
            <div id ="matricule">
              <label class="text-gray-800 text-sm mb-2 block">matricule</label>
              <input value="" name="matricule" type="number" class="bg-gray-100 focus:bg-transparent w-full text-sm text-gray-800 px-4 py-3 rounded-md outline-blue-500 transition-all" placeholder="Enter password" />
            </div>
            <div >
            <label class="text-gray-800 text-sm mb-2 block">Specialite</label>
              <select id="Special" name="Specialite"  class="bg-gray-100 focus:bg-transparent w-full text-sm text-gray-800 px-4 py-3 rounded-md outline-blue-500 transition-all">
              <option></option>
              <?php foreach($Listusers as $list): ?>
             <option value="<?= $list->idSP ?>"><?= $list->label ?></option>
        <?php endforeach; ?>
         
              </select>
            </div>
            
            <div id ="avatar">
              <label for="avatar" class="text-gray-800 text-sm mb-2 block">imag</label>
              <input  name="avatar" type="file" class="bg-gray-100 focus:bg-transparent w-full text-sm text-gray-800 px-4 py-3 rounded-md outline-blue-500 transition-all" placeholder="Enter password" />
            </div>
          </div>
          <div >
              <label class=" hidden text-gray-800 text-sm mb-2 block"></label>
              <input id="pass" value="1" name="roles" type="text" class=" hidden bg-gray-100 focus:bg-transparent w-full text-sm text-gray-800 px-4 py-3 rounded-md outline-blue-500 transition-all" placeholder="Enter " />
            </div>

          <div class="mt-8">
    
            <button type="submit" class="py-3 px-6 text-sm tracking-wider font-semibold rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none">
            ENVOYER 
            </button>
          </div>
        </form>
      </div>
    </div>
        <?php
include '../vues/footer.php';
?>
</html>
</body>

<script src="../main.js" ></script>
<script>
 


</script>
</body>
</html>
