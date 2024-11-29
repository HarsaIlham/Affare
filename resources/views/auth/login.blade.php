<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Login</title>
</head>

<body>
    <!-- component -->
    <section class="flex flex-col md:flex-row h-screen items-center bg-indigo-400">
        <div
            class="rounded-lg bg-white w-full md:max-w-md lg:max-w-full md:mx-auto  md:w-1/2 xl:w-1/3 px-6 lg:px-16 xl:px-12 flex items-center justify-center shadow-slate-500 shadow-lg pb-3">
            <div class="w-full h-100">


                <h1 class="text-xl md:text-2xl font-bold leading-tight mt-12">Log in to your account</h1>

                <form class="mt-6" action="#" method="#" id="log">
                    <div>
                        <label class="block text-gray-700" for="email">Email Address</label>
                        <input type="email" name="email" id="email" placeholder="Masukkan email anda"
                            class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none"
                            autofocus autocomplete required>
                    </div>

                    <div class="mt-4">
                        <label class="block text-gray-700" for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Masukkan password" minlength="6"
                            class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500
                                focus:bg-white focus:outline-none"
                            required>
                    </div>

                    <div class="text-right mt-2">
                        <a href="#"
                            class="text-sm font-semibold text-gray-700 hover:text-blue-700 focus:text-blue-700">Forgot
                            Password?</a>
                    </div>

                    <button type="submit" name="login" id="login"
                        class="w-full block bg-indigo-500 hover:bg-indigo-400 focus:bg-indigo-400 text-white font-semibold rounded-lg px-4 py-3 mt-6">Log
                        In</button>
                </form>

                <hr class="my-6 border-gray-300 w-full">
                <p class="mt-8">Need an account? <a href="{{ route('auth.role') }}"
                        class="text-blue-500 hover:text-blue-700 font-semibold">Create an
                        account</a></p>


            </div>
        </div>

    </section>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const form = document.getElementById('log');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Login Successful!',
                icon: 'success',
                confirmButtonText: 'Okay'
            // }).then((result) => {
            //     if (result.isConfirmed) {
            //         window.location.href = 'contact';
            //     }
            });
            ;
        });
    </script>
</body>

</html>
