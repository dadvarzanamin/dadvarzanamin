<!DOCTYPE html>
<html lang="fa">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="مهندس محمد حسین دیوان بیگی">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="index, follow">

    <!-- Google fonts -->
{{--    <link rel="preconnect" href="https://fonts.gstatic.com/">--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">--}}


    <link rel="icon" href="{{$companies['favicon16']}}" sizes="16x16" type="image/png">
    <link rel="icon" href="{{$companies['favicon32']}}" sizes="32x32" type="image/png">

    <link rel="stylesheet" href="{{asset('site/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/line-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/fancybox.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/style.css')}}">

@yield('style')
</head>
<body>

{{--<div class="preloader">--}}
{{--    <div class="loader">--}}
{{--        <svg class="spinner" viewBox="0 0 50 50">--}}
{{--            <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>--}}
{{--        </svg>--}}
{{--    </div>--}}
{{--</div>--}}

<header class="header-menu-area">
    <div class="header-menu-content dashboard-menu-content pr-30px pl-30px bg-white shadow-sm">
        <div class="container-fluid">
            <div class="main-menu-content">
                <div class="row align-items-center">
                    <div class="col-9">
                        <div class="media media-card align-items-center">
                            <div class="media-body">
                                <h2 class="section__title fs-20"> سلام؛ {{ Auth::user()->name }}  </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="logo-box logo--box">
                            <a href="{{url('پروفایل-من')}}" class="logo"><img src="{{asset($companies['image'])}}" alt="لوگو" /></a>
                        </div>
                        <div class="menu-wrapper float-left">
                            <div class="nav-left-button d-flex align-items-center">
                                <div class="user-action-wrap d-flex align-items-center">
                                    <div class="shop-cart notification-cart pr-3 mr-3 border-left border-left-gray">
                                        <ul>
                                            <li>
                                                <p class="shop-cart-btn">
                                                    <i class="la la-bell"></i>
                                                    @if($notifs->count() > 0)
                                                        <span class="dot-status bg-1"></span>
                                                    @endif
                                                </p>
                                                <ul class="cart-dropdown-menu after-none p-0 notification-dropdown-menu">
                                                    <li class="menu-heading-block d-flex align-items-center justify-content-between">
                                                        <h4>اطلاعیه</h4>
                                                        <span class="ribbon fs-14">{{$notifs->count()}}</span>
                                                    </li>
                                                    <li>
                                                        <div class="notification-body">
                                                            @foreach($notifs as $notif)
                                                                <a href="{{route('usernotif')}}" class="media media-card align-items-center">
                                                                    <div class="media-body">
                                                                        <h5>{{$notif->title}}</h5>
                                                                    </div>
                                                                </a>
                                                            @endforeach
                                                        </div>
                                                    </li>
                                                    <li class="menu-heading-block">
                                                        <a href="{{route('usernotif')}}" class="btn theme-btn w-100">نمایش همه اعلان ها <i class="la la-arrow-left icon ml-1"></i></a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="shop-cart user-profile-cart">
                                        <ul>
                                            <li>
                                                <div class="shop-cart-btn">
                                                    <div class="avatar-xs">
                                                        <img class="rounded-full img-fluid" @if(Auth::user()->image)  src="{{Auth::user()->image}}" @else src="{{asset('admin/assets/img/users/1.jpg')}}" @endif alt="{{(Auth::user()->name)}}" />
                                                    </div>
                                                    <span class="dot-status bg-1"></span>
                                                </div>
                                                <ul class="cart-dropdown-menu after-none p-0 notification-dropdown-menu">
                                                    <li class="menu-heading-block d-flex align-items-center">
                                                        <a href="" class="avatar-sm flex-shrink-0 d-block">
                                                            <img class="rounded-full img-fluid" @if(Auth::user()->image)  src="{{Auth::user()->image}}" @else src="{{asset('admin/assets/img/users/1.jpg')}}" @endif alt="{{Auth::user()->name}}" />
                                                        </a>
                                                        <div class="ml-2">
                                                            <h4><a href="" class="text-black">{{Auth::user()->name}}</a></h4>
                                                            <span class="d-block fs-14 lh-20">{{Auth::user()->email}}</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="theme-picker d-flex align-items-center justify-content-center lh-40">
                                                            <button class="theme-picker-btn dark-mode-btn w-100 font-weight-semi-bold justify-content-center" title="حالت تاریک">
                                                                <svg class="mr-1" viewBox="0 0 24 24" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                                    <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                                                                </svg>
                                                                حالت تاریک
                                                            </button>
                                                            <button class="theme-picker-btn light-mode-btn w-100 font-weight-semi-bold justify-content-center" title="حالت نور">
                                                                <svg class="mr-1" viewBox="0 0 24 24" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                                    <circle cx="12" cy="12" r="5"></circle>
                                                                    <line x1="12" y1="1" x2="12" y2="3"></line>
                                                                    <line x1="12" y1="21" x2="12" y2="23"></line>
                                                                    <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                                                                    <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                                                                    <line x1="1" y1="12" x2="3" y2="12"></line>
                                                                    <line x1="21" y1="12" x2="23" y2="12"></line>
                                                                    <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                                                                    <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                                                                </svg>
                                                                حالت نور
                                                            </button>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <ul class="generic-list-item">
                                                            <li>
                                                                <a href="{{route('setting')}}"> <i class="la la-gear mr-1"></i> تنظیمات </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{route('message')}}">
                                                                    <i class="la la-envelope mr-1"></i>پیام های
                                                                    <span class="badge bg-info text-white ml-2 p-1">12+</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{route('user-request')}}"> <i class="la la-question mr-1"></i> درخواست مشاوره </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{route('logout')}}"> <i class="la la-power-off mr-1"></i> خروج </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="off-canvas-menu custom-scrollbar-styled main-off-canvas-menu">
        <div class="off-canvas-menu-close main-menu-close icon-element icon-element-sm shadow-sm" data-toggle="tooltip" data-placement="right" title="بستن منو">
            <i class="la la-times"></i>
        </div>
        <!-- end off-canvas-menu-close -->
        <h4 class="off-canvas-menu-heading pt-90px">هشدارها</h4>
        <ul class="generic-list-item off-canvas-menu-list pt-1 pb-2 border-bottom border-bottom-gray">
            <li><a href="dashboard.html">اطلاعیه</a></li>
            <li><a href="dashboard-message.html">پیام ها</a></li>
            <li><a href="my-courses.html">لیست علاقه مندیها</a></li>
            <li><a href="shopping-cart.html">سبد خرید من</a></li>
        </ul>
        <h4 class="off-canvas-menu-heading pt-20px">حساب</h4>
        <ul class="generic-list-item off-canvas-menu-list pt-1 pb-2 border-bottom border-bottom-gray">
            <li><a href="dashboard-settings.html">تنظیمات حساب</a></li>
            <li><a href="dashboard-purchase-history.html">سابقه خرید</a></li>
        </ul>
        <h4 class="off-canvas-menu-heading pt-20px">مشخصات</h4>
        <ul class="generic-list-item off-canvas-menu-list pt-1 pb-2 border-bottom border-bottom-gray">
            <li><a href="student-detail.html">پروفایل عمومی</a></li>
            <li><a href="dashboard-settings.html">ویرایش نمایه</a></li>
            <li><a href="index.html">خروج</a></li>
        </ul>
        <h4 class="off-canvas-menu-heading pt-20px">بیشتر از Aduca</h4>
        <ul class="generic-list-item off-canvas-menu-list pt-1">
            <li><a href="for-business.html">آدوکا برای تجارت</a></li>
            <li><a href="#">برنامه را دریافت کنید</a></li>
            <li><a href="invite.html">دوستان را دعوت کنید</a></li>
            <li><a href="contact.html">کمک</a></li>
        </ul>
        <div class="theme-picker d-flex align-items-center justify-content-center mt-4 px-3">
            <button class="theme-picker-btn dark-mode-btn btn theme-btn-sm theme-btn-white w-100 font-weight-semi-bold justify-content-center" title="حالت تاریک">
                <svg class="mr-1" viewBox="0 0 24 24" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                </svg>
                حالت تاریک
            </button>
            <button class="theme-picker-btn light-mode-btn btn theme-btn-sm theme-btn-white w-100 font-weight-semi-bold justify-content-center" title="حالت نور">
                <svg class="mr-1" viewBox="0 0 24 24" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="5"></circle>
                    <line x1="12" y1="1" x2="12" y2="3"></line>
                    <line x1="12" y1="21" x2="12" y2="23"></line>
                    <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                    <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                    <line x1="1" y1="12" x2="3" y2="12"></line>
                    <line x1="21" y1="12" x2="23" y2="12"></line>
                    <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                    <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                </svg>
                حالت نور
            </button>
        </div>
    </div>
</header>

<section class="dashboard-area" style="height: auto">
    <div class="off-canvas-menu dashboard-off-canvas-menu off--canvas-menu custom-scrollbar-styled pt-20px">
        <div class="off-canvas-menu-close dashboard-menu-close icon-element icon-element-sm shadow-sm" data-toggle="tooltip" data-placement="right" title="بستن منو">
            <i class="la la-times"></i>
        </div>
        <div class="logo-box px-4">
            <a href="{{route('/')}}" class="logo"><img src="{{asset($companies['image'])}}" alt="لوگو" /></a>
        </div>
        <ul class="generic-list-item off-canvas-menu-list off--canvas-menu-list pt-35px">
            @foreach($dashboardmenus as $menu)
            <li class="{{request()->segment(2) == $menu->slug ? 'page-active' : ''}}">
                <a href="{{route($menu->class)}}">
                    {{$menu->title}}
{{--                    <span class="badge badge-info p-1 ml-2">2</span>--}}
                </a>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="dashboard-content-wrap">
        <div class="dashboard-menu-toggler btn theme-btn theme-btn-sm lh-28 theme-btn-transparent mb-4 ml-3"><i class="la la-bars mr-1"></i> منو</div>
        <div class="container-fluid">
            <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between mb-2">

            </div>

            @yield('main')

        </div>
    </div>

</section>
<section class="dashboard-area">
    <div class="dashboard-heading" style="padding: 20px;box-shadow: 1px 1px 1pc rgba(0,0,0,.075);bottom: 0;text-align: center;width: 100%">
        <h6 class="fs-16 text-center">کلیه حقوق این سامانه به موسسه حقوقی دادورزان امین تعلق دارد</h6>
    </div>
</section>
<div id="scroll-top">
    <i class="la la-arrow-up" title="برو بالا"></i>
</div>

<div class="modal fade modal-container" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <span class="la la-exclamation-circle fs-60 text-warning"></span>
                <h4 class="modal-title fs-19 font-weight-semi-bold pt-2 pb-1" id="deleteModalTitle">حساب شما برای همیشه حذف خواهد شد!</h4>
                <p>آیا مطمئن هستید که می خواهید اکانت خود را حذف کنید؟</p>
                <div class="btn-box pt-4">
                    <button type="button" class="btn font-weight-medium mr-3" data-dismiss="modal">لغو کنید</button>
                    <button type="submit" class="btn theme-btn theme-btn-sm lh-30">باشه حذف کن</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{asset('site/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('site/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('site/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('site/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('site/js/isotope.js')}}"></script>
<script src="{{asset('site/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('site/js/fancybox.js')}}"></script>
<script src="{{asset('site/js/datedropper.min.js')}}"></script>
<script src="{{asset('site/js/emojionearea.min.js')}}"></script>
<script src="{{asset('site/js/animated-skills.js')}}"></script>
<script src="{{asset('site/js/jquery.MultiFile.min.js')}}"></script>
<script src="{{asset('site/js/jquery.lazy.min.js')}}"></script>
<script src="{{asset('site/js/main.js')}}"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@yield('script')


</body>
</html>
