@extends('components.template')

@section('title', 'Edit ')

@section('content')
    @include('components.headercompany')

    <body class="bg-gray-100">


        <div class="flex mt-4 h-full">

            <div class="w-full p-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Edit Informasi Umum</h2>
                <div>
                    <form action="{{ route('updatebiocompany', $company->id) }}" method="POST" id="form-update-bio">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 gap-4">
                            <div>
                                <label for="nama" class="block text-gray-700 font-medium mb-2">Nama</label>
                                <input type="text" id="nama" name="nama" value="{{ old('nama', $company->nama) }}"
                                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                                @error('nama')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="bio" class="block text-gray-700 font-medium mb-2">Deskripsi</label>
                                <textarea id="bio" name="bio" rows="4"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                                    required>{{ old('deskripsi', $company->bio) }}</textarea>
                                @error('bio')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>


                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                            <div>
                                <label for="province_id" class="block text-gray-700 font-medium mb-2">Provinsi</label>
                                <select id="province_id" name="province_id"
                                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="{{ $company->province_id }}">{{ $namaprovince }}
                                    </option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}">{{ $province->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('province_id')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="kota_id" class="block text-gray-700 font-medium mb-2">Kota</label>
                                <select id="kota_id" name="kota_id"
                                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="{{ $company->kota_id }}">{{ $namakota }}</option>
                                </select>
                                @error('kota_id')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-span-2 mt-4">
                            <label for="alamat" class="block text-gray-700 font-medium mb-2">Alamat</label>
                            <input type="text" id="alamat" name="alamat"
                                value="{{ old('alamat', $company->alamat) }}"
                                class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                            @error('alamat')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="no_telepon" class="block text-gray-700 font-medium mb-2">Nomor Telepon</label>
                            <input type="text" id="no_telepon" name="no_telepon"
                                value="{{ old('no_telepon', $company->no_telepon) }}"
                                class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                            @error('no_telepon')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email', $company->email) }}"
                                class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-4 col-span-2">
                            <label for="website" class="block text-gray-700 font-medium mb-2">Website</label>
                            <input type="url" id="website" name="website"
                                value="{{ old('website', $company->website) }}"
                                class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @error('website')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-4 col-span-2">
                            <label for="linkedin" class="block text-gray-700 font-medium mb-2">LinkedIn</label>
                            <input type="url" id="linkedin" name="linkedin"
                                value="{{ old('linkedin', $company->linkedin) }}"
                                class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @error('linkedin')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-10">
                            <button type="button" onclick="confirmupdatebio()"
                                class="bg-blue-500 text-white px-6 py-3 rounded-md shadow hover:bg-blue-600 focus:outline-none">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $('#province_id').change(function() {
                    var provinceId = $(this).val();
                    if (provinceId) {
                        $.ajax({
                            url: '/kotas/' + provinceId,
                            type: 'GET',
                            dataType: 'json',
                            success: function(data) {
                                $('#kota_id').empty();
                                $('#kota_id').append('<option value="">Pilih Kota</option>');
                                $.each(data, function(key, value) {
                                    $('#kota_id').append('<option value="' + value.id +
                                        '">' +
                                        value.nama + '</option>');
                                });
                            }
                        });
                    } else {
                        $('#kota_id').empty();
                        $('#kota_id').append('<option value="">Pilih Kota</option>');
                    }
                });
            });

            function confirmupdatebio() {
                Swal.fire({
                    title: 'Apakah Anda yakin ingin mengubah data diri?',
                    text: 'Data diri anda akan berubah sesuai dengan data yang anda masukkan.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Ubah!',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('form-update-bio').submit();
                    }
                });
            }
        </script>
    </body>
@endsection
