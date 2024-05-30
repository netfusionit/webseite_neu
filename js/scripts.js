function showPopup(id) {
    document.getElementById(id).style.display = "block";
}

function closePopup(id) {
    document.getElementById(id).style.display = "none";
}

document.addEventListener('DOMContentLoaded', function() {
    var links = document.querySelectorAll('.nav-link');
    links.forEach(function(link) {
        link.addEventListener('click', function() {
            links.forEach(function(link) {
                link.classList.remove('active');
            });
            this.classList.add('active');
        });
    });
});
