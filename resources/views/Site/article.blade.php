@extends('master')
@section('style')
    @if($thispage->page_description)    <meta name="description"         content="{{$thispage->page_description}}">                    @endif
    @if(json_decode($thispage->keyword))<meta name="keyword"             content="{{implode("،" , json_decode($thispage->keyword))}}"> @endif
    <meta name="twitter:card"        content="summary" />
    @if($thispage->tab_title)           <meta name="twitter:title"       content="{{$thispage->tab_title}}" />                         @endif
    @if($thispage->page_description)    <meta name="twitter:description" content="{{$thispage->page_description}}" />                  @endif
    @if($thispage->tab_title)           <meta itemprop="name"            content="{{$thispage->tab_title}}">                           @endif
    @if($thispage->page_description)    <meta itemprop="description"     content="{{$thispage->page_description}}">                    @endif
    <meta property="og:url"          content="{{url()->current()}}" />
    @if($thispage->tab_title)           <meta property="og:title"        content="{{$thispage->tab_title}}"/>                          @endif
    @if($thispage->page_description)    <meta property="og:description"  content="{{$thispage->page_description}}" />                  @endif
    <link rel="canonical" href="{{url()->current()}}" />

    <title>{{$thispage->tab_title}}</title>
@endsection
@section('main')

    <section class="blog-area section--padding">
        <div class="container">
            <h1 class="d-flex text-align-center justify-content-center">مقالات آموزشی</h1>
            <div class="row">
                @foreach($articles as $article)
                    <div class="col-lg-4">
                        <div class="card card-item card-preview" data-tooltip-content="#tooltip_content_1">
                            <div class="card-image">
                                <a href="{{url('دپارتمان-اموزش-و-پژوهش/دوره-های-آموزشی/'.$article->slug)}}" class="d-block">
                                    <img class="card-img-top img-index" src="{{asset('storage/'.$article->image)}}" alt="{{$article->title}}" style="object-fit: cover;">
                                </a>
                                <div class="course-badge-labels">
                                    <div class="course-badge">{{jdate($article->created_at)->ago()}}</div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><a href="{{url('دپارتمان-اموزش-و-پژوهش/دوره-های-آموزشی/'.$article->slug)}}">{{$article->title}}</a></h5>
                                <div class="line"></div>
                                <div class="row rating-wrap d-flex align-items-center justify-content-between p-2 pt-3">
                                    <p>امیرحسین زین الدینی</p>
                                    <a href="{{url('دپارتمان-اموزش-و-پژوهش/دوره-های-آموزشی/'.$article->slug)}}" class="btn theme-btn theme-btn-sm theme-btn-transparent">مشاهده</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
