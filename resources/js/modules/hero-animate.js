// 📦 File: js/modules/hero-animate.js
// 🎯 Purpose: Animate the entire Hero section (logo, heading spans, paragraph, button) when it enters the viewport

import { fadeParagraph } from './fade-paragraph';

export function animateHeroSection(selector = '#hero-section') {
    const hero = document.querySelector(selector);
    if (!hero) return;

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // 🌀 Animate logo
                const logo = document.getElementById('hero-logo');
                logo?.classList.add('animate-slide-in-right', 'delay-100');

                // 🔠 Animate each span line in slogan
                const spans = hero.querySelectorAll('h1 span');
                spans.forEach((span, i) => {
                    span.classList.add('animate-slide-in-right');
                    span.style.animationDelay = `${0.3 + i * 0.2}s`;
                });

                // 📝 Animate paragraph using existing utility
                fadeParagraph('#hero-description');

                // 🔘 Animate CTA button wrapper
                const btnWrapper = hero.querySelector('.btn-outline-white')?.parentElement;
                if (btnWrapper) {
                    btnWrapper.classList.add('animate-slide-in-right', 'delay-200');
                }

                // 🔁 Run only once
                observer.unobserve(hero);
            }
        });
    }, { threshold: 0.3 });

    observer.observe(hero);
}
