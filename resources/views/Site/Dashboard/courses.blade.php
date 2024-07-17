@extends('admin')
@section('main')
                    <div class="dashboard-heading mb-5">
                        <h3 class="fs-22 font-weight-semi-bold">دوره های من</h3>
                    </div>
                    <div class="dashboard-cards mb-5">
                        <div class="card card-item card-item-list-layout">
                            <div class="card-image">
                                <a href="course-details.html" class="d-block">
                                    <img class="card-img-top" src="images/img8.jpg" alt="درپوش تصویر کارت" />
                                </a>
                                <div class="course-badge-labels">
                                    <div class="course-badge">دوره پرفروش</div>
                                    <div class="course-badge blue">-39٪</div>
                                </div>
                            </div>

                            <div class="card-body">
                                <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">همه مراحل</h6>
                                <h5 class="card-title"><a href="course-details.html">دوره جامع خانواده</a></h5>
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
                                <ul class="card-duration d-flex align-items-center fs-15 pb-2">
                                    <li class="mr-2">
                                        <span class="text-black">وضعیت: </span>
                                        <span class="badge badge-success text-white">منتشر شد</span>
                                    </li>
                                    <li class="mr-2">
                                        <span class="text-black">مدت زمان: </span>
                                        <span>3 ساعت 20 دقیقه</span>
                                    </li>
                                    <li class="mr-2">
                                        <span class="text-black">دانش آموزان: </span>
                                        <span>30405</span>
                                    </li>
                                </ul>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="card-price text-black font-weight-bold">1000</p>
                                    <div class="card-action-wrap pl-3">
                                        <a href="course-details.html" class="icon-element icon-element-sm shadow-sm cursor-pointer ml-1 text-success" data-toggle="tooltip" data-placement="top" data-title="مشاهده">
                                            <i class="la la-eye"></i>
                                        </a>
                                        <div class="icon-element icon-element-sm shadow-sm cursor-pointer ml-1 text-secondary" data-toggle="tooltip" data-placement="top" data-title="ویرایش"><i class="la la-edit"></i></div>
                                        <div class="icon-element icon-element-sm shadow-sm cursor-pointer ml-1 text-danger" data-toggle="tooltip" data-placement="top" title="حذف">
                                            <span data-toggle="modal" data-target="#itemDeleteModal" class="w-100 h-100 d-inline-block"><i class="la la-trash"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card card-item card-item-list-layout">
                            <div class="card-image">
                                <a href="course-details.html" class="d-block">
                                    <img class="card-img-top" src="images/img9.jpg" alt="درپوش تصویر کارت" />
                                </a>
                                <div class="course-badge-labels">
                                    <div class="course-badge">دوره پرفروش</div>
                                    <div class="course-badge blue">-39٪</div>
                                </div>
                            </div>

                            <div class="card-body">
                                <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">همه مراحل</h6>
                                <h5 class="card-title"><a href="course-details.html">دوره جامع خانواده</a></h5>
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
                                <ul class="card-duration d-flex align-items-center fs-15 pb-2">
                                    <li class="mr-2">
                                        <span class="text-black">وضعیت: </span>
                                        <span class="badge badge-danger text-white">لغو شد</span>
                                    </li>
                                    <li class="mr-2">
                                        <span class="text-black">مدت زمان: </span>
                                        <span>3 ساعت 20 دقیقه</span>
                                    </li>
                                    <li class="mr-2">
                                        <span class="text-black">دانش آموزان: </span>
                                        <span>30405</span>
                                    </li>
                                </ul>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="card-price text-black font-weight-bold">1000</p>
                                    <div class="card-action-wrap pl-3">
                                        <a href="course-details.html" class="icon-element icon-element-sm shadow-sm cursor-pointer ml-1 text-success" data-toggle="tooltip" data-placement="top" data-title="مشاهده">
                                            <i class="la la-eye"></i>
                                        </a>
                                        <div class="icon-element icon-element-sm shadow-sm cursor-pointer ml-1 text-secondary" data-toggle="tooltip" data-placement="top" data-title="ویرایش"><i class="la la-edit"></i></div>
                                        <div class="icon-element icon-element-sm shadow-sm cursor-pointer ml-1 text-danger" data-toggle="tooltip" data-placement="top" title="حذف">
                                            <span data-toggle="modal" data-target="#itemDeleteModal" class="w-100 h-100 d-inline-block"><i class="la la-trash"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card card-item card-item-list-layout">
                            <div class="card-image">
                                <a href="course-details.html" class="d-block">
                                    <img class="card-img-top" src="images/img10.jpg" alt="درپوش تصویر کارت" />
                                </a>
                                <div class="course-badge-labels">
                                    <div class="course-badge">دوره پرفروش</div>
                                    <div class="course-badge blue">-39٪</div>
                                </div>
                            </div>

                            <div class="card-body">
                                <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">همه مراحل</h6>
                                <h5 class="card-title"><a href="course-details.html">دوره جامع خانواده</a></h5>
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
                                <ul class="card-duration d-flex align-items-center fs-15 pb-2">
                                    <li class="mr-2">
                                        <span class="text-black">وضعیت: </span>
                                        <span class="badge badge-success text-white">منتشر شد</span>
                                    </li>
                                    <li class="mr-2">
                                        <span class="text-black">مدت زمان: </span>
                                        <span>3 ساعت 20 دقیقه</span>
                                    </li>
                                    <li class="mr-2">
                                        <span class="text-black">دانش آموزان: </span>
                                        <span>30405</span>
                                    </li>
                                </ul>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="card-price text-black font-weight-bold">1000</p>
                                    <div class="card-action-wrap pl-3">
                                        <a href="course-details.html" class="icon-element icon-element-sm shadow-sm cursor-pointer ml-1 text-success" data-toggle="tooltip" data-placement="top" data-title="مشاهده">
                                            <i class="la la-eye"></i>
                                        </a>
                                        <div class="icon-element icon-element-sm shadow-sm cursor-pointer ml-1 text-secondary" data-toggle="tooltip" data-placement="top" data-title="ویرایش"><i class="la la-edit"></i></div>
                                        <div class="icon-element icon-element-sm shadow-sm cursor-pointer ml-1 text-danger" data-toggle="tooltip" data-placement="top" title="حذف">
                                            <span data-toggle="modal" data-target="#itemDeleteModal" class="w-100 h-100 d-inline-block"><i class="la la-trash"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card card-item card-item-list-layout">
                            <div class="card-image">
                                <a href="course-details.html" class="d-block">
                                    <img class="card-img-top" src="images/img11.jpg" alt="درپوش تصویر کارت" />
                                </a>
                                <div class="course-badge-labels">
                                    <div class="course-badge">دوره پرفروش</div>
                                    <div class="course-badge blue">-39٪</div>
                                </div>
                            </div>

                            <div class="card-body">
                                <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">همه مراحل</h6>
                                <h5 class="card-title"><a href="course-details.html">دوره جامع خانواده</a></h5>
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
                                <ul class="card-duration d-flex align-items-center fs-15 pb-2">
                                    <li class="mr-2">
                                        <span class="text-black">وضعیت: </span>
                                        <span class="badge badge-success text-white">منتشر شد</span>
                                    </li>
                                    <li class="mr-2">
                                        <span class="text-black">مدت زمان: </span>
                                        <span>3 ساعت 20 دقیقه</span>
                                    </li>
                                    <li class="mr-2">
                                        <span class="text-black">دانش آموزان: </span>
                                        <span>30405</span>
                                    </li>
                                </ul>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="card-price text-black font-weight-bold">12.99 <span class="before-price font-weight-medium">1000</span></p>
                                    <div class="card-action-wrap pl-3">
                                        <a href="course-details.html" class="icon-element icon-element-sm shadow-sm cursor-pointer ml-1 text-success" data-toggle="tooltip" data-placement="top" data-title="مشاهده">
                                            <i class="la la-eye"></i>
                                        </a>
                                        <div class="icon-element icon-element-sm shadow-sm cursor-pointer ml-1 text-secondary" data-toggle="tooltip" data-placement="top" data-title="ویرایش"><i class="la la-edit"></i></div>
                                        <div class="icon-element icon-element-sm shadow-sm cursor-pointer ml-1 text-danger" data-toggle="tooltip" data-placement="top" title="حذف">
                                            <span data-toggle="modal" data-target="#itemDeleteModal" class="w-100 h-100 d-inline-block"><i class="la la-trash"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

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
