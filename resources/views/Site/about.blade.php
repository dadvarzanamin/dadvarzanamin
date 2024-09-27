{{--@extends('master')--}}
{{--@section('main')--}}

{{--    <section class="breadcrumb-area pt-50px pb-50px bg-white">--}}
{{--        <div class="container">--}}
{{--            <div class="col-lg-8 mr-auto">--}}
{{--                <div class="breadcrumb-content">--}}
{{--                    <ul class="generic-list-item generic-list-item-arrow d-flex flex-wrap align-items-center">--}}
{{--                        <li><a href="{{url('/')}}">صفحه اصلی</a></li>--}}
{{--                        <li><a href="#">کارگاه حل اختلاف</a></li>--}}
{{--                    </ul>--}}
{{--                    <div class="section-heading">--}}
{{--                        <h2 class="section__title">کارگاه قانون جدید شورای حل اختلاف</h2>--}}
{{--                        <p class="section__desc pt-2 lh-30">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و--}}
{{--                            با استفاده لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                    <div class="d-flex flex-wrap align-items-center pt-3">--}}
{{--                        <h6 class="ribbon ribbon-lg mr-2 bg-3 text-white">دوره ممتاز</h6>--}}
{{--                        <div class="rating-wrap d-flex flex-wrap align-items-center">--}}
{{--                            <div class="review-stars">--}}
{{--                                <span class="rating-number">4.4</span>--}}
{{--                                <span class="la la-star"></span>--}}
{{--                                <span class="la la-star"></span>--}}
{{--                                <span class="la la-star"></span>--}}
{{--                                <span class="la la-star"></span>--}}
{{--                                <span class="la la-star-o"></span>--}}
{{--                            </div>--}}
{{--                            <span class="rating-total pl-1">(20,230 رتبه بندی) </span>--}}
{{--                            <span class="student-total pl-2">540,815 دانش آموز</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <p class="pt-2 pb-1">ارائه توسط توسط <a href="teacher-detail.html" class="text-color hover-underline">استاد ابراهیمی </a></p>--}}
{{--                    <div class="d-flex flex-wrap align-items-center">--}}
{{--                        <p class="pr-3 d-flex align-items-center">--}}
{{--                            <svg class="svg-icon-color-gray mr-1" width="16px" viewBox="0 0 24 24">--}}
{{--                                <path--}}
{{--                                    d="M23 12l-2.44-2.78.34-3.68-3.61-.82-1.89-3.18L12 3 8.6 1.54 6.71 4.72l-3.61.81.34 3.68L1 12l2.44 2.78-.34 3.69 3.61.82 1.89 3.18L12 21l3.4 1.46 1.89-3.18 3.61-.82-.34-3.68L23 12zm-10 5h-2v-2h2v2zm0-4h-2V7h2v6z"--}}
{{--                                ></path>--}}
{{--                            </svg>--}}
{{--                            آخرین به روز رسانی 2 آذر 1403--}}
{{--                        </p>--}}
{{--                        <p class="pr-3 d-flex align-items-center">--}}
{{--                            <svg class="svg-icon-color-gray mr-1" width="16px" viewBox="0 0 24 24">--}}
{{--                                <path--}}
{{--                                    d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zm6.93 6h-2.95a15.65 15.65 0 00-1.38-3.56A8.03 8.03 0 0118.92 8zM12 4.04c.83 1.2 1.48 2.53 1.91 3.96h-3.82c.43-1.43 1.08-2.76 1.91-3.96zM4.26 14C4.1 13.36 4 12.69 4 12s.1-1.36.26-2h3.38c-.08.66-.14 1.32-.14 2s.06 1.34.14 2H4.26zm.82 2h2.95c.32 1.25.78 2.45 1.38 3.56A7.987 7.987 0 015.08 16zm2.95-8H5.08a7.987 7.987 0 014.33-3.56A15.65 15.65 0 008.03 8zM12 19.96c-.83-1.2-1.48-2.53-1.91-3.96h3.82c-.43 1.43-1.08 2.76-1.91 3.96zM14.34 14H9.66c-.09-.66-.16-1.32-.16-2s.07-1.35.16-2h4.68c.09.65.16 1.32.16 2s-.07 1.34-.16 2zm.25 5.56c.6-1.11 1.06-2.31 1.38-3.56h2.95a8.03 8.03 0 01-4.33 3.56zM16.36 14c.08-.66.14-1.32.14-2s-.06-1.34-.14-2h3.38c.16.64.26 1.31.26 2s-.1 1.36-.26 2h-3.38z"--}}
{{--                                ></path>--}}
{{--                            </svg>--}}
{{--                            فارسی--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                    <div class="bread-btn-box pt-3">--}}
{{--                        <button class="btn theme-btn theme-btn-sm theme-btn-transparent lh-28 mr-2 mb-2">--}}
{{--                            <i class="la la-heart-o mr-1"></i>--}}
{{--                            <span class="swapping-btn" data-text-swap="Wishlisted" data-text-original="Wishlist">لیست علاقه مندیها</span>--}}
{{--                        </button>--}}
{{--                        <button class="btn theme-btn theme-btn-sm theme-btn-transparent lh-28 mr-2 mb-2" data-toggle="modal" data-target="#shareModal"><i class="la la-share mr-1"></i>اشتراک گذاری</button>--}}
{{--                        <button class="btn theme-btn theme-btn-sm theme-btn-transparent lh-28 mb-2" data-toggle="modal" data-target="#reportModal"><i class="la la-flag mr-1"></i>گزارش سوءاستفاده</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

{{--    <section class="course-details-area pb-20px">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-8 pb-5">--}}
{{--                    <div class="course-details-content-wrap pt-90px">--}}
{{--                        <div class="course-overview-card bg-gray p-4 rounded">--}}
{{--                            <h3 class="fs-24 font-weight-semi-bold pb-3">چه چیزی یاد خواهید گرفت؟</h3>--}}
{{--                            <ul class="generic-list-item overview-list-item">--}}
{{--                                <li><i class="la la-check mr-1 text-black"></i>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</li>--}}
{{--                                <li><i class="la la-check mr-1 text-black"></i>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</li>--}}
{{--                                <li><i class="la la-check mr-1 text-black"></i>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</li>--}}
{{--                                <li><i class="la la-check mr-1 text-black"></i>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</li>--}}
{{--                                <li><i class="la la-check mr-1 text-black"></i>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</li>--}}
{{--                                <li><i class="la la-check mr-1 text-black"></i>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}

{{--                        --}}{{--                        <div class="course-overview-card bg-gray p-4 rounded">--}}
{{--                        --}}{{--                            <h3 class="fs-16 font-weight-semi-bold">پشتیبانی از دوره <a href=# class="text-color hover-underline">جامع خانواده </a>با محمد امینی</h3>--}}
{{--                        --}}{{--                        </div>--}}

{{--                        <div class="course-overview-card">--}}
{{--                            <h3 class="fs-24 font-weight-semi-bold pb-3">الزامات</h3>--}}
{{--                            <ul class="generic-list-item generic-list-item-bullet fs-15">--}}
{{--                                <li>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</li>--}}
{{--                                <li>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</li>--}}
{{--                                <li>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}

{{--                        --}}{{--                        <div class="course-overview-card border border-gray p-4 rounded">--}}
{{--                        --}}{{--                            <h3 class="fs-20 font-weight-semi-bold">شرکت های برتر به ما اعتماد دارند</h3>--}}
{{--                        --}}{{--                            <p class="fs-15 pb-1">دسترسی تیم خود را به بیش از 5000 دوره برتر ما داشته باشید</p>--}}
{{--                        --}}{{--                            <div class="pb-3">--}}
{{--                        --}}{{--                                <img width="85" class="mr-3" src="images/sponsor-img.png" alt="آرم شرکت" />--}}
{{--                        --}}{{--                                <img width="80" class="mr-3" src="images/sponsor-img2.png" alt="آرم شرکت" />--}}
{{--                        --}}{{--                                <img width="80" class="mr-3" src="images/sponsor-img3.png" alt="آرم شرکت" />--}}
{{--                        --}}{{--                                <img width="70" class="mr-3" src="images/sponsor-img4.png" alt="آرم شرکت" />--}}
{{--                        --}}{{--                            </div>--}}
{{--                        --}}{{--                            <a href="for-business.html" class="btn theme-btn theme-btn-sm">ما برای کسب و کار</a>--}}
{{--                        --}}{{--                        </div>--}}

{{--                        <div class="course-overview-card">--}}
{{--                            <h3 class="fs-24 font-weight-semi-bold pb-3">شرح</h3>--}}
{{--                            <p class="fs-15 pb-2">--}}
{{--                                لورم ایپسوم از دهه 1500، زمانی که یک چاپگر ناشناخته یک گالری از نوع را گرفت و آن را به هم زد تا یک دوره نمونه تایپ بسازد، متن ساختگی استاندارد صنعت بوده است. این نه تنها پنج قرن زنده مانده است، بلکه لورم--}}
{{--                                ایپسوم متن ساختگی استاندارد صنعت از دهه 1500 بوده است، زمانی که یک چاپگر ناشناخته یک گالی از نوع را برداشت و آن را به هم زد تا یک دوره نمونه بسازد.--}}
{{--                            </p>--}}
{{--                            <p class="fs-15 pb-2">--}}
{{--                                این نه تنها پنج قرن زنده مانده است، بلکه جهشی به حروفچینی الکترونیکی نیز باقی مانده است و اساساً بدون تغییر باقی مانده است. لورم ایپسوم صرفاً متن ساختگی صنعت چاپ و حروفچینی است. لورم ایپسوم ساختگی--}}
{{--                                استاندارد این صنعت بوده است--}}
{{--                            </p>--}}
{{--                            <p class="fs-15 pb-1">- لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</p>--}}
{{--                            <p class="fs-15 pb-1">- لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</p>--}}
{{--                            <p class="fs-15 pb-1">- لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</p>--}}
{{--                            <p class="fs-15 pt-3 pb-2 lh-22">--}}
{{--                                <strong class="font-weight-semi-bold text-black"> لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</strong></p>--}}
{{--                            <p class="fs-15 pb-2"> لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</p>--}}
{{--                            <div class="collapse" id="collapseMore">--}}
{{--                                <p class="fs-15 pb-2"> لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</p>--}}
{{--                                <h4 class="fs-20 font-weight-semi-bold py-2">این دوره برای چه کسانی است:</h4>--}}
{{--                                <ul class="generic-list-item generic-list-item-bullet fs-15">--}}
{{--                                    <li>- لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</li>--}}
{{--                                    <li>- لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</li>--}}
{{--                                    <li>- لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <a class="collapse-btn collapse--btn fs-15" data-toggle="collapse" href="#collapseMore" role="button" aria-expanded="false" aria-controls="collapseMore">--}}
{{--                                <span class="collapse-btn-hide">بیشتر نشان بده، اطلاعات بیشتر<i class="la la-angle-down ml-1 fs-14"></i></span>--}}
{{--                                <span class="collapse-btn-show">کمتر نشان دادن<i class="la la-angle-up ml-1 fs-14"></i></span>--}}
{{--                            </a>--}}
{{--                        </div>--}}

{{--                        <div class="course-overview-card">--}}
{{--                            <div class="curriculum-header d-flex align-items-center justify-content-between pb-4">--}}
{{--                                <h3 class="fs-24 font-weight-semi-bold">محتوای دوره</h3>--}}
{{--                                <div class="curriculum-duration fs-15">--}}
{{--                                    <span class="curriculum-total__text mr-2"><strong class="text-black font-weight-semi-bold">مجموع:</strong> 17 جلسه </span>--}}
{{--                                    <span class="curriculum-total__hours"><strong class="text-black font-weight-semi-bold">کل ساعت:</strong> 02:35:47</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="curriculum-content">--}}
{{--                                <div id="accordion" class="generic-accordion">--}}
{{--                                    <div class="card">--}}
{{--                                        <div class="card-header" id="headingOne">--}}
{{--                                            <button class="btn btn-link d-flex align-items-center justify-content-between" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">--}}
{{--                                                <i class="la la-plus"></i>--}}
{{--                                                <i class="la la-minus"></i>--}}
{{--                                                معرفی دوره--}}
{{--                                                <span class="fs-15 text-gray font-weight-medium">6 جلسه</span>--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                        <!-- end card-header -->--}}
{{--                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">--}}
{{--                                            <div class="card-body">--}}
{{--                                                <ul class="generic-list-item">--}}
{{--                                                    <li>--}}
{{--                                                        <a href="#" class="d-flex align-items-center justify-content-between text-color" data-toggle="modal" data-target="#previewModal">--}}
{{--                                                                <span>--}}
{{--                                                                    <i class="la la-play-circle mr-1"></i>--}}
{{--                                                                    مقدمه دوره--}}
{{--                                                                    <span class="ribbon ml-2 fs-13">پیش نمایش</span>--}}
{{--                                                                </span>--}}
{{--                                                            <span>02:27</span>--}}
{{--                                                        </a>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="d-flex align-items-center justify-content-between">--}}
{{--                                                                <span>--}}
{{--                                                                    <i class="la la-play-circle mr-1"></i>--}}
{{--                                                                    جلسه شماره 1--}}
{{--                                                                </span>--}}
{{--                                                            <span>03:09</span>--}}
{{--                                                        </div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="d-flex align-items-center justify-content-between">--}}
{{--                                                                <span>--}}
{{--                                                                    <i class="la la-play-circle mr-1"></i>--}}
{{--                                                                    جلسه شماره 2--}}
{{--                                                                </span>--}}
{{--                                                            <span>01:16</span>--}}
{{--                                                        </div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="d-flex align-items-center justify-content-between">--}}
{{--                                                                <span>--}}
{{--                                                                    <i class="la la-play-circle mr-1"></i>--}}
{{--                                                                    جلسه شماره 3--}}
{{--                                                                </span>--}}
{{--                                                            <span>02:07</span>--}}
{{--                                                        </div>--}}
{{--                                                    </li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}

{{--                                        </div>--}}
{{--                                        <!-- end collapse -->--}}
{{--                                    </div>--}}

{{--                                    <div class="card">--}}
{{--                                        <div class="card-header" id="headingTwo">--}}
{{--                                            <button class="btn btn-link collapsed d-flex align-items-center justify-content-between" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">--}}
{{--                                                <i class="la la-plus"></i>--}}
{{--                                                <i class="la la-minus"></i>--}}
{{--                                                فصل اول--}}
{{--                                                <span class="fs-15 text-gray font-weight-medium">6 جلسه </span>--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">--}}
{{--                                            <div class="card-body">--}}
{{--                                                <ul class="generic-list-item">--}}
{{--                                                    <li>--}}
{{--                                                        <div class="d-flex align-items-center justify-content-between">--}}
{{--                                                                <span>--}}
{{--                                                                    <i class="la la-play-circle mr-1"></i>--}}
{{--                                                                    جلسه شماره 1--}}
{{--                                                                </span>--}}
{{--                                                            <span>02:27</span>--}}
{{--                                                        </div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="d-flex align-items-center justify-content-between">--}}
{{--                                                                <span>--}}
{{--                                                                    <i class="la la-file mr-1"></i>--}}
{{--جلسه شماره 2                                                                </span>--}}
{{--                                                            <span>00:16</span>--}}
{{--                                                        </div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="d-flex align-items-center justify-content-between">--}}
{{--                                                                <span>--}}
{{--                                                                    <i class="la la-play-circle mr-1"></i>--}}
{{--                                                                    جلسه شماره 3--}}
{{--                                                                </span>--}}
{{--                                                            <span>01:16</span>--}}
{{--                                                        </div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="d-flex align-items-center justify-content-between">--}}
{{--                                                                <span>--}}
{{--                                                                    <i class="la la-play-circle mr-1"></i>--}}
{{--                                                                    جلسه شماره 4--}}
{{--                                                                </span>--}}
{{--                                                            <span>02:07</span>--}}
{{--                                                        </div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="d-flex align-items-center justify-content-between">--}}
{{--                                                                <span>--}}
{{--                                                                    <i class="la la-code mr-1"></i>--}}
{{--                                                                    جلسه شماره 5--}}
{{--                                                                </span>--}}
{{--                                                            <span>1 سوال</span>--}}
{{--                                                        </div>--}}
{{--                                                    </li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}

{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="card">--}}
{{--                                        <div class="card-header" id="headingThree">--}}
{{--                                            <button--}}
{{--                                                class="btn btn-link collapsed d-flex align-items-center justify-content-between"--}}
{{--                                                data-toggle="collapse"--}}
{{--                                                data-target="#collapseThree"--}}
{{--                                                aria-expanded="false"--}}
{{--                                                aria-controls="collapseThree">--}}
{{--                                                <i class="la la-plus"></i>--}}
{{--                                                <i class="la la-minus"></i>--}}
{{--                                                فصل دوم--}}
{{--                                                <span class="fs-15 text-gray font-weight-medium">1 جلسه</span>--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">--}}
{{--                                            <div class="card-body">--}}
{{--                                                <ul class="generic-list-item">--}}
{{--                                                    <li>--}}
{{--                                                        <a href="#" class="d-flex align-items-center justify-content-between text-color" data-toggle="modal" data-target="#previewModal">--}}
{{--                                                                <span>--}}
{{--                                                                    <i class="la la-play-circle mr-1"></i>--}}
{{--                                                                    جلسه شماره 1--}}
{{--                                                                    <span class="ribbon ml-2 fs-13">تماشا</span>--}}
{{--                                                                </span>--}}
{{--                                                            <span> 02:27</span>--}}
{{--                                                        </a>--}}
{{--                                                    </li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="course-overview-card pt-4">--}}
{{--                            <h3 class="fs-24 font-weight-semi-bold pb-4">دوره های پرفروش</h3>--}}
{{--                            <div class="view-more-carousel owl-action-styled">--}}
{{--                                <div class="card card-item card-item-list-layout border border-gray shadow-none">--}}
{{--                                    <div class="card-image">--}}
{{--                                        <a href="course-details.html" class="d-block">--}}
{{--                                            <img class="card-img-top" src="{{asset('site/images/123.png')}}" alt="درپوش تصویر کارت" />--}}
{{--                                        </a>--}}
{{--                                        <div class="course-badge-labels">--}}
{{--                                            <div class="course-badge">دوره پرفروش</div>--}}
{{--                                            <div class="course-badge blue">-39٪</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="card-body">--}}
{{--                                        <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">همه مراحل</h6>--}}
{{--                                        <h5 class="card-title"><a href="course-details.html">دوره جامع کارگاه حقوقی</a></h5>--}}
{{--                                        <p class="card-text"><a href="teacher-detail.html">استاد یحیی ابراهیمی </a></p>--}}
{{--                                        <div class="rating-wrap d-flex align-items-center py-2">--}}
{{--                                            <div class="review-stars">--}}
{{--                                                <span class="rating-number">4.4</span>--}}
{{--                                                <span class="la la-star"></span>--}}
{{--                                                <span class="la la-star"></span>--}}
{{--                                                <span class="la la-star"></span>--}}
{{--                                                <span class="la la-star"></span>--}}
{{--                                                <span class="la la-star-o"></span>--}}
{{--                                            </div>--}}
{{--                                            <span class="rating-total pl-1">(20230)</span>--}}
{{--                                        </div>--}}

{{--                                        <div class="d-flex justify-content-between align-items-center">--}}
{{--                                            <p class="card-price text-black font-weight-bold">100000 تومان <span class="before-price font-weight-medium">130000 تومان</span></p>--}}
{{--                                            <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="به لیست علاقه مندی ها اضافه کنید"><i class="la la-heart-o"></i></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                </div>--}}

{{--                                <div class="card card-item card-item-list-layout border border-gray shadow-none">--}}
{{--                                    <div class="card-image">--}}
{{--                                        <a href="course-details.html" class="d-block">--}}
{{--                                            <img class="card-img-top" src="{{asset('site/images/123.png')}}" alt="درپوش تصویر کارت" />--}}
{{--                                        </a>--}}
{{--                                        <div class="course-badge-labels">--}}
{{--                                            <div class="course-badge red">ویژه</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="card-body">--}}
{{--                                        <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">همه مراحل</h6>--}}
{{--                                        <h5 class="card-title"><a href="course-details.html">دوره جامع شورای حل اختلاف </a></h5>--}}
{{--                                        <p class="card-text"><a href="teacher-detail.html">استاد یحیی ابراهیمی</a></p>--}}
{{--                                        <div class="rating-wrap d-flex align-items-center py-2">--}}
{{--                                            <div class="review-stars">--}}
{{--                                                <span class="rating-number">4.4</span>--}}
{{--                                                <span class="la la-star"></span>--}}
{{--                                                <span class="la la-star"></span>--}}
{{--                                                <span class="la la-star"></span>--}}
{{--                                                <span class="la la-star"></span>--}}
{{--                                                <span class="la la-star-o"></span>--}}
{{--                                            </div>--}}
{{--                                            <span class="rating-total pl-1">(20230)</span>--}}
{{--                                        </div>--}}

{{--                                        <div class="d-flex justify-content-between align-items-center">--}}
{{--                                            <p class="card-price text-black font-weight-bold">400000 تومان</p>--}}
{{--                                            <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="به لیست علاقه مندی ها اضافه کنید"><i class="la la-heart-o"></i></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                </div>--}}

{{--                                <div class="card card-item card-item-list-layout border border-gray shadow-none">--}}
{{--                                    <div class="card-image">--}}
{{--                                        <a href="course-details.html" class="d-block">--}}
{{--                                            <img class="card-img-top" src="{{asset('site/images/123.png')}}" alt="درپوش تصویر کارت" />--}}
{{--                                        </a>--}}
{{--                                        <div class="course-badge-labels">--}}
{{--                                            <div class="course-badge">دوره پرفروش</div>--}}
{{--                                            <div class="course-badge blue">-39٪</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="card-body">--}}
{{--                                        <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">همه مراحل</h6>--}}
{{--                                        <h5 class="card-title"><a href="course-details.html">دوره جامع کیفری</a></h5>--}}
{{--                                        <p class="card-text"><a href="teacher-detail.html">استاد علی اکبرزاده </a></p>--}}
{{--                                        <div class="rating-wrap d-flex align-items-center py-2">--}}
{{--                                            <div class="review-stars">--}}
{{--                                                <span class="rating-number">4.4</span>--}}
{{--                                                <span class="la la-star"></span>--}}
{{--                                                <span class="la la-star"></span>--}}
{{--                                                <span class="la la-star"></span>--}}
{{--                                                <span class="la la-star"></span>--}}
{{--                                                <span class="la la-star-o"></span>--}}
{{--                                            </div>--}}
{{--                                            <span class="rating-total pl-1">(20230)</span>--}}
{{--                                        </div>--}}

{{--                                        <div class="d-flex justify-content-between align-items-center">--}}
{{--                                            <p class="card-price text-black font-weight-bold">300000 تومان <span class="before-price font-weight-medium">400000 تومان</span></p>--}}
{{--                                            <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="به لیست علاقه مندی ها اضافه کنید"><i class="la la-heart-o"></i></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                </div>--}}

{{--                                <div class="card card-item card-item-list-layout border border-gray shadow-none">--}}
{{--                                    <div class="card-image">--}}
{{--                                        <a href="course-details.html" class="d-block">--}}
{{--                                            <img class="card-img-top" src="{{asset('site/images/123.png')}}" alt="درپوش تصویر کارت" />--}}
{{--                                        </a>--}}
{{--                                        <div class="course-badge-labels">--}}
{{--                                            <div class="course-badge red">ویژه</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="card-body">--}}
{{--                                        <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">همه مراحل</h6>--}}
{{--                                        <h5 class="card-title"><a href="course-details.html">دوره جامع حقوقی</a></h5>--}}
{{--                                        <p class="card-text"><a href="teacher-detail.html">استاد ابراهیمی </a></p>--}}
{{--                                        <div class="rating-wrap d-flex align-items-center py-2">--}}
{{--                                            <div class="review-stars">--}}
{{--                                                <span class="rating-number">4.4</span>--}}
{{--                                                <span class="la la-star"></span>--}}
{{--                                                <span class="la la-star"></span>--}}
{{--                                                <span class="la la-star"></span>--}}
{{--                                                <span class="la la-star"></span>--}}
{{--                                                <span class="la la-star-o"></span>--}}
{{--                                            </div>--}}
{{--                                            <span class="rating-total pl-1">(20230)</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="d-flex justify-content-between align-items-center">--}}
{{--                                            <p class="card-price text-black font-weight-bold">250000 تومان</p>--}}
{{--                                            <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="به لیست علاقه مندی ها اضافه کنید"><i class="la la-heart-o"></i></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="course-overview-card pt-4">--}}
{{--                            <h3 class="fs-24 font-weight-semi-bold pb-4">در مورد استاد</h3>--}}
{{--                            <div class="instructor-wrap">--}}
{{--                                <div class="media media-card">--}}
{{--                                    <div class="instructor-img">--}}
{{--                                        <a href="teacher-detail.html" class="media-img d-block">--}}
{{--                                            <img class="lazy" src="{{asset('site/images/123.png')}}" data-src="images/small-avatar-1.jpg" alt="تصویر آواتار" />--}}
{{--                                        </a>--}}
{{--                                        <ul class="generic-list-item pt-3">--}}
{{--                                            <li><i class="la la-star mr-2 text-color-3"></i> 4.6 رتبه بندی استاد</li>--}}
{{--                                            <li><i class="la la-user mr-2 text-color-3"></i> 45786 دانش آموز</li>--}}
{{--                                            <li><i class="la la-comment-o mr-2 text-color-3"></i> 2,533 نظر</li>--}}
{{--                                            <li><i class="la la-play-circle-o mr-2 text-color-3"></i> 24 دوره</li>--}}
{{--                                            <li><a href="teacher-detail.html">مشاهده تمام دوره ها</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <!-- end instructor-img -->--}}
{{--                                    <div class="media-body">--}}
{{--                                        <h5><a href="teacher-detail.html">وبسایت ما</a></h5>--}}
{{--                                        <span class="d-block lh-18 pt-2 pb-3">4 سال پیش پیوست</span>--}}
{{--                                        <p class="text-black lh-18 pb-3">دوره جامع شورای حقوقی </p>--}}
{{--                                        <p class="pb-3">--}}
{{--                                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد--}}
{{--                                            نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.--}}
{{--                                        </p>--}}
{{--                                        <div class="collapse" id="collapseMoreTwo">--}}
{{--                                            <p class="pb-3">--}}
{{--                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی--}}
{{--                                                مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.--}}
{{--                                            </p>--}}
{{--                                            <p class="pb-3">--}}
{{--                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.--}}
{{--                                            </p>--}}
{{--                                        </div>--}}
{{--                                        <a class="collapse-btn collapse--btn fs-15" data-toggle="collapse" href="#collapseMoreTwo" role="button" aria-expanded="false" aria-controls="collapseMoreTwo">--}}
{{--                                            <span class="collapse-btn-hide">بیشتر نشان بده، اطلاعات بیشتر<i class="la la-angle-down ml-1 fs-14"></i></span>--}}
{{--                                            <span class="collapse-btn-show">کمتر نشان دادن<i class="la la-angle-up ml-1 fs-14"></i></span>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- end instructor-wrap -->--}}
{{--                        </div>--}}

{{--                        <div class="course-overview-card pt-4">--}}
{{--                            <h3 class="fs-24 font-weight-semi-bold pb-40px">بازخورد دانش آموزان</h3>--}}
{{--                            <div class="feedback-wrap">--}}
{{--                                <div class="media media-card align-items-center">--}}
{{--                                    <div class="review-rating-summary">--}}
{{--                                        <span class="stats-average__count">4.6</span>--}}
{{--                                        <div class="rating-wrap pt-1">--}}
{{--                                            <div class="review-stars">--}}
{{--                                                <span class="la la-star"></span>--}}
{{--                                                <span class="la la-star"></span>--}}
{{--                                                <span class="la la-star"></span>--}}
{{--                                                <span class="la la-star"></span>--}}
{{--                                                <span class="la la-star-half-alt"></span>--}}
{{--                                            </div>--}}
{{--                                            <span class="rating-total d-block">(2533) </span>--}}
{{--                                            <span>رتبه بندی دوره</span>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                    <!-- end review-rating-summary -->--}}
{{--                                    <div class="media-body">--}}
{{--                                        <div class="review-bars d-flex align-items-center mb-2">--}}
{{--                                            <div class="review-bars__text">5 ستاره</div>--}}
{{--                                            <div class="review-bars__fill">--}}
{{--                                                <div class="skillbar-box">--}}
{{--                                                    <div class="skillbar" data-percent="77%">--}}
{{--                                                        <div class="skillbar-bar bg-3"></div>--}}
{{--                                                    </div>--}}

{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="review-bars__percent">77%</div>--}}
{{--                                        </div>--}}

{{--                                        <div class="review-bars d-flex align-items-center mb-2">--}}
{{--                                            <div class="review-bars__text">4 ستاره</div>--}}
{{--                                            <div class="review-bars__fill">--}}
{{--                                                <div class="skillbar-box">--}}
{{--                                                    <div class="skillbar" data-percent="54%">--}}
{{--                                                        <div class="skillbar-bar bg-3"></div>--}}
{{--                                                    </div>--}}

{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="review-bars__percent">54%</div>--}}
{{--                                        </div>--}}

{{--                                        <div class="review-bars d-flex align-items-center mb-2">--}}
{{--                                            <div class="review-bars__text">3 ستاره</div>--}}
{{--                                            <div class="review-bars__fill">--}}
{{--                                                <div class="skillbar-box">--}}
{{--                                                    <div class="skillbar" data-percent="14%">--}}
{{--                                                        <div class="skillbar-bar bg-3"></div>--}}
{{--                                                    </div>--}}

{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="review-bars__percent">14%</div>--}}
{{--                                        </div>--}}

{{--                                        <div class="review-bars d-flex align-items-center mb-2">--}}
{{--                                            <div class="review-bars__text">2 ستاره</div>--}}
{{--                                            <div class="review-bars__fill">--}}
{{--                                                <div class="skillbar-box">--}}
{{--                                                    <div class="skillbar" data-percent="5%">--}}
{{--                                                        <div class="skillbar-bar bg-3"></div>--}}
{{--                                                    </div>--}}

{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="review-bars__percent">5%</div>--}}
{{--                                        </div>--}}

{{--                                        <div class="review-bars d-flex align-items-center mb-2">--}}
{{--                                            <div class="review-bars__text">1 ستاره</div>--}}
{{--                                            <div class="review-bars__fill">--}}
{{--                                                <div class="skillbar-box">--}}
{{--                                                    <div class="skillbar" data-percent="2%">--}}
{{--                                                        <div class="skillbar-bar bg-3"></div>--}}
{{--                                                    </div>--}}

{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="review-bars__percent">2%</div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}

{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}

{{--                        <div class="course-overview-card pt-4">--}}
{{--                            <h3 class="fs-24 font-weight-semi-bold pb-4">بررسی ها</h3>--}}
{{--                            <div class="review-wrap">--}}
{{--                                <div class="d-flex flex-wrap align-items-center pb-4">--}}
{{--                                    <form method="post" class="mr-3 flex-grow-1">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <input class="form-control form--control pl-3" type="text" name="search" placeholder="جستجوی نظرات" />--}}
{{--                                            <span class="la la-search search-icon"></span>--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                    <div class="select-container mb-3">--}}
{{--                                        <select class="select-container-select">--}}
{{--                                            <option value="all-rating">رتبه</option>--}}
{{--                                            <option value="five-star">پنج ستاره</option>--}}
{{--                                            <option value="four-star">چهار ستاره</option>--}}
{{--                                            <option value="three-star">سه ستاره</option>--}}
{{--                                            <option value="two-star">دو ستاره</option>--}}
{{--                                            <option value="one-star">یک ستاره</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="media media-card border-bottom border-bottom-gray pb-4 mb-4">--}}
{{--                                    <div class="media-img mr-4 rounded-full">--}}
{{--                                        <img class="rounded-full lazy" src="{{asset('site/images/123.png')}}" data-src="images/small-avatar-1.jpg" alt="تصویر کاربر" />--}}
{{--                                    </div>--}}
{{--                                    <div class="media-body">--}}
{{--                                        <div class="d-flex flex-wrap align-items-center justify-content-between pb-1">--}}
{{--                                            <h5>مرتضی احمدی</h5>--}}
{{--                                            <div class="review-stars">--}}
{{--                                                <span class="la la-star"></span>--}}
{{--                                                <span class="la la-star"></span>--}}
{{--                                                <span class="la la-star"></span>--}}
{{--                                                <span class="la la-star"></span>--}}
{{--                                                <span class="la la-star"></span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <span class="d-block lh-18 pb-2">یک ماه قبل</span>--}}
{{--                                        <p class="pb-2">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>--}}
{{--                                        <div class="helpful-action">--}}
{{--                                            <span class="d-block fs-13">آیا این بررسی مفید بود؟</span>--}}
{{--                                            <button class="btn">آره</button>--}}
{{--                                            <button class="btn">خیر</button>--}}
{{--                                            <span class="btn-text fs-14 cursor-pointer pl-1" data-toggle="modal" data-target="#reportModal">گزارش</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- end media -->--}}
{{--                                <div class="media media-card border-bottom border-bottom-gray pb-4 mb-4">--}}
{{--                                    <div class="media-img mr-4 rounded-full">--}}
{{--                                        <img class="rounded-full lazy" src="{{asset('site/images/123.png')}}" data-src="images/small-avatar-2.jpg" alt="تصویر کاربر" />--}}
{{--                                    </div>--}}
{{--                                    <div class="media-body">--}}
{{--                                        <div class="d-flex flex-wrap align-items-center justify-content-between pb-1">--}}
{{--                                            <h5>محمد علی</h5>--}}
{{--                                            <div class="review-stars">--}}
{{--                                                <span class="la la-star"></span>--}}
{{--                                                <span class="la la-star"></span>--}}
{{--                                                <span class="la la-star"></span>--}}
{{--                                                <span class="la la-star"></span>--}}
{{--                                                <span class="la la-star"></span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <span class="d-block lh-18 pb-2">1 ماه پیش</span>--}}
{{--                                        <p class="pb-2">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>--}}
{{--                                        <div class="helpful-action">--}}
{{--                                            <span class="d-block fs-13">آیا این بررسی مفید بود؟</span>--}}
{{--                                            <button class="btn">آره</button>--}}
{{--                                            <button class="btn">خیر</button>--}}
{{--                                            <span class="btn-text fs-14 cursor-pointer pl-1" data-toggle="modal" data-target="#reportModal">گزارش</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- end media -->--}}
{{--                                <div class="media media-card border-bottom border-bottom-gray pb-4 mb-4">--}}
{{--                                    <div class="media-img mr-4 rounded-full">--}}
{{--                                        <img class="rounded-full lazy" src="{{asset('site/images/123.png')}}" data-src="images/small-avatar-3.jpg" alt="تصویر کاربر" />--}}
{{--                                    </div>--}}
{{--                                    <div class="media-body">--}}
{{--                                        <div class="d-flex flex-wrap align-items-center justify-content-between pb-1">--}}
{{--                                            <h5>علی حسینی</h5>--}}
{{--                                            <div class="review-stars">--}}
{{--                                                <span class="la la-star"></span>--}}
{{--                                                <span class="la la-star"></span>--}}
{{--                                                <span class="la la-star"></span>--}}
{{--                                                <span class="la la-star"></span>--}}
{{--                                                <span class="la la-star"></span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <span class="d-block lh-18 pb-2">2 ماه پیش</span>--}}
{{--                                        <p class="pb-2">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>--}}
{{--                                        <div class="helpful-action">--}}
{{--                                            <span class="d-block fs-13">آیا این بررسی مفید بود؟</span>--}}
{{--                                            <button class="btn">آره</button>--}}
{{--                                            <button class="btn">خیر</button>--}}
{{--                                            <span class="btn-text fs-14 cursor-pointer pl-1" data-toggle="modal" data-target="#reportModal">گزارش</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- end media -->--}}
{{--                            </div>--}}
{{--                            <!-- end review-wrap -->--}}
{{--                            <div class="see-more-review-btn text-center">--}}
{{--                                <button type="button" class="btn theme-btn theme-btn-transparent">بارگیری نظرات بیشتر</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="course-overview-card pt-4">--}}
{{--                            <h3 class="fs-24 font-weight-semi-bold pb-4">یک بررسی اضافه کنید</h3>--}}
{{--                            <div class="leave-rating-wrap pb-4">--}}
{{--                                <div class="leave-rating leave--rating">--}}
{{--                                    <input type="radio" name="rate" id="star5" />--}}
{{--                                    <label for="star5"></label>--}}
{{--                                    <input type="radio" name="rate" id="star4" />--}}
{{--                                    <label for="star4"></label>--}}
{{--                                    <input type="radio" name="rate" id="star3" />--}}
{{--                                    <label for="star3"></label>--}}
{{--                                    <input type="radio" name="rate" id="star2" />--}}
{{--                                    <label for="star2"></label>--}}
{{--                                    <input type="radio" name="rate" id="star1" />--}}
{{--                                    <label for="star1"></label>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                            <form method="post" class="row">--}}
{{--                                <div class="input-box col-lg-6">--}}
{{--                                    <label class="label-text">نام</label>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <input class="form-control form--control" type="text" name="name" placeholder="اسم شما" />--}}
{{--                                        <span class="la la-user input-icon"></span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="input-box col-lg-6">--}}
{{--                                    <label class="label-text">پست الکترونیک</label>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <input class="form-control form--control" type="email" name="email" placeholder="آدرس ایمیل" />--}}
{{--                                        <span class="la la-envelope input-icon"></span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="input-box col-lg-12">--}}
{{--                                    <label class="label-text">پیام</label>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <textarea class="form-control form--control pl-3" name="message" placeholder="پیام بنویس" rows="5"></textarea>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="btn-box col-lg-12">--}}
{{--                                    <div class="custom-control custom-checkbox mb-3 fs-15">--}}
{{--                                        <input type="checkbox" class="custom-control-input" id="saveCheckbox" required="" />--}}
{{--                                        <label class="custom-control-label custom--control-label" for="saveCheckbox">--}}
{{--                                            برای دفعه بعد که نظر دادم نام و ایمیل من را در این مرورگر ذخیره کنید.--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                    <!-- end custom-control -->--}}
{{--                                    <button class="btn theme-btn" type="submit">ارسال بررسی</button>--}}
{{--                                </div>--}}
{{--                                <!-- end btn-box -->--}}
{{--                            </form>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                    <!-- end course-details-content-wrap -->--}}
{{--                </div>--}}
{{--                <!-- end col-lg-8 -->--}}
{{--                <div class="col-lg-4">--}}
{{--                    <div class="sidebar sidebar-negative">--}}
{{--                        <div class="card card-item">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="preview-course-video">--}}
{{--                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#previewModal">--}}
{{--                                        <img src="{{asset('site/images/123.png')}}" data-src="images/preview-img.jpg" alt="course-img" class="w-100 rounded lazy" />--}}
{{--                                        <div class="preview-course-video-content">--}}
{{--                                            <div class="overlay"></div>--}}
{{--                                            <div class="play-button">--}}
{{--                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="-307.4 338.8 91.8 91.8" style="enable-background: new -307.4 338.8 91.8 91.8;" xml:space="preserve">--}}
{{--                                                        <style type="text/css">--}}
{{--                                                            .st0 {--}}
{{--                                                                fill: #ffffff;--}}
{{--                                                                border-radius: 100px;--}}
{{--                                                            }--}}
{{--                                                            .st1 {--}}
{{--                                                                fill: #000000;--}}
{{--                                                            }--}}
{{--                                                        </style>--}}
{{--                                                    <g>--}}
{{--                                                        <circle class="st0" cx="-261.5" cy="384.7" r="45.9"></circle>--}}
{{--                                                        <path class="st1" d="M-272.9,363.2l35.8,20.7c0.7,0.4,0.7,1.3,0,1.7l-35.8,20.7c-0.7,0.4-1.5-0.1-1.5-0.9V364C-274.4,363.3-273.5,362.8-272.9,363.2z"></path>--}}
{{--                                                    </g>--}}
{{--                                                    </svg>--}}
{{--                                            </div>--}}
{{--                                            <p class="fs-15 font-weight-bold text-white pt-3">پیش نمایش این دوره</p>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <!-- end preview-course-video -->--}}
{{--                                <div class="preview-course-feature-content pt-40px">--}}
{{--                                    <p class="d-flex align-items-center pb-2">--}}
{{--                                        <span class="fs-20 font-weight-semi-bold text-black">2400000 تومان</span>--}}
{{--                                        <span class="before-price mx-1"> 1400000 تومان </span>--}}
{{--                                    </p>--}}
{{--                                    <div class="buy-course-btn-box">--}}
{{--                                        <button type="button" class="btn theme-btn w-100 mb-2"><i class="la la-shopping-cart fs-18 mr-1"></i> به سبد خرید اضافه کنید</button>--}}
{{--                                        <button type="button" class="btn theme-btn w-100 theme-btn-white mb-2"><i class="la la-shopping-bag mr-1"></i> این دوره را بخرید</button>--}}
{{--                                    </div>--}}
{{--                                    <p class="fs-14 text-center pb-4">با ضمانت برگشت 30 روزه پول</p>--}}
{{--                                    <div class="preview-course-incentives">--}}
{{--                                        <h3 class="card-title fs-18 pb-2">این دوره شامل</h3>--}}
{{--                                        <ul class="generic-list-item pb-3">--}}
{{--                                            <li><i class="la la-play-circle-o mr-2 text-color"></i>2.5 ساعت ویدیوی آموزشی</li>--}}
{{--                                            --}}{{--                                            <li><i class="la la-file mr-2 text-color"></i>34 مقاله</li>--}}
{{--                                            <li><i class="la la-file-text mr-2 text-color"></i>12 منبع قابل دانلود</li>--}}
{{--                                            --}}{{--                                            <li><i class="la la-code mr-2 text-color"></i>51 تمرین </li>--}}
{{--                                            <li><i class="la la-key mr-2 text-color"></i>دسترسی کامل مادام العمر</li>--}}
{{--                                            --}}{{--                                            <li><i class="la la-television mr-2 text-color"></i>دسترسی به موبایل و تلویزیون</li>--}}
{{--                                            <li><i class="la la-certificate mr-2 text-color"></i>گواهی پایان کار</li>--}}
{{--                                        </ul>--}}
{{--                                        --}}{{--                                        <div class="section-block"></div>--}}
{{--                                        --}}{{--                                        <div class="buy-for-team-container pt-4">--}}
{{--                                        --}}{{--                                            <h3 class="fs-18 font-weight-semi-bold pb-2">آموزش 5 نفر یا بیشتر؟</h3>--}}
{{--                                        --}}{{--                                            <p class="lh-24 pb-3">دسترسی تیم خود را به بیش از 3000 دوره برتر ما در هر زمان و هر مکان دریافت کنید.</p>--}}
{{--                                        --}}{{--                                            <a href="for-business.html" class="btn theme-btn theme-btn-sm theme-btn-transparent lh-30 w-100">ما برای خانواده شاد</a>--}}
{{--                                        --}}{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="card card-item">--}}
{{--                            <div class="card-body">--}}
{{--                                <h3 class="card-title fs-18 pb-2">ویژگی های دوره</h3>--}}
{{--                                <div class="divider"><span></span></div>--}}
{{--                                <ul class="generic-list-item generic-list-item-flash">--}}
{{--                                    <li class="d-flex align-items-center justify-content-between">--}}
{{--                                        <span><i class="la la-clock mr-2 text-color"></i>مدت زمان</span> 2.5 ساعت--}}
{{--                                    </li>--}}
{{--                                    <li class="d-flex align-items-center justify-content-between">--}}
{{--                                        <span><i class="la la-play-circle-o mr-2 text-color"></i>جلسه</span> 17--}}
{{--                                    </li>--}}
{{--                                    <li class="d-flex align-items-center justify-content-between">--}}
{{--                                        <span><i class="la la-file-text-o mr-2 text-color"></i>منابع</span> 12--}}
{{--                                    </li>--}}
{{--                                    <li class="d-flex align-items-center justify-content-between">--}}
{{--                                        <span><i class="la la-bolt mr-2 text-color"></i>امتحانات</span> 26--}}
{{--                                    </li>--}}
{{--                                    <li class="d-flex align-items-center justify-content-between">--}}
{{--                                        <span><i class="la la-eye mr-2 text-color"></i>پیش نمایش درس</span> 4--}}
{{--                                    </li>--}}
{{--                                    <li class="d-flex align-items-center justify-content-between">--}}
{{--                                        <span><i class="la la-language mr-2 text-color"></i>زبان</span> فارسی/انگلیسی--}}
{{--                                    </li>--}}
{{--                                    <li class="d-flex align-items-center justify-content-between">--}}
{{--                                        <span><i class="la la-lightbulb mr-2 text-color"></i>سطح مهارت</span> همه سطوح--}}
{{--                                    </li>--}}
{{--                                    <li class="d-flex align-items-center justify-content-between">--}}
{{--                                        <span><i class="la la-users mr-2 text-color"></i>دانش آموزان</span> 30506--}}
{{--                                    </li>--}}
{{--                                    <li class="d-flex align-items-center justify-content-between">--}}
{{--                                        <span><i class="la la-certificate mr-2 text-color"></i>گواهی پایان دوره</span> بله--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="card card-item">--}}
{{--                            <div class="card-body">--}}
{{--                                <h3 class="card-title fs-18 pb-2">دسته بندی دروس</h3>--}}
{{--                                <div class="divider"><span></span></div>--}}
{{--                                <ul class="generic-list-item">--}}
{{--                                    <li><a href="#">دوره کارگاه حقوقی</a></li>--}}
{{--                                    <li><a href="#">دوره کارگاه طلاق</a></li>--}}
{{--                                    <li><a href="#">دوره کارگاه حقوقی</a></li>--}}
{{--                                    <li><a href="#">دوره کارگاه قتل</a></li>--}}
{{--                                    <li><a href="#">دوره کارگاه کیفری</a></li>--}}
{{--                                    <li><a href="#">دوره کارگاه حقوقی</a></li>--}}
{{--                                    <li><a href="#">دوره کارگاه مهریه</a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="card card-item">--}}
{{--                            <div class="card-body">--}}
{{--                                <h3 class="card-title fs-18 pb-2">دوره های مرتبط</h3>--}}
{{--                                <div class="divider"><span></span></div>--}}
{{--                                <div class="media media-card border-bottom border-bottom-gray pb-4 mb-4">--}}
{{--                                    <a href="course-details.html" class="media-img">--}}
{{--                                        <img class="mr-3 lazy" src="{{asset('site/images/123.png')}}" data-src="images/small-img-2.jpg" alt="تصویر دوره مرتبط" />--}}
{{--                                    </a>--}}
{{--                                    <div class="media-body">--}}
{{--                                        <h5 class="fs-15"><a href="course-details.html">دوره کیفری و حقوقی</a></h5>--}}
{{--                                        <span class="d-block lh-18 py-1 fs-14">دکتر علی اکبرزاده</span>--}}
{{--                                        <p class="text-black font-weight-semi-bold lh-18 fs-15">900000 تومان تومان<span class="before-price fs-14"> 1200000 تومان تومان</span></p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- end media -->--}}
{{--                                <div class="media media-card border-bottom border-bottom-gray pb-4 mb-4">--}}
{{--                                    <a href="course-details.html" class="media-img">--}}
{{--                                        <img class="mr-3 lazy" src="{{asset('site/images/123.png')}}" data-src="images/small-img-2.jpg" alt="تصویر دوره مرتبط" />--}}
{{--                                    </a>--}}
{{--                                    <div class="media-body">--}}
{{--                                        <h5 class="fs-15"><a href="course-details.html">دوره کیفری و حقوقی</a></h5>--}}
{{--                                        <span class="d-block lh-18 py-1 fs-14">دکتر علی اکبرزاده</span>--}}
{{--                                        <p class="text-black font-weight-semi-bold lh-18 fs-15">900000 تومان تومان<span class="before-price fs-14"> 1200000 تومان تومان</span></p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- end media -->--}}
{{--                                <div class="media media-card border-bottom border-bottom-gray pb-4 mb-4">--}}
{{--                                    <a href="course-details.html" class="media-img">--}}
{{--                                        <img class="mr-3 lazy" src="{{asset('site/images/123.png')}}" data-src="images/small-img-2.jpg" alt="تصویر دوره مرتبط" />--}}
{{--                                    </a>--}}
{{--                                    <div class="media-body">--}}
{{--                                        <h5 class="fs-15"><a href="course-details.html">دوره کیفری و حقوقی</a></h5>--}}
{{--                                        <span class="d-block lh-18 py-1 fs-14">دکتر علی اکبرزاده</span>--}}
{{--                                        <p class="text-black font-weight-semi-bold lh-18 fs-15">900000 تومان تومان<span class="before-price fs-14"> 1200000 تومان تومان</span></p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- end media -->--}}
{{--                                <div class="view-all-course-btn-box">--}}
{{--                                    <a href="course-grid.html" class="btn theme-btn w-100">مشاهده همه دوره ها <i class="la la-arrow-left icon ml-1"></i></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="card card-item">--}}
{{--                            <div class="card-body">--}}
{{--                                <h3 class="card-title fs-18 pb-2">برچسب های دوره</h3>--}}
{{--                                <div class="divider"><span></span></div>--}}
{{--                                <ul class="generic-list-item generic-list-item-boxed d-flex flex-wrap fs-15">--}}
{{--                                    <li class="mr-2"><a href="#">قتل و کیفری</a></li>--}}
{{--                                    <li class="mr-2"><a href="#">دوره آموزشی خانواده</a></li>--}}
{{--                                    <li class="mr-2"><a href="#">دوره مهریه</a></li>--}}
{{--                                    <li class="mr-2"><a href="#">دوره حقوقی</a></li>--}}
{{--                                    <li class="mr-2"><a href="#">دوره قوانین جدید</a></li>--}}
{{--                                    <li class="mr-2"><a href="#">دوره قوانین ازدواج</a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

{{--    <section class="related-course-area bg-gray pt-60px pb-60px">--}}
{{--        <div class="container">--}}
{{--            <div class="related-course-wrap">--}}
{{--                <h3 class="fs-28 font-weight-semi-bold pb-35px">دوره های بیشتر توسط <a href="teacher-detail.html" class="text-color hover-underline">وبسایت ما</a></h3>--}}
{{--                <div class="view-more-carousel-2 owl-action-styled">--}}
{{--                    <div class="card card-item">--}}
{{--                        <div class="card-image">--}}
{{--                            <a href="course-details.html" class="d-block">--}}
{{--                                <img class="card-img-top" src="{{asset('site/images/123.png')}}" alt="درپوش تصویر کارت" />--}}
{{--                            </a>--}}
{{--                            <div class="course-badge-labels">--}}
{{--                                <div class="course-badge">دوره پرفروش</div>--}}
{{--                                <div class="course-badge blue">-39٪</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="card-body">--}}
{{--                            <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">همه مراحل</h6>--}}
{{--                            <h5 class="card-title"><a href="course-details.html">دوره جامع حقوقی</a></h5>--}}
{{--                            <p class="card-text"><a href="teacher-detail.html">استاد ابراهیمی</a></p>--}}
{{--                            <div class="rating-wrap d-flex align-items-center py-2">--}}
{{--                                <div class="review-stars">--}}
{{--                                    <span class="rating-number">4.4</span>--}}
{{--                                    <span class="la la-star"></span>--}}
{{--                                    <span class="la la-star"></span>--}}
{{--                                    <span class="la la-star"></span>--}}
{{--                                    <span class="la la-star"></span>--}}
{{--                                    <span class="la la-star-o"></span>--}}
{{--                                </div>--}}
{{--                                <span class="rating-total pl-1">(20230)</span>--}}
{{--                            </div>--}}

{{--                            <div class="d-flex justify-content-between align-items-center">--}}
{{--                                <p class="card-price text-black font-weight-bold">990000 تومان <span class="before-price font-weight-medium">1000000 تومان</span></p>--}}
{{--                                <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="به لیست علاقه مندی ها اضافه کنید"><i class="la la-heart-o"></i></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}

{{--                    <div class="card card-item">--}}
{{--                        <div class="card-image">--}}
{{--                            <a href="course-details.html" class="d-block">--}}
{{--                                <img class="card-img-top" src="{{asset('site/images/123.png')}}" alt="درپوش تصویر کارت" />--}}
{{--                            </a>--}}
{{--                            <div class="course-badge-labels">--}}
{{--                                <div class="course-badge red">ویژه</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="card-body">--}}
{{--                            <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">همه مراحل</h6>--}}
{{--                            <h5 class="card-title"><a href="course-details.html">دوره جامع خانواده</a></h5>--}}
{{--                            <p class="card-text"><a href="teacher-detail.html">استاد ابراهیمی</a></p>--}}
{{--                            <div class="rating-wrap d-flex align-items-center py-2">--}}
{{--                                <div class="review-stars">--}}
{{--                                    <span class="rating-number">4.4</span>--}}
{{--                                    <span class="la la-star"></span>--}}
{{--                                    <span class="la la-star"></span>--}}
{{--                                    <span class="la la-star"></span>--}}
{{--                                    <span class="la la-star"></span>--}}
{{--                                    <span class="la la-star-o"></span>--}}
{{--                                </div>--}}
{{--                                <span class="rating-total pl-1">(20230)</span>--}}
{{--                            </div>--}}

{{--                            <div class="d-flex justify-content-between align-items-center">--}}
{{--                                <p class="card-price text-black font-weight-bold">1000000 تومان</p>--}}
{{--                                <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="به لیست علاقه مندی ها اضافه کنید"><i class="la la-heart-o"></i></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}

{{--                    <div class="card card-item">--}}
{{--                        <div class="card-image">--}}
{{--                            <a href="course-details.html" class="d-block">--}}
{{--                                <img class="card-img-top" src="{{asset('site/images/123.png')}}" alt="درپوش تصویر کارت" />--}}
{{--                            </a>--}}
{{--                            <div class="course-badge-labels">--}}
{{--                                <div class="course-badge">دوره پرفروش</div>--}}
{{--                                <div class="course-badge blue">-39٪</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="card-body">--}}
{{--                            <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">همه مراحل</h6>--}}
{{--                            <h5 class="card-title"><a href="course-details.html">دوره جامع کارگاه حقوقی</a></h5>--}}
{{--                            <p class="card-text"><a href="teacher-detail.html">استاد ابراهیمی</a></p>--}}
{{--                            <div class="rating-wrap d-flex align-items-center py-2">--}}
{{--                                <div class="review-stars">--}}
{{--                                    <span class="rating-number">4.4</span>--}}
{{--                                    <span class="la la-star"></span>--}}
{{--                                    <span class="la la-star"></span>--}}
{{--                                    <span class="la la-star"></span>--}}
{{--                                    <span class="la la-star"></span>--}}
{{--                                    <span class="la la-star-o"></span>--}}
{{--                                </div>--}}
{{--                                <span class="rating-total pl-1">(20230)</span>--}}
{{--                            </div>--}}

{{--                            <div class="d-flex justify-content-between align-items-center">--}}
{{--                                <p class="card-price text-black font-weight-bold">1000000 تومان</p>--}}
{{--                                <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="به لیست علاقه مندی ها اضافه کنید"><i class="la la-heart-o"></i></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}

{{--                    <div class="card card-item">--}}
{{--                        <div class="card-image">--}}
{{--                            <a href="course-details.html" class="d-block">--}}
{{--                                <img class="card-img-top" src="{{asset('site/images/123.png')}}" alt="درپوش تصویر کارت" />--}}
{{--                            </a>--}}
{{--                            <div class="course-badge-labels">--}}
{{--                                <div class="course-badge red">ویژه</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="card-body">--}}
{{--                            <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">همه مراحل</h6>--}}
{{--                            <h5 class="card-title"><a href="course-details.html">دوره جامع خانواده</a></h5>--}}
{{--                            <p class="card-text"><a href="teacher-detail.html">استاد ابراهیمی</a></p>--}}
{{--                            <div class="rating-wrap d-flex align-items-center py-2">--}}
{{--                                <div class="review-stars">--}}
{{--                                    <span class="rating-number">4.4</span>--}}
{{--                                    <span class="la la-star"></span>--}}
{{--                                    <span class="la la-star"></span>--}}
{{--                                    <span class="la la-star"></span>--}}
{{--                                    <span class="la la-star"></span>--}}
{{--                                    <span class="la la-star-o"></span>--}}
{{--                                </div>--}}
{{--                                <span class="rating-total pl-1">(20230)</span>--}}
{{--                            </div>--}}

{{--                            <div class="d-flex justify-content-between align-items-center">--}}
{{--                                <p class="card-price text-black font-weight-bold">1000000 تومان</p>--}}
{{--                                <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="به لیست علاقه مندی ها اضافه کنید"><i class="la la-heart-o"></i></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}

{{--                </div>--}}
{{--                <!-- end view-more-carousel -->--}}
{{--            </div>--}}
{{--            <!-- end related-course-wrap -->--}}
{{--        </div>--}}
{{--        <!-- end container -->--}}
{{--    </section>--}}

{{--    <section class="cta-area pt-60px pb-60px position-relative overflow-hidden">--}}
{{--        <span class="stroke-shape stroke-shape-1"></span>--}}
{{--        <span class="stroke-shape stroke-shape-2"></span>--}}
{{--        <span class="stroke-shape stroke-shape-3"></span>--}}
{{--        <span class="stroke-shape stroke-shape-4"></span>--}}
{{--        <span class="stroke-shape stroke-shape-5"></span>--}}
{{--        <span class="stroke-shape stroke-shape-6"></span>--}}
{{--        <div class="container">--}}
{{--            <div class="row align-items-center">--}}
{{--                <div class="col-lg-9">--}}
{{--                    <div class="cta-content-wrap py-4 d-flex flex-wrap align-items-center">--}}
{{--                        <svg class="flex-shrink-0 mr-4" width="70" viewBox="0 -48 496 496" xmlns="http://www.w3.org/2000/svg">--}}
{{--                            <path--}}
{{--                                d="m472 0h-448c-13.230469 0-24 10.769531-24 24v352c0 13.230469 10.769531 24 24 24h448c13.230469 0 24-10.769531 24-24v-352c0-13.230469-10.769531-24-24-24zm8 376c0 4.414062-3.59375 8-8 8h-448c-4.40625 0-8-3.585938-8-8v-352c0-4.40625 3.59375-8 8-8h448c4.40625 0 8 3.59375 8 8zm0 0"--}}
{{--                            ></path>--}}
{{--                            <path d="m448 32h-400v240h400zm-16 224h-368v-208h368zm0 0"></path>--}}
{{--                            <path--}}
{{--                                d="m328 200.136719c0-17.761719-11.929688-33.578125-29.007812-38.464844l-26.992188-7.703125v-2.128906c9.96875-7.511719 16-19.328125 16-31.832032v-14.335937c0-21.503906-16.007812-39.726563-36.449219-41.503906-11.183593-.96875-22.34375 2.800781-30.574219 10.351562-8.25 7.550781-12.976562 18.304688-12.976562 29.480469v16c0 12.503906 6.03125 24.328125 16 31.832031v2.128907l-26.992188 7.710937c-17.078124 4.886719-29.007812 20.703125-29.007812 38.464844v39.863281h160zm-16 23.863281h-128v-23.863281c0-10.664063 7.160156-20.152344 17.40625-23.082031l38.59375-11.023438v-23.070312l-3.976562-2.3125c-7.527344-4.382813-12.023438-12.105469-12.023438-20.648438v-16c0-6.703125 2.839844-13.160156 7.792969-17.695312 5.007812-4.601563 11.496093-6.832032 18.382812-6.207032 12.230469 1.0625 21.824219 12.285156 21.824219 25.566406v14.335938c0 8.542969-4.496094 16.265625-12.023438 20.648438l-3.976562 2.3125v23.070312l38.59375 11.023438c10.246094 2.9375 17.40625 12.425781 17.40625 23.082031zm0 0"--}}
{{--                            ></path>--}}
{{--                            <path d="m32 364.945312 73.886719-36.945312-73.886719-36.945312zm16-48 22.113281 11.054688-22.113281 11.054688zm0 0"></path>--}}
{{--                            <path d="m152 288h16v80h-16zm0 0"></path>--}}
{{--                            <path d="m120 288h16v80h-16zm0 0"></path>--}}
{{--                            <path d="m336 288h-48v32h-104v16h104v32h48v-32h128v-16h-128zm-16 64h-16v-48h16zm0 0"></path>--}}
{{--                        </svg>--}}
{{--                        <div class="section-heading">--}}
{{--                            <h2 class="section__title mb-1 fs-22"> دانش خود را به اشتراک بگذارید</h2>--}}
{{--                            <p class="section__desc">یک دوره ویدیویی آنلاین ایجاد کنید، به دانش آموزان در سراسر جهان دسترسی پیدا کنید و آموزش دهید</p>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-3">--}}
{{--                    <div class="cta-btn-box text-left">--}}
{{--                        <a href="become-a-teacher.html" class="btn theme-btn">عضوبت در وبسایت <i class="la la-arrow-left icon ml-1"></i> </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--@endsection--}}


@extends('master')
@section('style')
    @if($thispage->page_description)
        <meta name="description" content="{{$thispage->page_description}}">
    @endif
    @if(json_decode($thispage->keyword))
        <meta name="keyword" content="{{implode("،" , json_decode($thispage->keyword))}}">
    @endif
    <meta name="twitter:card" content="summary"/>
    @if($thispage->tab_title)
        <meta name="twitter:title" content="{{$thispage->tab_title}}"/>
    @endif
    @if($thispage->page_description)
        <meta name="twitter:description" content="{{$thispage->page_description}}"/>
    @endif
    @if($thispage->tab_title)
        <meta itemprop="name" content="{{$thispage->tab_title}}">
    @endif
    @if($thispage->page_description)
        <meta itemprop="description" content="{{$thispage->page_description}}">
    @endif
    <meta property="og:url" content="{{url()->current()}}"/>
    @if($thispage->tab_title)
        <meta property="og:title" content="{{$thispage->tab_title}}"/>
    @endif
    @if($thispage->page_description)
        <meta property="og:description" content="{{$thispage->page_description}}"/>
    @endif
    <link rel="canonical" href="{{url()->current()}}"/>
    <link rel="stylesheet" href="{{asset('site/css/animated-headline.css')}}"/>
    <title>{{$thispage->tab_title}}</title>
@endsection
@section('main')

    <style>
        .card {
            overflow: hidden;
        }

        .card-body {
            padding-right: 12px;
            padding-left: 12px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
        }

        .card-text {
            font-size: 0.8rem;
            white-space: wrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>

    <section class="about-area overflow-hidden">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 d-flex align-items-center">
                    <div class="about-content pb-5">
                        <div class="section-heading2">
                            <h2 class="section__title lh-50 text-center">موسسه حقوقی دادورزان امین</h2>
                            <p class="section__desc">
                                موسسه حقوقی دادورزان امین از سال 1396 با تکیه بر تعهد و تخصص و با بهره‌گیری از وکلای
                                متخصص، کارشناسان مجرب و قضات بازنشسته در زمینه های مختلف حقوقی، مفتخر است که خدماتی جامع
                                را به سبکی نوین و با بهترین بازدهی به شما ارائه دهد.
                            </p>
                        </div>
                        <ul class="generic-list-item row justify-content-center">
                            <li><i class="la la-check-circle mr-2 text-success"></i>دسترسی سریع و هوشمند</li>
                            <li><i class="la la-check-circle mr-2 text-success"></i>وکلای خبره و توانمند</li>
                            <li><i class="la la-check-circle mr-2 text-success"></i>پرونده های موفق و حل شده</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-md-block align-content-center align-items-center">
                    <div class="generic-img-box generic-img-box-layout-2 align-content-center align-items-center">
                        <div class="img__item img__item-1">
                            <img class="lazy" src="{{asset('site/images/img-loading.png')}}"
                                 data-src="{{asset('site/images/img7.jpg')}}" alt="درباره تصویر"/>
                            <div class="generic-img-box-content">
                                <h3 class="fs-24 font-weight-semi-bold pb-1">40+ نفر </h3>
                                <span>وکیل خبره</span>
                            </div>
                        </div>
                        <div class="img__item img__item-2">
                            <img class="lazy" src="{{asset('site/images/img-loading.png')}}"
                                 data-src="{{asset('site/images/img13.jpg')}}" alt="درباره تصویر"/>
                            <div class="generic-img-box-content">
                                <h3 class="fs-24 font-weight-semi-bold pb-1">200+ ساعت</h3>
                                <span>دوره های آموزشی</span>
                            </div>
                        </div>
                        <div class="img__item img__item-3">
                            <img class="lazy" src="{{asset('site/images/img-loading.png')}}"
                                 data-src="{{asset('site/images/img14.jpg')}}" alt="درباره تصویر"/>
                            <div class="generic-img-box-content">
                                <h3 class="fs-24 font-weight-semi-bold pb-1">500+ پرونده</h3>
                                <span>پرونده موفق</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="get-started-area bg-gray py-4">
        <span class="ring-shape ring-shape-1"></span>
        <span class="ring-shape ring-shape-2"></span>
        <span class="ring-shape ring-shape-3"></span>
        <span class="ring-shape ring-shape-4"></span>
        <span class="ring-shape ring-shape-5"></span>
        <span class="ring-shape ring-shape-6"></span>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 responsive-column-half">
                    <div class="card card-item hover-s text-center  h-100 d-flex">
                        <div class="card-body">
                            <img src="{{asset('site/images/img-loading.png')}}"
                                 data-src="{{asset('site/images/img7.jpg')}}" alt="تصویر کارت"
                                 class="img-fluid lazy rounded-full" style="width: 200px;height: 200px"/>
                            <h5 class="card-title pb-2">تخصص و تجربه</h5>
                            <p class="card-text1 text-justify">وکلا و کارشناسان ما در زمینه‌های مختلف حقوقی تخصص و تجربه
                                چندین ساله‌ای دارند و تنها یک وکیل در مسیر رسیدن شما به هدفتان همراهتان نخواهد بود، بلکه
                                کل تیم دادورزان امین شما را در این مسیر همراهی خواهند کرد.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 responsive-column-half">
                    <div class="card card-item hover-s text-center h-100 d-flex">
                        <div class="card-body">
                            <img src="{{asset('site/images/img-loading.png')}}"
                                 data-src="{{asset('site/images/img13.jpg')}}" alt="تصویر کارت"
                                 class="img-fluid lazy rounded-full" style="width: 200px;height: 200px"/>
                            <h5 class="card-title pb-2">صداقت و تعهد</h5>
                            <p class="card-text1 text-justify">ما برای پایبندی به اصولی چون صداقت و تعهد بستری آنلاین
                                فراهم نموده‌ایم تا تمامی خدمات و روند امور شما در لحظه و به صورت شفاف قابل روئیت و
                                پیگیری باشد.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 responsive-column-half">
                    <div class="card card-item hover-s text-center h-100 d-flex">
                        <div class="card-body">
                            <img src="{{asset('site/images/img-loading.png')}}"
                                 data-src="{{asset('site/images/img14.jpg')}}" alt="تصویر کارت"
                                 class="img-fluid lazy rounded-full" style="width: 200px;height: 200px"/>
                            <h5 class="card-title pb-2">کیفیت خدمات</h5>
                            <p class="card-text1 text-justify">برای رسیدن به این امر مهم از تلاش خود بازنمی‌ایستیم و
                                همواره در مسیر بهبود کیفیت خدمات ارائه شده برای موکلین، وکلا خواهیم بود. اگر چه تا این
                                لحظه هم تمام دغدغه موسسه این‌چنین بوده است.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 responsive-column-half">
                    <div class="card card-item hover-s text-center h-100 d-flex">
                        <div class="card-body">
                            <img src="{{asset('site/images/img-loading.png')}}"
                                 data-src="{{asset('site/images/img14.jpg')}}" alt="تصویر کارت"
                                 class="img-fluid lazy rounded-full" style="width: 200px;height: 200px"/>
                            <h5 class="card-title pb-2">پشتیبانی و پاسخگویی</h5>
                            <p class="card-text1 text-justify">همکاران ما در بخش پشتیبانی و امور دفتری همواره از طریق
                                سایت، شماره‌های تماس و شبکه‌های اجتماعی به صورت 24 ساعته در خدمت شما هستند.</p>
                        </div>
                    </div>
                </div>
            </div>

            <p class="text-center" style="margin-top: 40px">می خواهید با ما بپیوندید؟ <a href="careers.html"
                                                                                         class="text-color hover-underline">موقعیت
                    های باز</a> ما را ببینید<a href="careers.html" class="text-color hover-underline"></a></p>

        </div>
    </section>

    <section class="our-mission-area py-4">
        <div class="container p-0">
            <h2 class="section__title pb-3 lh-50">خدمات ما</h2>
            <p class="section__desc pb-3">موسسه حقوقی دادورزان امین متشکل از سه دپارتمان
                اصلی دعاوی، قراردادها و آموزش و پژوهش به ارائه خدمات در زمینه های مختلف می‌پردازد:
            </p>
            <div class="row ">
                <div class="col-md-4 col-12">
                    <div class="card h-100 br-16">
                        <img class="card-img-top" src="{{asset('site/images/lawsuit.webp')}}" alt="">
                        <div class="card-body">
                            <h5 class="card-title">دپارتمان دعاوی</h5>
                            <p class="card-text">دپارتمان دعاوی شامل بخش‌های حقوقی، کیفری و تجاری است که در هر
                                بخش بصورت تخصصی خدمات ارائه مشاوره، دعاوی، داوری و نظرات شورای حقوقی است.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="card h-100 br-16">
                        <img class="card-img-top" src="{{asset('site/images/lawsuit.webp')}}" alt="">
                        <div class="card-body">
                            <h5 class="card-title">دپارتمان قراردادها</h5>
                            <p class="card-text">این دپارتمان نیز شامل اکثریت موضوعات قراردادی
                                داخلی و بین‌المللی است که خدمات تنظیم و مشاوره قراردادها در این دپارتمان انجام
                                می‌پذیرد.
                            </p>
                        </div>
                    </div>

                </div>
                <div class="col-md-4 col-12 h-100">
                    <div class="card h-100 br-16">
                        <img class="card-img-top" src="{{asset('site/images/lawsuit.webp')}}" alt="">
                        <div class="card-body">
                            <h5 class="card-title">دپارتمان آموزش و پژوهش</h5>
                            <p class="card-text">در این دپارتمان موسسه حقوقی دادورزان
                                امین خدماتی برای دانشپذیران رشته حقوق در نظر گرفته است و با برگزاری کارگاه‌های
                                آموزشی،
                                نشست‌های حقوقی و ارائه ویدئو و جزوات و مطالب کاربردی خدمات خود را ارائه می‌دهد.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

{{--            <p class="section__desc pb-3">-دپارتمان دعاوی شامل بخش‌های حقوقی، کیفری و تجاری است که در هر بخش--}}
{{--                بصورت تخصصی خدمات ارائه مشاوره، دعاوی، داوری و نظرات شورای حقوقی است.</p>--}}
{{--            <p class="section__desc pb-3">- دپارتمان قراردادها نیز شامل اکثریت موضوعات قراردادی داخلی و--}}
{{--                بین‌المللی است که خدمات تنظیم و مشاوره قراردادها در این دپارتمان انجام می‌پذیرد.</p>--}}
{{--            <p class="section__desc pb-3">- دپارتمان آموزش و پژوهش: در این دپارتمان موسسه حقوقی دادورزان--}}
{{--                امین خدماتی برای دانشپذیران رشته حقوق در نظر گرفته است و با برگزاری کارگاه‌های آموزشی،--}}
{{--                نشست‌های حقوقی و ارائه ویدئو و جزوات و مطالب کاربردی خدمات خود را ارائه می‌دهد.</p>--}}
{{--            <p class="section__desc pb-3">لازم به ذکر است خدمات موسسه حقوقی دادورزان امین برای سه قشر از--}}
{{--                جامعه کاربردی است و موکلین، وکلا و دانشپذیران می‌توانند هریک از خدمات مجزا دادورزان امین--}}
{{--                استفاده نمایند.</p>--}}
{{--            <p class="section__desc py-3">خدمات دعاوی، داوری، مشاوره، تنظیم قرارداد، نظریه شورای حقوقی، ثبت--}}
{{--                شرکت و تنظیم اوراق قضایی در دپارتمان‌های مختلف برای موکلین در نظر گرفته شده است البته خدمات--}}
{{--                ایرانیان خارج از کشور نیز در این بخش گنجانده شده است و خدماتی چون توکیل به وکلا، نظریات--}}
{{--                شورای حقوقی موسسه، دریافت انواع استعلامات مورد نیاز در پرونده‌ها برای وکلا و همچنین در بخش--}}
{{--                آموزش و پژوهش مطالب، ویدئوها، جزوات را برای دانشپذیران و دانشجویان تهیه و تدارک دیده--}}
{{--                است.</p>--}}

        </div>
    </section>

    <section class="story-area section--padding bg-gray">
        <div class="container">
            <div class="story-content text-center">
                <div class="section-heading">
                    <h2 class="section__title pb-3 lh-50">هدف ما </h2>
                    <p class="section__desc pb-3">
                        هدف ما در موسسه حقوقی دادورزان امین ارائه خدمات جامع حقوقی تخصصی و متمایز به سبکی نوین برای
                        موکلین، وکلا و دانشپذیران عزیز است؛ که با تکیه بر دانش، تجربه و تعهد کادر موسسه در تلاشیم که به
                        بهترین نحو از حقوق شما در مراجع قضایی دفاع نماییم و یاری رسان شما در حل و فصل دعاوی و مشکلات
                        حقوقی باشیم.</p>
                    <p>
                        امید است در مسیر رسیدن به اهدافتان موسسه حقوقی دادورزان امین بهترین همراه شما باشد.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <div class="section-block"></div>

    <section class="team-member-area py-4">
        <div class="container">
            <div class="team-member-heading-content text-center">
                <div class="section-heading">
                    <h2 class="section__title lh-50">اعضای اصلی تیم دادورزان امین</h2>
                </div>
            </div>
            <div class="row pt-60px">
                @foreach($emploees as $emploee)
                    <div class="col-lg-4 responsive-column-half">
                        <div class="responsive-column-half">
                            <div class="card card-item member-card text-center">
                                <div class="card-image">
                                    <img class="card-img-top" src="{{asset($emploee->image)}}"
                                         alt="{{$emploee->fullname}}"/>
                                </div>
                                <div class="card-body">
                                    <h2 class="card-title"><a href="#">{{$emploee->fullname}}</a></h2>
                                    <p class="card-text">{{$emploee->side}}</p>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    {{--        <section class="testimonial-area bg-gray section--padding">--}}
    {{--            <div class="container">--}}
    {{--                <div class="row">--}}
    {{--                    <div class="col-lg-4">--}}
    {{--                        <div class="testimonial-content-wrap pb-4">--}}
    {{--                            <div class="section-heading">--}}
    {{--                                <h2 class="section__title mb-3">درباره ما چه میگویند؟</h2>--}}
    {{--                                <p class="section__desc">--}}
    {{--                                    موکلین که پرنده آنها را با ما پیش برده اند و وکلایی که با ما همکاری کرده اند درباره ما چه میگوند؟--}}
    {{--                                </p>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="col-lg-8">--}}
    {{--                        <div class="testimonial-carousel-2 owl-action-styled owl-action-styled-2">--}}
    {{--                            <div class="card card-item">--}}
    {{--                                <div class="card-body">--}}
    {{--                                    <p class="card-text">--}}
    {{--                                        من از زمانی که کارهای حقوقی شرکت را به این مجموعه سپردم با آرامش به کارهای شرکت پرداخته و تمام موارد حقوقی را از دوستان مشورت میگیرم و در صورت بروز شکل از این مجموعه برای رفع آن اعتماد می کنم--}}
    {{--                                    </p>--}}
    {{--                                    <div class="media media-card align-items-center pt-4">--}}
    {{--                                        <div class="media-img avatar-md">--}}
    {{--                                            <img src="{{asset('site/images/small-avatar-1.jpg')}}" alt="آواتار گواهی" class="rounded-full" />--}}
    {{--                                        </div>--}}
    {{--                                        <div class="media-body">--}}
    {{--                                            <h5>مهندس میرمحمدی</h5>--}}
    {{--                                            <div class="d-flex align-items-center pt-1">--}}
    {{--                                                <span class="lh-18 pr-2">مدیرعامل شرکت مینو</span>--}}
    {{--                                            </div>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <div class="card card-item">--}}
    {{--                                <div class="card-body">--}}
    {{--                                    <p class="card-text">--}}
    {{--                                        من از زمانی که کارهای حقوقی شرکت را به این مجموعه سپردم با آرامش به کارهای شرکت پرداخته و تمام موارد حقوقی را از دوستان مشورت میگیرم و در صورت بروز شکل از این مجموعه برای رفع آن اعتماد می کنم--}}
    {{--                                    </p>--}}
    {{--                                    <div class="media media-card align-items-center pt-4">--}}
    {{--                                        <div class="media-img avatar-md">--}}
    {{--                                            <img src="{{asset('site/images/small-avatar-2.jpg')}}" alt="آواتار گواهی" class="rounded-full" />--}}
    {{--                                        </div>--}}
    {{--                                        <div class="media-body">--}}
    {{--                                            <h5>ابراهیم محمدی</h5>--}}
    {{--                                            <div class="d-flex align-items-center pt-1">--}}
    {{--                                                <span class="lh-18 pr-2">معاون حقوقی شرکت توسعه اعتماد میهن</span>--}}
    {{--                                            </div>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <div class="card card-item">--}}
    {{--                                <div class="card-body">--}}
    {{--                                    <p class="card-text">--}}
    {{--                                        من از زمانی که کارهای حقوقی شرکت را به این مجموعه سپردم با آرامش به کارهای شرکت پرداخته و تمام موارد حقوقی را از دوستان مشورت میگیرم و در صورت بروز شکل از این مجموعه برای رفع آن اعتماد می کنم--}}
    {{--                                    </p>--}}
    {{--                                    <div class="media media-card align-items-center pt-4">--}}
    {{--                                        <div class="media-img avatar-md">--}}
    {{--                                            <img src="{{asset('site/images/small-avatar-3.jpg')}}" alt="آواتار گواهی" class="rounded-full" />--}}
    {{--                                        </div>--}}
    {{--                                        <div class="media-body">--}}
    {{--                                            <h5>احمد جوکار</h5>--}}
    {{--                                            <div class="d-flex align-items-center pt-1">--}}
    {{--                                                <span class="lh-18 pr-2">مدیر حقوقی شرکت پتروشیمی</span>--}}

    {{--                                            </div>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                    <!-- end media -->--}}
    {{--                                </div>--}}
    {{--                                <!-- end card-body -->--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </section>--}}


    <div class="section-block"></div>

    <section class="about-area section--padding  bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-content pb-5">
                        <div class="section-heading">
                            <h2 class="section__title pb-3 lh-50">موسسه حقوقی دادوران امین مکانی عالی برای رشد</h2>
                            <p class="section__desc pb-3">
                                موسسه حقوقی دادورزان امین از وکلای متخصص و مجرب در زمینه‌های مختلف حقوقی دعوت به همکاری
                                می‌نماید
                            </p>
                            <br>
                        </div>
                        <div class="btn-box pt-35px">
                            <a href="#" class="btn theme-btn">به تیم ما بپیوندید <i
                                    class="la la-arrow-left icon ml-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="generic-img-box generic-img-box-layout-3">
                        <img src="{{asset('site/images/img-loading.png')}}"
                             data-src="{{asset('site/images/hire.webp')}}" alt="درباره تصویر"
                             class="img__item lazy img__item-1"/>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection




