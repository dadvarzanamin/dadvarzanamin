@extends('master')

@section('title', 'پیش‌فاکتور سفارش')

@section('main')
    <div class="container py-4">
        <div class="invoice-card">
            <div class="invoice-header text-center">لیست درخواست خرید محصولات</div>

            <div class="invoice-row"><strong>تاریخ:</strong> {{jdate()->format('Y-m-d')}}</div>

            <hr>
            <div id="invoice-list">
            <div> محصولات</div>

                @foreach ($invoices as $invoice   )
                    <div class="product-row d-flex justify-content-between flex-wrap" id="invoice-row-{{ $invoice->id }}">
                        <div>{{$invoice->product_name}}</div>
                        <div>{{$invoice->product_price}}</div>
                        <button class="btn btn-danger btn-sm delete-invoice-btn" data-id="{{ $invoice->id }}">حذف</button>
                    </div>
                @endforeach
            <div class="total-row text-end">
                @php
                    $totalFinal = $invoices->sum(function($invoice) {
                        return $invoice->product_price - $invoice->offer_discount;
                    });
                @endphp

                <p>مبلغ نهایی بعد از تخفیف: <span class="total-final-price">{{ number_format($totalFinal) }}</span> تومان</p>
            </div>

            <hr>

            <div class="invoice-row">
                <strong>موجودی کیف پول شما: </strong>
                <span id="walletBalance">{{ number_format(auth()->user()->wallet->balance) }}</span> تومان
            </div>

            <div id="walletWarning" class="invoice-row mt-3" style="{{ auth()->user()->wallet->balance - $totalFinal <= 0 ? '' : 'display:none;' }}">
                <strong>موجودی کیف پول شما کافی نمی باشد لطفا آن را شارژ کنید</strong>
                <span id="finalAmount">{{ number_format($totalFinal - auth()->user()->wallet->balance) }}</span> ریال
            </div>
            </div>
            <div class="text-center btn-pay-container">
                <button id="btn-pay" class="btn btn-success btn-lg">پرداخت</button>
                <a href="{{ route('profilewallet') }}" class="btn btn-warning btn-lg" id="btn-wallet-charge" style="display:none;">شارژ کیف پول</a>
            </div>

        </div>
    </div>
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">تأیید حذف</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    آیا از حذف این سفارش مطمئن هستید؟
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">لغو</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">حذف</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const walletBalance = {{ auth()->user()->wallet->balance }};
        let latestTotalFinal = {{ $totalFinal }};
        let activeInvoiceIds = @json($invoices->pluck('id')->toArray());

        $(document).on('click', '.delete-invoice-btn', function() {
            var invoiceId = $(this).data('id');
            var $row = $('#invoice-row-' + invoiceId);

            if (confirm('آیا از حذف این سفارش مطمئن هستید؟')) {
                $.ajax({
                    url: "{{ route('invoicedestroy') }}",
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: invoiceId
                    },
                    success: function(response) {
                        if (response.success) {
                            $row.fadeOut(300, function() { $(this).remove(); });
                            activeInvoiceIds = activeInvoiceIds.filter(id => id !== invoiceId);

                            $.get("{{ route('invoicetotal') }}", function(totalResponse) {
                                latestTotalFinal = totalResponse.total;
                                $('.total-final-price').text(latestTotalFinal.toLocaleString() + ' تومان');
                                updateWalletStatus(latestTotalFinal);
                            });
                        } else {
                            alert('حذف انجام نشد.');
                        }
                    }
                });
            }
        });

        function updateWalletStatus(totalFinal) {
            const remainder = totalFinal - walletBalance;
            if (remainder > 0) {
                $('#walletWarning').show();
                $('#finalAmount').text(remainder.toLocaleString());
                $('#btn-wallet-charge').show();
                $('#btn-pay').hide();
            } else {
                $('#walletWarning').hide();
                $('#btn-wallet-charge').hide();
                $('#btn-pay').show();
            }
        }

        $('#btn-pay').on('click', function() {
            if (confirm('آیا از پرداخت مبلغ مطمئن هستید؟')) {
                $.ajax({
                    url: "{{ route('withdraw') }}",
                    type: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        totalFinal: latestTotalFinal,
                        invoice_ids: activeInvoiceIds
                    },
                    success: function(response) {
                        if (response.isSuccess) {
                            // مخفی کردن یا حذف لیست فاکتورها
                            $('#invoice-list').fadeOut(300, function() { $(this).remove(); });

                            // پنهان کردن دکمه‌ها
                            $('#walletWarning, #btn-pay, #btn-wallet-charge').hide();

                            // افزودن دکمه مشاهده سفارشات در صورت نبود قبلی
                            if (!$('#btn-go-orders').length) {
                                $('.btn-pay-container').append(
                                    '<a href="' + response.redirect_url + '" class="btn btn-primary btn-lg mt-3" id="btn-go-orders">مشاهده سفارشات</a>'
                                );
                            }

                            alert(response.message || 'پرداخت با موفقیت انجام شد');
                        } else {
                            alert(response.message || 'خطا در پرداخت');
                        }
                    },
                    error: function() {
                        alert('خطای سرور در انجام پرداخت');
                    }
                });
            }
        });

    </script>

@endsection
