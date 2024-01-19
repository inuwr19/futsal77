<!-- ======= Header ======= -->
<header id="header" class="header fixed-top navbar-expand-lg navbar-light w-100 py-3" data-scrollto-offset="0">
    <div class="container-fluid d-flex align-items-center justify-content-between col-xl-9 mx-auto px-0">
        <a href="{{ route('index') }}" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img src="{{ asset('customer') }}/img/logo.jpg" alt="">
            <!-- <h1>HeroBiz<span>.</span></h1> -->
        </a>
        <nav id="navbar" class="navbar ml-5 pl-5">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="px-3"><a href="{{ route('index') }}">Home</a></li>
                <li><a class="nav-link scrollto px-3" href="{{ route('book') }}">Book Now</a></li>
                <li><a class="nav-link scrollto px-3" href="{{ route('contact') }}">Contact</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle d-none"></i>
            <!-- .navbar -->
            <div class="d-flex flex-column">
                <ul class="navbar-nav flex-end align-items-center">
                    <li>|</li>
                    <li class="nav-item cart-icon-desktop">
                        <a href="{{ route('cart') }}" class="nav-link venue-cart-view-btn" style="padding-right: 16px;">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M2.75 3.24991L4.83 3.60991L5.793 15.0829C5.87 16.0199 6.653 16.7389 7.593 16.7359H18.502C19.399 16.7379 20.16 16.0779 20.287 15.1899L21.236 8.63191C21.342 7.89891 20.833 7.21891 20.101 7.11291C20.037 7.10391 5.164 7.09891 5.164 7.09891"
                                    stroke="#25282B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                                <path d="M14.125 10.7948H16.898" stroke="#25282B" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7.15435 20.2025C7.45535 20.2025 7.69835 20.4465 7.69835 20.7465C7.69835 21.0475 7.45535 21.2915 7.15435 21.2915C6.85335 21.2915 6.61035 21.0475 6.61035 20.7465C6.61035 20.4465 6.85335 20.2025 7.15435 20.2025Z"
                                    fill="#25282B" stroke="#25282B" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round">
                                </path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M18.4346 20.2025C18.7356 20.2025 18.9796 20.4465 18.9796 20.7465C18.9796 21.0475 18.7356 21.2915 18.4346 21.2915C18.1336 21.2915 17.8906 21.0475 17.8906 20.7465C17.8906 20.4465 18.1336 20.2025 18.4346 20.2025Z"
                                    fill="#25282B" stroke="#25282B" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round">
                                </path>
                            </svg>
                            <span class="cart-icon-counter">1</span>
                        </a>
                    </li>
                    @guest
                    <li class="nav-item px-2"><a class="btn-getstarted scrollto" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item"><a class="btn-getstarted scrollto " href="{{ route('register') }}">Register</a>
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- End Header -->
