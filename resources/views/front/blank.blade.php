<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
 <!--<![endif]-->
<head>

    <!-- Meta -->
    <meta charset="utf-8">

    {!! SEO::generate() !!}
    
    <!-- Apple Meta Tags -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta content="yes" name="apple-touch-fullscreen" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=320, initial-scale=2.3, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" href="/favicon.ico">

    <!-- Webfont -->
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css"/>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('front/css/app.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    </head>
    <body id="home2" class="home3">
    <div id="fb-root"></div>
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/ar_AR/sdk.js#xfbml=1&version=v3.2&appId=395003454372181&autoLogAppEvents=1';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

        <!-- PRELOADER -->
        <div id="loader"></div>
        <div class="body">
            <!-- HEADER -->
            <header>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 header-first">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('images/logo-12.png') }}" class="img-responsive main-logo" alt="logo" />
                        </a>
                        </div>
                        <div class="col-md-6">
                            <div class="top-search3 pull-right">
                                <form action="{{ route('search') }}" method="GET">
                                    <input type="text" name="word" placeholder="أبحث عن كتاب أو مؤلف ">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <button type="button" class="fa fa-search fa-2x search-small sch" data-toggle="modal" data-target="#myModal1"></button>
                        </div>
                    </div>
                </div>
                <div class="dark-nav">
                    <div class="container">
                        <div class="row">
                            <nav class="navbar navbar-default">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <!-- Logo -->
                                </div>
                                <!-- Navmenu -->
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                    <ul class="nav navbar-nav">
                                        <li class="dropdown">
                                            <a href="{{ route('home') }}" class="">الرئيسية</a>
                                        </li>
                                        <li class="dropdown mmenu">
                                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">الأقسام</a>
                                            <ul class="mega-menu dropdown-menu the-menu" role="menu">
                                                <h3 class="text-center"></h3>
                                                @foreach (siteCategories() as $category)
                                                    <li>
                                                        <div>
                                                            <a href="{{ route('cat', $category->slug) }}"> {{ $category->name }} </a>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a href="{{ route('authors') }}">المؤلفين</a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="{{ route('books') }}">أحدث الكتب</a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="{{ route('reads') }}">قراءة أون لاين</a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="{{ route('contact') }}">تواصل معنا</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </header>

            @yield('content')

            <!-- FOOTER COPYRIGHT -->
            <div class="footer-bottom text-center">
                <div class="container">
                    <div class="row">
                        <ul class="flinks">
                            <li class="dropdown">
                                <a href="{{ route('home') }}">الرئيسية</a>
                            </li>
                            <li class="dropdown">
                                <a href="{{ route('authors') }}">المؤلفين</a>
                            </li>
                            <li class="dropdown">
                                <a href="{{ route('books') }}">أحدث الكتب</a>
                            </li>
                            <li class="dropdown">
                                <a href="{{ route('reads') }}">قراءة أون لاين</a>
                            </li>
                            <li class="dropdown">
                                <a href="{{ route('contact') }}">تواصل معنا</a>
                            </li>
                        </ul>
                        <div class="space20"></div>
                        <ul class="f-social">
                            <li><a href="{{ $siteSettings->facebook }}" target="_blank" class="fa fa-facebook"></a></li>
                            <li><a href="{{ $siteSettings->twitter }}" target="_blank" class="fa fa-twitter"></a></li>
                            <!-- <li><a href="https://feedburner.google.com/" class="fa fa-rss"></a></li> -->
                            <li><a href="mailto:{{ $siteSettings->mail }}" target="_blank" class="fa fa-envelope"></a></li>
                            <li><a href="{{ $siteSettings->instagram }}" target="_blank" class="fa fa-instagram"></a></li>
                            <li><a href="{{ $siteSettings->pinterest }}" target="_blank" class="fa fa-pinterest"></a></li>
                        </ul>
                        <div class="space10"></div>
                        <p>  جميع الحقوق محفوظة 2019 © </p><p>برمجة و تطوير <a href="javascript:;">Karem Shawky</a> </p>
                    </div>
                </div>
            </div>	
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal1" role="dialog">
            <div class="modal-dialog">
            <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">أبحث هنا </h4>
                    </div>
                    <div class="modal-body">
                        <div class="search4">
                            <form action="{{ route('search') }}" method="GET">
                                <input type="text" name="word" placeholder="أبحث عن كتاب أو مؤلف ">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="backtotop"><i class="fa fa-chevron-up"></i></div>

	<!-- Jquery -->
    <script src="{{ asset('front/js/app.js') }}"></script>

	<!-- ADDTHIS -->
    <script src="https://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5be0ebcd34b7ff10"></script>

    </body>
</html>