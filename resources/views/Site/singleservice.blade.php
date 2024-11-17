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

    {{--    <section class="breadcrumb-area">--}}
    {{--        <img @if($slides) src="{{asset('storage/'.$slides->file_link)}}" @else src="{{asset('site/images/img1.jpg')}}" @endif alt="" style="width: 100%">--}}
    {{--    </section>--}}

    <section class="single-blog-area pt-3 pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 mb-5">
                    <div class="card card-item br-16 card-bg50">
                        <div class="card-body">
                            <h3>{{$services->title}}</h3>
                            <p class="card-text pb-3">
                                {!! $services->description !!}
                            </p>
                            <div class="section-block"></div>
                            <div class="col my-4 container">
                                <p class="text-center">
                                    برای استفاده از خدمات ما می توانید از پروفایل کاربری اقدام کنید.
                                </p>
                                <div class="d-flex my-3 justify-content-center">
                                    @if(Auth()->check())
                                        {{--                            <a type="button" class="btn btn-fs br-8 mr-2" href="{{route('logout')}}">خروج</a>--}}
                                        <a type="button" class="btn btn-dark btn-fs br-8 mr-2" href="{{route('profile')}}">ورود به حساب
                                            کاربری</a>
                                    @else
                                        <a type="button" class="btn btn btn-fs br-8 mr-2" href="{{route('login')}}">ورود</a>
                                        <a type="button" class="btn btn-dark btn-fs br-8 mr-2" href="{{route('register')}}">ثبت
                                            نام در سایت</a>
                                    @endif
                                </div>
                            </div>

                            <div class="section-block"></div>
                            <h3 class="fs-18 font-weight-semi-bold pt-3">برچسب ها</h3>
                            <div class="d-flex flex-wrap justify-content-between align-items-center pt-3">
                                <ul class="generic-list-item generic-list-item-boxed d-flex flex-wrap fs-15">
                                    @if($services['keyword'])
                                        @foreach (json_decode($services['keyword']) as $item)
                                            <li class="mr-2"><a href="#">{{$item}}</a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="card card-item br-16 card-bg50">
                        @foreach($medias as $media)
                            <div class="card-image m-3">
                                @if($media->file_link)
                                    <video controls preload="metadata" poster="{{asset($media->cover)}}" id="player"
                                           style="width: 100%">
                                        <source src="{{asset($media->file_link)}}" type="video/mp4"/>
                                    </video>
                                @elseif($media->aparat)
                                    {!! $media->aparat !!}
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <div class="section-block"></div>
                    {{--                <div class="comments-wrap pt-5" id="comments">--}}
                    {{--                    <div class="d-flex align-items-center justify-content-between pb-4">--}}
                    {{--                        <h3 class="fs-22 font-weight-semi-bold">نظرات</h3>--}}
                    {{--                        <span class="ribbon ribbon-lg">4</span>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="comment-list">--}}
                    {{--                        <div class="media media-card border-bottom border-bottom-gray pb-4 mb-4">--}}
                    {{--                            <div class="media-img mr-4 rounded-full">--}}
                    {{--                                <img class="rounded-full lazy" src="{{asset('site/images/avatar.jpg')}}" data-src="{{asset('site/images/avatar.jpg')}}" alt="تصویر کاربر" />--}}
                    {{--                            </div>--}}
                    {{--                            <div class="media-body">--}}
                    {{--                                <h5 class="pb-2">محمد علیزاده</h5>--}}
                    {{--                                <span class="d-block lh-18 pb-2">یک ماه قبل</span>--}}
                    {{--                                <p class="pb-3">بله منم همین مشکل را داشتم که قاضی حکم به بازجویی داد و مشکلم طبق ماده 6 قانون مجازات اسلامی حل شد.</p>--}}
                    {{--                                <div class="helpful-action d-flex align-items-center justify-content-between">--}}
                    {{--                                    <a class="btn theme-btn theme-btn-sm theme-btn-transparent lh-30" href="#" data-toggle="modal" data-target="#replyModal"><i class="la la-reply mr-1"></i> پاسخ</a>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="load-more-btn-box text-center pt-3 pb-5">--}}
                    {{--                        <button class="btn theme-btn theme-btn-sm theme-btn-transparent lh-30"><i class="la la-refresh mr-1"></i> نمایش نظر بیشتر</button>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                    {{--                <div class="section-block"></div>--}}
                    {{--                <div class="add-comment-wrap pt-5">--}}
                    {{--                    <h3 class="fs-22 font-weight-semi-bold pb-4">یک نظر اضافه کنید</h3>--}}
                    {{--                    <form method="post" class="row">--}}
                    {{--                        <div class="input-box col-lg-6">--}}
                    {{--                            <label class="label-text">نام</label>--}}
                    {{--                            <div class="form-group">--}}
                    {{--                                <input class="form-control form--control" type="text" name="name" placeholder="اسم شما" />--}}
                    {{--                                <span class="la la-user input-icon"></span>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="input-box col-lg-6">--}}
                    {{--                            <label class="label-text">پست الکترونیک</label>--}}
                    {{--                            <div class="form-group">--}}
                    {{--                                <input class="form-control form--control" type="email" name="email" placeholder="آدرس ایمیل" />--}}
                    {{--                                <span class="la la-envelope input-icon"></span>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="input-box col-lg-12">--}}
                    {{--                            <label class="label-text">پیام</label>--}}
                    {{--                            <div class="form-group">--}}
                    {{--                                <textarea class="form-control form--control pl-3" name="message" placeholder="پیام بنویس" rows="5"></textarea>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="btn-box col-lg-12">--}}
                    {{--                            <div class="custom-control custom-checkbox mb-3 fs-15">--}}
                    {{--                                <input type="checkbox" class="custom-control-input" id="saveCheckbox" required="" />--}}
                    {{--                            </div>--}}
                    {{--                            <button class="btn theme-btn" type="submit">ثبت کردن نظر</button>--}}
                    {{--                        </div>--}}
                    {{--                    </form>--}}
                    {{--                </div>--}}
                </div>
                <div class="col-lg-3">
                    <div class="sidebar">
                        <div class="card card-item card-bg50 br-16">
                            <div class="card-body">
                                <h3 class="card-title fs-18 pb-2">مطالب مرتبط</h3>
                                <div class="divider"><span></span></div>
                                <a href="{{url('/دپارتمان-دعاوی/اراضی')}}">اراضی
                                </a>
                                <div class="divider"><span></span></div>
                                <a href="{{url('/دپارتمان-دعاوی/املاک')}}">املاک
                                    <div class="divider"><span></span></div>
                                    <a href="{{url('/دپارتمان-دعاوی/خانواده')}}">خانواده
                                    </a>
                                    <div class="divider"><span></span></div>
                                    <a href="{{url('/دپارتمان-دعاوی/شهرداری')}}">شهرداری
                                    </a>
                                    <div class="divider"><span></span></div>
                                    <a href="{{url('/دپارتمان-دعاوی/حقوق-معادن')}}">حقوق معادن
                                    </a>
                                {{--                            <h3 class="card-title fs-18 pb-2">مطالب مرتبط</h3>--}}
                                {{--                            <div class="divider"><span></span></div>--}}
                                {{--                            <ul class="generic-list-item a-text-black">--}}
                                {{--                                <li><a href="#" class="a-text-black">قرارداد پیمانکاری</a></li>--}}
                                {{--                                <li><a href="#" class="a-text-black">قرارداد لیسانس</a></li>--}}
                                {{--                                <li><a href="#" class="a-text-black">قرارداد استارت آپ ها</a></li>--}}
                                {{--                                <li><a href="#" class="a-text-black">قرارداد خرید و فروش</a></li>--}}
                                {{--                            </ul>--}}
                            </div>
                        </div>
                        {{--                    <div class="card card-item card-bg50 br-16">--}}
                        {{--                        <div class="card-body">--}}
                        {{--                            <h3 class="card-title fs-18 pb-2 ">برچسب های پست</h3>--}}
                        {{--                            <div class="divider"><span></span></div>--}}
                        {{--                            <ul class="generic-list-item generic-list-item-boxed d-flex flex-wrap fs-15">--}}
                        {{--                                @if($services['keyword'])--}}
                        {{--                                    @foreach (json_decode($services['keyword']) as $item)--}}
                        {{--                                        <li class="mr-2"><a href="#" class="btn btn-outline a-text-black">{{$item}}</a></li>--}}
                        {{--                                    @endforeach--}}
                        {{--                                @endif--}}
                        {{--                            </ul>--}}
                        {{--                        </div>--}}
                        {{--                    </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
