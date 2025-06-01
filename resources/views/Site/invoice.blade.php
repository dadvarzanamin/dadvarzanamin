@extends('master')

@section('title', 'پیش‌فاکتور سفارش')

@section('main')
    <div class="container py-4">
        <div class="invoice-card">
            <div class="invoice-header text-center">پیش‌فاکتور سفارش #123459</div>

            <div class="invoice-row"><strong>تاریخ:</strong> 1403/03/12 - 10:45</div>


            <hr>

            <div> محصولات</div>

            {{-- محصول ۱ --}}
            <div class="product-row d-flex justify-content-between flex-wrap">
                <div>دوره آموزش حقوقی</div>
                <div>قیمت: ۲۵۰٬۰۰۰ تومان × ۱</div>
            </div>

            {{-- محصول ۲ --}}
            <div class="product-row d-flex justify-content-between flex-wrap">
                <div>دوره پیشرفته قراردادنویسی</div>
                <div>قیمت: ۳۵۰٬۰۰۰ تومان × ۱</div>
            </div>

            <div class="total-row text-end">
                مبلغ کل: ۶۰۰٬۰۰۰ تومان
            </div>

            <hr>

            <div class="invoice-row">
                <strong>موجودی کیف پول شما:</strong> <span id="walletBalance">۲۰۰٬۰۰۰</span> تومان
            </div>

            <div class="form-check mt-2">
                <input class="form-check-input" type="checkbox" id="useWallet">
                <label class="form-check-label" for="useWallet">
                    استفاده از موجودی کیف پول برای پرداخت
                </label>
            </div>

            <div class="invoice-row mt-3">
                <strong>مبلغ قابل پرداخت از طریق درگاه:</strong>
                <span id="finalAmount">۶۰۰٬۰۰۰</span> تومان
            </div>

            <div class="text-center btn-pay">
                <a href="{{ url('/pay/123459') }}" class="btn btn-success btn-lg">
                    تایید و رفتن به درگاه پرداخت
                </a>
            </div>
        </div>
    </div>
@endsection
