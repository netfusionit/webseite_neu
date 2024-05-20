document.addEventListener("DOMContentLoaded", function () {
    // Show the modal on page load
    var infoModal = new bootstrap.Modal(document.getElementById('infoModal'), {});
    infoModal.show();

    // Breadcrumb dynamic generation
    var breadcrumb = document.getElementById('breadcrumb');
    var pathArray = window.location.pathname.split('/');
    var breadcrumbHTML = '<li class="breadcrumb-item"><a href="/">Home</a></li>';
    var path = '';

    for (var i = 1; i < pathArray.length; i++) {
        path += '/' + pathArray[i];
        if (i === pathArray.length - 1) {
            breadcrumbHTML += `<li class="breadcrumb-item active" aria-current="page">${pathArray[i]}</li>`;
        } else {
            breadcrumbHTML += `<li class="breadcrumb-item"><a href="${path}">${pathArray[i]}</a></li>`;
        }
    }

    breadcrumb.innerHTML = breadcrumbHTML;

    // Dark mode toggle
    var darkModeToggle = document.getElementById('darkModeToggle');
    darkModeToggle.addEventListener('click', function () {
        document.body.classList.toggle('dark-mode');
    });
});
