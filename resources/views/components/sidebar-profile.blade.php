<div class="w-1/4 bg-gray-50 p-4 border-r">
    <ul class="space-y-2">
        @php
            $menuItems = [
                ['label' => 'Informasi Umum', 'route' => route('profile.user'), 'active' => 'profile.user'],
                ['label' => 'CV & Portfolio', 'route' => route('profile.cv-and-portofolio'), 'active' => 'profile.cv-and-portofolio'],
                ['label' => 'Ubah Kata Sandi', 'route' => route('profile.change-password'), 'active' => 'profile.change-password'],
            ];
        @endphp

        @foreach ($menuItems as $item)
            <li>
                <a href="{{ $item['route'] }}"
                    class="block p-3 rounded-md transition-all duration-200
                    {{ request()->routeIs($item['active']) ? 'bg-blue-500 text-white font-semibold' : 'text-gray-700 hover:bg-blue-100 hover:text-blue-600' }}">
                    {{ $item['label'] }}
                </a>
            </li>
        @endforeach
    </ul>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <body>
        <div>
            <form action="#" method="POST" id="logout-form">
                @csrf
                <button type="button" class="mt-4 w-full bg-red-600 text-white py-2 rounded-md shadow hover:bg-red-700 focus:outline-none" onclick="confirmLogout()">
                    Logout
                </button>
            </form>
        </div>

        <script>
            function confirmLogout() {
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: 'Anda akan keluar dari akun ini.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Logout!',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('logout-form').submit();
                    }
                });
            }
        </script>

</div>
