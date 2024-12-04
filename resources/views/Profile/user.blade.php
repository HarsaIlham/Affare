@extends('components.template')

@section('title', 'Profil')

@section('content')
<body class="bg-gray-100">
    <div class="max-w-3xl mx-auto mt-10 bg-white shadow-lg rounded-lg px-10">
        <div class="flex items-center p-6 bg-blue-500 border-b">
            <div
                class="w-16 h-16 bg-gray-300 rounded-full flex items-center justify-center text-white text-lg font-bold">
                <span>WJ</span>
            </div>
            <div class="ml-4">
                <h1 class="text-xl font-semibold text-white">Wahyu J - Maulidan</h1>
                <button class="text-yellow-400 hover:underline text-sm">Edit Profile</button>
            </div>
        </div>

        <div class="flex mt-6">
            <!-- Sidebar -->
            <div class="w-1/4 bg-gray-50 p-4 border-r">
                <ul class="space-y-2">
                    <li>
                        <a href="#"
                            class="block p-3 rounded-md text-blue-600 font-semibold active:text-blue-800 transition-all duration-200">
                            Informasi Umum
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="block p-3 rounded-md text-gray-700 hover:text-blue-600 active:text-blue-800 transition-all duration-200">
                            CV & Portfolio
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="block p-3 rounded-md text-gray-700 hover:text-blue-600 active:text-blue-800 transition-all duration-200">
                            Ubah Kata Sandi
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Profile Content -->
            <div class="w-3/4 p-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Informasi Umum</h2>
                <!-- Tabel Informasi -->
                <div>
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="py-2 px-4 border-b font-medium text-gray-600">Informasi</th>
                                <th class="py-2 px-4 border-b font-medium text-gray-600">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="py-2 px-4 border-b text-gray-700">Email</td>
                                <td class="py-2 px-4 border-b text-gray-700">wahyujumahm@gmail.com</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b text-gray-700">WhatsApp Number</td>
                                <td class="py-2 px-4 border-b text-gray-700">6281230487747</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b text-gray-700">Lokasi</td>
                                <td class="py-2 px-4 border-b text-gray-700">Indramayu, Jawa Barat</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b text-gray-700">LinkedIn URL</td>
                                <td class="py-2 px-4 border-b text-gray-700">https://www.linkedin.com/in/username</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- CV and Portfolio (Without Backend) -->
                <div class="mt-6">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-600">CV</label>
                            <!-- Placeholder for CV (Link or Text) -->
                            <a href="#" class="text-blue-500 hover:underline">
                                Lihat CV (Jika sudah diupload)
                            </a>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Portfolio</label>
                            <!-- Placeholder for Portfolio (Image or Text) -->
                            <img src="https://via.placeholder.com/150" alt="Portfolio" class="w-32 h-32 object-cover rounded-md">
                            <!-- Or if you have a link: -->
                            <!-- <a href="#" class="text-blue-500 hover:underline">Lihat Portfolio</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
