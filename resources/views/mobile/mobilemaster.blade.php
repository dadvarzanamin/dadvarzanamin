<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta http-equiv="Content-Security-Policy" content="default-src * 'self' 'unsafe-inline' 'unsafe-eval' data: gap:">

    <link rel="icon" href="{{$companies['favicon16']}}" type="image/png">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('site/images/logodadvarzan.png')}}">

    <link rel="stylesheet" href="{{asset('mobile/css/framework7.bundle.css')}}">
    <link rel="stylesheet" href="{{asset('mobile/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('mobile/css/style.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{asset('mobile/css/rtlStyle.css')}}" type="text/css"/>
    @yield('style')
</head>
<body>

<div id="app">
    <div class="view view-main view-init ios-edges" data-url="/">
        <div class="page page-home page-with-subnavbar">
            <div class="toolbar tabbar tabbar-labels toolbar-bottom" style="min-height: 70px">
                <div class="toolbar-inner">
                    <a href="#tab-home" class="tab-link tab-link-active">
                        <i class="fas fa-home"></i>
                        <span class="tabbar-label">صفحه اصلی</span>
                    </a>
                    <a href="#tab-deportment" class="tab-link">
                        <i class="fas fa-balance-scale"></i>
                        <span class="tabbar-label">دپارتمان ها</span>
                    </a>
                    <a href="#tab-service" class="tab-link">
                        <i class="fas fa-briefcase"></i>
                        <span class="tabbar-label">خدمات</span>
                    </a>
                    <a href="#tab-consultation" class="tab-link">
                        <i class="fas fa-building"></i>
                        <span class="tabbar-label">سوالات متداول</span>
                    </a>
                    <a href="#tab-account" class="tab-link">
                        <i class="fas fa-user"></i>
                        <span class="tabbar-label">تماس با ما</span>
                    </a>
                </div>
            </div>
            <div class="tabs">
                <div id="tab-home" class="tab tab-active tab-home">
                    <div class="navbar navbar-home" style="height: 55px;">
                        <div class="navbar-inner align-items-center">
                            <div class="left">
                                <a href="#" class="panel-open" data-panel="left">
                                    <i class="fas fa-bars my-auto"></i>
                                </a>
                            </div>
                            <div style="margin-right: 20px">
                                <a href="{{route('/')}}" class="logo">
                                    <img src="{{asset('/site/images/dark-logo.png')}}" alt="{{$companies['title']}}">
                                </a>
                            </div>
                            <div class="right">
                                <a href="tel:+982188438191" class="link external">
                                    <i class="fas fa-phone" style="color: #1E2E45"></i>
                                </a>

                                @if(Auth::check())
{{--                                    <a href="#tab-profile" class="tab-link">--}}
{{--                                        <i class="fas fa-user" style="color: #1E2E45"></i>--}}
{{--                                    </a>--}}
                                    <a href="{{'/پروفایل-من'}}" class="link external link-all">
                                        <i class="fas fa-user" style="color: #1E2E45"></i>
                                    </a>

                                @else
                                    <a href="{{'/login'}}" class="link external link-all">
                                        <i class="fas fa-lock" style="color: #1E2E45"></i>
                                    </a>
{{--                                    <a href="{{'/پروفایل-من'}}" class="link external link-all" style="">--}}
{{--                                        <i class="fas fa-lock" style="color: #1E2E45"></i>--}}
{{--                                    </a>--}}
                                @endif
{{--                                @if(Auth::check())--}}
{{--                                    <a href="{{ url('پروفایل-من') }}" class="btn theme-btn w-100 theme-btn-white mb-2">--}}
{{--                                        <i class="fas fa-user" style="color: #1E2E45"></i>--}}
{{--                                    </a>--}}
{{--                                @else--}}
{{--                                    <a href="{{ url('/login') }}" class="btn theme-btn w-100 theme-btn-white mb-2">--}}
{{--                                        <i class="fas fa-user" style="color: #1E2E45"></i>--}}
{{--                                    </a>--}}
{{--                                @endif--}}
                            </div>
                        </div>
                    </div>
                    {{--                    <div class="subnavbar">--}}
                    {{--                        <form class="searchbar searchbar-init" data-search-container=".search-list" data-search-in=".item-title">--}}
                    {{--                            <div class="searchbar-inner">--}}
                    {{--                                <div class="searchbar-input-wrap">--}}
                    {{--                                    <input type="search" placeholder="جستجو کنید ...">--}}
                    {{--                                    <i class="searchbar-icon"></i>--}}
                    {{--                                    <span class="input-clear-button"></span>--}}
                    {{--                                </div>--}}
                    {{--                                <span class="searchbar-disable-button">لغو</span>--}}
                    {{--                            </div>--}}
                    {{--                        </form>--}}
                    {{--                    </div>--}}
                    <div class="panel-backdrop"></div>
                    <div class="panel panel-left panel-cover sidebar">
                        <div class="list accordion-list">
                            <ul>
                                @foreach($menus as $menu)
                                    @if($menu->submenu == 0)
                                        <li>
                                            <a class="item-content external" href="{{url($menu->slug)}}">
                                                <div class="item-inner">
                                                    {{$menu->title}}
                                                </div>
                                            </a>
                                        </li>
                                    @else
                                        @if($menu->mega_menu == 1)
                                            <li class="accordion-item">
                                                <a class="item-link item-content" href="#">
                                                    <div class="item-inner">
                                                        <div class="item-title">
                                                            {{$menu->title}}
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="accordion-item-content">
                                                    <div class="divider-space-text"></div>
                                                    @foreach($megamenus as $megamenu)
                                                        @if($megamenu->menu_id == $menu->id)
                                                            <h5 style="border-bottom: 1px solid #d9d9d9;padding-bottom: 10px;margin-bottom: 10px;color:#cea54a;">
                                                                {{$megamenu->title}}
                                                            </h5>
                                                            @foreach($submenus as $submenu)
                                                                @if($menu->id == $submenu->menu_id)
                                                                    @if($submenu->megamenu_id == $megamenu->id)
                                                                        <a href="{{url($menu->slug.'/'.$submenu->slug)}}"
                                                                           class="panel-close external">{{$submenu->title}}</a>
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </li>
                                        @else
                                            <li class="accordion-item">
                                                <a class="item-link item-content" href="#">
                                                    <div class="item-inner">
                                                        <div class="item-title">
                                                            {{$menu->title}}
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="accordion-item-content">
                                                    <div class="divider-space-text"></div>
                                                    @foreach($submenus as $submenu)
                                                        @if($menu->id == $submenu->menu_id)
                                                            <a href="{{url($menu->slug.'/'.$submenu->slug)}}"
                                                               class="panel-close external">{{$submenu->title}}</a>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </li>
                                        @endif
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    @yield('main')
                </div>
            </div>
            <div id="descriptionModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h2 id="modalTitle" style="margin-top: 20px;margin-bottom: 20px"></h2>
                    <p id="modalDescription"></p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('site/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('mobile/js/framework7.bundle.min.js')}}"></script>
<script src="{{asset('mobile/js/routes.js')}}"></script>
<script src="{{asset('mobile/js/app.js')}}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if(session('success'))
        Swal.fire({
            icon: "success",
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 1500
        });
        @endif

        @if(session('error'))
        Swal.fire({
            icon: "error",
            title: "{{ session('error') }}",
            showConfirmButton: false,
            timer: 1500
        });
        @endif

        @if(session('info'))
        Swal.fire({
            icon: 'info',
            title: 'اطلاعات',
            text: "{{ session('info') }}",
        });
        @endif

        @if(session('warning'))
        Swal.fire({
            icon: 'warning',
            title: 'هشدار',
            text: "{{ session('warning') }}",
        });
        @endif
    });
</script>

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
            var email = $('#email').val();
            var phone = $('#phone').val();
            var submenu_id = $('#submenu_id').val();
            var description = $('#description').val();
            var captcha = $('#captcha').val();

            var datasend = {
                "_token": "{{csrf_token()}}",
                "id": id,
                "name": name,
                "email": email,
                "phone": phone,
                "submenu_id ": submenu_id,
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
                            $('#submenu_id').val('');
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
@if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'خطا',
            html: '<ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
        });
    </script>
@endif
</body>
</html>
