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
    <div class="slider">
        <div class="container">
            <div data-pagination='{"el": ".swiper-pagination"}' data-space-between="10" class="swiper-container swiper-init swiper-container-horizontal">
                <div class="swiper-pagination"></div>
                <div class="swiper-wrapper">
                    @foreach($slides as $slide)
                        <div class="swiper-slide">
                            <div class="content">
                                <div class="mask"></div>
                                <img src="{{asset('storage/'.$slide->file_link)}}" alt="{{$companies['title']}}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{-- 
    <div class="categories segments">
        <div class="container">
            <div class="section-title">
                <h3> سلسله نشست های صحن دولت </h3>
            </div>
            <div class="row">
                        <div class="content" style="margin-top: 40px">
                            <p style="font-size: 20px;margin-bottom: 10px;margin-top: -20px;text-align: center"> بایسته‌های حقوقی نظام مقررات گذاری دولت </p>
                            <h3 class="text-center">آیین نامه | بخشنامه | تصویب نامه</h3>
                            <h4 class="text-center" style="margin: 20px 0px;">سخنران:دکتر حسین سیمایی صراف</h4>
                            <h6 class="text-center">*عضو هیئت علمی دانشکده شهید بهشتی</h6>
                            <h6 class="text-center">دبیر هیئت دولت دوازدهم</h6>
                            <h5 class="text-center" style="margin: 20px 0px;">زمان:شنبه 29 اردیبهشت 1403 -از ساعت 14 </h5>
                        </div>
                    <div class="content content-shadow-product" style="margin:0 auto;">
                        <img src="{{asset('site/images/123.jpg')}}" style="width: 200px" alt=" سلسله نشست های صحن دولت ">
                    </div>
            </div>
        </div>
    </div>
    --}}
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
                                <span style="font-size: 8px" >{{$servicelawyer->title}}</span>
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
                                    <img src="{{asset($serviceclient->image)}}"  style="margin: 10px auto;text-align: center;" alt="{{$serviceclient->title}}">
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
                                    <img src="{{asset($customer->image)}}" alt="{{$customer->name}}" style="max-width: 80px;margin: 0 auto;"/>
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
            <div data-pagination='{"el": ".swiper-pagination"}' data-space-between="10" data-slides-per-view="1" class="swiper-container swiper-init">
                <div class="swiper-pagination"></div>
                <div class="swiper-wrapper">
                    @foreach($akhbars as $akhbar)
                        <div class="swiper-slide">
                            <div class="content content-shadow-product">
                                <a href="{{url('اخبار/'.$akhbar->slug)}}" class="link external">
                                    <img src="{{asset($akhbar->image)}}" alt="{{$akhbar->title}}">
                                    <div class="text">
                                        <a href="{{url('اخبار/'.$akhbar->slug)}}" class="link external"><h5 style="text-align: center">{{$akhbar->title}}</h5></a>
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
            <div data-pagination='{"el": ".swiper-pagination"}' data-space-between="10" data-slides-per-view="1" class="swiper-container swiper-init">
                <div class="swiper-pagination"></div>
                <div class="swiper-wrapper">
                    @foreach($posts as $post)
                        <div class="swiper-slide">
                            <div class="content content-shadow-product">
                                <a href="{{url('محتوای-آموزشی/'.$post->slug)}}" class="link external">
                                    <img src="{{asset($post->image)}}" alt="{{$post->title}}">
                                    <div class="text">
                                        <a href="{{url('محتوای-آموزشی/'.$post->slug)}}" class="link external"><h5 style="text-align: center">{{$post->title}}v</h5></a>
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
            <div data-pagination='{"el": ".swiper-pagination"}' data-space-between="10" data-slides-per-view="3" class="swiper-container swiper-init">
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
    <div id="tab-deportment"  class="page-content tab">
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
                    <div data-pagination='{"el": ".swiper-pagination"}' data-space-between="10" class="swiper-container swiper-init swiper-container-horizontal">
                        <div class="swiper-pagination"></div>
                        <div class="swiper-wrapper">
                            @foreach($slides as $slide)
                                <div class="swiper-slide">
                                    <div class="content">
                                        <div class="mask"></div>
                                        <img src="{{asset('storage/'.$slide->file_link)}}" alt="{{$companies['title']}}">
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
                                                    <img src="{{asset('site/images/logodadvarzan.png')}}" alt="{{$submenu->title}}">
                                                </div>
                                                <span style="font-size: 8px" >{{$submenu->title}}</span>
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
                                                    <img src="{{asset('site/images/logodadvarzan.png')}}"  style="margin: 10px auto;text-align: center;" alt="{{$submenu->title}}">
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
                                            <a href="{{url('دپارتمان-اموزش-و-پژوهش'.'/'.$submenu->slug)}}" class="external">
                                                <div class="icon">
                                                    <img src="{{asset('site/images/logodadvarzan.png')}}"  style="margin: 10px auto;text-align: center;" alt="{{$submenu->title}}">
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
    <div id="tab-service"  class="page-content tab">
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
                    <div data-pagination='{"el": ".swiper-pagination"}' data-space-between="10" class="swiper-container swiper-init swiper-container-horizontal">
                        <div class="swiper-pagination"></div>
                        <div class="swiper-wrapper">
                            @foreach($slides as $slide)
                                <div class="swiper-slide">
                                    <div class="content">
                                        <div class="mask"></div>
                                        <img src="{{asset('storage/'.$slide->file_link)}}" alt="{{$companies['title']}}">
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
                                                <img src="{{asset($servicelawyer->image)}}" alt="{{$servicelawyer->title}}">
                                            </div>
                                            <span style="font-size: 8px" >{{$servicelawyer->title}}</span>
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
                                                <img src="{{asset($serviceclient->image)}}"  style="margin: 10px auto;text-align: center;" alt="{{$serviceclient->title}}">
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
    <div id="tab-account"class="page-content tab">
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
                            <iframe width="100%" height="400px" src="https://www.openstreetmap.org/export/embed.html?bbox=51.44101113080979%2C35.72041122802278%2C51.44455164670944%2C35.72238848247882&amp;layer=mapnik&amp;marker=35.72139986138454%2C51.44278138875961" style="border: 1px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/?mlat=35.72140&amp;mlon=51.44278#map=19/35.72140/51.44278">موقعیت ما روی نقشه</a></small>
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
    <div id="tab-login"class="page-content tab">
        <div class="navbar navbar-page">
            <div class="navbar-inner">
                <div class="left"></div>
                <div class="title">ورود و عضویت</div>
            </div>
        </div>
        <div class="recommended product segments-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-100">
                        <div class="password-settings segments">
                            <div class="container">
                                <form method="POST" action="{{ route('login-user') }}" class="list">
                                    @csrf
                                    <ul>
                                        <li class="item-content item-input">
                                            <div class="item-inner">
                                                <div class="item-input-wrap">
                                                    <input type="text" name="phone" required placeholder="شماره موبایل" @error('phone') is-invalid @enderror">
                                                </div>
                                            </div>
                                        </li>
                                        <li class="item-content item-input">
                                            <div class="item-inner">
                                                <div class="item-input-wrap">
                                                    <input type="password" name="password" required placeholder="رمز عبور" @error('password') is-invalid @enderror">
                                                </div>
                                            </div>
                                        </li>
                                        <li class="item-content item-input">
                                            <div class="item-inner">
                                                <div class="item-input-wrap">
                                                    <input type="text" name="captcha" required placeholder="کد امنیتی" @error('captcha') is-invalid @enderror">
                                                    <br>
                                                    <div class="form-account-title captcha">
                                                        <label for="captcha_img" class="float-right"></label>
                                                        <span class="float-left">{!! captcha_img('math') !!}</span>
                                                        <br>
                                                        <button type="button" class="btn btn-default reload" id="reload" style="width:10%;float: right;margin: -25px 20px;height: 35px;">&#x21bb;</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="content-button">
                                        <button type="submit" class="button primary-button"><i class="fas fa-paper-plane"></i>ارسال</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('script')
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'خطا',
                html: '<ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
            });
        </script>
    @endif
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
@endsection
