@extends('admin')
@section('style')
    <title>کارگاه و دوره های آموزشی</title>
@endsection
@section('main')
    @include('sweetalert::alert')
    <div class="dashboard-heading mb-5">
        <h3 class="fs-22 font-weight-semi-bold">کارگاه و دوره های آموزشی</h3>
    </div>
    <ul class="nav nav-tabs generic-tab pb-30px" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="edit-profile-tab" data-toggle="tab" href="#store-workshop" role="tab" aria-controls="store-workshop" aria-selected="false">ثبت نام کارگاه و دوره آموزشی فعال</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="payment-tab" data-toggle="tab" href="#payment" role="tab" aria-controls="payment" aria-selected="false"> لیست پرداخت های موفق و نا موفق </a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="store-workshop" role="tabpanel" aria-labelledby="store-workshop-tab">
            <div class="setting-body">
                <form method="post" action="{{route('workshop-sign')}}" class="row pt-40px" enctype="multipart/form-data">
                    @csrf
                    <div class="input-box col-lg-3">
                        <label class="label-text">نام دوره</label>
                        <div class="form-group">
                            <select name="workshopid" class="form-control" id="workshopid">
                                <option value="">انتخاب کنید</option>
                                @foreach($workshops as $workshop)
                                    <option value="{{$workshop->id}}">{{$workshop->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="input-box col-lg-3">
                        <label class="label-text">نوع استفاده</label>
                        <div class="form-group">
                            <select name="typeuse" class="form-control" id="typeuse">
                                <option value="">انتخاب کنید</option>
                                <option value="1">حضوری</option>
                                <option value="2">مجازی</option>
                            </select>
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
                        @foreach($workshopsigns as $workshopsign)
                            <tr>
                                <td>
                                    <ul class="generic-list-item">
                                        <li>{{$loop->iteration}}</li>
                                    </ul>
                                </td>
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
                                            <button class="btn btn-success">حضوری</button>
                                        @elseif($workshopsign->typeuse == 2)
                                            <button class="btn btn-danger">آنلاین</button>
                                        @endif
                                    </ul>
                                </td>
                                <td>
                                    <ul class="generic-list-item">
                                        <li>{{number_format($workshopsign->price)}} تومان </li>
                                    </ul>
                                </td>
                                <td>
                                    <ul class="generic-list-item">
                                        <li>
                                            @if($workshopsign->pricestatus == 4)
                                                <button class="btn btn-success">پرداخت موفق</button>
                                            @elseif($workshopsign->pricestatus == null)
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
                                        <li>{{number_format($workshoppay->price)}} تومان </li>
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
