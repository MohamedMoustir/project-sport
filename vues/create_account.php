
<?php
require_once '../vues/nav.php';
require_once '../database.php';

$matricule = isset($_POST['matricule']) && $_POST['matricule'] !== '' ? $_POST['matricule'] : NULL;
  $Specialite = isset($_POST['Specialite']) && $_POST['Specialite'] !== '' ? $_POST['Specialite'] : NULL;
  
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

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
            echo "sssssssssss";
            $upload_img = NULL; 
        }
    } else {
        echo "ssssssssss";
        $upload_img = NULL; 
    }
} else {
    echo "ssssssssssss";
    $upload_img = NULL; 
}


  $password_ha = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $sqlusers = $pdo->prepare("INSERT INTO users (full_name, pass_word, age, email, matricule, numeroTelephone, idSpecialite,img) VALUES (?, ?, ?, ?, ?,?,?,?)");

  $sqlusers->execute([$_POST['name'], $password_ha, $_POST['age'], $_POST['email'], $matricule, $_POST['number'], $Specialite,$upload_img]);



}


$Listusers = $pdo->query('SELECT * FROM specialite')->fetchAll(PDO::FETCH_OBJ);


?>




<div class="mb-[100px]">
      <div class="text-center  min-h-[160px] sm:p-6 p-4" style="backround-image:url('../imgs/original.jpg')">
        <h4 id ="Inscription" class="sm:text-3xl text-2xl font-bold text-white"> Inscription avocat</h4>
      </div>

      <div class="mx-4 mb-4 -mt-16">
        <form method="POST" class="max-w-4xl mx-auto bg-white shadow-[0_2px_13px_-6px_rgba(0,0,0,0.4)] sm:p-8 p-4 rounded-md" action="" enctype="multipart/form-data">
          <div class="grid md:grid-cols-2 gap-8">
            <button name="avocat" value="avocat" onclick="getvalue(this.value)" type="button"
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
        <button type="submit" class="hidden">Submit</button>
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
              <input name="email" type="text" class="bg-gray-100 focus:bg-transparent w-full text-sm text-gray-800 px-4 py-3 rounded-md outline-blue-500 transition-all" placeholder="Enter email" />
            </div>
            <div>
              <label class="text-gray-800 text-sm mb-2 block">password</label>
              <input name="password" type="password" class="bg-gray-100 focus:bg-transparent w-full text-sm text-gray-800 px-4 py-3 rounded-md outline-blue-500 transition-all" placeholder="Enter confirm password" />
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
<script src="../script/main.js" ></script>
<script>
  function getvalue(value){
    if (value == "utilisateur") {
        document.getElementById("matricule").style.display="none";
        document.getElementById("Mobile").style.display="none";
        document.getElementById("Inscription").textContent="Inscription utilisateur";
        document.getElementById("Special").style.display="none";
      
        document.getElementById("role").value = "user"; 
       

    }else{
        document.getElementById("matricule").style.display="block";
        document.getElementById("Mobile").style.display="block";
        document.getElementById("Inscription").textContent="Inscription avocat";
        document.getElementById("Special").style.display="block";
        document.getElementById("role").value = "admin"; 
    }
}
</script>
</body>
</html>
