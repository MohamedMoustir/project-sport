


<?php
require_once '../vues/nav.php';
require("../controlers/controlers.php");
$Specialite = listspecialite();
?>



<div class="mb-[100px]">
      <div class="text-center  min-h-[160px] sm:p-6 p-4" style="backround-image:url('../imgs/original.jpg')">
        <h4 id ="Inscription" class="sm:text-3xl text-2xl font-bold text-white"> Inscription avocat</h4>
      </div>

      <div class="mx-4 mb-4 -mt-16">
        <form method="POST" class="max-w-4xl mx-auto bg-white shadow-[0_2px_13px_-6px_rgba(0,0,0,0.4)] sm:p-8 p-4 rounded-md" action="action.php?action=insertClient">
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
              <select id="Special" name="Specialite"  class="bg-gray-100 focus:bg-transparent w-full text-sm text-gray-800 px-4 py-3 rounded-md outline-blue-500 transition-all">
              <option ></option>
                <?php  foreach($Specialite as $list): ?>
                <?php   echo "<option value=\"" . $list->idSP . "\">" . $list->label . "</option>"; ?>
                <?php  endforeach;?>

              </select>
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
      

       

    }else{
        document.getElementById("matricule").style.display="block";
        document.getElementById("Mobile").style.display="block";
        document.getElementById("Inscription").textContent="Inscription avocat";
        document.getElementById("Special").style.display="block";

    }
}
</script>
</body>
</html>
