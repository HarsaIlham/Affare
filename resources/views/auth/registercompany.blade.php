@extends('components.template')
@section('title', 'Company')

@section('content')
<form action="#" method="POST">
    <div class="container mx-auto flex justify-center pt-5 py-5">
        <div class="bg-white border border-gray-200 rounded-lg shadow-md px-6 pt-6">
            <div class=" flex justify-center bg-indigo-700 text-yellow-300 rounded px-56 py-2">
                <h1 class=" font-bold text-xl">AFFARE</h1>
            </div>
            <div class="flex justify-center mb-0 pt-4">
            <label for="profile-picture" class="relative cursor-pointer">
                <img id="profile-preview" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="Profile Picture" class="w-16 h-16 rounded-full border border-gray-300 object-cover">
                <div class="absolute inset-0 flex items-center justify-center">
                    <span class="text-white text-xl">+</span>
                </div>
                <input type="file" id="profile-picture" class="hidden" onchange="previewImage(event)">
            </label>
        </div>
        <div class="flex justify-center mb-0 text-slate-300 font-thin text-xs">
            <p>Foto Profil</p>
        </div>
        <div>
            <label for="perusahaan" class="block mb-2 text-sm pt-4 font-medium text-gray-900 ">Nama Perusahaan</label>
            <input type="text" class=" border-gray-950 border bg-slate-200 py-1 w-1/2 focus:border-blue-500 focus:bg-white focus:outline-none bg-opacity-50 rounded-md text-black px-2" name="perusahaan" id="perusahaan" placeholder="Masukkan Nama Perusahaan" required>
            <label for="alamat" class="block mb-2 text-sm pt-4 font-medium text-gray-900">Alamat</label>
            <input type="text" class=" border-gray-950 border bg-slate-200 py-1 w-1/2 focus:border-blue-500 focus:bg-white focus:outline-none bg-opacity-50 rounded-md text-black px-2" name="alamat" id="alamat" placeholder="Masukkan Alamat Perusahaan" required>
            <label for="hp" class="block mb-2 text-sm pt-4 font-medium text-gray-900">No. Handphone</label>
            <input type="text" class=" border-gray-950 border bg-slate-200 py-1 w-1/2 focus:border-blue-500 focus:bg-white focus:outline-none bg-opacity-50 rounded-md text-black px-2" name="hp" id="hp" placeholder="Masukkan No. Handphone" required>
            <label for="email" class="block mb-2 text-sm pt-4 font-medium text-gray-900">Email</label>
            <input type="email" class=" border-gray-950 border bg-slate-200 py-1 w-1/2 focus:border-blue-500 focus:bg-white focus:outline-none bg-opacity-50 rounded-md text-black px-2" name="email" id="email" placeholder="Masukkan Email Perusahaan" required>
            <label for="password" class="block mb-2 text-sm pt-4 font-medium text-gray-900">Password</label>
            <input type="text" class=" border-gray-950 border bg-slate-200 py-1 w-1/2 focus:border-blue-500 focus:bg-white focus:outline-none bg-opacity-50 rounded-md text-black px-2" name="password" id="password" placeholder="Masukkan Password" required>
        </div>
        <div class="flex items-center justify-center pt-14 pb-6">
            <button type="submit" class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-56 py-2.5 text-center">Selanjutnya</button>
        </div>
        </div>
    </div>
</form>
    


@endsection
