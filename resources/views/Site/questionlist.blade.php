@extends('master')
@section('style')
    @if($thispage->page_description)    <meta name="description"         content="{{$thispage->page_description}}">                    @endif
    @if(json_decode($thispage->keyword))<meta name="keyword"             content="{{implode("،" , json_decode($thispage->keyword))}}"> @endif
    <meta name="twitter:card"        content="summary" />
    @if($thispage->tab_title)           <meta name="twitter:title"       content="{{$thispage->tab_title}}" />                         @endif
    @if($thispage->page_description)    <meta name="twitter:description" content="{{$thispage->page_description}}" />                  @endif
    @if($thispage->tab_title)           <meta itemprop="name"            content="{{$thispage->tab_title}}">                           @endif
    @if($thispage->page_description)    <meta itemprop="description"     content="{{$thispage->page_description}}">                    @endif
    <meta property="og:url"          content="{{url()->current()}}" />
    @if($thispage->tab_title)           <meta property="og:title"        content="{{$thispage->tab_title}}"/>                          @endif
    @if($thispage->page_description)    <meta property="og:description"  content="{{$thispage->page_description}}" />                  @endif
    <link rel="canonical" href="{{url()->current()}}" />

    <link rel="stylesheet" href="{{asset('site/css/animated-headline.css')}}" />
    <title>{{$thispage->tab_title}}</title>
@endsection
@section('main')

    <section class="breadcrumb-area">
        <img @if($slides) src="{{asset('storage/'.$slides->file_link)}}" @else src="{{asset('site/images/img1.jpg')}}" @endif alt="" style="width: 100%">
    </section>

<section class="faq-topic-area section--padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="feature-heading-content-wrap text-center">
                    <div class="section-heading">
                        <h2 class="section__title pb-3">سوالات متداول حقوقی و قضایی</h2>
                        <p class="section__desc">شما می توانید یکی از موضوعات را جهت سرعت بخشیدن برای رسیدن به سوالاتتان انتخاب کنید</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <section class="my-courses-area pt-30px pb-90px bg-gray">
        <div class="container">
            <div class="my-course-content-wrap">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="all-course" role="tabpanel" aria-labelledby="all-course-tab">
                        <div class="my-course-body">
                            <form method="get" action="{{route('سوالات-متداول')}}" class="pt-2">
                                <div class="my-course-filter-wrap d-flex align-items-center pt-2">
                                    <div class="my-course-filter-item my-course-sort-by-content mr-2">
                                        <span class="fs-14 font-weight-semi-bold">دسته بندی سوالات</span>
                                        <div class="select-container w-100 pt-2">
                                            <select class="select-container-select" name="submenu_id">
                                                <option value="">انتخاب کنید</option>
                                                @foreach($submenuquestions as $submenu)
                                                    <option value="{{$submenu->id}}" {{request('submenu_id') == $submenu->id ? 'selected' : ''}}>{{$submenu->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="my-course-filter-item my-course-sort-by-content mr-2">
                                        <span class="fs-14 font-weight-semi-bold">زمان انتشار</span>
                                        <div class="select-container w-100 pt-2">
                                            <select class="select-container-select">
                                                <option value="" >انتخاب کنید</option>
                                                <option value="1">از جدید به قدیم</option>
                                                <option value="2">از قدیم به جدید</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="my-course-filter-item my-course-sort-by-content mr-2">
                                        <span class="fs-14 font-weight-semi-bold">براساس امتیاز</span>
                                        <div class="select-container w-100 pt-2">
                                            <select class="select-container-select">
                                                <option value="" >انتخاب کنید</option>
                                                <option value="1">از کم به زیاد</option>
                                                <option value="2">از زیاد به کم</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="my-course-filter-item my-course-search-content">
                                        <span class="fs-14 font-weight-semi-bold">جستجو کردن</span>
                                        <div class="input-group mb-0">
                                            <input class="form-control form--control form--control-gray pl-3" type="text" name="search" placeholder="جستجوی سوالات" />
                                            <div class="input-group-append">
                                                <button class="btn theme-btn shadow-none"><i class="la la-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<section class="faq-area section--padding">
    <div class="container">
        <div class="row">
                <div class="col-lg-12">
                <div id="accordion" class="generic-accordion generic-accordion-layout-2">
                    @foreach($questionlists as $questionlist)
                        <div class="card">
                            <div class="card-header" id="heading{{$questionlist->id}}">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse{{$questionlist->id}}" aria-expanded="false" aria-controls="collapse{{$questionlist->id}}">
                                    <i class="la la-plus"></i>
                                    <i class="la la-minus"></i>
                                    {{$questionlist->question}}
                                </button>
                            </div>
                            <div id="collapse{{$questionlist->id}}" class="collapse" aria-labelledby="heading{{$questionlist->id}}" data-parent="#accordion">
                                <div class="card-body">
                                    <p class="card-text">{{$questionlist->answer}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                    @if($questionlists->hasMorePages())
                        <div class="load-more-btn-box pt-5 text-center">
                            <button type="button" id="loadMore" class="btn theme-btn"><i class="la la-refresh mr-1"></i> بارگذاری بیشتر</button>
                        </div>
                    @endif
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
    <script>
        var page = {{ $questionlists->currentPage() }};
        var lastPage = {{ $questionlists->lastPage() }};
        var loading = false;

        $(document).ready(function() {
            $('#loadMore').on('click', function() {
                if (!loading && page < lastPage) {
                    loading = true;
                    page++;

                    // ارسال درخواست به سرور برای دریافت رکوردهای بیشتر
                    $.ajax({
                        url: '/سوالات-متداول?page=' + page, // تنظیم شناسه صفحه در URL
                        method: 'GET',
                        success: function(response) {
                            // افزودن رکوردهای دریافتی به انتهای لیست
                            $.each(response.data.data, function(index,question) {
                                var newCard = `
                                    <div class="card">
                                        <div class="card-header" id="heading${question.id}">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse${question.id}" aria-expanded="false" aria-controls="collapse${question.id}">
                                            <i class="la la-plus"></i>
                                            <i class="la la-minus"></i>
                                            ${question['question']}
                                            </button>
                                        </div>
                                        <div id="collapse${question.id}" class="collapse" aria-labelledby="heading${question.id}" data-parent="#accordion">
                                            <div class="card-body">
                                                <p class="card-text">${question['answer']}</p>
                                            </div>
                                        </div>
                                    </div>
                                `;

                               $('#accordion').append(newCard);
                            });

                            loading = false;
                        },
                        error: function(error) {
                            console.error('Error loading more records:', error);
                            loading = false;
                        }
                    });
                }
            });
        });
    </script>
@endsection
