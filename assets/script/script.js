const propertyMainImage = document.querySelector('.lh__single-post-image .lh__property-figure img');
const propertyImageInCarousel = document.querySelectorAll('.lh__single-post-image .lh__property-picture-carousel img');

if (propertyMainImage && propertyImageInCarousel) {
    const fadeDuration = 300; // milliseconds
    propertyMainImage.style.transition = `opacity ${fadeDuration}ms`;
    propertyMainImage.style.opacity = 1;

    for (let i = 0; i < propertyImageInCarousel.length; i++) {
        propertyImageInCarousel[i].addEventListener('click', () => {
            const thumb = propertyImageInCarousel[i];
            const thumbSrc = thumb.getAttribute('src');
            if (!thumbSrc || propertyMainImage.getAttribute('src') === thumbSrc) return;

            // fade out
            propertyMainImage.style.opacity = 0;

            const onTransitionEnd = function (e) {
                if (e.propertyName !== 'opacity') return;
                propertyMainImage.removeEventListener('transitionend', onTransitionEnd);

                // copy common responsive attributes from the thumbnail
                const srcset = thumb.getAttribute('srcset');
                const sizes = thumb.getAttribute('sizes');
                const width = thumb.getAttribute('width');
                const height = thumb.getAttribute('height');
                const alt = thumb.getAttribute('alt');
                const decoding = thumb.getAttribute('decoding');
                const fetchpriority = thumb.getAttribute('fetchpriority');

                if (srcset !== null) propertyMainImage.setAttribute('srcset', srcset);
                else propertyMainImage.removeAttribute('srcset');

                if (sizes !== null) propertyMainImage.setAttribute('sizes', sizes);
                else propertyMainImage.removeAttribute('sizes');

                if (width !== null) propertyMainImage.setAttribute('width', width);
                else propertyMainImage.removeAttribute('width');

                if (height !== null) propertyMainImage.setAttribute('height', height);
                else propertyMainImage.removeAttribute('height');

                if (alt !== null) propertyMainImage.setAttribute('alt', alt);

                if (decoding !== null) propertyMainImage.setAttribute('decoding', decoding);
                else propertyMainImage.removeAttribute('decoding');

                if (fetchpriority !== null) propertyMainImage.setAttribute('fetchpriority', fetchpriority);
                else propertyMainImage.removeAttribute('fetchpriority');

                // swap src (use setAttribute to preserve relative paths)
                propertyMainImage.setAttribute('src', thumbSrc);

                // fade back in on next frame
                requestAnimationFrame(() => {
                    propertyMainImage.style.opacity = 1;
                });
            };

            propertyMainImage.addEventListener('transitionend', onTransitionEnd);
        });
    }

    // --- Hover zoom with pan effect ---
    (function addHoverZoom() {
        const zoomScale = 2;
        propertyMainImage.style.transform = 'scale(1)';

        // ensure transform transition is present alongside opacity
        const existingTransition = propertyMainImage.style.transition || '';
        const transformTransition = `transform ${fadeDuration}ms ease`;
        if (!existingTransition.includes('transform')) {
            propertyMainImage.style.transition = existingTransition ? `${existingTransition}, ${transformTransition}` : transformTransition;
        }

        function setOriginFromEvent(e) {
            const rect = propertyMainImage.getBoundingClientRect();
            const clientX = e.clientX !== undefined ? e.clientX : (e.touches && e.touches[0] && e.touches[0].clientX);
            const clientY = e.clientY !== undefined ? e.clientY : (e.touches && e.touches[0] && e.touches[0].clientY);
            if (clientX == null || clientY == null) return;
            const x = ((clientX - rect.left) / rect.width) * 100;
            const y = ((clientY - rect.top) / rect.height) * 100;
            propertyMainImage.style.transformOrigin = `${x}% ${y}%`;
        }

        propertyMainImage.addEventListener('mouseenter', (e) => {
            setOriginFromEvent(e);
            propertyMainImage.style.transform = `scale(${zoomScale})`;
        });

        propertyMainImage.addEventListener('mousemove', (e) => {
            setOriginFromEvent(e);
        });

        propertyMainImage.addEventListener('mouseleave', () => {
            propertyMainImage.style.transform = 'scale(1)';
            propertyMainImage.style.transformOrigin = 'center center';
        });

        // Touch support: toggle zoom on tap
        propertyMainImage.addEventListener('touchstart', (e) => {
            const scaled = propertyMainImage.style.transform && propertyMainImage.style.transform.includes(`scale(${zoomScale})`);
            if (scaled) {
                propertyMainImage.style.transform = 'scale(1)';
                propertyMainImage.style.transformOrigin = 'center center';
            } else {
                setOriginFromEvent(e);
                propertyMainImage.style.transform = `scale(${zoomScale})`;
            }
        }, { passive: true });
    })();

}