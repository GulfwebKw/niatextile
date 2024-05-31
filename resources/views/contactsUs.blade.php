@extends('layouts.base')

@section('title')
    {{ __('Contacts us') }}
@endsection


@section('breadcrumb' , true)

@section('body')
    <!-- Our Products -->
    <section class="section-gap">
        <div class="container">
            <div class="row">
                <!-- Address -->

                <h3 class="text-center mb-50">{{ __('contact_us_line_1') }}<br>{{ __('contact_us_line_2') }}</h3>

                    <div class="col-12 col-md-7 col-lg-7">
                        <h3>{{ __('Address') }}</h3>

                        <div class="contact_info">
                            <div class="icon-con"><i class="contact_location"></i></div>
                            <div><span>{{ __('Nia Tex') }}</span>
                                <h6>{{ app()->getLocale() == "en" ? $setting->main_address_en : $setting->main_address_ar }}</h6></div>
                        </div>

                        <div class="contact_info">
                            <div class="icon-con"><i class="contact_call"></i></div>
                            <div><span>{{ __('Have any question?') }}</span>
                                <h6>{{ __('Call') }} @foreach($setting->main_address_phones as $phone) @if(! $loop->first), @endif {{ $phone['phone'] }} @endforeach</h6></div>
                        </div>

                        <div class="contact_info">
                            <div class="icon-con"><i class="contact_mail"></i></div>
                            <div><span>{{ __('Write Email') }}</span>
                                <h6><a href="mailto:{{ $setting->main_address_email }}">{{ $setting->main_address_email }}</a></h6></div>
                        </div>

                        <div class="clear30x"></div>

                        <h3>{{ __('Other Branches') }}</h3>
                        <div class="clear20x"></div>

                        @foreach($setting->branches as $branche)
                        <div class="contact_info">
                            <div class="icon-con"><i class="contact_location"></i></div>
                            <div><h5>{{ $branche['title_'.app()->getLocale()] }}</h5>
                                <h6>{{ $branche['address_'.app()->getLocale()] }}</h6>
                                <h6>{{ __('Call') }} @foreach($branche['phones'] as $phone) @if(! $loop->first), @endif {{ $phone['phone'] }} @endforeach</h6></div>
                        </div>
                        @endforeach

                        @foreach($setting->branches_other_country as $branche)
                        <div class="clear30x"></div>

                        <h3>{{ __('Our Branch in') }} {{$branche['country_name_'.app()->getLocale()]}}</h3>
                        <div class="clear20x"></div>

                        <div class="contact_info">
                            <div class="icon-con"><i class="contact_location"></i></div>
                            <div><span>{{ __('Nia for Trading') }}</span>
                                <h6>{{$branche['address_'.app()->getLocale()]}}</h6></div>
                        </div>

                        <div class="contact_info">
                            <div class="icon-con"><i class="contact_call"></i></div>
                            <div><span>{{ __('Have any question?') }}</span>
                                <h6>{{ __('Call') }} @foreach($branche['phones'] as $phone) @if(! $loop->first), @endif {{ $phone['phone'] }} @endforeach</h6></div>
                        </div>
                        @endforeach

                    </div>

                    <!-- Contact form -->
                    <div class="col-12 col-md-5 col-lg-5">
                        <h3 class="mb-20">{{ __('Send Message') }}</h3>
                        @if(session()->has('success2'))
                            <div class="alert alert-success mb-3 text-center">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        @error('email')
                        <div class="alert alert-danger mb-3 text-center">
                            {{ $message }}
                        </div>
                        @enderror
                        @error('name')
                        <div class="alert alert-danger mb-3 text-center">
                            {{ $message }}
                        </div>
                        @enderror
                        @error('subject')
                        <div class="alert alert-danger mb-3 text-center">
                            {{ $message }}
                        </div>
                        @enderror
                        @error('message')
                        <div class="alert alert-danger mb-3 text-center">
                            {{ $message }}
                        </div>
                        @enderror
                        <form action="{{ route('contactsUsSend') }}" method="POST">
                            @csrf
                            <input type="text" class="my_input" name="trade_account_number" value="{{ old('trade_account_number') }}" placeholder="{{ __('Trade_Account') }}" onblur="this.placeholder='{{ __('Trade_Account') }}'" onfocus="this.placeholder=''">

                            <input type="text" class="my_input" name="business_name" value="{{ old('business_name') }}" placeholder="{{ __('business_name') }}" onblur="this.placeholder='{{ __('business_name') }}'" onfocus="this.placeholder=''">

                            <input type="text" class="my_input" name="name" value="{{ old('name') }}" placeholder="{{ __('Name *') }}" onblur="this.placeholder='{{ __('Name *') }}'" onfocus="this.placeholder=''">

                            <input type="email" class="my_input" name="email" value="{{ old('email') }}" placeholder="{{ __('Email *') }}" onblur="this.placeholder='{{ __('Email *') }}'" onfocus="this.placeholder=''">

                            <input type="text" class="my_input" name="subject" value="{{ old('subject') }}" placeholder="{{ __('Subject *') }}" onblur="this.placeholder='{{ __('Subject *') }}'" onfocus="this.placeholder=''">

                            <textarea type="text" rows="6" class="my_input" name="message" placeholder="{{ __('Message *') }}" onblur="this.placeholder='{{ __('Message *') }}'" onfocus="this.placeholder=''">{{ old('message') }}</textarea>

                            <button type="submit" class="butn">{{ __('SEND') }}</button>
                        </form>
                    </div>
            </div>
        </div>
    </section>

    <section class="mt-60">
        <div class="container">
            <div class="row">
                <!-- Address -->
                <div class="col-12 col-md-12 col-lg-12">
                    <h3 class="mb-20">{{ __('Location Map') }}</h3>
                </div>
            </div>
        </div>

        <div id="map" class="gmap_iframe" style="height:400px;" ></div>
        <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />
        <script>
            var map = L.map('map').setView([{{ $setting->location['lat'] }}, {{ $setting->location['lng'] }}], 13);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
            }).addTo(map);
            L.marker([{{ $setting->location['lat'] }}, {{ $setting->location['lng'] }}]).addTo(map)
                .bindPopup('{{ app()->getLocale() == "en" ? $setting->title_en : $setting->title_ar }}')
                .openPopup();
        </script>
    </section>
@endsection

