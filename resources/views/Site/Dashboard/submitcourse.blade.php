@extends('admin')
@section('main')
                    <div class="dashboard-heading mb-5">
                        <h3 class="fs-22 font-weight-semi-bold">ارسال دوره</h3>
                    </div>
                    <form action="#">
                        <div class="card card-item">
                            <div class="card-body">
                                <h3 class="fs-22 font-weight-semi-bold pb-2">اطلاعات پایه</h3>
                                <div class="divider"><span></span></div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="label-text">عنوان دوره</label>
                                            <input class="form-control form--control pl-3" type="text" name="text" placeholder="به عنوان مثال جاوا اسکریپت را برای مبتدیان یاد بگیرید " />
                                        </div>
                                    </div>
                                    <!-- end col-lg-12 -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="label-text">زیرنویس دوره</label>
                                            <input class="form-control form--control pl-3" type="text" name="text" placeholder="به عنوان مثال خود را با این دوره جامع جاوا اسکریپت قدرتمند کنید." />
                                        </div>
                                    </div>
                                    <!-- end col-lg-12 -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="label-text">نام مربی</label>
                                            <input class="form-control form--control pl-3" type="text" name="text" placeholder="اسم شما" />
                                        </div>
                                    </div>
                                    <!-- end col-lg-12 -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="label-text">دسته دوره</label>
                                            <input class="form-control form--control tags-input" type="text" name="text" placeholder="به عنوان مثال جاوا اسکریپت" />
                                        </div>
                                    </div>
                                    <!-- end col-lg-12 -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="label-text">کل کلاس</label>
                                            <input class="form-control form--control pl-3" type="text" name="text" placeholder="مجموع دوره ها" />
                                        </div>
                                    </div>
                                    <!-- end col-lg-12 -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="label-text">ساعت دوره</label>
                                            <input class="form-control form--control pl-3" type="text" name="text" placeholder="مثلا 30" />
                                        </div>
                                    </div>
                                    <!-- end col-lg-12 -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="label-text">قیمت دوره</label>
                                            <input class="form-control form--control pl-3" type="text" name="text" placeholder="مثلا 79" />
                                        </div>
                                    </div>
                                    <!-- end col-lg-12 -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="label-text">زبان دوره</label>
                                            <input class="form-control form--control pl-3" type="text" name="text" placeholder="مثلا انگلیسی" />
                                        </div>
                                    </div>
                                    <!-- end col-lg-12 -->
                                    <div class="col-lg-12">
                                        <label class="label-text">تاریخ اتمام</label>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <div class="select-container w-auto">
                                                        <select class="select-container-select">
                                                            <option value="0" selected="">روز</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                            <option value="13">13</option>
                                                            <option value="14">14</option>
                                                            <option value="15">15</option>
                                                            <option value="16">16</option>
                                                            <option value="17">17</option>
                                                            <option value="18">18</option>
                                                            <option value="19">19</option>
                                                            <option value="20">20</option>
                                                            <option value="21">21</option>
                                                            <option value="22">22</option>
                                                            <option value="23">23</option>
                                                            <option value="24">24</option>
                                                            <option value="25">25</option>
                                                            <option value="26">26</option>
                                                            <option value="27">27</option>
                                                            <option value="28">28</option>
                                                            <option value="29">29</option>
                                                            <option value="30">30</option>
                                                            <option value="31">31</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <div class="select-container w-auto">
                                                        <select class="select-container-select">
                                                            <option value="0" selected="">ماه</option>
                                                            <option value="1">فروردین</option>
                                                            <option value="2">اردیبهشت</option>
                                                            <option value="3">خرداد</option>
                                                            <option value="4">تیر</option>
                                                            <option value="5">مرداد</option>
                                                            <option value="6">شهریور</option>
                                                            <option value="7">مهر</option>
                                                            <option value="8">آبان</option>
                                                            <option value="9">آذر</option>
                                                            <option value="10">دی</option>
                                                            <option value="11">بهمن</option>
                                                            <option value="12">اسفند</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <div class="select-container w-auto">
                                                        <select class="select-container-select">
                                                            <option value="0" selected="">سال</option>
                                                            <option value="1400">1401</option>
                                                            <option value="1400">1400</option>
                                                            <option value="1399">1399</option>
                                                            <option value="1398">1398</option>
                                                            <option value="1397">1397</option>
                                                            <option value="1396">1396</option>
                                                            <option value="1395">1395</option>
                                                            <option value="1394">1394</option>
                                                            <option value="1393">1393</option>
                                                            <option value="1392">1392</option>
                                                            <option value="1391">1391</option>
                                                            <option value="1390">1390</option>
                                                            <option value="1389">1389</option>
                                                            <option value="1388">1388</option>
                                                            <option value="1387">1387</option>
                                                            <option value="1386">1386</option>
                                                            <option value="1385">1385</option>
                                                            <option value="1384">1384</option>
                                                            <option value="1383">1383</option>
                                                            <option value="1382">1382</option>
                                                            <option value="1381">1381</option>
                                                            <option value="1380">1380</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col-lg-12 -->
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="label-text">شرح دوره</label>
                                            <textarea class="form-control form--control user-text-editor pl-3" name="message">توضیحات دوره را اینجا بنویسید</textarea>
                                        </div>
                                    </div>
                                    <!-- end col-lg-12 -->
                                    <div class="col-lg-12">
                                        <div class="form-group mb-0">
                                            <label class="label-text">تصویر دوره</label>
                                            <div class="file-upload-wrap">
                                                <input type="file" name="files[]" class="multi file-upload-input" multiple="" />
                                                <span class="file-upload-text"><i class="la la-cloud-upload mr-2 fs-18"></i>فایل ها را اینجا رها کنید یا برای آپلود کلیک کنید.</span>
                                            </div>
                                            <!-- file-upload-wrap -->
                                        </div>
                                    </div>
                                    <!-- end col-lg-12 -->
                                </div>
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                        <div class="card card-item">
                            <div class="card-body">
                                <h3 class="fs-22 font-weight-semi-bold pb-2">ویدئو</h3>
                                <div class="divider"><span></span></div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="label-text">عنوان ویدئو</label>
                                            <input class="form-control form--control pl-3" type="text" name="text" placeholder="عنوان ویدئو" />
                                        </div>
                                    </div>
                                    <!-- end col-lg-4 -->
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="label-text">دسته ویدیو</label>
                                            <input class="form-control form--control pl-3" type="text" name="text" placeholder="دسته ویدیو" />
                                        </div>
                                    </div>
                                    <!-- end col-lg-4 -->
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="label-text">URL ویدیو</label>
                                            <input class="form-control form--control pl-3" type="text" name="text" placeholder="URL ویدیو" />
                                        </div>
                                    </div>
                                    <!-- end col-lg-4 -->
                                </div>
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                        <div class="course-submit-btn-box pb-4">
                            <button class="btn theme-btn" type="submit">ارسال دوره</button>
                        </div>
                    </form>
@endsection
