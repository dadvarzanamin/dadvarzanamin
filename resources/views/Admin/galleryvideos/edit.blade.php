@extends('Admin.admin')
@section('title')
    <title> ویرایش  ویدئو ها </title>
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
    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">
                <div class="page-header">
                    <div>
                        <h2 class="main-content-title tx-24 mg-b-5">مدیریت  ویدئو</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('admin/panel')}}">صفحه اصلی</a></li>
                            <li class="breadcrumb-item"><a href="{{url('admin/galleryvideomanage')}}">مدیریت ویدئو</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ویرایش ویدئو</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">
                <div class="row row-sm">
                    <div class="col-lg-12 col-md-12">
                        <div class="card custom-card">
                            <div class="card-body" style="background-color: #0000000a;border-radius: 10px 10px 0px 0px;">
                                <div class="row">
                                    <div class="col"><a href="{{url()->current()}}" class="btn btn-link btn-xs">ویرایش اطلاعات ویدئو </a></div>
                                </div>
                            </div>
                            <div class="card-body">
                                    <form action="{{route('galleryvideomanage.update', $media->id)}}" method="POST" enctype="multipart/form-data">
                                        <div class="row row-sm">
                                            {{csrf_field()}}
                                            {{ method_field('PATCH') }}

                                            <div class="col-md-12">
{{--                                                @include('error')--}}
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">عنوان</p>
                                                    <input type="text" name="title" id="title" value="{{$media->title}}"  class="form-control" />
                                                </div>
                                                <div class="form-group">
                                                    <p class="mg-b-10">مورد1</p>
                                                    <input type="text" name="item1" id="item1" value="{{$media->item1}}" class="form-control" />
                                                </div>
                                                <div class="form-group">
                                                    <p class="mg-b-10">مورد4</p>
                                                    <input type="text" name="item4" id="item4" value="{{$media->item4}}" class="form-control" />
                                                </div>
                                                <div class="form-group">
                                                    <p class="mg-b-10">نوع مطلب</p>
                                                    <input type="text" name="title_type" id="title_type" value="{{$media->title_type}}" class="form-control" />
                                                </div>
                                                <div class="form-group">
                                                    <p class="mg-b-10">نمایش رایگان</p>
                                                    <select name="free" id="free" class="form-control select-lg select2">
                                                        <option value="">انتخاب  کنید</option>
                                                        <option value="0" {{$media->free == 0 ? 'selected' : ''}}>بله</option>
                                                        <option value="4" {{$media->free == 4 ? 'selected' : ''}}>خیر</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">عنوان مطلب</p>
                                                    <input type="text" name="title_text" id="title_text" value="{{$media->title_text}}" class="form-control" />
                                                </div>
                                                <div class="form-group">
                                                    <p class="mg-b-10">مورد2</p>
                                                    <input type="text" name="item2" id="item2" value="{{$media->item2}}" class="form-control" />
                                                </div>
                                                <div class="form-group">
                                                    <p class="mg-b-10">5مورد</p>
                                                    <input type="text" name="item5" id="item5" value="{{$media->item5}}" class="form-control" />
                                                </div>
                                                <div class="form-group">
                                                    <p class="mg-b-10">زمان فایل</p>
                                                    <input type="text" name="file_time" id="file_time" value="{{$media->file_time}}" class="form-control" />
                                                </div>
                                                <div class="form-group">
                                                    <p class="mg-b-10">منو سایت</p>
                                                    <select name="menu_id" id="menu_id" class="form-control select-lg select2">
                                                        <option value="">انتخاب منو سایت</option>
                                                        @foreach($menus as $menu)
                                                            <option value="{{$menu->id}}" {{$media->menu_id == $menu->id ? 'selected' : ''}}>{{$menu->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">انتخاب وضعیت نمایش</p>
                                                    <select name="status_id" id="status_id" class="form-control select-lg select2">
                                                        <option value="0" {{$media->status == 0 ? 'selected' : ''}}>عدم نمایش</option>
                                                        <option value="4" {{$media->status == 4 ? 'selected' : ''}}>در حال نمایش</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <p class="mg-b-10">3مورد</p>
                                                    <input type="text" name="item3" id="item3" value="{{$media->item3}}" class="form-control" />
                                                </div>
                                                <div class="form-group">
                                                    <p class="mg-b-10">6مورد</p>
                                                    <input type="text" name="item6" id="item6" value="{{$media->item6}}" class="form-control" />
                                                </div>
                                                <div class="form-group">
                                                    <p class="mg-b-10">فایل ویدئو</p>
                                                    <input type="file" name="file_link" id="file_link" class="form-control" data-height="200">
                                                </div>
                                                <div class="form-group">
                                                    <p class="mg-b-10">زیر منو سایت</p>
                                                    <select name="submenu_id" id="submenu_id" class="form-control select-lg select2">
                                                        <option value="">انتخاب زیر منو سایت</option>
                                                        @foreach($submenus as $submenu)
                                                            <option value="{{$submenu->id}}" {{$media->submenu_id == $submenu->id ? 'selected' : ''}}>{{$submenu->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <p class="mg-b-10">تصویر کاور</p>
                                                    <input type="file" name="cover" id="cover" class="dropify" data-height="200">
                                                </div>
                                                <div class="form-group">
                                                    <p class="mg-b-10">توضیحات</p>
                                                    <textarea name="description" id="description" class="form-control" cols="30" rows="5">{{$media->description}}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 mg-b-10 text-center">
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
                <div class="row row-sm">
                    <div class="col-lg-12 col-md-12">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div>
                                    <a aria-controls="collapseExample" aria-expanded="false" class="btn ripple btn-primary" data-toggle="collapse" href="#collapseExample" role="button"> افزودن زیر نویس </a>
                                    <div class="collapse mg-t-5" id="collapseExample">
                                        <div>
                                            <h3 class="text-center mb-5"><span class="badge badge-light">  افزودن زیر نویس </span></h3>
                                        </div>
                                        <form action="{{route('createsubtitle')}}" method="POST" enctype="multipart/form-data">
                                            <div class="row row-sm">
                                                {{csrf_field()}}
                                                <input type="hidden" name="folder" value="{{$media->folder}}">
                                                <input type="hidden" name="media_id" value="{{$media->id}}">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <p class="mg-b-10">نام زبان به فارسی</p>
                                                        <input type="text" name="title" data-required="1" class="form-control input-height" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <p class="mg-b-10">نام زبان به لاتین</p>
                                                        <input type="text" name="slug" data-required="1"  class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <p class="mg-b-10">نام زبان به اختصار</p>
                                                        <input type="text" name="abb" data-required="1"  class="form-control" />
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <p class="mg-b-10">شرح مطب</p>
                                                        <textarea name="description" id="editor1" cols="30" data-required="1" rows="5" class="form-control" ></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <p class="mg-b-10">زیر نویس</p>
                                                        <textarea name="text" id="editor2" cols="30" data-required="1" rows="5" class="form-control" ></textarea>
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
                @foreach($subtitles as $subtitle)
                    <div class="row row-sm">
                    <div class="col-lg-12 col-md-12">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div>
                                    <a aria-controls="collapseExample" aria-expanded="false" class="btn ripple btn-primary" data-toggle="collapse" href="#collapseExample{{$subtitle->id}}" role="button"> ویرایش زیر نویس {{$subtitle->title}} </a>
                                    <div class="collapse mg-t-5" id="collapseExample{{$subtitle->id}}">
                                        <div>
                                            <h3 class="text-center mb-5"><span class="badge badge-light">  ویرایش زیر نویس {{$subtitle->title}} </span></h3>
                                        </div>
                                            <form action="{{route('updatesubtitle', $subtitle->id)}}" method="POST" enctype="multipart/form-data">
                                                <div class="row row-sm">
                                                    {{csrf_field()}}
                                                    {{ method_field('PATCH') }}
                                                    <input type="hidden" name="folder" value="{{$media->folder}}">
                                                    <input type="hidden" name="media_id" value="{{$media->id}}">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <p class="mg-b-10">نام زبان به فارسی</p>
                                                            <input type="text" name="title" value="{{$subtitle->title}}" data-required="1" class="form-control input-height" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <p class="mg-b-10">نام زبان به لاتین</p>
                                                            <input type="text" name="slug" value="{{$subtitle->slug}}" data-required="1"  class="form-control" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <p class="mg-b-10">نام زبان به اختصار</p>
                                                            <input type="text" name="abb" value="{{$subtitle->abb}}" data-required="1"  class="form-control" />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <p class="mg-b-10">شرح مطب</p>
                                                            <textarea name="description" id="editor{{$subtitle->id * 1000}}" cols="30" data-required="1" rows="5" class="form-control" >{{$subtitle->description}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <p class="mg-b-10">زیر نویس</p>
                                                            <textarea name="text" id="editor{{$subtitle->id * 10000}}" cols="30" data-required="1" rows="5" class="form-control" >{{file_get_contents('storage/'.$subtitle->file_link)}}</textarea>
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
                @endforeach
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
    <script src="{{asset('admin/assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/fileuploads/js/fileupload.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/fileuploads/js/file-upload.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/telephoneinput/telephoneinput.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
    <script>
        CKEDITOR.replace( 'editor2' );
    </script>
    @foreach($subtitles as $subtitle)
        <script>
            CKEDITOR.replace( 'editor{{$subtitle->id * 1000}}' );
        </script>
        <script>
            CKEDITOR.replace( 'editor{{$subtitle->id * 10000}}' );
        </script>
    @endforeach
{{--    <script>--}}
{{--        ClassicEditor--}}
{{--            .create( document.querySelector( '#editor' ) )--}}
{{--            .catch( error => {--}}
{{--                console.error( error );--}}
{{--            } );--}}
{{--    </script>--}}
{{--    <script>--}}
{{--        $(function(){--}}
{{--            $('#type').change(function(){--}}
{{--                $("#type_id option").remove();--}}
{{--                var id = $('#type').val();--}}
{{--                $.ajax({--}}
{{--                    url : '{{ route( 'slidetype' ) }}',--}}
{{--                    data: {--}}
{{--                        "_token": "{{ csrf_token() }}",--}}
{{--                        "id": id--}}
{{--                    },--}}
{{--                    type: 'post',--}}
{{--                    dataType: 'json',--}}
{{--                    success: function( result )--}}
{{--                    {--}}
{{--                        $.each( result, function(k, v) {--}}
{{--                            $('#type_id').append($('<option>', {value:k, text:v}));--}}
{{--                        });--}}
{{--                    },--}}
{{--                    error: function()--}}
{{--                    {--}}
{{--                        //handle errors--}}
{{--                        alert('error...');--}}
{{--                    }--}}
{{--                });--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}

@endsection

