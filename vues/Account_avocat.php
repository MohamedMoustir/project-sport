
<?php
session_start();
require("../database.php");
require_once "../vues/Admin_Panel.php";
if (isset($_POST['logout'])) {
    session_unset(); 
    session_destroy(); 
    header("location:../vues/login.php");
    exit();
   }
$email = $_SESSION['email'];
$query = $pdo->prepare('SELECT * FROM users 
                        JOIN specialite ON users.idSpecialite = specialite.idSP  
                        WHERE email = :email');
$query->bindParam(':email', $email, PDO::PARAM_STR);  
$query->execute();

$Listusers = $query->fetchAll(PDO::FETCH_OBJ);


// edite

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $full_name = $_POST['full_name'] ?? null;
    $number = $_POST['number'] ?? null;
    $biography = $_POST['biography'] ?? null;
    $age = $_POST['age'] ?? null;
    $email =$_SESSION['email'];

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
    // header("location:../vues/Account_avocat.php");
} else {
    echo "info is not done";
}

}

    $Listsp = $pdo->query('SELECT * FROM specialite')->fetchAll(PDO::FETCH_OBJ);






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

<?php  foreach($Listusers as $list): ?>

    <body class="font-sans antialiased text-gray-900 leading-normal tracking-wider bg-cover"
    style="background-image:url('https://source.unsplash.com/1L71sPT5XKc');">



    <div class="max-w-4xl flex items-center h-auto lg:h-screen flex-wrap mx-auto my-32 lg:my-0">

<!-- Main Column -->
<div id="profile" class="w-full lg:w-3/5 rounded-lg lg:rounded-l-lg lg:rounded-r-none shadow-2xl bg-white opacity-90 mx-6 lg:mx-0">
    <div class="p-4 md:p-12 text-center lg:text-left">

        <!-- Profile Image for Mobile View -->
        <div class="block lg:hidden rounded-full shadow-xl mx-auto -mt-16 h-48 w-48 bg-cover bg-center"
            style="background-image: url('https://source.unsplash.com/MP0IUfwrn0A')"></div>

        <!-- Full Name -->
        <h1 class="text-3xl font-bold pt-8 lg:pt-0"><?= $list->full_name?></h1>

        <!-- Border Under Name -->
        <div class="mx-auto lg:mx-0 w-4/5 pt-3 border-b-2 border-green-500 opacity-25"></div>

        <!-- Label -->
        <p class="pt-4 text-base font-bold flex items-center justify-center lg:justify-start">
            <svg class="h-4 fill-current text-green-700 pr-4" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20">
                <path
                    d="M9 12H1v6a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-6h-8v2H9v-2zm0-1H0V5c0-1.1.9-2 2-2h4V2a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v1h4a2 2 0 0 1 2 2v6h-9V9H9v2zm3-8V2H8v1h4z" />
            </svg> <?= $list->label?>
        </p>

        <!-- Matricule and Phone -->
        <p class="pt-2 text-gray-600 text-xs lg:text-sm flex items-center justify-center lg:justify-start">
            <svg class="h-4 fill-current text-green-700 pr-4" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20">
                <path
                    d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm7.75-8a8.01 8.01 0 0 0 0-4h-3.82a28.81 28.81 0 0 1 0 4h3.82zm-.82 2h-3.22a14.44 14.44 0 0 1-.95 3.51A8.03 8.03 0 0 0 16.93 14zm-8.85-2h3.84a24.61 24.61 0 0 0 0-4H8.08a24.61 24.61 0 0 0 0 4zm.25 2c.41 2.4 1.13 4 1.67 4s1.26-1.6 1.67-4H8.33zm-6.08-2h3.82a28.81 28.81 0 0 1 0-4H2.25a8.01 8.01 0 0 0 0 4zm.82 2a8.03 8.03 0 0 0 4.17 3.51c-.42-.96-.74-2.16-.95-3.51H3.07zm13.86-8a8.03 8.03 0 0 0-4.17-3.51c.42.96.74 2.16.95 3.51h3.22zm-8.6 0h3.34c-.41-2.4-1.13-4-1.67-4S8.74 3.6 8.33 6zM3.07 6h3.22c.2-1.35.53-2.55.95-3.51A8.03 8.03 0 0 0 3.07 6z" />
            </svg> matricule - <?= $list->matricule?>° M,
        </p>

        <p class="pt-2 text-gray-600 text-xs lg:text-sm flex items-center justify-center lg:justify-start">
            <svg class="h-4 fill-current text-green-700 pr-4" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20">
                <path
                    d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm7.75-8a8.01 8.01 0 0 0 0-4h-3.82a28.81 28.81 0 0 1 0 4h3.82zm-.82 2h-3.22a14.44 14.44 0 0 1-.95 3.51A8.03 8.03 0 0 0 16.93 14zm-8.85-2h3.84a24.61 24.61 0 0 0 0-4H8.08a24.61 24.61 0 0 0 0 4zm.25 2c.41 2.4 1.13 4 1.67 4s1.26-1.6 1.67-4H8.33zm-6.08-2h3.82a28.81 28.81 0 0 1 0-4H2.25a8.01 8.01 0 0 0 0 4zm.82 2a8.03 8.03 0 0 0 4.17 3.51c-.42-.96-.74-2.16-.95-3.51H3.07zm13.86-8a8.03 8.03 0 0 0-4.17-3.51c.42.96.74 2.16.95 3.51h3.22zm-8.6 0h3.34c-.41-2.4-1.13-4-1.67-4S8.74 3.6 8.33 6zM3.07 6h3.22c.2-1.35.53-2.55.95-3.51A8.03 8.03 0 0 0 3.07 6z" />
            </svg> phone - <?= $list->numeroTelephone?>
        </p>

        <!-- Biography Section -->
        <p class="pt-8 text-sm"><?= $list->biography?></p>

        <!-- Edit Button -->
        <div onclick="showEditModal()" class="pt-12 pb-8">
            <button class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded-full transition duration-300">
                Edit
            </button>
        </div>

        <!-- Social Media Links -->
        <div class="mt-6 pb-16 lg:pb-0 w-4/5 lg:w-full mx-auto flex flex-wrap items-center justify-between">
            <!-- Facebook Link -->
            <a class="link" href="#" data-tippy-content="@facebook_handle">
                <svg class="h-6 fill-current text-gray-600 hover:text-green-700 transition-colors" role="img" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <title>Facebook</title>
                    <path d="M22.676 0H1.324C.593 0 0 .593 0 1.324v21.352C0 23.408.593 24 1.324 24h11.494v-9.294H9.689v-3.621h3.129V8.41c0-3.099 1.894-4.785 4.659-4.785 1.325 0 2.464.097 2.796.141v3.24h-1.921c-1.5 0-1.792.721-1.792 1.771v2.311h3.584l-.465 3.63H16.56V24h6.115c.733 0 1.325-.592 1.325-1.324V1.324C24 .593 23.408 0 22.676 0z" />
                </svg>
            </a>
            <!-- Add more social links here -->
        </div>
    </div>
</div>

</div>

  
		
    

</body>


<section>
  <div id="showEditModal" class="hidden scale-[0.9] bg-white fixed top-[20%] left-[50%] -translate-x-2/4 max-w-4xl mx-auto font-sans p-6 shadow-lg rounded-lg">
    <div class="text-center mb-10">
      <h4 class="text-gray-800 text-xl font-semibold mt-6">Edit Profile</h4>
    </div>

    <form method="POST" action="">
      <div class="grid sm:grid-cols-2 gap-8">
        <!-- Full Name Field -->
        <div>
          <label class="text-gray-800 text-sm mb-2 block">Full Name</label>
          <input value="<?= $list->full_name ?>" name="full_name" type="text" class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-3.5 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all" placeholder="Enter name" />
        </div>
    
        <!-- Mobile No. Field -->
        <div>
          <label class="text-gray-800 text-sm mb-2 block">Mobile No.</label>
          <input value="<?= $list->numeroTelephone ?>" name="numeroTelephone" type="number" class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-3.5 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all" placeholder="Enter mobile number" />
        </div>

        <!-- Image Field -->
        <div>
          <label class="text-gray-800 text-sm mb-2 block">Image</label>
          <input name="file" type="file" class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-3.5 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all" />
        </div>

        <!-- Biography Field -->
        <div>
          <label class="text-gray-800 text-sm mb-2 block">Biography</label>
          <textarea name="biography" class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-3.5 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all" placeholder="Enter biography"><?= $list->biography ?></textarea>
        </div>

        <!-- Age Field -->
        <div>
          <label class="text-gray-800 text-sm mb-2 block">Age</label>
          <input value="<?= $list->age ?>" name="age" type="number" class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-3.5 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all" placeholder="Enter age" />
        </div>
      </div>
      
      <!-- Submit Button -->
      <div class="mt-10">
        <button type="submit" class="py-3.5 px-7 text-sm font-semibold rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none transition-all duration-300">
          Update Profile
        </button>
      </div>
    </form>
  </div>
</section>


<?php endforeach; ?>
<script >

function showEditModal() {
    
    document.getElementById("showEditModal").classList.toggle("hidden");
    document.getElementById("Cover").style.filter ="blur(4px)";

}
</script>

</body>
</html>  