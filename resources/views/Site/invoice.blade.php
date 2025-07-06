@extends('master')

@section('title', 'پیش‌فاکتور سفارش')

@section('main')
    <div class="container py-4">
        <div class="invoice-card">
            <div class="invoice-header text-center">لیست درخواست خرید محصولات</div>

            <div class="invoice-row"><strong>تاریخ:</strong> {{jdate()->format('Y-m-d')}}</div>

            <hr>

            <div> محصولات</div>

            @foreach($invoices as $invoice)
            <div class="product-row d-flex justify-content-between flex-wrap">
                <div>{{$invoice->product_name}}</div>
                <div>{{$invoice->product_price}}</div>
            </div>
            @endforeach

            <div class="total-row text-end">
                @php
                    $totalFinal = $invoices->sum(function($invoice) {
                        return $invoice->product_price - $invoice->offer_discount;
                    });
                @endphp

                <p>مبلغ نهایی بعد از تخفیف: {{ number_format($totalFinal) }} تومان</p>
            </div>

            <hr>

            <div class="invoice-row">
                <strong> موجودی کیف پول شما: </strong> <span id="walletBalance"> {{number_format(auth()->user()->wallet->balance)}} </span> تومان
            </div>
            @if(auth()->user()->wallet->balance - $totalFinal <= 0)
                <div class="invoice-row mt-3">
                    <strong>موجودی کیف پول شما کافی نمی باشد لطفا آن را شارژ کنید</strong>
                    <span id="finalAmount">
                        @php
                          $remainder = $totalFinal - auth()->user()->wallet->balance
                        @endphp
                        {{number_format($remainder)}}
                    </span> ریال
                </div>
            @endif
            <div class="text-center btn-pay">
                <a href="{{ url('/pay/123459') }}" class="btn btn-success btn-lg">
                    تایید و رفتن به درگاه پرداخت
                </a>
            </div>
        </div>
    </div>
@endsection
