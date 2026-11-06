<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
        <script>
        function setCookie(cname,cvalue,exdays) {
        const d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        let expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }

        function getCookie(cname) {
        let name = cname + "=";
        let decodedCookie = decodeURIComponent(document.cookie);
        let ca = decodedCookie.split(';');
        for(let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
            c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
            }
        }
        return "";
        }

        function checkCookie() {

            alert("By using our website you agree to our Cookie Policy.")
            

        // let user = getCookie("username");
        // if (user != "") {
        //     alert("Welcome again " + user);
        // } else {
        //     user = prompt("Please enter your name:","");
        //     if (user != "" && user != null) {
        //     setCookie("username", user, 30);
        //     }
        // }
        }
        </script>
      <meta charset="utf-8">
      <title>SVCFL</title>
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <meta content="" name="keywords">
      <meta content="" name="description">

      <!-- Favicon -->
      <link href="{{ asset('img/favicon.ico') }}" rel="icon">

      <!-- Google Web Fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Red+Rose:wght@600;700&display=swap"
          rel="stylesheet">

      <!-- Icon Font Stylesheet -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

      <!-- Libraries Stylesheet -->
      <link href="{{ asset('lib/animate/animate.min.css')}}" rel="stylesheet">
      <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

      <!-- Customized Bootstrap Stylesheet -->
      <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

      <!-- Template Stylesheet -->
      <link href="{{ asset('css/style.css')}}" rel="stylesheet">

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.css">

    </head>
    <body >
      <!-- Spinner Start -->
      <div id="spinner"
          class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
          <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
      </div>
      <!-- Spinner End -->

      <!-- Topbar Start -->
      <div class="container-fluid py-2 d-none d-lg-flex">
        <div class="container">
            <div class="d-flex justify-content-between">
                <div>
                    <small class="me-3"><i class="fa fa-map-marker-alt me-2"></i>G. La Viña St. 8709 Valencia, Philippines</small>
                    <small class="me-3"><i class="fa fa-clock me-2"></i>Mon-Sat 09am-5pm, Sun Closed</small>
                </div>
                <nav class="breadcrumb mb-0">
                    <a class="breadcrumb-item small text-body" href="#">Career</a>
                    <a class="breadcrumb-item small text-body" href="#">Support</a>
                    <a class="breadcrumb-item small text-body" href="#">Terms</a>
                    <a class="breadcrumb-item small text-body" href="#">FAQs</a>
                </nav>
            </div>
        </div>
      </div>
      <!-- Topbar End -->

      <!-- Brand Start -->
      <div class="container-fluid bg-primary text-white pb-3 d-none d-lg-flex">
        <div class="container pb-2">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex">
                <a href="tel:(088) 828 5017"><i class="bi bi-telephone-inbound fs-2"></i></a>
                    <div class="ms-3">
                        <h5 class="text-white mb-0">Call Now</h5>
                        <a href="tel:(088) 828 5017">(088) 828 5017</a>
                    </div>
                </div>
                <a href="#" class="h1 text-white mb-2"><img src="/img/4.png" class="img-logo me-3 img-responsive" alt="SVFCL Logo" /></a>
                <div class="d-flex">
                    
                    <a href="mailto:st.vincentferrerclinlab@gmail.com"><i class="bi bi-envelope fs-2"></i></a>
                    <div class="ms-3">
                        <h5 class="text-white mb-0">Mail Now</h5>
                        <a href="mailto:st.vincentferrerclinlab@gmail.com"><span>st.vincentferrerclinlab@gmail.com</span></a>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <!-- Brand End -->

      <!-- Navbar Start -->
      <div class="container-fluid sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-white py-lg-0 px-lg-3">
                <a href="#" class="navbar-brand d-lg-none">
                        <img src="/img/4.png" class="img-logo me-3 img-responsive" alt="SVFCL Logo" />
                </a>
                <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="#" class="nav-item nav-link active">Home</a>
                        <a href="#about" class="nav-item nav-link">About</a>
                        <a href="#services" class="nav-item nav-link">Services</a>
                        <a href="#home-service" class="nav-item nav-link">Contact</a>
                        
                    </div>    
                            
                    
                    <!-- Navbar End 
                    <div class="ms-auto d-none d-lg-flex">
                        
                        <a class="btn btn-sm-square btn-primary ms-2" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-sm-square btn-primary ms-2" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-sm-square btn-primary ms-2" href=""><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-sm-square btn-primary ms-2" href=""><i class="fab fa-youtube"></i></a>
                    </div>-->
                </div>   
                <div class="navbar-nav d-flex float-right">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="nav-item nav-link float-end">
                                Dashboard
                            </a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
                                <div class="dropdown-menu bg-light m-0">
                                    <a href="{{ route('profile.edit') }}" class="dropdown-item">{{ __('Profile') }}</a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </div>
                            </div>
                            
                        @else
                            <a href="{{ route('login') }}" class="nav-item nav-link float-end">
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="nav-item nav-link float-end">
                                    Register
                                </a>
                            @endif
                        @endauth
                    @endif
                </div> 
                
                
            </nav>
        </div>
      </div>
      <!-- Navbar End -->
    
      <!-- Carousel Start -->
      @include('layouts.carousel')
      <!-- Carousel End -->

    <!-- Features Start -->
    <div class="container-fluid py-5">
            <div class="container">
                <div class="row g-0 feature-row d-flex">
                    <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                    <!-- <div id="reader" width="600px"></div> -->
                    <a href="{{ url('express-diagnostics') }}">
                        <div class="feature-item border h-100 p-5">
                            <div class="icon-box-primary mb-4 ">
                                <i class="bi bi-heart-pulse "></i> 
                            </div>
                            <h5 class="mb-3 mt-3">Express Diagnostics</h5> 
                            <!-- <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tellus augue.</p> -->
                        </div>
                    </a>
                    </div>
                    <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.3s">
                    <a href="lab-results">
                        <div class="feature-item border h-100 p-5">
                            <div class="icon-box-primary mb-4">
                                <i class="bi bi-clipboard-pulse"></i>
                            </div>
                            <h5 class="mb-3">Express Lab Results</h5>
                            <!-- <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tellus augue.</p> -->
                        </div>
                    </a>
                    </div>
                    <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.7s">
                    <a href="/company-services">
                        <div class="feature-item border h-100 p-5">
                            <div class="icon-box-primary mb-4">
                                <i class="bi bi-building-fill-gear text-primary"></i>
                            </div>
                            <h5 class="mb-3">Company Services</h5>
                            <!-- <p class="mb-0 text-primary">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tellus augue.</p> -->
                        </div>
                    </a>
                    </div>
                    <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
                    <a href="/home-service">
                        <div class="feature-item border h-100 p-5">
                            <div class="icon-box-primary mb-4">
                                    <i class="bi bi-house-gear-fill text-primary"></i><i class="bi bi-virus2"></i>
                            </div>
                            <h5 class="mb-3">Home Service</h5>
                            <!-- <p class="mb-0 text-primary">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tellus augue.</p> -->
                        </div>
                    </a>
                    </div>
                </div>
            </div>
    </div>
    <!-- Features End -->

      <!-- About Start -->
      @include('layouts.about')
      <!-- About End -->


      <!-- Features Start -->
      @include('layouts.features2')
      <!-- Features End -->


      <!-- Video Modal Start -->
      @include('layouts.video-modal')
      <!-- Video Modal End -->


      <!-- Service Start -->
      @include('layouts.service')
      <!-- Service End -->

      <!-- Appoinment Start -->
      @include('layouts.appointment')
      <!-- Appoinment Start -->

      <!-- Team Start -->
      @include('layouts.team')
      <!-- Team End -->


      <!-- Testimonial Start -->
      @include('layouts.Testimonial')
      <!-- Testimonial End -->


      <!-- Footer and copyright section start -->
      @include('layouts.footer')
      <!-- Footer and copyright section start -->


    <!-- START Bootstrap-Cookie-Alert -->
    <div class="alert text-center cookiealert" role="alert">
        &#x1F36A; We use cookies to ensure you get the best experience on our website. <a href="#" target="_blank">Privacy Policy</a>

        <button type="button" class="btn btn-primary btn-sm acceptcookies">
            I agree
        </button>
    </div>
    <!-- END Bootstrap-Cookie-Alert -->
       
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <!-- include the library -->
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <!-- include the library - cookie Alert! -->
    <script src="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/dark-mode.js')}}"></script>
    </body>
    <script>
       window.addEventListener("cookieAlertAccept", function() {
            alert("cookies accepted")
        })
    </script>
</html>
