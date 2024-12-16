@extends('components.template')
@section('title', 'Dashboard')

@section('content')
    @include('components.headercompany')
    @if (session('success'))
        <script>
            Swal.fire({
                icon: "success",
                title: "Login Berhasil!",
                showConfirmButton: true,
                ConfirmbuttonText: "OK"
            });
        </script>
    @elseif (session('post_success'))
        <script>
            Swal.fire({
                icon: "success",
                title: "Lowongan berhasil dipost!",
                showConfirmButton: true,
                ConfirmbuttonText: "OK"
            });
        </script>
    @endif


    <div class=" main flex-1 p-6">

        <main class="flex-1 bg-white p-6">

            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Selamat Datang👋</h1>
                    <p class="text-sm text-gray-500">Berikut adalah Dashboard Lowongan Anda</p>
                </div>

                <a href="{{ route('postlowongan') }}">
                    <button class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700">
                        Post Lowongan
                    </button>
                </a>
            </div>


            <div class="grid grid-cols-2 gap-4 mb-8">
                <div class="flex items-center justify-between bg-blue-50 p-4 rounded-lg shadow">
                    <div>
                        <h3 class="text-2xl font-bold text-blue-600">{{ $banyaklowongan }}</h3>
                        <p class="text-sm text-gray-600">Lowongan</p>
                    </div>
                    <div class="text-blue-500">

                        <img src="{{ asset('storage/dashboard-resource/work-icon.webp') }}" alt="Ikon Kerja"
                            class="w-12 h-12">
                    </div>
                </div>
                <div class="flex items-center justify-between bg-yellow-50 p-4 rounded-lg shadow">
                    <div>
                        <h3 class="text-2xl font-bold text-yellow-600">{{ $totalpelamar }}</h3>
                        <p class="text-sm text-gray-600">Pelamar</p>
                    </div>
                    <div class="text-yellow-500">

                        <img src="{{ asset('storage/dashboard-resource/saved-icon.webp') }}" alt="Ikon Simpan"
                            class="w-12 h-12">
                    </div>
                </div>
            </div>

            <div class="flex justify-between items-center bg-gray-100 p-4 rounded-lg mb-4 shadow">
                <div class=" bg-white border border-gray-300 rounded-lg px-4 py-2 w-1/3">
                    <form action="{{ route('searchdashboard') }}" method="GET" class="flex justify-between">
                        <input type="text" placeholder="Cari pekerjaan..." name="search"
                            class="flex-1 outline-none text-gray-700">
                        <button type="submit" class="ml-2 text-blue-500 hover:underline">
                            Cari
                        </button>
                    </form>
                </div>


                <div class="flex items-center gap-4">
                    <div class="flex items-center bg-white border border-gray-300 rounded-lg px-4 py-2">
                        <label for="filter-date" class="text-gray-600 mr-2">Filter berdasarkan tanggal:</label>
                        <input type="date" id="filter-date" class="outline-none text-gray-700">
                    </div>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                        Terapkan
                    </button>
                </div>
            </div>



            <div>
                <table class="w-full bg-white border border-gray-200 rounded-lg shadow-md text-left ">
                    <thead class="bg-gray-100 border-b border-gray-200">

                        <tr>
                            <th class="text-left p-4 text-gray-600">Pekerjaan</th>
                            <th class="text-left p-4 text-gray-600">Status</th>
                            <th class="text-left p-4 text-gray-600">Pelamar</th>
                            <th class="text-left p-4 text-gray-600">Tanggal Berakhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($query))
                            <h3>Hasil pencarian untuk: "{{ $query }}"</h3>
                        @endif
                        @foreach ($lowongans as $lowongan)
                            <tr class="border-b border-gray-200 hover:bg-gray-50 ">
                                <td class="p-4">{{ $lowongan->judul }}</td>
                                @php
                                    if ($lowongan->status == 1) {
                                        $lowongan->status = 'Aktif';
                                    } else {
                                        $lowongan->status = 'Tidak Aktif';
                                    }
                                @endphp
                                @if ($lowongan->status == 'Aktif')
                                    <td class="p-4 text-green-500">{{ $lowongan->status }}</td>
                                @else
                                    <td class="p-4 text-red-500">{{ $lowongan->status }}</td>
                                @endif
                                <td class="p-4">{{ $lowongan->jumlah_pelamar }}</td>
                                <td class="p-4">{{ $lowongan->exp_date }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="flex justify-end items-center mt-6">
                    <div class="flex gap-2">
                        {{ $lowongans->links() }}
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
