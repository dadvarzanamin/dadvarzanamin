@extends('Admin.admin')
@section('title')
    <title>{{$thispage['create_title']}}</title>
    <link href="{{asset('admin/assets/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/ion-rangeslider/css/ion.rangeSlider.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/ion-rangeslider/css/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet">
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
                                <form action="{{route(request()->segment(2).'.'.'store')}}" method="POST" id="form">
                                    <div class="row row-sm">
                                        {{csrf_field()}}
                                        <div class="col-md-12">
                                           {{-- @include('error')--}}
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">نام منو سایت</p>
                                                <input type="text" name="title" id="title" data-required="1" placeholder="نام منو سایت را وارد کنید" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">عنوان تب منو سایت</p>
                                                <input type="text" name="tab_title" id="tab_title" data-required="1" placeholder="عنوان تب سایت را وارد کنید" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">عنوان صفحه سایت</p>
                                                <input type="text" name="page_title" id="page_title" data-required="1" placeholder="عنوان صفحه را وارد کنید" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">زیر منو سایت</p>
                                                <select name="submenu" id="submenu" class="form-control select2">
                                                    <option value="">انتخاب کنید</option>
                                                    <option value="1">دارد</option>
                                                    <option value="0">ندارد</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10"> نمایش به صورت مگامنو</p>
                                                <select name="mega_menu" id="mega_menu" class="form-control select-lg select2" disabled>
                                                    <option value="">انتخاب کنید</option>
                                                    <option value="1">بله</option>
                                                    <option value="0">خیر</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3" id="inputContainer" style="display: none;">
                                            <div class="form-group">
                                                <p class="mg-b-10">عنوان زیرمنو مگامنو</p>
                                                <input type="text" name="mega_title" id="mega_title" placeholder="عنوان ستون هر زیرمنو مگا را وارد کنید" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">کاربرد منو</p>
                                                <select name="level" id="level" class="form-control select-lg select2">
                                                    <option value="">انتخاب کنید</option>
                                                    <option value="site">در سایت</option>
                                                    <option value="dashboard">در پنل کاربر سایت</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">سطح نمایش</p>
                                                <select name="userlevel[]" id="userlevel" multiple class="form-control select-lg select2" disabled="disabled">
                                                    <option value="">انتخاب کنید</option>
                                                    <option value="all">انتخاب همه کاربران</option>
                                                    @foreach($typeusers as $typeuser)
                                                        <option value="{{$typeuser->id}}">{{$typeuser->title_fa}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <p class="mg-b-10">کلاس کنترلر</p>
                                                <input type="text" name="class" id="class" data-required="1" placeholder="کلاس کنترلر را وارد کنید" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <p class="mg-b-10">کلمات کلیدی</p>
                                                <input type="text" name="keyword" id="keyword" data-required="1" placeholder="کلمات کلیدی را اینگونه وارد کنید. کلمه1،کلمه2،کلمه3،کلمه4و..." class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <p class="mg-b-10">توضیحات صفحه برای سئو</p>
                                                <textarea name="page_description" id="page_description" class="form-control" cols="30" rows="4"></textarea>
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
                        data: {
                            "_token": "{{ csrf_token() }}",
                            title            : jQuery('#title').val(),
                            tab_title        : jQuery('#tab_title').val(),
                            page_title       : jQuery('#page_title').val(),
                            level            : jQuery('#level').val(),
                            userlevel        : jQuery('#userlevel').val(),
                            mega_menu        : jQuery('#mega_menu').val(),
                            mega_title       : jQuery('#mega_title').val(),
                            keyword          : jQuery('#keyword').val(),
                            page_description : jQuery('#page_description').val(),
                            submenu          : jQuery('#submenu').val()
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
    <script>
        $(document).ready(function () {
            $('#mega_menu').on('change', function () {
                var selectedValue = $(this).val();
                var inputContainer = $('#inputContainer');

                if (selectedValue === '1') {
                    inputContainer.show();
                } else {
                    inputContainer.hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#submenu').on('change', function () {
                var selectedValue = $(this).val();
                var mega_menu = $('#mega_menu');

                if (selectedValue === '1') {
                    mega_menu.prop('disabled', false);
                } else {
                    mega_menu.prop('disabled', true);
                }
            });
        });

    </script>
    <script>
        $(document).ready(function () {
            $('#level').on('change', function () {
                var selectedValue = $(this).val();
                var userlevel = $('#userlevel');

                if (selectedValue === 'dashboard') {
                    userlevel.prop('disabled', false);
                } else {
                    userlevel.prop('disabled', true);
                }
            });
        });

    </script>
@endsection

