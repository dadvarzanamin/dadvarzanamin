@extends('master')

@section('title', 'سفارشات من')

@section('main')
    <div class="container py-4">
        <h3 class="mb-4 text-center">سفارشات من</h3>

        @foreach($orders as $order)
                <div class="order-card ">
                    <div class="d-flex justify-content-between flex-wrap">
                        <div><strong>شماره سفارش:</strong> #{{$order->id}}</div>
                        <div><strong>سفارش:</strong> {{$order->product_type}}</div>
                        <div><strong>وضعیت:</strong>
                            <span class="badge bg-success order-status p-2">پرداخت شده</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between flex-wrap">
                        <div><strong>مبلغ کل:</strong> {{$order->product_price}} تومان </div>
                        <div><strong>نام محصول:</strong> {{$order->product_name}}</div>
                        <div><a href="{{asset($order->file_path)}}"><strong>کنید دانلود</strong></a> </div>
                    </div>
                </div>
                <hr>
        @endforeach
    </div>
@endsection
