@extends('Admin.admin')
@section('title')
    <title>{{$thispage['title']}}</title>
    <link href="{{asset('admin/assets/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/ion-rangeslider/css/ion.rangeSlider.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/ion-rangeslider/css/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/sumoselect/sumoselect-rtl.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/css-rtl/colors/default.css')}}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('main')
    @include('sweetalert::alert')
    <div class="main-content side-content pt-20">
        <div class="container-fluid">
            <div class="inner-body">
                <div class="row row-sm">
                    <div class="col-lg-12 col-md-12">
                        <div class="card custom-card">
                            <div class="card-body" style="background-color: #0000000a;border-radius: 10px 10px 0px 0px;">
                                <div class="row">
                                    <div class="col"><a href="{{url()->current()}}" class="btn btn-link btn-xs">{{$thispage['title']}}</a></div>
                                    <div class="col text-left"><a href="{{url(request()->segment(1).'/'.request()->segment(2))}}" class="btn btn-link btn-xs">بازگشت</a></div>
                                </div>
                            </div>
                            <div class="card-body">
                                    <form action="{{route(request()->segment(2).'.update', $companies->id)}}" method="POST" enctype="multipart/form-data">
                                        <div class="row row-sm">
                                            {{csrf_field()}}
                                            {{ method_field('PATCH') }}

                                            <div class="col-md-12">
{{--                                                @include('error')--}}
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">نام موسسه/شرکت</p>
                                                    <input type="text" name="title" id="title" value="{{$companies->title}}"  class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">شماره تلفن موسسه/شرکت</p>
                                                    <input type="text" name="tel" id="tel"  value="{{$companies->tel}}" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">شماره تلفن2</p>
                                                    <input type="text" name="tel2" id="tel2"  value="{{$companies->tel2}}" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">شماره نمابر موسسه/شرکت</p>
                                                    <input type="text" name="tel3" id="tel3"  value="{{$companies->tel3}}" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">شماره موبایل</p>
                                                    <input type="text" name="mobile" id="mobile"  value="{{$companies->mobile}}" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">ایمیل موسسه/شرکت</p>
                                                    <input type="text" name="email" id="email"  value="{{$companies->email}}" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">نام مدیرعامل موسسه/شرکت</p>
                                                    <input type="text" name="ceo" id="ceo"  value="{{$companies->ceo}}"  class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">کد ملی موسسه/شرکت</p>
                                                    <input type="text" name="meli_code" id="meli_code"  value="{{$companies->meli_code}}" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">کد اقتصادی موسسه/شرکت</p>
                                                    <input type="text" name="eghtesadi_code" id="eghtesadi_code"  value="{{$companies->eghtesadi_code}}" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">تاریخ ثبت موسسه/شرکت</p>
                                                    <input type="text" name="date_sabt" id="date_sabt"  value="{{$companies->date_sabt}}" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">پیج اینستاگرام موسسه/شرکت</p>
                                                    <input type="text" name="insta" id="insta"  value="{{$companies->insta}}" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">کانال تلگرام موسسه/شرکت</p>
                                                    <input type="text" name="telegram" id="telegram"  value="{{$companies->telegram}}" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">پیج فیس بوک موسسه/شرکت</p>
                                                    <input type="text" name="facebook" id="facebook"  value="{{$companies->facebook}}" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">پیج لینکداین موسسه/شرکت</p>
                                                    <input type="text" name="linkedin" id="linkedin" value="{{$companies->linkedin}}"  class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">تصویر موسسه/شرکت</p>
                                                    <input type="file" id="image" name="image" class="dropify" data-default-file="{{asset($companies->image)}}" data-height="200">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">آدرس موسسه/شرکت</p>
                                                    <textarea name="address" id="address" cols="30" rows="9" class="form-control">{{$companies->address}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mg-b-10 text-center">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-info  btn-lg m-r-20">ذخیره اطلاعات</button>
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
</div>

@endsection
@section('end')
    <script src="{{asset('admin/assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/select2.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/perfect-scrollbar/perfect-scrollbar.min-rtl.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/bootstrap-daterangepicker/moment.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/advanced-form-elements.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/fileuploads/js/fileupload.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/fileuploads/js/file-upload.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>
{{--    <script>--}}
{{--        jQuery(document).ready(function(){--}}
{{--            jQuery('#submit').click(function(e){--}}
{{--                e.preventDefault();--}}
{{--                $.ajaxSetup({--}}
{{--                    headers: {--}}
{{--                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')--}}
{{--                    }--}}
{{--                });--}}
{{--                jQuery.ajax({--}}
{{--                    url: "{{ route(request()->segment(2).'.update' , $companies->id) }}",--}}
{{--                    method: 'PATCH',--}}
{{--                    data: {--}}
{{--                        _token         : jQuery('input[name="_token"]').val(),--}}
{{--                        title          : jQuery('#title').val(),--}}
{{--                        tel            : jQuery('#tel').val(),--}}
{{--                        tel2           : jQuery('#tel2').val(),--}}
{{--                        tel3           : jQuery('#tel3').val(),--}}
{{--                        mobile         : jQuery('#mobile').val(),--}}
{{--                        email          : jQuery('#email').val(),--}}
{{--                        ceo            : jQuery('#ceo').val(),--}}
{{--                        meli_code      : jQuery('#meli_code').val(),--}}
{{--                        eghtesadi_code : jQuery('#eghtesadi_code').val(),--}}
{{--                        date_sabt      : jQuery('#date_sabt').val(),--}}
{{--                        address        : jQuery('#address').val(),--}}
{{--                        insta          : jQuery('#insta').val(),--}}
{{--                        telegram       : jQuery('#telegram').val(),--}}
{{--                        facebook       : jQuery('#facebook').val(),--}}
{{--                        linkedin       : jQuery('#linkedin').val(),--}}
{{--                        image          : jQuery('#image')[0].files[0],--}}
{{--                    },--}}
{{--                    success: function (data) {--}}
{{--                        swal(data.subject, data.message, data.flag);--}}
{{--                    },--}}
{{--                    error: function (data) {--}}
{{--                        swal(data.subject, data.message, data.flag);--}}
{{--                    }--}}
{{--                });--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
@endsection

