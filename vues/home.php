

<?php
session_start();
require_once '../vues/nav.php';
require("../database.php");

$ListAvocat = $pdo->query('SELECT * FROM users JOIN specialite on users.idSpecialite = specialite.idSP ')->fetchAll(PDO::FETCH_OBJ);
// $Listusers = $pdo->query('SELECT * FROM specialite')->fetchAll(PDO::FETCH_OBJ);

?>


<section>
    
  <div class="grid grid-clos-2 lg:grid-clos-3 items-center justify-center h-screen my-[100px] lg:my-[0]">
  <div class="flex flex-col lg:flex-row items-center justify-between mx-auto px-5 lg:px-[100px] h-auto lg:h-[800px]">
    <div class="w-full mb-10 lg:mb-0">
      <i class="icofont-law text-[#CA965C] font-bold">⚖️ AVOCAT MAROC</i>
      <h1 class="w-full text-[1.5rem] lg:text-[2rem] font-[300]">trouver ce qui vous convient</h1>
      <h1 class="text-[2rem] lg:text-[3rem] font-[800] w-full">autour de vous !</h1>
      <img src="../imgs/Vector-Smart-Object1.png" class="w-[50%] lg:w-[40%] relative left-[25%] lg:left-[35%] -top-[10px] lg:-top-[18px]" alt="">
      <img src="../imgs/Vector-Smart-Object2.png" class="w-[30%] lg:w-[18%] relative left-[55%] lg:left-[65%] -top-[20px] lg:-top-[23px]" alt="">

      <div class="border w-full lg:w-[150%] flex items-center  lg:bg-white rounded-full mt-5 -top-[50px]  px-[10px] h-[70px] relative z-10 grid grid-cols-1 lg:grid-cols-3 ">
        <form action="" class="w-full flex flex-col lg:flex-row items-center gap-3">
          <select name="" id="" class="border   h-12  px-[50%] pl-11 rounded-full  border-[#d0e0f7]   cursor-pointer">
            <option value="avocat maroc" class="text-white">avocat maroc</option>
          </select>
          <select name="" id="" class="  border  h-12 font-medium text-sm  px-[50%] pl-11 rounded-full  border-[#d0e0f7]  cursor-pointer">
            <option value="avocat maroc">avocat maroc</option>
            
          </select>
          <span class="w-full lg:w-auto">
            <input type="submit" value="CHERCHER" class="bg-[#ca965c] rounded-full text-white h-[48px] w-full lg:w-[150px]">
            <i class="fas fa-search text-white absolute z-10 top-[50%] lg:top-[36%] right-[10%]  lg:right-[6%]" aria-hidden="true"></i>
          </span>
        </form>
      </div>
      
    </div>
    <div class="w-full lg:w-auto">
      <img src="../imgs/avocat-annuaire-banner-pic.png" class="w-full lg:w-[1301px]" alt="">
    </div>
  </div>
</div>
</section>


<section>


<div class="p-4 my-[280px]" id="reserv" >
      <div class="max-w-6xl max-lg:max-w-3xl max-sm:max-w-sm mx-auto">
        <div class="max-w-md mx-auto text-center">
        <i class="icofont-law text-[#CA965C] font-bold ">⚖️ AVOCAT MAROC</i>
          <h2 class="text-3xl font-extrabold text-gray-800 mb-12 text-center leading-10">Dans toutes les spécialités</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-sm:gap-8">
          
        <?php foreach($ListAvocat as $list) :
          if ($list->roles == 1) {

         
          ?>
          <div class="bg-white rounded overflow-hidden">
            <img src="<?= $list->img?>" alt="Blog Post 1" class="w-full h-52 object-cover" />
            <div class="p-6">
              <h3 class="text-lg font-bold text-[#CA965C] mb-3"><?= $list->full_name?></h3>
              <p class="text-gray-500 text-sm"><?= $list->label?></p>
              <p class="text-gray-800 text-[13px] font-semibold mt-4">Disponible</p>
              <a onclick='showEditModal()'  href="../vues/home_reservation.php?id=<?= $list->id?>" class="mt-4 inline-block px-4 py-2 rounded tracking-wider bg-purple-600 hover:bg-purple-700 text-white text-[13px]">Reserv</a>
            </div>
          </div>
          <?php   } endforeach; ?>
          
    </div>
<div>
</section>
<section>
<div id='reservation_form'  class="hidden fixed top-0  left-[50%] -translate-x-2/4  z-500 max-w-md mx-auto mt-10 bg-white shadow-lg rounded-lg overflow-hidden">
    <div class="text-2xl py-4 px-6 bg-gray-900 text-white text-center font-bold uppercase">
         Appointment
    </div>
    <form class="py-4 px-6" action="" method="POST">
        
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="email">
                Email
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="email" type="email" placeholder="Enter your email">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="date">
                Date
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="date" type="date" placeholder="Select a date">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="time">
                Time
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="time" type="time" placeholder="Select a time">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="service">
                Service
            </label>
            <select
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="service" name="service">
                <option value="">Select a service</option>
                <?php foreach($Listusers as $list): ?>
             <option value="<?= $list->idSP ?>"><?= $list->label ?></option>
        <?php endforeach; ?>
                
            </select>
        </div>
        
        <div class="flex items-center justify-center mb-4">
            <button 
                class="bg-gray-900 text-white py-2 px-4 rounded hover:bg-gray-800 focus:outline-none focus:shadow-outline"
                type="submit">
                Appointment
            </button>
        </div>

    </form>

</div>

</div>
</section>
<div>
<?php
require '../vues/footer.php';
    ?>
</div>
</html>
</body>

<script>

  function showEditModal() {
    
    document.getElementById("reservation_form").classList.toggle("hidden");
   
   
}


</script>