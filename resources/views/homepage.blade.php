@extends('components.template')

@section('title', 'Homepage')

@section('content')
    <x-header></x-header>

    <body class="bg-blue-50">
        <div class="bg-blue-500 text-white py-20 relative">
            <div class="container mx-auto px-4 text-center relative z-10">
                <h1 class="text-3xl font-bold mb-4">Temukan peluangmu di sini!</h1>
                <form action="{{ route('search') }}" method="GET">
                    <div class="flex justify-center relative">
                        <input type="text" placeholder="Cari Lowongan" id="search" name="search"
                            class="w-full max-w-md px-4 py-2 rounded-l-md border border-gray-300 focus:outline-none text-black" />
                        <button type="submit"
                            class="bg-blue-600 px-6 py-2 text-white font-semibold rounded-r-md hover:bg-blue-700">
                            Cari
                        </button>
                    </div>
                </form>
            </div>
            <img src="{{ asset('storage/homepage-resource/element-section.webp') }}" alt="Illustration"
                class="absolute bottom-0 right-0 w-1/3 lg:w-1/4 h-auto object-cover opacity-50 md:opacity-100 z-0" />
        </div>


        <form action="{{ route('filter') }}" method="#">
            <div class="container mx-auto px-4 py-6">
                <div class="flex flex-wrap items-center gap-4 justify-start">
                    <select class="w-40 px-4 py-2 border rounded-md" name="jenis_job">
                        <option disabled selected>Jenis</option>
                        <option value="1">Internship</option>
                        <option value="2">Part-time</option>
                    </select>
                    <select class="w-40 px-4 py-2 border rounded-md" name="tipe_job">
                        <option disabled selected>Tipe</option>
                        <option value="1">Remote</option>
                        <option value="2">On-Site</option>
                        <option value="3">Hybrid</option>
                    </select>
                    <select class="w-40 px-4 py-2 border rounded-md" name="lokasi">
                        <option disabled selected>Lokasi</option>
                        @foreach ($provinces as $province)
                            <option value="{{ $province->id }}">{{ $province->nama }}
                            </option>
                        @endforeach
                    </select>
                    <select class="w-40 px-4 py-2 border rounded-md" name="urutan">
                        <option value="terbaru">Terbaru</option>
                        <option value="terlama">Terlama</option>
                        <option value="tertinggi">Gaji Tertinggi</option>
                    </select>
                    <button class="px-4 py-2 bg-[#5d8de2] text-white rounded-md hover:bg-[#4a79c9]">
                        Filter
                    </button>
                    <button type="reset" class="px-4 py-2 bg-gray-200 rounded-md">Reset</button>
                </div>
            </div>
        </form>

        <div class="container mx-auto px-4">
            <h2 class="text-lg font-bold mb-4">Semua Lowongan ({{ $banyaklowongan }})</h2>
            {{-- card lowongan --}}
            @if (isset($query))
                <h3>Hasil pencarian untuk: "{{ $query }}"</h3>
            @endif
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($lowongans as $lowongan)
                    <div class="bg-white rounded-md shadow-md p-4">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-green-600 font-semibold text-sm">{{ $lowongan->jenisjob->jenis }}</span>
                            <span class="text-sm text-gray-600">Gaji: {{ $lowongan->gaji_min }} IDR -
                                {{ $lowongan->gaji_max }} IDR</span>
                        </div>
                        <h3 class="text-lg font-bold mb-1">{{ $lowongan->judul }}</h3>
                        <p class="text-sm text-gray-500 mb-2">{{ $lowongan->company->nama }}</p>
                        <p class="text-sm text-gray-500 mb-4">{{ $lowongan->province->nama }}, {{ $lowongan->kota->nama }}
                        </p>
                        <div class="flex items-center justify-between">
                            <button class="text-blue-600 font-semibold" data-id = "{{ $lowongan->id }}"
                                onclick="openModal('{{ $lowongan->judul }}', 
                                '{{ $lowongan->company->nama }}', 
                                '{{ $lowongan->id }}',
                                '{{ $lowongan->province->nama }}, {{ $lowongan->kota->nama }}', 
                                '{{ $lowongan->gaji_min }} IDR - {{ $lowongan->gaji_max }} IDR', 
                                '{{ $lowongan->exp_date }}', 
                                '{{ $lowongan->deskripsi }}',
                                '{{ $lowongan->kualifikasi }}')">
                                Lihat Detail
                            </button>
                            <form action="{{ route('lamar', $lowongan->id) }}" method="POST"
                                id="form-lamar-{{ $lowongan->id }}">
                                @csrf
                                <button type="button" onclick="confirmlamar('{{ $lowongan->id }}')"
                                    class="bg-blue-500 text-white px-4 py-2 rounded-md">Lamar</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>



            <div class="flex justify-center mt-6">
                <nav class="inline-flex rounded-md shadow-sm">
                    {{ $lowongans->links() }}
                </nav>
            </div>
        </div>
        <div class="mb-24"></div>

        <div id="jobModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex justify-center items-center hidden"
            style="z-index: 1050;">
            <div class="bg-white p-8 rounded-md w-full md:w-1/2 lg:w-1/3">
                <h3 id="jobTitle" class="text-2xl font-bold mb-4"></h3>
                <p><strong>Perusahaan:</strong> <span id="companyName"></span></p>
                <p><strong>Perusahaan:</strong> <span id="companyId"></span></p>
                <p><strong>Lokasi:</strong> <span id="jobLocation"></span></p>
                <p><strong>Gaji:</strong> <span id="salaryRange"></span></p>
                <p><strong>Expired Date:</strong> <span><span id="expiredDate"></span></p>
                <p class="mt-4"><strong>Deskripsi Pekerjaan:</strong></p>
                <p id="jobDescription"></p>
                <p class="mt-4"><strong>Kualifikasi:</strong></p>
                <p id="jobQualifications"></p>
                <div class="flex justify-end mt-6">
                    <button onclick="closeModal()"
                        class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600">Tutup</button>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function openModal(jobTitle, companyName, companyId, jobLocation, salaryRange, expiredDate, jobDescription,
                qualifications) {
                // Menampilkan modal
                document.getElementById('jobModal').classList.remove('hidden');
                // Mengisi data dalam modal
                document.getElementById('jobTitle').innerText = jobTitle;
                document.getElementById('companyName').innerText = companyName;
                document.getElementById('companyId').innerText = companyId;
                document.getElementById('jobLocation').innerText = jobLocation;
                document.getElementById('salaryRange').innerText = salaryRange;
                document.getElementById('expiredDate').innerText = expiredDate;
                document.getElementById('jobDescription').innerText = jobDescription;
                document.getElementById('jobQualifications').innerText = qualifications;
            }

            function closeModal() {
                // Menyembunyikan modal
                document.getElementById('jobModal').classList.add('hidden');
            }

            function confirmlamar(lowonganId) {
                Swal.fire({
                    title: 'Apakah Anda yakin ingin melamar lowongan ini?',
                    text: 'Berkas cv dan portofolio anda harus lengkap!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Lamar!',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById("form-lamar-" + lowonganId).submit();
                    }
                });
            }
        </script>
        @if (session('success'))
            <script>
                Swal.fire({
                    icon: "success",
                    title: "Login Berhasil!",
                    showConfirmButton: true,
                    ConfirmbuttonText: "OK"
                });
            </script>
        @endif
        
        @if (session('lamar_success'))
            <script>
                Swal.fire({
                    icon: "success",
                    title: "Lamaran berhasil terkirim!",
                    showConfirmButton: true,
                    ConfirmbuttonText: "OK"
                });
            </script>
        @elseif(session('fail'))
            <script>
                Swal.fire({
                    title: 'Berkas Anda Belum Lengkap!',
                    text: 'Harap lengkapi berkas Anda terlebih dahulu.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Lengkapi Berkas',
                    cancelButtonText: 'Tutup',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('cv-and-portofolio') }}";
                    }
                });
            </script>
        @elseif(session('error'))
            <script>
                Swal.fire({
                    icon: "error",
                    title: "Anda Sudah Melamar Lowongan Ini!",
                    showConfirmButton: true,
                    ConfirmbuttonText: "OK"
                });
            </script>
        @endif
    </body>

@endsection
