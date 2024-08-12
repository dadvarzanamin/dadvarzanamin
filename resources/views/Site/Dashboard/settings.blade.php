@extends('admin')
@section('style')
    <title>تنظیمات حساب کاربری</title>
@endsection
@section('main')
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Select2 with Bootstrap</title>
        <!-- Select2 CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/persian-datepicker@1.2.0/dist/css/persian-datepicker.min.css">
    </head>
    <style>
        .select2-container--default .select2-selection--single {
            border: none!important;
        }
        .select2-container--default .select2-search--dropdown .select2-search__field{
            direction: rtl;
        }
        .datepicker-plot-area{
            font-family: Vazir, serif;
            border-radius: 8px;
            margin: 8px;
        }
        .select2-container--default .select2-selection--single .select2-selection__clear{
            float: left;
        }
        .select2-container--default .select2-results__option--highlighted[aria-selected]{
            background-color:#cea54a;
        }
    </style>
    @include('sweetalert::alert')
    <div class="dashboard-heading mb-5">
        <h3 class="fs-22 font-weight-semi-bold d-flex justify-content-center text-align-center">ویرایش حساب کاربری</h3>
    </div>
    <ul class="nav nav-tabs generic-tab pb-30px justify-content-center" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="edit-profile-tab" data-toggle="tab" href="#edit-profile" role="tab" aria-controls="edit-profile" aria-selected="false">مشخصات فردی</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="password-tab" data-toggle="tab" href="#password" role="tab" aria-controls="password" aria-selected="true">کلمه عبور</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="change-email-tab" data-toggle="tab" href="#change-email" role="tab" aria-controls="change-email" aria-selected="false">تغییر ایمیل</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="withdraw-tab" data-toggle="tab" href="#withdraw" role="tab" aria-controls="withdraw" aria-selected="false">حساب ها </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="payment-tab" data-toggle="tab" href="#payment" role="tab" aria-controls="payment" aria-selected="false"> پرداخت ها </a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="edit-profile" role="tabpanel" aria-labelledby="edit-profile-tab">
            <div class="setting-body">
                <h3 class="fs-17 font-weight-semi-bold pb-4 ">ویرایش</h3>
                <form method="post" action="{{route('edit-user-profile')}}" class="row pt-40px" enctype="multipart/form-data">
                    @csrf
                    <div class="input-box col-lg-3">
                        <label class="label-text">نام و نام خانوادگی</label>
                        <div class="form-group">
                            <input class="form-control " type="text" name="name" value="{{Auth::user()->name}}" />
                        </div>
                    </div>
                    <div class="input-box col-lg-3">
                        <label class="label-text">نوع شخصیت</label>
                        <div class="form-group">
                            <select name="personality_type" class="form-control" id="personality_type">
                                <option value="">انتخاب کنید</option>
                                <option value="حقیقی" {{Auth::user()->personality_type == 'حقیقی' ? 'selected' : ''}}>حقیقی</option>
                                <option value="حقوقی" {{Auth::user()->personality_type == 'حقوقی' ? 'selected' : ''}}>حقوقی</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-box col-lg-3">
                        <label class="label-text">ملیت</label>
                        <div class="form-group">
                            <select name="nationality" class="form-control" id="nationality">
                                <option value="">انتخاب کنید</option>
                                <option value="ایرانی" {{Auth::user()->nationality == 'ایرانی' ? 'selected' : ''}}>ایرانی</option>
                                <option value="غیر ایرانی" {{Auth::user()->nationality == 'غیر ایرانی' ? 'selected' : ''}}>غیر ایرانی</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-box col-lg-3">
                        <label class="label-text">جنسیت</label>
                        <div class="form-group">
                            <select name="gender" class="form-control" id="gender">
                                <option value="">انتخاب کنید</option>
                                <option value="1" {{Auth::user()->gender == 1 ? 'selected' : ''}}>مرد</option>
                                <option value="2" {{Auth::user()->gender == 2 ? 'selected' : ''}}>زن</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-box col-lg-3">
                        <label class="label-text">وضعیت تاهل</label>
                        <div class="form-group">
                            <select name="marital_status" class="form-control" id="gender">
                                <option value="">انتخاب کنید</option>
                                <option value="متاهل" {{Auth::user()->marital_status == 'متاهل' ? 'selected' : ''}}>متاهل</option>
                                <option value="مجرد" {{Auth::user()->marital_status == 'مجرد' ? 'selected' : ''}}>مجرد</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-box col-lg-3">
                        <label class="label-text">نام پدر</label>
                        <div class="form-group">
                            <input class="form-control" type="text" name="father_name" value="{{Auth::user()->father_name}}" />
                        </div>
                    </div>
                    <div class="input-box col-lg-3">
                        <label for="date-input">تاریخ تولد</label>

{{--                        <label class="label-text">تاریخ تولد</label>--}}
                        <div class="form-group">
                            <input type="text" class="form-control" id="date-input" name="birthday value="{{Auth::user()->birthday}}">
{{--                        <input class="form-control" type="text" name="birthday" value="{{Auth::user()->birthday}}" />--}}
                        </div>
                    </div>
                    <div class="input-box col-lg-3">
                        <label class="label-text">کد ملی</label>
                        <div class="form-group">
                            <input class="form-control" type="text" name="national_id" value="{{Auth::user()->national_id}}" />
                        </div>
                    </div>
                    <div class="input-box col-lg-3">
                        <label class="label-text">شماره شناسنامه</label>
                        <div class="form-group">
                            <input class="form-control" type="text" name="birth_certificate" value="{{Auth::user()->birth_certificate}}" />
                        </div>
                    </div>
                    <div class="input-box col-lg-3">
                        <label class="label-text">مدرک تحصیلی</label>
                        <div class="form-group">
                            <select class="form-control" name="education_id" id="education_id">
                                @foreach(App\Models\Profile\Educations::all() as $title)
                                    <option value="{{$title->id}}" {{Auth::user()->education_id == $title->id ? 'selected' : ''}}>{{$title->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="input-box col-lg-3">
                        <label class="label-text">شغل</label>
                        <div class="form-group">
                            <input class="form-control" type="text" name="user_job" value="{{Auth::user()->user_job}}" />
                        </div>
                    </div>
                    <div class="input-box col-lg-3">
                        <label class="label-text">محل اشتغال</label>
                        <div class="form-control">
                            <select name="place_id" class="select2 col-md-12" id="place_id">
                                <option value="" disabled selected>انتخاب کنید</option>
                            @foreach(App\Models\Profile\State::all() as $state)
                                    <option value="{{$state->id}}" {{Auth::user()->place_id == $state->id ? 'selected' : ''}}>{{$state->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @if(Auth::user()->type_id == 4)
                        <div class="input-box col-lg-3">
                            <label class="label-text">عنوان شغل</label>
                            <div class="form-group">
                                <select class="form-control" name="job_title" id="job_title">
                                @foreach(App\Models\Profile\Job_title::all() as $title)
                                        <option value="{{$title->id}}" {{Auth::user()->job_title == $title->id ? 'selected' : ''}}>{{$title->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="input-box col-lg-3">
                            <label class="label-text">شماره پروانه</label>
                            <div class="form-group">
                                <input class="form-control" type="text" name="folder_id" value="{{Auth::user()->folder_id}}" />
                            </div>
                        </div>
                        <div class="input-box col-lg-3">
                            <label class="label-text">پایه پروانه</label>
                            <div class="form-group">
                                <select class="form-control" name="folder_base" id="folder_base">
                                    @foreach(App\Models\Profile\Base_certificate::all() as $title)
                                        <option value="{{$title->id}}" {{Auth::user()->folder_base == $title->id ? 'selected' : ''}}>{{$title->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="input-box col-lg-3">
                            <label class="label-text">اعتبار پروانه</label>
                            <div class="form-group">
                                <input class="form-control" type="text" name="folder_validity" value="{{Auth::user()->folder_validity}}" />
                            </div>
                        </div>
                    @endif
                    <div class="input-box col-lg-3">
                        <label class="label-text">تلفن ثابت</label>
                        <div class="form-group">
                            <input class="form-control" type="text" name="telphone" value="{{Auth::user()->telphone}}" />
                        </div>
                    </div>
                    <div class="input-box col-lg-3">
                        <label class="label-text">استان</label>
                        <div class="form-control">
                            <select name="state_id" class="select2 col-md-12" id="state_id">
                                <option value="" disabled selected>انتخاب کنید</option>
                            @foreach(App\Models\Profile\State::all() as $state)
                                    <option value="{{$state->id}}" {{Auth::user()->state_id == $state->id ? 'selected' : ''}}>{{$state->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="input-box col-lg-3">
                        <label class="label-text">شهرستان</label>
                        <div class="form-control">
                            <select name="city_id" class="select2 col-md-12" id="city_id">
                                <option value="" disabled selected>انتخاب کنید</option>
                            @foreach(App\Models\Profile\City::all() as $city)
                                    <option value="{{$city->id}}" {{Auth::user()->city_id == $city->id ? 'selected' : ''}}>{{$city->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="input-box col-lg-3">
                        <label class="label-text">آدرس</label>
                        <div class="form-group">
                            <input class="form-control" type="text" name="address" value="{{Auth::user()->address}}" />
                        </div>
                    </div>
                    <div class="input-box col-lg-3">
                        <label class="label-text">آدرس ایمیل</label>
                        <div class="form-group">
                            <input class="form-control  text-left" type="email" name="email" value="{{Auth::user()->email}}" />
                        </div>
                    </div>
                    <div class="input-box col-lg-3">
                        <label class="label-text">موبایل</label>
                        <div class="form-group">
                            <input class="form-control  text-left" type="text" name="phone" value="{{Auth::user()->phone}}" />
                        </div>
                    </div>
                    <div class="input-box col-lg-3">
                        <label class="label-text">تصویر پروفایل</label>
                        <div class="media-body">
                            <div class="file-upload-wrap file-upload-wrap-2">
                                <input type="file" name="image" class="multi file-upload-input with-preview"/>
                                <span class="file-upload-text"><i class="la la-photo mr-2"></i>یک عکس آپلود کنید</span>
                            </div>
                        </div>
                    </div>
                    <div class="input-box col-lg-8"></div>
                    <div class="input-box col-lg-4">
                        <p class="fs-14" style="color:#e53a3a;">حداکثر اندازه فایل 5 مگابایت، ابعاد: 200x200 و فایل های مجاز jpg و png</p>
                    </div>
                    <div class="input-box col-lg-12 py-2">
                        <button type="submit" class="btn theme-btn">ذخیره تغییرات</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
            <div class="setting-body">
                <h3 class="fs-17 font-weight-semi-bold pb-4">رمز عبور را تغییر دهید</h3>
                <form method="post" action="{{route('change-password')}}" class="row">
                    @csrf
                    <div class="input-box col-lg-4">
                        <label class="label-text">رمز عبور قدیمی</label>
                        <div class="form-group">
                            <input class="form-control " required type="password" name="old_password" placeholder="رمز عبور قدیمی" />
                        </div>
                    </div>
                    <div class="input-box col-lg-4">
                        <label class="label-text">رمز عبور جدید</label>
                        <div class="form-group">
                            <input class="form-control " required type="password" name="password" placeholder="رمز عبور جدید" />
                        </div>
                    </div>
                    <div class="input-box col-lg-4">
                        <label class="label-text">رمز عبور جدید را تأیید کنید</label>
                        <div class="form-group">
                            <input class="form-control " required type="password" name="password_confirmation" placeholder="رمز عبور جدید را تأیید کنید" />
                        </div>
                    </div>
                    <div class="input-box col-lg-12 py-2">
                        <button class="btn theme-btn">رمز عبور را تغییر دهید</button>
                    </div>
                </form>
                <form method="post" action="{{route('verification.resend')}}" class="pt-5 mt-5 border-top border-top-gray">
                    @csrf
                    <h3 class="fs-17 font-weight-semi-bold pb-1">رمز عبور را فراموش کرده و سپس رمز عبور را بازیابی کنید</h3>
                    <p class="pb-4">
                        ایمیل اکانت خود را برای بازنشانی رمز عبور وارد کنید. سپس پیوندی به ایمیل برای بازنشانی رمز عبور دریافت خواهید کرد و به ایمیل خود مراجعه کنید
                    </p>
                    <div class="input-box">
                        <label class="label-text">آدرس ایمیل</label>
                        <div class="form-group">
                            <input class="form-control " type="email" name="email" placeholder="آدرس ایمیل را وارد کن" />

                        </div>
                    </div>
                    <div class="input-box py-2">
                        <button class="btn theme-btn">بازیابی رمز عبور</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="tab-pane fade" id="change-email" role="tabpanel" aria-labelledby="change-email-tab">
            <div class="setting-body">
                <h3 class="fs-17 font-weight-semi-bold pb-4">تغییر ایمیل</h3>
                <form method="post" action="{{route('change-email')}}" class="row">
                    @csrf
                    <div class="input-box col-lg-4">
                        <label class="label-text">ایمیل قدیمی</label>
                        <div class="form-group">
                            <input class="form-control form--control" type="email" name="old_email" placeholder="ایمیل قدیمی" />

                        </div>
                    </div>
                    <div class="input-box col-lg-4">
                        <label class="label-text">ایمیل جدید</label>
                        <div class="form-group">
                            <input class="form-control form--control" type="email" name="new_email" placeholder="ایمیل جدید" />

                        </div>
                    </div>
                    <div class="input-box col-lg-12 py-2">
                        <button class="btn theme-btn">تغییر ایمیل</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="tab-pane fade" id="withdraw" role="tabpanel" aria-labelledby="withdraw-tab">
            <div class="setting-body">
                <h3 class="fs-17 font-weight-semi-bold pb-4">اطلاعات حساب بانکی خود را وارد کنید</h3>
                <form method="post" action="{{route('bank-account')}}" class="row">
                    @csrf
                    <h3 class="fs-17 font-weight-semi-bold pb-4 col-lg-12">اطلاعات حساب</h3>
                    <div class="input-box col-lg-3">
                        <label class="label-text">نام بانک</label>
                        <div class="form-group">
                            <input class="form-control form--control" type="text" name="bank_name" />
                            <span class="la la-bank input-icon"></span>
                        </div>
                    </div>
                    <div class="input-box col-lg-3">
                        <label class="label-text">شماره حساب</label>
                        <div class="form-group">
                            <input class="form-control form--control" type="text" name="bank_account" style="text-align: left" />
                            <span class="la la-pencil input-icon"></span>
                        </div>
                    </div>
                    <div class="input-box col-lg-3">
                        <label class="label-text">شماره کارت</label>
                        <div class="form-group">
                            <input class="form-control form--control" type="text" name="bank_card" style="text-align: left"/>
                            <span class="la la-id-card input-icon"></span>
                        </div>
                    </div>
                    <div class="input-box col-lg-3">
                        <label class="label-text">شماره شبا</label>
                        <div class="form-group">
                            <input class="form-control form--control" type="text" name="bank_sheba" style="text-align: left" />
                            <span class="la la-id-card input-icon"></span>
                        </div>
                    </div>
                    <div class="input-box col-lg-12 py-2">
                        <button class="btn theme-btn">ذخیره حساب برداشت</button>
                    </div>
                </form>
                <div class="section-block mb-5"></div>
                <div class="dashboard-heading mb-5">
                    <h3 class="fs-22 font-weight-semi-bold">حساب های بانکی</h3>
                </div>
                <div class="table-responsive mb-5">
                    <table class="table generic-table">
                        <thead>
                        <tr>
                            <th scope="col"> ردیف</th>
                            <th scope="col">نام بانک</th>
                            <th scope="col">شماره حساب</th>
                            <th scope="col">شماره کارت</th>
                            <th scope="col">شماره شبا</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($banks as $bank)
                            <tr>
                                <td>
                                    <ul class="generic-list-item">
                                        <li>{{$loop->iteration}}</li>
                                    </ul>
                                </td>
                                <td>
                                    <ul class="generic-list-item">
                                        <li>{{$bank->bank_name}}</li>
                                    </ul>
                                </td>
                                <td>
                                    <ul class="generic-list-item">
                                        <li>{{$bank->bank_account}}</li>
                                    </ul>
                                </td>
                                <td>
                                    <ul class="generic-list-item">
                                        <li>{{$bank->bank_card}}</li>
                                    </ul>
                                </td>
                                <td>
                                    <ul class="generic-list-item">
                                        <li>{{$bank->bank_sheba}}</li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
            <div class="setting-body">
                <h3 class="fs-17 font-weight-semi-bold pb-4">لیست پرداخت های موفق و نا موفق</h3>
                <form method="post" action="{{route('bank-payment')}}" class="row">
                    @csrf
                    <h3 class="fs-17 font-weight-semi-bold pb-4 col-lg-12">اطلاعات واریز</h3>
                    <div class="input-box col-lg-3">
                        <label class="label-text">شماره کارت واریزی</label>
                        <div class="form-group">
                            <input class="form-control form--control" type="text" name="bank_card" style="text-align: left"/>
                        </div>
                    </div>
                    <div class="input-box col-lg-3">
                        <label class="label-text">تاریخ پرداخت</label>
                        <div class="form-group">
                            <input class="form-control form--control" type="text" name="date" style="text-align: left" />
                        </div>
                    </div>
                    <div class="input-box col-lg-3">
                        <label class="label-text">مبلغ پرداخت</label>
                        <div class="form-group">
                            <input class="form-control form--control" type="text" name="amount" style="text-align: left"/>
                        </div>
                    </div>
                    <div class="input-box col-lg-3">
                        <label class="label-text">علت پرداخت</label>
                        <div class="form-group">
                            <input class="form-control form--control" type="text" name="description" style="text-align: left" />
                        </div>
                    </div>
                    <div class="input-box col-lg-12 py-2">
                        <button class="btn theme-btn">ذخیره واریزی</button>
                    </div>
                </form>
                <div class="section-block mb-5"></div>
                <div class="dashboard-heading mb-5">
                    <h3 class="fs-22 font-weight-semi-bold">لیست واریز ها</h3>
                </div>
                <div class="table-responsive mb-5">
                    <table class="table generic-table">
                        <thead>
                        <tr>
                            <th scope="col"> ردیف</th>
                            <th scope="col">علت پرداخت</th>
                            <th scope="col">مبلغ پرداخت</th>
                            <th scope="col">تاریخ پرداخت</th>
                            <th scope="col">وضعیت پرداخت</th>
                            <th scope="col">علت پرداخت</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($payments as $payment)
                            <tr>
                                <td>
                                    <ul class="generic-list-item">
                                        <li>{{$loop->iteration}}</li>
                                    </ul>
                                </td>
                                <td>
                                    <ul class="generic-list-item">
                                        <li>{{$payment->title}}</li>
                                    </ul>
                                </td>
                                <td>
                                    <ul class="generic-list-item">
                                        <li>{{number_format($payment->amount)}} تومان </li>
                                    </ul>
                                </td>
                                <td>
                                    <ul class="generic-list-item">
                                        <li>{{$payment->date}}</li>
                                    </ul>
                                </td>
                                <td>
                                    <ul class="generic-list-item">
                                        <li>
                                            @if($payment->status == 4)
                                                <button class="btn btn-success">پرداخت موفق</button>
                                            @elseif($payment->status == 1)
                                                <button class="btn btn-danger">پرداخت ناموفق</button>
                                            @endif
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <ul class="generic-list-item">
                                        <li>{{$payment->pay_for}}</li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: 'انتخاب کنید',
                allowClear: true
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/persian-date@1.1.0/dist/persian-date.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/persian-datepicker@1.2.0/dist/js/persian-datepicker.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#date-input').persianDatepicker({
                format: 'YYYY/MM/DD'
            });
        });
    </script>
@endsection

