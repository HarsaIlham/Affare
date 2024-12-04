@extends('components.template')
@section('title')
    Homepage
@endsection
@section('content')
    @if (session('success'))
        <script>
            Swal.fire({
                icon: "success",
                title: "Login Berhasil!",
                showConfirmButton: true,
                ConfirmbuttonText: "OK"
            });
        </script>
    @endif
    @if (session('logout_success'))
        <script>
            Swal.fire({
                icon: "success",
                title: "Anda telah logout!",
                showConfirmButton: true,
                ConfirmbuttonText: "OK"
            });
        </script>
    @endif

    <div class="container mx-auto px-4 py-8 text-zinc-800 items-center justify-center">
        <h1 class="text-2xl font-bold mb-4">Halaman Utama</h1>
        <p>Ini adalah konten utama halaman Anda.</p>
    </div>
@endsection
