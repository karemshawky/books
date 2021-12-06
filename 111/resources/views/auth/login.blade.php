<!DOCTYPE html>
<html lang="ar" direction="rtl" style="direction: rtl;">
<!-- begin::Head -->

<head>
    <meta charset="utf-8" />

    <title>Books Site</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>
    <!--end::Web font -->

    <!--begin::Global Theme Styles -->
    <link rel="stylesheet" href="{{ asset('backend/css/admin.css') }}">
    <!--end::Global Theme Styles -->
    <link rel="shortcut icon" href="/images/favicon.ico" />
</head>
<!-- end::Head -->

<!-- begin::Body -->
<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

    <!-- begin:: Page -->
    <div class="m-grid m-grid--hor m-grid--root m-page">

        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-1"
            id="m_login" style="background-image: url(/images/bg-7.jpg);">
            <div class="m-grid__item m-grid__item--fluid m-login__wrapper">
                <div class="m-login__container">
                    <div class="m-login__logo">
                        <a href="#">
                            <img src="/images/logo-1.png">
                        </a>
                    </div>
                    <div class="m-login__signin">
                        <div class="m-login__head">
                            <h3 class="m-login__title">Sign In To Admin</h3>
                        </div>
                        <form class="m-login__form m-form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group m-form__group">
                                <input id="email" placeholder="البريد الألكترونى" type="text" class="m-input form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback bg-white text-center" role="alert">
                                        <h5> <strong>{{ $errors->first('email') }}</strong> </h5>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group m-form__group">
                                <input id="password" placeholder="كلمة المرور" type="password" class="m-input m-login__form-input--last form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="row m-login__form-sub">
                                <div class="col m--align-left m-login__form-left">
                                    <label class="m-checkbox  m-checkbox--light">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> تذكرنى
                                        <span></span>
                                    </label>
                                </div>
                                {{-- @if (Route::has('password.request'))
                                <div class="col m--align-right m-login__form-right">
                                    <a href="{{ route('password.request') }}" id="m_login_forget_password" class="m-link">Forget Password
                                        ?</a>
                                </div>
                                @endif --}}
                            </div>
                            <div class="m-login__form-action">
                                <button type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primary">دخول</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- end:: Page -->
    <!--begin::Global Theme Bundle -->
    {{-- <script src="../backend/js/vendors.bundle.js" type="text/javascript"></script>
    <script src="../backend/js/scripts.bundle.js" type="text/javascript"></script> --}}
    <!--end::Global Theme Bundle -->
    <!--begin::Page Scripts -->
    {{-- <script src="../backend/js/login.js" type="text/javascript"></script> --}}
    <script src="{{ asset('backend/js/login.js') }}" type="text/javascript"></script>
    <!--end::Page Scripts -->
</body>
<!-- end::Body -->
</html>