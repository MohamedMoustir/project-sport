
<?php
session_start();
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
//  echo '<script>
//  let events = JSON.parse(localStorage.getItem("events")) || [];
//  events.forEach(date => {
//  date.date;
//  })
//  console.log(date)
//   </script>';

$sqlusers = $pdo->prepare("INSERT INTO resvations (idClient, DateReservation,idAvocat) VALUES (?, ?,?)");
$name = $_SESSION["id"];
$idAvocat = $id = $_GET['id'];
$stmt->bindParam(':date', $date, PDO::PARAM_STR);
$sqlusers->execute([$name, $_POST['label'],$idAvocat]);

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
     


<section class="dark:bg-dark  py-[70px]">
   <div class="mx-auto px-4 sm:container">
      <div class="border-l-[5px] border-green-500 pl-5">
         <h2 class="text-dark mb-4 text-4xl font-extrabold dark:text-white bg-gradient-to-r from-green-400 to-blue-500 text-transparent bg-clip-text ">
            Bienvenue à l'Agenda de Travail!
         </h2>
         <p class="text-body-color dark:text-dark-6 text-base font-medium leading-relaxed">
            Voici le planning de nos tâches quotidiennes. Vous pouvez suivre les tâches, réunions et rendez-vous importants dans cet agenda.
         </p>
         
         <!-- Nouveau formulaire pour choisir l'heure -->
         
      </div>
   </div>
</section>


<div class="flex items-center justify-center h-screen">
    <div class="lg:w-8/12 md:w-10/12 sm:w-11/12 mx-auto p-6">
        <div class="bg-white shadow-xl rounded-lg overflow-hidden">
            <div class="flex items-center justify-between px-10 py-6 bg-gray-800">
                <button id="prevMonth" class="text-white text-xl font-semibold hover:text-gray-400 transition duration-300">Previous</button>
                <h2 id="currentMonth" class="text-white text-2xl font-bold">December 2024</h2>
                <button id="nextMonth" class="text-white text-xl font-semibold hover:text-gray-400 transition duration-300">Next</button>
            </div>
            <div class="grid grid-cols-7 gap-6 p-6" id="calendar">
                <!-- Calendar content will be injected here -->
            </div>
            <div id="myModal" class="modal hidden fixed inset-0 flex items-center justify-center z-50">
                <div class="modal-overlay absolute inset-0 bg-black opacity-50"></div>
                <div class="modal-container bg-white w-full md:max-w-lg mx-auto rounded-lg shadow-2xl z-50 overflow-y-auto">
                    <form class="modal-content py-8 text-left px-10" method="POST" action="">
                        <div class="flex justify-between items-center pb-4">
                            <p class="text-3xl font-bold">Add Event</p>
                            <button id="closeModal" class="modal-close px-4 py-2 rounded-full bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring">✕</button>
                        </div>
                        <div class="mb-6">
                            <select id="eventTitle" class="w-full rounded-md border bg-white py-3 px-4 outline-none ring-yellow-500 focus:ring-2 text-lg" name="speciality" required>
                            <option value="<?= $user['label'] ?>"><?= $user['label'] ?></option> 
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="eventDate" class="block text-sm font-bold text-gray-700">Event Date</label>
                            <input name="label" type="date" id="eventDate" class="w-full mt-3 px-5 py-3 border rounded focus:outline-none focus:ring text-lg">
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" id="saveEvent" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring text-lg">Save Event</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
     let events = JSON.parse(localStorage.getItem('events')) || [];

function openModal(date) {
    document.getElementById('eventDate').value = date || '';
    document.getElementById('eventTitle').value = '';
    document.getElementById('myModal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('myModal').classList.add('hidden');
}

document.getElementById('saveEvent').addEventListener('click', () => {
    const title = document.getElementById('eventTitle').value;
    const date = document.getElementById('eventDate').value;

    if (title && date) {
        events.push({ title, date });
        localStorage.setItem('events', JSON.stringify(events));
        
        closeModal();
        renderCalendar(); 
    } else {
        alert('Please fill in all fields!');
    }
});

document.getElementById('closeModal').addEventListener('click', closeModal);

function renderCalendar() {
    const calendar = document.getElementById('calendar');
    calendar.innerHTML = '';

    const daysInMonth = new Date(2024, 12, 0).getDate(); 

    for (let day = 1; day <= daysInMonth; day++) {
        const dateString = `2024-12-${String(day).padStart(2, '0')}`;
        const dayEl = document.createElement('div');
        dayEl.className = 'border p-2 text-center cursor-pointer';
        dayEl.textContent = day;

        if (events.some(event => event.date === dateString)) {
            dayEl.classList.add('bg-red-500', 'text-white','pointer-events-none');
        }

        dayEl.addEventListener('click', () => openModal(dateString));
        calendar.appendChild(dayEl);
    }
}

renderCalendar();

    </script>
</body>
</html>