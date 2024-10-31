@extends('master')
@section('main')

    <section class="breadcrumb-area pt-50px pb-50px bg-white pattern-bg">
        <div class="container">
            <div class="col-lg-8 mr-auto">
                <div class="breadcrumb-content">
                    <ul class="generic-list-item generic-list-item-arrow d-flex flex-wrap align-items-center">
                        <li><a href="{{url('/')}}">صفحه اصلی</a></li>
                        <li><a href="{{url('دوره-آموزشی/'.$singleworkshops->slug)}}">{{$singleworkshops->title}}</a>
                        </li>
                    </ul>
                    <div class="section-heading">
                        <h2 class="section__title">{{$singleworkshops->title}}</h2>
                    </div>
                    <div class="d-flex flex-wrap align-items-center pt-3">
                        <h6 class="ribbon ribbon-lg mr-2 bg-3 text-white">{{$singleworkshops->type}}</h6>
                    </div>
                    <p class="pt-2 pb-1">ارائه توسط : {{$singleworkshops->teacher}}</p>
                    <div class="d-flex flex-wrap align-items-center">
                        <p class="pr-3 d-flex align-items-center">
                            <svg class="svg-icon-color-gray mr-1" width="16px" viewBox="0 0 24 24">
                                <path
                                    d="M23 12l-2.44-2.78.34-3.68-3.61-.82-1.89-3.18L12 3 8.6 1.54 6.71 4.72l-3.61.81.34 3.68L1 12l2.44 2.78-.34 3.69 3.61.82 1.89 3.18L12 21l3.4 1.46 1.89-3.18 3.61-.82-.34-3.68L23 12zm-10 5h-2v-2h2v2zm0-4h-2V7h2v6z"
                                ></path>
                            </svg>
                            تاریخ برگزاری دوره : {{$singleworkshops->date}}

                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>
    @php
        $lines = explode("\n", $singleworkshops->target);
    @endphp

    <section class="course-details-area pb-20px">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 pb-5">
                    <div class="course-details-content-wrap pt-90px">
                        <div class="course-overview-card bg-gray p-4 rounded">
                            <h3 class="fs-24 font-weight-semi-bold pb-3">اهداف دوره</h3>
                            {{--                            <ul class="generic-list-item overview-list-item">--}}
                            {{--                                <li><i class="la la-check mr-1 text-black"></i>{{$singleworkshops->target}}</li>--}}
                            {{--                            </ul>--}}
                            <ul>
                                @foreach ($lines as $line)
                                    <li class="generic-list-item overview-list-item">{{ $line }}</li>
                                @endforeach
                            </ul>
                        </div>

                        {{--                        <div class="course-overview-card">--}}
                        {{--                            <h3 class="fs-24 font-weight-semi-bold pb-3">الزامات</h3>--}}
                        {{--                            <ul class="generic-list-item generic-list-item-bullet fs-15">--}}
                        {{--                                <li>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</li>--}}
                        {{--                                <li>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</li>--}}
                        {{--                                <li>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده</li>--}}
                        {{--                            </ul>--}}
                        {{--                        </div>--}}

                        <div class="course-overview-card">
                            <h3 class="fs-24 font-weight-semi-bold pb-3">شرح</h3>
                            <p class="section__desc pt-2 lh-30">{{$singleworkshops->description}}</p>

                            <p class="fs-15 pb-2">

                            </p>
                        </div>
                        {{--                        <div class="course-overview-card">--}}
                        {{--                            <div class="curriculum-header d-flex align-items-center justify-content-between pb-4">--}}
                        {{--                                <h3 class="fs-24 font-weight-semi-bold">محتوای دوره</h3>--}}
                        {{--                                <div class="curriculum-duration fs-15">--}}
                        {{--                                    <span class="curriculum-total__text mr-2"><strong class="text-black font-weight-semi-bold">مجموع:</strong> 17 قسمت </span>--}}
                        {{--                                    <span class="curriculum-total__hours"><strong class="text-black font-weight-semi-bold">کل ساعت:</strong> 20:35:47</span>--}}
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
                        {{--                                                <span class="fs-15 text-gray font-weight-medium">6 قسمت</span>--}}
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
                        {{--                                                <span class="fs-15 text-gray font-weight-medium">6 قسمت </span>--}}
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
                        {{--                                                <span class="fs-15 text-gray font-weight-medium">1 قسمت</span>--}}
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
                        <div class="course-overview-card pt-4">
                            <h3 class="fs-24 font-weight-semi-bold pb-4">در مورد استاد</h3>
                            <div class="instructor-wrap">
                                <div class="media media-card">
                                    <div class="instructor-img">
                                        <a href="#" class="media-img d-block">
                                            <img class="lazy" src="images/img-loading.png"
                                                 data-src="{{asset($singleworkshops->teacher_image)}}" alt="تصویر "/>
                                        </a>
                                        {{--                                        <ul class="generic-list-item pt-3">--}}
                                        {{--                                            <li><i class="la la-star mr-2 text-color-3"></i> 4.6 رتبه بندی استاد</li>--}}
                                        {{--                                            <li><i class="la la-user mr-2 text-color-3"></i> 45786 دانش پذیر</li>--}}
                                        {{--                                            <li><i class="la la-comment-o mr-2 text-color-3"></i> 2,533 نظر</li>--}}
                                        {{--                                            <li><i class="la la-play-circle-o mr-2 text-color-3"></i> 24 دوره</li>--}}
                                        {{--                                            <li><a href="#">مشاهده تمام دوره ها</a></li>--}}
                                        {{--                                        </ul>--}}
                                    </div>
                                    <!-- end instructor-img -->
                                    @php
                                        $resumes = explode("\n", $singleworkshops->teacher_resume);
                                    @endphp
                                    <div class="media-body">
                                        <p class="text-black lh-18 pb-3">سوابق و مدارک </p>
                                        <ul>
                                            @foreach ($resumes as $resume)
                                                <li class="generic-list-item overview-list-item">{{ $resume }}</li>
                                            @endforeach
                                        </ul>
                                        <div class="collapse" id="collapseMoreTwo">
                                            <p class="pb-3">
                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده
                                                از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و
                                                سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی
                                                مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- end instructor-wrap -->
                        </div>

                        {{--                        <div class="course-overview-card pt-4">--}}
                        {{--                            <h3 class="fs-24 font-weight-semi-bold pb-40px">بازخورد دانش پذیر</h3>--}}
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
                        {{--                            <h3 class="fs-24 font-weight-semi-bold pb-4">نظرات درباره دوره</h3>--}}
                        {{--                            <div class="review-wrap">--}}
                        {{--                                <div class="media media-card border-bottom border-bottom-gray pb-4 mb-4">--}}
                        {{--                                    <div class="media-img mr-4 rounded-full">--}}
                        {{--                                        <img class="rounded-full lazy" src="images/img-loading.png" data-src="images/small-avatar-1.jpg" alt="تصویر کاربر" />--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="media-body">--}}
                        {{--                                        <div class="d-flex flex-wrap align-items-center justify-content-between pb-1">--}}
                        {{--                                            <h5>کاوی آرسان</h5>--}}

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
                        {{--                                        <img class="rounded-full lazy" src="images/img-loading.png" data-src="images/small-avatar-2.jpg" alt="تصویر کاربر" />--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="media-body">--}}
                        {{--                                        <div class="d-flex flex-wrap align-items-center justify-content-between pb-1">--}}
                        {{--                                            <h5>جیتش شاو</h5>--}}

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
                        {{--                                        <img class="rounded-full lazy" src="images/img-loading.png" data-src="images/small-avatar-3.jpg" alt="تصویر کاربر" />--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="media-body">--}}
                        {{--                                        <div class="d-flex flex-wrap align-items-center justify-content-between pb-1">--}}
                        {{--                                            <h5>میگل سانچس</h5>--}}

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
                                        <img src="{{asset($singleworkshops->image)}}" data-src="images/preview-img.jpg"
                                             alt="course-img" class="w-100 rounded lazy"/>
                                        <div class="preview-course-video-content">
                                            <div class="overlay"></div>
                                            <div class="play-button">
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                     viewBox="-307.4 338.8 91.8 91.8"
                                                     style="enable-background: new -307.4 338.8 91.8 91.8;"
                                                     xml:space="preserve">
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
                                                        <path class="st1"
                                                              d="M-272.9,363.2l35.8,20.7c0.7,0.4,0.7,1.3,0,1.7l-35.8,20.7c-0.7,0.4-1.5-0.1-1.5-0.9V364C-274.4,363.3-273.5,362.8-272.9,363.2z"></path>
                                                    </g>
                                                    </svg>
                                            </div>
                                            <p class="fs-15 font-weight-bold text-white pt-3">پیش گفتار این دوره</p>
                                        </div>
                                    </a>
                                </div>
                                <!-- end preview-course-video -->
                                <div class="preview-course-feature-content pt-40px">
                                    <p class="d-flex align-items-center pb-2">
                                        @if($singleworkshops->offer)
                                            <span class="fs-20 font-weight-semi-bold text-black">{{number_format($singleworkshops->offer)}} تومان </span>
                                            <span class="before-price mx-1"> {{number_format($singleworkshops->price)}} تومان </span>
                                        @endif
                                    </p>
                                    <div class="buy-course-btn-box">
                                        @if(Auth::check())
                                            <a href="{{route('profile')}}"
                                               class="btn theme-btn w-100 theme-btn-white mb-2">جهت تکمیل ثبت نام در
                                                کارگاه آموزشی کلیک کنید</a>
                                        @else
                                            <a href="{{route('register')}}"
                                               class="btn theme-btn w-100 theme-btn-white mb-2">جهت ثبت نام کلیک
                                                کنید</a>
                                        @endif
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
                                        <span><i
                                                class="mr-2 text-color"></i>مدت زمان</span> {{$singleworkshops->duration}}
                                        ساعت
                                    </li>
                                    <li class="d-flex align-items-center justify-content-between">
                                        <span><i class="mr-2 text-color"></i>نوع برگزاری : </span> حضوری و آنلاین
                                    </li>

                                    <li class="d-flex align-items-center justify-content-between">
                                        <span><i class="mr-2 text-color"></i>آزمون ورودی : </span> ندارد
                                    </li>
                                    {{--                                    <li class="d-flex align-items-center justify-content-between">--}}
                                    {{--                                        <span><i class="mr-2 text-color"></i> آزمون پایانی : </span> دارد--}}
                                    {{--                                    </li>--}}
                                    <li class="d-flex align-items-center justify-content-between">
                                        <span><i class="mr-2 text-color"></i>سطح مهارت</span> همه سطوح
                                    </li>
                                    {{--                                    <li class="d-flex align-items-center justify-content-between">--}}
                                    {{--                                        <span><i class="mr-2 text-color"></i>گواهی پایان دوره</span> بله--}}
                                    {{--                                    </li>--}}
                                </ul>
                            </div>
                        </div>

                        {{--                        <div class="card card-item">--}}
                        {{--                            <div class="card-body">--}}
                        {{--                                <h3 class="card-title fs-18 pb-2">دسته بندی دروس</h3>--}}
                        {{--                                <div class="divider"><span></span></div>--}}
                        {{--                                <ul class="generic-list-item">--}}
                        {{--                                    <li><a href="#">مقدماتی</a></li>--}}
                        {{--                                    <li><a href="#">خانواده و همسر داری</a></li>--}}
                        {{--                                    <li><a href="#">خانواده و فرزند آوری</a></li>--}}
                        {{--                                    <li><a href="#">خانواده و اخلاق نیکو</a></li>--}}
                        {{--                                    <li><a href="#">خانواده و پسرداری</a></li>--}}
                        {{--                                    <li><a href="#">خانواده و دختر داری</a></li>--}}
                        {{--                                    <li><a href="#">خانواده و زندگی</a></li>--}}
                        {{--                                    <li><a href="#">خانواده و تربیت</a></li>--}}
                        {{--                                </ul>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}

                        {{--                        <div class="card card-item">--}}
                        {{--                            <div class="card-body">--}}
                        {{--                                <h3 class="card-title fs-18 pb-2">دوره های مرتبط</h3>--}}
                        {{--                                <div class="divider"><span></span></div>--}}
                        {{--                                <div class="media media-card border-bottom border-bottom-gray pb-4 mb-4">--}}
                        {{--                                    <a href="#" class="media-img">--}}
                        {{--                                        <img class="mr-3 lazy" src="images/img-loading.png" data-src="images/small-img-2.jpg" alt="تصویر دوره مرتبط" />--}}
                        {{--                                    </a>--}}
                        {{--                                    <div class="media-body">--}}
                        {{--                                        <h5 class="fs-15"><a href="course-details.html">دوره های شماره 1</a></h5>--}}
                        {{--                                        <span class="d-block lh-18 py-1 fs-14">دکتر مهدی علی اکبرزاده</span>--}}
                        {{--                                        <p class="text-black font-weight-semi-bold lh-18 fs-15">99,000  تومان<span class="before-price fs-14"> 100,000  تومان</span></p>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}

                        <div class="card card-item">
                            <div class="card-body">
                                <h3 class="card-title fs-18 pb-2">برچسب های دوره</h3>
                                <div class="divider"><span></span></div>
                                <ul class="generic-list-item generic-list-item-boxed d-flex flex-wrap fs-15">
                                    <li class="mr-2"><a href="#">{{$singleworkshops->title}}</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .modal-body {
            padding: 0;
        }

        .video-container {
            position: relative;
            padding-bottom: 56.25%; /* 16:9 aspect ratio */
            height: 0;
            overflow: hidden;
            max-width: 100%;
            background-color: #000;
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }
    </style>
    <div class="modal fade" id="previewModal" tabindex="-1" role="dialog" aria-labelledby="previewModalTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="video-container">
                        <iframe
                            src="https://www.aparat.com/video/video/embed/videohash/{{$singleworkshops->video}}/vt/frame/showvideo/true"
                            allow="autoplay; fullscreen" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--    <section class="related-course-area bg-gray pt-60px pb-60px">--}}
    {{--        <div class="container">--}}
    {{--            <div class="related-course-wrap">--}}
    {{--                <h3 class="fs-28 font-weight-semi-bold pb-35px">دیگر دوره ها</h3>--}}
    {{--                <div class="view-more-carousel-2 owl-action-styled">--}}
    {{--                    <div class="card card-item">--}}
    {{--                        <div class="card-image">--}}
    {{--                            <a href="course-details.html" class="d-block">--}}
    {{--                                <img class="card-img-top" src="images/img8.jpg" alt="درپوش تصویر کارت" />--}}
    {{--                            </a>--}}
    {{--                            <div class="course-badge-labels">--}}
    {{--                                <div class="course-badge">دوره پرفروش</div>--}}
    {{--                                <div class="course-badge blue">-39٪</div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
@endsection
