
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" dir="rtl">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="{{ config('app.url') }}">
    <meta name="web-url" content="{{ url('') }}">

	<title>بیستون | ناحیه کاربری</title>

	<link rel="shortcut icon" href="{{url('Templates/nextable/default/assets/media/image/favicon.png')}}">
	<meta name="theme-color" content="#5867dd">
	<link rel="stylesheet" href="{{url('Templates/nextable/default/vendors/bundle.css')}}" type="text/css">
	<link rel="stylesheet" href="{{url('Templates/nextable/default/assets/css/app.css')}}" type="text/css">
	<link rel="stylesheet" href="{{url('Templates/Wafi_Admin/vendor/jqcloud/jqcloud.css')}}" />
    <style>
	
.navigation .navigation-icon-menu ul li a .icon {
    font-size: 24px;
}		
        /* استایل برای لینک */
        .shutdown {
            font-size: 24px; /* اندازه بزرگ‌تر برای تست */
            text-decoration: none; /* حذف خط زیرین لینک */
            animation: blink 2s infinite; /* انیمیشن چشمک‌زن */
            font-size: 64px; /* اندازه آیکون */
            color: #5867dd; /* رنگ اصلی آیکون */
            text-shadow: 
                2px 2px 5px rgba(0, 0, 0, 0.4), /* سایه پایین و راست */
                -2px -2px 5px rgba(255, 255, 255, 0.7); /* سایه بالا و چپ */			
        }

        /* انیمیشن چشمک‌زن */
        @keyframes blink {
            0%, 100% {
                color: red; /* رنگ قرمز */
            }
            50% {
                color: #ffffff; /* رنگ سبز */
            }
        }
    </style>
</head>

<body>
	<div class="page-loader">
		<div class="spinner-border"></div>
	</div>

	<div class="sidebar" id="userProfile">
		<div class="text-center p-4">
			<figure class="avatar avatar-state-success avatar-lg mb-4">
				<img src="{{url('media/images/Users/Profile/noImage.png')}}" class="rounded-circle" alt="image">
			</figure>
			<h4 class="text-primary m-b-10">{{$currentUser->username ?? '???'}}</h4>
			<p class="text-muted d-flex align-items-center justify-content-center line-height-0 mb-0">
				{{$currentUser->name ?? ''}} {{$currentUser->last_name ?? ''}} 
			</p>
		</div>
		<hr class="m-0">
		<div class="p-4">
			<div class="mb-4">
				<h6 class="font-size-13 mb-3">
					کلیک‌های انجام شده
					<span class="float-right primary-font">%25</span>
				</h6>
				<div class="progress m-b-20" style="height: 5px;">
					<div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
			</div>
			<div class="mb-4">
				<h6 class="font-size-13 mb-3">
					دانلود‌های انجام شده
					<span class="float-right primary-font">%77</span>
				</h6>
				<div class="progress m-b-20" style="height: 5px;">
					<div class="progress-bar bg-danger" role="progressbar" style="width: 77%;" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
			</div>
			<div class="mb-4">
				<h6 class="font-size-13 mb-3 ">
					مدت اعتبار
					<span class="float-right primary-font">%40</span>
				</h6>
				<div class="progress m-b-20" style="height: 5px;">
					<div class="progress-bar bg-success" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
			</div>
			<div class="mb-4">
				<h6 class="font-size-13 mb-3 pt-2">درباره</h6>
				<p class="text-muted">
					بیستون، امکانات متنوعی را برای پایش و تحلیل محتوای فضای مجازی در اختیارتان قرار می‌دهد و به شما کمک می‌کند که تا از دیدگاه افکارعمومی آگاه باشید، جهت‌گیری رسانه‌ها و جریان‌های خبری را بشناسید.
				</p>
			</div>
			{{-- <div class="mb-4">
				<h6 class="font-size-13 mb-3">تنظیمات</h6>
				<div class="form-group">
					<div class="form-item custom-control custom-switch">
						<input type="checkbox" class="custom-control-input" id="customSwitch11">
						<label class="custom-control-label" for="customSwitch11">مسدود کردن</label>
					</div>
				</div>
				<div class="form-group">
					<div class="form-item custom-control custom-switch">
						<input type="checkbox" class="custom-control-input" checked id="customSwitch12">
						<label class="custom-control-label" for="customSwitch12">بیصدا کردن</label>
					</div>
				</div>
			</div> --}}
		</div>
	</div>

	<div class="navigation" style="background:#2D274F;">
    <!-- بخش آیکون‌ها و منو -->
    <div class="navigation-icon-menu">
        <ul>
            @php $i = 0; @endphp
            @foreach ($sidebar as $key => $menu)
                @if($menu['type'] == 'header')
                    @php $i++; @endphp
                    <li data-toggle="tooltip" 
                        title="{{ __($menu['packeage'].'::RoutName.'.($menu['name'] ?? '???')) }}"
                        class="{{ $i == 1 ? 'active' : '' }}">
                        <a href="#navigation{{ $menu['name'] }}" 
                           title="{{ __($menu['packeage'].'::RoutName.'.($menu['name'] ?? '???')) }}">
                            <i class="icon {{ $menu['icon'] ?? '' }}" ></i>
                            <span class="badge badge-warning"></span>
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>

        <!-- منو تنظیمات و خروج -->
        <ul>
			<li data-toggle="tooltip" title="دانلود">
                <a href="{{ url('download/list') }}" class="go-to-page">
                    <i class="icon ti-download" style="color:yellow"></i>
					<span class="badge badge-warning">2</span>
                </a>
            </li>			
            <li data-toggle="tooltip" title="ویرایش پروفایل">
                <a href="{{ route('home') }}?action=profile" class="go-to-page">
                    <i class="icon ti-settings"></i>
                </a>
            </li>
            <li data-toggle="tooltip" title="خروج">
                <a href="{{ route('home') }}?action=logout" class="go-to-page">
                    <i class="icon ti-power-off shutdown"></i>
                </a>
            </li>
        </ul>
    </div>

    <!-- بدنه اصلی منو -->
    <div class="navigation-menu-body">
        @foreach ($sidebar as $mainkey => $menu)
            <ul id="navigation{{ $menu['name'] }}" class="{{ $mainkey == 0 ? 'navigation-active' : '' }}">
                <!-- تقسیم‌بندی هدر -->
                @if($menu['type'] == 'header')
                    <li class="navigation-divider">{{ $menu['translate_name'] }}</li>
                @endif

                <!-- نمایش آیتم‌های منو -->
                @foreach ($menu['children'] as $menu2)
                    @if(is_null($menu2['type']))
                        <li class="sidebar-list">
                            <a class="sidebar-link link-nav" 
                               href="{{ $menu2['route'] ? route($menu2['route']) : url($menu2['url'] ?? '#') }}{{ $menu2['route'] ? '?action='.$menu2['url'] : '' }}">
                                <b>{{ $menu2['translate_name'] }}</b>
                            </a>
                        </li>
                    @elseif($menu2['type'] == 'dropdown')
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                {{ $menu2['translate_name'] }}
                            </a>
                            <ul class="dropdown-menu">
                                @foreach($menu2['children'] as $subItem)
                                    <li>
                                        <a href="{{ $subItem['route'] ? route($subItem['route']) : url($subItem['url'] ?? '#') }}{{ $subItem['route'] ? '?action='.$subItem['url'] : '' }}">
                                            {{ $subItem['translate_name'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach
            </ul>
        @endforeach
    </div>
</div>


	<div class="header">

		<div class="header-logo">
			<a href="{{route('home')}}">
				<img class="large-logo" src="{{url('Templates/nextable/default/assets/media/image/logo.png')}}" alt="image">
				<img class="small-logo" src="{{url('Templates/nextable/default/assets/media/image/logo-sm.png')}}" alt="image">
				<img class="dark-logo" src="{{url('Templates/nextable/default/assets/media/image/logo-dark.png')}}" alt="image">
			</a>
		</div>

		<div class="header-body">

			<div class="header-body-left">

				<h3 class="page-title">صفحه خالی</h3>

				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">داشبورد</a></li>
						<li class="breadcrumb-item active" aria-current="page">صفحه خالی</li>
					</ol>
				</nav>

			</div>

			<div class="header-body-right">
				<!-- begin::navbar main body -->
				<ul class="navbar-nav">
					<!-- <li class="nav-item">
						<form>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="جستجو">
								<div class="input-group-append">
									<button class="btn btn-light" type="button">
										<i class="ti-search"></i>
									</button>
								</div>
							</div>
						</form>
					</li> -->
					<!-- <li class="nav-item dropdown">
						<a href="#" class="nav-link" data-toggle="dropdown">
							<i class="ti-plus"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
							<div class="p-3">
								<h6 class="font-size-13 m-b-15">دسترسی سریع</h6>
								<div class="row">
									<div class="col-6">
										<a href="#">
											<div class="d-flex flex-column font-size-13 bg-danger-bright bg-hover pt-3 pb-3 border-radius-1 text-danger text-center mb-3">
												<i class="fa fa-sitemap mb-2 font-size-20"></i>
												دسته‌بندی ها
											</div>
										</a>
									</div>
									<div class="col-6">
										<a href="#">
											<div class="d-flex flex-column font-size-13 bg-info-bright bg-hover pt-3 pb-3 border-radius-1 text-info text-center mb-3">
												<i class="ti-game mb-2 font-size-20"></i>
												محصولات
											</div>
										</a>
									</div>
									<div class="col-6">
										<a href="#">
											<div class="d-flex flex-column font-size-13 bg-warning-bright bg-hover pt-3 pb-3 border-radius-1 text-warning text-center">
												<i class="ti-bar-chart-alt mb-2 font-size-20"></i>
												گزارشات
											</div>
										</a>
									</div>
									<div class="col-6">
										<a href="#">
											<div class="d-flex flex-column font-size-13 bg-secondary-bright bg-hover pt-3 pb-3 border-radius-1 text-secondary text-center">
												<i class="fa fa-share mb-2 font-size-20"></i>
												سایر
											</div>
										</a>
									</div>
								</div>
							</div>
						</div>
					</li> -->
					<!-- <li class="nav-item dropdown">
						<a href="#" class="nav-link nav-link-notify" data-toggle="dropdown">
							<i class="ti-comment"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right dropdown-menu-big">

							<div class="p-4 text-center" data-backround-image="assets/media/image/image1.png">
								<h6 class="m-b-0">پیام ها</h6>
								<small class="font-size-13 opacity-7 d-inline-block m-t-5">1 پیام خوانده نشده</small>
							</div>
							<div>
								<ul class="list-group list-group-flush">
									<li>
										<a href="#" class="p-3 list-group-item d-flex align-items-center link-1 hide-show-toggler">
											<div>
												<figure class="avatar avatar-sm m-r-15">
													<span class="avatar-title bg-success rounded-circle">آ</span>
												</figure>
											</div>
											<div class="flex-grow-1">
												<h6 class="mb-1 d-flex justify-content-between primary-font">
													استیو راجرز
													<i title="علامت خوانده نشده" data-toggle="tooltip" class="hide-show-toggler-item fa fa-check font-size-13"></i>
												</h6>
												<span class="text-muted m-r-10 small">08:50 ب.ظ</span>
												<span class="text-muted small line-height-24">لورم ایپسوم متن ساختگی</span>
											</div>
										</a>
									</li>
									<li>
										<a href="#" class="p-3 list-group-item d-flex align-items-center link-1 bg-secondary-bright hide-show-toggler">
											<div>
												<figure class="avatar avatar-sm m-r-15">
													<span class="avatar-title bg-primary rounded-circle">ج</span>
												</figure>
											</div>
											<div class="flex-grow-1">
												<h6 class="mb-1 d-flex justify-content-between primary-font">
													جان اسنو
													<i title="علامت خوانده شده" data-toggle="tooltip" class="hide-show-toggler-item fa fa-circle-o font-size-13"></i>
												</h6>
												<span class="text-muted m-r-10 small">10:23 ب.ظ</span>
												<span class="text-muted small line-height-24">لورم ایپسوم متن ساختگی</span>
											</div>
										</a>
									</li>
									<li>
										<a href="#" class="p-3 list-group-item d-flex align-items-center link-1 hide-show-toggler">
											<div>
												<figure class="avatar avatar-sm m-r-15">
													<span class="avatar-title bg-danger rounded-circle">ک</span>
												</figure>
											</div>
											<div class="flex-grow-1">
												<h6 class="mb-1 d-flex justify-content-between primary-font">
													استیو جابز
													<i title="علامت خوانده نشده" data-toggle="tooltip" class="hide-show-toggler-item fa fa-check font-size-13"></i>
												</h6>
												<span class="text-muted m-r-10 small">08:50 ب.ظ</span>
												<span class="text-muted small line-height-24">لورم ایپسوم متن ساختگی</span>
											</div>
										</a>
									</li>
									<li>
										<a href="#" class="p-3 list-group-item d-flex align-items-center link-1 hide-show-toggler">
											<div>
												<figure class="avatar avatar-sm m-r-15">
													<span class="avatar-title bg-info rounded-circle">ن‌پ</span>
												</figure>
											</div>
											<div class="flex-grow-1">
												<h6 class="mb-1 d-flex justify-content-between primary-font">
													ناتالی پورتمن
													<i title="علامت خوانده نشده" data-toggle="tooltip" class="hide-show-toggler-item fa fa-check font-size-13"></i>
												</h6>
												<span class="text-muted m-r-10 small">20:13 ب.ظ</span>
												<span class="text-muted small line-height-24">لورم ایپسوم متن ساختگی</span>
											</div>
										</a>
									</li>
								</ul>
							</div>
							<div class="p-3 text-right">
								<ul class="list-inline small">
									<li class="list-inline-item">
										<a href="#">علامت خوانده شده به همه</a>
									</li>
								</ul>
							</div>
						</div>
					</li> -->
					<!-- <li class="nav-item dropdown" id="bell">
					</li> -->
					<li class="nav-item dropdown">
						<a href="#" class="nav-link bg-none" data-sidebar-open="#userProfile">
							<div>
								<figure class="avatar avatar-state-success avatar-sm">
									<img src="{{url('media/images/Users/Profile/noImage.png')}}" class="rounded-circle" alt="image">
								</figure>
							</div>
						</a>
					</li>
				</ul>
				<!-- end::navbar main body -->

				<div class="d-flex align-items-center">
					<!-- begin::navbar navigation toggler -->
					<div class="d-xl-none d-lg-none d-sm-block navigation-toggler">
						<a href="#">
							<i class="ti-menu"></i>
						</a>
					</div>
					<!-- end::navbar navigation toggler -->

					<!-- begin::navbar toggler -->
					<div class="d-xl-none d-lg-none d-sm-block navbar-toggler">
						<a href="#">
							<i class="ti-arrow-down"></i>
						</a>
					</div>
					<!-- end::navbar toggler -->
				</div>
			</div>

		</div>
		<!-- end::header body -->

	</div>
	<!-- end::header -->

	<!-- begin::main content -->
	<main class="main-content">
            @if(($card ?? '' )!= '')
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">عنوان محتوا</h5>
							@yield('content')                    
						</div>
					</div>
				</div>
			</div>
            @else
                @yield('content')                    
            @endif

	</main>
	<!-- end::main content -->

	<!-- begin::global scripts -->
	<script src="{{url('Templates/nextable/default/vendors/bundle.js')}}"></script>
	<!-- end::global scripts -->

	<!-- begin::custom scripts -->
	<script src="{{url('Templates/nextable/default/assets/js/app.js')}}"></script>
    <script src="{{url('media/plugin/amchart4/core.js')}}"></script>
    <script src="{{url('media/plugin/amchart4/charts.js')}}"></script>
    <script src="{{url('media/plugin/amchart4/plugins/wordCloud.js')}}"></script>
    <script src="{{url('media/plugin/amchart4/themes/animated.js')}}"></script>
	<!-- end::custom scripts -->
    @if(($mix ?? '') != '')
        @foreach ($mix as $item)
			@php 
				$changeTemplate = str_replace('Template.','',$Template);
				$changeTemplate = str_replace('.app','',$changeTemplate);
				$item = str_replace('ChangeTemplate',$changeTemplate,$item) 
			@endphp
            @vite($item)
        @endforeach
    @endif
	@vite('packages/pishgaman/pishgaman/src/resources/vue/download/app.js')
</body>

</html>