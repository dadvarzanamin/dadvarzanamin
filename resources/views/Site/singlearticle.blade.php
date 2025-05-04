@extends('master')

@section('style')
    @if($article->description)
        <meta name="description" content="{{ $article->description }}">
    @endif
    <title>{{ $article->title }}</title>
@endsection

@section('main')
    <section class="single-article-area p-1 pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5">
                    <div class="card card-item card-bg50">
                        @if($article->image)
                            <img src="{{ asset($article->image) }}" alt="{{ $article->title }}" class="card-img-top">
                        @endif
                        <div class="card-body">
                            <h1 class="article-title">{{ $article->title }}</h1>

                            {{-- ✅ مشخصات مقاله --}}
                            <div class="article-meta d-flex justify-content-between align-items-center mb-3">
                                <span><i class="la la-user"></i> نویسنده: {{ $article->author ?? 'ادمین' }}</span>
                                <span><i class="la la-clock"></i> زمان مطالعه: {{ $article->read_time ?? '5 دقیقه' }}</span>
                                <span><i class="la la-eye"></i> بازدید: {{ $article->views ?? 0 }}</span>
                            </div>

                            <p class="card-text">
                                {!! $article->content !!}
                            </p>

                            {{-- برچسب‌ها --}}
                            @if($article->tags)
                                <div class="tags mt-4">
                                    <h5>برچسب‌ها:</h5>
                                    @foreach (json_decode($article->tags) as $tag)
                                        <a href="{{ url('/tags/' . $tag) }}" class="badge badge-secondary">{{ $tag }}</a>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- سایدبار مقالات مشابه --}}
                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="card card-item card-bg50">
                            <div class="card-body">
                                <h3 class="card-title fs-18 pb-2">مقالات مرتبط</h3>
                                <div class="divider"><span></span></div>
                                @foreach($related_articles as $related)
                                    <a href="{{ url('/مقالات/'.$related->slug) }}">{{ $related->title }}</a>
                                    <div class="divider"><span></span></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
