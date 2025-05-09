document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('contactModal');
    const modalOverlay = document.getElementById('modalOverlay');
    const modalPanel = document.querySelector('#contactModal .modal-panel');
    const tellUsButtons = document.querySelectorAll('#tellUsButton, #tellUsButtonMobile');

    // Initialize
    modalPanel.style.transform = 'translateX(100%)';
    modalOverlay.style.opacity = '0';
    modalOverlay.style.pointerEvents = 'none';

    // Smooth toggle function
    function toggleModal(show) {
        if (show) {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            
            // Force reflow to ensure animation runs
            void modal.offsetWidth;
            
            modalOverlay.style.pointerEvents = 'auto';
            modalOverlay.style.opacity = '1';
            modalPanel.style.transform = 'translateX(0)';
        } else {
            modalPanel.style.transform = 'translateX(100%)';
            modalOverlay.style.opacity = '0';
            modalOverlay.style.pointerEvents = 'none';
            
            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.style.overflow = '';
            }, 500); // Match CSS transition duration
        }
    }

    // Event listeners
    tellUsButtons.forEach(btn => btn.addEventListener('click', (e) => {
        e.preventDefault();
        toggleModal(true);
    }));

    document.getElementById('closeModal').addEventListener('click', () => toggleModal(false));
    document.getElementById('cancelButton').addEventListener('click', () => toggleModal(false));
    modalOverlay.addEventListener('click', () => toggleModal(false));

    // Form handling
    const form = document.querySelector('#contactModal form');
    if (form) {
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            
            const formAlert = document.getElementById('formAlert');
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
            
            formAlert.textContent = 'Sending message...';
            formAlert.className = 'px-4 py-3 rounded-lg bg-blue-50 text-blue-700 border-l-4 border-blue-500';
            formAlert.classList.remove('hidden');
            
            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: new FormData(form),
                    headers: { 'Accept': 'application/json' }
                });

                if (response.ok) {
                    form.reset();
                    showAlert('Message sent successfully!', 'success');
                    setTimeout(() => toggleModal(false), 1500);
                } else {
                    showAlert('Failed to send message. Please try again.', 'error');
                }
            } catch (error) {
                showAlert('Network error. Please check your connection.', 'error');
            } finally {
                // Reset button state
                submitButton.disabled = false;
                submitButton.innerHTML = originalButtonText;
            }
        });
    }


    function showAlert(message, type) {
        const formAlert = document.getElementById('formAlert');
        formAlert.textContent = message;
        formAlert.className = `px-4 py-3 rounded-lg border-l-4 ${
            type === 'success' 
                ? 'bg-green-50 text-green-700 border-green-500' 
                : 'bg-red-50 text-red-700 border-red-500'
        } transition-all`;
        
        formAlert.classList.remove('hidden', 'opacity-0');
        formAlert.classList.add('opacity-100');
        
        setTimeout(() => {
            formAlert.classList.add('opacity-0');
            setTimeout(() => formAlert.classList.add('hidden'), 300);
        }, 5000);
    }
});