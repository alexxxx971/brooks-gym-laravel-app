/**
 * 📦 File: reveal-background-on-load.js
 * 🎯 Purpose: Fades in a background section (with background-image and gradients) smoothly when the page loads
 * 🧠 Usage: Add `bg-hidden-state` to the section, and this script will replace it with `bg-loaded` after DOMContentLoaded
 */

export function revealBackgroundOnLoad(selector = '#audience-bg') {
    const bg = document.querySelector(selector);
    if (bg) {
        setTimeout(() => {
            bg.classList.remove('bg-hidden-state');
            bg.classList.add('bg-loaded');
        }, 50); // slight delay for smooth DOM readiness
    }
}
