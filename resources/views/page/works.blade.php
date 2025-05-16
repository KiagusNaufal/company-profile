@extends('layout.header')


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
                    {{ __('works.hero.title1') }} <span class="text-[#04b2f7]">{{ __('works.hero.title2') }}</span>
                </h1>
                <!-- Subtitle -->
                <p class="scroll-reveal-item mt-4 text-xl text-gray-600 max-w-2xl mx-auto">
                    {{ __('works.hero.subtitle') }}
                </p>
                <!-- CTA -->
                <div class="scroll-reveal-item mt-8">
                    <a href="#projects"
                        class="inline-block px-8 py-4 bg-[#04b2f7] text-white font-medium rounded-full shadow-lg hover:bg-[#0399d9] transition">
                        {{ __('works.hero.button') }}
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
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-12 text-center">{{ __('works.projects.heading') }}</h2>

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
                            <span class="mr-2">{{ __('works.card.buy_now') }}</span>
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
    @include('partials.form-pembayaran')
  <!-- Payment Modal -->

    <!-- CTA Section -->
    <x-cta-section></x-cta-section>

    <script>
document.addEventListener('DOMContentLoaded', function() {
    // Inisialisasi elemen modal dan form
    const modal = document.getElementById('paymentModal');
    const paymentForm = document.getElementById('paymentForm');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const paymentFormContainer = document.getElementById('paymentFormContainer');
    const duitkuCheckoutContainer = document.getElementById('duitkuCheckoutContainer');
    const openDuitkuBtn = document.getElementById('openDuitkuBtn');
    let duitkuReference = null;

    // Fungsi untuk menutup modal
    function closePaymentModal() {
        modal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    // Fungsi untuk menampilkan modal
    function showPaymentModal(id, name, price) {
        document.getElementById('modal_produk_id').value = id;
        document.getElementById('modal_amount').value = price;
        document.getElementById('modal_project_name').textContent = name;
        document.getElementById('modal_project_price').textContent = 'Rp ' + parseInt(price).toLocaleString('id-ID');

        modal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
        paymentFormContainer.classList.remove('hidden');
        duitkuCheckoutContainer.classList.add('hidden');
        paymentForm.reset();
    }

    // Event listener untuk tombol close
    closeModalBtn.addEventListener('click', closePaymentModal);

    // Event listener untuk klik di luar modal
    modal.addEventListener('click', function(e) {
        if (e.target === this) {
            closePaymentModal();
        }
    });

    // Event listener untuk tombol "Buy Now"
    document.querySelectorAll('.buy-now-btn').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const name = this.getAttribute('data-name');
            const price = this.getAttribute('data-price');
            showPaymentModal(id, name, price);
        });
    });

    // Handler submit form
    paymentForm.addEventListener('submit', async function(e) {
        e.preventDefault();

        const submitBtn = this.querySelector('[type="submit"]');
        const originalBtnText = submitBtn.innerHTML;

        try {
            submitBtn.disabled = true;
            submitBtn.innerHTML = `
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Processing...
            `;

            const response = await fetch(this.action, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: new FormData(this)
            });

            if (!response.ok) {
                throw new Error('Server responded with status ' + response.status);
            }

            const data = await response.json();

            if (data.success && data.reference) {
                duitkuReference = data.reference;
                paymentFormContainer.classList.add('hidden');
                duitkuCheckoutContainer.classList.remove('hidden');

                openDuitkuBtn.onclick = function() {
                    processDuitkuPayment(data.reference, data.merchantOrderId);
                };
            } else {
                throw new Error(data.message || 'Payment creation failed');
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Error: ' + error.message);
        } finally {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalBtnText;
        }
    });

    // Fungsi untuk memproses pembayaran Duitku
    function processDuitkuPayment(reference, merchantOrderId) {
        if (!window.checkout || !window.checkout.process) {
            alert('Payment gateway not loaded. Please refresh the page.');
            return;
        }

        checkout.process(reference, {
            defaultLanguage: "id",
            currency: "IDR",
            successEvent: function(result) {
                closePaymentModal(); // Tutup modal setelah pembayaran berhasil
            },
            pendingEvent: function(result) {
            },
            errorEvent: function(result) {
                alert('Payment failed: ' + (result.message || 'Please try again'));
            },
            closeEvent: function(result) {
            }
        });
    }

    // Fungsi untuk menampilkan pesan sukses (bisa disesuaikan)
    function showSuccessMessage(message) {
        alert(message); // Bisa diganti dengan modal custom atau notifikasi
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

