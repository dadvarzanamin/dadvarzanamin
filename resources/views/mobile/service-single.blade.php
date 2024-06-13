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
                {{$services->title}}
            </div>
            <div class="right">
                <a href="#"><i class="fas fa-bookmark"></i></a>
                <a href="#"><i class="fas fa-share-alt"></i></a>
            </div>
        </div>
    </div>
    <div class="page-content">
        <div class="blog-single segments" style="margin-top:60px">
            <div class="container">
                <div class="content-title">
                    <h5 style="text-align: center">{{$services->title}}</h5>
                </div>

                <div class="divider-space-content"></div>

                <div class="content-desc" style="text-align: justify;line-height: 30px;">
                    {!! $services->description !!}
                </div>

                <div class="divider-space-content"></div>

                <div class="content-tags">
                    <ul>
                        @if($services['keyword'])
                            @foreach (json_decode($services['keyword']) as $item)
                                <li><a href="#">{{$item}}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </div>

                <div class="divider-space-content"></div>

            </div>
        </div>
    </div>
</div>
@endsection
