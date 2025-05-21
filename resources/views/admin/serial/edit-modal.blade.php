<div id="editProductModal" class="fixed inset-0 z-50 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div id="editModalBackdrop" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div
            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
          <form id="editProductForm" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Edit Produk</h3>
                    <div class="mt-4 grid grid-cols-1 gap-y-4">
                        <div>
                            <label for="edit_name" class="block text-sm font-medium text-gray-700">Nama Produk</label>
                            <input type="text" name="name" id="edit_name" required
                                minlength="3" maxlength="50"
                              required pattern="^[a-zA-Z0-9\s\.\-_,]+$" title="Hanya huruf, angka, spasi, titik, koma, strip, dan underscore yang diperbolehkan" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                        </div>
                        <div>
                            <label for="edit_serialNumber" class="block text-sm font-medium text-gray-700">Serial Number</label>
                            <input type="text" name="serialNumber" id="edit_serialNumber" required
                                minlength="5" maxlength="30"
                                required pattern="^[A-Za-z0-9\-]+$"
                                title="Serial hanya boleh huruf, angka, dan strip"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                        </div>
                        <div>
                            <label for="edit_password" class="block text-sm font-medium text-gray-700">Password</label>
                            <input type="password" name="password" id="edit_password" required
                                minlength="6" maxlength="32"
                                required pattern="^[A-Za-z0-9\@\#\$\!\%\^\&\*\(\)\_\+\-]+$"
                                title="Password minimal 6 karakter, hanya huruf, angka, dan simbol umum"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                        </div>
                        <div>
                            <label for="edit_email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="edit_email" required 
                                maxlength="100"
                                required pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" title="Masukkan email yang valid"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                        </div>
                        <div>
                            <label for="edit_status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select name="is_active" id="edit_status" required 
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                                <option value="true">Aktif</option>
                                <option value="false">Tidak Aktif</option>
                            </select>
                        </div>
                        <div>
                            <label for="edit_image" class="block text-sm font-medium text-gray-700">Gambar</label>
                            <input type="file" name="image" id="edit_image"
                                accept="image/png, image/jpeg, image/jpg"
                                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-primary-dark">
                            <div class="mt-2 hidden" id="currentImageContainer">
                                <img id="currentProductImage" src="" class="h-20 rounded-md">
                                <p class="text-xs text-gray-500 mt-1">Gambar saat ini</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-primary text-base font-medium text-white hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:ml-3 sm:w-auto sm:text-sm">
                Update
            </button>
            <button type="button" id="cancelEditBtn"
                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                Batal
            </button>
        </div>
    </form>
</div>
   <script>
        // Validasi tambahan di sisi client (opsional)
        document.getElementById('editProductForm').addEventListener('submit', function(e) {
            const serial = document.getElementById('edit_serialNumber').value;
            // Only allow letters, numbers, and dash
            const serialPattern = /^[A-Za-z0-9\-]+$/;
            if (!serialPattern.test(serial)) {
                alert('Serial hanya boleh berisi huruf, angka, dan strip.');
                e.preventDefault();
            }
            // Validasi lain bisa ditambahkan di sini jika perlu
        });
    </script>
</div>
</div>
