document.addEventListener('DOMContentLoaded', function() {
    const swiperEl = document.querySelector('.about-company-swiper');
    
    if (swiperEl) {
        // Проверяем iOS устройство
        const isIOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
        const isMac = /Macintosh/.test(navigator.userAgent);
        
        const swiper = new Swiper(swiperEl, {
            // Базовые настройки
            direction: 'horizontal',
            loop: true,
            speed: 600,
            grabCursor: true,
            
            // Пагинация
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true,
            },
            
            // Навигация
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            
            // Автопрокрутка
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            
            // Адаптивность
            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetween: 0
                },
                768: {
                    slidesPerView: 1,
                    spaceBetween: 0
                }
            },
            
            // iOS специфичные настройки
            touchEventsTarget: 'container',
            touchRatio: 1,
            touchAngle: 45,
            simulateTouch: true,
            shortSwipes: true,
            longSwipes: true,
            longSwipesRatio: 0.5,
            longSwipesMs: 300,
            followFinger: true,
            threshold: 5,
            
            // iOS оптимизации
            edgeSwipeDetection: isIOS || isMac,
            edgeSwipeThreshold: 20,
            iOSEdgeSwipeDetection: isIOS,
            resistance: true,
            resistanceRatio: 0.85,
            
            // Эффекты перехода
            effect: 'slide',
            
            // Предзагрузка изображений для плавности
            preloadImages: true,
            updateOnImagesReady: true,
            
            // Lazy loading
            lazy: {
                loadPrevNext: true,
                loadPrevNextAmount: 2,
                loadOnTransitionStart: true,
            },
            
            // Keyboard навигация для macOS
            keyboard: {
                enabled: true,
                onlyInViewport: true,
            },
            
            // Mousewheel для macOS
            mousewheel: {
                forceToAxis: true,
                invert: false,
                thresholdDelta: 20,
                sensitivity: 1,
            },
            
            // Параллакс эффект
            parallax: true,
        });
        
        // Дополнительные оптимизации для iOS
        if (isIOS) {
            // Убираем rubber-band эффект в Safari
            document.body.style.overscrollBehaviorY = 'none';
            
            // Фикс для 120Hz ProMotion дисплеев
            swiper.params.speed = 400;
            
            // Включаем inertia на iOS
            swiper.params.freeMode = {
                enabled: true,
                momentum: true,
                momentumRatio: 1,
                momentumBounce: true,
                momentumBounceRatio: 1,
                minimumVelocity: 0.02,
                sticky: false
            };
        }
    }
});