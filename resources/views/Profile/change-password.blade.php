@e
xtends('components.template')

@section('title', 'Ubah Kata Sandi')

@section('content')

    <body class="bg-gray-100">
        <div>
            @include('components.profil-card')
        </div>

        <div class="flex mt-4 h-full">
            @include('components.sidebar-profile')
            <div class="w-full p-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Ubah Kata Sandi</h2>

                <form class="space-y-6">
                    <div>
                        <label for="current-password" class="block text-sm font-medium text-gray-700">Kata Sandi Lama</label>
                        <input type="password" id="current-password" name="current_password"
                            placeholder="Masukkan kata sandi lama"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 py-2 text-base px-2">
                    </div>
                    <div>
                        <label for="new-password" class="block text-sm font-medium text-gray-700">Kata Sandi Baru</label>
                        <input type="password" id="new-password" name="new_password" placeholder="Masukkan kata sandi baru"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 py-2 text-base px-2">
                    </div>
                    <div>
                        <label for="confirm-password" class="block text-sm font-medium text-gray-700">Konfirmasi Kata Sandi
                            Baru</label>
                        <input type="password" id="confirm-password" name="confirm_password"
                            placeholder="  Ulangi kata sandi baru"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 py-2 text-base px-2">
                    </div>
                    <button type="submit"
                        class="bg-blue-500 text-white py-2 px-4 rounded-md shadow hover:bg-blue-600 focus:outline-none">
                        Simpan Perubahan
                    </button>
                </form>
            </div>
        </div>
        <div class="mb-20"></div>
    </body>
@endsection
