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
                    <input type="hidden" name="workshopid" value="{{ $invoices->id }}">

                    <div class="row">
                        <!-- نام دوره -->
                        <div class="col-lg-6">
                            <div class="card py-3 my-2 border-1 br-8">
                                <div class="container d-flex flex-row justify-content-center">
                                    <p class="mobile-font">نام دوره</p>
                                    <hr class="solid flex-grow-1 mx-3">
                                    <p class="mb-0 mobile-font">{{ $invoices->title }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card py-3 my-2 border-1 br-8">
                                <div class="container d-flex flex-row justify-content-center">
                                    <p class="mobile-font">مبلغ هزینه دوره</p>
                                    <hr class="solid flex-grow-1 mx-3 mobile-font">
                                    <p class="mb-0 mobile-font" id="">
                                            {{ number_format((int)$invoices->price) }} تومان
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
                                        {{ $invoices->type_use == 1 ? 'حضوری' : 'آنلاین' }}
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
                                        @if($invoices->certificate == 1)
                                            {{(int)$invoices->certificate_price }}
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
                                    <p class="mb-0 mobile-font">{{ $invoices->date }}</p>
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
                                    <p class="mb-0 mobile-font">{{ $invoices->certificate == 1 ? 'به همراه گواهی' : 'بدون گواهی' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card py-3 my-2 border-1 br-8">
                                <div class="container d-flex flex-row justify-content-center">
                                    <p class="mobile-font">مبلغ نهایی دوره</p>
                                    <hr class="dashed flex-grow-1 mx-3 mobile-font">
                                    <p class="mb-0 mobile-font" id="final-price">
                                        @if($invoices->certificate == 1)
                                            @if($invoices->offer)
                                                {{$finalprice = number_format((int)$invoices->offer + (int)$invoices->certificate_price) }}تومان
                                            @else
                                                {{$finalprice = number_format((int)$invoices->price + (int)$invoices->certificate_price) }}تومان
                                            @endif
                                        @else
                                            @if($invoices->offer)
                                                {{$finalprice = number_format((int)$invoices->offer) }} تومان
                                            @else
                                                {{$finalprice = number_format((int)$invoices->price) }} تومان
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
                        <div class="text-center mt-4 btn-pay-container">
                            <button type="button" id="btn-wallet-pay" class="btn btn-success btn-lg px-4" style="display:none;">
                                پرداخت با کیف پول
                            </button>

                            <button type="button" id="btn-bank-pay" class="btn btn-primary btn-lg px-4" style="display:none;">
                                پرداخت از طریق درگاه بانکی
                            </button>

                            <a href="{{ route('profilewallet') }}" class="btn btn-warning btn-lg px-4" id="btn-wallet-charge" style="display:none;">
                                شارژ کیف پول
                            </a>

                            <a href="{{route('order')}}" id="btn-order" class="btn btn-success btn-lg px-4" style="display: none;">
                                نمایش سفارشات
                            </a>
                        </div>
{{--                    <div class="text-center mt-4 btn-pay-container">--}}
{{--                        @if(auth()->user()->wallet->balance < $invoices->price)--}}
{{--                            <a href="{{ route('profilewallet') }}" class="btn btn-warning btn-lg px-4" id="btn-wallet-charge">شارژ کیف پول</a>--}}
{{--                        @else--}}
{{--                            <button type="button" id="btn-pay" class="btn btn-success btn-lg px-4">پرداخت</button>--}}
{{--                        @endif--}}
{{--                        <a href="{{route('order')}}" id="btn-order" class="btn btn-success btn-lg px-4" style="display: none;">--}}
{{--                            نمایش سفارشات--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    <div class="text-center">--}}
{{--                        <button type="submit" class="btn theme-btn">تایید و پرداخت</button>--}}
{{--                    </div>--}}
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="confirmPayModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 rounded-4">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">تأیید پرداخت</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <p>آیا مطمئن هستید که می‌خواهید پرداخت را انجام دهید؟</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">لغو</button>
                    <button type="button" class="btn btn-success" id="confirmPayBtn">پرداخت</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="paymentStatusModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 rounded-4">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">وضعیت پرداخت</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <p id="paymentStatusText" class="mb-0"></p>
                </div>
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
        const userWallet = {{ auth()->user()->wallet->balance }};
        const workshopPrice = {{ $invoices->price }};
    </script>
    <script>
        jQuery(document).ready(function () {

            let initialPrice = workshopPrice;
            if (userWallet >= initialPrice) {
                $('#btn-wallet-pay').show();
            } else {
                $('#btn-bank-pay').show();
            }

            jQuery('#apply-discount').click(function (e) {
                e.preventDefault();
                jQuery(this).prop('disabled', true);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                let _token = jQuery('input[name="_token"]').val();
                let discountcode = jQuery('#discount-code').val();
                let workshopid = {{ $invoices->id }};

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
                            let discount = parseInt(response.response.discount || 0);
                            let percentage = parseInt(response.response.percentage || 0);

                            let currentPrice = parseInt($('#final-price').text().replace(/[, تومان]/g, ''));
                            let finalPrice;

                            if (percentage > 0) {
                                finalPrice = Math.round(currentPrice * (1 - (percentage / 100)));
                                $('#discount-amount').text(`${percentage}%`);
                            } else {
                                finalPrice = currentPrice - discount;
                                $('#discount-amount').text(new Intl.NumberFormat('fa-IR').format(discount) + ' تومان');
                            }

                            $('#final-price').text(new Intl.NumberFormat('fa-IR').format(finalPrice) + ' تومان');
                            $('#final-price-input').val(finalPrice);

                            if (userWallet >= finalPrice) {
                                $('#btn-wallet-pay').show();
                                $('#btn-bank-pay').hide();
                                $('#btn-wallet-charge').hide();
                            } else {
                                $('#btn-bank-pay').show();
                                $('#btn-wallet-pay').hide();
                                $('#btn-wallet-charge').hide();
                            }

                        } else {
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

            {{--$('#btn-wallet-pay').click(function () {--}}
            {{--    window.location.href = "{{ route('profilewallet', ['id' => $invoices->id]) }}";--}}
            {{--});--}}

            $('#btn-bank-pay').click(function () {
                window.location.href = "{{ route('profilewallet', ['id' => $invoices->id]) }}";
            });

        });
    </script>
{{--    <script>--}}
{{--        jQuery(document).ready(function () {--}}
{{--            jQuery('#apply-discount').click(function (e) {--}}
{{--                e.preventDefault();--}}
{{--                jQuery(this).prop('disabled', true);--}}
{{--                $.ajaxSetup({--}}
{{--                    headers: {--}}
{{--                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')--}}
{{--                    }--}}
{{--                });--}}

{{--                let _token = jQuery('input[name="_token"]').val();--}}
{{--                let discountcode = jQuery('#discount-code').val();--}}
{{--                let workshopid = {{ $invoices->id }};--}}

{{--                let formData = new FormData();--}}
{{--                formData.append('discountcode', discountcode);--}}
{{--                formData.append('workshopid', workshopid);--}}
{{--                formData.append('_token', _token);--}}

{{--                jQuery.ajax({--}}
{{--                    url: "{{route('discountcheck')}}",--}}
{{--                    method: 'POST',--}}
{{--                    data: formData,--}}
{{--                    contentType: false,--}}
{{--                    processData: false,--}}
{{--                    success: function (response) {--}}
{{--                        if (response.ok) {--}}

{{--                            let discount = parseInt(response.response.discount || 0);--}}
{{--                            let percentage = parseInt(response.response.percentage || 0);--}}

{{--                            let currentPrice = parseInt($('#final-price').text().replace(/[, تومان]/g, ''));--}}

{{--                            let finalPrice;--}}
{{--                            if (percentage > 0) {--}}

{{--                                finalPrice = Math.round(currentPrice * (1 - (percentage / 100)));--}}
{{--                                $('#discount-amount').text(`${percentage}%`);--}}
{{--                            } else {--}}

{{--                                finalPrice = currentPrice - discount;--}}
{{--                                $('#discount-amount').text(new Intl.NumberFormat('fa-IR').format(discount) + ' تومان');--}}
{{--                            }--}}

{{--                            $('#final-price').text(new Intl.NumberFormat('fa-IR').format(finalPrice) + ' تومان');--}}
{{--                            $('#final-price-input').val(finalPrice);--}}
{{--                        } else {--}}

{{--                            $('#discount-amount').text("۰ تومان");--}}
{{--                            alert("کد تخفیف معتبر نیست!");--}}
{{--                        }--}}
{{--                    },--}}
{{--                    error: function (xhr, status, error) {--}}
{{--                        console.error("Error occurred: ", error);--}}
{{--                        alert("خطایی در ارسال درخواست به وجود آمد.");--}}
{{--                    }--}}
{{--                });--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const walletBalance    = {{ auth()->user()->wallet->balance }};
        let activeInvoiceIds   = {{$invoices->id}};
        let selectedInvoiceId  = null;
        const payModal      = new bootstrap.Modal(document.getElementById('confirmPayModal'));

        $('#btn-wallet-pay').on('click', function() {
            payModal.show();
        });

        $('#confirmPayBtn').on('click', function() {
            let latestTotalFinal = parseInt($('#final-price-input').val());

            $.ajax({
                url: "{{ route('withdraw') }}",
                type: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    totalFinal: latestTotalFinal,
                    invoice_ids: activeInvoiceIds
                },
                success: function(response) {
                    payModal.hide();

                    if (response.isSuccess) {
                        $('#invoice-list').fadeOut(300, function() { $(this).remove(); });
                        $('#walletWarning, #btn-wallet-pay, #btn-wallet-charge').hide();

                        $('#btn-go-orders').attr('href', response.redirect_url);
                        $('#post-payment-actions').fadeIn();
                        $('#btn-wallet-pay').remove();
                        $('#btn-order').fadeIn();

                        // ✅ SweetAlert برای موفقیت
                        Swal.fire({
                            icon: 'success',
                            title: 'پرداخت موفق',
                            text: response.message || 'پرداخت با موفقیت انجام شد',
                            confirmButtonText: 'باشه',
                            timer: 3000,
                            timerProgressBar: true
                        }).then(() => {
                            if (response.redirect_url) {
                                window.location.href = response.redirect_url;
                            }
                        });

                    } else {
                        // ❌ SweetAlert برای خطا
                        Swal.fire({
                            icon: 'error',
                            title: 'خطا در پرداخت',
                            text: response.message || 'در انجام پرداخت مشکلی پیش آمد',
                            confirmButtonText: 'متوجه شدم'
                        });
                    }
                },
                error: function() {
                    payModal.hide();
                    // ⚠️ خطای سرور
                    Swal.fire({
                        icon: 'error',
                        title: 'خطای سرور',
                        text: 'در انجام پرداخت خطایی رخ داده است، لطفاً مجدداً تلاش کنید.',
                        confirmButtonText: 'باشه'
                    });
                }
            });
        });
    </script>

@endsection
