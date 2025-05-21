<div id="paymentModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center">
    <div class="relative max-w-md w-full mx-4 bg-white rounded-xl shadow-2xl my-8 p-6 max-h-[90vh] overflow-y-auto">
        <button id="closeModalBtn" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <div id="paymentFormContainer">
            <h3 class="text-2xl font-bold text-gray-800 mb-4">Payment Form</h3>
            
            <form id="paymentForm" method="POST" action="{{ secure_url('/payment/create') }}" novalidate>
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
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                    <div id="emailError" class="text-red-500 text-sm mt-1 hidden">Please enter a valid email address</div>
                </div>
                
<div class="mb-4">
    <label for="customer_name" class="block text-gray-700 mb-2">Full Name</label>
    <input type="text" name="customer_name" id="customer_name" required 
           pattern="[A-Za-z\s]+" 
           title="Hanya huruf dan spasi diperbolehkan"
           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    <div id="nameError" class="text-red-500 text-sm mt-1 hidden">Nama hanya boleh mengandung huruf dan spasi</div>
</div>

<div class="mb-6">
    <label for="phone_number" class="block text-gray-700 mb-2">Phone Number</label>
    <input type="number" name="phone_number" id="phone_number" required
           pattern="[0-9]+" 
           title="Hanya angka diperbolehkan"
           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    <div id="phoneError" class="text-red-500 text-sm mt-1 hidden">Nomor telepon hanya boleh mengandung angka</div>
</div>
                
                <button type="submit" 
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition disabled:opacity-50 disabled:cursor-not-allowed"
                    id="submitBtn">
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


<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('paymentForm');
    const emailInput = document.getElementById('email');
    const nameInput = document.getElementById('customer_name');
    const phoneInput = document.getElementById('phone_number');
    const submitBtn = document.getElementById('submitBtn');

    // Real-time validation
    emailInput.addEventListener('input', validateEmail);
    nameInput.addEventListener('input', validateName);
    phoneInput.addEventListener('input', validatePhone);

    // Form submission handler
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        if (validateForm()) {
            // Jika validasi berhasil, lanjutkan proses pembayaran
            submitBtn.disabled = true;
            submitBtn.innerHTML = 'Processing...';
            
            // Simpan data form atau kirim ke server
            console.log('Form is valid, submitting...');
            // form.submit(); // Uncomment untuk real submission
            
            // Contoh: Tampilkan Duitku container setelah validasi
            document.getElementById('paymentFormContainer').classList.add('hidden');
            document.getElementById('duitkuCheckoutContainer').classList.remove('hidden');
        }
    });

  function sanitizeInput(input) {
    // Hapus karakter khusus kecuali @ untuk email
    return input.replace(/[<>'"\\]/g, '');
}

function validateName() {
    const nameInput = document.getElementById('customer_name');
    const nameError = document.getElementById('nameError');
    const nameRegex = /^[A-Za-z\s]+$/;
    
    nameInput.value = sanitizeInput(nameInput.value);
    
    if (!nameInput.value.match(nameRegex)) {
        nameInput.classList.add('border-red-500');
        nameError.classList.remove('hidden');
        return false;
    } else {
        nameInput.classList.remove('border-red-500');
        nameError.classList.add('hidden');
        return true;
    }
}

function validatePhone() {
    const phoneInput = document.getElementById('phone_number');
    const phoneError = document.getElementById('phoneError');
    const phoneRegex = /^[0-9]+$/;
    
    phoneInput.value = sanitizeInput(phoneInput.value);
    
    if (!phoneInput.value.match(phoneRegex)) {
        phoneInput.classList.add('border-red-500');
        phoneError.classList.remove('hidden');
        return false;
    } else {
        phoneInput.classList.remove('border-red-500');
        phoneError.classList.add('hidden');
        return true;
    }
}

// Untuk email (biarkan @ tapi filter karakter lain)
function validateEmail() {
    const emailInput = document.getElementById('email');
    const emailError = document.getElementById('emailError');
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    
    // Sanitize tapi biarkan @
    emailInput.value = emailInput.value.replace(/[<>'"\\]/g, '');
    
    if (!emailInput.value.match(emailRegex)) {
        emailInput.classList.add('border-red-500');
        emailError.classList.remove('hidden');
        return false;
    } else {
        emailInput.classList.remove('border-red-500');
        emailError.classList.add('hidden');
        return true;
    }
}
    function validateForm() {
        const isEmailValid = validateEmail();
        const isNameValid = validateName();
        const isPhoneValid = validatePhone();
        
        return isEmailValid && isNameValid && isPhoneValid;
    }

    // Close modal handler
    document.getElementById('closeModalBtn').addEventListener('click', function() {
        document.getElementById('paymentModal').classList.add('hidden');
    });
});
</script>