import './bootstrap';

const searchInput = document.querySelector('input[name="search"]');
const athleteTableBody = document.querySelector('.divide-y.divide-gray-200 tbody');

if (searchInput && athleteTableBody) {
    searchInput.addEventListener('input', function() {
        const searchQuery = this.value;

        fetch(`/athletes?search=${searchQuery}`, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
            },
        })
        .then(response => response.text())
        .then(html => {
            // Assuming the server returns the filtered table body HTML
            // You might need to adjust this based on your server response structure
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            const newTableBody = doc.querySelector('.divide-y.divide-gray-200 tbody');
            if (newTableBody) {
                athleteTableBody.innerHTML = newTableBody.innerHTML;
            }
        })
        .catch(error => console.error('Error searching athletes:', error));
    });
}