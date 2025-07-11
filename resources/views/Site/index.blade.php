@extends('master')
@section('style')
    @if($thispage->page_description)
        <meta name="description" content="{{$thispage->page_description}}">
    @endif
    @if(json_decode($thispage->keyword))
        <meta name="keywords" content="{{implode("،" , json_decode($thispage->keyword))}}">
    @endif
    <meta name="twitter:card" content="summary"/>
    @if($thispage->tab_title)
        <meta name="twitter:title" content="{{$thispage->tab_title}}"/>
    @endif
    @if($thispage->page_description)
        <meta name="twitter:description" content="{{$thispage->page_description}}"/>
    @endif
    @if($thispage->tab_title)
        <meta itemprop="name" content="{{$thispage->tab_title}}">
    @endif
    @if($thispage->page_description)
        <meta itemprop="description" content="{{$thispage->page_description}}">
    @endif
    <meta property="og:url" content="{{url()->current()}}"/>
    @if($thispage->tab_title)
        <meta property="og:title" content="{{$thispage->tab_title}}"/>
    @endif
    @if($thispage->page_description)
        <meta property="og:description" content="{{$thispage->page_description}}"/>
    @endif
    <link rel="canonical" href="{{url()->current()}}"/>
    <title>{{$thispage->tab_title}}</title>
@endsection
@section('main')

    <!-- Modal -->
    <div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h5 class="modal-title" id="qrModalLabel">دانلود اپلیکیشن</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="بستن"></button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('site/images/qr-code.svg') }}" alt="QR Code" style="max-width: 300px;">
                    <p class="mt-3">برای دانلود اپلیکیشن کد را اسکن کنید</p>
                </div>
            </div>
        </div>
    </div>


    <section class="hero-area">
        {{--        <div class="hero-slider owl-action-styled">--}}
        {{--            @foreach($slides as $slide)--}}
        {{--                <div class="hero-slider-item">--}}
        {{--                    <img src="{{asset('storage/'.$slide->file_link)}}" alt="{{$companies['title']}}">--}}
        {{--                </div>--}}
        {{--            @endforeach--}}
        {{--        </div>--}}
        <div class="container-fluid px-5">
            <img src="{{asset('./site/images/home-banner.webp')}}" width=100% alt="" class="br-24">
        </div>
        <div class="hero-feature-wrap overflow-hidden savabegh mx-5 my-3 br-24">
            <span class="ring-shape ring--shape ring-shape-1"></span>
            <span class="ring-shape ring--shape ring-shape-2"></span>
            <span class="ring-shape ring--shape ring-shape-3"></span>
            <div class="container mt-10px mb-10px">
                <div class="row">
                    <div class="col-lg-4 responsive-column-half">
                        <div class="info-icon-box d-flex align-items-center justify-content-center py-2">
                            <div class="icon-element icon-element-md flex-shrink-0 mr-3">
                                <svg class="svg-icon-color-1" width="32" viewBox="0 0 512 512"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path
                                            d="m181.022 142.59-8.659 3.138c-13.364 4.846-23.334 16.536-26.021 30.517l-2.938 15.396c-1.466 7.626.53 15.436 5.479 21.425 4.951 5.995 12.251 9.433 20.025 9.433h75.057c7.714 0 14.977-3.393 19.927-9.309 4.946-5.911 7.004-13.65 5.646-21.233l-2.74-15.315c-2.539-14.201-12.542-26.081-26.108-31.004l-9.18-3.327v-13.53c0-.38-.037-.75-.092-1.115 6.697-6.818 10.533-16.115 10.533-25.627v-20.159c0-19.678-16.01-35.687-35.689-35.687s-35.692 16.009-35.692 35.687v20.787c0 9.778 4.032 18.705 10.515 25.188-.038.304-.063.611-.063.925zm71.008 36.692 2.74 15.317c.574 3.201-.295 6.468-2.384 8.964-2.092 2.5-5.162 3.935-8.423 3.935h-75.057c-3.285 0-6.369-1.452-8.461-3.985-2.088-2.528-2.931-5.823-2.311-9.05l2.938-15.396c1.693-8.812 7.979-16.183 16.4-19.236l5.672-2.055c.142.146.285.293.439.428 6.463 5.651 14.57 8.477 22.682 8.476 8.102 0 16.207-2.82 22.671-8.46.233-.203.447-.422.651-.65l5.983 2.169c8.554 3.102 14.86 10.59 16.46 19.543zm-66.46-97.402c0-11.406 9.281-20.687 20.689-20.687 9.628 0 17.718 6.62 20.015 15.54-.964.471-1.953.916-2.966 1.321-9.222 3.692-16.671 3.202-18.8 1.71-3.392-2.378-8.068-1.558-10.447 1.834-2.378 3.392-1.557 8.068 1.834 10.447 3.663 2.569 8.635 3.853 14.309 3.853 5.155 0 10.89-1.071 16.745-3.19v9.329c0 5.733-2.371 11.347-6.506 15.402-1.914 1.878-4.107 3.333-6.462 4.337-.165.063-.327.131-.486.205-2.419.957-5.003 1.438-7.644 1.369-11.184-.215-20.281-9.494-20.281-20.684zm19.993 56.469c.229.004.456.006.685.006 3.519 0 6.967-.529 10.261-1.544v11.999c-6.251 3.854-14.242 3.852-20.485-.006v-11.971c3.034.919 6.231 1.452 9.539 1.516z"
                                        ></path>
                                        <path
                                            d="m88.264 350.904h233.57c4.143 0 7.5-3.357 7.5-7.5s-3.357-7.5-7.5-7.5h-233.57c-4.143 0-7.5 3.357-7.5 7.5s3.357 7.5 7.5 7.5z"></path>
                                        <path
                                            d="m88.264 391.345h233.57c4.143 0 7.5-3.357 7.5-7.5s-3.357-7.5-7.5-7.5h-233.57c-4.143 0-7.5 3.357-7.5 7.5s3.357 7.5 7.5 7.5z"></path>
                                        <path
                                            d="m88.264 431.784h233.57c4.143 0 7.5-3.357 7.5-7.5s-3.357-7.5-7.5-7.5h-233.57c-4.143 0-7.5 3.357-7.5 7.5s3.357 7.5 7.5 7.5z"></path>
                                        <path
                                            d="m88.264 472.225h233.57c4.143 0 7.5-3.357 7.5-7.5s-3.357-7.5-7.5-7.5h-233.57c-4.143 0-7.5 3.357-7.5 7.5s3.357 7.5 7.5 7.5z"></path>
                                        <path
                                            d="m80.764 262.524c0 4.143 3.357 7.5 7.5 7.5h233.57c4.143 0 7.5-3.357 7.5-7.5s-3.357-7.5-7.5-7.5h-233.57c-4.143 0-7.5 3.358-7.5 7.5z"></path>
                                        <path
                                            d="m88.264 310.464h233.57c4.143 0 7.5-3.357 7.5-7.5s-3.357-7.5-7.5-7.5h-233.57c-4.143 0-7.5 3.357-7.5 7.5s3.357 7.5 7.5 7.5z"></path>
                                        <path
                                            d="m60.569 350.932c4.158 0 7.529-3.37 7.529-7.528 0-4.157-3.371-7.528-7.529-7.528s-7.528 3.37-7.528 7.528 3.371 7.528 7.528 7.528z"></path>
                                        <path
                                            d="m60.569 270.052c4.158 0 7.529-3.37 7.529-7.528s-3.371-7.528-7.529-7.528-7.528 3.37-7.528 7.528 3.371 7.528 7.528 7.528z"></path>
                                        <path
                                            d="m60.569 310.492c4.158 0 7.529-3.37 7.529-7.528s-3.371-7.528-7.529-7.528-7.528 3.37-7.528 7.528 3.371 7.528 7.528 7.528z"></path>
                                        <path
                                            d="m60.569 391.372c4.158 0 7.529-3.37 7.529-7.528s-3.371-7.528-7.529-7.528-7.528 3.37-7.528 7.528 3.371 7.528 7.528 7.528z"></path>
                                        <path
                                            d="m60.569 431.813c4.158 0 7.529-3.37 7.529-7.528s-3.371-7.528-7.529-7.528-7.528 3.37-7.528 7.528c0 4.157 3.371 7.528 7.528 7.528z"></path>
                                        <path
                                            d="m60.569 472.253c4.158 0 7.529-3.37 7.529-7.528 0-4.157-3.371-7.528-7.529-7.528s-7.528 3.37-7.528 7.528c0 4.157 3.371 7.528 7.528 7.528z"></path>
                                        <path
                                            d="m485.63 118.121c-3.026-3.83-5.886-7.449-7.269-10.783-1.492-3.599-2.08-8.354-2.702-13.39-1.091-8.822-2.327-18.821-9.305-25.798s-16.978-8.213-25.8-9.304c-5.037-.622-9.794-1.21-13.393-2.702-3.335-1.383-6.953-4.241-10.784-7.268-5.271-4.165-11.068-8.738-17.922-10.813v-2.269c.001-19.736-16.058-35.794-35.797-35.794h-312.444c-19.739 0-35.798 16.058-35.798 35.795v28.949c0 4.143 3.357 7.5 7.5 7.5s7.5-3.357 7.5-7.5v-28.949c0-11.467 9.33-20.795 20.798-20.795h312.444c11.468 0 20.798 9.328 20.798 20.795v2.27c-6.852 2.076-12.647 6.647-17.918 10.812-3.831 3.026-7.449 5.885-10.783 7.268-3.599 1.491-8.356 2.079-13.393 2.702-8.822 1.09-18.821 2.326-25.8 9.303-6.979 6.978-8.215 16.977-9.306 25.799-.622 5.035-1.21 9.791-2.702 13.39-1.383 3.334-4.242 6.953-7.269 10.783-5.604 7.091-11.954 15.128-11.954 25.417s6.351 18.326 11.954 25.417c3.026 3.83 5.886 7.449 7.269 10.783 1.492 3.599 2.08 8.354 2.702 13.391 1.091 8.821 2.327 18.82 9.305 25.797 6.978 6.978 16.978 8.213 25.8 9.304 2.63.325 5.179.644 7.532 1.084v113.367c0 4.443 2.48 8.411 6.473 10.355 3.992 1.947 8.645 1.453 12.146-1.288l15.943-12.483v136.94c0 11.467-9.33 20.795-20.798 20.795h-312.443c-11.468 0-20.798-9.328-20.798-20.795v-378.435c0-4.143-3.357-7.5-7.5-7.5s-7.5 3.357-7.5 7.5v378.434c0 19.737 16.059 35.795 35.798 35.795h312.444c19.739 0 35.798-16.058 35.798-35.795v-136.94l15.943 12.482c2.081 1.63 4.571 2.466 7.089 2.466 1.716 0 3.444-.389 5.064-1.178 3.994-1.944 6.476-5.912 6.476-10.354v-83.697c0-4.143-3.357-7.5-7.5-7.5s-7.5 3.357-7.5 7.5v76.555l-19.937-15.609c-2.015-1.595-4.549-2.474-7.136-2.474s-5.121.879-7.104 2.448l-19.959 15.627v-98.625c.544.426 1.091.857 1.645 1.294 7.092 5.604 15.13 11.953 25.42 11.953 10.289 0 18.327-6.35 25.419-11.952 3.831-3.026 7.45-5.886 10.784-7.269 3.599-1.491 8.356-2.079 13.393-2.702 8.822-1.09 18.821-2.326 25.801-9.303 6.977-6.978 8.213-16.977 9.304-25.798.623-5.036 1.211-9.792 2.703-13.391 1.383-3.334 4.242-6.953 7.269-10.783 5.604-7.091 11.954-15.128 11.954-25.417s-6.351-18.326-11.954-25.417zm-11.769 41.534c-3.528 4.465-7.176 9.081-9.355 14.337-2.273 5.48-3.016 11.487-3.734 17.296-.871 7.046-1.693 13.701-5.023 17.031-3.331 3.33-9.987 4.152-17.034 5.023-5.81.718-11.816 1.46-17.298 3.733-5.256 2.179-9.872 5.826-14.337 9.354-5.679 4.485-11.042 8.723-16.121 8.723s-10.442-4.237-16.121-8.723c-4.465-3.527-9.081-7.175-14.337-9.354-.362-.15-1.618-.628-1.889-.712-4.957-1.724-10.26-2.385-15.41-3.021-7.047-.871-13.703-1.694-17.034-5.024-3.329-3.329-4.152-9.984-5.023-17.029-.718-5.81-1.46-11.815-3.733-17.297-2.18-5.256-5.827-9.872-9.355-14.337-4.485-5.678-8.723-11.04-8.723-16.117s4.237-10.439 8.723-16.117c3.528-4.465 7.176-9.081 9.355-14.337 2.273-5.48 3.016-11.487 3.733-17.296.871-7.046 1.694-13.701 5.024-17.031 3.331-3.33 9.987-4.152 17.034-5.023 5.81-.718 11.816-1.46 17.298-3.733 5.256-2.179 9.872-5.826 14.337-9.354 5.667-4.477 11.021-8.705 16.091-8.721.009 0 .019.001.028.001.01 0 .02-.001.03-.001 5.071.015 10.425 4.244 16.093 8.721 4.465 3.527 9.081 7.175 14.337 9.354 5.481 2.273 11.489 3.016 17.299 3.733 7.047.871 13.703 1.694 17.033 5.024s4.153 9.984 5.024 17.03c.718 5.809 1.46 11.815 3.733 17.296 2.18 5.256 5.827 9.872 9.355 14.337 4.485 5.678 8.723 11.04 8.723 16.117s-4.237 10.44-8.723 16.117z"
                                        ></path>
                                        <path
                                            d="m439.109 119.704-25.522-7.221-14.757-22.04c-1.763-2.632-4.705-4.202-7.872-4.202s-6.11 1.571-7.872 4.202l-14.757 22.04-25.524 7.222c-3.048.863-5.452 3.178-6.43 6.19s-.392 6.297 1.566 8.783l16.403 20.843-1.018 26.497c-.123 3.166 1.333 6.168 3.896 8.031 1.645 1.195 3.594 1.813 5.565 1.813 1.102 0 2.21-.193 3.274-.585l24.895-9.158 24.893 9.157c2.973 1.096 6.276.636 8.839-1.225s4.021-4.862 3.899-8.029l-1.018-26.502 16.404-20.843c1.958-2.489 2.543-5.772 1.564-8.784-.975-3.012-3.379-5.326-6.428-6.189zm-24.587 28.143c-1.386 1.764-2.103 3.97-2.018 6.219l.778 20.284-19.053-7.009c-2.111-.777-4.436-.776-6.543-.001l-19.055 7.01.779-20.291c.084-2.241-.634-4.447-2.023-6.217l-12.554-15.952 19.539-5.527c2.161-.613 4.04-1.979 5.289-3.845l11.295-16.87 11.294 16.868c1.25 1.867 3.129 3.233 5.294 3.848l19.535 5.526z"
                                        ></path>
                                    </g>
                                </svg>
                            </div>
                            <div>
                                <h4 class="fs-18 font-weight-bold text-white">500+ پرونده موفق</h4>
                                <p class="text-white">انواع موضوعات قضایی و دعاوی</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 responsive-column-half">
                        <div class="info-icon-box d-flex align-items-center justify-content-center py-2">
                            <div class="icon-element icon-element-md flex-shrink-0 mr-3">
                                <svg class="svg-icon-color-2" width="32" version="1.1"
                                     xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 490.667 490.667"
                                     xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path
                                                        d="M245.333,85.333c-41.173,0-74.667,33.493-74.667,74.667s33.493,74.667,74.667,74.667S320,201.173,320,160
                                                C320,118.827,286.507,85.333,245.333,85.333z M245.333,213.333C215.936,213.333,192,189.397,192,160
                                                c0-29.397,23.936-53.333,53.333-53.333s53.333,23.936,53.333,53.333S274.731,213.333,245.333,213.333z"
                                                    ></path>
                                                </g>
                                            </g>
                                    <g>
                                        <g>
                                            <path
                                                d="M394.667,170.667c-29.397,0-53.333,23.936-53.333,53.333s23.936,53.333,53.333,53.333S448,253.397,448,224
                                                S424.064,170.667,394.667,170.667z M394.667,256c-17.643,0-32-14.357-32-32c0-17.643,14.357-32,32-32s32,14.357,32,32
                                                C426.667,241.643,412.309,256,394.667,256z"
                                            ></path>
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path
                                                d="M97.515,170.667c-29.419,0-53.333,23.936-53.333,53.333s23.936,53.333,53.333,53.333s53.333-23.936,53.333-53.333
                                                S126.933,170.667,97.515,170.667z M97.515,256c-17.643,0-32-14.357-32-32c0-17.643,14.357-32,32-32c17.643,0,32,14.357,32,32
                                                C129.515,241.643,115.157,256,97.515,256z"
                                            ></path>
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path
                                                d="M245.333,256c-76.459,0-138.667,62.208-138.667,138.667c0,5.888,4.779,10.667,10.667,10.667S128,400.555,128,394.667
                                                c0-64.704,52.629-117.333,117.333-117.333s117.333,52.629,117.333,117.333c0,5.888,4.779,10.667,10.667,10.667
                                                c5.888,0,10.667-4.779,10.667-10.667C384,318.208,321.792,256,245.333,256z"
                                            ></path>
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path
                                                d="M394.667,298.667c-17.557,0-34.752,4.8-49.728,13.867c-5.013,3.072-6.635,9.621-3.584,14.656
                                                c3.093,5.035,9.621,6.635,14.656,3.584C367.637,323.712,380.992,320,394.667,320c41.173,0,74.667,33.493,74.667,74.667
                                                c0,5.888,4.779,10.667,10.667,10.667c5.888,0,10.667-4.779,10.667-10.667C490.667,341.739,447.595,298.667,394.667,298.667z"
                                            ></path>
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path
                                                d="M145.707,312.512c-14.955-9.045-32.149-13.845-49.707-13.845c-52.928,0-96,43.072-96,96
                                                c0,5.888,4.779,10.667,10.667,10.667s10.667-4.779,10.667-10.667C21.333,353.493,54.827,320,96,320
                                                c13.675,0,27.029,3.712,38.635,10.752c5.013,3.051,11.584,1.451,14.656-3.584C152.363,322.133,150.741,315.584,145.707,312.512z"
                                            ></path>
                                        </g>
                                    </g>
                                        </svg>
                            </div>
                            <div>
                                <h4 class="fs-18 font-weight-bold text-white"> وکلای خبره</h4>
                                <p class="text-white">همکاری با بیش از 40 وکیل خبره </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 responsive-column-half">
                        <div class="info-icon-box d-flex align-items-center justify-content-center py-2">
                            <div class="icon-element icon-element-md flex-shrink-0 mr-3">
                                <svg class="svg-icon-color-3" viewBox="0 0 24 24" width="32"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path
                                            d="m15.5 12.5h-15c-.276 0-.5-.224-.5-.5s.224-.5.5-.5h15c.276 0 .5.224.5.5s-.224.5-.5.5z"></path>
                                    </g>
                                    <g>
                                        <path
                                            d="m11.5 16.5c-.128 0-.256-.049-.354-.146-.195-.195-.195-.512 0-.707l3.647-3.647-3.646-3.646c-.195-.195-.195-.512 0-.707s.512-.195.707 0l4 4c.195.195.195.512 0 .707l-4 4c-.098.097-.226.146-.354.146z"
                                        ></path>
                                    </g>
                                    <g>
                                        <path
                                            d="m12 23c-4.655 0-8.823-2.947-10.372-7.333-.092-.261.045-.546.305-.638.261-.09.546.045.638.305 1.408 3.987 5.197 6.666 9.429 6.666 5.514 0 10-4.486 10-10s-4.486-10-10-10c-4.232 0-8.021 2.679-9.428 6.667-.092.26-.378.395-.638.305-.26-.092-.397-.377-.305-.638 1.548-4.387 5.716-7.334 10.371-7.334 6.065 0 11 4.935 11 11s-4.935 11-11 11z"
                                        ></path>
                                    </g>
                                </svg>
                            </div>
                            <div>
                                <h4 class="fs-18 font-weight-bold text-white">دسترسی سریع و هوشمند</h4>
                                <p class="text-white">خدمات الکترونیک و هوشمند وکالتی</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="category-area section-padding text-center my-2">
        <div class="container">
            <div class="section-heading">
                <h1 class="section__title mb-3" style="font-size: 25px">موسسه حقوقی دادورزان امین</h1>
                <p>شرکت حقوقی با وکلای حرفه‌ای و مجرب، حقوق مهاجرتی و مشاوره مالیاتی و مشاوره حقوقی دادگستری و کلیه امور
                    وکالتی
                </p>
            </div>
        </div>
    </section>
    @if($workshops->count() > 0)
        <section class="course-area pb-90px">
            <div class="course-wrapper">
                <div class="container">
                    <div class="section-heading text-center">
                        <h2 class="section__title">کارگاه های ما</h2>
                        <span class="section-divider"></span>
                    </div>
                    <!-- end section-heading -->
                    <div class="course-carousel owl-carousel owl-action-styled mt-30px">
                        @foreach($workshops as $workshop)
                            <div class="card card-item card-preview"
                                 data-tooltip-content="#tooltip_content_{{ $loop->index }}">
                                <div class="card-image">
                                    <a href="{{ url('دپارتمان-اموزش-و-پژوهش/دوره-های-آموزشی/' . $workshop->slug) }}"
                                       class="d-block">
                                        <img class="card-img-top" src="{{ asset('storage/'.$workshop->image) }}"
                                             alt="{{ $workshop->title }}">
                                    </a>
                                    <div class="course-badge-labels">
                                        {{--                                    <div class="course-badge">کتاب پرفروش</div>--}}
                                        <div class="course-badge blue">
                                            @if($workshop->status==4)
                                                فعال
                                            @elseif($workshop->status==3)
                                                پایان دوره
                                            @elseif($workshop->status==2)
                                                تکمیل ظرفیت
                                            @elseif($workshop->status==1)
                                                اتمام مهلت ثبت نام
                                            @endif
                                        </div>
                                    </div>
                                </div><!-- end card-image -->
                                <div class="card-body">
                                    <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">{{ $workshop->teacher }}</h6>
                                    <h5 class="card-title"><a
                                            href="{{ url('دپارتمان-اموزش-و-پژوهش/دوره-های-آموزشی/' . $workshop->slug) }}">{{ $workshop->title }}</a>
                                    </h5>
                                    {{--                                <p class="card-text"><a href="{{ url('دپارمان-اموزش-و-پژوهش/دوره-های-آموزشی/' . $workshop->slug) }}">{{ $workshop->teacher }}</a></p>--}}
                                    <span class="section-divider"></span>
                                    <h6>اهداف دوره</h6>
                                    <p>{!! $workshop->target !!}</p>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="card-price text-black font-weight-bold">
                                            {{ $workshop->price }} تومان
                                            @if($workshop->offer)
                                                <span
                                                    class="before-price font-weight-medium">{{ $workshop->offer }}</span>
                                            @endif
                                        </p>
                                    </div>
                                </div><!-- end card-body -->
                            </div><!-- end card -->
                        @endforeach
                    </div>
                    <!-- end course-carousel -->
                </div>
                <!-- end container -->
            </div>
            <!-- end course-wrapper -->
        </section>
    @endif
    <section class="client-logo-area section-padding position-relative overflow-hidden text-center my-4">
        <div class="container">
            <div class="section-heading">
                <h2 class="section__title mb-4">برخی از موکلین</h2>
            </div>
            <div class="client-logo-carousel owl-carousel owl-theme my-4 br-16">
                @foreach($customers as $customer)
                    <div class="item">
                        <a href="#" class="client-logo-item" style="width:100px">
                            <img src="{{ asset($customer->image) }}" alt="{{ $customer->name }}"/>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{--  End partners Area  --}}

    {{--  Start Peoples Services Area  --}}
    <section class="get-started-area section--padding position-relative overflow-hidden">
        <span class="stroke-shape stroke-shape-1"></span>
        <span class="stroke-shape stroke-shape-2"></span>
        <span class="stroke-shape stroke-shape-3"></span>
        <span class="stroke-shape stroke-shape-4"></span>
        <span class="stroke-shape stroke-shape-5"></span>
        <span class="stroke-shape stroke-shape-6"></span>
        <div class="container">
            <div class="section-heading text-center">
                <h2 class="section__title">خدمات برای موکلین</h2>
                <span class="section-divider"></span>
            </div>
            <div class="blog-post-carousel owl-carousel owl-theme owl-action-styled half-shape">
                @foreach($servicelawyers as $servicelawyer)
                    <div class="item text-center">
                        <div class="icon-element icon-element-lg shadow-sm"
                             style="margin-bottom: -70px; position: relative;">
                            <img src="{{ asset($servicelawyer->image) }}"
                                 style="width: 100px; margin: 25px auto;"
                                 alt="{{ $servicelawyer->title }}">
                        </div>
                        <div class="category-item category-item-layout-2 br-16" style="position: initial;">
                            <a href="{{ url('خدمات/'.$servicelawyer->slug) }}" class="category-content">
                                <h3 class="cat__title">{{ $servicelawyer->title }}</h3>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    {{--  Start Peoples Services Area  --}}
    <section class="get-started-area section--padding position-relative overflow-hidden">
        <span class="stroke-shape stroke-shape-1"></span>
        <span class="stroke-shape stroke-shape-2"></span>
        <span class="stroke-shape stroke-shape-3"></span>
        <span class="stroke-shape stroke-shape-4"></span>
        <span class="stroke-shape stroke-shape-5"></span>
        <span class="stroke-shape stroke-shape-6"></span>
        <div class="container">
            <div class="section-heading text-center">
                <h2 class="section__title">خدمات برای وکلا</h2>
                <span class="section-divider"></span>
            </div>
            <div class="blog-post-carousel owl-carousel owl-theme owl-action-styled half-shape">
                @foreach($serviceclients as $serviceclient)
                    <div class="col-lg-12 responsive-column-half text-center bg-black">
                        <div class="icon-element icon-element-lg shadow-sm"
                             style="margin-bottom: -70px;position: relative;">
                            <img src="{{asset($serviceclient->image)}}" style="width: 100px;margin: 25px auto;"
                                 alt="{{$serviceclient->title}}">
                        </div>
                        <div class="category-item category-item-layout-2 br-16" style="position: initial;">
                            <a href="{{url('خدمات/'.$serviceclient->slug)}}" class="category-content">
                                <h3 class="cat__title">{{$serviceclient->title}}</h3>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{--  End Peoples Services Area  --}}

    {{--  Start events cards  --}}
    <section class="blog-area section--padding overflow-hidden my-5">
        <div class="container">
            <div class="section-heading text-center">
                <h2 class="section__title">اخبار و رویداد های حقوقی</h2>
                <span class="section-divider"></span>
            </div>
            <div class="blog-post-carousel owl-carousel owl-theme owl-action-styled half-shape br-16">
                @foreach($akhbars as $akhbar)
                    <div class="item">
                        <div class="card card-item card-preview br-16 my-5" data-tooltip-content="#tooltip_content_1">
                            <div class="card-image br-16">
                                <a href="{{ url('اخبار/'.$akhbar->slug) }}" class="d-block">
                                    <img class="card-img-top img-index" src="{{ asset($akhbar->image) }}" alt="{{ $akhbar->title }}">
                                </a>
                                <div class="course-badge-labels">
                                    <div class="course-badge">{{ jdate($akhbar->updated_at)->ago() }}</div>
                                </div>
                            </div>
                            <div class="card-body pb-1">
                                <h3 class="card-title" style="font-size: 16px">
                                    <a href="{{ url('اخبار/'.$akhbar->slug) }}">{{ $akhbar->title }}</a>
                                </h3>
                                <div class="line"></div>
                                <div class="rating-wrap d-flex align-items-center justify-content-center py-2">
                                    <a href="{{ url('اخبار/'.$akhbar->slug) }}" class="btn theme-btn theme-btn-sm theme-btn-transparent">
                                        مشاهده
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
    {{--  End events cards  --}}

    {{--  Start About Area  --}}
    <section class="about-area section--padding overflow-hidden bg-dark my-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-content pb-5">
                        <div class="section-heading">
                            <h2 class="section__title dark-bg-h">ارائه دهنده خدمات جامع حقوقی به سبکی نوین</h2>
                            <span class="section-divider"></span>
                            <p class="section__desc text-justify" style="color: white">
                                تفاوتی ندارد یک کسب و کار کوچک داشته باشید یا یک هلدینگ بین المللی، در برابر چالش‌های
                                حقوقی همواره نیاز به یک مشاور حقوقی با تجربه و قراردادهای منسجم خواهید داشت. موسسه حقوقی
                                دادورزان امین، این امکان را برای شما به ارمغان آورده است تا تمام امور حقوقی و ثبتی خود
                                را بدون دغدغه و به صورت یکپارچه به تیم متخصص و باتجربه‌ای بسپارید که سال‌ها در این حوزه
                                فعالیت داشته و به انواع مسائل و قوانین کسب و کار تسلط بالایی دارند
                            </p>
                        </div>
                        <div class="row pt-4 pb-3">
                            <div class="col-lg-4 responsive-column-half">
                                <div class="info-icon-box mb-3">
                                    <h4 class="fs-18 font-weight-semi-bold pt-3 dark-bg-h">300+ کسب وکار</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 responsive-column-half">
                                <div class="info-icon-box mb-3">
                                    <h4 class="fs-18 font-weight-semi-bold pt-3 dark-bg-h">600+ دقیقه مشاور</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 responsive-column-half">
                                <div class="info-icon-box mb-3">
                                    <h4 class="fs-18 font-weight-semi-bold pt-3 dark-bg-h">10+ سال تجربه</h4>
                                </div>
                            </div>
                        </div>
                        <div class="btn-box">
                            <a href="{{url('تیم-ما/درباره-ما')}}" class="btn theme-btn br-8">بیشتر بدانید </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 ml-auto">
                    <div class="generic-img-box d-none d-md-block">
                        <img src="{{asset('site/images/img-loading.png')}}" data-src="site/images/img13.jpg"
                             alt="موسسه حقوقی" class="img__item img__item-1 lazy">
                        <img src="{{asset('site/images/img-loading.png')}}" data-src="site/images/img14.jpg"
                             alt="شرکت حقوقی" class="img__item img__item-2 lazy">
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--  End About Area  --}}

    {{--  Start Courses Area  --}}
    <section class="blog-area section--padding overflow-hidden">
        <div class="container">
            <div class="section-heading text-center">
                <h2 class="section__title">محتوای آموزشی حقوقی</h2>
                <span class="section-divider"></span>
            </div>
            <div class="blog-post-carousel owl-carousel owl-action-styled half-shape">
                @foreach($posts as $post)

                    <div class="card item card-item card-preview br-16" data-tooltip-content="#tooltip_content_1">
                        <div class="card-image">
                            <a href="{{url('محتوای-آموزشی/'.$post->slug)}}" class="d-block">
                                <img class="card-img-top img-index" src="{{asset($post->image)}}"
                                     alt="{{$post->title}}">
                            </a>
                            <div class="course-badge-labels">
                                <div class="course-badge">{{jdate($post->updated_at)->ago()}}</div>
                            </div>
                        </div>
                        <div class="card-body br-16">
                            <h3 class="card-title" style="font-size: 16px"><a href="#">{{$post->title}}</a></h3>
                            <p class="card-text">
                                {{ Str::words(preg_replace('/&[^;]+;/', ' ', strip_tags($post->description)), 10, ' ...') }}
                            </p>
                            <div class="line"></div>
                            <div class="rating-wrap d-flex align-items-center justify-content-center pt-3">
                                <a href="{{url('محتوای-آموزشی/'.$post->slug)}}"
                                   class="btn theme-btn theme-btn-sm theme-btn-transparent">مشاهده</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{--  End Courses Area  --}}

    {{--  Start Team Area  --}}
    <section class="blog-area section--padding overflow-hidden">
        <div class="container">
            <div class="section-heading text-center">
                <h2 class="section__title">تیم ما</h2>
                <span class="section-divider"></span>
            </div>
            <div class="blog-post-carousel owl-carousel owl-theme owl-action-styled half-shape">
                @foreach($emploees as $emploee)
                    <div class="item">
                        <a href="{{ url('تیم-ما/رزومه/'.$emploee->slug) }}">
                            <div class="card card-item member-card text-center br-16">
                                <div class="card-image">
                                    <img class="card-img-top" src="{{ asset($emploee->image) }}" alt="{{ $emploee->fullname }}"/>
                                </div>
                                <div class="card-body">
                                    <h2 class="card-title">{{ $emploee->fullname }}</h2>
                                    <p class="card-text">{{ $emploee->side }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
    {{--  End Team Area  --}}

    {{--    --}}{{--  Start Contact Area  --}}
    {{--    <section class="cat-area section-padding img-bg img-bg-4">--}}
    {{--        <span class="ring-shape ring-shape-1"></span>--}}
    {{--        <span class="ring-shape ring-shape-2"></span>--}}
    {{--        <span class="ring-shape ring-shape-3"></span>--}}
    {{--        <span class="ring-shape ring-shape-4"></span>--}}
    {{--        <span class="ring-shape ring-shape-5"></span>--}}
    {{--        <span class="ring-shape ring-shape-6"></span>--}}
    {{--        <span class="ring-shape ring-shape-7"></span>--}}
    {{--        <div class="container">--}}
    {{--            <div class="cta-content-wrap text-center position-relative">--}}
    {{--                <div class="section-heading">--}}
    {{--                    <h2 class="section__title fs-18 lh-60 text-white">برای هرگونه سوال و یا درخواست با مشاورین <strong>موسسه حقوقی دادورزان امین</strong> تماس حاصل نمایید. </h2>--}}
    {{--                </div>--}}
    {{--                <div class="cat-btn-box mt-35px">--}}
    {{--                    <a href="tel:+982188438191" class="btn theme-btn theme-btn-white">تماس باما </a>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    {{--    --}}{{--  End Contact Area  --}}

@endsection
@section('script')
    @if($currentws)
        {{--        <script>--}}
        {{--            // Set the date we're counting down to--}}
        {{--            var countDownDate = new Date("{{ \Morilog\Jalali\Jalalian::fromFormat('Y/m/d', $currentws->date)->toCarbon()->format('Y-m-d H:i:s') }}").getTime();--}}

        {{--            // Update the count down every 1 second--}}
        {{--            var x = setInterval(function () {--}}
        {{--                // Get today's date and time--}}
        {{--                var now = new Date().getTime();--}}

        {{--                // Find the distance between now and the count down date--}}
        {{--                var distance = countDownDate - now;--}}

        {{--                // Time calculations for days, hours, minutes and seconds--}}
        {{--                var days = Math.floor(distance / (1000 * 60 * 60 * 24));--}}
        {{--                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));--}}
        {{--                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));--}}
        {{--                var seconds = Math.floor((distance % (1000 * 60)) / 1000);--}}

        {{--                // Display the result in the elements with IDs--}}
        {{--                document.getElementById("days").innerHTML = days;--}}
        {{--                document.getElementById("hours").innerHTML = hours;--}}
        {{--                document.getElementById("minutes").innerHTML = minutes;--}}
        {{--                document.getElementById("seconds").innerHTML = seconds;--}}

        {{--                // If the count down is finished, write some text--}}
        {{--                if (distance < 0) {--}}
        {{--                    clearInterval(x);--}}
        {{--                    document.getElementById("days").innerHTML = "EXPIRED";--}}
        {{--                    document.getElementById("hours").innerHTML = "EXPIRED";--}}
        {{--                    document.getElementById("minutes").innerHTML = "EXPIRED";--}}
        {{--                    document.getElementById("seconds").innerHTML = "EXPIRED";--}}
        {{--                }--}}
        {{--            }, 1000);--}}
        {{--        </
        >--}}
    @endif
    <script>
        jQuery(document).ready(function () {
            jQuery('#setclass').click(function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                swal({
                        title: "Are you sure to delete this  of ?",
                        text: "Delete Confirmation?",
                        type: "warning",
                        showCancelButton: false,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Delete",
                        closeOnConfirm: false
                    },
                    jQuery.ajax({
                        url: "{{route('setclass')}}",
                        method: 'POST',
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function (data) {
                            if (data.success == true) {
                                swal(data.subject, data.message, data.flag);
                            } else {
                                swal(data.subject, data.message, data.flag);
                            }
                        },
                    }));
            });
        });

    </script>

    <script>
        window.addEventListener('load', function() {
            var myModal = new bootstrap.Modal(document.getElementById('qrModal'));
            myModal.show();
        });
    </script>

@endsection
