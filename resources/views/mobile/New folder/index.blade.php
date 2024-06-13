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
    <div class="categories segments">
        <div class="container">
            <div class="section-title">
                <h3>خدمات برای موکلین
                    <a href="#" class="see-all-link">مشاهده همه</a>
                </h3>
            </div>
            <div class="row">
                @foreach($servicelawyers as $servicelawyer)
                <div class="col-30">
                    <div class="content">
                        <a href="/categories-details/">
                            <div class="icon">
                                <img src="{{asset($servicelawyer->image)}}" style="width: 40px;padding: 5px 2px;" alt="{{$servicelawyer->title}}">
                            </div>
                            <span>{{$servicelawyer->title}}</span>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="section-title">
                <h3>خدمات برای وکلا
                    <a href="#" class="see-all-link">مشاهده همه</a>
                </h3>
            </div>
            <div class="row">
                @foreach($serviceclients as $serviceclient)
                    <div class="col-30">
                    <div class="content">
                        <a href="/categories-details/">
                            <div class="icon">
                                <img src="{{asset($serviceclient->image)}}" style="width: 40px;padding: 5px 2px;" alt="{{$serviceclient->title}}">
                            </div>
                            <span>{{$serviceclient->title}}</span>
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
                                <img src="{{asset($customer->image)}}" alt="{{$customer->name}}" style="max-width: 100px;margin: 0 auto;"/>
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
                <h3>اخبار و رویداد های حقوقی
                    <a href="#" class="see-all-link">مشاهده همه</a>
                </h3>
            </div>
            <div data-pagination='{"el": ".swiper-pagination"}' data-space-between="10" data-slides-per-view="1" class="swiper-container swiper-init">
                <div class="swiper-pagination"></div>
                <div class="swiper-wrapper">
                    @foreach($akhbars as $akhbar)
                    <div class="swiper-slide">
                        <div class="content content-shadow-product">
                            <a href="{{url('اخبار/'.$akhbar->slug)}}">
                                <img src="{{asset($akhbar->image)}}" alt="{{$akhbar->title}}">
                                <div class="text">
                                    <p class="title-product">{{$akhbar->title}}</p>
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
                <h3>تیم ما
                    <a href="#" class="see-all-link">مشاهده همه</a>
                </h3>
            </div>
            <div data-pagination='{"el": ".swiper-pagination"}' data-space-between="10" data-slides-per-view="3" class="swiper-container swiper-init">
                <div class="swiper-pagination"></div>
                <div class="swiper-wrapper">
                    @foreach($emploees as $emploee)
                        <div class="swiper-slide">
                            <div class="content content-shadow-product">
                                <a href="#">
                                    <img src="{{asset($emploee->image)}}" alt="{{$emploee->fullname}}">
                                    <div class="text">
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
    <div id="tab-search" class="tab tab-search">
        <div class="navbar navbar-page">
            <div class="navbar-inner">
                <div class="left"></div>
                <div class="title">
                    جستجو کنید
                </div>
                <div class="right"></div>
            </div>
        </div>
        <div class="subnavbar">
            <form class="searchbar searchbar-init" data-search-container=".search-list" data-search-in=".item-title">
                <div class="searchbar-inner">
                    <div class="searchbar-input-wrap">
                        <input type="search" placeholder="جستجو کنید ...">
                        <i class="searchbar-icon"></i>
                        <span class="input-clear-button"></span>
                    </div>
                    <span class="searchbar-disable-button">لغو</span>
                </div>
            </form>
        </div>
        <!-- end navbar -->
        <div class="search segments">
            <div class="container">
                <div class="title-search-category">
                    <span>جستجو اخیر<a href="#">پاک کردن</a></span>
                </div>
                <div class="recent-search">
                    <ul>
                        <li><a href="#"><i class="fas fa-history"></i>لوازم جانبی لپ تاپ</a></li>
                        <li><a href="#"><i class="fas fa-history"></i>پیراهن ساده</a></li>
                        <li><a href="#"><i class="fas fa-history"></i>موس </a></li>
                        <li><a href="#"><i class="fas fa-history"></i>صفحه کلید مکانیکی</a></li>
                    </ul>
                </div>
                <!-- divider -->
                <div class="divider-line-half"></div>
                <!-- end divider -->
                <div class="title-search-category">
                    <span>کاتالوگ های عمومی</span>
                </div>
                <div class="popular-search">
                    <ul>
                        <li><a href="#">لپ تاپ</a></li>
                        <li><a href="#">تلفن های هوشمند</a></li>
                        <li><a href="#">هدفون</a></li>
                        <li><a href="#">موس</a></li>
                        <li><a href="#">تیشرت</a></li>
                        <li><a href="#">صفحه کلید</a></li>
                        <li><a href="#">بطری</a></li>
                    </ul>
                </div>
                <!-- divider -->
                <div class="divider-line-half line-search"></div>
                <!-- end divider -->
                <div class="title-search-category">
                    <span>توصیه شده <a href="#">به روزرسانی</a></span>
                </div>
                <div class="recent-search recommended-search">
                    <ul>
                        <li><a href="#">لوازم جانبی لپ تاپ</a></li>
                        <li><a href="#">پیراهن ساده</a></li>
                        <li><a href="#">موس بازی</a></li>
                        <li><a href="#">صفحه کلید مکانیکی</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="tab-brand" class="page-content tab">
        <!-- official brand -->
        <!-- navbar -->
        <div class="navbar navbar-page">
            <div class="navbar-inner">
                <div class="left"></div>
                <div class="title">
                    برندهای رسمی
                </div>
                <div class="right"></div>
            </div>
        </div>
        <!-- end navbar -->
        <div class="official-brand">
            <div class="container">
                <!-- slider brand -->
                <div class="slider-brand segments-bottom">
                    <div data-pagination='{"el": ".swiper-pagination"}' data-space-between="10" class="swiper-container swiper-init swiper-container-horizontal">
                        <div class="swiper-pagination"></div>
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="content">
                                    <div class="mask"></div>
                                    <img src="images/banner4.png" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="content">
                                    <div class="mask"></div>
                                    <img src="images/banner5.png" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="content">
                                    <div class="mask"></div>
                                    <img src="images/banner6.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end slider brand -->
                <!-- popular brand -->
                <div class="popular-brand segments-bottom">
                    <div class="section-title">
                        <h3>برندهای محبوب <a href="#" class="see-all-link">مشاهده همه</a></h3>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <div class="content">
                                <a href="#"><img src="images/trip.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-25">
                            <div class="content">
                                <a href="#"><img src="images/wobag.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-25">
                            <div class="content">
                                <a href="#"><img src="images/john.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-25">
                            <div class="content">
                                <a href="#"><img src="images/alya.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <div class="content">
                                <a href="#"><img src="images/green.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-25">
                            <div class="content">
                                <a href="#"><img src="images/zona.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-25">
                            <div class="content">
                                <a href="#"><img src="images/beauty.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-25">
                            <div class="content">
                                <a href="#"><img src="images/fitbro.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end popular brand -->
                <!-- brand promo -->
                <div class="brand-promo segments-bottom product">
                    <div class="section-title">
                        <h3>ویژه های تبلیغاتی برند <a href="#" class="see-all-link">مشاهده همه</a></h3>
                    </div>
                    <div class="row">
                        <div class="col-50">
                            <div class="content content-shadow-product">
                                <a href="/product-details/">
                                    <div class="product-mark-discount">
                                        <ul>
                                            <li>50%</li>
                                            <li>تخفیف</li>
                                        </ul>
                                    </div>
                                    <img src="images/product1.jpg" alt="">
                                    <div class="text">
                                        <p class="title-product">ژاکت با پارچه مه آلود با کیفیت بالا</p>
                                        <p class="price">85.00 تومان</p>
                                        <p class="location">تهران</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-50">
                            <div class="content content-shadow-product">
                                <a href="/product-details/">
                                    <div class="product-mark-discount">
                                        <ul>
                                            <li>50%</li>
                                            <li>تخفیف</li>
                                        </ul>
                                    </div>
                                    <img src="images/product3.jpg" alt="">
                                    <div class="text">
                                        <p class="title-product">ژاکت - مواد اولیه چتر نجات</p>
                                        <p class="price">199.99 تومان</p>
                                        <p class="location">تهران</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-50">
                            <div class="content content-shadow-product">
                                <a href="/product-details/">
                                    <div class="product-mark-discount">
                                        <ul>
                                            <li>50%</li>
                                            <li>تخفیف</li>
                                        </ul>
                                    </div>
                                    <img src="images/product5.jpg" alt="">
                                    <div class="text">
                                        <p class="title-product">پیراهن سیاه آستین بلند - راحت</p>
                                        <p class="price">90.00 تومان</p>
                                        <p class="location">تهران</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-50">
                            <div class="content content-shadow-product">
                                <a href="/product-details/">
                                    <div class="product-mark-discount">
                                        <ul>
                                            <li>50%</li>
                                            <li>تخفیف</li>
                                        </ul>
                                    </div>
                                    <img src="images/product6.jpg" alt="">
                                    <div class="text">
                                        <p class="title-product">ژاکت آستین بلند سفید ، مواد نرم</p>
                                        <p class="price">50.00 تومان</p>
                                        <p class="location">تهران</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-50">
                            <div class="content content-shadow-product">
                                <a href="/product-details/">
                                    <div class="product-mark-discount">
                                        <ul>
                                            <li>50%</li>
                                            <li>تخفیف</li>
                                        </ul>
                                    </div>
                                    <img src="images/product9.jpg" alt="">
                                    <div class="text">
                                        <p class="title-product">ژاکت آستین بلند خاکستری ، مواد نرم</p>
                                        <p class="price">77.00 تومان</p>
                                        <p class="location">تهران</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-50">
                            <div class="content content-shadow-product">
                                <a href="/product-details/">
                                    <div class="product-mark-discount">
                                        <ul>
                                            <li>50%</li>
                                            <li>تخفیف</li>
                                        </ul>
                                    </div>
                                    <img src="images/product10.jpg" alt="">
                                    <div class="text">
                                        <p class="title-product">ژاکت ضخیم مناسب برای زمستان - free hat</p>
                                        <p class="price">110.00 تومان</p>
                                        <p class="location">تهران</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end brand promo -->
            </div>
        </div>
        <!-- end official brand -->
    </div>
    <div id="tab-cart" class="page-content tab">
        <!-- cart -->
        <!-- navbar -->
        <div class="navbar navbar-page">
            <div class="navbar-inner">
                <div class="left"></div>
                <div class="title">
                    سبد خرید
                </div>
                <div class="right"></div>
            </div>
        </div>
        <!-- end navbar -->
        <!-- content cart -->
        <div class="cart segments">
            <div class="container">
                <div class="name-store">
                    <img src="images/user-seller1.png" alt="">
                    <div class="title-store">
                        <h6>فروشگاه کفش</h6>
                    </div>
                </div>
                <div class="content">
                    <div class="row">
                        <div class="col-10">
                            <div class="content-checkbox">
                                <label class="checkbox">
                                    <input type="checkbox">
                                    <i class="icon-checkbox"></i>
                                </label>
                            </div>
                        </div>
                        <div class="col-90">
                            <div class="content-cart content-shadow-product">
                                <img src="images/product8.jpg" alt="">
                                <div class="product-info">
                                    <a href="#"><p class="title-product">الیاف با چرم اصل</p></a>
                                    <p class="price">50.00 تومان</p>
                                </div>
                                <div class="number-goods">
                                    <div class="stepper stepper-small stepper-init">
                                        <div class="stepper-button-minus"></div>
                                        <div class="stepper-input-wrap">
                                            <input type="text" value="0" readonly>
                                        </div>
                                        <div class="stepper-button-plus"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <div class="row">
                        <div class="col-10">
                            <div class="content-checkbox">
                                <label class="checkbox">
                                    <input type="checkbox">
                                    <i class="icon-checkbox"></i>
                                </label>
                            </div>
                        </div>
                        <div class="col-90">
                            <div class="content-cart content-shadow-product">
                                <img src="images/product12.jpg" alt="">
                                <div class="product-info">
                                    <a href="#"><p class="title-product">آخرین برند</p></a>
                                    <p class="price">50.00 تومان</p>
                                </div>
                                <div class="number-goods">
                                    <div class="stepper stepper-small stepper-init">
                                        <div class="stepper-button-minus"></div>
                                        <div class="stepper-input-wrap">
                                            <input type="text" value="0" readonly>
                                        </div>
                                        <div class="stepper-button-plus"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- divider line half -->
                <div class="divider-line-half"></div>
                <!-- end divider line half -->
                <div class="name-store">
                    <img src="images/user-seller2.png" alt="">
                    <div class="title-store">
                        <h6>پیراهن مارت</h6>
                    </div>
                </div>
                <div class="content">
                    <div class="row">
                        <div class="col-10">
                            <div class="content-checkbox">
                                <label class="checkbox">
                                    <input type="checkbox">
                                    <i class="icon-checkbox"></i>
                                </label>
                            </div>
                        </div>
                        <div class="col-90">
                            <div class="content-cart content-shadow-product">
                                <img src="images/flash-sale1.jpg" alt="">
                                <div class="product-info">
                                    <a href="#"><p class="title-product">تی شرت های ارزان و ساده</p></a>
                                    <p class="price">50.00 تومان</p>
                                </div>
                                <div class="number-goods">
                                    <div class="stepper stepper-small stepper-init">
                                        <div class="stepper-button-minus"></div>
                                        <div class="stepper-input-wrap">
                                            <input type="text" value="0" readonly>
                                        </div>
                                        <div class="stepper-button-plus"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- divider line full -->
            <div class="divider-line-full"></div>
            <!-- end divider line full -->
            <!-- wrap total cart -->
            <div class="wrap-total-cart">
                <div class="container">
                    <div class="row">
                        <div class="col-40">
                            <div class="content-total">
                                <p>جمع کل</p>
                                <h6>150 تومان</h6>
                            </div>
                        </div>
                        <div class="col-60">
                            <div class="content-button">
                                <a href="/checkout/" class="button primary-button"><i class="fas fa-shopping-bag"></i>پرداخت</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end wrap total cart -->
        </div>
        <!-- end content cart -->
        <!-- end cart -->
    </div>
    <div id="tab-account" class="page-content tab">
        <!-- account buyer -->
        <!-- navbar -->
        <div class="navbar navbar-page">
            <div class="navbar-inner">
                <div class="left"></div>
                <div class="title">
                    پنل خریدار
                </div>
                <div class="right">
                    <a href="/settings/">
                        <i class="fas fa-cog"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- end navbar -->
        <!-- content account -->
        <div class="account-buyer segments">
            <div class="container">
                <div class="header-account content-shadow">
                    <img src="images/user-buyer6.png" alt="">
                    <div class="title-name">
                        <h5>مد</h5>
                        <p><i class="fas fa-map-marker-alt"></i>مشهد</p>
                    </div>
                </div>
            </div>
            <div class="container segments">
                <div class="info-balance content-shadow">
                    <div class="row">
                        <div class="col-50">
                            <div class="content-text">
                                <p>موجودی شما</p>
                                <h5>31.00 تومان</h5>
                            </div>
                        </div>
                        <div class="col-50">
                            <div class="content-button">
                                <a href="#" class="button primary-button"><i class="fas fa-wallet"></i>بالا</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="account-menu">
                <div class="list media-list">
                    <ul>
                        <li>
                            <a href="/wishlist/" class="item-link item-content">
                                <div class="item-media">
                                    <i class="fas fa-heart"></i>
                                </div>
                                <div class="item-inner">
                                    <div class="item-title-row">
                                        <div class="item-title">علاقمندیها</div>
                                    </div>
                                    <div class="item-subtitle">کلیه محصولاتی که ذخیره کرده اید</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/transaction/" class="item-link item-content">
                                <div class="item-media">
                                    <i class="fas fa-exchange-alt"></i>
                                </div>
                                <div class="item-inner">
                                    <div class="item-title-row">
                                        <div class="item-title">معامله</div>
                                    </div>
                                    <div class="item-subtitle">تمام معاملات شما در اینجا است</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/notification/" class="item-link item-content">
                                <div class="item-media">
                                    <i class="fas fa-bell"></i>
                                </div>
                                <div class="item-inner">
                                    <div class="item-title-row">
                                        <div class="item-title">اطلاعات</div>
                                    </div>
                                    <div class="item-subtitle">معاملات ، خرید ، به روزرسانی هشدار</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/faq/" class="item-link item-content">
                                <div class="item-media">
                                    <i class="fas fa-question"></i>
                                </div>
                                <div class="item-inner">
                                    <div class="item-title-row">
                                        <div class="item-title">سوالات متداول</div>
                                    </div>
                                    <div class="item-subtitle">به راهنما نیاز دارید؟</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/contact-seller/" class="item-link item-content">
                                <div class="item-media">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="item-inner">
                                    <div class="item-title-row">
                                        <div class="item-title">پنل فروشنده</div>
                                    </div>
                                    <div class="item-subtitle">برای سوالات می توانید با من تماس بگیرید</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="item-link item-content">
                                <div class="item-media">
                                    <i class="fas fa-power-off"></i>
                                </div>
                                <div class="item-inner">
                                    <div class="item-title">خروج</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
