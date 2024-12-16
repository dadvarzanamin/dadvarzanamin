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
    @include('sweetalert::alert')
    <div class="main-content side-content pt-20">
        <div class="container-fluid">
            <div class="inner-body">
                <div class="row row-sm">
                    <div class="col-lg-12 col-md-12">
                        <div class="card custom-card">
                            <div class="card-body" style="background-color: #0000000a;border-radius: 10px 10px 0px 0px;">
                                <div class="row">
                                    <div class="col"><a href="{{url()->current()}}" class="btn btn-link btn-xs">{{$thispage['create_title']}}</a></div>
                                    <div class="col text-left"><a href="{{url(request()->segment(1).'/'.request()->segment(2))}}" class="btn btn-link btn-xs">بازگشت</a></div>
                                </div>
                            </div>
                            <div class="card-body">
                                    <form action="{{route(request()->segment(2).'.'.'update', $medias->id)}}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        {{method_field('PATCH')}}
                                        <div class="row row-sm">
                                            <div class="col-md-12">
{{--                                                @include('error')--}}
                                            </div>
                                            <input type="hidden" name="media_id" id="media_id" data-required="1" value="{{$medias->id}}" class="form-control" />
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">تیتر</p>
                                                    <input type="text" name="title1" id="title1"  value="{{$medias->title}}"  class="form-control" />
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">انتخاب وضعیت نمایش</p>
                                                    <select name="status" id="status" class="form-control select-lg select2">
                                                        <option value="0" {{$medias->status == 0 ? 'selected' : '' }}>عدم نمایش</option>
                                                        <option value="4" {{$medias->status == 4 ? 'selected' : '' }}>در حال نمایش</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">نمایش در صفحه</p>
                                                    <select name="submenu_id" id="submenu_id" class="form-control select-lg select2">
                                                        <option value="" >انتخاب صفحه</option>
                                                        @foreach($submenus as $submenu)
                                                            <option value="{{$submenu->id}}" {{$medias->submenu_id == $submenu->id ? 'selected' : '' }}>{{$submenu->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">تصویر کاور</p>
                                                    <input type="file" name="file_link" id="file_link" class="dropify" data-default-file="{{asset('storage/'.$medias->file_link)}}" data-height="200">
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <p class="mg-b-10">کلمات کلیدی</p>
                                                    <input type="text" name="keyword" id="keyword" data-required="1" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <p class="mg-b-10">لینک آپارات</p>
                                                    <input type="text" name="aparat" id="aparat" data-required="1" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <p class="mg-b-10">فایل ویدئو</p>
                                                    <input type="file" name="file" id="file" data-required="1" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <p class="mg-b-10"> توضیحات</p>
                                                    <textarea name="text" id="editor" cols="30" rows="5" class="form-control" >{{$medias->text}}</textarea>
                                                </div>
                                            </div>

                                            <div  class="col-lg-12 mg-b-10 text-center">
                                                <div class="form-group">
                                                    <button type="submit" id="" class="btn btn-info  btn-lg m-r-20">ذخیره اطلاعات</button>
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
{{--    <script src="{{asset('admin/assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>--}}
{{--    <script src="{{asset('admin/assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>--}}
{{--    <script src="{{asset('admin/assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>--}}
    <script src="{{asset('admin/assets/plugins/ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace( 'editor' );
    </script>
@endsection

