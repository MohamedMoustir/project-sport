
<?php
require("../database.php");
include "../vues/nav.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare('SELECT * FROM users JOIN specialite on users.idSpecialite = specialite.idSP WHERE users.id = :id');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);  

    if ($user) {
    } else {
        echo 'No user found for the given ID.';
    }
} else {
    die('ID is missing in the URL.');
}

  
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


  

  $sqlusers = $pdo->prepare("INSERT INTO resvations (idClient, DateReservation) VALUES (?, ?)");
$name = 241;
$stmt->bindParam(':date', $date, PDO::PARAM_STR);
  $sqlusers->execute([$name, $_POST['label']]);

if ($sqlusers) {
//  header("location:../vues/login.php");
}

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
     


<div class="flex flex-wrap text-slate-800">
  <div class="relative hidden h-screen select-none flex-col justify-center bg-slate-600 text-center md:flex md:w-1/3">
    <img class="mx-auto w-56 max-w-lg rounded-lg object-cover" src="<?php echo $user['img']; ?>" />
    <div class="mx-auto py-16 px-8 text-white">
      <p class="my-6 text-4xl font-bold leading-10">Prenez <span class="truncate border-b-8 border-yellow-400 font-bold text-yellow-400">rendez-vous maintenant</span></p>
      <p class="mb-4 text-lg font-medium">Pour obtenir les meilleurs conseils juridiques</p>
    </div>
  </div>
  
  <div class="flex w-full flex-col md:w-2/3">
    <div class="flex justify-center pt-12 md:justify-start md:pl-12">
      <a href="#" class="text-2xl font-bold text-gray-800 bg-yellow-400 px-2 py-1"><?php echo $user['full_name']; ?></a>
    </div>
    <div class="my-auto flex max-w-screen-md flex-col justify-center px-6 md:pl-12 pt-8 sm:pt-0 md:justify-start">
      <p class="text-center text-3xl font-bold md:text-left">Prenez rendez-vous avec un avocat</p>

      <form action="#" method="POST" class="flex flex-col items-stretch pt-3 pb-8 md:pt-8">
        <div class="grid gap-x-4 gap-y-3 sm:grid-cols-2">
          <label class="block" for="name">
            <p class="mb-1 mt-2 text-sm text-gray-600">Nom complet</p>
            <input value="" class="w-full rounded-md border bg-white py-2 px-2 outline-none ring-yellow-500 focus:ring-2" type="text" placeholder="Entrez votre nom complet" name="full_name" required />
          </label>
          
          <label class="block" for="email">
            <p class="mb-1 mt-2 text-sm text-gray-600">Adresse e-mail</p>
            <input value="" class="w-full rounded-md border bg-white py-2 px-2 outline-none ring-yellow-500 focus:ring-2" type="email" placeholder="Entrez votre e-mail" name="email" required />
          </label>
          
          <label class="block" for="phone">
            <p class="mb-1 mt-2 text-sm text-gray-600">Numéro de téléphone</p>
            <input value="" class="w-full rounded-md border bg-white py-2 px-2 outline-none ring-yellow-500 focus:ring-2" type="text" placeholder="Entrez votre numéro de téléphone" name="phone" required />
          </label>
          
          <label class="block" for="consultation-type">
            <p class="mb-1 mt-2 text-sm text-gray-600">Type de spécialité</p>
            <select  class="w-full rounded-md border bg-white py-2 px-2 outline-none ring-yellow-500 focus:ring-2" name="speciality" required>
              <option value="<?php echo $user['idSP']; ?>"><?php echo $user['label']; ?></option>
            </select>
          </label>
          <label class="block" for="appointment-date">
         <p class="mb-1 mt-2 text-sm text-gray-600">Date de rendez-vous</p>
      <input name="label" value="" class="w-full h-12 rounded-md border bg-white py-2 px-2 outline-none ring-yellow-500 focus:ring-2" type="date" name="appointment_date" required />
      </label>
          <label class="block sm:col-span-2" for="message">
            <p class="mb-1 mt-2 text-sm text-gray-600">Description du problème</p>
            <textarea class="h-32 w-full rounded-md border bg-white py-2 px-2 outline-none ring-yellow-500 focus:ring-2" placeholder="Décrivez votre problème ou demande" name="message" required></textarea>
          </label>
        </div>
   

        <div class="block">
          <label class="inline-block text-sm text-gray-500">En cliquant sur "Envoyer", vous acceptez les <a class="underline" href="#">termes et conditions</a></label>
        </div>
        
        <button type="submit" class="mt-6 rounded-full bg-yellow-400 px-4 py-2 text-center text-base font-semibold font-shadow-md outline-none ring-yellow-500 ring-offset-2 transition hover:bg-yellow-400 focus:ring-2 md:w-40">
          Envoyer
        </button>
      </form>
    </div>
  </div>
</div>

   


</body>
</html>