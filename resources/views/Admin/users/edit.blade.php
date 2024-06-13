@extends('Admin.admin')
@section('title')
    <title> ویرایش کاربران</title>
    <link href="{{asset('admin/assets/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/ion-rangeslider/css/ion.rangeSlider.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/ion-rangeslider/css/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/css-rtl/colors/default.css')}}" rel="stylesheet">
@endsection
@section('main')
    <div class="main-content side-content pt-20">
        <div class="container-fluid">
            <div class="inner-body">
                <div class="row row-sm">
                    <div class="col-lg-12 col-md-12">
                        <div class="card custom-card">
                            <div class="card-body" style="background-color: #0000000a;border-radius: 10px 10px 0px 0px;">
                                <div class="row">
                                    <div class="col"><a href="{{url()->current()}}" class="btn btn-link btn-xs">ویرایش اطلاعات کاربر </a></div>
                                    <div class="col text-left"><a href="{{url(request()->segment(1).'/'.request()->segment(2))}}" class="btn btn-link btn-xs">بازگشت</a></div>
                                </div>
                            </div>
                            @foreach($users as $user)
                                <div class="card-body">
                                    <form action="{{route(request()->segment(2).'.'.'update', $user->id)}}" method="POST">
                                        {{csrf_field()}}
                                        {{ method_field('PATCH') }}
                                        <div class="row row-sm">
                                            <div class="col-md-12">
                                               {{-- @include('error')--}}
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">نام و نام خانوادگی</p>
                                                    <input type="text" name="name" id="name" data-required="1" value="{{$user->name}}" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">نام کاربری</p>
                                                    <input type="text" name="username" id="username" data-required="1" value="{{$user->username}}" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">آدرس ایمیل</p>
                                                    <input type="text" name="email" id="email" data-required="1" value="{{$user->email}}" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">موبایل</p>
                                                    <input type="text" name="mobile" id="mobile" data-required="1" value="{{$user->phone}}" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">نمایش/عدم نمایش</p>
                                                    <select name="status" id="status" class="form-control">
                                                        <option value="4" {{$user->status == '4' ? 'selected' : ''}}>نمایش</option>
                                                        <option value="0" {{$user->status == '0' ? 'selected' : ''}}>عدم نمایش</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">نوع کاربر</p>
                                                    <select name="type" id="type" class="form-control select2">
                                                        <option value="">انتخاب کنید</option>
                                                        @foreach($types as $type)
                                                            <option value="{{$type->id}}" {{$user->type_id == $type->id ? 'selected' : ''}}>{{$type->title_fa}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">رمز عبور</p>
                                                    <input type="password" name="password" id="password" data-required="1" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">تکرار رمز عبور</p>
                                                    <input type="password" name="password_confirmation" data-required="1" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mg-b-10 text-center">
                                                <div class="form-group">
                                                    <button type="button" id="submit" class="btn btn-info  btn-lg m-r-20">ذخیره اطلاعات</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection

@section('end')
    <script src="{{asset('admin/assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/select2.js')}}"></script>
    <script>
        jQuery(document).ready(function(){
            jQuery('#submit').click(function(e){
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                jQuery.ajax({
                    url: "{{route(request()->segment(2).'.'.'update', $user->id)}}",
                    method: 'PATCH',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        name        : jQuery('#name').val(),
                        username    : jQuery('#username').val(),
                        email       : jQuery('#email').val(),
                        mobile      : jQuery('#mobile').val(),
                        type        : jQuery('#type').val(),
                        password    : jQuery('#password').val(),
                    },
                    success: function (data) {
                        swal(data.subject, data.message, data.flag);
                    },
                    error: function (data) {
                        swal(data.subject, data.message, data.flag);
                    }
                });
            });
        });
    </script>
@endsection
