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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
@endsection
@section('main')
    <section class="course-area section-padding">
        <div class="container">
            <div class="row">
                @foreach($contracts as $contract)
                <div class="col-lg-4 responsive-column-half">
                    <div class="card card-item card-preview" data-tooltip-content="#tooltip_content_1">
                        <div class="card-image">
                            <a href="{{url('نمونه-قراردادها/'.$contract->slug)}}" class="d-block">
                                <img class="card-img-top lazy" src="{{asset('storage'.$contract->image)}}" data-src="{{asset('storage/'.$contract->image)}}" alt="{{$contract->title}}" />
                            </a>
                            <div class="course-badge-labels">
                                <div class="course-badge">{{$contract->paid_type}}</div>
                                @if($contract->discount)<div class="course-badge">{{$contract->discount}}</div>@endif
                            </div>
                        </div>
                        <div class="card-body">
                            <h3 class="ribbon ribbon-blue-bg fs-14 mb-3">{{$contract->title}}</h3>
                            <h5 class="card-title"><a href="{{url('نمونه-قراردادها/'.$contract->slug)}}">{{$contract->title}}</a></h5>
                            <p class="card-text"><a href="{{url('نمونه-قراردادها/'.$contract->slug)}}">{{$contract->type}}</a></p>
                            <div class="rating-wrap d-flex align-items-center py-2">
                                <span class="rating-total pl-1">{{$contract->count_view}}</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="card-price text-black font-weight-bold">{{number_format($contract->discount)}}<span class="before-price font-weight-medium">{{number_format($contract->price)}}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
{{--            <div class="text-center pt-3">--}}
{{--                <nav aria-label="مثال ناوبری صفحه" class="pagination-box">--}}
{{--                    <ul class="pagination justify-content-center">--}}
{{--                        <li class="page-item">--}}
{{--                            <a class="page-link" href="#" aria-label="قبلی">--}}
{{--                                <span aria-hidden="true"><i class="la la-arrow-right"></i></span>--}}
{{--                                <span class="sr-only">قبلی</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="page-item active"><a class="page-link" href="#">1</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                        <li class="page-item">--}}
{{--                            <a class="page-link" href="#" aria-label="بعد">--}}
{{--                                <span aria-hidden="true"><i class="la la-arrow-left"></i></span>--}}
{{--                                <span class="sr-only">بعد</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </nav>--}}
{{--                <p class="fs-14 pt-2">نمایش 1-6 از 56 نتیجه</p>--}}
{{--            </div>--}}
        </div>
    </section>
@endsection
