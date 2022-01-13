/**
 * Add class on scroll for sticky header
 * @param {string} el - selector for adding an active class
 * @param {string} elClass - active class
 */

export function stickyHeader(el, elClass) {

    const $$header = document.querySelector(el);

    function onScroll() {
        if (window.pageYOffset > 100) {
            $$header.classList.add(elClass);
        } else {
            $$header.classList.remove(elClass);
        }
    }

    /* Throttling function for better performance */

    function throttle(fn, delay) {
        let last;
        let timer;

        return () => {
            const now = +new Date;
            if (last && now < last + delay) {
                clearTimeout(timer);
                timer = setTimeout(() => {
                    last = now;
                    fn();
                }, delay);
            } else {
                last = now;
                fn();
            }
        };
    }

    window.addEventListener('scroll', throttle(onScroll, 25));

}

