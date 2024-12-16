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

        .custom-button {
            width: 130px;
            height: 40px;
            padding: 9px 20px;
            background-color: #5d8de2;
            border-radius: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 2.5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .custom-button:hover {
            background-color: #1f437e;
            /* Darker blue on hover */
        }

        .custom-button-text {
            color: white;
            font-size: 1rem;
            font-weight: bold;
        }
    </style>
</head>

<body class="bg-gray-50">
    <header class="bg-white shadow">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <a href="{{ route('homepage-seeker') }}">
                    <img src="{{ asset('storage/header-resource/affare-icon.webp') }}" alt="Logo" class="h-8">
                </a>
                <span class="affare-text text-black">Affare<span class="text-blue-400">!</span></span>
            </div>

            <button id="hamburger-button" class="md:hidden focus:outline-none">
                <svg class="h-6 w-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>

            <n id="navbar" class="hidden md:flex space-x-6 text-gray-600">
                <a href="{{ route('homepage-seeker') }}"
                    class="font-bold hover:text-blue-600 {{ request()->routeIs('homepage-seeker') ? 'text-blue-600' : '' }}">Eksplor</a>
                <a href="{{ route('perusahaan') }}"
                    class="font-bold hover:text-blue-600 {{ request()->routeIs('perusahaan') ? 'text-blue-600' : '' }}">Perusahaan</a>
                <a href="{{ route('terdaftar') }}"
                    class="font-bold hover:text-blue-600 {{ request()->routeIs('terdaftar') ? 'text-blue-600' : '' }}">Terdaftar</a>
            </n>


            <div class="hidden md:flex items-center space-x-4">
                @if (Auth::guard('seeker')->check())
                    <a href="{{ route('profile-seeker') }}" class="flex gap-8">
                        {{ auth('seeker')->user()->nama }}
                        <img src="{{ asset('storage/' . auth('seeker')->user()->foto_profil) }}" alt="foto profil"
                            class="h-8 w-8 rounded-full">
                    </a>
                @else
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('login') }}"
                            class="hover:text-indigo-900 text-indigo-600 font-bold text-xl">Masuk</a>
                        <a href="{{ route('role-register') }}" class="custom-button">
                            <div class="custom-button-text">Daftar</div>
                        </a>
                    </div>
                @endif

            </div>
        </div>
    </header>

    <div id="sidebar"
        class="fixed top-0 right-0 h-full w-64 bg-white shadow-lg transform translate-x-full transition-transform duration-300 z-50">
        <div class="flex justify-between items-center px-6 py-4 bg-gray-100 border-b">
            <span class="affare-text text-black text-xl">Menu</span>
            <button id="close-sidebar" class="focus:outline-none">
                <svg class="h-6 w-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <nav class="p-4 space-y-4">
            <a href="{{ route('homepage-seeker') }}"
                class="font-bold hover:text-blue-600 {{ request()->routeIs('homepage-seeker') ? 'text-blue-600' : '' }}">Eksplor</a>
            <a href="{{ route('perusahaan') }}"
                class="font-bold hover:text-blue-600 {{ request()->routeIs('Perusahaan') ? 'text-blue-600' : '' }}">Perusahaan</a>
            <a href="#" class="block text-gray-700 font-bold hover:text-blue-600">Tersimpan</a>
            <a href="{{ route('terdaftar') }}" class="block text-gray-700 font-bold hover:text-blue-600">Terdaftar</a>
        </nav>
    </div>

    <script>
        const hamburgerButton = document.getElementById('hamburger-button');
        const sidebar = document.getElementById('sidebar');
        const closeSidebar = document.getElementById('close-sidebar');
        const body = document.body;

        hamburgerButton.addEventListener('click', () => {
            sidebar.classList.remove('translate-x-full');
            body.classList.add('overflow-hidden');
        });

        closeSidebar.addEventListener('click', () => {
            sidebar.classList.add('translate-x-full');
            body.classList.remove('overflow-hidden');
        });
    </script>
</body>
