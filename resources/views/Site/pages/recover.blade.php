@extends('master')
@section('main')
        <section class="breadcrumb-area section-padding img-bg-2">
            <div class="overlay"></div>
            <div class="container">
                <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between">
                    <div class="section-heading">
                        <h2 class="section__title text-white">بازیابی رمز عبور</h2>
                    </div>
                    <ul class="generic-list-item generic-list-item-white generic-list-item-arrow d-flex flex-wrap align-items-center">
                        <li><a href="index.html">صفحه اصلی</a></li>
                        <li>صفحات</li>
                        <li>بازیابی رمز عبور</li>
                    </ul>
                </div>
                <!-- end breadcrumb-content -->
            </div>
            <!-- end container -->
        </section>

        <section class="contact-area section--padding position-relative">
            <span class="ring-shape ring-shape-1"></span>
            <span class="ring-shape ring-shape-2"></span>
            <span class="ring-shape ring-shape-3"></span>
            <span class="ring-shape ring-shape-4"></span>
            <span class="ring-shape ring-shape-5"></span>
            <span class="ring-shape ring-shape-6"></span>
            <span class="ring-shape ring-shape-7"></span>
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 mx-auto">
                        <div class="card card-item">
                            <div class="card-body">
                                <h3 class="card-title fs-24 lh-35 pb-2">بازنشانی رمز عبور!</h3>
                                <p class="fs-15 lh-24 pb-3">
                                    ایمیل اکانت خود را برای بازنشانی رمز عبور وارد کنید. سپس پیوندی به ایمیل برای بازنشانی رمز عبور دریافت خواهید کرد. اگر مشکلی در مورد بازنشانی رمز عبور دارید
                                    <a href="contact.html" class="text-color hover-underline">با ما تماس بگیرید</a>
                                </p>
                                <div class="section-block"></div>
                                <form method="post" class="pt-4">
                                    <div class="input-box">
                                        <label class="label-text">آدرس ایمیل</label>
                                        <div class="form-group">
                                            <input class="form-control form--control" type="text" name="name" placeholder="آدرس ایمیل را وارد کن" />
                                            <span class="la la-user input-icon"></span>
                                        </div>
                                    </div>
                                    <!-- end input-box -->
                                    <div class="btn-box">
                                        <button class="btn theme-btn" type="submit">بازنشانی رمز عبور <i class="la la-arrow-left icon ml-1"></i></button>
                                        <div class="d-flex align-items-center justify-content-between fs-14 pt-2">
                                            <a href="login.html" class="text-color hover-underline">وارد شدن</a>
                                            <p>عضو نیستید؟ <a href="sign-up.html" class="text-color hover-underline">ثبت نام</a></p>
                                        </div>
                                    </div>
                                    <!-- end btn-box -->
                                </form>
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col-lg-7 -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
@endsection
