
<?php
session_start();
require("../database.php");
  
if (isset($_SESSION['roles'])) {
  if ($_SESSION['roles'] == 0) {
      header('Location: ../vues/login.php');
      exit;
  }
 } 
 if (!isset($_SESSION['roles']) || $_SESSION['roles'] === null || $_SESSION['roles'] === '') {
  header('Location: ../vues/login.php');
  exit;
}

$email = $_SESSION['email'];
$query = $pdo->prepare('SELECT * FROM users JOIN resvations on users.id = resvations.idClient where users.email = :email');
$query->bindParam(':email', $email, PDO::PARAM_STR); 
$query->execute();
$Listusers = $query->fetchAll(PDO::FETCH_OBJ); 

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $query = $pdo->prepare("DELETE FROM resvations WHERE idResvations = :id");
  $query->bindParam(':id', $id, PDO::PARAM_INT);
  $query->execute();
  if ($query) {
    header("Location: ../vues/getreservation.php?id=" .$id);
    exit;
  }
}



require_once '../vues/nav.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<section class="dark:bg-dark bg-white py-[70px]">
   <div class="mx-auto px-4 sm:container">
      <div class="border-l-[5px] border-green-500 pl-5">
         <h2 class="text-dark mb-4 text-3xl font-bold dark:text-white">
            Liste des Réservations
         </h2>
         <p class="text-body-color dark:text-dark-6 text-base font-medium leading-relaxed mb-4">
            Voici la liste des réservations récentes. Vous pouvez voir les détails de chaque réservation ci-dessous.
         </p>

      </div>
   </div>
</section>


<!-- ====== Page Title Section End -->
<table class="min-w-full bg-white border-collapse border border-gray-200">
  <thead class="bg-gray-800 text-white">
    <tr>
      <th class="p-4 text-left text-sm font-medium">
        Name
      </th>
      <th class="p-4 text-left text-sm font-medium">
        Email
      </th>
      <th class="p-4 text-left text-sm font-medium">
        Date
      </th>
      <th class="p-4 text-left text-sm font-medium">
        idSpecialite
      </th>
      <th class="p-4 text-left text-sm font-medium">
        Actions
      </th>
    </tr>
  </thead>
  
  <tbody class="whitespace-nowrap">
    <?php foreach($Listusers as $list): ?>
      <tr class="even:bg-blue-50 hover:bg-gray-100">
        <td class="p-4 text-sm text-gray-700 border-b border-gray-200">
          <?= $list->full_name ?>
        </td>
        <td class="p-4 text-sm text-gray-700 border-b border-gray-200">
          <?= $list->email ?>
        </td>
        <td class="p-4 text-sm text-gray-700 border-b border-gray-200">
          <?= $list->DateReservation ?>
        </td>
        <td class="p-4 text-sm text-gray-700 border-b border-gray-200">
          efd
        </td>
        <td class="p-4 border-b border-gray-200">
          <div class="flex space-x-2">
            <!-- Delete Button -->
             <?php  if ($list->statuss): ?>
             <?php  if ($list->statuss == 'confirm'):
             $hidden = 'hidden'; ?>
                  
            
                  <div class="action-buttons">
                  <div class="action-buttons">
  <button id="response-btn" class="<?= $hidden ?>   btn flex items-center px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500" onclick="changeButton()">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
      <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m7-7H5" />
    </svg>
    N'a pas répondu
  </button>
</div>

            <button class="flex items-center space-x-2 px-4 py-2 bg-green-500 text-white text-lg font-medium rounded-lg shadow hover:bg-green-600 transition duration-300">
          <i class="fa-solid fa-check"></i>
          <span>Verify</span>
             </button>
            <?php  endif;?>
            <?php  if ($list->statuss == 'still'):
             $hidden = 'block'; 
             
             ?>
             
             <div class="action-buttons">
  <button id="response-btn" class=" <?= $hidden ?>  btn flex items-center px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500" onclick="changeButton()">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
      <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m7-7H5" />
    </svg>
    N'a pas répondu
  </button>
</div>

                 <?php  endif;?>  
                 <?php  if ($list->statuss == 'refuser'):
             $hidden = 'hidden'; 
             
             ?>
  <div class="action-buttons">
  <button id="response-btn" class="<?= $hidden ?>  btn flex items-center px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500" onclick="changeButton()">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
      <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m7-7H5" />
    </svg>
    N'a pas répondu
  </button>
</div>
            </button>
<button class="flex items-center  gap-2 px-4 py-2 text-white bg-gray-500 rounded hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
        <path d="M10 0a10 10 0 100 20A10 10 0 0010 0zm-1.5 5a1.5 1.5 0 013 0v5a1.5 1.5 0 01-3 0V5zm1.5 9.25a1.25 1.25 0 100-2.5 1.25 1.25 0 000 2.5z" />
    </svg>
    Reject
</button>

            <?php  endif;?>
            <?php  endif;?>


            
          </div>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<script>
  function confir() {
    
    document.getElementById('confirm').remove();
    }

</script>
</body>
</html>