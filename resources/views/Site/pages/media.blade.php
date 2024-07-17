@extends('master')
@section('main')
    <section class="breadcrumb-area py-5 bg-white pattern-bg">
        <div class="container">
            <div class="breadcrumb-content">
                <div class="media media-card align-items-center pb-4">
                    <div class="media-body">
                        <h2 class="section__title fs-30">{{$page_menu->page_title}}</h2>
                        <p class="lh-30">استاد محمدباقر حیدری کاشانی</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="course-area section-padding bg-gray">
        <div class="container">
            <div class="filter-bar mb-4">
                <div class="filter-bar-inner d-flex flex-wrap align-items-center justify-content-between">
                    <p class="fs-14"> تعداد <span class="text-black">{{$count}} </span> کلیپ در دسترس </p>
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
                @foreach($medias as $media)
                    <div class="col-lg-4 responsive-column-half">
                        <div class="card card-item">
                            <div class="card-image">
                                <a href="{{url($page_menu->slug.'/'.$media->title.'/'.$media->slug)}}">
                                    <img class="card-img-top lazy" src="{{asset('storage/'.$media->cover)}}" data-src="{{asset('storage/'.$media->cover)}}" alt="{{$media->title}}" />
                                    <div class="play-button">
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="-307.4 338.8 91.8 91.8" xml:space="preserve">
                                        <style type="text/css">.st0 {opacity: 0.6;fill: #000000;border-radius: 100px;}  .st1 {fill: #ffffff;}</style>
                                            <g>
                                                <circle class="st0" cx="-261.5" cy="384.7" r="45.9"></circle>
                                                <path class="st1" d="M-272.9,363.2l35.8,20.7c0.7,0.4,0.7,1.3,0,1.7l-35.8,20.7c-0.7,0.4-1.5-0.1-1.5-0.9V364C-274.4,363.3-273.5,362.8-272.9,363.2z"></path>
                                            </g>
                                        </svg>
                                    </div>
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><a href="{{url($page_menu->slug.'/'.$media->title.'/'.$media->slug)}}">{{$media->media_title}}</a></h5>
                                <p class="card-text lh-22 pt-2">سخنران : <a href="{{route('بیوگرافی')}}">استاد محمدباقر حیدری کاشانی</a></p>
                                <p class="card-text lh-22 pt-2">نوع کلیپ : {{$media->title}}</p>
                                <div class="line"></div>
                                <div class="rating-wrap d-flex align-items-center justify-content-between pt-3">
                                    <p>{{jdate($media->created_at)->format('d %B Y')}}</p>
                                    <a href="{{url($page_menu->slug.'/'.$media->title.'/'.$media->slug)}}" class="btn theme-btn theme-btn-sm theme-btn-transparent">مشاهده</a>
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
