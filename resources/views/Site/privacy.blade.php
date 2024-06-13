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
    <section class="terms-and-conditions-area section--padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-item">
                        <div class="card-body">
                            <h2 class="card-title fs-18 pb-2">{{$thispage->title}}</h2>
                            <div class="divider"><span></span></div>
                            <div style="margin: 40px;line-height: 50px;">{!! $thispage->description !!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
