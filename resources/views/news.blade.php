@extends('layouts.base')

@section('title')
    {{ __('News') }}
@endsection


@section('breadcrumb' , true)

@section('body')
    <!-- About Nia -->
    <section class="about_bg">
        <div class="container">
            <div class="row my_list">
                @foreach($news = \App\Models\News::query()->where('is_active',true)->paginate(18) as $section)
                    <div class="col-4 col-md-4 col-lg-4">
                        <a href="{{ route('newsItem' , ['id' => $section->id , 'string' => \Illuminate\Support\Str::slug($section->title)]) }}">
                            <img src="{{ asset('storage/'.$section->image) }}" alt="{{ $section->title }}">
                        </a>
                        <div class="">
                            <a href="{{ route('newsItem' , ['id' => $section->id , 'string' => \Illuminate\Support\Str::slug($section->title)]) }}">
                                <h3>{{ $section->title }}</h3>
                                <div class="justify">
                                    {!! $section->short_content !!}
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{ $news->links('layouts.paginator') }}
    </section>
@endsection

