@extends('master')
@section('main')

    <section class="breadcrumb-area section-padding img-bg-2">
        <div class="overlay"></div>
        <div class="container">
            <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between">
                <div class="section-heading">
                    <h2 class="section__title text-white">دوره جامع خانواده</h2>
                </div>
                <ul class="generic-list-item generic-list-item-white generic-list-item-arrow d-flex flex-wrap align-items-center">
                    <li><a href="index.html">صفحه اصلی</a></li>
                    <li>دوره های آموزشی</li>
                    <li>دوره جامع خانواده</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="course-area section-padding">
        <div class="container">
            <div class="filter-bar mb-4">
                <div class="filter-bar-inner d-flex flex-wrap align-items-center justify-content-between">
                    <p class="fs-14">ما <span class="text-black">56</span> دوره برای شما پیدا کردیم</p>
                    <div class="d-flex flex-wrap align-items-center">
                        <ul class="filter-nav mr-3">
                            <li>
                                <a href="course-grid.html" data-toggle="tooltip" data-placement="top" title="نمای شبکه" class="active"><span class="la la-th-large"></span></a>
                            </li>
                            <li>
                                <a href="course-list.html" data-toggle="tooltip" data-placement="top" title="نمایش لیست"><span class="la la-list"></span></a>
                            </li>
                        </ul>
                        <div class="select-container select--container mr-3">
                            <select class="select-container-select">
                                <option value="all-category">همه دسته</option>
                                <option value="newest">جدیدترین دوره ها</option>
                                <option value="oldest">قدیمی ترین دوره ها</option>
                                <option value="high-rated">بالاترین امتیاز</option>
                                <option value="popular-courses">دوره های محبوب</option>
                                <option value="high-to-low">قیمت: بالا به پایین</option>
                                <option value="low-to-high">قیمت: کم به بالا</option>
                            </select>
                        </div>
                        <a class="btn theme-btn theme-btn-sm theme-btn-white lh-28 collapse-btn" data-toggle="collapse" href="#collapseFilter" role="button" aria-expanded="false" aria-controls="collapseFilter">
                            فیلترها <i class="la la-angle-down ml-1 collapse-btn-hide"></i>
                            <i class="la la-angle-up ml-1 collapse-btn-show"></i>
                        </a>
                    </div>
                </div>
                <!-- end filter-bar-inner -->
                <div class="collapse pt-4" id="collapseFilter">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="widget-panel">
                                <h3 class="fs-18 font-weight-semi-bold pb-3">رتبه بندی ها</h3>
                                <div class="custom-control custom-radio mb-1 fs-15">
                                    <input type="radio" class="custom-control-input" id="fiveStarRating" name="radio-stacked" required="" />
                                    <label class="custom-control-label custom--control-label" for="fiveStarRating">
                                            <span class="rating-wrap d-flex align-items-center">
                                                <span class="review-stars">
                                                    <span class="la la-star"></span>
                                                    <span class="la la-star"></span>
                                                    <span class="la la-star"></span>
                                                    <span class="la la-star"></span>
                                                    <span class="la la-star"></span>
                                                </span>
                                                <span class="rating-total pl-1"><span class="mr-1 text-black">5.0</span> (20,230)</span>
                                            </span>
                                    </label>
                                </div>
                                <div class="custom-control custom-radio mb-1 fs-15">
                                    <input type="radio" class="custom-control-input" id="fourStarRating" name="radio-stacked" required="" />
                                    <label class="custom-control-label custom--control-label" for="fourStarRating">
                                            <span class="rating-wrap d-flex align-items-center">
                                                <span class="review-stars">
                                                    <span class="la la-star"></span>
                                                    <span class="la la-star"></span>
                                                    <span class="la la-star"></span>
                                                    <span class="la la-star"></span>
                                                    <span class="la la-star"></span>
                                                </span>
                                                <span class="rating-total pl-1"><span class="mr-1 text-black">4.5 و بالاتر</span> (10230)</span>
                                            </span>
                                    </label>
                                </div>
                                <div class="custom-control custom-radio mb-1 fs-15">
                                    <input type="radio" class="custom-control-input" id="threeStarRating" name="radio-stacked" required="" />
                                    <label class="custom-control-label custom--control-label" for="threeStarRating">
                                            <span class="rating-wrap d-flex align-items-center">
                                                <span class="review-stars">
                                                    <span class="la la-star"></span>
                                                    <span class="la la-star"></span>
                                                    <span class="la la-star"></span>
                                                    <span class="la la-star"></span>
                                                    <span class="la la-star"></span>
                                                </span>
                                                <span class="rating-total pl-1"><span class="mr-1 text-black">3.0 و بالاتر</span> (7230)</span>
                                            </span>
                                    </label>
                                </div>
                                <div class="custom-control custom-radio mb-1 fs-15">
                                    <input type="radio" class="custom-control-input" id="twoStarRating" name="radio-stacked" required="" />
                                    <label class="custom-control-label custom--control-label" for="twoStarRating">
                                            <span class="rating-wrap d-flex align-items-center">
                                                <span class="review-stars">
                                                    <span class="la la-star"></span>
                                                    <span class="la la-star"></span>
                                                    <span class="la la-star"></span>
                                                    <span class="la la-star"></span>
                                                    <span class="la la-star"></span>
                                                </span>
                                                <span class="rating-total pl-1"><span class="mr-1 text-black">2.0 و بالاتر</span> (5230)</span>
                                            </span>
                                    </label>
                                </div>
                                <div class="custom-control custom-radio mb-1 fs-15">
                                    <input type="radio" class="custom-control-input" id="oneStarRating" name="radio-stacked" required="" />
                                    <label class="custom-control-label custom--control-label" for="oneStarRating">
                                            <span class="rating-wrap d-flex align-items-center">
                                                <span class="review-stars">
                                                    <span class="la la-star"></span>
                                                    <span class="la la-star"></span>
                                                    <span class="la la-star"></span>
                                                    <span class="la la-star"></span>
                                                    <span class="la la-star"></span>
                                                </span>
                                                <span class="rating-total pl-1"><span class="mr-1 text-black">1.0 و بالاتر</span> (3230)</span>
                                            </span>
                                    </label>
                                </div>
                            </div>
                            <!-- end widget-panel -->
                        </div>
                        <!-- end col-lg-3 -->
                        <div class="col-lg-3">
                            <div class="widget-panel">
                                <h3 class="fs-18 font-weight-semi-bold pb-3">دسته بندی ها</h3>
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="catCheckbox" required="" />
                                    <label class="custom-control-label custom--control-label text-black" for="catCheckbox"> تجارت <span class="ml-1 text-gray">(12,300)</span> </label>
                                </div>
                                <!-- end custom-control -->
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="catCheckbox2" required="" />
                                    <label class="custom-control-label custom--control-label text-black" for="catCheckbox2"> رابط کاربری <span class="ml-1 text-gray">(12,300)</span> </label>
                                </div>
                                <!-- end custom-control -->
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="catCheckbox3" required="" />
                                    <label class="custom-control-label custom--control-label text-black" for="catCheckbox3"> انیمیشن <span class="ml-1 text-gray">(12,300)</span> </label>
                                </div>
                                <!-- end custom-control -->
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="catCheckbox4" required="" />
                                    <label class="custom-control-label custom--control-label text-black" for="catCheckbox4"> طراحی بازی <span class="ml-1 text-gray">(12300)</span> </label>
                                </div>
                                <!-- end custom-control -->
                                <div class="collapse" id="collapseMore">
                                    <div class="custom-control custom-checkbox mb-1 fs-15">
                                        <input type="checkbox" class="custom-control-input" id="catCheckbox5" required="" />
                                        <label class="custom-control-label custom--control-label text-black" for="catCheckbox5"> طراحی گرافیک <span class="ml-1 text-gray">(12,300)</span> </label>
                                    </div>
                                    <!-- end custom-control -->
                                    <div class="custom-control custom-checkbox mb-1 fs-15">
                                        <input type="checkbox" class="custom-control-input" id="catCheckbox6" required="" />
                                        <label class="custom-control-label custom--control-label text-black" for="catCheckbox6"> تایپوگرافی <span class="ml-1 text-gray">(12,300)</span> </label>
                                    </div>
                                    <!-- end custom-control -->
                                    <div class="custom-control custom-checkbox mb-1 fs-15">
                                        <input type="checkbox" class="custom-control-input" id="catCheckbox7" required="" />
                                        <label class="custom-control-label custom--control-label text-black" for="catCheckbox7"> توسعه وب <span class="ml-1 text-gray">(12,300)</span> </label>
                                    </div>
                                    <!-- end custom-control -->
                                    <div class="custom-control custom-checkbox mb-1 fs-15">
                                        <input type="checkbox" class="custom-control-input" id="catCheckbox8" required="" />
                                        <label class="custom-control-label custom--control-label text-black" for="catCheckbox8"> عکاسی <span class="ml-1 text-gray">(12,300)</span> </label>
                                    </div>
                                    <!-- end custom-control -->
                                    <div class="custom-control custom-checkbox mb-1 fs-15">
                                        <input type="checkbox" class="custom-control-input" id="catCheckbox9" required="" />
                                        <label class="custom-control-label custom--control-label text-black" for="catCheckbox9"> امور مالی <span class="ml-1 text-gray">(12,300)</span> </label>
                                    </div>
                                    <!-- end custom-control -->
                                </div>
                                <!-- end collapse -->
                                <a class="collapse-btn collapse--btn fs-15" data-toggle="collapse" href="#collapseMore" role="button" aria-expanded="false" aria-controls="collapseMore">
                                    <span class="collapse-btn-hide">بیشتر نشان بده، اطلاعات بیشتر<i class="la la-angle-down ml-1 fs-14"></i></span>
                                    <span class="collapse-btn-show">کمتر نشان دادن<i class="la la-angle-up ml-1 fs-14"></i></span>
                                </a>
                            </div>
                            <!-- end widget-panel -->
                        </div>
                        <!-- end col-lg-3 -->
                        <div class="col-lg-3">
                            <div class="widget-panel">
                                <h3 class="fs-18 font-weight-semi-bold pb-3">مدت زمان ویدیو</h3>
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="videoDurationCheckbox" required="" />
                                    <label class="custom-control-label custom--control-label text-black" for="videoDurationCheckbox"> 0-2 ساعت <span class="ml-1 text-gray">(12300)</span> </label>
                                </div>
                                <!-- end custom-control -->
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="videoDurationCheckbox2" required="" />
                                    <label class="custom-control-label custom--control-label text-black" for="videoDurationCheckbox2"> 3-6 ساعت <span class="ml-1 text-gray">(12300)</span> </label>
                                </div>
                                <!-- end custom-control -->
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="videoDurationCheckbox3" required="" />
                                    <label class="custom-control-label custom--control-label text-black" for="videoDurationCheckbox3"> 7-14 ساعت <span class="ml-1 text-gray">(12300)</span> </label>
                                </div>
                                <!-- end custom-control -->
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="videoDurationCheckbox4" required="" />
                                    <label class="custom-control-label custom--control-label text-black" for="videoDurationCheckbox4"> 16+ ساعت <span class="ml-1 text-gray">(12300)</span> </label>
                                </div>
                                <!-- end custom-control -->
                            </div>
                            <!-- end widget-panel -->
                        </div>
                        <!-- end col-lg-3 -->
                        <div class="col-lg-3">
                            <div class="widget-panel">
                                <h3 class="fs-18 font-weight-semi-bold pb-3">مرحله</h3>
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="levelCheckbox" required="" />
                                    <label class="custom-control-label custom--control-label text-black" for="levelCheckbox"> همه سطوح <span class="ml-1 text-gray">(20300)</span> </label>
                                </div>
                                <!-- end custom-control -->
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="levelCheckbox2" required="" />
                                    <label class="custom-control-label custom--control-label text-black" for="levelCheckbox2"> مبتدی <span class="ml-1 text-gray">(5300)</span> </label>
                                </div>
                                <!-- end custom-control -->
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="levelCheckbox3" required="" />
                                    <label class="custom-control-label custom--control-label text-black" for="levelCheckbox3"> متوسط <span class="ml-1 text-gray">(3300)</span> </label>
                                </div>
                                <!-- end custom-control -->
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="levelCheckbox4" required="" />
                                    <label class="custom-control-label custom--control-label text-black" for="levelCheckbox4"> کارشناس <span class="ml-1 text-gray">(1300)</span> </label>
                                </div>
                                <!-- end custom-control -->
                            </div>
                            <!-- end widget-panel -->
                        </div>
                        <!-- end col-lg-3 -->
                        <div class="col-lg-3">
                            <div class="widget-panel">
                                <h3 class="fs-18 font-weight-semi-bold pb-3">زبان</h3>
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="lanCheckbox" required="" />
                                    <label class="custom-control-label custom--control-label text-black" for="lanCheckbox"> انگلیسی <span class="ml-1 text-gray">(12,300)</span> </label>
                                </div>
                                <!-- end custom-control -->
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="laCheckbox2" required="" />
                                    <label class="custom-control-label custom--control-label text-black" for="laCheckbox2"> پرتغالی <span class="ml-1 text-gray">(12,300)</span> </label>
                                </div>
                                <!-- end custom-control -->
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="lanCheckbox3" required="" />
                                    <label class="custom-control-label custom--control-label text-black" for="lanCheckbox3"> اسپانیا <span class="ml-1 text-gray">(12,300)</span> </label>
                                </div>
                                <!-- end custom-control -->
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="lanCheckbox4" required="" />
                                    <label class="custom-control-label custom--control-label text-black" for="lanCheckbox4"> ترکی <span class="ml-1 text-gray">(12,300)</span> </label>
                                </div>
                                <!-- end custom-control -->
                                <div class="collapse" id="collapseMoreTwo">
                                    <div class="custom-control custom-checkbox mb-1 fs-15">
                                        <input type="checkbox" class="custom-control-input" id="lanCheckbox5" required="" />
                                        <label class="custom-control-label custom--control-label text-black" for="lanCheckbox5"> فرانسوی <span class="ml-1 text-gray">(12,300)</span> </label>
                                    </div>
                                    <!-- end custom-control -->
                                    <div class="custom-control custom-checkbox mb-1 fs-15">
                                        <input type="checkbox" class="custom-control-input" id="lanCheckbox6" required="" />
                                        <label class="custom-control-label custom--control-label text-black" for="lanCheckbox6"> چینی<span class="ml-1 text-gray">(12,300)</span> </label>
                                    </div>
                                    <!-- end custom-control -->
                                    <div class="custom-control custom-checkbox mb-1 fs-15">
                                        <input type="checkbox" class="custom-control-input" id="lanCheckbox7" required="" />
                                        <label class="custom-control-label custom--control-label text-black" for="lanCheckbox7"> عربی <span class="ml-1 text-gray">(12,300)</span> </label>
                                    </div>
                                    <!-- end custom-control -->
                                    <div class="custom-control custom-checkbox mb-1 fs-15">
                                        <input type="checkbox" class="custom-control-input" id="lanCheckbox8" required="" />
                                        <label class="custom-control-label custom--control-label text-black" for="lanCheckbox8"> ژاپنی<span class="ml-1 text-gray">(300)</span> </label>
                                    </div>
                                    <!-- end custom-control -->
                                    <div class="custom-control custom-checkbox mb-1 fs-15">
                                        <input type="checkbox" class="custom-control-input" id="lanCheckbox9" required="" />
                                        <label class="custom-control-label custom--control-label text-black" for="lanCheckbox9"> پولسکی <span class="ml-1 text-gray">(300)</span> </label>
                                    </div>
                                    <!-- end custom-control -->
                                </div>
                                <!-- end collapse -->
                                <a class="collapse-btn collapse--btn fs-15" data-toggle="collapse" href="#collapseMoreTwo" role="button" aria-expanded="false" aria-controls="collapseMoreTwo">
                                    <span class="collapse-btn-hide">بیشتر نشان بده، اطلاعات بیشتر<i class="la la-angle-down ml-1 fs-14"></i></span>
                                    <span class="collapse-btn-show">کمتر نشان دادن<i class="la la-angle-up ml-1 fs-14"></i></span>
                                </a>
                            </div>
                            <!-- end widget-panel -->
                        </div>
                        <!-- end col-lg-3 -->
                        <div class="col-lg-3">
                            <div class="widget-panel">
                                <h3 class="fs-18 font-weight-semi-bold pb-3">بر اساس هزینه</h3>
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="priceCheckbox" required="" />
                                    <label class="custom-control-label custom--control-label text-black" for="priceCheckbox"> پرداخت شده <span class="ml-1 text-gray">(19300)</span> </label>
                                </div>
                                <!-- end custom-control -->
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="priceCheckbox2" required="" />
                                    <label class="custom-control-label custom--control-label text-black" for="priceCheckbox2"> رایگان <span class="ml-1 text-gray">(1300)</span> </label>
                                </div>
                                <!-- end custom-control -->
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="priceCheckbox3" required="" />
                                    <label class="custom-control-label custom--control-label text-black" for="priceCheckbox3"> همه <span class="ml-1 text-gray">(20,300)</span> </label>
                                </div>
                                <!-- end custom-control -->
                            </div>
                            <!-- end widget-panel -->
                        </div>
                        <!-- end col-lg-3 -->
                        <div class="col-lg-3">
                            <div class="widget-panel">
                                <h3 class="fs-18 font-weight-semi-bold pb-3">مربیان</h3>
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="instructorCheckbox" required="" />
                                    <label class="custom-control-label custom--control-label text-black" for="instructorCheckbox">
                                        همه مربی
                                    </label>
                                </div>
                                <!-- end custom-control -->
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="instructorCheckbox2" required="" />
                                    <label class="custom-control-label custom--control-label text-black" for="instructorCheckbox2">
                                        عاطف جابری
                                    </label>
                                </div>
                                <!-- end custom-control -->
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="instructorCheckbox3" required="" />
                                    <label class="custom-control-label custom--control-label text-black" for="instructorCheckbox3">
                                        امیلی لوگان
                                    </label>
                                </div>
                                <!-- end custom-control -->
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="instructorCheckbox4" required="" />
                                    <label class="custom-control-label custom--control-label text-black" for="instructorCheckbox4">
                                        هارلی فرل
                                    </label>
                                </div>
                                <!-- end custom-control -->
                                <div class="collapse" id="collapseMoreThree">
                                    <div class="custom-control custom-checkbox mb-1 fs-15">
                                        <input type="checkbox" class="custom-control-input" id="instructorCheckbox5" required="" />
                                        <label class="custom-control-label custom--control-label text-black" for="instructorCheckbox5">
                                            نهلا جونز
                                        </label>
                                    </div>
                                    <!-- end custom-control -->
                                    <div class="custom-control custom-checkbox mb-1 fs-15">
                                        <input type="checkbox" class="custom-control-input" id="instructorCheckbox6" required="" />
                                        <label class="custom-control-label custom--control-label text-black" for="instructorCheckbox6">
                                            تومی هنسلی
                                        </label>
                                    </div>
                                    <!-- end custom-control -->
                                    <div class="custom-control custom-checkbox mb-1 fs-15">
                                        <input type="checkbox" class="custom-control-input" id="instructorCheckbox7" required="" />
                                        <label class="custom-control-label custom--control-label text-black" for="instructorCheckbox7">
                                            فولی پاتریک
                                        </label>
                                    </div>
                                    <!-- end custom-control -->
                                    <div class="custom-control custom-checkbox mb-1 fs-15">
                                        <input type="checkbox" class="custom-control-input" id="instructorCheckbox8" required="" />
                                        <label class="custom-control-label custom--control-label text-black" for="instructorCheckbox8">
                                            الیور پورتر
                                        </label>
                                    </div>
                                    <!-- end custom-control -->
                                    <div class="custom-control custom-checkbox mb-1 fs-15">
                                        <input type="checkbox" class="custom-control-input" id="instructorCheckbox9" required="" />
                                        <label class="custom-control-label custom--control-label text-black" for="instructorCheckbox9">
                                            فهاد چودری
                                        </label>
                                    </div>
                                    <!-- end custom-control -->
                                </div>
                                <!-- end collapse -->
                                <a class="collapse-btn collapse--btn fs-15" data-toggle="collapse" href="#collapseMoreThree" role="button" aria-expanded="false" aria-controls="collapseMoreThree">
                                    <span class="collapse-btn-hide">بیشتر نشان بده، اطلاعات بیشتر<i class="la la-angle-down ml-1 fs-14"></i></span>
                                    <span class="collapse-btn-show">کمتر نشان دادن<i class="la la-angle-up ml-1 fs-14"></i></span>
                                </a>
                            </div>
                            <!-- end widget-panel -->
                        </div>
                        <!-- end col-lg-3 -->
                        <div class="col-lg-3">
                            <div class="widget-panel">
                                <h3 class="fs-18 font-weight-semi-bold pb-3">امکانات</h3>
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="featureCheckbox" required="" />
                                    <label class="custom-control-label custom--control-label text-black" for="featureCheckbox"> زیرنویس&zwnj;ها <span class="ml-1 text-gray">(20300)</span> </label>
                                </div>
                                <!-- end custom-control -->
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="featureCheckbox2" required="" />
                                    <label class="custom-control-label custom--control-label text-black" for="featureCheckbox2"> آزمون ها <span class="ml-1 text-gray">(5300)</span> </label>
                                </div>
                                <!-- end custom-control -->
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="featureCheckbox3" required="" />
                                    <label class="custom-control-label custom--control-label text-black" for="featureCheckbox3"> تمرین کدنویسی <span class="ml-1 text-gray">(12)</span> </label>
                                </div>
                                <!-- end custom-control -->
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="featureCheckbox4" required="" />
                                    <label class="custom-control-label custom--control-label text-black" for="featureCheckbox4"> تست های تمرینی <span class="ml-1 text-gray">(200)</span> </label>
                                </div>
                                <!-- end custom-control -->
                            </div>
                            <!-- end widget-panel -->
                        </div>
                        <!-- end col-lg-3 -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end collapse -->
            </div>
            <!-- end filter-bar -->
            <div class="row">
                <div class="col-lg-4 responsive-column-half">
                    <div class="card card-item card-preview" data-tooltip-content="#tooltip_content_1">
                        <div class="card-image">
                            <a href="{{route('coursedetail')}}" class="d-block">
                                <img class="card-img-top lazy" src="images/img-loading.png" data-src="images/img8.jpg" alt="درپوش تصویر کارت" />
                            </a>
                            <div class="course-badge-labels">
                                <div class="course-badge">کتاب پرفروش</div>
                                <div class="course-badge blue">-39٪</div>
                            </div>
                        </div>
                        <!-- end card-image -->
                        <div class="card-body">
                            <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">همه مراحل</h6>
                            <h5 class="card-title"><a href="{{route('coursedetail')}}">دوره جامع خانواده</a></h5>
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
                                <p class="card-price text-black font-weight-bold">999 تومان <span class="before-price font-weight-medium">1000 تومان</span></p>
                                <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="به لیست علاقه مندی ها اضافه کنید"><i class="la la-heart-o"></i></div>
                            </div>
                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col-lg-4 -->
                <div class="col-lg-4 responsive-column-half">
                    <div class="card card-item card-preview" data-tooltip-content="#tooltip_content_1">
                        <div class="card-image">
                            <a href="{{route('coursedetail')}}" class="d-block">
                                <img class="card-img-top lazy" src="images/img-loading.png" data-src="images/img9.jpg" alt="درپوش تصویر کارت" />
                            </a>
                            <div class="course-badge-labels">
                                <div class="course-badge red">ویژه</div>
                            </div>
                        </div>
                        <!-- end card-image -->
                        <div class="card-body">
                            <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">همه مراحل</h6>
                            <h5 class="card-title"><a href="{{route('coursedetail')}}">دوره جامع خانواده</a></h5>
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
                                <p class="card-price text-black font-weight-bold">1000 تومان</p>
                                <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="به لیست علاقه مندی ها اضافه کنید"><i class="la la-heart-o"></i></div>
                            </div>
                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col-lg-4 -->
                <div class="col-lg-4 responsive-column-half">
                    <div class="card card-item card-preview" data-tooltip-content="#tooltip_content_1">
                        <div class="card-image">
                            <a href="{{route('coursedetail')}}" class="d-block">
                                <img class="card-img-top lazy" src="images/img-loading.png" data-src="images/img10.jpg" alt="درپوش تصویر کارت" />
                            </a>
                        </div>
                        <!-- end card-image -->
                        <div class="card-body">
                            <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">همه مراحل</h6>
                            <h5 class="card-title"><a href="{{route('coursedetail')}}">دوره جامع خانواده</a></h5>
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
                                <p class="card-price text-black font-weight-bold">1000 تومان</p>
                                <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="به لیست علاقه مندی ها اضافه کنید"><i class="la la-heart-o"></i></div>
                            </div>
                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col-lg-4 -->
                <div class="col-lg-4 responsive-column-half">
                    <div class="card card-item card-preview" data-tooltip-content="#tooltip_content_1">
                        <div class="card-image">
                            <a href="{{route('coursedetail')}}" class="d-block">
                                <img class="card-img-top lazy" src="images/img-loading.png" data-src="images/img11.jpg" alt="درپوش تصویر کارت" />
                            </a>
                        </div>
                        <!-- end card-image -->
                        <div class="card-body">
                            <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">همه مراحل</h6>
                            <h5 class="card-title"><a href="{{route('coursedetail')}}">دوره جامع خانواده</a></h5>
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
                                <p class="card-price text-black font-weight-bold">1000 تومان</p>
                                <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="به لیست علاقه مندی ها اضافه کنید"><i class="la la-heart-o"></i></div>
                            </div>
                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col-lg-4 -->
                <div class="col-lg-4 responsive-column-half">
                    <div class="card card-item card-preview" data-tooltip-content="#tooltip_content_1">
                        <div class="card-image">
                            <a href="{{route('coursedetail')}}" class="d-block">
                                <img class="card-img-top lazy" src="images/img-loading.png" data-src="images/img12.jpg" alt="درپوش تصویر کارت" />
                            </a>
                            <div class="course-badge-labels">
                                <div class="course-badge green">رایگان</div>
                            </div>
                        </div>
                        <!-- end card-image -->
                        <div class="card-body">
                            <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">همه مراحل</h6>
                            <h5 class="card-title"><a href="{{route('coursedetail')}}">دوره جامع خانواده</a></h5>
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
                                <p class="card-price text-black font-weight-bold">رایگان</p>
                                <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="به لیست علاقه مندی ها اضافه کنید"><i class="la la-heart-o"></i></div>
                            </div>
                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col-lg-4 -->
                <div class="col-lg-4 responsive-column-half">
                    <div class="card card-item card-preview" data-tooltip-content="#tooltip_content_1">
                        <div class="card-image">
                            <a href="{{route('coursedetail')}}" class="d-block">
                                <img class="card-img-top lazy" src="images/img-loading.png" data-src="images/img13.jpg" alt="درپوش تصویر کارت" />
                            </a>
                            <div class="course-badge-labels">
                                <div class="course-badge sky-blue">بالاترین امتیاز</div>
                            </div>
                        </div>
                        <!-- end card-image -->
                        <div class="card-body">
                            <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">همه مراحل</h6>
                            <h5 class="card-title"><a href="{{route('coursedetail')}}">دوره جامع خانواده</a></h5>
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
                                <p class="card-price text-black font-weight-bold">1000 تومان</p>
                                <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="به لیست علاقه مندی ها اضافه کنید"><i class="la la-heart-o"></i></div>
                            </div>
                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col-lg-4 -->
            </div>
            <!-- end row -->
            <div class="text-center pt-3">
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
                <p class="fs-14 pt-2">نمایش 1-6 از 56 نتیجه</p>
            </div>
        </div>
        <!-- end container -->
    </section>
@endsection
