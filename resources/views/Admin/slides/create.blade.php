@extends('Admin.admin')
@section('title')
    <title>{{$thispage['create_title']}}</title>
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
                                    <div class="col"><a href="{{url()->current()}}" class="btn btn-link btn-xs">{{$thispage['enter_title']}}</a></div>
                                    <div class="col text-left"><a href="{{url(request()->segment(1).'/'.request()->segment(2))}}" class="btn btn-link btn-xs">بازگشت</a></div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{route(request()->segment(2).'.'.'store')}}" method="POST" enctype="multipart/form-data" id="form">
                                    <div class="row row-sm">
                                        @csrf
                                        <div class="col-md-12">
{{--                                            @include('error')--}}
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">تیتر 1</p>
                                                <input type="text" name="title1" id="title1" placeholder="تیتر 1 را وارد کنید" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">تیتر 2</p>
                                                <input type="text" name="title2" id="title2" placeholder="تیتر 2 را وارد کنید" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">تیتر 3</p>
                                                <input type="text" name="title3" id="title3" placeholder="تیتر 3 را وارد کنید" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group" style="position: absolute;">
                                                <p class="mg-b-10">تصویر اسلاید</p>
                                                <input type="file" name="file_link" id="file_link" class="dropify" data-height="200">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">انتخاب منو</p>
                                                <select name="menu_id" id="menu_id" class="form-control select-lg select2">
                                                    <option value="">انتخاب منو</option>
                                                    @foreach($menus as $menu)
                                                        <option value="{{$menu->id}}">{{$menu->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">نمایش/عدم نمایش</p>
                                                <select name="status" id="status" class="form-control select-lg select2">
                                                    <option value="4" >نمایش</option>
                                                    <option value="0" >عدم نمایش</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div  class="col-md-3">
                                            <div class="form-group">
                                            </div>
                                        </div>
                                        <div  class="col-md-6">
                                            <div class="form-group">
                                                <p class="mg-b-10">موارد نمایش در اسلاید</p>
                                                <input type="text" name="word" id="word" class="form-control" placeholder="کلمه1 ، کلمه2 ، کلمه3 ..." />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group" style="margin-top: 65px;">
                                                <p class="mg-b-10">توضیحات</p>
                                                <textarea name="text" id="editor" cols="30" rows="5" class="form-control" ></textarea>
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
    <script src="{{asset('admin/assets/plugins/ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace( 'editor' );

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

                let    text         = CKEDITOR.instances.editor.getData();
                let    _token       = jQuery('input[name="_token"]').val();
                let    title1       = jQuery('#title1').val();
                let    title2       = jQuery('#title2').val();
                let    title3       = jQuery('#title3').val();
                let    menu_id      = jQuery('#menu_id').val();
                let    word         = jQuery('#word').val();
                let    status       = jQuery('#status').val();
                //let    editor       = jQuery('#editor').val();
                let    file_link    = jQuery('#file_link')[0].files[0];

                let formData = new FormData();
                formData.append('title1'    , title1);
                formData.append('title2'    , title2);
                formData.append('title3'    , title3);
                formData.append('menu_id'   , menu_id);
                formData.append('status'    , status);
                formData.append('text'      , text);
                formData.append('word'      , word);
                formData.append('file_link' , file_link);
                formData.append('_token'    , _token);

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
