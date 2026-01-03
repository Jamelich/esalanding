// Универсальный скрипт для ЛЮБЫХ блоков
document.addEventListener('DOMContentLoaded', function () {
    // Находим ВСЕ секции с data-атрибутом анимации
    const animatedSections = document.querySelectorAll('[data-animate-on-scroll]');

    const observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                const section = entry.target;

                // Анимируем все элементы с data-animate внутри секции
                const animatedElements = section.querySelectorAll('[data-animate]');
                animatedElements.forEach(function (el, index) {
                    const delay = el.getAttribute('data-animate-delay') || index * 150;
                    setTimeout(function () {
                        el.classList.add('animated');
                    }, delay);
                });

                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.2 });

    animatedSections.forEach(function (section) {
        observer.observe(section);
    });
});
