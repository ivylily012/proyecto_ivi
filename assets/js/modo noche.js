function toggleNightMode() {
    document.body.classList.toggle('night-mode');
    document.querySelector('.navbar').classList.toggle('night-mode');
    document.querySelectorAll('.card').forEach(card => card.classList.toggle('night-mode'));
    document.querySelectorAll('.navbar-brand, .btn-dark, .btn-primary, .card-title, .card-text, .navbar-nav .nav-link, .nav-item').forEach(element => {
        element.classList.toggle('night-mode-text');
    });
}
