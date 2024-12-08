<head>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;900&display=swap" rel="stylesheet">
    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Montserrat', sans-serif;
        }

        .affare-text {
            font-weight: 700;
            font-size: 1.75rem;
        }

        a {
            font-weight: 500;
            font-size: 1rem;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        a:hover, .nav-link.active {
            color: #3b6fc3; 
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
        }

        .custom-button-text {
            color: white;
            font-size: 1rem;
            font-weight: bold;
        }

        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 50px;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        nav {
            flex-grow: 1;
            display: flex;
            justify-content: center;
            gap: 2rem;
        }

        nav a {
            color: gray;
            font-size: 1.1rem;
            font-weight: 600;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        nav a:hover, nav a.active {
            color: #3b6fc3;
        }
    </style>
</head>

<body class="bg-gray-50">
    <header>
        <div class="flex items-center space-x-2">
            <img src="{{ asset('storage/header-resource/affare-icon.webp') }}" alt="Logo" class="h-8">
            <span class="affare-text text-black">Affare<span style="color: #5d8de2;">!</span></span>
        </div>

        <nav>
            <a href="{{ route('companydashboard') }}" class="nav-link">Dashboard</a>
            <a href="{{ route('company.lowongancompany') }}" class="nav-link">Lowongan Saya</a>
            <a href="#" class="nav-link">Pelamar</a>
            {{-- <a href="#" class="nav-link">Kandidat Tersimpan</a> --}}
        </nav>


        

        <div class="hidden md:flex items-center space-x-4">
            
            <a href="{{route('company.profile.user-company')}}">
                <img src="{{ asset('storage/header-resource/profile-user.webp') }}" alt="user-profile"
                class="h-8 w-8 rounded-full">
            </a>
        </div>
    </header>

    <script>
        const navLinks = document.querySelectorAll('.nav-link');

        function highlightActiveLink() {
            const currentUrl = window.location.href;

            navLinks.forEach(link => {
                if (currentUrl.includes(link.getAttribute('href'))) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            });
        }

    
        highlightActiveLink();


        window.addEventListener('popstate', highlightActiveLink);


        navLinks.forEach(link => {
            link.addEventListener('click', function () {
                navLinks.forEach(nav => nav.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
</body>
