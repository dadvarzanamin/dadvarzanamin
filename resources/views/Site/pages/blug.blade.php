@extends('master')
@section('main')

<section class="breadcrumb-area section-padding img-bg-2">
    <div class="overlay" @if ($slides) style="background-image: url({{asset('storage/'.$slides['file_link'])}})" @endif ></div>
    <div class="container">
        <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between">
            
            <ul class="generic-list-item generic-list-item-white generic-list-item-arrow d-flex flex-wrap align-items-center">
                <li><a href="{{url('/')}}">صفحه اصلی</a></li>
                <li>{{request()->segment(1)}}</li>
            </ul>
            <div class="section-heading">
                <h2 class="section__title text-white">{{request()->segment(1)}}</h2>
            </div>
        </div>
    </div>
</section>

    <section class="blog-area section--padding">
        <div class="container">
            <div class="row">
                @foreach($blugs as $blug)
                    <div class="col-lg-4">
                    <div class="card card-item">
                        <div class="card-image">
                            <a href="{{url('blug')}}" class="d-block">
                                <img class="card-img-top lazy" src="{{asset('storage/'.$blug->file_link)}}" data-src="{{asset('storage/'.$blug->file_link)}}" alt="{{$blug->title}}" />
                            </a>
                            <div class="course-badge-labels">
                                <div class="course-badge">{{jdate($blug->created)->ago()}}</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="{{url('blug')}}">{{$blug->title}}</a></h5>
                            <ul class="generic-list-item generic-list-item-bullet generic-list-item--bullet d-flex align-items-center flex-wrap fs-14 pt-2">
                                <li class="d-flex align-items-center">توسط <a href="#">{{$blug->owner}}</a></li>
                                <li class="d-flex align-items-center"><a href="#">{{$blug->comment}}</a></li>
                                <li class="d-flex align-items-center"><a href="#">{{$blug->click}}</a></li>
                            </ul>
                            <div class="d-flex justify-content-between align-items-center pt-3">
                                <a href="{{url(request()->segment(1).'/'.$blug->slug)}}" class="btn theme-btn theme-btn-sm theme-btn-white">ادامه مطلب <i class="la la-arrow-left icon ml-1"></i></a>
                                <div class="share-wrap">
                                    <ul class="social-icons social-icons-styled">
                                        <li class="mr-0">
                                            <a href="#" class="facebook-bg"><i class="la la-facebook"></i></a>
                                        </li>
                                        <li class="mr-0">
                                            <a href="#" class="twitter-bg"><i class="la la-twitter"></i></a>
                                        </li>
                                        <li class="mr-0">
                                            <a href="#" class="instagram-bg"><i class="la la-instagram"></i></a>
                                        </li>
                                    </ul>
                                    <div class="icon-element icon-element-sm shadow-sm cursor-pointer share-toggle" title="تغییر وضعیت برای گسترش نمادهای اجتماعی">
                                        <i class="la la-share-alt"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
           {{-- <div class="text-center pt-3">
                <nav aria-label="مثال ناوبری صفحه" class="pagination-box">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="قبلی">
                                <span aria-hidden="true"><i class="la la-arrow-right"></i></span>
                                <span class="sr-only">قبلی</span>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="بعد">
                                <span aria-hidden="true"><i class="la la-arrow-left"></i></span>
                                <span class="sr-only">بعد</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="fs-14 pt-2">نمایش 1-6 از 56 نتیجه</p>
            </div>--}}
        </div>
    </section>

@endsection
