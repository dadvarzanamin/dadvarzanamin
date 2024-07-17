@extends('Admin.admin')
@section('title')
    <title> ویرایش  نمونه کارها </title>
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
                                    <div class="col"><a href="{{url()->current()}}" class="btn btn-link btn-xs">ویرایش اطلاعات نمونه کارها</a></div>
                                    <div class="col text-left"><a href="{{url(request()->segment(1).'/'.request()->segment(2))}}" class="btn btn-link btn-xs">بازگشت</a></div>
                                </div>
                            </div>
                            <div class="card-body">
                                    <form action="{{route(request()->segment(2).'.'.'update', $portfolios->id)}}" method="post" enctype="multipart/form-data">
                                        <div class="row row-sm">
                                            {{csrf_field()}}
                                            {{ method_field('PATCH') }}
                                            <div class="col-md-12">
{{--                                                @include('error')--}}
                                            </div>
                                            <input type="hidden" name="Portfolio_id" id="Portfolio_id" data-required="1" value="{{$portfolios->id}}" class="form-control" />
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">نام برند</p>
                                                    <input type="text" name="title" id="title" value="{{$portfolios->title}}"  class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">انتخاب برند مشتری</p>
                                                    <select name="customer_id" id="customer_id" class="form-control select-lg select2">
                                                        <option value="">انتخاب برند مشتری</option>
                                                        @foreach($customers as $customer)
                                                            <option value="{{$customer->id}}" {{$customer->id == $portfolios->customer_id ? 'selected' : ''}}>{{$customer->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">انتخاب منو نمایش</p>
                                                    <select name="menu_id" id="menu_id" class="form-control select-lg select2">
                                                        <option value="">انتخاب منو نمایش</option>
                                                        @foreach($menus as $menu)
                                                            <option value="{{$menu->id}}" {{$menu->id == $portfolios->menu_id ? 'selected' : ''}}>{{$menu->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">انتخاب زیرمنو نمایش</p>
                                                    <select name="submenu_id" id="submenu_id" class="form-control select-lg select2">
                                                        <option value="">انتخاب زیرمنو نمایش</option>
                                                        @foreach($submenus as $submenu)
                                                            <option value="{{$submenu->id}}" {{$submenu->id == $portfolios->submenu_id ? 'selected' : ''}}>{{$submenu->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">انتخاب وضعیت نمایش</p>
                                                    <select name="status" id="status" class="form-control select-lg select2">
                                                        <option value="0" {{$portfolios->status == 0 ? 'selected' : '' }}>عدم نمایش</option>
                                                        <option value="4" {{$portfolios->status == 4 ? 'selected' : '' }}>در حال نمایش</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">ویدئو</p>
                                                    <input type="file" name="video" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">تصویر نمونه کار</p>
                                                    <input type="file" id="file_link" name="file_link" class="dropify" data-default-file="{{asset('storage/'.$portfolios->file_link)}}" data-height="200">
                                                </div>
                                            </div>
                                            @if($portfolios->videos)
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">ویدئو نمونه کار</p>
                                                    <video controls preload="metadata" poster="{{asset('storage/'.$portfolios->file_link)}}" style="width: 200px">
                                                        <source src="{{asset('storage/'.$portfolios->videos)}}" type="video/mp4" />
                                                    </video>
                                                </div>
                                            </div>
                                            @endif
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <p class="mg-b-10"> توضیحات</p>
                                                    <textarea name="text" id="editor" cols="30" rows="5" class="form-control" >{{$portfolios->description}}</textarea>
                                                </div>
                                            </div>
                                            <div  class="col-lg-12 mg-b-10 text-center">
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
    <script src="{{asset('admin/assets/plugins/ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace( 'editor' );
    </script>
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
                        alert('ارور، ارتباط با سرور به طور موقت قطع می باشد');
                    }
                });
            });
        });
    </script>
@endsection

