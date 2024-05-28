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
                    @foreach ($allMovies as $a2movie)
                <div class="ImageVideoCarousel_sfWrap__SFWnc">
                <div class="responsive-container">
                        <a href="{{ route('movies.show2', $a2movie->id) }}">
                            <img src="{{ Storage::url($a2movie->poster_url) }}" class="responsive-img" alt="{{ $a2movie->title }}">
                        </a>
                    </div>
                </div>
            @endforeach
                       
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


 


</section>


<style>
.ImageVideoCarousel_sfWrap__SFWnc {
    width: 500px;
    height: 250px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.responsive-img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    display: block;
    margin: 0 auto;
}
</style>
    

        <!-- Topbar Start -->
        <!-- <div class="container-fluid topbar d-none d-xl-block w-100">
            <div class="row gx-0 align-items-center" style="height: 45px;">
                <div class="col-lg-6 text-center text-lg-start mb-lg-0">
                    <div class="d-flex flex-wrap">
                        <a href="#" class="text-muted me-4"><i class="fas fa-map-marker-alt text-secondary me-2"></i>Find A Location</a>
                        <a href="#" class="text-muted me-4"><i class="fas fa-phone-alt text-secondary me-2"></i>+01234567890</a>
                        <a href="#" class="text-muted me-0"><i class="fas fa-envelope text-secondary me-2"></i>Example@gmail.com</a>
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-end">
                    <div class="d-flex align-items-center justify-content-end">
                        <a href="#" class="text-muted me-3"><i class="fas fa-clock text-secondary me-2"></i>Mon - Sat 8:00 - 17:30, Sunday - CLOSED</a>
                        <a href="#" class="btn btn-primary btn-square border border-white me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="btn btn-primary btn-square border border-white me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="btn btn-primary btn-square border border-white me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="btn btn-primary btn-square border border-white me-3"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Topbar End -->


        

        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h4 class="modal-title mb-0" id="exampleModalLabel">Search by keyword</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Search End -->

        <!-- Carousel Start -->
        <div class="container-fluid overflow-hidden px-0">
            <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators fadeInUp animate__animated" data-animation="fadeInUp" data-delay="1s" style="animation-delay: 1s;">
                    <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active" aria-current="true" aria-label="First slide"></li>
                    <li data-bs-target="#carouselId" data-bs-slide-to="1" aria-label="Second slide"></li>
                    <li data-bs-target="#carouselId" data-bs-slide-to="2" aria-label="Third slide"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img src="img/cin4.jpg" class="img-fluid w-100" alt="First slide"/>
                        <div class="carousel-caption">
                            <p class="text-uppercase text-secondary fs-4 mb-0 fadeInUp animate__animated" data-animation="fadeInUp" data-delay="1s" style="animation-delay: 1s;">Welcome</p>
                            <h1 class="display-1 text-capitalize text-white mb-4 fadeInUp animate__animated" data-animation="fadeInUp" data-delay="1.3s" style="animation-delay: 1.3s;">To The World of Magic</h1>
                            <p class="mb-5 fs-5 fadeInUp animate__animated" data-animation="fadeInUp" data-delay="1.5s" style="animation-delay: 1.5s;">Experience the ultimate cinematic delight in our fully-equipped cinema hall,
                             ensuring a healthy, hygienic, and cheerful environment with thrilling 3D movie screenings.
                            </p>
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-primary d-flex py-3 px-5 me-2 flex-shrink-0 fadeInUp animate__animated" data-animation="fadeInUp" data-delay="1.5s" style="animation-delay: 1.7s;" href="#">Apply Now</a>
                                <a class="btn btn-secondary d-inline-block py-3 px-5 ms-2 flex-shrink-0 fadeInUp animate__animated" data-animation="fadeInUp" data-delay="1.5s" style="animation-delay: 1.7s;" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="img/cin2.jpg" class="img-fluid w-100" alt="Second slide"/>
                        <div class="carousel-caption">
                            <p class="text-uppercase text-secondary fs-4 mb-0 fadeInUp animate__animated" data-animation="fadeInUp" data-delay="1s" style="animation-delay: 1s;">Had a tressfull week?</p>
                            <h1 class="display-1 text-capitalize text-white mb-4 fadeInUp animate__animated" data-animation="fadeInUp" data-delay="1.3s" style="animation-delay: 1.3s;">Embark on a journey to explore the enchanting beauty of cinema.</h1>
                            <p class="mb-5 fs-5 fadeInUp animate__animated" data-animation="fadeInUp" data-delay="1.5s" style="animation-delay: 1.5s;">Welcome to a happy world where we ensure ample parking space and a prime location for your convenience and enjoyment. 
                            </p>
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-primary d-flex py-3 px-5 me-2 flex-shrink-0 fadeInUp animate__animated" data-animation="fadeInUp" data-delay="1.5s" style="animation-delay: 1.7s;" href="#">Apply Now</a>
                                <a class="btn btn-secondary d-inline-block py-3 px-5 ms-2 flex-shrink-0 fadeInUp animate__animated" data-animation="fadeInUp" data-delay="1.5s" style="animation-delay: 1.7s;" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="img/cin5.jpg" class="img-fluid w-100" alt="Third slide"/>
                        <div class="carousel-caption">
                            <p class="text-uppercase text-secondary fs-4 mb-0 fadeInUp animate__animated" data-animation="fadeInUp" data-delay="1s" style="animation-delay: 1s;">Tasty!!</p>
                            <h1 class="display-1 text-capitalize text-white mb-4 fadeInUp animate__animated" data-animation="fadeInUp" data-delay="1.3s" style="animation-delay: 1.3s;">There's nothing like the magical combination of a captivating movie and delicious popcorn!!!</h1>
                            <p class="mb-5 fs-5 fadeInUp animate__animated" data-animation="fadeInUp" data-delay="1.5s" style="animation-delay: 1.5s;">Discover our food section, where we prioritize your health while indulging your love for delicious cuisine.
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-primary d-flex py-3 px-5 me-2 flex-shrink-0 fadeInUp animate__animated" data-animation="fadeInUp" data-delay="1.5s" style="animation-delay: 1.7s;" href="#">Apply Now</a>
                                <a class="btn btn-secondary d-inline-block py-3 px-5 ms-2 flex-shrink-0 fadeInUp animate__animated" data-animation="fadeInUp" data-delay="1.5s" style="animation-delay: 1.7s;" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon btn-lg-square fadeInLeft animate__animated" aria-hidden="true" data-animation="fadeInLeft" data-delay="1.1s" style="animation-delay: 1.3s;"><i class="fas fa-chevron-left fa-2x"></i></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                    <span class="carousel-control-next-icon btn-lg-square fadeInRight animate__animated" aria-hidden="true" data-animation="fadeInRight" data-delay="1.1s" style="animation-delay: 1.3s;"><i class="fas fa-chevron-right fa-2x"></i></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- Carousel End -->











        
       




        <div class="container-fluid service bg-light pb-5">
    <div class="container pb-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <p class="text-uppercase text-secondary fs-5 mb-0">On Going Movies</p>
            <h4 class="display-4 text-capitalize mb-3">Welcome To The World Of Movies!!!</h4>
        </div>
        
        <div class="row g-4"> 
        <form class="d-none d-md-flex ms-4" action="{{ route('home') }}" method="GET">
    <input class="form-control bg-dark border-0" type="search" placeholder="Search by title" name="search" value="{{ request('search') }}">
    <select name="genre" class="form-control bg-dark border-0 ms-2">
        <option value="">All Genres</option>
        <option value="Romance">Romance</option>
        <option value="Action">Action</option>
        <option value="Family">Family</option>
        <option value="Horror">Horror</option>
        <option value="Music">Music</option>
        <!-- Add other genre options -->
    </select>
    <input class="form-control bg-dark border-0 ms-2" type="number" placeholder="Age below" name="age" value="{{ request('age') }}">
    <select name="type" class="form-control bg-dark border-0 ms-2">
        <option value="">All Types</option>
        <option value="3D">3D</option>
        <option value="2D">2D</option>
    </select>
    <input class="form-control bg-dark border-0 ms-2" type="search" placeholder="Search by director" name="director" value="{{ request('director') }}">
    <button class="btn btn-secondary py-2 px-4 ms-2" type="submit">Search</button>
</form>
        @foreach ($movies as $movie)
            
            <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.4s">
                <div class="service-item" style="height: 450px;"> <!-- Adjusted height -->
                    <div class="service-img custom-poster">
                        <img src="{{ Storage::url($movie->poster_url) }}" class="" alt="Image" 
                        style="width: 100%; 
   height: 450px;"> <!-- Uniform image size -->
                    </div>
                    <div class="service-content text-center p-4">
                        <div class="bg-secondary btn-xl-square mx-auto" style="width: 100px; height: 100px;">
                        @if($movie->genre == 'Romance')
                        <i class="bi bi-balloon-heart text-primary fa-2x"></i>
                    @elseif($movie->genre == 'Family')
                        <i class="bi bi-house-heart text-primary fa-2x"></i>
                    @elseif($movie->genre == 'Funny')
                        <i class="bi bi-emoji-laughing text-primary fa-2x"></i>
                    @elseif($movie->genre == 'Horror')
                        <i class="bi bi-cloud-haze2 text-primary fa-2x"></i>
                    @elseif($movie->genre == 'Music')
                        <i class="bi bi-file-music text-primary fa-2x"></i>
                    @elseif($movie->genre == 'Action')
                        <i class="bi bi-hourglass-split text-primary fa-2x"></i>
                    @else
                        <i class="bi bi-film text-primary fa-2x"></i>
                    @endif
                        </div>
                        <a href="#" class="d-block fs-4 my-4">{{ $movie->title }}</a>
                        <p class="text-white mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, minima!</p>
                       
                        <br> <br>
                        <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-secondary py-2 px-4">Book Now</a>
                    </div>
                    <div class="service-tytle">
                        <div class="d-flex align-items-center justify-content-start ps-4 w-100">
                            <h4>{{ $movie->title }}</h4>
                        </div>
                        <div class="btn-xl-square bg-secondary p-4" style="width: 80px; height: 80px;">
                        @if($movie->genre == 'Romance')
                        <i class="bi bi-balloon-heart text-primary fa-2x"></i>
                    @elseif($movie->genre == 'Family')
                        <i class="bi bi-house-heart text-primary fa-2x"></i>
                    @elseif($movie->genre == 'Funny')
                        <i class="bi bi-emoji-laughing text-primary fa-2x"></i>
                    @elseif($movie->genre == 'Horror')
                        <i class="bi bi-cloud-haze2 text-primary fa-2x"></i>
                    @elseif($movie->genre == 'Music')
                        <i class="bi bi-file-music text-primary fa-2x"></i>
                    @elseif($movie->genre == 'Action')
                        <i class="bi bi-hourglass-split text-primary fa-2x"></i>
                    @else
                        <i class="bi bi-film text-primary fa-2x"></i>
                    @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>


<style>

/* .service-item {
    transition: height 0.3s ease-in-out;
} */


.service-img img {
    width: 100%; /* Make image full width of the container */
    height: 100%; /* Make image full height of the container */
    object-fit: cover; /* This will make sure the image fits within the container */
}



</style>

















        <!-- Testimonial Start -->




        <section class="client_section">
    <div class="container">
        <div class="heading_container">
            <h2>WHAT CUSTOMERS SAY</h2>
        </div>
        <div class="carousel-wrap">
            <div class="owl-carousel owl-loaded owl-drag">
                @foreach ($reviews as $review)
                    <div class="item">
                        <div class="box">
                        <div class="img-box">
                <img src="{{ Storage::url($review->user->image) }}" alt="{{ $review->user->name }}" style="border-radius: 50%; width: 100px; height: 50px; object-fit: cover;">
            </div>
                            <div class="detail-box">
                                <h5>
                                    {{ $review->user->name }} <br>
                                    <span>{{ $review->user->username }}</span>
                                </h5>
                               
                                <p>{{ $review->review }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>








        <section class="target_section layout_padding2" style="background-color: black;">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-6">
          <div class="detail-box">
            <h2>
              7+
            </h2>
            <h5>
              Years of Entertainment
            </h5>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="detail-box">
            <h2>
              200000+
            </h2>
            <h5>
             Tickets Sold
            </h5>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="detail-box">
            <h2>
              100000+
            </h2>
            <h5>
              Satisfied Customers
            </h5>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="detail-box">
            <h2>
              1500+
            </h2>
            <h5>
              Positive Feedback
            </h5>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end target section -->


  <!-- contact section -->

  <section class="contact_section layout_padding">
    <div class="container">

      <div class="heading_container">
        <h2>
          Give A Review
        </h2>
      </div>
      <div class="">
        <div class="">
          <div class="row">
            <div class="col-md-9 mx-auto">
              <div class="contact-form">
            
                  <!-- <div>
                    <input type="text" placeholder="Full Name ">
                  </div>
                  <div>
                    <input type="text" placeholder="Phone Number">
                  </div>
                  <div>
                    <input type="email" placeholder="Email Address">
                  </div> -->
                  <form action="{{ route('review.submit') }}" method="POST">
    @csrf
    <div>
        <input type="text" placeholder="Review" class="input_message" name="review">
    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn_on-hover">
            Send
        </button>
    </div>
</form>
              
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="map_img-box">
        <img src="images/map-img.png" alt="">
      </div>
    </div>
  </section>


  <!-- end contact section -->


  <!-- info section -->
  <section class="info_section ">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="info_contact">
            <h5>
              About Us
            </h5>
            <div>
              <div class="img-box">
                <img src="images/location-white.png" width="18px" alt="">
              </div>
              <p>
                Address
              </p>
            </div>
            <div>
              <div class="img-box">
                <img src="images/telephone-white.png" width="12px" alt="">
              </div>
              <p>
  <a href="https://wa.me/8801234567876" target="_blank">+8801234567876</a>
</p>
            </div>
            <div>
              <div class="img-box">
                <img src="images/envelope-white.png" width="18px" alt="">
              </div>
              <p>
  <a href="https://mail.google.com" target="_blank">shine@gmail.com</a>
</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_info">
            <h5>
              Informations
            </h5>
            <p>
            All rights reserved to ShineCine.
            </p>
          </div>
        </div>

        <div class="col-md-3">
          <div class="info_insta">
            <h5>
            Social Medias
            </h5>
            <div class="insta_container">
              <div>
                <a href="https://www.facebook.com/">
                  <div class="insta-box b-1">
                  <i class="bi bi-facebook"></i>
                  </div>
                </a>
                <a href="https://www.instagram.com/">
                  <div class="insta-box b-2">
                  <i class="bi bi-instagram"></i>
                  </div>
                </a>
              </div>

              <div>
                <a href="">
                  <div class="insta-box b-3">
                  
<i class="bi bi-youtube"></i>
                  </div>
                </a>
                <a href="https://www.youtube.com/">
                  <div class="insta-box b-4">
                    <img src="images/insta.png" alt="">
                  </div>
                </a>
              </div>
              <div>
                <a href="">
                  <div class="insta-box b-3">
                    <img src="images/insta.png" alt="">
                  </div>
                </a>
                <a href="">
                  <div class="insta-box b-4">
                    <img src="images/insta.png" alt="">
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_form ">
            <h5>
             Thanks For visiting.
            </h5>
            <!-- <form action="">
              <input type="email" placeholder="Enter your email">
              <button>
                Subscribe
              </button>
            </form> -->
            <div class="social_box">
              <a href="">
                <img src="images/fb.png" alt="">
              </a>
              <a href="">
                <img src="images/twitter.png" alt="">
              </a>
              <a href="">
                <img src="images/linkedin.png" alt="">
              </a>
              <a href="">
                <img src="images/youtube.png" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

        <!-- Testimonial End -->

        <!-- Footer Start -->
       
        <!-- Copyright Start -->
       


        <!-- Back to Top -->
        <a href="#" class="btn btn-secondary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>   
















    
   
















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
















<style>
    .movie-section {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        padding: 3%; /* Adjust as needed */
        position: relative; /* This is important for the ::before to work properly */
        /* Other styles */
        perspective: 1000px;
    }


    /*.movie-description,*/
    /*.movie-duration,*/
    /*.movie-genre {*/
    /*    display: none; !* Hide the new elements by default *!*/
    /*    !* Add more styles as needed *!*/
    /*}*/

    .movie-card:hover .movie-description,
    .movie-card:hover .movie-title,
    .movie-card:hover .movie-duration,
    .movie-card:hover .movie-genre {
        display: block; /* Show the new elements on hover */
        /* Add more styles as needed */

            transform: translateY(0); /* Move to original position */
            opacity: 1; /* Fade in */

        }

    .movie-title{
        margin: 5px 0; /* Add some space between text elements */
        /*white-space: nowrap; !* Prevent wrapping to ensure everything fits *!*/
        /*overflow: hidden; !* Hide overflow *!*/
        /*text-overflow: ellipsis; !* Add an ellipsis to text that overflows *!*/
        width: 100%; /* Full width within the content container */


        /*margin: 5px 0; !* Add some space between text elements *!*/
        white-space: normal; /* Allow text to wrap */
        overflow: visible; /* Show all text */
        word-break: break-word;
    }


    .movie-description,
    .movie-duration,
    .movie-genre {
        display: none;
        margin: 5px 0; /* Add some space between text elements */
        /*white-space: nowrap; !* Prevent wrapping to ensure everything fits *!*/
        /*overflow: hidden; !* Hide overflow *!*/
        text-overflow: ellipsis; /* Add an ellipsis to text that overflows */
        width: 100%; /* Full width within the content container */


        /*margin: 5px 0; !* Add some space between text elements *!*/
        white-space: normal; /* Allow text to wrap */
        overflow: visible; /* Show all text */
        word-break: break-word;
        transition: opacity 0.3s, transform 0.3s;
        transform: translateY(10px); /* Start slightly below */
        opacity: 0; /* Start invisible */
    }



    .movie-card:hover .movie-content {
        display: block;
        width: 100%; /* Expand to cover the full card */
        height: 100%; /* Expand to cover the full card */
        padding: 10px; /* Adjust padding */
        top: 0; /* Align to the top */
        left: 0; /* Align to the left */
        transform: none; /* Reset transform if previously set */
        align-items: flex-start; /* Align items to the start (top) */
    }


    .movie-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-size: contain; /* Ensure the entire image fits without being cut or repeated */
        background-position: center center; /* Center the image */
        background-repeat: no-repeat; /* Do not repeat the image */
        z-index: -1;

        filter: blur(8px);
        transition: background-image 0.8s ease-in-out, box-shadow 0.5s ease;
        background-image: var(--bg-image, url('/image/left1.jpg')); /* Initial background image, can be changed with JavaScript */
    }
    /*.movie-card:hover {*/
    /*    transform: scale(1.05);*/
    /*    border: #18181b;*/
    /*    box-shadow:*/
    /*        -10px 10px 15px -5px #ccaa00, !* Shadow on the bottom left *!*/
    /*        10px 10px 15px -5px #ccaa00;*/
    /*}*/



    .movie-card {
        position: relative;
        width: calc(25% - 40px); /* Width reduced for a more compact card size */
        margin-bottom: 3%;
        /* More space between rows of cards */
        border: #18181b;
        border-radius: 10px; /* Rounded corners for the movie card */
        overflow: hidden;
        box-shadow:
            -5px 5px 8px -3px #171301, /* Even smaller shadow for very small screens */
            5px 5px 8px -3px #413603;
        /*transition: transform 0.5s ease, box-shadow 0.5s ease;*/
        /* Smooths out the transition */
        transform: translateZ(0);
        transition: transform 0.5s ease, box-shadow 0.5s ease, z-index 0s;
        /*position: relative;*/
        /*width: calc(25% - 40px); !* Adjust the width and the margins as necessary *!*/
        /*margin-bottom: 3%;*/
        /*transition: transform 0.5s ease, box-shadow 0.5s ease;*/


    }



    .movie-card:hover {
        /*transform: scale(1.05);*/
        transform: scale(1.05) translateZ(50px); /* Slightly lifts the card up to add to the 3D effect */
        box-shadow:
            -10px 10px 20px -5px #ccaa00, /* Enhanced shadow on the bottom left */
            10px 10px 20px -5px #ccaa00; /* Enhanced shadow on the bottom right */
        transition-delay: 0.1s;/* Increase size of the hovered card */
        transition: transform 0.5s ease, box-shadow 0.5s ease;

        /* Add a shadow if needed */
    }

    .movie-card::after {
        /* ... existing styles ... */
        transition: opacity 0.3s ease, transform 0.3s ease;
        transition-delay: 0s; /* No delay for the shine effect to make it appear instantly on hover */
    }


    .movie-card:hover::after {
        transition-delay: 0.1s;
        opacity: 1; /* Show the pseudo-element */
        top: 0; /* Position it to cover the whole card */
    }

    /* The rest of the CSS for the shrinking effect on other cards remains the same */
    .movie-card:hover ~ .movie-card {
        transform: scale(0.95);
        transition: transform 0.5s ease;
    }


    /* Adjust .movie-card and other elements inside .movie-section to make sure they are positioned relatively */
    .movie-card, .movie-content {
        position: relative;
        z-index: 1; /* Ensures the content is above the blurred background */
    }
    .movie-content {
    align-items: flex-end;}



    .movie-content {

        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 2;
        width: calc(100% - 40px); /* Adjust the width slightly less than the movie-card */
        padding: 5px;
        background-color: transparent;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        text-align: center;
        /*transition: transform 0.3s ease, width 0.3s ease, height 0.3s ease, padding 0.3s ease;*/
        box-sizing: border-box;

        display: flex;
        flex-direction: column;
        justify-content: center; /* Center children vertically */
        align-items: center; /* Center children horizontally */
        /* Make sure width and height are set to allow enough space for centering */
        /*width: 100%; !* Take full width of the parent .movie-card *!*/
        /* Consider if a specific height is needed or if it should be auto */
        height: auto; /* Adapt height based on content */
        /* Remove transform properties if they interfere with centering */
        /*display: flex; !* Use flexbox for a flexible layout *!*/
        /*flex-direction: column; !* Stack children vertically *!*/
        /*justify-content: center; !* Center content vertically *!*/
        /*align-items: center;*/
        transition: all 0.5s ease; /* Animate all changes smoothly */
        overflow: hidden;
    }

    .movie-image {
        width: 100%;
        padding-top: 150%; /* Increased padding-top for a taller image aspect ratio */
        position: relative;
        border-radius: 10px;
    }

    .movie-img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 10px;
    }
    .movie-title {
        font-size: 1.5em;

        white-space: normal; /* Allow text wrapping on smaller screens */
        text-overflow: clip; /* Remove ellipsis when wrapping */
        /*font-size: smaller;*/
        /* ...existing styles... */
        transition: font-size 0.3s ease;
        word-wrap: break-word; /* Ensure long words do not overflow */
        overflow: hidden; /* Hide text that overflows the element's box */
        /*text-overflow: ellipsis; !* Add an ellipsis to indicate hidden overflow *!*/
        /*white-space: nowrap; !* Prevent text from wrapping to a new line *!*/
        max-width: 100%;/* Smooth transition for font size changes */
    }

    .btn-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }
    .btn {
         /* Use flexbox to align buttons */
       /* This will space out the buttons equally */
        padding: 10px ; /* Adjust padding as needed */
        min-width: 90px; /* Use min-width to ensure buttons have at least this width */
        text-align: center;
        /*padding: 10px 20px; !* Adjust padding as needed *!*/
        /*text-align: center;*/
        text-decoration: none; /* Removes underline from links */
        display: inline-block;
        font-size: 10px; /* Adjust font size as needed */
        border-radius: 15px; /* Rounded corners for the button */
        color: #000; /* Text color */
        background-color: #dcc762; /* Muddy yellow background */
        border: 1px solid #57a957; /* Green border */
        box-shadow: 0 3px #57a957; /* Simulate depth with green shadow beneath the button */
        transition: all 0.3s ease; /* Smooth transition for hover effects */
        position: relative; /* Required for pseudo-elements used for the shine effect */
        overflow: hidden;
        flex: 1;/* Ensures pseudo-elements don't extend outside the button */

    }

    .btn:hover {
        background-color: transparent; /* Transparent background on hover */
        color: #000; /* Text color on hover */
        border-color: #d2a679; /* Muddy yellow border on hover */
        box-shadow: 0 6px 20px green; /* Radiant green shadow on hover */
    }

    /* Shine effect on hover */
    .btn::after {
        content: '';
        position: absolute;
        top: -50%; right: -50%;
        bottom: -50%; left: -50%;
        background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.4), transparent);
        transition: all 0.5s ease;
        opacity: 0;
        transform: scale(0) rotate(30deg);
    }

    .btn:hover::after {
        opacity: 1;
        transform: scale(2) rotate(30deg);
    }


    @media (hover: hover) {
        .movie-card:hover {
            transform: scale(1.05);
        }

        .container:hover .movie-card:not(:hover) {
            transform: scale(0.95);
        }
    }


















    /* Adjustments for small screens */
    @media (max-width: 600px) {

        .movie-card {
            width: 100%; /* Full width for smaller screens */
            margin-bottom: 20px; /* Adjust space between cards */
        }

        .movie-card:hover {
            transform: scale(1.03);
        }

        .container:hover .movie-card:not(:hover) {
            transform: scale(0.97);
        }


        .movie-content {
            width: 90%; /* Adjust the width for a consistent look */
            padding: 20px; /* Provide sufficient padding */
            /*transform: translate(-50%, -50%); !* Center the content *!*/
            top: 60%; /* Adjust the vertical positioning if necessary */
            /* Consider if scaling is still necessary here, if not, remove the next line */
            transform: translate(-50%, -50%) scale(0.85); /* Optional: Scale down the content */
        }

        /*.movie-title {*/
        /*    font-size: 1.5em; !* Adjust the font size to fit the smaller viewport *!*/
        /*}*/


    }






    @media (max-width: 1300px) {
        .movie-card {
            width: calc(33.333% - 60px); /* Three cards per row with proper spacing */
            margin: 20px;
            padding-bottom: 30px;/* Consistent margin for all sides */
            box-shadow:
                -10px 10px 12px -5px #171301,
                10px 10px 12px -5px #413603;
            display: flex; /* Use flexbox for layout */
            flex-direction: column; /* Stack children vertically */
            justify-content: space-between; /* Distribute space evenly, keeps footer at bottom */
            align-items: center; /* Center content horizontally */
            overflow: hidden; /* Prevent content from overflowing */
            height: auto; /* Card height adjusts to content */
            max-height: 400px; /* Maximum height to prevent very tall cards */
        }
        .movie-card:hover {
            box-shadow:
                -10px 10px 12px -5px #ccaa00,
                10px 10px 12px -5px #ccaa00;
        }
        .movie-card:hover .movie-img {
            opacity: 0.9; /* Opacity change on hover */
            transition: opacity 0.5s ease;
        }

        .movie-card .movie-description,
        .movie-card .movie-duration,
        .movie-card .movie-genre {
            display: none; /* Hide additional details initially */
        }

        .movie-card:hover .movie-description,
        .movie-card:hover .movie-duration,
        .movie-card:hover .movie-genre {
            display: none; /* Maintain hidden on hover */
        }

        .movie-content {
            width: calc(100% - 30px); /* Account for padding and borders */
            padding: 15px; /* Adjust padding to prevent overflow */
        }
        .movie-card:hover .movie-content {
            padding: 30px; /* More padding on hover */
            justify-content: center; /* Center content */
        }

        .movie-title {
            font-size: 1.8em; /* Increase font size for readability */
            white-space: normal; /* Allow text wrap */
        }

        .movie-section {
            padding: 5%; /* Adjust padding for layout */
        }

        .movie-content {
            width: calc(100% - 60px); /* Width accounting for padding */
        }

        .btn {
            font-size: 20px; /* Button font size */
            padding: 12px; /* Button padding */
            min-width: 80px; /* Minimum button width */
            min-height: 60px; /* Minimum button height */
            width: 100%; /* Full width of the container */
            margin-bottom: 15px; /* Space between buttons */
        }

        .btn-container {
            display: flex;
            flex-direction: column; /* Stack buttons vertically */
            align-items: center; /* Center buttons */
            justify-content: space-around; /* Evenly distribute buttons */
            gap: 15px; /* Gap between items */
        }
    }

    @media (hover: hover) {
        .btn:hover {
            background-color: transparent; /* Transparent button background on hover */
            color: #000; /* Button text color on hover */
            border-color: #d2a679; /* Button border color on hover */
            box-shadow: 0 10px 30px rgba(0, 128, 0, 0.7); /* Button shadow on hover */
        }

        .btn:hover::after {
            opacity: 1; /* Button pseudo-element opacity on hover */
            transform: scale(3) rotate(30deg); /* Button pseudo-element transformation on hover */
        }
    }





    @media (max-width: 1200px) {
        .movie-card {
            width: calc(33.333% - 30px); /* Three cards per row with proper spacing */
            margin: 15px; /* Consistent margin for all sides */
            box-shadow:
                -10px 10px 12px -5px #171301,
                10px 10px 12px -5px #413603;
            display: flex; /* Use flexbox for layout */
            flex-direction: column; /* Stack children vertically */
            justify-content: center; /* Center content vertically */
            align-items: center; /* Center content horizontally */
            overflow: hidden; /* Prevent content from overflowing */
        }
        .movie-card:hover {
            box-shadow:
                -10px 10px 12px -5px #ccaa00,
                10px 10px 12px -5px #ccaa00;
        }
        .movie-card:hover .movie-img {
            opacity: 0.9;
            transition: opacity 0.5s ease;
        }

        .movie-card .movie-description,
        .movie-card .movie-duration,
        .movie-card .movie-genre {
            display: none;
        }

        .movie-card:hover .movie-description,
        .movie-card:hover .movie-duration,
        .movie-card:hover .movie-genre {
            display: none;
        }

        /* Adjust the styles for movie-content, movie-title, etc., as needed */

        .movie-content {
            width: calc(100% - 30px); /* Account for padding and borders */
            padding: 15px; /* Adjust padding to prevent overflow */
        }
        .movie-card:hover .movie-content {
            padding: 30px; /* More padding on hover */
            justify-content: center; /* Center content */
        }

        .movie-title {
            font-size: 1.8em; /* Increase font size for readability */
            white-space: normal; /* Allow text wrap */
        }

        .movie-section {
            padding: 5%; /* Adjust padding for layout */
        }

        .movie-content {
            width: calc(100% - 60px); /* Width accounting for padding */
        }

        .btn {
            font-size: 20px; /* Button font size */
            padding: 12px; /* Button padding */
            min-width: 80px; /* Minimum button width */
            min-height: 60px; /* Minimum button height */
            width: 100%; /* Full width of the container */
            margin-bottom: 15px; /* Space between buttons */
        }

        .btn-container {
            display: flex;
            flex-direction: column; /* Stack buttons vertically */
            align-items: center; /* Center buttons */
            justify-content: space-around; /* Evenly distribute buttons */
            gap: 15px; /* Gap between items */
        }
    }

    @media (hover: hover) {
        .btn:hover {
            background-color: transparent; /* Transparent button background on hover */
            color: #000; /* Button text color on hover */
            border-color: #d2a679; /* Button border color on hover */
            box-shadow: 0 10px 30px rgba(0, 128, 0, 0.7); /* Button shadow on hover */
        }

        .btn:hover::after {
            opacity: 1; /* Button pseudo-element opacity on hover */
            transform: scale(3) rotate(30deg); /* Button pseudo-element transformation on hover */
        }
    }








    @media (max-width: 992px) {
        .movie-card {
            width: calc(50% - 20px); /* Adjust width to prevent overflow */
            margin-bottom: 50px; /* More space between cards */
            margin-right: 10px; /* Added right margin for spacing */
            margin-left: 10px; /* Added left margin for spacing */
            box-shadow:
                -10px 10px 12px -5px #171301,
                10px 10px 12px -5px #413603;
        }
        .movie-card:hover {
            box-shadow:
                -10px 10px 12px -5px #ccaa00,
                10px 10px 12px -5px #ccaa00;
        }
        .movie-card:hover .movie-img {
            opacity: 0.9;
            transition: opacity 0.5s ease;
        }

        .movie-card .movie-description,
        .movie-card .movie-duration,
        .movie-card .movie-genre {
            display: none;
        }

        .movie-card:hover .movie-description,
        .movie-card:hover .movie-duration,
        .movie-card:hover .movie-genre {
            display: none;
        }
        .movie-content {
            width: 100%;
            padding: 15px;
            top: 50%;
            transform: translate(-50%, -50%) scale(1);
        }
        .movie-card:hover .movie-content {
            padding: 25px;
            justify-content: center;
        }

        .movie-title {
            font-size: 1.7em;
            white-space: normal;
        }

        .movie-section {
            padding: 10%;
        }

        .movie-content {
            width: calc(100% - 40px);
        }

        .btn {
            font-size: 20px;
            padding: 10px;
            min-width: 20px; /* This seems too small for min-width, check if this is intended */
            min-height: 60px;
            width: 100%; /* Take full width of the parent container */
            margin-bottom: 10px; /* Add space between the buttons */
        }

        .btn-container {
            display: flex;
            flex-direction: column; /* Stack buttons vertically */
            align-items: center; /* Center buttons horizontally */
            justify-content: space-around; /* Distribute buttons evenly */
            gap: 15px; /* Keep the gap if you need space around the items */
        }
    }


    @media (hover: hover) {
        .btn:hover {
            background-color: transparent;
            color: #000;
            border-color: #d2a679;
            box-shadow: 0 10px 30px rgba(0, 128, 0, 0.7);
        }

        .btn:hover::after {
            opacity: 1;
            transform: scale(3) rotate(30deg);
        }
    }





    /*@media (max-width: 768px) {*/
    /*    .movie-card {*/
    /*        width: 100%; !* Full width for smaller screens *!*/
    /*        margin: 0 0 20px; !* Space between cards *!*/
    /*        !* Ensure height is not restricting the card *!*/
    /*        height: auto;*/
    /*        !* No transformation on hover to prevent layout shifts *!*/
    /*        transform: none;*/
    /*        box-shadow: none; !* Optional: remove shadow on hover *!*/
    /*    }*/

    /*    .movie-card .movie-description,*/
    /*    .movie-card .movie-duration,*/
    /*    .movie-card .movie-genre {*/
    /*        !* Hide additional info by default *!*/
    /*        display: none;*/
    /*    }*/
    /*    .movie-card:hover .movie-description,*/
    /*    .movie-card:hover .movie-duration,*/
    /*    .movie-card:hover .movie-genre {*/
    /*        display: none; !* Keep details hidden on hover on small screens *!*/
    /*    }*/

    /*    .movie-content {*/
    /*        !* Flex layout for the content *!*/
    /*        display: flex;*/
    /*        flex-direction: column;*/
    /*        justify-content: space-between;*/
    /*        padding: 10px; !* Padding inside the content *!*/
    /*        width: 100%; !* Full width *!*/
    /*        box-sizing: border-box; !* Include padding and border *!*/
    /*    }*/

    /*    .btn-container {*/
    /*        position: relative;*/
    /*        width: 100%; !* Container takes the full width *!*/
    /*        margin-top: 10px; !* Space from title to buttons *!*/
    /*    }*/

    /*    .btn {*/
    /*        display: block; !* Each button on its own line *!*/
    /*        width: 100%; !* Full width buttons *!*/
    /*        margin-bottom: 10px; !* Space between buttons *!*/
    /*    }*/

    /*    .btn:last-child {*/
    /*        margin-bottom: 0; !* No extra space after the last button *!*/
    /*    }*/

    /*    !* Remove scaling effects on hover *!*/
    /*    .movie-card:hover {*/
    /*        transform: none;*/
    /*    }*/

    /*    .btn:hover {*/
    /*        !* Hover effects for buttons *!*/
    /*        background-color: transparent;*/
    /*        color: #000;*/
    /*        border-color: #d2a679;*/
    /*        box-shadow: 0 6px 20px rgba(0, 128, 0, 0.5);*/
    /*    }*/

    /*    .btn:hover::after {*/
    /*        opacity: 1;*/
    /*        transform: scale(2) rotate(30deg);*/
    /*    }*/
    /*}*/

    /*.movie-card:hover .movie-img {*/
    /*    opacity: 0.7; !* Or any other value between 0 and 1 *!*/
    /*    transition: opacity 0.5s ease;*/
    /*}*/



    /*!* Remove hover effects for touch devices *!*/
    /*@media (hover: none) {*/
    /*    .btn:hover {*/
    /*        background-color: #dcc762; !* Back to default style *!*/
    /*        box-shadow: none;*/
    /*    }*/
    /*}*/

















    @media (max-width: 768px) {
        .movie-card {
            width: calc(100% - 70px); /* Slightly wider padding */
            margin-bottom: 50px; /* More space between cards */
            margin-right: 10px; /* Added right margin for spacing */
            margin-left: 10px; /* Added left margin for spacing */
            box-shadow:
                -10px 10px 12px -5px #171301,
                10px 10px 12px -5px #413603;
        }
        .movie-card:hover {
            box-shadow:
                -8px 8px 10px -4px #ccaa00, /* Larger shadow on hover */
                8px 8px 10px -4px #ccaa00;
        }
        .movie-card:hover .movie-img {
            opacity: 0.8; /* Slightly higher opacity on hover */
            transition: opacity 0.5s ease;
        }

        .movie-card .movie-description,
        .movie-card .movie-duration,
        .movie-card .movie-genre {
            display: none; /* Show details by default on medium screens */
        }

        .movie-card:hover .movie-description,
        .movie-card:hover .movie-duration,
        .movie-card:hover .movie-genre {
            display: none; /* Details visible on hover */
        }
        .movie-content {
            width: 100%; /* Full width for the content area */
            padding: 12px; /* Increased padding */
            top: 50%; /* Centered vertically */
            transform: translate(-50%, -50%) scale(0.9); /* Scale slightly down */
        }
        .movie-card:hover .movie-content {
            padding: 20px; /* More padding on hover */
            justify-content: center; /* Center content */
        }

        .movie-title {
            font-size: 1.5em; /* Larger font size for readability */
            white-space: normal; /* Text wraps to new line */
        }

        .movie-section {
            padding: 8%; /* More padding for aesthetic */
        }

        .movie-content {
            width: calc(100% - 30px); /* Adjust width for padding */
        }

        .btn {
            font-size: 24px;
            padding: 6px; /* Increased padding for larger screens */
            min-width: 60px;
            min-height: 50px; /* Larger buttons for easier interaction */
            width: calc(50% - 15px); /* Adjust width for buttons */
        }

        .btn-container {
            justify-content: center;
            gap: 10px; /* Increased gap for layout */
        }
    }

    @media (hover: hover) {
        .btn:hover {
            background-color: transparent;
            color: #000;
            border-color: #d2a679;
            box-shadow: 0 8px 25px rgba(0, 128, 0, 0.6);
        }

        .btn:hover::after {
            opacity: 1;
            transform: scale(2.5) rotate(30deg);
        }
    }


    @media (max-width: 600px) {
        .movie-card {
            width: calc(100% - 30px); /* Full width minus padding */
            margin: 15px; /* Consistent margin */
            box-shadow:
                -5px 5px 7px -3px #171301, /* Smaller shadow for smaller screens */
                5px 5px 7px -3px #413603;
            display: flex;
            flex-direction: column;
            justify-content: flex-start; /* Content aligned to the top */
            align-items: center;
            overflow: hidden;
            height: auto; /* Adjust height automatically */
        }
        .movie-card:hover {
            box-shadow:
                -5px 5px 7px -3px #ccaa00,
                5px 5px 7px -3px #ccaa00;
        }
        .movie-card:hover .movie-img {
            opacity: 0.9;
            transition: opacity 0.5s ease;
        }

        .movie-card .movie-description,
        .movie-card .movie-duration,
        .movie-card .movie-genre {
            display: none; /* Hide details to simplify the card */
        }

        .movie-card:hover .movie-description,
        .movie-card:hover .movie-duration,
        .movie-card:hover .movie-genre {
            display: none; /* Keep details hidden on hover */
        }

        .movie-content {
            width: calc(100% - 30px); /* Adjust width to allow for padding */
            padding: 15px; /* Adequate padding for smaller screens */
        }
        .movie-card:hover .movie-content {
            padding: 15px; /* Keep padding consistent on hover */
            justify-content: center;
        }

        .movie-title {
            font-size: 1.5em; /* Adjust font size for smaller screens */
            white-space: normal; /* Allow title to wrap */
            text-overflow: ellipsis;
            overflow: hidden;
            max-height: 3em; /* Limit title height */
        }

        .movie-section {
            padding: 5%; /* Adjust padding */
        }

        .btn {
            font-size: 18px; /* Slightly smaller button font size */
            padding: 10px; /* Adjust button padding */
            min-width: 80px; /* Keep minimum button width */
            min-height: 50px; /* Adjust minimum button height */
            width: auto; /* Auto width for button */
            margin-bottom: 10px; /* Adjust space between buttons */
        }

        .btn-container {
            width: 100%; /* Full width for button container */
            flex-direction: column; /* Stack buttons vertically */
            align-items: center; /* Center buttons */
            justify-content: center; /* Center content */
            gap: 10px; /* Adjust gap between buttons */
        }
    }

    @media (hover: hover) {
        .btn:hover {
            background-color: transparent;
            color: #000;
            border-color: #d2a679;
            box-shadow: 0 8px 25px rgba(0, 128, 0, 0.6);
        }

        .btn:hover::after {
            opacity: 1;
            transform: scale(2.5) rotate(30deg);
        }
    }





    @media (max-width: 480px) {
        /*.movie-card:hover .movie-content {*/
        /*    padding: 10px; !* Adjust padding as needed for very small screens *!*/
        /*}*/
        .movie-card {
            width: calc(100% - 20px); /* Full width for very small screens */
            margin-bottom: 15px;
            /* Adjust space between cards */
            box-shadow:
                -5px 5px 8px -3px #171301, /* Even smaller shadow for very small screens */
                5px 5px 8px -3px #413603;

        }
        .movie-card:hover {
            box-shadow:
                -5px 5px 8px -3px #ccaa00, /* Even smaller shadow for very small screens */
                5px 5px 8px -3px #ccaa00;


        }
        .movie-card:hover .movie-img {
            opacity: 0.7; /* Or any other value between 0 and 1 */
            transition: opacity 0.5s ease;
        }


        .movie-card .movie-description,
        .movie-card .movie-duration,
        .movie-card .movie-genre {
            display: none; /* Hide details by default on small screens */
        }

        .movie-card:hover .movie-description,
        .movie-card:hover .movie-duration,
        .movie-card:hover .movie-genre {
            display: none; /* Keep details hidden on hover on small screens */
        }
        .movie-content {
            width: 90%; /* Adjust the width for a consistent look */
            padding: 10px; /* Adjust padding for the content */
            /*transform: translate(-50%, -50%); !* Center the content *!*/
            top: 60%; /* Adjust the vertical positioning if necessary */
            /* Consider if scaling is still necessary here, if not, remove the next line */
            transform: translate(-50%, -50%) scale(0.8); /* Optional: Scale down the content */
        }
        .movie-card:hover .movie-content {
            padding: 16px; /* Less padding for very small screens */
            justify-content: center; /* Align content to the top */
        }

            .movie-title {
                font-size: 1.3em; /* Adjust font size for readability on very small screens */
                white-space: normal; /* Allow the text to wrap to a new line on very small screens */
            }/* Adjust the font size for readability on very small screens */


        .movie-section {
            padding: 5%; /* Consistent padding for very small screens */
        }


        .movie-content {
            width: calc(100% - 20px); /* Adjusted width to match the new card size */
        }

        .btn {
            font-size: 14px;
            padding: 6px; /* Reduce padding for smaller screens */
            min-width: 80px;
            min-height: 100px/* Adjust min-width to ensure buttons fit within the container */
            flex: none; /* Override the flex-grow property */
            width: calc(50% - 10px); /* Half the container width minus the gap */
        }

        .btn-container {
            justify-content: center; /* Centers buttons if they don't span full width */
            gap: 5px; /* Reduce the gap for smaller screens */
        }
    }

    @media (hover: hover) {
        .btn:hover {
            /* Hover effects as defined earlier */
            background-color: transparent;
            color: #000;
            border-color: #d2a679;
            box-shadow: 0 6px 20px rgba(0, 128, 0, 0.5);
        }

        .btn:hover::after {
            opacity: 1;
            transform: scale(2) rotate(30deg);
        }

    }



    .client_section .box {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    text-align: center;
    margin: 15px;
}

.client_section .img-box img {
    width: 100px; /* Default size */
    height: 100px;
    border-radius: 50%;
    object-fit: cover;
}

@media (max-width: 768px) {
    .client_section .img-box img {
        width: 80px;
        height: 80px;
    }

    .client_section .box {
        padding: 15px;
    }
}

@media (max-width: 480px) {
    .client_section .img-box img {
        width: 60px;
        height: 60px;
    }

    .client_section .detail-box h5,
    .client_section .detail-box p {
        font-size: 14px;
    }
}



</style>












<script>
    document.addEventListener('DOMContentLoaded', function() {
        var backgrounds = [
            '/image/left1.jpg',
            '/image/left2.jpg',
            '/image/left3.jpg',
        ];
        var current = 0;

        function changeBackground() {
            var section = document.querySelector('.movie-section'); // Select the section
            var imageUrl = `url(${backgrounds[current]})`;
            section.style.setProperty('--bg-image', imageUrl); // Set the CSS variable
            current = (current + 1) % backgrounds.length;
        }

        setInterval(changeBackground, 5000); // Change every 5 seconds
        changeBackground(); // Initial call to set the background
    });


</script>











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