@extends('Admin.admin')
@section('title')
    <title> ویرایش زیر منو داشبورد</title>
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

    <div class="main-content side-content pt-20">
        <div class="container-fluid">
            <div class="inner-body">
                <div class="row row-sm">
                    <div class="col-lg-12 col-md-12">
                        <div class="card custom-card">
                            @foreach($submenus as $submenupanel)
                                <div class="card-body" style="background-color: #0000000a;border-radius: 10px 10px 0px 0px;">
                                    <div class="row">
                                        <div class="col"><a href="{{url()->current()}}" class="btn btn-link btn-xs">ویرایش اطلاعات زیر منوهای داشبورد</a></div>
                                        <div class="col text-left"><a href="{{url(request()->segment(1).'/'.request()->segment(2))}}" class="btn btn-link btn-xs">بازگشت</a></div>
                                    </div>
                                </div>
                            <div class="card-body">
                                <form action="{{route(request()->segment(2).'.'.'update', $submenupanel->id)}}" method="POST">
                                    {{csrf_field()}}
                                    {{ method_field('PATCH') }}
                                    <input type="hidden" name="submenu_panel_id" id="submenu_panel_id" data-required="1" value="{{$submenupanel->id}}" class="form-control" />
                                    <div class="row row-sm">
                                        <div class="col-md-12">
                                            {{--@include('error')--}}
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">عنوان زیرمنو داشبورد</p>
                                                <input type="text" name="title" id="title" data-required="1" value="{{$submenupanel->title}}"  class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">لیبل زیرمنو داشبورد</p>
                                                <input type="text" name="label" id="label" data-required="1" value="{{$submenupanel->label}}"  class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">کلاس زیرمنو داشبورد</p>
                                                <input type="text" name="class" id="class" data-required="1" value="{{$submenupanel->class}}" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">کنترلر زیرمنو داشبورد</p>
                                                <input type="text" name="controller" id="controller" data-required="1" value="{{$submenupanel->controller}}" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">متد درخواست زیرمنو داشبورد</p>
                                                <select name="method" id="method" class="form-control select-lg select2">
                                                    <option value="resource"{{$submenupanel->method == 'resource' ? 'selected' : ''}}>resource</option>
                                                    <option value="get"     {{$submenupanel->method == 'get' ?      'selected' : ''}}>get</option>
                                                    <option value="post"    {{$submenupanel->method == 'post' ?     'selected' : ''}}>post</option>
                                                    <option value="put"     {{$submenupanel->method == 'put' ?      'selected' : ''}}>put</option>
                                                    <option value="patch"   {{$submenupanel->method == 'patch' ?    'selected' : ''}}>patch</option>
                                                    <option value="delete"  {{$submenupanel->method == 'delete' ?   'selected' : ''}}>delete</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">انتخاب منو</p>
                                                <select name="menu_id" id="menu_id" class="form-control select-lg select2">
                                                    <option value="">انتخاب منو</option>
                                                    @foreach($menupanels as $menupanel)
                                                        <option value="{{$menupanel->id}}" {{$submenupanel->menu_id == $menupanel->id ? 'selected' : ''}}>{{$menupanel->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">نمایش/عدم نمایش</p>
                                                <select name="status" id="status" class="form-control select-lg select2">
                                                    <option value="4" {{$submenupanel->status == '4' ? 'selected' : ''}}>نمایش</option>
                                                    <option value="0" {{$submenupanel->status == '0' ? 'selected' : ''}}>عدم نمایش</option>
                                                </select>
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
                            @endforeach
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
    <script src="{{asset('admin/assets/plugins/telephoneinput/telephoneinput.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script>

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
                    url: "{{route(request()->segment(2).'.'.'update', $submenupanel->id)}}",
                    method: 'PATCH',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        submenu_panel_id    : jQuery('#submenu_panel_id').val(),
                        title               : jQuery('#title').val(),
                        label               : jQuery('#label').val(),
                        class               : jQuery('#class').val(),
                        controller          : jQuery('#controller').val(),
                        method              : jQuery('#method').val(),
                        menu_id             : jQuery('#menu_id').val(),
                        status              : jQuery('#status').val(),
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
