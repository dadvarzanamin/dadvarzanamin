@extends('master')

@section('title', 'سفارشات من')

@section('main')
    <div class="container py-4">
        <h3 class="mb-4 text-center">سفارشات من</h3>

        {{-- سفارش اول --}}
        <a href="{{ url('/orders/123456') }}" class="order-card-link ">
            <div class="order-card ">
                <div class="d-flex justify-content-between flex-wrap">
                    <div><strong>شماره سفارش:</strong> #123456</div>
                    <div><strong>تاریخ:</strong> 1403/03/10 - 16:30</div>
                    <div><strong>وضعیت:</strong>
                        <span class="badge bg-success order-status p-2">پرداخت شده</span>
                    </div>
                </div>
                <div class="d-flex justify-content-between flex-wrap">
                    <div><strong>مبلغ کل:</strong> ۵۸۰٬۰۰۰ تومان</div>
                    <div><strong>روش پرداخت:</strong> زرین‌پال</div>
                </div>
            </div>
            <hr>
        </a>

        {{-- سفارش دوم --}}
        <a href="{{ url('/orders/123457') }}" class="order-card-link">
            <div class="order-card">
                <div class="d-flex justify-content-between flex-wrap">
                    <div><strong>شماره سفارش:</strong> #123457</div>
                    <div><strong>تاریخ:</strong> 1403/02/22 - 11:15</div>
                    <div><strong>وضعیت:</strong>
                        <span class="badge bg-warning order-status p-2">در انتظار پرداخت</span>
                    </div>
                </div>
                <div class="d-flex justify-content-between flex-wrap">
                    <div><strong>مبلغ کل:</strong> ۲۴۰٬۰۰۰ تومان</div>
                    <div><strong>روش پرداخت:</strong> نامشخص</div>
                </div>
            </div>
            <hr>
        </a>

        {{-- سفارش دوم --}}
        <a href="{{ url('/orders/123457') }}" class="order-card-link">
            <div class="order-card">
                <div class="d-flex justify-content-between flex-wrap">
                    <div><strong>شماره سفارش:</strong> #123457</div>
                    <div><strong>تاریخ:</strong> 1403/02/22 - 11:15</div>
                    <div><strong>وضعیت:</strong>
                        <span class="badge bg-danger order-status p-2">پرداخت ناموفق</span>
                    </div>
                </div>
                <div class="d-flex justify-content-between flex-wrap">
                    <div><strong>مبلغ کل:</strong> ۲۴۰٬۰۰۰ تومان</div>
                    <div><strong>روش پرداخت:</strong> نامشخص</div>
                </div>
            </div>
            <hr>
        </a>
    </div>
@endsection
