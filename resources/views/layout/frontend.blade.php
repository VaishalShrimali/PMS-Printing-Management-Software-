<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Printing</title>
    <link rel=icon href="{{ asset('front_assets/images/favicon.png') }}" sizes="20x20" type="image/png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('front_assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/nice-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/flaticon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/style.css') }}">
    <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('front_assets/css/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
</head>

<body>
    <div class="page-wrapper">

        <!-- preloader area start -->
        <!-- <div class="preloader" id="preloader"></div> -->
        <!-- preloader area end -->

        <!-- search popup start-->
        <!-- <div class="td-search-popup" id="td-search-popup">
            <form action="index.html" class="search-form">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search....." required>
                </div>
                <button type="submit" class="submit-btn"><i class="fa fa-search"></i></button>
            </form>
        </div> -->
        <!-- search popup end-->
        <div class="body-overlay" id="body-overlay"></div>


        <!--Form Back Drop-->
        <div class="form-back-drop"></div>

        <!-- Hidden Sidebar -->
        <section class="hidden-bar">
            <div class="inner-box text-center">
                <div class="cross-icon"><span class="fa fa-times"></span></div>
                <div class="title">
                    <h4>Get Login</h4>
                </div>

                <!--Appointment Form-->
                <div class="appointment-form">
                    <form id="apntmentForm" >
                        <div class="form-group">
                            <input type="email" name="loginEmail" id="loginEmail" class="form-control" value="" required placeholder="Email Address" >
                        </div>
                        <div class="form-group">
                            <input type="password" name="loginPassword" class="form-control" id="loginPassword" value="" required placeholder="Password" >
                        </div>
                        <div class="form-group">
                            <button type="button" id="loginBtnSmbt" class="theme-btn">Submit now</button>
                        </div>
                    </form>
                </div>

                <!--Social Icons-->
                <!-- <div class="social-style-one">
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                </div> -->
            </div>
        </section>
        <!--End Hidden Sidebar -->

        <!-- navbar start -->
       
        <nav class="navbar style-one navbar-area navbar-expand-lg py-20">
            <div class="container container-1570">
                <div class="responsive-mobile-menu">
                    <button class="menu toggle-btn d-block d-lg-none" data-target="#Iitechie_main_menu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-left"></span>
                        <span class="icon-right"></span>
                    </button>
                </div>
                <div class="logo">
                    <a href="index.html"><img src="/front_assets/images/logo.png" alt="img"></a>
                </div>
                <div class="nav-right-part nav-right-part-mobile">
                    <a class="search-bar-btn" href="#">
                        <i class="far fa-search"></i>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="Iitechie_main_menu">
                    <ul class="navbar-nav menu-open text-lg-end">
                        <li>
                            <a href="/">Home</a>
                        </li>
                        <li><a href="/about">about</a></li>
                        <li><a href="#footer">Contact</a></li>
                        <!-- <li><a href="/staff/dashboard">Dashboard</a></li>
                        <li><a href="/staff/logout">Contact</a></li> -->
                         <!-- <li class="menu-item-has-children">
                            <a href="#">Services</a>
                            <ul class="sub-menu">
                                <li><a href="services.html">Services One</a></li>
                                <li><a href="services2.html">Services Two</a></li>
                                <li><a href="service-details.html">Service Details</a></li>
                            </ul>
                        </li> -->
                       <!-- <li class="menu-item-has-children">
                            <a href="#">Projects</a>
                            <ul class="sub-menu">
                                <li><a href="projects.html">Projects</a></li>
                                <li><a href="project-details.html">Projects Details</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Shop</a>
                            <ul class="sub-menu">
                                <li><a href="shop.html">Shop One</a></li>
                                <li><a href="shop2.html">Shop Two</a></li>
                                <li><a href="shop3.html">Shop Three</a></li>
                                <li><a href="product-details.html">Single Product_1</a></li>
                                <li><a href="product-details2.html">Single Product_2</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Pages</a>
                            <ul class="sub-menu">
                                <li><a href="team.html">Team Members</a></li>
                                <li class="menu-item-has-children">
                                    <a href="#">Blog</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="faqs.html">FAQs</a></li>
                                <li><a href="contact.html">Contact Us</a></li>
                                <li><a href="404.html">404 Error</a></li>
                            </ul>
                        </li> -->
                    </ul>
                </div>
                <div class="nav-right-part nav-right-part-desktop">
                    <!-- <button class="search-bar-btn">
                        <i class="far fa-search"></i>
                    </button>
                    <button>
                        <i class="far fa-shopping-basket"></i>
                    </button>
                    <button>
                        <i class="far fa-heart"></i>
                    </button> -->
                    <!-- <a href="contact.html" class="theme-btn style-two">Get Started <i class="far fa-long-arrow-right"></i></a>
                    -->
                    @if(!session("STAFF_LOGIN"))
                    <div class="menu-sidebar">
                        <button>
                            <i class="far fa-ellipsis-h"></i>
                            <i class="far fa-ellipsis-h"></i>
                            <i class="far fa-ellipsis-h"></i>
                        </button>
                    </div> 
                    @endif
                </div>
            </div>
        </nav>
        <!-- navbar end -->
        @yield('content')     
        <!-- footer area start -->
        <footer class="footer-area pt-80" id="footer">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-4 col-lg-5 col-md-6">
                        <div class="widget widget_about wow fadeInUp delay-0-2s animated" style="visibility: visible; animation-name: fadeInUp;">
                            <div class="footer-logo mb-25">
                                <a href="https://www.pms.digitalwebweaver.co.uk"><img src="/front_assets/images/logo.png" alt="Logo"></a>
                            </div>
                            <p>Sai Advertising Service is a Chandigarh-based advertising company.</p>
                            <div class="social-style-two mt-15">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-dribbble"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <!--<div class="col-xl-4 col-md-6">-->
                    <!--    <div class="widget widget_nav_menu wow fadeInUp delay-0-4s">-->
                    <!--        <h4 class="widget-title">Useful Links</h4>-->
                    <!--        <ul>-->
                    <!--            <li><a href="service-details.html">Digital Printing</a></li>-->
                    <!--            <li><a href="blog.html">Latest News</a></li>-->
                    <!--            <li><a href="service-details.html">3D Printing</a></li>-->
                    <!--            <li><a href="contact.html">Need a Career?</a></li>-->
                    <!--            <li><a href="service-details.html">Printing & Design</a></li>-->
                    <!--            <li><a href="contact.html">My Account</a></li>-->
                    <!--            <li><a href="service-details.html">Ofset Printing</a></li>-->
                    <!--            <li><a href="shop.html">Shopping Cart</a></li>-->
                    <!--            <li><a href="service-details.html">Logo Design</a></li>-->
                    <!--            <li><a href="contact.html">Payment Methode</a></li>-->
                    <!--            <li><a href="service-details.html">T-Shirt Pringting</a></li>-->
                    <!--            <li><a href="faqs.html">Faqs</a></li>-->
                    <!--        </ul>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <div class="col-xl-3 col-md-6">
                        <div class="widget widget_contact_info wow fadeInUp delay-0-6s animated" style="visibility: visible; animation-name: fadeInUp;">
                            <h4 class="widget-title">Support</h4>
                            <p>Need Any Support Us! Or Work Together?</p>
                            <ul>
                                <li><i class="far fa-map-marker-alt"></i> Plot no 148, press site, industrial area phase 1, chandigarh</li>
                                <li><i class="far fa-envelope"></i> <a href="mailto:saiadvertisingservice@gmail.com">saiadvertisingservice@gmail.com</a></li>
                                <li><i class="far fa-phone"></i> <a href="calto:+000123456789">9872133902, 9888679377, 6280221560</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom mt-15 pt-25 pb-10">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="copyright-text text-center text-lg-start">
                                <p><a href="https://www.pms.digitalwebweaver.co.uk">SAS</a> Developed by <a href="https://digitalwebweaver.com/">Digital Web Weaver</a></p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="payment-method-image mb-15 text-center text-lg-end">
                                <a href="#"><img src="/front_assets/images/footer/payment-method.png" alt="Payment Method"></a>
                            </div>
                        </div>
                    </div>

                    <!-- back to top area start -->
                    <div class="back-to-top" style="display: block;">
                        <span class="back-top"><i class="fa fa-angle-up"></i></span>
                    </div>
                    <!-- back to top area end -->
                </div>
            </div>
        </footer>
        <!-- footer area end -->


    </div>
    <!--End pagewrapper-->

    <!-- all plugins here -->
    <script src="{{ asset('front_assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/appear.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/imageload.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/circle-progress.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/skill.bars.jquery.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/wow.min.js') }}"></script>
    <!-- <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>-->

    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script> 
    <!-- main js  -->
    <script src="{{ asset('front_assets/js/main.js') }}"></script>
    <script src="{{ asset('front_assets/js/sweetalert2/sweetalert2.min.js') }}"></script>
  
    @yield('js')
    @if(session("msg"))
    <script>
        var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
        });
        Toast.fire({
        icon: '{{session("icon")}}',
        title: '&nbsp;{{session("msg")}}'
        });
    </script>
    @endif
</body>

</html>
