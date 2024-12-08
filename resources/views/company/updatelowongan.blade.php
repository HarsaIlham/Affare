@extends('components.template')

@section('title', 'Perbarui Lowongan')

@section('content')
@include('components.headercompany')

<div class="container py-8 px-6 md:px-16 bg-[#E9F1FE] rounded-xl shadow-lg">
    <div class="w-[635px] h-[50px] relative">
        <div class="left-0 top-0 absolute text-[#303030] text-[35px] font-bold font-['Montserrat'] leading-[35px]">Perbarui Lowongan</div>
    </div>

    <form action="#" method="POST" class="space-y-6">
        @csrf

        <div>
            <label for="judul_pekerjaan" class="block text-lg font-semibold text-[#303030] mb-2">Judul Pekerjaan</label>
            <input type="text" id="judul_pekerjaan" name="judul_pekerjaan" value="{{ old('judul_pekerjaan', '') }}" placeholder="Tambahkan judul pekerjaan, peran, dll" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="jenis" class="block text-lg font-semibold text-[#303030] mb-2">Jenis</label>
                <select id="jenis" name="jenis" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                    <option value="" disabled {{ old('jenis') == '' ? 'selected' : '' }}>Pilih...</option>
                    <option value="internship" {{ old('jenis') == 'internship' ? 'selected' : '' }}>Internship</option>
                    <option value="parttime" {{ old('jenis') == 'parttime' ? 'selected' : '' }}>Part-time</option>
                </select>
            </div>
            <div>
                <label for="tipe" class="block text-lg font-semibold text-[#303030] mb-2">Tipe</label>
                <select id="tipe" name="tipe" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                    <option value="" disabled {{ old('tipe') == '' ? 'selected' : '' }}>Pilih...</option>
                    <option value="remote" {{ old('tipe') == 'remote' ? 'selected' : '' }}>Remote</option>
                    <option value="onsite" {{ old('tipe') == 'onsite' ? 'selected' : '' }}>Onsite</option>
                    <option value="hybrid" {{ old('tipe') == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                </select>
            </div>
        </div>

       

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="gaji_min" class="block text-lg font-semibold text-[#303030] mb-2">Gaji Minimum</label>
                <div class="flex items-center">
                    <span class="bg-gray-200 px-3 py-2 border border-r-0 rounded-l-md">IDR</span>
                    <input type="number" id="gaji_min" name="gaji_min" value="{{ old('gaji_min', '') }}" placeholder="Gaji Minimum" class="w-full px-4 py-3 border border-gray-300 rounded-r-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
            </div>
            <div>
                <label for="gaji_max" class="block text-lg font-semibold text-[#303030] mb-2">Gaji Maksimum</label>
                <div class="flex items-center">
                    <span class="bg-gray-200 px-3 py-2 border border-r-0 rounded-l-md">IDR</span>
                    <input type="number" id="gaji_max" name="gaji_max" value="{{ old('gaji_max', '') }}" placeholder="Gaji Maksimum" class="w-full px-4 py-3 border border-gray-300 rounded-r-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="provinsi" class="block text-lg font-semibold text-[#303030] mb-2">Provinsi</label>
                <select id="provinsi" name="provinsi" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                    <option value="" disabled {{ old('provinsi') == '' ? 'selected' : '' }}>Pilih...</option>
                </select>
            </div>
            <div>
                <label for="kota" class="block text-lg font-semibold text-[#303030] mb-2">Kota/Kabupaten</label>
                <select id="kota" name="kota" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                    <option value="" disabled {{ old('kota') == '' ? 'selected' : '' }}>Pilih...</option>
                </select>
            </div>
        </div>

        <div>
            <label for="pendidikan_terakhir" class="block text-lg font-semibold text-[#303030] mb-2">Pendidikan Terakhir</label>
            <select id="pendidikan_terakhir" name="pendidikan_terakhir" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                <option value="" disabled {{ old('pendidikan_terakhir') == '' ? 'selected' : '' }}>Pilih...</option>
                <option value="sma" {{ old('pendidikan_terakhir') == 'sma' ? 'selected' : '' }}>SMA</option>
                <option value="smk" {{ old('pendidikan_terakhir') == 'smk' ? 'selected' : '' }}>SMK</option>
                <option value="s1" {{ old('pendidikan_terakhir') == 's1' ? 'selected' : '' }}>S-1</option>
            </select>
        </div>

        <div>
            <label for="deskripsi" class="block text-lg font-semibold text-[#303030] mb-2">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" rows="4" placeholder="Tambahkan deskripsi..." class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>{{ old('deskripsi', '') }}</textarea>
        </div>

        <div>
            <label for="kualifikasi" class="block text-lg font-semibold text-[#303030] mb-2">Kualifikasi</label>
            <textarea id="kualifikasi" name="kualifikasi" rows="4" placeholder="Tambahkan Kualifikasi..." class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>{{ old('kualifikasi', '') }}</textarea>
        </div>

        <div>
            <label for="expiration_date" class="block text-lg font-semibold text-[#303030] mb-2">Tanggal Kadaluarsa</label>
            <input type="date" id="expiration_date" name="expiration_date" value="{{ old('expiration_date', '') }}" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>

        <div class="text-center">
            <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">Perbarui Lowongan</button>
        </div>
    </form>
</div>
@endsection
