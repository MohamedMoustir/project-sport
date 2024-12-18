
<?php
require("../database.php");
require_once '../vues/nav.php';

// $listSpecialite = listusersAction();
$Listusers = $pdo->query('SELECT * FROM users JOIN specialite on users.idSpecialite = specialite.idSP ')->fetchAll(PDO::FETCH_OBJ);


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

   
<?php  $list = end($Listusers); 
        if ($list): ?>

<section id="Cover" class="w-full overflow-hidden dark:bg-gray-900">
    <div class="flex flex-col">
        <!-- Cover Image -->
        <img src="../imgs/original.jpg" alt="User Cover"
                class="w-full xl:h-[20rem] lg:h-[18rem] md:h-[16rem] sm:h-[14rem] xs:h-[11rem]" />

        <!-- Profile Image -->
        <div class="sm:w-[80%] xs:w-[90%] mx-auto flex">
            <img src="<?= $list->img?>" alt="User Profile"
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
        <a href="../vues/Account_avocat.php">Profil</a>
      </li>

      <li class="text-gray-500 text-3xl">/</li>
      <li class="text-gray-500 bg-gray-100 px-4 py-2 rounded-full text-sm tracking-wide font-bold cursor-pointer flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-current mr-2" viewBox="0 0 512 512">
          <path
            d="M437.02 74.98C388.668 26.63 324.379 0 256 0S123.332 26.629 74.98 74.98C26.63 123.332 0 187.621 0 256s26.629 132.668 74.98 181.02C123.332 485.37 187.621 512 256 512s132.668-26.629 181.02-74.98C485.37 388.668 512 324.379 512 256s-26.629-132.668-74.98-181.02zM111.105 429.297c8.454-72.735 70.989-128.89 144.895-128.89 38.96 0 75.598 15.179 103.156 42.734 23.281 23.285 37.965 53.687 41.742 86.152C361.641 462.172 311.094 482 256 482s-105.637-19.824-144.895-52.703zM256 269.507c-42.871 0-77.754-34.882-77.754-77.753C178.246 148.879 213.13 114 256 114s77.754 34.879 77.754 77.754c0 42.871-34.883 77.754-77.754 77.754zm170.719 134.427a175.9 175.9 0 0 0-46.352-82.004c-18.437-18.438-40.25-32.27-64.039-40.938 28.598-19.394 47.426-52.16 47.426-89.238C363.754 132.34 315.414 84 256 84s-107.754 48.34-107.754 107.754c0 37.098 18.844 69.875 47.465 89.266-21.887 7.976-42.14 20.308-59.566 36.542-25.235 23.5-42.758 53.465-50.883 86.348C50.852 364.242 30 312.512 30 256 30 131.383 131.383 30 256 30s226 101.383 226 226c0 56.523-20.86 108.266-55.281 147.934zm0 0"
            data-original="#000000" />
        </svg>
       <a href="../vues/pageDisponible.php">Actionle</a>
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
        <div id="wrapper" class="max-w-xl  mx-auto">
            <div class="sm:grid sm:h-32 sm:grid-flow-row sm:gap-4 sm:grid-cols-3">
                <div id="jh-stats-positive" class="flex flex-col justify-center px-4 py-4 bg-white border border-gray-300 rounded">
                    <div>
                        <div>
                            <p class="flex items-center justify-end text-green-500 text-md">
                                <span class="font-bold">6%</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path class="heroicon-ui" d="M20 15a1 1 0 002 0V7a1 1 0 00-1-1h-8a1 1 0 000 2h5.59L13 13.59l-3.3-3.3a1 1 0 00-1.4 0l-6 6a1 1 0 001.4 1.42L9 12.4l3.3 3.3a1 1 0 001.4 0L20 9.4V15z"/></svg>
                            </p>
                        </div>
                        <p class="text-3xl font-semibold text-center text-gray-800">43</p>
                        <p class="text-lg text-center text-gray-500">New Tickets</p>
                    </div>
                </div>
    
                <div id="jh-stats-negative" class="flex flex-col justify-center px-4 py-4 mt-4 bg-white border border-gray-300 rounded sm:mt-0">
                    <div>
                        <div>
                            <p class="flex items-center justify-end text-red-500 text-md">
                                <span class="font-bold">6%</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path class="heroicon-ui" d="M20 9a1 1 0 012 0v8a1 1 0 01-1 1h-8a1 1 0 010-2h5.59L13 10.41l-3.3 3.3a1 1 0 01-1.4 0l-6-6a1 1 0 011.4-1.42L9 11.6l3.3-3.3a1 1 0 011.4 0l6.3 6.3V9z"/></svg>
                            </p>
                        </div>
                        <p class="text-3xl font-semibold text-center text-gray-800">43</p>
                        <p class="text-lg text-center text-gray-500">New Tickets</p>
                    </div>
                </div>

                <div id="jh-stats-neutral" class="flex flex-col justify-center px-4 py-4 mt-4 bg-white border border-gray-300 rounded sm:mt-0">
                    <div>
                        <div>
                            <p class="flex items-center justify-end text-gray-500 text-md">
                                <span class="font-bold">0%</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path class="heroicon-ui" d="M17 11a1 1 0 010 2H7a1 1 0 010-2h10z"/></svg>
                            </p>
                        </div>
                        <p class="text-3xl font-semibold text-center text-gray-800">43</p>
                        <p class="text-lg text-center text-gray-500">New Tickets</p>
                    </div>
                </div>
            </div>
        </div>


            <!-- Social Links -->
            <div
                class="fixed right-2 bottom-20 flex flex-col rounded-sm bg-gray-200 text-gray-500 dark:bg-gray-200/80 dark:text-gray-700 hover:text-gray-600 hover:dark:text-gray-400">
                <a href="https://www.linkedin.com/in/samuel-abera-6593a2209/">
                    <div class="p-2 hover:text-primary hover:dark:text-primary">
                        <svg class="lg:w-6 lg:h-6 xs:w-4 xs:h-4 text-blue-500" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M12.51 8.796v1.697a3.738 3.738 0 0 1 3.288-1.684c3.455 0 4.202 2.16 4.202 4.97V19.5h-3.2v-5.072c0-1.21-.244-2.766-2.128-2.766-1.827 0-2.139 1.317-2.139 2.676V19.5h-3.19V8.796h3.168ZM7.2 6.106a1.61 1.61 0 0 1-.988 1.483 1.595 1.595 0 0 1-1.743-.348A1.607 1.607 0 0 1 5.6 4.5a1.601 1.601 0 0 1 1.6 1.606Z"
                                clip-rule="evenodd" />
                            <path d="M7.2 8.809H4V19.5h3.2V8.809Z" />
                        </svg>

                    </div>
                </a>
                <a href="https://twitter.com/Samuel7Abera7">
                    <div class="p-2 hover:text-primary hover:dark:text-primary">
                        <svg class="lg:w-6 lg:h-6 xs:w-4 xs:h-4 text-gray-900" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M13.795 10.533 20.68 2h-3.073l-5.255 6.517L7.69 2H1l7.806 10.91L1.47 22h3.074l5.705-7.07L15.31 22H22l-8.205-11.467Zm-2.38 2.95L9.97 11.464 4.36 3.627h2.31l4.528 6.317 1.443 2.02 6.018 8.409h-2.31l-4.934-6.89Z" />
                        </svg>

                    </div>
                </a>
                <a href="">
                    <div class="p-2 hover:text-blue-500 hover:dark:text-blue-500">
                        <svg class="lg:w-6 lg:h-6 xs:w-4 xs:h-4 text-blue-700" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M13.135 6H15V3h-1.865a4.147 4.147 0 0 0-4.142 4.142V9H7v3h2v9.938h3V12h2.021l.592-3H12V6.591A.6.6 0 0 1 12.592 6h.543Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </a>
                <a href="https://www.youtube.com/@silentcoder7">
                    <div class="p-2 hover:text-primary hover:dark:text-primary">
                        <svg class="lg:w-6 lg:h-6 xs:w-4 xs:h-4 text-red-600" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M21.7 8.037a4.26 4.26 0 0 0-.789-1.964 2.84 2.84 0 0 0-1.984-.839c-2.767-.2-6.926-.2-6.926-.2s-4.157 0-6.928.2a2.836 2.836 0 0 0-1.983.839 4.225 4.225 0 0 0-.79 1.965 30.146 30.146 0 0 0-.2 3.206v1.5a30.12 30.12 0 0 0 .2 3.206c.094.712.364 1.39.784 1.972.604.536 1.38.837 2.187.848 1.583.151 6.731.2 6.731.2s4.161 0 6.928-.2a2.844 2.844 0 0 0 1.985-.84 4.27 4.27 0 0 0 .787-1.965 30.12 30.12 0 0 0 .2-3.206v-1.516a30.672 30.672 0 0 0-.202-3.206Zm-11.692 6.554v-5.62l5.4 2.819-5.4 2.801Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </a>
            </div>
           

        </div>
    </div>
        <div
            class="xl:w-[80%] lg:w-[90%]  md:w-[90%] sm:w-[92%] xs:w-[90%] mx-auto flex flex-col gap-4 items-center relative lg:-top-8 md:-top-6 sm:-top-4 xs:-top-4">
            <!-- Description -->
            <p class="w-fit text-gray-700 dark:text-gray-400 text-md"><?= $list->biography ?></p>


            <!-- Detail -->
            <div class="w-full my-auto py-6 flex flex-col justify-center gap-6">
    <!-- Personal Info Section -->
    <div class="w-full flex sm:flex-row xs:flex-col gap-4 justify-center">
        <!-- Left Column -->
        <div class="w-full bg-white p-6 shadow-lg rounded-lg">
            <dl class="text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                <div class="flex flex-col pb-4">
                    <dt class="mb-1 text-gray-500 text-lg dark:text-gray-400">Full Name</dt>
                    <dd class="text-xl font-semibold"><?= $list->full_name ?></dd>
                </div>
                <div class="flex flex-col py-4">
                    <dt class="mb-1 text-gray-500 text-lg dark:text-gray-400">Speciality</dt>
                    
                    <dd class="text-xl font-semibold"><?= $list->label?></dd>
                  

                </div>
                <div class="flex flex-col py-4">
                    <dt class="mb-1 text-gray-500 text-lg dark:text-gray-400">Matricule</dt>
                    <dd class="text-xl font-semibold"><?= $list->matricule ?></dd>
                </div>
                <div class="flex flex-col py-4">
                    <dt class="mb-1 text-gray-500 text-lg dark:text-gray-400">Age</dt>
                    <dd class="text-xl font-semibold"><?= $list->age ?></dd>
                </div>
            </dl>
        </div>

        <!-- Right Column -->
        <div class="w-full bg-white p-6 shadow-lg rounded-lg">
            <dl class="text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                <div class="flex flex-col pt-4">
                    <dt class="mb-1 text-gray-500 text-lg dark:text-gray-400">Phone Number</dt>
                    <dd class="text-xl font-semibold"><?= $list->numeroTelephone ?></dd>
                </div>
                <div class="flex flex-col pt-4">
                    <dt class="mb-1 text-gray-500 text-lg dark:text-gray-400">Email</dt>
                    <dd class="text-xl font-semibold"><?= $list->email ?></dd>
                </div>
            </dl>
        </div>
    </div>

   
</section>

<section>
  <div id="showEditModal" class="hidden scale-[0.9] bg-white fixed top-[0] left-[50%] -translate-x-2/4 max-w-4xl mx-auto font-[sans-serif] p-6">
      <div class="text-center mb-16">
       
        <h4 class="text-gray-800 text-base  mt-6">Sign up into your account</h4>
      </div>

      <form method="POST" action="action.php?action=edite">
        <div class="grid sm:grid-cols-2 gap-8">
          <div>
            <label class="text-gray-800 text-sm mb-2 block">FullName</label>
            <input value="<?= $list->full_name ?>" name="name" type="text" class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-3.5 rounded-md focus:bg-transparent outline-blue-500 transition-all" placeholder="Enter name" />
          </div>
          <div>
            <label class="text-gray-800 text-sm mb-2 block">specialité</label>
            <input value="<?= $list->label ?>" name="specialité" type="text" class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-3.5 rounded-md focus:bg-transparent outline-blue-500 transition-all" placeholder="Enter last name" />
          </div>
          <div>
            <label class="text-gray-800 text-sm mb-2 block">Email Id</label>
            <input value="<?= $list->email ?>" name="email" type="text" class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-3.5 rounded-md focus:bg-transparent outline-blue-500 transition-all" placeholder="Enter email" />
          </div>
          <div>
            <label class="text-gray-800 text-sm mb-2 block">Mobile No.</label>
            <input value="<?= $list->numeroTelephone ?>" name="number" type="number" class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-3.5 rounded-md focus:bg-transparent outline-blue-500 transition-all" placeholder="Enter mobile number" />
          </div>
          <div>
            <label class="text-gray-800 text-sm mb-2 block">image</label>
            <input name="file" type="file" class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-3.5 rounded-md focus:bg-transparent outline-blue-500 transition-all" placeholder="Enter password" />
          </div>
         
          <div>
            <label class="text-gray-800 text-sm mb-2 block">biography</label>
            <textarea value="<?= $list->biography ?>" name="biography" type="matricule" class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-3.5 rounded-md focus:bg-transparent outline-blue-500 transition-all" placeholder="Enter confirm password" ></textarea>
          </div>
          <div>
            <label class="text-gray-800 text-sm mb-2 block">Age</label>
            <input value="<?= $list->age ?>" name="age" type="number" class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-3.5 rounded-md focus:bg-transparent outline-blue-500 transition-all" placeholder="Enter confirm password" />
          </div>
        </div>
        
        <div class="!mt-12">
          <button type="button" class="py-3.5 px-7 text-sm  tracking-wider rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
           Edite
          </button>
        </div>
      </form>
    </div>
    <?php endif; ?>
</section>
<script src="../script/main.js" ></script>

</body>
</html>  