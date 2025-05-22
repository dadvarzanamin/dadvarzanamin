<!DOCTYPE html>
<html lang="fa" xmlns="http://www.w3.org/1999/html">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="مهندس محمد حسین دیوان بیگی">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="index, follow">

    <!-- Google fonts -->
    {{--    <link rel="preconnect" href="https://fonts.gstatic.com/">--}}
    {{--    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">--}}


    <link rel="icon" href="{{url($companies['favicon16'])}}" sizes="16x16" type="image/png">
    <link rel="icon" href="{{url($companies['favicon32'])}}" sizes="32x32" type="image/png">

    <link rel="stylesheet" href="{{asset('site/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/line-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/fancybox.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/tooltipster.bundle.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/intlTelInput.min.css')}}" />
    <link rel="stylesheet" href="{{asset('site/css/style.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Persian Datepicker CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/persian-datepicker@1.2.0/dist/css/persian-datepicker.min.css"/>

    <title></title>
    @yield('style')
</head>
<style>
    .footer-generic-list-item li a {
        color: #ccc !important;
        display: block;
        -webkit-transition: all 0.3s;
        -moz-transition: all 0.3s;
        -ms-transition: all 0.3s;
        -o-transition: all 0.3s;
        transition: all 0.3s;
    }

    .offcanvas {
        position: fixed;
        top: 0;
        bottom: 0;
        right: -300px; /* Initially hidden */
        width: 300px;
        padding: 1rem;
        background-color: #fff;
        transition: right 0.3s ease-in-out;
        z-index: 1045;
    }

    .offcanvas.show {
        right: 0; /* Show offcanvas */
    }

    .offcanvas-header {
        display: flex;
        justify-content: flex-end;
    }

    .offcanvas-body {
        overflow-y: auto;
    }

    .body-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1040;
        transition: opacity 0.3s ease-in-out;
    }

    .body-overlay.show {
        display: block;
        opacity: 1;
    }

    a {
        color: #353535;
    }

    a:hover {
        color: #cea54a;
    }

    .dropdown-item.active, .dropdown-item:active {
        color: #cea54a;
    }

    #offcanvasMenu {
        width: 250px; /* تغییر اندازه Off-Canvas */
        background-color: #f8f9fa; /* رنگ پس‌زمینه Off-Canvas */
        padding: 1rem;
    }

    /* لینک‌های Off-Canvas */
    #offcanvasMenu .nav-link {
        color: #000; /* رنگ لینک‌ها */
        padding: 0.5rem 1rem;
    }

    #offcanvasMenu .nav-link:hover {
        background-color: #e9ecef; /* رنگ پس‌زمینه لینک‌ها در حالت هاور */
    }

</style>
<!-- 🔹 بنر دانلود اپلیکیشن با دکمه‌های چپ و راست -->
<body>
{{--<div id="app-banner"--}}
{{--     style="background-color: #233d63; color: white; padding: 14px 24px;--}}
{{--            position: fixed; top: 0; left: 0; right: 0;--}}
{{--            z-index: 9999; box-shadow: 0 2px 5px rgba(0,0,0,0.1); direction: rtl;">--}}

{{--    <!-- 🔸 دکمه‌ها در یک ردیف -->--}}
{{--    <div style="display: flex; justify-content: space-between; align-items: center;">--}}
{{--        <!-- دکمه دانلود (راست) -->--}}
{{--        <a href="{{url('/app/app-release-v1.2.0.apk')}}"--}}
{{--           style="background-color: #cea54a; color: #233d63; padding: 10px 24px;--}}
{{--              border-radius: 8px; text-decoration: none; font-weight: bold;"--}}
{{--           class="external"--}}
{{--        >--}}
{{--            دانلود نسخه جدید اپلیکیشن امین--}}
{{--        </a>--}}

{{--        <!-- دکمه بستن (چپ) -->--}}
{{--        <button onclick="document.getElementById('app-banner').style.display='none';--}}
{{--                     document.body.style.paddingTop='0';"--}}
{{--                style="background: none; border: none; color: white; font-size: 28px;--}}
{{--                   cursor: pointer; line-height: 1; max-width: 40px">--}}
{{--            &times;--}}
{{--        </button>--}}
{{--    </div>--}}
{{--</div>--}}

<nav id="navbar_top" class="navbar navbar-expand-lg navbar-light my-3 mx-2 mx-xl-5 p-0 br-24"
     style="z-index: 1000; border: 1px solid rgba(51,51,51,0.3)">
    <div class="container-fluid px-4 py-3 br-24 header-bg justify-content-between">
        <a href="{{route('/')}}" class="navbar-brand mx-xl-auto">
            <img src="{{asset('/site/images/dark-logo.png')}}" alt="{{$companies['title']}}">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="offcanvas" data-target="#offcanvasMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <nav class="main-menu collapse navbar-collapse justify-content-space-between" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                @foreach($menus as $menu)
                    @if($menu->submenu == 0)
                        <li>
                            <a href="{{url($menu->slug)}}">{{$menu->title}}</a>
                        </li>
                    @else
                        @if($menu->mega_menu == 1)
                            <li class="mega-menu-has">
                                <a href="#">{{$menu->title}}<i class="la la-angle-down fs-12"></i></a>
                                <div class="dropdown-menu-item mega-menu" style="max-width: 760px;">
                                    <ul class="row no-gutters">
                                        @foreach($megamenus as $megamenu)
                                            @if($megamenu->menu_id == $menu->id)
                                                <li @foreach($megacounts as $megacount) @if($megacount['menu_id'] == $menu->id) class="col-lg-{{12/$megacount['count']}}" @endif @endforeach >
                                                    <h5 style="border-bottom: 1px solid #d9d9d9;padding-bottom: 10px;margin-bottom: 10px;">
                                                        {{$megamenu->title}}
                                                    </h5>
                                                    @foreach($submenus as $submenu)
                                                        @if($menu->id == $submenu->menu_id)
                                                            @if($submenu->megamenu_id == $megamenu->id)
                                                                <a href="{{url($menu->slug.'/'.$submenu->slug)}}">{{$submenu->title}}</a>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        @else
                            <li>
                                <a href="#">{{$menu->title}}<i class="la la-angle-down fs-12"></i></a>
                                <ul class="dropdown-menu-item">
                                    @foreach($submenus as $submenu)
                                        @if($menu->id == $submenu->menu_id)
                                            <li>
                                                <a href="{{url($menu->slug.'/'.$submenu->slug)}}">{{$submenu->title}}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    @endif
                @endforeach
            </ul>
            <button type="button" class="btn btn-primary pr-button br-8 btn-fs mx-auto" data-toggle="modal"
                    data-target="#exampleModal">درخواست مشاوره
            </button>
            <div class="d-flex">
                @if(Auth()->check())
                    <a type="button" class="btn btn-fs br-8 mr-2" href="{{route('logout')}}">خروج</a>
                    <a type="button" class="btn btn-dark btn-fs br-8 mr-2" href="{{route('profile')}}">حساب کاربری</a>
                @else
                    <a type="button" class="btn btn btn-fs br-8 mr-2" href="{{route('login')}}">ورود</a>
                    <a type="button" class="btn btn-dark btn-fs br-8 mr-2" href="{{route('register')}}">ثبت نام</a>
                @endif
            </div>
        </nav>
    </div>
</nav>

<!-- Offcanvas Menu -->
<div class="offcanvas offcanvas-right" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">
    <div class="offcanvas-header">
        <button type="button" class="close" data-dismiss="offcanvas" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <div class="d-flex ml-auto">
            @if(Auth()->check())
                <a type="button" class="btn btn-light btn-fs br-8 mr-2" href="{{route('logout')}}">خروج</a>
                <a type="button" class="btn btn-dark btn-fs br-8 mr-2" href="{{route('profile')}}">حساب کاربری</a>
            @else
                <a type="button" class="btn btn-light btn-fs br-8 mr-2" href="{{route('login')}}">ورود</a>
                <a type="button" class="btn btn-dark btn-fs br-8 mr-2" href="{{route('register')}}">ثبت نام</a>
            @endif
        </div>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav">
            @foreach($menus as $menu)
                @if($menu->submenu == 0)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url($menu->slug) }}">{{ $menu->title }}</a>
                    </li>
                @else
                    @if($menu->mega_menu == 1)
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#collapseMegaMenu{{ $menu->id }}"
                               role="button" aria-expanded="false" aria-controls="collapseMegaMenu{{ $menu->id }}">
                                {{ $menu->title }}<i class="la la-angle-down fs-12"></i>
                            </a>
                            <div class="collapse" id="collapseMegaMenu{{ $menu->id }}">
                                <div class="mega-menu">
                                    <div class="row no-gutters">
                                        @foreach($megamenus as $megamenu)
                                            @if($megamenu->menu_id == $menu->id)
                                                <div
                                                    @foreach($megacounts as $megacount) @if($megacount['menu_id'] == $menu->id) class="col-lg-{{ 12/$megacount['count'] }}" @endif @endforeach>
                                                    <h5 class="dropdown-header">
                                                        {{ $megamenu->title }}
                                                    </h5>
                                                    @foreach($submenus as $submenu)
                                                        @if($menu->id == $submenu->menu_id && $submenu->megamenu_id == $megamenu->id)
                                                            <a class="dropdown-item"
                                                               href="{{ url($menu->slug.'/'.$submenu->slug) }}">{{ $submenu->title }}</a>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#collapseMenu{{ $menu->id }}" role="button"
                               aria-expanded="false" aria-controls="collapseMenu{{ $menu->id }}">
                                {{ $menu->title }}<i class="la la-angle-down fs-12"></i>
                            </a>
                            <div class="collapse" id="collapseMenu{{ $menu->id }}">
                                @foreach($submenus as $submenu)
                                    @if($menu->id == $submenu->menu_id)
                                        <a class="dropdown-item"
                                           href="{{ url($menu->slug.'/'.$submenu->slug) }}">{{ $submenu->title }}</a>
                                    @endif
                                @endforeach
                            </div>
                        </li>
                    @endif
                @endif
            @endforeach
        </ul>
        <button type="button" class="btn btn-primary pr-button br-8 btn-fs mt-3" data-toggle="modal"
                data-target="#exampleModal">درخواست مشاوره
        </button>
    </div>
</div>


<div class="mobile-search-form">
    <div class="d-flex align-items-center">
        <form method="post" class="flex-grow-1 mr-3">
            <div class="form-group mb-0">
                <input class="form-control form--control pl-3" type="text" name="search"
                       placeholder="هر چیزی را جستجو کنید">
                <span class="la la-search search-icon"></span>
            </div>
        </form>
        <div class="search-bar-close icon-element icon-element-sm shadow-sm">
            <i class="la la-times"></i>
        </div>
    </div>
</div>
<div class="body-overlay"></div>
{{--    </header>--}}

<div id="exampleModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content br-16">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br/>
            @endif
            <div class="modal-header">
                <p class="text-right">فرم درخواست مشاوره</p>
                <button type="button" class="close text-left" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <label class="label-text">نام و نام خانوادگی</label>
                    <div class="form-group">
                        <input class="form-control" type="text" name="name" id="name"/>
                        <div id="errorname" style="color: red"></div>
                    </div>
                </div>
                {{--                    <div class="col-lg-12">--}}
                {{--                        <label class="label-text">آدرس ایمیل</label>--}}
                {{--                        <div class="form-group">--}}
                {{--                            <input class="form-control" type="email" name="email" id="email" />--}}
                {{--                            <div id="erroremail" style="color: red"></div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                <div class="col-lg-12">
                    <label class="label-text">شماره تماس</label>
                    <div class="form-group">
                        <input class="form-control" type="text" name="phone" id="phone" pattern="[0-9]{11}"/>
                        <div id="errorphone" style="color: red"></div>
                    </div>
                </div>
                {{--                <div class="col-lg-12">--}}
                {{--                    <label class="label-text">انتخاب نوع درخواست</label>--}}
                {{--                    <div class="form-group">--}}
                {{--                        <select class="form-control" name="servicemode" id="servicemode"--}}
                {{--                                style="width: 100% !important;">--}}
                {{--                            <option value="">انتخاب کنید</option>--}}
                {{--                            <option value="1">خدمات موکلین</option>--}}
                {{--                            <option value="2">خدمات وکلا</option>--}}
                {{--                        </select>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                <div class="col-lg-12">
                    <label class="label-text">انتخاب نوع درخواست</label>
                    <div class="select-container w-100 pt-2 br-8">
                        <select class="select-container-select" name="servicemode" id="servicemode"
                                style="width: 100% !important;">
                            <option value="">انتخاب کنید</option>
                            <option value="1">خدمات موکلین</option>
                            <option value="2">خدمات وکلا</option>
                        </select>
                    </div>
                </div>
                {{--                <div class="my-course-filter-item mr-2 col-lg-12">--}}
                {{--                    <span class="fs-14 font-weight-semi-bold">براساس امتیاز</span>--}}
                {{--                    <div class="select-container w-100 pt-2">--}}
                {{--                        <select class="select-container-select" style="width: 100% !important;">--}}
                {{--                            <option value="" >انتخاب کنید</option>--}}
                {{--                            <option value="1">از کم به زیاد</option>--}}
                {{--                            <option value="2">از زیاد به کم</option>--}}
                {{--                        </select>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                <div class="col-lg-12">
                    <label class="label-text">انتخاب موضوع حقوقی</label>
                    <div class="form-group">
                        <select class="form-control" name="submenu" id="submenu" style="width: 100% !important;">
                            <option value="">انتخاب کنید</option>
                        </select>
                    </div>
                </div>
                {{--                <div class="col-lg-12">--}}
                {{--                    <label class="label-text">انتخاب موضوع حقوقی</label>--}}
                {{--                    <div class="select-container w-100 pt-2 br-8">--}}
                {{--                        <select class="select-container-select" name="submenu" id="submenu" style="width: 100% !important;">--}}
                {{--                            <option value="">انتخاب کنید</option>--}}
                {{--                        </select>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                <div class="col-lg-12">
                    <label class="label-text">توضیحات مختصر</label>
                    <div class="form-group">
                        <textarea class="form-control pl-3" name="description" id="description"></textarea>
                    </div>
                </div>
                <div class="col-md-6 float-right">
                    <div class="form-group">
                        <input type="text" name="captcha" id="captcha" placeholder="جواب را وارد کنید"
                               class="form-control"/>
                        <div id="errorcaptcha" style="color: red"></div>
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="form-group captcha">
                        <span>{!! captcha_img('math') !!}</span>
                        <button type="button" class="btn btn-danger" class="reload" id="reload">
                            &#x21bb;
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-dark br-8" data-dismiss="modal">بستن</button>
                <button type="button" id="submit" class="btn btn-success br-8">ارسال درخواست</button>
            </div>
        </div>
    </div>
</div>
{{--    </header>--}}
@yield('main')

<section class="footer-area footer-theme">
    <div>
        <div class="container">
            <span class="ring-shape ring-shape-1"></span>
            <span class="ring-shape ring-shape-2"></span>
            <span class="ring-shape ring-shape-3"></span>
            <span class="ring-shape ring-shape-4"></span>
            <span class="ring-shape ring-shape-5"></span>
            <span class="ring-shape ring-shape-6"></span>
            <span class="ring-shape ring-shape-7"></span>
            <div class="container mb-4">

            </div>
            <div class="row">
                <div class="col-lg-3 responsive-column-half">
                    <div class="footer-item">
                        <h3 class="fs-18 font-weight-semi-bold dark-bg-h">{{$companies['title']}}</h3>
                        <span class="section-divider section--divider"></span>
                        {{--                    <a href="{{route('/')}}">--}}
                        {{--                        <img src="{{asset($companies['image'])}}" alt="{{$companies['title']}}" class="footer__logo" style="width: 30%">--}}
                        {{--                    </a>--}}
                        <ul class="generic-list-item text-justify dark-bg-p">
                            {!! $companies['summery'] !!}
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 responsive-column-half">
                    <div class="footer-item">
                        <h3 class="fs-18 font-weight-semi-bold dark-bg-h">خدمات موسسه حقوقی</h3>
                        <span class="section-divider section--divider"></span>
                        <ul class="footer-generic-list-item dark-bg-p">
                            <li><a href="#">انواع خدمات قرادادی</a></li>
                            <li><a href="#">انواع خدمات کیفری</a></li>
                            <li><a href="#">انواع خدمات حقوقی</a></li>
                            <li><a href="#">انواع خدمات شرکت ها</a></li>
                            <li><a href="#">انواع خدمات مالیاتی</a></li>
                            <li><a href="#">انواع خدمات ملکی</a></li>
                            <li><a href="#">انواع خدمات بیمه ای</a></li>

                            {{--                        @foreach($menus as $menu)--}}
                            {{--                            @if(in_array($menu->priority , [2,3,4,5]))--}}
                            {{--                            <li><a href="{{url($menu->slug)}}">{{$menu->title}}</a></li>--}}
                            {{--                            @endif--}}
                            {{--                        @endforeach--}}
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 responsive-column-half">
                    <div class="footer-item">
                        <h3 class="fs-18 font-weight-semi-bold dark-bg-h">خدمات برای موکلین</h3>
                        <span class="section-divider section--divider"></span>
                        <ul class="footer-generic-list-item">
                            @foreach($servicelawyers as $servicelawyer)
                                <li><a href="{{url('خدمات/'.$servicelawyer->slug)}}">{{$servicelawyer->title}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 responsive-column-half">
                    <div class="footer-item">
                        <h3 class="fs-18 font-weight-semi-bold dark-bg-h">راه های ارتباطی</h3>
                        <span class="section-divider section--divider"></span>
                        <ul class="social-icons social-icons-styled">
                            <li class="mr-2"><a href="{{$companies['facebook']}}"> <i
                                        class="la la-facebook"> </i></a></li>
                            <li class="mr-2"><a href="{{$companies['twitter']}}"> <i
                                        class="la la-twitter"> </i></a></li>
                            <li class="mr-2"><a href="{{$companies['instagram']}}"><i
                                        class="la la-instagram"></i></a></li>
                            <li class="mr-2"><a href="{{$companies['linkedin']}}"> <i
                                        class="la la-linkedin"> </i></a></li>
                        </ul>
                        <ul class="footer-generic-list-item pt-4">
                            <li><p class="dark-bg-p"> دفتر مرکزی : {{$companies['address']}}</p></li>
                            <li style="direction:ltr;text-align: left"><a
                                    href="tel:{{$companies['mobile']}}">{{$companies['mobile']}}</a></li>
                            <li style="direction:ltr;text-align: left"><a
                                    href="tel:{{$companies['tel']}}">{{$companies['tel']}}</a></li>
                            <li style="direction:ltr;text-align: left"><a
                                    href="mailto:{{$companies['email']}}">{{$companies['email']}}</a></li>
                            <li style="direction:ltr;text-align: left">
                                <div class="d-flex flex-row">
                                    <a referrerpolicy='origin' target='_blank'
                                       href='https://trustseal.enamad.ir/?id=505224&Code=bnNzNuo0IO4Nk4MlNtlewJlt8Hrcv5Q0'><img
                                            referrerpolicy='origin'
                                            src='https://trustseal.enamad.ir/logo.aspx?id=505224&Code=bnNzNuo0IO4Nk4MlNtlewJlt8Hrcv5Q0'
                                            alt='' style='cursor:pointer;max-height: 80px'
                                            code='bnNzNuo0IO4Nk4MlNtlewJlt8Hrcv5Q0'>
                                    </a>
                                    <img referrerpolicy='origin' id='rgvjjzpejxlzesgtoeukoeuk'
                                         style='cursor:pointer;max-height: 80px'
                                         onclick='window.open("https://logo.samandehi.ir/Verify.aspx?id=371088&p=xlaojyoerfthobpdmcsimcsi", "Popup","toolbar=no, scrollbars=no, location=no, statusbar=no, menubar=no, resizable=0, width=450, height=630, top=30")'
                                         alt='logo-samandehi'
                                         src='https://logo.samandehi.ir/logo.aspx?id=371088&p=qftiyndtnbpdlymaaqgwaqgw'/>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-content py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <span class="copy-desc dark-bg-p">کلیه حقوق مادی و معنوی وبسایت برای {{$companies['title']}}
                            محفوظ
                            می
                            باشد</span>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-flex flex-wrap align-items-center justify-content-end">
                            <ul class="footer-generic-list-item d-flex flex-wrap align-items-center fs-14">
                                <li class="mr-3"><a href="{{url('تیم-ما/شرایط-و-ضوابط')}}">شرایط و ضوابط</a></li>
                                <li class="mr-3"><a href="{{url('تیم-ما/حریم-خصوصی')}}">حریم خصوصی</a></li>
                            </ul>
                            {{--                        <div class="select-container select-container-sm">--}}
                            {{--                            <select class="select-container-select">--}}
                            {{--                                <option value="1">فارسی</option>--}}
                            {{--                                <option value="2">انگلیسی</option>--}}
                            {{--                            </select>--}}
                            {{--                        </div>--}}
                        </div>
                    </div>
                </div>
                <div class="row d-none justify-content-center" >
                    <p>طراحی و توسعه توسط <a href="https://bestagroup.ir/" style="color: #cea54a">Besta Group</a> </p>
                </div>
            </div>
        </div>
    </div>
</section>

<div id="scroll-top">
    <i class="la la-arrow-up" title="برو بالا"></i>
</div>

<script src="{{ asset('site/js/jquery-3.4.1.min.js') }}"></script> <!-- jQuery باید قبل از همه باشد -->
<script src="{{ asset('site/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('site/js/bootstrap-select.min.js') }}"></script>

<!-- سایر پلاگین‌ها -->
<script src="{{ asset('site/js/fancybox.js') }}"></script>
<script src="{{ asset('site/js/datedropper.min.js') }}"></script>
<script src="{{ asset('site/js/tooltipster.bundle.min.js') }}"></script>
<script src="{{ asset('site/js/jquery.lazy.min.js') }}"></script>
<script src="{{asset('site/js/intlTelInput-jquery.min.js')}}"></script>

<!-- Owl Carousel -->
<script src="{{ asset('site/js/owl.carousel.min.js') }}"></script>

<!-- فایل‌های اصلی پروژه -->
<script src="{{ asset('site/js/main.js') }}"></script>
<script src="{{ asset('admin/assets/js/sweetalert.min.js') }}"></script>

<!-- Persian Date & Datepicker JS -->
<script src="https://cdn.jsdelivr.net/npm/persian-date@1.0.6/dist/persian-date.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/persian-datepicker@1.2.0/dist/js/persian-datepicker.min.js"></script>

<!-- سایر اسکریپت‌های صفحه -->
@yield('script')

<script type="text/javascript">
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });
</script>
<script>
    $(function () {
        $('#submit').click(function () {

            var id = $('#menu_id').val();
            var name = $('#name').val();
            var phone = $('#phone').val();
            var submenu = $('#submenu').val();
            var description = $('#description').val();
            var captcha = $('#captcha').val();

            var datasend = {
                "_token": "{{csrf_token()}}",
                "id": id,
                "name": name,
                "phone": phone,
                "submenu ": submenu,
                "description": description,
                "captcha": captcha,
            }
            swal({
                    title: "Are you sure to delete this  of ?",
                    text: "Delete Confirmation?",
                    type: "warning",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Delete",
                    closeOnConfirm: false
                },
                $.ajax({
                    url: '{{ route('Consultationrequest')}}',
                    data: datasend,
                    type: 'POST',
                    dataType: 'json',
                    success: function (data) {
                        if (data.success == true) {
                            swal(data.subject, data.message, data.flag);
                            $('#name').val('');
                            $('#email').val('');
                            $('#phone').val('');
                            $('#description').val('');
                            $('#submenu').val('');
                            $('#captcha').val('');
                            $('#exampleModal').modal('hide');
                            $.ajax({
                                type: 'GET',
                                url: 'reload-captcha',
                                success: function (data) {
                                    $(".captcha span").html(data.captcha);
                                },
                            });
                        } else {
                            swal(data.subject, data.message, data.flag);
                        }
                    },
                    error: function (data) {
                        $.ajax({
                            type: 'GET',
                            url: 'reload-captcha',
                            success: function (data) {
                                $(".captcha span").html(data.captcha);
                            },
                        });
                        if (data.responseJSON && data.responseJSON.errors) {
                            $("#errorname").text('');
                            $("#erroremail").text('');
                            $("#errorphone").text('');
                            $("#errorcaptcha").text('');

                            var errors = data.responseJSON.errors;
                            if (errors.name) {

                                $("#errorname").text(errors.name[0]);
                            }
                            if (errors.email) {
                                $("#erroremail").text(errors.email[0]);
                            }
                            if (errors.phone) {
                                $("#errorphone").text(errors.phone[0]);
                            }
                            if (errors.captcha) {
                                $("#errorcaptcha").text(errors.captcha[0]);
                            }
                        }
                    },
                }));
        });
    });
</script>
<script>
    $(function () {
        $('#servicemode').change(function () {
            $("#submenu option").remove();
            var id = $('#servicemode').val();
            $.ajax({
                url: '{{ route( 'getcategory' ) }}',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                },
                type: 'post',
                dataType: 'json',
                success: function (result) {
                    $.each(result, function (k, v) {
                        $('#submenu').append($('<option>', {value: k, text: v}));
                    });
                },
                error: function () {
                    alert('error...');
                }
            });
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const banner = document.getElementById('app-banner');
        const navbar = document.getElementById('navbar_top');

        let bannerHeight = banner?.offsetHeight || 0;
        let bannerVisible = true;

        // تنظیم اولیه فاصله بدنه
        if (banner && navbar) {
            document.body.style.paddingTop = bannerHeight + 'px';
        }

        // کنترل اسکرول و موقعیت navbar
        window.addEventListener('scroll', function () {
            if (navbar) {
                if (window.scrollY > 50) {
                    navbar.classList.add('fixed-top');
                    navbar.style.top = bannerVisible ? bannerHeight + 'px' : '0';
                } else {
                    navbar.classList.remove('fixed-top');
                    navbar.style.top = '';
                }
            }
        });

        // کنترل بستن بنر
        const closeBtn = banner?.querySelector('button');
        closeBtn?.addEventListener('click', function () {
            if (banner) {
                banner.style.display = 'none';
                bannerVisible = false;
                document.body.style.paddingTop = '0';

                // اگر navbar در حال حاضر fixed هست، باید top رو صفر کنیم
                if (navbar && navbar.classList.contains('fixed-top')) {
                    navbar.style.top = '0';
                }
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var offcanvas = document.getElementById('offcanvasMenu');
        var navbarToggler = document.querySelector('.navbar-toggler');
        var closeButton = offcanvas.querySelector('.close');
        var bodyOverlay = document.createElement('div');
        bodyOverlay.classList.add('body-overlay');
        document.body.appendChild(bodyOverlay);

        navbarToggler.addEventListener('click', function () {
            offcanvas.classList.toggle('show');
            bodyOverlay.classList.toggle('show');
        });

        closeButton.addEventListener('click', function () {
            offcanvas.classList.remove('show');
            bodyOverlay.classList.remove('show');
        });

        bodyOverlay.addEventListener('click', function () {
            offcanvas.classList.remove('show');
            bodyOverlay.classList.remove('show');
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('[data-toggle="offcanvas"]').on('click', function () {
            $('#offcanvasMenu').toggleClass('open');
        });

        // کنترل Collapse
        $('.collapse').on('shown.bs.collapse', function () {
            $(this).parent().find('.la-angle-down').removeClass('la-angle-down').addClass('la-angle-up');
        }).on('hidden.bs.collapse', function () {
            $(this).parent().find('.la-angle-up').removeClass('la-angle-up').addClass('la-angle-down');
        });
    });

</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var banner = document.getElementById('app-banner');
        if (banner) {
            var bannerHeight = banner.offsetHeight;
            document.body.style.paddingTop = bannerHeight + 'px';
        }
    });
</script>

</body>
</html>
