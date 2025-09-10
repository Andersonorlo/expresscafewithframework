console.log('dashboard.js cargado');
document.addEventListener('DOMContentLoaded', function () {
  const button = document.querySelector('.user-button');
  const dropdown = document.getElementById('userDropdown');

  if (!button || !dropdown) return;

  button.addEventListener('click', function (e) {
    e.stopPropagation();
    dropdown.classList.toggle('hidden');
  });

  document.addEventListener('click', function (e) {
    if (!dropdown.contains(e.target) && !button.contains(e.target)) {
      dropdown.classList.add('hidden');
    }
  });

  dropdown.addEventListener('click', function (e) {
    e.stopPropagation();
  });
});
