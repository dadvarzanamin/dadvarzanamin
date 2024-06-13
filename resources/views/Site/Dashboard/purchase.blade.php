@extends('admin')
@section('main')
                    <div class="dashboard-heading mb-5">
                        <h3 class="fs-22 font-weight-semi-bold">سابقه خرید</h3>
                    </div>
                    <div class="table-responsive mb-5">
                        <table class="table generic-table">
                            <thead>
                                <tr>
                                    <th scope="col">شناسه</th>
                                    <th scope="col">مورد</th>
                                    <th scope="col">میزان</th>
                                    <th scope="col">تاریخ</th>
                                    <th scope="col">وضعیت</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <ul class="generic-list-item">
                                            <li>#090909</li>
                                        </ul>
                                    </th>
                                    <td>
                                        <div class="media media-card align-items-center">
                                            <a href="course-details.html" class="media-img">
                                                <img class="mr-3" src="images/small-img.jpg" alt="تصویر سبد خرید" />
                                            </a>
                                            <div class="media-body">
                                                <h5 class="fs-15"><a href="course-details.html">دوره جامع خانواده</a></h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <ul class="generic-list-item">
                                            <li>1000 تومان</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="generic-list-item">
                                            <li>12 خرداد 1401</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="generic-list-item">
                                            <li><span class="badge bg-success text-white p-1">تکمیل شد</span></li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <ul class="generic-list-item">
                                            <li>#090909</li>
                                        </ul>
                                    </th>
                                    <td>
                                        <div class="media media-card align-items-center">
                                            <a href="course-details.html" class="media-img">
                                                <img class="mr-3" src="images/small-img.jpg" alt="تصویر سبد خرید" />
                                            </a>
                                            <div class="media-body">
                                                <h5 class="fs-15"><a href="course-details.html">دوره نهایی ایجاد متن به ویدیو</a></h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <ul class="generic-list-item">
                                            <li>1000 تومان</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="generic-list-item">
                                            <li>12 خرداد 1401</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="generic-list-item">
                                            <li><span class="badge bg-info text-white p-1">در انتظار</span></li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <ul class="generic-list-item">
                                            <li>#090909</li>
                                        </ul>
                                    </th>
                                    <td>
                                        <div class="media media-card align-items-center">
                                            <a href="course-details.html" class="media-img">
                                                <img class="mr-3" src="images/small-img.jpg" alt="تصویر سبد خرید" />
                                            </a>
                                            <div class="media-body">
                                                <h5 class="fs-15"><a href="course-details.html">راهنمای نهایی برای نسل بعدی </a></h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <ul class="generic-list-item">
                                            <li>1000 تومان</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="generic-list-item">
                                            <li>12 خرداد 1401</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="generic-list-item">
                                            <li><span class="badge bg-danger text-white p-1">لغو شد</span></li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <ul class="generic-list-item">
                                            <li>#090909</li>
                                        </ul>
                                    </th>
                                    <td>
                                        <div class="media media-card align-items-center">
                                            <a href="course-details.html" class="media-img">
                                                <img class="mr-3" src="images/small-img.jpg" alt="تصویر سبد خرید" />
                                            </a>
                                            <div class="media-body">
                                                <h5 class="fs-15"><a href="course-details.html">دوره جامع خانواده</a></h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <ul class="generic-list-item">
                                            <li>1000 تومان</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="generic-list-item">
                                            <li>12 خرداد 1401</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="generic-list-item">
                                            <li><span class="badge bg-danger text-white p-1">لغو شد</span></li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive mb-5">
                        <h3 class="fs-18 font-weight-semi-bold pb-4">جزئیات سفارش</h3>
                        <table class="table generic-table">
                            <thead>
                                <tr>
                                    <th scope="col">مورد</th>
                                    <th scope="col">میزان</th>
                                    <th scope="col">تاریخ</th>
                                    <th scope="col">کد کوپن</th>
                                    <th scope="col">تعداد</th>
                                    <th scope="col">پرداخت شده از طریق</th>
                                    <th scope="col">جمع</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <ul class="generic-list-item">
                                            <li>دوره جامع خانواده</li>
                                        </ul>
                                    </th>
                                    <td>
                                        <ul class="generic-list-item">
                                            <li>1000 تومان</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="generic-list-item">
                                            <li>12 خرداد 1401</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="generic-list-item">
                                            <li>SNUGGLE323</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="generic-list-item">
                                            <li>1</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="generic-list-item">
                                            <li>پی پال</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="generic-list-item">
                                            <li>1000 تومان</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <ul class="generic-list-item">
                                            <li>دوره جامع خانواده</li>
                                        </ul>
                                    </th>
                                    <td>
                                        <ul class="generic-list-item">
                                            <li>1000 تومان</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="generic-list-item">
                                            <li>12 خرداد 1401</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="generic-list-item">
                                            <li>SNUGGLE323</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="generic-list-item">
                                            <li>1</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="generic-list-item">
                                            <li>پی پال</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="generic-list-item">
                                            <li>1000 تومان</li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <ul class="generic-list-item">
                                            <li class="font-weight-semi-bold text-black fs-18">جمع:</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="generic-list-item">
                                            <li class="font-weight-semi-bold text-black fs-18">158 تومان</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <ul class="generic-list-item">
                                            <li class="font-weight-semi-bold text-black fs-18">جمع پرداختی:</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="generic-list-item">
                                            <li class="font-weight-semi-bold text-black fs-18">158 تومان</li>
                                        </ul>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <h3 class="fs-18 font-weight-semi-bold pb-4">جزئیات بازپرداخت</h3>
                        <table class="table generic-table">
                            <thead>
                                <tr>
                                    <th scope="col">بازپرداخت</th>
                                    <th scope="col">میزان</th>
                                    <th scope="col">تاریخ</th>
                                    <th scope="col">بازپرداخت به</th>
                                    <th scope="col">نوع بازپرداخت</th>
                                    <th scope="col">یادداشت اعتباری</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <ul class="generic-list-item">
                                            <li>دوره جامع خانواده</li>
                                        </ul>
                                    </th>
                                    <td>
                                        <ul class="generic-list-item">
                                            <li>1000 تومان</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="generic-list-item">
                                            <li>12 خرداد 1401</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="generic-list-item">
                                            <li>الکس اسمیت</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="generic-list-item">
                                            <li>1</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="generic-list-item">
                                            <li>پی پال</li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
@endsection
