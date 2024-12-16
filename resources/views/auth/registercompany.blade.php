@extends('components.template')
@section('title', 'Company')

@section('content')

    <head>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;900&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'Montserrat', sans-serif;
            }

            .affare-text {
                font-weight: 700;
                font-size: 1.75rem;
            }
        </style>
    </head>
    <form action="{{ route('storecompany') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container mx-auto flex justify-center pt-5 py-5">
            <div class="bg-white border border-gray-200 rounded-lg shadow-md px-6 pt-6">
                <div class="flex justify-center space-x-2">
                    <img src="{{ asset('storage/header-resource/affare-icon.webp') }}" alt="Logo" class="h-8">
                    <span class="affare-text font- text-black">Affare<span style="color: #5d8de2;">!</span></span>
                </div>
                <form action="{{ route('storecompany') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="container mx-auto flex justify-center pt-5 py-5">
                        
                            {{-- step 1 --}}
                            <div class="step active" id="step1">
                                <div class="flex justify-center mb-0 pt-4">
                                    <label for="logo" class="relative cursor-pointer">
                                        <img id="profile-preview"
                                            src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png"
                                            alt="Profile Picture"
                                            class="w-16 h-16 rounded-full border border-gray-300 object-cover">
                                        <div class="absolute inset-0 flex items-center justify-center">
                                            <span class="text-white text-xl">+</span>
                                        </div>
                                        <input type="file" id="logo" name="logo" class="hidden"
                                            onchange="previewImage(event)">
                                    </label>
                                </div>
                                <div class="flex justify-center mb-0 text-slate-300 font-thin text-xs">
                                    <p>Logo Perusahaan

                                    </p>
                                </div>
                                <div>
                                    <label for="nama"
                                        class="block mb-2 text-sm pt-4 font-medium text-gray-900 ">Nama</label>
                                    <input type="text"
                                        class=" border-gray-950 border bg-slate-200 py-1 w-full focus:border-blue-500 focus:bg-white focus:outline-none bg-opacity-50 rounded-md text-black px-2"
                                        name="nama" id="nama" placeholder="Masukkan Nama Perusahaan" required
                                        value="{{ old('nama') }}">
                                    <label for="province_id"
                                        class="block mb-2 text-sm pt-4 font-medium text-gray-900">Provinsi</label>
                                    <select id="province_id" name="province_id" required
                                        class=" border-gray-950 border bg-slate-200 py-1 w-full focus:border-blue-500 focus:bg-white focus:outline-none bg-opacity-50 rounded-md text-black px-2">
                                        <option value="" disabled selected>Pilih Provinsi</option>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->id }}">{{ $province->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('province_id')
                                        <div class="text-red-500 text-xs">{{ $message }}</div>
                                    @enderror

                                    <label for="kota_id"
                                        class="block mb-2 text-sm pt-4 font-medium text-gray-900">Kota</label>
                                    <select id="kota_id" name="kota_id" required
                                        class=" border-gray-950 border bg-slate-200 py-1 w-full focus:border-blue-500 focus:bg-white focus:outline-none bg-opacity-50 rounded-md text-black px-2">
                                        <option value="" disabled selected>Pilih Kota</option>
                                    </select>
                                    @error('kota_id')
                                        <div class="text-red-500 text-xs">{{ $message }}</div>
                                    @enderror
                                    <label for="alamat"
                                        class="block mb-2 text-sm pt-4 font-medium text-gray-900">Alamat</label>
                                    <input type="text"
                                        class=" border-gray-950 border bg-slate-200 py-1 w-full focus:border-blue-500 focus:bg-white focus:outline-none bg-opacity-50 rounded-md text-black px-2"
                                        name="alamat" id="alamat" placeholder="Masukkan Alamat Perusahaan" required
                                        value="{{ old('alamat') }}">
                                    <label for="no_telepon" class="block mb-2 text-sm pt-4 font-medium text-gray-900">No.
                                        Telepon</label>
                                    <input type="text"
                                        class=" border-gray-950 border bg-slate-200 py-1 w-full focus:border-blue-500 focus:bg-white focus:outline-none bg-opacity-50 rounded-md text-black px-2"
                                        name="no_telepon" id="no_telepon" placeholder="Masukkan No. Telepon Perusahaan"
                                        required value="{{ old('no_telepon') }}">
                                    @error('no_telepon')
                                        <div class="text-red-500 text-xs">{{ $message }}</div>
                                    @enderror
                                    <label for="email" class="block mb-2 text-sm pt-4 font-medium text-gray-900">Email
                                    </label>
                                    <input type="email"
                                        class=" border-gray-950 border bg-slate-200 py-1 w-full focus:border-blue-500 focus:bg-white focus:outline-none bg-opacity-50 rounded-md text-black px-2"
                                        name="email" id="email" placeholder="Masukkan Email Perusahaan" required
                                        value="{{ old('email') }}">
                                    @error('email')
                                        <div class="text-red-500 text-xs">{{ $message }}</div>
                                    @enderror
                                    <label for="password" class="block mb-2 text-sm pt-4 font-medium text-gray-900">Password
                                    </label>
                                    <input type="text"
                                        class=" border-gray-950 border bg-slate-200 py-1 w-full focus:border-blue-500 focus:bg-white focus:outline-none bg-opacity-50 rounded-md text-black px-2"
                                        name="password" id="password" placeholder="Masukkan Password" required>
                                    @error('password')
                                        <div class="text-red-500 text-xs">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="flex items-center justify-center pt-14 pb-6">
                                    <button type="button" onclick="goToStep(2)"
                                        class="text-white bg-blue-500 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-56 py-2.5 text-center">Selanjutnya</button>
                                </div>
                            </div>
                            {{--  Step 2 --}}
                            <div class="step" id="step2">
                                <label for="website"
                                    class="block mb-2 text-sm pt-4 font-medium text-gray-900">Website</label>
                                <input type="text"
                                    class=" border-gray-950 border bg-slate-200 py-1 w-full focus:border-blue-500 focus:bg-white focus:outline-none bg-opacity-50 rounded-md text-black px-2"
                                    name="website" id="website"
                                    placeholder="Masukkan URL Website Perusahaan (opsional)"
                                    value="{{ old('website') }}">
                                @error('website')
                                    <div class="text-red-500 text-xs">{{ $message }}</div>
                                @enderror
                                <label for="bio"
                                    class="block mb-2 text-sm pt-4 font-medium text-gray-900">Bio</label>
                                <textarea type="textarea"
                                    class=" border-gray-950 border bg-slate-200 py-1 w-full focus:border-blue-500 focus:bg-white focus:outline-none bg-opacity-50 rounded-md text-black px-2"
                                    name="bio" id="bio" placeholder="Masukkan Bio Perusahaan" value="{{ old('bio') }}"></textarea>
                                <label for="linkedin"
                                    class="block mb-2 text-sm pt-4 font-medium text-gray-900">Linkedin</label>
                                <input type="text"
                                    class=" border-gray-950 border bg-slate-200 py-1 w-full focus:border-blue-500 focus:bg-white focus:outline-none bg-opacity-50 rounded-md text-black px-2"
                                    name="linkedin" id="linkedin" placeholder="Masukkan URL Linkedin (opsional)"
                                    value="{{ old('linkedin') }}">
                                @error('linkedin')
                                    <div class="text-red-500 text-xs">{{ $message }}</div>
                                @enderror
                                <div class="flex items-center justify-center pt-14 pb-2">
                                    <button type="submit"
                                        class="text-white bg-blue-500 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-56 py-2.5 text-center">Selanjutnya</button>
                                </div>
                                <div class="flex items-center justify-center pt-2 pb-4">
                                    <button type="button" onclick="goToStep(1)"
                                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto py-2.5 text-center"
                                        style="padding-left:235px; padding-right:235px; ">Kembali</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
    </form>

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


        let currentStep = 1;
        // Fungsi untuk navigasi antar langkah
        function goToStep(step) {
            // Validasi data sebelum melanjutkan

            document.querySelector(`#step${currentStep}`).classList.remove('active');
            document.querySelector(`#step${step}`).classList.add('active');
            currentStep = step;

        }

        function showFileName(input, displayId) {
            const fileName = input.files[0]?.name || 'Upload your CV in PDF (max. 5 MB)';
            document.getElementById(displayId).innerText = `${fileName}`;
            const svgelement = document.querySelectorAll('svg');
            svgelement.forEach(element => {
                element.style.display = 'none';
            });
        }
    </script>



@endsection
