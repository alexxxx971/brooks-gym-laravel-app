// 📦 File: js/modules/scale-up-ver-top.js
// 🎯 Purpose: Animate training-gallery image from the top on scroll AND slide change

export function scaleUpVerTop(selector = '.training-gallery-img') {
    const animate = (el) => {
        el.classList.remove('animate-scale-up-ver-top');
        void el.offsetWidth; // 🔄 Reflow
        el.classList.add('animate-scale-up-ver-top');
    };

    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animate(entry.target);
                obs.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.3,
    });

    const elements = document.querySelectorAll(selector);
    elements.forEach(el => observer.observe(el));

    // ✅ Re-animate after Alpine updates DOM (nextTick)
    const triggerAnimationAfterDomUpdate = () => {
        requestAnimationFrame(() => {
            const el = document.querySelector(selector);
            if (el) animate(el);
        });
    };

    // ✅ Animate on arrow click
    document.querySelectorAll('.carousel-btn').forEach(button => {
        button.addEventListener('click', () => {
            triggerAnimationAfterDomUpdate();
        });
    });

    // ✅ Animate on dot click
    document.querySelectorAll('[title^="Go to slide"]').forEach(button => {
        button.addEventListener('click', () => {
            triggerAnimationAfterDomUpdate();
        });
    });
}
