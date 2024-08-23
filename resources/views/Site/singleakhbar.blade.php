@extends('master')
@section('style')
    @if($thispage->page_description)    <meta name="description"         content="{{$thispage->page_description}}">                     @endif
    @if(json_decode($akhbars->keyword)) <meta name="keyword"             content="{{implode("،" , json_decode($akhbars->keyword))}}">   @endif
    @if($akhbars->title)                <meta name="twitter:title"       content="{{$akhbars->title}}" />                               @endif
    @if($thispage->page_description)    <meta name="twitter:description" content="{{$thispage->page_description}}" />                   @endif
    @if($akhbars->title)                <meta itemprop="name"            content="{{$akhbars->title}}">                                 @endif
    @if($thispage->page_description)    <meta itemprop="description"     content="{{$thispage->page_description}}">                     @endif
    @if($akhbars->title)                <meta property="og:title"        content="{{$akhbars->title}}"/>                                @endif
    @if($thispage->page_description)    <meta property="og:description"  content="{{$thispage->page_description}}" />                   @endif
    <link rel="canonical" href="{{url()->current()}}" />
    <meta name="twitter:card" content="summary" />
    <meta property="og:url"   content="{{url()->current()}}" />

    <link rel="stylesheet" href="{{asset('site/css/animated-headline.css')}}" />
    <title>{{$akhbars->title}}</title>
@endsection
@section('main')

{{--    <section class="breadcrumb-area">--}}
{{--        <img @if($slides) src="{{asset('storage/'.$slides->file_link)}}" @else src="{{asset('site/images/img1.jpg')}}" @endif alt="" style="width: 100%">--}}
{{--    </section>--}}

<section class="blog-area pt-100px pb-100px">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5">
                <div class="card card-item">
                    <div class="card-body">
                        <h3>{{$akhbars->title}}</h3>
                        <p class="card-text pb-3">
                            {!! $akhbars->description !!}
                        </p>
                        <div class="section-block"></div>
                        <h3 class="fs-18 font-weight-semi-bold pt-3">برچسب ها</h3>
                        <div class="d-flex flex-wrap justify-content-between align-items-center pt-3">
                            <ul class="generic-list-item generic-list-item-boxed d-flex flex-wrap fs-15">
                                @if($akhbars['keyword'])
                                    @foreach (json_decode($akhbars['keyword']) as $item)
                                        <li class="mr-2"><a href="#">{{$item}}</a></li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
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
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="card card-item">
                        <div class="card-body">
                            <h3 class="card-title fs-18 pb-2">مطالب مرتبط</h3>
                            <div class="divider"><span></span></div>
                            <div class="container d-flex flex-column align-items-center">
                                <img src="{{asset('/site/images/hire.webp')}}" style="width: 100%" class="br-8 mb-2" alt="">
                                <h5>شورای حقوقی حل اختلاف</h5>
                            </div>
                            <div class="divider"><span></span></div>
                            <div class="container d-flex flex-column align-items-center">
                                <img src="{{asset('/site/images/hire.webp')}}" style="width: 100%" class="br-8 mb-2" alt="">
                                <h5>شورای حقوقی حل اختلاف</h5>
                            </div>
                            <div class="divider"><span></span></div>
                            <div class="container d-flex flex-column align-items-center">
                                <img src="{{asset('/site/images/hire.webp')}}" style="width: 100%" class="br-8 mb-2" alt="">
                                <h5>شورای حقوقی حل اختلاف</h5>
                            </div>
{{--                            <h3 class="card-title fs-18 pb-2">آرشیوها</h3>--}}
{{--                            <div class="divider"><span></span></div>--}}
{{--                            <ul class="generic-list-item">--}}
{{--                                <li><a href="#">1402/05/01</a></li>--}}
{{--                                <li><a href="#">1402/04/01</a></li>--}}
{{--                                <li><a href="#">1402/03/01</a></li>--}}
{{--                                <li><a href="#">1402/02/01</a></li>--}}
{{--                                <li><a href="#">1402/01/01</a></li>--}}
{{--                            </ul>--}}
                        </div>
                    </div>
{{--                    <div class="card card-item">--}}
{{--                        <div class="card-body">--}}
{{--                            <h3 class="card-title fs-18 pb-2">برچسب های پست</h3>--}}
{{--                            <div class="divider"><span></span></div>--}}
{{--                            <ul class="generic-list-item generic-list-item-boxed d-flex flex-wrap fs-15">--}}
{{--                                @if($akhbars['keyword'])--}}
{{--                                    @foreach (json_decode($akhbars['keyword']) as $item)--}}
{{--                                        <li class="mr-2"><a href="#">{{$item}}</a></li>--}}
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
