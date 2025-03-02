<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description"
    content="Zeta admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
  <meta name="keywords"
    content="admin template, Zeta admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="pixelstrap">
  <link rel="icon" href="{{url('Templates/Zeta/assets/images/logo/favicon-icon.png')}}" type="image/x-icon">
  <link rel="shortcut icon" href="{{url('Templates/Zeta/assets/images/logo/favicon-icon.png')}}" type="image/x-icon">
  <title>بیستون | سامانه هوشمند رصد و تحلیل محتوای فضای مجازی</title>
  <base href="{{ config('app.url') }}">
  <meta name="web-url" content="{{ url('') }}">
  <link rel="stylesheet" type="text/css" href="{{url('Templates/Zeta/assets/css/vendors/font-awesome.css')}}">
  <!-- ico-font-->
  <link rel="stylesheet" type="text/css" href="{{url('Templates/Zeta/assets/css/vendors/icofont.css')}}">
  <!-- Themify icon-->
  <link rel="stylesheet" type="text/css" href="{{url('Templates/Zeta/assets/css/vendors/themify.css')}}">
  <!-- Flag icon-->
  <link rel="stylesheet" type="text/css" href="{{url('Templates/Zeta/assets/css/vendors/flag-icon.css')}}">
  <!-- Feather icon-->
  <link rel="stylesheet" type="text/css" href="{{url('Templates/Zeta/assets/css/vendors/feather-icon.css')}}">
  <!-- Plugins css start-->
  <link rel="stylesheet" type="text/css" href="{{url('Templates/Zeta/assets/css/vendors/scrollbar.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('Templates/Zeta/assets/css/vendors/animate.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('Templates/Zeta/assets/css/vendors/date-picker.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('Templates/Zeta/assets/css/vendors/photoswipe.css')}}">
  <!-- Plugins css Ends-->
  <!-- Bootstrap css-->
  <link rel="stylesheet" type="text/css" href="{{url('Templates/Zeta/assets/css/vendors/bootstrap.css')}}">
  <!-- App css-->
  <link rel="stylesheet" type="text/css" href="{{url('Templates/Zeta/assets/css/style.css')}}">
  <link id="color" rel="stylesheet" href="{{url('Templates/Zeta/assets/css/color-1.css')}}" media="screen">
  <!-- Responsive css-->
  <link rel="stylesheet" type="text/css" href="{{url('Templates/Zeta/assets/css/responsive.css')}}">
</head>

<body>
  <div class="loader-wrapper">
    <div class="loader">
      <div class="loader-bar"></div>
      <div class="loader-bar"></div>
      <div class="loader-bar"></div>
      <div class="loader-bar"></div>
      <div class="loader-bar"></div>
      <div class="loader-ball"></div>
    </div>
  </div>

  <div class="tap-top"><i data-feather="chevrons-up"></i></div>

  <div class="page-wrapper compact-wrapper" id="pageWrapper">
    <div class="page-header">
      <div class="header-wrapper row m-0">
        <div class="header-logo-wrapper col-auto p-0">
          <div class="logo-wrapper"><a href="index-zeta.html"><img class="img-fluid" src="{{url('Templates/Zeta/assets/images/logo/logo.png')}}"alt=""></a></div>
          <div class="toggle-sidebar">
            <div class="status_toggle sidebar-toggle d-flex">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g>
                  <g>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M21.0003 6.6738C21.0003 8.7024 19.3551 10.3476 17.3265 10.3476C15.2979 10.3476 13.6536 8.7024 13.6536 6.6738C13.6536 4.6452 15.2979 3 17.3265 3C19.3551 3 21.0003 4.6452 21.0003 6.6738Z"
                      stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M10.3467 6.6738C10.3467 8.7024 8.7024 10.3476 6.6729 10.3476C4.6452 10.3476 3 8.7024 3 6.6738C3 4.6452 4.6452 3 6.6729 3C8.7024 3 10.3467 4.6452 10.3467 6.6738Z"
                      stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M21.0003 17.2619C21.0003 19.2905 19.3551 20.9348 17.3265 20.9348C15.2979 20.9348 13.6536 19.2905 13.6536 17.2619C13.6536 15.2333 15.2979 13.5881 17.3265 13.5881C19.3551 13.5881 21.0003 15.2333 21.0003 17.2619Z"
                      stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M10.3467 17.2619C10.3467 19.2905 8.7024 20.9348 6.6729 20.9348C4.6452 20.9348 3 19.2905 3 17.2619C3 15.2333 4.6452 13.5881 6.6729 13.5881C8.7024 13.5881 10.3467 15.2333 10.3467 17.2619Z"
                      stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                  </g>
                </g>
              </svg>
            </div>
          </div>
        </div>
        <div class="left-side-header col ps-0 d-none d-md-block">
        </div>
        <div class="nav-right col-10 col-sm-6 pull-right right-header p-0">
          <ul class="nav-menus">
            <li>
              <div class="mode animated backOutRight">
                <svg class="lighticon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <g>
                    <g>
                      <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M18.1377 13.7902C19.2217 14.8742 16.3477 21.0542 10.6517 21.0542C6.39771 21.0542 2.94971 17.6062 2.94971 13.3532C2.94971 8.05317 8.17871 4.66317 9.67771 6.16217C10.5407 7.02517 9.56871 11.0862 11.1167 12.6352C12.6647 14.1842 17.0537 12.7062 18.1377 13.7902Z"
                        stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </g>
                  </g>
                </svg>
                <svg class="darkicon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M17 12C17 14.7614 14.7614 17 12 17C9.23858 17 7 14.7614 7 12C7 9.23858 9.23858 7 12 7C14.7614 7 17 9.23858 17 12Z">
                  </path>
                  <path
                    d="M18.3117 5.68834L18.4286 5.57143M5.57144 18.4286L5.68832 18.3117M12 3.07394V3M12 21V20.9261M3.07394 12H3M21 12H20.9261M5.68831 5.68834L5.5714 5.57143M18.4286 18.4286L18.3117 18.3117"
                    stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </div>
            </li>


            <li class="maximize"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g>
                    <g>
                      <path d="M2.99609 8.71995C3.56609 5.23995 5.28609 3.51995 8.76609 2.94995" stroke="#130F26"
                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      <path
                        d="M8.76616 20.99C5.28616 20.41 3.56616 18.7 2.99616 15.22L2.99516 15.224C2.87416 14.504 2.80516 13.694 2.78516 12.804"
                        stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      <path
                        d="M21.2446 12.804C21.2246 13.694 21.1546 14.504 21.0346 15.224L21.0366 15.22C20.4656 18.7 18.7456 20.41 15.2656 20.99"
                        stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      <path d="M15.2661 2.94995C18.7461 3.51995 20.4661 5.23995 21.0361 8.71995" stroke="#130F26"
                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </g>
                  </g>
                </svg></a></li>
            <li class="profile-nav onhover-dropdown pe-0 py-0 me-0">
              <div class="media profile-media">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g>
                    <g>
                      <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M9.55851 21.4562C5.88651 21.4562 2.74951 20.9012 2.74951 18.6772C2.74951 16.4532 5.86651 14.4492 9.55851 14.4492C13.2305 14.4492 16.3665 16.4342 16.3665 18.6572C16.3665 20.8802 13.2505 21.4562 9.55851 21.4562Z"
                        stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M9.55849 11.2776C11.9685 11.2776 13.9225 9.32356 13.9225 6.91356C13.9225 4.50356 11.9685 2.54956 9.55849 2.54956C7.14849 2.54956 5.19449 4.50356 5.19449 6.91356C5.18549 9.31556 7.12649 11.2696 9.52749 11.2776H9.55849Z"
                        stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      <path
                        d="M16.8013 10.0789C18.2043 9.70388 19.2383 8.42488 19.2383 6.90288C19.2393 5.31488 18.1123 3.98888 16.6143 3.68188"
                        stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      <path
                        d="M17.4608 13.6536C19.4488 13.6536 21.1468 15.0016 21.1468 16.2046C21.1468 16.9136 20.5618 17.6416 19.6718 17.8506"
                        stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </g>
                  </g>
                </svg>
              </div>
              <ul class="profile-dropdown onhover-show-div">
                <li><a href="user-profile.html"><i data-feather="user"></i><span>حساب کاربری </span></a></li>
                <li><a href="email-application.html"><i data-feather="mail"></i><span>صندوق دریافت</span></a></li>
                <li><a href="kanban.html"><i data-feather="file-text"></i><span>میز کار</span></a></li>
                <li><a href="edit-profile.html"><i data-feather="settings"></i><span>تنظیمات</span></a></li>
                <li><a href="login.html"><i data-feather="log-in"> </i><span>ورود</span></a></li>
              </ul>
            </li>
          </ul>
        </div>
        <script class="result-template" type="text/x-handlebars-template">
          <div class="ProfileCard u-cf">                        
            <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
            <div class="ProfileCard-details">
            <div class="ProfileCard-realName"></div>
            </div>
            </div>
          </script>
        <script class="empty-template" type="text/x-handlebars-template">
          <div class="EmptyMessage">جستجوی شما 0 نتیجه یافت. این به احتمال زیاد به این معنی است که بک اند پایین است!</div>
        </script>
      </div>
    </div>
    <div class="page-body-wrapper">
        <div class="sidebar-wrapper">
            <div>
                <div class="logo-wrapper">
                    <a href="index-zeta.html">
                        <img class="img-fluid for-light" src="{{url('Templates/Zeta/assets/images/logo/small-logo.png')}}" alt="" style="height: 70px; !important"> 
                        <img class="img-fluid for-dark" src="{{url('Templates/Zeta/assets/images/logo/small-white-logo.png')}}" alt="">
                    </a>
                    <div class="back-btn"><i class="fa fa-angle-right"></i></div>
                </div>
                <div class="logo-icon-wrapper">
                    <a href="index-zeta.html">
                        <img class="img-fluid" src="{{url('Templates/Zeta/assets/images/logo-icon.png')}}" alt="">
                    </a>
                </div>
                <nav class="sidebar-main">
                    <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                    <div id="sidebar-menu">
                        <ul class="sidebar-links" id="simple-bar">
                            <li class="back-btn">
                                <a href="index-zeta.html">
                                    <img class="img-fluid" src="{{url('Templates/Zeta/assets/images/logo-icon.png')}}" alt="">
                                </a>
                                <div class="mobile-back text-end">
                                    <span>بازگشت</span>
                                    <i class="fa fa-angle-left ps-2" aria-hidden="true"> </i>
                                </div>
                            </li>
                            @foreach ($sidebar as $menu)
                                @if($menu['type'] == null)
                                    <li class="sidebar-list">
                                        <a class="sidebar-link sidebar-title link-nav" href="{{$menu['route'] ? route($menu['route']) : (url($menu['url']) ?? '#')}}{{$menu['route'] ? '?action='.$menu['url'] : ''}}">
                                            <i class="menu-icon {{$menu['icon'] ?? ''}}" style="color:#2c323f;font-size:16px;padding-left: 14px;"></i>
                                            <span>{{__($menu['packeage'].'::RoutName.'.($menu['name'] ?? '???'))}}</span>
                                        </a>
                                    </li>
                                @endif
                                @if($menu['type'] == 'dropdown')
                                    <li class="sidebar-list">
                                        <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                            <i class="menu-icon {{$menu['icon'] ?? ''}}" style="color:#2c323f;font-size:16px;padding-left: 14px;"></i>
                                            <span>{{__($menu['packeage'].'::RoutName.'.($menu['name'] ?? '???'))}}</span>
                                        </a>
                                        <ul class="sidebar-submenu">
                                            @foreach($menu['children'] as $subItem)
                                                <li>
                                                    <a href="{{$subItem['route'] ? route($subItem['route']) : (url($subItem['url']) ?? '#')}}{{$subItem['route'] ? '?action='.$subItem['url'] : ''}}">
                                                        {{__($subItem['packeage'].'::RoutName.'.($subItem['name'] ?? '???'))}}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
                </nav>
            </div>
        </div>
        <div class="page-body">
            <div class="container-fluid">
                <div class="page-title">
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
                </div>
            </div>
        </div>
    </div>
  </div>
  <!-- footer start-->
  <footer class="footer">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 footer-copyright text-center">
          <p class="mb-0">کپی رایت 2022 © تمامی حقوق برای استان کرمانشاه محفوظ است </p>
        </div>
      </div>
    </div>
  </footer>

  <!-- latest jquery-->
  <script src="{{url('Templates/Zeta/assets/js/jquery-3.5.1.min.js')}}"></script>
  <!-- Bootstrap js-->
  <script src="{{url('Templates/Zeta/assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
  <!-- feather icon js-->
  <script src="{{url('Templates/Zeta/assets/js/icons/feather-icon/feather.min.js')}}"></script>
  <script src="{{url('Templates/Zeta/assets/js/icons/feather-icon/feather-icon.js')}}"></script>
  <!-- scrollbar js-->
  <script src="{{url('Templates/Zeta/assets/js/scrollbar/simplebar.js')}}"></script>
  <script src="{{url('Templates/Zeta/assets/js/scrollbar/custom.js')}}"></script>
  <!-- Sidebar jquery-->
  <script src="{{url('Templates/Zeta/assets/js/config.js')}}"></script>
  <!-- Plugins JS start-->
  <script src="{{url('Templates/Zeta/assets/js/sidebar-menu.js')}}"></script>
  <script src="{{url('Templates/Zeta/assets/js/notify/bootstrap-notify.min.js')}}"></script>
  <script src="{{url('Templates/Zeta/assets/js/notify/index.js')}}"></script>
  <script src="{{url('Templates/Zeta/assets/js/datepicker/date-picker/datepicker.js')}}"></script>
  <script src="{{url('Templates/Zeta/assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
  <script src="{{url('Templates/Zeta/assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
  <script src="{{url('Templates/Zeta/assets/js/photoswipe/photoswipe.min.js')}}"></script>
  <script src="{{url('Templates/Zeta/assets/js/photoswipe/photoswipe-ui-default.min.js')}}"></script>
  <script src="{{url('Templates/Zeta/assets/js/photoswipe/photoswipe.js')}}"></script>
  <script src="{{url('Templates/Zeta/assets/js/typeahead/handlebars.js')}}"></script>
  <script src="{{url('Templates/Zeta/assets/js/typeahead/typeahead.bundle.js')}}"></script>
  <script src="{{url('Templates/Zeta/assets/js/typeahead/typeahead.custom.js')}}"></script>
  <script src="{{url('Templates/Zeta/assets/js/typeahead-search/handlebars.js')}}"></script>
  <script src="{{url('Templates/Zeta/assets/js/typeahead-search/typeahead-custom.js')}}"></script>
  <script src="{{url('Templates/Zeta/assets/js/height-equal.js')}}"></script>
  <!-- Plugins JS Ends-->
  <!-- Theme js-->
  <script src="{{url('Templates/Zeta/assets/js/script.js')}}"></script>
  <script src="{{url('Templates/Zeta/assets/js/theme-customizer/customizer.js')}}"></script>
  <!-- login js-->
  <!-- Plugin used-->
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