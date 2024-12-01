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
            <h1 class="d-flex text-align-center justify-content-center">دوره های آموزشی</h1>
            <div class="row">
                @foreach($workshops as $workshop)
                    <div class="col-lg-4">
                        <div class="card card-item card-preview" data-tooltip-content="#tooltip_content_1">
                            <div class="card-image">
                                <a href="{{url('دپارتمان-اموزش-و-پژوهش/دوره-های-آموزشی/'.$workshop->slug)}}" class="d-block">
                                    <img class="card-img-top img-index" src="{{asset($workshop->image)}}" alt="{{$workshop->title}}" style="object-fit: cover;">
                                </a>
                                <div class="course-badge-labels">
                                    <div class="course-badge">{{jdate($workshop->created_at)->ago()}}</div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><a href="#">{{$workshop->title}}</a></h5>
                                <div class="line"></div>
                                <div class="rating-wrap d-flex align-items-center justify-content-center pt-3">
                                    <a href="{{url('دپارتمان-اموزش-و-پژوهش/دوره-های-آموزشی/'.$workshop->slug)}}" class="btn theme-btn theme-btn-sm theme-btn-transparent">مشاهده</a>
                                </div>
                            </div>
                        </div>
                </div>
                @endforeach
            </div>
           {{-- <div class="text-center pt-3">
                <nav aria-label="مثال ناوبری صفحه" class="pagination-box">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="قبلی">
                                <span aria-hidden="true"><i class="la la-arrow-right"></i></span>
                                <span class="sr-only">قبلی</span>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="بعد">
                                <span aria-hidden="true"><i class="la la-arrow-left"></i></span>
                                <span class="sr-only">بعد</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="fs-14 pt-2">نمایش 1-6 از 56 نتیجه</p>
            </div>--}}
        </div>
    </section>

@endsection
