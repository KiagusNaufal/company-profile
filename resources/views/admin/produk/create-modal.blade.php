<!-- Modal Create -->
<div id="createProductModal" class="fixed inset-0 z-50 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div id="createModalBackdrop" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div
            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Tambah Produk Baru</h3>
                            <div class="mt-4 grid grid-cols-1 gap-y-4">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700">Nama
                                        Produk</label>
                                    <input type="text" name="name" id="name" required pattern="^[a-zA-Z0-9\s\.\-_,]+$" title="Hanya huruf, angka, spasi, titik, koma, strip, dan underscore yang diperbolehkan"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                                </div>
                                <div>
                                    <label for="category"
                                        class="block text-sm font-medium text-gray-700">Kategori</label>
                                    <select name="kategori_id" id="category" required pattern="^[0-9]+$"
                                        title="Hanya angka yang diperbolehkan"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                                        <option value="" disabled selected>Pilih Kategori</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ cetak($category->id) }}">{{ cetak($category->name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="price" class="block text-sm font-medium text-gray-700">Harga</label>
                                    <input type="number" name="price" id="price" required min="0" pattern="^[0-9]+$"
                                        title="Hanya angka yang diperbolehkan"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                                </div>
                                <div>
                                    <label for="image" class="block text-sm font-medium text-gray-700">Gambar</label>
                                    <input type="file" name="image" id="image" accept="image/*"
                                        required pattern="^[a-zA-Z0-9\s\.\-_,]+$" title="Hanya huruf, angka, spasi, titik, koma, strip, dan underscore yang diperbolehkan"
                                        class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-primary-dark">
                                </div>
                                                                <div>
                                    <label for="imagebg_produk" class="block text-sm font-medium text-gray-700">Gambar Background</label>
                                    <input type="file" name="imagebg_produk" id="imagebg_produk" accept="imagebg_produk/*"
                                        required pattern="^[a-zA-Z0-9\s\.\-_,]+$" title="Hanya huruf, angka, spasi, titik, koma, strip, dan underscore yang diperbolehkan"
                                        class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-primary-dark">
                                </div>
                                <div>
                                    <label for="description" class="block text-sm font-medium text-gray-700">Desc
                                        Produk</label>
                                    <input type="text" name="description" id="description" required pattern="^[a-zA-Z0-9\s\.\-_,]+$" title="Hanya huruf, angka, spasi, titik, koma, strip, dan underscore yang diperbolehkan"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-3 px-4 text-lg focus:outline-none focus:ring-primary focus:border-primary">
                                </div>
                                                                <div>
                                                                    <label for="link_aplikasi" class="block text-sm font-medium text-gray-700">Link Aplikasi</label>
                                                                    <input type="url" name="link_aplikasi" id="link_aplikasi" required
                                                                        pattern="https?://.+" title="Masukkan URL yang valid dimulai dengan http:// atau https://"
                                                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                                                                </div>
                                                                <div>
                                                                    <label for="link_tutorial" class="block text-sm font-medium text-gray-700">Link Tutorial</label>
                                                                    <input type="url" name="link_tutorial" id="link_tutorial" required
                                                                        pattern="https?://.+" title="Masukkan URL yang valid dimulai dengan http:// atau https://"
                                                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                                                                </div>
                                <div>
                                    <label for="badge_color" class="block text-sm font-medium text-gray-700">Warna
                                        Badge</label>
                                    <select name="badge_color" id="badge_color" required
                                        pattern="^[a-zA-Z0-9\s\.\-_,]+$" title="Hanya huruf, angka, spasi, titik, koma, strip, dan underscore yang diperbolehkan"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                                        <option value="bg-blue-100 text-blue-800">Biru</option>
                                        <option value="bg-green-100 text-green-800">Hijau</option>
                                        <option value="bg-yellow-100 text-yellow-800">Kuning</option>
                                        <option value="bg-red-100 text-red-800">Merah</option>
                                        <option value="bg-purple-100 text-purple-800" selected>Ungu</option>
                                        <option value="bg-pink-100 text-pink-800">Merah Muda</option>
                                        <option value="bg-indigo-100 text-indigo-800">Indigo</option>
                                        <option value="bg-gray-100 text-gray-800">Abu-abu</option>
                                    </select>
                                </div>
                                <div class="mt-6 space-y-6">
                                    <!-- Pain Section -->
                                    <div>
                                        <h4 class="text-lg font-medium text-red-600 mb-2">Pain Points</h4>
                                        <div class="mb-4">
                                            <label class="block text-sm font-medium text-gray-700">Pain
                                                Description</label>
                                            <textarea name="pain_description" rows="2"
                                                required pattern="^[a-zA-Z0-9\s\.\-_,]+$" title="Hanya huruf, angka, spasi, titik, koma, strip, dan underscore yang diperbolehkan"
                                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary"></textarea>
                                        </div>

                                        <label class="block text-sm font-medium text-gray-700">Pain Points</label>
                                        <div id="pain-points-container" class="space-y-2 mt-2">
                                            <!-- Points will be added here -->
                                        </div>
                                        <button type="button" id="add-pain-point"
                                            class="mt-2 text-sm text-blue-600 hover:text-blue-800">
                                            + Add Pain Point
                                        </button>
                                    </div>

                                    <!-- Solution Section -->
                                    <div>
                                        <h4 class="text-lg font-medium text-blue-600 mb-2">Our Solution</h4>
                                        <div class="mb-4">
                                            <label class="block text-sm font-medium text-gray-700">Solution
                                                Description</label>
                                            <textarea name="solution_description" rows="2"
                                                required pattern="^[a-zA-Z0-9\s\.\-_,]+$" title="Hanya huruf, angka, spasi, titik, koma, strip, dan underscore yang diperbolehkan"
                                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary"></textarea>
                                        </div>

                                        <label class="block text-sm font-medium text-gray-700">Solution Points</label>
                                        <div id="solution-points-container" class="space-y-2 mt-2">
                                            <!-- Points will be added here -->
                                        </div>
                                        <button type="button" id="add-solution-point"
                                            class="mt-2 text-sm text-blue-600 hover:text-blue-800">
                                            + Add Solution Point
                                        </button>
                                    </div>

                                    <!-- Gain Section -->
                                    <div>
                                        <h4 class="text-lg font-medium text-green-600 mb-2">Customer Benefits</h4>
                                        <div class="mb-4">
                                            <label class="block text-sm font-medium text-gray-700">Gain
                                                Description</label>
                                            <textarea name="gain_description" rows="2"
                                                required pattern="^[a-zA-Z0-9\s\.\-_,]+$" title="Hanya huruf, angka, spasi, titik, koma, strip, dan underscore yang diperbolehkan"
                                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary"></textarea>
                                        </div>

                                        <label class="block text-sm font-medium text-gray-700">Gain Points</label>
                                        <div id="gain-points-container" class="space-y-2 mt-2">
                                            <!-- Points will be added here -->
                                        </div>
                                        <button type="button" id="add-gain-point"
                                            class="mt-2 text-sm text-blue-600 hover:text-blue-800">
                                            + Add Gain Point
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="submit"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-primary text-base font-medium text-white hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:ml-3 sm:w-auto sm:text-sm">
                        Simpan
                    </button>
                    <button type="button" id="cancelCreateBtn"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


@push('scripts')
    <script>
        $(document).ready(function() {
            // Add Pain Point
            $('#add-pain-point').click(function() {
                $('#pain-points-container').append(`
                <div class="flex items-center">
                    <input type="text" name="pain_points[]" 
                            required pattern="^[a-zA-Z0-9\s\.\-_,]+$" title="Hanya huruf, angka, spasi, titik, koma, strip, dan underscore yang diperbolehkan"
                           class="flex-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                    <button type="button" class="ml-2 text-red-500 remove-point-btn">
                        ✕
                    </button>
                </div>
            `);
            });

            // Add Solution Point
            $('#add-solution-point').click(function() {
                $('#solution-points-container').append(`
                <div class="flex items-center">
                    <input type="text" name="solution_points[]" 
                            required pattern="^[a-zA-Z0-9\s\.\-_,]+$" title="Hanya huruf, angka, spasi, titik, koma, strip, dan underscore yang diperbolehkan"
                           class="flex-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                    <button type="button" class="ml-2 text-red-500 remove-point-btn">
                        ✕
                    </button>
                </div>
            `);
            });

            // Add Gain Point
            $('#add-gain-point').click(function() {
                $('#gain-points-container').append(`
                <div class="flex items-center">
                    <input type="text" name="gain_points[]" 
                            required pattern="^[a-zA-Z0-9\s\.\-_,]+$" title="Hanya huruf, angka, spasi, titik, koma, strip, dan underscore yang diperbolehkan"
                           class="flex-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                    <button type="button" class="ml-2 text-red-500 remove-point-btn">
                        ✕
                    </button>
                </div>
            `);
            });

            // Remove Point
            $(document).on('click', '.remove-point-btn', function() {
                $(this).parent().remove();
            });
        });
    </script>
@endpush
