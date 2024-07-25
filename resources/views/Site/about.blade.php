@extends('master')
@section('style')
    @if($thispage->page_description)    <meta name="description"         content="{{$thispage->page_description}}">                    @endif
    @if(json_decode($thispage->keyword))<meta name="keyword"             content="{{implode("،" , json_decode($thispage->keyword))}}"> @endif
    <meta name="twitter:card"        content="summary" />
    @if($thispage->tab_title)           <meta name="twitter:title"       content="{{$thispage->tab_title}}" />                         @endif
    @if($thispage->page_description)    <meta name="twitter:description" content="{{$thispage->page_description}}" />                  @endif
    @if($thispage->tab_title)           <meta itemprop="name"            content="{{$thispage->tab_title}}">                           @endif
    @if($thispage->page_description)    <meta itemprop="description"     content="{{$thispage->page_description}}">                    @endif
    <meta property="og:url"          content="{{url()->current()}}" />
    @if($thispage->tab_title)           <meta property="og:title"        content="{{$thispage->tab_title}}"/>                          @endif
    @if($thispage->page_description)    <meta property="og:description"  content="{{$thispage->page_description}}" />                  @endif
    <link rel="canonical" href="{{url()->current()}}" />
    <link rel="stylesheet" href="{{asset('site/css/animated-headline.css')}}" />
    <title>{{$thispage->tab_title}}</title>
@endsection
@section('main')

    <section class="about-area section--padding overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-content pb-5">
                        <div class="section-heading2">
                            <h2 class="section__title pb-3 lh-50">موسسه حقوقی دادورزان امین</h2>
                            <p class="section__desc">
                                موسسه حقوقی دادورزان امین از سال 1396 با تکیه بر تعهد و تخصص و با بهره‌گیری از وکلای متخصص، کارشناسان مجرب و قضات بازنشسته در زمینه های مختلف حقوقی، مفتخر است که خدماتی جامع را به سبکی نوین و با بهترین بازدهی به شما ارائه دهد.
                            </p>
                        </div>
                        <ul class="generic-list-item pt-3">
                            <li><i class="la la-check-circle mr-2 text-success"></i>دسترسی سریع و هوشمند</li>
                            <li><i class="la la-check-circle mr-2 text-success"></i>وکلای خبره و توانمند</li>
                            <li><i class="la la-check-circle mr-2 text-success"></i>پرونده های موفق و حل شده</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-md-block align-content-center align-items-center">
                    <div class="generic-img-box generic-img-box-layout-2 align-content-center align-items-center">
                        <div class="img__item img__item-1">
                            <img class="lazy" src="{{asset('site/images/img-loading.png')}}" data-src="{{asset('site/images/img7.jpg')}}" alt="درباره تصویر" />
                            <div class="generic-img-box-content">
                                <h3 class="fs-24 font-weight-semi-bold pb-1">40+ نفر </h3>
                                <span>وکیل خبره</span>
                            </div>
                        </div>
                        <div class="img__item img__item-2">
                            <img class="lazy" src="{{asset('site/images/img-loading.png')}}" data-src="{{asset('site/images/img13.jpg')}}" alt="درباره تصویر" />
                            <div class="generic-img-box-content">
                                <h3 class="fs-24 font-weight-semi-bold pb-1">200+ ساعت</h3>
                                <span>دوره های آموزشی</span>
                            </div>
                        </div>
                        <div class="img__item img__item-3">
                            <img class="lazy" src="{{asset('site/images/img-loading.png')}}" data-src="{{asset('site/images/img14.jpg')}}" alt="درباره تصویر" />
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

    <section class="get-started-area pt-30px pb-120px position-relative  bg-gray">
        <span class="ring-shape ring-shape-1"></span>
        <span class="ring-shape ring-shape-2"></span>
        <span class="ring-shape ring-shape-3"></span>
        <span class="ring-shape ring-shape-4"></span>
        <span class="ring-shape ring-shape-5"></span>
        <span class="ring-shape ring-shape-6"></span>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 responsive-column-half">
                    <div class="card card-item hover-s text-center">
                        <div class="card-body">
                            <img src="{{asset('site/images/img-loading.png')}}" data-src="{{asset('site/images/img7.jpg')}}" alt="تصویر کارت" class="img-fluid lazy rounded-full" style="width: 150px;height: 150px" />
                            <h5 class="card-title pt-4 pb-2">تخصص و تجربه</h5>
                            <p class="card-text text-justify" style="margin: 30px">وکلا و کارشناسان ما در زمینه‌های مختلف حقوقی تخصص و تجربه چندین ساله‌ای دارند و تنها یک وکیل در مسیر رسیدن شما به هدفتان همراهتان نخواهد بود، بلکه کل تیم دادورزان امین شما را در این مسیر همراهی خواهند کرد.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 responsive-column-half">
                    <div class="card card-item hover-s text-center">
                        <div class="card-body">
                            <img src="{{asset('site/images/img-loading.png')}}" data-src="{{asset('site/images/img13.jpg')}}" alt="تصویر کارت" class="img-fluid lazy rounded-full" style="width: 150px;height: 150px"/>
                            <h5 class="card-title pt-4 pb-2">صداقت و تعهد</h5>
                            <p class="card-text text-justify" style="margin: 30px">ما برای پایبندی به اصولی چون صداقت و تعهد بستری آنلاین فراهم نموده‌ایم تا تمامی خدمات و روند امور شما در لحظه و به صورت شفاف قابل روئیت و پیگیری باشد.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 responsive-column-half">
                    <div class="card card-item hover-s text-center">
                        <div class="card-body">
                            <img src="{{asset('site/images/img-loading.png')}}" data-src="{{asset('site/images/img14.jpg')}}" alt="تصویر کارت" class="img-fluid lazy rounded-full" style="width: 150px;height: 150px" />
                            <h5 class="card-title pt-4 pb-2">کیفیت خدمات</h5>
                            <p class="card-text text-justify" style="margin: 30px">برای رسیدن به این امر مهم از تلاش خود بازنمی‌ایستیم و همواره در مسیر بهبود کیفیت خدمات ارائه شده برای موکلین، وکلا خواهیم بود. اگر چه تا این لحظه هم تمام دغدغه موسسه این‌چنین بوده است.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 responsive-column-half">
                    <div class="card card-item hover-s text-center">
                        <div class="card-body">
                            <img src="{{asset('site/images/img-loading.png')}}" data-src="{{asset('site/images/img14.jpg')}}" alt="تصویر کارت" class="img-fluid lazy rounded-full" style="width: 150px;height: 150px" />
                            <h5 class="card-title pt-4 pb-2">پشتیبانی و پاسخگویی</h5>
                            <p class="card-text text-justify" style="margin: 30px">همکاران ما در بخش پشتیبانی و امور دفتری همواره از طریق سایت، شماره‌های تماس و شبکه‌های اجتماعی به صورت 24 ساعته در خدمت شما هستند.</p>
                        </div>
                    </div>
                </div>
            </div>
{{--
            <p class="text-center">می خواهید با ما بپیوندید؟ <a href="careers.html" class="text-color hover-underline">موقعیت های باز</a> ما را ببینید<a href="careers.html" class="text-color hover-underline"></a></p>
--}}
        </div>
    </section>

    <section class="our-mission-area section--padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-none d-md-block">
                    <div class="row pb-5">
                        <div class="col-lg-6 responsive-column-half">
                            <div class="img-box">
                                <img src="{{asset('site/images/img-loading.png')}}" data-src="{{asset('site/images/img7.jpg')}}" alt="تصویر ماموریت ما" class="img-fluid lazy rounded-rounded" />
                            </div>
                        </div>
                        <div class="col-lg-6 responsive-column-half">
                            <div class="img-box my-3">
                                <img src="{{asset('site/images/img-loading.png')}}" data-src="{{asset('site/images/img13.jpg')}}" alt="تصویر ماموریت ما" class="img-fluid lazy rounded-rounded" />
                            </div>
                        </div>
                        <div class="col-lg-6 responsive-column-half">
                            <div class="img-box">
                                <img src="{{asset('site/images/img-loading.png')}}" data-src="{{asset('site/images/img14.jpg')}}" alt="تصویر ماموریت ما" class="img-fluid lazy rounded-rounded" />
                            </div>
                        </div>
                        <div class="col-lg-6 responsive-column-half">
                            <div class="img-box my-3">
                                <img src="{{asset('site/images/img-loading.png')}}" data-src="{{asset('site/images/img7.jpg')}}" alt="تصویر ماموریت ما" class="img-fluid lazy rounded-rounded" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content pl-4">
                        <div class="section-heading">
                            <h2 class="section__title pb-3 lh-50">خدمات ما</h2>
                            <p class="section__desc pb-3">موسسه حقوقی دادورزان امین متشکل از سه دپارتمان اصلی دعاوی، قراردادها و آموزش و پژوهش به ارائه خدمات در زمینه های مختلف می‌پردازد:</p>
                            <p class="section__desc pb-3">-دپارتمان دعاوی شامل بخش‌های حقوقی، کیفری و تجاری است که در هر بخش بصورت تخصصی خدمات ارائه مشاوره، دعاوی، داوری و نظرات شورای حقوقی است.</p>
                            <p class="section__desc pb-3">- دپارتمان قراردادها نیز شامل اکثریت موضوعات قراردادی داخلی و بین‌المللی است که خدمات تنظیم و مشاوره قراردادها در این دپارتمان انجام می‌پذیرد.</p>
                            <p class="section__desc pb-3">- دپارتمان آموزش و پژوهش: در این دپارتمان موسسه حقوقی دادورزان امین خدماتی برای دانشپذیران رشته حقوق در نظر گرفته است و با برگزاری کارگاه‌های آموزشی، نشست‌های حقوقی و ارائه ویدئو و جزوات و مطالب کاربردی خدمات خود را ارائه می‌دهد.</p>
                            <p class="section__desc pb-3">لازم به ذکر است خدمات موسسه حقوقی دادورزان امین برای سه قشر از جامعه کاربردی است و موکلین، وکلا و دانشپذیران می‌توانند هریک از خدمات مجزا دادورزان امین استفاده نمایند.</p>
                            <p class="section__desc pb-3">خدمات دعاوی، داوری، مشاوره، تنظیم قرارداد، نظریه شورای حقوقی، ثبت شرکت و تنظیم اوراق قضایی در دپارتمان‌های مختلف برای موکلین در نظر گرفته شده است البته خدمات ایرانیان خارج از کشور نیز در این بخش گنجانده شده است و خدماتی چون توکیل به وکلا، نظریات شورای حقوقی موسسه، دریافت انواع استعلامات مورد نیاز در پرونده‌ها برای وکلا و همچنین در بخش آموزش و پژوهش مطالب، ویدئوها، جزوات را برای دانشپذیران و دانشجویان تهیه و تدارک دیده است.</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="story-area section--padding bg-gray">
        <div class="container">
            <div class="story-content text-center">
                <div class="section-heading">
                    <h2 class="section__title pb-3 lh-50">هدف ما </h2>
                    <p class="section__desc pb-3">
                        هدف ما در موسسه حقوقی دادورزان امین ارائه خدمات جامع حقوقی تخصصی و متمایز به سبکی نوین برای موکلین، وکلا و دانشپذیران عزیز است؛ که با تکیه بر دانش، تجربه و تعهد کادر موسسه در تلاشیم که به بهترین نحو از حقوق شما در مراجع قضایی دفاع نماییم و یاری رسان شما در حل و فصل دعاوی و مشکلات حقوقی باشیم.</p>
                    <p>
                        امید است در مسیر رسیدن به اهدافتان موسسه حقوقی دادورزان امین بهترین همراه شما باشد.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <div class="section-block"></div>

    <section class="team-member-area section--padding">
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
                                    <img class="card-img-top" src="{{asset($emploee->image)}}" alt="{{$emploee->fullname}}" />
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

{{--
    <section class="testimonial-area bg-gray section--padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="testimonial-content-wrap pb-4">
                        <div class="section-heading">
                            <h2 class="section__title mb-3">درباره ما چه میگویند؟</h2>
                            <p class="section__desc">
                                موکلین که پرنده آنها را با ما پیش برده اند و وکلایی که با ما همکاری کرده اند درباره ما چه میگوند؟
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="testimonial-carousel-2 owl-action-styled owl-action-styled-2">
                        <div class="card card-item">
                            <div class="card-body">
                                <p class="card-text">
                                    من از زمانی که کارهای حقوقی شرکت را به این مجموعه سپردم با آرامش به کارهای شرکت پرداخته و تمام موارد حقوقی را از دوستان مشورت میگیرم و در صورت بروز شکل از این مجموعه برای رفع آن اعتماد می کنم
                                </p>
                                <div class="media media-card align-items-center pt-4">
                                    <div class="media-img avatar-md">
                                        <img src="{{asset('site/images/small-avatar-1.jpg')}}" alt="آواتار گواهی" class="rounded-full" />
                                    </div>
                                    <div class="media-body">
                                        <h5>مهندس میرمحمدی</h5>
                                        <div class="d-flex align-items-center pt-1">
                                            <span class="lh-18 pr-2">مدیرعامل شرکت مینو</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-item">
                            <div class="card-body">
                                <p class="card-text">
                                    من از زمانی که کارهای حقوقی شرکت را به این مجموعه سپردم با آرامش به کارهای شرکت پرداخته و تمام موارد حقوقی را از دوستان مشورت میگیرم و در صورت بروز شکل از این مجموعه برای رفع آن اعتماد می کنم
                                </p>
                                <div class="media media-card align-items-center pt-4">
                                    <div class="media-img avatar-md">
                                        <img src="{{asset('site/images/small-avatar-2.jpg')}}" alt="آواتار گواهی" class="rounded-full" />
                                    </div>
                                    <div class="media-body">
                                        <h5>ابراهیم محمدی</h5>
                                        <div class="d-flex align-items-center pt-1">
                                            <span class="lh-18 pr-2">معاون حقوقی شرکت توسعه اعتماد میهن</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-item">
                            <div class="card-body">
                                <p class="card-text">
                                    من از زمانی که کارهای حقوقی شرکت را به این مجموعه سپردم با آرامش به کارهای شرکت پرداخته و تمام موارد حقوقی را از دوستان مشورت میگیرم و در صورت بروز شکل از این مجموعه برای رفع آن اعتماد می کنم
                                </p>
                                <div class="media media-card align-items-center pt-4">
                                    <div class="media-img avatar-md">
                                        <img src="{{asset('site/images/small-avatar-3.jpg')}}" alt="آواتار گواهی" class="rounded-full" />
                                    </div>
                                    <div class="media-body">
                                        <h5>احمد جوکار</h5>
                                        <div class="d-flex align-items-center pt-1">
                                            <span class="lh-18 pr-2">مدیر حقوقی شرکت پتروشیمی</span>

                                        </div>
                                    </div>
                                </div>
                                <!-- end media -->
                            </div>
                            <!-- end card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
--}}

    <div class="section-block"></div>

    <section class="about-area section--padding  bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-content pb-5">
                        <div class="section-heading">
                            <h2 class="section__title pb-3 lh-50">موسسه حقوقی دادوران امین مکانی عالی برای رشد</h2>
                            <p class="section__desc pb-3">
                                موسسه حقوقی دادورزان امین از وکلای متخصص و مجرب در زمینه‌های مختلف حقوقی دعوت به همکاری می‌نماید
                            </p>
                            <br>
                            <strong>شرایط عمومی استخدام:</strong>
                            <ul class="generic-list-item pt-3">
                                <li><i class="la la-check-circle mr-2 text-success"></i>تخصص و تجربه: داشتن مدرک کارشناسی، کارشناسی ارشد یا دکترای حقوق و سابقه کار مرتبط در زمینه‌های مختلف حقوقی </li>
                                <li><i class="la la-check-circle mr-2 text-success"></i>مهارت‌های ارتباطی: توانایی برقراری ارتباط موثر با مراجعین، سایر وکلا و همکاران </li>
                                <li><i class="la la-check-circle mr-2 text-success"></i>مهارت‌های حل مسئله: توانایی تجزیه و تحلیل مسائل حقوقی و ارائه راهکارهای مناسب </li>
                                <li><i class="la la-check-circle mr-2 text-success"></i>تعهد و صداقت: پایبندی به اصول و اخلاق حرفه‌ای و تعهد به ارائه خدمات حقوقی با کیفیت </li>
                                <li><i class="la la-check-circle mr-2 text-success"></i>انضباط و نظم: توانایی مدیریت زمان و انجام وظایف محوله در چارچوب زمان‌بندی تعیین شده </li>
                            </ul>
                            <strong>شرایط اختصاصی استخدام:</strong>
                            <ul class="generic-list-item pt-3">
                                <li><i class="la la-check-circle mr-2 text-success"></i>تسلط به قوانین و مقررات حقوقی مرتبط با زمینه تخصصی مورد نظر </li>
                                <li><i class="la la-check-circle mr-2 text-success"></i>توانایی نگارش متون حقوقی اعم از لایحه، دفاعیات حقوقی قوی و ... </li>
                                <li><i class="la la-check-circle mr-2 text-success"></i>توانایی انجام تحقیقات حقوقی </li>
                                <li><i class="la la-check-circle mr-2 text-success"></i>آشنایی با نرم‌افزارهای حقوقی </li>
                            </ul>
                            <strong>مزایای استخدام:</strong>
                            <ul class="generic-list-item pt-3">
                                <li><i class="la la-check-circle mr-2 text-success"></i>محیط کاری پویا و چالش‌برانگیز </li>
                                <li><i class="la la-check-circle mr-2 text-success"></i>فرصت‌های رشد و پیشرفت </li>
                                <li><i class="la la-check-circle mr-2 text-success"></i>حقوق و مزایای مناسب </li>
                                <li><i class="la la-check-circle mr-2 text-success"></i>همکاری با تیمی مجرب و متخصص </li>
                                <li><i class="la la-check-circle mr-2 text-success"></i>ارتباط با طیف وسیعی از مراجعین </li>
                                <li><i class="la la-check-circle mr-2 text-success"></i>پشتیبانی و آموزش‌های مستمر </li>
                            </ul>

                        </div>
                        <div class="btn-box pt-35px">
                            <a href="#" class="btn theme-btn">به تیم ما بپیوندید <i class="la la-arrow-left icon ml-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="generic-img-box generic-img-box-layout-3">
                        <img src="{{asset('site/images/img-loading.png')}}" data-src="{{asset('site/images/img16.jpg')}}" alt="درباره تصویر" class="img__item lazy img__item-1" />
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
