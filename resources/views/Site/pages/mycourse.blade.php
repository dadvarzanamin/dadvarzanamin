@extends('master-user')
@section('main')

    <section class="breadcrumb-area py-5 bg-white pattern-bg">
        <div class="container">
            <div class="breadcrumb-content">
                <div class="section-heading">
                    <h2 class="section__title">دوره های من</h2>
                </div>

                <ul class="nav nav-tabs generic-tab pt-30px" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="all-course-tab" data-toggle="tab" href="#all-course" role="tab" aria-controls="all-course" aria-selected="false">
                            همه دوره ها
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="collections-tab" data-toggle="tab" href="#collections" role="tab" aria-controls="collections" aria-selected="true">
                            مجموعه ها
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="wishlist-tab" data-toggle="tab" href="#wishlist" role="tab" aria-controls="wishlist" aria-selected="false">
                            لیست علاقه مندی ها
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="archived-tab" data-toggle="tab" href="#archived" role="tab" aria-controls="archived" aria-selected="false">
                            بایگانی شده
                        </a>
                    </li>
                </ul>
            </div>

        </div>

    </section>

    <section class="my-courses-area pt-30px pb-90px">
        <div class="container">
            <div class="my-course-content-wrap">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="all-course" role="tabpanel" aria-labelledby="all-course-tab">
                        <div class="my-course-body">
                            <div class="alert alert-info alert-dismissible fade show course-alert-info" role="alert">
                                <div class="d-flex align-items-center"><i class="la la-users fs-40"></i> <a href="invite.html" class="alert-link font-weight-medium pl-4">ما را با دوستان خود به اشتراک بگذارید</a></div>
                                <button type="button" class="close fs-20" data-dismiss="alert" aria-label="نزدیک">
                                    <span aria-hidden="true" class="la la-times"></span>
                                </button>
                            </div>

                            <div class="my-course-filter-wrap d-flex align-items-center pt-2">
                                <div class="my-course-filter-item my-course-sort-by-content">
                                    <span class="fs-14 font-weight-semi-bold">مرتب سازی بر اساس</span>
                                    <div class="select-container w-100 pt-2">
                                        <select class="select-container-select">
                                            <option value="0" selected="">مشاهده اخیر</option>
                                            <option value="1">ثبت نام اخیر</option>
                                            <option value="2">عنوان: الف تا ی</option>
                                            <option value="3">عنوان: ی تا الف</option>
                                            <option value="4">تکمیل: 0٪ تا 100٪</option>
                                            <option value="5">تکمیل: 100٪ تا 0٪</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="my-course-filter-item my-course-filter-by-content">
                                    <span class="fs-14 font-weight-semi-bold">محدود شده توسط</span>
                                    <div class="my-course-filter-by-content-inner d-flex align-items-center pt-2">
                                        <div class="select-container">
                                            <select class="select-container-select">
                                                <option value="0" selected="">دسته بندی ها</option>
                                                <option value="1">موارد دلخواه</option>
                                                <option value="2">بایگانی شده</option>
                                                <option value="3">همه دسته بندی ها</option>
                                                <option value="13">سبک زندگی</option>
                                                <option value="14">خانواده</option>
                                            </select>
                                        </div>
                                        <div class="select-container">
                                            <select class="select-container-select">
                                                <option value="0" selected="">پیش رفتن</option>
                                                <option value="1">شروع نشده است</option>
                                                <option value="2">در حال پیش رفت</option>
                                                <option value="3">تکمیل شد</option>
                                            </select>
                                        </div>
                                        <div class="select-container">
                                            <select class="select-container-select">
                                                <option selected="">همه مربی</option>
                                                <option value="1">استاد حیدری کاشانی</option>
                                                <option value="2">استاد پناهیان</option>
                                                <option value="3">استاد میرباقری</option>
                                                <option value="4">استاد مرادی</option>
                                                <option value="5">استاد عالی</option>
                                                <option value="6">استاد رفیعی</option>
                                            </select>
                                        </div>
                                        <div class="reset-btn-box">
                                            <button class="btn text-gray" type="button">ریست</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="my-course-filter-item my-course-search-content">
                                    <span class="fs-14 font-weight-semi-bold">جستجو کردن</span>
                                    <form method="post" class="pt-2">
                                        <div class="input-group mb-0">
                                            <input class="form-control form--control form--control-gray pl-3" type="text" name="search" placeholder="جستجوی دوره ها" />
                                            <div class="input-group-append">
                                                <button class="btn theme-btn shadow-none"><i class="la la-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            <div class="my-course-cards pt-40px">
                                <div class="row">
                                    <div class="col-lg-4 responsive-column-half">
                                        <div class="card card-item">
                                            <div class="card-image">
                                                <a href="lesson-details.html" class="d-block">
                                                    <img class="card-img-top lazy" src="images/img-loading.png" data-src="images/img8.jpg" alt="درپوش تصویر کارت" />
                                                    <div class="play-button">
                                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="-307.4 338.8 91.8 91.8" xml:space="preserve">
                                                                <style type="text/css">
                                                                    .st0 {
                                                                        opacity: 0.6;
                                                                        fill: #000000;
                                                                        border-radius: 100px;
                                                                    }
                                                                    .st1 {
                                                                        fill: #ffffff;
                                                                    }
                                                                </style>
                                                            <g>
                                                                <circle class="st0" cx="-261.5" cy="384.7" r="45.9"></circle>
                                                                <path class="st1" d="M-272.9,363.2l35.8,20.7c0.7,0.4,0.7,1.3,0,1.7l-35.8,20.7c-0.7,0.4-1.5-0.1-1.5-0.9V364C-274.4,363.3-273.5,362.8-272.9,363.2z"></path>
                                                            </g>
                                                            </svg>
                                                    </div>
                                                </a>
                                                <div class="course-badge-labels course--badge-labels">
                                                    <div class="generic-action-wrap generic--action-wrap generic--action-wrap-2">
                                                        <div class="dropdown">
                                                            <a class="action-btn bg-white text-gray dropdown-btn" href="#" role="button" id="allCourseMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="la la-ellipsis-v"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-left dropdown-menu-wrap" aria-labelledby="allCourseMenuLink">
                                                                <h6 class="dropdown-header text-black">مجموعه ها</h6>
                                                                <a href="javascript:void(0)" class="dropdown-item collection-link d-flex align-items-center justify-content-between">
                                                                    <span>تربیت کودک</span>
                                                                    <span class="la la-check collection-icon"></span>
                                                                </a>
                                                                <a href="javascript:void(0)" class="dropdown-item collection-link d-flex align-items-center justify-content-between">
                                                                    <span>تربیت نوجوان</span>
                                                                    <span class="la la-check collection-icon"></span>
                                                                </a>
                                                                <div class="section-block my-2"></div>
                                                                <a href="javascript:void(0)" class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="modal" data-target="#shareModal">
                                                                    <span>اشتراک گذاری</span> <i class="ml-auto la la-share"></i>
                                                                </a>
                                                                <a href="javascript:void(0)" class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="modal" data-target="#createNewCollectionModal">
                                                                    <span>ایجاد مجموعه جدید</span> <i class="ml-auto la la-plus"></i>
                                                                </a>
                                                                <a href="javascript:void(0)" class="dropdown-item d-flex align-items-center justify-content-between">
                                                                    <span class="swapping-btn w-100" data-text-swap="Unfavorite" data-text-original="Favorite">مورد علاقه</span>
                                                                    <i class="ml-auto la la-star"></i>
                                                                </a>
                                                                <a href="javascript:void(0)" class="dropdown-item d-flex align-items-center justify-content-between">
                                                                    <span class="swapping-btn w-100" data-text-swap="Archived" data-text-original="Archive">بایگانی</span>
                                                                    <i class="la la-archive"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <h5 class="card-title"><a href="lesson-details.html">دوره جامع تربیت کودکان</a></h5>
                                                <p class="card-text lh-22 pt-2"><a href="teacher-detail.html">استاد محمدباقر حیدری کاشانی</a><span>دوره جامع خانواده 1</span></p>
                                                <div class="my-course-progress-bar-wrap d-flex flex-wrap align-items-center mt-3 position-relative">
                                                    <p class="skillbar-title">کامل:</p>
                                                    <div class="skillbar-box">
                                                        <div class="skillbar skillbar-skillbar-2" data-percent="70%">
                                                            <div class="skillbar-bar skillbar--bar-2 bg-1"></div>
                                                        </div>

                                                    </div>
                                                    <div class="skill-bar-percent">70%</div>
                                                </div>

                                                <div class="rating-wrap d-flex align-items-center justify-content-between pt-3">
                                                    <div class="review-stars">
                                                        <span class="la la-star"></span>
                                                        <span class="la la-star"></span>
                                                        <span class="la la-star"></span>
                                                        <span class="la la-star"></span>
                                                        <span class="la la-star-o"></span>
                                                    </div>
                                                    <a href="#" class="btn theme-btn theme-btn-sm theme-btn-transparent" data-toggle="modal" data-target="#ratingModal">رتبه بندی بگذارید</a>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-4 responsive-column-half">
                                        <div class="card card-item">
                                            <div class="card-image">
                                                <a href="lesson-details.html" class="d-block">
                                                    <img class="card-img-top lazy" src="images/img-loading.png" data-src="images/img9.jpg" alt="درپوش تصویر کارت" />
                                                    <div class="play-button">
                                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="-307.4 338.8 91.8 91.8" xml:space="preserve">
                                                                <style type="text/css">
                                                                    .st0 {
                                                                        opacity: 0.6;
                                                                        fill: #000000;
                                                                        border-radius: 100px;
                                                                    }
                                                                    .st1 {
                                                                        fill: #ffffff;
                                                                    }
                                                                </style>
                                                            <g>
                                                                <circle class="st0" cx="-261.5" cy="384.7" r="45.9"></circle>
                                                                <path class="st1" d="M-272.9,363.2l35.8,20.7c0.7,0.4,0.7,1.3,0,1.7l-35.8,20.7c-0.7,0.4-1.5-0.1-1.5-0.9V364C-274.4,363.3-273.5,362.8-272.9,363.2z"></path>
                                                            </g>
                                                            </svg>
                                                    </div>
                                                </a>
                                                <div class="course-badge-labels course--badge-labels">
                                                    <div class="generic-action-wrap generic--action-wrap generic--action-wrap-2">
                                                        <div class="dropdown">
                                                            <a class="action-btn bg-white text-gray dropdown-btn" href="#" role="button" id="allCourseMenuLinkTwo" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="la la-ellipsis-v"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-left dropdown-menu-wrap" aria-labelledby="allCourseMenuLinkTwo">
                                                                <h6 class="dropdown-header text-black">مجموعه ها</h6>
                                                                <p class="dropdown-header">شما هیچ مجموعه ای ندارید</p>
                                                                <div class="section-block my-2"></div>
                                                                <a href="javascript:void(0)" class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="modal" data-target="#shareModal">
                                                                    <span>اشتراک گذاری</span> <i class="ml-auto la la-share"></i>
                                                                </a>
                                                                <a href="javascript:void(0)" class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="modal" data-target="#createNewCollectionModal">
                                                                    <span>ایجاد مجموعه جدید</span> <i class="ml-auto la la-plus"></i>
                                                                </a>
                                                                <a href="javascript:void(0)" class="dropdown-item d-flex align-items-center justify-content-between">
                                                                    <span class="swapping-btn w-100" data-text-swap="Unfavorite" data-text-original="Favorite">مورد علاقه</span>
                                                                    <i class="ml-auto la la-star"></i>
                                                                </a>
                                                                <a href="javascript:void(0)" class="dropdown-item d-flex align-items-center justify-content-between">
                                                                    <span class="swapping-btn w-100" data-text-swap="Archived" data-text-original="Archive">بایگانی</span>
                                                                    <i class="la la-archive"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <h5 class="card-title"><a href="lesson-details.html">دوره تربیت نوجوان</a></h5>
                                                <p class="card-text lh-22 pt-2"><a href="teacher-detail.html">استاد محمدباقر حیدری کاشانی</a><span>دوره جامع خانواده 1</span></p>
                                                <div class="my-course-progress-bar-wrap d-flex flex-wrap align-items-center mt-3 position-relative">
                                                    <p class="skillbar-title">کامل:</p>
                                                    <div class="skillbar-box">
                                                        <div class="skillbar skillbar-skillbar-2" data-percent="0%">
                                                            <div class="skillbar-bar skillbar--bar-2 bg-1"></div>
                                                        </div>

                                                    </div>
                                                    <div class="skill-bar-percent">0%</div>
                                                </div>

                                                <div class="rating-wrap d-flex align-items-center justify-content-between pt-3">
                                                    <div class="review-stars">
                                                        <span class="la la-star-o"></span>
                                                        <span class="la la-star-o"></span>
                                                        <span class="la la-star-o"></span>
                                                        <span class="la la-star-o"></span>
                                                        <span class="la la-star-o"></span>
                                                    </div>
                                                    <a href="#" class="btn theme-btn theme-btn-sm theme-btn-transparent" data-toggle="modal" data-target="#ratingModal">رتبه بندی بگذارید</a>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-4 responsive-column-half">
                                        <div class="card card-item">
                                            <div class="card-image">
                                                <a href="lesson-details.html" class="d-block">
                                                    <img class="card-img-top lazy" src="images/img-loading.png" data-src="images/img10.jpg" alt="درپوش تصویر کارت" />
                                                    <div class="play-button">
                                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="-307.4 338.8 91.8 91.8" xml:space="preserve">
                                                                <style type="text/css">
                                                                    .st0 {
                                                                        opacity: 0.6;
                                                                        fill: #000000;
                                                                        border-radius: 100px;
                                                                    }
                                                                    .st1 {
                                                                        fill: #ffffff;
                                                                    }
                                                                </style>
                                                            <g>
                                                                <circle class="st0" cx="-261.5" cy="384.7" r="45.9"></circle>
                                                                <path class="st1" d="M-272.9,363.2l35.8,20.7c0.7,0.4,0.7,1.3,0,1.7l-35.8,20.7c-0.7,0.4-1.5-0.1-1.5-0.9V364C-274.4,363.3-273.5,362.8-272.9,363.2z"></path>
                                                            </g>
                                                            </svg>
                                                    </div>
                                                </a>
                                                <div class="course-badge-labels course--badge-labels">
                                                    <div class="generic-action-wrap generic--action-wrap generic--action-wrap-2">
                                                        <div class="dropdown">
                                                            <a class="action-btn bg-white text-gray dropdown-btn" href="#" role="button" id="allCourseMenuLinkThree" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="la la-ellipsis-v"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-left dropdown-menu-wrap" aria-labelledby="allCourseMenuLinkThree">
                                                                <h6 class="dropdown-header text-black">مجموعه ها</h6>
                                                                <a href="javascript:void(0)" class="dropdown-item collection-link d-flex align-items-center justify-content-between">
                                                                    <span>دوره تربیتی</span>
                                                                    <span class="la la-check collection-icon"></span>
                                                                </a>
                                                                <a href="javascript:void(0)" class="dropdown-item collection-link d-flex align-items-center justify-content-between">
                                                                    <span>تربیت فرزند</span>
                                                                    <span class="la la-check collection-icon"></span>
                                                                </a>
                                                                <div class="section-block my-2"></div>
                                                                <a href="javascript:void(0)" class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="modal" data-target="#shareModal">
                                                                    <span>اشتراک گذاری</span> <i class="ml-auto la la-share"></i>
                                                                </a>
                                                                <a href="javascript:void(0)" class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="modal" data-target="#createNewCollectionModal">
                                                                    <span>ایجاد مجموعه جدید</span> <i class="ml-auto la la-plus"></i>
                                                                </a>
                                                                <a href="javascript:void(0)" class="dropdown-item d-flex align-items-center justify-content-between">
                                                                    <span class="swapping-btn w-100" data-text-swap="Unfavorite" data-text-original="Favorite">مورد علاقه</span>
                                                                    <i class="ml-auto la la-star"></i>
                                                                </a>
                                                                <a href="javascript:void(0)" class="dropdown-item d-flex align-items-center justify-content-between">
                                                                    <span class="swapping-btn w-100" data-text-swap="Archived" data-text-original="Archive">بایگانی</span>
                                                                    <i class="la la-archive"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <h5 class="card-title"><a href="lesson-details.html">دوره تربیت جوان انقلابی</a></h5>
                                                <p class="card-text lh-22 pt-2"><a href="teacher-detail.html">استاد محمدباقر حیدری کاشانی</a><span>دوره جامع خانواده 1</span></p>
                                                <div class="my-course-progress-bar-wrap d-flex flex-wrap align-items-center mt-3 position-relative">
                                                    <p class="skillbar-title">کامل:</p>
                                                    <div class="skillbar-box">
                                                        <div class="skillbar skillbar-skillbar-2" data-percent="0%">
                                                            <div class="skillbar-bar skillbar--bar-2 bg-1"></div>
                                                        </div>

                                                    </div>
                                                    <div class="skill-bar-percent">0%</div>
                                                </div>

                                                <div class="rating-wrap d-flex align-items-center justify-content-between pt-3">
                                                    <div class="review-stars">
                                                        <span class="la la-star-o"></span>
                                                        <span class="la la-star-o"></span>
                                                        <span class="la la-star-o"></span>
                                                        <span class="la la-star-o"></span>
                                                        <span class="la la-star-o"></span>
                                                    </div>
                                                    <a href="#" class="btn theme-btn theme-btn-sm theme-btn-transparent" data-toggle="modal" data-target="#ratingModal">رتبه بندی بگذارید</a>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-4 responsive-column-half">
                                        <div class="card card-item">
                                            <div class="card-image">
                                                <a href="lesson-details.html" class="d-block">
                                                    <img class="card-img-top lazy" src="images/img-loading.png" data-src="images/img11.jpg" alt="درپوش تصویر کارت" />
                                                    <div class="play-button">
                                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="-307.4 338.8 91.8 91.8" xml:space="preserve">
                                                                <style type="text/css">
                                                                    .st0 {
                                                                        opacity: 0.6;
                                                                        fill: #000000;
                                                                        border-radius: 100px;
                                                                    }
                                                                    .st1 {
                                                                        fill: #ffffff;
                                                                    }
                                                                </style>
                                                            <g>
                                                                <circle class="st0" cx="-261.5" cy="384.7" r="45.9"></circle>
                                                                <path class="st1" d="M-272.9,363.2l35.8,20.7c0.7,0.4,0.7,1.3,0,1.7l-35.8,20.7c-0.7,0.4-1.5-0.1-1.5-0.9V364C-274.4,363.3-273.5,362.8-272.9,363.2z"></path>
                                                            </g>
                                                            </svg>
                                                    </div>
                                                </a>
                                                <div class="course-badge-labels course--badge-labels">
                                                    <div class="generic-action-wrap generic--action-wrap generic--action-wrap-2">
                                                        <div class="dropdown">
                                                            <a class="action-btn bg-white text-gray dropdown-btn" href="#" role="button" id="allCourseMenuLinkFour" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="la la-ellipsis-v"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-left dropdown-menu-wrap" aria-labelledby="allCourseMenuLinkFour">
                                                                <h6 class="dropdown-header text-black">مجموعه ها</h6>
                                                                <a href="javascript:void(0)" class="dropdown-item collection-link d-flex align-items-center justify-content-between">
                                                                    <span>دوره تربیتی</span>
                                                                    <span class="la la-check collection-icon"></span>
                                                                </a>
                                                                <a href="javascript:void(0)" class="dropdown-item collection-link d-flex align-items-center justify-content-between">
                                                                    <span>تربیت فرزند</span>
                                                                    <span class="la la-check collection-icon"></span>
                                                                </a>
                                                                <div class="section-block my-2"></div>
                                                                <a href="javascript:void(0)" class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="modal" data-target="#shareModal">
                                                                    <span>اشتراک گذاری</span> <i class="ml-auto la la-share"></i>
                                                                </a>
                                                                <a href="javascript:void(0)" class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="modal" data-target="#createNewCollectionModal">
                                                                    <span>ایجاد مجموعه جدید</span> <i class="ml-auto la la-plus"></i>
                                                                </a>
                                                                <a href="javascript:void(0)" class="dropdown-item d-flex align-items-center justify-content-between">
                                                                    <span class="swapping-btn w-100" data-text-swap="Unfavorite" data-text-original="Favorite">مورد علاقه</span>
                                                                    <i class="ml-auto la la-star"></i>
                                                                </a>
                                                                <a href="javascript:void(0)" class="dropdown-item d-flex align-items-center justify-content-between">
                                                                    <span class="swapping-btn w-100" data-text-swap="Archived" data-text-original="Archive">بایگانی</span>
                                                                    <i class="la la-archive"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <h5 class="card-title"><a href="lesson-details.html">دوره جامع تربیت کودکان</a></h5>
                                                <p class="card-text lh-22 pt-2"><a href="teacher-detail.html">استاد محمدباقر حیدری کاشانی</a><span>دوره جامع خانواده 1</span></p>
                                                <div class="my-course-progress-bar-wrap d-flex flex-wrap align-items-center mt-3 position-relative">
                                                    <p class="skillbar-title">کامل:</p>
                                                    <div class="skillbar-box">
                                                        <div class="skillbar skillbar-skillbar-2" data-percent="70%">
                                                            <div class="skillbar-bar skillbar--bar-2 bg-1"></div>
                                                        </div>

                                                    </div>
                                                    <div class="skill-bar-percent">70%</div>
                                                </div>

                                                <div class="rating-wrap d-flex align-items-center justify-content-between pt-3">
                                                    <div class="review-stars">
                                                        <span class="la la-star-o"></span>
                                                        <span class="la la-star-o"></span>
                                                        <span class="la la-star-o"></span>
                                                        <span class="la la-star-o"></span>
                                                        <span class="la la-star-o"></span>
                                                    </div>
                                                    <a href="#" class="btn theme-btn theme-btn-sm theme-btn-transparent" data-toggle="modal" data-target="#ratingModal">رتبه بندی بگذارید</a>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-4 responsive-column-half">
                                        <div class="card card-item">
                                            <div class="card-image">
                                                <a href="lesson-details.html" class="d-block">
                                                    <img class="card-img-top lazy" src="images/img-loading.png" data-src="images/img12.jpg" alt="درپوش تصویر کارت" />
                                                    <div class="play-button">
                                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="-307.4 338.8 91.8 91.8" xml:space="preserve">
                                                                <style type="text/css">
                                                                    .st0 {
                                                                        opacity: 0.6;
                                                                        fill: #000000;
                                                                        border-radius: 100px;
                                                                    }
                                                                    .st1 {
                                                                        fill: #ffffff;
                                                                    }
                                                                </style>
                                                            <g>
                                                                <circle class="st0" cx="-261.5" cy="384.7" r="45.9"></circle>
                                                                <path class="st1" d="M-272.9,363.2l35.8,20.7c0.7,0.4,0.7,1.3,0,1.7l-35.8,20.7c-0.7,0.4-1.5-0.1-1.5-0.9V364C-274.4,363.3-273.5,362.8-272.9,363.2z"></path>
                                                            </g>
                                                            </svg>
                                                    </div>
                                                </a>
                                                <div class="course-badge-labels course--badge-labels">
                                                    <div class="generic-action-wrap generic--action-wrap generic--action-wrap-2">
                                                        <div class="dropdown">
                                                            <a class="action-btn bg-white text-gray dropdown-btn" href="#" role="button" id="allCourseMenuLinkFive" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="la la-ellipsis-v"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-left dropdown-menu-wrap" aria-labelledby="allCourseMenuLinkFive">
                                                                <h6 class="dropdown-header text-black">مجموعه ها</h6>
                                                                <p class="dropdown-header">شما هیچ مجموعه ای ندارید</p>
                                                                <div class="section-block my-2"></div>
                                                                <a href="javascript:void(0)" class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="modal" data-target="#shareModal">
                                                                    <span>اشتراک گذاری</span> <i class="ml-auto la la-share"></i>
                                                                </a>
                                                                <a href="javascript:void(0)" class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="modal" data-target="#createNewCollectionModal">
                                                                    <span>ایجاد مجموعه جدید</span> <i class="ml-auto la la-plus"></i>
                                                                </a>
                                                                <a href="javascript:void(0)" class="dropdown-item d-flex align-items-center justify-content-between">
                                                                    <span class="swapping-btn w-100" data-text-swap="Unfavorite" data-text-original="Favorite">مورد علاقه</span>
                                                                    <i class="ml-auto la la-star"></i>
                                                                </a>
                                                                <a href="javascript:void(0)" class="dropdown-item d-flex align-items-center justify-content-between">
                                                                    <span class="swapping-btn w-100" data-text-swap="Archived" data-text-original="Archive">بایگانی</span>
                                                                    <i class="la la-archive"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <h5 class="card-title"><a href="lesson-details.html">دوره تربیت نوجوان</a></h5>
                                                <p class="card-text lh-22 pt-2"><a href="teacher-detail.html">استاد محمدباقر حیدری کاشانی</a><span>دوره جامع خانواده 1</span></p>
                                                <div class="my-course-progress-bar-wrap d-flex flex-wrap align-items-center mt-3 position-relative">
                                                    <p class="skillbar-title">کامل:</p>
                                                    <div class="skillbar-box">
                                                        <div class="skillbar skillbar-skillbar-2" data-percent="0%">
                                                            <div class="skillbar-bar skillbar--bar-2 bg-1"></div>
                                                        </div>

                                                    </div>
                                                    <div class="skill-bar-percent">0%</div>
                                                </div>

                                                <div class="rating-wrap d-flex align-items-center justify-content-between pt-3">
                                                    <div class="review-stars">
                                                        <span class="la la-star-o"></span>
                                                        <span class="la la-star-o"></span>
                                                        <span class="la la-star-o"></span>
                                                        <span class="la la-star-o"></span>
                                                        <span class="la la-star-o"></span>
                                                    </div>
                                                    <a href="#" class="btn theme-btn theme-btn-sm theme-btn-transparent" data-toggle="modal" data-target="#ratingModal">رتبه بندی بگذارید</a>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-4 responsive-column-half">
                                        <div class="card card-item">
                                            <div class="card-image">
                                                <a href="lesson-details.html" class="d-block">
                                                    <img class="card-img-top lazy" src="images/img-loading.png" data-src="images/img13.jpg" alt="درپوش تصویر کارت" />
                                                    <div class="play-button">
                                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="-307.4 338.8 91.8 91.8" xml:space="preserve">
                                                                <style type="text/css">
                                                                    .st0 {
                                                                        opacity: 0.6;
                                                                        fill: #000000;
                                                                        border-radius: 100px;
                                                                    }
                                                                    .st1 {
                                                                        fill: #ffffff;
                                                                    }
                                                                </style>
                                                            <g>
                                                                <circle class="st0" cx="-261.5" cy="384.7" r="45.9"></circle>
                                                                <path class="st1" d="M-272.9,363.2l35.8,20.7c0.7,0.4,0.7,1.3,0,1.7l-35.8,20.7c-0.7,0.4-1.5-0.1-1.5-0.9V364C-274.4,363.3-273.5,362.8-272.9,363.2z"></path>
                                                            </g>
                                                            </svg>
                                                    </div>
                                                </a>
                                                <div class="course-badge-labels course--badge-labels">
                                                    <div class="generic-action-wrap generic--action-wrap generic--action-wrap-2">
                                                        <div class="dropdown">
                                                            <a class="action-btn bg-white text-gray dropdown-btn" href="#" role="button" id="allCourseMenuLinkSix" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="la la-ellipsis-v"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-left dropdown-menu-wrap" aria-labelledby="allCourseMenuLinkSix">
                                                                <h6 class="dropdown-header text-black">مجموعه ها</h6>
                                                                <a href="javascript:void(0)" class="dropdown-item collection-link d-flex align-items-center justify-content-between">
                                                                    <span>دوره تربیتی</span>
                                                                    <span class="la la-check collection-icon"></span>
                                                                </a>
                                                                <a href="javascript:void(0)" class="dropdown-item collection-link d-flex align-items-center justify-content-between">
                                                                    <span>تربیت فرزند</span>
                                                                    <span class="la la-check collection-icon"></span>
                                                                </a>
                                                                <div class="section-block my-2"></div>
                                                                <a href="javascript:void(0)" class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="modal" data-target="#shareModal">
                                                                    <span>اشتراک گذاری</span> <i class="ml-auto la la-share"></i>
                                                                </a>
                                                                <a href="javascript:void(0)" class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="modal" data-target="#createNewCollectionModal">
                                                                    <span>ایجاد مجموعه جدید</span> <i class="ml-auto la la-plus"></i>
                                                                </a>
                                                                <a href="javascript:void(0)" class="dropdown-item d-flex align-items-center justify-content-between">
                                                                    <span class="swapping-btn w-100" data-text-swap="Unfavorite" data-text-original="Favorite">مورد علاقه</span>
                                                                    <i class="ml-auto la la-star"></i>
                                                                </a>
                                                                <a href="javascript:void(0)" class="dropdown-item d-flex align-items-center justify-content-between">
                                                                    <span class="swapping-btn w-100" data-text-swap="Archived" data-text-original="Archive">بایگانی</span>
                                                                    <i class="la la-archive"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <h5 class="card-title"><a href="lesson-details.html">دوره تربیت جوان انقلابی</a></h5>
                                                <p class="card-text lh-22 pt-2"><a href="teacher-detail.html">استاد محمدباقر حیدری کاشانی</a><span>دوره جامع خانواده 1</span></p>
                                                <div class="my-course-progress-bar-wrap d-flex flex-wrap align-items-center mt-3 position-relative">
                                                    <p class="skillbar-title">کامل:</p>
                                                    <div class="skillbar-box">
                                                        <div class="skillbar skillbar-skillbar-2" data-percent="0%">
                                                            <div class="skillbar-bar skillbar--bar-2 bg-1"></div>
                                                        </div>

                                                    </div>
                                                    <div class="skill-bar-percent">0%</div>
                                                </div>

                                                <div class="rating-wrap d-flex align-items-center justify-content-between pt-3">
                                                    <div class="review-stars">
                                                        <span class="la la-star-o"></span>
                                                        <span class="la la-star-o"></span>
                                                        <span class="la la-star-o"></span>
                                                        <span class="la la-star-o"></span>
                                                        <span class="la la-star-o"></span>
                                                    </div>
                                                    <a href="#" class="btn theme-btn theme-btn-sm theme-btn-transparent" data-toggle="modal" data-target="#ratingModal">رتبه بندی بگذارید</a>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

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

                        </div>

                    </div>

                    <div class="tab-pane fade" id="collections" role="tabpanel" aria-labelledby="collections-tab">
                        <div class="my-course-body">
                            <div class="my-collection-item">
                                <div class="my-course-info pb-40px">
                                    <div class="d-flex align-items-center pb-2">
                                        <h3 class="fs-22 font-weight-semi-bold">دوره تربیتی</h3>
                                        <div class="my-course-info-action ml-2">
                                            <span class="la la-edit icon-element icon-element-xs cursor-pointer shadow-sm" data-toggle="modal" data-target="#editCollectionModal" title="ویرایش کنید"></span>
                                            <span class="la la-trash icon-element icon-element-xs cursor-pointer shadow-sm" data-toggle="modal" data-target="#deleteModal" title="حذف"></span>
                                        </div>
                                    </div>
                                    <p>تربیت فرزند</p>
                                </div>

                                <div class="my-course-cards">
                                    <div class="row">
                                        <div class="col-lg-4 responsive-column-half">
                                            <div class="card card-item">
                                                <div class="card-image">
                                                    <a href="lesson-details.html" class="d-block">
                                                        <img class="card-img-top lazy" src="images/img-loading.png" data-src="images/img8.jpg" alt="درپوش تصویر کارت" />
                                                        <div class="play-button">
                                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="-307.4 338.8 91.8 91.8" xml:space="preserve">
                                                                    <style type="text/css">
                                                                        .st0 {
                                                                            opacity: 0.6;
                                                                            fill: #000000;
                                                                            border-radius: 100px;
                                                                        }
                                                                        .st1 {
                                                                            fill: #ffffff;
                                                                        }
                                                                    </style>
                                                                <g>
                                                                    <circle class="st0" cx="-261.5" cy="384.7" r="45.9"></circle>
                                                                    <path class="st1" d="M-272.9,363.2l35.8,20.7c0.7,0.4,0.7,1.3,0,1.7l-35.8,20.7c-0.7,0.4-1.5-0.1-1.5-0.9V364C-274.4,363.3-273.5,362.8-272.9,363.2z"></path>
                                                                </g>
                                                                </svg>
                                                        </div>
                                                    </a>
                                                    <div class="course-badge-labels course--badge-labels">
                                                        <div class="generic-action-wrap generic--action-wrap generic--action-wrap-2">
                                                            <div class="dropdown">
                                                                <a class="action-btn bg-white text-gray dropdown-btn" href="#" role="button" id="collectionMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="la la-ellipsis-v"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-left dropdown-menu-wrap" aria-labelledby="collectionMenuLink">
                                                                    <a href="javascript:void(0)" class="dropdown-item">
                                                                        حذف از مجموعه
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card-body">
                                                    <h5 class="card-title"><a href="lesson-details.html">دوره جامع تربیت کودکان</a></h5>
                                                    <p class="card-text lh-22 pt-2"><a href="teacher-detail.html">استاد محمدباقر حیدری کاشانی</a><span>دوره جامع خانواده 1</span></p>
                                                    <div class="my-course-progress-bar-wrap d-flex flex-wrap align-items-center mt-3 position-relative">
                                                        <p class="skillbar-title">کامل:</p>
                                                        <div class="skillbar-box">
                                                            <div class="skillbar skillbar-skillbar-2" data-percent="70%">
                                                                <div class="skillbar-bar skillbar--bar-2 bg-1"></div>
                                                            </div>

                                                        </div>
                                                        <div class="skill-bar-percent">70%</div>
                                                    </div>

                                                    <div class="rating-wrap d-flex align-items-center justify-content-between pt-3">
                                                        <div class="review-stars">
                                                            <span class="la la-star-o"></span>
                                                            <span class="la la-star-o"></span>
                                                            <span class="la la-star-o"></span>
                                                            <span class="la la-star-o"></span>
                                                            <span class="la la-star-o"></span>
                                                        </div>
                                                        <a href="#" class="btn theme-btn theme-btn-sm theme-btn-transparent" data-toggle="modal" data-target="#ratingModal">رتبه بندی بگذارید</a>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-lg-4 responsive-column-half">
                                            <div class="card card-item">
                                                <div class="card-image">
                                                    <a href="lesson-details.html" class="d-block">
                                                        <img class="card-img-top lazy" src="images/img-loading.png" data-src="images/img9.jpg" alt="درپوش تصویر کارت" />
                                                        <div class="play-button">
                                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="-307.4 338.8 91.8 91.8" xml:space="preserve">
                                                                    <style type="text/css">
                                                                        .st0 {
                                                                            opacity: 0.6;
                                                                            fill: #000000;
                                                                            border-radius: 100px;
                                                                        }
                                                                        .st1 {
                                                                            fill: #ffffff;
                                                                        }
                                                                    </style>
                                                                <g>
                                                                    <circle class="st0" cx="-261.5" cy="384.7" r="45.9"></circle>
                                                                    <path class="st1" d="M-272.9,363.2l35.8,20.7c0.7,0.4,0.7,1.3,0,1.7l-35.8,20.7c-0.7,0.4-1.5-0.1-1.5-0.9V364C-274.4,363.3-273.5,362.8-272.9,363.2z"></path>
                                                                </g>
                                                                </svg>
                                                        </div>
                                                    </a>
                                                    <div class="course-badge-labels course--badge-labels">
                                                        <div class="generic-action-wrap generic--action-wrap generic--action-wrap-2">
                                                            <div class="dropdown">
                                                                <a class="action-btn bg-white text-gray dropdown-btn" href="#" role="button" id="collectionMenuLinkTwo" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="la la-ellipsis-v"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-left dropdown-menu-wrap" aria-labelledby="collectionMenuLinkTwo">
                                                                    <a href="javascript:void(0)" class="dropdown-item">
                                                                        حذف از مجموعه
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card-body">
                                                    <h5 class="card-title"><a href="lesson-details.html">دوره تربیتی مدرن از ابتدا</a></h5>
                                                    <p class="card-text lh-22 pt-2"><a href="teacher-detail.html">استاد محمدباقر حیدری کاشانی</a><span>دوره جامع خانواده 1</span></p>
                                                    <div class="my-course-progress-bar-wrap d-flex flex-wrap align-items-center mt-3 position-relative">
                                                        <p class="skillbar-title">کامل:</p>
                                                        <div class="skillbar-box">
                                                            <div class="skillbar skillbar-skillbar-2" data-percent="0%">
                                                                <div class="skillbar-bar skillbar--bar-2 bg-1"></div>
                                                            </div>

                                                        </div>
                                                        <div class="skill-bar-percent">0%</div>
                                                    </div>

                                                    <div class="rating-wrap d-flex align-items-center justify-content-between pt-3">
                                                        <div class="review-stars">
                                                            <span class="la la-star-o"></span>
                                                            <span class="la la-star-o"></span>
                                                            <span class="la la-star-o"></span>
                                                            <span class="la la-star-o"></span>
                                                            <span class="la la-star-o"></span>
                                                        </div>
                                                        <a href="#" class="btn theme-btn theme-btn-sm theme-btn-transparent" data-toggle="modal" data-target="#ratingModal">رتبه بندی بگذارید</a>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-lg-4 responsive-column-half">
                                            <div class="card card-item">
                                                <div class="card-image">
                                                    <a href="lesson-details.html" class="d-block">
                                                        <img class="card-img-top lazy" src="images/img-loading.png" data-src="images/img10.jpg" alt="درپوش تصویر کارت" />
                                                        <div class="play-button">
                                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="-307.4 338.8 91.8 91.8" xml:space="preserve">
                                                                    <style type="text/css">
                                                                        .st0 {
                                                                            opacity: 0.6;
                                                                            fill: #000000;
                                                                            border-radius: 100px;
                                                                        }
                                                                        .st1 {
                                                                            fill: #ffffff;
                                                                        }
                                                                    </style>
                                                                <g>
                                                                    <circle class="st0" cx="-261.5" cy="384.7" r="45.9"></circle>
                                                                    <path class="st1" d="M-272.9,363.2l35.8,20.7c0.7,0.4,0.7,1.3,0,1.7l-35.8,20.7c-0.7,0.4-1.5-0.1-1.5-0.9V364C-274.4,363.3-273.5,362.8-272.9,363.2z"></path>
                                                                </g>
                                                                </svg>
                                                        </div>
                                                    </a>
                                                    <div class="course-badge-labels course--badge-labels">
                                                        <div class="generic-action-wrap generic--action-wrap generic--action-wrap-2">
                                                            <div class="dropdown">
                                                                <a class="action-btn bg-white text-gray dropdown-btn" href="#" role="button" id="collectionMenuLinkThree" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="la la-ellipsis-v"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-left dropdown-menu-wrap" aria-labelledby="collectionMenuLinkThree">
                                                                    <a href="javascript:void(0)" class="dropdown-item">
                                                                        حذف از مجموعه
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card-body">
                                                    <h5 class="card-title"><a href="lesson-details.html">دوره کامل دوره تربیتی 2020</a></h5>
                                                    <p class="card-text lh-22 pt-2"><a href="teacher-detail.html">استاد محمدباقر حیدری کاشانی</a><span>دوره جامع خانواده 1</span></p>
                                                    <div class="my-course-progress-bar-wrap d-flex flex-wrap align-items-center mt-3 position-relative">
                                                        <p class="skillbar-title">کامل:</p>
                                                        <div class="skillbar-box">
                                                            <div class="skillbar skillbar-skillbar-2" data-percent="0%">
                                                                <div class="skillbar-bar skillbar--bar-2 bg-1"></div>
                                                            </div>

                                                        </div>
                                                        <div class="skill-bar-percent">0%</div>
                                                    </div>

                                                    <div class="rating-wrap d-flex align-items-center justify-content-between pt-3">
                                                        <div class="review-stars">
                                                            <span class="la la-star-o"></span>
                                                            <span class="la la-star-o"></span>
                                                            <span class="la la-star-o"></span>
                                                            <span class="la la-star-o"></span>
                                                            <span class="la la-star-o"></span>
                                                        </div>
                                                        <a href="#" class="btn theme-btn theme-btn-sm theme-btn-transparent" data-toggle="modal" data-target="#ratingModal">رتبه بندی بگذارید</a>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="my-collection-item">
                                <div class="my-course-info pb-40px">
                                    <div class="d-flex align-items-center pb-2">
                                        <h3 class="fs-22 font-weight-semi-bold">تربیت فرزند</h3>
                                        <div class="my-course-info-action ml-2">
                                            <span class="la la-edit icon-element icon-element-xs cursor-pointer shadow-sm" data-toggle="modal" data-target="#editCollectionModal" title="ویرایش کنید"></span>
                                            <span class="la la-trash icon-element icon-element-xs cursor-pointer shadow-sm" data-toggle="modal" data-target="#deleteModal" title="حذف"></span>
                                        </div>
                                    </div>
                                    <p>تربیت فرزند</p>
                                </div>

                                <div class="my-course-cards">
                                    <div class="row">
                                        <div class="col-lg-4 responsive-column-half">
                                            <div class="card card-item">
                                                <div class="card-image">
                                                    <a href="lesson-details.html" class="d-block">
                                                        <img class="card-img-top lazy" src="images/img-loading.png" data-src="images/img11.jpg" alt="درپوش تصویر کارت" />
                                                        <div class="play-button">
                                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="-307.4 338.8 91.8 91.8" xml:space="preserve">
                                                                    <style type="text/css">
                                                                        .st0 {
                                                                            opacity: 0.6;
                                                                            fill: #000000;
                                                                            border-radius: 100px;
                                                                        }
                                                                        .st1 {
                                                                            fill: #ffffff;
                                                                        }
                                                                    </style>
                                                                <g>
                                                                    <circle class="st0" cx="-261.5" cy="384.7" r="45.9"></circle>
                                                                    <path class="st1" d="M-272.9,363.2l35.8,20.7c0.7,0.4,0.7,1.3,0,1.7l-35.8,20.7c-0.7,0.4-1.5-0.1-1.5-0.9V364C-274.4,363.3-273.5,362.8-272.9,363.2z"></path>
                                                                </g>
                                                                </svg>
                                                        </div>
                                                    </a>
                                                    <div class="course-badge-labels course--badge-labels">
                                                        <div class="generic-action-wrap generic--action-wrap generic--action-wrap-2">
                                                            <div class="dropdown">
                                                                <a class="action-btn bg-white text-gray dropdown-btn" href="#" role="button" id="collectionMenuLinkFour" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="la la-ellipsis-v"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-left dropdown-menu-wrap" aria-labelledby="collectionMenuLinkFour">
                                                                    <a href="javascript:void(0)" class="dropdown-item">
                                                                        حذف از مجموعه
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card-body">
                                                    <h5 class="card-title"><a href="lesson-details.html">دوره تربیت ، جوان ، مدیریت</a></h5>
                                                    <p class="card-text lh-22 pt-2"><a href="teacher-detail.html">استاد محمدباقر حیدری کاشانی</a><span>دوره جامع خانواده 1</span></p>
                                                    <div class="my-course-progress-bar-wrap d-flex flex-wrap align-items-center mt-3 position-relative">
                                                        <p class="skillbar-title">کامل:</p>
                                                        <div class="skillbar-box">
                                                            <div class="skillbar skillbar-skillbar-2" data-percent="70%">
                                                                <div class="skillbar-bar skillbar--bar-2 bg-1"></div>
                                                            </div>

                                                        </div>
                                                        <div class="skill-bar-percent">70%</div>
                                                    </div>

                                                    <div class="rating-wrap d-flex align-items-center justify-content-between pt-3">
                                                        <div class="review-stars">
                                                            <span class="la la-star-o"></span>
                                                            <span class="la la-star-o"></span>
                                                            <span class="la la-star-o"></span>
                                                            <span class="la la-star-o"></span>
                                                            <span class="la la-star-o"></span>
                                                        </div>
                                                        <a href="#" class="btn theme-btn theme-btn-sm theme-btn-transparent" data-toggle="modal" data-target="#ratingModal">رتبه بندی بگذارید</a>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-lg-4 responsive-column-half">
                                            <div class="card card-item">
                                                <div class="card-image">
                                                    <a href="lesson-details.html" class="d-block">
                                                        <img class="card-img-top lazy" src="images/img-loading.png" data-src="images/img12.jpg" alt="درپوش تصویر کارت" />
                                                        <div class="play-button">
                                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="-307.4 338.8 91.8 91.8" xml:space="preserve">
                                                                    <style type="text/css">
                                                                        .st0 {
                                                                            opacity: 0.6;
                                                                            fill: #000000;
                                                                            border-radius: 100px;
                                                                        }
                                                                        .st1 {
                                                                            fill: #ffffff;
                                                                        }
                                                                    </style>
                                                                <g>
                                                                    <circle class="st0" cx="-261.5" cy="384.7" r="45.9"></circle>
                                                                    <path class="st1" d="M-272.9,363.2l35.8,20.7c0.7,0.4,0.7,1.3,0,1.7l-35.8,20.7c-0.7,0.4-1.5-0.1-1.5-0.9V364C-274.4,363.3-273.5,362.8-272.9,363.2z"></path>
                                                                </g>
                                                                </svg>
                                                        </div>
                                                    </a>
                                                    <div class="course-badge-labels course--badge-labels">
                                                        <div class="generic-action-wrap generic--action-wrap generic--action-wrap-2">
                                                            <div class="dropdown">
                                                                <a class="action-btn bg-white text-gray dropdown-btn" href="#" role="button" id="collectionMenuLinkFive" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="la la-ellipsis-v"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-left dropdown-menu-wrap" aria-labelledby="collectionMenuLinkFive">
                                                                    <a href="javascript:void(0)" class="dropdown-item">
                                                                        حذف از مجموعه
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card-body">
                                                    <h5 class="card-title"><a href="lesson-details.html">دوره تربیت ، جوان ، مدیریت</a></h5>
                                                    <p class="card-text lh-22 pt-2"><a href="teacher-detail.html">استاد محمدباقر حیدری کاشانی</a><span>دوره جامع خانواده 1</span></p>
                                                    <div class="my-course-progress-bar-wrap d-flex flex-wrap align-items-center mt-3 position-relative">
                                                        <p class="skillbar-title">کامل:</p>
                                                        <div class="skillbar-box">
                                                            <div class="skillbar skillbar-skillbar-2" data-percent="0%">
                                                                <div class="skillbar-bar skillbar--bar-2 bg-1"></div>
                                                            </div>

                                                        </div>
                                                        <div class="skill-bar-percent">0%</div>
                                                    </div>

                                                    <div class="rating-wrap d-flex align-items-center justify-content-between pt-3">
                                                        <div class="review-stars">
                                                            <span class="la la-star-o"></span>
                                                            <span class="la la-star-o"></span>
                                                            <span class="la la-star-o"></span>
                                                            <span class="la la-star-o"></span>
                                                            <span class="la la-star-o"></span>
                                                        </div>
                                                        <a href="#" class="btn theme-btn theme-btn-sm theme-btn-transparent" data-toggle="modal" data-target="#ratingModal">رتبه بندی بگذارید</a>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-lg-4 responsive-column-half">
                                            <div class="card card-item">
                                                <div class="card-image">
                                                    <a href="lesson-details.html" class="d-block">
                                                        <img class="card-img-top lazy" src="images/img-loading.png" data-src="images/img13.jpg" alt="درپوش تصویر کارت" />
                                                        <div class="play-button">
                                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="-307.4 338.8 91.8 91.8" xml:space="preserve">
                                                                    <style type="text/css">
                                                                        .st0 {
                                                                            opacity: 0.6;
                                                                            fill: #000000;
                                                                            border-radius: 100px;
                                                                        }
                                                                        .st1 {
                                                                            fill: #ffffff;
                                                                        }
                                                                    </style>
                                                                <g>
                                                                    <circle class="st0" cx="-261.5" cy="384.7" r="45.9"></circle>
                                                                    <path class="st1" d="M-272.9,363.2l35.8,20.7c0.7,0.4,0.7,1.3,0,1.7l-35.8,20.7c-0.7,0.4-1.5-0.1-1.5-0.9V364C-274.4,363.3-273.5,362.8-272.9,363.2z"></path>
                                                                </g>
                                                                </svg>
                                                        </div>
                                                    </a>
                                                    <div class="course-badge-labels course--badge-labels">
                                                        <div class="generic-action-wrap generic--action-wrap generic--action-wrap-2">
                                                            <div class="dropdown">
                                                                <a class="action-btn bg-white text-gray dropdown-btn" href="#" role="button" id="collectionMenuLinkSix" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="la la-ellipsis-v"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-left dropdown-menu-wrap" aria-labelledby="collectionMenuLinkSix">
                                                                    <a href="javascript:void(0)" class="dropdown-item">
                                                                        حذف از مجموعه
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card-body">
                                                    <h5 class="card-title"><a href="lesson-details.html">دوره تربیت ، جوان ، مدیریت</a></h5>
                                                    <p class="card-text lh-22 pt-2"><a href="teacher-detail.html">استاد محمدباقر حیدری کاشانی</a><span>دوره جامع خانواده 1</span></p>
                                                    <div class="my-course-progress-bar-wrap d-flex flex-wrap align-items-center mt-3 position-relative">
                                                        <p class="skillbar-title">کامل:</p>
                                                        <div class="skillbar-box">
                                                            <div class="skillbar skillbar-skillbar-2" data-percent="0%">
                                                                <div class="skillbar-bar skillbar--bar-2 bg-1"></div>
                                                            </div>

                                                        </div>
                                                        <div class="skill-bar-percent">0%</div>
                                                    </div>

                                                    <div class="rating-wrap d-flex align-items-center justify-content-between pt-3">
                                                        <div class="review-stars">
                                                            <span class="la la-star-o"></span>
                                                            <span class="la la-star-o"></span>
                                                            <span class="la la-star-o"></span>
                                                            <span class="la la-star-o"></span>
                                                            <span class="la la-star-o"></span>
                                                        </div>
                                                        <a href="#" class="btn theme-btn theme-btn-sm theme-btn-transparent" data-toggle="modal" data-target="#ratingModal">رتبه بندی بگذارید</a>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="tab-pane fade" id="wishlist" role="tabpanel" aria-labelledby="wishlist-tab">
                        <div class="my-course-body">
                            <div class="my-course-info pb-40px d-flex flex-wrap align-items-center justify-content-between">
                                <h3 class="fs-22 font-weight-semi-bold">لیست علاقه مندی های من</h3>
                                <form method="post">
                                    <div class="input-group">
                                        <input class="form-control form--control form--control-gray pl-3" type="text" name="search" placeholder="جستجوی دوره ها" />
                                        <div class="input-group-append">
                                            <button class="btn theme-btn shadow-none"><i class="la la-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="my-course-cards">
                                <div class="row">
                                    <div class="col-lg-4 responsive-column-half">
                                        <div class="card card-item">
                                            <div class="card-image">
                                                <a href="course-details.html" class="d-block">
                                                    <img class="card-img-top lazy" src="images/img-loading.png" data-src="images/img8.jpg" alt="درپوش تصویر کارت" />
                                                </a>
                                                <div class="course-badge-labels">
                                                    <div class="course-badge">دوره پرفروش</div>
                                                    <div class="course-badge blue">-39٪</div>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">همه مراحل</h6>
                                                <h5 class="card-title"><a href="course-details.html">دوره جوان ، بصیرت ، آینده</a></h5>
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
                                                    <p class="card-price text-black font-weight-bold">12.99 <span class="before-price font-weight-medium">129.99</span></p>
                                                    <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="حذف از لیست علاقه مندی ها"><i class="la la-heart"></i></div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-4 responsive-column-half">
                                        <div class="card card-item">
                                            <div class="card-image">
                                                <a href="course-details.html" class="d-block">
                                                    <img class="card-img-top lazy" src="images/img-loading.png" data-src="images/img9.jpg" alt="درپوش تصویر کارت" />
                                                </a>
                                                <div class="course-badge-labels">
                                                    <div class="course-badge red">ویژه</div>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">همه مراحل</h6>
                                                <h5 class="card-title"><a href="course-details.html">دوره جوان ، بصیرت ، آینده</a></h5>
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
                                                    <p class="card-price text-black font-weight-bold">129.99</p>
                                                    <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="حذف از لیست علاقه مندی ها"><i class="la la-heart"></i></div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-4 responsive-column-half">
                                        <div class="card card-item">
                                            <div class="card-image">
                                                <a href="course-details.html" class="d-block">
                                                    <img class="card-img-top lazy" src="images/img-loading.png" data-src="images/img10.jpg" alt="درپوش تصویر کارت" />
                                                </a>
                                            </div>

                                            <div class="card-body">
                                                <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">همه مراحل</h6>
                                                <h5 class="card-title"><a href="course-details.html">دوره جوان ، بصیرت ، آینده</a></h5>
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
                                                    <p class="card-price text-black font-weight-bold">129.99</p>
                                                    <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="حذف از لیست علاقه مندی ها"><i class="la la-heart"></i></div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="tab-pane fade" id="archived" role="tabpanel" aria-labelledby="archived-tab">
                        <div class="my-course-body">
                            <div class="my-course-info pb-40px">
                                <h3 class="fs-22 font-weight-semi-bold">آرشیو من</h3>
                            </div>

                            <div class="my-course-cards">
                                <div class="row">
                                    <div class="col-lg-4 responsive-column-half">
                                        <div class="card card-item">
                                            <div class="card-image">
                                                <a href="lesson-details.html" class="d-block">
                                                    <img class="card-img-top lazy" src="images/img-loading.png" data-src="images/img8.jpg" alt="درپوش تصویر کارت" />
                                                    <div class="play-button">
                                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="-307.4 338.8 91.8 91.8" xml:space="preserve">
                                                                <style type="text/css">
                                                                    .st0 {
                                                                        opacity: 0.6;
                                                                        fill: #000000;
                                                                        border-radius: 100px;
                                                                    }
                                                                    .st1 {
                                                                        fill: #ffffff;
                                                                    }
                                                                </style>
                                                            <g>
                                                                <circle class="st0" cx="-261.5" cy="384.7" r="45.9"></circle>
                                                                <path class="st1" d="M-272.9,363.2l35.8,20.7c0.7,0.4,0.7,1.3,0,1.7l-35.8,20.7c-0.7,0.4-1.5-0.1-1.5-0.9V364C-274.4,363.3-273.5,362.8-272.9,363.2z"></path>
                                                            </g>
                                                            </svg>
                                                    </div>
                                                </a>
                                                <div class="course-badge-labels course--badge-labels">
                                                    <div class="generic-action-wrap generic--action-wrap generic--action-wrap-2">
                                                        <div class="dropdown">
                                                            <a class="action-btn bg-white text-gray dropdown-btn" href="#" role="button" id="archiveMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="la la-ellipsis-v"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-left dropdown-menu-wrap" aria-labelledby="archiveMenuLink">
                                                                <a href="javascript:void(0)" class="dropdown-item d-flex align-items-center justify-content-between">
                                                                    <span>لغو بایگانی</span>
                                                                    <i class="la la-archive"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <h5 class="card-title"><a href="lesson-details.html">دوره جامع تربیت کودکان</a></h5>
                                                <p class="card-text lh-22 pt-2"><a href="teacher-detail.html">استاد محمدباقر حیدری کاشانی</a><span>دوره جامع خانواده 1</span></p>
                                                <div class="my-course-progress-bar-wrap d-flex flex-wrap align-items-center mt-3 position-relative">
                                                    <p class="skillbar-title">کامل:</p>
                                                    <div class="skillbar-box">
                                                        <div class="skillbar skillbar-skillbar-2" data-percent="70%">
                                                            <div class="skillbar-bar skillbar--bar-2 bg-1"></div>
                                                        </div>

                                                    </div>
                                                    <div class="skill-bar-percent">70%</div>
                                                </div>

                                                <div class="rating-wrap d-flex align-items-center justify-content-between pt-3">
                                                    <div class="review-stars">
                                                        <span class="la la-star-o"></span>
                                                        <span class="la la-star-o"></span>
                                                        <span class="la la-star-o"></span>
                                                        <span class="la la-star-o"></span>
                                                        <span class="la la-star-o"></span>
                                                    </div>
                                                    <a href="#" class="btn theme-btn theme-btn-sm theme-btn-transparent" data-toggle="modal" data-target="#ratingModal">رتبه بندی بگذارید</a>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-4 responsive-column-half">
                                        <div class="card card-item">
                                            <div class="card-image">
                                                <a href="lesson-details.html" class="d-block">
                                                    <img class="card-img-top lazy" src="images/img-loading.png" data-src="images/img9.jpg" alt="درپوش تصویر کارت" />
                                                    <div class="play-button">
                                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="-307.4 338.8 91.8 91.8" xml:space="preserve">
                                                                <style type="text/css">
                                                                    .st0 {
                                                                        opacity: 0.6;
                                                                        fill: #000000;
                                                                        border-radius: 100px;
                                                                    }
                                                                    .st1 {
                                                                        fill: #ffffff;
                                                                    }
                                                                </style>
                                                            <g>
                                                                <circle class="st0" cx="-261.5" cy="384.7" r="45.9"></circle>
                                                                <path class="st1" d="M-272.9,363.2l35.8,20.7c0.7,0.4,0.7,1.3,0,1.7l-35.8,20.7c-0.7,0.4-1.5-0.1-1.5-0.9V364C-274.4,363.3-273.5,362.8-272.9,363.2z"></path>
                                                            </g>
                                                            </svg>
                                                    </div>
                                                </a>
                                                <div class="course-badge-labels course--badge-labels">
                                                    <div class="generic-action-wrap generic--action-wrap generic--action-wrap-2">
                                                        <div class="dropdown">
                                                            <a class="action-btn bg-white text-gray dropdown-btn" href="#" role="button" id="archiveMenuLinkTwo" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="la la-ellipsis-v"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-left dropdown-menu-wrap" aria-labelledby="archiveMenuLinkTwo">
                                                                <a href="javascript:void(0)" class="dropdown-item d-flex align-items-center justify-content-between">
                                                                    <span>لغو بایگانی</span>
                                                                    <i class="la la-archive"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <h5 class="card-title"><a href="lesson-details.html">دوره تربیتی مدرن از ابتدا</a></h5>
                                                <p class="card-text lh-22 pt-2"><a href="teacher-detail.html">استاد محمدباقر حیدری کاشانی</a><span>دوره جامع خانواده 1</span></p>
                                                <div class="my-course-progress-bar-wrap d-flex flex-wrap align-items-center mt-3 position-relative">
                                                    <p class="skillbar-title">کامل:</p>
                                                    <div class="skillbar-box">
                                                        <div class="skillbar skillbar-skillbar-2" data-percent="0%">
                                                            <div class="skillbar-bar skillbar--bar-2 bg-1"></div>
                                                        </div>

                                                    </div>
                                                    <div class="skill-bar-percent">0%</div>
                                                </div>

                                                <div class="rating-wrap d-flex align-items-center justify-content-between pt-3">
                                                    <div class="review-stars">
                                                        <span class="la la-star-o"></span>
                                                        <span class="la la-star-o"></span>
                                                        <span class="la la-star-o"></span>
                                                        <span class="la la-star-o"></span>
                                                        <span class="la la-star-o"></span>
                                                    </div>
                                                    <a href="#" class="btn theme-btn theme-btn-sm theme-btn-transparent" data-toggle="modal" data-target="#ratingModal">رتبه بندی بگذارید</a>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-4 responsive-column-half">
                                        <div class="card card-item">
                                            <div class="card-image">
                                                <a href="lesson-details.html" class="d-block">
                                                    <img class="card-img-top lazy" src="images/img-loading.png" data-src="images/img10.jpg" alt="درپوش تصویر کارت" />
                                                    <div class="play-button">
                                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="-307.4 338.8 91.8 91.8" xml:space="preserve">
                                                                <style type="text/css">
                                                                    .st0 {
                                                                        opacity: 0.6;
                                                                        fill: #000000;
                                                                        border-radius: 100px;
                                                                    }
                                                                    .st1 {
                                                                        fill: #ffffff;
                                                                    }
                                                                </style>
                                                            <g>
                                                                <circle class="st0" cx="-261.5" cy="384.7" r="45.9"></circle>
                                                                <path class="st1" d="M-272.9,363.2l35.8,20.7c0.7,0.4,0.7,1.3,0,1.7l-35.8,20.7c-0.7,0.4-1.5-0.1-1.5-0.9V364C-274.4,363.3-273.5,362.8-272.9,363.2z"></path>
                                                            </g>
                                                            </svg>
                                                    </div>
                                                </a>
                                                <div class="course-badge-labels course--badge-labels">
                                                    <div class="generic-action-wrap generic--action-wrap generic--action-wrap-2">
                                                        <div class="dropdown">
                                                            <a class="action-btn bg-white text-gray dropdown-btn" href="#" role="button" id="archiveMenuLinkThree" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="la la-ellipsis-v"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-left dropdown-menu-wrap" aria-labelledby="archiveMenuLinkThree">
                                                                <a href="javascript:void(0)" class="dropdown-item d-flex align-items-center justify-content-between">
                                                                    <span>لغو بایگانی</span>
                                                                    <i class="la la-archive"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <h5 class="card-title"><a href="lesson-details.html">دوره کامل دوره تربیتی 2020</a></h5>
                                                <p class="card-text lh-22 pt-2"><a href="teacher-detail.html">استاد محمدباقر حیدری کاشانی</a><span>دوره جامع خانواده 1</span></p>
                                                <div class="my-course-progress-bar-wrap d-flex flex-wrap align-items-center mt-3 position-relative">
                                                    <p class="skillbar-title">کامل:</p>
                                                    <div class="skillbar-box">
                                                        <div class="skillbar skillbar-skillbar-2" data-percent="0%">
                                                            <div class="skillbar-bar skillbar--bar-2 bg-1"></div>
                                                        </div>

                                                    </div>
                                                    <div class="skill-bar-percent">0%</div>
                                                </div>

                                                <div class="rating-wrap d-flex align-items-center justify-content-between pt-3">
                                                    <div class="review-stars">
                                                        <span class="la la-star-o"></span>
                                                        <span class="la la-star-o"></span>
                                                        <span class="la la-star-o"></span>
                                                        <span class="la la-star-o"></span>
                                                        <span class="la la-star-o"></span>
                                                    </div>
                                                    <a href="#" class="btn theme-btn theme-btn-sm theme-btn-transparent" data-toggle="modal" data-target="#ratingModal">رتبه بندی بگذارید</a>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>

    </section>
@endsection
