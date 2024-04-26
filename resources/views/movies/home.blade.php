@extends('layouts.app')

@section('content')


<!-- <section id="mission" class="full-section _100vh nopad">



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

    </div> -->

<!-- </div> -->
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





    <!-- <script>




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




@endsection
