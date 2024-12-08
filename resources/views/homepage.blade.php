@extends('components.template')

@section('title', 'Homepage')

@section('content')


    <body class="bg-blue-50">
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
        @if (session('logout_success'))
            <script>
                Swal.fire({
                    icon: "success",
                    title: "Anda telah logout!",
                    showConfirmButton: true,
                    ConfirmbuttonText: "OK"
                });
            </script>
        @endif

        <div class="bg-blue-500 text-white py-20 relative">
            <div class="container mx-auto px-4 text-center relative z-10">
                <h1 class="text-3xl font-bold mb-4">Temukan peluangmu di sini!</h1>
                <div class="flex justify-center relative">
                    <input type="text" placeholder="Cari Lowongan"
                        class="w-full max-w-md px-4 py-2 rounded-l-md border border-gray-300 focus:outline-none" />
                    <button class="bg-blue-600 px-6 py-2 text-white font-semibold rounded-r-md hover:bg-blue-700">
                        Cari
                    </button>
                </div>
            </div>
            <img src="{{ asset('storage/homepage-resource/element-section.webp') }}" alt="Illustration"
                class="absolute bottom-0 right-0 w-1/3 lg:w-1/4 h-auto object-cover opacity-50 md:opacity-100 z-0" />
        </div>


        <form action="#" method="#">
            <div class="container mx-auto px-4 py-6">
                <div class="flex flex-wrap items-center gap-4 justify-start">
                    <select class="w-40 px-4 py-2 border rounded-md">
                        <option disabled selected>Jenis</option>
                        <option>Part-time</option>
                        <option>Internship</option>
                    </select>
                    <select class="w-40 px-4 py-2 border rounded-md">
                        <option disabled selected>Tipe</option>
                        <option>On-Site</option>
                        <option>Hybrid</option>
                        <option>Remote</option>
                    </select>
                    <select class="w-40 px-4 py-2 border rounded-md">
                        <option disabled selected>Lokasi</option>
                        @foreach ($provinces as $province)
                            <option value="{{ $province->id }}">{{ $province->nama }}
                            </option>
                        @endforeach
                    </select>
                    <select class="w-40 px-4 py-2 border rounded-md">
                        <option disabled selected>Gaji</option>
                        <option value="500000-2500000">Rp 500.000 - Rp 2.500.000</option>
                        <option value="2500000-4000000">Rp 2.500.000 - Rp 4.000.000</option>
                        <option value="4000000-5000000">Rp 4.000.000 - Rp 5.000.000</option>
                        <option value="> 5000000">> Rp 5.000.000</option>
                    </select>
                    <select class="w-40 px-4 py-2 border rounded-md">
                        <option>Terbaru</option>
                        <option>Gaji Tertinggi</option>
                    </select>
                    <button class="px-4 py-2 bg-[#5d8de2] text-white rounded-md hover:bg-[#4a79c9]">
                        Filter
                    </button>
                    <button type="reset" class="px-4 py-2 bg-gray-200 rounded-md">Reset</button>
                </div>
            </div>
        </form>


        {{-- card lowongan --}}
        <div class="container mx-auto px-4">
            <h2 class="text-lg font-bold mb-4">Semua Lowongan (2310)</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white rounded-md shadow-md p-4">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-green-600 font-semibold text-sm">PART-TIME</span>
                        <span class="text-sm text-gray-600">Gaji: 2.000.000 IDR - 3.000.000 IDR</span>
                    </div>
                    <h3 class="text-lg font-bold mb-1">Technical Support Specialist</h3>
                    <p class="text-sm text-gray-500 mb-2">Google Inc.</p>
                    <p class="text-sm text-gray-500 mb-4">Jawa Timur, Indonesia</p>
                    <div class="flex items-center justify-between">
                        <button class="text-blue-600 font-semibold"
                            onclick="openModal('Technical Support Specialist', 'Google Inc.', 'Jawa Timur, Indonesia', '2.000.000 IDR - 3.000.000 IDR', 'Menyediakan dukungan teknis kepada pelanggan, memastikan perangkat keras dan perangkat lunak berjalan dengan baik.', 'Pengalaman dengan sistem jaringan dan perangkat keras komputer. Kemampuan analitis yang kuat.')">
                            Lihat Detail
                        </button>
                        <button onclick="checkProfileCompletion()"
                            class="bg-blue-500 text-white px-4 py-2 rounded-md">Lamar</button>
                    </div>
                </div>
            </div>

            <div class="flex justify-center mt-6">
                <nav class="inline-flex rounded-md shadow-sm">
                    <a href="#"
                        class="px-3 py-2 bg-white text-gray-500 border border-gray-300 rounded-l-md hover:bg-blue-100">
                        Sebelumnya
                    </a>
                    <a href="#" class="px-3 py-2 bg-white text-gray-500 border border-gray-300 hover:bg-blue-100">
                        1
                    </a>
                    <a href="#" class="px-3 py-2 bg-white text-gray-500 border border-gray-300 hover:bg-blue-100">
                        2
                    </a>
                    <a href="#" class="px-3 py-2 bg-white text-gray-500 border border-gray-300 hover:bg-blue-100">
                        3
                    </a>
                    <a href="#"
                        class="px-3 py-2 bg-white text-gray-500 border border-gray-300 rounded-r-md hover:bg-blue-100">
                        Selanjutnya
                    </a>
                </nav>
            </div>
        </div>
        <div class="mb-24"></div>

        <div id="jobModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex justify-center items-center hidden"
            style="z-index: 1050;">
            <div class="bg-white p-8 rounded-md w-full md:w-1/2 lg:w-1/3">
                <h3 id="jobTitle" class="text-2xl font-bold mb-4"></h3>
                <p><strong>Perusahaan:</strong> <span id="companyName"></span></p>
                <p><strong>Lokasi:</strong> <span id="jobLocation"></span></p>
                <p><strong>Gaji:</strong> <span id="salaryRange"></span></p>
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
            function openModal(jobTitle, companyName, jobLocation, salaryRange, jobDescription, qualifications) {
                // Menampilkan modal
                document.getElementById('jobModal').classList.remove('hidden');

                // Mengisi data dalam modal
                document.getElementById('jobTitle').innerText = jobTitle;
                document.getElementById('companyName').innerText = companyName;
                document.getElementById('jobLocation').innerText = jobLocation;
                document.getElementById('salaryRange').innerText = salaryRange;
                document.getElementById('jobDescription').innerText = jobDescription;
                document.getElementById('jobQualifications').innerText = qualifications;
            }

            function closeModal() {
                // Menyembunyikan modal
                document.getElementById('jobModal').classList.add('hidden');
            }

            function checkProfileCompletion() {
                let isProfileComplete = true;
                let missingFields = [];

                let userProfile = {
                    name: "Wahyu J. Maulidan", // Nama
                    location: "Indramayu", // Lokasi
                    address: "", // Alamat
                    phone: "081234567890", // No Telepon
                    education: "S1 Teknik Informatika", // Pendidikan
                    work_status: "Sedang Bekerja", // Status Bekerja
                    email: "wahyujumahm@gmail.com", // Email
                    linkedin: "https://www.linkedin.com/in/username", // LinkedIn
                    cv: false, // CV
                    portfolio: false // Portofolio
                };

                if (!userProfile.name) missingFields.push("Nama");
                if (!userProfile.location) missingFields.push("Lokasi");
                if (!userProfile.address) missingFields.push("Alamat");
                if (!userProfile.phone) missingFields.push("Nomor Telepon");
                if (!userProfile.education) missingFields.push("Pendidikan");
                if (!userProfile.work_status) missingFields.push("Status Bekerja");
                if (!userProfile.email) missingFields.push("Email");
                if (!userProfile.linkedin) missingFields.push("LinkedIn");
                if (!userProfile.cv) missingFields.push("CV");
                if (!userProfile.portfolio) missingFields.push("Portofolio");

                if (missingFields.length > 0) {
                    let missingList = missingFields.join(", ");
                    Swal.fire({
                        title: 'Profil Anda Belum Lengkap!',
                        text: `Bagian yang kurang: ${missingList}`,
                        icon: 'warning',
                        confirmButtonText: 'Tutup'
                    });
                } else {
                    Swal.fire({
                        title: 'Berhasil Melamar!',
                        text: 'Lamaran Anda telah berhasil terkirim.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                }
            }
        </script>
    </body>

@endsection
