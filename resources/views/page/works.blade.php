@extends('layout.header')

@section('title', 'Home Page')

@section('content')
    <!-- Works Hero Section -->
 <section
            class="relative py-32 h-[512px] md:min-h-[712px] bg-gradient-to-r from-blue-50 to-gray-50 overflow-hidden scroll-reveal-section">
            <!-- Soft Dot Texture -->
            <div class="absolute inset-0 opacity-5">
                <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <pattern id="dot-pattern" width="20" height="20" patternUnits="userSpaceOnUse">
                            <circle cx="2" cy="2" r="1" fill="#04b2f7" opacity="0.2" />
                        </pattern>
                    </defs>
                    <rect width="100%" height="100%" fill="url(#dot-pattern)" />
                </svg>
            </div>

            <!-- Blurred Color Accents -->
            <div class="absolute inset-0 mix-blend-multiply filter blur-3xl opacity-20">
                <div class="absolute top-1/3 left-10 w-60 h-60 bg-[#04b2f7] rounded-full"></div>
                <div class="absolute bottom-1/4 right-16 w-72 h-72 bg-indigo-400 rounded-full"></div>
            </div>

            <div class="relative mt-10 max-w-4xl mx-auto px-6 text-center">
                <!-- Title -->
                <h1 class="scroll-reveal-item text-5xl sm:text-6xl font-bold text-gray-900">
                    Our <span class="text-[#04b2f7]">Portfolio</span>
                </h1>
                <!-- Subtitle -->
                <p class="scroll-reveal-item mt-4 text-xl text-gray-600 max-w-2xl mx-auto">
                    A selection of digital solutions we’ve crafted—web, mobile, and game applications that drive results.
                </p>
                <!-- CTA -->
                <div class="scroll-reveal-item mt-8">
                    <a href="#projects"
                        class="inline-block px-8 py-4 bg-[#04b2f7] text-white font-medium rounded-full shadow-lg hover:bg-[#0399d9] transition">
                        View All Projects
                    </a>
                </div>
            </div>
            <!-- Scrolling indicator -->
            <div class="absolute bottom-8 left-0 right-0 flex justify-center">
                <div class="animate-bounce w-8 h-8 text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                    </svg>
                </div>
            </div>
        </section>

    <!-- Projects Grid -->
    <section id="projects" class="container mx-auto px-4 py-16 md:py-24 scroll-reveal-section">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-12 text-center">All Works</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($projects as $project)
                <div class="group overflow-hidden rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 scroll-reveal-card">
                    <!-- Image Container -->
                    <div class="relative h-64 w-full overflow-hidden">
                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                            loading="lazy"
                            onerror="this.src='https://via.placeholder.com/800x600?text=Image+Not+Available'; this.className='w-full h-full object-contain bg-gray-100 p-4'">
                    </div>

                    <!-- Content Container -->
                    <div class="p-6 bg-white">
                        <div class="flex items-center justify-between mb-4 gap-2">
                            <h3 class="text-xl font-bold text-gray-900 truncate flex-1">{{ $project->name }}</h3>
                            <span class="text-xs {{ $project->badge_color }} px-2 py-1 rounded-full font-medium whitespace-nowrap">
                                {{ $project->kategori->name }}
                            </span>
                        </div>

                        <div class="mb-4">
                            <span class="text-xl font-bold text-gray-900">Rp {{ number_format($project->price, 0, ',', '.') }}</span>
                        </div>

                        <p class="text-gray-600 mb-6 line-clamp-3 leading-relaxed">
                            {{ $project->description }}
                        </p>

                        <button data-id="{{ $project->id }}"
                            data-name="{{ $project->name }}"
                            data-price="{{ $project->price }}"
                            class="buy-now-btn w-full mt-4 group inline-flex items-center justify-center text-blue-600 hover:text-blue-800 font-medium transition-colors">
                            <span class="mr-2">Buy Now</span>
                            <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Payment Modal -->
  <!-- Payment Modal -->
<div id="paymentModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center">
    <div class="relative max-w-md w-full mx-4 bg-white rounded-xl shadow-2xl my-8 p-6 max-h-[90vh] overflow-y-auto">
        <button id="closeModalBtn" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <div id="paymentFormContainer">
            <h3 class="text-2xl font-bold text-gray-800 mb-4">Payment Form</h3>

            <form id="paymentForm" method="POST" action="{{ secure_url('/payment/create') }}">
                @csrf
                <input type="hidden" name="produk_id" id="modal_produk_id">
                <input type="hidden" name="amount" id="modal_amount">

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Selected Project</label>
                    <div class="p-3 bg-gray-50 rounded-lg">
                        <h4 id="modal_project_name" class="font-medium text-gray-900"></h4>
                        <p id="modal_project_price" class="text-blue-600 font-bold"></p>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 mb-2">Email</label>
                    <input type="email" name="email" id="email" required
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="customer_name" class="block text-gray-700 mb-2">Full Name</label>
                    <input type="text" name="customer_name" id="customer_name" required
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-6">
                    <label for="phone_number" class="block text-gray-700 mb-2">Phone Number</label>
                    <input type="tel" name="phone_number" id="phone_number" required
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition">
                    Proceed to Payment
                </button>
            </form>
        </div>

        <!-- Container untuk Duitku Checkout -->
        <div id="duitkuCheckoutContainer" class="hidden">
            <div class="text-center py-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Payment Gateway</h3>
                <p class="text-gray-600 mb-6">Please complete your payment in the popup window</p>
                <button id="openDuitkuBtn" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg">
                    Open Payment Window
                </button>
            </div>
        </div>
    </div>
</div>
    <!-- CTA Section -->
    <x-cta-section></x-cta-section>

    <script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize modal and form elements
    const modal = document.getElementById('paymentModal');
    const paymentForm = document.getElementById('paymentForm');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const paymentFormContainer = document.getElementById('paymentFormContainer');
    const duitkuCheckoutContainer = document.getElementById('duitkuCheckoutContainer');
    const openDuitkuBtn = document.getElementById('openDuitkuBtn');
    let duitkuReference = null;

    // Initialize modal as hidden
    closePaymentModal();

    // Add event listeners to all "Buy Now" buttons
    document.querySelectorAll('.buy-now-btn').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const name = this.getAttribute('data-name');
            const price = this.getAttribute('data-price');
            showPaymentModal(id, name, price);
        });
    });

    // Show payment modal function
    function showPaymentModal(id, name, price) {
        // Validate inputs
        if (!id || !name || !price) {
            console.error('Invalid modal data');
            return;
        }

        // Set form values
        document.getElementById('modal_produk_id').value = id;
        document.getElementById('modal_amount').value = price;
        document.getElementById('modal_project_name').textContent = name;
        document.getElementById('modal_project_price').textContent = 'Rp ' + parseInt(price).toLocaleString('id-ID');

        // Show modal
        modal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');

        // Reset to form view
        paymentFormContainer.classList.remove('hidden');
        duitkuCheckoutContainer.classList.add('hidden');
        paymentForm.reset();
    }

    // Close payment modal function
    function closePaymentModal() {
        modal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    // Close modal when clicking X button
    closeModalBtn.addEventListener('click', closePaymentModal);

    // Close modal when clicking outside
    modal.addEventListener('click', function(e) {
        if (e.target === this) {
            closePaymentModal();
        }
    });

    // Form submission handler
    paymentForm.addEventListener('submit', async function(e) {
        e.preventDefault();

        // Get form elements
        const submitBtn = this.querySelector('[type="submit"]');
        const originalBtnText = submitBtn.innerHTML;
        const formData = new FormData(this);

        try {
            // Show loading state
            submitBtn.disabled = true;
            submitBtn.innerHTML = `
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Processing...
            `;

            // Debug: Log form data
            console.log('Submitting form data:', Object.fromEntries(formData));

            // Make the API request
            const response = await fetch(this.action, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: formData
            });

            // Handle response
            if (!response.ok) {
                const errorResponse = await response.json().catch(() => ({}));
                throw new Error(
                    errorResponse.message ||
                    `Server responded with status ${response.status}`
                );
            }

            const data = await response.json();
            console.log('API Response:', data);

            // Handle successful payment creation
            if (data.success && data.reference) {
                duitkuReference = data.reference;

                // Hide form, show payment gateway
                paymentFormContainer.classList.add('hidden');
                duitkuCheckoutContainer.classList.remove('hidden');

                // Set up Duitku payment button
                openDuitkuBtn.onclick = function() {
                    processDuitkuPayment(duitkuReference);
                };
            } else {
                throw new Error(data.message || 'Payment creation failed');
            }

        } catch (error) {
            console.error('Payment Error:', error);

            // Show error to user
            alert(`Payment Error: ${error.message}`);

            // Detailed error logging
            console.group('Error Details');
            console.error('Error:', error);
            console.error('Form Data:', Object.fromEntries(formData));
            console.groupEnd();

        } finally {
            // Reset button state
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalBtnText;
        }
    });

    // Process Duitku payment
function processDuitkuPayment(reference, merchantOrderId) {
    if (!window.checkout || !window.checkout.process) {
        showErrorModal('Payment gateway tidak terload. Silakan refresh halaman.');
        return;
    }

    // Cek status transaksi terlebih dahulu
    checkPaymentStatus(merchantOrderId)
        .then(status => {
            if (status.paid) {
                showSuccessModal('Pembayaran sudah berhasil!');
                return;
            }

            if (status.expired) {
                showErrorModal('Waktu pembayaran telah habis. Silakan buat order baru.');
                return;
            }

            // Proses pembayaran Duitku
            checkout.process(reference, {
                defaultLanguage: "id",
                currency: "IDR",
                successEvent: function(result) {
                    console.log('Payment success:', result);
                    showSuccessModal('Pembayaran berhasil! No. Referensi: ' + result.reference);
                    closePaymentModal();
                },
                pendingEvent: function(result) {
                    console.log('Payment pending:', result);
                    showInfoModal('Pembayaran dalam proses. Silakan selesaikan pembayaran Anda.');
                },
                errorEvent: function(result) {
                    console.log('Payment error:', result);
                    showErrorModal('Pembayaran gagal: ' + (result.message || 'Silakan coba lagi'));
                },
                closeEvent: function(result) {
                    console.log('Popup ditutup:', result);
                    // Optional: Bisa tambahkan notifikasi
                }
            });
        })
        .catch(error => {
            console.error('Status check error:', error);
            showErrorModal('Gagal memproses pembayaran. Silakan hubungi admin.');
        });
}

// Fungsi cek status pembayaran
async function checkPaymentStatus(merchantOrderId) {
    try {
        const response = await fetch(`/api/payment/status/${merchantOrderId}`);
        if (!response.ok) throw new Error('Failed to check status');
        return await response.json();
    } catch (error) {
        console.error('Error:', error);
        throw error;
    }
}
    // Additional helper function to check payment status
    async function checkPaymentStatus(merchantOrderId) {
        try {
            const response = await fetch(`/payment/status/${merchantOrderId}`);
            if (!response.ok) throw new Error('Failed to check status');
            return await response.json();
        } catch (error) {
            console.error('Status check error:', error);
            return { error: true, message: error.message };
        }
    }
});

// Fungsi tampilkan modal error
function showErrorModal(message) {
    const errorModal = document.getElementById('errorModal');
    errorModal.querySelector('.modal-body').textContent = message;
    new bootstrap.Modal(errorModal).show();
}

// Fungsi tampilkan modal success
function showSuccessModal(message) {
    const successModal = document.getElementById('successModal');
    successModal.querySelector('.modal-body').textContent = message;
    new bootstrap.Modal(successModal).show();
}

// Fungsi tampilkan modal info
function showInfoModal(message) {
    const infoModal = document.getElementById('infoModal');
    infoModal.querySelector('.modal-body').textContent = message;
    new bootstrap.Modal(infoModal).show();
}
    </script>
@endsection

