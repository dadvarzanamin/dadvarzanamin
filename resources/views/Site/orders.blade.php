@extends('master')

@section('title', 'سفارشات من')

@section('main')
    <div class="container py-5">
        <h3 class="text-center mb-5 fw-bold">سفارشات من</h3>

        @forelse($orders as $order)
                <div class="card mb-4 border border-light-subtle br-8">
                    <div class="card-body">
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start mb-3">
                            <div>
                                <h5 class="mb-1">سفارش #{{ $order->id }}</h5>
                                <p class="mb-0 text-muted">نوع سفارش: {{ $order->product_type }}</p>
                            </div>
                            <div>
                                <span class="badge bg-success fs-6 p-2" style="color:#fff;">پرداخت شده</span>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-4 col-12">
                                <div><strong>نام محصول:</strong></div>
                                <div>{{ $order->product_name }}</div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div><strong>مبلغ کل:</strong></div>
                                <div>{{ number_format($order->product_price) }} تومان</div>
                            </div>
                            <div class="col-md-4 col-12 d-flex align-items-end justify-content-md-end">
                                <a href="{{ asset('storage/' . $order->file_path) }}" class="btn btn-outline-primary w-100 w-md-auto">
                                    دانلود فایل
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

        @empty
            <div class="alert alert-info text-center">
                هیچ سفارشی ثبت نشده است.
            </div>
        @endforelse
    </div>
@endsection
