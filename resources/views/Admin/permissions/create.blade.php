@extends('Admin.admin')
@section('title')
    <title> ایجاد دسترسی داشبورد</title>
    <link href="{{asset('admin/assets/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/ion-rangeslider/css/ion.rangeSlider.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/ion-rangeslider/css/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet">
{{--    <link href="{{asset('admin/assets/plugins/sumoselect/sumoselect-rtl.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />--}}
    <link href="{{asset('admin/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/css-rtl/colors/default.css')}}" rel="stylesheet">
@endsection
@section('main')
    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">
                <div class="page-header">
                    <div>
                        <h2 class="main-content-title tx-24 mg-b-5">مدیریت دسترسی داشبورد</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('admin/panel')}}">صفحه اصلی</a></li>
                            <li class="breadcrumb-item"><a href="{{url('admin/permissions')}}"> مدیریت دسترسی داشبورد</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ایجاد دسترسی داشبورد</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">
                <div class="row row-sm">
                    <div class="col-lg-12 col-md-12">
                        <div class="card custom-card">
                            <div class="card-body" style="background-color: #0000000a;border-radius: 10px 10px 0px 0px;">
                                <div class="row">
                                    <div class="col"><a href="{{url()->current()}}" class="btn btn-link btn-xs">ورود اطلاعات دسترسی داشبورد</a></div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('permissions.store')}}" method="POST" id="form">
                                    <div class="row row-sm">
                                        {{csrf_field()}}
                                        <div class="col-md-12">
                                            {{-- @include('error')--}}
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">عنوان  دسترسی داشبورد</p>
                                                <input type="text" name="title" id="title" data-required="1" placeholder="عنوان دسترسی داشبورد را وارد کنید" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">ادرس  دسترسی داشبورد</p>
                                                <input type="text" name="slug" id="slug" data-required="1" placeholder="ادرس دسترسی داشبورد را وارد کنید" class="form-control" />
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
    </div>

@endsection
@section('end')
    <script src="{{asset('admin/assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/select2.js')}}"></script>
{{--    <script src="{{asset('admin/assets/plugins/perfect-scrollbar/perfect-scrollbar.min-rtl.js')}}"></script>--}}
{{--    <script src="{{asset('admin/assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>--}}
{{--    <script src="{{asset('admin/assets/plugins/bootstrap-daterangepicker/moment.min.js')}}"></script>--}}
{{--    <script src="{{asset('admin/assets/js/advanced-form-elements.js')}}"></script>--}}
{{--    <script src="{{asset('admin/assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>--}}
{{--    <script src="{{asset('admin/assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>--}}
{{--    <script src="{{asset('admin/assets/plugins/fileuploads/js/fileupload.js')}}"></script>--}}
{{--    <script src="{{asset('admin/assets/plugins/fileuploads/js/file-upload.js')}}"></script>--}}
{{--    <script src="{{asset('admin/assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>--}}
{{--    <script src="{{asset('admin/assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>--}}
{{--    <script src="{{asset('admin/assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>--}}
{{--    <script src="{{asset('admin/assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>--}}
{{--    <script src="{{asset('admin/assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>--}}
{{--    <script src="{{asset('admin/assets/plugins/telephoneinput/telephoneinput.js')}}"></script>--}}
{{--    <script src="{{asset('admin/assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script>--}}

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
                        url: "{{ route('permissions.store') }}",
                        method: 'POST',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            title   : jQuery('#title').val(),
                            slug    : jQuery('#slug').val(),
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

