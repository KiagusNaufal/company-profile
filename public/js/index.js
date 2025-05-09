// resources/js/contact-modal.js
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('contactModal');
    const modalOverlay = document.getElementById('modalOverlay');
    const closeModal = document.getElementById('closeModal');
    const cancelButton = document.getElementById('cancelButton');
    const modalPanel = document.querySelector('#contactModal > div');
    const tellUsButtons = document.querySelectorAll('#tellUsButton, #tellUsButtonMobile');

    // Inisialisasi modal
    modalPanel.classList.add('translate-x-full');

    // Fungsi toggle modal
    function toggleModal(show) {
        if (show) {
            modal.classList.remove('hidden');
            setTimeout(() => {
                modalPanel.classList.remove('translate-x-full');
                modalPanel.classList.add('translate-x-0');
            }, 10);
        } else {
            modalPanel.classList.remove('translate-x-0');
            modalPanel.classList.add('translate-x-full');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }
    }

    // Event listeners untuk tombol Tell Us
    tellUsButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            toggleModal(true);
        });
    });

    // Event listeners untuk close modal
    closeModal.addEventListener('click', () => toggleModal(false));
    cancelButton.addEventListener('click', () => toggleModal(false));
    modalOverlay.addEventListener('click', () => toggleModal(false));

    // Form handling
    const form = document.querySelector('#contactModal form');
    const formAlert = document.getElementById('formAlert');

    if (form) {
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            
            const formData = new FormData(form);
            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'Accept': 'application/json'
                    }
                });

                if (response.ok) {
                    form.reset();
                    showAlert('Message sent successfully!', 'success');
                    setTimeout(() => toggleModal(false), 2000);
                } else {
                    showAlert('Oops! There was a problem sending your message.', 'error');
                }
            } catch (error) {
                showAlert('Network error. Please try again.', 'error');
            }
        });

        function showAlert(message, type) {
            formAlert.classList.remove('hidden');
            formAlert.textContent = message;
            formAlert.className = `p-4 rounded-lg ${
                type === 'success' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'
            }`;
            
            setTimeout(() => {
                formAlert.classList.add('hidden');
            }, 5000);
        }
    }
});