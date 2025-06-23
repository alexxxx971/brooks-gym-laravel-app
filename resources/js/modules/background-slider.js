// 📦 File: js/modules/background-slider.js
// 🧠 Purpose: Auto-play background slider for `.slide` elements
// 🧰 Always: Use for hero or full-width image/video sliders with `.slide` class

import { devLog } from '../utils/logger';

export function initBackgroundSlider(slideSelector, delay = 5000) {
    const slides = document.querySelectorAll(slideSelector);
    let current = 0;
    if (slides.length > 0) {
        devLog('🎞️ Background slider started');
        slides[current].classList.add('opacity-100');
        setInterval(() => {
            slides[current].classList.remove('opacity-100');
            current = (current + 1) % slides.length;
            slides[current].classList.add('opacity-100');
        }, delay);
    }
}
