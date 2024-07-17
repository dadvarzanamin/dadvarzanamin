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

<section class="gallery-area section--padding">
    <div class="container">
        <style>
            .fancybox-caption__body {direction: rtl;}
        </style>
        <div class="row">
            <div class="col-lg-12">
                <div class="generic-portfolio-list row">
                    @foreach($customers as $customer)
                        <div class="generic-portfolio-item col-lg-3 all">
                            <div class="generic-portfolio-content">
                                <a class="portfolio-link text-center" href="{{asset('storage/'.$customer->file_link)}}" data-fancybox="gallery" data-caption="{{$customer->description}}">
                                    <img class="card-img-top lazy" style="width: 50%" src="{{asset('storage/'.$customer->file_link)}}" alt="{{$customer->name}}" />
                                    <div class="icon-element icon-element-md">
                                        <i class="la la-magnet"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
