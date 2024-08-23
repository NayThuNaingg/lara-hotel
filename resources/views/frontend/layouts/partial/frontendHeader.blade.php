<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sona Template">
    <meta name="keywords" content="Sona, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ getSiteSetting() !== null ? getSiteSetting()->name : '' }}</title>
    <link rel="shortcut icon" href="{{ URL::asset('assets/logo/logo.png') }}" style="width: 100px;height:100px;" alt="Logo" type="image/x-icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{URL::asset('assets/frontend/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('assets/frontend/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('assets/frontend/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('assets/frontend/css/flaticon.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('assets/frontend/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('assets/frontend/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('assets/frontend/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('assets/frontend/css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('assets/frontend/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('assets/frontend/css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('assets/backend/extensions/sweetalert2/sweetalert2.min.css')}}">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Section Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="canvas-open">
        <i class="icon_menu"></i>
    </div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="icon_close"></i>
        </div>
        <div class="search-icon  search-switch">
            <i class="icon_search"></i>
        </div>
        <div class="header-configure-area">
            <div class="language-option">
                <img src="{{URL::asset('assets/frontend/img/flag.jpg')}}" alt="">
                <span>EN <i class="fa fa-angle-down"></i></span>
                <div class="flag-dropdown">
                    <ul>
                        <li><a href="#">Zi</a></li>
                        <li><a href="#">Fr</a></li>
                    </ul>
                </div>
            </div>
            <a href="#" class="bk-btn">Booking Now</a>
        </div>
        <nav class="mainmenu mobile-menu">
            <ul>
                <li class="active"><a href="{{route('indexForm')}}">Home</a></li>
                <li><a href="./rooms.html">Rooms</a></li>
                <li><a href="./about-us.html">About Us</a></li>
                <li><a href="./pages.html">Pages</a>
                    <ul class="dropdown">
                        <li><a href="./room-details.html">Room Details</a></li>
                        <li><a href="#">Deluxe Room</a></li>
                        <li><a href="#">Family Room</a></li>
                        <li><a href="#">Premium Room</a></li>
                    </ul>
                </li>
                <li><a href="./blog.html">News</a></li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="top-social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-tripadvisor"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>
        <ul class="top-widget">
            <li><i class="fa fa-phone"></i>{{ getSiteSetting() !== null ? getSiteSetting()->outline_phone : '' }}</li>
            <li><i class="fa fa-envelope"></i>{{ getSiteSetting() !== null ? getSiteSetting()->email : '' }}</li>
        </ul>
    </div>
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="top-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="tn-left">
                            <li><i class="fa fa-phone"></i>{{ getSiteSetting() !== null ? getSiteSetting()->outline_phone : '' }}</li>
                            <li><i class="fa fa-envelope"></i>{{ getSiteSetting() !== null ? getSiteSetting()->email : '' }}</li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="tn-right">
                            <div class="top-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-tripadvisor"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                            <!-- <a href="{{route('getCustomerLogin')}}" class="bk-btn">Login</a> -->
                            <!-- Button trigger modal -->
                            <a type="button" class="bk-btn" data-toggle="modal" data-target="#exampleModal">Login</a>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                           <form action="" autocomplete="off">
                           <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Login Form</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required />
                                <input type="number" class="form-control mt-3" id="phone" placeholder="Phone" required />
                                <span><a>Create Account? </a></span>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Login</button>
                                </div>
                                </div>
                            </div>
                           </form>
                            </div>
                            <div class="language-option">
                                <img src="{{URL::asset('assets/frontend/img/flag.jpg')}}" alt="">
                                <span>EN <i class="fa fa-angle-down"></i></span>
                                <div class="flag-dropdown">
                                    <ul>
                                        <li><a href="#">Zi</a></li>
                                        <li><a href="#">Fr</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-item">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="./index.html">
                                <img src="{{ URL::asset('assets/logo/logo.png') }}" alt="" style="width:50px;height:50px;">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="nav-menu">
                            <nav class="mainmenu">
                                <ul>
                                    <li class="{{ request()->routeIs('indexForm') ? 'active' : '' }}"><a href="{{route('indexForm')}}">Home</a></li>
                                    <li class="{{ request()->routeIs('rooms') || request()->routeIs('rooms.*') ? 'active' : '' }}"><a href="{{route('rooms')}}">Rooms</a></li>
                                    <li><a href="./about-us.html">About Us</a></li>
                                    <li><a href="./pages.html">Pages</a>
                                        <ul class="dropdown">
                                            <li><a href="./room-details.html">Room Details</a></li>
                                            <li><a href="./blog-details.html">Blog Details</a></li>
                                            <li><a href="#">Family Room</a></li>
                                            <li><a href="#">Premium Room</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="./blog.html">News</a></li>
                                    <li><a href="./contact.html">Contact</a></li>
                                </ul>
                            </nav>
                            <div class="nav-right search-switch">
                                <i class="icon_search"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->