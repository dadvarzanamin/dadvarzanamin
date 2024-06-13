@extends('master')
@section('main')

    <section class="breadcrumb-area pt-50px pb-50px bg-white pattern-bg">
        <div class="container">
            <div class="col-lg-8 mr-auto">
                <div class="breadcrumb-content">
                    <ul class="generic-list-item generic-list-item-arrow d-flex flex-wrap align-items-center">
                        <li><a href="index.html">صفحه اصلی</a></li>
                        <li><a href="#">دوره جامع خانواده</a></li>
                        <li><a href="#">مبانی و اصول</a></li>
                    </ul>
                    <div class="section-heading">
                        <h2 class="section__title">مبانی و اصول رفتاری در خانواده</h2>
                        <p class="section__desc pt-2 lh-30">در این دوره شما با مبانی رفتاری بین همسر و فرزندان آشنا می شوید و یاد میگرید چگونه با خانواده خود رفتاری درست داشته باشید</p>
                    </div>
                    <div class="d-flex flex-wrap align-items-center pt-3">
                        <h6 class="ribbon ribbon-lg mr-2 bg-3 text-white">دوره ممتاز</h6>
                        <div class="rating-wrap d-flex flex-wrap align-items-center">
                            <div class="review-stars">
                                <span class="rating-number">4.4</span>
                                <span class="la la-star"></span>
                                <span class="la la-star"></span>
                                <span class="la la-star"></span>
                                <span class="la la-star"></span>
                                <span class="la la-star-o"></span>
                            </div>
                            <span class="rating-total pl-1">(20,230 رتبه بندی) </span>
                            <span class="student-total pl-2">540,815 دانش آموز</span>
                        </div>
                    </div>
                    <p class="pt-2 pb-1">ایجاد شده توسط <a href="teacher-detail.html" class="text-color hover-underline">استاد محمدباقر حیدری کاشانی</a></p>
                    <div class="d-flex flex-wrap align-items-center">
                        <p class="pr-3 d-flex align-items-center">
                            <svg class="svg-icon-color-gray mr-1" width="16px" viewBox="0 0 24 24">
                                <path
                                    d="M23 12l-2.44-2.78.34-3.68-3.61-.82-1.89-3.18L12 3 8.6 1.54 6.71 4.72l-3.61.81.34 3.68L1 12l2.44 2.78-.34 3.69 3.61.82 1.89 3.18L12 21l3.4 1.46 1.89-3.18 3.61-.82-.34-3.68L23 12zm-10 5h-2v-2h2v2zm0-4h-2V7h2v6z"
                                ></path>
                            </svg>
                            آخرین به روز رسانی 2 آذر 1401
                        </p>
                        <p class="pr-3 d-flex align-items-center">
                            <svg class="svg-icon-color-gray mr-1" width="16px" viewBox="0 0 24 24">
                                <path
                                    d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zm6.93 6h-2.95a15.65 15.65 0 00-1.38-3.56A8.03 8.03 0 0118.92 8zM12 4.04c.83 1.2 1.48 2.53 1.91 3.96h-3.82c.43-1.43 1.08-2.76 1.91-3.96zM4.26 14C4.1 13.36 4 12.69 4 12s.1-1.36.26-2h3.38c-.08.66-.14 1.32-.14 2s.06 1.34.14 2H4.26zm.82 2h2.95c.32 1.25.78 2.45 1.38 3.56A7.987 7.987 0 015.08 16zm2.95-8H5.08a7.987 7.987 0 014.33-3.56A15.65 15.65 0 008.03 8zM12 19.96c-.83-1.2-1.48-2.53-1.91-3.96h3.82c-.43 1.43-1.08 2.76-1.91 3.96zM14.34 14H9.66c-.09-.66-.16-1.32-.16-2s.07-1.35.16-2h4.68c.09.65.16 1.32.16 2s-.07 1.34-.16 2zm.25 5.56c.6-1.11 1.06-2.31 1.38-3.56h2.95a8.03 8.03 0 01-4.33 3.56zM16.36 14c.08-.66.14-1.32.14-2s-.06-1.34-.14-2h3.38c.16.64.26 1.31.26 2s-.1 1.36-.26 2h-3.38z"
                                ></path>
                            </svg>
                            فارسی/انگلیسی
                        </p>
                    </div>
                    <div class="bread-btn-box pt-3">
                        <button class="btn theme-btn theme-btn-sm theme-btn-transparent lh-28 mr-2 mb-2">
                            <i class="la la-heart-o mr-1"></i>
                            <span class="swapping-btn" data-text-swap="Wishlisted" data-text-original="Wishlist">لیست علاقه مندیها</span>
                        </button>
                        <button class="btn theme-btn theme-btn-sm theme-btn-transparent lh-28 mr-2 mb-2" data-toggle="modal" data-target="#shareModal"><i class="la la-share mr-1"></i>اشتراک گذاری</button>
                        <button class="btn theme-btn theme-btn-sm theme-btn-transparent lh-28 mb-2" data-toggle="modal" data-target="#reportModal"><i class="la la-flag mr-1"></i>گزارش سوءاستفاده</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="course-details-area pb-20px">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 pb-5">
                    <div class="course-details-content-wrap pt-90px">
                        <div class="course-overview-card bg-gray p-4 rounded">
                            <h3 class="fs-24 font-weight-semi-bold pb-3">چه چیزی یاد خواهید گرفت؟</h3>
                            <ul class="generic-list-item overview-list-item">
                                <li><i class="la la-check mr-1 text-black"></i>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</li>
                                <li><i class="la la-check mr-1 text-black"></i>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</li>
                                <li><i class="la la-check mr-1 text-black"></i>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</li>
                                <li><i class="la la-check mr-1 text-black"></i>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</li>
                                <li><i class="la la-check mr-1 text-black"></i>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</li>
                                <li><i class="la la-check mr-1 text-black"></i>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</li>
                            </ul>
                        </div>

                        <div class="course-overview-card bg-gray p-4 rounded">
                            <h3 class="fs-16 font-weight-semi-bold">پشتیبانی از دوره <a href="for-business.html" class="text-color hover-underline">جامع خانواده </a>با محمد امینی</h3>
                        </div>

                        <div class="course-overview-card">
                            <h3 class="fs-24 font-weight-semi-bold pb-3">الزامات</h3>
                            <ul class="generic-list-item generic-list-item-bullet fs-15">
                                <li>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</li>
                                <li>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</li>
                                <li>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</li>
                            </ul>
                        </div>

{{--                        <div class="course-overview-card border border-gray p-4 rounded">--}}
{{--                            <h3 class="fs-20 font-weight-semi-bold">شرکت های برتر به ما اعتماد دارند</h3>--}}
{{--                            <p class="fs-15 pb-1">دسترسی تیم خود را به بیش از 5000 دوره برتر ما داشته باشید</p>--}}
{{--                            <div class="pb-3">--}}
{{--                                <img width="85" class="mr-3" src="images/sponsor-img.png" alt="آرم شرکت" />--}}
{{--                                <img width="80" class="mr-3" src="images/sponsor-img2.png" alt="آرم شرکت" />--}}
{{--                                <img width="80" class="mr-3" src="images/sponsor-img3.png" alt="آرم شرکت" />--}}
{{--                                <img width="70" class="mr-3" src="images/sponsor-img4.png" alt="آرم شرکت" />--}}
{{--                            </div>--}}
{{--                            <a href="for-business.html" class="btn theme-btn theme-btn-sm">ما برای کسب و کار</a>--}}
{{--                        </div>--}}

                        <div class="course-overview-card">
                            <h3 class="fs-24 font-weight-semi-bold pb-3">شرح</h3>
                            <p class="fs-15 pb-2">
                                لورم ایپسوم از دهه 1500، زمانی که یک چاپگر ناشناخته یک گالری از نوع را گرفت و آن را به هم زد تا یک دوره نمونه تایپ بسازد، متن ساختگی استاندارد صنعت بوده است. این نه تنها پنج قرن زنده مانده است، بلکه لورم
                                ایپسوم متن ساختگی استاندارد صنعت از دهه 1500 بوده است، زمانی که یک چاپگر ناشناخته یک گالی از نوع را برداشت و آن را به هم زد تا یک دوره نمونه بسازد.
                            </p>
                            <p class="fs-15 pb-2">
                                این نه تنها پنج قرن زنده مانده است، بلکه جهشی به حروفچینی الکترونیکی نیز باقی مانده است و اساساً بدون تغییر باقی مانده است. لورم ایپسوم صرفاً متن ساختگی صنعت چاپ و حروفچینی است. لورم ایپسوم ساختگی
                                استاندارد این صنعت بوده است
                            </p>
                            <p class="fs-15 pb-1">- لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</p>
                            <p class="fs-15 pb-1">- لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</p>
                            <p class="fs-15 pb-1">- لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</p>
                            <p class="fs-15 pt-3 pb-2 lh-22">
                                <strong class="font-weight-semi-bold text-black"> لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</strong></p>
                            <p class="fs-15 pb-2"> لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</p>
                            <div class="collapse" id="collapseMore">
                                <p class="fs-15 pb-2"> لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</p>
                                <h4 class="fs-20 font-weight-semi-bold py-2">این دوره برای چه کسانی است:</h4>
                                <ul class="generic-list-item generic-list-item-bullet fs-15">
                                    <li>- لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</li>
                                    <li>- لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</li>
                                    <li>- لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</li>
                                </ul>
                            </div>
                            <a class="collapse-btn collapse--btn fs-15" data-toggle="collapse" href="#collapseMore" role="button" aria-expanded="false" aria-controls="collapseMore">
                                <span class="collapse-btn-hide">بیشتر نشان بده، اطلاعات بیشتر<i class="la la-angle-down ml-1 fs-14"></i></span>
                                <span class="collapse-btn-show">کمتر نشان دادن<i class="la la-angle-up ml-1 fs-14"></i></span>
                            </a>
                        </div>

                        <div class="course-overview-card">
                            <div class="curriculum-header d-flex align-items-center justify-content-between pb-4">
                                <h3 class="fs-24 font-weight-semi-bold">محتوای دوره</h3>
                                <div class="curriculum-duration fs-15">
                                    <span class="curriculum-total__text mr-2"><strong class="text-black font-weight-semi-bold">مجموع:</strong> 17 سخنرانی </span>
                                    <span class="curriculum-total__hours"><strong class="text-black font-weight-semi-bold">کل ساعت:</strong> 02:35:47</span>
                                </div>
                            </div>
                            <div class="curriculum-content">
                                <div id="accordion" class="generic-accordion">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <button class="btn btn-link d-flex align-items-center justify-content-between" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                <i class="la la-plus"></i>
                                                <i class="la la-minus"></i>
                                                معرفی دوره
                                                <span class="fs-15 text-gray font-weight-medium">6 سخنرانی</span>
                                            </button>
                                        </div>
                                        <!-- end card-header -->
                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                            <div class="card-body">
                                                <ul class="generic-list-item">
                                                    <li>
                                                        <a href="#" class="d-flex align-items-center justify-content-between text-color" data-toggle="modal" data-target="#previewModal">
                                                                <span>
                                                                    <i class="la la-play-circle mr-1"></i>
                                                                    مقدمه دوره
                                                                    <span class="ribbon ml-2 fs-13">پیش نمایش</span>
                                                                </span>
                                                            <span>02:27</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <div class="d-flex align-items-center justify-content-between">
                                                                <span>
                                                                    <i class="la la-play-circle mr-1"></i>
                                                                    جلسه شماره 1
                                                                </span>
                                                            <span>03:09</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="d-flex align-items-center justify-content-between">
                                                                <span>
                                                                    <i class="la la-play-circle mr-1"></i>
                                                                    جلسه شماره 2
                                                                </span>
                                                            <span>01:16</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="d-flex align-items-center justify-content-between">
                                                                <span>
                                                                    <i class="la la-play-circle mr-1"></i>
                                                                    جلسه شماره 3
                                                                </span>
                                                            <span>02:07</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
                                        <!-- end collapse -->
                                    </div>

                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <button class="btn btn-link collapsed d-flex align-items-center justify-content-between" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                <i class="la la-plus"></i>
                                                <i class="la la-minus"></i>
                                                فصل اول
                                                <span class="fs-15 text-gray font-weight-medium">6 سخنرانی </span>
                                            </button>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                            <div class="card-body">
                                                <ul class="generic-list-item">
                                                    <li>
                                                        <div class="d-flex align-items-center justify-content-between">
                                                                <span>
                                                                    <i class="la la-play-circle mr-1"></i>
                                                                    جلسه شماره 1
                                                                </span>
                                                            <span>02:27</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="d-flex align-items-center justify-content-between">
                                                                <span>
                                                                    <i class="la la-file mr-1"></i>
جلسه شماره 2                                                                </span>
                                                            <span>00:16</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="d-flex align-items-center justify-content-between">
                                                                <span>
                                                                    <i class="la la-play-circle mr-1"></i>
                                                                    جلسه شماره 3
                                                                </span>
                                                            <span>01:16</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="d-flex align-items-center justify-content-between">
                                                                <span>
                                                                    <i class="la la-play-circle mr-1"></i>
                                                                    جلسه شماره 4
                                                                </span>
                                                            <span>02:07</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="d-flex align-items-center justify-content-between">
                                                                <span>
                                                                    <i class="la la-code mr-1"></i>
                                                                    جلسه شماره 5
                                                                </span>
                                                            <span>1 سوال</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header" id="headingThree">
                                            <button
                                                class="btn btn-link collapsed d-flex align-items-center justify-content-between"
                                                data-toggle="collapse"
                                                data-target="#collapseThree"
                                                aria-expanded="false"
                                                aria-controls="collapseThree">
                                                <i class="la la-plus"></i>
                                                <i class="la la-minus"></i>
                                                فصل دوم
                                                <span class="fs-15 text-gray font-weight-medium">1 سخنرانی</span>
                                            </button>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                            <div class="card-body">
                                                <ul class="generic-list-item">
                                                    <li>
                                                        <a href="#" class="d-flex align-items-center justify-content-between text-color" data-toggle="modal" data-target="#previewModal">
                                                                <span>
                                                                    <i class="la la-play-circle mr-1"></i>
                                                                    جلسه شماره 1
                                                                    <span class="ribbon ml-2 fs-13">تماشا</span>
                                                                </span>
                                                            <span> 02:27</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="course-overview-card pt-4">
                            <h3 class="fs-24 font-weight-semi-bold pb-4">دوره مورد پسند خانواده های پیشینه مذهبی</h3>
                            <div class="view-more-carousel owl-action-styled">
                                <div class="card card-item card-item-list-layout border border-gray shadow-none">
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
                                        <h5 class="card-title"><a href="course-details.html">دوره جامع خانواده 1</a></h5>
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

                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="card-price text-black font-weight-bold">99 تومان <span class="before-price font-weight-medium">1000 تومان</span></p>
                                            <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="به لیست علاقه مندی ها اضافه کنید"><i class="la la-heart-o"></i></div>
                                        </div>
                                    </div>

                                </div>

                                <div class="card card-item card-item-list-layout border border-gray shadow-none">
                                    <div class="card-image">
                                        <a href="course-details.html" class="d-block">
                                            <img class="card-img-top" src="images/img9.jpg" alt="درپوش تصویر کارت" />
                                        </a>
                                        <div class="course-badge-labels">
                                            <div class="course-badge red">ویژه</div>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">همه مراحل</h6>
                                        <h5 class="card-title"><a href="course-details.html">دوره جامع خانواده 1</a></h5>
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

                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="card-price text-black font-weight-bold">1000 تومان</p>
                                            <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="به لیست علاقه مندی ها اضافه کنید"><i class="la la-heart-o"></i></div>
                                        </div>
                                    </div>

                                </div>

                                <div class="card card-item card-item-list-layout border border-gray shadow-none">
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
                                        <h5 class="card-title"><a href="course-details.html">دوره جامع خانواده 1</a></h5>
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

                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="card-price text-black font-weight-bold">99 تومان <span class="before-price font-weight-medium">1000 تومان</span></p>
                                            <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="به لیست علاقه مندی ها اضافه کنید"><i class="la la-heart-o"></i></div>
                                        </div>
                                    </div>

                                </div>

                                <div class="card card-item card-item-list-layout border border-gray shadow-none">
                                    <div class="card-image">
                                        <a href="course-details.html" class="d-block">
                                            <img class="card-img-top" src="images/img9.jpg" alt="درپوش تصویر کارت" />
                                        </a>
                                        <div class="course-badge-labels">
                                            <div class="course-badge red">ویژه</div>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">همه مراحل</h6>
                                        <h5 class="card-title"><a href="course-details.html">دوره جامع خانواده 1</a></h5>
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
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="card-price text-black font-weight-bold">1000 تومان</p>
                                            <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="به لیست علاقه مندی ها اضافه کنید"><i class="la la-heart-o"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="course-overview-card pt-4">
                            <h3 class="fs-24 font-weight-semi-bold pb-4">در مورد استاد</h3>
                            <div class="instructor-wrap">
                                <div class="media media-card">
                                    <div class="instructor-img">
                                        <a href="teacher-detail.html" class="media-img d-block">
                                            <img class="lazy" src="images/img-loading.png" data-src="images/small-avatar-1.jpg" alt="تصویر آواتار" />
                                        </a>
                                        <ul class="generic-list-item pt-3">
                                            <li><i class="la la-star mr-2 text-color-3"></i> 4.6 رتبه بندی استاد</li>
                                            <li><i class="la la-user mr-2 text-color-3"></i> 45786 دانش آموز</li>
                                            <li><i class="la la-comment-o mr-2 text-color-3"></i> 2,533 نظر</li>
                                            <li><i class="la la-play-circle-o mr-2 text-color-3"></i> 24 دوره</li>
                                            <li><a href="teacher-detail.html">مشاهده تمام دوره ها</a></li>
                                        </ul>
                                    </div>
                                    <!-- end instructor-img -->
                                    <div class="media-body">
                                        <h5><a href="teacher-detail.html">وبسایت ما</a></h5>
                                        <span class="d-block lh-18 pt-2 pb-3">4 سال پیش پیوست</span>
                                        <p class="text-black lh-18 pb-3">دوره جامع خانواده </p>
                                        <p class="pb-3">
                                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد
                                            نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                                        </p>
                                        <div class="collapse" id="collapseMoreTwo">
                                            <p class="pb-3">
                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی
                                                مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                                            </p>
                                            <p class="pb-3">
                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                                            </p>
                                        </div>
                                        <a class="collapse-btn collapse--btn fs-15" data-toggle="collapse" href="#collapseMoreTwo" role="button" aria-expanded="false" aria-controls="collapseMoreTwo">
                                            <span class="collapse-btn-hide">بیشتر نشان بده، اطلاعات بیشتر<i class="la la-angle-down ml-1 fs-14"></i></span>
                                            <span class="collapse-btn-show">کمتر نشان دادن<i class="la la-angle-up ml-1 fs-14"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- end instructor-wrap -->
                        </div>

                        <div class="course-overview-card pt-4">
                            <h3 class="fs-24 font-weight-semi-bold pb-40px">بازخورد دانش آموزان</h3>
                            <div class="feedback-wrap">
                                <div class="media media-card align-items-center">
                                    <div class="review-rating-summary">
                                        <span class="stats-average__count">4.6</span>
                                        <div class="rating-wrap pt-1">
                                            <div class="review-stars">
                                                <span class="la la-star"></span>
                                                <span class="la la-star"></span>
                                                <span class="la la-star"></span>
                                                <span class="la la-star"></span>
                                                <span class="la la-star-half-alt"></span>
                                            </div>
                                            <span class="rating-total d-block">(2533) </span>
                                            <span>رتبه بندی دوره</span>
                                        </div>

                                    </div>
                                    <!-- end review-rating-summary -->
                                    <div class="media-body">
                                        <div class="review-bars d-flex align-items-center mb-2">
                                            <div class="review-bars__text">5 ستاره</div>
                                            <div class="review-bars__fill">
                                                <div class="skillbar-box">
                                                    <div class="skillbar" data-percent="77%">
                                                        <div class="skillbar-bar bg-3"></div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="review-bars__percent">77%</div>
                                        </div>

                                        <div class="review-bars d-flex align-items-center mb-2">
                                            <div class="review-bars__text">4 ستاره</div>
                                            <div class="review-bars__fill">
                                                <div class="skillbar-box">
                                                    <div class="skillbar" data-percent="54%">
                                                        <div class="skillbar-bar bg-3"></div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="review-bars__percent">54%</div>
                                        </div>

                                        <div class="review-bars d-flex align-items-center mb-2">
                                            <div class="review-bars__text">3 ستاره</div>
                                            <div class="review-bars__fill">
                                                <div class="skillbar-box">
                                                    <div class="skillbar" data-percent="14%">
                                                        <div class="skillbar-bar bg-3"></div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="review-bars__percent">14%</div>
                                        </div>

                                        <div class="review-bars d-flex align-items-center mb-2">
                                            <div class="review-bars__text">2 ستاره</div>
                                            <div class="review-bars__fill">
                                                <div class="skillbar-box">
                                                    <div class="skillbar" data-percent="5%">
                                                        <div class="skillbar-bar bg-3"></div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="review-bars__percent">5%</div>
                                        </div>

                                        <div class="review-bars d-flex align-items-center mb-2">
                                            <div class="review-bars__text">1 ستاره</div>
                                            <div class="review-bars__fill">
                                                <div class="skillbar-box">
                                                    <div class="skillbar" data-percent="2%">
                                                        <div class="skillbar-bar bg-3"></div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="review-bars__percent">2%</div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="course-overview-card pt-4">
                            <h3 class="fs-24 font-weight-semi-bold pb-4">بررسی ها</h3>
                            <div class="review-wrap">
                                <div class="d-flex flex-wrap align-items-center pb-4">
                                    <form method="post" class="mr-3 flex-grow-1">
                                        <div class="form-group">
                                            <input class="form-control form--control pl-3" type="text" name="search" placeholder="جستجوی نظرات" />
                                            <span class="la la-search search-icon"></span>
                                        </div>
                                    </form>
                                    <div class="select-container mb-3">
                                        <select class="select-container-select">
                                            <option value="all-rating">رتبه</option>
                                            <option value="five-star">پنج ستاره</option>
                                            <option value="four-star">چهار ستاره</option>
                                            <option value="three-star">سه ستاره</option>
                                            <option value="two-star">دو ستاره</option>
                                            <option value="one-star">یک ستاره</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="media media-card border-bottom border-bottom-gray pb-4 mb-4">
                                    <div class="media-img mr-4 rounded-full">
                                        <img class="rounded-full lazy" src="images/img-loading.png" data-src="images/small-avatar-1.jpg" alt="تصویر کاربر" />
                                    </div>
                                    <div class="media-body">
                                        <div class="d-flex flex-wrap align-items-center justify-content-between pb-1">
                                            <h5>کاوی آرسان</h5>
                                            <div class="review-stars">
                                                <span class="la la-star"></span>
                                                <span class="la la-star"></span>
                                                <span class="la la-star"></span>
                                                <span class="la la-star"></span>
                                                <span class="la la-star"></span>
                                            </div>
                                        </div>
                                        <span class="d-block lh-18 pb-2">یک ماه قبل</span>
                                        <p class="pb-2">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
                                        <div class="helpful-action">
                                            <span class="d-block fs-13">آیا این بررسی مفید بود؟</span>
                                            <button class="btn">آره</button>
                                            <button class="btn">خیر</button>
                                            <span class="btn-text fs-14 cursor-pointer pl-1" data-toggle="modal" data-target="#reportModal">گزارش</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- end media -->
                                <div class="media media-card border-bottom border-bottom-gray pb-4 mb-4">
                                    <div class="media-img mr-4 rounded-full">
                                        <img class="rounded-full lazy" src="images/img-loading.png" data-src="images/small-avatar-2.jpg" alt="تصویر کاربر" />
                                    </div>
                                    <div class="media-body">
                                        <div class="d-flex flex-wrap align-items-center justify-content-between pb-1">
                                            <h5>جیتش شاو</h5>
                                            <div class="review-stars">
                                                <span class="la la-star"></span>
                                                <span class="la la-star"></span>
                                                <span class="la la-star"></span>
                                                <span class="la la-star"></span>
                                                <span class="la la-star"></span>
                                            </div>
                                        </div>
                                        <span class="d-block lh-18 pb-2">1 ماه پیش</span>
                                        <p class="pb-2">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
                                        <div class="helpful-action">
                                            <span class="d-block fs-13">آیا این بررسی مفید بود؟</span>
                                            <button class="btn">آره</button>
                                            <button class="btn">خیر</button>
                                            <span class="btn-text fs-14 cursor-pointer pl-1" data-toggle="modal" data-target="#reportModal">گزارش</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- end media -->
                                <div class="media media-card border-bottom border-bottom-gray pb-4 mb-4">
                                    <div class="media-img mr-4 rounded-full">
                                        <img class="rounded-full lazy" src="images/img-loading.png" data-src="images/small-avatar-3.jpg" alt="تصویر کاربر" />
                                    </div>
                                    <div class="media-body">
                                        <div class="d-flex flex-wrap align-items-center justify-content-between pb-1">
                                            <h5>میگل سانچس</h5>
                                            <div class="review-stars">
                                                <span class="la la-star"></span>
                                                <span class="la la-star"></span>
                                                <span class="la la-star"></span>
                                                <span class="la la-star"></span>
                                                <span class="la la-star"></span>
                                            </div>
                                        </div>
                                        <span class="d-block lh-18 pb-2">2 ماه پیش</span>
                                        <p class="pb-2">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
                                        <div class="helpful-action">
                                            <span class="d-block fs-13">آیا این بررسی مفید بود؟</span>
                                            <button class="btn">آره</button>
                                            <button class="btn">خیر</button>
                                            <span class="btn-text fs-14 cursor-pointer pl-1" data-toggle="modal" data-target="#reportModal">گزارش</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- end media -->
                            </div>
                            <!-- end review-wrap -->
                            <div class="see-more-review-btn text-center">
                                <button type="button" class="btn theme-btn theme-btn-transparent">بارگیری نظرات بیشتر</button>
                            </div>
                        </div>

                        <div class="course-overview-card pt-4">
                            <h3 class="fs-24 font-weight-semi-bold pb-4">یک بررسی اضافه کنید</h3>
                            <div class="leave-rating-wrap pb-4">
                                <div class="leave-rating leave--rating">
                                    <input type="radio" name="rate" id="star5" />
                                    <label for="star5"></label>
                                    <input type="radio" name="rate" id="star4" />
                                    <label for="star4"></label>
                                    <input type="radio" name="rate" id="star3" />
                                    <label for="star3"></label>
                                    <input type="radio" name="rate" id="star2" />
                                    <label for="star2"></label>
                                    <input type="radio" name="rate" id="star1" />
                                    <label for="star1"></label>
                                </div>

                            </div>
                            <form method="post" class="row">
                                <div class="input-box col-lg-6">
                                    <label class="label-text">نام</label>
                                    <div class="form-group">
                                        <input class="form-control form--control" type="text" name="name" placeholder="اسم شما" />
                                        <span class="la la-user input-icon"></span>
                                    </div>
                                </div>

                                <div class="input-box col-lg-6">
                                    <label class="label-text">پست الکترونیک</label>
                                    <div class="form-group">
                                        <input class="form-control form--control" type="email" name="email" placeholder="آدرس ایمیل" />
                                        <span class="la la-envelope input-icon"></span>
                                    </div>
                                </div>

                                <div class="input-box col-lg-12">
                                    <label class="label-text">پیام</label>
                                    <div class="form-group">
                                        <textarea class="form-control form--control pl-3" name="message" placeholder="پیام بنویس" rows="5"></textarea>
                                    </div>
                                </div>

                                <div class="btn-box col-lg-12">
                                    <div class="custom-control custom-checkbox mb-3 fs-15">
                                        <input type="checkbox" class="custom-control-input" id="saveCheckbox" required="" />
                                        <label class="custom-control-label custom--control-label" for="saveCheckbox">
                                            برای دفعه بعد که نظر دادم نام و ایمیل من را در این مرورگر ذخیره کنید.
                                        </label>
                                    </div>
                                    <!-- end custom-control -->
                                    <button class="btn theme-btn" type="submit">ارسال بررسی</button>
                                </div>
                                <!-- end btn-box -->
                            </form>
                        </div>

                    </div>
                    <!-- end course-details-content-wrap -->
                </div>
                <!-- end col-lg-8 -->
                <div class="col-lg-4">
                    <div class="sidebar sidebar-negative">
                        <div class="card card-item">
                            <div class="card-body">
                                <div class="preview-course-video">
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#previewModal">
                                        <img src="images/img-loading.png" data-src="images/preview-img.jpg" alt="course-img" class="w-100 rounded lazy" />
                                        <div class="preview-course-video-content">
                                            <div class="overlay"></div>
                                            <div class="play-button">
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="-307.4 338.8 91.8 91.8" style="enable-background: new -307.4 338.8 91.8 91.8;" xml:space="preserve">
                                                        <style type="text/css">
                                                            .st0 {
                                                                fill: #ffffff;
                                                                border-radius: 100px;
                                                            }
                                                            .st1 {
                                                                fill: #000000;
                                                            }
                                                        </style>
                                                    <g>
                                                        <circle class="st0" cx="-261.5" cy="384.7" r="45.9"></circle>
                                                        <path class="st1" d="M-272.9,363.2l35.8,20.7c0.7,0.4,0.7,1.3,0,1.7l-35.8,20.7c-0.7,0.4-1.5-0.1-1.5-0.9V364C-274.4,363.3-273.5,362.8-272.9,363.2z"></path>
                                                    </g>
                                                    </svg>
                                            </div>
                                            <p class="fs-15 font-weight-bold text-white pt-3">پیش نمایش این دوره</p>
                                        </div>
                                    </a>
                                </div>
                                <!-- end preview-course-video -->
                                <div class="preview-course-feature-content pt-40px">
                                    <p class="d-flex align-items-center pb-2">
                                        <span class="fs-35 font-weight-semi-bold text-black">76.99 تومان</span>
                                        <span class="before-price mx-1"> 104.99 تومان </span>
                                        <span class="price-discount">24 درصد تخفیف</span>
                                    </p>
                                    <p class="preview-price-discount-text pb-35px"><span class="text-color-3">4 روز</span> با این قیمت!</p>
                                    <div class="buy-course-btn-box">
                                        <button type="button" class="btn theme-btn w-100 mb-2"><i class="la la-shopping-cart fs-18 mr-1"></i> به سبد خرید اضافه کنید</button>
                                        <button type="button" class="btn theme-btn w-100 theme-btn-white mb-2"><i class="la la-shopping-bag mr-1"></i> این دوره را بخرید</button>
                                    </div>
                                    <p class="fs-14 text-center pb-4">با ضمانت برگشت 30 روزه پول</p>
                                    <div class="preview-course-incentives">
                                        <h3 class="card-title fs-18 pb-2">این دوره شامل</h3>
                                        <ul class="generic-list-item pb-3">
                                            <li><i class="la la-play-circle-o mr-2 text-color"></i>2.5 ساعت ویدیوی آموزشی</li>
                                            <li><i class="la la-file mr-2 text-color"></i>34 مقاله</li>
                                            <li><i class="la la-file-text mr-2 text-color"></i>12 منبع قابل دانلود</li>
                                            <li><i class="la la-code mr-2 text-color"></i>51 تمرین </li>
                                            <li><i class="la la-key mr-2 text-color"></i>دسترسی کامل مادام العمر</li>
                                            <li><i class="la la-television mr-2 text-color"></i>دسترسی به موبایل و تلویزیون</li>
                                            <li><i class="la la-certificate mr-2 text-color"></i>گواهی پایان کار</li>
                                        </ul>
                                        <div class="section-block"></div>
                                        <div class="buy-for-team-container pt-4">
                                            <h3 class="fs-18 font-weight-semi-bold pb-2">آموزش 5 نفر یا بیشتر؟</h3>
                                            <p class="lh-24 pb-3">دسترسی تیم خود را به بیش از 3000 دوره برتر ما در هر زمان و هر مکان دریافت کنید.</p>
                                            <a href="for-business.html" class="btn theme-btn theme-btn-sm theme-btn-transparent lh-30 w-100">ما برای خانواده شاد</a>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="card card-item">
                            <div class="card-body">
                                <h3 class="card-title fs-18 pb-2">ویژگی های دوره</h3>
                                <div class="divider"><span></span></div>
                                <ul class="generic-list-item generic-list-item-flash">
                                    <li class="d-flex align-items-center justify-content-between">
                                        <span><i class="la la-clock mr-2 text-color"></i>مدت زمان</span> 2.5 ساعت
                                    </li>
                                    <li class="d-flex align-items-center justify-content-between">
                                        <span><i class="la la-play-circle-o mr-2 text-color"></i>سخنرانی</span> 17
                                    </li>
                                    <li class="d-flex align-items-center justify-content-between">
                                        <span><i class="la la-file-text-o mr-2 text-color"></i>منابع</span> 12
                                    </li>
                                    <li class="d-flex align-items-center justify-content-between">
                                        <span><i class="la la-bolt mr-2 text-color"></i>امتحانات</span> 26
                                    </li>
                                    <li class="d-flex align-items-center justify-content-between">
                                        <span><i class="la la-eye mr-2 text-color"></i>پیش نمایش درس</span> 4
                                    </li>
                                    <li class="d-flex align-items-center justify-content-between">
                                        <span><i class="la la-language mr-2 text-color"></i>زبان</span> فارسی/انگلیسی
                                    </li>
                                    <li class="d-flex align-items-center justify-content-between">
                                        <span><i class="la la-lightbulb mr-2 text-color"></i>سطح مهارت</span> همه سطوح
                                    </li>
                                    <li class="d-flex align-items-center justify-content-between">
                                        <span><i class="la la-users mr-2 text-color"></i>دانش آموزان</span> 30506
                                    </li>
                                    <li class="d-flex align-items-center justify-content-between">
                                        <span><i class="la la-certificate mr-2 text-color"></i>گواهی پایان دوره</span> بله
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="card card-item">
                            <div class="card-body">
                                <h3 class="card-title fs-18 pb-2">دسته بندی دروس</h3>
                                <div class="divider"><span></span></div>
                                <ul class="generic-list-item">
                                    <li><a href="#">مقدماتی</a></li>
                                    <li><a href="#">خانواده و همسر داری</a></li>
                                    <li><a href="#">خانواده و فرزند آوری</a></li>
                                    <li><a href="#">خانواده و اخلاق نیکو</a></li>
                                    <li><a href="#">خانواده و پسرداری</a></li>
                                    <li><a href="#">خانواده و دختر داری</a></li>
                                    <li><a href="#">خانواده و زندگی</a></li>
                                    <li><a href="#">خانواده و تربیت</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="card card-item">
                            <div class="card-body">
                                <h3 class="card-title fs-18 pb-2">دوره های مرتبط</h3>
                                <div class="divider"><span></span></div>
                                <div class="media media-card border-bottom border-bottom-gray pb-4 mb-4">
                                    <a href="course-details.html" class="media-img">
                                        <img class="mr-3 lazy" src="images/img-loading.png" data-src="images/small-img-2.jpg" alt="تصویر دوره مرتبط" />
                                    </a>
                                    <div class="media-body">
                                        <h5 class="fs-15"><a href="course-details.html">دوره تربیت کودکان زیر 7 سال</a></h5>
                                        <span class="d-block lh-18 py-1 fs-14">دکتر سید رضا</span>
                                        <p class="text-black font-weight-semi-bold lh-18 fs-15">99 تومان تومان<span class="before-price fs-14"> 1000 تومان تومان</span></p>
                                    </div>
                                </div>
                                <!-- end media -->
                                <div class="media media-card border-bottom border-bottom-gray pb-4 mb-4">
                                    <a href="course-details.html" class="media-img">
                                        <img class="mr-3 lazy" src="images/img-loading.png" data-src="images/small-img-3.jpg" alt="تصویر دوره مرتبط" />
                                    </a>
                                    <div class="media-body">
                                        <h5 class="fs-15"><a href="course-details.html">دوره تربیت نوجوان و بلوغ</a></h5>
                                        <span class="d-block lh-18 py-1 fs-14">کامران احمد</span>
                                        <p class="text-black font-weight-semi-bold lh-18 fs-15">1000 تومان تومان</p>
                                    </div>
                                </div>
                                <!-- end media -->
                                <div class="media media-card border-bottom border-bottom-gray pb-4 mb-4">
                                    <a href="course-details.html" class="media-img">
                                        <img class="mr-3 lazy" src="images/img-loading.png" data-src="images/small-img-4.jpg" alt="تصویر دوره مرتبط" />
                                    </a>
                                    <div class="media-body">
                                        <h5 class="fs-15"><a href="course-details.html">دوره تربیت جوانان انقلابی</a></h5>
                                        <span class="d-block lh-18 py-1 fs-14">کامران احمد</span>
                                        <p class="text-black font-weight-semi-bold lh-18 fs-15">رایگان</p>
                                    </div>
                                </div>
                                <!-- end media -->
                                <div class="view-all-course-btn-box">
                                    <a href="course-grid.html" class="btn theme-btn w-100">مشاهده همه دوره ها <i class="la la-arrow-left icon ml-1"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="card card-item">
                            <div class="card-body">
                                <h3 class="card-title fs-18 pb-2">برچسب های دوره</h3>
                                <div class="divider"><span></span></div>
                                <ul class="generic-list-item generic-list-item-boxed d-flex flex-wrap fs-15">
                                    <li class="mr-2"><a href="#">خانواده سالم</a></li>
                                    <li class="mr-2"><a href="#">دوره آموزشی خانواده</a></li>
                                    <li class="mr-2"><a href="#">دوره کودکانه</a></li>
                                    <li class="mr-2"><a href="#">دوره فرزند آوری</a></li>
                                    <li class="mr-2"><a href="#">دوره نسل جدید</a></li>
                                    <li class="mr-2"><a href="#">دوره تربیتی خانواده</a></li>
                                    <li class="mr-2"><a href="#">دوره همسرداری اسلامی</a></li>
                                    <li class="mr-2"><a href="#">اسلام و تربیت اسلامی</a></li>
                                    <li class="mr-2"><a href="#">خانواده و جایگاه زنان</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="related-course-area bg-gray pt-60px pb-60px">
        <div class="container">
            <div class="related-course-wrap">
                <h3 class="fs-28 font-weight-semi-bold pb-35px">دوره های بیشتر توسط <a href="teacher-detail.html" class="text-color hover-underline">وبسایت ما</a></h3>
                <div class="view-more-carousel-2 owl-action-styled">
                    <div class="card card-item">
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
                            <h5 class="card-title"><a href="course-details.html">دوره جامع خانواده 1</a></h5>
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

                            <div class="d-flex justify-content-between align-items-center">
                                <p class="card-price text-black font-weight-bold">99 تومان <span class="before-price font-weight-medium">1000 تومان</span></p>
                                <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="به لیست علاقه مندی ها اضافه کنید"><i class="la la-heart-o"></i></div>
                            </div>
                        </div>

                    </div>

                    <div class="card card-item">
                        <div class="card-image">
                            <a href="course-details.html" class="d-block">
                                <img class="card-img-top" src="images/img9.jpg" alt="درپوش تصویر کارت" />
                            </a>
                            <div class="course-badge-labels">
                                <div class="course-badge red">ویژه</div>
                            </div>
                        </div>

                        <div class="card-body">
                            <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">همه مراحل</h6>
                            <h5 class="card-title"><a href="course-details.html">دوره جامع خانواده 1</a></h5>
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

                            <div class="d-flex justify-content-between align-items-center">
                                <p class="card-price text-black font-weight-bold">1000 تومان</p>
                                <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="به لیست علاقه مندی ها اضافه کنید"><i class="la la-heart-o"></i></div>
                            </div>
                        </div>

                    </div>

                    <div class="card card-item">
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
                            <h5 class="card-title"><a href="course-details.html">دوره جامع خانواده 1</a></h5>
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

                            <div class="d-flex justify-content-between align-items-center">
                                <p class="card-price text-black font-weight-bold">99 تومان <span class="before-price font-weight-medium">1000 تومان</span></p>
                                <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="به لیست علاقه مندی ها اضافه کنید"><i class="la la-heart-o"></i></div>
                            </div>
                        </div>

                    </div>

                    <div class="card card-item">
                        <div class="card-image">
                            <a href="course-details.html" class="d-block">
                                <img class="card-img-top" src="images/img9.jpg" alt="درپوش تصویر کارت" />
                            </a>
                            <div class="course-badge-labels">
                                <div class="course-badge red">ویژه</div>
                            </div>
                        </div>

                        <div class="card-body">
                            <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">همه مراحل</h6>
                            <h5 class="card-title"><a href="course-details.html">دوره جامع خانواده 1</a></h5>
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

                            <div class="d-flex justify-content-between align-items-center">
                                <p class="card-price text-black font-weight-bold">1000 تومان</p>
                                <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="به لیست علاقه مندی ها اضافه کنید"><i class="la la-heart-o"></i></div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- end view-more-carousel -->
            </div>
            <!-- end related-course-wrap -->
        </div>
        <!-- end container -->
    </section>

    <section class="cta-area pt-60px pb-60px position-relative overflow-hidden">
        <span class="stroke-shape stroke-shape-1"></span>
        <span class="stroke-shape stroke-shape-2"></span>
        <span class="stroke-shape stroke-shape-3"></span>
        <span class="stroke-shape stroke-shape-4"></span>
        <span class="stroke-shape stroke-shape-5"></span>
        <span class="stroke-shape stroke-shape-6"></span>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9">
                    <div class="cta-content-wrap py-4 d-flex flex-wrap align-items-center">
                        <svg class="flex-shrink-0 mr-4" width="70" viewBox="0 -48 496 496" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="m472 0h-448c-13.230469 0-24 10.769531-24 24v352c0 13.230469 10.769531 24 24 24h448c13.230469 0 24-10.769531 24-24v-352c0-13.230469-10.769531-24-24-24zm8 376c0 4.414062-3.59375 8-8 8h-448c-4.40625 0-8-3.585938-8-8v-352c0-4.40625 3.59375-8 8-8h448c4.40625 0 8 3.59375 8 8zm0 0"
                            ></path>
                            <path d="m448 32h-400v240h400zm-16 224h-368v-208h368zm0 0"></path>
                            <path
                                d="m328 200.136719c0-17.761719-11.929688-33.578125-29.007812-38.464844l-26.992188-7.703125v-2.128906c9.96875-7.511719 16-19.328125 16-31.832032v-14.335937c0-21.503906-16.007812-39.726563-36.449219-41.503906-11.183593-.96875-22.34375 2.800781-30.574219 10.351562-8.25 7.550781-12.976562 18.304688-12.976562 29.480469v16c0 12.503906 6.03125 24.328125 16 31.832031v2.128907l-26.992188 7.710937c-17.078124 4.886719-29.007812 20.703125-29.007812 38.464844v39.863281h160zm-16 23.863281h-128v-23.863281c0-10.664063 7.160156-20.152344 17.40625-23.082031l38.59375-11.023438v-23.070312l-3.976562-2.3125c-7.527344-4.382813-12.023438-12.105469-12.023438-20.648438v-16c0-6.703125 2.839844-13.160156 7.792969-17.695312 5.007812-4.601563 11.496093-6.832032 18.382812-6.207032 12.230469 1.0625 21.824219 12.285156 21.824219 25.566406v14.335938c0 8.542969-4.496094 16.265625-12.023438 20.648438l-3.976562 2.3125v23.070312l38.59375 11.023438c10.246094 2.9375 17.40625 12.425781 17.40625 23.082031zm0 0"
                            ></path>
                            <path d="m32 364.945312 73.886719-36.945312-73.886719-36.945312zm16-48 22.113281 11.054688-22.113281 11.054688zm0 0"></path>
                            <path d="m152 288h16v80h-16zm0 0"></path>
                            <path d="m120 288h16v80h-16zm0 0"></path>
                            <path d="m336 288h-48v32h-104v16h104v32h48v-32h128v-16h-128zm-16 64h-16v-48h16zm0 0"></path>
                        </svg>
                        <div class="section-heading">
                            <h2 class="section__title mb-1 fs-22"> دانش خود را به اشتراک بگذارید</h2>
                            <p class="section__desc">یک دوره ویدیویی آنلاین ایجاد کنید، به دانش آموزان در سراسر جهان دسترسی پیدا کنید و آموزش دهید</p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="cta-btn-box text-left">
                        <a href="become-a-teacher.html" class="btn theme-btn">عضوبت در وبسایت <i class="la la-arrow-left icon ml-1"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
