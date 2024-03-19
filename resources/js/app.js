import './bootstrap';
import 'flowbite';
import Datepicker from 'flowbite-datepicker/Datepicker';

// delete functionality
document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('[data-modal-target="deleteModal"]');
    const deleteModal = document.getElementById('deleteModal');
    const deleteForm = document.getElementById('deleteForm');
    const deleteRecordIdInput = document.getElementById('deleteRecordId');
    const deleteConfirmButton = deleteModal.querySelector('.delete-confirm-button');

    deleteButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            const recordId = button.getAttribute('data-record-id');
            const deleteAction = button.getAttribute('data-action');

            deleteForm.action = deleteAction;
            deleteRecordIdInput.value = recordId;

            deleteModal.classList.remove('hidden');
        });
    });

    deleteForm.addEventListener('submit', function (e) {
        e.preventDefault();

        fetch(deleteForm.action, {
            method: 'POST',
            body: new FormData(deleteForm),
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    console.log(data.message);

                    const successMessage = document.getElementById('successMessage');
                    if (successMessage) {
                        successMessage.innerText = data.message;
                    }

                    location.reload();
                } else {
                    console.error(data.message);
                }
            })
            .catch(error => {
                console.error('Error deleting record:', error.message);
            })
            .finally(() => {
                deleteModal.classList.add('hidden');
            });
    });
});

// select photos by clicking:
document.addEventListener('DOMContentLoaded', function () {
    const thumbnailImages = document.querySelectorAll('.thumbnail');
    const featuredImage = document.getElementById('featuredImage');

    thumbnailImages.forEach(function (thumbnail) {
        thumbnail.addEventListener('click', function () {
            const thumbnailSrc = thumbnail.getAttribute('src');
            featuredImage.setAttribute('src', thumbnailSrc);
        });
    });
});