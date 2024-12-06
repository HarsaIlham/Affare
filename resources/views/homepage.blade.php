@extends('components.template')

@section('title', 'Homepage')

@section('content')


    <body class="bg-blue-50">
        @if (session('success'))
            <script>
                Swal.fire({
                    icon: "success",
                    title: "Login Berhasil!",
                    showConfirmButton: true,
                    ConfirmbuttonText: "OK"
                });
            </script>
        @endif
        @if (session('logout_success'))
            <script>
                Swal.fire({
                    icon: "success",
                    title: "Anda telah logout!",
                    showConfirmButton: true,
                    ConfirmbuttonText: "OK"
                });
            </script>
        @endif

        <div class="bg-blue-500 text-white py-20 relative">
            <div class="container mx-auto px-4 text-center relative z-10">
                <h1 class="text-3xl font-bold mb-4">Temukan peluangmu di sini!</h1>
                <div class="flex justify-center relative">
                    <input type="text" placeholder="Cari Lowongan"
                        class="w-full max-w-md px-4 py-2 rounded-l-md border border-gray-300 focus:outline-none" />
                    <button class="bg-blue-600 px-6 py-2 text-white font-semibold rounded-r-md hover:bg-blue-700">
                        Cari
                    </button>
                </div>
            </div>


            <img src="{{ asset('storage/homepage-resource/element-section.webp') }}" alt="Illustration"
                class="absolute bottom-0 right-0 w-1/3 lg:w-1/4 h-auto object-cover opacity-50 md:opacity-100 z-0" />
        </div>


        <form action="#" method="#">
            <div class="container mx-auto px-4 py-6">
                <div class="flex flex-wrap items-center gap-4 justify-start">
                    <select class="w-40 px-4 py-2 border rounded-md">
                        <option disabled selected>Jenis</option>
                        <option>Part-time</option>
                        <option>Internship</option>
                    </select>
                    <select class="w-40 px-4 py-2 border rounded-md">
                        <option disabled selected>Tipe</option>
                        <option>On-Site</option>
                        <option>Hybrid</option>
                        <option>Remote</option>
                    </select>
                    <select class="w-40 px-4 py-2 border rounded-md">
                        <option disabled selected>Lokasi</option>
                        @foreach ($provinces as $province)
                            <option value="{{ $province->id }}">{{ $province->nama }}
                            </option>
                        @endforeach
                    </select>
                    <select class="w-40 px-4 py-2 border rounded-md">
                        <option disabled selected>Gaji</option>
                        <option value="500000-2500000">Rp 500.000 - Rp 2.500.000</option>
                        <option value="2500000-4000000">Rp 2.500.000 - Rp 4.000.000</option>
                        <option value="4000000-5000000">Rp 4.000.000 - Rp 5.000.000</option>
                        <option value="> 5000000">> Rp 5.000.000</option>
                    </select>
                    <select class="w-40 px-4 py-2 border rounded-md">
                        <option>Terbaru</option>
                        <option>Gaji Tertinggi</option>
                    </select>
                    <button class="px-4 py-2 bg-[#5d8de2] text-white rounded-md hover:bg-[#4a79c9]">
                        Filter
                    </button>
                    <button type="reset" class="px-4 py-2 bg-gray-200 rounded-md">Reset</button>
                </div>
            </div>
        </form>


        <div class="container mx-auto px-4">
            <h2 class="text-lg font-bold mb-4">Semua Lowongan (2310)</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <div class="bg-white rounded-md shadow-md p-4">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-green-600 font-semibold text-sm">PART-TIME</span>
                        <span class="text-sm text-gray-600">Gaji: 2.000.000 IDR - 3.000.000 IDR</span>
                    </div>
                    <h3 class="text-lg font-bold mb-1">Technical Support Specialist</h3>
                    <p class="text-sm text-gray-500 mb-2">Google Inc.</p>
                    <p class="text-sm text-gray-500 mb-4">Jawa Timur, Indonesia</p>
                    <div class="flex items-center justify-between">
                        <button class="text-blue-600 font-semibold">Lihat Detail</button>
                        <button class="bg-blue-500 text-white px-4 py-2 rounded-md">Lamar</button>
                    </div>
                </div>

                <div class="bg-white rounded-md shadow-md p-4">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-green-600 font-semibold text-sm">INTERNSHIP</span>
                        <span class="text-sm text-gray-600">Gaji: 2.000.000 IDR - 3.000.000 IDR</span>
                    </div>
                    <h3 class="text-lg font-bold mb-1">Senior UI/UX Designer</h3>
                    <p class="text-sm text-gray-500 mb-2">Apple</p>
                    <p class="text-sm text-gray-500 mb-4">Jawa Tengah, Indonesia</p>
                    <div class="flex items-center justify-between">
                        <button class="text-blue-600 font-semibold">Lihat Detail</button>
                        <button class="bg-blue-500 text-white px-4 py-2 rounded-md">Lamar</button>
                    </div>
                </div>


                <div class="bg-white rounded-md shadow-md p-4">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-green-600 font-semibold text-sm">FULL-TIME</span>
                        <span class="text-sm text-gray-600">Gaji: 4.000.000 IDR - 6.000.000 IDR</span>
                    </div>
                    <h3 class="text-lg font-bold mb-1">Software Engineer</h3>
                    <p class="text-sm text-gray-500 mb-2">Microsoft</p>
                    <p class="text-sm text-gray-500 mb-4">Jakarta, Indonesia</p>
                    <div class="flex items-center justify-between">
                        <button class="text-blue-600 font-semibold">Lihat Detail</button>
                        <button class="bg-blue-500 text-white px-4 py-2 rounded-md">Lamar</button>
                    </div>
                </div>


                <div class="bg-white rounded-md shadow-md p-4">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-green-600 font-semibold text-sm">PART-TIME</span>
                        <span class="text-sm text-gray-600">Gaji: 3.000.000 IDR - 4.000.000 IDR</span>
                    </div>
                    <h3 class="text-lg font-bold mb-1">Marketing Specialist</h3>
                    <p class="text-sm text-gray-500 mb-2">Facebook</p>
                    <p class="text-sm text-gray-500 mb-4">Jawa Timur, Indonesia</p>
                    <div class="flex items-center justify-between">
                        <button class="text-blue-600 font-semibold">Lihat Detail</button>
                        <button class="bg-blue-500 text-white px-4 py-2 rounded-md">Lamar</button>
                    </div>
                </div>

                <div class="bg-white rounded-md shadow-md p-4">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-green-600 font-semibold text-sm">INTERNSHIP</span>
                        <span class="text-sm text-gray-600">Gaji: 2.500.000 IDR - 3.500.000 IDR</span>
                    </div>
                    <h3 class="text-lg font-bold mb-1">Data Scientist Intern</h3>
                    <p class="text-sm text-gray-500 mb-2">IBM</p>
                    <p class="text-sm text-gray-500 mb-4">Jawa Barat, Indonesia</p>
                    <div class="flex items-center justify-between">
                        <button class="text-blue-600 font-semibold">Lihat Detail</button>
                        <button class="bg-blue-500 text-white px-4 py-2 rounded-md">Lamar</button>
                    </div>
                </div>

                <div class="bg-white rounded-md shadow-md p-4">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-green-600 font-semibold text-sm">INTERNSHIP</span>
                        <span class="text-sm text-gray-600">Gaji: 5.000.000 IDR - 7.000.000 IDR</span>
                    </div>
                    <h3 class="text-lg font-bold mb-1">Product Manager</h3>
                    <p class="text-sm text-gray-500 mb-2">Amazon</p>
                    <p class="text-sm text-gray-500 mb-4">Bali, Indonesia</p>
                    <div class="flex items-center justify-between">
                        <button class="text-blue-600 font-semibold">Lihat Detail</button>
                        <button class="bg-blue-500 text-white px-4 py-2 rounded-md">Lamar</button>
                    </div>
                </div>
            </div>


            <div class="flex justify-center mt-6">
                <nav class="inline-flex rounded-md shadow-sm">
                    <a href="#"
                        class="px-3 py-2 bg-white text-gray-500 border border-gray-300 rounded-l-md hover:bg-blue-100">
                        Sebelumnya
                    </a>
                    <a href="#" class="px-3 py-2 bg-white text-gray-500 border border-gray-300 hover:bg-blue-100">
                        1
                    </a>
                    <a href="#" class="px-3 py-2 bg-white text-gray-500 border border-gray-300 hover:bg-blue-100">
                        2
                    </a>
                    <a href="#" class="px-3 py-2 bg-white text-gray-500 border border-gray-300 hover:bg-blue-100">
                        3
                    </a>
                    <a href="#"
                        class="px-3 py-2 bg-white text-gray-500 border border-gray-300 rounded-r-md hover:bg-blue-100">
                        Selanjutnya
                    </a>
                </nav>
            </div>
        </div>
        <div class="mb-24"></div>


    </body>
@endsection
