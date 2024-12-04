@extends('components.template')

@section('title', 'Lamaran Terdaftar')

@section('content')

    <body class="bg-blue-50">
        <div class="container mx-auto px-4 py-6">
            <h2 class="text-lg font-bold mb-4">Lamaran Terdaftar</h2>
            <div class="flex flex-col gap-4">

                <!-- Card untuk lamaran dengan status Pending -->
                <div class="bg-white rounded-md shadow-md p-4">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-yellow-500 font-semibold text-sm">PENDING</span>
                        <span class="text-sm text-gray-600">2 Desember 2024</span>
                    </div>
                    <h3 class="text-lg font-bold mb-1">Technical Support Specialist</h3>
                    <p class="text-sm text-gray-500 mb-2">Google Inc.</p>
                    <p class="text-sm text-gray-500 mb-4">Jawa Timur, Indonesia</p>
                    <div class="flex items-center justify-between">
                        <button class="text-blue-600 font-semibold">Lihat Detail</button>
                        <button class="bg-yellow-500 text-white px-4 py-2 rounded-md cursor-not-allowed">
                            Berkas Diproses
                        </button>
                    </div>
                </div>

                <!-- Card untuk lamaran dengan status Diterima -->
                <div class="bg-white rounded-md shadow-md p-4">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-green-600 font-semibold text-sm">DITERIMA</span>
                        <span class="text-sm text-gray-600">1 Desember 2024</span>
                    </div>
                    <h3 class="text-lg font-bold mb-1">Senior UI/UX Designer</h3>
                    <p class="text-sm text-gray-500 mb-2">Apple</p>
                    <p class="text-sm text-gray-500 mb-4">Jawa Tengah, Indonesia</p>
                    <div class="flex items-center justify-between">
                        <button class="text-blue-600 font-semibold">Lihat Detail</button>
                        <button class="bg-green-500 text-white px-4 py-2 rounded-md">
                            Diterima
                        </button>
                    </div>
                </div>

                <!-- Card untuk lamaran dengan status Ditolak -->
                <div class="bg-white rounded-md shadow-md p-4">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-red-600 font-semibold text-sm">DITOLAK</span>
                        <span class="text-sm text-gray-600">30 November 2024</span>
                    </div>
                    <h3 class="text-lg font-bold mb-1">Data Scientist Intern</h3>
                    <p class="text-sm text-gray-500 mb-2">IBM</p>
                    <p class="text-sm text-gray-500 mb-4">Jawa Barat, Indonesia</p>
                    <div class="flex items-center justify-between">
                        <button class="text-blue-600 font-semibold">Lihat Detail</button>
                        <button class="bg-red-500 text-white px-4 py-2 rounded-md">
                            Ditolak
                        </button>
                    </div>
                </div>

            </div>
        </div>
        <div class="mb-24"></div>
    </body>
@endsection
