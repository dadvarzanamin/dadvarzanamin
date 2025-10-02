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
    <style>
        /* پس‌زمینه تیره */
        .android-modal {
            display: none;
            position: fixed;
            z-index: 99999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.6);
        }

        /* محتوای مودال */
        .android-modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 30px;
            border-radius: 16px;
            width: 90%;
            max-width: 400px;
            text-align: center;
            font-family: Vazir, sans-serif;
            position: relative;
        }

        /* دکمه بستن */
        .android-modal-close {
            position: absolute;
            top: 10px;
            left: 15px;
            font-size: 28px;
            color: #888;
            cursor: pointer;
        }

        /* آیکون اندروید */
        .android-modal-icon {
            background-color: #fff;
            border-radius: 50%;
            padding: 8px; /* کاهش padding برای جا دادن کامل تصویر */
            width: 200px;
            height: 200px;
            margin-bottom: 15px;
            object-fit: contain; /* نمایش کامل تصویر بدون برش */
            display: inline;
        }

        /* متن */
        .android-modal-text {
            margin: 10px 0;
            font-size: 16px;
            color: #333;
        }

        /* دکمه دانلود */
        .android-modal-button {
            display: inline-block;
            background-color: #3ddc84;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
        }

        .modal-body {
            padding: 0;
        }

        .video-container {
            position: relative;
            padding-bottom: 56.25%; /* 16:9 aspect ratio */
            height: 0;
            overflow: hidden;
            max-width: 100%;
            background-color: #000;
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }

        .modal, .service-modal, .dep-modal, .akhbar-modal, .post-modal, .employee-modal, .dore-modal {
            display: none;
            position: fixed;
            z-index: 600;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(35, 35, 34, 0.4);
            padding-top: 60px;
        }

        .modal-content, .dep-modal-content, .akhbar-modal-content, .post-modal-content, .employee-modal-content, .dore-modal-content {
            display: flex;
            flex-direction: column;
            background-color: #fefefe;
            margin: 5% auto;
            padding-left: 20px;
            padding-right: 20px;
            padding-bottom: 120px;
            border: 1px solid rgba(136, 136, 136, 0.55);
            border-radius: 24px;
            height: fit-content;
        }

        .close, .dep-close, .akhbar-close, .post-close, .employee-close, .dore-close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus,
        .dep-close:hover,
        .dep-close:focus,
        .akhbar-close:hover,
        .akhbar-close:focus,
        .service-close:hover,
        .service-close:focus,
        .post-close:hover,
        .post-close:focus,
        .employee-close:hover,
        .employee-close:focus,
        .dore-close:hover,
        .dore-close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .post-modal {
            display: none;
            position: fixed;
            z-index: 600;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(35, 35, 34, 0.4);
            padding-top: 60px;
        }

        .post-modal-content {
            display: flex;
            flex-direction: column;
            background-color: #fefefe;
            margin: 5% auto;
            padding-left: 20px;
            padding-right: 20px;
            padding-bottom: 120px;
            border: 1px solid rgba(136, 136, 136, 0.55);
            border-radius: 24px;
            height: fit-content;
        }

        .post-close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .post-close:hover,
        .post-close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }


        .link-all {
            display: flex;

            background-color: #fff;
            border: 1px solid rgba(85, 85, 85, 0.5);
            border-radius: 8px;
            text-align: center;
            justify-content: center;
            padding: 12px;
            margin: 10px;
        }

        .content-display {
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            margin-top: 20px;
        }

        .item-content img {
            width: 100%;
            height: auto;
        }

        .item-content h2 {
            margin-top: 15px;
            font-size: 20px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        .content-button {
            text-align: center;
            padding: 20px;
        }

        .mobile-button {
            display: inline-block;
            padding: 10px 20px;
            /*background-color: #007bff;*/
            /*color: white;*/
            text-decoration: none;
            border-radius: 16px;
            font-size: 16px;
        }

        .dore-modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .dore-modal-content {
            background-color: #fefefe;
            margin: 0;
            padding-top: 20px;
            border: 1px solid #888;
            width: 100%;
            max-width: 800px;
            border-radius: 16px;
            position: relative;
        }

        .dore-close {
            z-index: 1010;
            color: #aaa;
            position: absolute;
            top: 10px;
            right: 20px;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .course-title {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .course-info {
            margin-bottom: 20px;
        }

        .course-description {
            margin-bottom: 20px;
        }

        .instructor-info {
            display: flex;
            align-items: center;
            margin-bottom: 40px;
        }

        .instructor-img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-left: 15px;
        }

        .course-features {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
        }

        .feature-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .course-image-container {
            border-radius: 16px;
            position: relative;
            max-width: 100%;
            overflow: hidden;
        }

        .course-image {
            max-width: 100%;
            /*height: 100%;*/
            object-fit: cover;
        }

        @media (max-width: 768px) {
            /*.dore-modal-content {*/
            /*    margin: 5% auto;*/
            /*    width: 95%;*/
            /*    padding: 15px;*/
            /*}*/
            .course-title {
                font-size: 20px;
            }

            .instructor-info {
                flex-direction: column;
                align-items: flex-start;
            }

            .instructor-img {
                margin-bottom: 10px;
            }
        }
    </style>

    <div id="androidModal" class="android-modal">
        <div class="android-modal-content">
            <span class="android-modal-close" onclick="closeAndroidModal()">&times;</span>
            <img src="{{asset('mobile/images/android.png')}}" alt="Android" class="android-modal-icon">
            <p class="android-modal-text">برای تجربه بهتر، اپلیکیشن ما را دانلود کنید</p>
            <a href="{{DB::table('versions')->orderBy('id', 'desc')->pluck('url_update')->first()}}" class="android-modal-button external">دانلود اپلیکیشن اندروید</a>
        </div>
    </div>

    <!-- 🔹 بنر دانلود اپلیکیشن با دکمه‌های چپ و راست -->
{{--    <div id="app-banner"--}}
{{--         style="background-color: #233d63; color: white; padding: 14px 24px;--}}
{{--            font-family: 'Vazir', sans-serif; position: fixed; top: 0; left: 0; right: 0;--}}
{{--            z-index: 9999; box-shadow: 0 2px 5px rgba(0,0,0,0.1); direction: rtl;">--}}

{{--        <!-- 🔸 دکمه‌ها در یک ردیف -->--}}
{{--        <div style="display: flex; justify-content: space-between; align-items: center;">--}}
{{--            <!-- دکمه دانلود (راست) -->--}}
{{--            <a href="{{url('/app/app-release-v1.2.0.apk')}}"--}}
{{--               style="background-color: #cea54a; color: #233d63; padding: 10px 24px;--}}
{{--              border-radius: 8px; text-decoration: none; font-weight: bold;"--}}
{{--            class="external"--}}
{{--            >--}}
{{--                دانلود نسخه جدید اپلیکیشن امین--}}
{{--            </a>--}}

{{--            <!-- دکمه بستن (چپ) -->--}}
{{--            <button onclick="document.getElementById('app-banner').style.display='none';--}}
{{--                     document.body.style.paddingTop='0';"--}}
{{--                    style="background: none; border: none; color: white; font-size: 28px;--}}
{{--                   cursor: pointer; line-height: 1; max-width: 40px">--}}
{{--                &times;--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <!-- 🔸 فاصله زیر بنر -->--}}
{{--    <script>--}}
{{--        document.addEventListener("DOMContentLoaded", function () {--}}
{{--            document.body.style.paddingTop = "70px";--}}
{{--        });--}}
{{--    </script>--}}


    <!-- 🔸 برای اینکه نوبار شما زیر بنر قرار بگیره -->
{{--    <div style="height: 80px;"></div>--}}
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

    @if($currentws)
        <div class="categories segments">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="content content-shadow-product" style="margin:20px auto;">
                        <img src="{{asset('storage/'.$currentws->image)}}"
                             style="width: 300px;border-radius: 16px"
                             alt="{{$currentws->title}}">
                    </div>
                    <div class="content" style="margin: 20px auto;">

                        <p style="font-size: 20px;margin-bottom: 16px;margin-top: -10px;text-align: center">

                            {{$currentws->title}}
                        </p>
                        <hr style="border: none; height: 1px; background-color: #cea54a;">
                        <h6>
                            {{$currentws->teacher}}
                        </h6>
                        {{--                        <h6 class="" style="margin: 4px 0;">--}}
                        {{--                                @php--}}
                        {{--                                    $targets = explode("\n", $currentws->target);--}}
                        {{--                                @endphp--}}
                        {{--                                <h3 style="margin-bottom: 20px">درباره استاد</h3>--}}
                        {{--                                <ul>--}}
                        {{--                                    @foreach ($targets as $target)--}}
                        {{--                                        <p class="generic-list-item overview-list-item">{{ $target }}</p>--}}
                        {{--                                    @endforeach--}}
                        {{--                                </ul>--}}

                        {{--                        </h6>--}}
                        {{--                        <hr style="border: none; height: 1px; background-color: #cea54a;">--}}
                        {{--                        <h6>{{ $currentws->target}}</h6>--}}

                    </div>
                </div>
                <div class="row pt-4" style="margin-top: 24px; margin-bottom: 24px">
                    <div class="col-lg-12 responsive-column-half">
                        <div class="info-icon-box mb-3 text-center">
                            <div class="row justify-content-center">
                                <div class="time-segment"
                                     style="border-bottom-right-radius: 16px;border-top-right-radius: 16px">
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
                                <div class="time-segment"
                                     style="border-bottom-left-radius: 16px;border-top-left-radius: 16px">
                                    <span id="seconds">0</span>
                                    <span>ثانیه</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content-button mx-4">
                    <div class="content-button mx-4">
                        @if($currentws->status == 5)
                            <a href="#" class=" br-16"
                               style="display: flex;justify-content: center ;background-color: crimson;padding: 16px;border-radius: 16px;color: white">
                                تکمیل
                                ظرفیت
                            </a>
                        @endif
                        @if(Auth::check())
                            <a href="#" class="dore-open-modal mobile-button br-16"
                               style="display: flex;justify-content: center">ثبت نام در کارگاه
                            </a>
                        @else
                           <a href="#" class="dore-open-modal mobile-button br-16"
                              style="display: flex;justify-content: center">مشاهده اطلاعات
                           </a>
                        @endif
                    </div>
                </div>
                <div id="doreModal" class="dore-modal">
                    <div class="dore-modal-content">
                        <span class="dore-close">&times;</span>
                        <div id="doreModalContent">
                            <div class="course-image-container" style="margin-top: 32px">
                                <img src="{{asset('storage/'.$currentws->image)}}" alt="تصویر دوره"
                                     class="course-image">
                            </div>
                            <h3 class="course-title" style="padding-top: 12px">{{$currentws->title}}</h3>

                            <div class="course-info">
                                <p>ارائه توسط: {{$currentws->teacher}}</p>
                                <p>نوع برگزاری: {{implode("," , json_decode($currentws->type))}}</p>
                                <p>تاریخ برگزاری: {{$currentws->date}}</p>
                            </div>

                            @if($currentws->video)
                                <!-- ویدئو آپارات -->
                                <h3 style="margin-bottom: 20px">پیش درآمدی بر دوره</h3>
                                <div class="video-container" style="margin-top: 20px; margin-bottom: 20px;">
                                    <iframe width="100%" height="220"
                                            src="https://www.aparat.com/video/video/embed/videohash/{{$currentws->video}}/vt/frame/showvideo/true"
                                            allow="autoplay; fullscreen" allowfullscreen></iframe>
                                </div>
                            @endif
                            <div class="course-description">
                                <h3 style="margin-bottom: 20px">اهداف دوره</h3>
                                <p>{!! $currentws->target !!}</p>
                            </div>

                            <div class="course-description">
                                <h3 style="margin-bottom: 20px">شرح دوره</h3>
                                <p>{!! $currentws->description !!}</p>
                            </div>

                            <div class="instructor-info">
                                <img src="{{asset($currentws->teacher_image)}}" alt="تصویر استاد"
                                     class="instructor-img">
                                <div>
                                    <h3 style="margin-bottom: 20px">درباره استاد</h3>
                                    <p>{!! $currentws->teacher_resume !!}</p>
                                </div>
                            </div>

                            <div class="course-features">
                                <h3 style="margin-bottom: 20px">ویژگی‌های دوره</h3>
                                <div class="feature-item">
                                    <span>مدت زمان:</span>
                                    <span>{{$currentws->duration}} ساعت</span>
                                </div>
                                <div class="feature-item">
                                    <span>سطح مهارت :</span>
                                    <span>{{$currentws->level}}</span>
                                </div>
                                <div class="feature-item">
                                    <span>آزمون ورودی:</span>
                                    <span>ندارد</span>
                                </div>
                            </div>

                            <div style="text-align: center; padding: 20px">
                                <p style="font-size: 16px;">مبلغ التزام به حضور</p>
                            </div>
                            <div style="text-align: center;padding: 20px">
                                <p class="align-items-center pb-2">
                                    @if($currentws->offer)
                                        <span
                                            style="font-size: 24px">{{ number_format($currentws->offer) }} تومان </span>
                                        <span style="text-decoration: line-through; font-size: 16px">{{ number_format($currentws->price) }} تومان</span>
                                    @else
                                        <span
                                            style="font-size: 24px">{{ number_format($currentws->price) }} تومان </span>
                                    @endif
                                </p>
                            </div>

                            <div class="content" style="padding-bottom: 60px;">
                                @if(Auth::check())
                                    <div class="content-button">
                                        <a href="{{'/کارگاه-آموزشی'}}" class="mobile-button external"
                                           style="margin: auto; border-radius: 16px;font-size: 1rem;font-weight: bold;">
                                            ثبت نام جهت حضور در کارگاه آموزشی
                                        </a>

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
                    document.addEventListener("DOMContentLoaded", function () {
                        var modal = document.getElementById("doreModal");
                        var btn = document.querySelector(".dore-open-modal");
                        var span = document.getElementsByClassName("dore-close")[0];

                        btn.onclick = function (event) {
                            event.preventDefault();
                            modal.style.display = "block";
                        }

                        span.onclick = function () {
                            modal.style.display = "none";
                        }

                        window.onclick = function (event) {
                            if (event.target == modal) {
                                modal.style.display = "none";
                            }
                        }
                    });
                </script>
            </div>
        </div>
    @endif
    @if($currentws)
        <script>
            // Set the date we're counting down to
            var countDownDate = new Date("{{ \Morilog\Jalali\Jalalian::fromFormat('Y/m/d', $currentws->date)->toCarbon()->format('Y-m-d H:i:s') }}").getTime();

            // Update the count down every 1 second
            var x = setInterval(function () {
                // Get today's date and time
                var now = new Date().getTime();

                // Find the distance between now and the count down date
                var distance = countDownDate - now;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Display the result in the elements with IDs
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
    @endif
    <div class="categories segments">
        <div id="serviceDescriptionModal" class="modal">
            <div class="modal-content">
                <span class="service-close">&times;</span>
                <h2 id="serviceModalTitle" style="margin-top: 20px;margin-bottom: 20px"></h2>
                <p id="serviceModalDescription"></p>
            </div>
        </div>

        <div class="container">
            <div
                style="border: 1px solid rgba(51,51,51,0.15); border-radius: 16px; padding-top: 24px;
                box-shadow: 0 3px 10px -2px rgba(0, 0, 0, 0.13);">
                <div class="section-title">
                    <h3>خدمات برای موکلین</h3>
                </div>
                <div class="row">
                    @foreach($servicelawyers as $servicelawyer)
                        <div class="col-25" style="margin: 4px 4px 16px 4px;text-align: center;">
                            <div class="content">
                                <a href="#" class="service-open-modal"
                                   service-data-description="{{ $servicelawyer->description }}"
                                   service-data-title="{{ $servicelawyer->title }}">
                                    <div class="icon">
                                        <img src="{{asset($servicelawyer->image)}}"
                                             alt="{{$servicelawyer->title}}">
                                    </div>
                                    <span
                                        style="font-size: 8px;margin-top: 8px">{{$servicelawyer->title}}</span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                    <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            var modal = document.getElementById("serviceDescriptionModal");
                            var modalTitle = document.getElementById("serviceModalTitle");
                            var modalDescription = document.getElementById("serviceModalDescription");
                            var span = document.getElementsByClassName("service-close")[0];

                            document.querySelectorAll(".service-open-modal").forEach(function (element) {
                                element.addEventListener("click", function (event) {
                                    event.preventDefault();
                                    var description = this.getAttribute("service-data-description");
                                    var title = this.getAttribute("service-data-title");
                                    modalTitle.textContent = title;
                                    modalDescription.innerHTML = description;
                                    modal.style.display = "flex";
                                    modal.style.justifyContent = "center";
                                });
                            });

                            span.onclick = function () {
                                modal.style.display = "none";
                            }

                            window.onclick = function (event) {
                                if (event.target == modal) {
                                    modal.style.display = "none";
                                }
                            }
                        });
                    </script>
                </div>
            </div>
            <div
                style="border: 1px solid rgba(51,51,51,0.15); border-radius: 16px; padding: 16px 8px;margin-top: 32px;
                box-shadow: 0 3px 10px -2px rgba(0, 0, 0, 0.13);">
                <div class="section-title">
                    <h3>خدمات برای وکلا</h3>
                </div>
                <div class="row">
                    @foreach($serviceclients as $serviceclient)
                        <div class="col-30">
                            <div class="content">
                                <a href="#" class="service-open-modal"
                                   service-data-description="{{ $serviceclient->description }}"
                                   service-data-title="{{ $serviceclient->title }}">
                                    <div class="icon">
                                        <img src="{{asset($serviceclient->image)}}"
                                             alt="{{$serviceclient->title}}">
                                    </div>
                                    <span
                                        style="font-size: 8px;margin-top: 8px">{{$serviceclient->title}}
                                    </span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{--    <div class="flash-sale segments no-pd-b">--}}
    {{--        <div class="container">--}}
    {{--            <div class="section-title flash-s-title">--}}
    {{--                <h3>برخی از موکلین</h3>--}}
    {{--                <div data-space-between="10" data-slides-per-view="auto" class="swiper-container swiper-init">--}}
    {{--                    <div class="swiper-wrapper">--}}
    {{--                        @foreach($customers as $customer)--}}
    {{--                            <div class="swiper-slide">--}}
    {{--                                <div class="content content-shadow-product">--}}
    {{--                                    <img src="{{asset($customer->image)}}" alt="{{$customer->name}}"--}}
    {{--                                         style="max-width: 80px;margin: 0 auto;"/>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        @endforeach--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <div class="popular-product segments-bottom">
        <div id="akhbarModal" class="akhbar-modal">
            <div class="akhbar-modal-content">
                <span class="akhbar-close">&times;</span>
                <h2 id="akhbarModalTitle" style="margin-top: 20px;margin-bottom: 20px"></h2>
                <p id="akhbarModalDescription"></p>
            </div>
        </div>
        <div class="container  mt-5">
            <div class="section-title">
                <h3>اخبار و رویدادها
                </h3>
            </div>
            <div data-pagination='{"el": ".swiper-pagination"}' data-space-between="10" data-slides-per-view="1"
                 class="swiper-container swiper-init">
                <div class="swiper-pagination"></div>
                <div class="swiper-wrapper">
                    @foreach($akhbars as $akhbar)
                        <div class="swiper-slide">
                            <div class="content content-shadow-product">
                                <a href="#" class="open-akhbar-modal"
                                   akhbar-data-description="{{ $akhbar->description }}"
                                   akhbar-data-title="{{ $akhbar->title }}">
                                    <img src="{{asset($akhbar->image)}}" alt="{{$akhbar->title}}">
                                    <div class="text">
                                        <a href="#" class="open-akhbar-modal"><h5
                                                style="text-align: center;overflow: hidden">{{$akhbar->title}}</h5>
                                        </a>
                                        <p class="date">{{jdate($akhbar->updated_at)->ago()}}</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        var modal = document.getElementById("akhbarModal");
                        var modalTitle = document.getElementById("akhbarModalTitle");
                        var modalDescription = document.getElementById("akhbarModalDescription");
                        var span = document.getElementsByClassName("akhbar-close")[0];

                        document.querySelectorAll(".open-akhbar-modal").forEach(function (element) {
                            element.addEventListener("click", function (event) {
                                event.preventDefault();
                                var description = this.getAttribute("akhbar-data-description");
                                var title = this.getAttribute("akhbar-data-title");
                                modalTitle.textContent = title;
                                modalDescription.innerHTML = description; // تغییر اینجا
                                modal.style.display = "block";
                            });
                        });

                        span.onclick = function () {
                            modal.style.display = "none";
                        }

                        window.onclick = function (event) {
                            if (event.target == modal) {
                                modal.style.display = "none";
                            }
                        }
                    });
                </script>
            </div>
            <a href="{{'تیم-ما/اخبار'}}" class="link external link-all" style="">مشاهده همه</a>
        </div>
    </div>
    <div class="popular-product segments-bottom">
        <div id="postModal" class="post-modal">
            <div class="post-modal-content">
                <span class="post-close">&times;</span>
                <h2 id="postModalTitle" style="margin-top: 20px;margin-bottom: 20px"></h2>
                <iframe id="postModalVideo" width="100%" height="315" src="" frameborder="0" allowfullscreen></iframe>

                <p id="postModalDescription"></p>
            </div>
        </div>
        <div class="container">

            <div class="section-title">
                <h3>محتوای آموزشی حقوقی
                </h3>
            </div>
            <div data-pagination='{"el": ".swiper-pagination"}' data-space-between="10" data-slides-per-view="1"
                 class="swiper-container swiper-init">
                <div class="swiper-pagination"></div>
                <div class="swiper-wrapper">
                    @foreach($posts as $post)
                        <div class="swiper-slide">
                            <div class="content content-shadow-product">
                                <a href="#" class="open-post-modal"
                                   post-data-description="{{ $post->description }}"
                                   post-data-video="{{ $post->file }}"
                                   post-data-title="{{ $post->title }}">
                                    <img src="{{asset($post->image)}}" alt="{{$post->title}}">
                                    <div class="text">
                                        <a href="#" class="open-post-modal"><h5
                                                style="text-align: center; overflow: hidden">{{$post->title}}</h5>
                                        </a>
                                        <p class="date">{{jdate($post->updated_at)->ago()}}</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        var modal = document.getElementById("postModal");
                        var modalTitle = document.getElementById("postModalTitle");
                        var modalDescription = document.getElementById("postModalDescription");
                        var span = document.getElementsByClassName("post-close")[0];

                        document.querySelectorAll(".open-post-modal").forEach(function (element) {
                            element.addEventListener("click", function (event) {
                                event.preventDefault();
                                var video = this.getAttribute("post-data-video");
                                var description = this.getAttribute("post-data-description");
                                var title = this.getAttribute("post-data-title");
                                modalTitle.textContent = title;
                                modalDescription.innerHTML = description;
                                if (video) {
                                    document.getElementById("postModalVideo").src = video;
                                } else {
                                    document.getElementById("postModalVideo").src = "";
                                }
                                modal.style.display = "block";
                            });
                        });

                        span.onclick = function () {
                            modal.style.display = "none";
                        }

                        window.onclick = function (event) {
                            if (event.target == postModal) {
                                modal.style.display = "none";
                            }
                        }
                    });
                </script>

            </div>
            <a href="{{'تیم-ما/محتوای-آموزشی'}}" class="link external link-all">مشاهده همه</a>

        </div>
    </div>
    <div class="recommended product segments-bottom">
        <div id="employeeModal" class="employee-modal">
            <div class="employee-modal-content">
                <span class="employee-close">&times;</span>
                <h2 id="employeeModalTitle" style="margin-top: 20px;margin-bottom: 20px">
                </h2>
                <p id="employeeModalDescription"></p>
            </div>
        </div>
        <div class="container">
            <style>
                .employee-swiper {
                    padding: 20px 10px;
                    box-sizing: border-box;
                }

                .employee-card {
                    background: #fff;
                    border-radius: 8px;
                    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                    overflow: hidden;
                    height: 100%;
                    display: flex;
                    flex-direction: column;
                }

                .employee-card img {
                    width: 100%;
                    /*height: 150px;*/
                    object-fit: cover;
                }

                .employee-info {
                    padding: 10px;
                    text-align: center;
                    flex-grow: 1;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                }

                .employee-info h3 {
                    margin: 0;
                    font-size: 10px;
                    color: #333;
                }

                .employee-info p {
                    margin: 5px 0 0;
                    font-size: 8px;
                    color: #666;
                }

                .employee-modal {
                    display: none;
                    position: fixed;
                    z-index: 1000;
                    left: 0;
                    top: 0;
                    width: 100%;
                    height: 100%;
                    overflow: auto;
                    background-color: rgba(0, 0, 0, 0.8);
                }

                .employee-modal-content {
                    background-color: #fefefe;
                    margin: 10% auto;
                    padding: 20px;
                    border-radius: 8px;
                    width: 90%;
                    max-width: 400px;
                    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
                }

                .employee-close {
                    color: #aaa;
                    float: right;
                    font-size: 28px;
                    font-weight: bold;
                    cursor: pointer;
                }

                .employee-close:hover,
                .employee-close:focus {
                    color: #000;
                    text-decoration: none;
                }

                #employeeModalTitle {
                    margin-top: 0;
                    color: #333;
                    font-size: 18px;
                }

                #employeeModalDescription img {
                    max-width: 100%;
                    height: auto;
                    border-radius: 8px;
                    margin-bottom: 15px;
                }

                #employeeModalDescription p {
                    font-size: 12px;
                    line-height: 2;
                    margin-bottom: 20px;
                }
            </style>
            <div class="section-title">
                <h3>تیم ما</h3>
            </div>
            <div class="swiper-container employee-swiper">
                <div class="swiper-wrapper" style="padding-bottom: 20px">
                    @foreach($emploees as $emploee)
                        <div class="swiper-slide">
                            <div class="employee-card"
                                 data-name="{{ $emploee->fullname }}"
                                 data-image="{{ $emploee->image }}"
                                 data-side="{{ $emploee->side }}"
                                 data-description="{{ $emploee->description }}">
                                <img src="{{ asset($emploee->image) }}" alt="{{ $emploee->fullname }}">
                                <div class="employee-info">
                                    <h3>{{ $emploee->fullname }}</h3>
                                    <p>{{ $emploee->side }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>

            <div id="employeeModal" class="employee-modal">
                <div class="employee-modal-content">
                    <span class="employee-close">&times;</span>
                    <h2 id="employeeModalTitle"></h2>
                    <div id="employeeModalDescription"></div>
                </div>
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    const modal = document.getElementById("employeeModal");
                    const modalTitle = document.getElementById("employeeModalTitle");
                    const modalDescription = document.getElementById("employeeModalDescription");
                    const closeBtn = document.getElementsByClassName("employee-close")[0];

                    // Initialize Swiper
                    new Swiper('.employee-swiper', {
                        slidesPerView: 2,
                        spaceBetween: 10,
                        pagination: {
                            el: '.swiper-pagination',
                            clickable: true,
                        }
                    });

                    // Add click event to all employee cards
                    document.querySelectorAll('.employee-card').forEach(card => {
                        card.addEventListener('click', function () {
                            const name = this.dataset.name;
                            const image = this.dataset.image;
                            const side = this.dataset.side;
                            const description = this.dataset.description;

                            modalTitle.textContent = name;
                            modalDescription.innerHTML = `
                <img src="${image}" alt="${name}">
                <p><strong>سمت:</strong> ${side}</p>
                <p><strong>توضیحات:</strong> ${description}</p>
            `;
                            modal.style.display = "block";
                            document.body.style.overflow = "hidden"; // Prevent scrolling
                        });
                    });

                    // Close modal when clicking on close button or outside the modal
                    closeBtn.onclick = closeModal;
                    window.onclick = function (event) {
                        if (event.target == modal) {
                            closeModal();
                        }
                    }

                    function closeModal() {
                        modal.style.display = "none";
                        document.body.style.overflow = "auto"; // Re-enable scrolling
                    }
                });
            </script>
        </div>
    </div>
    </div>
    <div id="tab-deportment" class="page-content tab">
        <div id="departmentModal" class="dep-modal">
            <div class="dep-modal-content">
                <span class="dep-close">&times;</span>
                <h2 id="departmentModalTitle" style="margin-top: 20px;margin-bottom: 20px"></h2>
                <p id="departmentModalDescription"></p>
            </div>
        </div>
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
                        {{--                        <div class="swiper-wrapper">--}}
                        {{--                            @foreach($slides as $slide)--}}
                        {{--                                <div class="swiper-slide">--}}
                        {{--                                    <div class="content">--}}
                        {{--                                        <div class="mask"></div>--}}
                        {{--                                        <img src="{{asset('storage/'.$slide->file_link)}}"--}}
                        {{--                                             alt="{{$companies['title']}}">--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            @endforeach--}}
                        {{--                        </div>--}}
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
                                            <a href="#" class="open-department-modal"
                                               dep-data-description="{{ $submenu->description }}"
                                               dep-data-title="{{ $submenu->title }}">
                                                <div class="icon flex">
                                                    <img src="{{asset($submenu->image)}}" alt="{{$submenu->title}}">
                                                </div>
                                                <span style="font-size: 8px;margin-top: 8px">{{$submenu->title}}</span>
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
                                            <a href="#" class="open-department-modal"
                                               dep-data-description="{{ $submenu->description }}"
                                               dep-data-title="{{ $submenu->title }}">
                                                <div class="icon">
                                                    <img src="{{asset($submenu->image)}}" alt="{{$submenu->title}}">
                                                </div>
                                                <span style="font-size: 8px;margin-top: 8px">{{$submenu->title}}</span>
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
                                            <a href="#" class="open-department-modal"
                                               dep-data-description="{{ $submenu->description }}"
                                               dep-data-title="{{ $submenu->title }}">
                                                <div class="icon">
                                                    <img src="{{asset($submenu->image)}}" alt="{{$submenu->title}}">
                                                </div>
                                                <span style="font-size: 8px;margin-top: 8px">{{$submenu->title}}</span>
                                            </a>
                                        </div>
                                        {{--                                        <div class="content">--}}
                                        {{--                                            <a href="{{url('دپارتمان-اموزش-و-پژوهش'.'/'.$submenu->slug)}}"--}}
                                        {{--                                               class="external">--}}
                                        {{--                                                <div class="icon">--}}
                                        {{--                                                    <img src="{{asset('site/images/logodadvarzan.png')}}"--}}
                                        {{--                                                         style="margin: 10px auto;text-align: center;"--}}
                                        {{--                                                         alt="{{$submenu->title}}">--}}
                                        {{--                                                </div>--}}
                                        {{--                                                <span style="font-size: 8px">{{$submenu->title}}</span>--}}
                                        {{--                                            </a>--}}
                                        {{--                                        </div>--}}
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <script>
                            document.addEventListener("DOMContentLoaded", function () {
                                var modal = document.getElementById("departmentModal");
                                var modalTitle = document.getElementById("departmentModalTitle");
                                var modalDescription = document.getElementById("departmentModalDescription");
                                var span = document.getElementsByClassName("dep-close")[0];

                                document.querySelectorAll(".open-department-modal").forEach(function (element) {
                                    element.addEventListener("click", function (event) {
                                        event.preventDefault();
                                        var description = this.getAttribute("dep-data-description");
                                        var title = this.getAttribute("dep-data-title");
                                        modalTitle.textContent = title;
                                        modalDescription.innerHTML = description; // تغییر اینجا
                                        modal.style.display = "block";
                                    });
                                });

                                span.onclick = function () {
                                    modal.style.display = "none";
                                }

                                window.onclick = function (event) {
                                    if (event.target == modal) {
                                        modal.style.display = "none";
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="tab-service" class="page-content tab">
        <div id="descriptionModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2 id="modalTitle" style="margin-top: 20px;margin-bottom: 20px"></h2>
                <p id="modalDescription"></p>
            </div>
        </div>

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
                        {{--                        <div class="swiper-pagination"></div>--}}
                        {{--                        <div class="swiper-wrapper">--}}
                        {{--                            @foreach($slides as $slide)--}}
                        {{--                                <div class="swiper-slide">--}}
                        {{--                                    <div class="content">--}}
                        {{--                                        <div class="mask"></div>--}}
                        {{--                                        <img src="{{asset('storage/'.$slide->file_link)}}"--}}
                        {{--                                             alt="{{$companies['title']}}">--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            @endforeach--}}
                        {{--                        </div>--}}
                    </div>
                </div>
                <div class="popular-brand segments-bottom">
                    <div class="container">
                        <div class="section-title">
                            <h3>خدمات برای موکلین</h3>
                        </div>
                        <div class="row">
                            @foreach($servicelawyers as $servicelawyer)
                                <div class="col-25" style="margin: 10px auto;text-align: center;">
                                    <div class="content">
                                        <a href="#" class="open-modal"
                                           data-description="{{ $servicelawyer->description }}"
                                           data-title="{{ $servicelawyer->title }}">
                                            <div class="icon">
                                                <img src="{{asset($servicelawyer->image)}}"
                                                     alt="{{$servicelawyer->title}}">
                                            </div>
                                            <span
                                                style="font-size: 8px;margin-top: 8px">{{$servicelawyer->title}}</span>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <script>
                            document.addEventListener("DOMContentLoaded", function () {
                                var modal = document.getElementById("descriptionModal");
                                var modalTitle = document.getElementById("modalTitle");
                                var modalDescription = document.getElementById("modalDescription");
                                var span = document.getElementsByClassName("close")[0];

                                document.querySelectorAll(".open-modal").forEach(function (element) {
                                    element.addEventListener("click", function (event) {
                                        event.preventDefault();
                                        var description = this.getAttribute("data-description");
                                        var title = this.getAttribute("data-title");
                                        modalTitle.textContent = title;
                                        modalDescription.innerHTML = description;
                                        modal.style.display = "flex";
                                        modal.style.justifyContent = "center";
                                    });
                                });

                                span.onclick = function () {
                                    modal.style.display = "none";
                                }

                                window.onclick = function (event) {
                                    if (event.target == modal) {
                                        modal.style.display = "none";
                                    }
                                }
                            });
                        </script>
                        <div class="section-title">
                            <h3>خدمات برای وکلا</h3>
                        </div>
                        <div class="row">
                            @foreach($serviceclients as $serviceclient)
                                <div class="col-30" style="margin: 10px auto;text-align: center;">
                                    <div class="content">
                                        <a href="#" class="open-modal"
                                           data-description="{{ $serviceclient->description }}"
                                           data-title="{{ $serviceclient->title }}">
                                            <div class="icon">
                                                <img src="{{asset($serviceclient->image)}}"
                                                     alt="{{$serviceclient->title}}">
                                            </div>
                                            <span
                                                style="font-size: 8px;margin-top: 8px">{{$serviceclient->title}}</span>
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
                {{--                <div class="right">--}}
                {{--                    <a href="/settings/">--}}
                {{--                        <i class="fas fa-cog"></i>--}}
                {{--                    </a>--}}
                {{--                </div>--}}
            </div>
        </div>
        <div class="recommended product segments-bottom" style="margin-top: 24px">
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
                            <br/>
                            <small><a
                                    href="https://www.openstreetmap.org/?mlat=35.72140&amp;mlon=51.44278#map=19/35.72140/51.44278">موقعیت
                                    ما روی نقشه</a>
                            </small>
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
                                        <a href="#" class="button mobile-button"><i class="fas fa-paper-plane"></i>ارسال</a>
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
            <div class="container">
                <div class="row">
                    <div class="col-100">
                        <div class="password-settings segments">
                            <div class="container d-flex justify-content-center align-items-center">
                                <div class="row d-flex justify-content-center">
                                    <img src="{{url('/mobile/images/login-mobile.png/')}}" alt="login"
                                         style="width: 50%">
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
                                        <a href="{{url('login/google')}}" class="google-button external"
                                           style="width: 100%"> ورود با حساب
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
                                    <img class="rounded-full img-fluid"
                                         style="width: 40%; margin: 40px auto 20px;border-radius: 24px"
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
                    <div class="right"><a href="#tab-profile" class="tab-link external-link"><i class="fas fa-arrow-left"></i></a>
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
                                            <li class="item-content item-input">
                                                <div class="item-inner">
                                                    <div class="item-input-wrap">
                                                        <label>نوع استفاده</label>
                                                        <select name="certificate" class="form-control" id="certificate">
                                                            <option value="">انتخاب کنید</option>
                                                            <option value="1">نیاز به گواهی دوره</option>
                                                            <option value="0">عدم نیاز به گواهی دوره</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="content-button">
                                            <button type="submit" class="mobile-button">
                                                <i class="fas fa-edit"></i>ثبت نام
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
        <div id="tab-workshop-sign" class="page-content tab">

        </div>
        <div id="tap-payment" class="tab-payment tab">
            <div class="navbar navbar-page">
                <div class="navbar-inner">
                    <div class="title">پرداخت هزینه کارگاه</div>
                    <div class="right"><a href="#tab-profile" class="tab-link"><i class="fas fa-arrow-left"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div id="tap-payment" class="tab-payment tab">
            <div class="tab-pane fade show active" id="store-workshop" role="tabpanel"
                 aria-labelledby="store-workshop-tab">
                <div class="setting-body">
                    <form method="get" action="{{route('pay')}}" class="row pt-40px">
                        @csrf
                        <div class="input-box col-lg-3">
                            <label class="label-text">نام دوره</label>
                            {{--                                    <p>{{$workshopsigns->title}}</p>--}}
                        </div>

                        <div class="input-box col-lg-3">
                            <label class="label-text">مبلغ هزینه دوره</label>
                            <div class="form-group">
                                {{--                                        <p>{{number_format($workshopsigns->price)}} تومان </p>--}}
                            </div>
                        </div>

                        <div class="input-box col-lg-3">
                            <label class="label-text">نوع استفاده</label>
                            {{--                                    <div class="form-group">--}}
                            {{--                                        @if($workshopsigns->typeuse == 1)--}}
                            {{--                                            <p> حضوری </p>--}}
                            {{--                                        @else--}}
                            {{--                                            <p> آنلاین </p>--}}
                            {{--                                        @endif--}}
                            {{--                                    </div>--}}
                        </div>

                        <div class="input-box col-lg-3">
                            <label class="label-text">تاریخ دوره</label>
                            <div class="form-group">
                                {{--                                        <p>{{$workshopsigns->date}}</p>--}}
                            </div>
                        </div>
                        <div class="input-box col-lg-12 py-2">
                            <button type="submit" class="btn theme-btn">تایید و پرداخت</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @endif
        </div>

        @endsection
        <script>
            function closeAndroidModal() {
                document.getElementById("androidModal").style.display = "none";
            }

            window.addEventListener('load', function () {
                setTimeout(function () {
                    document.getElementById("androidModal").style.display = "block";
                }, 1000); // ۱ ثانیه بعد از لود کامل
            });
        </script>
