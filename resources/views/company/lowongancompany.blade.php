@extends('components.template')

@section('title', 'Lowongan Saya')

@section('content')
@include('components.headercompany')

<div class="main flex-1 bg-white p-6">
    <main class="flex-1 bg-white p-6">

        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-bold">Lowongan Saya (589)</h1>
            
        <a href="{{ route('company.postlowongan') }}" >
            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700">
                Post Lowongan
            </button>
        </a>
        </div>


        <div class="flex justify-between items-center bg-gray-100 p-4 rounded-lg mb-4 shadow">

            <div class="flex items-center bg-white border border-gray-300 rounded-lg px-4 py-2 w-1/3">
                <input 
                    type="text" 
                    placeholder="Cari pekerjaan..." 
                    class="flex-1 outline-none text-gray-700"
                >
                <button class="ml-2 text-blue-500 hover:underline">
                    Cari
                </button>
            </div>

            <div class="flex items-center gap-4">
                <div class="flex items-center bg-white border border-gray-300 rounded-lg px-4 py-2">
                    <label for="filter-date" class="text-gray-600 mr-2">Filter berdasarkan tanggal:</label>
                    <input 
                        type="date" 
                        id="filter-date" 
                        class="outline-none text-gray-700"
                    >
                </div>
                <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                    Terapkan
                </button>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md">
            <table class="w-full bg-white border border-gray-200 rounded-lg shadow-md">
                <thead>
                    <tr class="border-b bg-gray-50">
                        <th class="py-4 px-6">Pekerjaan</th>
                        <th class="py-4 px-6">Jenis</th>
                        <th class="py-4 px-6">Status</th>
                        <th class="py-4 px-6">Jumlah Pelamar</th>
                        <th class="py-4 px-6">Tanggal Berakhir</th>
                        <th class="py-4 px-6">Terakhir Diperbarui</th>
                        <th class="py-4 px-6">Perbarui</th>
                        <th class="py-4 px-6">Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="py-4 px-6">UI/UX Designer</td>
                        <td class="py-4 px-6">Internship</td>
                        <td class="py-4 px-6 text-green-600">Aktif</td>
                        <td class="py-4 px-6">798 Pelamar</td>
                        <td class="py-4 px-6">15 Des 2024</td>
                        <td class="py-4 px-6">1 Des 2024</td>
                        <td class="py-4 px-6">
                            <a href="{{ route('company.updatelowongan') }}" >
                                <button class="bg-yellow-400 text-white px-4 py-2 rounded-lg hover:bg-yellow-500">Perbarui</button>
                            </a>
                        </td>
                        <td class="py-4 px-6">
                            <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">Hapus</button>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-4 px-6">Senior UX Designer</td>
                        <td class="py-4 px-6">Part Time</td>
                        <td class="py-4 px-6 text-green-600">Aktif</td>
                        <td class="py-4 px-6">185 Pelamar</td>
                        <td class="py-4 px-6">20 Des 2024</td>
                        <td class="py-4 px-6">5 Des 2024</td>
                        <td class="py-4 px-6">
                            <button class="bg-yellow-400 text-white px-4 py-2 rounded-lg hover:bg-yellow-500">Perbarui</button>
                        </td>
                        <td class="py-4 px-6">
                            <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">Hapus</button>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-4 px-6">Technical Support Specialist</td>
                        <td class="py-4 px-6">Internship</td>
                        <td class="py-4 px-6 text-red-600">Ditutup</td>
                        <td class="py-4 px-6">556 Pelamar</td>
                        <td class="py-4 px-6">5 Des 2024</td>
                        <td class="py-4 px-6">25 Nov 2024</td>
                        <td class="py-4 px-6">
                            <button class="bg-yellow-400 text-white px-4 py-2 rounded-lg hover:bg-yellow-500">Perbarui</button>
                        </td>
                        <td class="py-4 px-6">
                            <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        

        <div class="flex justify-between items-center mt-6">
            <p class="text-gray-600">Menampilkan 1 hingga 10 dari 589 entri</p>
            <div class="flex gap-2">
                <button class="px-4 py-2 border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-100">Sebelumnya</button>
                <button class="px-4 py-2 border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-100">1</button>
                <button class="px-4 py-2 border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-100">2</button>
                <button class="px-4 py-2 border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-100">Selanjutnya</button>
            </div>
        </div>
    </main>
</div>

@endsection
