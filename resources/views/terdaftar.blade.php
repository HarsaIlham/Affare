@extends('components.template')

@section('title', 'Lamaran Terdaftar')

@section('content')
<body class="bg-blue-50">
    <div class="container mx-auto px-4 py-6">
        <h2 class="text-lg font-bold mb-4">Lamaran Terdaftar</h2>
        <div class="flex flex-col gap-4">
            <div class="bg-white rounded-md shadow-md p-4 relative">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-yellow-500 font-semibold text-sm">PENDING</span>
                    <span class="text-sm text-gray-600">2 Desember 2024</span>
                </div>
                <h3 class="text-lg font-bold mb-1">Technical Support Specialist</h3>
                <p class="text-sm text-gray-500 mb-2">Google Inc.</p>
                <p class="text-sm text-gray-500 mb-4">Jawa Timur, Indonesia</p>
                <p class="text-sm text-gray-500 mb-2">Tanggal Pengumuman: <span class="text-blue-500">Belum Diumumkan</span></p>
                <div class="absolute bottom-4 right-4">
                    <button onclick="openModal('PENDING', '2 Desember 2024', 'Technical Support Specialist', 'Google Inc.', 'Jawa Timur, Indonesia', 'Belum Diumumkan', ['Pengalaman minimal 2 tahun di bidang terkait', 'Kemampuan komunikasi yang baik.'])" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200">Lihat Detail</button>
                </div>
            </div>

            <div class="bg-white rounded-md shadow-md p-4 relative">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-green-600 font-semibold text-sm">DITERIMA</span>
                    <span class="text-sm text-gray-600">1 Desember 2024</span>
                </div>
                <h3 class="text-lg font-bold mb-1">Senior UI/UX Designer</h3>
                <p class="text-sm text-gray-500 mb-2">Apple</p>
                <p class="text-sm text-gray-500 mb-4">Jawa Tengah, Indonesia</p>
                <p class="text-sm text-gray-500 mb-2">Tanggal Pengumuman: <span class="text-blue-500">3 Desember 2024</span></p>
                <div class="absolute bottom-4 right-4">
                    <button onclick="openModal('DITERIMA', '1 Desember 2024', 'Senior UI/UX Designer', 'Apple', 'Jawa Tengah, Indonesia', '3 Desember 2024', ['Pengalaman dalam desain UI/UX', 'Menguasai alat desain seperti Figma, Sketch, atau Adobe XD.'])" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200">Lihat Detail</button>
                </div>
            </div>

            <div class="bg-white rounded-md shadow-md p-4 relative">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-red-600 font-semibold text-sm">DITOLAK</span>
                    <span class="text-sm text-gray-600">30 November 2024</span>
                </div>
                <h3 class="text-lg font-bold mb-1">Data Scientist Intern</h3>
                <p class="text-sm text-gray-500 mb-2">IBM</p>
                <p class="text-sm text-gray-500 mb-4">Jawa Barat, Indonesia</p>
                <p class="text-sm text-gray-500 mb-2">Tanggal Pengumuman: <span class="text-blue-500">30 November 2024</span></p>
                <div class="absolute bottom-4 right-4">
                    <button onclick="openModal('DITOLAK', '30 November 2024', 'Data Scientist Intern', 'IBM', 'Jawa Barat, Indonesia', 'Ditolak', ['Memiliki pemahaman tentang Machine Learning', 'Pengalaman dengan Python dan SQL.'])" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200">Lihat Detail</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Popup -->
    <div id="modal" class="fixed inset-0 bg-gray-500 bg-opacity-50 hidden flex justify-center items-center">
        <div class="bg-white rounded-lg p-6 w-1/3 max-w-md">
            <h3 class="text-xl font-bold mb-4 text-center" id="modalStatus">Status Lamaran</h3>
            <p class="text-sm mb-2">Posisi: <span id="modalPosition"></span></p>
            <p class="text-sm mb-2">Tanggal Lamaran: <span id="modalDate"></span></p>
            <p class="text-sm mb-4">Perusahaan: <span id="modalCompany"></span></p>
            <p class="text-sm mb-2">Tanggal Pengumuman: <span id="modalAnnouncementDate"></span></p>
            <h4 class="font-semibold mb-2">Persyaratan:</h4>
            <ul id="modalRequirements" class="list-disc pl-5 text-sm"></ul>
            <div class="mt-4 flex justify-end">
                <button onclick="closeModal()" class="bg-blue-500 text-white px-4 py-2 rounded-md">Tutup</button>
            </div>
        </div>
    </div>

    <div class="mb-24"></div>
</body>

<script>
    function openModal(status, date, position, company, location, announcementDate, requirements) {
        document.getElementById('modalStatus').innerText = status;
        const statusBox = document.getElementById('modalStatus');

        statusBox.classList.remove('bg-yellow-500', 'bg-green-500', 'bg-red-500');
        if (status === 'PENDING') {
            statusBox.classList.add('bg-yellow-500', 'text-white', 'px-4', 'py-2', 'rounded-md');
        } else if (status === 'DITERIMA') {
            statusBox.classList.add('bg-green-500', 'text-white', 'px-4', 'py-2', 'rounded-md');
        } else if (status === 'DITOLAK') {
            statusBox.classList.add('bg-red-500', 'text-white', 'px-4', 'py-2', 'rounded-md');
        }

        document.getElementById('modalDate').innerText = date;
        document.getElementById('modalPosition').innerText = position;
        document.getElementById('modalCompany').innerText = company;
        document.getElementById('modalAnnouncementDate').innerText = announcementDate;

        const requirementsList = document.getElementById('modalRequirements');
        requirementsList.innerHTML = '';
        requirements.forEach(req => {
            const listItem = document.createElement('li');
            listItem.innerText = req;
            requirementsList.appendChild(listItem);
        });

        document.getElementById('modal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('modal').classList.add('hidden');
    }
</script>

@endsection
