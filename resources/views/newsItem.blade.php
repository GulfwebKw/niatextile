@extends('layouts.base')

@section('title')
    {{ __('News') }}
@endsection


@section('breadcrumb' , true)

@section('body')

    <!-- Our Products -->
    <section class="section-gap">
        <div class="container">
            <div class="row">

                <div class="col-6 col-md-12 col-lg-12">
                    <img src="{{ asset('storage/'.$news->image) }}" alt="{{ $news->title }}">

                    <div class="discription mt-30">
                        <p class="news_sub">{{ $news->sub_title }} <span>{{ $news->created_at->format('F d, Y') }}</span></p>
                        <h4>{{ $news->title }}</h4>

                        <div class="justify">
                            {!! $news->content !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

