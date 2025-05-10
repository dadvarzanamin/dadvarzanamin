@extends('admin')

@section('title', 'کیف پول')

@push('head')
    <!-- فونت Vazirmatn -->
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn-font@latest/dist/font-face.css" rel="stylesheet" type="text/css" />

    <style>
        body {
            font-family: 'Vazirmatn', sans-serif;
        }

        .wallet-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.08);
            padding: 24px;
            text-align: center;
            margin: 0 auto 24px;
            max-width: 420px;
        }

        .wallet-balance {
            font-size: 2rem;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 8px;
        }

        .wallet-actions .btn {
            min-width: 140px;
            border-radius: 8px;
            padding: 8px 16px;
            font-size: 14px;
            margin: 5px;
        }

        .btn-wallet {
            background-color: #cea54a;
            border-color: #cea54a;
            color: white;
        }

        .btn-wallet:hover {
            background-color: #af8a32;
            border-color: #af8a32;
        }

        .filter-btn {
            border: 1px solid #ccc;
            background: #f9f9f9;
            padding: 6px 12px;
            margin: 4px;
            border-radius: 6px;
            font-size: 14px;
            transition: all 0.3s;
        }

        .filter-btn.active, .filter-btn:hover {
            background-color: #233d63;
            color: #fff;
        }

        .transaction-table th, .transaction-table td {
            font-size: 14px;
            text-align: center;
            vertical-align: middle;
        }

        .badge-custom {
            border-radius: 999px;
            padding: 6px 12px;
            font-size: 13px;
            font-weight: bold;
            display: inline-block;
        }

        .badge-success {
            background-color: #d4edda;
            color: #155724;
        }

        .badge-danger {
            background-color: #f8d7da;
            color: #721c24;
        }

        .badge-warning {
            background-color: #fff3cd;
            color: #856404;
        }
    </style>
@endpush

@section('main')
    <div class="container my-5">
        <h2 class="text-center mb-4">کیف پول من</h2>

        <!-- کارت موجودی -->
        <div class="wallet-card">
            <p class="mb-1">موجودی فعلی</p>
            <div class="wallet-balance">۱,۲۵۰,۰۰۰ تومان</div>
            <div class="wallet-actions">
                <button class="btn btn-wallet" data-toggle="modal" data-target="#chargeModal">شارژ کیف پول</button>
                <button class="btn btn-outline-secondary">درخواست برداشت</button>
            </div>
        </div>


        <!-- جدول تراکنش‌ها -->
        <div class="table-responsive">
            <table class="table table-bordered transaction-table">
                <thead class="thead-light">
                <tr>
                    <th>تاریخ</th>
                    <th>نوع تراکنش</th>
                    <th>مبلغ</th>
                    <th>وضعیت</th>
                    <th>توضیحات</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1404/02/20</td>
                    <td>واریز</td>
                    <td>۵۰۰,۰۰۰ تومان</td>
                    <td><span class="badge-custom badge-success">موفق</span></td>
                    <td>شارژ از درگاه پرداخت</td>
                </tr>
                <tr>
                    <td>1404/02/18</td>
                    <td>برداشت</td>
                    <td>۲۰۰,۰۰۰ تومان</td>
                    <td><span class="badge-custom badge-danger">ناموفق</span></td>
                    <td>برداشت به حساب بانکی</td>
                </tr>
                <tr>
                    <td>1404/02/16</td>
                    <td>برداشت</td>
                    <td>۱۵۰,۰۰۰ تومان</td>
                    <td><span class="badge-custom badge-warning">در انتظار</span></td>
                    <td>در حال بررسی</td>
                </tr>
                <tr>
                    <td>1404/02/15</td>
                    <td>واریز</td>
                    <td>۱,۰۰۰,۰۰۰ تومان</td>
                    <td><span class="badge-custom badge-success">موفق</span></td>
                    <td>واریز اولیه</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- مودال شارژ کیف پول -->
    <div class="modal fade" id="chargeModal" tabindex="-1" role="dialog" aria-labelledby="chargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="chargeModalLabel">شارژ کیف پول</h5>
                    <button type="button" class="close ml-0" data-dismiss="modal" aria-label="بستن">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="amount">مبلغ موردنظر (تومان)</label>
                            <!-- فیلد مبلغ -->
                            <input type="number" class="form-control" id="amount" placeholder="مثلاً 100000">

                            <!-- دکمه‌های مقادیر پیش‌فرض -->
                            <div class="mt-3 d-flex flex-wrap justify-content-start">
                                <button type="button" class="btn btn-light border mr-2 mb-2 quick-amount" data-value="50000">۵۰٬۰۰۰</button>
                                <button type="button" class="btn btn-light border mr-2 mb-2 quick-amount" data-value="100000">۱۰۰٬۰۰۰</button>
                                <button type="button" class="btn btn-light border mr-2 mb-2 quick-amount" data-value="200000">۲۰۰٬۰۰۰</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gateway">درگاه پرداخت</label>
                            <select class="form-control" id="gateway">
                                <option>درگاه زرین‌پال</option>
                                <option>درگاه نکست‌پی</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                    <button type="button" class="btn btn-wallet">پرداخت</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('.quick-amount').on('click', function () {
                var val = $(this).data('value');
                $('#amount').val(val);
            });
        });
    </script>
@endpush

