@extends('admin')
@section('style')
    <title>ثبت پرونده</title>
    <style>
        .styled-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
            text-align: right;
            border-bottom: 1px solid #ddd;
        }
        .styled-table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .styled-table tbody tr:hover {
            background-color: #e0e0e0;
        }
        .loading-spinner {
            display: none;
            border: 4px solid rgba(0, 0, 0, 0.1);
            border-left-color: #00a0d8;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            100% {
                transform: rotate(360deg);
            }
        }
    </style>
@endsection
@section('main')
    @include('sweetalert::alert')
    <div class="dashboard-heading mb-5">
        <h3 class="fs-22 font-weight-semi-bold">پرونده های من</h3>
    </div>
    <ul class="nav nav-tabs generic-tab pb-30px" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link" id="list-tab" data-toggle="tab" href="#list" role="tab" aria-controls="create" aria-selected="false">لیست پرونده</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="create-tab" data-toggle="tab" href="#create" role="tab" aria-controls="create" aria-selected="false">ثبت پرونده</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade show active" id="list" role="tab" aria-labelledby="list-tab">
            <div class="setting-body">
                <div class="dashboard-heading mb-5">
                    <h3 class="fs-22 font-weight-semi-bold">لیست پرونده ها</h3>
                </div>
                <div class="table-responsive mb-5">
                    <table class="table generic-table">
                        <thead>
                        <tr>
                            <th scope="col"> ردیف</th>
                            <th scope="col">شناسه پرونده</th>
                            <th scope="col">نوع پرونده</th>
                            <th scope="col">نوع دعوی</th>
                            <th scope="col">وضعیت پرونده</th>
                            <th scope="col">نقش موکل</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <ul class="generic-list-item">
                                        <li>1</li>
                                    </ul>
                                </td>
                                <td>
                                    <ul class="generic-list-item">
                                        <li>235645</li>
                                    </ul>
                                </td>
                                <td>
                                    <ul class="generic-list-item">
                                        <li> خانواده</li>
                                    </ul>
                                </td>
                                <td>
                                    <ul class="generic-list-item">
                                        <li>اصلی</li>
                                    </ul>
                                </td>
                                <td>
                                    <ul class="generic-list-item">
                                        <li>
                                                <button class="btn btn-info">در جریان</button>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <ul class="generic-list-item">
                                        <li>خواهان</li>
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="create" role="tabpanel" aria-labelledby="create-tab">
            <div class="setting-body">
                <h3 class="fs-17 font-weight-semi-bold pb-4">ثبت پرونده جدید</h3>
                <form method="post" action="#" class="row pt-40px" id="form-1">
                    @csrf
                    <div class="input-box col-lg-3">
                        <label class="label-text">وضعیت پرونده</label>
                        <div class="form-group">
                            <select name="status" class="form-control" id="status">
                                <option value="">انتخاب کنید</option>
                                <option value="در دست بررسی" >در دست بررسی</option>
                                <option value="در جریان" >در جریان</option>
                                <option value="مختومه" >مختومه</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-box col-lg-3">
                        <label class="label-text">شکل پرونده</label>
                        <div class="form-group">
                            <select name="folder_shape" class="form-control" id="folder_shape">
                                <option value="">انتخاب کنید</option>
                                <option value="داخلی" >داخلی</option>
                                <option value="بین المللی" >بین المللی</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-box col-lg-3">
                        <label class="label-text">واحد پولی</label>
                        <div class="form-group">
                            <select name="unit_price" class="form-control" id="unit_price">
                                <option value="">انتخاب کنید</option>
                                <option value="ریال" >ریال</option>
                                <option value="دلار" >دلار</option>
                                <option value="یورو" >یورو</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-box col-lg-3">
                        <label class="label-text">شناسه پرونده</label>
                        <div class="form-group">
                            <input required class="form-control form--control" type="text" name="folder_id"  style="direction: rtl;text-align: left"/>
                        </div>
                    </div>
                    <div class="input-box col-lg-3">
                        <label class="label-text">نوع پرونده</label>
                        <div class="form-group">
                            <select name="folder_type" class="form-control" id="folder_type">
                                <option value="">انتخاب کنید</option>
                                <option value="حقوقی" >حقوقی</option>
                                <option value="خانواده" >خانواده</option>
                                <option value="دیوان عدالت اداری" >دیوان عدالت اداری</option>
                                <option value="شورای حل اختلاف" >شورای حل اختلاف</option>
                                <option value="کیفری" >کیفری</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-box col-lg-3">
                        <label class="label-text">شماره پرونده</label>
                        <div class="form-group">
                            <input required class="form-control form--control" type="text" name="name"  style="direction: rtl;text-align: left"/>
                        </div>
                    </div>
                    <div class="input-box col-lg-3">
                        <label class="label-text">نوع دعوی</label>
                        <div class="form-group">
                            <select name="folder_type" class="form-control" id="folder_type">
                                <option value="">انتخاب کنید</option>
                                <option value="اصلی" >اصلی</option>
                                <option value="طاری" >طاری</option>
                                <option value="اعتراضی" >اعتراضی</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-box col-lg-3">
                        <label class="label-text">مرحله ورود به پرونده</label>
                        <div class="form-group">
                            <select name="folder_type" class="form-control" id="folder_type">
                                <option value="">انتخاب کنید</option>
                                <option value="بدوی" >بدوی</option>
                                <option value="تجدید نظر" >تجدید نظر</option>
                                <option value="فرجام خواهی" >فرجام خواهی</option>
                                <option value="اجرای احکام" >اجرای احکام</option>
                                <option value="واخواهی" >واخواهی</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-box col-lg-3">
                        <label class="label-text">نقش موکل</label>
                        <div class="form-group">
                            <select name="folder_type" class="form-control" id="folder_type">
                                <option value="">انتخاب کنید</option>
                                <option value="خواهان" >خواهان</option>
                                <option value="خوانده" > خوانده</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-box col-lg-3">
                        <label class="label-text">انتخاب وکیل</label>
                        <div class="form-group">
                            <select name="folder_type" class="form-control" id="folder_type">
                                <option value="">انتخاب کنید</option>
                                <option value="محمد محمدی" >محمد محمدی</option>
                                <option value="محمد محمدی" >محمد محمدی</option>
                                <option value="محمد محمدی" >محمد محمدی</option>
                                <option value="محمد محمدی" >محمد محمدی</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-box col-lg-3">
                        <label class="label-text">انتخاب خواهان</label>
                        <div class="form-group">
                            <select name="folder_type" class="form-control" id="folder_type">
                                <option value="">انتخاب کنید</option>
                                <option value="محمد محمدی" >محمد محمدی</option>
                                <option value="محمد محمدی" >محمد محمدی</option>
                                <option value="محمد محمدی" >محمد محمدی</option>
                                <option value="محمد محمدی" >محمد محمدی</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-box col-lg-3">
                        <label class="label-text">انتخاب خوانده</label>
                        <div class="form-group">
                            <select name="folder_type" class="form-control" id="folder_type">
                                <option value="">انتخاب کنید</option>
                                <option value="محمد محمدی" >محمد محمدی</option>
                                <option value="محمد محمدی" >محمد محمدی</option>
                                <option value="محمد محمدی" >محمد محمدی</option>
                                <option value="محمد محمدی" >محمد محمدی</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-box col-lg-3">
                        <label class="label-text">شرح پرونده</label>
                        <div class="form-group">
                            <textarea required class="form-control form--control" name="description"  style="direction: rtl"></textarea>
                        </div>
                    </div>
                    <div class="input-box col-lg-12 py-2">
                        <button type="button" class="btn theme-btn send-form" data-form-id="1">
                            <span class="loading-spinner"></span>ثبت پرونده
                        </button>
                    </div>
                </form>
                <div class="section-block mb-5"></div>
                <div class="response-container" id="responseContainer1"></div>
            </div>
        </div>
    </div>

@endsection
@section('script')

@endsection
