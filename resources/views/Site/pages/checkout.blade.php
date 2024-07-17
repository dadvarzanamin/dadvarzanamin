@extends('master')
@section('main')
        <section class="breadcrumb-area section-padding img-bg-2">
            <div class="overlay"></div>
            <div class="container">
                <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between">
                    <div class="section-heading">
                        <h2 class="section__title text-white">پرداخت</h2>
                    </div>
                    <ul class="generic-list-item generic-list-item-white generic-list-item-arrow d-flex flex-wrap align-items-center">
                        <li><a href="index.html">صفحه اصلی</a></li>
                        <li>صفحات</li>
                        <li>پرداخت</li>
                    </ul>
                </div>

            </div>

        </section>

        <section class="cart-area section--padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="card card-item">
                            <div class="card-body">
                                <h3 class="card-title fs-22 pb-3">جزئیات صورتحساب</h3>
                                <div class="divider"><span></span></div>
                                <form method="post" class="row">
                                    <div class="input-box col-lg-6">
                                        <label class="label-text">نام </label>
                                        <div class="form-group">
                                            <input class="form-control form--control" type="text" name="name" placeholder="محمد حسین" />
                                            <span class="la la-user input-icon"></span>
                                        </div>
                                    </div>

                                    <div class="input-box col-lg-6">
                                        <label class="label-text">نام خانوادگی</label>
                                        <div class="form-group">
                                            <input class="form-control form--control" type="email" name="email" placeholder="دیوان بیگی" />
                                            <span class="la la-user input-icon"></span>
                                        </div>
                                    </div>

                                    <div class="input-box col-lg-12">
                                        <label class="label-text">آدرس ایمیل</label>
                                        <div class="form-group">
                                            <input class="form-control form--control" type="email" name="email" placeholder="به عنوان مثال info@gmail.com" />
                                            <span class="la la-envelope input-icon"></span>
                                        </div>
                                    </div>

                                    <div class="input-box col-lg-12">
                                        <label class="label-text">شماره تلفن</label>
                                        <div class="form-group">
                                            <input id="phone" class="form-control form--control" type="tel" name="phone" />
                                        </div>
                                    </div>

                                    <div class="input-box col-lg-12">
                                        <label class="label-text">نشانی</label>
                                        <div class="form-group">
                                            <input class="form-control form--control" type="text" name="text" placeholder="تهران خیابان اول کوچه دوم پلاک سوم" />
                                            <span class="la la-map-marker input-icon"></span>
                                        </div>
                                    </div>

                                    <div class="btn-box col-lg-12">
                                        <div class="custom-control custom-checkbox mb-4 fs-15">
                                            <input type="checkbox" class="custom-control-input" id="agreeCheckbox" required="" />
                                            <label class="custom-control-label custom--control-label" for="agreeCheckbox">
                                                من با <a href="terms-and-conditions.html" class="text-color hover-underline">شرایط و ضوابط</a> و
                                                <a href="privacy-policy.html" class="text-color hover-underline">سیاست حفظ حریم خصوصی</a> موافقم
                                                <a href="privacy-policy.html" class="text-color hover-underline"></a>
                                            </label>
                                        </div>

                                        <p class="pb-1 text-black-50"><i class="la la-lock fs-24 mr-1"></i>ارتباط امن</p>
                                        <p class="fs-14">اطلاعات شما نزد ما محفوظ می ماند!</p>
                                    </div>

                                </form>
                            </div>

                        </div>

                        <div class="card card-item">
                            <div class="card-body">
                                <h3 class="card-title fs-22 pb-3">روش پرداخت را انتخاب کنید</h3>
                                <div class="divider"><span></span></div>
                                <div class="payment-option-wrap">
                                    <div class="payment-tab is-active">
                                        <div class="payment-tab-toggle">
                                            <input checked="" id="bankTransfer" name="radio" type="radio" value="bankTransfer" />
                                            <label for="bankTransfer">انتقال مستقیم بانکی</label>
                                        </div>
                                        <div class="payment-tab-content">
                                            <p class="fs-15 lh-24">
                                                پرداخت خود را مستقیماً به حساب بانکی ما انجام دهید. لطفا از شناسه سفارش خود به عنوان مرجع پرداخت استفاده کنید. سفارش شما تا زمانی که وجوه در حساب ما تسویه نشود ارسال نخواهد شد.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="payment-tab">
                                        <div class="payment-tab-toggle">
                                            <input id="paypal" name="radio" type="radio" value="paypal" />
                                            <label for="paypal">پی پال</label>
                                            <img class="payment-logo" src="images/paypal.png" alt="" />
                                        </div>
                                        <div class="payment-tab-content">
                                            <p class="fs-15 lh-24">به منظور تکمیل تراکنش شما، شما را به سرورهای امن پی پال منتقل می کنیم.</p>
                                        </div>
                                    </div>

                                    <div class="payment-tab">
                                        <div class="payment-tab-toggle">
                                            <input type="radio" name="radio" id="creditCart" value="creditCard" />
                                            <label for="creditCart">کارت اعتباری / بدهی</label>
                                            <img class="payment-logo" src="images/payment-img.png" alt="" />
                                        </div>
                                        <div class="payment-tab-content">
                                            <form action="#" class="row">
                                                <div class="input-box col-lg-6">
                                                    <label class="label-text">نام روی کارت</label>
                                                    <div class="form-group">
                                                        <input class="form-control form--control pl-3" type="text" name="text" placeholder="نام کارت" />
                                                    </div>
                                                </div>
                                                <div class="input-box col-lg-6">
                                                    <label class="label-text">شماره کارت</label>
                                                    <div class="form-group">
                                                        <input class="form-control form--control pl-3" type="text" name="text" placeholder="1234 5678 9876 5432" />
                                                    </div>
                                                </div>
                                                <div class="input-box col-lg-4">
                                                    <label class="label-text">ماه انقضاء</label>
                                                    <div class="form-group">
                                                        <input class="form-control form--control pl-3" type="text" name="text" placeholder="MM" />
                                                    </div>
                                                </div>
                                                <div class="input-box col-lg-4">
                                                    <label class="label-text">سال انقضا</label>
                                                    <div class="form-group">
                                                        <input class="form-control form--control pl-3" type="text" name="text" placeholder="YY" />
                                                    </div>
                                                </div>
                                                <div class="input-box col-lg-4">
                                                    <label class="label-text">CVV</label>
                                                    <div class="form-group">
                                                        <input class="form-control form--control pl-3" type="text" name="text" placeholder="cvv" />
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-5">
                        <div class="card card-item">
                            <div class="card-body">
                                <h3 class="card-title fs-22 pb-3">جزئیات سفارش</h3>
                                <div class="divider"><span></span></div>
                                <div class="order-details-lists">
                                    <div class="media media-card border-bottom border-bottom-gray pb-3 mb-3">
                                        <a href="course-details.html" class="media-img">
                                            <img src="images/small-img.jpg" alt="تصویر سبد خرید" />
                                        </a>
                                        <div class="media-body">
                                            <h5 class="fs-15 pb-2"><a href="course-details.html">دوره جامع خانواده</a></h5>
                                            <p class="text-black font-weight-semi-bold lh-18">999  تومان <span class="before-price fs-14">1000 تومان</span></p>
                                        </div>
                                    </div>

                                    <div class="media media-card border-bottom border-bottom-gray pb-3 mb-3">
                                        <a href="course-details.html" class="media-img">
                                            <img src="images/small-img.jpg" alt="تصویر سبد خرید" />
                                        </a>
                                        <div class="media-body">
                                            <h5 class="fs-15 pb-2"><a href="course-details.html">دوره جامع خانواده</a></h5>
                                            <p class="text-black font-weight-semi-bold lh-18">999  تومان <span class="before-price fs-14">1000 تومان</span></p>
                                        </div>
                                    </div>

                                </div>

                                <a href="course-grid.html" class="btn-text"><i class="la la-edit mr-1"></i>ویرایش کنید</a>
                            </div>

                        </div>

                        <div class="card card-item">
                            <div class="card-body">
                                <h3 class="card-title fs-22 pb-3">خلاصه سفارش</h3>
                                <div class="divider"><span></span></div>
                                <ul class="generic-list-item generic-list-item-flash fs-15">
                                    <li class="d-flex align-items-center justify-content-between font-weight-semi-bold">
                                        <span class="text-black">قیمت اصلی: </span>
                                        <span>100.000 تومان</span>
                                    </li>
                                    <li class="d-flex align-items-center justify-content-between font-weight-semi-bold">
                                        <span class="text-black">تخفیف کوپن: </span>
                                        <span>10.000 تومان</span>
                                    </li>
                                    <li class="d-flex align-items-center justify-content-between font-weight-bold">
                                        <span class="text-black">مجموع: </span>
                                        <span>90.000 تومان</span>
                                    </li>
                                </ul>
                                <div class="btn-box border-top border-top-gray pt-3">
                                    <p class="fs-14 lh-22 mb-2">ما طبق قانون موظف است برای خریدهایی که در حوزه های قضایی خاص مالیاتی انجام می شود، مالیات تراکنش های قابل اعمال را جمع آوری کند.</p>
                                    <p class="fs-14 lh-22 mb-3">با تکمیل خرید خود، با این <a href="#" class="text-color hover-underline">شرایط خدمات</a> موافقت می کنید <a href="#" class="text-color hover-underline">.</a></p>
                                    <a href="checkout.html" class="btn theme-btn w-100">ادامه دهید <i class="la la-arrow-left icon ml-1"></i></a>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>
@endsection
