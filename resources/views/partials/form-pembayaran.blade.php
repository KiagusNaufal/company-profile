
<div id="paymentModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
    <div class="relative max-w-md mx-auto bg-white rounded-xl shadow-2xl my-8 p-6">
        <button id="closeModal" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <h3 class="text-2xl font-bold text-gray-800 mb-4">Payment Form</h3>
        
        <form id="paymentForm" method="POST" action="">
            @csrf
            <input type="hidden" name="produk_id" id="produk_id">
            <input type="hidden" name="amount" id="amount">
            
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Selected Project</label>
                <div class="p-3 bg-gray-50 rounded-lg">
                    <h4 id="projectName" class="font-medium text-gray-900"></h4>
                    <p id="projectPrice" class="text-blue-600 font-bold"></p>
                </div>
            </div>
            
            <div class="mb-4">
                <label for="email" class="block text-gray-700 mb-2">Email</label>
                <input type="email" name="email" id="email" required
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            
            <div class="mb-4">
                <label for="customer_name" class="block text-gray-700 mb-2">Full Name</label>
                <input type="text" name="customer_name" id="customer_name"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            
            <div class="mb-6">
                <label for="phone_number" class="block text-gray-700 mb-2">Phone Number</label>
                <input type="tel" name="phone_number" id="phone_number"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            
            <button type="submit" 
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition">
                Proceed to Payment
            </button>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Tangkap semua tombol "View Project"
    const viewButtons = document.querySelectorAll('a[href="#"]');
    
    viewButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Dapatkan data produk dari card
            const card = this.closest('.flex.flex-col');
            const productId = card.querySelector('input[name="produk_id"]').value;
            const productName = card.querySelector('h3').textContent;
            const productPrice = card.querySelector('span.text-2xl').textContent;
            
            // Isi form modal
            document.getElementById('produk_id').value = productId;
            document.getElementById('amount').value = productPrice.replace(/[^\d]/g, '');
            document.getElementById('projectName').textContent = productName;
            document.getElementById('projectPrice').textContent = productPrice;
            
            // Tampilkan modal
            document.getElementById('paymentModal').classList.remove('hidden');
        });
    });
    
    // Tutup modal
    document.getElementById('closeModal').addEventListener('click', function() {
        document.getElementById('paymentModal').classList.add('hidden');
    });
    
    // Handle form submission
    document.getElementById('paymentForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const response = await fetch(this.action, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                produk_id: this.produk_id.value,
                amount: this.amount.value,
                email: this.email.value,
                customer_name: this.customer_name.value,
                phone_number: this.phone_number.value
            })
        });
        
        const data = await response.json();
        
        if (data.success) {
            window.location.href = data.payment_url;
        } else {
            alert('Error: ' + data.message);
        }
    });
});
</script>