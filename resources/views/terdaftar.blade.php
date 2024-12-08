@extends('components.template')

@section('title', 'Lamaran Terdaftar')

@section('content')
<body class="bg-blue-50">
    <div class="container mx-auto px-4 py-6">
        <h2 class="text-lg font-bold mb-4">Lamaran Terdaftar</h2>

        <div class="flex flex-col gap-4" id="applications-list">
            {{-- card 1 --}}
            <div class="bg-white rounded-md shadow-md p-4 relative">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-yellow-500 font-semibold text-sm">Menunggu</span>
                    <span class="text-sm text-gray-600">2 Desember 2024</span>
                </div>
                <h3 class="text-lg font-bold mb-1">Customer Experience Intern</h3>
                <p class="text-sm text-gray-500 mb-2">Dealls</p>
                <p class="text-sm text-gray-500 mb-4">Jakarta Selatan</p>
                <p class="text-sm text-gray-500 mb-2">Tanggal Pengumuman: <span class="text-yellow-500">Masih dalam status perjalanan</span></p>
                <div class="absolute bottom-4 right-4">
                    <button onclick="openModal('Customer Experience Intern', '2 Desember 2024', 'Dealls', ['Menunggu', 'Sedang Review', 'Interview', 'Pengumuman'], 'Diterima', 3)" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200">Lihat Detail</button>
                </div>
            </div>

            {{-- card 2 --}}
            <div class="bg-white rounded-md shadow-md p-4 relative">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-orange-500 font-semibold text-sm">Sedang Review</span>
                    <span class="text-sm text-gray-600">1 Desember 2024</span>
                </div>
                <h3 class="text-lg font-bold mb-1">Marketing Manager</h3>
                <p class="text-sm text-gray-500 mb-2">XYZ Corp</p>
                <p class="text-sm text-gray-500 mb-4">Bandung</p>
                <p class="text-sm text-gray-500 mb-2">Tanggal Pengumuman: <span class="text-yellow-500">Masih dalam status perjalanan</span></p>
                <div class="absolute bottom-4 right-4">
                    <button onclick="openModal('Marketing Manager', '1 Desember 2024', 'XYZ Corp', ['Menunggu', 'Sedang Review', 'Interview', 'Pengumuman'], 'Ditolak', 2)" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200">Lihat Detail</button>
                </div>
            </div>

            {{-- card 3 --}}
            <div class="bg-white rounded-md shadow-md p-4 relative">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-purple-500 font-semibold text-sm">Interview</span>
                    <span class="text-sm text-gray-600">30 November 2024</span>
                </div>
                <h3 class="text-lg font-bold mb-1">Software Engineer</h3>
                <p class="text-sm text-gray-500 mb-2">Tech Solutions</p>
                <p class="text-sm text-gray-500 mb-4">Jakarta</p>
                <p class="text-sm text-gray-500 mb-2">Tanggal Pengumuman: <span class="text-yellow-500">Masih dalam status perjalanan</span></p>
                <div class="absolute bottom-4 right-4">
                    <button onclick="openModal('Software Engineer', '30 November 2024', 'Tech Solutions', ['Menunggu', 'Sedang Review', 'Interview', 'Pengumuman'], 'Diterima', 3)" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200">Lihat Detail</button>
                </div>
            </div>

            {{-- card 4 --}}
            <div class="bg-white rounded-md shadow-md p-4 relative">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-green-500 font-semibold text-sm">Diterima</span>
                    <span class="text-sm text-gray-600">28 November 2024</span>
                </div>
                <h3 class="text-lg font-bold mb-1">UI/UX Designer</h3>
                <p class="text-sm text-gray-500 mb-2">Creative Agency</p>
                <p class="text-sm text-gray-500 mb-4">Yogyakarta</p>
                <p class="text-sm text-gray-500 mb-2">Tanggal Pengumuman: <span class="text-yellow-500">Masih dalam status perjalanan</span></p>
                <div class="absolute bottom-4 right-4">
                    <button onclick="openModal('UI/UX Designer', '28 November 2024', 'Creative Agency', ['Menunggu', 'Sedang Review', 'Interview', 'Pengumuman'], 'Diterima', 4)" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200">Lihat Detail</button>
                </div>
            </div>

            {{-- card 5 --}}
            <div class="bg-white rounded-md shadow-md p-4 relative">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-red-500 font-semibold text-sm">Ditolak</span>
                    <span class="text-sm text-gray-600">27 November 2024</span>
                </div>
                <h3 class="text-lg font-bold mb-1">Product Manager</h3>
                <p class="text-sm text-gray-500 mb-2">InnovateTech</p>
                <p class="text-sm text-gray-500 mb-4">Surabaya</p>
                <p class="text-sm text-gray-500 mb-2">Tanggal Pengumuman: <span class="text-yellow-500">Masih dalam status perjalanan</span></p>
                <div class="absolute bottom-4 right-4">
                    <button onclick="openModal('Product Manager', '27 November 2024', 'InnovateTech', ['Menunggu', 'Sedang Review', 'Interview', 'Pengumuman'], 'Diterima', 1)" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200">Lihat Detail</button>
                </div>
            </div>
        </div>
    </div>

    <div id="modal" class="fixed inset-0 bg-gray-500 bg-opacity-50 hidden flex justify-center items-center">
        <div class="bg-white rounded-lg p-6 w-1/3 max-w-md">
            <h3 class="text-xl font-bold mb-4 text-center">Detail Perjalanan Lamaran</h3>
            <p class="text-sm mb-2">Posisi: <span id="modalPosition"></span></p>
            <p class="text-sm mb-2">Tanggal Lamaran: <span id="modalDate"></span></p>
            <p class="text-sm mb-4">Perusahaan: <span id="modalCompany"></span></p>

            <div class="mb-4">
                <h4 class="font-semibold mb-2">Perjalanan Status:</h4>
                <div id="timeline" class="border-l border-gray-300 pl-4">
                </div>
            </div>

            <p class="text-sm mb-2">Hasil Akhir: <span id="modalResult" class="font-semibold"></span></p>

            <div class="mt-4 flex justify-end">
                <button onclick="closeModal()" class="bg-blue-500 text-white px-4 py-2 rounded-md">Tutup</button>
            </div>
        </div>
    </div>

    <div class="mb-24"></div>
</body>

<script>
    function openModal(position, date, company, statuses, result, currentStatusIndex) {
        document.getElementById('modalPosition').innerText = position;
        document.getElementById('modalDate').innerText = date;
        document.getElementById('modalCompany').innerText = company;

        const timeline = document.getElementById('timeline');
        timeline.innerHTML = '';

        statuses.forEach((status, index) => {
            const statusItem = document.createElement('div');
            statusItem.classList.add('flex', 'items-center', 'mb-4');

            const circle = document.createElement('div');
            circle.classList.add('w-4', 'h-4', 'rounded-full', 'mr-4', index <= currentStatusIndex ? 'bg-green-500' : 'bg-gray-300');
            statusItem.appendChild(circle);

            const statusText = document.createElement('p');
            statusText.classList.add('text-sm', getStatusColor(status));
            statusText.innerText = status;
            statusItem.appendChild(statusText);

            timeline.appendChild(statusItem);
        });

        const modalResult = document.getElementById('modalResult');
        modalResult.innerText = result;
        modalResult.classList.remove('text-green-600', 'text-red-600');
        modalResult.classList.add(result === 'Diterima' ? 'text-green-600' : 'text-red-600');

        document.getElementById('modal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('modal').classList.add('hidden');
    }

    function getStatusColor(status) {
        switch(status) {
            case 'Menunggu': return 'text-yellow-500';
            case 'Sedang Review': return 'text-orange-500';
            case 'Interview': return 'text-purple-500';
            case 'Pengumuman': return 'text-blue-500';
            case 'Diterima': return 'text-green-500';
            case 'Ditolak': return 'text-red-500';
            default: return 'text-gray-500';
        }
    }
</script>

@endsection
