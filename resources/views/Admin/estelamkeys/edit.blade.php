@extends('Admin.admin')
@section('title')
    <title> ویرایش کلید </title>
    <link href="{{asset('admin/assets/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/ion-rangeslider/css/ion.rangeSlider.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/ion-rangeslider/css/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                                    <div class="col"><a href="{{url()->current()}}" class="btn btn-link btn-xs">ویرایش کلید</a></div>
                                    <div class="col text-left"><a href="{{url(request()->segment(1).'/'.request()->segment(2))}}" class="btn btn-link btn-xs">بازگشت</a></div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{route(request()->segment(2).'.update', $estelams->id)}}" method="POST">
                                    <div class="row row-sm">
                                        {{csrf_field()}}
                                        {{ method_field('PATCH') }}
                                        <div class="col-md-12">
{{--                                               @include('error')--}}
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <p class="mg-b-10">کلید بروزرسانی</p>
                                                <textarea name="refreshtoken" id="refreshtoken" cols="30" rows="10" style="direction: ltr" class="form-control">{{$estelams->refreshtoken}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <p class="mg-b-10">کلید اصلی</p>
                                                <textarea name="token" id="token" cols="30" rows="10" style="direction: ltr" class="form-control">{{$estelams->token}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <p class="mg-b-10">تاریخ انقضا</p>
                                                <input type="text" name="exptime" id="exptime" style="direction: ltr" value="{{$estelams->exptime}}" class="form-control" />
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
                jQuery.ajax({
                    url: "{{ route(request()->segment(2).'.update' , $estelams->id) }}",
                    method: 'PATCH',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        // menu_id     : jQuery('#menu_id').val(),
                        refreshtoken: jQuery('#refreshtoken').val(),
                        token       : jQuery('#token').val(),
                        exptime     : jQuery('#exptime').val(),

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

