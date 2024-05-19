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
                        <div class="img-box">
    <img src="{{ asset('storage/' . $review->user->image) }}" alt="{{ $review->user->name }}" style="border-radius: 50%; width: 100px; height: 500px; object-fit: cover;">
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



    <div class="row g-4 mt-4">
        <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="h-100 bg-secondary rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <h6 class="mb-0">Recent Reviews</h6>
                    <a href="#">Show All</a>
                </div>
                @foreach ($recentReviews as $review)
                    <div class="d-flex align-items-center border-bottom py-3">
                        <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="w-100 ms-3">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-0">{{ $review['user_name'] }}</h6>
                                <small>{{ $review['time_ago'] }}</small>
                            </div>
                            <span>{{ $review['review'] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


     <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-secondary rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="mb-0">Recent Reviews</h6>
                                <a href="">Show All</a>
                            </div>
                            @foreach ($recentReviews as $review)
                    <div class="d-flex align-items-center border-bottom py-3">
                        <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="w-100 ms-3">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-0">{{ $review['user_name'] }}</h6>
                                <small>{{ $review['time_ago'] }}</small>
                            </div>
                            <span>{{ $review['review'] }}</span>
                        </div>
                    </div>
                @endforeach
                                <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">Jhon Doe</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                    <span>Short message goes here...</span>
                                </div>
                           
                        </div>
                    </div>
