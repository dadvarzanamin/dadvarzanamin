@extends('mobile.mobilemaster')
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
    <title>{{$thispage->tab_title}}</title>
@endsection
@section('main')
    <div class="slider">
        <div class="container">
            <div data-pagination='{"el": ".swiper-pagination"}' data-space-between="10"
                 class="swiper-container swiper-init swiper-container-horizontal">
                <div class="swiper-pagination"></div>
                <div class="swiper-wrapper">
                    @foreach($slides as $slide)
                        <div class="swiper-slide">
                            <div class="content">
                                <div class="mask"></div>
                                <img src="{{asset('./mobile/images/mobile-banner.webp')}}"
                                     alt="{{$companies['title']}}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="categories segments">
        <div class="container">

            <div class="row">
                <div class="content" style="margin: 20px auto;">
                    <p style="font-size: 20px;margin-bottom: 10px;margin-top: -20px;text-align: center">قانون جدید شورای
                        حل اختلاف</p>
                    <h3 class="text-center">تفسیر | تطبیق | تمایز</h3>
                    <h4 class="text-center" style="margin: 20px 0px;">با تدریس: آقای یحیی ابراهیمی</h4>
                    <h6 class="text-center">دادستان سابق دادگستری</h6>
                    <h5 class="text-center" style="margin: 20px;">زمان:پنجشنبه 11 مرداد ماه از ساعت 10 الی 14 </h5>
                </div>
                <div class="content content-shadow-product" style="margin:0 auto;">
                    <img src="{{asset('site/images/123.png')}}" style="width: 200px" alt="قانون جدید شورای حل اختلاف">
                </div>
            </div>
            <div class="row pt-4"style="margin-top: 24px">
                <div class="col-lg-12 responsive-column-half">
                    <div class="info-icon-box mb-3 text-center">
                        <div class="row justify-content-center">
                            <div class="time-segment" style="border-bottom-right-radius: 16px;border-top-right-radius: 16px">
                                <span id="days">0</span>
                                <span>روز</span>
                            </div>
                            <div class="time-segment">
                                <span id="hours">0</span>
                                <span>ساعت</span>
                            </div>
                            <div class="time-segment">
                                <span id="minutes">0</span>
                                <span>دقیقه</span>
                            </div>
                            <div class="time-segment" style="border-bottom-left-radius: 16px;border-top-left-radius: 16px">
                                <span id="seconds">0</span>
                                <span>ثانیه</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="content" style="margin: 0px auto;">
                    @if(Auth::check())
                        <div class="content-button">
                            <a href="#tab-workshop" class="mobile-button tab-link"
                               style="margin: auto; border-radius: 16px;">ثبت نام جهت حضور در کارگاه
                                آموزشی</a>
                        </div>
                    @else
                        <div class="content-button">
                            <a href="#tab-login" class="mobile-button tab-link"
                               style="margin:auto;border-radius: 16px;">ثبت نام در کارگاه آموزشی/ ورود به
                                سایت</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>
        // Set the date we're counting down to
        var countDownDate = new Date("August 01, 2024 16:00:00").getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // // Display the result in the element with id="demo"
            // document.getElementById("demo").innerHTML = days + " روز " + hours + " ساعت " + minutes +" دقیقه "+ seconds + " ثانیه " ;
            // //+ minutes + " دقیقه " + seconds + " ثانیه ";
            document.getElementById("days").innerHTML = days;
            document.getElementById("hours").innerHTML = hours;
            document.getElementById("minutes").innerHTML = minutes;
            document.getElementById("seconds").innerHTML = seconds;
            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("days").innerHTML = "EXPIRED";
                document.getElementById("hours").innerHTML = "EXPIRED";
                document.getElementById("minutes").innerHTML = "EXPIRED";
                document.getElementById("seconds").innerHTML = "EXPIRED";
            }

        }, 1000);
    </script>
    <div class="categories segments">
        <div class="container">
            <div class="section-title">
                <h3>خدمات برای موکلین</h3>
            </div>
            <div class="row">
                @foreach($servicelawyers as $servicelawyer)
                    <div class="col-30" style="margin: 10px auto;text-align: center;">
                        <div class="content">
                            <a href="{{url('خدمات/'.$servicelawyer->slug)}}" class="external">
                                <div class="icon">
                                    <img src="{{asset($servicelawyer->image)}}" alt="{{$servicelawyer->title}}">
                                </div>
                                <span style="font-size: 8px">{{$servicelawyer->title}}</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="section-title">
                <h3>خدمات برای وکلا</h3>
            </div>
            <div class="row">
                @foreach($serviceclients as $serviceclient)
                    <div class="col-30">
                        <div class="content">
                            <a href="{{url('خدمات/'.$serviceclient->slug)}}" class="external">
                                <div class="icon">
                                    <img src="{{asset($serviceclient->image)}}"
                                         style="margin: 10px auto;text-align: center;" alt="{{$serviceclient->title}}">
                                </div>
                                <span style="font-size: 8px">{{$serviceclient->title}}</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="flash-sale segments no-pd-b">
        <div class="container">
            <div class="section-title flash-s-title">
                <h3>برخی از موکلین</h3>
                <div data-space-between="10" data-slides-per-view="auto" class="swiper-container swiper-init">
                    <div class="swiper-wrapper">
                        @foreach($customers as $customer)
                            <div class="swiper-slide">
                                <div class="content content-shadow-product">
                                    <img src="{{asset($customer->image)}}" alt="{{$customer->name}}"
                                         style="max-width: 80px;margin: 0 auto;"/>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="popular-product segments-bottom">
        <div class="container">
            <div class="section-title">
                <h3>اخبار و رویدادها
                    <a href="{{'تیم-ما/اخبار'}}" class="link external" style="float: left">مشاهده همه</a>
                </h3>
            </div>
            <div data-pagination='{"el": ".swiper-pagination"}' data-space-between="10" data-slides-per-view="1"
                 class="swiper-container swiper-init">
                <div class="swiper-pagination"></div>
                <div class="swiper-wrapper">
                    @foreach($akhbars as $akhbar)
                        <div class="swiper-slide">
                            <div class="content content-shadow-product">
                                <a href="{{url('اخبار/'.$akhbar->slug)}}" class="link external">
                                    <img src="{{asset($akhbar->image)}}" alt="{{$akhbar->title}}">
                                    <div class="text">
                                        <a href="{{url('اخبار/'.$akhbar->slug)}}" class="link external"><h5
                                                style="text-align: center">{{$akhbar->title}}</h5></a>
                                        <p class="date">{{jdate($akhbar->updated_at)->ago()}}</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="popular-product segments-bottom">
        <div class="container">
            <div class="section-title">
                <h3>اخبار و رویدادها
                    <a href="{{'تیم-ما/محتوای-آموزشی'}}" class="link external" style="float: left">مشاهده همه</a>
                </h3>
            </div>
            <div data-pagination='{"el": ".swiper-pagination"}' data-space-between="10" data-slides-per-view="1"
                 class="swiper-container swiper-init">
                <div class="swiper-pagination"></div>
                <div class="swiper-wrapper">
                    @foreach($posts as $post)
                        <div class="swiper-slide">
                            <div class="content content-shadow-product">
                                <a href="{{url('محتوای-آموزشی/'.$post->slug)}}" class="link external">
                                    <img src="{{asset($post->image)}}" alt="{{$post->title}}">
                                    <div class="text">
                                        <a href="{{url('محتوای-آموزشی/'.$post->slug)}}" class="link external"><h5
                                                style="text-align: center">{{$post->title}}v</h5></a>
                                        <p class="date">{{jdate($post->updated_at)->ago()}}</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="recommended product segments-bottom">
        <div class="container">
            <div class="section-title">
                <h3>تیم ما</h3>
            </div>
            <div data-pagination='{"el": ".swiper-pagination"}' data-space-between="10" data-slides-per-view="3"
                 class="swiper-container swiper-init">
                <div class="swiper-pagination"></div>
                <div class="swiper-wrapper">
                    @foreach($emploees as $emploee)
                        <div class="swiper-slide">
                            <div class="content content-shadow-product">
                                <a href="#">
                                    <img src="{{asset($emploee->image)}}" alt="{{$emploee->fullname}}">
                                    <div class="text" style="text-align: center">
                                        <p class="title-product" style="font-size: 8px;">{{$emploee->fullname}}</p>
                                        <p class="price" style="font-size: 8px;">{{$emploee->side}}</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
    <div id="tab-deportment" class="page-content tab">
        <div class="navbar navbar-page">
            <div class="navbar-inner">
                <div class="left"></div>
                <div class="title">
                    خدمات حقوقی
                </div>
                <div class="right"></div>
            </div>
        </div>
        <div class="official-brand">
            <div class="container">
                <div class="slider-brand segments-bottom">
                    <div data-pagination='{"el": ".swiper-pagination"}' data-space-between="10"
                         class="swiper-container swiper-init swiper-container-horizontal">
                        <div class="swiper-pagination"></div>
                        <div class="swiper-wrapper">
                            @foreach($slides as $slide)
                                <div class="swiper-slide">
                                    <div class="content">
                                        <div class="mask"></div>
                                        <img src="{{asset('storage/'.$slide->file_link)}}"
                                             alt="{{$companies['title']}}">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="popular-brand segments-bottom">
                    <div class="container">
                        <div class="section-title">
                            <h3>دپارتمان دعاوی</h3>
                        </div>
                        <div class="row">
                            @foreach($submenus as $submenu)
                                @if($submenu->menu_id == 61)
                                    <div class="col-30" style="margin: 10px auto;text-align: center;">
                                        <div class="content">
                                            <a href="{{url('دپارتمان-دعاوی'.'/'.$submenu->slug)}}" class="external">
                                                <div class="icon">
                                                    <img src="{{asset('site/images/logodadvarzan.png')}}"
                                                         alt="{{$submenu->title}}">
                                                </div>
                                                <span style="font-size: 8px; margin-top: 4px;">{{$submenu->title}}</span>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="section-title">
                            <h3>دپارتمان قراردادها</h3>
                        </div>
                        <div class="row">
                            @foreach($submenus as $submenu)
                                @if($submenu->menu_id == 62)
                                    <div class="col-30" style="margin: 10px auto;text-align: center;">
                                        <div class="content">
                                            <a href="{{url('دپارتمان-قراردادها'.'/'.$submenu->slug)}}" class="external">
                                                <div class="icon">
                                                    <img src="{{asset('site/images/logodadvarzan.png')}}"
                                                         style="margin: 10px auto;text-align: center;"
                                                         alt="{{$submenu->title}}">
                                                </div>
                                                <span style="font-size: 8px">{{$submenu->title}}</span>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="section-title">
                            <h3>دپارتمان آموزش و پرورش</h3>
                        </div>
                        <div class="row">
                            @foreach($submenus as $submenu)
                                @if($submenu->menu_id == 63)
                                    <div class="col-30" style="margin: 10px auto;text-align: center;">
                                        <div class="content">
                                            <a href="{{url('دپارتمان-اموزش-و-پژوهش'.'/'.$submenu->slug)}}"
                                               class="external">
                                                <div class="icon">
                                                    <img src="{{asset('site/images/logodadvarzan.png')}}"
                                                         style="margin: 10px auto;text-align: center;"
                                                         alt="{{$submenu->title}}">
                                                </div>
                                                <span style="font-size: 8px">{{$submenu->title}}</span>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="tab-service" class="page-content tab">
        <div class="navbar navbar-page">
            <div class="navbar-inner">
                <div class="left"></div>
                <div class="title">
                    خدمات حقوقی
                </div>
                <div class="right"></div>
            </div>
        </div>
        <div class="official-brand">
            <div class="container">
                <div class="slider-brand segments-bottom">
                    <div data-pagination='{"el": ".swiper-pagination"}' data-space-between="10"
                         class="swiper-container swiper-init swiper-container-horizontal">
                        <div class="swiper-pagination"></div>
                        <div class="swiper-wrapper">
                            @foreach($slides as $slide)
                                <div class="swiper-slide">
                                    <div class="content">
                                        <div class="mask"></div>
                                        <img src="{{asset('storage/'.$slide->file_link)}}"
                                             alt="{{$companies['title']}}">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="popular-brand segments-bottom">
                    <div class="container">
                        <div class="section-title">
                            <h3>خدمات برای موکلین</h3>
                        </div>
                        <div class="row">
                            @foreach($servicelawyers as $servicelawyer)
                                <div class="col-30" style="margin: 10px auto;text-align: center;">
                                    <div class="content">
                                        <a href="#">
                                            <div class="icon">
                                                <img src="{{asset($servicelawyer->image)}}"
                                                     alt="{{$servicelawyer->title}}">
                                            </div>
                                            <span style="font-size: 8px;margin-top: 8px">{{$servicelawyer->title}}</span>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="section-title">
                            <h3>خدمات برای وکلا</h3>
                        </div>
                        <div class="row">
                            @foreach($serviceclients as $serviceclient)
                                <div class="col-30" style="margin: 10px auto;text-align: center;">
                                    <div class="content">
                                        <a href="#">
                                            <div class="icon">
                                                <img src="{{asset($serviceclient->image)}}"
                                                     style="margin: 10px auto;text-align: center;"
                                                     alt="{{$serviceclient->title}}">
                                            </div>
                                            <span style="font-size: 8px">{{$serviceclient->title}}</span>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="tab-consultation" class="page-content tab">
        <div class="navbar navbar-page">
            <div class="navbar-inner">
                <div class="left"></div>
                <div class="title">
                    سوالات متداول
                </div>
                <div class="right"></div>
            </div>
        </div>
        <div class="page-content">
            <div class="faq segments-bottom">
                <div class="list accordion-list">
                    <ul>
                        @foreach($submenus as $submenu)
                            <li class="accordion-item">
                                <a href="#" class="item-content item-link">
                                    <div class="item-media">
                                        <i class="fas fa-list-alt"></i>
                                    </div>
                                    <div class="item-inner">
                                        <div class="item-title">{{$submenu->title}}</div>
                                    </div>
                                </a>
                                <div class="accordion-item-content">
                                    <div class="container">
                                        <div class="divider-space-text"></div>
                                        <a href="#">نحوه نوشتن یک قرارداد درست چیست؟</a>
                                        <a href="#">مشاوره حقوقی یعنی چه؟</a>
                                        <a href="#">چرا باید به وکیل مراجعه کنیم؟</a>
                                        <a href="#">وکیل پایه یک دادگستری یعنی چه؟</a>
                                        <a href="#">وکیل پایه یک دادگستری یعنی چه؟</a>
                                        <a href="#">وکیل پایه یک دادگستری یعنی چه؟</a>
                                        <a href="#">وکیل پایه یک دادگستری یعنی چه؟</a>
                                        <a href="#">وکیل پایه یک دادگستری یعنی چه؟</a>
                                        <div class="divider-space-text"></div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="tab-account" class="page-content tab">
        <div class="navbar navbar-page">
            <div class="navbar-inner">
                <div class="left"></div>
                <div class="title">
                    درباره ما
                </div>
                <div class="right">
                    <a href="/settings/">
                        <i class="fas fa-cog"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="recommended product segments-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-100">
                        <div class="content content-shadow-product" style="text-align: center">
                            <a href="/product-details/">
                                <div class="text">
                                    <i class="fas fa-phone-alt" style="font-size:25px;padding:12px;"></i>
                                    <p class="title-product">شماره تماس</p>
                                    <p class="price">02188438191</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-100">
                        <div class="content content-shadow-product" style="text-align: center">
                            <a href="/product-details/">
                                <div class="text">
                                    <i class="fas fa-mail-bulk" style="font-size:25px;padding:12px;"></i>
                                    <p class="title-product">ادرس ایمیل</p>
                                    <p class="price">info@dadvarzanamin.ir</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-100">
                        <div class="content content-shadow-product" style="text-align: center">
                            <a href="/product-details/">
                                <div class="text">
                                    <i class="fas fa-balance-scale" style="font-size:25px;padding:12px;"></i>
                                    <p class="title-product">دفتر مرکزی</p>
                                    <p class="price">تهران خیابان شریعتی نبش کوچه شهید جعفرزاده پلاک ۴۹۲</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-100">
                        <div class="content content-shadow-product" style="text-align: center">
                            <iframe width="100%" height="400px"
                                    src="https://www.openstreetmap.org/export/embed.html?bbox=51.44101113080979%2C35.72041122802278%2C51.44455164670944%2C35.72238848247882&amp;layer=mapnik&amp;marker=35.72139986138454%2C51.44278138875961"
                                    style="border: 1px solid black"></iframe>
                            <br/><small><a
                                    href="https://www.openstreetmap.org/?mlat=35.72140&amp;mlon=51.44278#map=19/35.72140/51.44278">موقعیت
                                    ما روی نقشه</a></small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-100">
                        <div class="password-settings segments">
                            <div class="container">
                                <form class="list">
                                    <ul>
                                        <li class="item-content item-input">
                                            <div class="item-inner">
                                                <div class="item-input-wrap">
                                                    <input type="text" placeholder="نام و نام خانوادگی">
                                                </div>
                                            </div>
                                        </li>
                                        <li class="item-content item-input">
                                            <div class="item-inner">
                                                <div class="item-input-wrap">
                                                    <input type="email" placeholder="ایمیل">
                                                </div>
                                            </div>
                                        </li>
                                        <li class="item-content item-input">
                                            <div class="item-inner">
                                                <div class="item-input-wrap">
                                                    <input type="text" placeholder="موضوع">
                                                </div>
                                            </div>
                                        </li>
                                        <li class="item-content item-input">
                                            <div class="item-inner">
                                                <div class="item-input-wrap">
                                                    <textarea cols="30" rows="10" placeholder="پیام ..."></textarea>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="content-button">
                                        <a href="#" class="button primary-button"><i class="fas fa-paper-plane"></i>ارسال</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="tab-login" class="page-content tab">
        <div class="navbar navbar-page">
            <div class="navbar-inner">
                <div class="title"> ورود</div>
                <div class="right"><a href="#tab-home" class="tab-link"><i class="fas fa-arrow-left"></i></a></div>
            </div>
        </div>
        <div class="recommended product segments-bottom">
            <div class="container" >
                <div class="row">
                    <div class="col-100">
                        <div class="password-settings segments">
                            <div class="container d-flex justify-content-center align-items-center" >
                                <div class="row d-flex justify-content-center">
                                    <img src="{{url('/mobile/images/login-mobile.png/')}}" alt="login" style="width: 50%">
                                </div>
                                <form method="POST" action="{{ route('login-user-mobile') }}" class="list">
                                    @csrf
                                    <ul>
                                        <li class="item-content item-input">
                                            <div class="item-inner">
                                                <div class="item-input-wrap">
                                                    <input type="text" name="phone" required placeholder="شماره موبایل"
                                                           @error('phone') is-invalid @enderror">
                                                </div>
                                            </div>
                                        </li>
                                        <li class="item-content item-input">
                                            <div class="item-inner">
                                                <div class="item-input-wrap">
                                                    <input type="password" name="password" required
                                                           placeholder="رمز عبور"
                                                           @error('password') is-invalid @enderror">
                                                </div>
                                            </div>
                                        </li>
                                        <li class="item-content item-input" style="margin-bottom: 36px">
                                            <div class="item-inner">
                                                <div class="item-input-wrap">
                                                    <input type="text" name="captcha" required placeholder="کد امنیتی"
                                                           @error('captcha') is-invalid @enderror">
                                                    <br>
                                                    <div class="form-account-title captcha">
                                                        <label for="captcha_img" class="float-right"></label>
                                                        <span class="float-left">{!! captcha_img('math') !!}</span>
                                                        <br>
                                                        <button type="button" class="btn btn-default reload" id="reload"
                                                                style="width:10%;float: right;margin: -25px 20px;height: 35px;">
                                                            &#x21bb;
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="row justify-content-space-between align-items-center">
                                        <button type="submit" class="mobile-button" style="width: 48%"><i
                                                class="fas fa-lock-open"></i>ورود
                                        </button>
                                        <a href="#tab-register" class="outline-button tab-link col-3"
                                           style="width: 48%"><i class="fas fa-user-check mr-2"></i>ثبت نام در سایت</a>
                                    </div>
                                    <div class="row">
                                        <a href="{{url('login/google')}}" class="google-button external" style="width: 100%"> ورود با حساب
                                            گوگل </a>
                                    </div>

                                </form>
                                <div class="content-button text-align-center" style="margin-top: 8px">
                                    <a href="{{route('remember')}}" class="mobile-button external"
                                       style="margin: 0; background-color: transparent;padding: 0 4px;border: 0;border-bottom: 1px solid #323232; border-radius: 0"><i
                                            class="fas fa-lock mr-2"></i>فراموشی رمز عبور
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="tab-register" class="page-content tab">
        <div class="navbar navbar-page">
            <div class="navbar-inner">
                <div class="title"> عضویت</div>
                <div class="right"><a href="#tab-login" class="tab-link"><i class="fas fa-arrow-left"></i></a></div>
            </div>
        </div>
        <div class="recommended product segments-bottom">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <img src="{{url('/mobile/images/login-mobile.png/')}}" alt="login" style="width: 50%">
                </div>
                <div class="row">
                    <div class="col-100">
                        <div class="password-settings segments">
                            <div class="container">
                                <form method="POST" action="{{ route('mobile-register') }}" class="list">
                                    @csrf
                                    <ul>
                                        <li class="item-content item-input">
                                            <div class="item-inner">
                                                <div class="item-input-wrap">
                                                    <input type="text" name="name" autocomplete="off"
                                                           placeholder="نام و نام خانوادگی" required
                                                           class="form-control @error('name') is-invalid @enderror">
                                                </div>
                                            </div>
                                        </li>
                                        <li class="item-content item-input">
                                            <div class="item-inner">
                                                <div class="item-input-wrap">
                                                    <input type="text" name="phone" autocomplete="off"
                                                           placeholder="موبایل" required
                                                           class="form-control @error('phone') is-invalid @enderror">
                                                </div>
                                            </div>
                                        </li>
                                        <li class="item-content item-input">
                                            <div class="item-inner">
                                                <div class="item-input-wrap">
                                                    <input type="text" name="email" autocomplete="off"
                                                           placeholder="ایمیل" required
                                                           class="form-control @error('email') is-invalid @enderror">
                                                </div>
                                            </div>
                                        </li>
                                        <li class="item-content item-input">
                                            <div class="item-inner">
                                                <div class="item-input-wrap">
                                                    <input type="text" name="username" autocomplete="off"
                                                           placeholder="نام کاربری" required
                                                           class="form-control @error('username') is-invalid @enderror">
                                                </div>
                                            </div>
                                        </li>
                                        <li class="item-content item-input">
                                            <div class="item-inner">
                                                <div class="item-input-wrap">
                                                    <select name="type_user" class="form-control" required>
                                                        <option value="">انتخاب کنید</option>
                                                        @foreach(\App\Models\TypeUser::select('id' , 'title_fa')->whereIn('id' , [4,5,6,7])->get() as $type)
                                                            <option value="{{$type->id}}">{{$type->title_fa}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="item-content item-input">
                                            <div class="item-inner">
                                                <div class="item-input-wrap">
                                                    <input type="password" id="pass" autocomplete="off"
                                                           placeholder="رمز عبور" required name="password"
                                                           class="form-control"/>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="item-content item-input">
                                            <div class="item-inner">
                                                <div class="item-input-wrap">
                                                    <input type="password" required name="password_confirmation"
                                                           placeholder="تکرار رمز عبور" class="form-control"/>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="content-button">
                                        <button type="submit" class="mobile-button primary-button"><i
                                                class="fas fa-paper-plane"></i>عضویت در سایت
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(Auth::check())
        <div id="tab-profile" class="page-content tab">
            <div class="navbar navbar-page">
                <div class="navbar-inner">
                    <div class="title"> پروفایل کاربری</div>
                    <div class="right"><a href="#tab-home" class="tab-link"><i class="fas fa-arrow-left"></i></a></div>
                </div>
            </div>
            <div class="recommended product segments-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-100">
                            <div class="shop-cart-btn">
                                <div class="avatar-xs">
                                    <img class="rounded-full img-fluid"
                                         style="width: 40%; margin: 20px auto; border-radius: 24px"
                                         @if(Auth::user()->image)  src="{{Auth::user()->image}}"
                                         @else src="{{asset('admin/assets/img/users/1.jpg')}}"
                                         @endif alt="{{(Auth::user()->name)}}"/>
                                </div>
                                <span class="dot-status bg-1"></span>
                            </div>
                            <div class="password-settings segments">
                                <div class="container">
                                    <ul>
                                        <li class="item-content item-input">
                                            <div class="item-inner">
                                                <div class="item-input-wrap" style="margin: 12px auto;">
                                                    <h4>{{Auth::user()->name}}</h4>
                                                </div>
                                                @if(Auth::user()->phone == null)
                                                    <style>
                                                        /* The alert message box */
                                                        .alert {
                                                            padding: 20px;
                                                            background-color: #f44336; /* Red */
                                                            color: white;
                                                            margin: 15px auto;
                                                        }

                                                        /* The close button */
                                                        .closebtn {
                                                            margin-left: 15px;
                                                            color: white;
                                                            font-weight: bold;
                                                            float: right;
                                                            font-size: 22px;
                                                            line-height: 20px;
                                                            cursor: pointer;
                                                            transition: 0.3s;
                                                        }

                                                        /* When moving the mouse over the close button */
                                                        .closebtn:hover {
                                                            color: black;
                                                        }
                                                    </style>
                                                    <div class="alert">
                                                        <span class="closebtn"></span>
                                                        برای دریافت فایل های آموزشی ثبت و تایید شماره موبایل الزامی می
                                                        باشد
                                                    </div>
                                                @endif
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="content-button">
                                        <a href="#tab-editprofile" class="mobile-button tab-link"><i
                                                class="fas fa-edit"></i>ویرایش اطلاعات کاربری</a>
                                    </div>
                                    <div class="content-button">
                                        <a href="{{route('logout')}}" class="outline-button tab-link external"><i
                                                class="fas fa-out"></i>خروج از حساب کاربری</a>
                                    </div>
                                    @if(Auth::user()->phone != null)
                                        <!--<table>-->
                                        <!--    <tr>-->
                                        <!--        <th>ردیف</th>-->
                                        <!--        <th>نام فایل</th>-->
                                        <!--        <th>فایل</th>-->
                                        <!--    </tr>-->
                                        <!--    @foreach(\App\Models\Dashboard\Learnfile::select('id' , 'title' , 'image' , 'file')->whereStatus(4)->orderBy('id' , 'DESC')->get() as $learnfile)-->
                                        <!--        <tr>-->
                                        <!--            <td>{{$loop->iteration}}</td>-->
                                        <!--            <td>{{$learnfile->title}}</td>-->
                                        <!--            <td><a href="{{route('learn-file-download', $learnfile->id)}}" class="tab-link external"><img src="{{$learnfile->image}}" alt="" style="width: 100px"></a></td>-->
                                        <!--        </tr>-->
                                        <!--    @endforeach-->
                                        <!--</table>-->
                                        <table>
                                            <tr>
                                                <th scope="col">نام دوره</th>
                                                <th scope="col">تاریخ دوره</th>
                                                <th scope="col">نوع حضور</th>
                                                <th scope="col">مبلغ پرداخت</th>
                                                <th scope="col">وضعیت پرداخت</th>
                                            </tr>
                                            @foreach(Illuminate\Support\Facades\DB::table('workshops')
                ->join('workshopsigns', 'workshops.id', '=', 'workshopsigns.workshop_id')
                ->select('workshops.title', 'workshops.price' , 'workshops.date' , 'workshopsigns.typeuse', 'workshopsigns.pricestatus')
                ->where('workshopsigns.user_id' , '=' , Auth::user()->id)
                ->where('workshopsigns.pricestatus' , '!=' , null)
                ->get() as $workshopsign)
                                                <tr>

                                                    <td>
                                                        <ul class="generic-list-item">
                                                            <li>{{$workshopsign->title}}</li>
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        <ul class="generic-list-item">
                                                            <li>{{$workshopsign->date}}</li>
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        <ul class="generic-list-item">
                                                            @if($workshopsign->typeuse == 1)
                                                                <i>حضوری</i>
                                                            @elseif($workshopsign->typeuse == 2)
                                                                <i>آنلاین</i>
                                                            @endif
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        <ul class="generic-list-item">
                                                            <li>{{number_format($workshopsign->price)}} تومان</li>
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        <ul class="generic-list-item">
                                                            <li>
                                                                @if($workshopsign->pricestatus == 4)
                                                                    <i>پرداخت موفق</i>
                                                                @elseif($workshopsign->pricestatus == null)
                                                                    <i>پرداخت ناموفق</i>
                                                                @endif
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                        @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="tab-editprofile" class="page-content tab">
            <div class="navbar navbar-page">
                <div class="navbar-inner">
                    <div class="title">ویرایش پروفایل کاربری</div>
                    <div class="right"><a href="#tab-profile" class="tab-link"><i class="fas fa-arrow-left"></i></a>
                    </div>
                </div>
            </div>
            <div class="recommended product segments-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-100">
                            <div class="shop-cart-btn">
                                <div class="avatar-xs">
                                    <img class="rounded-full img-fluid" style="width: 40%; margin: 40px auto 20px;border-radius: 24px"
                                         @if(Auth::user()->image)  src="{{Auth::user()->image}}"
                                         @else src="{{asset('admin/assets/img/users/1.jpg')}}"
                                         @endif alt="{{(Auth::user()->name)}}"/>
                                </div>
                                <span class="dot-status bg-1"></span>
                            </div>
                            <div class="password-settings segments">
                                <div class="container">
                                    <form method="POST" action="{{ route('edit-user-mobile') }}"
                                          enctype="multipart/form-data" class="list">
                                        @csrf
                                        <ul>
                                            <li class="item-content item-input">
                                                <div class="item-inner">
                                                    <div class="item-input-wrap">
                                                        <label>نام و نام خانوادگی</label>
                                                        <input type="text" name="name"
                                                               style="{{Auth::user()->name == null ? 'border:1px solid red' : ''}}"
                                                               required value="{{Auth::user()->name}}">
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="item-content item-input">
                                                <div class="item-inner">
                                                    <div class="item-input-wrap">
                                                        <label>نام کاربری</label>
                                                        <input type="text" name="username"
                                                               style="{{Auth::user()->username == null ? 'border:1px solid red' : ''}}"
                                                               required value="{{Auth::user()->username}}">
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="item-content item-input">
                                                <div class="item-inner">
                                                    <div class="item-input-wrap">
                                                        <label>شماره موبایل</label>
                                                        <input type="text" name="phone"
                                                               style="{{Auth::user()->phone == null ? 'border:1px solid red' : ''}}"
                                                               required value="{{Auth::user()->phone}}">
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="item-content item-input">
                                                <div class="item-inner">
                                                    <div class="item-input-wrap">
                                                        <label>ایمیل</label>
                                                        <input type="text" name="email"
                                                               style="{{Auth::user()->email == null ? 'border:1px solid red' : ''}}"
                                                               required value="{{Auth::user()->email}}">
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="item-content item-input">
                                                <div class="item-inner">
                                                    <div class="item-input-wrap">
                                                        <label>کد ملی</label>
                                                        <input type="text" name="national_id"
                                                               style="{{Auth::user()->national_id == null ? 'border:1px solid red' : ''}}"
                                                               required value="{{Auth::user()->national_id}}">
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="item-content item-input">
                                                <div class="item-inner">
                                                    <div class="item-input-wrap">
                                                        <label>تصویر پروفایل</label>
                                                        <input type="file" name="image" style="width: 94%;"/>
                                                    </div>
                                                </div>
                                            </li>
                                            {{--                                        <li class="item-content item-input">--}}
                                            {{--                                            <div class="item-inner">--}}
                                            {{--                                                <div class="item-input-wrap">--}}
                                            {{--                                                    <input class="form-control" required type="password" name="old_password" placeholder="رمز عبور قدیمی" />--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}
                                            {{--                                        </li>--}}
                                            {{--                                        <li class="item-content item-input">--}}
                                            {{--                                            <div class="item-inner">--}}
                                            {{--                                                <div class="item-input-wrap">--}}
                                            {{--                                                    <input class="form-control" required type="password" name="password" placeholder="رمز عبور جدید" />--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}
                                            {{--                                        </li>--}}
                                            {{--                                        <li class="item-content item-input">--}}
                                            {{--                                            <div class="item-inner">--}}
                                            {{--                                                <div class="item-input-wrap">--}}
                                            {{--                                                    <input class="form-control" required type="password" name="password_confirmation" placeholder="رمز عبور جدید را تأیید کنید" />--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}
                                            {{--                                        </li>--}}
                                        </ul>
                                        <div class="content-button">
                                            <button type="submit" class="mobile-button" style="margin-top: 20px"><i
                                                    class="fas fa-edit"></i>ویرایش
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="tab-workshop" class="page-content tab">
            <div class="navbar navbar-page">
                <div class="navbar-inner">
                    <div class="title">ثبت نام کارگاه ها و دوره های آموزشی</div>
                    <div class="right"><a href="#tab-profile" class="tab-link"><i class="fas fa-arrow-left"></i></a>
                    </div>
                </div>
            </div>
            <div class="recommended product segments-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-100">
                            <div class="password-settings segments">
                                <div class="container">
                                    <form method="POST" action="{{ route('workshop-sign') }}"
                                          enctype="multipart/form-data" class="list">
                                        @csrf
                                        <ul>
                                            <li class="item-content item-input">
                                                <div class="item-inner">
                                                    <div class="item-input-wrap">
                                                        <label>نام دوره/ کارگاه آموزشی</label>
                                                        <select name="workshopid" class="form-control" id="workshopid">
                                                            <option value="">انتخاب کنید</option>
                                                            @foreach($workshops as $workshop)
                                                                <option
                                                                    value="{{$workshop->id}}">{{$workshop->title}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="item-content item-input">
                                                <div class="item-inner">
                                                    <div class="item-input-wrap">
                                                        <label>نوع استفاده</label>
                                                        <select name="typeuse" class="form-control" id="typeuse">
                                                            <option value="">انتخاب کنید</option>
                                                            <option value="1">حضوری</option>
                                                            <option value="2">مجازی</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="content-button">
                                            <button type="submit" class="mobile-button"><i
                                                    class="fas fa-edit"></i>ثبت نام
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
{{--        <div id="tap-payment" class="tab-payment tab">--}}
{{--            <div class="navbar navbar-page">--}}
{{--                <div class="navbar-inner">--}}
{{--                    <div class="title">پرداخت هزینه کارگاه</div>--}}
{{--                    <div class="right"><a href="#tab-profile" class="tab-link"><i class="fas fa-arrow-left"></i></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div id="tap-payment" class="tab-payment tab">--}}
{{--            <div class="tab-pane fade show active" id="store-workshop" role="tabpanel" aria-labelledby="store-workshop-tab">--}}
{{--                <div class="setting-body">--}}
{{--                    <form method="get" action="{{route('pay')}}" class="row pt-40px">--}}
{{--                        @csrf--}}
{{--                        <div class="input-box col-lg-3">--}}
{{--                            <label class="label-text">نام دوره</label>--}}
{{--                            <p>{{$workshopsigns->title}}</p>--}}
{{--                        </div>--}}

{{--                        <div class="input-box col-lg-3">--}}
{{--                            <label class="label-text">مبلغ هزینه دوره</label>--}}
{{--                            <div class="form-group">--}}
{{--                                <p>{{number_format($workshopsigns->price)}} تومان </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="input-box col-lg-3">--}}
{{--                            <label class="label-text">نوع استفاده</label>--}}
{{--                            <div class="form-group">--}}
{{--                                @if($workshopsigns->typeuse == 1)--}}
{{--                                    <p> حضوری </p>--}}
{{--                                @else--}}
{{--                                    <p> آنلاین </p>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="input-box col-lg-3">--}}
{{--                            <label class="label-text">تاریخ دوره</label>--}}
{{--                            <div class="form-group">--}}
{{--                                <p>{{$workshopsigns->date}}</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="input-box col-lg-12 py-2">--}}
{{--                            <button type="submit" class="btn theme-btn">تایید و پرداخت</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        @endif
        </div>

        @endsection
