// 📦 File: js/app.js
// 🧠 Purpose: Main entry point to initialize shared JS functionality

// ----------------------------------------
// 🔌 Bootstrap logic
// ----------------------------------------
import './bootstrap';

// ----------------------------------------
// ⚙️ Alpine.js Setup
// ----------------------------------------
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

// ----------------------------------------
// ✨ Feature Modules (Reusable)
// ----------------------------------------
import { fadeParagraph } from './modules/fade-paragraph';
import { fadeVideo } from './modules/fade-video';
import { fadeHeading } from './modules/fade-heading';
import { initBackgroundSlider } from './modules/background-slider';
import { focusExpand } from './modules/focus-expand';
import { revealBackgroundOnLoad } from './modules/reveal-background-on-load';
import { fadeInCards } from './modules/fade-in-cards';
import { animateHeroSection } from './modules/hero-animate';
import { initScrollAnimations } from './modules/scroll-animations';
import { fadeContact } from './modules/fade-contact';

// ✅ MST / Gallery Animations
import { slideInLeft } from './modules/slide-in-left';
import { slideInRight } from './modules/slide-in-right';
import { flipInHorBottom } from './modules/flip-in-hor-bottom';
import { scaleUpVerTop } from './modules/scale-up-ver-top';

// 🧠 Load custom video replay behavior
import './modules/video-replay';


// 🧠 Make functions globally available (e.g. for Alpine use)
window.slideInLeft = slideInLeft;
window.slideInRight = slideInRight;
window.flipInHorBottom = flipInHorBottom;

// ----------------------------------------
// 🚀 Init Animations on DOM Load
// ----------------------------------------
document.addEventListener('DOMContentLoaded', () => {
    // ✅ General Content Animations
    fadeParagraph('#welcome-about-paragraph');
    fadeParagraph('#about-paragraph');
    fadeParagraph('#jannie-bio');
    fadeParagraph('#adri-bio');
    fadeVideo('#about-video');
    fadeHeading('#welcome-about-heading');
    fadeHeading('#about-heading');
    fadeHeading('#jannie-hero-group');
    fadeHeading('#adri-hero-group');

    // ✅ Coach Titles
    document.querySelectorAll('.coach-heading').forEach(el => {
        fadeHeading(el);
    });

    // ✅ UI Enhancements
    initBackgroundSlider('.slide');
    focusExpand('#audience-heading');
    revealBackgroundOnLoad('#audience-bg');
    fadeInCards('.card-group');
    animateHeroSection();
    initScrollAnimations();
    fadeContact('#contact-wrapper');

    // ✅ Initial Gallery Animations (on scroll or first load)
    scaleUpVerTop('.training-gallery-img');
    slideInLeft('#gallery-heading', 0);
    slideInRight('#gallery-paragraph', 100);

    // ✅ MST Carousel Scroll Animation (Once when visible)
    const mstHeading = document.querySelector('#mst-heading');
    const mstParagraph = document.querySelector('#mst-paragraph');

    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                slideInLeft('#mst-heading', 200);
                slideInRight('#mst-paragraph', 600);
                obs.disconnect(); // 🔁 Only once
            }
        });
    }, {
        threshold: 0.3,
    });

    if (mstHeading && mstParagraph) {
        observer.observe(mstHeading);
    }

// ✅ MST Text Animation on Carousel Arrows (Live Interactions)
    document.querySelectorAll('[data-cy="carousel-next"], [data-cy="carousel-prev"]').forEach(button => {
        button.addEventListener('click', () => {
            const heading = document.querySelector('#mst-heading');
            const paragraph = document.querySelector('#mst-paragraph');

            if (heading) {
                heading.classList.remove('animate-slide-in-left');
                void heading.offsetWidth;
                heading.classList.add('animate-slide-in-left');
            }

            if (paragraph) {
                paragraph.classList.remove('animate-slide-in-right');
                void paragraph.offsetWidth;
                paragraph.classList.add('animate-slide-in-right');
            }

            // ✅ NO need for video logic anymore (handled by Alpine)
        });
    });


    // ✅ Training Gallery Text Animation on Slide Change
    const galleryAnimateText = () => {
        slideInLeft('#gallery-heading', 0);
        slideInRight('#gallery-paragraph', 100);
    };

    const updateGalleryOnClick = (selector) => {
        document.querySelectorAll(selector).forEach(btn => {
            btn.addEventListener('click', () => {
                requestAnimationFrame(() => {
                    galleryAnimateText();
                });
            });
        });
    };

    updateGalleryOnClick('.carousel-btn'); // Arrows
    updateGalleryOnClick('[title^="Go to slide"]'); // Dots
});
