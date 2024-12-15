@extends('components.template')

@section('title', 'Profil ')

@section('content')
    @include('components.headercompany')

    <body class="bg-gray-100">
        @if (session('update_bio_success'))
            <script>
                Swal.fire({
                    icon: "success",
                    title: "Bio perusahaan berhasil diubah!",
                    showConfirmButton: true,
                    ConfirmbuttonText: "OK"
                });
            </script>
        @elseif(session('update_password'))
            <script>
                Swal.fire({
                    icon: "success",
                    title: "Password berhasil diubah!",
                    showConfirmButton: true,
                    ConfirmbuttonText: "OK"
                });
            </script>
        @endif
        <div>
            @include('components.company-card')
        </div>


        <div class="flex mt-4 h-full">
            @include('components.sidebar-company')


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
                                <td class="py-2 px-4 border-b text-gray-700">Nama Perusahaan</td>
                                <td class="py-2 px-4 border-b text-gray-700">{{ $company->nama }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b text-gray-700">Deskripsi</td>
                                <td class="py-2 px-4 border-b text-gray-700">{{ $company->bio }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b text-gray-700">Lokasi</td>
                                <td class="py-2 px-4 border-b text-gray-700">{{ $namakota }}, {{ $namaprovince }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b text-gray-700">Alamat</td>
                                <td class="py-2 px-4 border-b text-gray-700">{{ $company->alamat }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b text-gray-700">Nomor Telepon</td>
                                <td class="py-2 px-4 border-b text-gray-700">{{ $company->no_telepon }}</td>
                            </tr>

                            <tr>
                                <td class="py-2 px-4 border-b text-gray-700">Email</td>
                                <td class="py-2 px-4 border-b text-gray-700">{{ $company->email }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b text-gray-700">Website</td>
                                <td class="py-2 px-4 border-b text-gray-700">
                                    <a href="{{ $company->website }}" target="_blank" class="text-blue-500 hover:underline">
                                        {{ $company->website }}
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b text-gray-700">LinkedIn</td>
                                <td class="py-2 px-4 border-b text-gray-700">
                                    <a href="{{ $company->linkedin }}" target="_blank"
                                        class="text-blue-500 hover:underline">
                                        {{ $company->linkedin }}
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-10 mb-20">
                    <a href="{{ route('edit-company') }}"
                        class="bg-blue-500 text-white px-4 py-3 rounded-md shadow hover:bg-blue-600 focus:outline-none">
                        Edit Profil
                    </a>
                </div>
            </div>
        </div>
    </body>
@endsection
