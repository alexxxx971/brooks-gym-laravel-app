// 📦 File: js/modules/focus-expand.js
// 🧠 Purpose: Adds a blur-to-focus expand effect on scroll
// 🧰 Always: Target sections using `#id` and pair with `opacity-0` in HTML

import { observeOnce } from '../utils/observer';
import { devLog } from '../utils/logger';

export function focusExpand(selector) {
    observeOnce(selector, el => {
        devLog(`🎯 Focus-expand triggered: ${selector}`);
        el.classList.remove('opacity-0');
        el.classList.add('animate-focus-in-expand');
    });
}
