// 📦 File: js/modules/fade-video.js
// 🧠 Purpose: Fade in videos on scroll using IntersectionObserver
// 🧰 Always: Add `#video-id` and call this to fade in when visible

import { observeOnce } from '../utils/observer';
import { devLog } from '../utils/logger';

export function fadeVideo(selector) {
    observeOnce(selector, el => {
        devLog(`🎥 Video fade-in triggered: ${selector}`);
        el.classList.add('animate-fade-in-video');
    }, 0.4);
}
