// 📦 File: js/utils/observer.js

export function observeOnce(target, callback, threshold = 0.3) {
    const el = typeof target === 'string' ? document.querySelector(target) : target;

    if (!el) return;

    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                callback(entry.target);
                obs.unobserve(entry.target);
            }
        });
    }, { threshold });

    observer.observe(el);
}
