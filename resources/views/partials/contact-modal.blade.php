<div class="fixed inset-0 z-50 hidden" id="contactModal">
    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/20 backdrop-blur-sm transition-opacity duration-300" id="modalOverlay"></div>
    
    <!-- Panel -->
    <div class="fixed inset-y-0 right-0 w-full max-w-md">
        <div class="modal-panel h-full flex flex-col bg-white shadow-xl transform transition-transform duration-500 ease-[cubic-bezier(0.16,1,0.3,1)]">
            <!-- Header -->
            <div class="sticky top-0 z-10 px-6 py-5 bg-gradient-to-r from-[#04b2f7] to-[#0399d9]">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-white">Contact Us</h2>
                        <p class="mt-1 text-sm text-white/90">We'll respond within 24 hours</p>
                    </div>
                    <button id="closeModal" class="p-1.5 rounded-full hover:bg-white/20 transition-all">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Form -->
            <form class="flex-1 flex flex-col p-6 space-y-6 overflow-y-auto" action="https://formspree.io/f/xwpobgdw" method="POST">
                <div id="formAlert" class="hidden"></div>

                <div class="space-y-6">
                    <!-- Name -->
                    <div class="relative">
                        <input type="text" name="name" id="name" required 
                               class="w-full px-0 pt-5 pb-2 border-b-2 border-gray-200 bg-transparent focus:border-[#04b2f7] focus:outline-none peer transition-all">
                        <label for="name" class="absolute left-0 top-3 text-gray-500 peer-focus:text-[#04b2f7] peer-focus:scale-90 peer-focus:-translate-y-2.5 peer-valid:scale-90 peer-valid:-translate-y-2.5 transition-all duration-300 transform origin-left">
                            Full Name
                        </label>
                    </div>

                    <!-- Email -->
                    <div class="relative">
                        <input type="email" name="email" id="email" required
                               class="w-full px-0 pt-5 pb-2 border-b-2 border-gray-200 bg-transparent focus:border-[#04b2f7] focus:outline-none peer transition-all">
                        <label for="email" class="absolute left-0 top-3 text-gray-500 peer-focus:text-[#04b2f7] peer-focus:scale-90 peer-focus:-translate-y-2.5 peer-valid:scale-90 peer-valid:-translate-y-2.5 transition-all duration-300 transform origin-left">
                            Email Address
                        </label>
                    </div>

                    <!-- Message -->
                    <div class="relative pt-1">
                        <textarea id="message" name="message" rows="4" required
                                  class="w-full px-0 pt-7 pb-2 border-b-2 border-gray-200 bg-transparent focus:border-[#04b2f7] focus:outline-none peer resize-none transition-all"></textarea>
                        <label for="message" class="absolute left-0 top-3 text-gray-500 peer-focus:text-[#04b2f7] peer-focus:scale-90 peer-focus:-translate-y-2.5 peer-valid:scale-90 peer-valid:-translate-y-2.5 transition-all duration-300 transform origin-left">
                            Your Message
                        </label>
                    </div>
                </div>

                <!-- Footer -->
                <div class="mt-auto pt-6 border-t border-gray-100">
                    <div class="flex justify-end space-x-3">
                        <button type="button" id="cancelButton" 
                                class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#04b2f7] transition-all">
                            Cancel
                        </button>
                        <button type="submit" 
                                class="px-5 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-[#04b2f7] to-[#0399d9] rounded-lg hover:shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#04b2f7] transition-all flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Send Message
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>