@extends('admin')
@section('style')
    <title>تیکت ها</title>
@endsection
@section('main')
                    <div class="dashboard-heading mb-5">
                        <h3 class="fs-22 font-weight-semi-bold">تیکت ها</h3>
                    </div>
                    <div class="review-wrap">
                        <div class="media media-card border-bottom border-bottom-gray pb-4 mb-4" style="width: 80%">
                            <div class="media-img mr-4 rounded-full">
                                <img class="rounded-full" @if(Auth::user()->image) src="{{asset(Auth::user()->image)}}" @else src="{{asset('admin/assets/img/users/1.jpg')}}" @endif alt="تصویر کاربر" />
                            </div>
                            <div class="media-body">
                                <div class="d-flex flex-wrap align-items-baseline justify-content-between pb-1">
                                    <h5>برای عقد قرارداد چگونه درخواست ثبت کنم؟</h5>
                                    <div class="generic-action-wrap generic--action-wrap-3">
                                        <div class="dropdown">
                                            <a class="action-btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="la la-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">کپی </a>
                                                <a class="dropdown-item" href="#">برش </a>
                                                <a class="dropdown-item" href="#">ویرایش </a>
                                                <a class="dropdown-item" href="#">حذف</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap align-items-center pb-1">

                                    <p class="fs-14 pl-1">توسط <a href="#" class="text-color mx-1 hover-underline">محمد حسین دیوان بیگی</a> 2 روز پیش</p>
                                </div>
                                <p class="pb-3">
                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                                    کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                                </p>
                                <a class="btn theme-btn theme-btn-sm theme-btn-transparent" href="#" data-toggle="modal" data-target="#replyModal"><i class="la la-reply mr-1"></i> به این بررسی پاسخ دهید</a>
                            </div>
                        </div>
                        <!-- end media -->
                        <div class="media media-card border-bottom border-bottom-gray pb-4 mb-4 review-reply" style="width: 80%">
                            <div class="media-img mr-4 rounded-full">
                                <img class="rounded-full" @if(Auth::user()->image) src="{{asset(Auth::user()->image)}}" @else src="{{asset('admin/assets/img/users/1.jpg')}}" @endif alt="تصویر کاربر" />
                            </div>
                            <div class="media-body">
                                <div class="d-flex flex-wrap align-items-baseline justify-content-between pb-1">
                                    <h5>پاسخ نویسنده</h5>
                                    <div class="generic-action-wrap generic--action-wrap-3">
                                        <div class="dropdown">
                                            <a class="action-btn" href="#" role="button" id="dropdownMenuLinkTwo" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="la la-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuLinkTwo">
                                                <a class="dropdown-item" href="#">کپی </a>
                                                <a class="dropdown-item" href="#">برش </a>
                                                <a class="dropdown-item" href="#">ویرایش </a>
                                                <a class="dropdown-item" href="#">حذف</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap align-items-center pb-1">
                                    <p class="fs-14 pl-1">2 روز پیش</p>
                                </div>
                                <p class="pb-3">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است</p>
                                <a class="btn theme-btn theme-btn-sm theme-btn-transparent" href="#" data-toggle="modal" data-target="#replyModal"><i class="la la-reply mr-1"></i> به این بررسی پاسخ دهید</a>
                            </div>
                        </div>
                    </div>
                    <!-- end review-wrap -->
                    <div class="text-center py-3">
                        <nav aria-label="مثال ناوبری صفحه" class="pagination-box">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="قبلی">
                                        <span aria-hidden="true"><i class="la la-arrow-right"></i></span>
                                        <span class="sr-only">قبلی</span>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="بعد">
                                        <span aria-hidden="true"><i class="la la-arrow-left"></i></span>
                                        <span class="sr-only">بعد</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <p class="fs-14 pt-2">نمایش 1-4 از 16 نتیجه</p>
                    </div>
@endsection
