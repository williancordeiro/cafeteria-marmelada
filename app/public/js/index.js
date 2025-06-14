document.addEventListener('DOMContentLoaded', function () {
  const toggleBtn = document.getElementById('mobileMenuBtn');
  const dropdown = document.getElementById('mobileDropdown');

    if (toggleBtn && dropdown) {
        toggleBtn.addEventListener('click', () => {
            dropdown.classList.toggle('show');
        });

    window.addEventListener('click', function (e) {
        if (!toggleBtn.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.classList.remove('show');
        }
    });
  }
});