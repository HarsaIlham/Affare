@extends('components.template')

@section('title', 'Profil')

@section('content')

    <body class="bg-gray-100">
        <div>
            @include('components.profil-card')
        </div>

        <div class="flex mt-4 h-full">
            @include('components.sidebar-profile')
            <div class="w-full p-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-6">CV & Portfolio</h2>


                <div class="mb-12">
                    <h3 class="text-md font-medium text-gray-600 mb-4">Curriculum Vitae</h3>
                    <div class="mb-4">
                        <p class="text-gray-700">CV Terunggah:
                            <a href="#" class="text-blue-500 hover:underline" target="_blank">Unduh CV</a>
                        </p>
                    </div>

                    >
                    <form class="space-y-4">
                        <div>
                            <label for="cv-file" class="block text-sm font-medium text-gray-700">Unggah CV Baru:</label>
                            <input type="file" id="cv-file"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <button type="button"
                            class="bg-blue-500 text-white px-4 py-2 rounded-md shadow hover:bg-blue-600 focus:outline-none">
                            Unggah CV
                        </button>
                    </form>
                </div>

                <div>
                    <h3 class="text-md font-medium text-gray-600 mb-4">Portofolio</h3>

                    <div class="mb-4">
                        <p class="text-gray-700">Portofolio Terunggah:
                            <a href="#" class="text-blue-500 hover:underline" target="_blank">Unduh Portofolio</a>
                        </p>
                    </div>

                    <form class="space-y-4">
                        <div>
                            <label for="portfolio-file" class="block text-sm font-medium text-gray-700">Unggah Portofolio
                                Baru:</label>
                            <input type="file" id="portfolio-file"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <button type="button"
                            class="bg-blue-500 text-white px-4 py-2 rounded-md shadow hover:bg-blue-600 focus:outline-none">
                            Unggah Portofolio
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="mb-20"></div>
    </body>
@endsection
