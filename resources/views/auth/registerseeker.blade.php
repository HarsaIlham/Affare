@extends('components.template')
@section('title', 'Seeker')

@section('content')
    <form action="#" method="POST" enctype="multipart/form-data">
        <div class="container mx-auto flex justify-center pt-5 py-5">
            <div class="bg-white border border-gray-200 rounded-lg shadow-md px-6 pt-6">
                <div class=" flex justify-center bg-indigo-700 text-yellow-300 rounded px-56 py-2">
                    <h1 class=" font-bold text-xl">AFFARE</h1>
                </div>

                {{-- Step 1 --}}
                <div class="step active" id="step1">
                    <div class="flex justify-center mb-0 pt-4">
                        <label for="profile-picture" class="relative cursor-pointer">
                            <img id="profile-preview"
                                src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png"
                                alt="Profile Picture" class="w-16 h-16 rounded-full border border-gray-300 object-cover">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <span class="text-white text-xl">+</span>
                            </div>
                            <input type="file" id="profile-picture" class="hidden" onchange="previewImage(event)">
                        </label>
                    </div>
                    <div class="flex justify-center mb-0 text-slate-300 font-thin text-xs">
                        <p>Foto Profil</p>
                        <span id="tes-step">tes step</span>
                    </div>
                    <div>
                        <label for="name" class="block mb-2 text-sm pt-4 font-medium text-gray-900 ">Nama</label>
                        <input type="text"
                            class=" border-gray-950 border bg-slate-200 py-1 w-1/2 focus:border-blue-500 focus:bg-white focus:outline-none bg-opacity-50 rounded-md text-black px-2"
                            name="name" id="name" placeholder="Masukkan Nama" required>
                        <label for="provinve_id" class="block mb-2 text-sm pt-4 font-medium text-gray-900">Provinsi</label>
                        <select id="province_id" name="province_id"
                            class=" border-gray-950 border bg-slate-200 py-1 w-1/2 focus:border-blue-500 focus:bg-white focus:outline-none bg-opacity-50 rounded-md text-black px-2">
                            <option value="" disabled selected>Pilih Provinsi</option>
                            @foreach ($provinces as $province)
                                <option value="{{ $province->id }}">{{ $province->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('province_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <label for="city_id" class="block mb-2 text-sm pt-4 font-medium text-gray-900">Kota</label>
                        <select id="city_id" name="city_id" type="text"
                            class=" border-gray-950 border bg-slate-200 py-1 w-1/2 focus:border-blue-500 focus:bg-white focus:outline-none bg-opacity-50 rounded-md text-black px-2"required>
                            <option value="" disabled selected>Pilih Kota</option>
                        </select>
                        <label for="address" class="block mb-2 text-sm pt-4 font-medium text-gray-900">Alamat</label>
                        <input type="text"
                            class=" border-gray-950 border bg-slate-200 py-1 w-1/2 focus:border-blue-500 focus:bg-white focus:outline-none bg-opacity-50 rounded-md text-black px-2"
                            name="address" id="address" placeholder="Masukkan Alamat" required>
                        <label for="phone" class="block mb-2 text-sm pt-4 font-medium text-gray-900">No.
                            Handphone</label>
                        <input type="text"
                            class=" border-gray-950 border bg-slate-200 py-1 w-1/2 focus:border-blue-500 focus:bg-white focus:outline-none bg-opacity-50 rounded-md text-black px-2"
                            name="phone" id="phone" placeholder="Masukkan No. Handphone" required>
                        <label for="last_study" class="block mb-2 text-sm pt-4 font-medium text-gray-900">Pendidikan
                            Terakhir</label>
                        <input type="text"
                            class=" border-gray-950 border bg-slate-200 py-1 w-1/2 focus:border-blue-500 focus:bg-white focus:outline-none bg-opacity-50 rounded-md text-black px-2"
                            name="last_study" id="last_study" placeholder="Pendidikan Terakhir" required>
                        <label for="email" class="block mb-2 text-sm pt-4 font-medium text-gray-900">Email</label>
                        <input type="email"
                            class=" border-gray-950 border bg-slate-200 py-1 w-1/2 focus:border-blue-500 focus:bg-white focus:outline-none bg-opacity-50 rounded-md text-black px-2"
                            name="email" id="email" placeholder="Masukkan Email" required>
                        <label for="password" class="block mb-2 text-sm pt-4 font-medium text-gray-900">Password</label>
                        <input type="text"
                            class=" border-gray-950 border bg-slate-200 py-1 w-1/2 focus:border-blue-500 focus:bg-white focus:outline-none bg-opacity-50 rounded-md text-black px-2"
                            name="password" id="password" placeholder="Masukkan Password" required>
                    </div>
                    <div class="flex items-center justify-center pt-14 pb-6">
                        <button type="button" onclick="goToStep(2)"
                            class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-56 py-2.5 text-center">Selanjutnya</button>
                    </div>
                </div>

                {{-- Step 2 --}}
                <div class="step" id="step2">
                    <div id="uploadCV">
                        <label for="cv_path"
                            class="border-2 border-gray-300 rounded-lg mt-6 flex flex-col items-center justify-center py-6 cursor-pointer transition hover:border-purple-500 hover:bg-purple-50">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-8 h-8 text-gray-400 mb-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                            <span id="fileName" class="text-gray-600 font-medium">Upload your CV in PDF (max. 5 MB)</span>
                            <input type="file" id="cv_path" accept=".pdf" class="hidden" name="cv_path"
                                onchange="showFileName(this)">
                        </label>
                        <button type="button"
                            class="block bg-purple-50 text-purple-600 font-medium text-sm rounded-lg py-3 px-6 mt-4 mx-auto hover:bg-purple-100 transition">
                            Skip for now, my CV is not ready
                        </button>
                        <div class="flex items-center justify-center pt-14 pb-2">
                            <button type="submit" onclick="goToStep(1)"
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
        let currentStep = 1;
        document.getElementById('tes-step').textContent = currentStep;
        // Fungsi untuk navigasi antar langkah
        function goToStep(step) {
            // Validasi data sebelum melanjutkan

            document.querySelector(`#step${currentStep}`).classList.remove('active');
            document.querySelector(`#step${step}`).classList.add('active');
            currentStep = step;

        }

        function showFileName(input) {
            const fileName = input.files[0]?.name || 'Upload your CV in PDF (max. 5 MB)';
            document.getElementById('fileName').textContent = fileName;
            document.querySelector('#uploadCV svg').classList.add('hidden');
        }

    </script>

@endsection
