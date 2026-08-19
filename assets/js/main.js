document.addEventListener('DOMContentLoaded', () => {

    /*
     * Scroll Reveal
     */

    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };

    const scrollObserver = new IntersectionObserver(
        (entries, observer) => {

            entries.forEach(entry => {

                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }

            });

        },
        observerOptions
    );

    document
        .querySelectorAll('.reveal-on-scroll')
        .forEach(element => {
            scrollObserver.observe(element);
        });


    /*
     * Back To Top
     */

    const backToTop = document.getElementById('back-to-top');

if (backToTop) {

    const toggleBackToTop = () => {

        if (window.scrollY > 500) {
            backToTop.classList.add('is-visible');
        } else {
            backToTop.classList.remove('is-visible');
        }

    };

    window.addEventListener(
        'scroll',
        toggleBackToTop,
        { passive: true }
    );

    backToTop.addEventListener('click', () => {

        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });

    });

    toggleBackToTop();
}

});