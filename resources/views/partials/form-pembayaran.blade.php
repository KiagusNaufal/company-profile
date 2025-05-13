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