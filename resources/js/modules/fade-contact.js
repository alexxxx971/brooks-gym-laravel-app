// 📦 File: resources/js/modules/fade-contact.js
import { observeOnce } from '../utils/observer';

export function fadeContact(selector) {
    observeOnce(selector, el => {
        el.classList.remove('opacity-0');
        el.classList.add('animate-scale-in-bottom');
    });
}
