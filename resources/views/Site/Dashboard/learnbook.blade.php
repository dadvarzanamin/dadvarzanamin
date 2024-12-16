@extends('admin')
@section('style')
    <title>جزوات آموزشی</title>
@endsection
@section('main')
    @include('sweetalert::alert')
    <div class="dashboard-heading mb-5">
        <h3 class="fs-22 font-weight-semi-bold">جزوات آموزشی</h3>
    </div>
    {{--    <ul class="nav nav-tabs generic-tab pb-30px" id="myTab" role="tablist">--}}
    {{--        <li class="nav-item">--}}
    {{--            <a class="nav-link active" id="edit-profile-tab" data-toggle="tab" href="#store-workshop" role="tab" aria-controls="store-workshop" aria-selected="false">ثبت نام کارگاه و دوره آموزشی فعال</a>--}}
    {{--        </li>--}}
    {{--        <li class="nav-item">--}}
    {{--            <a class="nav-link" id="payment-tab" data-toggle="tab" href="#payment" role="tab" aria-controls="payment" aria-selected="false"> لیست پرداخت های موفق و نا موفق </a>--}}
    {{--        </li>--}}
    {{--    </ul>--}}
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="store-workshop" role="tabpanel" aria-labelledby="store-workshop-tab">
            <div class="setting-body">

                <div class="table-responsive mb-5">
                    <table class="table generic-table">
                        <thead>
                        <tr>
                            <th scope="col">ردیف</th>
                            <th scope="col">نام</th>
                            <th scope="col">تصویر</th>
                            <th scope="col">فایل ضمیمه</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($learnfiles as $learnfile)
                            <tr>
                                <td>
                                    <ul class="generic-list-item">
                                        <li>{{$loop->iteration}}</li>
                                    </ul>
                                </td>
                                <td>
                                    <ul class="generic-list-item">
                                        <li>{{$learnfile->title}}</li>
                                    </ul>
                                </td>
                                <td>
                                    <ul class="generic-list-item">
                                        <li>
                                            <img src="{{asset($learnfile->image)}}" style="max-width: 100px;border-radius: 8px" alt="learn file"></li>
                                    </ul>
                                </td>
                                <td>
                                    <ul class="generic-list-item">
                                        <li>
                                            <a href="{{ asset( $learnfile->file) }}" target="_blank">
                                               دانلود
                                            </a>
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

