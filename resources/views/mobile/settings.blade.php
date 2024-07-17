@extends('mobile.mobilemaster')
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
<title>{{$thispage->tab_title}}</title>
@endsection
@section('main')
<div class="page">
    <div class="navbar navbar-page">
        <div class="navbar-inner sliding">
            <div class="left">
                <a href="#" class="link back">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>
            <div class="title">
                 تنظیمات حساب
            </div>
            <div class="right"></div>
        </div>
    </div>
    <div class="page-content">
        <!-- settings -->
        <div class="settings">
            <div class="list">
                <ul>
                    <li>
                        <a href="/edit-profile/" class="item-link item-content">
                            <div class="item-media">
                                <i class="fas fa-edit"></i>
                            </div>
                            <div class="item-inner">
                                <div class="item-title">ویرایش پروفایل</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/notification-settings/" class="item-link item-content">
                            <div class="item-media">
                                <i class="fas fa-bell"></i>
                            </div>
                            <div class="item-inner">
                                <div class="item-title">اطلاعات</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/email-settings/" class="item-link item-content">
                            <div class="item-media">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="item-inner">
                                <div class="item-title">ایمیل</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/password-settings/" class="item-link item-content">
                            <div class="item-media">
                                <i class="fas fa-key"></i>
                            </div>
                            <div class="item-inner">
                                <div class="item-title">رمز عبور</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/faq/" class="item-link item-content">
                            <div class="item-media">
                                <i class="fas fa-question"></i>
                            </div>
                            <div class="item-inner">
                                <div class="item-title">سوالات متداول</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="item-link smart-select smart-select-init">
                            <select name="language">
                                <option value="English" selected>انگلیسی</option>
                                <option value="persian" selected>فارسی</option>
                                <option value="Espanol">اسپانیایی</option>
                                <option value="Italiano">ایتالیایی</option>
                                <option value="Turkish">ترکی</option>
                                <option value="Arabic">عربی</option>
                                <option value="Denmark">دانمارک</option>
                                <option value="Nederlands">هلند</option>
                                <option value="French">فرانسوی</option>
                                <option value="Vietnamese">ویتنام</option>
                                <option value="Japanese">ژاپن</option>
                                <option value="Korean">کره</option>
                            </select>
                            <div class="item-content">
                                <div class="item-media">
                                    <i class="fas fa-language"></i>
                                </div>
                                <div class="item-inner">
                                    <div class="item-title">زبان</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item-link item-content">
                            <div class="item-media">
                                <i class="fas fa-power-off"></i>
                            </div>
                            <div class="item-inner">
                                <div class="item-title">خروج</div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- end settings -->
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
<script type="text/javascript">
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });
</script>
@endsection
