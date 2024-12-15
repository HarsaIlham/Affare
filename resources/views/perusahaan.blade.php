@extends('components.template')

@section('title', 'Perusahaan')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profil Perusahaan</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    @include('components.header')

    <body class="bg-gray-100 p-4">
        <div class="mt-16"></div>
        <div class="max-w-7xl mx-auto">
            <h1 class="text-2xl font-bold text-gray-800 mb-4">
                Lamar Kerja ke 2,000+ Perusahaan Terbaik di Indonesia Sekarang
            </h1>
            <p class="text-gray-600 mb-8">Apply & find great opportunities knocking at your door 🛎️</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-2">
                @foreach ($companies as $company)
                    <div class="bg-white p-4 rounded-lg shadow">
                        <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo Perusahaan"
                            class="mb-4 w-20 h-20 mx-auto">
                        <h3 class="font-semibold text-gray-800 text-center">{{ $company->nama }}</h3>
                        <p class="text-sm text-gray-600 text-center mb-4">{{ $company->province->nama }},
                            {{ $company->kota->nama }}</p>
                        <button
                            onclick="openModal('{{ $company->nama }}', 
                            '{{ $company->province->nama }}', 
                            '{{ $company->kota->nama }}',
                            '{{ $company->alamat }}', 
                            '{{ $company->website }}', 
                            '{{ $company->linkedin }}', 
                            '{{ $company->no_telepon }}',
                            '{{ $company->email }}', 
                            '{{ $company->bio }}')"
                            class="bg-blue-500 text-white text-sm font-medium py-2 px-4 rounded-lg w-full hover:bg-blue-600">
                            Selengkapnya
                        </button>
                    </div>
                @endforeach

            </div>
        </div>
        <div id="jobModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex justify-center items-center hidden"
            style="z-index: 1050;">
            <div class="bg-white p-8 rounded-md w-full md:w-1/2 lg:w-1/3">
                <h3 id="companyName" class="text-2xl font-bold mb-4"></h3>
                <p><strong>Lokasi:</strong> <span id="companyLocation"></span></p>
                <p><strong>Alamat:</strong> <span id="companyAddress"></span></p>
                <p><strong>Website:</strong> <a href="" id="companyWebsite" target="_blank" class="text-blue-500 underline"> Kunjungi Website </a></p>
                <p><strong>Linkedin:</strong> <a href="" id="companyLinkedin" target="_blank" class="text-blue-500 underline"> Lihat </a></p>
                <p><strong>Phone:</strong> <span><span id="companyPhone"></span></p>
                <p><strong>Email:</strong> <a href="" id="companyEmail" target="_blank" class="text-blue-500 underline"> Lihat </a></p>
                <p class="mt-4"><strong>Deskripsi Perusahaan:</strong></p>
                <p id="companyDescription"></p>
                <div class="flex justify-end mt-6">
                    <button class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600"
                        onclick="closeModal()">Tutup</button>
                </div>
            </div>
        </div>
        <div class="mb-24"></div>
        <script>
            function openModal(companyName, companyProvince, companyKota, companyAddress, companyWebsite, companyLinkedin, companyPhone, companyEmail,
                companyDescription) {
                document.getElementById('jobModal').classList.remove('hidden');
                // Mengisi data dalam modal
                document.getElementById('companyName').innerText = companyName;
                document.getElementById('companyLocation').innerText = companyProvince + ', ' + companyKota;
                document.getElementById('companyAddress').innerText = companyAddress;
                document.getElementById('companyWebsite').setAttribute('href', companyWebsite);
                document.getElementById('companyLinkedin').setAttribute('href', companyLinkedin);
                document.getElementById('companyPhone').innerText = companyPhone;
                document.getElementById('companyEmail').setAttribute('href', companyEmail);
                document.getElementById('companyEmail').innerText = companyEmail;
                document.getElementById('companyDescription').innerText = companyDescription;
            }

            function closeModal() {
                // Menyembunyikan modal
                document.getElementById('jobModal').classList.add('hidden');
            }
        </script>
    </body>

    </html>

@endsection
