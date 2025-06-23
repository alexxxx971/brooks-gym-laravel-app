// 📦 File: js/modules/fade-heading.js
// 🧠 Animate multi-line headings like hero slogans or coach title/logo lines

import { observeOnce } from '../utils/observer';
import { devLog } from '../utils/logger';

export function fadeHeading(selector) {
    observeOnce(selector, el => {
        devLog(`🔠 Heading fade-in triggered: ${selector}`);

        // ✅ Fade in the main container first
        el.classList.remove('opacity-0');

        // 🔍 Target spans (for slogans) and .coach-hero-line (for custom elements)
// 🔍 Target spans and animated coach lines ONLY (but skip logo)
        const lines = el.querySelectorAll('span, .coach-hero-line:not(.no-animation-logo)');

        lines.forEach((line, i) => {
            line.classList.add('heading-line');
            line.style.animationDelay = `${0.5 * i}s`;
        });
    });
}
