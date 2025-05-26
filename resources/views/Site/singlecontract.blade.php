@extends('master')

@section('style')
    <meta name="description" content="{{$contracts->title}}">
    <title>{{$contracts->title}}</title>
@endsection

@section('main')
    <section class="single-article-area p-1 pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5">
                    <div class="card card-item card-bg50">
                        <div class="text-center">
                            <img src="{{ asset('storage/'.$contracts->image) }}" alt="پیش‌نمایش قرارداد" class="img-fluid rounded shadow-sm" style="max-height: 500px;">
                        </div>

                        <div class="card-body">
                            <h1 class="article-title">{{$contracts->title}}</h1>

                            <div class="article-meta d-flex justify-content-between align-items-center mb-3">
                                <span><i class="la la-user"></i> تنظیم‌کننده: دپارتمان حقوقی امین</span>
                                <span><i class="la la-clock"></i> زمان مطالعه: حدود ۷ دقیقه</span>
                                <span><i class="la la-eye"></i> بازدید: ۱۲۵۷</span>
                            </div>

                            <!-- توضیحات -->
                            <div class="card-text">
                                {!! $contracts->text !!}
                            </div>

                            <!-- موضوع -->
                            <div class="mt-4">
                                {!! $contracts->description !!}

                            </div>

                            <div class="mt-4 text-center">
                                <a href="#" onclick="alert('فعلاً امکان خرید فعال نیست')" class="btn btn-success btn-lg br-8 px-5">
                                    خرید قرارداد
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="card card-item card-bg50">
                            <div class="card-body">
                                <h3 class="card-title fs-18 pb-2">قراردادهای مشابه</h3>
                                <div class="divider"><span></span></div>
                                <a href="#">قرارداد همکاری مشاوره‌ای</a>
                                <div class="divider"><span></span></div>
                                <a href="#">قرارداد مشارکت در پروژه</a>
                                <div class="divider"><span></span></div>
                                <a href="#">قرارداد محرمانگی اطلاعات (NDA)</a>
                                <div class="divider"><span></span></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
