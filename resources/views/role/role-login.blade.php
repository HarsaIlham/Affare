<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affare!</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-stone-100 items-center min-h-screen">

    <header class="pt-4 pl-4">
        <a href="/">
            <img src="{{ asset('storage/images/logo-affare.png') }}" class="" alt="Logo Affare">
        </a>

    </header>
    <div class="flex items-center min-h-[90vh] justify-center flex-col ">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-gray-800">Selamat Datang di <span class="text-blue-600">Affare!</span>
            </h1>
        </div>
        <div class="bg-white pt-6 px-8 pb-10 rounded-2xl shadow-lg items-center md:flex-row md:items-start">
            <p class="text-black font-bold mt-0 text-center pb-4">Masuk sebagai?</p>
            <div class="  flex justify-center gap-8">
                <!-- Applicant Section -->
                <div class="bg-[#5D8DE2] rounded-tl-[87px] rounded-tr-[15px] rounded-bl-[87px] rounded-br-[87px] shadow-lg p-6 w-72 hover:bg-blue-400 cursor-pointer"
                    onclick="window.location.href = '{{ route('loginseeker') }}'">
                    <h2 class="text-xl font-semibold text-white mb-4 text-center">Applicant</h2>
                    <ul class="text-white text-center space-y-2">
                        <li>✔ Mencari Lowongan</li>
                        <li>✔ Melamar Pekerjaan</li>
                    </ul>
                    <div class="flex justify-center mt-4">
                        <img src="{{ asset('storage/images/role-login.png') }}" alt="Applicant Illustration"
                            class="w-32 h-auto">
                    </div>
                </div>
                <!-- Employer Section -->
                <div class="bg-[#E1EFFF] rounded-tl-[15px] rounded-tr-[87px] rounded-bl-[87px] rounded-br-[87px] shadow-lg p-6 w-72 hover:bg-blue-200 cursor-pointer"
                    onclick="window.location.href = '{{ route('logincompany') }}'">
                    <h2 class="text-xl font-semibold text-blue-600 mb-4 text-center">Employer</h2>
                    <ul class="text-blue-500 text-center space-y-2">
                        <li>✔ Upload Lowongan</li>
                        <li>✔ Mencari Kandidat</li>
                    </ul>
                    <div class="flex justify-center mt-4">
                        <img src="{{ asset('storage/images/employer-ilustration.png') }}" alt="Employer Ilustration"
                            class="w-32 h-auto">
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>

</html>
