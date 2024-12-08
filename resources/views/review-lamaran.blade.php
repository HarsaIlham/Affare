@extends('components.template')

@section('title', 'Daftar Pelamar')

@section('content')
<body class="bg-blue-50">
    <div class="container mx-auto px-4 py-6">
        <h2 class="text-lg font-bold mb-4">Daftar Pelamar</h2>
        <div class="flex flex-col gap-4" id="applications-list">
        </div>
    </div>

    <div id="modal" class="fixed inset-0 bg-gray-500 bg-opacity-50 hidden flex justify-center items-center z-50">
        <div class="bg-white rounded-lg p-6 w-full max-w-3xl h-auto overflow-auto max-h-[90vh]">
            <h3 class="text-xl font-bold mb-4 text-center" id="modalStatus">Status Lamaran</h3>

            <table class="w-full text-left border-collapse mb-4">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-2 px-4 border-b font-medium text-gray-700">Informasi</th>
                        <th class="py-2 px-4 border-b font-medium text-gray-700">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-2 px-4 border-b text-gray-700">Nama</td>
                        <td class="py-2 px-4 border-b text-gray-700" id="modalApplicantName"></td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border-b text-gray-700">Lokasi</td>
                        <td class="py-2 px-4 border-b text-gray-700" id="modalLocation"></td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border-b text-gray-700">Alamat</td>
                        <td class="py-2 px-4 border-b text-gray-700" id="modalAddress"></td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border-b text-gray-700">Nomor Telepon</td>
                        <td class="py-2 px-4 border-b text-gray-700" id="modalPhoneNumber"></td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border-b text-gray-700">Pendidikan</td>
                        <td class="py-2 px-4 border-b text-gray-700" id="modalEducation"></td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border-b text-gray-700">Status Bekerja</td>
                        <td class="py-2 px-4 border-b text-gray-700" id="modalWorkStatus"></td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border-b text-gray-700">Email</td>
                        <td class="py-2 px-4 border-b text-gray-700" id="modalEmail"></td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border-b text-gray-700">LinkedIn</td>
                        <td class="py-2 px-4 border-b text-gray-700" id="modalLinkedIn"></td>
                    </tr>
                </tbody>
            </table>

            <div class="mt-4">
                <h5 class="font-semibold mb-2">CV dan Portofolio</h5>
                <div id="cvSection" class="mb-4">
                    <p>CV Terunggah: <a href="#" class="text-blue-500 hover:underline" target="_blank" id="modalCvLink">Unduh CV</a></p>
                </div>
                <div id="portfolioSection">
                    <p>Portofolio Terunggah: <a href="#" class="text-blue-500 hover:underline" target="_blank" id="modalPortfolioLink">Unduh Portofolio</a></p>
                </div>
            </div>

            <p class="text-sm mb-2">Bidang yang Dilamar: <span id="modalJobField"></span></p>
            <p class="text-sm mb-4">Tanggal Lamaran: <span id="modalDate"></span></p>

            <h4 class="font-semibold mb-2">Pilih Status Pelamar:</h4>
            <div class="mb-4">
                <select id="statusDropdown" class="border border-gray-300 rounded-md p-2 w-full">
                    <option value="Menunggu">Menunggu</option>
                    <option value="Sedang direview">Sedang direview</option>
                    <option value="Interview">Interview</option>
                    <option value="DITERIMA">Diterima</option>
                    <option value="DITOLAK">Ditolak</option>
                </select>
            </div>

            <div class="mt-4 flex justify-end gap-2">
                <button onclick="updateStatus()" class="bg-blue-500 text-white px-4 py-2 rounded-md">Update Status</button>
                <button onclick="closeModal()" class="bg-gray-500 text-white px-4 py-2 rounded-md">Tutup</button>
            </div>
            <input type="hidden" id="applicationId" value="" />
        </div>
    </div>

    <div class="mb-24"></div>
</body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const applications = [
        {
            id: 1,
            applicant_name: 'Andi Pratama',
            job_field: 'Software Engineer',
            status: 'Menunggu',
            status_color: 'yellow-500',
            created_at: '2024-12-01',
            cv: 'https://example.com/cv_andi.pdf',
            portfolio: 'https://example.com/portfolio_andi.pdf',
            location: 'Indramayu, Jawa Barat',
            address: 'Jl. Mangga No. 45, Kecamatan XYZ',
            phone_number: '081234567890',
            education: 'S1 Teknik Informatika',
            work_status: 'Sedang Bekerja',
            email: 'andi@example.com',
            linkedin: 'https://www.linkedin.com/in/andi'
        },
        {
            id: 2,
            applicant_name: 'Budi Santoso',
            job_field: 'UI/UX Designer',
            status: 'Menunggu',
            status_color: 'yellow-500',
            created_at: '2024-11-15',
            cv: 'https://example.com/cv_budi.pdf',
            portfolio: 'https://example.com/portfolio_budi.pdf',
            location: 'Bandung, Jawa Barat',
            address: 'Jl. Raya No. 10',
            phone_number: '081234567891',
            education: 'S1 Desain Komunikasi Visual',
            work_status: 'Freelancer',
            email: 'budi@example.com',
            linkedin: 'https://www.linkedin.com/in/budi'
        },
        {
            id: 3,
            applicant_name: 'Citra Dewi',
            job_field: 'Product Manager',
            status: 'Menunggu',
            status_color: 'yellow-500',
            created_at: '2024-10-20',
            cv: 'https://example.com/cv_citra.pdf',
            portfolio: 'https://example.com/portfolio_citra.pdf',
            location: 'Jakarta',
            address: 'Jl. Kebon Jeruk No. 30',
            phone_number: '081234567892',
            education: 'S1 Manajemen',
            work_status: 'Bekerja di Startup',
            email: 'citra@example.com',
            linkedin: 'https://www.linkedin.com/in/citra'
        }
    ];

    function renderApplications() {
        const listElement = document.getElementById('applications-list');
        listElement.innerHTML = '';

        applications.forEach(application => {
            const applicationElement = document.createElement('div');
            applicationElement.classList.add('bg-white', 'rounded-md', 'shadow-md', 'p-4', 'relative');


            let statusColor = '';
            if (application.status === 'Menunggu') statusColor = 'text-yellow-500';
            if (application.status === 'Sedang direview') statusColor = 'text-orange-500';
            if (application.status === 'Interview') statusColor = 'text-purple-500';
            if (application.status === 'DITERIMA') statusColor = 'text-green-500';
            if (application.status === 'DITOLAK') statusColor = 'text-red-500';

            applicationElement.innerHTML = `
                <div class="flex justify-between items-center mb-2">
                    <span class="text-sm text-gray-600">${new Date(application.created_at).toLocaleDateString()}</span>
                </div>
                <h3 class="text-lg font-bold mb-1">${application.applicant_name}</h3>
                <p class="text-sm text-gray-500 mb-2">${application.job_field}</p>
                <div class="flex justify-between items-center">
                    <span class="text-sm ${statusColor}">${application.status}</span>
                    <button onclick="openModal(${application.id}, '${application.status}', '${application.applicant_name}', '${application.job_field}', '${new Date(application.created_at).toLocaleDateString()}', '${application.cv}', '${application.portfolio}', '${application.location}', '${application.address}', '${application.phone_number}', '${application.education}', '${application.work_status}', '${application.email}', '${application.linkedin}')" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200">Lihat Detail</button>
                </div>
            `;

            listElement.appendChild(applicationElement);
        });
    }

    function openModal(applicationId, status, applicantName, jobField, date, cvLink, portfolioLink, location, address, phoneNumber, education, workStatus, email, linkedin) {
        document.getElementById('modalStatus').innerText = 'Status Lamaran: ' + status;


        let modalStatusColor = '';
        if (status === 'Menunggu') modalStatusColor = 'text-yellow-500';
        if (status === 'Sedang direview') modalStatusColor = 'text-orange-500';
        if (status === 'Interview') modalStatusColor = 'text-purple-500';
        if (status === 'DITERIMA') modalStatusColor = 'text-green-500';
        if (status === 'DITOLAK') modalStatusColor = 'text-red-500';


        document.getElementById('modalStatus').classList.add(modalStatusColor);

        document.getElementById('modalApplicantName').innerText = applicantName;
        document.getElementById('modalJobField').innerText = jobField;
        document.getElementById('modalDate').innerText = date;


        document.getElementById('modalLocation').innerText = location;
        document.getElementById('modalAddress').innerText = address;
        document.getElementById('modalPhoneNumber').innerText = phoneNumber;
        document.getElementById('modalEducation').innerText = education;
        document.getElementById('modalWorkStatus').innerText = workStatus;
        document.getElementById('modalEmail').innerText = email;
        document.getElementById('modalLinkedIn').innerHTML = `<a href="${linkedin}" class="text-blue-500 hover:underline" target="_blank">${linkedin}</a>`;

        document.getElementById('statusDropdown').value = status;
        document.getElementById('applicationId').value = applicationId;

        document.getElementById('modalCvLink').href = cvLink;
        document.getElementById('modalPortfolioLink').href = portfolioLink;

        document.getElementById('modal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('modal').classList.add('hidden');
    }

    function updateStatus() {
        const applicationId = document.getElementById('applicationId').value;
        const newStatus = document.getElementById('statusDropdown').value;

        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: `Status lamaran pelamar dengan ID ${applicationId} akan diperbarui menjadi "${newStatus}".`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, perbarui!',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Status Terupdate!',
                    `Status lamaran dengan ID ${applicationId} telah diperbarui menjadi ${newStatus}.`,
                    'success'
                );

                closeModal();
                renderApplications();
            } else {
                Swal.fire(
                    'Dibatalkan',
                    'Status lamaran tetap tidak berubah.',
                    'error'
                );
            }
        });
    }

    renderApplications();
</script>

@endsection
