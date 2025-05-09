<div class="fixed inset-0 z-50 overflow-hidden hidden" aria-hidden="true" id="contactModal">
    <div class="absolute inset-0 bg-black/50 transition-opacity" id="modalOverlay"></div>
    
    <!-- Modal Container -->
    <div class="fixed inset-y-0 right-0 pl-10 max-w-full flex">
        <div class="w-screen max-w-md">
            <div class="h-full flex flex-col bg-white shadow-xl">
                <!-- Header -->
                <div class="px-4 py-6 bg-[#04b2f7] sm:px-6">
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl font-bold text-white">Contact Us</h2>
                        <button id="closeModal" class="text-white hover:text-gray-200">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Form -->
                <form class="flex-1 flex flex-col p-6" action="https://formspree.io/f/your-form-id" method="POST">
                    <div id="formAlert" class="hidden mb-4 p-4 rounded-lg"></div>
                    <div class="space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#04b2f7] focus:ring-[#04b2f7]">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#04b2f7] focus:ring-[#04b2f7]">
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                            <textarea id="message" name="message" rows="4" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#04b2f7] focus:ring-[#04b2f7]"></textarea>
                        </div>
                    </div>
                    <div class="mt-8 border-t border-gray-200 pt-4">
                        <div class="flex justify-end">
                            <button type="button" id="cancelButton" class="mr-2 px-4 py-2 text-gray-700 hover:text-gray-900">Cancel</button>
                            <button type="submit" class="px-4 py-2 bg-[#04b2f7] text-white rounded-md hover:bg-[#0399d9] transition-colors">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
