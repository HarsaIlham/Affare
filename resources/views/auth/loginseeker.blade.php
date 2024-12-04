<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Login</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="bg-stone-100 flex items-center justify-center min-h-screen w-full flex-col">

    <div>
        <h2 class="text-2xl font-bold text-gray-800 text-center">Masuk Sebagai Applicant</h2>
        <p class="text-gray-500 text-center mb-6">Selamat Datang! Silahkan masuk menggunakan akun anda.</p>
    </div>
    <div class="bg-white p-8 rounded-lg shadow-lg  flex flex-col items-center md:flex-row md:items-start">
        <div class="w-full md:w-1/2 mb-6 md:mb-0">
            <form action="{{ route('authenticate') }}" method="POST" class="w-96">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                    <input type="email" id="email" name="email" required autofocus placeholder="Masukkan email"
                        class="w-full mt-2 p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-200 @error('email')
                            border-red-500
                        @enderror">
                    @error('email')
                        <div class="text-red-500 text-xs">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                    <div class="relative">
                        <input type="password" id="password" name="password" placeholder="Masukkan Password"
                            class="w-full mt-2 p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-200 @error('password')
                                border-red-500
                            @enderror">
                        @error('password')
                            <div class="text-red-500 text-xs">{{ $message }}</div>
                        @enderror
                        <button type="button" class="absolute inset-y-0 right-3 flex items-center text-gray-500"
                            id="togglepassword">
                            🙉
                        </button>
                    </div>
                </div>

                <div class="flex items-center justify-between mb-4">
                    <a href="#" class="text-sm text-blue-500 hover:underline">Forgot Password?</a>
                </div>

                <button type="submit"
                    class="w-full bg-blue-500 text-white py-3 rounded-lg hover:bg-blue-600 transition">Masuk</button>
            </form>

            <p class="text-center mt-6 text-sm text-gray-600">Belum punya akun? <a href="{{ route('role-register') }}"
                    class="text-blue-500 hover:underline">Daftar</a></p>
        </div>
        <div class="w-96 md:w-1/2 flex justify-center items-center">
            <img src="{{ asset('storage/images/image-login.png') }}" alt="">
        </div>
    </div>
    
    <script>
        const passwordInput = document.getElementById("password");
        const togglePasswordButton = document.getElementById("togglepassword");

        togglePasswordButton.addEventListener("click", () => {
            const type = passwordInput.type === "password" ? "text" : "password";
            passwordInput.type = type;

            togglePasswordButton.textContent = type === "password" ? "🙉" : "🙈";
        });
    </script>
</body>

</html>
