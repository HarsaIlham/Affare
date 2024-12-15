@extends('components.template')

@section('title', 'Post Lowongan')

@section('content')
    @include('components.headercompany')

    <div class="container py-8 px-6 md:px-16 bg-[#E9F1FE] rounded-xl shadow-lg">
        <div class="w-[635px] h-[87px] relative">
            <div class="left-0 top-0 absolute text-[#303030] text-[35px] font-bold font-['Montserrat'] leading-[35px]">Post
                Lowongan</div>
            <div class="left-0 top-[50px] absolute text-[#5e6670] text-[20px] font-normal font-['Montserrat'] leading-snug">
                Temukan pelamar terbaik untuk perusahaan Anda</div>
        </div>

        <form action="{{ route('storelowongan') }}" method="POST" class="space-y-6">
            @csrf


            <div>
                <label for="judul" class="block text-lg font-semibold text-[#303030] mb-2">Judul Pekerjaan</label>
                <input type="text" id="judul" name="judul" placeholder="Tambahkan judul pekerjaan, peran, dll"
                    class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required value="{{ old('judul') }}">
                @error('judul')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>


            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="jenis_job_id" class="block text-lg font-semibold text-[#303030] mb-2">Jenis</label>
                    <select id="jenis_job_id" name="jenis_job_id"
                        class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                        required>
                        <option value="" disabled {{ old('jenis_job_id') == '' ? 'selected' : '' }}>Pilih...</option>
                        <option value="1">Internship</option>
                        <option value="2">Part-time</option>
                    </select>
                    @error('jenis_job_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="tipe_job_id" class="block text-lg font-semibold text-[#303030] mb-2">Tipe</label>
                    <select id="tipe_job_id" name="tipe_job_id"
                        class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                        required>
                        <option value="" disabled {{ old('tipe_job_id') == '' ? 'selected' : '' }}>Pilih...</option>
                        <option value="1">Remote</option>
                        <option value="2">Onsite</option>
                        <option value="3">Hybrid</option>
                    </select>
                    @error('tipe_job_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>


            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="gaji_min" class="block text-lg font-semibold text-[#303030] mb-2">Gaji Minimum</label>
                    <div class="flex items-center">
                        <span class="bg-gray-200 px-3 py-2 border border-r-0 rounded-l-md">IDR</span>
                        <input type="number" id="gaji_min" name="gaji_min" placeholder="Gaji Minimum" required
                            value="{{ old('gaji_min') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-r-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                        @error('gaji_min')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="gaji_max" class="block text-lg font-semibold text-[#303030] mb-2">Gaji Maksimum</label>
                    <div class="flex items-center">
                        <span class="bg-gray-200 px-3 py-2 border border-r-0 rounded-l-md">IDR</span>
                        <input type="number" id="gaji_max" name="gaji_max" placeholder="Gaji Maksimum" required
                            value="{{ old('gaji_max') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-r-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                        @error('gaji_max')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>


            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="provinsi_id" class="block text-lg font-semibold text-[#303030] mb-2">Provinsi</label>
                    <select id="provinsi_id" name="provinsi_id"
                        class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                        required>
                        <option value="{{ $company->province->id }}"selected>{{ $company->province->nama }}</option>
                        @foreach ($provinces as $province)
                            <option value="{{ $province->id }}">{{ $province->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('provinsi_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="kota_id" class="block text-lg font-semibold text-[#303030] mb-2">Kota/Kabupaten</label>
                    <select id="kota_id" name="kota_id"
                        class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                        required>
                        <option value="{{ $company->kota->id }}" selected>{{ $company->kota->nama }}</option>
                    </select>
                    @error('kota_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>


            <div>
                <label for="pendidikan" class="block text-lg font-semibold text-[#303030] mb-2">Pendidikan
                    Terakhir</label>
                <input type="text" id="pendidikan" name="pendidikan"
                    class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required value="{{ old('pendidikan') }}">
                </input>
                @error('pendidikan')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>


            <div>
                <label for="deskripsi" class="block text-lg font-semibold text-[#303030] mb-2">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" rows="4" placeholder="Tambahkan deskripsi..."
                    class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required value="{{ old('deskripsi') }}"></textarea>
                @error('deskripsi')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="kualifikasi" class="block text-lg font-semibold text-[#303030] mb-2">Kualifikasi</label>
                <textarea id="kualifikasi" name="kualifikasi" rows="4" placeholder="Tambahkan Kualifikasi..."
                    class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required value="{{ old('kualifikasi') }}"></textarea>
                @error('kualifikasi')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="exp_date" class="block text-lg font-semibold text-[#303030] mb-2">Tanggal Berakhir</label>
                <input type="date" id="exp_date" name="exp_date"
                    class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required value="{{ old('exp_date') }}">
                @error('exp_date')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>


            <div class="text-center">
                <button type="submit"
                    class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">Post
                    Lowongan</button>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $('#provinsi_id').change(function() {
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
    </script>
@endsection
