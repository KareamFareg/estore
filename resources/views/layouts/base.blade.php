<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/flexslider.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/chosen.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/color-01.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" integrity="sha512-aEe/ZxePawj0+G2R+AaIxgrQuKT68I28qh+wgLrcAJOz3rxCP+TwrK5SPN+E5I+1IQjNtcfvb96HDagwrKRdBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/12.0.0/nouislider.min.css" integrity="sha512-kSH0IqtUh1LRE0tlO8dWN7rbmdy5cqApopY6ABJ4U99HeKulW6iKG5KgrVfofEXQOYtdQGFjj2N/DUBnj3CNmQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @livewireStyles
</head>
<body class="home-page home-01">

<!-- mobile menu -->
<div class="mercado-clone-wrap">
    <div class="mercado-panels-actions-wrap">
        <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
    </div>
    <div class="mercado-panels"></div>
</div>

<!--header-->
<header id="header" class="header header-style-1">
    <div class="container-fluid">
        <div class="row">
            <div class="topbar-menu-area">
                <div class="container">
                    <div class="topbar-menu left-menu">
                        <ul>
                            <li class="menu-item" >
                                <a title="Hotline: (+20) 1200558649" href="#footer" ><span class="icon label-before fa fa-mobile"></span>Hotline: (+20) 1200558649</a>
                            </li>
                        </ul>
                    </div>
                    <div class="topbar-menu right-menu">
                        <ul>
                            @auth
                                <li class="dropdown dropdown-notification nav-item  dropdown-notifications">
                                    <a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
                                        <i class="fa fa-bell"> </i>
                                        <span
                                                class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow   notif-count"
                                                data-count="9">9</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                        <li class="dropdown-menu-header">
                                            <h6 class="dropdown-header m-0 text-center">
                                                <span class="grey darken-2 text-center"> Messages</span>
                                            </h6>
                                        </li>
                                        <li class="scrollable-container ps-container ps-active-y media-list w-100">
                                            <a href="">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h6 class="media-heading text-right ">notification address</h6>
                                                        <p class="notification-text font-small-3 text-muted text-right">Content</p>
                                                        <small style="direction: ltr;">
                                                            <p class=" text-muted text-right"
                                                               style="direction: ltr;"> 20-05-2020 - 06:00 pm
                                                            </p>
                                                            <br>

                                                        </small>
                                                    </div>
                                                </div>
                                            </a>

                                        </li>
                                        <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center"
                                                                            href=""> جميع الاشعارات </a>
                                        </li>
                                    </ul>
                                </li>
                            @endauth
                            <li class="menu-item lang-menu menu-item-has-children parent">
                                <a title="English"><span class="img label-before"><img src="{{asset('assets/images/lang-en.png')}}" alt="lang-en"></span>English<i class="fa fa-angle-down" aria-hidden="true"></i></a>

                            </li>
                            <li class="menu-item menu-item-has-children parent" >
                                <a title="Dollar (USD)" >Dollar (USD)<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                            </li>
                            @if(Route::has('login'))

                                @auth
                                    @if(Auth::user()->utype === 'ADM')
                                        <li class="menu-item menu-item-has-children parent" >
                                            <a title="My Account" href="{{route('admin.dashboard')}}">
                                                <img src="{{asset('assets/images/users')}}/{{Auth::user()->profile_photo_path}}" width="32px" height="32px" style="border-radius: 50%">
                                                My Account {{Auth::user()->name}}<i class="fa fa-angle-down" aria-hidden="true">
                                                </i></a>
                                            <ul class="submenu" >
                                                <li class="menu-item" >
                                                    <a title="Dashboard" href="{{route('admin.dashboard')}}">Dashboard</a>
                                                </li>
                                                <li class="menu-item" >
                                                    <a  href="{{route('admin.category')}}">Categories</a>
                                                </li>
                                                <li class="menu-item" >
                                                    <a  href="{{route('admin.products')}}">Products</a>
                                                </li>
                                                <li class="menu-item" >
                                                    <a  href="{{route('admin.homeslider')}}">Home Slider</a>
                                                </li>
                                                <li class="menu-item" >
                                                    <a  href="{{route('admin.homecategory')}}">Manage Home Categories</a>
                                                </li>
                                                <li class="menu-item" >
                                                    <a  href="{{route('admin.sale')}}">Sale Settings </a>
                                                </li>
                                                <li class="menu-item" >
                                                    <a  href="{{route('admin.coupons')}}">All Coupons </a>
                                                </li>
                                                <li class="menu-item" >
                                                    <a title="All Orders" href="{{route('admin.orders')}}">All Orders </a>
                                                </li>
                                                <li class="menu-item" >
                                                    <a title="Contacts" href="{{route('admin.contacts')}}">All Contacts </a>
                                                </li>
                                                <li class="menu-item" >
                                                    <a title="Settings" href="{{route('admin.settings')}}">Settings </a>
                                                </li>
                                                <li class="menu-item" >
                                                    <a title="Privileges" href="{{route('admin.privileges')}}">Privileges </a>
                                                </li>
                                                <li class="menu-item" >
                                                    <a title="Email Configuration" href="{{route('configuration.store')}}">Email Configuration </a>
                                                </li>
                                                <li class="menu-item" >
                                                    <a  href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                                </li>
                                                <form id="logout-form" method="POST" action="{{route('logout')}}">
                                                    @csrf
                                                </form>
                                            </ul>
                                        </li>
                                    @else
                                        <li class="menu-item menu-item-has-children parent" >
                                            <a title="My Account" href="{{route('user.dashboard')}}">
                                                <img src="{{asset('assets/images/users')}}/{{Auth::user()->profile_photo_path}}" width="32px" height="32px" style="border-radius: 50%">
                                                My Account {{Auth::user()->name}}<i class="fa fa-angle-down" aria-hidden="true">
                                                </i></a>

                                            <ul class="submenu" >
                                                <li class="menu-item" >
                                                    <a title="Dashboard" href="{{route('user.dashboard')}}">Dashboard</a>
                                                </li>
                                                <li class="menu-item" >
                                                    <a title="My Orders" href="{{route('user.orders')}}">My Orders</a>
                                                </li>
                                                <li class="menu-item" >
                                                    <a title="Change Password" href="{{route('user.changePassword')}}">Change Password</a>
                                                </li>
                                                <li class="menu-item" >
                                                    <a  href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                                </li>
                                                <form id="logout-form" method="POST" action="{{route('logout')}}">
                                                    @csrf
                                                </form>
                                            </ul>
                                        </li>
                                    @endif

                                @else
                                    <li class="menu-item" ><a title="Register or Login" href="{{route('login')}}">Login</a></li>
                                    <li class="menu-item" ><a title="Register or Login" href="{{route('register')}}">Register</a></li>

                                @endif
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="mid-section main-info-area">

                    <div class="wrap-logo-top left-section">
                        <a href="/home" class="link-to-home"><img src="{{asset('assets/images/brands/logo.jpg')}}" alt="mercado"></a>
                    </div>

                    @livewire('header-search-component')

                    <div class="wrap-icon right-section">
                        @livewire('wish-list-count-component')
                        
                        @livewire('cart-count-component')

                        <div class="wrap-icon-section show-up-after-1024">
                            <a href="#" class="mobile-navigation">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="nav-section header-sticky" >
                <div class="header-nav-section">
                    <div class="container" >
                        <ul class="nav menu-nav clone-main-menu" id="mercado_haead_menu" data-menuname="Sale Info" style="padding-left: 100px">
                            <li class="menu-item"><a href="{{route('product.toponsale')}}" class="link-term">Hot Sale items</a><span class="nav-label hot-label">hot</span></li>
                            <li class="menu-item"><a href="{{route('product.topnew')}}" class="link-term">Top new items</a><span class="nav-label hot-label">hot</span></li>
                            <li class="menu-item"><a href="{{route('product.topordered')}}" class="link-term">Top Selling</a><span class="nav-label hot-label">hot</span></li>
                            <li class="menu-item"><a href="{{route('product.topreviewed')}}" class="link-term">Top Reviewed Items</a><span class="nav-label hot-label">hot</span></li>
                        </ul>
                    </div>
                </div>

                <div class="primary-nav-section">
                    <div class="container">
                        <ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu" >
                            <li class="menu-item home-icon">
                                <a href="/" class="link-term mercado-item-title"><i class="fa fa-home" aria-hidden="true"></i></a>
                            </li>
                            <li class="menu-item">
                                <a href="#footer" class="link-term mercado-item-title">About Us</a>
                            </li>
                            <li class="menu-item">
                                <a href="/shop" class="link-term mercado-item-title">Shop</a>
                            </li>
                            <li class="menu-item">
                                <a href="/cart" class="link-term mercado-item-title">Cart</a>
                            </li>
                            <li class="menu-item">
                                <a href="/checkout" class="link-term mercado-item-title">Checkout</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('contact-us')}}" class="link-term mercado-item-title">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

{{$slot}}

<footer id="footer">
    <div class="wrap-footer-content footer-style-1">

        <div class="wrap-function-info">
            <div class="container">
                <ul>
                    <li class="fc-info-item">
                        <i class="fa fa-truck" aria-hidden="true"></i>
                        <div class="wrap-left-info">
                            <h4 class="fc-name">Free Shipping</h4>
                            <p class="fc-desc">Free On Oder Over $99</p>
                        </div>

                    </li>
                    <li class="fc-info-item">
                        <i class="fa fa-recycle" aria-hidden="true"></i>
                        <div class="wrap-left-info">
                            <h4 class="fc-name">Guarantee</h4>
                            <p class="fc-desc">30 Days Money Back</p>
                        </div>

                    </li>
                    <li class="fc-info-item">
                        <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                        <div class="wrap-left-info">
                            <h4 class="fc-name">Safe Payment</h4>
                            <p class="fc-desc">Safe your online payment</p>
                        </div>

                    </li>
                    <li class="fc-info-item">
                        <i class="fa fa-life-ring" aria-hidden="true"></i>
                        <div class="wrap-left-info">
                            <h4 class="fc-name">Online Suport</h4>
                            <p class="fc-desc">We Have Support 24/7</p>
                        </div>

                    </li>
                </ul>
            </div>
        </div>
        <!--End function info-->

        @livewire('footer-component')

        <div class="coppy-right-box">
            <div class="container">
                <div class="coppy-right-item item-left">
                    <p class="coppy-right-text">Copyright © 2020 Karim Fareg E-Store Website. All rights reserved</p>
                </div>
                <div class="coppy-right-item item-right">
                    <div class="wrap-nav horizontal-nav">
                        <ul>
                            <li class="menu-item"><a href="about-us.html" class="link-term">About us</a></li>
                            <li class="menu-item"><a href="privacy-policy.html" class="link-term">Privacy Policy</a></li>
                            <li class="menu-item"><a href="terms-conditions.html" class="link-term">Terms & Conditions</a></li>
                            <li class="menu-item"><a href="return-policy.html" class="link-term">Return Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</footer>

<script src="{{asset('assets/js/jquery-1.12.4.minb8ff.js?ver=1.12.4')}}"></script>
<script src="{{asset('assets/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.flexslider.js')}}"></script>
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.sticky.js')}}"></script>
<script src="{{asset('assets/js/functions.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha512-GDey37RZAxFkpFeJorEUwNoIbkTwsyC736KNSYucu1WJWFK9qTdzYub8ATxktr6Dwke7nbFaioypzbDOQykoRg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/12.0.0/nouislider.min.js" integrity="sha512-6vo59lZMHB6GgEySnojEnfhnugP7LR4qm6akxptNOw/KW+i9o9MK4Gaia8f/eJATjAzCkgN3CWlIHWbVi2twpg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.tiny.cloud/1/g3mlj4o1aovzgk0hazu9q958q9mj9tcjrdn8p2wgzy3fl24j/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('fa4a3579abd95c5afe50', {
        cluster: 'mt1'
    });
</script>
@livewireScripts

@stack('scripts')

</body>
</html>