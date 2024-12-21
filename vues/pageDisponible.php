

<?php
session_start();
require("../database.php");
require_once "../vues/Admin_Panel.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['date']) && isset($_POST['title'])) {
    $userEmail = isset($_SESSION['email']) ? $_SESSION['email'] : null;

    $sqlusers = $pdo->prepare("INSERT INTO disponibilty (datadebut, title, user_email) VALUES (?, ?, ?)");
    $sqlusers->execute([$_POST['date'], $_POST['title'], $userEmail]);
    
}



    
?>
<section class="dark:bg-dark bg-white py-[70px]">
   <div class="mx-auto px-4 sm:container">
      <div class="border-l-[5px] border-green-500 pl-5">
         <h2 class="text-dark mb-4 text-3xl font-bold dark:text-white">
            Agenda de travail
         </h2>
         <p class="text-body-color dark:text-dark-6 text-base font-medium leading-relaxed">
            Voici le planning de nos tâches quotidiennes. Vous pouvez suivre les tâches, réunions et rendez-vous importants dans cet agenda.
         </p>
      </div>
   </div>
</section>


<div class=" flex items-center justify-center h-[500px]">
    <div class="lg:w-7/12 md:w-9/12 sm:w-10/12 mx-auto p-4">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="flex items-center justify-between px-6 py-3 bg-gray-700">
                <button id="prevMonth" class="text-white">Previous</button>
                <h2 id="currentMonth" class="text-white"></h2>
                <button id="nextMonth" class="text-white">Next</button>
            </div>
            <div class="grid grid-cols-7 gap-2 p-4" id="calendar">

            </div>
            <div id="myModal" class="modal hidden fixed inset-0 flex items-center justify-center z-50">
                <div class="modal-overlay absolute inset-0 bg-black opacity-50"></div>
                <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                    <form class="modal-content py-4 text-left px-6" method="POST" action="">
                        <div class="flex justify-between items-center pb-3">
                            <p class="text-2xl font-bold">Add Event</p>
                            <button id="closeModal" class="modal-close px-3 py-1 rounded-full bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring">✕</button>
                        </div>
                        <div class="mb-4">
                            <label for="eventTitle" class="block text-sm font-bold text-gray-700">Event Title</label>
                            <input name="title" type="text" id="eventTitle" class="w-full mt-2 px-4 py-2 border rounded focus:outline-none focus:ring" placeholder="Enter event title">
                        </div>
                        <div class="mb-4">
                            <label for="eventDate" class="block text-sm font-bold text-gray-700">Event Date</label>
                            <input name="date" type="date" id="eventDate" class="w-full mt-2 px-4 py-2 border rounded focus:outline-none focus:ring">
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" id="saveEvent" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:ring">Save Event</button>
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
            dayEl.classList.add('bg-red-500', 'text-white');
        }

        dayEl.addEventListener('click', () => openModal(dateString));
        calendar.appendChild(dayEl);
    }
}

renderCalendar();

    </script>
    <!-- <script src="../script/main.js" ></script> -->
</body>
</html>
