 <!-- <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="service-item">
                            <div class="service-img">
                                <img src="{{ $movie->poster_url }}" class="img-fluid w-100" alt="Image">
                            </div>
                            <div class="service-content text-center p-4">
                                <div class="bg-secondary btn-xl-square mx-auto" style="width: 120px; height: 120px;">
                                    <i class="fas fa-home text-primary fa-4x"></i>
                                </div>
                                <a href="#" class="d-block fs-4 my-4">{{ $movie->title }}</a>
                                <p class="text-white mb-4">{{ $movie->description }}</p>
                                <a class="btn btn-secondary py-2 px-4" href="{{ route('movies.show', $movie->id) }}">Book Now</a>
                            </div>
                            <div class="service-tytle">
                                <div class="d-flex align-items-center ps-4 w-100">
                                    <h4>{{ $movie->title }}</h4>
                                </div>
                                <div class="btn-xl-square bg-secondary p-4" style="width: 80px; height: 80px;">
                                    <i class="fas fa-home text-primary fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>  -->




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
                        .round-image {
    border-radius: 50%;  /* Makes the edge of the image round */
    width: 100px;        /* Example size, adjust as needed */
    height: 100px;       /* Example size, adjust as needed */
    object-fit: cover;   /* Ensures the image covers the space without distorting */
}


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





