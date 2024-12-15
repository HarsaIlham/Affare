@extends('components.template')

@section('title', 'Ubah Kata Sandi')

@section('content')
@include('components.header')

    <body class="bg-gray-100">
        @if (session('update_password_fail'))
            <script>
                Swal.fire({
                    icon: "error",
                    title: "Kata Sandi Lama Tidak Sesuai",
                    showConfirmButton: true,
                    ConfirmbuttonText: "OK"
                });
            </script>
        @endif
        <div>
            @include('components.profil-card')
        </div>

        <div class="flex mt-4 h-full">
            @include('components.sidebar-profile')
            <div class="w-full p-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Ubah Kata Sandi</h2>

                <form action="{{ route('update-password', $user->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="current_password" class="block text-sm font-medium text-gray-700">Kata Sandi Lama</label>
                        <input type="password" id="current_password" name="current_password"
                            placeholder="Masukkan kata sandi lama" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 py-2 text-base px-2">
                        @error('current_password')
                            <div class="text-red-500 text-xs">{{ $message }}</div>       
                        @enderror
                    </div>
                    <div>
                        <label for="new_password" class="block text-sm font-medium text-gray-700">Kata Sandi Baru</label>
                        <input type="password" id="new_password" name="new_password" placeholder="Masukkan kata sandi baru" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 py-2 text-base px-2">
                        @error('new_password')
                            <div class="text-red-500 text-xs">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="confirm_password" class="block text-sm font-medium text-gray-700">Konfirmasi Kata Sandi
                            Baru</label>
                        <input type="password" id="confirm_password" name="confirm_password"
                            placeholder="  Ulangi kata sandi baru" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 py-2 text-base px-2">
                        @error('confirm_password')
                            <div class="text-red-500 text-xs">{{ $message }}</div>
                        @enderror
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
