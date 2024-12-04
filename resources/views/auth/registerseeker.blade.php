@extends('components.template')
@section('title', 'Seeker')

@section('content')
    <form action="{{ route('storeseeker') }}" method="POST" enctype="multipart/form-data" id="form-register">
        @csrf
        <div class="container mx-auto flex justify-center pt-5 py-5">
            <div class="bg-white border border-gray-200 rounded-lg shadow-md px-6 pt-6">
                <div class=" flex justify-center bg-indigo-700 text-yellow-300 rounded px-56 py-2">
                    <h1 class=" font-bold text-xl">AFFARE</h1>
                </div>

                {{-- Step 1 --}}
                <div class="step active" id="step1">
                    <div class="flex justify-center mb-0 pt-4">
                        <label for="foto_profil" class="relative cursor-pointer">
                            <img id="profile-preview"
                                src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png"
                                alt="Profile Picture" class="w-16 h-16 rounded-full border border-gray-300 object-cover">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <span class="text-white text-xl">+</span>
                            </div>
                            <input type="file" id="foto_profil" name="foto_profil" class="hidden"
                                onchange="previewImage(event)">
                        </label>
                    </div>
                    <div class="flex justify-center mb-0 text-slate-300 font-thin text-xs">
                        <p>Foto Profil</p>
                    </div>

                    <div>
                        <label for="nama" class="block mb-2 text-sm pt-4 font-medium text-gray-900 ">Nama</label>
                        <input type="text"
                            class=" border-gray-950 border bg-slate-200 py-1 w-full focus:border-blue-500 focus:bg-white focus:outline-none bg-opacity-50 rounded-md text-black px-2"
                            name="nama" id="nama" placeholder="Masukkan Nama" required value="{{ old('nama') }}">
                        <label for="province_id" class="block mb-2 text-sm pt-4 font-medium text-gray-900">Provinsi</label>
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

                        <label for="kota_id" class="block mb-2 text-sm pt-4 font-medium text-gray-900">Kota</label>
                        <select id="kota_id" name="kota_id" required
                            class=" border-gray-950 border bg-slate-200 py-1 w-full focus:border-blue-500 focus:bg-white focus:outline-none bg-opacity-50 rounded-md text-black px-2">
                            <option value="" disabled selected>Pilih Kota</option>
                        </select>
                        @error('kota_id')
                            <div class="text-red-500 text-xs">{{ $message }}</div>
                        @enderror
                        <label for="alamat" class="block mb-2 text-sm pt-4 font-medium text-gray-900">Alamat</label>
                        <input type="text"
                            class=" border-gray-950 border bg-slate-200 py-1 w-full focus:border-blue-500 focus:bg-white focus:outline-none bg-opacity-50 rounded-md text-black px-2"
                            name="alamat" id="alamat" placeholder="Masukkan Alamat" required
                            value="{{ old('alamat') }}">
                        <label for="no_telepon" class="block mb-2 text-sm pt-4 font-medium text-gray-900">No.
                            Telepon</label>
                        <input type="text"
                            class=" border-gray-950 border bg-slate-200 py-1 w-full focus:border-blue-500 focus:bg-white focus:outline-none bg-opacity-50 rounded-md text-black px-2"
                            name="no_telepon" id="no_telepon" placeholder="Masukkan No. Telepon" required
                            value="{{ old('no_telepon') }}">
                        @error('no_telepon')
                            <div class="text-red-500 text-xs">{{ $message }}</div>
                        @enderror
                        <label for="penidikan" class="block mb-2 text-sm pt-4 font-medium text-gray-900">Pendidikan
                            Terakhir</label>
                        <input type="text"
                            class=" border-gray-950 border bg-slate-200 py-1 w-full focus:border-blue-500 focus:bg-white focus:outline-none bg-opacity-50 rounded-md text-black px-2"
                            name="pendidikan" id="pendidikan" placeholder="Pendidikan Terakhir" required
                            value="{{ old('pendidikan') }}">
                        <label for="status_bekerja" class="block mb-2 text-sm pt-4 font-medium text-gray-900">Status
                            Bekerja</label>
                        <select id="staus_bekerja" name="status_bekerja"
                            class=" border-gray-950 border bg-slate-200 py-1 w-full focus:border-blue-500 focus:bg-white focus:outline-none bg-opacity-50 rounded-md text-black px-2"required>
                            <option value="" disabled selected>Status Bekerja</option>
                            <option value="1">Bekerja</option>
                            <option value="0">Belum Bekerja</option>
                        </select>
                        @error('status_bekerja')
                            <div class="text-red-500 text-xs">{{ $message }}</div>
                        @enderror
                        <label for="email" class="block mb-2 text-sm pt-4 font-medium text-gray-900">Email
                        </label>
                        <input type="email"
                            class=" border-gray-950 border bg-slate-200 py-1 w-full focus:border-blue-500 focus:bg-white focus:outline-none bg-opacity-50 rounded-md text-black px-2"
                            name="email" id="email" placeholder="Masukkan Email" required
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
                            class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-56 py-2.5 text-center">Selanjutnya</button>
                    </div>
                </div>

                {{-- Step 2 --}}
                <div class="step" id="step2">
                    <div id="uploadberkas">
                        <label for="cv"
                            class="border-2 border-gray-300 rounded-lg mt-6 flex flex-col items-center justify-center py-6 cursor-pointer transition hover:border-purple-500 hover:bg-purple-50">
                            <svg id="svg1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" class="w-8 h-8 text-gray-400 mb-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                            <span id="fileName1" class="text-gray-600 font-medium">Upload your CV in PDF (max. 5
                                MB)</span>
                            <span class="text-xs text-gray-500">optional</span>
                            <input type="file" accept=".pdf" class="hidden" name="cv" id="cv"
                                onchange="showFileName(this, 'fileName1')">
                        </label>

                        <label for="portofolio"
                            class="border-2 border-gray-300 rounded-lg mt-6 flex flex-col items-center justify-center py-6 cursor-pointer transition hover:border-purple-500 hover:bg-purple-50">
                            <svg id="svg2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" class="w-8 h-8 text-gray-400 mb-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                            <span id="fileName2" class="text-gray-600 font-medium">Upload your Portofolio in PDF (max. 5
                                MB)</span>
                            <span class="text-xs text-gray-500">optional</span>
                            <input type="file" accept=".pdf" class="hidden" name="portofolio" id="portofolio"
                                onchange="showFileName(this, 'fileName2')">
                        </label>

                        <label for="linkedin" class="block mb-2 text-sm pt-4 font-medium text-gray-900">Linkedin</label>
                        <input type="text"
                            class=" border-gray-950 border bg-slate-200 py-1 w-full focus:border-blue-500 focus:bg-white focus:outline-none bg-opacity-50 rounded-md text-black px-2"
                            name="linkedin" id="linkedin" placeholder="Masukkan URL Linkedin" required>

                        <div class="flex items-center justify-center pt-14 pb-2">
                            <button type="button" onclick="registersuccess()"
                                class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-56 py-2.5 text-center">Selanjutnya</button>
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
                                $('#kota_id').append('<option value="' + value.id + '">' +
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

        function registersuccess() {
            Swal.fire({
                icon: 'success',
                title: 'Register Success',
                text: 'Silahkan login untuk melanjutkan',
                showConfirmButton: true,
                confirmButtonText: 'OK',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('form-register').submit();
                }
            })
        }
    </script>

@endsection
