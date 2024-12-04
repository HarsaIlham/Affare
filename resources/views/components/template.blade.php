<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>@yield('title')</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .step { display: none; }
        .step.active { display: block; }
    </style>
</head>

<body class="min-h-screen flex flex-col bg-white ">
    <header>
        <x-header></x-header>
    </header>
    <main class="flex-grow">
        @yield('content')
    </main>
    <footer>
        <x-footer></x-footer>
    </footer>
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('profile-preview');
                document.querySelector('span').style.display = 'none';
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }

    </script>
</body>

</html>
