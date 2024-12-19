
<?php
session_start();
require("../database.php");
require_once '../vues/nav.php';
$email = $_SESSION['email'];
$query = $pdo->prepare('SELECT * FROM users JOIN resvations on users.id = resvations.idClient where users.email = :email');
$query->bindParam(':email', $email, PDO::PARAM_STR); 
$query->execute();
$Listusers = $query->fetchAll(PDO::FETCH_OBJ); 

if (isset($_GET['Edite'])) {

}
if (isset($_GET['delete'])) {
  echo "fcf";
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class=" overflow-x-auto my-[50px] mx-[50px]">
    <!-- ====== Page Title Section Start -->
<section class="dark:bg-dark bg-white py-[70px]">
   <div class="mx-auto px-4 sm:container">
      <div class="border-primary border-l-[5px] pl-5">
         <h2 class="text-dark mb-2 text-2xl font-semibold dark:text-white">
            States Statistics
         </h2>
         <p class="text-body-color dark:text-dark-6 text-sm font-medium">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras
            ultrices lectus sem.
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
            <button class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-md transition duration-200 ease-in-out">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
              </svg>
              <a href="../vues/getreservation.php?delete=<?= $list->id ?>">Delete</a>
            </button>

            <!-- Confirm Button -->
            <button class="inline-flex items-center px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white text-sm font-medium rounded-md transition duration-200 ease-in-out">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
              </svg>
              <a href="../vues/getreservation.php?Edite=<?= $list->id ?>">Edite</a>
              
            </button>
          </div>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

</body>
</html>