<head>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;900&display=swap" rel="stylesheet">
    <style>
        /* Menambahkan Smooth Scroll ke halaman */
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
            color: #3b6fc3; /* Warna hover dan aktif */
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
            background-color: #1f437e; /* Darker blue on hover */
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

        nav a:hover {
            color: #3b6fc3;
        }

        .masuk-link {
            color: #5d8de2;
            text-decoration: none;
            transition: color 0.3s ease;
            font-weight: 600;
        }

        .masuk-link:hover {
            color: #3b6fc3;
            
        }
    </style>
</head>

<body class="bg-gray-50">
    <header>
        <div class="flex items-center space-x-2">
            <!-- Logo Section -->
            <img src="{{ asset('storage/header-resource/affare-icon.webp') }}" alt="Logo" class="h-8">
            <span class="affare-text text-black">Affare<span style="color: #5d8de2;">!</span></span>
        </div>

        <!-- Navigation -->
        <nav>
            <a href="#landing" class="nav-link">Beranda</a>
            <a href="#tentang-kami" class="nav-link">Tentang Kami</a>
            <a href="#faq" class="nav-link">FAQ</a>
        </nav>

        <!-- Action Buttons -->
        <div class="flex items-center space-x-4">
            <a href="{{ route('login') }}" class="hover:text-indigo-900 masuk-link" >Masuk</a>
            <a href="{{ route('role-register') }}" class="custom-button">
                <div class="custom-button-text">Daftar</div>
            </a>
        </div>
    </header>

    <!-- JavaScript untuk Menyoroti Tautan Aktif -->
    <script>
        const navLinks = document.querySelectorAll('.nav-link');

        // Highlight link aktif berdasarkan URL saat ini
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

        // Jalankan saat halaman dimuat
        highlightActiveLink();

        // Pastikan fungsi tetap berjalan saat ada perubahan URL
        window.addEventListener('popstate', highlightActiveLink);
    </script>
</body>
