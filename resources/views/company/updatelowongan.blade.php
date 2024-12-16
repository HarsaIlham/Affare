@extends('components.template')

@section('title', 'Perbarui Lowongan')

@section('content')
    @include('components.headercompany')


    <div class="container py-8 px-6 md:px-16 bg-[#E9F1FE] rounded-xl shadow-lg">
        <div class="w-[635px] h-[50px] relative">
            <div class="left-0 top-0 absolute text-[#303030] text-[35px] font-bold font-['Montserrat'] leading-[35px]">
                Perbarui Lowongan</div>
        </div>

        <form action="{{ route('update', ['id' => $lowongans->id]) }}" method="POST" class="space-y-6"
            id="form-update-lowongan">
            @csrf
            @method('PUT')
            <div>
                <label for="judul" class="block text-lg font-semibold text-[#303030] mb-2">Judul Pekerjaan</label>
                <input type="text" id="judul" name="judul"
                    value="{{ old('judul_pekerjaan', $lowongans->judul) }}"
                    placeholder="Tambahkan judul pekerjaan, peran, dll"
                    class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>
                @error('judul_pekerjaan')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="jenis_job_id" class="block text-lg font-semibold text-[#303030] mb-2">Jenis</label>
                    <select id="jenis_job_id" name="jenis_job_id"
                        class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                        required>
                        <option value="{{ old('jenis', $lowongans->jenis_job_id) }}">
                            {{ $lowongans->jenisjob->jenis }}</option>
                        <option value="1" {{ old('jenis') == '1' ? 'selected' : '' }}>Internship</option>
                        <option value="2" {{ old('jenis') == '2' ? 'selected' : '' }}>Part-time</option>
                    </select>
                    @error('jenis')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="tipe_job_id" class="block text-lg font-semibold text-[#303030] mb-2">Tipe</label>
                    <select id="tipe_job_id" name="tipe_job_id"
                        class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                        required>
                        <option value="{{ old('tipe', $lowongans->tipe_job_id) }}">{{ $lowongans->tipejob->tipe }}
                        </option>
                        <option value="{{ old('tipe', '1') }}" >Remote</option>
                        <option value="{{ old('tipe', '2') }}" >Onsite</option>
                        <option value="{{ old('tipe', '3') }}" >Hybrid</option>
                    </select>
                    @error('tipe')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>



            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="gaji_min" class="block text-lg font-semibold text-[#303030] mb-2">Gaji Minimum</label>
                    <div class="flex items-center">
                        <span class="bg-gray-200 px-3 py-2 border border-r-0 rounded-l-md">IDR</span>
                        <input type="number" id="gaji_min" name="gaji_min"
                            value="{{ old('gaji_min', $lowongans->gaji_min) }}" placeholder="Gaji Minimum"
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
                        <input type="number" id="gaji_max" name="gaji_max"
                            value="{{ old('gaji_max', $lowongans->gaji_max) }}" placeholder="Gaji Maksimum"
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
                        <option value="{{ $lowongans->provinsi_id }}">{{ $lowongans->province->nama }}
                        </option>
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
                        <option value="{{ $lowongans->kota_id }}">{{ $lowongans->kota->nama }}</option>
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
                    value="{{ old('pendidikan', $lowongans->pendidikan) }}" required>
                </input>
                @error('pendidikan')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="deskripsi" class="block text-lg font-semibold text-[#303030] mb-2">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" rows="4" placeholder="Tambahkan deskripsi..."
                    class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>{{ old('deskripsi', $lowongans->deskripsi) }}</textarea>
                @error('deskripsi')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="kualifikasi" class="block text-lg font-semibold text-[#303030] mb-2">Kualifikasi</label>
                <textarea id="kualifikasi" name="kualifikasi" rows="4" placeholder="Tambahkan Kualifikasi..."
                    class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>{{ old('kualifikasi', $lowongans->kualifikasi) }}</textarea>
                @error('kualifikasi')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="exp_date" class="block text-lg font-semibold text-[#303030] mb-2">Tanggal
                    Kadaluarsa</label>
                <input type="date" id="exp_date" name="exp_date"
                    value="{{ old('expiration_date', $lowongans->exp_date) }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>
                @error('exp_date')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="text-center">
                <button type="button" onclick="confirmupdatelowongan()"
                    class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">Perbarui
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

        function confirmupdatelowongan() {
            Swal.fire({
                title: 'Apakah Anda yakin ingin mengubah data lowongan?',
                text: 'Lowongan anda akan berubah sesuai dengan data yang anda masukkan.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Ubah!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('form-update-lowongan').submit();
                }
            });
        }
    </script>
@endsection
