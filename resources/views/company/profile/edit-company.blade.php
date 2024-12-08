@extends('components.template')

@section('title', 'Edit Profil')

@section('content')

    <body class="bg-gray-100">
        

        <div class="flex mt-4 h-full">
           
            <div class="w-full p-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Edit Informasi Umum</h2>
                <div>
                    <form action="{{ route('company.profile.edit-company') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="name" class="block text-gray-700 font-medium mb-2">Nama</label>
                                <input type="text" id="name" name="name" value="{{ old('name', 'Wahyu J. Maulidan') }}"
                                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                            <div>
                                <label for="province" class="block text-gray-700 font-medium mb-2">Provinsi</label>
                                <select id="province" name="province" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">Pilih Provinsi</option>
                                    <option value="Jawa Barat">Jawa Barat</option>
                                    <option value="DKI Jakarta">DKI Jakarta</option>
                                    <option value="Bali">Bali</option>
                                </select>
                            </div>

                            <div>
                                <label for="city" class="block text-gray-700 font-medium mb-2">Kota</label>
                                <select id="city" name="city" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">Pilih Kota</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-span-2 mt-4">
                            <label for="address" class="block text-gray-700 font-medium mb-2">Alamat</label>
                            <input type="text" id="address" name="address" value="{{ old('address', 'Jl. Mangga No. 45, Kecamatan XYZ') }}"
                                class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <div class="mt-4">
                            <label for="phone" class="block text-gray-700 font-medium mb-2">Nomor Telepon</label>
                            <input type="text" id="phone" name="phone" value="{{ old('phone', '081234567890') }}"
                                class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <div class="mt-4">
                            <label for="education" class="block text-gray-700 font-medium mb-2">Pendidikan</label>
                            <input type="text" id="education" name="education" value="{{ old('education', 'S1 Teknik Informatika') }}"
                                class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <div class="mt-4">
                            <label for="work_status" class="block text-gray-700 font-medium mb-2">Status Bekerja</label>
                            <input type="text" id="work_status" name="work_status" value="{{ old('work_status', 'Sedang Bekerja') }}"
                                class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <div class="mt-4">
                            <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email', 'wahyujumahm@gmail.com') }}"
                                class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <div class="mt-4 col-span-2">
                            <label for="linkedin" class="block text-gray-700 font-medium mb-2">LinkedIn</label>
                            <input type="url" id="linkedin" name="linkedin" value="{{ old('linkedin', 'https://www.linkedin.com/in/username') }}"
                                class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div class="mt-10">
                            <button type="submit"
                                class="bg-blue-500 text-white px-6 py-3 rounded-md shadow hover:bg-blue-600 focus:outline-none">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
@endsection
