@extends('Admin.admin')
@section('title')
    <title> ویرایش  قرارداد </title>
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
                                    <div class="col"><a href="{{url()->current()}}" class="btn btn-link btn-xs">ویرایش اطلاعات کارگاه</a></div>
                                    <div class="col text-left"><a href="{{url(request()->segment(1).'/'.request()->segment(2))}}" class="btn btn-link btn-xs">بازگشت</a></div>
                                </div>
                            </div>
                            <div class="card-body">
                                    <form action="{{route(request()->segment(2).'.'.'update', $contracts->id)}}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        {{method_field('PATCH')}}
                                        <div class="row row-sm">
                                            <div class="col-md-12">
{{--                                                @include('error')--}}
                                            </div>
                                            <input type="hidden" name="id" id="id" value="{{$contracts->id}}" class="form-control" />
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">عنوان قرارداد</p>
                                                    <input type="text" name="title" id="title" value="{{$contracts->title}}" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">قیمت قرارداد(تومان)</p>
                                                    <input type="text" name="price" id="price" value="{{$contracts->price}}" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">قیمت با تخفیف قرارداد(تومان)</p>
                                                    <input type="text" name="discount" id="discount" value="{{$contracts->discount}}" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">نوع قرارداد</p>
                                                    <select name="type" id="type" multiple="multiple" class="form-control select-lg select2">
                                                        <option value="">انتخاب نوع قرارداد</option>
                                                        <option value="1" {{ in_array('1', json_decode($contracts->type, true) ?? []) ? 'selected' : '' }}>>پیمانکاری</option>
                                                        <option value="2" {{ in_array('2', json_decode($contracts->type, true) ?? []) ? 'selected' : '' }}>فرانچایز</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">نوع هزینه</p>
                                                    <select name="paid_type" id="paid_type" class="form-control select-lg select2">
                                                        <option value="">انتخاب نوع قرارداد</option>
                                                        <option value="free" {{$contracts->paid_type     == 'free'     ? 'selected' : ''}}>رایگان</option>
                                                        <option value="nonefree" {{$contracts->paid_type == 'nonefree' ? 'selected' : ''}}>غیر رایگان</option>
                                                        <option value="vip" {{$contracts->paid_type      == 'vip'      ? 'selected' : ''}}>کاربران ویژه</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">انتخاب وضعیت نمایش</p>
                                                    <select name="status" id="status" class="form-control select-lg select2">
                                                        <option value="4" {{$contracts->status == 4 ? 'selected' : '' }}> فعال</option>
                                                        <option value="0" {{$contracts->status == 0 ? 'selected' : '' }}>غیر فعال</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">فایل قرارداد</p>
                                                    <input type="file" name="file_path" id="file_path" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group" style="position: absolute;">
                                                    <p class="mg-b-10">تصویر بنر قرارداد</p>
                                                    <input type="file" name="image" id="image" class="dropify" data-default-file="{{asset($contracts->image)}}" data-height="200">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group" style="margin-top: 150px;">
                                                    <p class="mg-b-10">درباره قرارداد</p>
                                                    <textarea name="description" id="editor" cols="30" rows="5" class="form-control" >{{$contracts->description}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group" style="margin-top: 65px;">
                                                    <p class="mg-b-10">مشخصات و توضیحات قرارداد</p>
                                                    <textarea name="text" id="editor2" cols="30" rows="5" class="form-control">{{$contracts->text}}</textarea>
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
        CKEDITOR.replace( 'editor2' );
    </script>
@endsection

