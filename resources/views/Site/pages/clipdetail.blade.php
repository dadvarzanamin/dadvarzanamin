@extends('master')
@section('main')

    <section class="breadcrumb-area pt-50px pb-50px bg-white pattern-bg">
        <div class="container">
            <div class="col-lg-8 mr-auto">
                <div class="breadcrumb-content">
                    <ul class="generic-list-item generic-list-item-arrow d-flex flex-wrap align-items-center">
                        <li><a href="{{route('/')}}">صفحه اصلی</a></li>
                        <li><a href="{{route($page_menu->slug)}}">{{$page_menu->slug}}</a></li>
                        <li><a href="#">{{$media->title}}</a></li>
                    </ul>
                    <div class="section-heading">
                        <h2 class="section__title">{{$media->title}}</h2>
                        <p class="section__desc pt-2 lh-30">{{$media->description}}</p>
                    </div>
                    <div class="d-flex flex-wrap align-items-center pt-3">
                        {{--                        <h6 class="ribbon ribbon-lg mr-2 bg-3 text-white">دوره ممتاز</h6>--}}
                        <div class="rating-wrap d-flex flex-wrap align-items-center">
                            <div class="review-stars">
                                <span class="rating-number">4.4</span>
                                <span class="la la-star"></span>
                                <span class="la la-star"></span>
                                <span class="la la-star"></span>
                                <span class="la la-star"></span>
                                <span class="la la-star-o"></span>
                            </div>
                            <span class="rating-total pl-1">(12 رای کاربران) </span>
                            <span class="student-total pl-2">{{ $media->view }} بازدید</span>
                        </div>
                    </div>
                    <p class="pt-2 pb-1">ایجاد شده توسط <a href="{{route('بیوگرافی')}}" class="text-color hover-underline">استاد محمدباقر حیدری کاشانی</a></p>
                    <div class="d-flex flex-wrap align-items-center">
                        <p class="pr-3 d-flex align-items-center">
                            <svg class="svg-icon-color-gray mr-1" width="16px" viewBox="0 0 24 24">
                                <path
                                    d="M23 12l-2.44-2.78.34-3.68-3.61-.82-1.89-3.18L12 3 8.6 1.54 6.71 4.72l-3.61.81.34 3.68L1 12l2.44 2.78-.34 3.69 3.61.82 1.89 3.18L12 21l3.4 1.46 1.89-3.18 3.61-.82-.34-3.68L23 12zm-10 5h-2v-2h2v2zm0-4h-2V7h2v6z"
                                ></path>
                            </svg>
                            آخرین به روز رسانی
                            {{jdate($media->update_at)->format('d %B Y')}}
                        </p>
                        <p class="pr-3 d-flex align-items-center">
                            <svg class="svg-icon-color-gray mr-1" width="16px" viewBox="0 0 24 24">
                                <path
                                    d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zm6.93 6h-2.95a15.65 15.65 0 00-1.38-3.56A8.03 8.03 0 0118.92 8zM12 4.04c.83 1.2 1.48 2.53 1.91 3.96h-3.82c.43-1.43 1.08-2.76 1.91-3.96zM4.26 14C4.1 13.36 4 12.69 4 12s.1-1.36.26-2h3.38c-.08.66-.14 1.32-.14 2s.06 1.34.14 2H4.26zm.82 2h2.95c.32 1.25.78 2.45 1.38 3.56A7.987 7.987 0 015.08 16zm2.95-8H5.08a7.987 7.987 0 014.33-3.56A15.65 15.65 0 008.03 8zM12 19.96c-.83-1.2-1.48-2.53-1.91-3.96h3.82c-.43 1.43-1.08 2.76-1.91 3.96zM14.34 14H9.66c-.09-.66-.16-1.32-.16-2s.07-1.35.16-2h4.68c.09.65.16 1.32.16 2s-.07 1.34-.16 2zm.25 5.56c.6-1.11 1.06-2.31 1.38-3.56h2.95a8.03 8.03 0 01-4.33 3.56zM16.36 14c.08-.66.14-1.32.14-2s-.06-1.34-.14-2h3.38c.16.64.26 1.31.26 2s-.1 1.36-.26 2h-3.38z"
                                ></path>
                            </svg>
                            @foreach($subtitles as $subtitle)
                                {{$subtitle->title}}/
                            @endforeach
                        </p>
                    </div>
                    {{--                    <div class="bread-btn-box pt-3">--}}
                    {{--                        <button class="btn theme-btn theme-btn-sm theme-btn-transparent lh-28 mr-2 mb-2">--}}
                    {{--                            <i class="la la-heart-o mr-1"></i>--}}
                    {{--                            <span class="swapping-btn" data-text-swap="Wishlisted" data-text-original="Wishlist">لیست علاقه مندیها</span>--}}
                    {{--                        </button>--}}
                    {{--                        <button class="btn theme-btn theme-btn-sm theme-btn-transparent lh-28 mr-2 mb-2" data-toggle="modal" data-target="#shareModal"><i class="la la-share mr-1"></i>اشتراک گذاری</button>--}}
                    {{--                        <button class="btn theme-btn theme-btn-sm theme-btn-transparent lh-28 mb-2" data-toggle="modal" data-target="#reportModal"><i class="la la-flag mr-1"></i>گزارش سوءاستفاده</button>--}}
                    {{--                    </div>--}}
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
                            <h3 class="fs-24 font-weight-semi-bold pb-3">{{$media->title_text}}</h3>
                            <ul class="generic-list-item overview-list-item">
                                <li><i class="la la-check mr-1 text-black"></i>{{$media->item1}}</li>
                                <li><i class="la la-check mr-1 text-black"></i>{{$media->item2}}</li>
                                <li><i class="la la-check mr-1 text-black"></i>{{$media->item3}}</li>
                                <li><i class="la la-check mr-1 text-black"></i>{{$media->item4}}</li>
                                <li><i class="la la-check mr-1 text-black"></i>{{$media->item5}}</li>
                                <li><i class="la la-check mr-1 text-black"></i>{{$media->item6}}</li>
                            </ul>
                        </div>

                        <div class="course-overview-card">
                            <h3 class="fs-24 font-weight-semi-bold pb-3">شرح مطلب : </h3>
                            @foreach($subtitles as $subtitle)
                                {!! $subtitle->description !!}
                            @endforeach

                        </div>

                        <div class="course-overview-card pt-4">
                            <h3 class="fs-24 font-weight-semi-bold pb-40px">بازخورد </h3>
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
                            <h3 class="fs-24 font-weight-semi-bold pb-4">نظرات</h3>
                            <div class="review-wrap">
                                <div class="media media-card border-bottom border-bottom-gray pb-4 mb-4">
                                    <div class="media-body">
                                        <div class="d-flex flex-wrap align-items-center justify-content-between pb-1">
                                            <h5>امین پاکدل</h5>
                                            <div class="review-stars">
                                                <span class="la la-star"></span>
                                                <span class="la la-star"></span>
                                                <span class="la la-star"></span>
                                                <span class="la la-star"></span>
                                                <span class="la la-star"></span>
                                            </div>
                                        </div>
                                        <span class="d-block lh-18 pb-2">یک هفته پیش</span>
                                        <p class="pb-2">بسیار موضوع مهم و مفیدی بود که باید دقت کنیم و یاری کنیم نائب امام زمان رو تا ان شالله ظهور اتفاق بیافته. ممنون از مطالبتون</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="course-overview-card pt-4">
                            <h3 class="fs-24 font-weight-semi-bold pb-4">ثبت نظر</h3>
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
                                    <button class="btn theme-btn" type="submit">ارسال بررسی</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="sidebar sidebar-negative">
                        <div class="card card-item">
                            <div class="card-body">
                                <div class="preview-course-video">
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#previewModal">
                                        <img src="{{asset('storage/'.$media->cover)}}" data-src="{{asset('storage/'.$media->cover)}}" alt="{{$media->title}}" class="w-100 rounded lazy" />
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
                                            <p class="fs-15 font-weight-bold text-white pt-3">پخش فایل </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card card-item">
                            <div class="card-body">
                                <h3 class="card-title fs-18 pb-2">ویژگی های فایل </h3>
                                <div class="divider"><span></span></div>
                                <ul class="generic-list-item generic-list-item-flash">
                                    <li class="d-flex align-items-center justify-content-between">
                                        <span><i class="la la-clock mr-2 text-color"></i>مدت زمان</span>{{$media->file_time}}
                                    </li>
                                    <li class="d-flex align-items-center justify-content-between">
                                        <span><i class="la la-play-circle-o mr-2 text-color"></i>نوع ارائه</span> {{$media->title_type}}
                                    </li>
                                    <li class="d-flex align-items-center justify-content-between">
                                        <span><i class="la la-play-circle-o mr-2 text-color"></i>نوع فایل</span> {{$media->clip_type}}
                                    </li>
                                    <li class="d-flex align-items-center justify-content-between">
                                        <span><i class="la la-language mr-2 text-color"></i>زبان</span>
                                        @if(trim($subtitles) != '[]')
                                            @foreach($subtitles as $subtitle)
                                                {{$subtitle->title}}/
                                            @endforeach
                                        @else
                                            فارسی
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="card card-item">
                            <div class="card-body">
                                <h3 class="card-title fs-18 pb-2">برچسب های دوره</h3>
                                <div class="divider"><span></span></div>
                                <ul class="generic-list-item generic-list-item-boxed d-flex flex-wrap fs-15">
                                    <li class="mr-2"><a href="#">امام زمان</a></li>
                                    <li class="mr-2"><a href="#">مهدی یاوری</a></li>
                                    <li class="mr-2"><a href="#">مهدی باوری</a></li>
                                    <li class="mr-2"><a href="#">آمادگی برای ظهور</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="previewModal" tabindex="-1" role="dialog" aria-labelledby="previewModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            @if($media->submenu_id == 30)
                <div class="modal-content" style="background-color: #f1f3f4">
                    <audio controls style="width: 100%">
                        <source src="{{asset('storage/'.$media->file_link)}}" type="audio/mpeg">
                    </audio>
                </div>
            @elseif($media->submenu_id == 31){
                <div class="modal-content">
                    <video controls preload="metadata" poster="{{asset('storage/'.$media->cover)}}" id="player" style="width: 100%">
                        <source src="{{asset('storage/'.$media->file_link)}}" type="video/mp4" />
                        @foreach($subtitles as $subtitle)
                            <track label="{{$subtitle->slug}}" kind="subtitles" srclang="{{$subtitle->abb}}" src="{{asset('storage/'.$subtitle->file_link)}}" {{$subtitle->default == 1 ? 'default' : ' '}}>
                        @endforeach
                    </video>
                </div>
            @endif
        </div>
    </div>
    <section class="related-course-area bg-gray pt-60px pb-60px">
        <div class="container">
            <div class="related-course-wrap">
                <h3 class="fs-28 font-weight-semi-bold pb-35px">آرشیو سخنرانی ها</h3>
                <div class="view-more-carousel-2 owl-action-styled">
                    @foreach($allmedias as $media)
                        <div class="card card-item card-preview" data-tooltip-content="#tooltip_content_1">
                            <div class="card-image">
                                <a href="{{url($page_menu->slug.'/'.$media->slug)}}" class="d-block">
                                    <img class="card-img-top img-index" src="{{asset('storage/'.$media->cover)}}" alt="{{$media->title}}">
                                    <div class="play-button">
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="-307.4 338.8 91.8 91.8" xml:space="preserve">
                                        <style type="text/css">.st0 {opacity: 0.6;fill: #000000;border-radius: 100px;}  .st1 {fill: #ffffff;}</style>
                                            <g>
                                                <circle class="st0" cx="-261.5" cy="384.7" r="45.9"></circle>
                                                <path class="st1" d="M-272.9,363.2l35.8,20.7c0.7,0.4,0.7,1.3,0,1.7l-35.8,20.7c-0.7,0.4-1.5-0.1-1.5-0.9V364C-274.4,363.3-273.5,362.8-272.9,363.2z"></path>
                                            </g>
                                    </svg>
                                    </div>
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><a href="{{url($page_menu->slug.'/'.$media->slug)}}">{{$media->title}}</a></h5>
                                <p class="card-text">سخنران : <a href="{{route('بیوگرافی')}}">استاد محمدباقر حیدری کاشانی</a></p>
                                <div class="line"></div>
                                <div class="rating-wrap d-flex align-items-center justify-content-between pt-3">
                                    <p>{{jdate($media->created_at)->format('d %B Y')}}</p>
                                    <a href="{{url($page_menu->slug.'/'.$media->slug)}}" class="btn theme-btn theme-btn-sm theme-btn-transparent">مشاهده</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection
