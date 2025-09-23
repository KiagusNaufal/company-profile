@extends('layout.admin')

@section('title', 'Kelola Serial Number')
@section('header', 'Kelola Serial Number')

@section('content1')
@if (session('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
    <strong class="font-bold">Berhasil!</strong>
    <span class="block sm:inline">{{ session('success') }}</span>
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <title>Close</title>
            <path d="M14.348 14.849a1 1 0 01-1.414 0L10 11.914l-2.934 2.935a1 1 0 01-1.414-1.414l2.935-2.934-2.935-2.934a1 1 0 011.414-1.414L10 8.586l2.934-2.935a1 1 0 011.414 1.414L11.414 10l2.935 2.934a1 1 0 010 1.415z"/>
        </svg>
    </span>
</div>
@endif

@if ($errors->any())
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
    <strong class="font-bold">Terjadi Kesalahan!</strong>
    <ul class="list-disc pl-5">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <title>Close</title>
            <path d="M14.348 14.849a1 1 0 01-1.414 0L10 11.914l-2.934 2.935a1 1 0 01-1.414-1.414l2.935-2.934-2.935-2.934a1 1 0 011.414-1.414L10 8.586l2.934-2.935a1 1 0 011.414 1.414L11.414 10l2.935 2.934a1 1 0 010 1.415z"/>
        </svg>
    </span>
</div>
@endif

<div class="bg-white rounded-xl shadow-sm p-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h3 class="text-lg font-semibold">Daftar Serial Number</h3>
        </div>
        <button id="createProductBtn" class="bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-plus mr-2"></i> Tambah Serial Number
        </button>
    </div>

    <!-- Search Bar -->
    <div class="mb-6">
        <form id="searchForm" method="GET" action="{{ url()->current() }}" class="flex gap-4">
            <div class="relative flex-1">
                <input type="text" name="search" id="searchInput" 
                       value="{{ request('search') }}" 
                       placeholder="Cari berdasarkan serial number, nama, atau email..." 
                       class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
            </div>
            <button type="submit" class="bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-lg flex items-center">
                <i class="fas fa-search mr-2"></i> Cari
            </button>
            @if(request('search'))
            <a href="{{ url()->current() }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg flex items-center">
                <i class="fas fa-times mr-2"></i> Reset
            </a>
            @endif
        </form>
    </div>

    <!-- Tabel Produk -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Gambar</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Serial Number</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($serialNumbers as $product)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <img src="{{ secure_asset($product->profileImage ?? 'https://via.placeholder.com/50') }}" 
                             alt="{{ $product->name }}" 
                             class="h-10 w-10 rounded-md object-cover">
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="font-medium">{{ $product->serialNumber }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="font-medium">{{ $product->name }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="font-medium">{{ $product->email }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($product->is_active == 1)
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Aktif
                            </span>
                        @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                Tidak Aktif
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right">
                        <div class="flex justify-end space-x-2">
                            <!-- Tombol Download Gambar Serial Number -->
                            <button class="download-serial-btn bg-blue-500 hover:bg-blue-600 text-white p-2 rounded" 
                                    data-serial="{{ $product->serialNumber }}" 
                                    data-name="{{ $product->name }}"
                                    title="Download Gambar Serial Number">
                                <i class="fas fa-download"></i>
                            </button>
                            <button class="edit-product-btn text-yellow-500 hover:text-yellow-600 p-2 rounded" 
                                    data-product='@json($product)'
                                    title="Edit Serial Number">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="delete-product-btn text-red-500 hover:text-red-600 p-2 rounded" 
                                    data-id="{{ $product->id }}" 
                                    data-serial="{{ $product->serialNumber }}"
                                    title="Hapus Serial Number">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Download -->
    <div id="downloadModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg p-6 w-full max-w-md">
            <h3 class="text-lg font-semibold mb-4">Download Gambar Serial Number</h3>
            <div class="mb-4">
                <p>Serial Number: <span id="modalSerialNumber" class="font-bold"></span></p>
                <p>Nama: <span id="modalName" class="font-bold"></span></p>
            </div>
            <div class="flex justify-end space-x-2">
                <button id="cancelDownloadBtn" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">
                    Batal
                </button>
                <button id="confirmDownloadBtn" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    Download
                </button>
            </div>
        </div>
    </div>

    <div class="mt-4">
        {{ $serialNumbers->appends(request()->query())->links() }}
    </div>
</div>

@include('admin.serial.create-modal')
@include('admin.serial.edit-modal')
@include('admin.serial.delete-modal')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Create Product Modal
    $('#createProductBtn').click(function() {
        $('#createProductModal').removeClass('hidden');
    });
    
    $('#cancelCreateBtn, #createModalBackdrop').click(function() {
        $('#createProductModal').addClass('hidden');
    });

    // Edit Product Modal
    $('.edit-product-btn').click(function() {
        const product = JSON.parse($(this).attr('data-product'));
        const editUrl = '/serial/' + product.id;
        
        // Populate form fields
        $('#edit_name').val(product.name);
        $('#edit_serialNumber').val(product.serialNumber);
        $('#edit_email').val(product.email);
        $('#edit_password').val(product.password);
        $('#edit_status').val(product.is_active.toString());
        
        // Handle image display
        if (product.profileImage) {
            let imageUrl = product.profileImage.replace(/([^:]\/)\/+/g, '$1');
            if (!imageUrl.startsWith('http')) {
                imageUrl = imageUrl;
            }
            $('#currentProductImage').attr('src', imageUrl);
            $('#currentImageContainer').removeClass('hidden');
        } else {
            $('#currentProductImage').attr('src', 'https://via.placeholder.com/150');
            $('#currentImageContainer').removeClass('hidden');
        }
        
        $('#editProductForm').attr('action', editUrl);
        $('#editProductModal').removeClass('hidden');
    });
    
    $('#cancelEditBtn, #editModalBackdrop').click(function() {
        $('#editProductModal').addClass('hidden');
    });
    
    // Delete Product Modal
    $('.delete-product-btn').click(function() {
        const productId = $(this).attr('data-id');
        const productName = $(this).attr('data-serial');
        const deleteUrl = '/serial/' + productId;
        
        $('#deleteProductName').text(productName);
        $('#deleteProductForm').attr('action', deleteUrl);
        $('#deleteProductModal').removeClass('hidden');
    });
    
    $('#cancelDeleteBtn, #deleteModalBackdrop').click(function() {
        $('#deleteProductModal').addClass('hidden');
    });
    
    // Download Serial Number Image
    let currentDownloadSerial = '';
    let currentDownloadName = '';
    
    $('.download-serial-btn').click(function() {
        currentDownloadSerial = $(this).data('serial');
        currentDownloadName = $(this).data('name');
        
        $('#modalSerialNumber').text(currentDownloadSerial);
        $('#modalName').text(currentDownloadName);
        $('#downloadModal').removeClass('hidden');
    });
    
    $('#cancelDownloadBtn').click(function() {
        $('#downloadModal').addClass('hidden');
    });
    
    $('#confirmDownloadBtn').click(function() {
        downloadSerialImage(currentDownloadSerial, currentDownloadName);
        $('#downloadModal').addClass('hidden');
    });
    
    // Close modals when clicking outside content
    $(document).keyup(function(e) {
        if (e.key === "Escape") {
            $('#createProductModal').addClass('hidden');
            $('#editProductModal').addClass('hidden');
            $('#deleteProductModal').addClass('hidden');
            $('#downloadModal').addClass('hidden');
        }
    });
    
    // Auto-submit search form when typing (with delay)
    let searchTimeout;
    $('#searchInput').on('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            $('#searchForm').submit();
        }, 500);
    });
});

function downloadSerialImage(serialNumber, name) {
    // Show loading indicator
    const originalText = $('#confirmDownloadBtn').html();
    $('#confirmDownloadBtn').html('<i class="fas fa-spinner fa-spin mr-2"></i> Memproses...');
    $('#confirmDownloadBtn').prop('disabled', true);
    
    // Create a form to submit the request
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = '{{ route("serial.download") }}';
    
    // Add CSRF token
    const csrfToken = document.createElement('input');
    csrfToken.type = 'hidden';
    csrfToken.name = '_token';
    csrfToken.value = '{{ csrf_token() }}';
    form.appendChild(csrfToken);
    
    // Add serial number
    const serialInput = document.createElement('input');
    serialInput.type = 'hidden';
    serialInput.name = 'serial_number';
    serialInput.value = serialNumber;
    form.appendChild(serialInput);
    
    // Add name
    const nameInput = document.createElement('input');
    nameInput.type = 'hidden';
    nameInput.name = 'name';
    nameInput.value = name;
    form.appendChild(nameInput);
    
    document.body.appendChild(form);
    form.submit();
    document.body.removeChild(form);
    
    // Reset button after a short delay
    setTimeout(() => {
        $('#confirmDownloadBtn').html('Download');
        $('#confirmDownloadBtn').prop('disabled', false);
    }, 2000);
}
</script>
@endsection