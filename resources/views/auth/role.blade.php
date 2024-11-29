@extends('components.template')
@section('title', 'role')
    
@section('content')
    <div class=" container mx-auto flex items-center justify-center pt-5">
        <div class=" max-w-[720px]">
            <div class="block mb-4 mx-auto border-b border-slate-300 pb-2 font-extrabold drop-shadow shadow-slate-600">
                <h1 class="block w-full px-4 py-2 text-center text-indigo-400 text-3xl transition-all">
                    Ingin daftar sebagai apa?
                </h1>
            </div>
        </div>
    </div>
    <div class="flex flex-col md:flex-row justify-center items-center gap-6 max-w-5xl mx-auto pt-20">
        <button class="bg-white border border-gray-200 rounded-lg shadow-md p-6 w-full md:w-1/3 hover:bg-indigo-50" onclick="window.location.href = '{{ route('auth.seeker') }}'">
            <div class="mb-4">
                <span class="text-3xl">💼</span>
            </div>
            <h2 class="text-xl font-semibold text-gray-900 mb-2">Pencari Kerja</h2>
        </button>
        <button class="bg-white border border-gray-200 rounded-lg shadow-md p-6 w-full md:w-1/3 hover:bg-indigo-50" onclick="window.location.href = '{{ route('auth.company') }}'">
            <div class="mb-4">
                <span class="text-3xl">🏢</span>
            </div>
            <h2 class="text-xl font-semibold text-gray-900 mb-2">Pemberi Kerja</h2>
        </button>
    </div>
@endsection