document.addEventListener('DOMContentLoaded', () => {
    const featuredPageBoxes = document.querySelectorAll('.featured-page-box');
    const featuredPageBoxImagesMaxBlur = 2;

    featuredPageBoxes.forEach((featuredPageBox) => {
        const featuredPageBoxOffsetTop = featuredPageBox.getBoundingClientRect().top;
        const viewportHeight = document.documentElement.clientHeight;
        const featuredPageBoxImage = featuredPageBox.querySelector('.featured-page-box__image');

        if ((featuredPageBoxOffsetTop <= viewportHeight) &&
            (featuredPageBoxOffsetTop >= 0)) {
            const featuredPageBoxHeight = featuredPageBox.getBoundingClientRect().height;
            const scrolledPercentage = (featuredPageBoxOffsetTop - (featuredPageBoxHeight * .3)) / viewportHeight;

            featuredPageBoxImage.style.webkitFilter = `brightness(.7) blur(${featuredPageBoxImagesMaxBlur * (scrolledPercentage * .5)}rem)`;
        }
    });

    window.addEventListener('scroll', () => {
        featuredPageBoxes.forEach((featuredPageBox) => {
            const viewportHeight = document.documentElement.clientHeight;

            const featuredPageBoxOffsetTop = featuredPageBox.getBoundingClientRect().top;

            if ((featuredPageBoxOffsetTop <= viewportHeight) &&
                (featuredPageBoxOffsetTop >= 0)) {
                const featuredPageBoxHeight = featuredPageBox.getBoundingClientRect().height;
                const scrolledPercentage = (featuredPageBoxOffsetTop - (featuredPageBoxHeight * .3)) / viewportHeight;
                // const scrolledPercentage = featuredPageBoxOffsetTop / viewportHeight;
                const featuredPageBoxImage = featuredPageBox.querySelector('.featured-page-box__image');

                featuredPageBoxImage.style.webkitFilter = `brightness(.7) blur(${featuredPageBoxImagesMaxBlur * (scrolledPercentage * .5)}rem)`;
            }
        });
    });
});