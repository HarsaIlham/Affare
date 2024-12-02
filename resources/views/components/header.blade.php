<head>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Montserrat', sans-serif;
    }
    .affare-text {
      font-weight: 700;
      font-size: 1.75rem;
    }
  </style>
</head>

<body class="bg-gray-50">
    <header class="bg-white shadow">
      <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <!-- Logo Section -->
        <div class="flex items-center space-x-3">
          <img src="{{ asset('storage/header-resource/affare-icon.webp') }}" alt="Logo" class="h-8">
          <span class="affare-text text-black">Affare<span class="text-blue-400">!</span></span>
        </div>

        <!-- Hamburger Button (Visible on Mobile) -->
        <button id="hamburger-button" class="md:hidden focus:outline-none">
          <svg class="h-6 w-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
          </svg>
        </button>

        <!-- Navigation Links (Hidden on Mobile, Visible on Desktop) -->
        <nav id="navbar" class="hidden md:flex space-x-6 text-gray-600">
          <a href="#" class="font-bold hover:text-blue-600">Eksplor</a>
          <a href="#" class="font-bold hover:text-blue-600">Perusahaan</a>
          <a href="#" class="font-bold hover:text-blue-600">Tersimpan</a>
          <a href="#" class="font-bold hover:text-blue-600">Terdaftar</a>
        </nav>

        <!-- Profile & Notification -->
        <div class="hidden md:flex items-center space-x-4">
          <a href="#">
            <img src="{{ asset('storage/header-resource/notification.webp') }}" alt="Icon" class="h-6 w-6 mr-10">
          </a>
          <img src="{{ asset('storage/header-resource/foto-profil.webp') }}" alt="foto profil" class="h-8 w-8 rounded-full">
        </div>
      </div>
    </header>

    <!-- Sidebar (Hidden by Default) -->
    <div id="sidebar" class="fixed top-0 right-0 h-full w-64 bg-white shadow-lg transform translate-x-full transition-transform duration-300 z-50">
      <div class="flex justify-between items-center px-6 py-4 bg-gray-100 border-b">
        <span class="affare-text text-black text-xl">Menu</span>
        <button id="close-sidebar" class="focus:outline-none">
          <svg class="h-6 w-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <nav class="p-4 space-y-4">
        <a href="#" class="block text-gray-700 font-bold hover:text-blue-600">Eksplor</a>
        <a href="#" class="block text-gray-700 font-bold hover:text-blue-600">Perusahaan</a>
        <a href="#" class="block text-gray-700 font-bold hover:text-blue-600">Tersimpan</a>
        <a href="#" class="block text-gray-700 font-bold hover:text-blue-600">Terdaftar</a>
      </nav>
    </div>

    <script>
      const hamburgerButton = document.getElementById('hamburger-button');
      const sidebar = document.getElementById('sidebar');
      const closeSidebar = document.getElementById('close-sidebar');
      const body = document.body;

      // Show Sidebar
      hamburgerButton.addEventListener('click', () => {
        sidebar.classList.remove('translate-x-full'); // Ubah untuk muncul dari kanan
        body.classList.add('overflow-hidden');
      });

      // Hide Sidebar
      closeSidebar.addEventListener('click', () => {
        sidebar.classList.add('translate-x-full'); // Ubah untuk sembunyi ke kanan
        body.classList.remove('overflow-hidden');
      });
    </script>
  </body>
