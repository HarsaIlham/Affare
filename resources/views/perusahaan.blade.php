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

    <body class="bg-gray-100 p-4">
        <div class="mt-16"></div>
        <div class="max-w-7xl mx-auto">
            <h1 class="text-2xl font-bold text-gray-800 mb-4">
                Lamar Kerja ke 2,000+ Perusahaan Terbaik di Indonesia Sekarang
            </h1>
            <p class="text-gray-600 mb-8">Apply & find great opportunities knocking at your door 🛎️</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-white p-4 rounded-lg shadow">
                    <img src="{{ asset('storage/perusahaan-resource/astra-f.webp') }}" alt="Astra Financial Logo" class="mb-4 w-20 h-20 mx-auto">
                    <h3 class="font-semibold text-gray-800 text-center">Astra Financial</h3>
                    <p class="text-sm text-gray-600 text-center mb-4">Financial Services</p>
                    <button
                        class="bg-blue-500 text-white text-sm font-medium py-2 px-4 rounded-lg w-full hover:bg-blue-600">
                        Selengkapnya
                    </button>
                </div>

                <div class="bg-white p-4 rounded-lg shadow">
                    <img src="{{ asset('storage/perusahaan-resource/jet.webp') }}" alt="Jet Cargo Logo" class="mb-4 w-20 h-20 mx-auto">
                    <h3 class="font-semibold text-gray-800 text-center">PT Global Jet Cargo</h3>
                    <p class="text-sm text-gray-600 text-center mb-4">Supply Chain Management</p>
                    <button
                        class="bg-blue-500 text-white text-sm font-medium py-2 px-4 rounded-lg w-full hover:bg-blue-600">
                        Selengkapnya
                    </button>
                </div>

                <div class="bg-white p-4 rounded-lg shadow">
                    <img src="{{ asset('storage/perusahaan-resource/seabank.webp') }}" alt="SeaBank Logo" class="mb-4 w-20 h-20 mx-auto">
                    <h3 class="font-semibold text-gray-800 text-center">SeaBank Indonesia</h3>
                    <p class="text-sm text-gray-600 text-center mb-4">Banking</p>
                    <button
                        class="bg-blue-500 text-white text-sm font-medium py-2 px-4 rounded-lg w-full hover:bg-blue-600">
                        Selengkapnya
                    </button>
                </div>

                <div class="bg-white p-4 rounded-lg shadow">
                    <img src="{{ asset('storage/perusahaan-resource/sosro.webp') }}" alt="Sosro Logo" class="mb-4 w-20 h-20 mx-auto">
                    <h3 class="font-semibold text-gray-800 text-center">PT. Sinar Sosro</h3>
                    <p class="text-sm text-gray-600 text-center mb-4">FMCG</p>
                    <button
                        class="bg-blue-500 text-white text-sm font-medium py-2 px-4 rounded-lg w-full hover:bg-blue-600">
                        Selengkapnya
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
                <div class="bg-white p-4 rounded-lg shadow">
                    <img src="{{ asset('storage/perusahaan-resource/darya.webp') }}" alt="Darya Logo" class="mb-4 w-20 h-20 mx-auto">
                    <h3 class="font-semibold text-gray-800 text-center">PT Darya - Varia Laboratoria</h3>
                    <p class="text-sm text-gray-600 text-center mb-4">Manufacturing (Pharmaceutical)</p>
                    <button
                        class="bg-blue-500 text-white text-sm font-medium py-2 px-4 rounded-lg w-full hover:bg-blue-600">
                        Selengkapnya
                    </button>
                </div>

                <div class="bg-white p-4 rounded-lg shadow">
                    <img src="{{ asset('storage/perusahaan-resource/bina.webp') }}" alt="BINUS Logo" class="mb-4 w-20 h-20 mx-auto">
                    <h3 class="font-semibold text-gray-800 text-center">BINUS Group</h3>
                    <p class="text-sm text-gray-600 text-center mb-4">Education Administration Programs</p>
                    <button
                        class="bg-blue-500 text-white text-sm font-medium py-2 px-4 rounded-lg w-full hover:bg-blue-600">
                        Selengkapnya
                    </button>
                </div>

                <div class="bg-white p-4 rounded-lg shadow">
                    <img src="{{ asset('storage/perusahaan-resource/astra-i.webp') }}" alt="Astra Logo" class="mb-4 w-20 h-20 mx-auto">
                    <h3 class="font-semibold text-gray-800 text-center">PT Astra International Tbk</h3>
                    <p class="text-sm text-gray-600 text-center mb-4">Automotive and Manufacturing</p>
                    <button
                        class="bg-blue-500 text-white text-sm font-medium py-2 px-4 rounded-lg w-full hover:bg-blue-600">
                        Selengkapnya
                    </button>
                </div>

                <div class="bg-white p-4 rounded-lg shadow">
                    <img src="{{ asset('storage/perusahaan-resource/dexa.webp') }}" alt="Dexa Logo" class="mb-4 w-20 h-20 mx-auto">
                    <h3 class="font-semibold text-gray-800 text-center">Dexa Group</h3>
                    <p class="text-sm text-gray-600 text-center mb-4">Pharmaceutical</p>
                    <button
                        class="bg-blue-500 text-white text-sm font-medium py-2 px-4 rounded-lg w-full hover:bg-blue-600">
                        Selengkapnya
                    </button>
                </div>
            </div>
        </div>
        <div class="mb-24"></div>
    </body>

    </html>

@endsection
