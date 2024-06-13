@extends('master')
@section('main')
        <section class="breadcrumb-area section-padding img-bg-2">
            <div class="overlay"></div>
            <div class="container">
                <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between">
                    <div class="section-heading">
                        <h2 class="section__title text-white">سبد خرید</h2>
                    </div>
                    <ul class="generic-list-item generic-list-item-white generic-list-item-arrow d-flex flex-wrap align-items-center">
                        <li><a href="index.html">صفحه اصلی</a></li>
                        <li>صفحات</li>
                        <li>سبد خرید</li>
                    </ul>
                </div>
                <!-- end breadcrumb-content -->
            </div>
            <!-- end container -->
        </section>

        <section class="cart-area section-padding">
            <div class="container">
                <div class="table-responsive">
                    <table class="table generic-table">
                        <thead>
                            <tr>
                                <th scope="col">تصویر</th>
                                <th scope="col">مشخصات محصول</th>
                                <th scope="col">قیمت</th>
                                <th scope="col">تعداد</th>
                                <th scope="col">عمل</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">
                                    <div class="media media-card">
                                        <a href="{{route('coursedetail')}}" class="media-img mr-0">
                                            <img src="images/small-img.jpg" alt="تصویر سبد خرید" />
                                        </a>
                                    </div>
                                </th>
                                <td>
                                    <a href="{{route('coursedetail')}}" class="text-black font-weight-semi-bold">دوره جامع خانواده</a>
                                    <p class="fs-14 text-gray lh-20">
                                        توسط <a href="teacher-detail.html" class="text-color hover-underline">استاد حیدری کاشانی</a>
                                        دوره جامع تربیت کودک فرزند پسر و فرزند دختر
                                    </p>
                                </td>
                                <td>
                                    <ul class="generic-list-item font-weight-semi-bold">
                                        <li class="text-black lh-18">10000 تومان</li>
                                        <li class="before-price lh-18">10000 تومان</li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="quantity-item d-flex align-items-center">
                                        <button class="qtyBtn qtyDec"><i class="la la-minus"></i></button>
                                        <input class="qtyInput" type="text" name="qty-input" value="1" />
                                        <button class="qtyBtn qtyInc"><i class="la la-plus"></i></button>
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="icon-element icon-element-xs shadow-sm border-0" data-toggle="tooltip" data-placement="top" title="برداشتن">
                                        <i class="la la-times"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="media media-card">
                                        <a href="{{route('coursedetail')}}" class="media-img mr-0">
                                            <img src="images/small-img.jpg" alt="تصویر سبد خرید" />
                                        </a>
                                    </div>
                                </th>
                                <td>
                                    <a href="{{route('coursedetail')}}" class="text-black font-weight-semi-bold">دوره جامع خانواده</a>
                                    <p class="fs-14 text-gray lh-20">
                                        توسط <a href="teacher-detail.html" class="text-color hover-underline">استاد حیدری کاشانی</a>دوره جامع تربیت کودک فرزند پسر و فرزند دختر
                                    </p>
                                </td>
                                <td>
                                    <ul class="generic-list-item font-weight-semi-bold">
                                        <li class="text-black lh-18">10000 تومان</li>
                                        <li class="before-price lh-18">10000 تومان</li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="quantity-item d-flex align-items-center">
                                        <button class="qtyBtn qtyDec"><i class="la la-minus"></i></button>
                                        <input class="qtyInput" type="text" name="qty-input" value="1" />
                                        <button class="qtyBtn qtyInc"><i class="la la-plus"></i></button>
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="icon-element icon-element-xs shadow-sm border-0" data-toggle="tooltip" data-placement="top" title="برداشتن">
                                        <i class="la la-times"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="d-flex flex-wrap align-items-center justify-content-between pt-4">
                        <form method="post">
                            <div class="input-group mb-2">
                                <input class="form-control form--control pl-3" type="text" name="search" placeholder="کد کوپن" />
                                <div class="input-group-append">
                                    <button class="btn theme-btn">کد را اعمال کنید</button>
                                </div>
                            </div>
                        </form>
                        <a href="#" class="btn theme-btn mb-2">به روز رسانی سبد خرید</a>
                    </div>
                </div>
                <div class="col-lg-4 ml-auto">
                    <div class="bg-gray p-4 rounded-rounded mt-40px">
                        <h3 class="fs-18 font-weight-bold pb-3">مجموع سبد خرید</h3>
                        <div class="divider"><span></span></div>
                        <ul class="generic-list-item pb-4">
                            <li class="d-flex align-items-center justify-content-between font-weight-semi-bold">
                                <span class="text-black">جمع فرعی: </span>
                                <span>44.99 تومان</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-between font-weight-semi-bold">
                                <span class="text-black">مجموع: </span>
                                <span>44.99 تومان</span>
                            </li>
                        </ul>
                        <a href="{{route('checkout')}}" class="btn theme-btn w-100">پرداخت <i class="la la-arrow-left icon ml-1"></i></a>
                    </div>
                </div>
            </div>
            <!-- end container -->
        </section>

        <section class="course-area section--padding bg-gray">
            <div class="course-wrapper">
                <div class="container">
                    <div class="section-heading">
                        <h2 class="section__title">شما هم ممکن است دوست داشته باشید</h2>
                    </div>
                    <!-- end section-heading -->
                    <div class="course-carousel owl-action-styled owl--action-styled mt-30px">
                        <div class="card card-item">
                            <div class="card-image">
                                <a href="{{route('coursedetail')}}" class="d-block">
                                    <img class="card-img-top" src="images/img8.jpg" alt="درپوش تصویر کارت" />
                                </a>
                                <div class="course-badge-labels">
                                    <div class="course-badge">کتاب پرفروش</div>
                                    <div class="course-badge blue">-39٪</div>
                                </div>
                            </div>
                            <!-- end card-image -->
                            <div class="card-body">
                                <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">همه مراحل</h6>
                                <h5 class="card-title"><a href="{{route('coursedetail')}}">دوره کامل کسب و کار وب سایت وردپرس</a></h5>
                                <p class="card-text"><a href="teacher-detail.html">خوزه پورتیلا</a></p>
                                <div class="rating-wrap d-flex align-items-center py-2">
                                    <div class="review-stars">
                                        <span class="rating-number">4.4</span>
                                        <span class="la la-star"></span>
                                        <span class="la la-star"></span>
                                        <span class="la la-star"></span>
                                        <span class="la la-star"></span>
                                        <span class="la la-star-o"></span>
                                    </div>
                                    <span class="rating-total pl-1">(20230)</span>
                                </div>
                                <!-- end rating-wrap -->
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="card-price text-black font-weight-bold">12.99 <span class="before-price font-weight-medium">129.99</span></p>
                                    <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="به لیست علاقه مندی ها اضافه کنید"><i class="la la-heart-o"></i></div>
                                </div>
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                        <div class="card card-item">
                            <div class="card-image">
                                <a href="{{route('coursedetail')}}" class="d-block">
                                    <img class="card-img-top" src="images/img9.jpg" alt="درپوش تصویر کارت" />
                                </a>
                                <div class="course-badge-labels">
                                    <div class="course-badge">کتاب پرفروش</div>
                                </div>
                            </div>
                            <!-- end card-image -->
                            <div class="card-body">
                                <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">همه مراحل</h6>
                                <h5 class="card-title"><a href="{{route('coursedetail')}}">دوره کامل کسب و کار وب سایت وردپرس</a></h5>
                                <p class="card-text"><a href="teacher-detail.html">خوزه پورتیلا</a></p>
                                <div class="rating-wrap d-flex align-items-center py-2">
                                    <div class="review-stars">
                                        <span class="rating-number">4.4</span>
                                        <span class="la la-star"></span>
                                        <span class="la la-star"></span>
                                        <span class="la la-star"></span>
                                        <span class="la la-star"></span>
                                        <span class="la la-star-o"></span>
                                    </div>
                                    <span class="rating-total pl-1">(20230)</span>
                                </div>
                                <!-- end rating-wrap -->
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="card-price text-black font-weight-bold">129.99</p>
                                    <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="به لیست علاقه مندی ها اضافه کنید"><i class="la la-heart-o"></i></div>
                                </div>
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                        <div class="card card-item">
                            <div class="card-image">
                                <a href="{{route('coursedetail')}}" class="d-block">
                                    <img class="card-img-top" src="images/img10.jpg" alt="درپوش تصویر کارت" />
                                </a>
                                <div class="course-badge-labels">
                                    <div class="course-badge green">رایگان</div>
                                </div>
                            </div>
                            <!-- end card-image -->
                            <div class="card-body">
                                <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">همه مراحل</h6>
                                <h5 class="card-title"><a href="{{route('coursedetail')}}">دوره کامل کسب و کار وب سایت وردپرس</a></h5>
                                <p class="card-text"><a href="teacher-detail.html">خوزه پورتیلا</a></p>
                                <div class="rating-wrap d-flex align-items-center py-2">
                                    <div class="review-stars">
                                        <span class="rating-number">4.4</span>
                                        <span class="la la-star"></span>
                                        <span class="la la-star"></span>
                                        <span class="la la-star"></span>
                                        <span class="la la-star"></span>
                                        <span class="la la-star-o"></span>
                                    </div>
                                    <span class="rating-total pl-1">(20230)</span>
                                </div>
                                <!-- end rating-wrap -->
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="card-price text-black font-weight-bold">رایگان</p>
                                    <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="به لیست علاقه مندی ها اضافه کنید"><i class="la la-heart-o"></i></div>
                                </div>
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                        <div class="card card-item">
                            <div class="card-image">
                                <a href="{{route('coursedetail')}}" class="d-block">
                                    <img class="card-img-top" src="images/img11.jpg" alt="درپوش تصویر کارت" />
                                </a>
                            </div>
                            <!-- end card-image -->
                            <div class="card-body">
                                <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">همه مراحل</h6>
                                <h5 class="card-title"><a href="{{route('coursedetail')}}">دوره کامل کسب و کار وب سایت وردپرس</a></h5>
                                <p class="card-text"><a href="teacher-detail.html">خوزه پورتیلا</a></p>
                                <div class="rating-wrap d-flex align-items-center py-2">
                                    <div class="review-stars">
                                        <span class="rating-number">4.4</span>
                                        <span class="la la-star"></span>
                                        <span class="la la-star"></span>
                                        <span class="la la-star"></span>
                                        <span class="la la-star"></span>
                                        <span class="la la-star-o"></span>
                                    </div>
                                    <span class="rating-total pl-1">(20230)</span>
                                </div>
                                <!-- end rating-wrap -->
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="card-price text-black font-weight-bold">129.99</p>
                                    <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="به لیست علاقه مندی ها اضافه کنید"><i class="la la-heart-o"></i></div>
                                </div>
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                        <div class="card card-item">
                            <div class="card-image">
                                <a href="{{route('coursedetail')}}" class="d-block">
                                    <img class="card-img-top" src="images/img12.jpg" alt="درپوش تصویر کارت" />
                                </a>
                                <div class="course-badge-labels">
                                    <div class="course-badge">ویژه</div>
                                </div>
                            </div>
                            <!-- end card-image -->
                            <div class="card-body">
                                <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">همه مراحل</h6>
                                <h5 class="card-title"><a href="{{route('coursedetail')}}">دوره کامل کسب و کار وب سایت وردپرس</a></h5>
                                <p class="card-text"><a href="teacher-detail.html">خوزه پورتیلا</a></p>
                                <div class="rating-wrap d-flex align-items-center py-2">
                                    <div class="review-stars">
                                        <span class="rating-number">4.4</span>
                                        <span class="la la-star"></span>
                                        <span class="la la-star"></span>
                                        <span class="la la-star"></span>
                                        <span class="la la-star"></span>
                                        <span class="la la-star-o"></span>
                                    </div>
                                    <span class="rating-total pl-1">(20230)</span>
                                </div>
                                <!-- end rating-wrap -->
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="card-price text-black font-weight-bold">129.99</p>
                                    <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="به لیست علاقه مندی ها اضافه کنید"><i class="la la-heart-o"></i></div>
                                </div>
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                        <div class="card card-item">
                            <div class="card-image">
                                <a href="{{route('coursedetail')}}" class="d-block">
                                    <img class="card-img-top" src="images/img13.jpg" alt="درپوش تصویر کارت" />
                                </a>
                                <div class="course-badge-labels">
                                    <div class="course-badge">ویژه</div>
                                </div>
                            </div>
                            <!-- end card-image -->
                            <div class="card-body">
                                <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">همه مراحل</h6>
                                <h5 class="card-title"><a href="{{route('coursedetail')}}">دوره کامل کسب و کار وب سایت وردپرس</a></h5>
                                <p class="card-text"><a href="teacher-detail.html">خوزه پورتیلا</a></p>
                                <div class="rating-wrap d-flex align-items-center py-2">
                                    <div class="review-stars">
                                        <span class="rating-number">4.4</span>
                                        <span class="la la-star"></span>
                                        <span class="la la-star"></span>
                                        <span class="la la-star"></span>
                                        <span class="la la-star"></span>
                                        <span class="la la-star-o"></span>
                                    </div>
                                    <span class="rating-total pl-1">(20230)</span>
                                </div>
                                <!-- end rating-wrap -->
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="card-price text-black font-weight-bold">129.99</p>
                                    <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="به لیست علاقه مندی ها اضافه کنید"><i class="la la-heart-o"></i></div>
                                </div>
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end tab-content -->
                </div>
                <!-- end container -->
            </div>
            <!-- end course-wrapper -->
        </section>
@endsection
