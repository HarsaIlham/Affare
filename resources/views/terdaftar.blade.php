@extends('components.template')

@section('title', 'Lamaran Terdaftar')

@section('content')
    <x-header></x-header>

    <body class="bg-blue-50">
        <div class="container mx-auto px-4 py-6">
            <h2 class="text-lg font-bold mb-4">Lamaran Terdaftar</h2>

            <div class="flex flex-col gap-4" id="applications-list">
                @foreach ($lamarans as $lamaran)
                    <div class="bg-white rounded-md shadow-md p-4 relative">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-yellow-500 font-semibold text-sm">{{ $lamaran->status }}</span>
                            <span class="text-sm text-gray-600">{{ $lamaran->created_at->format('d M Y') }}</span>
                        </div>
                        <h3 class="text-lg font-bold mb-1">{{ $lamaran->lowongan->judul }}</h3>
                        <p class="text-sm text-gray-500 mb-2">{{ $lamaran->lowongan->company->nama }}</p>
                        <p class="text-sm text-gray-500 mb-4">{{ $lamaran->lowongan->province->nama }}</p>
                        <div class="absolute bottom-4 right-4">
                            <button
                                onclick="openModal('{{ $lamaran->id }}',
                                '{{ $lamaran->lowongan->judul }}', 
                                '{{ $lamaran->created_at->format('d M Y') }}', 
                                '{{ $lamaran->lowongan->company->nama }}',
                                '{{ $lamaran->status }}')"
                                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200">Lihat
                                Detail</button>
                        </div>
                    </div>
                @endforeach
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
                        <ul class="mb-4">
                            <li class="flex items-center mb-2">
                                <span class="w-4 h-4 rounded-full mr-2 " id="dot1"></span>
                                <span class="text-sm text-gray-700">Menunggu</span>
                            </li>
                            <li class="flex items-center mb-4">
                                <span class="w-4 h-4 rounded-full mr-2 " id="dot2"></span>
                                <span class="text-sm text-gray-700">Pengumuman</span>
                            </li>
                        </ul>
                        <p class="text-sm mb-2">Hasil Akhir: <span id="modalResult" class="font-semibold"></span>
                        </p>
                        <form action="{{ route('batalkan-lamaran') }}" method="POST" id="form-batal">
                            @csrf
                            @method('DELETE')
                            <div class="mt-4 flex justify-between">
                                <input type="text" name="lamaran_id" id="lamaran_id" value="" hidden>
                                <button onclick="confirmbatal()" type="button"
                                    class="bg-red-500 text-white px-4 py-2 rounded-md">Batalkan</button>
                                <button onclick="closeModal()" type="button"
                                    class="bg-blue-500 text-white px-4 py-2 rounded-md">Tutup</button>
                            </div>
                            @error('lamaran_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </form>
                    </div>
                </div>
            </div>
        </div>





        <div class="mb-24"></div>
    </body>

    <script>
        function openModal(lamaranId, position, date, company, result) {
            document.getElementById('lamaran_id').value = lamaranId;
            document.getElementById('modalPosition').innerText = position;
            document.getElementById('modalDate').innerText = date;
            document.getElementById('modalCompany').innerText = company;

            const timeline = document.getElementById('timeline');
            timeline.innerHTML = '';

            const modalResult = document.getElementById('modalResult');
            const dot1 = document.getElementById('dot1');
            const dot2 = document.getElementById('dot2');
            modalResult.innerText = result;
            modalResult.classList.remove('text-green-600', 'text-red-600');


            if (result === 'DITERIMA') {
                modalResult.classList.add('text-green-600');
                modalResult.classList.remove('hidden');
            } else if (result === 'DITOLAK') {
                modalResult.classList.add('text-red-600');
                modalResult.classList.remove('hidden');
            } else {
                modalResult.classList.add('hidden');
            }

            if (result !== 'MENUNGGU') {
                dot1.classList.remove('bg-yellow-600');
                dot2.classList.remove('bg-gray-300');
                dot1.classList.add('bg-gray-300');
                dot2.classList.add('bg-green-600');
            } else {
                dot1.classList.remove('bg-gray-300');
                dot2.classList.remove('bg-green-600');
                dot1.classList.add('bg-yellow-600');
                dot2.classList.add('bg-gray-300');
            }

            document.getElementById('modal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('modal').classList.add('hidden');
        }

        function confirmbatal() {
            Swal.fire({
                title: 'Apakah Anda yakin ingin membatalkan lamaran?',
                text: 'Lamaran anda akan dihapus dari daftar lamaran.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Batalkan!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('form-batal').submit();
                }
            });
        }
    </script>
    @if (session('delete_success'))
        <script>
            Swal.fire({
                icon: "success",
                title: "Lamaran berhasil dibatalkan!",
                showConfirmButton: true,
                ConfirmbuttonText: "OK"
            });
        </script>
    @endif
@endsection
