@extends('master')
@section('style')
    @if($thispage->page_description)
        <meta name="description" content="{{$thispage->page_description}}">
    @endif
    @if(json_decode($thispage->keyword))
        <meta name="keyword" content="{{implode("،" , json_decode($thispage->keyword))}}">
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
    <title>{{$thispage->tab_title}}</title>
@endsection
@section('main')

    <style>
        .card {
            overflow: hidden;
        }

        .card-body {
            padding-right: 12px;
            padding-left: 12px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
        }

        .card-text {
            font-size: 0.8rem;
            white-space: wrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>

    <section class="team-member-area py-4">
        <div class="container">
            <div class="team-member-heading-content text-center">
                <div class="section-heading">
                    <h2 class="section__title lh-50">اعضای اصلی تیم دادورزان امین</h2>
                </div>
            </div>
            <div class="row pt-60px">
                @foreach($emploees as $emploee)
                    <div class="col-lg-4 responsive-column-half">
                        <a href="{{url('تیم-ما/رزومه/'.$emploee->slug)}}">
                        <div class="responsive-column-half">
                            <div class="card card-item member-card text-center">
                                <div class="card-image">
                                    <img class="card-img-top" src="{{asset($emploee->image)}}"
                                         alt="{{$emploee->fullname}}"/>
                                </div>
                                <div class="card-body">
                                    <h2 class="card-title">{{$emploee->fullname}}</h2>
                                    <p class="card-text">{{$emploee->side}}</p>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="section-block"></div>

    <section class="about-area section--padding  bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-content pb-5">
                        <div class="section-heading">
                            <h2 class="section__title pb-3 lh-50">موسسه حقوقی دادوران امین مکانی عالی برای رشد</h2>
                            <p class="section__desc pb-3">
                                موسسه حقوقی دادورزان امین از وکلای متخصص و مجرب در زمینه‌های مختلف حقوقی دعوت به همکاری
                                می‌نماید
                            </p>
                            <br>
                        </div>
                        <div class="btn-box pt-35px">
                            <a href="#" class="btn theme-btn">به تیم ما بپیوندید <i
                                    class="la la-arrow-left icon ml-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="generic-img-box generic-img-box-layout-3">
                        <img src="{{asset('site/images/img-loading.png')}}"
                             data-src="{{asset('site/images/hire.webp')}}" alt="درباره تصویر"
                             class="img__item lazy img__item-1"/>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection





