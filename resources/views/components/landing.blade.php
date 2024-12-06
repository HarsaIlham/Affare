{{-- @extends('components.template') --}}


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
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <link rel="shortcut icon" type="image/png/jpg" href="storage/logo-affare.png">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">


    <style>
        .step {
            display: none;
        }

        .step.active {
            display: block;
        }

        header {
            margin-top: 20px;
            /* Tambahkan jarak dari atas */
        }
    </style>
</head>

<body class="min-h-screen flex flex-col bg-white ">
    @include('components.headerlanding')
    <main class="flex-grow">
        <div id="landing"class="w-full h-[650px] flex justify-center items-center relative bg-[#5d8de2] rounded-[35px] mb-[120px]"
            data-aos="fade-up">
            <div
                class="absolute bottom-0 left-[174px] w-[1105px] h-[150px] bg-[#d4e4f8]/30 rounded-tl-[30px] rounded-tr-[30px]">
            </div>
            <div class="absolute flex flex-col md:flex-row w-full max-w-[1700px] h-full">
                <div class="absolute top-[30px] right-[50px]" data-aos="fade-left">
                    <h1 class="text-[220px] font-bold font-['Montserrat'] text-white leading-none">Ciao!</h1>
                </div>
                <div class="absolute top-[55px] left-[55px]" data-aos="fade-right">
                    <p class="text-[75px] font-bold font-['Montserrat'] text-white leading-snug">
                        Langkah Awal <br>
                        Menuju Pekerjaan <br>
                        Impianmu!
                    </p>
                </div>
                <div class="absolute top-[370px] left-[55px]" data-aos="fade-up">
                    <p class="text-xl font-semibold font-['Montserrat'] text-[#d4e4f8]">
                        <span class="font-extrabold">Affare</span> Menyediakan Peluang Karir di Berbagai
                        <br>
                        Sektor Terpercaya yang Menantimu.
                    </p>
                </div>
                <div class="absolute top-[460px] left-[116px]" data-aos="zoom-in">
                    <a href="{{ route('homepage-seeker') }}"
                        class="px-[22px] py-[18px] w-[280px] h-[86px] bg-[#234889] text-2xl font-bold font-['Montserrat'] text-white rounded-[20px] flex justify-center items-center shadow-lg transition hover:bg-[#1a2f5e] hover:text-white">
                        Mulai Sekarang
                    </a>
                </div>
                <div class="absolute right-[-3px] top-[247px] w-[770px]" data-aos="fade-left">
                    <img src="{{ asset('storage/landing-resource/illustration-1-affare.webp') }}" alt="Ilustrasi"
                        class="w-full h-auto origin-top-left">
                </div>
            </div>
        </div>

        <!-- Section Tentang Kami -->
        <div id="tentang-kami" class="w-full bg-white flex flex-col items-center py-[50px] mb-[100px]"
            data-aos="fade-up">
            <div class="text-center mb-[30px]">
                <h2 class="text-[32px] font-bold text-black font-['Montserrat']">Tentang Kami</h2>
            </div>
            <div class="text-center mb-[40px]">
                <h3 class="text-5xl font-bold text-[#5d8de2] font-['Montserrat'] leading-[50px]">
                    Akses Mudah Peluang Internship & Part-Time
                </h3>
            </div>
            <div class="text-center max-w-[900px] px-[20px]" data-aos="fade-up">
                <p class="text-lg text-gray-700 font-['Montserrat'] leading-[30px]">
                    Kami menyediakan platform terutama bagi mahasiswa dan pelajar untuk mengakses peluang magang dan
                    pekerjaan
                    paruh waktu yang ada di Indonesia. Tujuan kami adalah membantu meningkatkan keterampilan profesional
                    dan
                    mendukung pertumbuhan ekonomi melalui kesempatan kerja yang layak.
                </p>
            </div>
        </div>

        <!-- Section Peta Indonesia -->
        <div class="w-full bg-white flex flex-col items-center py-[50px]" data-aos="fade-up">
            <div class="text-center mb-[20px]">
                <h2 class="text-[32px] font-bold text-black font-['Montserrat']">Temukan peluang di kota besar atau
                    sekitarmu
                </h2>
            </div>
            <div class="flex justify-center">
                <img src="{{ asset('storage/landing-resource/illustration-2-affare.webp') }}"
                    alt="Ilustrasi Peta Indonesia" class="w-auto max-h-[500px]">
            </div>
        </div>

        <!-- Section Illustrasi -->
        <div class="w-full bg-white flex justify-center gap-[30px] py-[150px]">
            <img src="{{ asset('storage/landing-resource/illustration-3-affare.webp') }}" alt="Ilustrasi Applicant"
                class="w-[500px] h-auto" data-aos="fade-right">
            <img src="{{ asset('storage/landing-resource/illustration-4-affare.webp') }}" alt="Ilustrasi Employer"
                class="w-[500px] h-auto" data-aos="fade-left">
        </div>

        <!-- Section Ilustrasi 5 -->
        <div class="w-full bg-white flex justify-center gap-[30px] py-[50px]" data-aos="fade-up">
            <img src="{{ asset('storage/landing-resource/illustration-5-affare.webp') }}" alt="Ilustrasi 5"
                class="w-[1500px] h-auto">
        </div>

        <div id="faq" class="w-full bg-white py-[50px] flex flex-col items-start px-[100px]" data-aos="fade-up">
            <div class="mb-[20px]">
                <h2 class="text-[32px] font-bold text-black font-['Montserrat']">FAQ</h2>
            </div>
            <div class="mb-[40px]">
                <h3 class="text-5xl font-bold text-[#5d8de2] font-['Montserrat'] leading-[50px]">
                    Pertanyaan yang sering diajukan
                </h3>
            </div>
            <div class="w-full">

                <!-- Pertanyaan 1 -->
                <div class="border-b-[1px] border-gray-300 py-[15px]">
                    <div class="flex justify-between items-center cursor-pointer" onclick="toggleFaq(1)">
                        <p class="text-[20px] font-semibold text-black font-['Montserrat']">
                            Apa perbedaan antara magang dan pekerjaan paruh waktu di platform ini?
                        </p>
                        <span id="icon-1" class="text-[#5d8de2] text-2xl font-bold">▾</span>
                    </div>
                    <div id="answer-1"
                        class="hidden max-h-0 overflow-hidden transition-all duration-500 ease-in-out mt-[10px] text-gray-700 text-[18px]">
                        Magang/Internship adalah program pembelajaran di tempat kerja dengan fokus pada pengembangan
                        keterampilan, sedangkan pekerjaan paruh waktu/Part-time adalah posisi kerja dengan jam kerja
                        terbatas.
                    </div>
                </div>

                <!-- Pertanyaan 2 -->
                <div class="border-b-[1px] border-gray-300 py-[15px]">
                    <div class="flex justify-between items-center cursor-pointer" onclick="toggleFaq(2)">
                        <p class="text-[20px] font-semibold text-black font-['Montserrat']">
                            Apakah website ini hanya menyediakan peluang di kota besar?
                        </p>
                        <span id="icon-2" class="text-[#5d8de2] text-2xl font-bold">▾</span>
                    </div>
                    <div id="answer-2"
                        class="hidden max-h-0 overflow-hidden transition-all duration-500 ease-in-out mt-[10px] text-gray-700 text-[18px]">
                        Tentu tidak, platform ini menyediakan peluang dari yang ada di seluruh Indonesia.
                    </div>
                </div>

                <!-- Pertanyaan 3 -->
                <div class="border-b-[1px] border-gray-300 py-[15px]">
                    <div class="flex justify-between items-center cursor-pointer" onclick="toggleFaq(3)">
                        <p class="text-[20px] font-semibold text-black font-['Montserrat']">
                            Apakah layanan ini berbayar?
                        </p>
                        <span id="icon-3" class="text-[#5d8de2] text-2xl font-bold">▾</span>
                    </div>
                    <div id="answer-3"
                        class="hidden max-h-0 overflow-hidden transition-all duration-500 ease-in-out mt-[10px] text-gray-700 text-[18px]">
                        Layanan ini gratis untuk pelamar kerja. Kami percaya bahwa akses ke peluang karir adalah hak
                        semua
                        orang.
                    </div>
                </div>

            </div>
        </div>
    </main>
    <footer>
        <x-footer></x-footer>
    </footer>
    <script>
        function toggleFaq(id) {
            const answer = document.getElementById(`answer-${id}`);
            const icon = document.getElementById(`icon-${id}`);

            if (answer.classList.contains('hidden')) {
                answer.classList.remove('hidden');
                answer.style.maxHeight = answer.scrollHeight + "px"; // Sesuaikan tinggi dengan isi konten
                icon.style.transform = "rotate(180deg)"; // Animasi rotasi ikon
            } else {
                answer.style.maxHeight = "0"; // Tutup animasi
                answer.classList.add('hidden');
                icon.style.transform = "rotate(0deg)"; // Kembali ke posisi awal
            }
        }

        AOS.init({
            duration: 1000,
            easing: 'ease',
            once: true
        });
    </script>
</body>

</html>
