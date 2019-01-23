<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<!-- begin::Head -->

<head>
	<meta charset="utf-8" />
	<title>{{ config('app.name') }} | Admin</title>
	<meta name="description" content="Admin Dashboard">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!--begin::Web font -->
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
	<script>
		WebFont.load({
		google: {
			"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
		},
		active: function() {
			sessionStorage.fonts = true;
		}
	});
	</script>
	<!--end::Web font -->
	<link rel="shortcut icon" href="{{ asset('/images/favicon.ico') }}" />
	<link rel="stylesheet" href="{{ asset('backend/css/admin.css') }}">
</head>
<!-- end::Head -->
<!-- begin::Body -->

<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
	<!-- begin:: Page -->
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<!-- BEGIN: Header -->
		<header id="m_header" class="m-grid__item    m-header " m-minimize-offset="200" m-minimize-mobile-offset="200">
			<div class="m-container m-container--fluid m-container--full-height">
				<div class="m-stack m-stack--ver m-stack--desktop">
					<!-- BEGIN: Brand -->
					<div class="m-stack__item m-brand  m-brand--skin-dark ">
						<div class="m-stack m-stack--ver m-stack--general">
							<div class="m-stack__item m-stack__item--middle m-brand__logo">
								<a href="../index.html" class="m-brand__logo-wrapper"> <img alt="" src="{{ asset('/images/logo_default_dark.png') }}" />
								</a>
							</div>
							<div class="m-stack__item m-stack__item--middle m-brand__tools">
								<!-- BEGIN: Left Aside Minimize Toggle -->
								<a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block  ">
									<span></span> </a>
								<!-- END -->
								<!-- BEGIN: Responsive Aside Left Menu Toggler -->
								<a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
									<span></span> </a>
								<!-- END -->
								<!-- BEGIN: Responsive Header Menu Toggler -->
								<a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
									<span></span> </a>
								<!-- END -->
								<!-- BEGIN: Topbar Toggler -->
								<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
									<i class="flaticon-more"></i> </a>
								<!-- BEGIN: Topbar Toggler -->
							</div>
						</div>
					</div>
					<!-- END: Brand -->
					<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
						<!-- BEGIN: Topbar -->
						<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general m-stack--fluid">
							<div class="m-stack__item m-topbar__nav-wrapper">
								<ul class="m-topbar__nav m-nav m-nav--inline">
									<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
									 m-dropdown-toggle="click">
										<a href="#" class="m-nav__link m-dropdown__toggle"> 
											<span class="m-topbar__username text-primary" > {{ auth()->user()->name }} </span>
											<span class="m-topbar__userpic">
												<img src="{{ asset('/images/user4.jpg') }}" class="m--img-rounded m--marginless" alt="" />
											</span> <span class="m-topbar__username m--hide">Nick</span> </a>
										<div class="m-dropdown__wrapper"> <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
											<div class="m-dropdown__inner">
												<div class="m-dropdown__header m--align-center" style="background: url({{ asset('/images/user_profile_bg.jpg') }}); background-size: cover;">
													<div class="m-card-user m-card-user--skin-dark">
														<div class="m-card-user__pic"> <img src="{{ asset('/images/user4.jpg') }}" class="m--img-rounded m--marginless"
															 alt="" />
															<!--<span class="m-type m-type--lg m--bg-danger"><span class="m--font-light">S<span><span> -->
														</div>
														<div class="m-card-user__details"> <span class="m-card-user__name m--font-weight-500">{{ auth()->user()->name }}</span>
															<a href="javascript:;" class="m-card-user__email m--font-weight-300 m-link">{{ auth()->user()->email }}</a> </div>
													</div>
												</div>
												<div class="m-dropdown__body">
													<div class="m-dropdown__content">
														<ul class="m-nav m-nav--skin-light">
															<li class="m-nav__section m--hide"> <span class="m-nav__section-text">Section</span> </li>
															<li class="m-nav__item">
																<a href="#" class="m-nav__link"> <i class="m-nav__link-icon flaticon-profile-1"></i>
																	<span class="m-nav__link-title">
																		<span class="m-nav__link-wrap">
																			<span class="m-nav__link-text">My Profile</span> <span class="m-nav__link-badge"></span>
																		</span>
																	</span>
																</a>
															</li>
															<li class="m-nav__separator m-nav__separator--fit"> </li>
															<li class="m-nav__item">
																<form action="{{ route('logout') }}" method="POST">
																	@csrf
																	<button type="submit" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">Logout</button>
																</form>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<!-- END: Topbar -->
					</div>
				</div>
			</div>
		</header>
		<!-- END: Header -->
		<!-- begin::Body -->
		<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
			<!-- BEGIN: Left Aside -->
			<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i class="la la-close"></i></button>
			<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
				<!-- BEGIN: Aside Menu -->
				<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1"
				 m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
					<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
						<li class="m-menu__item " aria-haspopup="true">
							<a href="/admin/home" class="m-menu__link ">
								<i class="m-menu__link-icon flaticon-line-graph"></i>
								<span class="m-menu__link-text"> الرئيسية </span></a>
						</li>
						<li class="m-menu__item " aria-haspopup="true">
							<a href="{{  route('books.index') }}" class="m-menu__link ">
								<i class="m-menu__link-icon flaticon-book"></i>
								<span class="m-menu__link-text"> الكتب </span></a>
						</li>
						<li class="m-menu__item " aria-haspopup="true">
							<a href="{{  route('cats.index') }}" class="m-menu__link ">
								<i class="m-menu__link-icon flaticon-shapes"></i>
								<span class="m-menu__link-text"> الأقسام </span></a>
						</li>
						<li class="m-menu__item " aria-haspopup="true">
							<a href="{{  route('authors.index') }}" class="m-menu__link ">
								<i class="m-menu__link-icon flaticon-users-1"></i>
								<span class="m-menu__link-text"> المؤلفين </span></a>
						</li>
						<li class="m-menu__item " aria-haspopup="true">
							<a href="{{  route('tags.index') }}" class="m-menu__link ">
								<i class="m-menu__link-icon flaticon-map"></i>
								<span class="m-menu__link-text"> كلمات مفتاحية </span></a>
						</li>
						<li class="m-menu__item " aria-haspopup="true">
							<a href="#" class="m-menu__link ">
								<i class="m-menu__link-icon flaticon-user"></i>
								<span class="m-menu__link-text"> الأعضاء </span></a>
						</li>
						<li class="m-menu__item " aria-haspopup="true">
							<a href="{{  route('settings.index') }}" class="m-menu__link ">
								<i class="m-menu__link-icon flaticon-settings"></i>
								<span class="m-menu__link-text"> عن الموقع </span></a>
						</li>
					</ul>
				</div>
				<!-- END: Aside Menu -->
			</div>
			<!-- END: Left Aside -->
			<div class="m-grid__item m-grid__item--fluid m-wrapper">
				@include('backend.feedback')
				@yield('content')
			</div>
		</div>
	</div>
	<!-- end:: Body -->
	<!-- begin::Footer -->
	<footer class="m-grid__item	m-footer ">
		<div class="m-container m-container--fluid m-container--full-height m-page__container">
			<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
				<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
					<span class="m-footer__copyright">
						{{ now()->year }} &copy; Metronic theme by <a href="#" class="m-link">Karem Shawky</a>
					</span>
				</div>
			</div>
		</div>
	</footer>
	<!-- end::Footer -->
	</div>
	<!-- end:: Page -->
	<!-- begin::Scroll Top -->
	<div id="m_scroll_top" class="m-scroll-top"> <i class="la la-arrow-up"></i> </div>
	<!-- end::Scroll Top -->
	<!--begin::Global Theme Bundle -->
	{{-- <script src="{{ asset('backend/js/vendors.bundle.js') }}" type="text/javascript"></script>
	<script src="{{ asset('backend/js/scripts.bundle.js') }}" type="text/javascript"></script> --}}
	<!--end::Global Theme Bundle -->
	<!--begin::Page Vendors -->
	{{-- <script src="{{ asset('backend/js/datatables.bundle.js') }}" type="text/javascript"></script> --}}
	<!--end::Page Vendors -->
	<!--begin::Page Scripts -->
	{{-- <script src="{{ asset('backend/js/actions.js') }}" type="text/javascript"></script>
	<script src="{{ asset('backend/js/dashboard.js') }}" type="text/javascript"></script>
	<script src="{{ asset('backend/js/multiple-controls.js') }}" type="text/javascript"></script> --}}
	<script src="{{ asset('backend/js/admin.js') }}" type="text/javascript"></script>
	<!--end::Page Scripts -->
	<script>
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip(); 
		});
	</script>
	@stack('js')
</body>
<!-- end::Body -->

</html>