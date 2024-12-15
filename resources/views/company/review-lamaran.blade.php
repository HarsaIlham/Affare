@extends('components.template')

@section('title', 'Daftar Pelamar')

@section('content')
    @include('components.headercompany')

    <body class="bg-blue-50">
        <div class="container mx-auto px-4 py-6">
            <h2 class="text-lg font-bold mb-4">Daftar Pelamar</h2>
            <div class="flex flex-col gap-4" id="applications-list">
            </div>
        </div>
        @foreach ($lamarans as $lamaran)
            <div class="bg-white p-4 shadow rounded-lg flex justify-between items-center">
                <div>
                    <p class="text-gray-500 text-sm">{{ $lamaran->created_at }}</p>
                    <p class="text-lg font-semibold text-gray-800">{{ $lamaran->seeker->nama }}</p>
                    <p class="text-gray-600">{{ $lamaran->lowongan->judul }}</p>
                    <p class="text-yellow-600">Status: {{ $lamaran->status }}</p>
                </div>

                <button type="button"
                    onclick="openModal('{{ $lamaran->id }}','{{ $lamaran->status }}', 
                '{{ $lamaran->seeker->nama }}',
                '{{ $lamaran->lowongan->judul }}',
                '{{ $lamaran->seeker->alamat . ', ' . $lamaran->seeker->kota->nama . ', ' . $lamaran->seeker->province->nama }}',
                '{{ $lamaran->seeker->no_telepon }}',
                '{{ $lamaran->seeker->pendidikan }}',
                '{{ $lamaran->seeker->status }}',
                '{{ $lamaran->seeker->email }}',
                '{{ $lamaran->seeker->linkedin }}',
                '{{ $lamaran->created_at->format('Y-m-d') }}',
                '{{ $lamaran->seeker->cv }}',
                '{{ $lamaran->seeker->portofolio }}')"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Lihat Detail</button>
            </div>
        @endforeach
        <div id="modal" class="fixed inset-0 bg-gray-500 bg-opacity-50 hidden flex justify-center items-center">
            <div class="bg-white rounded-lg p-6 w-1/3 max-w-md">
                <h3 class="text-xl font-bold mb-4 text-center" id="modalStatus">Status Lamaran</h3>
                <p class="text-sm mb-2">Nama Pelamar: <span id="modalApplicantName"></span></p>
                <p class="text-sm mb-2">Bidang yang Dilamar: <span id="modalJobField"></span></p>
                <p class="text-sm mb-2">Alamat Pelamar: <span id="modalApplicantAddress"></span></p>
                <p class="text-sm mb-2">No. Telepon: <span id="modalApplicantPhone"></span></p>
                <p class="text-sm mb-2">Pendidikan Terakhir: <span id="modalApplicantEducation"></span></p>
                <p class="text-sm mb-2">Status Bekerja: <span id="modalApplicantStatus"></span></p>
                <p class="text-sm mb-2">Email: <span id="modalApplicantEmail"></span></p>
                <p class="text-sm mb-2">Linkedin: <a href="" id="modalApplicantLinkedin"
                        class="text-blue-500 hover:underline" target="_blank"></a></p>
                <p class="text-sm mb-4">Tanggal Lamaran: <span id="modalDate"></span></p>
                <div class="mt-4">
                    <h5 class="font-semibold mb-1">CV dan Portofolio</h5>
                    <div id="cvSection" class="mb-4">
                        <p>CV Terunggah: <a href="#" class="text-blue-500 hover:underline" target="_blank"
                                id="modalApplicantCv">Unduh CV</a></p>
                    </div>
                    <div id="portfolioSection">
                        <p>Portofolio Terunggah: <a href="#" class="text-blue-500 hover:underline" target="_blank"
                                id="modalApplicantPortfolio">Unduh Portofolio</a></p>
                    </div>
                </div>

                <h4 class="font-semibold mb-2 mt-4">Pilih Status Pelamar:</h4>
                <form action="{{ route('updatestatus') }}" method="POST" id="statusForm">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <select id="statusDropdown" name="status" class="border border-gray-300 rounded-md p-2 w-full">
                            <option value="{{ $lamaran->status }}" selected>{{ $lamaran->status }}</option>
                            <option value="DITERIMA">DITERIMA</option>
                            <option value="DITOLAK">DITOLAK</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <input type="text" id="applicationId" name="applicationId" hidden value="{{ $lamaran->id }}">
                    @error('applicationId')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <div class="mt-4 flex justify-end">
                        <button type="button" onclick="updateStatus()"
                            class="bg-blue-500 text-white px-4 py-2 rounded-md">Update
                            Status</button>
                        <button type="button" onclick="closeModal()"
                            class="bg-gray-500 text-white px-4 py-2 rounded-md ml-2">Tutup</button>
                        <input type="hidden" id="applicationId" value="" />
                    </div>
                </form>
                <!-- Hidden input untuk menyimpan applicationId -->
            </div>
        </div>


        <div class="mb-24"></div>
    </body>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert2 CDN -->

    <script>
        function openModal(applicationId, status, applicantName, jobField, applicantAddress,
            applicantPhone, applicantEducation, applicantStatus, applicantEmail, applicantLinkedin, date, applicantCv,
            applicantPortfolio) {
            document.getElementById('modalStatus').innerText = 'Status Lamaran: ' + status;
            document.getElementById('modalApplicantName').innerText = applicantName;
            document.getElementById('modalJobField').innerText = jobField;
            document.getElementById('modalApplicantAddress').innerText = applicantAddress;
            document.getElementById('modalApplicantPhone').innerText = applicantPhone;
            document.getElementById('modalApplicantEducation').innerText = applicantEducation;
            document.getElementById('modalApplicantStatus').innerText = applicantStatus;
            document.getElementById('modalApplicantEmail').innerText = applicantEmail;
            document.getElementById('modalApplicantLinkedin').setAttribute('href', applicantLinkedin);
            document.getElementById('modalApplicantLinkedin').innerText = applicantLinkedin;
            document.getElementById('modalApplicantCv').setAttribute('href', `{{ asset('storage/${applicantCv}') }}`);
            document.getElementById('modalApplicantPortfolio').setAttribute('href',
                `{{ asset('storage/${applicantPortfolio}') }}`);
            document.getElementById('modalDate').innerText = date;

            document.getElementById('statusDropdown').value = status;

            document.getElementById('applicationId').value = applicationId;



            document.getElementById('modal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('modal').classList.add('hidden');
        }

        function updateStatus() {
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
                    document.getElementById("statusForm").submit();
                }
            });
        }
    </script>
    @if (session('update_status'))
        <script>
            Swal.fire({
                icon: "success",
                title: "Status lamaran berhasil diubah!",
                showConfirmButton: true,
                ConfirmbuttonText: "OK"
            });
        </script>
    @endif

@endsection
