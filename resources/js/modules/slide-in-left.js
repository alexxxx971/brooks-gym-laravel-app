// 📦 File: js/modules/slide-in-left.js
// 🎯 Purpose: Slide in the heading from the left with optional delay

export function slideInLeft(selector = '#mst-heading', delay = 300) {
    const el = document.querySelector(selector);

    if (el) {
        el.classList.remove('animate-slide-in-left');
        void el.offsetWidth; // Force reflow

        setTimeout(() => {
            el.classList.add('animate-slide-in-left');
        }, delay);
    }
}
