@extends('master')
@section('style')
    @if($thispage->page_description)
        <meta name="description" content="{{$thispage->page_description}}">
    @endif
    @if(json_decode($thispage->keyword))
        <meta name="keyword" content="{{implode("," , json_decode($thispage->keyword))}}">
    @endif
    <meta name="twitter:card" content="summary"/>
    @if($thispage->tab_title)
        <meta name="twitter:title" content="{{$thispage->tab_title}}"/>
    @endif
    @if($thispage->page_description)
        <meta name="twitter:description" content="{{$thispage->page_description}}"/>
    @endif
    @if($thispage->tab_title)
        <meta itemprop="name" content="{{$thispage->tab_title}}">
    @endif
    @if($thispage->page_description)
        <meta itemprop="description" content="{{$thispage->page_description}}">
    @endif
    <meta property="og:url" content="{{url()->current()}}"/>
    @if($thispage->tab_title)
        <meta property="og:title" content="{{$thispage->tab_title}}"/>
    @endif
    @if($thispage->page_description)
        <meta property="og:description" content="{{$thispage->page_description}}"/>
    @endif
    <link rel="canonical" href="{{url()->current()}}"/>
    <link rel="stylesheet" href="{{asset('site/css/animated-headline.css')}}"/>
    <title>{{$thispage->tab_title .' '. $emploees->fullname}}</title>
    <style>
        h4{
            font-size: 16px;
        }
        .team-title {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .g-container {
            background-color: rgba(253, 254, 255, 0.5);
            -webkit-backdrop-filter: blur(5px);
            backdrop-filter: blur(5px);
            border-radius: 20px;
            padding: 20px;
            width: 100%;
            max-width: 900px;
        }

        .media.media-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .media.media-card h4{
            text-align: right;
        }

        .media-img {
            max-width: 100%;
            height: auto;
        }

        @media (min-width: 768px) {
            .media.media-card {
                flex-direction: row;
                text-align: center;
            }
        }
    </style>
@endsection
@section('main')
    <section class="single-blog-area d-flex justify-content-center py-5">
        <div class="d-flex flex-column g-container col-11 col-lg-8 m-2">
            <section>
                <div class="container team-title text-justify">
                    <div class="breadcrumb-content">
                        <div class="media media-card mt-3">
                            <div class="media-body">
                                <h2 class="section__title pb-2">{{$emploees->fullname}}</h2>
                                @if($emploees['positions'])
                                    @foreach (json_decode($emploees['positions']) as $item)
                                        <h4 class="">{{$item}}</h4>
                                    @endforeach
                                @endif
                            </div>
                            <div class="media-img media-img-lg py-4">
                                <img class="img-fluid" src="{{asset($emploees->image)}}" alt="{{$emploees->fullname}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <ul class="nav nav-tabs generic-tab" id="myTab" role="tablist">
                            <li class="nav-item">
                            </li>
                        </ul>
                        <div class="tab-pane fade show active" id="about-me" role="tabpanel"
                             aria-labelledby="about-me-tab">
                            <h6>{{$emploees->position}}</h6>
                            <p class="pb-1">
                                {!! $emploees->description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <div class="section-block"></div>
@endsection
