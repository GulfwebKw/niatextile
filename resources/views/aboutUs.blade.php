@extends('layouts.base')

@section('title')
    {{ __('About us') }}
@endsection


@section('breadcrumb' , true)

@section('body')
    <!-- About Nia -->
    <section class="about_bg">
        <div class="container">
            <div class="row item-center my_list">
                @foreach(\App\Models\aboutSection::query()->where('is_active',true)->orderBy('ordering')->get() as $section)
                    @if($loop->odd)
                        <div class="col-12 col-md-6 col-lg-6 d-none d-lg-block">
                            <img src="{{ asset('storage/'.$section->image) }}" alt="{{ $section->title }}">
                        </div>
                    @endif
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="m-80">
                            <h2 class="about-title">{{ $section->title }}</h2>
                            <div>
                                {!! $section->content !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 @if($loop->odd) d-block d-lg-none @endif">
                        <img src="{{ asset('storage/'.$section->image) }}" alt="{{ $section->title }}">
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

