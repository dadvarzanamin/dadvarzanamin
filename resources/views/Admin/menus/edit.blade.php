@extends('Admin.admin')
@section('title')
    <title> ویرایش منو سایت </title>
    <link href="{{asset('admin/assets/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/ion-rangeslider/css/ion.rangeSlider.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/ion-rangeslider/css/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                                    <div class="col"><a href="{{url()->current()}}" class="btn btn-link btn-xs">ویرایش اطلاعات منو سایت</a></div>
                                    <div class="col text-left"><a href="{{url(request()->segment(1).'/'.request()->segment(2))}}" class="btn btn-link btn-xs">بازگشت</a></div>
                                </div>
                            </div>
                            <div class="card-body">
                                    <form action="{{route(request()->segment(2).'.update', $menus->id)}}" method="POST">
                                        <div class="row row-sm">
                                            {{csrf_field()}}
                                            {{ method_field('PATCH') }}

                                            <div class="col-md-12">
{{--                                                @include('error')--}}
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">عنوان منو سایت</p>
                                                    <input type="text" name="title" id="title" value="{{$menus->title}}" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">زیر منو سایت</p>
                                                    <select name="submenu" id="submenu" class="form-control select2">
                                                        <option value="1" {{$menus->submenu == 1 ? 'selected' : ''}}>دارد</option>
                                                        <option value="0" {{$menus->submenu == 0 ? 'selected' : ''}}>ندارد</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">نمایش/عدم نمایش</p>
                                                    <select name="status" id="status" class="form-control select2">
                                                        <option value="4" {{$menus->status == '4' ? 'selected' : ''}}>نمایش</option>
                                                        <option value="0" {{$menus->status == '0' ? 'selected' : ''}}>عدم نمایش</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10"> نمایش به صورت مگامنو</p>
                                                    <select name="mega_menu" id="mega_menu" class="form-control select2">
                                                        <option value="1" {{$menus->mega_manu == 1 ? 'selected' : ''}}>بله</option>
                                                        <option value="0" {{$menus->mega_manu == 0 ? 'selected' : ''}}>خیر</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">کاربرد منو</p>
                                                    <select name="level" id="level" class="form-control select-lg select2">
                                                        <option value="">انتخاب کنید</option>
                                                        <option value="site"      {{$menus->level == 'site' ? 'selected' : ''}}>در سایت</option>
                                                        <option value="dashboard" {{$menus->level == 'dashboard' ? 'selected' : ''}}>در پنل کاربر سایت</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">سطح نمایش</p>
                                                    <select name="userlevel" id="userlevel" class="form-control select-lg select2">
                                                        <option value="">انتخاب کنید</option>
                                                        @foreach($typeusers as $typeuser)
                                                            <option value="{{$typeuser->id}}" {{(string)$typeuser->id == implode("," , json_decode($menus->userlevel)) ? 'selected' : ''}}>{{$typeuser->title_fa}}</option>
{{--                                                            <option value="{{$typeuser->id}}" {{$typeuser->id == $menus->userlevel ? 'selected' : ''}}>{{$typeuser->title_fa}}</option>--}}
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">کلاس کنترلر</p>
                                                    <input type="text" name="class" id="class" value="{{$menus->class}}" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">اولویت نمایش</p>
                                                    <select name="priority" id="priority" class="form-control select-lg select2">
                                                        <?php
                                                        foreach ($values as $value) {
                                                            if (in_array($value, $idmenus)) {
                                                                echo '<option value="' . $value . '" disabled>' . $value . '</option>';
                                                            } else {
                                                                echo '<option value="' . $value . '">' . $value . '</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <p class="mg-b-10">کلمات کلیدی</p>
                                                    <input type="text" name="keyword" id="keyword" @if($menus->keyword)value="{{implode("،" , json_decode($menus->keyword))}}" @endif class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <p class="mg-b-10">توضیحات</p>
                                                    <textarea name="description" id="description" class="form-control" cols="30" rows="4">{{$menus->page_description}}</textarea>
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
                    url: "{{ route(request()->segment(2).'.update' , $menus->id) }}",
                    method: 'PATCH',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        // menu_id     : jQuery('#menu_id').val(),
                        title       : jQuery('#title').val(),
                        submenu     : jQuery('#submenu').val(),
                        class       : jQuery('#class').val(),
                        level       : jQuery('#level').val(),
                        priority    : jQuery('#priority').val(),
                        mega_menu   : jQuery('#mega_menu').val(),
                        keyword     : jQuery('#keyword').val(),
                        description : jQuery('#description').val(),
                        status      : jQuery('#status').val(),
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

