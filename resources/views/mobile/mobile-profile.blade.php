@extends('admin')
@section('style')
    <title>پروفایل کاربری</title>
    <style>
        .profile-detail {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
        }

        .profile-name {
            font-weight: bold;
        }

        .profile-desc {
            color: #6c757d;
        }

        .profile-warning {
            color: red;
        }
    </style>
@endsection
@section('main')
    <div class="container-fluid">
        <div class="dashboard-heading mb-5">
            <h3 class="fs-22 font-weight-semi-bold">پروفایل من</h3>
        </div>
        <div class="profile-detail mb-5">
            <ul class="generic-list-item generic-list-item-flash list-unstyled">
                <li class="mb-3 row">
                    <span class="profile-name col-5">تاریخ ثبت نام: </span>
                    <span
                        class="profile-desc col-7">{{ jdate(Auth::user()->created_at)->format('%A, %d %B %Y') }}</span>
                </li>
                <li class="mb-3 row">
                    <span class="profile-name col-5">نوع شخصیت: </span>
                    <span class="profile-desc col-7">{{ Auth::user()->personality_type ?? '' }}</span>
                    @if(!Auth::user()->personality_type)
                        <span class="profile-warning col-12">کاربر گرامی لطفا نوع شخصیت خود را در تنظیمات پروفایل کامل کنید.</span>
                    @endif
                </li>
                <li class="mb-3 row">
                    <span class="profile-name col-5">ملیت: </span>
                    <span class="profile-desc col-7">{{ Auth::user()->nationality ?? '' }}</span>
                    @if(!Auth::user()->nationality)
                        <span class="profile-warning col-12">کاربر گرامی لطفا نام و نام خانوادگی خود را در تنظیمات پروفایل کامل کنید.</span>
                    @endif
                </li>
                <li class="mb-3 row">
                    <span class="profile-name col-5">نام و نام خانوادگی: </span>
                    <span class="profile-desc col-7">{{ Auth::user()->name ?? '' }}</span>
                    @if(!Auth::user()->name)
                        <span class="profile-warning col-12">کاربر گرامی لطفا نام و نام خانوادگی خود را در تنظیمات پروفایل کامل کنید.</span>
                    @endif
                </li>
                <li class="mb-3 row">
                    <span class="profile-name col-5">جنسیت: </span>
                    <span class="profile-desc col-7">
                        @if(Auth::user()->gender == 1)
                            مرد
                        @elseif(Auth::user()->gender == 2)
                            زن
                        @endif
                    </span>
                    @if(!Auth::user()->gender)
                        <span
                            class="profile-warning col-12">کاربر گرامی لطفا جنسیت خود را در تنظیمات پروفایل کامل کنید.</span>
                    @endif
                </li>
                <li class="mb-3 row">
                    <span class="profile-name col-5">نام پدر: </span>
                    <span class="profile-desc col-7">{{ Auth::user()->father_name ?? '' }}</span>
                    @if(!Auth::user()->father_name)
                        <span class="profile-warning col-12">کاربر گرامی لطفا نام پدر خود را در تنظیمات پروفایل کامل کنید.</span>
                    @endif
                </li>
                <li class="mb-3 row">
                    <span class="profile-name col-5">تاریخ تولد: </span>
                    <span class="profile-desc col-7">{{ Auth::user()->birthday ?? '' }}</span>
                    @if(!Auth::user()->birthday)
                        <span class="profile-warning col-12">کاربر گرامی لطفا تاریخ تولد خود را در تنظیمات پروفایل کامل کنید.</span>
                    @endif
                </li>
                <li class="mb-3 row">
                    <span class="profile-name col-5">کد ملی: </span>
                    <span class="profile-desc col-7">{{ Auth::user()->national_id ?? '' }}</span>
                    @if(!Auth::user()->national_id)
                        <span class="profile-warning col-12">کاربر گرامی لطفا کد ملی خود را در تنظیمات پروفایل کامل کنید.</span>
                    @endif
                </li>
                <li class="mb-3 row">
                    <span class="profile-name col-5">شماره شناسنامه: </span>
                    <span class="profile-desc col-7">{{ Auth::user()->birth_certificate ?? '' }}</span>
                    @if(!Auth::user()->birth_certificate)
                        <span class="profile-warning col-12">کاربر گرامی لطفا شماره شناسنامه خود را در تنظیمات پروفایل کامل کنید.</span>
                    @endif
                </li>
                <li class="mb-3 row">
                    <span class="profile-name col-5">وضعیت تاهل: </span>
                    <span class="profile-desc col-7">{{ Auth::user()->marital_status ?? '' }}</span>
                    @if(!Auth::user()->marital_status)
                        <span class="profile-warning col-12">کاربر گرامی لطفا وضعیت تاهل خود را در تنظیمات پروفایل کامل کنید.</span>
                    @endif
                </li>
                <li class="mb-3 row">
                    <span class="profile-name col-5">مدرک تحصیلی: </span>
                    <span class="profile-desc col-7">@foreach(\App\Models\Profile\Educations::whereId(Auth::user()->education_id)->pluck('title') as $title)
                            {{ $title }}
                        @endforeach</span>
                    @if(!Auth::user()->education_id)
                        <span class="profile-warning col-12">کاربر گرامی لطفا مدرک تحصیلی خود را در تنظیمات پروفایل کامل کنید.</span>
                    @endif
                </li>
                <li class="mb-3 row">
                    <span class="profile-name col-5">شغل: </span>
                    <span class="profile-desc col-7">{{ Auth::user()->user_job ?? '' }}</span>
                    @if(!Auth::user()->user_job)
                        <span
                            class="profile-warning col-12">کاربر گرامی لطفا شغل خود را در تنظیمات پروفایل وارد کنید.</span>
                    @endif
                </li>
                <li class="mb-3 row">
                    <span class="profile-name col-5">محل اشتغال: </span>
                    <span class="profile-desc col-7">@foreach(\App\Models\Profile\State::whereId(Auth::user()->place_id)->pluck('title') as $title)
                            {{ $title }}
                        @endforeach</span>
                    @if(!Auth::user()->place_id)
                        <span class="profile-warning col-12">کاربر گرامی لطفا محل اشتغال خود را در تنظیمات پروفایل کامل کنید.</span>
                    @endif
                </li>
                @if(Auth::user()->type_id == 4)
                    <li class="mb-3 row">
                        <span class="profile-name col-5">عنوان شغل: </span>
                        <span class="profile-desc col-7">@foreach(\App\Models\Profile\Job_title::whereId(Auth::user()->job_title)->pluck('title') as $title)
                                {{ $title }}
                            @endforeach</span>
                        @if(!Auth::user()->job_title)
                            <span class="profile-warning col-12">کاربر گرامی لطفا عنوان شغلی خود را در تنظیمات پروفایل کامل کنید.</span>
                        @endif
                    </li>
                    <li class="mb-3 row">
                        <span class="profile-name col-5">شماره پروانه: </span>
                        <span class="profile-desc col-7">{{ Auth::user()->folder_id ?? '' }}</span>
                        @if(!Auth::user()->folder_id)
                            <span class="profile-warning col-12">کاربر گرامی لطفا شماره پروانه خود را در تنظیمات پروفایل کامل کنید.</span>
                        @endif
                    </li>
                    <li class="mb-3 row">
                        <span class="profile-name col-5">پایه پروانه: </span>
                        <span class="profile-desc col-7">@foreach(\App\Models\Profile\Base_certificate::whereId(Auth::user()->folder_base)->pluck('title') as $title)
                                {{ $title }}
                            @endforeach</span>
                        @if(!Auth::user()->folder_base)
                            <span class="profile-warning col-12">کاربر گرامی لطفا پایه پروانه خود را در تنظیمات پروفایل کامل کنید.</span>
                        @endif
                    </li>
                    <li class="mb-3 row">
                        <span class="profile-name col-5">اعتبار پروانه: </span>
                        <span class="profile-desc col-7">{{ Auth::user()->folder_validity ?? '' }}</span>
                        @if(!Auth::user()->folder_validity)
                            <span class="profile-warning col-12">کاربر گرامی لطفا نوع پروانه خود را در تنظیمات پروفایل کامل کنید.</span>
                        @endif
                    </li>
                @endif
                <li class="mb-3 row">
                    <span class="profile-name col-5">تلفن ثابت: </span>
                    <span class="profile-desc col-7">{{ Auth::user()->telphone ?? '' }}</span>
                    @if(!Auth::user()->telphone)
                        <span class="profile-warning col-12">کاربر گرامی لطفا تلفن ثابت خود را در تنظیمات پروفایل کامل کنید.</span>
                    @endif
                </li>
                <li class="mb-3 row">
                    <span class="profile-name col-5">استان: </span>
                    <span class="profile-desc col-7">@foreach(\App\Models\Profile\State::whereId(Auth::user()->state_id)->pluck('title') as $title)
                            {{ $title }}
                        @endforeach</span>
                    @if(!Auth::user()->state_id)
                        <span
                            class="profile-warning col-12">کاربر گرامی لطفا استان خود را در تنظیمات پروفایل کامل کنید.</span>
                    @endif
                </li>
                <li class="mb-3 row">
                    <span class="profile-name col-5">شهرستان: </span>
                    <span class="profile-desc col-7">@foreach(\App\Models\Profile\City::whereId(Auth::user()->city_id)->pluck('title') as $title)
                            {{ $title }}
                        @endforeach</span>
                    @if(!Auth::user()->city_id)
                        <span class="profile-warning col-12">کاربر گرامی لطفا شهرستان خود را در تنظیمات پروفایل کامل کنید.</span>
                    @endif
                </li>
                <li class="mb-3 row">
                    <span class="profile-name col-5">آدرس: </span>
                    <span class="profile-desc col-7">{{ Auth::user()->address ?? '' }}</span>
                    @if(!Auth::user()->address)
                        <span
                            class="profile-warning col-12">کاربر گرامی لطفا آدرس خود را در تنظیمات پروفایل کامل کنید.</span>
                    @endif
                </li>
                <li class="mb-3 row">
                    <span class="profile-name col-5">نوع کاربری: </span>
                    <span class="profile-desc col-7">@foreach(\App\Models\TypeUser::whereId(Auth::user()->type_id)->pluck('title_fa') as $title)
                            {{ $title }}
                        @endforeach</span>
                    @if(!Auth::user()->type_id)
                        <span class="profile-warning col-12">کاربر گرامی لطفا نوع کاربری خود را در تنظیمات پروفایل کامل کنید.</span>
                    @endif
                </li>
                <li class="mb-3 row">
                    <span class="profile-name col-5">ایمیل: </span>
                    <span class="profile-desc col-7">{{ Auth::user()->email ?? '' }}</span>
                    @if(Auth::user()->email_verify == 0)
                        <span class="profile-warning col-12">کاربر گرامی لطفا با کلیک بر روی ایمیل خود آن را تایید نمایید.</span>
                    @endif
                </li>
                <li class="mb-3 row">
                    <span class="profile-name col-5">شماره تلفن: </span>
                    <span class="profile-desc col-7">{{ Auth::user()->phone ?? '' }}</span>
                    @if(Auth::user()->phone_verify == 0)
                        <span class="profile-warning col-12">کاربر گرامی لطفا با کلیک بر روی شماره موبایل خود آن را تایید نمایید.</span>
                    @endif
                </li>
            </ul>
        </div>
    </div>
@endsection
