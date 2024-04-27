@extends('layouts.app')

@section('content')


<section id="mission" class="full-section _100vh nopad">



<div class="flexv h100">

    <div data-w-id="4c1d23d0-da24-682a-478f-5854eff80c83" class="max20vh  ">





        @foreach($upperGalleryImages as $image)

        <img src="{{ asset('image/upper/' . $image) }}" loading="lazy" sizes="(max-width: 479px) 30vw, 25vw"
             class="max25" style="will-change: transform; transform: translate3d(-170%, 0px, 0px) scale3d(1, 1, 1)
 rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;"
             alt="Gallery Image">

        @endforeach
    </div>
    <div class="filmreelsectioncontent">

        <div class="centeredcontent">


            <div class="ImageVideoCarousel_carouselCon__jaPvM">
                <div class="ImageVideoCarousel_overlayBorder__yN6tN">
                    <div class="ImageVideoCarousel_carouselWrap___L6yE">
                        <div class="ImageVideoCarousel_sfWrap__SFWnc">
                            <div>
                                <img src="https://assetscdn1.paytm.com/images/catalog/view_item/2572723/1710834731786.jpg?format=webp&amp;imwidth=500" decoding="sync" loading="eager" class="bgImg" width="500" height="100%" alt="">
                            </div>
                        </div>
                        <div class="ImageVideoCarousel_sfWrap__SFWnc">
                            <div>
                                <img decoding="async" class="bgImg" width="500" height="100%" fetchpriority="auto" alt="" src="https://assetscdn1.paytm.com/images/catalog/view_item/2586826/1711174722268.jpg?format=webp&amp;imwidth=500">
                            </div>
                        </div>
                        <div class="ImageVideoCarousel_sfWrap__SFWnc">
                            <div>
                                <img decoding="async" class="bgImg" width="500" height="100%" fetchpriority="auto" alt="" src="https://assetscdn1.paytm.com/images/catalog/view_item/2592470/1711698402246.jpg?format=webp&amp;imwidth=500">
                            </div>
                        </div>
                        <div class="ImageVideoCarousel_sfWrap__SFWnc">
                            <div>
                                <img decoding="async" class="bgImg" width="500" height="100%" fetchpriority="auto" alt="" src="https://assetscdn1.paytm.com/images/catalog/view_item/2573052/1710850133656.jpg?format=webp&amp;imwidth=500">
                            </div>
                        </div>
                    </div>
                    <div class="ImageVideoCarousel_dotsWrap__7ld_K">
                        <div class="ImageVideoCarousel_dot__rFKhv">

                        </div>
                        <div class="ImageVideoCarousel_dot__rFKhv">

                        </div>
                        <div class="ImageVideoCarousel_dot__rFKhv">

                        </div>
                        <div class="ImageVideoCarousel_dot__rFKhv ImageVideoCarousel_active__nu46Q">

                        </div>
                    </div>
                    <div class="">

                    </div>
                </div>
            </div>





        </div>
        <div class="texture paper on-dark">

        </div>
    </div>
    <div data-w-id="01e3cd60-2e06-862c-5746-f9dffc2ec7d8" class="max20vh gallery-strip bottomline">


        @foreach($lowerGalleryImages as $image)

        <img src="{{ asset('image/lower/' . $image) }}" loading="lazy"
             sizes="(max-width: 479px) 30vw, 25vw"  class="max25"
             style="will-change: transform; transform: translate3d(10%, 0px, 0px)
     scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;"
             alt="Gallery Image">

        @endforeach

    </div> 

<!-- </div>
</section>
    <section id="filter" class="w-full p-6 max-w-7xl mx-auto lg:p-8">
        <div class="flex flex-col lg:flex-row justify-center">
            <div class="w-full lg:w-1/2 lg:p-2 mb-4 lg:mb-0">
                <x-sort />
            </div>
            <div class="w-full lg:w-1/2 lg:pl-2">
                <x-search />
            </div>
        </div>
    </section>

    <section id="movie-list" class="p-6 mx-auto max-w-7xl lg:p-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($movies as $movie)
                <x-movie-card :movie="$movie" />
            @endforeach
        </div>

        <div class="my-6">
            {{ $movies->appends(request()->only('sort'))->links() }}
        </div>
    </section>





   




document.addEventListener('DOMContentLoaded', function() {
    let lastScrollPosition = 0;
    let initialPositions = {};

    window.addEventListener('scroll', function() {
        const currentScrollPosition = window.pageYOffset || document.documentElement.scrollTop;
        const scrollDirection = currentScrollPosition > lastScrollPosition ? 'down' : 'up';
        lastScrollPosition = currentScrollPosition;

        // Animating visible images in the upper and lower galleries
        animateGallery('.max20vh:not(.bottomline) img', scrollDirection, initialPositions, 'upper', 10);
        animateGallery('.max20vh.bottomline img', scrollDirection, initialPositions, 'lower', -10);

        // Animating hidden images
        animateHiddenImages('.gallery-item.hidden img', scrollDirection, initialPositions, 'hidden_upper', 10, 'left');
        animateHiddenImages('.gallery-item.hidden img', scrollDirection, initialPositions, 'hidden_lower', -10, 'right');
    });
});

function animateGallery(selector, scrollDirection, positions, prefix, offset) {
    document.querySelectorAll(selector).forEach((img, index) => {
        let key = `${prefix}_${index}`;
        if (!positions[key]) {
            let match = getComputedStyle(img).transform.match(/matrix\((.+)\)/);
            positions[key] = match ? parseFloat(match[1].split(', ')[4]) : 0;
        }
        let newPosition = positions[key] + (scrollDirection === 'down' ? offset : -offset);
        img.style.transform = `translate3d(${newPosition}px, 0px, 0px)`;
    });
}

function animateHiddenImages(selector, scrollDirection, positions, prefix, offset, side) {
    document.querySelectorAll(selector).forEach((img, index) => {
        let key = `${prefix}_${index}`;
        if (!positions[key]) {
            positions[key] = side === 'left' ? -100 : 100; // Starting from -100% (left) or 100% (right)
        }
        // Depending on the direction, either move towards the center or away from it
        let newPosition = scrollDirection === 'down' ? positions[key] + offset : positions[key] - offset;
        // Ensure the position is within bounds (-100 to 100)
        newPosition = Math.min(100, Math.max(-100, newPosition));
        positions[key] = newPosition;
        img.style.transform = `translate3d(${newPosition}%, 0px, 0px)`;
    });
}



document.addEventListener('DOMContentLoaded', (event) => {
    const carouselWrap = document.querySelector('.ImageVideoCarousel_carouselWrap___L6yE');
    const slides = document.querySelectorAll('.ImageVideoCarousel_sfWrap__SFWnc');
    const totalSlides = slides.length;
    let autoSlideTimer; // Timer for auto-sliding

    // Clone first and last slides
    const firstSlideClone = slides[0].cloneNode(true);
    const lastSlideClone = slides[totalSlides - 1].cloneNode(true);
    carouselWrap.appendChild(firstSlideClone);
    carouselWrap.insertBefore(lastSlideClone, slides[0]);

    let index = 1; // Start from the first original slide (not a clone)

    // Function to go to a specific slide
    function goToSlide(slideIndex) {
        const slideWidth = slides[0].getBoundingClientRect().width;
        carouselWrap.scrollLeft = slideWidth * slideIndex;
        index = slideIndex;

        if (index === totalSlides + 1) { // After the last slide's clone
            index = 1; // Reset to the first original slide
            carouselWrap.scrollTo({left: slideWidth, behavior: 'instant'});
        } else if (index === 0) { // Before the first slide's clone
            index = totalSlides; // Move to the last original slide
            carouselWrap.scrollTo({left: slideWidth * totalSlides, behavior: 'instant'});
        }

        updateDots();
    }

    // Function to update the navigation dots
    function updateDots() {
        const dots = document.querySelectorAll('.ImageVideoCarousel_dot__rFKhv');
        dots.forEach(dot => dot.classList.remove('ImageVideoCarousel_active__nu46Q'));
        // Adjust the index for the dots since there's an extra (clone) slide at the beginning
        dots[(index - 1) % totalSlides].classList.add('ImageVideoCarousel_active__nu46Q');
    }

    // Function to initialize or reset automatic slide change
    function initializeAutoSlide() {
        clearInterval(autoSlideTimer); // Clear existing timer
        autoSlideTimer = setInterval(() => {
            if (index === totalSlides - 1) {
                index = 0;
            } else {
                index++;
            }
            goToSlide(index);
        }, 3000); // Change slide every 3 seconds
    }

    // Detect user interaction to reset auto-slide timer
    function onUserInteraction() {
        initializeAutoSlide(); // Reset the timer on user interaction
    }

    // Add event listeners for user interaction
    carouselWrap.addEventListener('scroll', onUserInteraction);

    // Initialize the position to the first original slide (skipping the first clone)
    carouselWrap.scrollTo({left: slides[0].getBoundingClientRect().width, behavior: 'instant'});
    initializeAutoSlide(); // Initialize auto-sliding
});


</script> -->




<style>
    .gallery-strip,.galartstrip {
        /* existing styles */
        position: relative; /* This ensures that the z-index is applied correctly. */
        z-index: 1; /* Raise the z-index to ensure the shadow is above other elements. */
        box-shadow: 0 -8px 15px rgba( 0, 0, 0.6), /* Shadow above */
        0 -8px 15px rgba(, 0, 0, 0.6); /* Shadow below */
       /* Add some space above the strip for the top shadow to be visible. */
        margin-bottom: 10px; /* Add some space below the strip for the bottom shadow to be visible. */
    }
    .galartstrip
    {
        /* existing styles */
        position: relative; /* This ensures that the z-index is applied correctly. */
        z-index: 1; /* Raise the z-index to ensure the shadow is above other elements. */
        box-shadow: 0 -8px 15px rgba(, 0, 0, 0.6), /* Shadow above */
        0 -8px 15px rgba(, 0, 0, 0.6); /* Shadow below */
        /* Add some space above the strip for the top shadow to be visible. */
         /* Add some space below the strip for the bottom shadow to be visible. */
    }






    element.style {
    }
    @media screen and (max-width: 991px)
    .full-section._100vh.nopad {
        height: auto;
    }
    .full-section._100vh.nopad, .full-section.nopad {
        padding: 0;
    }
    .full-section._100vh {
        height: 100vh;
        min-height: auto;
        justify-content: center;
        align-items: center;
        display: flex;
    }
    .full-section {
        min-height: 100vh;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        padding: 64px;
        display: flex;
        position: relative;
    }
    article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary {
        display: block;
    }
    * {
        box-sizing: border-box;
    }
    user agent stylesheet
    section {
        display: block;
        unicode-bidi: isolate;
    }
    @media screen and (max-width: 991px)
    body {
        font-size: 16px;
    }
    body {
        background-color: var(--black-2);
        color: #fff;
        font-family: europa, sans-serif;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.7;
    }
    body {
        min-height: 100%;
        color: #333;
        background-color: #fff;
        margin: 0;
        font-family: Arial, sans-serif;
        font-size: 14px;
        line-height: 20px;
    }
    :root {
        --black-2: #00151e;
        --white: white;
        --dark-bg: #202020;
        --light-bg: #c7cfd0;
        --dark-accent: #2b2b2b;
        --dark-goldenrod: #9d8743;
        --midnight-blue: #1c2c33;
        --cardoutline: #d6d7df;
        --maroon-2: #580719;
        --saddle-brown: #644b00;
        --brown: #961e38;
        --brand-2: #ebbc30;
        --black: black;
        --alert: #eb4949;
        --lime-green: #00bb54;
        --brand: #002b77;
        --light-accent: #9be5ef;
        --shadow-a24: rgba(0, 0, 0, .24);
        --shadow-a12: rgba(0, 0, 0, .12);
        --black-3: #1d1d1d;
        --maroon: #6c0000;
        --dark-goldenrod-2: #8d6a00;
        --dark-slate-grey: #42474c;
        --whitebg: #fafafa;
        --dark-grey: #a0a8ab;
        --black-4: #0e1419;
        --ivory: #f4f2e4;
        --midnight-blue-2: #1c2c33;
    }
    html {
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%;
        font-family: sans-serif;
    }



    filmreelsectioncontent {
        z-index: 1;
        border-top: 8px solid var(--dark-goldenrod);
        border-bottom: 8px solid var(--dark-goldenrod);
        flex-direction: row;
        flex: 1;
        justify-content: center;
        align-self: stretch;
        align-items: center;
        display: flex;
        position: relative;
        box-shadow: inset 0 28px 50px rgba(0,0,0,.9), 0 0 50px #000;
    }
    .centeredcontent {
        z-index: 1;
        text-align: center;
        flex-direction: column;
        align-items: center;
        display: flex;
        position: relative;
    }

    /*.heading-2, .heading-3 {*/
    /*    font-size: 5rem;*/
    /*}*/
    .full-section._100vh {
        height: 100vh;
        min-height: auto;
        justify-content: center;
        align-items: center;
        display: flex;
    }

    .flexv {
        flex-direction: column;
        justify-content: space-between;
        display: flex;
    }




    /*.filmreelsectioncontent {*/
    /*    !* This will help ensure that the content scales down on smaller screens *!*/
    /*    text-align: center; !* Center the content for small screens *!*/
    /*}*/

    .heading-3 {
        font-size: 2.5rem; /* Adjust size as needed */
        margin: 0.5em 0; /* Give some space around the heading */
    }

    .subtitle1 {
        font-size: 1.5rem; /* Adjust size as needed */
        margin-bottom: 1em; /* Space after the subtitle */
    }

    .block-quote {
        font-size: 1rem; /* Adjust size as needed */
        margin-bottom: 1em; /* Space after the blockquote */
        padding: 0 1em; /* Padding for smaller screens */
        overflow-wrap: break-word; /* To prevent long words from breaking the layout */
    }

    .divider {
        margin: 1em auto; /* Center the divider and give space */
    }

    /* Responsive Styles */
    @media screen and (max-width: 991px) {
        .heading-3 {
            font-size: 2rem; /* Smaller font size on tablets */
        }

        .subtitle1 {
            font-size: 1.25rem;
        }

        .block-quote {
            font-size: 0.9rem;
        }
    }

    @media screen and (max-width: 767px) {
        .heading-3 {
            font-size: 1.5rem; /* Even smaller font size on mobile */
        }

        .subtitle1 {
            font-size: 1rem;
        }

        .block-quote {
            font-size: 0.8rem;
        }
    }

    @media screen and (max-width: 479px) {
        .heading-3,
        .subtitle1,
        .block-quote {
            padding: 0 10%; /* Add padding on the smallest screens to avoid text hitting the edges */
        }
    }






    .ImageVideoCarousel_carouselCon__jaPvM {
        overflow: hidden;
        position: relative;
        margin: 0 auto; /* Center the carousel */
        padding: 0 5%; /* Padding to ensure the side images are partially visible */
    }

    /* The wrapper for each individual item */
    .ImageVideoCarousel_carouselWrap___L6yE {
        display: flex;
        overflow-x: scroll;
        scroll-snap-type: x mandatory; /* Enable snapping */
        -ms-scroll-snap-type: x mandatory;
        -webkit-overflow-scrolling: touch; /* Smooth scrolling on iOS devices */
        gap: 20px; /* Gap between items */
        padding: 20px 0; /* Padding top and bottom */
    }

    /* Hide the scrollbar */
    .ImageVideoCarousel_carouselWrap___L6yE::-webkit-scrollbar {
        display: none;
    }

    /* The individual carousel item */
    .ImageVideoCarousel_sfWrap__SFWnc {
        flex: 0 0 auto; /* Use 'auto' for the flex-basis to handle variable widths */
        scroll-snap-align: center; /* Ensure the item snaps in the center */
        transition: transform 0.5s ease; /* Smooth transition for scaling */
        width: 80%; /* Adjust the width to fit the carousel container */
        margin-right: 10px; /* Right margin between items */
        margin-left: 10px; /* Left margin between items */
        position: relative; /* Needed for absolute positioning of pseudo-elements */
    }

    /* Styling for the images */
    .ImageVideoCarousel_sfWrap__SFWnc img {
        width: 100%; /* Full width of the parent container */
        height: auto; /* Maintain aspect ratio */
        object-fit: cover; /* Cover the area, may crop if necessary */
        border-radius: 10px; /* Slight border radius on all corners */
        box-shadow: 0 4px 6px rgba(0,0,0,0.1); /* Soft shadow for depth */
    }

    /* Pseudo-elements for gradient overlays */
    .ImageVideoCarousel_carouselCon__jaPvM::before,
    .ImageVideoCarousel_carouselCon__jaPvM::after {
        content: '';
        position: absolute;
        top: 0;
        height: 100%;
        pointer-events: none;
        z-index: 2;
        width: 50px; /* Fixed width for gradient overlays */
    }

    .ImageVideoCarousel_carouselCon__jaPvM::before {
        left: 0;
        background: linear-gradient(to right, rgba(0,0,0,0.5), transparent);
    }

    .ImageVideoCarousel_carouselCon__jaPvM::after {
        right: 0;
        background: linear-gradient(to left, rgba(0,0,0,0.5), transparent);
    }

    /* Media queries for responsive adjustments */
    @media (max-width: 1024px) {
        .ImageVideoCarousel_sfWrap__SFWnc {
            width: 85%; /* Adjust item width for better visibility on tablets */
        }
    }

    @media (max-width: 768px) {
        .ImageVideoCarousel_sfWrap__SFWnc {
            width: 90%; /* Adjust item width for better visibility on smaller tablets */
        }
    }

    @media (max-width: 480px) {
        .ImageVideoCarousel_sfWrap__SFWnc {
            width: 95%; /* Adjust item width for better visibility on mobile */
        }
    }

/* Assuming you want to keep the images always filling the space, regardless of direction */
@keyframes scrollRight {
  from { transform: translate3d(0, 0, 0); }
  to { transform: translate3d(-100%, 0, 0); }
}

@keyframes scrollLeft {
  from { transform: translate3d(0, 0, 0); }
  to { transform: translate3d(100%, 0, 0); }
}

/* Apply these styles to your upper and lower gallery images accordingly */
.max20vh img.scrolling-right {
  animation: scrollRight 60s linear infinite;
}

.max20vh.gallery-strip.bottomline img.scrolling-left {
  animation: scrollLeft 60s linear infinite;
}


</style>







<script>




    /* document.addEventListener('DOMContentLoaded', function() {
        let lastScrollPosition = 0;
        let initialPositions = {};

        window.addEventListener('scroll', function() {
            const currentScrollPosition = window.pageYOffset || document.documentElement.scrollTop;
            const scrollDirection = currentScrollPosition > lastScrollPosition ? 'down' : 'up';
            lastScrollPosition = currentScrollPosition;

            // Animating visible images in the upper and lower galleries
            animateGallery('.max20vh:not(.bottomline) img', scrollDirection, initialPositions, 'upper', 10);
            animateGallery('.max20vh.bottomline img', scrollDirection, initialPositions, 'lower', -10);

            // Animating hidden images
            animateHiddenImages('.gallery-item.hidden img', scrollDirection, initialPositions, 'hidden_upper', 10, 'left');
            animateHiddenImages('.gallery-item.hidden img', scrollDirection, initialPositions, 'hidden_lower', -10, 'right');
        });
    });

    function animateGallery(selector, scrollDirection, positions, prefix, offset) {
        document.querySelectorAll(selector).forEach((img, index) => {
            let key = `${prefix}_${index}`;
            if (!positions[key]) {
                let match = getComputedStyle(img).transform.match(/matrix\((.+)\)/);
                positions[key] = match ? parseFloat(match[1].split(', ')[4]) : 0;
            }
            let newPosition = positions[key] + (scrollDirection === 'down' ? offset : -offset);
            img.style.transform = `translate3d(${newPosition}px, 0px, 0px)`;
        });
    }

    function animateHiddenImages(selector, scrollDirection, positions, prefix, offset, side) {
        document.querySelectorAll(selector).forEach((img, index) => {
            let key = `${prefix}_${index}`;
            if (!positions[key]) {
                positions[key] = side === 'left' ? -100 : 100; // Starting from -100% (left) or 100% (right)
            }
            // Depending on the direction, either move towards the center or away from it
            let newPosition = scrollDirection === 'down' ? positions[key] + offset : positions[key] - offset;
            // Ensure the position is within bounds (-100 to 100)
            newPosition = Math.min(100, Math.max(-100, newPosition));
            positions[key] = newPosition;
            img.style.transform = `translate3d(${newPosition}%, 0px, 0px)`;
        });
    } */



    document.addEventListener('scroll', function() {
  // Get the current scroll position
  var scrollPosition = window.pageYOffset;

  // Get your image containers
  var upperGallery = document.querySelector('.max20vh'); // Adjust this selector to target your upper gallery
  var lowerGallery = document.querySelector('.max20vh.gallery-strip.bottomline'); // Adjust to target your lower gallery

  // Set the speed of the parallax effect
  var speed = 0.2;

  
  // Apply the transform based on the scroll position
  if (upperGallery) {
    upperGallery.style.transform = `translate3d(${scrollPosition * speed}%, 0, 0)`;
  }
  
  if (lowerGallery) {
    lowerGallery.style.transform = `translate3d(${-scrollPosition * speed}%, 0, 0)`;
  }
});











    document.addEventListener('DOMContentLoaded', (event) => {
        const carouselWrap = document.querySelector('.ImageVideoCarousel_carouselWrap___L6yE');
        const slides = document.querySelectorAll('.ImageVideoCarousel_sfWrap__SFWnc');
        const totalSlides = slides.length;
        let autoSlideTimer; // Timer for auto-sliding

        // Clone first and last slides
        const firstSlideClone = slides[0].cloneNode(true);
        const lastSlideClone = slides[totalSlides - 1].cloneNode(true);
        carouselWrap.appendChild(firstSlideClone);
        carouselWrap.insertBefore(lastSlideClone, slides[0]);

        let index = 1; // Start from the first original slide (not a clone)

        // Function to go to a specific slide
        function goToSlide(slideIndex) {
            const slideWidth = slides[0].getBoundingClientRect().width;
            carouselWrap.scrollLeft = slideWidth * slideIndex;
            index = slideIndex;

            if (index === totalSlides + 1) { // After the last slide's clone
                index = 1; // Reset to the first original slide
                carouselWrap.scrollTo({left: slideWidth, behavior: 'instant'});
            } else if (index === 0) { // Before the first slide's clone
                index = totalSlides; // Move to the last original slide
                carouselWrap.scrollTo({left: slideWidth * totalSlides, behavior: 'instant'});
            }

            updateDots();
        }

        // Function to update the navigation dots
        function updateDots() {
            const dots = document.querySelectorAll('.ImageVideoCarousel_dot__rFKhv');
            dots.forEach(dot => dot.classList.remove('ImageVideoCarousel_active__nu46Q'));
            // Adjust the index for the dots since there's an extra (clone) slide at the beginning
            dots[(index - 1) % totalSlides].classList.add('ImageVideoCarousel_active__nu46Q');
        }

        // Function to initialize or reset automatic slide change
        function initializeAutoSlide() {
            clearInterval(autoSlideTimer); // Clear existing timer
            autoSlideTimer = setInterval(() => {
                if (index === totalSlides - 1) {
                    index = 0;
                } else {
                    index++;
                }
                goToSlide(index);
            }, 3000); // Change slide every 3 seconds
        }

        // Detect user interaction to reset auto-slide timer
        function onUserInteraction() {
            initializeAutoSlide(); // Reset the timer on user interaction
        }

        // Add event listeners for user interaction
        carouselWrap.addEventListener('scroll', onUserInteraction);

        // Initialize the position to the first original slide (skipping the first clone)
        carouselWrap.scrollTo({left: slides[0].getBoundingClientRect().width, behavior: 'instant'});
        initializeAutoSlide(); // Initialize auto-sliding
    });


</script>





















@endsection
