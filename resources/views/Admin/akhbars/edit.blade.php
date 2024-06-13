@extends('Admin.admin')
@section('title')
    <title>{{$thispage['edit_title']}}</title>
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
                                    <div class="col"><a href="{{url()->current()}}" class="btn btn-link btn-xs">{{$thispage['edit_title']}}</a></div>
                                    <div class="col text-left"><a href="{{url(request()->segment(1).'/'.request()->segment(2))}}" class="btn btn-link btn-xs">بازگشت</a></div>
                                </div>
                            </div>
                            <div class="card-body">
                                    <form action="{{route(request()->segment(2).'.'.'update', $akhbars->id)}}" method="post" enctype="multipart/form-data">
                                        <div class="row row-sm">
                                            {{csrf_field()}}
                                            {{ method_field('PATCH') }}
                                            <div class="col-md-12">
{{--                                                @include('error')--}}
                                            </div>
                                            <input type="hidden" name="customer_id" id="customer_id" data-required="1" value="{{$akhbars->id}}" class="form-control" />
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">عنوان خبر</p>
                                                    <input type="text" name="title" id="title" value="{{$akhbars->title}}"  class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10"> نمایش در صفحه اصلی</p>
                                                    <select name="homeshow" id="homeshow" class="form-control select-lg select2">
                                                        <option value="0" {{$akhbars->home_show == 0 ? 'selected' : '' }}>عدم نمایش</option>
                                                        <option value="1" {{$akhbars->home_show == 1 ? 'selected' : '' }}>در حال نمایش</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">انتخاب وضعیت نمایش</p>
                                                    <select name="status" id="status" class="form-control select-lg select2">
                                                        <option value="0" {{$akhbars->status == 0 ? 'selected' : '' }}>غیر فعال</option>
                                                        <option value="4" {{$akhbars->status == 4 ? 'selected' : '' }}> فعال</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3" >
                                                <div class="form-group" >
                                                    <p class="mg-b-10">تصویر خبر</p>
                                                    <input type="file" id="image" name="image" class="dropify" data-default-file="{{asset($akhbars->image)}}" data-height="200">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <p class="mg-b-10">کلمات کلیدی</p>
                                                    <input type="text" name="keyword" id="keyword" @if($akhbars->keyword)value="{{implode("،" , json_decode($akhbars->keyword))}}" @endif class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group" >
                                                    <p class="mg-b-10"> توضیحات</p>
                                                    <textarea name="description" id="editor" cols="30" rows="5" class="form-control" >{{$akhbars->description}}</textarea>
                                                </div>
                                            </div>
                                            <div  class="col-lg-12 mg-b-10 text-center">
                                                <div class="form-group">
                                                    <button type="submit"  class="btn btn-info  btn-lg m-r-20">ذخیره اطلاعات</button>
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
    <script src="{{asset('admin/assets/plugins/ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace( 'editor' );
    </script>

@endsection
