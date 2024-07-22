@extends('admin')
@section('style')
    <title>پرداخت هزینه کارگاه یا دوره آموزشی</title>
@endsection
@section('main')
    @include('sweetalert::alert')
    <div class="dashboard-heading mb-5">
        <h3 class="fs-22 font-weight-semi-bold">پرداخت هزینه کارگاه یا دوره آموزشی</h3>
    </div>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="store-workshop" role="tabpanel" aria-labelledby="store-workshop-tab">
            <div class="setting-body">
                <form method="get" action="{{route('pay')}}" class="row pt-40px">
                    @csrf
                    <div class="input-box col-lg-3">
                        <label class="label-text">نام دوره</label>
                       <p>{{$workshopsigns->title}}</p>
                    </div>

                    <div class="input-box col-lg-3">
                        <label class="label-text">مبلغ هزینه دوره</label>
                        <div class="form-group">
                            <p>{{number_format($workshopsigns->price)}} تومان </p>
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
                            <p>{{$workshopsigns->date}}</p>
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
