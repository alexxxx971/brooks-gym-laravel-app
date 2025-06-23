export function devLog(...args) {
    if (import.meta.env.MODE !== 'production') {
        console.log('%c[🛠️ DEV]', 'color: orange; font-weight: bold;', ...args);
    }
}
