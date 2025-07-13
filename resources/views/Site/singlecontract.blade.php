@extends('master')

@section('style')
    <meta name="description" content="{{ $contracts->title }}">
    <title>{{ $contracts->title }}</title>
@endsection

@section('main')
    <section class="py-5">
        <div class="container">
            <div class="row gy-4">

                <!-- 👈 Main Content -->
                <div class="col-lg-8">
                    <div class="border rounded-3 p-4 bg-white">

                        <!-- Preview Image -->
                        <div class="text-center mb-4">
                            <img src="{{ asset('storage/' . $contracts->image) }}"
                                 alt="پیش‌نمایش قرارداد"
                                 class="img-fluid rounded-3"
                                 style="max-height: 400px; object-fit: cover;">
                        </div>

                        <!-- Title -->
                        <h1 class="mb-3 h3 fw-bold">{{ $contracts->title }}</h1>

                        <!-- Meta Info -->
                        <div class="d-flex flex-wrap gap-3 text-muted small mb-4">
                            <div><i class="la la-user me-1"></i> تنظیم‌کننده: <strong>دپارتمان حقوقی امین</strong></div>
                            <div><i class="la la-clock me-1"></i> زمان مطالعه: حدود ۷ دقیقه</div>
                            <div><i class="la la-eye me-1"></i> بازدید: ۱۲۵۷</div>
                        </div>

                        <!-- Contract Content -->
                        <div class="contract-content mb-4">
                            {!! $contracts->text !!}
                        </div>

                        <!-- Description (e.g. موضوع / نکات تکمیلی) -->
                        <div class="contract-description mt-4">
                            {!! $contracts->description !!}
                        </div>

                        <!-- Download Form -->
                        <div class="text-center mt-5">
                            <form action="{{ url('invoice') }}" method="post" class="d-inline-block">
                                @csrf
                                <input type="hidden" name="id" value="{{ $contracts->id }}">
                                <input type="hidden" name="type" value="contracts">
                                <input type="hidden" name="price" value="{{ $contracts->price }}">
                                <input type="hidden" name="discount" value="{{ $contracts->discount }}">
                                <button type="submit" class="btn btn-success btn-lg px-5">
                                    <i class="la la-download me-2"></i> دریافت فایل
                                </button>
                            </form>
                        </div>

                    </div>
                </div>

                <!-- 👉 Sidebar -->
                <div class="col-lg-4">
                    <div class="border rounded-3 p-4 bg-white">
                        <h5 class="fw-bold mb-3">قراردادهای مشابه</h5>

                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none text-dark d-flex align-items-center">
                                    <i class="la la-file-alt me-2 text-primary"></i> قرارداد همکاری مشاوره‌ای
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none text-dark d-flex align-items-center">
                                    <i class="la la-file-alt me-2 text-primary"></i> قرارداد مشارکت در پروژه
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none text-dark d-flex align-items-center">
                                    <i class="la la-file-alt me-2 text-primary"></i> قرارداد محرمانگی اطلاعات (NDA)
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
