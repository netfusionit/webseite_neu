// Dark Mode Toggle
document.getElementById('darkModeToggle').addEventListener('click', function () {
    document.body.classList.toggle('dark-mode');
    document.body.classList.toggle('light-mode');
});

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});
/*Info-Modal*/
document.addEventListener('DOMContentLoaded', function () {
    var welcomeModal = new bootstrap.Modal(document.getElementById('welcomeModal'), {
        keyboard: false
    });
    welcomeModal.show();
});