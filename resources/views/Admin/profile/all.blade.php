@extends('Admin.admin')
@section('title')
    <title> پروفایل کاربری </title>
    <link href="" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/plugins/gallery/gallery.css')}}" rel="stylesheet" />
@endsection
@section('main')
    <div class="main-content side-content pt-20">
        <div class="container-fluid">
            <div class="inner-body">
                <div class="row square">
                    <div class="col-lg-12 col-md-12">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="profile-tab tab-menu-heading">
                                    <nav class="nav main-nav-line p-3 tabs-menu profile-nav-line bg-gray-100">
                                        <a class="nav-link active" data-toggle="tab" href="#edit">ویرایش اطلاعات </a>
                                        <a class="nav-link" data-toggle="tab" href="#user">کاربران </a>
                                        <a class="nav-link" data-toggle="tab" href="#usercreate">ایجاد حساب کاربری</a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row-sm">
                    <div class="col-lg-12 col-md-12">
                        <div class="card custom-card main-content-body-profile">
                            <div class="tab-content">
                                <div class="main-content-body tab-pane p-4 border-top-0 active" id="edit">
                                    <div class="card-body border">
                                        <div class="mb-4 main-content-label">اطلاعات شخصی</div>
                                        <form class="form-horizontal" method="post" action="{{route('profile.update' , Auth::user()->id)}}">
                                            {{csrf_field()}}
                                            {{ method_field('PATCH') }}
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-3">
                                                        <label class="form-label">نام کاربری</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" name="username" id="username" class="form-control" value="{{Auth::user()->username}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-3">
                                                        <label class="form-label">نام و نام خانوادگی</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" name="name" id="name" class="form-control" value="{{Auth::user()->name}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-4 main-content-label">اطلاعات تماس</div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-3">
                                                        <label class="form-label">ایمیل <i>(الزامی)</i></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" name="email" id="email" class="form-control" value="{{Auth::user()->email}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-3">
                                                        <label class="form-label">موبایل</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" name="mobile" id="mobile" class="form-control" value="{{Auth::user()->phone}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-4 main-content-label">اطلاعات شبکه اجتماعی</div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-3">
                                                        <label class="form-label">واتس اپ</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" name="whatsapp" id="whatsapp" class="form-control" value="{{Auth::user()->whatsapp}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-3">
                                                        <label class="form-label">اینستاگرام</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" name="instagram" id="instagram" class="form-control" value="{{Auth::user()->instagram}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-3">
                                                        <label class="form-label">تلگرام</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" name="telegram" id="telegram" class="form-control" value="{{Auth::user()->telegram}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-4 main-content-label">سطح دسترسی و وضعیت</div>
                                            <div class="form-group mb-0">
                                                <div class="row row-sm">
                                                    <div class="col-md-3">
                                                        <label class="form-label">سطح دسترسی کاربر</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="custom-controls-stacked">
                                                            @if(Auth::user()->level == 'admin')
                                                                <button class="btn ripple btn-success" disabled>ادمین</button>
                                                            @elseif(Auth::user()->level == 'manager')
                                                                <button class="btn ripple btn-success" disabled>مدیر</button>
                                                            @elseif(Auth::user()->level == 'expert')
                                                                <button class="btn ripple btn-success" disabled>کارشناس </button>
                                                            @elseif(Auth::user()->level == 'user')
                                                                <button class="btn ripple btn-success" disabled>کاربر</button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-4 main-content-label"></div>
                                                <div class="row row-sm">
                                                    <div class="col-md-3">
                                                        <label class="form-label">وضعیت کاربر</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="custom-controls-stacked">
                                                            @if(Auth::user()->status == 1)
                                                                <button class="btn ripple btn-warning" disabled>ثبت نام اولیه</button>
                                                            @elseif(Auth::user()->status == 2)
                                                                <button class="btn ripple btn-primary" disabled>در حال بررسی</button>
                                                            @elseif(Auth::user()->status == 3)
                                                                <button class="btn ripple btn-success" disabled>تایید مدیر سیستم </button>
                                                            @elseif(Auth::user()->status == 4)
                                                                <button class="btn ripple btn-light" disabled>فعال</button>
                                                            @elseif(Auth::user()->status == 0)
                                                                <button class="btn ripple btn-danger" disabled >غیر فعال شده</button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row row-sm">
                                                    <div class="col-md-12">
                                                        <div class="custom-controls-stacked text-center">
                                                            <button type="button" id="submit-form-update" class="btn btn-info  btn-lg m-r-20">ذخیره اطلاعات</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="main-content-body tab-pane border-top-0" id="user">
                                    <div class="card-body border pd-b-10">
                                        <div class="row row-sm">
                                            @foreach($users as $user)
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                <div class="card custom-card border">
                                                    <div class="card-body text-center">
                                                        <div class="user-lock text-center">
                                                            <div class="dropdown text-right">
                                                                <a href="#" class="option-dots" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <i class="fe fe-more-vertical"></i> </a>
                                                                <div class="dropdown-menu dropdown-menu-right shadow">
                                                                    <a class="dropdown-item" href="#"> <i class="fe fe-message-square ml-2"></i> پیام </a>
                                                                    <a class="dropdown-item" href="#"> <i class="fe fe-edit-2 ml-2"></i> ویرایش اطلاعات </a>
                                                                    <a class="dropdown-item" href="#"> <i class="fe fe-trash-2 ml-2"></i> حذف کاربر </a>
                                                                </div>
                                                            </div>
                                                            @if($user->image)
                                                                <img class="rounded-circle" src="{{asset($user->image)}}">
                                                            @else
                                                                <img class="rounded-circle" src="{{asset('admin/assets/img/users/1.jpg')}}">
                                                            @endif
                                                        </div>
                                                        <h5 class=" mb-1 mt-3 main-content-label">{{$user->name}}</h5>
                                                        <p class="mb-2 mt-1 tx-inverse">{{$user->level}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="main-content-body tab-pane p-4 border-top-0" id="usercreate">
                                    <div class="card-body border">
                                        <form class="form-horizontal" action="{{ route('register') }}" method="POST" id="create_form">
                                            {{csrf_field()}}
                                            <div class="mb-4 main-content-label">اطلاعات شخصی</div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-3">
                                                        <label class="form-label">نام و نام خانوادگی</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" name="name" id="create_name" class="form-control" placeholder="نام و نام خانوادگی">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-3">
                                                        <label class="form-label">نام کاربری</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" name="username" id="create_username" class="form-control" placeholder="نام کاربری">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-3">
                                                        <label class="form-label">کد ملی</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" name="nationalcode" id="create_nationalcode" class="form-control" placeholder="کد ملی">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-3">
                                                        <label class="form-label">سن</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="number" name="age" id="create_age" class="form-control" max="100" maxlength="2" placeholder="سن">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-3">
                                                        <label class="form-label">جنسیت</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select name="level" id="create_gender" class="form-control select-lg select2">
                                                            <option value="">انتخاب جنسیت کاربر</option>
                                                            <option value="1">مرد</option>
                                                            <option value="0">زن</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-4 main-content-label">اطلاعات تماس</div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-3">
                                                        <label class="form-label">شماره موبایل</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" name="phone" id="create_phone" class="form-control" placeholder="شماره موبایل">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-3">
                                                        <label class="form-label">شماره ثابت</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" name="telphone" id="create_telphone" class="form-control" placeholder="شماره ثابت">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-3">
                                                        <label class="form-label">پست الکترونیک</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" name="email" id="create_email" class="form-control" placeholder="پست الکترونیک" > </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-3">
                                                        <label class="form-label">ادرس پستی</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <textarea name="address" id="create_address" class="form-control" rows="2"></textarea>
                                                </div>
                                            </div>
                                            <div class="mb-4 main-content-label">سطح دسترسی</div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-3">
                                                        <label class="form-label">نوع کاربری</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select name="level" id="create_level" class="form-control select-lg select2">
                                                            <option value="">انتخاب نوع کاربری</option>
                                                            <option value="admin">کاربر داشبورد</option>
                                                            <option value="site">کاربر سایت</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-3">
                                                        <label class="form-label">انتخاب سطح دسترسی</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select name="type_id" id="create_type_id" class="form-control select-lg select2">
                                                            <option value="">انتخاب سطح دسترسی</option>
                                                            @foreach($roles as $role)
                                                                <option value="{{$role->id}}">{{$role->title}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <button type="button" id="submit_create_user" class="btn btn-lg ripple btn-success">ثبت اطلاعات</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>

@endsection
@section('end')
    <script src="{{asset('admin/assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/select2.js')}}"></script>
    <script>
        jQuery(document).ready(function(){
            jQuery('#submit-form-update').click(function(e){
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                jQuery.ajax({
                    url: "{{ route('edituser')}}",
                    method: 'PATCH',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        username    : jQuery('#username').val(),
                        name        : jQuery('#name').val(),
                        email       : jQuery('#email').val(),
                        mobile      : jQuery('#mobile').val(),
                        whatsapp    : jQuery('#whatsapp').val(),
                        instagram   : jQuery('#instagram').val(),
                        telegram    : jQuery('#telegram').val()
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
    <script>
        jQuery(document).ready(function(){
            jQuery('#submit_create_user').click(function(e){
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
                        url: "{{route('createuser')}}",
                        method: 'POST',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            name        : jQuery('#create_name').val(),
                            username    : jQuery('#create_username').val(),
                            nationalcode: jQuery('#create_nationalcode').val(),
                            age         : jQuery('#create_age').val(),
                            gender      : jQuery('#create_gender').val(),
                            phone       : jQuery('#create_phone').val(),
                            telphone    : jQuery('#create_telphone').val(),
                            email       : jQuery('#create_email').val(),
                            address     : jQuery('#create_address').val(),
                            type_id     : jQuery('#create_type_id').val(),
                            level       : jQuery('#create_level').val(),
                        },
                        success: function (data) {
                            if(data.success == true){
                                swal(data.subject, data.message, data.flag);
                                $('#create_form')[0].reset();
                            } else {
                                swal(data.subject, data.message, data.flag);
                            }
                        },
                    }));
            });
        });
    </script>
@endsection
