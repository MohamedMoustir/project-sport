
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

if (isset($_GET['Edite'])) {
//   $name = $_SESSION["id"];
//   $idAvocat = $id = $_GET['id'];
//   $id = $_GET['Edite'];
//   $query = $pdo->prepare("UPDATE resvations SET
//    idClient = '$name',
//     DateReservation='$_POST['label']',
//     idAvocat ='$idAvocat',
// ");
//   $query->execute();
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
                  
            
            <button id="Delete" class="<?= $hidden ?> inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-md transition duration-200 ease-in-out">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
              </svg>
              
              <a href="../vues/getreservation.php?delete=<?= $list->idResvations ?>" onclick="reload()">Delete</a>
              
            </button>
            <!-- Confirm Button -->          
            <button id="confirm" class="<?= $hidden ?> inline-flex items-center px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white text-sm font-medium rounded-md transition duration-200 ease-in-out">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
              </svg>
              <a href="../vues/getreservation.php?confirm=<?= $list->idResvations ?>">confirm</a>
            </button>

            <button class="flex items-center space-x-2 px-4 py-2 bg-green-500 text-white text-lg font-medium rounded-lg shadow hover:bg-green-600 transition duration-300">
          <i class="fa-solid fa-check"></i>
          <span>Verify</span>
             </button>
            <?php  endif;?>
            <?php  if ($list->statuss == 'still'):
             $hidden = 'block'; 
             
             ?>
             
             <button id="Delete" class="<?= $hidden ?> inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-md transition duration-200 ease-in-out">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
              </svg>
              <a href="../vues/getreservation.php?delete=<?= $list->idResvations ?>" onclick="reload()">Delete</a>
              
            </button>
            <!-- Confirm Button -->          
            <button id="confirm" class="<?= $hidden ?> inline-flex items-center px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white text-sm font-medium rounded-md transition duration-200 ease-in-out">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
              </svg>
              <a href="../vues/getreservation.php?confirm=<?= $list->idResvations ?>">confirm</a>
            </button>

                 <?php  endif;?>  
                 <?php  if ($list->statuss == 'refuser'):
             $hidden = 'hidden'; 
             
             ?>
           <button id="Delete" class="<?= $hidden ?> inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-md transition duration-200 ease-in-out">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
              </svg>
              
              <a href="../vues/getreservation.php?delete=<?= $list->idResvations ?>" onclick="reload()">Delete</a>
              
            </button>
            <!-- Confirm Button -->          
            <button id="confirm" class="<?= $hidden ?> inline-flex items-center px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white text-sm font-medium rounded-md transition duration-200 ease-in-out">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
              </svg>
              <a href="../vues/getreservation.php?confirm=<?= $list->idResvations ?>">confirm</a>
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
    alert('ee')
    document.getElementById('confirm').remove();
    }
</script>
</body>
</html>