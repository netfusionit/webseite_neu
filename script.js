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

// Modal on Pageload
document.addEventListener('DOMContentLoaded', function () {
    var welcomeModal = new bootstrap.Modal(document.getElementById('welcomeModal'), {});
    welcomeModal.show();
});

// Animate on Scroll
window.addEventListener('scroll', () => {
    document.querySelectorAll('.animate-on-scroll').forEach(element => {
        if (element.getBoundingClientRect().top < window.innerHeight) {
            element.classList.add('animate__animated');
            element.classList.add('animate__fadeInUp');
        }
    });
});

// Fetch and display blog posts
document.addEventListener('DOMContentLoaded', function () {
    fetch('/api/blog')
        .then(response => response.json())
        .then(data => {
            const blogContainer = document.getElementById('blogPosts');
            data.forEach(post => {
                const postElement = document.createElement('div');
                postElement.classList.add('col-lg-4', 'mb-4');
                postElement.innerHTML = `
                    <div class="card border-0 shadow-sm">
                        <img src="${post.image}" class="card-img-top" alt="${post.title}">
                        <div class="card-body">
                            <h5 class="card-title">${post.title}</h5>
                            <p class="card-text">${post.excerpt}</p>
                            <a href="/blog/${post.id}" class="btn btn-primary">Weiterlesen</a>
                        </div>
                    </div>
                `;
                blogContainer.appendChild(postElement);
            });
        });
});

// Handle login form submission
document.getElementById('loginForm').addEventListener('submit', function (e) {
    e.preventDefault();
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    fetch('/api/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ email, password })
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = '/customer-portal';
            } else {
                alert('Login failed: ' + data.message);
            }
        });
});
