@extends('master')
@section('main')
    <section class="breadcrumb-area py-5 bg-white pattern-bg">
        <div class="container">
            <div class="breadcrumb-content">
                <div class="media media-card align-items-center pb-4">
                    <div class="media-body">
                        <h2 class="section__title fs-30">آرشیو کتب و مقالات </h2>
                        <p class="lh-30">استاد محمد باقر حیدری کاشانی</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="course-area section-padding bg-gray">
        <div class="container">
            <div class="filter-bar mb-4">
                <div class="filter-bar-inner d-flex flex-wrap align-items-center justify-content-between">
                    <p class="fs-14"> تعداد <span class="text-black"> {{$count}} </span> کتاب یا مقاله در دسترس </p>
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="select-container select--container mr-3">
                            <select class="select-container-select">
                                <option value="newest">جدید ترین ها</option>
                                <option value="oldest">قدیمی ترین ها</option>
                                <option value="high-view">بالاترین بازدید</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($books as $book)
                    <div class="col-lg-4 responsive-column-half">
                        <div class="card card-item">
                            <div class="card-image">
                                <a href="{{url('آرشیو-کتب-و-نوشتار/'.$book->slug)}}">
                                    <img class="card-img-top lazy" src="{{asset($book->cover)}}" data-src="{{asset($book->cover)}}" alt="{{$book->title}}" />
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><a href="{{url('آرشیو-کتب-و-نوشتار/'.$book->slug)}}">{{$book->title}}</a></h5>
                                <p class="card-text lh-22 pt-2"> نویسنده : <a href="{{route('بیوگرافی')}}"> استاد محمدباقر حیدری کاشانی</a></p>
                                <div class="line"></div>
                                <div class="rating-wrap d-flex align-items-center justify-content-between pt-3">
                                    <p>{{jdate($book->created_at)->format('d %B Y')}}</p>
                                    <a href="{{url('آرشیو-کتب-و-نوشتار/'.$book->slug)}}" class="btn theme-btn theme-btn-sm theme-btn-transparent">مشاهده</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{--            <div class="text-center pt-3">--}}
            {{--                <nav aria-label="مثال ناوبری صفحه" class="pagination-box">--}}
            {{--                    <ul class="pagination justify-content-center">--}}
            {{--                        <li class="page-item">--}}
            {{--                            <a class="page-link" href="#" aria-label="قبلی">--}}
            {{--                                <span aria-hidden="true"><i class="la la-arrow-right"></i></span>--}}
            {{--                                <span class="sr-only">قبلی</span>--}}
            {{--                            </a>--}}
            {{--                        </li>--}}
            {{--                        <li class="page-item active"><a class="page-link" href="#">1</a></li>--}}
            {{--                        <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
            {{--                        <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
            {{--                        <li class="page-item">--}}
            {{--                            <a class="page-link" href="#" aria-label="بعد">--}}
            {{--                                <span aria-hidden="true"><i class="la la-arrow-left"></i></span>--}}
            {{--                                <span class="sr-only">بعد</span>--}}
            {{--                            </a>--}}
            {{--                        </li>--}}
            {{--                    </ul>--}}
            {{--                </nav>--}}
            {{--                <p class="fs-14 pt-2">نمایش 1-6 از 56 نتیجه</p>--}}
            {{--            </div>--}}
        </div>
    </section>
@endsection
