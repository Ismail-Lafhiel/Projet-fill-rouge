import './bootstrap';
import 'flowbite';


//hero slider
document.addEventListener("DOMContentLoaded", function () {
    const backgrounds = [
        'url("http://127.0.0.1:8000/storage/slider_imgs/morocco.jpg")',
        'url("http://127.0.0.1:8000/storage/slider_imgs/nyc.jpg")',
        'url("http://127.0.0.1:8000/storage/slider_imgs/pyramid.jpg")',
        'url("http://127.0.0.1:8000/storage/slider_imgs/maldives.jpg")',
        // Add more background image URLs here
    ];

    let currentBackgroundIndex = 0;
    const backgroundSlider = document.getElementById('background-slider');

    function changeBackground() {
        backgroundSlider.style.transition = "background-image 1s ease-in";
        backgroundSlider.style.backgroundImage = backgrounds[currentBackgroundIndex];
        currentBackgroundIndex = (currentBackgroundIndex + 1) % backgrounds.length;
    }

    setInterval(changeBackground, 5000);
});


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


// description and rooms toggle switch
document.addEventListener("DOMContentLoaded", function () {
    const descriptionTab = document.getElementById("descriptionTab");
    const roomsTab = document.getElementById("roomsTab");
    const descriptionSection = document.getElementById("descriptionSection");
    const roomsSection = document.getElementById("roomsSection");

    roomsTab.addEventListener("click", function () {
        // Hide description section and show rooms section
        descriptionSection.classList.add("hidden");
        roomsSection.classList.remove("hidden");

        // Update active tab styles
        descriptionTab.classList.remove("text-gray-800", "font-bold", "bg-gray-100", "border-b-2", "border-gray-800");
        roomsTab.classList.add("text-gray-800", "font-bold", "bg-gray-100", "py-3", "px-8", "border-b-2", "border-gray-800", "cursor-pointer", "transition-all");

        // Remove styles from inactive tab
        descriptionTab.classList.remove("text-gray-400");
    });

    descriptionTab.addEventListener("click", function () {
        // Hide rooms section and show description section
        roomsSection.classList.add("hidden");
        descriptionSection.classList.remove("hidden");

        // Update active tab styles
        roomsTab.classList.remove("text-gray-800", "font-bold", "bg-gray-100", "border-b-2", "border-gray-800");
        descriptionTab.classList.add("text-gray-800", "font-bold", "bg-gray-100", "py-3", "px-8", "border-b-2", "border-gray-800", "cursor-pointer", "transition-all");

        // Remove styles from inactive tab
        roomsTab.classList.remove("text-gray-400");
    });
});

// hotel bookmark
document.querySelectorAll('.bookmark-btn').forEach(button => {
    button.addEventListener('click', function () {
        const hotelId = this.dataset.hotelId;
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch(`/hotels/${hotelId}/bookmark`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        }).then(response => {
            if (response.ok) {
                // console.log('Hotel bookmarked successfully');
            } else {
                // console.error('Failed to bookmark hotel');
            }
        }).catch(error => {
            console.error('Error occurred while bookmarking hotel:', error);
        });
    });
});
