@extends('master')

@section('title', 'جزئیات سفارش')

@section('main')
    <div class="container py-4">
        <div class="detail-card">
            <div class="detail-header">جزئیات سفارش شماره #123456</div>

            <div class="detail-row"><strong>تاریخ ثبت سفارش:</strong> 1403/03/10 - 16:30</div>
            <div class="detail-row"><strong>وضعیت:</strong>
                <span class="badge bg-success order-status p-2">پرداخت شده</span>
            </div>
            <div class="detail-row"><strong>روش پرداخت:</strong> زرین‌پال</div>
            <div class="detail-row"><strong>مبلغ کل:</strong> ۵۸۰٬۰۰۰ تومان</div>

            <hr>

            <div class="detail-header">🛍 محصولات سفارش‌داده‌شده</div>

            {{-- محصول ۱ --}}
            <div class="product-row d-flex justify-content-between align-items-center flex-wrap">
                <div><strong>نام محصول:</strong> دوره آموزش لاراول</div>
                <div><strong>قیمت:</strong> ۳۰۰٬۰۰۰ تومان</div>
                <div><strong>تعداد:</strong> ۱</div>
            </div>

            {{-- محصول ۲ --}}
            <div class="product-row d-flex justify-content-between align-items-center flex-wrap">
                <div><strong>نام محصول:</strong> دوره فلاتر پیشرفته</div>
                <div><strong>قیمت:</strong> ۲۸۰٬۰۰۰ تومان</div>
                <div><strong>تعداد:</strong> ۱</div>
            </div>

            <div class="detail-row mt-5"><strong>یادداشت سفارش:</strong> لطفاً لینک‌ها را به ایمیل من ارسال کنید.</div>
        </div>
    </div>
@endsection
