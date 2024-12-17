<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&family=Bungee+Spice&family=Geist+Mono:wght@100..900&family=Itim&family=Lilita+One&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Parkinsans:wght@300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rowdies:wght@300;400;700&family=Rubik+Wet+Paint&family=Unlock&family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>AvocatConnect </title>
</head>
<style>
  body {
    font-family: 'Montserrat', sans-serif;
  }
</style>

<body class="font-montserrat">

<header class='flex shadow-md  bg-[#282E3F] text-white  min-h-[30px] tracking-wide relative z-50'>
    <div class='flex flex-wrap items-center justify-between lg:gap-y-4 gap-y-6 gap-x-4 w-full'>
      <a href=""><img src="../imgs/logo_white.png" alt="logo" class='w-36 ' />
      </a>
  
      <div id="collapseMenu"
        class='max-lg:hidden relative lg:left-[20%] lg:!block max-lg:before:fixed max-lg:before:bg-black max-lg:before:opacity-40 max-lg:before:inset-0 max-lg:before:z-50'>
        <button id="toggleClose"
          class='lg:hidden fixed top-2 right-4 z-[100] rounded-full bg-white w-9 h-9 flex items-center justify-center border'>
          <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 fill-black" viewBox="0 0 320.591 320.591">
            <path
              d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z"
              data-original="#000000"></path>
            <path
              d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z"
              data-original="#000000"></path>
          </svg>
        </button>
  
        <ul
          class='lg:flex lg:gap-x-10 max-lg:space-y-3 max-lg:fixed max-lg:bg-white max-lg:w-2/3 max-lg:min-w-[300px] max-lg:top-0 lg:left-8 max-lg:p-4 max-lg:h-full max-lg:shadow-md max-lg:overflow-auto z-50'>
          <li class='mb-6 hidden max-lg:block'>
            <a href="javascript:void(0)"><img src="" alt="logo" class='w-36 bg-[#CA965C]' />
            </a>
          </li>
        
          <li
            class=' max-lg:py-3 max-lg:px-3 relative lg:hover:after:absolute  lg:after:w-0 lg:hover:after:w-full lg:hover:after:h-[2px] lg:after:block lg:after:top-7 lg:after:transition-all lg:after:duration-300'>
            <a href='javascript:void(0)' class='text-white font-bold block text-[15px]  rounded-full hover:bg-[#CA965C] px-[14px] py-[7px]'>Accueil
            </a>
          </li>
          <select
            class=' text-white font-bold rounded-full bg-[#282E3F] hover:bg-[#CA965C] px-[14px] py-[7px]'>
            <option value="avocat maroc">avocats</option>
          </select>
          <li
            class=' max-lg:py-3 max-lg:px-3 relative lg:hover:after:absolute  lg:after:w-0 lg:hover:after:w-full lg:hover:after:h-[2px] lg:after:block lg:after:top-7 lg:after:transition-all lg:after:duration-300'>
            <a href='javascript:void(0)' class='text-white block font-bold text-[15px] rounded-full hover:bg-[#CA965C] px-[14px] py-[7px]'>Contactez-nous</a>
          </li>
        </ul>
      </div>
  
      <div class=' flex items-center max-sm:ml-auto space-x-6 p-[40px]'>
        <ul>
          <li id=" profile-dropdown-toggle"
            class=" relative px-1 after:absolute  after:w-full after:h-[2px] after:block after:top-8 after:left-0 after:transition-all after:duration-300">
            <a href="../vues/create_account.php"><i class="fas fa-user bg-[#CA965C] p-[10px] rounded-full" aria-hidden="true"></i></a>
            <div id=" profile-dropdown-menu"
              class="hidden bg-white block z-20 shadow-lg py-6 px-6 rounded sm:min-w-[320px] max-sm:min-w-[250px] absolute right-0 top-10">
              <h6 class="font-semibold text-[15px]">Welcome</h6>
              <p class="text-sm text-gray-500 mt-1">To access account and manage orders</p>
              <button type='button'
                class="bg-transparent border text-gray-500 border-gray-300 hover:border-black rounded px-4 py-2 mt-4 text-s">LOGIN
                / SIGNUP</button>
              <hr class="border-b-0 my-4" />
              <ul class="space-y-1.5">
                <li><a href='javascript:void(0)' class="text-sm text-gray-500hover:text-white">Order</a></li>
                <li><a href='javascript:void(0)' class="text-sm text-gray-500 hover:text-white">Wishlist</a></li>
                <li><a href='javascript:void(0)' class="text-sm text-gray-500 hover:text-white">Gift Cards</a></li>
                <li><a href='javascript:void(0)' class="text-sm text-gray-500 hover:text-white">Contact Us</a></li>
              </ul>
              <hr class="border-b-0 my-4" />
              <ul class="space-y-1.5">
                <li><a href='javascript:void(0)' class="text-sm text-gray-500 hover:text-white">Coupons</a></li>
                <li><a href='javascript:void(0)' class="text-sm text-gray-500 hover:text-white">Saved Credits</a></li>
                <li><a href='javascript:void(0)' class="text-sm text-gray-500 hover:text-white">Contact Us</a></li>
                <li><a href='javascript:void(0)' class="text-sm text-gray-500 hover:text-white">Saved Addresses</a></li>
              </ul>
            </div>
          </li>
        </ul>
  
        <button id="toggleOpen" class='lg:hidden ml-7'>
          <svg class="w-7 h-7" fill="#000" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
              clip-rule="evenodd"></path>
          </svg>
        </button>
      </div>
    </div>
  </header>
