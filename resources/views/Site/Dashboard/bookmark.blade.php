@extends('admin')
@section('main')
                    <div class="dashboard-heading mb-5">
                        <h3 class="fs-22 font-weight-semi-bold">نشان شده های من</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 responsive-column-half">
                            <div class="card card-item">
                                <div class="card-image">
                                    <a href="course-details.html" class="d-block">
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
                                    <h5 class="card-title"><a href="course-details.html">دوره خانواده </a></h5>
                                    <p class="card-text"><a href="teacher-detail.html">استاد محمدباقر حیدری کاشانی</a></p>
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
                                        <p class="card-price text-black font-weight-bold">12.99 <span class="before-price font-weight-medium">1000</span></p>
                                        <div class="icon-element icon-element-sm shadow-sm cursor-pointer" data-toggle="tooltip" data-placement="top" title="حذف از لیست علاقه مندی ها"><i class="la la-heart"></i></div>
                                    </div>
                                </div>
                                <!-- end card-body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col-lg-4 -->
                        <div class="col-lg-4 responsive-column-half">
                            <div class="card card-item">
                                <div class="card-image">
                                    <a href="course-details.html" class="d-block">
                                        <img class="card-img-top" src="images/img9.jpg" alt="درپوش تصویر کارت" />
                                    </a>
                                    <div class="course-badge-labels">
                                        <div class="course-badge red">ویژه</div>
                                    </div>
                                </div>
                                <!-- end card-image -->
                                <div class="card-body">
                                    <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">همه مراحل</h6>
                                    <h5 class="card-title"><a href="course-details.html">دوره خانواده </a></h5>
                                    <p class="card-text"><a href="teacher-detail.html">استاد محمدباقر حیدری کاشانی</a></p>
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
                                        <p class="card-price text-black font-weight-bold">1000</p>
                                        <div class="icon-element icon-element-sm shadow-sm cursor-pointer" data-toggle="tooltip" data-placement="top" title="حذف از لیست علاقه مندی ها"><i class="la la-heart"></i></div>
                                    </div>
                                </div>
                                <!-- end card-body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col-lg-4 -->
                        <div class="col-lg-4 responsive-column-half">
                            <div class="card card-item">
                                <div class="card-image">
                                    <a href="course-details.html" class="d-block">
                                        <img class="card-img-top" src="images/img10.jpg" alt="درپوش تصویر کارت" />
                                    </a>
                                </div>
                                <!-- end card-image -->
                                <div class="card-body">
                                    <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">همه مراحل</h6>
                                    <h5 class="card-title"><a href="course-details.html">دوره خانواده </a></h5>
                                    <p class="card-text"><a href="teacher-detail.html">استاد محمدباقر حیدری کاشانی</a></p>
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
                                        <p class="card-price text-black font-weight-bold">1000</p>
                                        <div class="icon-element icon-element-sm shadow-sm cursor-pointer" data-toggle="tooltip" data-placement="top" title="حذف از لیست علاقه مندی ها"><i class="la la-heart"></i></div>
                                    </div>
                                </div>
                                <!-- end card-body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col-lg-4 -->
                    </div>
                    <!-- end row -->
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
