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
                                    <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                                    <li><a href="{{ route('aboutUs') }}">{{ __('About us') }}</a></li>
                                    <li><a href="{{ route('products') }}">{{ __('Products') }}</a></li>
                                    <li><a href="news.html">{{ __('News') }}</a></li>
                                    <li><a href="{{ route('contactsUs') }}">{{ __('Contacts us') }}</a></li>
                                    <li><a href="{{ route('lang.switch' , app()->getLocale() == "en" ? "ar" : "en") }}" class="arabic">{{ __('OtherLang') }}</a></li>
                                </ul>
                            </div>
                        </nav>
                        <img src="{{ asset('storage/'.$setting->logo) }}" alt="" class="logo"></div>

                    <div class="col-12 col-lg-12 col-md-12 text-center">
                        <div class="menu m_hide desk_show">
                            <a href="{{ route('home') }}" @if(request()->routeIs('home')) class="menu_active" @endif>{{ __('Home') }}</a>
                            <a href="{{ route('aboutUs') }}" @if(request()->routeIs('aboutUs')) class="menu_active" @endif>{{ __('About us') }}</a>
                            <a href="{{ route('products') }}" @if(request()->routeIs('products')) class="menu_active" @endif>{{ __('Products') }}</a>
                            <a href="news.html" @if(request()->routeIs('news')) class="menu_active" @endif>{{ __('News') }}</a>
                            <a href="{{ route('contactsUs') }}" @if(request()->routeIs('contactsUs')) class="menu_active" @endif>{{ __('Contacts us') }}</a>
                            <a href="{{ route('lang.switch' , app()->getLocale() == "en" ? "ar" : "en") }}" class="arabic">{{ __('OtherLang') }}</a>
                        </div>

                    </div>
                </div>
            </div>
        </header>



        @hasSection('breadcrumb')
            <!-- Breadcrumb -->
            <section>
                <div class="bred_bg">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-lg-12 text-center">
                                <h1>@yield("title")</h1>
                                <a href="{{ route('home') }}">{{ __('Home') }}</a> <i class="bred_arrow" @if(app()->getLocale() == "ar") style="rotate: 180deg;" @endif></i> @yield("title")
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
                        <form action="{{ route('subscribe') }}" method="POST">
                            @csrf
                            <input type="text" class="sub_input" name="email_subscribe" value="{{ old('email_subscribe') }}" placeholder="{{ __('Enter_email_address') }}">
                            <button type="submit" class="sub_button">
                                {{ __('Subscribe Now') }}
                            </button>
                        </form>
                        @if(session()->has('success'))
                            <div class="alert alert-success mt-3 text-center">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        @error('email_subscribe')
                        <div class="alert alert-danger mt-3 text-center">
                            {{ $message }}
                        </div>
                        @enderror
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
