document.addEventListener('DOMContentLoaded', () => {
    function toggleDropdown() {
    const dropdown = document.getElementById('userDropdown');
    dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
    }


    const toggleBtn = document.querySelector('.B2');
    if (toggleBtn) {
        toggleBtn.addEventListener('click', toggleDropdown);
    }
});
