// mobile-menu.js
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const headerNavigation = document.querySelector('.header-navigation');
    
    if (mobileMenuToggle && headerNavigation) {
        mobileMenuToggle.addEventListener('click', function() {
            headerNavigation.classList.toggle('active');
            mobileMenuToggle.classList.toggle('active');
        });
        
        // Закрытие меню при клике на ссылку
        const menuLinks = headerNavigation.querySelectorAll('a');
        menuLinks.forEach(link => {
            link.addEventListener('click', () => {
                headerNavigation.classList.remove('active');
                mobileMenuToggle.classList.remove('active');
            });
        });
        
        // Закрытие меню при клике вне его области
        document.addEventListener('click', function(event) {
            if (!headerNavigation.contains(event.target) && !mobileMenuToggle.contains(event.target)) {
                headerNavigation.classList.remove('active');
                mobileMenuToggle.classList.remove('active');
            }
        });
    }
});