@extends('Admin.admin')
@section('title')
    <title> ویرایش  اسلاید ها </title>
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
                                    <div class="col"><a href="{{url()->current()}}" class="btn btn-link btn-xs">ویرایش اطلاعات اسلاید</a></div>
                                    <div class="col text-left"><a href="{{url(request()->segment(1).'/'.request()->segment(2))}}" class="btn btn-link btn-xs">بازگشت</a></div>
                                </div>
                            </div>
                            <div class="card-body">
                                    <form action="{{route(request()->segment(2).'.'.'update', $workshops->id)}}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        {{method_field('PATCH')}}
                                        <div class="row row-sm">
                                            <div class="col-md-12">
{{--                                                @include('error')--}}
                                            </div>
                                            <input type="hidden" name="id" id="id" data-required="1" value="{{$workshops->id}}" class="form-control" />
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">عنوان دوره</p>
                                                    <input type="text" name="title" id="title" value="{{$workshops->title}}" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">استاد دوره</p>
                                                    <input type="text" name="teacher" id="teacher" value="{{$workshops->teacher}}" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">قیمت دوره(تومان)</p>
                                                    <input type="text" name="price" id="price" value="{{$workshops->price}}" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">قیمت با تخفیف دوره(تومان)</p>
                                                    <input type="text" name="offer" id="offer" value="{{$workshops->offer}}" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">تاریخ برگزاری دوره</p>
                                                    <input type="text" name="date" id="date" value="{{$workshops->date}}" class="form-control" />
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">نوع برگزاری</p>
                                                    <select name="type" id="type" multiple="multiple" class="form-control select-lg select2">
                                                        <option value="">انتخاب نوع برگزاری</option>
                                                        <option value="حضوری" {{ in_array('حضوری', json_decode($workshops->type, true) ?? []) ? 'selected' : '' }}>حضوری</option>
                                                        <option value="آنلاین" {{ in_array('آنلاین', json_decode($workshops->type, true) ?? []) ? 'selected' : '' }}>آنلاین</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">انتخاب وضعیت نمایش</p>
                                                    <select name="status" id="status" class="form-control select-lg select2">
                                                        <option value="0" {{$workshops->status == 0 ? 'selected' : '' }}>غیر فعال</option>
                                                        <option value="4" {{$workshops->status == 4 ? 'selected' : '' }}>درحال ثبت نام</option>
                                                        <option value="0" {{$workshops->status == 1 ? 'selected' : '' }}>اتمام ظرفیت</option>
                                                        <option value="0" {{$workshops->status == 2 ? 'selected' : '' }}>پایان زمان ثبت نام</option>
                                                        <option value="0" {{$workshops->status == 3 ? 'selected' : '' }}>پایان دوره</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group" style="position: absolute;">
                                                    <p class="mg-b-10">تصویر بنر دوره</p>
                                                    <input type="file" name="file_link" id="file_link" class="dropify" data-default-file="{{asset('storage/'.$workshops->image)}}" data-height="200">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">مدت زمان</p>
                                                    <input type="text" name="duration" id="duration"
                                                           value="{{$workshops->duration}}"
                                                           class="form-control"/>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">سطح دوره</p>
                                                    <select name="level" id="level"
                                                            class="form-control select-lg select2">
                                                        <option value={{$workshops->level == 'مقدماتی' ? 'selected' : '' }}>مقدماتی</option>
                                                        <option value={{$workshops->level == 'متوسط' ? 'selected' : '' }}>متوسط</option>
                                                        <option value={{$workshops->level == 'پیشرفته' ? 'selected' : '' }}>پیشرفته</option>
                                                        <option value={{$workshops->level == 'همه موارد' ? 'selected' : '' }}>همه موارد</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div  class="col-md-3">
                                                <div class="form-group">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group" style="margin-top: 65px;">
                                                    <p class="mg-b-10">درباره دوره</p>
                                                    <textarea name="description" id="editor" cols="30" rows="5" class="form-control" >{{$workshops->description}}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group" style="margin-top: 65px;">
                                                    <p class="mg-b-10"> اهداف دوره</p>
                                                    <textarea name="text" id="editor2" cols="30" rows="5"
                                                              class="form-control">{{$workshops->target}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group" style="margin-top: 65px;">
                                                    <p class="mg-b-10">رزومه مدرس دوره</p>
                                                    <textarea name="text" id="editor3" cols="30" rows="5"
                                                              class="form-control">{{$workshops->teacher_resume}}</textarea>
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
        CKEDITOR.replace( 'editor3' );
    </script>
@endsection

