@extends('Admin.admin')
@section('title')
    <title>{{$thispage['edit_title']}}</title>
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
                                        <div class="col"><a href="{{url()->current()}}" class="btn btn-link btn-xs">{{$thispage['edit_title']}}</a></div>
                                        <div class="col text-left"><a href="{{url(request()->segment(1).'/'.request()->segment(2))}}" class="btn btn-link btn-xs">بازگشت</a></div>
                                    </div>
                                </div>
                            <div class="card-body">
                                <form action="{{route(request()->segment(2).'.'.'update', $submenus->id)}}" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    {{ method_field('PATCH') }}
                                    <div class="row row-sm">
                                        <div class="col-md-12">
                                            {{--@include('error')--}}
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">عنوان منو سایت</p>
                                                <input type="text" name="title" id="title" value="{{$submenus->title}}" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">انتخاب منو</p>
                                                <select name="menu_id" id="menu_id" class="form-control select-lg select2">
                                                    <option value="">انتخاب منو</option>
                                                    @foreach($menus as $menu)
                                                        <option value="{{$menu->id}}" {{$menu->id == $submenus->menu_id ? 'selected' : ''}}>{{$menu->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">عنوان تب منو سایت</p>
                                                <input type="text" name="tab_title" id="tab_title" value="{{$submenus->tab_title}}" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">عنوان صفحه سایت</p>
                                                <input type="text" name="page_title" id="page_title" value="{{$submenus->page_title}}" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">نمایش/عدم نمایش</p>
                                                <select name="status" id="status" class="form-control select2">
                                                    <option value="4" {{$submenus->status == '4' ? 'selected' : ''}}>فعال</option>
                                                    <option value="0" {{$submenus->status == '0' ? 'selected' : ''}}>غیر فعال</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <p class="mg-b-10">انتخاب مگامنو</p>
                                                <select name="megamenu_id" id="megamenu_id" class="form-control select-lg select2">
                                                    <option value="">انتخاب مگامنو</option>
                                                    @foreach($megamenus as $megamenu)
                                                        <option value="{{$megamenu->id}}" {{$megamenu->id == $submenus->megamenu_id ? 'selected' : ''}}>{{$megamenu->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10"> نمایش در فوتر</p>
                                                <select name="footer_show" id="footer_show" class="form-control select2">
                                                    <option value="1" {{$submenus->footer_show == 1 ? 'selected' : ''}}>بله</option>
                                                    <option value="0" {{$submenus->footer_show == 0 ? 'selected' : ''}}>خیر</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">تصویر خدمات</p>
                                                <input type="file" name="image" id="image" class="dropify" data-height="200">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <p class="mg-b-10">کلمات کلیدی</p>
                                                <input type="text" name="keyword" id="keyword" @if($submenus->keyword)value="{{implode("،" , json_decode($submenus->keyword))}}" @endif class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <p class="mg-b-10">توضیحات</p>
                                                <textarea name="page_description" id="page_description" class="form-control" cols="30" rows="4">{{$submenus->page_description}}</textarea>
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
                    url: "{{route(request()->segment(2).'.'.'update', $submenus->id)}}",
                    method: 'PATCH',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        title            : jQuery('#title').val(),
                        menu_id          : jQuery('#menu_id').val(),
                        tab_title        : jQuery('#tab_title').val(),
                        megamenu_id      : jQuery('#megamenu_id').val(),
                        page_title       : jQuery('#page_title').val(),
                        keyword          : jQuery('#keyword').val(),
                        status           : jQuery('#status').val(),
                        footer_show      : jQuery('#footer_show').val(),
                        page_description : jQuery('#page_description').val(),
                        image            : jQuery('#image')[0].files[0],
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
