@extends('admin')
@section('style')
    <title>پرداخت هزینه کارگاه یا دوره آموزشی</title>
@endsection
@section('main')
    @include('sweetalert::alert')
    <div class="dashboard-heading mb-5">
        <h3 class="fs-22 font-weight-semi-bold">پرداخت هزینه کارگاه یا دوره آموزشی</h3>
    </div>
{{--    @if($workshopsigns)--}}
{{--        <p>Workshop ID: {{$workshopsigns->workshop_id}}</p>--}}
{{--        <p>Title: {{$workshopsigns->title}}</p>--}}
{{--        <p>Price: {{number_format($workshopsigns->price)}} تومان</p>--}}
{{--        <p>Date: {{$workshopsigns->date}}</p>--}}
{{--        <p>Type Use: {{$workshopsigns->typeuse == 1 ? 'حضوری' : 'آنلاین'}}</p>--}}
{{--    @else--}}
{{--        <p>دوره‌ای برای پرداخت یافت نشد.</p>--}}
{{--    @endif--}}
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="store-workshop" role="tabpanel" aria-labelledby="store-workshop-tab">
            <div class="setting-body">
                <form method="get" action="{{ route('pay') }}" class="row pt-40px">
                    @csrf
                    <input type="hidden" name="workshopid" value="{{ $workshopsigns->workshop_id }}">
                    <div class="input-box col-lg-3">
                        <label class="label-text">نام دوره</label>
                        <p>{{ $workshopsigns->title }}</p>
                    </div>

                    <div class="input-box col-lg-3">
                        <label class="label-text">مبلغ هزینه دوره</label>
                        <div class="form-group">
                            @if($workshopsigns->offer)
                                <p>{{ number_format($workshopsigns->offer) }} تومان </p>
                            @else
                                <p>{{ number_format($workshopsigns->price) }} تومان </p>
                            @endif
                        </div>
                    </div>

                    <div class="input-box col-lg-3">
                        <label class="label-text">نوع استفاده</label>
                        <div class="form-group">
                            @if($workshopsigns->typeuse == 1)
                                <p> حضوری </p>
                            @else
                                <p> آنلاین </p>
                            @endif
                        </div>
                    </div>

                    <div class="input-box col-lg-3">
                        <label class="label-text">تاریخ دوره</label>
                        <div class="form-group">
                            <p>{{ $workshopsigns->date }}</p>
                        </div>
                    </div>
                    <div class="input-box col-lg-12 py-2">
                        <button type="submit" class="btn theme-btn">تایید و پرداخت</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'خطا',
                html: '<ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
            });
        </script>
    @endif
@endsection
