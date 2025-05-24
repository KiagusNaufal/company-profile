<div id="editProductModal" class="fixed inset-0 z-50 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div id="editModalBackdrop" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
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
                                    <input type="text" name="name" id="edit_name" required pattern="^[a-zA-Z0-9\s\.\-_,]+$" title="Hanya huruf, angka, spasi, titik, koma, strip, dan underscore yang diperbolehkan"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                                </div>
                                <div>
                                    <label for="edit_category" class="block text-sm font-medium text-gray-700">Kategori</label>
                                    <select name="kategori_id" id="edit_category" required pattern="^[0-9]+$" title="Hanya angka yang diperbolehkan"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                                        <option value="" disabled>Pilih Kategori</option>
                                        @foreach($categories as $category)
                                            <option value="{{ cetak($category->id) }}">{{ cetak($category->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="edit_price" class="block text-sm font-medium text-gray-700">Harga</label>
                                    <input type="number" name="price" id="edit_price" required min="0" pattern="^[0-9]+$" title="Hanya angka yang diperbolehkan"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                                </div>
                                <div>
                                    <label for="edit_description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                                    <input type="text" name="description" id="edit_description" required pattern="^[a-zA-Z0-9\s\.\-_,]+$" title="Hanya huruf, angka, spasi, titik, koma, strip, dan underscore yang diperbolehkan"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                                </div>
                                                                                                <div>
                                                                    <label for="edit_link_aplikasi" class="block text-sm font-medium text-gray-700">Link Aplikasi</label>
                                                                    <input type="url" name="link_aplikasi" id="edit_link_aplikasi" required
                                                                        pattern="https?://.+" title="Masukkan URL yang valid dimulai dengan http:// atau https://"
                                                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                                                                </div>
                                                                <div>
                                                                    <label for="edit_link_tutorial" class="block text-sm font-medium text-gray-700">Link Tutorial</label>
                                                                    <input type="url" name="link_tutorial" id="edit_link_tutorial" required
                                                                        pattern="https?://.+" title="Masukkan URL yang valid dimulai dengan http:// atau https://"
                                                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                                                                </div>
                                <div>
                                    <label for="edit_image" class="block text-sm font-medium text-gray-700">Gambar</label>
                                    <input type="file" name="image" id="edit_image" accept="image/png, image/jpeg, image/jpg"
                                        class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-primary-dark">
                                    <div class="mt-2 hidden" id="currentImageContainer">
                                        <img id="currentProductImage" src="" class="h-20 rounded-md">
                                        <p class="text-xs text-gray-500 mt-1">Gambar saat ini</p>
                                    </div>
                                </div>
                                                                <div>
                                    <label for="edit_image" class="block text-sm font-medium text-gray-700">Gambar Backgorund </label>
                                    <input type="file" name="imagebg_produk" id="edit_image" accept="image/png, image/jpeg, image/jpg"
                                        class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-primary-dark">
                                    <div class="mt-2 hidden" id="currentbgContainer">
                                        <img id="currentBgImage" src="" class="h-20 rounded-md">
                                        <p class="text-xs text-gray-500 mt-1">Gambar saat ini</p>
                                    </div>
                                </div>
                                                                                                <div>
                                    <label for="edit_image" class="block text-sm font-medium text-gray-700">Gambar Logo </label>
                                    <input type="file" name="image_logo" id="edit_image" accept="image/png, image/jpeg, image/jpg"
                                        class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-primary-dark">
                                    <div class="mt-2 hidden" id="currentLogoContainer">
                                        <img id="currentLogoImage" src="" class="h-20 rounded-md">
                                        <p class="text-xs text-gray-500 mt-1">Gambar saat ini</p>
                                    </div>
                                </div>
                                <div>
                                    <label for="edit_badge_color" class="block text-sm font-medium text-gray-700">Warna Badge</label>
                                    <select name="badge_color" id="edit_badge_color" required
                                        pattern="^[a-zA-Z0-9\s\.\-_,]+$" title="Hanya huruf, angka, spasi, titik, koma, strip, dan underscore yang diperbolehkan"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary"
                                        onchange="updateBadgePreview()">
                                        <option value="bg-blue-100 text-blue-800">Biru</option>
                                        <option value="bg-green-100 text-green-800">Hijau</option>
                                        <option value="bg-yellow-100 text-yellow-800">Kuning</option>
                                        <option value="bg-red-100 text-red-800">Merah</option>
                                        <option value="bg-purple-100 text-purple-800">Ungu</option>
                                        <option value="bg-pink-100 text-pink-800">Merah Muda</option>
                                        <option value="bg-indigo-100 text-indigo-800">Indigo</option>
                                        <option value="bg-gray-100 text-gray-800">Abu-abu</option>
                                    </select>
                                    <div class="mt-2">
                                        <span id="badgePreview"
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium">
                                            Contoh Badge
                                        </span>
                                    </div>
                                </div>

                                <!-- Pain Section -->
                                <div class="mt-4 border-t pt-4">
                                    <h4 class="text-lg font-medium text-red-600 mb-2">Pain Points</h4>
                                    <div class="mb-4">
                                        <label class="block text-sm font-medium text-gray-700">Pain Description</label>
                                        <textarea name="pain_description" id="edit_pain_description" rows="2" 
                                        required pattern="^[a-zA-Z0-9\s\.\-_,]+$" title="Hanya huruf, angka, spasi, titik, koma, strip, dan underscore yang diperbolehkan"
                                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary"></textarea>
                                    </div>
                                    
                                    <label class="block text-sm font-medium text-gray-700">Pain Points</label>
                                    <div id="edit_pain_points_container" class="space-y-2 mt-2">
                                        <!-- Points will be added here -->
                                    </div>
                                    <button type="button" onclick="addEditPainPoint()" class="mt-2 text-sm text-blue-600 hover:text-blue-800">
                                        + Add Pain Point
                                    </button>
                                </div>

                                <!-- Solution Section -->
                                <div class="mt-4 border-t pt-4">
                                    <h4 class="text-lg font-medium text-blue-600 mb-2">Our Solution</h4>
                                    <div class="mb-4">
                                        <label class="block text-sm font-medium text-gray-700">Solution Description</label>
                                        <textarea name="solution_description" id="edit_solution_description" rows="2" 
                                            required pattern="^[a-zA-Z0-9\s\.\-_,]+$" title="Hanya huruf, angka, spasi, titik, koma, strip, dan underscore yang diperbolehkan"
                                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary"></textarea>
                                    </div>
                                    
                                    <label class="block text-sm font-medium text-gray-700">Solution Points</label>
                                    <div id="edit_solution_points_container" class="space-y-2 mt-2">
                                        <!-- Points will be added here -->
                                    </div>
                                    <button type="button" onclick="addEditSolutionPoint()" class="mt-2 text-sm text-blue-600 hover:text-blue-800">
                                        + Add Solution Point
                                    </button>
                                </div>

                                <!-- Gain Section -->
                                <div class="mt-4 border-t pt-4">
                                    <h4 class="text-lg font-medium text-green-600 mb-2">Customer Benefits</h4>
                                    <div class="mb-4">
                                        <label class="block text-sm font-medium text-gray-700">Gain Description</label>
                                        <textarea name="gain_description" id="edit_gain_description" rows="2" 
                                            required pattern="^[a-zA-Z0-9\s\.\-_,]+$" title="Hanya huruf, angka, spasi, titik, koma, strip, dan underscore yang diperbolehkan"
                                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary"></textarea>
                                    </div>
                                    
                                    <label class="block text-sm font-medium text-gray-700">Gain Points</label>
                                    <div id="edit_gain_points_container" class="space-y-2 mt-2">
                                        <!-- Points will be added here -->
                                    </div>
                                    <button type="button" onclick="addEditGainPoint()" class="mt-2 text-sm text-blue-600 hover:text-blue-800">
                                        + Add Gain Point
                                    </button>
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
    </div>
</div>

