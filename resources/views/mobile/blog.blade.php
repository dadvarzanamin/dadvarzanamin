@extends('mobile.mobilemaster')
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
<div class="page">
    <div class="navbar navbar-page">
        <div class="navbar-inner sliding">
            <div class="left">
                <a href="#" class="link back">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>
            <div class="title">
                اخبار و رویدادها
            </div>
            <div class="right"></div>
        </div>
    </div>
    <div class="page-content">
        <div class="blog segments" style="margin-top: 50px">
            <div class="container">
                @foreach($akhbars as $akhbar)
                    <div class="row">
                        <div class="col-100">
                            <div class="content content-shadow-product">
                                <a href="{{url('اخبار/'.$akhbar->slug)}}" class="link external">
                                    <img src="{{asset($akhbar->image)}}" alt="{{$akhbar->title}}">
                                    <div class="text">
                                        <a href="{{url('اخبار/'.$akhbar->slug)}}" class="link external"><h5>{{$akhbar->title}}</h5></a>
                                        <p class="date">{{jdate($akhbar->updated_at)->ago()}}</p>
                                        <div class="wrap-blog-action">
                                            <ul>
                                                <li><i class="fas fa-heart"></i>98</li>
                                                <li><i class="fas fa-comment"></i>51</li>
                                            </ul>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="divider-space-content"></div>
                <div class="pagination">
                    <ul>
                        <li class="arrow-prev"><a href="#"><i class="fas fa-chevron-left"></i></a></li>
                        <li class="pagination-active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li class="arrow-next"><a href="#"><i class="fas fa-chevron-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
