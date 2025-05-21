<!-- Modal Create -->
<div id="createProductModal" class="fixed inset-0 z-50 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div id="createModalBackdrop" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data" id="createKategoriForm">
                @csrf
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Tambah Kategori Baru</h3>
                            <div class="mt-4 grid grid-cols-1 gap-y-4">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Kategori</label>
                                    <input type="text" name="name" id="name" required pattern="^[a-zA-Z0-9\s\.\-_,]+$" title="Hanya huruf, angka, spasi, titik, koma, strip, dan underscore yang diperbolehkan" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-primary text-base font-medium text-white hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:ml-3 sm:w-auto sm:text-sm">
                        Simpan
                    </button>
                    <button type="button" id="cancelCreateBtn" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Batal
                    </button>
                </div>
            </form>
        </div>
        <script>
            // Validasi tambahan di sisi client (opsional)
            document.getElementById('createKategoriForm').addEventListener('submit', function(e) {
                const name = document.getElementById('name').value;
                const namePattern = /^[a-zA-Z0-9\s\.\-_,]+$/;
                if (!namePattern.test(name)) {
                    alert('Nama hanya boleh berisi huruf, angka, spasi, titik, koma, strip, dan underscore.');
                    e.preventDefault();
                }
            });
        </script>
    </div>
</div>