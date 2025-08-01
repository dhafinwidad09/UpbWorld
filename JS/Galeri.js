// File: JS/Galeri.js
document.addEventListener('DOMContentLoaded', function () {
    console.log('Galeri.js loaded - DOM fully loaded');

    // Get all elements needed
    const photoBtn = document.querySelector('.switch-btn[data-content="album"]');
    const videoBtn = document.querySelector('.switch-btn[data-content="videos"]');
    const albumContent = document.querySelector('.album'); // Using class selector
    const videosContent = document.getElementById('videos');

    // Debug: Check if elements exist
    console.log('Elements:', {
        photoBtn,
        videoBtn,
        albumContent,
        videosContent
    });

    // Hide videos content initially (if not already hidden via CSS)
    if (videosContent) {
        videosContent.style.display = 'none';
    }

    // Function to switch between tabs
    function switchTab(showContent, hideContent, activeBtn, inactiveBtn) {
        // Hide all content sections
        if (albumContent) albumContent.style.display = 'none';
        if (videosContent) videosContent.style.display = 'none';

        // Remove active class from all buttons
        if (photoBtn) photoBtn.classList.remove('active');
        if (videoBtn) videoBtn.classList.remove('active');

        // Show selected content and set active button
        if (showContent) showContent.style.display = 'block';
        if (activeBtn) activeBtn.classList.add('active');
    }

    // Add event listeners if elements exist
    if (photoBtn && videoBtn) {
        photoBtn.addEventListener('click', function () {
            console.log('Photo button clicked');
            switchTab(albumContent, videosContent, photoBtn, videoBtn);
        });

        videoBtn.addEventListener('click', function () {
            console.log('Video button clicked');
            switchTab(videosContent, albumContent, videoBtn, photoBtn);
        });
    } else {
        console.error('Could not find one or both buttons');
    }

    // Initialize with photos shown
    if (albumContent) albumContent.style.display = 'block';
});
// Modal untuk semua gambar
document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("myModal");
    const modalImg = document.getElementById("img01");
    const captionText = document.getElementById("caption");
    

    const images = document.querySelectorAll(".img");
    images.forEach(img => {
        img.addEventListener("click", () => {
            modal.style.display = "block";
            modalImg.src = img.src;
            captionText.innerHTML = img.alt || "";
        });
    });
    const span = document.getElementsByClassName("close")[0];
    span.onclick = function () {
        modal.style.display = "none";
    };
    modal.onclick = function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    };
});

