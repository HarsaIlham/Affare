@extends('components.template')

@section('title', 'Profil')

@section('content')
    <body class="bg-gray-100">
        <div>
            @include('components.profil-card')
        </div>

        <div class="flex mt-4 h-full">
            @include('components.sidebar-profile')

            <div class="w-full p-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Informasi Umum</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="py-2 px-4 border-b font-medium text-gray-700">Informasi</th>
                                <th class="py-2 px-4 border-b font-medium text-gray-700">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="py-2 px-4 border-b text-gray-700">Nama</td>
                                <td class="py-2 px-4 border-b text-gray-700">Wahyu J. Maulidan</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b text-gray-700">Lokasi</td>
                                <td class="py-2 px-4 border-b text-gray-700">Indramayu, Jawa Barat</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b text-gray-700">Alamat</td>
                                <td class="py-2 px-4 border-b text-gray-700">Jl. Mangga No. 45, Kecamatan XYZ</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b text-gray-700">Nomor Telepon</td>
                                <td class="py-2 px-4 border-b text-gray-700">081234567890</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b text-gray-700">Pendidikan</td>
                                <td class="py-2 px-4 border-b text-gray-700">S1 Teknik Informatika</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b text-gray-700">Status Bekerja</td>
                                <td class="py-2 px-4 border-b text-gray-700">Sedang Bekerja</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b text-gray-700">Email</td>
                                <td class="py-2 px-4 border-b text-gray-700">wahyujumahm@gmail.com</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b text-gray-700">LinkedIn</td>
                                <td class="py-2 px-4 border-b text-gray-700">
                                    <a href="https://www.linkedin.com/in/username" class="text-blue-500 hover:underline">
                                        https://www.linkedin.com/in/username
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-10 mb-20">
                    <a href="{{ route('profile.edit') }}"
                        class="bg-blue-500 text-white px-4 py-3 rounded-md shadow hover:bg-blue-600 focus:outline-none">
                        Edit Profil
                    </a>
                </div>
            </div>
        </div>
    </body>
@endsection
