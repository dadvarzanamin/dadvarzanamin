@extends('admin')
@section('style')
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font/dist/font-face.css" rel="stylesheet" type="text/css">
    <title>کارگاه و دوره های آموزشی</title>
@endsection
@section('main')
    @include('sweetalert::alert')
    <div class="dashboard-heading mb-5">
        <h3 class="fs-22 font-weight-semi-bold">کارگاه و دوره های آموزشی</h3>
    </div>
    <ul class="nav nav-tabs generic-tab pb-30px" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="edit-profile-tab" data-toggle="tab" href="#store-workshop" role="tab"
               aria-controls="store-workshop" aria-selected="false">ثبت نام کارگاه و دوره آموزشی فعال</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="payment-tab" data-toggle="tab" href="#payment" role="tab" aria-controls="payment"
               aria-selected="false"> لیست پرداخت های موفق و نا موفق </a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="store-workshop" role="tabpanel" aria-labelledby="store-workshop-tab">
            <div class="setting-body">
                <form method="post" action="{{route('workshop-sign')}}" class="row pt-40px">
                    @csrf
                    <div class="input-box col-lg-4">
                        <label class="label-text">نام دوره</label>
                        <div class="form-group">
                            <select name="workshopid" class="form-control" id="workshopid">
                                <option value="">انتخاب کنید</option>
                                @foreach($workshops as $workshop)
                                    <option value="{{$workshop->id}}" selected>{{$workshop->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="input-box col-lg-4">
                        <label class="label-text">نوع استفاده</label>
                        <div class="form-group">
                            <select name="typeuse" class="form-control" id="typeuse">
                                <option value="">انتخاب کنید</option>
                                <option value="1" selected>حضوری</option>
                                <option value="2">مجازی</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-box col-lg-4">
                        <label class="label-text">دریافت گواهی شرکت در دوره</label>
                        <div class="form-group">
                            <select name="certificate" class="form-control" id="certificate">
                                <option value="">انتخاب کنید</option>
                                <option value="1">نیاز به گواهی دوره</option>
                                <option value="0">عدم نیاز به گواهی دوره</option>
{{--                                <option value="0" selected>دوره فاقد گواهی می باشد</option>--}}
                            </select>
                        </div>
                    </div>
                    <style>
                        .hidden {display: none;}
                    </style>
                    <div class="input-box col-lg-4 hidden" id="inputFields1">
                        <label class="label-text">کد ملی</label>
                        <div class="form-group">
                            <input type="text" name="national_id" id="national_id" value="{{\Illuminate\Support\Facades\Auth::user()->national_id}}" class="form-control">
                        </div>
                    </div>
                    <div class="input-box col-lg-4 hidden" id="inputFields2">
                        <label class="label-text">نام پدر</label>
                        <div class="form-group">
                            <input type="text" name="father_name" id="father_name" value="{{\Illuminate\Support\Facades\Auth::user()->father_name}}" class="form-control">
                        </div>
                    </div>
                    <div class="input-box col-lg-4 hidden" id="inputFields3">
                        <label for="birthday" class="label-text">تاریخ تولد</label>
                        <div class="form-group">
                            <input name="birthday" id="birthday" class="form-control" style="direction: ltr" placeholder="1370/01/01">
                        </div>
                    </div>
                    <div class="input-box col-lg-12 py-2">
                        <button type="submit" class="btn theme-btn">ثبت و پرداخت</button>
                    </div>
                </form>
                <div class="table-responsive mb-5">
                    <table class="table generic-table">
                        <thead>
                        <tr>
                            <th scope="col"> ردیف</th>
                            <th scope="col">نام دوره</th>
                            <th scope="col">تاریخ دوره</th>
                            <th scope="col">نوع حضور</th>
                            <th scope="col">مبلغ پرداخت</th>
                            <th scope="col">وضعیت پرداخت</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($invoices as $invoice)
                            <tr>
                                <td>
                                    <ul class="generic-list-item">
                                        <li>{{$loop->iteration}}</li>
                                    </ul>
                                </td>
                                <td>
                                    <ul class="generic-list-item">
                                        <li>{{$invoice->title}}</li>
                                    </ul>
                                </td>
                                <td>
                                    <ul class="generic-list-item">
                                        <li>{{$invoice->date}}</li>
                                    </ul>
                                </td>
                                <td>
                                    <ul class="generic-list-item">
                                        @if($invoice->typeuse == 1)
                                            <button class="btn btn-success">حضوری</button>
                                        @elseif($invoice->typeuse == 2)
                                            <button class="btn btn-warning">آنلاین</button>
                                        @endif
                                    </ul>
                                </td>
                                <td>
                                    <ul class="generic-list-item">
                                        <li>{{number_format($invoice->price)}} تومان</li>
                                    </ul>
                                </td>
                                <td>
                                    <ul class="generic-list-item">
                                        <li>
                                            @if($invoice->price_status == 4)
                                                <button class="btn btn-success">پرداخت موفق</button>
                                            @elseif($invoice->price_status == null)
                                                <button class="btn btn-danger">پرداخت ناموفق</button>
                                            @endif
                                        </li>
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
                <form method="post" action="{{route('bank-payment')}}" class="row">
                    @csrf
                    <h3 class="fs-17 font-weight-semi-bold pb-4 col-lg-12">اطلاعات واریز</h3>
                    <div class="input-box col-lg-3">
                        <label class="label-text">شماره کارت واریزی</label>
                        <div class="form-group">
                            <input class="form-control form--control" type="text" name="bank_card"
                                   style="text-align: left"/>
                        </div>
                    </div>
                    <div class="input-box col-lg-3">
                        <label class="label-text">تاریخ پرداخت</label>
                        <div class="form-group">
                            <input class="form-control form--control" type="text" name="date" style="text-align: left"/>
                        </div>
                    </div>
                    <div class="input-box col-lg-3">
                        <label class="label-text">مبلغ پرداخت</label>
                        <div class="form-group">
                            <input class="form-control form--control" type="text" name="amount"
                                   style="text-align: left"/>
                        </div>
                    </div>
                    <div class="input-box col-lg-3">
                        <label class="label-text">علت پرداخت</label>
                        <div class="form-group">
                            <input class="form-control form--control" type="text" name="description"
                                   style="text-align: left"/>
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
                            <th scope="col">عنوان دوره آموزشی</th>
                            <th scope="col">مبلغ پرداخت</th>
                            <th scope="col">تاریخ دوره آموزشی</th>
                            <th scope="col">وضعیت پرداخت</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($workshoppays as $workshoppay)
                            <tr>
                                <td>
                                    <ul class="generic-list-item">
                                        <li>{{$loop->iteration}}</li>
                                    </ul>
                                </td>
                                <td>
                                    <ul class="generic-list-item">
                                        <li>{{$workshoppay->title}}</li>
                                    </ul>
                                </td>
                                <td>
                                    <ul class="generic-list-item">
                                        <li>{{number_format($workshoppay->price)}} تومان</li>
                                    </ul>
                                </td>
                                <td>
                                    <ul class="generic-list-item">
                                        <li>{{$workshoppay->date}}</li>
                                    </ul>
                                </td>
                                <td>
                                    <ul class="generic-list-item">
                                        <li>
                                            @if($workshoppay->pricestatus == 4)
                                                <button class="btn btn-success">پرداخت موفق</button>
                                            @elseif($workshoppay->pricestatus == null)
                                                <button class="btn btn-danger">پرداخت ناموفق</button>
                                            @endif
                                        </li>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/persian-datepicker/dist/css/persian-datepicker.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/persian-datepicker/dist/js/persian-datepicker.min.js"></script>
    <script>
        $(document).ready(function () {
            // فعال‌سازی تاریخ‌شمار فارسی
            $('#birthday').persianDatepicker({
                format: 'YYYY/MM/DD', // فرمت تاریخ
                initialValue: false,   // مقدار اولیه
                autoClose: true,      // بستن خودکار پس از انتخاب تاریخ
                calendarType: 'persian', // تقویم شمسی
                navigator: {
                    enabled: true, // فعال‌سازی ناوبری ماه و سال
                },
                toolbox: {
                    calendarSwitch: {
                        enabled: false // غیرفعال کردن تغییر تقویم
                    }
                },
                theme: {
                    selected: "font-family: 'Pinar-FD', sans-serif;"
                }
            });

            // منطق نمایش/پنهان کردن فیلدها
            const selectOption = $('#certificate');
            const inputFields1 = $('#inputFields1');
            const inputFields2 = $('#inputFields2');
            const inputFields3 = $('#inputFields3');

            selectOption.on('change', function () {
                if ($(this).val() === '1') {
                    inputFields1.removeClass('hidden');
                    inputFields2.removeClass('hidden');
                    inputFields3.removeClass('hidden');
                } else {
                    inputFields1.addClass('hidden');
                    inputFields2.addClass('hidden');
                    inputFields3.addClass('hidden');
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/persian-date@1.1.0/dist/persian-date.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/persian-datepicker@1.2.0/dist/js/persian-datepicker.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#date-input').persianDatepicker({
                format: 'YYYY/MM/DD', // فرمت مورد نیاز شما
                initialValue: false,
                // سایر تنظیمات مورد نیاز
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
@endsection
