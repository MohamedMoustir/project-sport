<?php
session_start();
require("../database.php");

if (isset($_POST['logout'])) {
  session_unset();
  session_destroy();
  header("location:../vues/login.php");
  exit();
}

if (isset($_SESSION['roles'])) {
  if ($_SESSION['roles'] == 1) {
    header('Location: ../vues/login.php');
    exit;
  }
}


if (!isset($_SESSION['roles']) || $_SESSION['roles'] === null || $_SESSION['roles'] === '') {
  header('Location: ../vues/login.php');
  exit;
}
if (isset($_SESSION['email'])) {
  $email = $_SESSION['email'];
} else {

  exit;
}

$query = $pdo->prepare('SELECT * FROM users 
  JOIN specialite ON users.idSpecialite = specialite.idSP  
  WHERE email = :email');
$query->bindParam(':email', $email, PDO::PARAM_STR);
$query->execute();


$Listusers = $query->fetchAll(PDO::FETCH_OBJ);


if (!empty($Listusers)) {
  $user = $Listusers[0];
} else {
}

// edite

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $full_name = $_POST['full_name'] ?? null;
  $number = $_POST['numeroTelephone'] ?? null;
  $biography = $_POST['biography'] ?? null;
  $age = $_POST['age'] ?? null;
  $email = $_SESSION['email'];

  $edite = $pdo->prepare("UPDATE users 
    SET full_name = :full_name, 
        numeroTelephone = :numeroTelephone, 
        biography = :biography, 
        age = :age 
    WHERE email = :email");

  $edite->bindParam(':full_name', $full_name, PDO::PARAM_STR);
  $edite->bindParam(':numeroTelephone', $number, PDO::PARAM_INT);
  $edite->bindParam(':biography', $biography, PDO::PARAM_STR);
  $edite->bindParam(':age', $age, PDO::PARAM_INT);
  $edite->bindParam(':email', $email, PDO::PARAM_STR);

  if ($edite->execute()) {
    header("location:../vues/Account_avocat.php");
    exit();
  } else {
    echo "info is not done";
  }
}

$Listsp = $pdo->prepare('SELECT * FROM specialite where email =:email')->fetchAll(PDO::FETCH_OBJ);
// $listsp = execute();

require_once "../vues/Admin_Panel.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Document</title>
</head>

<body>

  <?php if ($Listusers): ?>

    <body class="font-sans antialiased text-gray-900 leading-normal tracking-wider bg-cover"
      style="background-image:url('https://source.unsplash.com/1L71sPT5XKc');">
      <div class=" max-w-full flex items-center h-auto lg:h-screen flex-wrap mx-auto my-32 lg:my-0">

        <div id="profile" class="w-full mx-auto bg-white shadow-xl rounded-lg overflow-hidden">
          <div class="flex items-center p-8">
            <div class="flex-shrink-0 w-48 h-48 rounded-full overflow-hidden">
              <img class="w-full h-full object-cover" src="<?= $user->img ?>" alt="Avatar">
            </div>
            <div class="ml-8">
              <h2 class="text-4xl font-bold text-gray-800"><?= $user->full_name ?></h2>
              <p class="text-xl text-gray-600 mt-2">Avocat spécialisé en <?= $user->label ?></p>
              <p class="text-lg text-gray-500 mt-4"><?= $user->biography ?></p>
              <div class="mt-4 flex space-x-6">
                <div class="flex items-center text-gray-600">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 11c2.14 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zM2 20c0-5 4.34-9 9-9s9 4 9 9" />
                  </svg>
                  <span class="ml-2 text-gray-500"><?= $user->numeroTelephone ?></span>
                </div>
                <div class="flex items-center text-gray-600">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2 12l5 5L20 7" />
                  </svg>
                  <span class="ml-2 text-gray-500"><?= $user->email ?></span>
                </div>
              </div>
              <div onclick="showEditModal()" class="mt-6">
                <a class=" text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg transition duration-200">
                  Edit Profile
                </a>
              </div>
            </div>
          </div>

          <div class="border-t border-gray-200">
            <div class="px-8 py-6">
              <h3 class="text-2xl font-bold text-gray-800">Informations personnelles</h3>
              <ul class="mt-4 text-gray-600">
                <li><strong>Âge:</strong> <?= $user->age ?></li>
                <li><strong>Email:</strong> <?= $user->email ?></li>
                <li><strong>Matricule:</strong> <?= $user->matricule ?></li>
                <li><strong>Numéro de téléphone:</strong> <?= $user->numeroTelephone ?></li>
                <li><strong>Rôle:</strong> Avocat</li>
                <li><strong>Spécialité:</strong> <?= $user->label ?></li>
              </ul>
            </div>

            <div class="px-8 py-6 bg-gray-50">
              <h3 class="text-2xl font-bold text-gray-800">Biographie</h3>
              <p class="mt-4 text-gray-600"><?= $user->biography ?></p>
            </div>



            <div class="px-8 py-6">
              <h3 class="text-2xl font-bold text-gray-800">Connectez-vous avec moi</h3>
              <div class="flex space-x-6 mt-4">
                <a href="https://www.linkedin.com" class="text-gray-500 hover:text-blue-500">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 2h16c1.104 0 2 .896 2 2v16c0 1.104-.896 2-2 2H4c-1.104 0-2-.896-2-2V4c0-1.104.896-2 2-2zm2 16V9h4v9H6zm2-10H6V5h2v1zM18 9h-4v9h4V9zm-2-1h2V5h-2v1z" />
                  </svg>
                </a>
                <a href="https://www.twitter.com" class="text-gray-500 hover:text-blue-500">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M23 3a10.978 10.978 0 0 1-3.143.864A5.509 5.509 0 0 0 22.459 1a10.85 10.85 0 0 1-3.475 1.32A5.462 5.462 0 0 0 16.6 0C14.07 0 12 2.07 12 4.6c0 .36.05.72.14 1.06C7.84 5.6 4.15 3.56 1.88 1.02a5.556 5.556 0 0 0-.72 2.82C3.5 6.28 5.64 7.84 8.29 8.15a5.474 5.474 0 0 1-2.46-.69c.15 2.85 2.88 5.2 5.85 5.27A5.524 5.524 0 0 1 7.5 15.14c.44 0 .87-.06 1.29-.17a5.495 5.495 0 0 0 5.07 3.8c-3.9 3.1-8.8 3.72-13.57 1.19a10.955 10.955 0 0 0 5.92 1.74c7.16 0 11.1-5.92 11.1-11.1 0-.17-.01-.34-.02-.51a7.92 7.92 0 0 0 2.39-2.02z" />
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>



      </div>







      <form id="update-user" action="" method="POST" class="hidden relative -top-[700px]">
        <h1 class="text-4xl font-sm text-gray-800">Edite Profil de l'Avocat</h1>

        <ul class="mt-4 text-gray-600 space-y-4">
          <li>
            <label for=" full_name" class="block text-sm font-medium text-gray-700">Nom complet</label>
            <input type="text" id="full_name" name="full_name" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg" value="<?= $user->full_name ?>" required>
          </li>
          <li>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg" value="<?= $user->email ?>" required>
          </li>
          <li>
            <label for="age" class="block text-sm font-medium text-gray-700">Âge</label>
            <input type="number" id="age" name="age" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg" value="<?= $user->age ?>" required>
          </li>
          <li>
            <label for="numeroTelephone" class="block text-sm font-medium text-gray-700">Numéro de téléphone</label>
            <input type="text" id="numeroTelephone" name="numeroTelephone" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg" value="<?= $user->numeroTelephone ?>" required>
          </li>
          <li>
            <label for="biography" class="block text-sm font-medium text-gray-700">Biographie</label>
            <textarea id="biography" name="biography" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg" required><?= $user->biography ?></textarea>
          </li>
        </ul>
        <div onclick="showEditModal()" class="mt-6">
          <button type="submit" class="px-6 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">Enregistrer les modifications</button>
        </div>
      </form>
      </div>
      </div>


      </div>



    <?php endif; ?>
    <script>
      function showEditModal() {

        document.getElementById("update-user").classList.toggle("hidden");
        document.getElementById("profile").classList.toggle("hidden");

        document.getElementById("Cover").style.filter = "blur(4px)";

      }
    </script>

    </body>

</html>