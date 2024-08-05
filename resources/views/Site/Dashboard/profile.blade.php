@extends('admin')
@section('style')
    <title>پروفایل کاربری</title>
@endsection
@section('main')
    <div class="dashboard-heading mb-5">
        <h3 class="fs-22 font-weight-semi-bold d-flex justify-content-center text-align-center">پروفایل من</h3>
    </div>
    <div class="profile-detail container mb-5 p-5" style="border: 1px solid rgba(0,0,0,0.16);border-radius: 16px;width: fit-content">
        <ul class="generic-list-item generic-list-item-flash">

            <li><span class="profile-name">     تاریخ ثبت نام: </span><span
                    class="profile-desc">{{jdate(Auth::user()->created_at)->format('%A, %d %B %Y')}} </span></li>

            <li>
                <span class="profile-name">نوع شخصیت: </span>
                @if(Auth::user()->personality_type)
                    <span class="profile-desc">{{ Auth::user()->personality_type }}</span>
                @else
                    <span style="color: red;">کاربر گرامی لطفا نوع شخصیت خود را در تنظیمات پروفایل کامل کنید.</span>
                @endif
            </li>
            <li>
                <span class="profile-name">ملیت: </span>
                @if(Auth::user()->nationality)
                    <span class="profile-desc">{{ Auth::user()->nationality }}</span>
                @else
                    <span style="color: red;">کاربر گرامی لطفا ملیت خود را در تنظیمات پروفایل کامل کنید.</span>
                @endif
            </li>
            <li>
                <span class="profile-name">نام و نام خانوادگی: </span>
                @if(Auth::user()->name)
                    <span class="profile-desc">{{ Auth::user()->name }}</span>
                @else
                    <span
                        style="color: red;">کاربر گرامی لطفا نام و نام خانوادگی خود را در تنظیمات پروفایل کامل کنید.</span>
                @endif
            </li>
            <li>
                <span class="profile-name">جنسیت: </span>
                @if(Auth::user()->gender)
                    <span class="profile-desc">
            @if(Auth::user()->gender == 1)
                            مرد
                        @elseif(Auth::user()->gender == 2)
                            زن
                        @endif
        </span>
                @else
                    <span style="color: red;">کاربر گرامی لطفا جنسیت خود را در تنظیمات پروفایل کامل کنید.</span>
                @endif
            </li>
            <li>
                <span class="profile-name">نام پدر: </span>
                @if(Auth::user()->father_name)
                    <span class="profile-desc">{{ Auth::user()->father_name }}</span>
                @else
                    <span style="color: red;">کاربر گرامی لطفا نام پدر خود را در تنظیمات پروفایل کامل کنید.</span>
                @endif
            </li>
            <li>
                <span class="profile-name">تاریخ تولد: </span>
                @if(Auth::user()->birthday)
                    <span class="profile-desc">{{ Auth::user()->birthday }}</span>
                @else
                    <span style="color: red;">کاربر گرامی لطفا تاریخ تولد خود را در تنظیمات پروفایل کامل کنید.</span>
                @endif
            </li>
            <li>
                <span class="profile-name">کد ملی: </span>
                @if(Auth::user()->national_id)
                    <span class="profile-desc">{{ Auth::user()->national_id }}</span>
                @else
                    <span style="color: red;">کاربر گرامی لطفا کد ملی خود را در تنظیمات پروفایل کامل کنید.</span>
                @endif
            </li>
            <li>
                <span class="profile-name">شماره شناسنامه: </span>
                @if(Auth::user()->birth_certificate)
                    <span class="profile-desc">{{ Auth::user()->birth_certificate }}</span>
                @else
                    <span
                        style="color: red;">کاربر گرامی لطفا شماره شناسنامه خود را در تنظیمات پروفایل کامل کنید.</span>
                @endif
            </li>
            <li>
                <span class="profile-name">وضعیت تاهل: </span>
                @if(Auth::user()->marital_status)
                    <span class="profile-desc">{{ Auth::user()->marital_status }}</span>
                @else
                    <span style="color: red;">کاربر گرامی لطفا وضعیت تاهل خود را در تنظیمات پروفایل کامل کنید.</span>
                @endif
            </li>
            <li>
                <span class="profile-name">مدرک تحصیلی: </span>
                <span class="profile-desc">
        @if(Auth::user()->education_id)
                        @foreach(\App\Models\Profile\Educations::whereId(Auth::user()->education_id)->pluck('title') as $title)
                            {{$title}}
                        @endforeach
                    @else
                        <span
                            style="color: red;">کاربر گرامی لطفا مدرک تحصیلی خود را در تنظیمات پروفایل کامل کنید.
                        </span>
                    @endif
                </span>
            </li>
            <li>
                <span class="profile-name">شغل: </span>
                @if(Auth::user()->user_job)
                    <span class="profile-desc">{{ Auth::user()->user_job }}</span>
                @else
                    <span style="color: red;">کاربر گرامی لطفا وضعیت تاهل خود را در تنظیمات پروفایل کامل کنید.</span>
                @endif
            </li>

            <li>
                <span class="profile-name">محل اشتغال: </span>
                <span class="profile-desc">
        @foreach(\App\Models\Profile\State::whereId(Auth::user()->place_id)->pluck('title') as $title)
                        {{ $title }}
                    @endforeach
    </span>
                @if(!Auth::user()->place_id)
                    <span style="color: red;">کاربر گرامی لطفا محل اشتغال خود را در تنظیمات پروفایل کامل کنید.</span>
                @endif
            </li>
            @if(Auth::user()->type_id == 4)
                <li>
                    <span class="profile-name"> عنوان شغل: </span>
                    <span class="profile-desc">
                    @foreach(\App\Models\Profile\Job_title::whereId(Auth::user()->job_title)->pluck('title') as $title)
                            {{ $title }}
                    @endforeach
                    </span>
                    @if(!Auth::user()->job_title)
                        <span
                            style="color: red;"> کاربر گرامی لطفا عنوان شغلی خود را در تنظیمات پروفایل کامل کنید.</span>
                    @endif
                </li>
                <li>
                    <span class="profile-name"> شماره پروانه: </span>
                    <span class="profile-desc">{{ Auth::user()->folder_id }}</span>
                    @if(!Auth::user()->folder_id)
                        <span
                            style="color: red;"> کاربر گرامی لطفا شماره پروانه خود را در تنظیمات پروفایل کامل کنید.</span>
                    @endif
                </li>
                <li>
                    <span class="profile-name"> پایه پروانه: </span>
                    <span class="profile-desc">
            @foreach(\App\Models\Profile\Base_certificate::whereId(Auth::user()->folder_base)->pluck('title') as $title)
                            {{ $title }}
                        @endforeach
                        </span>
                    @if(!Auth::user()->folder_base)
                        <span
                            style="color: red;"> کاربر گرامی لطفا پایه پروانه خود را در تنظیمات پروفایل کامل کنید.
                        </span>
                    @endif
                </li>
                <li>
                    <span class="profile-name"> اعتبار پروانه: </span>
                    <span class="profile-desc">{{ Auth::user()->folder_validity }}</span>
                    @if(!Auth::user()->folder_validity)
                        <span
                            style="color: red;"> کاربر گرامی لطفا اعتبار پروانه خود را در تنظیمات پروفایل کامل کنید.</span>
                    @endif
                </li>
            @endif
            <li>
                <span class="profile-name">تلفن ثابت: </span>
                @if(Auth::user()->telphone)
                    <span class="profile-desc">{{ Auth::user()->telphone }}</span>
                @else
                    <span style="color: red;">کاربر گرامی لطفا تلفن ثابت خود را در تنظیمات پروفایل کامل کنید.</span>
                @endif
            </li>
            <li><span class="profile-name"> استان: </span>
                <span class="profile-desc">@foreach(\App\Models\Profile\State::whereId(Auth::user()->state_id)->pluck('title') as $title)
                        {{$title}}
                    @endforeach </span>
                @if(!Auth::user()->state_id)
                    <span style="color: red;"> کاربر گرامی لطفا استان خود را در تنظیمات پروفایل کامل کنید.</span>
                @endif
            </li>
            <li><span class="profile-name"> شهرستان: </span>
                <span class="profile-desc">@foreach(\App\Models\Profile\City::whereId(Auth::user()->city_id)->pluck('title') as $title)
                        {{$title}}
                    @endforeach</span>
                @if(!Auth::user()->city_id)
                    <span style="color: red;">  کاربر گرامی لطفا شهرستان خود را در تنظیمات پروفایل کامل کنید.</span>
                @endif
            </li>
            <li><span class="profile-name">  آدرس: </span>
                <span class="profile-desc">{{(Auth::user()->address)}}</span>
                @if(!Auth::user()->address)
                    <span style="color: red;"> کاربر گرامی لطفا آدرس خود را در تنظیمات پروفایل کامل کنید.</span>
                @endif</li>
            <li>
                <span class="profile-name"> نوع کاربری: </span>
                <span class="profile-desc">@foreach(\App\Models\TypeUser::whereId(Auth::user()->type_id)->pluck('title_fa') as $title)
                        {{$title}}
                    @endforeach </span>
                @if(!Auth::user()->type_id)
                    <span style="color: red;"> کاربر گرامی لطفا نوع کاربری خود را در تنظیمات پروفایل کامل کنید.</span>
                @endif
            </li>
            <li><span class="profile-name"> ایمیل: </span>
                <span class="profile-desc">{{(Auth::user()->email)}} </span>
                @if(Auth::user()->email_verify == 0)
                    <span style="color: red;">کاربر گرامی لطفا با کلیک بر روی ایمیل خود آن را تایید نمایید.</span>
                @endif
            </li>
            <li><span class="profile-name"> شماره تلفن: </span>
                <span class="profile-desc">{{(Auth::user()->phone)}} </span>
                @if(Auth::user()->phone_verify == 0)
                    <span
                        style="color: red;"> کاربر گرامی لطفا با کلیک بر روی شماره موبایل خود آن را تایید نمایید.</span>
                @endif
            </li>
        </ul>
    </div>
@endsection
