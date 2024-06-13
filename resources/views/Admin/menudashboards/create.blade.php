@extends('Admin.admin')
@section('title')
    <title> ایجاد منو داشبورد</title>
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
                                    <div class="col"><a href="{{url()->current()}}" class="btn btn-link btn-xs">ورود اطلاعات منو داشبورد</a></div>
                                    <div class="col text-left"><a href="{{url(request()->segment(1).'/'.request()->segment(2))}}" class="btn btn-link btn-xs">بازگشت</a></div>

                                </div>
                            </div>
                                <div class="card-body">
                                <form action="{{route(request()->segment(2).'.'.'store')}}" id="form" method="POST">
                                    <div class="row row-sm">
                                        {{csrf_field()}}
                                        <div class="col-md-12">
                                           {{-- @include('error')--}}
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">نام  منو داشبورد</p>
                                                <input type="text" name="title" id="title" data-required="1" placeholder="نام منو داشبورد را وارد کنید" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">لیبل  منو داشبورد</p>
                                                <input type="text" name="label" id="label" data-required="1" placeholder="لیبل منو داشبورد را وارد کنید" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">ایکون  منو داشبورد</p>
                                                <input type="text" name="icon" id="icon" data-required="1" placeholder="ایکون منو داشبورد را وارد کنید" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">زیر  منو داشبورد</p>
                                                <select name="submenu" id="submenu" class="form-control">
                                                    <option value="1" selected>دارد</option>
                                                    <option value="0">ندارد</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">کلاس داشبورد</p>
                                                <input type="text" name="class" id="class" data-required="1" placeholder="کلاس منو داشبورد را وارد کنید" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">کنترلر داشبورد</p>
                                                <input type="text" name="controller" id="controller" data-required="1" placeholder="کلاس منو داشبورد را وارد کنید" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">نمایش/عدم نمایش</p>
                                                <select name="status" id="status" class="form-control">
                                                    <option value="4" >نمایش</option>
                                                    <option value="0" >عدم نمایش</option>
                                                </select>
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
                swal({
                        title: "Are you sure to delete this  of ?",
                        text: "Delete Confirmation?",
                        type: "warning",
                        showCancelButton: false,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Delete",
                        closeOnConfirm: false
                    },
                jQuery.ajax({
                    url: "{{route(request()->segment(2).'.'.'store')}}",
                    method: 'POST',
                    data: {
                        "_token"    : "{{ csrf_token() }}",
                        title       : jQuery('#title').val(),
                        label       : jQuery('#label').val(),
                        icon        : jQuery('#icon').val(),
                        class       : jQuery('#class').val(),
                        controller  : jQuery('#controller').val(),
                        submenu     : jQuery('#submenu').val(),
                        status      : jQuery('#status').val()
                    },
                    success: function (data) {
                        if(data.success == true){
                            swal(data.subject, data.message, data.flag);
                            $('#form')[0].reset();
                        } else {
                            swal(data.subject, data.message, data.flag);
                        }
                    },
                }));
            });
        });
    </script>
@endsection

