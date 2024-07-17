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
                {{$akhbars->title}}
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
                    <h5 style="text-align: center">{{$akhbars->title}}</h5>
                    <ul>
                        <li><p class="date">{{jdate($akhbars->updated_at)->ago()}}</p></li>
                        <li> نویسنده :  {{$akhbars->username}}</li>
                    </ul>
                </div>

                <div class="divider-space-content"></div>

                <div class="content-image">
                    <img src="{{asset($akhbars->image)}}" alt="{{$akhbars->title}}">
                </div>

                <div class="divider-space-content"></div>

                <div class="content-desc" style="text-align: justify;line-height: 30px;">
                    {!! $akhbars->description !!}
                </div>

                <div class="divider-space-content"></div>

                <div class="content-tags">
                    <ul>
                        <li><a href="#">موسسه حقوقی</a></li>
                        <li><a href="#">دادورزان امین</a></li>
                        <li><a href="#">نمایشگاه بین المللی</a></li>
                        <li><a href="#">صنعت غلات ، نان ، آرد</a></li>
                    </ul>
                </div>

                <div class="divider-space-content"></div>

            </div>
        </div>
    </div>
</div>
@endsection
