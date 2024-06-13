@extends('master')
@section('main')

    <section class="breadcrumb-area section-padding img-bg-2">
        <div class="overlay"></div>
        <div class="container">
            <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between">
                <div class="section-heading">
                    <h2 class="section__title text-white">گالری</h2>
                </div>
                <ul class="generic-list-item generic-list-item-white generic-list-item-arrow d-flex flex-wrap align-items-center">
                    <li><a href="index.html">صفحه اصلی</a></li>
                    <li>صفحات</li>
                    <li>گالری</li>
                </ul>
            </div>
            <!-- end breadcrumb-content -->
        </div>
        <!-- end container -->
    </section>

    <section class="gallery-area section--padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading text-center">
                        <h2 class="section__title">پروژه های غرور آفرینی که ما را متمایز می کند</h2>
                    </div>
                    <!-- end section-heading -->
                    <ul class="portfolio-filter pt-40px pb-40px">
                        <li data-filter="*" class="active">همه</li>
                        <li data-filter=".web-design">طراحی وب سایت</li>
                        <li data-filter=".photography">عکاسی</li>
                        <li data-filter=".management">مدیریت</li>
                        <li data-filter=".advertising">تبلیغات</li>
                    </ul>
                </div>
                <!-- end col-lg-12 -->
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="generic-portfolio-list row">
                        <div class="generic-portfolio-item col-lg-4 all">
                            <div class="generic-portfolio-content">
                                <a class="portfolio-link" href="images/img22.jpg" data-fancybox="gallery" data-caption="Image 1">
                                    <img src="images/img22.jpg" alt="نمونه کارها-تصویر" />
                                    <div class="icon-element icon-element-md">
                                        <i class="la la-plus"></i>
                                    </div>
                                </a>
                            </div>
                            <!-- end generic-portfolio-content -->
                        </div>
                        <!-- end generic-portfolio-item -->
                        <div class="generic-portfolio-item col-lg-4 web-design photography">
                            <div class="generic-portfolio-content">
                                <a class="portfolio-link" href="images/img22.jpg" data-fancybox="gallery" data-caption="Image 2">
                                    <img src="images/img22.jpg" alt="نمونه کارها-تصویر" />
                                    <div class="icon-element icon-element-md">
                                        <i class="la la-plus"></i>
                                    </div>
                                </a>
                            </div>
                            <!-- end generic-portfolio-content -->
                        </div>
                        <!-- end generic-portfolio-item -->
                        <div class="generic-portfolio-item col-lg-4 photography advertising">
                            <div class="generic-portfolio-content">
                                <a class="portfolio-link" href="images/img22.jpg" data-fancybox="gallery" data-caption="Image 3">
                                    <img src="images/img22.jpg" alt="نمونه کارها-تصویر" />
                                    <div class="icon-element icon-element-md">
                                        <i class="la la-plus"></i>
                                    </div>
                                </a>
                            </div>
                            <!-- end generic-portfolio-content -->
                        </div>
                        <!-- end generic-portfolio-item -->
                        <div class="generic-portfolio-item col-lg-4 development web-design">
                            <div class="generic-portfolio-content">
                                <a class="portfolio-link" href="images/img22.jpg" data-fancybox="gallery" data-caption="Image 4">
                                    <img src="images/img22.jpg" alt="نمونه کارها-تصویر" />
                                    <div class="icon-element icon-element-md">
                                        <i class="la la-plus"></i>
                                    </div>
                                </a>
                            </div>
                            <!-- end generic-portfolio-content -->
                        </div>
                        <!-- end generic-portfolio-item -->
                        <div class="generic-portfolio-item col-lg-4 advertising web-design">
                            <div class="generic-portfolio-content">
                                <a class="portfolio-link" href="images/img22.jpg" data-fancybox="gallery" data-caption="Image 5">
                                    <img src="images/img22.jpg" alt="نمونه کارها-تصویر" />
                                    <div class="icon-element icon-element-md">
                                        <i class="la la-plus"></i>
                                    </div>
                                </a>
                            </div>
                            <!-- end generic-portfolio-content -->
                        </div>
                        <!-- end generic-portfolio-item -->
                        <div class="generic-portfolio-item col-lg-4 photography management">
                            <div class="generic-portfolio-content">
                                <a class="portfolio-link" href="images/img22.jpg" data-fancybox="gallery" data-caption="Image 6">
                                    <img src="images/img22.jpg" alt="نمونه کارها-تصویر" />
                                    <div class="icon-element icon-element-md">
                                        <i class="la la-plus"></i>
                                    </div>
                                </a>
                            </div>
                            <!-- end generic-portfolio-content -->
                        </div>
                        <!-- end generic-portfolio-item -->
                        <div class="generic-portfolio-item col-lg-4 development web-design">
                            <div class="generic-portfolio-content">
                                <a class="portfolio-link" href="images/img22.jpg" data-fancybox="gallery" data-caption="Image 7">
                                    <img src="images/img22.jpg" alt="نمونه کارها-تصویر" />
                                    <div class="icon-element icon-element-md">
                                        <i class="la la-plus"></i>
                                    </div>
                                </a>
                            </div>
                            <!-- end generic-portfolio-content -->
                        </div>
                        <!-- end generic-portfolio-item -->
                        <div class="generic-portfolio-item col-lg-4 management photography advertising">
                            <div class="generic-portfolio-content">
                                <a class="portfolio-link" href="images/img22.jpg" data-fancybox="gallery" data-caption="Image 8">
                                    <img src="images/img22.jpg" alt="نمونه کارها-تصویر" />
                                    <div class="icon-element icon-element-md">
                                        <i class="la la-plus"></i>
                                    </div>
                                </a>
                            </div>
                            <!-- end generic-portfolio-content -->
                        </div>
                        <!-- end generic-portfolio-item -->
                        <div class="generic-portfolio-item col-lg-4 photography web-design">
                            <div class="generic-portfolio-content">
                                <a class="portfolio-link" href="images/img22.jpg" data-fancybox="gallery" data-caption="Image 9">
                                    <img src="images/img22.jpg" alt="نمونه کارها-تصویر" />
                                    <div class="icon-element icon-element-md">
                                        <i class="la la-plus"></i>
                                    </div>
                                </a>
                            </div>
                            <!-- end generic-portfolio-content -->
                        </div>
                        <!-- end generic-portfolio-item -->
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
