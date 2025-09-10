document.addEventListener('DOMContentLoaded', () => {
    function toggleDropdown() {
        const dropdown = document.getElementById('userDropdown');
        dropdown.classList.toggle('hidden');
    }

    const toggleBtn = document.querySelector('.B2');
    if (toggleBtn) {
        toggleBtn.addEventListener('click', toggleDropdown);
    }
});
