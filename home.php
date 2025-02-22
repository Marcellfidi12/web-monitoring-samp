<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   One Pride Roleplay
  </title>
  <link rel="icon" type="image/x-icon" href="assets/oprp.png">
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
            font-family: 'Roboto', sans-serif;
            background-image: url('assets/p.jpg');
            background-size: cover;
            background-position: center;
            color: white;
        }
        .navbar {
            background: rgba(0, 0, 0, 0.7);
        }
        .navbar a {
            color: white;
        }
        .card {
            background: rgba(0, 0, 0, 0.7);
            border-radius: 20px;
            padding: 20px;
            text-align: center;
            transition: transform 0.3s;
            border-top: 4px solid red;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card img {
            border-radius: 20px;
        }
        .btn {
            border: 2px solid #3b82f6;
            color: #3b82f6;
            padding: 8px 16px;
            border-radius: 8px;
            transition: background-color 0.3s, color 0.3s;
        }
        .btn:hover {
            background-color: #3b82f6;
            color: white;
        }
        .btn-disabled {
            border: 2px solid #6b7280;
            color: #6b7280;
            padding: 8px 16px;
            border-radius: 8px;
            cursor: not-allowed;
        }
        .mobile-menu {
            display: none;
        }
        @media (max-width: 768px) {
            .mobile-menu {
                display: block;
                background: rgba(0, 0, 0, 0.7);
            }
            .desktop-menu {
                display: none;
            }
        }
  </style>
 </head>
 <body class="bg-gray-900">
  <nav class="navbar flex justify-between items-center p-4">
   <div class="flex items-center">
    <a href="index.php" ><img alt="Logo" class="mr-3" height="50" src="assets/oprp.png" width="50"/></a>
    <span class="text-2xl font-bold">
     ONE PRIDE
    </span>
    <span class="text-sm ml-2">
     ROLEPLAY
    </span>
   </div>
   <div class="hidden md:flex space-x-6 desktop-menu">
    <div class="relative group">
     <a class="hover:underline" href="#">
      Hosting
     </a>
     <div class="absolute hidden group-hover:block bg-gray-800 text-white p-2 rounded shadow-lg">
      <a class="block px-4 py-2" href="#">
       Option 1
      </a>
      <a class="block px-4 py-2" href="#">
       Option 2
      </a>
     </div>
    </div>
    <div class="relative group">
     <a class="hover:underline" href="#">
      Services
     </a>
     <div class="absolute hidden group-hover:block bg-gray-800 text-white p-2 rounded shadow-lg">
      <a class="block px-4 py-2" href="#">
       Option 1
      </a>
      <a class="block px-4 py-2" href="#">
       Option 2
      </a>
     </div>
    </div>
    <a class="hover:underline" href="#">
     Showcase
    </a>
    <a class="hover:underline" href="#">
     Serverlist
    </a>
    <div class="relative group">
     <a class="hover:underline" href="#">
      Contact
     </a>
     <div class="absolute hidden group-hover:block bg-gray-800 text-white p-2 rounded shadow-lg">
      <a class="block px-4 py-2" href="#">
       Option 1
      </a>
      <a class="block px-4 py-2" href="#">
       Option 2
      </a>
     </div>
    </div>
   </div>
   <button class="btn desktop-menu">
    Login
   </button>
   <div class="mobile-menu">
    <button class="text-white" id="mobile-menu-button">
     <i class="fas fa-bars fa-2x">
     </i>
    </button>
   </div>
  </nav>
  <div class="hidden mobile-menu text-white p-4" id="mobile-menu">
    <div class="tp">
   <a class="block px-4 py-2 hover:bg-gray-700" href="#">
    Hosting
   </a>
   <a class="block px-4 py-2 hover:bg-gray-700" href="#">
    Services
   </a>
   <a class="block px-4 py-2 hover:bg-gray-700" href="#">
    Showcase
   </a>
   <a class="block px-4 py-2 hover:bg-gray-700" href="#">
    Serverlist
   </a>
   <a class="block px-4 py-2 hover:bg-gray-700" href="#">
    Contact
   </a>
   <button class="btn mt-4 w-full">
    Login
   </button>
    </div>
  </div>
  <div class="text-center mt-12">
   <h1 class="text-4xl font-bold">
    One Pride Roleplay
   </h1>
   <div class="flex justify-center mt-2">
    <div class="w-16 h-1 bg-white">
    </div>
   </div>
  </div>
  <div class="flex flex-wrap justify-center space-x-0 md:space-x-6 mt-12">
   <div class="card w-64 p-4 m-2">
    <img alt="FiveM Cloud Image" class="mb-4" height="256" src="https://storage.googleapis.com/a1aa/image/loYQUUAYJ8rcCVAu2RM2LzPIjvUeCqRczaXEf3a0IOxSGWmTA.jpg" width="256"/>
    <h2 class="text-xl font-bold">
     FiveM Cloud
    </h2>
    <p class="text-sm">
     Hosting Dengan CPU Ryzen
    </p>
    <button class="btn mt-4">
     Details
    </button>
   </div>
   <div class="card w-64 p-4 m-2">
    <img alt="SA:MP Cloud Image" class="mb-4" height="256" src="https://storage.googleapis.com/a1aa/image/kyhLCm5xN7pfVC77k5kxetSd8vMoSVaFD4w7lPSIKjmVGWmTA.jpg" width="256"/>
    <h2 class="text-xl font-bold">
     SA:MP Cloud
    </h2>
    <p class="text-sm">
     Hosting Dengan CPU Ryzen
    </p>
    <button class="btn mt-4">
     Details
    </button>
   </div>
   <div class="card w-64 p-4 m-2">
    <img alt="SA:MP Dedicated Image" class="mb-4" height="256" src="https://storage.googleapis.com/a1aa/image/z1H3ZCReg7XJKCirIafQ0Y6XcXV33LmBHXfH6xOfXPqMZYZOB.jpg" width="256"/>
    <h2 class="text-xl font-bold">
     SA:MP Dedicated
    </h2>
    <p class="text-sm">
     Hosting Dengan CPU Ryzen
    </p>
    <button class="btn-disabled mt-4">
     Not Available
    </button>
   </div>
   <div class="card w-64 p-4 m-2">
    <img alt="RedM Cloud Image" class="mb-4" height="256" src="https://storage.googleapis.com/a1aa/image/7SwaR5HwYS5PD5ZYFwzkpmnLpnMyZLmvSeoz6gaKAcULDLzJA.jpg" width="256"/>
    <h2 class="text-xl font-bold">
     RedM Cloud
    </h2>
    <p class="text-sm">
     Hosting Dengan CPU Ryzen
    </p>
    <button class="btn mt-4">
     Details
    </button>
   </div>
  </div>
  <footer class="bg-gray-800 text-white mt-12 p-6">
   <div class="container mx-auto flex flex-wrap justify-between items-center">
    <div class="w-full md:w-1/3 text-center md:text-left mb-4 md:mb-0">
     <h2 class="text-xl font-bold">
      ONE PRIDE ROLEPLAY
     </h2>
     <p class="text-sm">
      © 2024 All rights reserved.
     </p>
    </div>
    <div class="w-full md:w-1/3 text-center mb-4 md:mb-0">
     <a class="text-white mx-2 hover:text-gray-400" href="#">
      <i class="fab fa-facebook fa-2x">
      </i>
     </a>
     <a class="text-white mx-2 hover:text-gray-400" href="https://discord.gg/onepride">
      <i class="fab fa-discord fa-2x">
      </i>
     </a>
     <a class="text-white mx-2 hover:text-gray-400" href="#">
      <i class="fab fa-instagram fa-2x">
      </i>
     </a>
    </div>
    <div class="w-full md:w-1/3 text-center md:text-right">
     <a class="text-white mx-2 hover:text-gray-400" href="#">
      Privacy Policy
     </a>
     <a class="text-white mx-2 hover:text-gray-400" href="#">
      Terms of Service
     </a>
    </div>
   </div>
  </footer>
  <script>
   document.getElementById('mobile-menu-button').addEventListener('click', function() {
            var menu = document.getElementById('mobile-menu');
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
            } else {
                menu.classList.add('hidden');
            }
        });
  </script>
 </body>
</html>