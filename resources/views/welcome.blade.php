@extends('layouts.base')


@section('body')
    <!-- Slideshow -->
    <section>
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($setting->slider as $slider)
                <div class="carousel-item @if($loop->first) active @endif">
                    <img src="{{ asset('storage/'. $slider['image']) }}" class="d-block w-100 my_slide" alt="{{ app()->getLocale() == "en" ? $setting->title_en : $setting->title_ar }}">
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <!-- Our Products -->
    <section class="section-gap">
        <div class="container">
            <div class="row">
                <!-- Title -->
                <div class="col-12 col-md-12 col-lg-12">
                    <h2 class="about-title">{{ __('Our Products') }}</h2>
                    <p class="sub_title mb-50">{{ __('our_product_details') }}</p>
                </div>

                <div class="marquee">
                    <div class="marquee--inner">
                        <div class="row">

                            @foreach(\App\Models\Product::query()->where('is_active',true)->where('use_inside_homepage',true)->orderBy('ordering')->get() as $product)
                            <div class="my_card">
                                <a href="#"><img src="{{ asset('storage/'.$product->vertical_image) }}" alt="">
                                    <span class="transition overlay">
                                    <h5>{{ $product->title }}</h5>
                                    <p>{!! $product->content !!}</p>
                                  </span>
                                </a>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- About Nia -->
    <section class="section-gap about_bg">
        <div class="container">
            @foreach(\App\Models\aboutSection::query()->where('is_active',true)->where('use_inside_homepage',true)->orderBy('ordering')->get() as $section)
            <div class="row item-center">
                <div class="col-12 col-md-6 col-lg-6 d-none d-lg-block">
                    <img src="{{ asset('storage/'.$section->image) }}" alt="{{ $section->title }}">
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="m-80">
                        <h2 class="about-title">{{ $section->title }}</h2>
                        <div class="my_list">
                            {!! $section->content !!}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 d-block d-lg-none">
                    <img src="{{ asset('storage/'.$section->image) }}" alt="{{ $section->title }}">
                </div>
            </div>
            @endforeach
        </div>
    </section>

    @if( $setting->video )
    <!-- Video -->
    <section class="section-gap">
        <div class="container-fluid">
            <div class="row">
                <h2 class="about-title text-center mb-50">{{ __('watch_video') }}</h2>
                <video playsinline poster="{{ asset('assets/img/video.png') }}" controls class="video">
                    <source src="{{ asset('storage/'.$setting->video) }}" type="video/mp4">
                </video>
            </div>
        </div>
    </section>
    @endif


    @if( $setting->instagram_active )
    <!-- Follow us Instagram -->
    <section class="section-gap-b0 about_bg">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <h2 class="about-title text-center mb-50">{{ __('follow_instagram' , ['username' => $setting->instagram_username ]) }}</h2>
                    <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">

                        <div class="MultiCarousel-inner">
                            <div class="item">
                                <a href="#"><img src="assets/img/01.png" alt=""></a>
                            </div>
                        </div>

                        <button class="leftLst"><img src="{{ asset('assets/img/left.png') }}" alt="" class="img-auto"></button>
                        <button class="rightLst"><img src="{{ asset('assets/img/right.png') }}" alt="" class="img-auto"></button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Partners -->
    <section class="section-gap">
        <div class="container">
            <div class="row client">
                <div class="col-12 col-md-12 col-lg-12"><h2 class="about-title mb-50">{{ __('Our Clients') }}</h2></div>

                @foreach($setting->clients as $client)
                <div class="col-6 col-md-2 col-lg-2">
                    <a @if($client['link']) href="{{ $client['link'] }}" @else href="#" @endif><img src="{{ asset('storage/'.$client['image']) }}" alt=""></a>
                </div>
                @endforeach

            </div>
        </div>
    </section>

@endsection

