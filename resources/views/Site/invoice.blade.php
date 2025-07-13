@extends('master')

@section('title', 'پیش‌فاکتور سفارش')

@php
    $totalFinal = $invoices->sum(fn($invoice) => $invoice->product_price - $invoice->offer_discount);
@endphp

@section('main')
    <div class="container py-5">
        <div class="mx-auto" style="max-width: 800px;">
            <div class="text-center mb-5">
                <h2 class="fw-bold">پیش‌فاکتور سفارش</h2>
                <p class="text-muted mb-0">لیست درخواست خرید محصولات</p>
                <small class="text-muted">تاریخ: {{ jdate()->format('Y-m-d') }}</small>
            </div>

            <!-- لیست فاکتور -->
            <div class="border rounded-3 p-4 bg-white shadow-sm" id="invoice-list">
                <h5 class="fw-semibold mb-4">محصولات</h5>

                @foreach ($invoices as $invoice)
                    <div class="d-flex justify-content-between align-items-center border-bottom py-3 product-row" id="invoice-row-{{ $invoice->id }}">
                        <div class="fw-medium">{{ $invoice->product_name }}</div>
                        <div class="d-flex align-items-center gap-3">
                            <div class="text-muted px-2">{{ number_format($invoice->product_price) }} تومان</div>
                            <button class="btn btn-outline-danger btn-sm delete-invoice-btn" data-id="{{ $invoice->id }}">
                                <i class="bi bi-trash"></i> حذف
                            </button>
                        </div>
                    </div>
                @endforeach

                <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                    <div class="fw-bold">مبلغ نهایی پس از تخفیف:</div>
                    <div class="fw-bold h5 mb-0 total-final-price">{{ number_format($totalFinal) }} تومان</div>
                </div>

                <hr>

                <div>
                    <div class="mb-2"><strong>موجودی کیف پول:</strong> <span id="walletBalance">{{ number_format(auth()->user()->wallet->balance) }}</span> تومان</div>
                    <div id="walletWarning" class="alert alert-warning mt-3 p-2" style="{{ auth()->user()->wallet->balance - $totalFinal <= 0 ? '' : 'display:none;' }}">
                        موجودی کافی نیست. لطفاً به میزان
                        <strong><span id="finalAmount">{{ number_format($totalFinal - auth()->user()->wallet->balance) }}</span></strong> تومان حساب خود را شارژ کنید.
                    </div>
                </div>

                <div class="text-center mt-4 btn-pay-container">
                    <button id="btn-pay" class="btn btn-success btn-lg px-4">پرداخت</button>
                    <a href="{{ route('profilewallet') }}" class="btn btn-warning btn-lg px-4" id="btn-wallet-charge" style="display:none;">شارژ کیف پول</a>
                </div>
            </div>

            <!-- ✅ دکمه مشاهده سفارشات بیرون از invoice-list -->
            <div class="text-center mt-4" id="post-payment-actions" style="display: none;">
                <a href="#" id="btn-go-orders" class="btn btn-primary btn-lg">مشاهده سفارشات</a>
            </div>
        </div>
    </div>

    <!-- Modal حذف سفارش -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 rounded-4">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">حذف سفارش</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <p>آیا مطمئن هستید که می‌خواهید این سفارش را حذف کنید؟</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">لغو</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">حذف</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal تایید پرداخت -->
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

    <!-- Modal پیام وضعیت پرداخت -->
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const walletBalance = {{ auth()->user()->wallet->balance }};
        let latestTotalFinal = {{ $totalFinal }};
        let activeInvoiceIds = @json($invoices->pluck('id')->toArray());
        let selectedInvoiceId = null;

        const deleteModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
        const payModal = new bootstrap.Modal(document.getElementById('confirmPayModal'));
        const statusModal = new bootstrap.Modal(document.getElementById('paymentStatusModal'));

        $(document).on('click', '.delete-invoice-btn', function() {
            selectedInvoiceId = $(this).data('id');
            deleteModal.show();
        });

        $('#confirmDeleteBtn').on('click', function() {
            if (!selectedInvoiceId) return;
            const $row = $('#invoice-row-' + selectedInvoiceId);

            $.ajax({
                url: "{{ route('invoicedestroy') }}",
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: selectedInvoiceId
                },
                success: function(response) {
                    if (response.success) {
                        $row.fadeOut(300, function() { $(this).remove(); });
                        activeInvoiceIds = activeInvoiceIds.filter(id => id !== selectedInvoiceId);

                        $.get("{{ route('invoicetotal') }}", function(totalResponse) {
                            latestTotalFinal = totalResponse.total;
                            $('.total-final-price').text(latestTotalFinal.toLocaleString() + ' تومان');
                            updateWalletStatus(latestTotalFinal);
                        });
                    } else {
                        $('#paymentStatusText').text('خطا در حذف سفارش.');
                        statusModal.show();
                    }
                    deleteModal.hide();
                }
            });
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
            payModal.show();
        });

        $('#confirmPayBtn').on('click', function() {
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
                        $('#walletWarning, #btn-pay, #btn-wallet-charge').hide();

                        $('#btn-go-orders').attr('href', response.redirect_url);
                        $('#post-payment-actions').fadeIn();

                        $('#paymentStatusText').text(response.message || 'پرداخت با موفقیت انجام شد');
                    } else {
                        $('#paymentStatusText').text(response.message || 'خطا در پرداخت');
                    }

                    statusModal.show();
                },
                error: function() {
                    payModal.hide();
                    $('#paymentStatusText').text('خطای سرور در انجام پرداخت');
                    statusModal.show();
                }
            });
        });
    </script>
@endsection
