// 📦 File: js/modules/slide-in-right.js
// 🎯 Purpose: Slide in the paragraph from the right with optional delay

export function slideInRight(selector = '#mst-paragraph', delay = 300) {
    const el = document.querySelector(selector);

    if (el) {
        el.classList.remove('animate-slide-in-right');
        void el.offsetWidth; // Force reflow

        setTimeout(() => {
            el.classList.add('animate-slide-in-right');
        }, delay);
    }
}
