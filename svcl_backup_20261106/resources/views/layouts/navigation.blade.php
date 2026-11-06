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
<div class="container-fluid bg-primary text-white pt-4 pb-5 d-none d-lg-flex">
    <div class="container pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex">
                <i class="bi bi-telephone-inbound fs-2"></i>
                <div class="ms-3">
                    <h5 class="text-white mb-0">Call Now</h5>
                    
                    <span>(088) 828 5017</span>
                </div>
            </div>
            <a href="#" class="h1 text-white mb-3">SVF<span class="text-dark">CL</span></a>
            <div class="d-flex">
                <a href="mailto:st.vincentferrerclinlab@gmail.com"><i class="bi bi-envelope fs-2"></i></a>
                <div class="ms-3">
                    <h5 class="text-white mb-0">Mail Now</h5>
                    <span>st.vincentferrerclinlab@gmail.com</span>
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
            <a href="/" class="navbar-brand d-lg-none">
                <h1 class="text-primary m-0">SVF<span class="text-dark">CL</span></h1>
            </a>
            <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <!-- <div class="navbar-nav">
                    <a href="/" class="nav-item nav-link active">Home</a>
                    <a href="#about" class="nav-item nav-link">About</a>
                    <a href="#services" class="nav-item nav-link">Services</a>
                    <a href="#home-service" class="nav-item nav-link">Contact</a>
                    
                </div>     -->
                         
                
                <!-- Navbar End 
                <div class="ms-auto d-none d-lg-flex">
                    
                    <a class="btn btn-sm-square btn-primary ms-2" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm-square btn-primary ms-2" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-sm-square btn-primary ms-2" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-sm-square btn-primary ms-2" href=""><i class="fab fa-youtube"></i></a>
                </div>-->
            </div>   
            <div class="navbar-nav d-flex float-end">
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