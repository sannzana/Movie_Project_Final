@extends('layouts.base')

@section('body')



<div class="container-xxl bg-white p-0">

<div class="container-fluid nav-bar bg-transparent">
    <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
        <a href="index.html" class="navbar-brand d-flex align-items-center text-center">
            <div class="icon p-2 me-2">
                <img class="img-fluid" src="img/icon-deal.png" alt="Icon" style="width: 30px; height: 30px;">
            </div>
            <a href="{{ route('home') }}"
                class="font-bold text-xl text-gray-50 focus:outline focus:outline-2 focus:rounded-sm focus:outline-white">
                {{ config('app.name') }}
            </a>
        </a>

        <!-- Toggle button for small screens -->
        <button id="navToggle" class="navbar-toggler" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu items -->
        <div class="navbar-nav ms-auto" id="navbarNav">
            <a href="index.html" class="nav-item nav-link active">Home</a>
            <a href="about.html" class="nav-item nav-link">About</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Let's Talk About Movies</a>
                <div class="dropdown-menu rounded-0 m-0">
                    <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                    <a href="404.html" class="dropdown-item">404 Error</a>
                </div>

            </div>
            <!-- <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Login/reg</a>
                <div class="dropdown-menu rounded-0 m-0">
                       @if (Route::has('login'))
                               @auth
                                        <a href="{{ route('profile') }}" class="dropdown-item">
                                              <span class="mr-2">
                                          {{ auth()->user()->username }}
                                                  </span>
                 </a>
                                <a href="{{ route('bookings.index') }}" class="dropdown-item">Bookings</a>
                                  <a class="dropdown-item">
                                   <form method="POST" action="{{ route('logout') }}">
                                     @csrf
                                    <button type="submit"
                            class="font-semibold text-gray-50 hover:text-gray-200 focus:outline focus:outline-2 focus:rounded-sm focus:outline-rose-500">
                        Log out
                    </button>
                </form>
                </a>
              @else
                     <a href="{{ route('login') }}" class="dropdown-item">Login</a>
                      <a href="{{ route('register') }}" class="dropdown-item">Register</a>
              @endauth
                @endif


   
 -->






                <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Login/Reg</a>
                <div class="dropdown-menu rounded-0 m-0">
                    
                @if (Route::has('login'))
                               @auth
                                        <a href="{{ route('profile') }}" class="dropdown-item">
                                              <span class="mr-2">
                                          {{ auth()->user()->username }}
                                                  </span>
                 </a>
                                <a href="{{ route('bookings.index') }}" class="dropdown-item">Bookings</a>
                                  <a class="dropdown-item">
                                   <form method="POST" action="{{ route('logout') }}">
                                     @csrf
                                    <button type="submit"
                            class="font-semibold text-gray-50 hover:text-gray-200 focus:outline focus:outline-2 focus:rounded-sm focus:outline-rose-500">
                        Log out
                    </button>
                </form>
                </a>
              @else
                     <a href="{{ route('login') }}" class="dropdown-item">Login</a>
                      <a href="{{ route('register') }}" class="dropdown-item">Register</a>
              @endauth
                @endif


                </div>

            </div>






                    <!-- <a href="contact.html" class="nav-item nav-link">Contact</a> -->
                    <!-- <a href="" class="btn btn-primary px-3 d-none d-lg-flex">Add Property</a> -->
       

                 

    </div>
    @auth
                      @if (auth()->user()->role === 'ADMIN')
                          <a href="{{ route('admin.dashboard') }}" class="nav-item nav-link active">Dashboard</a>
                        @endif
                   @endauth 
                   
                   <a href="contact.html" class="nav-item nav-link">Contact</a>
    </nav>
</div>









<!-- </div> -->


<!-- Navbar End -->


<style>
@media (max-width: 992px) {
    #navbarNav {
        display: none;
    }
}

/* Add a 3D effect on hover with shiny effect */
.navbar-nav .nav-link {
  transition: transform 0.3s, box-shadow 0.3s;
  transform: perspective(200px) translateZ(0);
  position: relative;
  overflow: hidden;
}

.navbar-nav .nav-link::before {
  content: '';
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  inset: 0 0 0 0;
  background: rgba(255, 255, 255, 0.1);
  opacity: 0;
  transition: opacity 0.3s, transform 0.3s;
  transform: translateX(-100%);
  pointer-events: none;
}

.navbar-nav .nav-link:hover::before {
  opacity: 1;
  transform: translateX(0);
}

.navbar-nav .nav-link:hover,
.navbar-nav .nav-link:focus {
  transform: perspective(200px) translateZ(20px);
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

/* Smooth transition for all links */
.navbar-nav .nav-link {
  transition: color 0.3s ease-in-out, background-color 0.3s ease-in-out;
}

.navbar-nav .nav-link:hover {
  color: #0056b3; /* Change to the color you want on hover */
}


</style>



<script>
document.getElementById('navToggle').addEventListener('click', function() {
    var nav = document.getElementById('navbarNav');
    if (nav.style.display === 'block') {
        nav.style.display = 'none';
    } else {
        nav.style.display = 'block';
    }
});
</script>

        <!-- Header Start -->
        <!-- <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4">Find A <span class="text-primary">Perfect Home</span> To Live With Your Family</h1>
                    <p class="animated fadeIn mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet
                        sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p>
                    <a href="" class="btn btn-primary py-3 px-5 me-3 animated fadeIn">Get Started</a>
                </div>
                <div class="col-md-6 animated fadeIn">
                    <div class="owl-carousel header-carousel">
                        <div class="owl-carousel-item">
                            <img class="img-fluid" src="img/carousel-1.jpg" alt="">
                        </div>
                        <div class="owl-carousel-item">
                            <img class="img-fluid" src="img/carousel-2.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
     -->

    <x-flash-message />
   
    @yield('content')

    @isset($slot)
        {{ $slot }}
    @endisset
@endsection
