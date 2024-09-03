
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
    <style>
        #hire {
            max-width: 40%;
        }
        @media screen and (max-width: 600px) {
            #hire {
                max-width: 95%;
            }        }
    </style>
    <section class="d-flex flex-wrap">
        <div class="container col-12 col-md-6 my-5">
            <strong>شرایط عمومی استخدام:</strong>
            <ul class="generic-list-item pt-3">
                <li><i class="la la-check-circle mr-2 text-success"></i>تخصص و تجربه: داشتن مدرک
                    کارشناسی، کارشناسی ارشد یا دکترای حقوق و سابقه کار مرتبط در زمینه‌های مختلف حقوقی
                </li>
                <li><i class="la la-check-circle mr-2 text-success"></i>مهارت‌های ارتباطی: توانایی
                    برقراری ارتباط موثر با مراجعین، سایر وکلا و همکاران
                </li>
                <li><i class="la la-check-circle mr-2 text-success"></i>مهارت‌های حل مسئله: توانایی
                    تجزیه و تحلیل مسائل حقوقی و ارائه راهکارهای مناسب
                </li>
                <li><i class="la la-check-circle mr-2 text-success"></i>تعهد و صداقت: پایبندی به اصول و
                    اخلاق حرفه‌ای و تعهد به ارائه خدمات حقوقی با کیفیت
                </li>
                <li><i class="la la-check-circle mr-2 text-success"></i>انضباط و نظم: توانایی مدیریت
                    زمان و انجام وظایف محوله در چارچوب زمان‌بندی تعیین شده
                </li>
            </ul>
            <strong>شرایط اختصاصی استخدام:</strong>
            <ul class="generic-list-item pt-3">
                <li><i class="la la-check-circle mr-2 text-success"></i>تسلط به قوانین و مقررات حقوقی
                    مرتبط با زمینه تخصصی مورد نظر
                </li>
                <li><i class="la la-check-circle mr-2 text-success"></i>توانایی نگارش متون حقوقی اعم از
                    لایحه، دفاعیات حقوقی قوی و ...
                </li>
                <li><i class="la la-check-circle mr-2 text-success"></i>توانایی انجام تحقیقات حقوقی</li>
                <li><i class="la la-check-circle mr-2 text-success"></i>آشنایی با نرم‌افزارهای حقوقی
                </li>
            </ul>
            <strong>مزایای استخدام:</strong>
            <ul class="generic-list-item pt-3">
                <li><i class="la la-check-circle mr-2 text-success"></i>محیط کاری پویا و چالش‌برانگیز
                </li>
                <li><i class="la la-check-circle mr-2 text-success"></i>فرصت‌های رشد و پیشرفت</li>
                <li><i class="la la-check-circle mr-2 text-success"></i>حقوق و مزایای مناسب</li>
                <li><i class="la la-check-circle mr-2 text-success"></i>همکاری با تیمی مجرب و متخصص</li>
                <li><i class="la la-check-circle mr-2 text-success"></i>ارتباط با طیف وسیعی از مراجعین
                </li>
                <li><i class="la la-check-circle mr-2 text-success"></i>پشتیبانی و آموزش‌های مستمر</li>
            </ul>
        </div>
        <div class="container d-flex flex-column col-12 col-md-6 align-items-center align-self-center my-5 border br-16 p-2" id="hire">
            <h2 class="text-center mb-4">ارسال رزومه</h2>
            <form action="#" method="POST" enctype="multipart/form-data" class="col-12">
                @csrf
                <div class="form-group">
                    <label for="name">نام و نام خانوادگی:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">ایمیل:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone">شماره تلفن:</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="education">مدرک تحصیلی:</label>
                    <input type="text" class="form-control" id="education" name="education" required>
                </div>
                <div class="form-group">
                    <label for="experience">تجربیات کاری:</label>
                    <textarea class="form-control" id="experience" name="experience" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label for="resume">بارگذاری رزومه:</label>
                    <input type="file" class="form-control-file" id="resume" name="resume" required>
                </div>
                <button type="submit" class="pr-button btn-block br-16">ارسال رزومه</button>
            </form>
        </div>
    </section>



@endsection
