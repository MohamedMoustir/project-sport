

<?php
require("../database.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['date']) && isset($_POST['title'])) {
  
  $sqlusers = $pdo->prepare("INSERT INTO disponibilty( datadebut, title) VALUES (?,?)");
    $sqlusers->execute([$_POST['date'],$_POST['title']]);
}
   
    $Listusers = $pdo->query('SELECT * FROM users JOIN specialite on users.idSpecialite = specialite.idSP ')->fetchAll(PDO::FETCH_OBJ);
    require_once '../vues/nav.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body class="font-montserrat">
<style>
        .hidden {
            display: none;
        }
    </style>
   

  
<section id="Cover" class="w-full overflow-hidden dark:bg-gray-900">
    <div class="flex flex-col">
        <!-- Cover Image -->
        <img src="../imgs/original.jpg" alt="User Cover"
                class="w-full xl:h-[20rem] lg:h-[18rem] md:h-[16rem] sm:h-[14rem] xs:h-[11rem]" />

        <!-- Profile Image -->
        <div class="sm:w-[80%] xs:w-[90%] mx-auto flex">
            <img src="" alt="User Profile"
                    class="rounded-full lg:w-[12rem] lg:h-[12rem] md:w-[10rem] md:h-[10rem] sm:w-[8rem] sm:h-[8rem] xs:w-[7rem] xs:h-[7rem] outline outline-2 outline-offset-2 outline-blue-500 relative lg:bottom-[5rem] sm:bottom-[4rem] xs:bottom-[3rem]" />

            <!-- FullName -->
            <h1
                class="w-full text-left my-4 sm:mx-4 xs:pl-4 text-gray-800 dark:text-white lg:text-4xl md:text-3xl sm:text-3xl xs:text-xl font-serif">
                Samuel Abera</h1>
    <ul class="relative -top-[60px] flex items-center justify-center space-x-4 font-[sans-serif] mt-4">
      <li class="text-gray-500 bg-gray-100 px-4 py-2 rounded-full text-sm tracking-wide font-bold cursor-pointer flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-current mr-2" viewBox="0 0 511 511.999">
          <path
            d="M498.7 222.695c-.016-.011-.028-.027-.04-.039L289.805 13.81C280.902 4.902 269.066 0 256.477 0c-12.59 0-24.426 4.902-33.332 13.809L14.398 222.55c-.07.07-.144.144-.21.215-18.282 18.386-18.25 48.218.09 66.558 8.378 8.383 19.44 13.235 31.273 13.746.484.047.969.07 1.457.07h8.32v153.696c0 30.418 24.75 55.164 55.168 55.164h81.711c8.285 0 15-6.719 15-15V376.5c0-13.879 11.293-25.168 25.172-25.168h48.195c13.88 0 25.168 11.29 25.168 25.168V497c0 8.281 6.715 15 15 15h81.711c30.422 0 55.168-24.746 55.168-55.164V303.14h7.719c12.586 0 24.422-4.903 33.332-13.813 18.36-18.367 18.367-48.254.027-66.633zm-21.243 45.422a17.03 17.03 0 0 1-12.117 5.024h-22.72c-8.285 0-15 6.714-15 15v168.695c0 13.875-11.289 25.164-25.168 25.164h-66.71V376.5c0-30.418-24.747-55.168-55.169-55.168H232.38c-30.422 0-55.172 24.75-55.172 55.168V482h-66.71c-13.876 0-25.169-11.29-25.169-25.164V288.14c0-8.286-6.715-15-15-15H48a13.9 13.9 0 0 0-.703-.032c-4.469-.078-8.66-1.851-11.8-4.996-6.68-6.68-6.68-17.55 0-24.234.003 0 .003-.004.007-.008l.012-.012L244.363 35.02A17.003 17.003 0 0 1 256.477 30c4.574 0 8.875 1.781 12.113 5.02l208.8 208.796.098.094c6.645 6.692 6.633 17.54-.031 24.207zm0 0"
            data-original="#000000" />
        </svg>
        Home
      </li>
      <li class="text-gray-500 text-3xl">/</li>
      <li class="text-gray-500 bg-gray-100 px-4 py-2 rounded-full text-sm tracking-wide font-bold cursor-pointer flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-current mr-2" viewBox="0 0 512 512">
          <path
            d="M437.02 74.98C388.668 26.63 324.379 0 256 0S123.332 26.629 74.98 74.98C26.63 123.332 0 187.621 0 256s26.629 132.668 74.98 181.02C123.332 485.37 187.621 512 256 512s132.668-26.629 181.02-74.98C485.37 388.668 512 324.379 512 256s-26.629-132.668-74.98-181.02zM111.105 429.297c8.454-72.735 70.989-128.89 144.895-128.89 38.96 0 75.598 15.179 103.156 42.734 23.281 23.285 37.965 53.687 41.742 86.152C361.641 462.172 311.094 482 256 482s-105.637-19.824-144.895-52.703zM256 269.507c-42.871 0-77.754-34.882-77.754-77.753C178.246 148.879 213.13 114 256 114s77.754 34.879 77.754 77.754c0 42.871-34.883 77.754-77.754 77.754zm170.719 134.427a175.9 175.9 0 0 0-46.352-82.004c-18.437-18.438-40.25-32.27-64.039-40.938 28.598-19.394 47.426-52.16 47.426-89.238C363.754 132.34 315.414 84 256 84s-107.754 48.34-107.754 107.754c0 37.098 18.844 69.875 47.465 89.266-21.887 7.976-42.14 20.308-59.566 36.542-25.235 23.5-42.758 53.465-50.883 86.348C50.852 364.242 30 312.512 30 256 30 131.383 131.383 30 256 30s226 101.383 226 226c0 56.523-20.86 108.266-55.281 147.934zm0 0"
            data-original="#000000" />
        </svg>
        
        <a href="../vues/Account_avocat.php">Profile</a>
      </li>

      <li class="text-gray-500 text-3xl">/</li>
      <li class="text-gray-500 bg-gray-100 px-4 py-2 rounded-full text-sm tracking-wide font-bold cursor-pointer flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-current mr-2" viewBox="0 0 512 512">
          <path
            d="M437.02 74.98C388.668 26.63 324.379 0 256 0S123.332 26.629 74.98 74.98C26.63 123.332 0 187.621 0 256s26.629 132.668 74.98 181.02C123.332 485.37 187.621 512 256 512s132.668-26.629 181.02-74.98C485.37 388.668 512 324.379 512 256s-26.629-132.668-74.98-181.02zM111.105 429.297c8.454-72.735 70.989-128.89 144.895-128.89 38.96 0 75.598 15.179 103.156 42.734 23.281 23.285 37.965 53.687 41.742 86.152C361.641 462.172 311.094 482 256 482s-105.637-19.824-144.895-52.703zM256 269.507c-42.871 0-77.754-34.882-77.754-77.753C178.246 148.879 213.13 114 256 114s77.754 34.879 77.754 77.754c0 42.871-34.883 77.754-77.754 77.754zm170.719 134.427a175.9 175.9 0 0 0-46.352-82.004c-18.437-18.438-40.25-32.27-64.039-40.938 28.598-19.394 47.426-52.16 47.426-89.238C363.754 132.34 315.414 84 256 84s-107.754 48.34-107.754 107.754c0 37.098 18.844 69.875 47.465 89.266-21.887 7.976-42.14 20.308-59.566 36.542-25.235 23.5-42.758 53.465-50.883 86.348C50.852 364.242 30 312.512 30 256 30 131.383 131.383 30 256 30s226 101.383 226 226c0 56.523-20.86 108.266-55.281 147.934zm0 0"
            data-original="#000000" />
        </svg>
       <a href="../vues/pageDisponible.php"> Action </a>
      </li>

      <li  class="text-gray-500 text-3xl" >/</li>
      <li  class="text-white bg-gray-700 px-4 py-2 rounded-full text-sm tracking-wide font-bold cursor-pointer flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-current mr-2" viewBox="0 0 24 24">
          <g fill-rule="evenodd" clip-rule="evenodd">
            <path
              d="M7 4a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-6a1 1 0 1 1 2 0v6a5 5 0 0 1-5 5H7a5 5 0 0 1-5-5V7a5 5 0 0 1 5-5h6a1 1 0 1 1 0 2z"
              data-original="#000000" />
            <path
              d="M19.197 4a.803.803 0 0 0-.567.235l-7.877 7.877-.379 1.514 1.514-.379 7.877-7.877A.803.803 0 0 0 19.197 4zm-1.981-1.18a2.802 2.802 0 1 1 3.963 3.964l-8.073 8.073a1 1 0 0 1-.464.263l-3.4.85a1 1 0 0 1-1.212-1.213l.85-3.399a1 1 0 0 1 .263-.464z"
              data-original="#000000" />
            <path d="M15.293 5.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1-1.414 1.414l-2-2a1 1 0 0 1 0-1.414z"
              data-original="#000000" />
          </g>
        </svg>
      <button onclick="showEditModal()">Edit</button>  
      </li>
    </ul>
        </div>
  

<!-- component -->
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
