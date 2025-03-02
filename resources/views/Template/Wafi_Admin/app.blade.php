<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="Responsive Bootstrap4 Dashboard Templates">
        <meta name="author" content="Ramin Roshan">
		<meta name="csrf-token" content="1a6fd4d7ec3e54bd3e63d9af929e633d7d8cd24746c7001cdc18a65e0ef71864">
        <base href="{{ config('app.url') }}">
		<meta name="web-url" content="{{ url('') }}">

		<link rel="shortcut icon" href="{{url('Templates/Wafi_Admin/img/fav.png')}}" />

		<title>ناحیه کاربری</title>
		<link rel="stylesheet" href="{{url('media/plugin/bootstrap5/css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{url('Templates/Wafi_Admin/css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{url('Templates/Wafi_Admin/fonts/style.css')}}">
		<link rel="stylesheet" href="{{url('Templates/Wafi_Admin/css/main.css')}}">
		<link rel="stylesheet" href="{{url('Templates/Wafi_Admin/vendor/daterange/daterange.css')}}" />
		<link rel="stylesheet" href="{{url('Templates/Wafi_Admin/vendor/chartist/css/chartist.min.css')}}" />
		<link rel="stylesheet" href="{{url('Templates/Wafi_Admin/vendor/chartist/css/chartist-custom.css')}}" />
		<link rel="stylesheet" href="{{url('Templates/Wafi_Admin/css/font-awesome.min.css')}}">
		<link rel="stylesheet" href="{{url('media/plugin/persianDatepicker/css/persianDatepicker-default.css')}}">
        <link rel="stylesheet" href="{{url('Templates/Wafi_Admin/vendor/jqcloud/jqcloud.css')}}" />
	</head>

	<body>
		<div id="loading-wrapper">
			<div class="spinner-border" role="status">
				<span class="sr-only">در حال بارگذاری...</span>
			</div>
        </div>
        
        <div class="page-wrapper">
            <nav id="sidebar" class="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a href="{{route('home')}}" class="logo">
                        <img src="{{url('Templates/Wafi_Admin/img/logo.png')}}" alt="Wafi Admin Dashboard" />
                    </a>
                    <a href="{{route('home')}}" class="logo-sm">
                        <img src="{{url('Templates/Wafi_Admin/img/logo-sm.png')}}" alt="Wafi Admin Dashboard" />
                    </a>
                </div>
            
                <div class="sidebar-content">
                    <div class="sidebar-menu">
                        <ul>
                            @foreach ($sidebar as $key => $menu)
                                @if($menu instanceof Illuminate\Database\Eloquent\Collection)
                                    <li class="sidebar-dropdown">
                                        <a href="#">
                                            <i class="icon-devices_other"></i>
                                            <span class="menu-text">{{$key ?? '???'}}</span>
                                        </a>
                                        <div class="sidebar-submenu">
                                            <ul>
                                                @foreach($menu as $subItem)
                                                @php $subItem = $subItem->menu; @endphp
                                                <li>
                                                    <a href="{{$subItem->route ? route($subItem->route) : (url($subItem->url) ?? '#')}}{{$subItem->route ? '?action='.$subItem->url : ''}}">
                                                        <span class="menu-text">{{__($subItem->packeage.'::RoutName.'.($subItem->name ?? '???'))}}</span>                                                        
                                                    </a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </li>  
                                @else
                                    @if($menu->type == 'header')
                                        <li class="header-menu">{{__($menu->packeage.'::RoutName.'.($menu->name ?? '???'))}}</li>
                                    @endif
                                    @if($menu->type == '')
                                        <li>
                                            <a href="{{$menu->route ? route($menu->route) : (url($menu->url) ?? '#')}}{{$menu->route ? ($menu->url ? '?action='.$menu->url : '') : ''}}">
                                                <i class="{{$menu->icon ?? ''}}"></i>
                                                <span class="menu-text">{{__($menu->packeage.'::RoutName.'.($menu->name ?? '???'))}}</span>
                                            </a>
                                        </li>
                                    @endif                                              
                                @endif
                            @endforeach                            
                        </ul>
                    </div>
                </div>
            </nav>            
            @php
            $images = url("media/images/Users/Profile/noImage.png");
            $currentUserId = $currentUser->id ?? '-';
            if (file_exists(public_path("media/images/Users/Profile/{$currentUserId}.png"))) {
                $images = url("media/images/Users/Profile/{$currentUserId}.png");
            }
            @endphp
            
            <div class="page-content" style="min-height: 40px !important">
                <header class="header">
                    <div class="toggle-btns">
                        <a id="toggle-sidebar" href="#">
                            <i class="icon-list"></i>
                        </a>
                        <a id="pin-sidebar" href="#">
                            <i class="icon-list"></i>
                        </a>
                    </div>
                    <div class="header-items">
                        <!-- Custom search start -->
                        <div class="custom-search">
                            <input type="text" class="search-query" placeholder="جستجو کنید ...">
                            <i class="icon-search1"></i>
                        </div>
            
                        <ul class="header-actions">
                            <li class="dropdown">
                                <a href="#" id="notifications" data-toggle="dropdown" aria-haspopup="true">
                                    <i class="icon-lock"></i>
                                    {{ $currentAccessLevel->name ?? 'خطا در چاپ'}}
                                </a>
                            </li>
                            {{-- <li class="dropdown">
                                <a href="#" id="notifications" data-toggle="dropdown" aria-haspopup="true">
                                    <i class="icon-bell"></i>
                                    <span class="count-label">8</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right lrg" aria-labelledby="notifications">
                                    <div class="dropdown-menu-header">
                                        اعلانات (40)
                                    </div>
                                    <ul class="header-notifications">
                                        <li>
                                            <a href="#">
                                                <div class="user-img away">
                                                    <img src="{{ url('Templates/Wafi_Admin/img/user21.png') }}" alt="User">
                                                </div>
                                                <div class="details">
                                                    <div class="user-title">مجتبی</div>
                                                    <div class="noti-details">عضویت پایان یافت.</div>
                                                    <div class="noti-date">20 بهمن ، 07:30 بعد از ظهر</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="user-img busy">
                                                    <img src="{{ url('Templates/Wafi_Admin/img/user10.png') }}" alt="User">
                                                </div>
                                                <div class="details">
                                                    <div class="user-title">جعفر خان</div>
                                                    <div class="noti-details">طراحی جدید تأیید شده است.</div>
                                                    <div class="noti-date">21 بهمن ، 07:30 بعد از ظهر</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="user-img online">
                                                    <img src="{{ url('Templates/Wafi_Admin/img/user6.png') }}" alt="User">
                                                </div>
                                                <div class="details">
                                                    <div class="user-title">مایکل</div>
                                                    <div class="noti-details">هر جدول را با جزئیات بررسی کنید.</div>
                                                    <div class="noti-date">22 بهمن ، 07:30 بعد از ظهر</div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li> --}}
                            <li class="dropdown">
                                <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
                                    <span class="user-name">{{ $currentUser->name ?? '' }} {{ $currentUser->last_name ?? '' }}</span>
                                    <span class="avatar">{{ $currentUser->name[0] ?? '' }}{{ $currentUser->last_name[0] ?? '' }}<span class="status busy"></span></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
                                    <div class="header-profile-actions">
                                        <div class="header-user-profile">
                                            <div class="header-user">
                                                <img src="{{ $images }}">
                                            </div>
                                            <h5>{{ $currentUser->name ?? '' }} {{ $currentUser->last_name ?? '' }}</h5>
                                            <p>
                                                @php
                                                print_r(($currentUser->username ?? false) ? '@'.$currentUser->username : '<a>تکمیل پروفایل</a>')
                                                @endphp
                                            </p>
                                        </div>
                                        @if ($currentUser->current_access_level_id ?? false)
                                        @foreach ($accessLevels as $item)
                                        <a href="?action=ChangeUserAccess&access={{ $item->membership_groups_id }}">
                                            <i class="icon-lock"></i> {{ $currentUser->name ?? '' }}
                                            <small>({{ $item->AccessLevel->name ?? 'خطا در چاپ'}})</small>
                                            
                                        </a>
                                        @endforeach
                                        @endif
                                        <a ><i class="icon-user1"></i> پروفایل من</a>
                                        <a  onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="icon-log-out1"></i> خروج از سیستم</a>
                                        <form id="logout-form" action="" method="POST" style="display: none;">@csrf</form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </header>
            
                <div class="page-header">
                    <ol class="breadcrumb">

                    </ol>
            
                    <ul class="app-actions">
            
                    </ul>
            
                </div>
            
            </div>
            @if(($info ?? '') != '')
            <div class="page-content" style="min-height: 40px !important">
                <div class="main-container">
                    <div class="row gutters">
                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="info-tiles">
                                <div class="info-icon">
                                    <i class="icon-account_circle"></i>
                                </div>
                                <div class="stats-detail">
                                    <h3>82 هزار</h3>
                                    <p>کاربر</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="info-tiles">
                                <div class="info-icon">
                                    <i class="icon-watch_later"></i>
                                </div>
                                <div class="stats-detail">
                                    <h3>2 هزار</h3>
                                    <p>نمایندگان</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="info-tiles">
                                <div class="info-icon">
                                    <i class="icon-visibility"></i>
                                </div>
                                <div class="stats-detail">
                                    <h3>70 هزار</h3>
                                    <p>بازدید</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="info-tiles">
                                <div class="info-icon">
                                    <i class="icon-shopping_basket"></i>
                                </div>
                                <div class="stats-detail">
                                    <h3>90 هزار</h3>
                                    <p>فروش</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="info-tiles">
                                <div class="info-icon secondary">
                                    <i class="icon-check_circle"></i>
                                </div>
                                <div class="stats-detail">
                                    <h3>3 هزار</h3>
                                    <p>ثبت نام</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="info-tiles">
                                <div class="info-icon secondary">
                                    <i class="icon-archive"></i>
                                </div>
                                <div class="stats-detail">
                                    <h3>64 هزار</h3>
                                    <p>سفارش</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>        
            </div>
            @endif   
           
            <div class="page-content">
                <div class="main-container">
                    <div class="row gutters" style="margin-top: 15px">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            مسیر برنامه
                        </div>
                    </div>                    
                    <div class="row gutters" style="margin-top: 25px">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div @if(($card ?? '' )!= '') class="card" @endif>
                                @if(($card ?? '' )!= '')
                                <div class="card-header">
                                    <div class="card-title">{{$card ?? ''}}</div>
                                </div>
                                @endif
                                <div class="card-body">
                                    @yield('content')                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>        
            </div>
        </div>
    </div>
    
    <script src="{{url('Templates/Wafi_Admin/js/jquery.min.js')}}"></script>
    <script src="{{url('Templates/Wafi_Admin/js/bootstrap.bundle.min.js')}}"></script>
    @if(($mix ?? '') != '')
        @foreach ($mix as $item)
            @vite($item)
        @endforeach
    @endif
    <script src="{{url('Templates/Wafi_Admin/js/moment.js')}}"></script>
    <script src="{{url('Templates/Wafi_Admin/vendor/slimscroll/slimscroll.min.js')}}"></script>
    <script src="{{url('Templates/Wafi_Admin/vendor/slimscroll/custom-scrollbar.js')}}"></script>
    <script src="{{url('Templates/Wafi_Admin/vendor/daterange/daterange.js')}}"></script>
    <script src="{{url('Templates/Wafi_Admin/vendor/daterange/custom-daterange.js')}}"></script>
    <script src="{{url('Templates/Wafi_Admin/vendor/chartist/js/chartist.min.js')}}"></script>
    {{-- <script src="{{url('Templates/Wafi_Admin/vendor/chartist/js/chartist-tooltip.js')}}"></script> --}}
    {{-- <script src="{{url('Templates/Wafi_Admin/vendor/chartist/js/custom/threshold/threshold.js')}}"></script> --}}
    {{-- <script src="{{url('Templates/Wafi_Admin/vendor/chartist/js/custom/bar/bar-chart-orders.js')}}"></script> --}}
    <script src="{{url('Templates/Wafi_Admin/vendor/jvectormap/jquery-jvectormap-2.0.3.min.js')}}"></script>
    <script src="{{url('Templates/Wafi_Admin/vendor/jvectormap/world-mill-en.js')}}"></script>
    <script src="{{url('Templates/Wafi_Admin/vendor/jvectormap/gdp-data.js')}}"></script>
    <script src="{{url('Templates/Wafi_Admin/vendor/jvectormap/custom/world-map-markers2.js')}}"></script>
    <script src="{{url('Templates/Wafi_Admin/vendor/rating/raty.js')}}"></script>	
    <script src="{{url('Templates/Wafi_Admin/vendor/rating/raty-custom.js')}}"></script>
    <script src="{{url('Templates/Wafi_Admin/js/main.js')}}"></script>
    <script src="{{url('Templates/Wafi_Admin/vendor/jqcloud/jqcloud-1.0.4.min.js')}}"></script>
    <script src="{{url('media/plugin/persianDatepicker/js/persianDatepicker.min.js')}}"></script>
    {{-- <script src="{{ url('tinymce/tinymce.min.js') }}"></script> --}}
    {{-- <script src="{{ url('js/pishgaman.js') }}"></script> --}}
    <script type="text/javascript">
    $(function() {
        $(".datepicker").persianDatepicker();       
    });
    </script>    
  </body>
</html>            
            