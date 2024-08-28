function toggleNightMode() {
    document.body.classList.toggle('night-mode');
    document.querySelectorAll('.card').forEach(card => card.classList.toggle('night-mode'));
    document.querySelectorAll('.text-dark').forEach(element => element.classList.toggle('night-mode-text'));
}

function searchProfiles() {
    let input = document.getElementById('searchInput').value.toLowerCase();
    let cards = document.querySelectorAll('.profile-card');

    cards.forEach(card => {
        let category = card.getAttribute('data-category').toLowerCase();
        let name = card.querySelector('.card-title').textContent.toLowerCase();s
        let description = card.querySelector('.card-text').textContent.toLowerCase();

        if (category.includes(input) || name.includes(input) || description.includes(input)) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}