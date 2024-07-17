@extends('Admin.admin')
@section('title')
    <title> ایجاد ویدئو سایت </title>
    <link href="{{asset('admin/assets/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/ion-rangeslider/css/ion.rangeSlider.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/ion-rangeslider/css/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/css-rtl/colors/default.css')}}" rel="stylesheet">
@endsection
@section('main')
    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">
                <div class="page-header">
                    <div>
                        <h2 class="main-content-title tx-24 mg-b-5">مدیریت ویدئو سایت</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('admin/panel')}}">صفحه اصلی</a></li>
                            <li class="breadcrumb-item"><a href="{{url('admin/galleryvideomanage')}}">مدیریت ویدئو سایت</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ایجاد ویدئو سایت</li>
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
                                    <div class="col"><a href="{{url()->current()}}" class="btn btn-link btn-xs">ورود اطلاعات ویدئو سایت</a></div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('galleryvideomanage.store')}}" method="POST" enctype="multipart/form-data" id="form">
                                    <div class="row row-sm">
                                        @csrf
                                        <div class="col-md-12">
                                            {{--@include('error')--}}
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">عنوان</p>
                                                <input type="text" name="title" id="title"  class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <p class="mg-b-10">مورد1</p>
                                                <input type="text" name="item1" id="item1"  class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <p class="mg-b-10">مورد4</p>
                                                <input type="text" name="item4" id="item4"  class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <p class="mg-b-10">نوع مطلب</p>
                                                <input type="text" name="title_type" id="title_type"  class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <p class="mg-b-10">نمایش رایگان</p>
                                                <select name="free" id="free" class="form-control select-lg select2">
                                                    <option value="">انتخاب  کنید</option>
                                                    <option value="0">بله</option>
                                                    <option value="4">خیر</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">عنوان مطلب</p>
                                                <input type="text" name="title_text" id="title_text" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <p class="mg-b-10">مورد2</p>
                                                <input type="text" name="item2" id="item2" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <p class="mg-b-10">5مورد</p>
                                                <input type="text" name="item5" id="item5" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <p class="mg-b-10">زمان فایل</p>
                                                <input type="text" name="file_time" id="file_time" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <p class="mg-b-10">منو سایت</p>
                                                <select name="menu_id" id="menu_id" class="form-control select-lg select2">
                                                    <option value="">انتخاب منو سایت</option>
                                                    @foreach($menus as $menu)
                                                        <option value="{{$menu->id}}">{{$menu->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">انتخاب وضعیت نمایش</p>
                                                <select name="status_id" id="status_id" class="form-control select-lg select2">
                                                    <option value="0">عدم نمایش</option>
                                                    <option value="4">در حال نمایش</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <p class="mg-b-10">3مورد</p>
                                                <input type="text" name="item3" id="item3" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <p class="mg-b-10">6مورد</p>
                                                <input type="text" name="item6" id="item6" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <p class="mg-b-10">فایل ویدئو</p>
                                                <input type="file" name="file_link" id="file_link" class="form-control" data-height="200">
                                            </div>
                                            <div class="form-group">
                                                <p class="mg-b-10">زیر منو سایت</p>
                                                <select name="submenu_id" id="submenu_id" class="form-control select-lg select2">
                                                    <option value="">انتخاب زیر منو سایت</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">تصویر کاور</p>
                                                <input type="file" name="cover" id="cover" class="dropify" data-height="200">
                                            </div>
                                            <div class="form-group">
                                                <p class="mg-b-10">توضیحات</p>
                                                <textarea name="description" id="description" class="form-control" cols="30" rows="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mg-b-10 text-center">
                                            <div class="form-group">
                                                <button type="submit"  class="btn btn-info  btn-lg m-r-20">ذخیره اطلاعات</button>
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
    {{--    <script src="{{asset('admin/assets/plugins/ckeditor/ckeditor.js')}}"></script>--}}
    {{--    <script>--}}
    {{--        ClassicEditor--}}
    {{--            .create( document.querySelector( '#editor' ) )--}}
    {{--            .catch( error => {--}}
    {{--                console.error( error );--}}
    {{--            } );--}}
    {{--    </script>--}}
    <script>
        $(function(){
            $('#menu_id').change(function(){
                $("#submenu_id option").remove();
                var id = $('#menu_id').val();

                $.ajax({
                    url : '{{ route( 'getsubmenu' ) }}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },
                    type: 'post',
                    dataType: 'json',
                    success: function( result )
                    {
                        $.each( result, function(k, v) {
                            $('#submenu_id').append($('<option>', {value:k, text:v}));
                        });
                    },
                    error: function()
                    {
                        //handle errors
                        alert('error...');
                    }
                });
            });
        });
    </script>
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
                let    _token      = jQuery('input[name="_token"]').val();
                let    title       = jQuery('#title').val();
                let    title_text  = jQuery('#title_text').val();
                let    title_type  = jQuery('#title_type').val();
                let    free        = jQuery('#free').val();
                let    menu_id     = jQuery('#menu_id').val();
                let    submenu_id  = jQuery('#submenu_id').val();
                let    item1       = jQuery('#item1').val();
                let    item2       = jQuery('#item2').val();
                let    item3       = jQuery('#item3').val();
                let    item4       = jQuery('#item4').val();
                let    item5       = jQuery('#item5').val();
                let    item6       = jQuery('#item6').val();
                let    file_time   = jQuery('#file_time').val();
                let    status_id   = jQuery('#status_id').val();
                let    description = jQuery('#description').val();
                let    cover       = jQuery('#cover')[0].files[0];
                let    file_link   = jQuery('#file_link')[0].files[0];

                let formData = new FormData();
                formData.append('title'         , title);
                formData.append('title_text'    , title_text);
                formData.append('title_type'    , title_type);
                formData.append('free'          , free);
                formData.append('menu_id'       , menu_id);
                formData.append('submenu_id'    , submenu_id);
                formData.append('item1'         , item1);
                formData.append('item2'         , item2);
                formData.append('item3'         , item3);
                formData.append('item4'         , item4);
                formData.append('item5'         , item5);
                formData.append('item6'         , item6);
                formData.append('file_time'     , file_time);
                formData.append('description'   , description);
                formData.append('status_id'     , status_id);
                formData.append('file_link'     , file_link);
                formData.append('cover'         , cover);
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
                        url: "{{ route('galleryvideomanage.store') }}",
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
