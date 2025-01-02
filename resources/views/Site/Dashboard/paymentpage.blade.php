@extends('admin')
@section('style')
    <title>پرداخت هزینه کارگاه یا دوره آموزشی</title>
@endsection
@section('main')
    @include('sweetalert::alert')

    <style>
        @media (max-width: 600px) {
            .mobile-font {
                font-size: 11px;
            }
        }
    </style>
    <div class="dashboard-heading mb-5">
        <h3 class="fs-22 font-weight-semi-bold text-center">پرداخت هزینه کارگاه یا دوره آموزشی</h3>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card card-custom p-4 br-16">
                <form method="get" action="{{ route('pay') }}">
                    @csrf
                    <input type="hidden" name="workshopid" value="{{ $workshops->id }}">

                    <div class="row">
                        <!-- نام دوره -->
                        <div class="col-lg-6">
                            <div class="card py-3 my-2 border-1 br-8">
                                <div class="container d-flex flex-row justify-content-center">
                                    <p class="mobile-font">نام دوره</p>
                                    <hr class="solid flex-grow-1 mx-3">
                                    <p class="mb-0 mobile-font">{{ $workshops->title }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card py-3 my-2 border-1 br-8">
                                <div class="container d-flex flex-row justify-content-center">
                                    <p class="mobile-font">مبلغ هزینه دوره</p>
                                    <hr class="solid flex-grow-1 mx-3 mobile-font">
                                    <p class="mb-0 mobile-font" id="">
                                        @if($workshops->offer)
                                            {{ number_format((int)$workshops->offer) }} تومان
                                        @else
                                            {{ number_format((int)$workshops->price) }} تومان
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card py-3 my-2 border-1 br-8">
                                <div class="container d-flex flex-row justify-content-center">
                                    <p class="mobile-font">نوع استفاده</p>
                                    <hr class="dashed flex-grow-1 mx-3 mobile-font">
                                    <p class="mb-0 mobile-font">
                                        {{ $typeuse == 1 ? 'حضوری' : 'آنلاین' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card py-3 my-2 border-1 br-8">
                                <div class="container d-flex flex-row justify-content-center">
                                    <p class="mobile-font">مبلغ گواهی دوره</p>
                                    <hr class="solid flex-grow-1 mx-3 mobile-font">
                                    <p class="mb-0 mobile-font">
                                        @if($certificate == 1)
                                            {{(int)$workshops->certificate_price }}
                                            تومان
                                        @else
                                            رایگان
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card py-3 my-2 border-1 br-8">
                                <div class="container d-flex flex-row justify-content-center">
                                    <p class="mobile-font">تاریخ دوره</p>
                                    <hr class="dashed flex-grow-1 mx-3 mobile-font">
                                    <p class="mb-0 mobile-font">{{ $workshops->date }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card py-3 my-2 border-1 br-8">
                                <div class="container d-flex flex-row justify-content-center">
                                    <p class="mobile-font">تخفیف دوره</p>
                                    <hr class="dashed flex-grow-1 mx-3 mobile-font">
                                    <p class="mb-0 mobile-font"
                                       id="discount-amount">
                                        صفر
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card py-3 my-2 border-1 br-8">
                                <div class="container d-flex flex-row justify-content-center">
                                    <p class="mobile-font">گواهی دوره</p>
                                    <hr class="dashed flex-grow-1 mx-3 mobile-font">
                                    <p class="mb-0 mobile-font">{{ $certificate == 1 ? 'به همراه گواهی' : 'بدون گواهی' }}</p>
                                </div>
                            </div>
                        </div>
                        <div></div>
                        <div class="col-lg-6">
                            <div class="card py-3 my-2 border-1 br-8">
                                <div class="container d-flex flex-row justify-content-center">
                                    <p class="mobile-font">مبلغ نهایی دوره</p>
                                    <hr class="dashed flex-grow-1 mx-3 mobile-font">
                                    <p class="mb-0 mobile-font" id="final-price">
                                        @if($certificate == 1)
                                            @if($workshops->offer)
                                                {{$finalprice = number_format((int)$workshops->offer + (int)$workshops->certificate_price) }}تومان
                                            @else
                                                {{$finalprice = number_format((int)$workshops->price + (int)$workshops->certificate_price) }}تومان
                                            @endif
                                        @else
                                            @if($workshops->offer)
                                                {{$finalprice = number_format((int)$workshops->offer) }} تومان
                                            @else
                                                {{$finalprice = number_format((int)$workshops->price) }} تومان
                                            @endif
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="finalprice" value="{{str_replace(',', '',$finalprice)}}" id="final-price-input">
                    <div class="row my-4">
                        <div class="col-lg-12">
                            <p class="text-center">کد تخفیف</p>
                            <div class="input-group">
                                <input type="text" class="form-control" name="discount_code" id="discount-code"
                                       placeholder="کد تخفیف خود را وارد کنید">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-success" id="apply-discount">اعمال
                                    </button>
                                </div>
                            </div>
                            <p id="discount-loader" style="display: none;" class="text-center my-3">در حال بررسی...</p>
                            <p id="discount-result" class="text-center my-3"></p>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn theme-btn">تایید و پرداخت</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'خطا',
                html: '<ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
            });
        </script>
    @endif
    <script>
        jQuery(document).ready(function () {
            jQuery('#apply-discount').click(function (e) {
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                let _token = jQuery('input[name="_token"]').val();
                let discountcode = jQuery('#discount-code').val();
                let workshopid = {{ $workshops->id }};

                let formData = new FormData();
                formData.append('discountcode', discountcode);
                formData.append('workshopid', workshopid);
                formData.append('_token', _token);

                jQuery.ajax({
                    url: "{{route('discountcheck')}}",
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if (response.ok) {
                            // مقادیر برگشتی از سرور
                            let discount = parseInt(response.response.discount || 0);
                            let percentage = parseInt(response.response.percentage || 0);

                            // قیمت فعلی
                            let currentPrice = parseInt($('#final-price').text().replace(/[, تومان]/g, ''));

                            // محاسبه مبلغ نهایی بر اساس نوع تخفیف
                            let finalPrice;
                            if (percentage > 0) {
                                // تخفیف درصدی
                                finalPrice = Math.round(currentPrice * (1 - (percentage / 100)));
                                $('#discount-amount').text(`${percentage}%`);
                            } else {
                                // تخفیف مبلغی
                                finalPrice = currentPrice - discount;
                                $('#discount-amount').text(new Intl.NumberFormat('fa-IR').format(discount) + ' تومان');
                            }

                            // آپدیت قیمت نهایی
                            $('#final-price').text(new Intl.NumberFormat('fa-IR').format(finalPrice) + ' تومان');
                            $('#final-price-input').val(finalPrice);
                        } else {
                            // در صورتی که کد تخفیف معتبر نباشد
                            $('#discount-amount').text("۰ تومان");
                            alert("کد تخفیف معتبر نیست!");
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("Error occurred: ", error);
                        alert("خطایی در ارسال درخواست به وجود آمد.");
                    }
                });
            });
        });
    </script>
@endsection
