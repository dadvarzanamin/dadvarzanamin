@extends('master')
@section('main')
        <section class="header-menu-area">
            <div class="header-menu-content bg-dark">
                <div class="container-fluid">
                    <div class="main-menu-content d-flex align-items-center">
                        <div class="logo-box logo--box">
                            <div class="theme-picker d-flex align-items-center">
                                <button class="theme-picker-btn dark-mode-btn" title="حالت تاریک">
                                    <svg class="svg-icon-color-white" viewBox="0 0 24 24" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                                    </svg>
                                </button>
                                <button class="theme-picker-btn light-mode-btn" title="حالت نور">
                                    <svg viewBox="0 0 24 24" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="5"></circle>
                                        <line x1="12" y1="1" x2="12" y2="3"></line>
                                        <line x1="12" y1="21" x2="12" y2="23"></line>
                                        <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                                        <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                                        <line x1="1" y1="12" x2="3" y2="12"></line>
                                        <line x1="21" y1="12" x2="23" y2="12"></line>
                                        <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                                        <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <!-- end logo-box -->
                        <div class="course-dashboard-header-title pl-4">
                            <a href="{{route('coursedetail')}}" class="text-white fs-15">کلاس تربیت کودک فصل اول قسمت اول</a>
                        </div>
                        <!-- end course-dashboard-header-title -->
                        <div class="menu-wrapper ml-auto">
                            <div class="theme-picker d-flex align-items-center mr-3">
                                <button class="theme-picker-btn dark-mode-btn" title="حالت تاریک">
                                    <svg class="svg-icon-color-white" viewBox="0 0 24 24" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                                    </svg>
                                </button>
                                <button class="theme-picker-btn light-mode-btn" title="حالت نور">
                                    <svg viewBox="0 0 24 24" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="5"></circle>
                                        <line x1="12" y1="1" x2="12" y2="3"></line>
                                        <line x1="12" y1="21" x2="12" y2="23"></line>
                                        <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                                        <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                                        <line x1="1" y1="12" x2="3" y2="12"></line>
                                        <line x1="21" y1="12" x2="23" y2="12"></line>
                                        <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                                        <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                                    </svg>
                                </button>
                            </div>
                            <div class="nav-left-button d-flex align-items-center">
                                <a href="#" class="btn theme-btn theme-btn-sm theme-btn-transparent lh-26 text-white mr-2" data-toggle="modal" data-target="#ratingModal"><i class="la la-star mr-1"></i> امتیاز دهید</a>
                                <a href="#" class="btn theme-btn theme-btn-sm theme-btn-transparent lh-26 text-white mr-2" data-toggle="modal" data-target="#shareModal"><i class="la la-share mr-1"></i> اشتراک گذاری</a>
                                <div class="generic-action-wrap generic--action-wrap">
                                    <div class="dropdown">
                                        <a class="action-btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="la la-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="#">افزودن به علاقه مندی </a>
                                            <a class="dropdown-item" href="#">بایگانی </a>
                                            <a class="dropdown-item" href="#">هدیه دهید</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end nav-left-button -->
                        </div>
                        <!-- end menu-wrapper -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container-fluid -->
            </div>
            <!-- end header-menu-content -->
        </section>

        <section class="course-dashboard">
            <div class="course-dashboard-wrap">
                <div class="course-dashboard-container d-flex">
                    <div class="course-dashboard-column">
                        <div class="lecture-viewer-container">
                            <div class="lecture-video-item">
                                <video controls="" crossorigin="" playsinline="" id="player">
                                    <!-- Video files -->
                                    <source src="videos/123.mp4" type="video/mp4" />
                                    <source src="videos/123.mp4" type="video/mp4" />
                                    <source src="videos/123.mp4" type="video/mp4" />

                                    <!-- Caption files -->
                                    <track kind="captions" label="English" srclang="en"  src="videos/123.mp4" default="" />
                                    <track kind="captions" label="Français" srclang="fr" src="videos/123.mp4" />

                                    <!-- Fallback for browsers that don't support the <video> element -->
                                    <a href="videos/123.mp4" download="">دانلود</a>
                                </video>
                            </div>
                            <div class="lecture-viewer-text-wrap">
                                <div class="lecture-viewer-text-content custom-scrollbar-styled">
                                    <div class="lecture-viewer-text-body">
                                        <h2 class="fs-24 font-weight-semi-bold pb-4">فیلم خود را برای شروع سریع خود دانلود کنید</h2>
                                        <div class="lecture-viewer-content-detail">
                                            <ul class="generic-list-item pb-4">
                                                <li>سلام</li>
                                                <li>به دوره خانواده و تربیت خوش آمدید</li>
                                                <li>لورم ایپسوم از دهه 1500، زمانی که یک چاپگر ناشناخته یک گالری از نوع را گرفت و آن را به هم زد تا یک دوره نمونه تایپ بسازد، متن ساختگی استاندارد صنعت بوده است. این نه تنها پنج قرن زنده مانده است، بلکه لورم ایپسوم متن ساختگی استاندارد صنعت از دهه 1500 بوده است، زمانی که یک چاپگر ناشناخته یک گالی از نوع را برداشت و آن را به هم زد تا یک دوره نمونه بسازد.

                                                    این نه تنها پنج قرن زنده مانده است، بلکه جهشی به حروفچینی الکترونیکی نیز باقی مانده است و اساساً بدون تغییر باقی مانده است. لورم ایپسوم صرفاً متن ساختگی صنعت چاپ و حروفچینی است. لورم ایپسوم ساختگی استاندارد این صنعت بوده است </li>
                                                <li>
                                                    لورم ایپسوم از دهه 1500، زمانی که یک چاپگر ناشناخته یک گالری از نوع را گرفت و آن را به هم زد تا یک دوره نمونه تایپ بسازد، متن ساختگی استاندارد صنعت بوده است. این نه تنها پنج قرن زنده مانده است، بلکه لورم ایپسوم متن ساختگی استاندارد صنعت از دهه 1500 بوده است، زمانی که یک چاپگر ناشناخته یک گالی از نوع را برداشت و آن را به هم زد تا یک دوره نمونه بسازد.

                                                    این نه تنها پنج قرن زنده مانده است، بلکه جهشی به حروفچینی الکترونیکی نیز باقی مانده است و اساساً بدون تغییر باقی مانده است. لورم ایپسوم صرفاً متن ساختگی صنعت چاپ و حروفچینی است. لورم ایپسوم ساختگی استاندارد این صنعت بوده است
                                                </li>
                                                <li>
                                                    لورم ایپسوم از دهه 1500، زمانی که یک چاپگر ناشناخته یک گالری از نوع را گرفت و آن را به هم زد تا یک دوره نمونه تایپ بسازد، متن ساختگی استاندارد صنعت بوده است. این نه تنها پنج قرن زنده مانده است، بلکه لورم ایپسوم متن ساختگی استاندارد صنعت از دهه 1500 بوده است، زمانی که یک چاپگر ناشناخته یک گالی از نوع را برداشت و آن را به هم زد تا یک دوره نمونه بسازد.

                                                    این نه تنها پنج قرن زنده مانده است، بلکه جهشی به حروفچینی الکترونیکی نیز باقی مانده است و اساساً بدون تغییر باقی مانده است. لورم ایپسوم صرفاً متن ساختگی صنعت چاپ و حروفچینی است. لورم ایپسوم ساختگی استاندارد این صنعت بوده است
                                                </li>
                                                <li>لورم ایپسوم از دهه 1500، زمانی که یک چاپگر ناشناخته یک گالری از نوع را گرفت و آن را به هم زد تا یک دوره نمونه تایپ بسازد، متن ساختگی استاندارد صنعت بوده است. این نه تنها پنج قرن زنده مانده است، بلکه لورم ایپسوم متن ساختگی استاندارد صنعت از دهه 1500 بوده است، زمانی که یک چاپگر ناشناخته یک گالی از نوع را برداشت و آن را به هم زد تا یک دوره نمونه بسازد.

                                                    این نه تنها پنج قرن زنده مانده است، بلکه جهشی به حروفچینی الکترونیکی نیز باقی مانده است و اساساً بدون تغییر باقی مانده است. لورم ایپسوم صرفاً متن ساختگی صنعت چاپ و حروفچینی است. لورم ایپسوم ساختگی استاندارد این صنعت بوده است</li>
                                                <li>لورم ایپسوم از دهه 1500، زمانی که یک چاپگر ناشناخته یک گالری از نوع را گرفت و آن را به هم زد تا یک دوره نمونه تایپ بسازد، متن ساختگی استاندارد صنعت بوده است. این نه تنها پنج قرن زنده مانده است، بلکه لورم ایپسوم متن ساختگی استاندارد صنعت از دهه 1500 بوده است، زمانی که یک چاپگر ناشناخته یک گالی از نوع را برداشت و آن را به هم زد تا یک دوره نمونه بسازد.

                                                    این نه تنها پنج قرن زنده مانده است، بلکه جهشی به حروفچینی الکترونیکی نیز باقی مانده است و اساساً بدون تغییر باقی مانده است. لورم ایپسوم صرفاً متن ساختگی صنعت چاپ و حروفچینی است. لورم ایپسوم ساختگی استاندارد این صنعت بوده است</li>

                                                <li><strong class="font-weight-semi-bold">اکنون فیلم خود را دانلود کنید، روی لینک زیر کلیک کنید.</strong></li>
                                            </ul>
                                            <div class="btn-box">
                                                <h3 class="fs-18 font-weight-semi-bold pb-3">منابع این سخنرانی</h3>
                                                <a href="#" class="btn theme-btn theme-btn-transparent"><i class="la la-file-zip-o mr-1"></i>Quick-start.zip</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end lecture-viewer-container -->
                        <div class="lecture-video-detail">
                            <div class="lecture-tab-body bg-gray p-4">
                                <ul class="nav nav-tabs generic-tab" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" id="search-tab" data-toggle="tab" href="#search" role="tab" aria-controls="search" aria-selected="false">
                                            <i class="la la-search"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item mobile-menu-nav-item">
                                        <a class="nav-link" id="course-content-tab" data-toggle="tab" href="#course-content" role="tab" aria-controls="course-content" aria-selected="false">
                                            محتوای دوره
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">
                                            بررسی اجمالی
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="question-and-ans-tab" data-toggle="tab" href="#question-and-ans" role="tab" aria-controls="question-and-ans" aria-selected="false">
                                            سوال و سال
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="announcements-tab" data-toggle="tab" href="#announcements" role="tab" aria-controls="announcements" aria-selected="false">
                                            اطلاعیه ها
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="lecture-video-detail-body">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade" id="search" role="tabpanel" aria-labelledby="search-tab">
                                        <div class="search-course-wrap pt-40px">
                                            <form action="#" class="pb-5">
                                                <div class="input-group">
                                                    <input class="form-control form--control form--control-gray pl-3" type="text" name="search" placeholder="محتوای دوره را جستجو کنید" />
                                                    <div class="input-group-append">
                                                        <button class="btn theme-btn"><span class="la la-search"></span></button>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="search-results-message text-center">
                                                <h3 class="fs-24 font-weight-semi-bold pb-1">جستجوی جدید را شروع کنید</h3>
                                                <p>برای یافتن شرح ها، سخنرانی ها یا منابع</p>
                                            </div>
                                        </div>
                                        <!-- end search-course-wrap -->
                                    </div>
                                    <!-- end tab-pane -->
                                    <div class="tab-pane fade" id="course-content" role="tabpanel" aria-labelledby="course-content-tab">
                                        <div class="mobile-course-menu pt-4">
                                            <div class="accordion generic-accordion generic--accordion" id="mobileCourseAccordionCourseExample">
                                                <div class="card">
                                                    <div class="card-header" id="mobileCourseHeadingOne">
                                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#mobileCourseCollapseOne" aria-expanded="true" aria-controls="mobileCourseCollapseOne">
                                                            <i class="la la-angle-down"></i>
                                                            <i class="la la-angle-up"></i>
                                                            <span class="fs-15">بخش 1: فرزند آوری </span>
                                                            <span class="course-duration">
                                                                <span>1/5</span>
                                                                <span>21 دقیقه</span>
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <!-- end card-header -->
                                                    <div id="mobileCourseCollapseOne" class="collapse show" aria-labelledby="mobileCourseHeadingOne" data-parent="#mobileCourseAccordionCourseExample">
                                                        <div class="card-body p-0">
                                                            <ul class="curriculum-sidebar-list">
                                                                <li class="course-item-link active">
                                                                    <div class="course-item-content-wrap">
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" id="mobileCourseCheckbox" required="" />
                                                                            <label class="custom-control-label custom--control-label" for="mobileCourseCheckbox"></label>
                                                                        </div>
                                                                        <!-- end custom-control -->
                                                                        <div class="course-item-content">
                                                                            <h4 class="fs-15">1. تربیت فرزند موفق</h4>
                                                                            <div class="courser-item-meta-wrap">
                                                                                <p class="course-item-meta"><i class="la la-play-circle"></i>2 دقیقه</p>
                                                                            </div>
                                                                        </div>
                                                                        <!-- end course-item-content -->
                                                                    </div>
                                                                    <!-- end course-item-content-wrap -->
                                                                </li>
                                                                <li class="course-item-link">
                                                                    <div class="course-item-content-wrap">
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" id="mobileCourseCheckbox2" required="" />
                                                                            <label class="custom-control-label custom--control-label" for="mobileCourseCheckbox2"></label>
                                                                        </div>
                                                                        <!-- end custom-control -->
                                                                        <div class="course-item-content">
                                                                            <h4 class="fs-15">2. رفتار کودکانه</h4>
                                                                            <div class="courser-item-meta-wrap">
                                                                                <p class="course-item-meta"><i class="la la-play-circle"></i>2 دقیقه</p>
                                                                            </div>
                                                                        </div>
                                                                        <!-- end course-item-content -->
                                                                    </div>
                                                                    <!-- end course-item-content-wrap -->
                                                                </li>
                                                                <li class="course-item-link active-resource">
                                                                    <div class="course-item-content-wrap">
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" id="mobileCourseCheckbox3" required="" />
                                                                            <label class="custom-control-label custom--control-label" for="mobileCourseCheckbox3"></label>
                                                                        </div>
                                                                        <!-- end custom-control -->
                                                                        <div class="course-item-content">
                                                                            <h4 class="fs-15">3. بازی کودکان </h4>
                                                                            <div class="courser-item-meta-wrap">
                                                                                <p class="course-item-meta"><i class="la la-file"></i>2 دقیقه</p>
                                                                                <div class="generic-action-wrap">
                                                                                    <div class="dropdown">
                                                                                        <a
                                                                                            class="btn theme-btn theme-btn-sm theme-btn-transparent mt-1 fs-14 font-weight-medium"
                                                                                            href="#"
                                                                                            data-toggle="dropdown"
                                                                                            aria-haspopup="true"
                                                                                            aria-expanded="false"
                                                                                        >
                                                                                            <i class="la la-folder-open mr-1"></i> منابع<i class="la la-angle-down ml-1"></i>
                                                                                        </a>
                                                                                        <div class="dropdown-menu dropdown-menu-left">
                                                                                            <a class="dropdown-item" href="javascript:void(0)">
                                                                                                Section-Footage.zip
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- end generic-action-wrap -->
                                                                            </div>
                                                                        </div>
                                                                        <!-- end course-item-content -->
                                                                    </div>
                                                                    <!-- end course-item-content-wrap -->
                                                                </li>
                                                                <li class="course-item-link">
                                                                    <div class="course-item-content-wrap">
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" id="mobileCourseCheckbox4" required="" />
                                                                            <label class="custom-control-label custom--control-label" for="mobileCourseCheckbox4"></label>
                                                                        </div>
                                                                        <!-- end custom-control -->
                                                                        <div class="course-item-content">
                                                                            <h4 class="fs-15">4. آموزش کودکان</h4>
                                                                            <div class="courser-item-meta-wrap">
                                                                                <p class="course-item-meta"><i class="la la-play-circle"></i>2 دقیقه</p>
                                                                            </div>
                                                                        </div>
                                                                        <!-- end course-item-content -->
                                                                    </div>
                                                                    <!-- end course-item-content-wrap -->
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <!-- end card-body -->
                                                    </div>
                                                    <!-- end collapse -->
                                                </div>
                                                <!-- end card -->
                                                <div class="card">
                                                    <div class="card-header" id="mobileCourseHeadingTwo">
                                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#mobileCourseCollapseTwo" aria-expanded="false" aria-controls="mobileCourseCollapseTwo">
                                                            <i class="la la-angle-down"></i>
                                                            <i class="la la-angle-up"></i>
                                                            <span class="fs-15">بخش 2: تربیت نوجوانان </span>
                                                            <span class="course-duration">
                                                                <span>1/5</span>
                                                                <span>21 دقیقه</span>
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <!-- end card-header -->
                                                    <div id="mobileCourseCollapseTwo" class="collapse" aria-labelledby="mobileCourseHeadingTwo" data-parent="#mobileCourseAccordionCourseExample">
                                                        <div class="card-body p-0">
                                                            <ul class="curriculum-sidebar-list">
                                                                <li class="course-item-link">
                                                                    <div class="course-item-content-wrap">
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" id="mobileCourseCheckbox5" required="" />
                                                                            <label class="custom-control-label custom--control-label" for="mobileCourseCheckbox5"></label>
                                                                        </div>
                                                                        <!-- end custom-control -->
                                                                        <div class="course-item-content">
                                                                            <h4 class="fs-15">5. بازی ها و چالش ها</h4>
                                                                            <div class="courser-item-meta-wrap">
                                                                                <p class="course-item-meta"><i class="la la-play-circle"></i>2 دقیقه</p>
                                                                            </div>
                                                                        </div>
                                                                        <!-- end course-item-content -->
                                                                    </div>
                                                                    <!-- end course-item-content-wrap -->
                                                                </li>
                                                                <li class="course-item-link">
                                                                    <div class="course-item-content-wrap">
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" id="mobileCourseCheckbox6" required="" />
                                                                            <label class="custom-control-label custom--control-label" for="mobileCourseCheckbox6"></label>
                                                                        </div>
                                                                        <!-- end custom-control -->
                                                                        <div class="course-item-content">
                                                                            <h4 class="fs-15">6. دوره ی بلوغ نوجوانان</h4>
                                                                            <div class="courser-item-meta-wrap">
                                                                                <p class="course-item-meta"><i class="la la-play-circle"></i>2 دقیقه</p>
                                                                            </div>
                                                                        </div>
                                                                        <!-- end course-item-content -->
                                                                    </div>
                                                                    <!-- end course-item-content-wrap -->
                                                                </li>
                                                                <li class="course-item-link active-resource">
                                                                    <div class="course-item-content-wrap">
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" id="mobileCourseCheckbox7" required="" />
                                                                            <label class="custom-control-label custom--control-label" for="mobileCourseCheckbox7"></label>
                                                                        </div>
                                                                        <!-- end custom-control -->
                                                                        <div class="course-item-content">
                                                                            <h4 class="fs-15">7. درس خواندن و موفقیت </h4>
                                                                            <div class="courser-item-meta-wrap">
                                                                                <p class="course-item-meta"><i class="la la-file"></i>2 دقیقه</p>
                                                                                <div class="generic-action-wrap">
                                                                                    <div class="dropdown">
                                                                                        <a
                                                                                            class="btn theme-btn theme-btn-sm theme-btn-transparent mt-1 fs-14 font-weight-medium"
                                                                                            href="#"
                                                                                            data-toggle="dropdown"
                                                                                            aria-haspopup="true"
                                                                                            aria-expanded="false"
                                                                                        >
                                                                                            <i class="la la-folder-open mr-1"></i> منابع<i class="la la-angle-down ml-1"></i>
                                                                                        </a>
                                                                                        <div class="dropdown-menu dropdown-menu-left">
                                                                                            <a class="dropdown-item" href="javascript:void(0)">
                                                                                                Section-Footage.zip
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- end generic-action-wrap -->
                                                                            </div>
                                                                        </div>
                                                                        <!-- end course-item-content -->
                                                                    </div>
                                                                    <!-- end course-item-content-wrap -->
                                                                </li>
                                                                <li class="course-item-link">
                                                                    <div class="course-item-content-wrap">
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" id="mobileCourseCheckbox8" required="" />
                                                                            <label class="custom-control-label custom--control-label" for="mobileCourseCheckbox8"></label>
                                                                        </div>
                                                                        <!-- end custom-control -->
                                                                        <div class="course-item-content">
                                                                            <h4 class="fs-15">8. اینده زندگی </h4>
                                                                            <div class="courser-item-meta-wrap">
                                                                                <p class="course-item-meta"><i class="la la-play-circle"></i>2 دقیقه</p>
                                                                            </div>
                                                                        </div>
                                                                        <!-- end course-item-content -->
                                                                    </div>
                                                                    <!-- end course-item-content-wrap -->
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <!-- end card-body -->
                                                    </div>
                                                    <!-- end collapse -->
                                                </div>
                                                <!-- end card -->
                                                <div class="card">
                                                    <div class="card-header" id="mobileCourseHeadingThree">
                                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#mobileCourseCollapseThree" aria-expanded="false" aria-controls="mobileCourseCollapseThree">
                                                            <i class="la la-angle-down"></i>
                                                            <i class="la la-angle-up"></i>
                                                            <span class="fs-15">بخش 3: همسریابی و ازدواج </span>
                                                            <span class="course-duration">
                                                                <span>1/5</span>
                                                                <span>21 دقیقه</span>
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <!-- end card-header -->
                                                    <div id="mobileCourseCollapseThree" class="collapse" aria-labelledby="mobileCourseHeadingThree" data-parent="#mobileCourseAccordionCourseExample">
                                                        <div class="card-body p-0">
                                                            <ul class="curriculum-sidebar-list">
                                                                <li class="course-item-link">
                                                                    <div class="course-item-content-wrap">
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" id="mobileCourseCheckbox9" required="" />
                                                                            <label class="custom-control-label custom--control-label" for="mobileCourseCheckbox9"></label>
                                                                        </div>
                                                                        <!-- end custom-control -->
                                                                        <div class="course-item-content">
                                                                            <h4 class="fs-15">9. استقلال فکری و استقلال مالی</h4>
                                                                            <div class="courser-item-meta-wrap">
                                                                                <p class="course-item-meta"><i class="la la-play-circle"></i>2 دقیقه</p>
                                                                            </div>
                                                                        </div>
                                                                        <!-- end course-item-content -->
                                                                    </div>
                                                                    <!-- end course-item-content-wrap -->
                                                                </li>
                                                                <li class="course-item-link">
                                                                    <div class="course-item-content-wrap">
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" id="mobileCourseCheckbox10" required="" />
                                                                            <label class="custom-control-label custom--control-label" for="mobileCourseCheckbox10"></label>
                                                                        </div>
                                                                        <!-- end custom-control -->
                                                                        <div class="course-item-content">
                                                                            <h4 class="fs-15">10. موفقیت های فرزندان</h4>
                                                                            <div class="courser-item-meta-wrap">
                                                                                <p class="course-item-meta"><i class="la la-play-circle"></i>2 دقیقه</p>
                                                                            </div>
                                                                        </div>
                                                                        <!-- end course-item-content -->
                                                                    </div>
                                                                    <!-- end course-item-content-wrap -->
                                                                </li>
                                                                <li class="course-item-link active-resource">
                                                                    <div class="course-item-content-wrap">
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" id="mobileCourseCheckbox11" required="" />
                                                                            <label class="custom-control-label custom--control-label" for="mobileCourseCheckbox11"></label>
                                                                        </div>
                                                                        <!-- end custom-control -->
                                                                        <div class="course-item-content">
                                                                            <h4 class="fs-15">11. دانلود فال ها و مقالات </h4>
                                                                            <div class="courser-item-meta-wrap">
                                                                                <p class="course-item-meta"><i class="la la-file"></i>2 دقیقه</p>
                                                                                <div class="generic-action-wrap">
                                                                                    <div class="dropdown">
                                                                                        <a
                                                                                            class="btn theme-btn theme-btn-sm theme-btn-transparent mt-1 fs-14 font-weight-medium"
                                                                                            href="#"
                                                                                            data-toggle="dropdown"
                                                                                            aria-haspopup="true"
                                                                                            aria-expanded="false"
                                                                                        >
                                                                                            <i class="la la-folder-open mr-1"></i> منابع<i class="la la-angle-down ml-1"></i>
                                                                                        </a>
                                                                                        <div class="dropdown-menu dropdown-menu-left">
                                                                                            <a class="dropdown-item" href="javascript:void(0)">
                                                                                                Section-Footage.zip
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- end generic-action-wrap -->
                                                                            </div>
                                                                        </div>
                                                                        <!-- end course-item-content -->
                                                                    </div>
                                                                    <!-- end course-item-content-wrap -->
                                                                </li>
                                                                <li class="course-item-link">
                                                                    <div class="course-item-content-wrap">
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" id="mobileCourseCheckbox12" required="" />
                                                                            <label class="custom-control-label custom--control-label" for="mobileCourseCheckbox12"></label>
                                                                        </div>
                                                                        <!-- end custom-control -->
                                                                        <div class="course-item-content">
                                                                            <h4 class="fs-15">12. وارد شوید و شخصیت خود را متحرک کنید</h4>
                                                                            <div class="courser-item-meta-wrap">
                                                                                <p class="course-item-meta"><i class="la la-play-circle"></i>2 دقیقه</p>
                                                                            </div>
                                                                        </div>
                                                                        <!-- end course-item-content -->
                                                                    </div>
                                                                    <!-- end course-item-content-wrap -->
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <!-- end card-body -->
                                                    </div>
                                                    <!-- end collapse -->
                                                </div>
                                                <!-- end card -->
                                                <div class="card">
                                                    <div class="card-header" id="mobileCourseHeadingFour">
                                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#mobileCourseCollapseFour" aria-expanded="false" aria-controls="mobileCourseCollapseFour">
                                                            <i class="la la-angle-down"></i>
                                                            <i class="la la-angle-up"></i>
                                                            <span class="fs-15">بخش 4: سخنرانی پاداش </span>
                                                            <span class="course-duration">
                                                                <span>1/5</span>
                                                                <span>21 دقیقه</span>
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <!-- end card-header -->
                                                    <div id="mobileCourseCollapseFour" class="collapse" aria-labelledby="mobileCourseHeadingFour" data-parent="#mobileCourseAccordionCourseExample">
                                                        <div class="card-body p-0">
                                                            <ul class="curriculum-sidebar-list">
                                                                <li class="course-item-link">
                                                                    <div class="course-item-content-wrap">
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" id="mobileCourseCheckbox13" required="" />
                                                                            <label class="custom-control-label custom--control-label" for="mobileCourseCheckbox13"></label>
                                                                        </div>
                                                                        <!-- end custom-control -->
                                                                        <div class="course-item-content">
                                                                            <h4 class="fs-15">13. دوره های جایزه - با هزینه کمتر بیشتر بیاموزید</h4>
                                                                            <div class="courser-item-meta-wrap">
                                                                                <p class="course-item-meta"><i class="la la-play-circle"></i>2 دقیقه</p>
                                                                            </div>
                                                                        </div>
                                                                        <!-- end course-item-content -->
                                                                    </div>
                                                                    <!-- end course-item-content-wrap -->
                                                                </li>
                                                                <li class="course-item-link">
                                                                    <div class="course-item-content-wrap">
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" id="mobileCourseCheckbox14" required="" />
                                                                            <label class="custom-control-label custom--control-label" for="mobileCourseCheckbox14"></label>
                                                                        </div>
                                                                        <!-- end custom-control -->
                                                                        <div class="course-item-content">
                                                                            <h4 class="fs-15">14. نتیجه گیری</h4>
                                                                            <div class="courser-item-meta-wrap">
                                                                                <p class="course-item-meta"><i class="la la-play-circle"></i>2 دقیقه</p>
                                                                            </div>
                                                                        </div>
                                                                        <!-- end course-item-content -->
                                                                    </div>
                                                                    <!-- end course-item-content-wrap -->
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <!-- end card-body -->
                                                    </div>
                                                    <!-- end collapse -->
                                                </div>
                                                <!-- end card -->
                                            </div>
                                            <!-- end accordion-->
                                        </div>
                                        <!-- end mobile-course-menu -->
                                    </div>
                                    <!-- end tab-pane -->
                                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                        <div class="lecture-overview-wrap">
                                            <div class="lecture-overview-item">
                                                <h3 class="fs-24 font-weight-semi-bold pb-2">در مورد این دوره</h3>
                                                <p>
                                                    لورم ایپسوم از دهه 1500، زمانی که یک چاپگر ناشناخته یک گالری از نوع را گرفت و آن را به هم زد تا یک دوره نمونه تایپ بسازد، متن ساختگی استاندارد صنعت بوده است. این نه تنها پنج قرن زنده مانده است، بلکه لورم ایپسوم متن ساختگی استاندارد صنعت از دهه 1500 بوده است، زمانی که یک چاپگر ناشناخته یک گالی از نوع را برداشت و آن را به هم زد تا یک دوره نمونه بسازد.

                                                    این نه تنها پنج قرن زنده مانده است، بلکه جهشی به حروفچینی الکترونیکی نیز باقی مانده است و اساساً بدون تغییر باقی مانده است. لورم ایپسوم صرفاً متن ساختگی صنعت چاپ و حروفچینی است. لورم ایپسوم ساختگی استاندارد این صنعت بوده است
                                                </p>
                                            </div>
                                            <!-- end lecture-overview-item -->
                                            <div class="section-block"></div>
                                            <div class="lecture-overview-item">
                                                <div class="lecture-overview-stats-wrap d-flex">
                                                    <div class="lecture-overview-stats-item">
                                                        <h3 class="fs-16 font-weight-semi-bold pb-2">با اعداد</h3>
                                                    </div>
                                                    <!-- end lecture-overview-stats-item -->
                                                    <div class="lecture-overview-stats-item">
                                                        <ul class="generic-list-item">
                                                            <li><span>سطح مهارت:</span> همه سطوح</li>
                                                            <li><span>دانش آموزان:</span> 83950</li>
                                                            <li><span>زبان:</span> انگلیسی</li>
                                                            <li><span>شرح ها:</span> بله</li>
                                                        </ul>
                                                    </div>
                                                    <!-- end lecture-overview-stats-item -->
                                                    <div class="lecture-overview-stats-item">
                                                        <ul class="generic-list-item">
                                                            <li><span>سخنرانی:</span> 30</li>
                                                            <li><span>مدت زمان ویدیو: </span> 3.5 ساعت</li>
                                                            <li><span>گواهی:</span> بله</li>
                                                        </ul>
                                                    </div>
                                                    <!-- end lecture-overview-stats-item -->
                                                </div>
                                                <!-- end lecture-overview-stats-wrap -->
                                            </div>
                                            <!-- end lecture-overview-item -->
                                            <div class="section-block"></div>
                                            <div class="lecture-overview-item">
                                                <div class="lecture-overview-stats-wrap d-flex">
                                                    <div class="lecture-overview-stats-item">
                                                        <h3 class="fs-16 font-weight-semi-bold pb-2">گواهینامه ها</h3>
                                                    </div>
                                                    <!-- end lecture-overview-stats-item -->
                                                    <div class="lecture-overview-stats-item lecture-overview-stats-wide-item">
                                                        <p class="pb-3">با گذراندن کل دوره گواهی ادوکا را دریافت کنید</p>
                                                        <a href="#" class="btn theme-btn theme-btn-transparent">گواهینامه بیاورید</a>
                                                    </div>
                                                    <!-- end lecture-overview-stats-item -->
                                                </div>
                                                <!-- end lecture-overview-stats-wrap -->
                                            </div>
                                            <!-- end lecture-overview-item -->
                                            <div class="section-block"></div>
                                            <div class="lecture-overview-item">
                                                <div class="lecture-overview-stats-wrap d-flex">
                                                    <div class="lecture-overview-stats-item">
                                                        <h3 class="fs-16 font-weight-semi-bold pb-2">امکانات</h3>
                                                    </div>
                                                    <!-- end lecture-overview-stats-item -->
                                                    <div class="lecture-overview-stats-item">
                                                        <p>در <a href="#" class="text-color hover-underline">IOS</a> و <a href="#" class="text-color hover-underline">Android </a>موجود است</p>
                                                    </div>
                                                    <!-- end lecture-overview-stats-item -->
                                                </div>
                                                <!-- end lecture-overview-stats-wrap -->
                                            </div>
                                            <!-- end lecture-overview-item -->
                                            <div class="section-block"></div>
                                            <div class="lecture-overview-item">
                                                <div class="lecture-overview-stats-wrap d-flex">
                                                    <div class="lecture-overview-stats-item">
                                                        <h3 class="fs-16 font-weight-semi-bold pb-2">شرح</h3>
                                                    </div>
                                                    <!-- end lecture-overview-stats-item -->
                                                    <div class="lecture-overview-stats-item lecture-overview-stats-wide-item lecture-description">
                                                        <h3 class="fs-16 font-weight-semi-bold pb-2">صفر تا صد تربیت کودکان</h3>
                                                        <p>
                                                            لورم ایپسوم از دهه 1500، زمانی که یک چاپگر ناشناخته یک گالری از نوع را گرفت و آن را به هم زد تا یک دوره نمونه تایپ بسازد، متن ساختگی استاندارد صنعت بوده است. این نه تنها پنج قرن زنده مانده است، بلکه لورم ایپسوم متن ساختگی استاندارد صنعت از دهه 1500 بوده است، زمانی که یک چاپگر ناشناخته یک گالی از نوع را برداشت و آن را به هم زد تا یک دوره نمونه بسازد.

                                                            این نه تنها پنج قرن زنده مانده است، بلکه جهشی به حروفچینی الکترونیکی نیز باقی مانده است و اساساً بدون تغییر باقی مانده است. لورم ایپسوم صرفاً متن ساختگی صنعت چاپ و حروفچینی است. لورم ایپسوم ساختگی استاندارد این صنعت بوده است
                                                        </p>
                                                        <div class="collapse" id="collapseMore">
                                                            <p>
                                                                لورم ایپسوم از دهه 1500، زمانی که یک چاپگر ناشناخته یک گالری از نوع را گرفت و آن را به هم زد تا یک دوره نمونه تایپ بسازد، متن ساختگی استاندارد صنعت بوده است. این نه تنها پنج قرن زنده مانده است، بلکه لورم ایپسوم متن ساختگی استاندارد صنعت از دهه 1500 بوده است، زمانی که یک چاپگر ناشناخته یک گالی از نوع را برداشت و آن را به هم زد تا یک دوره نمونه بسازد.

                                                                این نه تنها پنج قرن زنده مانده است، بلکه جهشی به حروفچینی الکترونیکی نیز باقی مانده است و اساساً بدون تغییر باقی مانده است. لورم ایپسوم صرفاً متن ساختگی صنعت چاپ و حروفچینی است. لورم ایپسوم ساختگی استاندارد این صنعت بوده است
                                                            </p>
                                                            <ul class="generic-list-item generic-list-item-bullet">
                                                                <li>لورم ایپسوم متن ساختگی</li>
                                                                <li>و از اینکه مخترع لذت باشد متنفر است.</li>
                                                                <li>کوزه و گلو</li>
                                                                <li>ورودی موریس لیگولا دهلیزی</li>
                                                                <li>لورم ایپسوم متن ساختگی</li>
                                                            </ul>
                                                            <p>
                                                                لورم ایپسوم از دهه 1500، زمانی که یک چاپگر ناشناخته یک گالری از نوع را گرفت و آن را به هم زد تا یک دوره نمونه تایپ بسازد، متن ساختگی استاندارد صنعت بوده است. این نه تنها پنج قرن زنده مانده است، بلکه لورم ایپسوم متن ساختگی استاندارد صنعت از دهه 1500 بوده است، زمانی که یک چاپگر ناشناخته یک گالی از نوع را برداشت و آن را به هم زد تا یک دوره نمونه بسازد.

                                                                این نه تنها پنج قرن زنده مانده است، بلکه جهشی به حروفچینی الکترونیکی نیز باقی مانده است و اساساً بدون تغییر باقی مانده است. لورم ایپسوم صرفاً متن ساختگی صنعت چاپ و حروفچینی است. لورم ایپسوم ساختگی استاندارد این صنعت بوده است                                                            </p>
                                                            <p>شما را در دوره می بینیم.</p>
                                                            <p>محمد</p>
                                                            <h3 class="fs-16 font-weight-semi-bold pb-2">چیزی که یاد خواهید گرفت</h3>
                                                            <ul class="generic-list-item generic-list-item-bullet">
                                                                <li>لورم ایپسوم متن ساختگی</li>
                                                                <li>و از اینکه مخترع لذت باشد متنفر است.</li>
                                                                <li>کوزه و گلو</li>
                                                                <li>ورودی موریس لیگولا دهلیزی</li>
                                                                <li>لورم ایپسوم متن ساختگی</li>
                                                            </ul>
                                                            <h3 class="fs-16 font-weight-semi-bold pb-2">آیا شرایط یا پیش نیاز دوره وجود دارد؟</h3>
                                                            <ul class="generic-list-item generic-list-item-bullet">
                                                                <li>لورم ایپسوم متن ساختگی</li>
                                                                <li>و از اینکه مخترع لذت باشد متنفر است.</li>
                                                                <li>کوزه و گلو</li>
                                                                <li>ورودی موریس لیگولا دهلیزی</li>
                                                            </ul>
                                                            <h3 class="fs-16 font-weight-semi-bold pb-2">این دوره برای چه کسانی است:</h3>
                                                            <ul class="generic-list-item generic-list-item-bullet">
                                                                <li>فرآیند تکرار شونده پیشرفته</li>
                                                                <li>و از اینکه مخترع لذت باشد متنفر است.</li>
                                                                <li>کوزه و گلو</li>
                                                                <li>کوزه و گلو</li>
                                                                <li>ورودی موریس لیگولا دهلیزی</li>
                                                                <li>ورودی موریس لیگولا دهلیزی</li>
                                                            </ul>
                                                        </div>
                                                        <div class="show-more-btn-box">
                                                            <a class="collapse-btn collapse--btn fs-15" data-toggle="collapse" href="#collapseMore" role="button" aria-expanded="false" aria-controls="collapseMore">
                                                                <span class="collapse-btn-hide">ادامه مطلب<i class="la la-angle-down ml-1 fs-14"></i></span>
                                                                <span class="collapse-btn-show">کمتر بخوان<i class="la la-angle-up ml-1 fs-14"></i></span>
                                                            </a>
                                                        </div>
                                                        <!-- end show-more-btn-box -->
                                                    </div>
                                                    <!-- end lecture-overview-stats-item -->
                                                </div>
                                                <!-- end lecture-overview-stats-wrap -->
                                            </div>
                                            <!-- end lecture-overview-item -->
                                            <div class="section-block"></div>
                                            <div class="lecture-overview-item">
                                                <div class="lecture-overview-stats-wrap d-flex">
                                                    <div class="lecture-overview-stats-item">
                                                        <h3 class="fs-16 font-weight-semi-bold pb-2">مربی</h3>
                                                    </div>
                                                    <!-- end lecture-overview-stats-item -->
                                                    <div class="lecture-overview-stats-item lecture-overview-stats-wide-item">
                                                        <div class="media media-card align-items-center">
                                                            <a href="teacher-detail.html" class="media-img d-block rounded-full avatar-md">
                                                                <img src="images/small-avatar-1.jpg" alt="آواتار مربی" class="rounded-full" />
                                                            </a>
                                                            <div class="media-body">
                                                                <h5><a href="teacher-detail.html">محمد دیوان بیگی</a></h5>
                                                                <span class="d-block lh-18 pt-2">برنامه نویس اندروید ، پایتون ، جاوا ، سی شارپ</span>
                                                            </div>
                                                        </div>
                                                        <div class="lecture-owner-profile pt-4">
                                                            <ul class="social-icons social-icons-styled">
                                                                <li>
                                                                    <a href="#" class="facebook-bg"><i class="la la-facebook"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="twitter-bg"><i class="la la-twitter"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="instagram-bg"><i class="la la-instagram"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="linkedin-bg"><i class="la la-linkedin"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="lecture-owner-decription pt-4">
                                                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است</p>
                                                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است</p>
                                                            <p><strong>افترافکت:</strong> کل مقدار. در دوره من دوره کامل افتر افکت با تمام تکنیک ها و روش ها (بدون ترفند و ترفند) بسته بندی شده است.</p>
                                                            <p><strong>ویرایش ویدیو:</strong>اگر دوره 1 و 2 را دیده باشید بسیار عالیست</p>
                                                            <p>حدس می زنم بیش از 208000 دانشجو نشانه خوبی است که دوره های من برای شما مفید خواهد بود.</p>
                                                            <p>موفق باشید</p>
                                                            <p>محمد دیوان بیگی</p>
                                                        </div>
                                                    </div>
                                                    <!-- end lecture-overview-stats-item -->
                                                </div>
                                                <!-- end lecture-overview-stats-wrap -->
                                            </div>
                                            <!-- end lecture-overview-item -->
                                        </div>
                                        <!-- end lecture-overview-wrap -->
                                    </div>
                                    <!-- end tab-pane -->
                                    <div class="tab-pane fade" id="question-and-ans" role="tabpanel" aria-labelledby="question-and-ans-tab">
                                        <div class="lecture-overview-wrap lecture-quest-wrap">
                                            <div class="new-question-wrap">
                                                <button class="btn theme-btn theme-btn-transparent back-to-question-btn"><i class="la la-reply mr-1"></i>بازگشت به همه سوالات</button>
                                                <div class="new-question-body pt-40px">
                                                    <h3 class="fs-20 font-weight-semi-bold">سوال من مربوط به</h3>
                                                    <form action="#" class="pt-4">
                                                        <div class="custom-control-wrap">
                                                            <div class="custom-control custom-radio mb-3 pl-0">
                                                                <input type="radio" class="custom-control-input" id="courseContentRadio" name="radio-stacked" required="" />
                                                                <label class="custom-control-label custom--control-label custom--control-label-boxed" for="courseContentRadio">
                                                                    <span class="font-weight-semi-bold text-black d-block">محتوای دوره </span>
                                                                    <span class="d-block fs-14 lh-20">ممکن است شامل نظرات، سؤالات، نکات یا پروژه هایی برای اشتراک گذاری باشد</span>
                                                                </label>
                                                            </div>
                                                            <div class="custom-control custom-radio mb-3 pl-0">
                                                                <input type="radio" class="custom-control-input" id="somethingElseRadio" name="radio-stacked" required="" />
                                                                <label class="custom-control-label custom--control-label custom--control-label-boxed" for="somethingElseRadio">
                                                                    <span class="font-weight-semi-bold text-black d-block">چیز دیگری </span>
                                                                    <span class="d-block fs-14 lh-20">این ممکن است شامل سؤالاتی درباره گواهی ها، عیب یابی صوتی و تصویری، یا مشکلات دانلود باشد</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="btn-box text-center">
                                                            <button class="btn theme-btn w-100">ادامه هید <i class="la la-arrow-left icon ml-1"></i></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- end new-question-wrap -->
                                            <div class="replay-question-wrap">
                                                <button class="btn theme-btn theme-btn-transparent back-to-question-btn"><i class="la la-reply mr-1"></i>بازگشت به همه سوالات</button>
                                                <div class="replay-question-body pt-30px">
                                                    <div class="question-list-item">
                                                        <div class="media media-card border-bottom border-bottom-gray py-4">
                                                            <div class="media-img rounded-full flex-shrink-0 avatar-sm">
                                                                <img class="rounded-full" src="images/small-avatar-1.jpg" alt="تصویر کاربر" />
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="d-flex justify-content-between">
                                                                    <div class="question-meta-content">
                                                                        <h5 class="fs-16 pb-1">بعد از نصب Quicktime هنوز H264 نگرفتم. خواهش میکنم چیکار کنم</h5>
                                                                        <p class="meta-tags fs-13">
                                                                            <a href="#">محمد دیوان بیگی </a>
                                                                            <a href="#">سخنرانی 20 </a>
                                                                            <span>3 ساعت پیش</span>
                                                                        </p>
                                                                        <p class="fs-15 text-gray">
                                                                            درد به خودی خود مهم است، اما درد با فرآیند آدیپیسینگ افزایش می یابد، اما به آن زمان می دهم تا آن را کاهش دهد تا کار و درد بزرگی انجام دهم. مثلا تمرین ما چیست؟
                                                                        </p>
                                                                    </div>
                                                                    <!-- end question-meta-content -->
                                                                    <div class="question-upvote-action">
                                                                        <div class="number-upvotes pb-2 d-flex align-items-center generic-action-wrap">
                                                                            <span>1</span>
                                                                            <button type="button"><i class="la la-arrow-up"></i></button>
                                                                            <div class="dropdown">
                                                                                <button class="ml-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <i class="la la-ellipsis-v"></i>
                                                                                </button>
                                                                                <div class="dropdown-menu dropdown-menu-left">
                                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#reportModal"><i class="la la-flag mr-1"></i> گزارش سوءاستفاده</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- end question-upvote-action -->
                                                                </div>
                                                            </div>
                                                            <!-- end media-body -->
                                                        </div>
                                                        <!-- end media -->
                                                        <div class="question-replay-separator-wrap d-flex align-items-center justify-content-between py-3">
                                                            <h4 class="fs-16 font-weight-semi-bold">1 پخش مجدد</h4>
                                                            <button class="btn swapping-btn text-gray font-weight-medium" data-text-swap="Following replies" data-text-original="Follow replies">پاسخ ها را دنبال کنید</button>
                                                        </div>
                                                        <!-- end question-replay-separator-wrap -->
                                                        <div class="section-block"></div>
                                                        <div class="question-answer-wrap">
                                                            <div class="media media-card mb-3 border-bottom border-bottom-gray py-4">
                                                                <div class="media-img rounded-full avatar-sm flex-shrink-0">
                                                                    <img src="images/small-avatar-2.jpg" alt="آواتار مربی" class="rounded-full" />
                                                                </div>
                                                                <!-- end media-img -->
                                                                <div class="media-body">
                                                                    <h5 class="fs-16"><a href="#">دیوید لوئیز</a></h5>
                                                                    <span class="fs-14">3 سال پیش</span>
                                                                    <p class="pt-1 fs-15">کور شده از شهوت، پیش بینی نمی کنند و مانند پرواز در گناه هستند.</p>
                                                                </div>
                                                                <!-- end media-body -->
                                                            </div>
                                                            <!-- end media -->
                                                            <div class="question-replay-input-wrap pt-20px">
                                                                <div class="question-replay-body">
                                                                    <h3 class="fs-16 font-weight-semi-bold">اضافه کردن پخش</h3>
                                                                    <form method="post" class="pt-4">
                                                                        <div class="replay-action-bar">
                                                                            <div class="btn-group">
                                                                                <button class="btn" type="button" data-toggle="modal" data-target="#insertLinkModal" title="درج لینک"><i class="la la-link"></i></button>
                                                                                <button class="btn" type="button" data-toggle="modal" data-target="#uploadPhotoModal" title="یک تصویر آپلود کنید"><i class="la la-photo"></i></button>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <textarea class="form-control form--control pl-3" name="message" rows="4" placeholder="پاسخ خود را بنویسید..."></textarea>
                                                                        </div>
                                                                        <div class="btn-box">
                                                                            <button class="btn theme-btn" type="submit">یک پاسخ اضافه کنید <i class="la la-arrow-left icon ml-1"></i></button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <!-- end question-replay-input-wrap -->
                                                        </div>
                                                        <!-- end question-answer-wrap -->
                                                    </div>
                                                    <!-- end question-list-item -->
                                                </div>
                                                <!-- end replay-question-body -->
                                            </div>
                                            <!-- end replay-question-wrap -->
                                            <div class="question-overview-result-wrap">
                                                <div class="lecture-overview-item">
                                                    <form method="post">
                                                        <div class="input-group mb-3">
                                                            <input class="form-control form--control form--control-gray pl-3" type="text" name="search" placeholder="جستجوی تمام سوالات دوره" />
                                                            <div class="input-group-append">
                                                                <button class="btn theme-btn"><i class="la la-search search-icon"></i></button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <div class="question-overview-filter-wrap d-flex align-items-center">
                                                        <div class="question-overview-filter-item">
                                                            <div class="select-container w-100">
                                                                <select class="select-container-select">
                                                                    <option value="0">همه سخنرانی ها</option>
                                                                    <option value="1">سخنرانی جاری</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!-- end question-overview-filter-item -->
                                                        <div class="question-overview-filter-item">
                                                            <div class="select-container w-100">
                                                                <select class="select-container-select">
                                                                    <option value="0">مرتب سازی بر اساس جدیدترین</option>
                                                                    <option value="1">مرتب سازی بر اساس محبوب ترین</option>
                                                                    <option value="2">مرتب سازی بر اساس توصیه شده</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!-- end question-overview-filter-item -->
                                                        <div class="question-overview-filter-item">
                                                            <div class="generic-action-wrap">
                                                                <div class="dropdown">
                                                                    <a class="btn theme-btn theme-btn-transparent w-100" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        سوالات را فیلتر کنید
                                                                    </a>
                                                                    <div class="dropdown-menu">
                                                                        <div class="dropdown-item">
                                                                            <div class="custom-control custom-checkbox fs-15">
                                                                                <input type="checkbox" class="custom-control-input" id="questionsCheckbox" required="" />
                                                                                <label class="custom-control-label custom--control-label" for="questionsCheckbox">
                                                                                    سوالاتی که دنبال می کنم
                                                                                </label>
                                                                            </div>
                                                                            <!-- end custom-control -->
                                                                        </div>
                                                                        <div class="dropdown-item">
                                                                            <div class="custom-control custom-checkbox fs-15">
                                                                                <input type="checkbox" class="custom-control-input" id="questionsCheckbox2" required="" />
                                                                                <label class="custom-control-label custom--control-label" for="questionsCheckbox2">
                                                                                    سوالاتی که پرسیدم
                                                                                </label>
                                                                            </div>
                                                                            <!-- end custom-control -->
                                                                        </div>
                                                                        <div class="dropdown-item">
                                                                            <div class="custom-control custom-checkbox fs-15">
                                                                                <input type="checkbox" class="custom-control-input" id="questionsCheckbox3" required="" />
                                                                                <label class="custom-control-label custom--control-label" for="questionsCheckbox3">
                                                                                    سوالات بدون پاسخ
                                                                                </label>
                                                                            </div>
                                                                            <!-- end custom-control -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end generic-action-wrap -->
                                                        </div>
                                                        <!-- end question-overview-filter-item -->
                                                    </div>
                                                </div>
                                                <!-- end lecture-overview-item -->
                                                <div class="lecture-overview-item">
                                                    <div class="question-overview-result-header d-flex align-items-center justify-content-between">
                                                        <h3 class="fs-17 font-weight-semi-bold">30 سوال در این دوره</h3>
                                                        <button class="btn theme-btn theme-btn-sm theme-btn-transparent ask-new-question-btn">سوال جدید بپرس</button>
                                                    </div>
                                                </div>
                                                <!-- end lecture-overview-item -->
                                                <div class="section-block"></div>
                                                <div class="lecture-overview-item mt-0">
                                                    <div class="question-list-item">
                                                        <div class="media media-card border-bottom border-bottom-gray py-4 px-3">
                                                            <div class="media-img rounded-full flex-shrink-0 avatar-sm">
                                                                <img class="rounded-full" src="images/small-avatar-1.jpg" alt="تصویر کاربر" />
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="d-flex align-items-center justify-content-between">
                                                                    <div class="question-meta-content">
                                                                        <a href="javascript:void(0)" class="d-block">
                                                                            <h5 class="fs-16 pb-1">بعد از نصب Quicktime هنوز H264 نگرفتم. خواهش میکنم چیکار کنم</h5>
                                                                            <p class="text-truncate fs-15 text-gray">
                                                                                درد به خودی خود مهم است، اما درد با فرآیند آدیپیسینگ افزایش می یابد، اما به آن زمان می دهم تا آن را کاهش دهد تا کار و درد بزرگی انجام دهم. مثلا تمرین ما چیست؟
                                                                            </p>
                                                                        </a>
                                                                    </div>
                                                                    <!-- end question-meta-content -->
                                                                    <div class="question-upvote-action">
                                                                        <div class="number-upvotes pb-2 d-flex align-items-center">
                                                                            <span>1</span>
                                                                            <button type="button"><i class="la la-arrow-up"></i></button>
                                                                        </div>
                                                                        <div class="number-upvotes question-response d-flex align-items-center">
                                                                            <span>1</span>
                                                                            <button type="button" class="question-replay-btn"><i class="la la-comments"></i></button>
                                                                        </div>
                                                                    </div>
                                                                    <!-- end question-upvote-action -->
                                                                </div>
                                                                <p class="meta-tags pt-1 fs-13">
                                                                    <a href="#">محمد دیوان بیگی </a>
                                                                    <a href="#">سخنرانی 20 </a>
                                                                    <span>3 ساعت پیش</span>
                                                                </p>
                                                            </div>
                                                            <!-- end media-body -->
                                                        </div>
                                                        <!-- end media -->
                                                        <div class="media media-card border-bottom border-bottom-gray py-4 px-3">
                                                            <div class="media-img rounded-full flex-shrink-0 avatar-sm">
                                                                <img class="rounded-full" src="images/small-avatar-2.jpg" alt="تصویر کاربر" />
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="d-flex align-items-center justify-content-between">
                                                                    <div class="question-meta-content">
                                                                        <a href="javascript:void(0)" class="d-block">
                                                                            <h5 class="fs-16 pb-1">وقتی مستطیل را انتخاب کردم و ماسک ایجاد آن را گذاشتم؟ من نمیتونم اینو حل کنم</h5>
                                                                            <p class="text-truncate fs-15 text-gray">
                                                                                درد به خودی خود مهم است، اما درد با فرآیند آدیپیسینگ افزایش می یابد، اما به آن زمان می دهم تا آن را کاهش دهد تا کار و درد بزرگی انجام دهم. مثلا تمرین ما چیست؟
                                                                            </p>
                                                                        </a>
                                                                    </div>
                                                                    <!-- end question-meta-content -->
                                                                    <div class="question-upvote-action">
                                                                        <div class="number-upvotes pb-2 d-flex align-items-center">
                                                                            <span>0</span>
                                                                            <button type="button"><i class="la la-arrow-up"></i></button>
                                                                        </div>
                                                                        <div class="number-upvotes question-response d-flex align-items-center">
                                                                            <span>0</span>
                                                                            <button type="button" class="question-replay-btn"><i class="la la-comments"></i></button>
                                                                        </div>
                                                                    </div>
                                                                    <!-- end question-upvote-action -->
                                                                </div>
                                                                <p class="meta-tags pt-1 fs-13">
                                                                    <a href="#">محمد دیوان بیگی </a>
                                                                    <a href="#">سخنرانی 20 </a>
                                                                    <span>3 ساعت پیش</span>
                                                                </p>
                                                            </div>
                                                            <!-- end media-body -->
                                                        </div>
                                                        <!-- end media -->
                                                        <div class="media media-card border-bottom border-bottom-gray py-4 px-3">
                                                            <div class="media-img rounded-full flex-shrink-0 avatar-sm">
                                                                <img class="rounded-full" src="images/small-avatar-3.jpg" alt="تصویر کاربر" />
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="d-flex align-items-center justify-content-between">
                                                                    <div class="question-meta-content">
                                                                        <a href="javascript:void(0)" class="d-block">
                                                                            <h5 class="fs-16 pb-1">فعالیت تمرینی</h5>
                                                                            <p class="text-truncate fs-15 text-gray">
                                                                                https://youtu.be/fzyAWYKh2pgg
                                                                            </p>
                                                                        </a>
                                                                    </div>
                                                                    <!-- end question-meta-content -->
                                                                    <div class="question-upvote-action">
                                                                        <div class="number-upvotes pb-2 d-flex align-items-center">
                                                                            <span>0</span>
                                                                            <button type="button"><i class="la la-arrow-up"></i></button>
                                                                        </div>
                                                                        <div class="number-upvotes question-response d-flex align-items-center">
                                                                            <span>0</span>
                                                                            <button type="button" class="question-replay-btn"><i class="la la-comments"></i></button>
                                                                        </div>
                                                                    </div>
                                                                    <!-- end question-upvote-action -->
                                                                </div>
                                                                <p class="meta-tags pt-1 fs-13">
                                                                    <a href="#">محمد دیوان بیگی </a>
                                                                    <a href="#">سخنرانی 20 </a>
                                                                    <span>3 ساعت پیش</span>
                                                                </p>
                                                            </div>
                                                            <!-- end media-body -->
                                                        </div>
                                                        <!-- end media -->
                                                        <div class="media media-card border-bottom border-bottom-gray py-4 px-3">
                                                            <div class="media-img rounded-full flex-shrink-0 avatar-sm">
                                                                <img class="rounded-full" src="images/small-avatar-4.jpg" alt="تصویر کاربر" />
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="d-flex align-items-center justify-content-between">
                                                                    <div class="question-meta-content">
                                                                        <a href="javascript:void(0)" class="d-block">
                                                                            <h5 class="fs-16 pb-1">ترکیب مرد راه رفتن.</h5>
                                                                            <p class="text-truncate fs-15 text-gray">
                                                                                درد به خودی خود مهم است، اما درد با فرآیند آدیپیسینگ افزایش می یابد، اما به آن زمان می دهم تا آن را کاهش دهد تا کار و درد بزرگی انجام دهم. مثلا تمرین ما چیست؟
                                                                            </p>
                                                                        </a>
                                                                    </div>
                                                                    <!-- end question-meta-content -->
                                                                    <div class="question-upvote-action">
                                                                        <div class="number-upvotes pb-2 d-flex align-items-center">
                                                                            <span>0</span>
                                                                            <button type="button"><i class="la la-arrow-up"></i></button>
                                                                        </div>
                                                                        <div class="number-upvotes question-response d-flex align-items-center">
                                                                            <span>0</span>
                                                                            <button type="button" class="question-replay-btn"><i class="la la-comments"></i></button>
                                                                        </div>
                                                                    </div>
                                                                    <!-- end question-upvote-action -->
                                                                </div>
                                                                <p class="meta-tags pt-1 fs-13">
                                                                    <a href="#">محمد دیوان بیگی </a>
                                                                    <a href="#">سخنرانی 20 </a>
                                                                    <span>3 ساعت پیش</span>
                                                                </p>
                                                            </div>
                                                            <!-- end media-body -->
                                                        </div>
                                                        <!-- end media -->
                                                        <div class="media media-card border-bottom border-bottom-gray py-4 px-3">
                                                            <div class="media-img rounded-full flex-shrink-0 avatar-sm">
                                                                <img class="rounded-full" src="images/small-avatar-5.jpg" alt="تصویر کاربر" />
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="d-flex align-items-center justify-content-between">
                                                                    <div class="question-meta-content">
                                                                        <a href="javascript:void(0)" class="d-block">
                                                                            <h5 class="fs-16 pb-1">گزینه های ضبط</h5>
                                                                            <p class="text-truncate fs-15 text-gray">
                                                                                درد به خودی خود مهم است، اما درد با فرآیند آدیپیسینگ افزایش می یابد، اما به آن زمان می دهم تا آن را کاهش دهد تا کار و درد بزرگی انجام دهم. مثلا تمرین ما چیست؟
                                                                            </p>
                                                                        </a>
                                                                    </div>
                                                                    <!-- end question-meta-content -->
                                                                    <div class="question-upvote-action">
                                                                        <div class="number-upvotes pb-2 d-flex align-items-center">
                                                                            <span>0</span>
                                                                            <button type="button"><i class="la la-arrow-up"></i></button>
                                                                        </div>
                                                                        <div class="number-upvotes question-response d-flex align-items-center">
                                                                            <span>0</span>
                                                                            <button type="button" class="question-replay-btn"><i class="la la-comments"></i></button>
                                                                        </div>
                                                                    </div>
                                                                    <!-- end question-upvote-action -->
                                                                </div>
                                                                <p class="meta-tags pt-1 fs-13">
                                                                    <a href="#">محمد دیوان بیگی </a>
                                                                    <a href="#">سخنرانی 20 </a>
                                                                    <span>3 ساعت پیش</span>
                                                                </p>
                                                            </div>
                                                            <!-- end media-body -->
                                                        </div>
                                                        <!-- end media -->
                                                    </div>
                                                    <div class="question-btn-box pt-35px text-center">
                                                        <button class="btn theme-btn theme-btn-transparent w-100" type="button">بیشتر ببین</button>
                                                    </div>
                                                </div>
                                                <!-- end lecture-overview-item -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end tab-pane -->
                                    <div class="tab-pane fade" id="announcements" role="tabpanel" aria-labelledby="announcements-tab">
                                        <div class="lecture-overview-wrap lecture-announcement-wrap">
                                            <div class="lecture-overview-item">
                                                <div class="media media-card align-items-center">
                                                    <a href="teacher-detail.html" class="media-img d-block rounded-full avatar-md">
                                                        <img src="images/small-avatar-1.jpg" alt="آواتار مربی" class="rounded-full" />
                                                    </a>
                                                    <div class="media-body">
                                                        <h5 class="pb-1"><a href="teacher-detail.html">محمد دیوان بیگی</a></h5>
                                                        <div class="announcement-meta fs-15">
                                                            <span>ارسال یک اطلاعیه </span>
                                                            <span>· 3 سال پیش ·</span>
                                                            <a href="#" class="btn-text" data-toggle="modal" data-target="#reportModal" title="گزارش سوءاستفاده"><i class="la la-flag"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="lecture-owner-decription pt-4">
                                                    <h3 class="fs-19 font-weight-semi-bold pb-3">پشتیبانی مهم پرسش و پاسخ</h3>
                                                    <p>سال 2019 بر همه مبارک، از دانش آموز بودن و حمایت همه شما سپاسگزارم.</p>
                                                    <p><strong>کار عالی برای ثبت نام و پیشرفت دوره فعلی شما. من به شما توصیه می کنم به دنبال رویاهای خود باشید :)</strong></p>
                                                    <p>کل مقدار. در دوره من دوره کامل افتر افکت با تمام تکنیک ها و روش ها (بدون ترفند و ترفند) بسته بندی شده است.</p>
                                                    <p class="font-italic">
                                                        <strong>متأسفانه این منجر به تاخیر در پاسخ های من در بخش پرسش و پاسخ و پیام های مستقیم می شود. این فقط برای هفته آینده است و پس از بازگشت به 100٪ برمی گردم.</strong>
                                                    </p>
                                                    <p>
                                                        من تمام تلاش خود را برای پاسخ دادن به هرچه بیشتر سؤالات ممکن ادامه خواهم داد، اما فقط یک نفر، به طور منظم روزانه 4 تا 5 ساعت را صرف این موضوع می کنم و با بیش از 440000 دانش آموز،
                                                        همانطور که می توانید تصور کنید که کار بسیار زیاد است.
                                                    </p>
                                                    <p class="font-italic">یک بار دیگر از شما برای درک شما و از همه دانش آموزان فوق العاده ای که این فرصت را داشتم که به طور منظم با آنها ارتباط برقرار کنم و همه تشویق های شما سپاسگزارم.</p>
                                                    <p>روز فوق العاده ای داشته باشید</p>
                                                    <p>محمد دیوان بیگی</p>
                                                </div>
                                                <div class="lecture-announcement-comment-wrap pt-4">
                                                    <div class="media media-card align-items-center">
                                                        <div class="media-img rounded-full avatar-sm flex-shrink-0">
                                                            <img src="images/small-avatar-1.jpg" alt="آواتار مربی" class="rounded-full" />
                                                        </div>
                                                        <!-- end media-img -->
                                                        <div class="media-body">
                                                            <form action="#">
                                                                <div class="input-group">
                                                                    <input class="form-control form--control form--control-gray pl-3" type="text" name="search" placeholder="نظر خود را وارد کنید" />
                                                                    <div class="input-group-append">
                                                                        <button class="btn theme-btn" type="button"><i class="la la-arrow-left"></i></button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!-- end media-body -->
                                                    </div>
                                                    <!-- end media -->
                                                    <div class="comments pt-40px">
                                                        <div class="media media-card mb-3 border-bottom border-bottom-gray pb-3">
                                                            <div class="media-img rounded-full avatar-sm flex-shrink-0">
                                                                <img src="images/small-avatar-2.jpg" alt="آواتار مربی" class="rounded-full" />
                                                            </div>
                                                            <!-- end media-img -->
                                                            <div class="media-body">
                                                                <div class="announcement-meta fs-15 lh-20">
                                                                    <a href="#" class="text-color">تونی اولسون </a>
                                                                    <span>· 3 سال پیش ·</span>
                                                                    <a href="#" class="btn-text" data-toggle="modal" data-target="#reportModal" title="گزارش سوءاستفاده"><i class="la la-flag"></i></a>
                                                                </div>
                                                                <p class="pt-1">کور شده از شهوت، پیش بینی نمی کنند و مانند پرواز در گناه هستند.</p>
                                                            </div>
                                                            <!-- end media-body -->
                                                        </div>
                                                        <!-- end media -->
                                                        <div class="media media-card mb-3 border-bottom border-bottom-gray pb-3">
                                                            <div class="media-img rounded-full avatar-sm flex-shrink-0">
                                                                <img src="images/small-avatar-3.jpg" alt="آواتار مربی" class="rounded-full" />
                                                            </div>
                                                            <!-- end media-img -->
                                                            <div class="media-body">
                                                                <div class="announcement-meta fs-15 lh-20">
                                                                    <a href="#" class="text-color">جان دئو </a>
                                                                    <span>· 2 سال پیش ·</span>
                                                                    <a href="#" class="btn-text" data-toggle="modal" data-target="#reportModal" title="گزارش سوءاستفاده"><i class="la la-flag"></i></a>
                                                                </div>
                                                                <p class="pt-1">کور شده از شهوت، پیش بینی نمی کنند و مانند پرواز در گناه هستند.</p>
                                                            </div>
                                                            <!-- end media-body -->
                                                        </div>
                                                        <!-- end media -->
                                                    </div>
                                                    <!-- end comments -->
                                                </div>
                                                <!-- end lecture-announcement-comment-wrap -->
                                            </div>
                                            <!-- end lecture-overview-item -->
                                        </div>
                                    </div>
                                    <!-- end tab-pane -->
                                </div>
                                <!-- end tab-content -->
                            </div>
                            <!-- end lecture-video-detail-body -->
                        </div>
                        <!-- end lecture-video-detail -->
                        <div class="cta-area py-4 bg-gray">
                            <div class="container-fluid">
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="cta-content-wrap">
                                            <h3 class="fs-18 font-weight-semi-bold">
                                                شرکت های برتر <a href="for-business.html" class="text-color hover-underline">ادوکا برای کسب و کار</a> برای ایجاد مهارت های شغلی مورد تقاضا انتخاب می کنند.
                                            </h3>
                                        </div>
                                    </div>
                                    <!-- end col-lg-6 -->
                                    <div class="col-lg-6">
                                        <div class="client-logo-wrap text-left">
                                            <a href="#" class="client-logo-item client--logo-item-2 pr-3"><img src="images/sponsor-img.png" alt="تصویر نام تجاری" /></a>
                                            <a href="#" class="client-logo-item client--logo-item-2 pr-3"><img src="images/sponsor-img2.png" alt="تصویر نام تجاری" /></a>
                                            <a href="#" class="client-logo-item client--logo-item-2 pr-3"><img src="images/sponsor-img3.png" alt="تصویر نام تجاری" /></a>
                                        </div>
                                        <!-- end client-logo-wrap -->
                                    </div>
                                    <!-- end col-lg-6 -->
                                </div>
                                <!-- end row -->
                            </div>
                            <!-- end container-fluid -->
                        </div>
                        <!-- end cta-area -->
                        <div class="footer-area pt-50px">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-3 responsive-column-half">
                                        <div class="footer-item">
                                            <a href="index.html">
                                                <img src="images/logo.png" alt="لوگوی پاورقی" class="footer__logo" />
                                            </a>
                                            <ul class="generic-list-item pt-4">
                                                <li><a href="tel:+1631237884">7884 123 163 +</a></li>
                                                <li><a href="mailto:support@wbsite.com">support@website.com</a></li>
                                                <li>ملبورن، استرالیا، خیابان پارک جنوبی 105</li>
                                            </ul>
                                        </div>
                                        <!-- end footer-item -->
                                    </div>
                                    <!-- end col-lg-3 -->
                                    <div class="col-lg-3 responsive-column-half">
                                        <div class="footer-item">
                                            <h3 class="fs-20 font-weight-semi-bold pb-3">شرکت</h3>
                                            <ul class="generic-list-item">
                                                <li><a href="#">درباره ما</a></li>
                                                <li><a href="#">با ما تماس بگیرید</a></li>
                                                <li><a href="#">معلم شدن</a></li>
                                                <li><a href="#">پشتیبانی</a></li>
                                                <li><a href="#">سوالات متداول</a></li>
                                                <li><a href="#">وبلاگ</a></li>
                                            </ul>
                                        </div>
                                        <!-- end footer-item -->
                                    </div>
                                    <!-- end col-lg-3 -->
                                    <div class="col-lg-3 responsive-column-half">
                                        <div class="footer-item">
                                            <h3 class="fs-20 font-weight-semi-bold pb-3">دوره های آموزشی</h3>
                                            <ul class="generic-list-item">
                                                <li><a href="#">توسعه وب</a></li>
                                                <li><a href="#">هک کردن</a></li>
                                                <li><a href="#">آموزش PHP</a></li>
                                                <li><a href="#">انگلیسی مکالمه</a></li>
                                                <li><a href="#">ماشین خودران</a></li>
                                                <li><a href="#">زباله جمع کن</a></li>
                                            </ul>
                                        </div>
                                        <!-- end footer-item -->
                                    </div>
                                    <!-- end col-lg-3 -->
                                    <div class="col-lg-3 responsive-column-half">
                                        <div class="footer-item">
                                            <h3 class="fs-20 font-weight-semi-bold pb-3">دانلود برنامه</h3>
                                            <div class="mobile-app">
                                                <p class="pb-3 lh-24">برنامه موبایل ما را دانلود کنید و در حال حرکت یاد بگیرید.</p>
                                                <a href="#" class="d-block mb-2 hover-s"><img src="images/appstore.png" alt="فروشگاه اپلیکیشن" class="img-fluid" /></a>
                                                <a href="#" class="d-block hover-s"><img src="images/googleplay.png" alt="گوگل پلی استور" class="img-fluid" /></a>
                                            </div>
                                        </div>
                                        <!-- end footer-item -->
                                    </div>
                                    <!-- end col-lg-3 -->
                                </div>
                                <!-- end row -->
                            </div>
                            <!-- end container-fluid -->
                            <div class="section-block"></div>
                            <div class="copyright-content py-4">
                                <div class="container-fluid">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6">
                                            <p class="copy-desc">© 1400 ادوکا. کلیه حقوق محفوظ است.</p>
                                        </div>
                                        <!-- end col-lg-6 -->
                                        <div class="col-lg-6">
                                            <div class="d-flex flex-wrap align-items-center justify-content-end">
                                                <ul class="generic-list-item d-flex flex-wrap align-items-center fs-14">
                                                    <li class="mr-3"><a href="terms-and-conditions.html">شرایط و ضوابط</a></li>
                                                    <li class="mr-3"><a href="privacy-policy.html">سیاست حفظ حریم خصوصی</a></li>
                                                </ul>
                                                <div class="select-container select-container-sm">
                                                    <select class="select-container-select">
                                                        <option value="1">فارسی</option>
                                                        <option value="2">آلمانی</option>
                                                        <option value="3">اسپانیا</option>
                                                        <option value="4">فرانسوی</option>
                                                        <option value="5">اندونزیایی</option>
                                                        <option value="6">بنگلا</option>
                                                        <option value="7">ژاپنی</option>
                                                        <option value="8">کره ای</option>
                                                        <option value="9">هلند</option>
                                                        <option value="10">لهستانی</option>
                                                        <option value="11">پرتغالی ها</option>
                                                        <option value="12">رومانی</option>
                                                        <option value="13">روسی</option>
                                                        <option value="14">زبان تایلندی</option>
                                                        <option value="15">ترکی</option>
                                                        <option value="16">زبان چینی ساده شده)</option>
                                                        <option value="17">چینی سنتی)</option>
                                                        <option value="17">هندی</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col-lg-6 -->
                                    </div>
                                    <!-- end row -->
                                </div>
                                <!-- end container-fluid -->
                            </div>
                            <!-- end copyright-content -->
                        </div>
                        <!-- end footer-area -->
                    </div>
                    <!-- end course-dashboard-column -->
                    <div class="course-dashboard-sidebar-column">
                        <button class="sidebar-open" type="button"><i class="la la-angle-right"></i> محتوای دوره</button>
                        <div class="course-dashboard-sidebar-wrap custom-scrollbar-styled">
                            <div class="course-dashboard-side-heading d-flex align-items-center justify-content-between">
                                <h3 class="fs-18 font-weight-semi-bold">محتوای دوره</h3>
                                <button class="sidebar-close" type="button"><i class="la la-times"></i></button>
                            </div>
                            <!-- end course-dashboard-side-heading -->
                            <div class="course-dashboard-side-content">
                                <div class="accordion generic-accordion generic--accordion" id="accordionCourseExample">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                <i class="la la-angle-down"></i>
                                                <i class="la la-angle-up"></i>
                                                <span class="fs-15">بخش 1: تربیت کودکانه </span>
                                                <span class="course-duration">
                                                    <span>1/5</span>
                                                    <span>21 دقیقه</span>
                                                </span>
                                            </button>
                                        </div>
                                        <!-- end card-header -->
                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionCourseExample">
                                            <div class="card-body p-0">
                                                <ul class="curriculum-sidebar-list">
                                                    <li class="course-item-link active">
                                                        <div class="course-item-content-wrap">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="courseCheckbox" required="" />
                                                                <label class="custom-control-label custom--control-label" for="courseCheckbox"></label>
                                                            </div>
                                                            <!-- end custom-control -->
                                                            <div class="course-item-content">
                                                                <h4 class="fs-15">1. اموزش تربیت کودکانه بخش اول</h4>
                                                                <div class="courser-item-meta-wrap">
                                                                    <p class="course-item-meta"><i class="la la-play-circle"></i>2 دقیقه</p>
                                                                </div>
                                                            </div>
                                                            <!-- end course-item-content -->
                                                        </div>
                                                        <!-- end course-item-content-wrap -->
                                                    </li>
                                                    <li class="course-item-link">
                                                        <div class="course-item-content-wrap">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="courseCheckbox2" required="" />
                                                                <label class="custom-control-label custom--control-label" for="courseCheckbox2"></label>
                                                            </div>
                                                            <!-- end custom-control -->
                                                            <div class="course-item-content">
                                                                <h4 class="fs-15">2. اموزش تربیت کودکانه بخش دوم</h4>
                                                                <div class="courser-item-meta-wrap">
                                                                    <p class="course-item-meta"><i class="la la-play-circle"></i>2 دقیقه</p>
                                                                </div>
                                                            </div>
                                                            <!-- end course-item-content -->
                                                        </div>
                                                        <!-- end course-item-content-wrap -->
                                                    </li>
                                                    <li class="course-item-link active-resource">
                                                        <div class="course-item-content-wrap">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="courseCheckbox3" required="" />
                                                                <label class="custom-control-label custom--control-label" for="courseCheckbox3"></label>
                                                            </div>
                                                            <!-- end custom-control -->
                                                            <div class="course-item-content">
                                                                <h4 class="fs-15">3. اموزش تربیت کودکانه بخش سوم</h4>
                                                                <div class="courser-item-meta-wrap">
                                                                    <p class="course-item-meta"><i class="la la-file"></i>2 دقیقه</p>
                                                                    <div class="generic-action-wrap">
                                                                        <div class="dropdown">
                                                                            <a
                                                                                class="btn theme-btn theme-btn-sm theme-btn-transparent mt-1 fs-14 font-weight-medium"
                                                                                href="#"
                                                                                data-toggle="dropdown"
                                                                                aria-haspopup="true"
                                                                                aria-expanded="false"
                                                                            >
                                                                                <i class="la la-folder-open mr-1"></i> منابع<i class="la la-angle-down ml-1"></i>
                                                                            </a>
                                                                            <div class="dropdown-menu dropdown-menu-left">
                                                                                <a class="dropdown-item" href="javascript:void(0)">
                                                                                    Section-Footage.zip
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- end generic-action-wrap -->
                                                                </div>
                                                            </div>
                                                            <!-- end course-item-content -->
                                                        </div>
                                                        <!-- end course-item-content-wrap -->
                                                    </li>
                                                    <li class="course-item-link">
                                                        <div class="course-item-content-wrap">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="courseCheckbox4" required="" />
                                                                <label class="custom-control-label custom--control-label" for="courseCheckbox4"></label>
                                                            </div>
                                                            <!-- end custom-control -->
                                                            <div class="course-item-content">
                                                                <h4 class="fs-15">4. اموزش تربیت کودکانه بخش چهارم</h4>
                                                                <div class="courser-item-meta-wrap">
                                                                    <p class="course-item-meta"><i class="la la-play-circle"></i>2 دقیقه</p>
                                                                </div>
                                                            </div>
                                                            <!-- end course-item-content -->
                                                        </div>
                                                        <!-- end course-item-content-wrap -->
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- end card-body -->
                                        </div>
                                        <!-- end collapse -->
                                    </div>
                                    <!-- end card -->
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                <i class="la la-angle-down"></i>
                                                <i class="la la-angle-up"></i>
                                                <span class="fs-15">بخش 2: شروع آموزش به کودک </span>
                                                <span class="course-duration">
                                                    <span>1/5</span>
                                                    <span>21 دقیقه</span>
                                                </span>
                                            </button>
                                        </div>
                                        <!-- end card-header -->
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionCourseExample">
                                            <div class="card-body p-0">
                                                <ul class="curriculum-sidebar-list">
                                                    <li class="course-item-link">
                                                        <div class="course-item-content-wrap">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="courseCheckbox5" required="" />
                                                                <label class="custom-control-label custom--control-label" for="courseCheckbox5"></label>
                                                            </div>
                                                            <!-- end custom-control -->
                                                            <div class="course-item-content">
                                                                <h4 class="fs-15">5. آموزش اولیه تربیتی قسمت 1</h4>
                                                                <div class="courser-item-meta-wrap">
                                                                    <p class="course-item-meta"><i class="la la-play-circle"></i>2 دقیقه</p>
                                                                </div>
                                                            </div>
                                                            <!-- end course-item-content -->
                                                        </div>
                                                        <!-- end course-item-content-wrap -->
                                                    </li>
                                                    <li class="course-item-link">
                                                        <div class="course-item-content-wrap">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="courseCheckbox6" required="" />
                                                                <label class="custom-control-label custom--control-label" for="courseCheckbox6"></label>
                                                            </div>
                                                            <!-- end custom-control -->
                                                            <div class="course-item-content">
                                                                <h4 class="fs-15">6. آموزش اولیه تربیتی قسمت 2</h4>
                                                                <div class="courser-item-meta-wrap">
                                                                    <p class="course-item-meta"><i class="la la-play-circle"></i>2 دقیقه</p>
                                                                </div>
                                                            </div>
                                                            <!-- end course-item-content -->
                                                        </div>
                                                        <!-- end course-item-content-wrap -->
                                                    </li>
                                                    <li class="course-item-link active-resource">
                                                        <div class="course-item-content-wrap">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="courseCheckbox7" required="" />
                                                                <label class="custom-control-label custom--control-label" for="courseCheckbox7"></label>
                                                            </div>
                                                            <!-- end custom-control -->
                                                            <div class="course-item-content">
                                                                <h4 class="fs-15">7.آموزش اولیه تربیتی قسمت 3 </h4>
                                                                <div class="courser-item-meta-wrap">
                                                                    <p class="course-item-meta"><i class="la la-file"></i>2 دقیقه</p>
                                                                    <div class="generic-action-wrap">
                                                                        <div class="dropdown">
                                                                            <a
                                                                                class="btn theme-btn theme-btn-sm theme-btn-transparent mt-1 fs-14 font-weight-medium"
                                                                                href="#"
                                                                                data-toggle="dropdown"
                                                                                aria-haspopup="true"
                                                                                aria-expanded="false"
                                                                            >
                                                                                <i class="la la-folder-open mr-1"></i> منابع<i class="la la-angle-down ml-1"></i>
                                                                            </a>
                                                                            <div class="dropdown-menu dropdown-menu-left">
                                                                                <a class="dropdown-item" href="javascript:void(0)">
                                                                                    Section-Footage.zip
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- end generic-action-wrap -->
                                                                </div>
                                                            </div>
                                                            <!-- end course-item-content -->
                                                        </div>
                                                        <!-- end course-item-content-wrap -->
                                                    </li>
                                                    <li class="course-item-link">
                                                        <div class="course-item-content-wrap">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="courseCheckbox8" required="" />
                                                                <label class="custom-control-label custom--control-label" for="courseCheckbox8"></label>
                                                            </div>
                                                            <!-- end custom-control -->
                                                            <div class="course-item-content">
                                                                <h4 class="fs-15">8. آموزش اولیه تربیتی قسمت 4</h4>
                                                                <div class="courser-item-meta-wrap">
                                                                    <p class="course-item-meta"><i class="la la-play-circle"></i>2 دقیقه</p>
                                                                </div>
                                                            </div>
                                                            <!-- end course-item-content -->
                                                        </div>
                                                        <!-- end course-item-content-wrap -->
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- end card-body -->
                                        </div>
                                        <!-- end collapse -->
                                    </div>
                                    <!-- end card -->
                                    <div class="card">
                                        <div class="card-header" id="headingThree">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                <i class="la la-angle-down"></i>
                                                <i class="la la-angle-up"></i>
                                                <span class="fs-15">بخش 3: آموزش نوجوان </span>
                                                <span class="course-duration">
                                                    <span>1/5</span>
                                                    <span>21 دقیقه</span>
                                                </span>
                                            </button>
                                        </div>
                                        <!-- end card-heder -->
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionCourseExample">
                                            <div class="card-body p-0">
                                                <ul class="curriculum-sidebar-list">
                                                    <li class="course-item-link">
                                                        <div class="course-item-content-wrap">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="courseCheckbox9" required="" />
                                                                <label class="custom-control-label custom--control-label" for="courseCheckbox9"></label>
                                                            </div>
                                                            <!-- end custom-control -->
                                                            <div class="course-item-content">
                                                                <h4 class="fs-15">9. آموزش اولیه تربیتی قسمت 1</h4>
                                                                <div class="courser-item-meta-wrap">
                                                                    <p class="course-item-meta"><i class="la la-play-circle"></i>2 دقیقه</p>
                                                                </div>
                                                            </div>
                                                            <!-- end course-item-content -->
                                                        </div>
                                                        <!-- end course-item-content-wrap -->
                                                    </li>
                                                    <li class="course-item-link">
                                                        <div class="course-item-content-wrap">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="courseCheckbox10" required="" />
                                                                <label class="custom-control-label custom--control-label" for="courseCheckbox10"></label>
                                                            </div>
                                                            <!-- end custom-control -->
                                                            <div class="course-item-content">
                                                                <h4 class="fs-15">10. آموزش اولیه تربیتی قسمت 2</h4>
                                                                <div class="courser-item-meta-wrap">
                                                                    <p class="course-item-meta"><i class="la la-play-circle"></i>2 دقیقه</p>
                                                                </div>
                                                            </div>
                                                            <!-- end course-item-content -->
                                                        </div>
                                                        <!-- end course-item-content-wrap -->
                                                    </li>
                                                    <li class="course-item-link active-resource">
                                                        <div class="course-item-content-wrap">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="courseCheckbox11" required="" />
                                                                <label class="custom-control-label custom--control-label" for="courseCheckbox11"></label>
                                                            </div>
                                                            <!-- end custom-control -->
                                                            <div class="course-item-content">
                                                                <h4 class="fs-15">11. آموزش اولیه تربیتی قسمت 3</h4>
                                                                <div class="courser-item-meta-wrap">
                                                                    <p class="course-item-meta"><i class="la la-file"></i>2 دقیقه</p>
                                                                    <div class="generic-action-wrap">
                                                                        <div class="dropdown">
                                                                            <a
                                                                                class="btn theme-btn theme-btn-sm theme-btn-transparent mt-1 fs-14 font-weight-medium"
                                                                                href="#"
                                                                                data-toggle="dropdown"
                                                                                aria-haspopup="true"
                                                                                aria-expanded="false"
                                                                            >
                                                                                <i class="la la-folder-open mr-1"></i> منابع<i class="la la-angle-down ml-1"></i>
                                                                            </a>
                                                                            <div class="dropdown-menu dropdown-menu-left">
                                                                                <a class="dropdown-item" href="javascript:void(0)">
                                                                                    Section-Footage.zip
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- end generic-action-wrap -->
                                                                </div>
                                                            </div>
                                                            <!-- end course-item-content -->
                                                        </div>
                                                        <!-- end course-item-content-wrap -->
                                                    </li>
                                                    <li class="course-item-link">
                                                        <div class="course-item-content-wrap">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="courseCheckbox12" required="" />
                                                                <label class="custom-control-label custom--control-label" for="courseCheckbox12"></label>
                                                            </div>
                                                            <!-- end custom-control -->
                                                            <div class="course-item-content">
                                                                <h4 class="fs-15">12. آموزش اولیه تربیتی قسمت 4</h4>
                                                                <div class="courser-item-meta-wrap">
                                                                    <p class="course-item-meta"><i class="la la-play-circle"></i>2 دقیقه</p>
                                                                </div>
                                                            </div>
                                                            <!-- end course-item-content -->
                                                        </div>
                                                        <!-- end course-item-content-wrap -->
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- end card-body -->
                                        </div>
                                        <!-- end collapse -->
                                    </div>
                                    <!-- end card -->
                                    <div class="card">
                                        <div class="card-header" id="headingFour">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                <i class="la la-angle-down"></i>
                                                <i class="la la-angle-up"></i>
                                                <span class="fs-15">بخش 4: سخنرانی پاداش </span>
                                                <span class="course-duration">
                                                    <span>1/5</span>
                                                    <span>21 دقیقه</span>
                                                </span>
                                            </button>
                                        </div>
                                        <!-- end card-heder -->
                                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionCourseExample">
                                            <div class="card-body p-0">
                                                <ul class="curriculum-sidebar-list">
                                                    <li class="course-item-link">
                                                        <div class="course-item-content-wrap">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="courseCheckbox13" required="" />
                                                                <label class="custom-control-label custom--control-label" for="courseCheckbox13"></label>
                                                            </div>
                                                            <!-- end custom-control -->
                                                            <div class="course-item-content">
                                                                <h4 class="fs-15">13. دوره های جایزه - با هزینه کمتر بیشتر بیاموزید</h4>
                                                                <div class="courser-item-meta-wrap">
                                                                    <p class="course-item-meta"><i class="la la-play-circle"></i>2 دقیقه</p>
                                                                </div>
                                                            </div>
                                                            <!-- end course-item-content -->
                                                        </div>
                                                        <!-- end course-item-content-wrap -->
                                                    </li>
                                                    <li class="course-item-link">
                                                        <div class="course-item-content-wrap">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="courseCheckbox14" required="" />
                                                                <label class="custom-control-label custom--control-label" for="courseCheckbox14"></label>
                                                            </div>
                                                            <!-- end custom-control -->
                                                            <div class="course-item-content">
                                                                <h4 class="fs-15">14. نتیجه گیری</h4>
                                                                <div class="courser-item-meta-wrap">
                                                                    <p class="course-item-meta"><i class="la la-play-circle"></i>2 دقیقه</p>
                                                                </div>
                                                            </div>
                                                            <!-- end course-item-content -->
                                                        </div>
                                                        <!-- end course-item-content-wrap -->
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- end card-body -->
                                        </div>
                                        <!-- end collapse -->
                                    </div>
                                    <!-- end card -->
                                </div>
                                <!-- end accordion-->
                            </div>
                            <!-- end course-dashboard-side-content -->
                        </div>
                        <!-- end course-dashboard-sidebar-wrap -->
                    </div>
                    <!-- end course-dashboard-sidebar-column -->
                </div>
                <!-- end course-dashboard-container -->
            </div>
            <!-- end course-dashboard-wrap -->
        </section>


        <!-- Modal -->
        <div class="modal fade modal-container" id="ratingModal" tabindex="-1" role="dialog" aria-labelledby="ratingModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-gray">
                        <div class="pr-2">
                            <h5 class="modal-title fs-19 font-weight-semi-bold lh-24" id="ratingModalTitle">
                                به این دوره چه امتیازی می دهید؟
                            </h5>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="نزدیک">
                            <span aria-hidden="true" class="la la-times"></span>
                        </button>
                    </div>
                    <!-- end modal-header -->
                    <div class="modal-body text-center py-5">
                        <div class="leave-rating mt-5">
                            <input type="radio" name="rate" id="star5" />
                            <label for="star5" class="fs-45"></label>
                            <input type="radio" name="rate" id="star4" />
                            <label for="star4" class="fs-45"></label>
                            <input type="radio" name="rate" id="star3" />
                            <label for="star3" class="fs-45"></label>
                            <input type="radio" name="rate" id="star2" />
                            <label for="star2" class="fs-45"></label>
                            <input type="radio" name="rate" id="star1" />
                            <label for="star1" class="fs-45"></label>
                            <div class="rating-result-text fs-20 pb-4"></div>
                        </div>
                        <!-- end leave-rating -->
                    </div>
                    <!-- end modal-body -->
                </div>
                <!-- end modal-content -->
            </div>
            <!-- end modal-dialog -->
        </div>
        <!-- end modal -->

        <!-- Modal -->
        <div class="modal fade modal-container" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="shareModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-gray">
                        <h5 class="modal-title fs-19 font-weight-semi-bold" id="shareModalTitle">این دوره را به اشتراک بگذارید</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="نزدیک">
                            <span aria-hidden="true" class="la la-times"></span>
                        </button>
                    </div>
                    <!-- end modal-header -->
                    <div class="modal-body">
                        <div class="copy-to-clipboard">
                            <span class="success-message">کپی شده!</span>
                            <div class="input-group">
                                <input type="text" class="form-control form--control copy-input pl-3" value="https://www.aduca.com/share/101WxMB0oac1hVQQ==/" />
                                <div class="input-group-append">
                                    <button class="btn theme-btn theme-btn-sm copy-btn shadow-none"><i class="la la-copy mr-1"></i> کپی 🀄</button>
                                </div>
                            </div>
                        </div>
                        <!-- end copy-to-clipboard -->
                    </div>
                    <!-- end modal-body -->
                    <div class="modal-footer justify-content-center border-top-gray">
                        <ul class="social-icons social-icons-styled">
                            <li>
                                <a href="#" class="facebook-bg"><i class="la la-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="twitter-bg"><i class="la la-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="instagram-bg"><i class="la la-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!-- end modal-footer -->
                </div>
                <!-- end modal-content-->
            </div>
            <!-- end modal-dialog -->
        </div>
        <!-- end modal -->

        <!-- Modal -->
        <div class="modal fade modal-container" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="reportModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-gray">
                        <div class="pr-2">
                            <h5 class="modal-title fs-19 font-weight-semi-bold lh-24" id="reportModalTitle">گزارش سوءاستفاده</h5>
                            <p class="pt-1 fs-14 lh-24">
                                محتوای پرچم گذاری شده توسط کارکنان ادوکا بررسی می شود تا مشخص شود که آیا شرایط خدمات یا دستورالعمل های انجمن را نقض می کند یا خیر. اگر سؤال یا مشکل فنی دارید، لطفاً با
                                <a href="contact.html" class="text-color hover-underline">تیم پشتیبانی</a> ما <a href="contact.html" class="text-color hover-underline">در اینجا</a> تماس بگیرید .
                            </p>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="نزدیک">
                            <span aria-hidden="true" class="la la-times"></span>
                        </button>
                    </div>
                    <!-- end modal-header -->
                    <div class="modal-body">
                        <form method="post">
                            <div class="input-box">
                                <label class="label-text">نوع گزارش را انتخاب کنید</label>
                                <div class="form-group">
                                    <div class="select-container w-auto">
                                        <select class="select-container-select">
                                            <option value="">-- یکی را انتخاب کن --</option>
                                            <option value="1">محتوای دوره نامناسب</option>
                                            <option value="2">رفتار نامناسب</option>
                                            <option value="3">نقض خط مشی را بیاورید</option>
                                            <option value="4">محتوای اسپم</option>
                                            <option value="5">دیگر</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="input-box">
                                <label class="label-text">پیام بنویس</label>
                                <div class="form-group">
                                    <textarea class="form-control form--control pl-3" name="message" placeholder="توضیحات تکمیلی را در اینجا ارائه دهید..." rows="5"></textarea>
                                </div>
                            </div>
                            <div class="btn-box text-left pt-2">
                                <button type="button" class="btn font-weight-medium mr-3" data-dismiss="modal">لغو کنید</button>
                                <button type="submit" class="btn theme-btn theme-btn-sm lh-30">ارسال <i class="la la-arrow-left icon ml-1"></i></button>
                            </div>
                        </form>
                    </div>
                    <!-- end modal-body -->
                </div>
                <!-- end modal-content -->
            </div>
            <!-- end modal-dialog -->
        </div>
        <!-- end modal -->

        <!-- Modal -->
        <div class="modal fade modal-container" id="insertLinkModal" tabindex="-1" role="dialog" aria-labelledby="insertLinkModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-gray">
                        <div class="pr-2">
                            <h5 class="modal-title fs-19 font-weight-semi-bold lh-24" id="insertLinkModalTitle">درج لینک</h5>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="نزدیک">
                            <span aria-hidden="true" class="la la-times"></span>
                        </button>
                    </div>
                    <!-- end modal-header -->
                    <div class="modal-body">
                        <form action="#">
                            <div class="input-box">
                                <label class="label-text">URL</label>
                                <div class="form-group">
                                    <input class="form-control form--control" type="text" name="text" placeholder="آدرس اینترنتی" />
                                    <i class="la la-link input-icon"></i>
                                </div>
                            </div>
                            <div class="input-box">
                                <label class="label-text">متن</label>
                                <div class="form-group">
                                    <input class="form-control form--control" type="text" name="text" placeholder="متن" />
                                    <i class="la la-pencil input-icon"></i>
                                </div>
                            </div>
                            <div class="btn-box text-left pt-2">
                                <button type="button" class="btn font-weight-medium mr-3" data-dismiss="modal">لغو کنید</button>
                                <button type="submit" class="btn theme-btn theme-btn-sm lh-30">درج کنید <i class="la la-arrow-left icon ml-1"></i></button>
                            </div>
                        </form>
                    </div>
                    <!-- end modal-body -->
                </div>
                <!-- end modal-content -->
            </div>
            <!-- end modal-dialog -->
        </div>
        <!-- end modal -->

        <!-- Modal -->
        <div class="modal fade modal-container" id="uploadPhotoModal" tabindex="-1" role="dialog" aria-labelledby="uploadPhotoModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-gray">
                        <div class="pr-2">
                            <h5 class="modal-title fs-19 font-weight-semi-bold lh-24" id="uploadPhotoModalTitle">یک تصویر آپلود کنید</h5>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="نزدیک">
                            <span aria-hidden="true" class="la la-times"></span>
                        </button>
                    </div>
                    <!-- end modal-header -->
                    <div class="modal-body">
                        <div class="file-upload-wrap">
                            <input type="file" name="files[]" class="multi file-upload-input" multiple="" />
                            <span class="file-upload-text"><i class="la la-upload mr-2"></i>فایل ها را اینجا رها کنید یا برای آپلود کلیک کنید</span>
                        </div>
                        <!-- file-upload-wrap -->
                        <div class="btn-box text-left pt-2">
                            <button type="button" class="btn font-weight-medium mr-3" data-dismiss="modal">لغو کنید</button>
                            <button type="submit" class="btn theme-btn theme-btn-sm lh-30">ارسال <i class="la la-arrow-left icon ml-1"></i></button>
                        </div>
                    </div>
                    <!-- end modal-body -->
                </div>
                <!-- end modal-content -->
            </div>
            <!-- end modal-dialog -->
        </div>
        <!-- end modal -->
@endsection
