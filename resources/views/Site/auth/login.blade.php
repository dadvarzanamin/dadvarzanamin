@extends('layouts.user')
@section('title')
    <title>ورود کاربران سایت</title>

@endsection
@section('main')
    @include('sweetalert::alert')

<body class="d-flex">
<div class="container login-bg align-content-center">
    <div class="row">
        <div class="col-lg">
            <section class="page-account-box">
                <div class="col-lg-3 col-md-6 col-xs-12 mx-auto">
                    <div class="ds-userlogin align-items-center" style="text-align: center;">
                        <div class="account-box">
                            <div class="account-box-headline">
                                <a href="{{url('login')}}" class="login-ds active">
                                    <span class="title">ورود به حساب کاربری</span>
                                </a>
                                <a href="{{url('register')}}" class="register-ds ">
                                    <span class="title">ثبت نام</span>
                                </a>
                            </div>
                            <div class="Login-to-account mt-2">
                                <div class="account-box-content">
                                    <form method="POST" action="{{ route('login-user') }}" class="form-account">
                                        @csrf
                                        <div class="form-account-title">
                                            <a href="{{url('login/google')}}" class="btn btn-danger btn-login br-16"><i class="fa fa-google mr-2"></i> ورود با حساب گوگل </a>
                                        </div>
                                        <hr>

                                        {{--                                            @include('error')--}}
                                        <div class="form-account-title">
                                            <label for="phone" class="float-right">شماره موبایل</label>
                                            <input type="text" name="phone" required value=" " class="form-control text-left @error('phone') is-invalid @enderror" >
                                        </div>
                                        <div class="form-account-title">
                                            <label for="password" class="float-right">رمز عبور</label>
                                            <input type="password" id="pass" required name="password" autocomplete="new-password" class="form-control @error('password') is-invalid @enderror" />
                                            <i class="fa fa-eye-slash" style="float: left;margin-top: -25px;margin-left: 15px;" onclick="togglePassword()"></i>
                                        </div>
                                        <div class="form-account-title">
                                            <label for="captcha" class="float-right">سوال امنیتی</label>
                                            <input type="text" name="captcha" required id="captcha" class="form-control @error('captcha') is-invalid @enderror"/>
                                        </div>
                                        <div class="form-account-title captcha">
                                            <label for="captcha_img" class="float-right"></label>
                                            <span>{!! captcha_img('math') !!}</span>
                                            <button type="button" class="btn btn-primery" class="reload" id="reload">
                                                &#x21bb;
                                            </button>
                                        </div>
                                        <div class="form-account-title ">
                                            <a  href="{{route('remember')}}" class="account-link-password float-right">بازیابی / دریافت رمز عبور جدید</a>
                                        </div>
                                        <br>
                                        <div class="form-row-account">
                                            <button class="btn btn-primary btn-login">ورود</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
    </svg>
</div>

</body>

@endsection
@section('script')
    <script >
        $(function() {
            $('#txtuser').focus(function() {
                $(this).val('');
            });
        });
    </script>
    <script type="text/javascript">
        function togglePassword(){
            x = document.getElementById("togglePassword")
            y = document.getElementById("pass")

            if (y.type ==="password") {
                y.type = 'text';
            } else{
                y.type="password";
                y.innerHTML = "Show"
            }
        }
    </script>
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
