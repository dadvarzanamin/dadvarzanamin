@extends('admin')
@section('main')
            <div class="dashboard-heading mb-5">
                <h3 class="fs-22 font-weight-semi-bold">تسویه حساب</h3>
            </div>
            <div class="Withdraw-info mb-5">
                <ul class="generic-list-item">
                    <li><h3 class="fs-18 font-weight-semi-bold">موجودی فعلی</h3></li>
                    <li>موجودی فعلی شما <span class="text-black font-weight-semi-bold">219.20 تومان</span> آماده برداشت است</li>
                    <li><a href="#" class="badge btn-primary p-1 text-white d-inline-block">برداشت انجام دهید</a></li>
                    <li>شما با <span class="text-black">انتقال بانکی</span> پول دریافت خواهید کرد ، می توانید <a href="#" class="text-color">اولویت برداشت</a> خود را تغییر دهید<a href="#" class="text-color"></a></li>
                </ul>
                <ul class="generic-list-item">
                    <li><h3 class="fs-18 font-weight-semi-bold">برداشت های معلق</h3></li>
                    <li>هنوز هیچ برداشتی در انتظار نیست.</li>
                </ul>
            </div><!-- end Withdraw-info -->
            <div class="statement-table-item mb-4">
                <h3 class="fs-18 font-weight-semi-bold">برداشت های تکمیل شده</h3>
                <div class="table-responsive pt-4">
                    <table class="table generic-table">
                        <thead>
                        <tr>
                            <th scope="col">میزان</th>
                            <th scope="col">روش برداشت</th>
                            <th scope="col">ایجاد شده در</th>
                            <th scope="col">تایید شده در</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">
                                <ul class="generic-list-item">
                                    <li>1000 تومان</li>
                                    <li>999 تومان</li>
                                </ul>
                            </th>
                            <td>
                                <ul class="generic-list-item">
                                    <li>حواله بانکی</li>
                                    <li>پی پال</li>
                                </ul>
                            </td>
                            <td>
                                <ul class="generic-list-item">
                                    <li>12 شهریور 1401، 12:20 بعد از ظهر</li>
                                    <li>6 تیر 1401، 11:20 صبح</li>
                                </ul>
                            </td>
                            <td>
                                <ul class="generic-list-item">
                                    <li>12 شهریور 1401، 12:20 بعد از ظهر</li>
                                    <li>6 تیر 1401، 11:20 صبح</li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <ul class="generic-list-item">
                                    <li>1000 تومان</li>
                                    <li>999 تومان</li>
                                </ul>
                            </th>
                            <td>
                                <ul class="generic-list-item">
                                    <li>حواله بانکی</li>
                                    <li>پی پال</li>
                                </ul>
                            </td>
                            <td>
                                <ul class="generic-list-item">
                                    <li>12 شهریور 1401، 12:20 بعد از ظهر</li>
                                    <li>6 تیر 1401، 11:20 صبح</li>
                                </ul>
                            </td>
                            <td>
                                <ul class="generic-list-item">
                                    <li>12 شهریور 1401، 12:20 بعد از ظهر</li>
                                    <li>6 تیر 1401، 11:20 صبح</li>
                                </ul>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div><!-- end statement-table-item -->
            <div class="statement-table-item mb-4">
                <h3 class="fs-18 font-weight-semi-bold">برداشت های رد شده</h3>
                <div class="table-responsive pt-4">
                    <table class="table generic-table">
                        <thead>
                        <tr>
                            <th scope="col">میزان</th>
                            <th scope="col">روش برداشت</th>
                            <th scope="col">ایجاد شده در</th>
                            <th scope="col">تایید شده در</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">
                                <ul class="generic-list-item">
                                    <li>1000 تومان</li>
                                    <li>999 تومان</li>
                                </ul>
                            </th>
                            <td>
                                <ul class="generic-list-item">
                                    <li>حواله بانکی</li>
                                    <li>پی پال</li>
                                </ul>
                            </td>
                            <td>
                                <ul class="generic-list-item">
                                    <li>12 شهریور 1401، 12:20 بعد از ظهر</li>
                                    <li>6 تیر 1401، 11:20 صبح</li>
                                </ul>
                            </td>
                            <td>
                                <ul class="generic-list-item">
                                    <li>12 شهریور 1401، 12:20 بعد از ظهر</li>
                                    <li>6 تیر 1401، 11:20 صبح</li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <ul class="generic-list-item">
                                    <li>1000 تومان</li>
                                    <li>999 تومان</li>
                                </ul>
                            </th>
                            <td>
                                <ul class="generic-list-item">
                                    <li>حواله بانکی</li>
                                    <li>پی پال</li>
                                </ul>
                            </td>
                            <td>
                                <ul class="generic-list-item">
                                    <li>12 شهریور 1401، 12:20 بعد از ظهر</li>
                                    <li>6 تیر 1401، 11:20 صبح</li>
                                </ul>
                            </td>
                            <td>
                                <ul class="generic-list-item">
                                    <li>12 شهریور 1401، 12:20 بعد از ظهر</li>
                                    <li>6 تیر 1401، 11:20 صبح</li>
                                </ul>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div><!-- end statement-table-item -->
@endsection
