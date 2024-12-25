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

                        <!-- مبلغ دوره -->
                        <div class="col-lg-6">
                            <div class="card py-3 my-2 border-1 br-8">
                                <div class="container d-flex flex-row justify-content-center">
                                    <p class="mobile-font">مبلغ هزینه دوره</p>
                                    <hr class="solid flex-grow-1 mx-3 mobile-font">
                                    <p class="mb-0 mobile-font" id="final-price">
                                        @if($certificate == 1)
                                            @if($workshops->offer)
                                                {{ number_format((int)$workshops->offer + (int)$workshops->certificate_price) }} تومان
                                            @else
                                                {{ number_format((int)$workshops->price + (int)$workshops->certificate_price) }} تومان
                                            @endif
                                        @else
                                            @if($workshops->offer)
                                                {{ number_format((int)$workshops->offer) }} تومان
                                            @else
                                                {{ number_format((int)$workshops->price) }} تومان
                                            @endif
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- نوع استفاده -->
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
                        <!-- تاریخ دوره -->
                        <div class="col-lg-6">
                            <div class="card py-3 my-2 border-1 br-8">
                                <div class="container d-flex flex-row justify-content-center">
                                    <p class="mobile-font">تاریخ دوره</p>
                                    <hr class="dashed flex-grow-1 mx-3 mobile-font">
                                    <p class="mb-0 mobile-font">{{ $workshops->date }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card py-3 my-2 border-1 br-8">
                                <div class="container d-flex flex-row justify-content-center">
                                    <p class="mobile-font">گواهی دوره</p>
                                    <hr class="dashed flex-grow-1 mx-3 mobile-font">
                                    <p class="mb-0 mobile-font">{{ $certificate == 1 ? 'به همراه گواهی' : 'بدون گواهی' }}</p>
                                </div>
                            </div>
                        </div>
                        @if($certificate == 1)
                            <div class="col-lg-12">
                                <div class="card py-3 my-2 border-1 br-8">
                                    <div class="container d-flex flex-row justify-content-center">
                                        <p class="mobile-font">مبلغ گواهی دوره</p>
                                        <hr class="dashed flex-grow-1 mx-3 mobile-font">
                                        <p class="mb-0 mobile-font">{{ $workshops->certificate_price }} تومان </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

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
        document.getElementById('apply-discount').addEventListener('click', function () {
            const discountCode = document.getElementById('discount-code').value;
            const originalPrice = {{ $workshops->offer ?? $workshops->price }};

            let discountedPrice = originalPrice;
            if (discountCode === 'DISCOUNT50') {
                discountedPrice = originalPrice * 0.5;
            } else if (discountCode === 'DISCOUNT20') {
                discountedPrice = originalPrice * 0.8;
            } else if ((discountCode === 'blackfriday')) {
                Swal.fire({
                    icon: 'error',
                    title: 'ظرفیت استفاده از این کد تخفیف تمام شده است!',
                    // text: 'لطفاً یک کد معتبر وارد کنید.',
                });
                return;
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'کد تخفیف نامعتبر است',
                    text: 'لطفاً یک کد معتبر وارد کنید.',
                });
                return;
            }

            document.getElementById('final-price').innerText = discountedPrice.toLocaleString('fa-IR') + ' تومان';
            Swal.fire({
                icon: 'success',
                title: 'کد تخفیف اعمال شد',
                text: 'مبلغ نهایی به‌روزرسانی شد.',
            });
        });
    </script>
@endsection
