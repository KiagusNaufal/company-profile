    document.addEventListener("DOMContentLoaded", function () {
        const modal = document.getElementById("contactModal");
        const modalOverlay = document.getElementById("modalOverlay");
        const modalPanel = document.querySelector("#contactModal .modal-panel");
        const tellUsButtons = document.querySelectorAll(
            "#tellUsButton, #tellUsButtonMobile"
        );
        const closeModalBtns = ["closeModal", "cancelButton"].map((id) =>
            document.getElementById(id)
        );

        // Initialize
        modalPanel.style.transform = "translateX(100%)";
        modalOverlay.style.opacity = "0";
        modalOverlay.style.pointerEvents = "none";

        // Store scroll position
        let scrollPosition = 0;

        // Smooth toggle function
        function toggleModal(show) {
            if (show) {
                // Store current scroll position
                scrollPosition = window.pageYOffset || document.documentElement.scrollTop;
                
                modal.classList.remove("hidden");
                document.body.style.overflow = "hidden";
                document.body.style.position = "fixed";
                document.body.style.top = `-${scrollPosition}px`;
                document.body.style.width = "100%";

                // Force reflow to ensure animation runs
                void modal.offsetWidth;

                modalOverlay.style.pointerEvents = "auto";
                modalOverlay.style.opacity = "1";
                modalPanel.style.transform = "translateX(0)";
            } else {
                modalPanel.style.transform = "translateX(100%)";
                modalOverlay.style.opacity = "0";
                modalOverlay.style.pointerEvents = "none";

                setTimeout(() => {
                    modal.classList.add("hidden");
                    // Restore scroll position
                    document.body.style.removeProperty("overflow");
                    document.body.style.removeProperty("position");
                    document.body.style.removeProperty("top");
                    document.body.style.removeProperty("width");
                    window.scrollTo(0, scrollPosition);
                }, 500); // Match CSS transition duration
            }
        }

        // Event listeners
        tellUsButtons.forEach((btn) =>
            btn.addEventListener("click", (e) => {
                e.preventDefault();
                e.stopPropagation();

                // Close mobile menu if open
                const mobileMenu = document.getElementById("mobile-menu");
                if (mobileMenu && mobileMenu.classList.contains("open")) {
                    mobileMenu.classList.remove("open");
                }

                toggleModal(true);
            })
        );

        closeModalBtns.forEach((btn) =>
            btn && btn.addEventListener("click", (e) => {
                e.stopPropagation();
                toggleModal(false);
            })
        );
        
        if (modal) modal.addEventListener("click", (e) => e.stopPropagation());
        if (modalPanel) modalPanel.addEventListener("click", (e) => e.stopPropagation());

        const closeModal = document.getElementById("closeModal");
        const cancelButton = document.getElementById("cancelButton");
        
        if (closeModal) closeModal.addEventListener("click", () => toggleModal(false));
        if (cancelButton) cancelButton.addEventListener("click", () => toggleModal(false));
        if (modalOverlay) modalOverlay.addEventListener("click", () => toggleModal(false));

        // Form handling
        const form = document.querySelector("#contactModal form");
        if (form) {
            form.addEventListener("submit", async (e) => {
                e.preventDefault();

                const formAlert = document.getElementById("formAlert");
                const submitButton = form.querySelector('button[type="submit"]');
                const originalButtonText = submitButton.innerHTML;

                // Show loading state
                submitButton.disabled = true;
                submitButton.innerHTML = `
                    <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Sending...
                `;

                formAlert.textContent = "Sending message...";
                formAlert.className =
                    "px-4 py-3 rounded-lg bg-blue-50 text-blue-700 border-l-4 border-blue-500";
                formAlert.classList.remove("hidden");

                try {
                    const response = await fetch(form.action, {
                        method: "POST",
                        body: new FormData(form),
                        headers: { Accept: "application/json" },
                    });

                    if (response.ok) {
                        form.reset();
                        showAlert("Message sent successfully!", "success");
                        setTimeout(() => toggleModal(false), 1500);
                    } else {
                        showAlert(
                            "Failed to send message. Please try again.",
                            "error"
                        );
                    }
                } catch (error) {
                    showAlert(
                        "Network error. Please check your connection.",
                        "error"
                    );
                } finally {
                    // Reset button state
                    submitButton.disabled = false;
                    submitButton.innerHTML = originalButtonText;
                }
            });
        }

        function showAlert(message, type) {
            const formAlert = document.getElementById("formAlert");
            if (!formAlert) return;
            
            formAlert.textContent = message;
            formAlert.className = `px-4 py-3 rounded-lg border-l-4 ${
                type === "success"
                    ? "bg-green-50 text-green-700 border-green-500"
                    : "bg-red-50 text-red-700 border-red-500"
            } transition-all`;

            formAlert.classList.remove("hidden", "opacity-0");
            formAlert.classList.add("opacity-100");

            setTimeout(() => {
                formAlert.classList.add("opacity-0");
                setTimeout(() => formAlert.classList.add("hidden"), 300);
            }, 5000);
        }
    });

function initBuyNowButtons() {
    const modal = document.getElementById('paymentModal');
    const paymentForm = document.getElementById('paymentForm');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const paymentFormContainer = document.getElementById('paymentFormContainer');
    const duitkuCheckoutContainer = document.getElementById('duitkuCheckoutContainer');
    const openDuitkuBtn = document.getElementById('openDuitkuBtn');
    let duitkuReference = null;
    let merchantOrderId = null;

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
                merchantOrderId = data.merchant_order_id;
                paymentFormContainer.classList.add('hidden');
                duitkuCheckoutContainer.classList.remove('hidden');

                openDuitkuBtn.onclick = function() {
                    processDuitkuPayment(data.reference, data.merchant_order_id);
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
            // Redirect ke halaman return dengan merchantOrderId
            window.location.href = `/payment/return?merchantOrderId=${merchantOrderId}`;
        },
        pendingEvent: function(result) {
            // Untuk pembayaran pending (bank transfer dll)
            window.location.href = `/payment/return?merchantOrderId=${merchantOrderId}`;
        },
        errorEvent: function(result) {
            alert('Payment failed: ' + (result.message || 'Please try again'));
            window.location.href = `/payment/return?merchantOrderId=${merchantOrderId}`;
        },
        closeEvent: function(result) {
            // Jika popup ditutup tanpa menyelesaikan pembayaran
            console.log('Payment popup closed', result);
        }
    });
}

    // Fungsi untuk memeriksa status pembayaran secara berkala
    function checkPaymentStatusPeriodically(merchantOrderId) {
        const interval = setInterval(async () => {
            try {
                const response = await fetch(`/payment/status/${merchantOrderId}`);
                const data = await response.json();
                
                if (data.paid) {
                    clearInterval(interval);
                    window.location.href = `/payment/return?merchantOrderId=${merchantOrderId}`;
                } else if (data.status === 'failed') {
                    clearInterval(interval);
                    alert('Payment failed. Please try again.');
                }
            } catch (error) {
                console.error('Error checking payment status:', error);
                clearInterval(interval);
            }
        }, 5000); // Periksa setiap 5 detik
    }
};

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
