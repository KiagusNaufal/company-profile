@extends('layout.admin')

@section('title', 'Kelola Produk')
@section('header', 'Kelola Produk')

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
            <h3 class="text-lg font-semibold">Daftar Produk</h3>
            <p class="text-gray-500 text-sm">Total {{ $products->total() }} produk</p>
        </div>
        <button id="createProductBtn" class="bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-plus mr-2"></i> Tambah Produk
        </button>
    </div>

    <!-- Tabel Produk -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Gambar</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Produk</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Harga</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($products as $product)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <img src="{{ secure_asset('storage/' . cetak($product->image)) ?? 'https://via.placeholder.com/50' }}" alt="{{ cetak($product->name) }}" class="h-10 w-10 rounded-md object-cover">
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="font-medium">{{ cetak($product->name) }}</div>
                        <div class="text-gray-500 text-sm">{{ cetak($product->description) }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">Rp {{ number_format(cetak($product->price, 0, ',', '.')) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right">
                        <div class="flex justify-end space-x-2">
                            <button class="edit-product-btn text-yellow-500 hover:text-yellow-600" data-product='@json($product)'>
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="delete-product-btn text-red-500 hover:text-red-600" data-id="{{ cetak($product->id) }}" data-name="{{ cetak($product->name) }}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ cetak($products->links()) }}
    </div>
</div>

@include('admin.produk.create-modal')
@include('admin.produk.edit-modal')
@include('admin.produk.delete-modal')


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

    
$(document).on('click', '.edit-product-btn', function() {
    const product = JSON.parse($(this).attr('data-product'));
    console.log(product);
    // Populate basic fields
    $('#edit_name').val(product.name);
    $('#edit_price').val(product.price);
    $('#edit_description').val(product.description);
    $('#edit_category').val(product.kategori_id);
    $('#edit_badge_color').val(product.badge_color);
    $('#edit_link_aplikasi').val(product.link_aplikasi);
    $('#edit_link_tutorial').val(product.link_tutorial);
    $('#edit_link_sub').val(product.link_sub);
    
    
if (product.image_slide && product.image_slide.length > 0) {
    $('#currentSlideImages').empty(); // kosongkan dulu
    
    product.image_slide.forEach(function(slidePath) {
        const img = $('<img>').attr('src', '/storage/' + slidePath).addClass('h-20 mr-2 rounded-md object-cover');
        $('#currentSlideImages').append(img);
    });
    
    $('#currentSlideContainer').removeClass('hidden');
} else {
    $('#currentSlideContainer').addClass('hidden');
}

    
    // Update image preview
    if (product.image) {
        $('#currentProductImage').attr('src', '/storage/' + product.image);
        $('#currentImageContainer').removeClass('hidden');
    } else {
        $('#currentImageContainer').addClass('hidden');
    }

    if (product.imagebg_produk) {
        $('#currentBgImage').attr('src', '/storage/' + product.imagebg_produk);
        $('#currentbgContainer').removeClass('hidden');
    } else {
        $('#currentbgContainer').addClass('hidden');
    }
        if (product.image_logo) {
        $('#currentLogoImage').attr('src', '/storage/' + product.image_logo);
        $('#currentLogoContainer').removeClass('hidden');
    } else {
        $('#currentLogoContainer').addClass('hidden');
    }
    
    // Set form action
    $('#editProductForm').attr('action', '/produk/' + product.id);
    
    // Show modal
    $('#editProductModal').removeClass('hidden');
});

// Function to add new pain point


    
    $('#cancelEditBtn, #editModalBackdrop').click(function() {
        $('#editProductModal').addClass('hidden');
    });
    
    // Delete Product Modal
    $('.delete-product-btn').click(function() {
        const productId = $(this).attr('data-id');
        const productName = $(this).attr('data-name');
        const deleteUrl = '/produk/' + productId;
        
        $('#deleteProductName').text(productName);
        $('#deleteProductForm').attr('action', deleteUrl);
        $('#deleteProductModal').removeClass('hidden');
    });
    
    $('#cancelDeleteBtn, #deleteModalBackdrop').click(function() {
        $('#deleteProductModal').addClass('hidden');
    });
    
    // Close modals when clicking outside content
    $(document).keyup(function(e) {
        if (e.key === "Escape") {
            $('#createProductModal').addClass('hidden');
            $('#detailProductModal').addClass('hidden');
            $('#editProductModal').addClass('hidden');
            $('#deleteProductModal').addClass('hidden');
        }
    });
});
function updateBadgePreview() {
    const selectedColor = document.getElementById('badge_color').value;
    const badgePreview = document.getElementById('badgePreview');
    
    // Remove all color classes
    badgePreview.className = 'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium';
    
    // Add selected color classes
    selectedColor.split(' ').forEach(cls => {
        badgePreview.classList.add(cls);
    });
}

</script>
@endsection