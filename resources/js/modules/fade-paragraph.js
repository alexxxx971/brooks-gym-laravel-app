// 📦 File: js/modules/fade-paragraph.js
// 🧠 Purpose: Slide in paragraphs when they enter viewport
// 🧰 Always: Use on section text with `#id` selectors to animate with slide-in

import { slideInLeft } from '../animations/slideIn';
import { observeOnce } from '../utils/observer';
import { devLog } from '../utils/logger';

export function fadeParagraph(selector) {
    observeOnce(selector, el => {
        devLog(`📝 Paragraph fade-in triggered: ${selector}`);
        el.classList.remove('opacity-0');
        slideInLeft(el);
    });
}
