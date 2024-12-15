
@if (session('update_logo'))
    <script>
        Swal.fire({
            icon: "success",
            title: "Foto Profil Berhasil Diubah!",
            showConfirmButton: true,
            ConfirmbuttonText: "OK"
        });
    </script>
@endif

<div class="flex items-center p-6 bg-blue-500 border-b mb-4">
    <div class="w-16 h-16 bg-gray-300 rounded-full flex items-center justify-center text-white text-lg font-bold">
        <img src="{{ asset('storage/'. $company->logo) }}" alt="Logo perusahaan">
    </div>
    <div class="ml-4">
        <h1 class="text-xl font-semibold text-white">{{ $company->nama }}</h1>
        <button id="openModalButton" class="text-yellow-300 font-bold text-sm relative group">
            Atur Foto Profil
            <span class="absolute left-0 bottom-0 w-full h-[2px] bg-yellow-400 transform scale-x-0 group-hover:scale-x-100 transition-all duration-300"></span>
        </button>
    </div>
</div>

<div id="profileModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Ganti Foto Profil</h2>
        <form action="{{ route('updatelogocompany', $company->id) }}" method="POST" id="form-update-logo" name="form-update-logo" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="logo" class="block text-gray-700 font-medium mb-2">Pilih Foto Baru</label>
                <input type="file" id="logo" name="logo" accept="image/*"
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="flex justify-end space-x-4">
                <button type="button" id="closeModalButton" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
                    Batal
                </button>
                <button type="button" onclick="confirmupdatelogo()" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                    Simpan
                </button>
            </div>
            
        </form>
    </div>
</div>

<script>
    const modal = document.getElementById('profileModal');
    const openModalButton = document.getElementById('openModalButton');
    const closeModalButton = document.getElementById('closeModalButton');

    openModalButton.addEventListener('click', () => {
        modal.classList.remove('hidden');
        modal.classList.add('flex');

    });

    closeModalButton.addEventListener('click', () => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    });


    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    });

    function confirmupdatelogo() {
                Swal.fire({
                    title: 'Apakah Anda yakin ingin mengubah logo perusahaan?',
                    text: 'Logo perusahaan akan berubah sesuai dengan logo yang anda masukkan.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Ubah!',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('form-update-logo').submit();
                    }
                });
            }
</script>

