<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/lib4/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/lib4/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/css4/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/css4/style.css" rel="stylesheet">
</head>

<body>



        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Admin Panel</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                    @auth
                    @if (auth()->user()->image)
                        <img class="rounded-circle" src="{{ Storage::url(auth()->user()->image) }}" alt="" style="width: 40px; height: 40px;">
                    @else
                        <img class="rounded-circle" src="{{ asset('default-profile.png') }}" alt="" style="width: 40px; height: 40px;">
                    @endif
                @else
                    <img class="rounded-circle" src="{{ asset('default-profile.png') }}" alt="" style="width: 40px; height: 40px;">
                @endauth
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                      @auth
                        <h6 class="mb-0"> {{ auth()->user()->username }}</h6>
                     @endauth
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{ route('admin.dashboard') }}" class="nav-item nav-link active"><i class="bi bi-layout-text-sidebar-reverse"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="bi bi-film"></i></i>Movies</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('admin.iinfo') }}"class="dropdown-item"><i class="bi bi-file-plus-fill"></i> Add New Movie</a>
                            <a href="{{ route('admin.movies.show') }}" class="dropdown-item"><i class="bi bi-camera-reels"></i> Added Movies</a>
                            <a href="" class="dropdown-item">DateAndTime</a>
                        </div>
                    </div>
                    <a href="widget.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Widgets</a>
                    <a href="{{ route('admin.bookings') }}" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Forms</a>
                    <a href="table.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
                    <a href="{{ route('admin.reviews') }}" class="nav-item nav-link"><i class="bi bi-pencil-square"></i></i>Reviews</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('home') }}" class="dropdown-item">Home</a>
                            <a href="signup.html" class="dropdown-item">Sign Up</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                            <a href="blank.html" class="dropdown-item">Blank Page</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
           
        <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0 d-lg-none">
    <a href="index.html" class="navbar-brand me-4">
        <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
    </a>
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>
</nav>


         


            @yield('body2')


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">SHINECINE</a>, All Right Reserved. 
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>






    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const navItems = document.querySelectorAll(".nav-item.nav-link");

        navItems.forEach(function(item) {
            item.addEventListener("click", function() {
                navItems.forEach(function(navItem) {
                    navItem.classList.remove("active");
                });
                this.classList.add("active");
            });
        });
    });
</script>







<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib4/chart/chart.min.js"></script>
    <script src="lib4/easing/easing.min.js"></script>
    <script src="lib4/waypoints/waypoints.min.js"></script>
    <script src="lib4/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib4/tempusdominus/js/moment.min.js"></script>
    <script src="lib4/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib4/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js4/main.js"></script>
</body>

</html>