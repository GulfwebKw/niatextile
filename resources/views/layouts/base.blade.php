<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ app()->getLocale() == "en" ? $setting->title_en : $setting->title_ar }} @hasSection('title')  | @yield("title") @endif</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield("head")

    <!--favicon icon-->
    <link rel="icon" href="{{ asset('storage/'.$setting->logo) }}" type="image/png" sizes="32x32" />

    <!-- Add Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">

    <!-- CSS -->
    @if(app()->getLocale() == "en")
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}" media="all">
    @else
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/armain.css') }}" media="all">
    @endif


    <!-- Mobile Menu -->
    <link href="{{ asset('assets/menu/mobile_menu.css') }}" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="{{ asset('assets/menu/menu.js') }}"></script>


</head>
<body>
<div class="wrapper">
    <div class="content">

        <!-- Header -->
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-12 col-md-12 text-center">
                        <nav class="tab-bar desk_hide m_show">
                            <a href="#" class="slide-menu-open"><img src="assets/img/menu.svg" alt="" title="Menu"></a>
                            <div class="side-menu-overlay" style="width: 0px; opacity: 0;"></div>
                            <div class="side-menu-wrapper">
                                <a href="#" class="menu-close">&times;</a>

                                <ul>
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="aboutus.html">About us</a></li>
                                    <li><a href="product.html">Products</a></li>
                                    <li><a href="news.html">News</a></li>
                                    <li><a href="contact.html">Contact us</a></li>
                                    <li><a href="arindex.html" class="arabic">العربية</a></li>
                                </ul>
                            </div>
                        </nav>
                        <img src="{{ asset('storage/'.$setting->logo) }}" alt="" class="logo"></div>

                    <div class="col-12 col-lg-12 col-md-12 text-center">
                        <div class="menu m_hide desk_show">
                            <a href="index.html" class="menu_active">Home</a>
                            <a href="aboutus.html">About us</a>
                            <a href="product.html">Products</a>
                            <a href="news.html">News</a>
                            <a href="contact.html">Contacts us</a>
                            <a href="arindex.html" class="arabic">العربية</a>
                        </div>

                    </div>
                </div>
            </div>
        </header>



        @hasSection('breadcrumb')
            <!--===== WElCOME STARTS=======-->
            <div class="welcomeabout-area">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="welcomeaboiut2 text-center">
                            <h1 class="font-lora font-60 lineh-64 weight-500 color margin-b24">@yield("title")</h1>
                            <p class="font-20 weight-500 font-ks lineh-20 color">
                                <a href="{{ route('home') }}" class="color">Home</a>
                                @yield("breadcrumb")
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!--===== WElCOME END=======-->
        @endif

        @hasSection('body')
            @yield("body")
        @endif



    </div>
        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">

                    <div class="col-12 col-md-6 col-lg-6">
                        <h4 class="signup_title">{{ __('Sign_Up_Get_Latest_Update') }}</h4>
                        <p>{{ __('Subscribe_newsletter') }}</p>
                    </div>

                    <div class="col-12 col-md-6 col-lg-6 text-right">
                        <input type="text" class="sub_input" placeholder="{{ __('Enter_email_address') }}"><button class="sub_button">
                        {{ __('Subscribe Now') }}</button>
                    </div>

                </div>
            </div>


            <div class="copyright">
                <div class="row g-0">
                    <div class="col-12 col-lg-12 col-md-12 mb-20">
                        <div class="social">
                            @foreach($setting->socials as $social)
                            <a href="{{ $social['link'] }}"><img src="{{ asset('assets/img/'.$social['icon'] ) }}" alt="{{ $social['help'] }}"></a>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-12 col-lg-12 col-md-12">{{ __('copyright' , ['date' => now()->format('Y')]) }}</div>
                </div>
            </div>
        </footer>
    </div>

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/marquee.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/carousel.js') }}"></script>

@yield("footerScript")
</body>
</html>
