@extends('Admin.admin')
@section('title')
    <title>{{$thispage['title']}}</title>
    <link href="{{asset('admin/assets/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/ion-rangeslider/css/ion.rangeSlider.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/ion-rangeslider/css/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
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
                                    <div class="col"><a href="{{url()->current()}}" class="btn btn-link btn-xs">{{$thispage['title']}}</a></div>
                                    <div class="col text-left"><a href="{{url(request()->segment(1).'/'.request()->segment(2))}}" class="btn btn-link btn-xs">بازگشت</a></div>

                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{route(request()->segment(2).'.'.'store')}}" method="POST" enctype="multipart/form-data" id="form">
                                    <div class="row row-sm">
                                        {{csrf_field()}}
                                        <div class="col-md-12">
{{--                                            @include('error')--}}
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">نام موسسه/شرکت</p>
                                                <input type="text" name="title" id="title" placeholder="عنوان برند را وارد کنید" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">شماره تلفن موسسه/شرکت</p>
                                                <input type="text" name="tel" id="tel" placeholder="شماره تلفن را وارد کنید" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">شماره تلفن2</p>
                                                <input type="text" name="tel2" id="tel2" placeholder="شماره تلفن را وارد کنید" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">شماره نمابر موسسه/شرکت</p>
                                                <input type="text" name="tel3" id="tel3" placeholder="شماره نمابر را وارد کنید" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">شماره موبایل</p>
                                                <input type="text" name="mobile" id="mobile" placeholder="شماره موبایل را وارد کنید" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">ایمیل موسسه/شرکت</p>
                                                <input type="text" name="email" id="email" placeholder="ایمیل را وارد کنید" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">نام مدیرعامل موسسه/شرکت</p>
                                                <input type="text" name="ceo" id="ceo" placeholder="نام مدیرعامل را وارد کنید" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">کد ملی موسسه/شرکت</p>
                                                <input type="text" name="meli_code" id="meli_code" placeholder="کد ملی را وارد کنید" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">کد اقتصادی موسسه/شرکت</p>
                                                <input type="text" name="eghtesadi_code" id="eghtesadi_code" placeholder="کد اقتصادی را وارد کنید" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">تاریخ ثبت موسسه/شرکت</p>
                                                <input type="text" name="date_sabt" id="date_sabt" placeholder="تاریخ ثبت را وارد کنید" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">پیج اینستاگرام موسسه/شرکت</p>
                                                <input type="text" name="insta" id="insta" placeholder="پیج اینستاگرام را وارد کنید" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">کانال تلگرام موسسه/شرکت</p>
                                                <input type="text" name="telegram" id="telegram" placeholder="کانال تلگرام را وارد کنید" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">پیج فیس بوک موسسه/شرکت</p>
                                                <input type="text" name="facebook" id="facebook" placeholder="پیج فیس بوک را وارد کنید" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">پیج لینکداین موسسه/شرکت</p>
                                                <input type="text" name="linkedin" id="linkedin" placeholder="پیج لینکداین را وارد کنید" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">تصویر موسسه/شرکت</p>
                                                <input type="file" name="file_link" id="file_link" class="dropify" data-height="200">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">آدرس موسسه/شرکت</p>
                                                <textarea name="address" id="address" cols="30" rows="9" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mg-b-10 text-center">
                                            <div class="form-group">
                                                <button type="button" id="submit" class="btn btn-info  btn-lg m-r-20">ذخیره اطلاعات</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
{{--                                <div class="mg-t-10">--}}
{{--                                    <input id="demo" type="file" name="files" accept=".jpg, .png, image/jpeg, image/png," multiple="">--}}
{{--                                </div>--}}
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
    <script>
        jQuery(document).ready(function(){
            jQuery('#submit').click(function(e){
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    contentType : false,
                    processData : false,
                });

                let    _token         = jQuery('input[name="_token"]').val();
                let    title          = jQuery('#title').val();
                let    tel            = jQuery('#tel').val();
                let    tel2           = jQuery('#tel2').val();
                let    tel3           = jQuery('#tel3').val();
                let    mobile         = jQuery('#mobile').val();
                let    email          = jQuery('#email').val();
                let    ceo            = jQuery('#ceo').val();
                let    meli_code      = jQuery('#meli_code').val();
                let    eghtesadi_code = jQuery('#eghtesadi_code').val();
                let    date_sabt      = jQuery('#date_sabt').val();
                let    address        = jQuery('#address').val();
                let    insta          = jQuery('#insta').val();
                let    telegram       = jQuery('#telegram').val();
                let    facebook       = jQuery('#facebook').val();
                let    linkedin       = jQuery('#linkedin').val();
                let    file_link      = jQuery('#file_link')[0].files[0];

                let formData = new FormData();
                formData.append('title'         , title);
                formData.append('tel'           , tel);
                formData.append('tel2'          , tel2);
                formData.append('tel3'          , tel3);
                formData.append('mobile'        , mobile);
                formData.append('email'         , email);
                formData.append('ceo'           , ceo);
                formData.append('meli_code'     , meli_code);
                formData.append('eghtesadi_code', eghtesadi_code);
                formData.append('date_sabt'     , date_sabt);
                formData.append('address'       , address);
                formData.append('insta'         , insta);
                formData.append('telegram'      , telegram);
                formData.append('facebook'      , facebook);
                formData.append('linkedin'      , linkedin);
                formData.append('file_link'     , file_link);
                formData.append('_token'        , _token);

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
                        data: formData,

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
