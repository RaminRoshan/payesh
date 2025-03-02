<!DOCTYPE html>
<html lang="fa" class="light-style layout-navbar-fixed layout-menu-fixed" dir="rtl" data-theme="theme-semi-dark" data-template="vertical-menu-template">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <title>کارا | سامانه جامع گزارش کار</title>
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="{{ config('app.url') }}">

    <meta name="description" content="">

    <link rel="icon" type="image/x-icon" href="{{url('Templates/first/assets/img/favicon/favicon.ico')}}">

    <link rel="stylesheet" href="{{url('Templates/first/assets/vendor/fonts/boxicons.css')}}">
    <link rel="stylesheet" href="{{url('Templates/first/assets/vendor/fonts/fontawesome.css')}}">
    <link rel="stylesheet" href="{{url('Templates/first/assets/vendor/fonts/flag-icons.css')}}">
    <link rel="stylesheet" href="{{url('Templates/first/assets/vendor/css/rtl/core.css')}}" class="template-customizer-core-css">
    <link rel="stylesheet" href="{{url('Templates/first/assets/vendor/css/rtl/theme-default.css')}}" class="template-customizer-theme-css">
    <link rel="stylesheet" type="text/css" href="{{url('Templates/first/assets/vendor/css/rtl/theme-semi-dark.css')}}" class="template-customizer-theme-css">
    <link rel="stylesheet" href="{{url('Templates/first/assets/css/demo.css')}}">
    <link rel="stylesheet" href="{{url('Templates/first/assets/vendor/css/rtl/rtl.css')}}">
    <link rel="stylesheet" href="{{url('Templates/first/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}">
    {{-- <link rel="stylesheet" href="{{url('Templates/first/assets/vendor/libs/typeahead-js/typeahead.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{url('Templates/first/assets/vendor/libs/apex-charts/apex-charts.css')}}"> --}}
    <link rel="stylesheet" href="{{url('Templates/first/assets/vendor/libs/select2/select2.css')}}">
    <link rel="stylesheet" href="{{url('Templates/first/assets/vendor/css/pages/app-calendar.css')}}">
    <link rel="stylesheet" href="{{url('Templates/first/assets/vendor/libs/quill/katex.css')}}">
    <link rel="stylesheet" href="{{url('Templates/first/assets/vendor/libs/quill/editor-fa.css')}}">   
    <link rel="stylesheet" href="{{url('Templates/first/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{url('Templates/first/assets/vendor/libs/bs-stepper/bs-stepper.css')}}">
    <link rel="stylesheet" href="{{url('Templates/first/assets/vendor/css/pages/app-email.css')}}">
    {{-- <script src="{{url('Templates/first/assets/vendor/js/helpers.js')}}"></script> --}}
    <script src="{{url('Templates/first/assets/js/config.js')}}"></script>
    <style>@keyframes blink {0%, 100% {opacity: 1;}50% {opacity: 0;}}.blink {animation: blink 1s infinite;}</style>
  </head>
  <body>
    <div class="layout-wrapper layout-content-navbar">

        <div class="layout-container">
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="index.html" class="app-brand-link" style="margin-right: -25px;">
                        <span class="app-brand-logo demo"></span>
                        <span class="app-brand-text demo menu-text fw-bold ms-2" style="font-size:35px;padding-top: 12px;color:#5a8dee ">سامانه</span>
                        <span class="app-brand-text demo menu-text fw-bold ms-2" style="font-size:35px;padding-top: 12px;">کارا</span>
                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                    <i class="bx menu-toggle-icon d-none d-xl-block fs-4 align-middle"></i>
                    <i class="bx bx-x d-block d-xl-none bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-divider mt-0"></div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    @foreach ($sidebar as $key => $menu)      
                        @if($menu instanceof Illuminate\Database\Eloquent\Collection)

                            <li class="@php echo ($currentMenu ?? '') == $menu->name ? 'menu-item active' : 'menu-item'; @endphp">
                                <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                    <div data-i18n="Dashboards">{{$key ?? '???'}}</div>
                                </a>
                                <ul class="menu-sub">
                                    @foreach($menu as $subItem)
                                    <li class="menu-item">
                                        <a href="{{$subItem->menu->route ? route($subItem->menu->route) : (url($subItem->menu->url) ?? '#')}}{{$subItem->menu->route ? '?action='.$subItem->menu->url : ''}}" class="menu-link">
                                            <div data-i18n="Analytics">{{__($subItem->packeage.'::RoutName.'.($subItem->menu->name ?? '???'))}}</div>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            @if($menu->type == 'header')
                                <li class="menu-header small text-uppercase"><span class="menu-header-text">{{__($menu->packeage.'::RoutName.'.($menu->name ?? '???'))}}</span></li>
                            @endif
                            @if($menu->type == '')
                                <li class="@php echo ($currentMenu ?? '') == $menu->name ? 'menu-item active' : 'menu-item'; @endphp">
                                    <a href="{{$menu->route ? route($menu->route) : (url($menu->url) ?? '#')}}{{$menu->route ? ($menu->url ? '?action='.$menu->url : '') : ''}}" class="menu-link">
                                        <i class="menu-icon {{$menu->icon ?? ''}}"></i> 
                                        <div style="color: #ffffff;">{{__($menu->packeage.'::RoutName.'.($menu->name ?? '???'))}}</div>
                                        @if($menu->name == 'userTask')
                                            @php
                                                $DelayToDo = Pishgaman\WorkReport\Database\Models\Task::where('employee_id',$currentUser->id)->whereNull('done_at')->where('start_date', '<', Carbon\Carbon::today())->count();
                                                $todayTask = Pishgaman\WorkReport\Database\Models\Task::where('employee_id',$currentUser->id)->where('status','InProgress')->whereDate('start_date', now())->count();                                        
                                            @endphp
                                            @if($DelayToDo + $todayTask > 0)
                                            <button type="button" class="btn btn-sm rounded-pill btn-icon btn-danger" style="margin-right: 40%;"><span class="blink">{{$DelayToDo + $todayTask}}</span></button>
                                            @endif
                                        @endif
                                        @if($menu->name == 'messages')
                                            @php
                                                $countUnRead = Pishgaman\Pishgaman\Database\Models\Messages\Messages::whereNull('read_at')->where('recipient_id',$currentUser->id)->count();
                                            @endphp
                                            @if($countUnRead > 0)
                                                <button type="button" class="btn btn-sm rounded-pill btn-icon btn-info" style="margin-right: 40%;"><span class="blink">{{$countUnRead}}</span></button>
                                            @endif                                             
                                        @endif
                                    </a>
                                </li>
                            @endif
                        @endif
                    @endforeach
                </ul>
                <div class="digital-clock">
                    <div class="time">
                        <span id="seconds">00</span>
                        <span class="colon">:</span>
                        <span id="minutes">00</span>
                        <span class="colon">:</span>
                        <span id="hours">00</span>
                    </div>
                    <div class="date date-shamsi" id="date-shamsi"></div>
                    <div class="date date-miladi" id="date-miladi"></div>
                </div>             
            </aside>

            <div class="layout-page">
                <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
                <div class="container-fluid">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="bx bx-menu bx-sm"></i>
                    </a>
                    </div>
    
                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                    <!-- Search -->
                    <!-- <div class="navbar-nav align-items-center">
                        <div class="nav-item navbar-search-wrapper mb-0">
                        <a class="nav-item nav-link search-toggler px-0" href="javascript:void(0);">
                            <i class="bx bx-search-alt bx-sm"></i>
                            <span class="d-none d-md-inline-block text-muted">جستجو <span class="d-inline-block" dir="ltr">(Ctrl+/)</span></span>
                        </a>
                        </div>
                    </div> -->
                    <!-- /Search -->
    
                    <ul class="navbar-nav flex-row align-items-center ms-auto">
                        <!-- Language -->
                        <!-- <li class="nav-item dropdown-language dropdown me-2 me-xl-0">
                        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                            <i class="fi fi-ir fis rounded-circle fs-3 me-1"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                            <a class="dropdown-item" href="javascript:void(0);" data-language="fa">
                                <i class="fi fi-ir fis rounded-circle fs-4 me-1"></i>
                                <span class="align-middle">فارسی</span>
                            </a>
                            </li>
                        </ul>
                        </li> -->
                        <!--/ Language -->
    
                        <!-- Style Switcher -->
                        <!-- <li class="nav-item me-2 me-xl-0">
                        <a class="nav-link style-switcher-toggle hide-arrow" href="javascript:void(0);">
                            <i class="bx bx-sm"></i>
                        </a>
                        </li> -->
                        <!--/ Style Switcher -->
    
                        <!-- Quick links  -->
                        <!-- <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown me-2 me-xl-0">
                        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                            <i class="bx bx-grid-alt bx-sm"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end py-0">
                            <div class="dropdown-menu-header border-bottom">
                            <div class="dropdown-header d-flex align-items-center py-3">
                                <h5 class="text-body mb-0 me-auto secondary-font">میانبرها</h5>
                                <a href="javascript:void(0)" class="dropdown-shortcuts-add text-body" data-bs-toggle="tooltip" data-bs-placement="top" title="افزودن میانبر"><i class="bx bx-sm bx-plus-circle"></i></a>
                            </div>
                            </div>
                            <div class="dropdown-shortcuts-list scrollable-container">
                            <div class="row row-bordered overflow-visible g-0">
                                <div class="dropdown-shortcuts-item col">
                                <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                    <i class="bx bx-calendar fs-4"></i>
                                </span>
                                <a href="app-calendar.html" class="stretched-link">تقویم</a>
                                <small class="text-muted mb-0">قرارهای ملاقات</small>
                                </div>
                                <div class="dropdown-shortcuts-item col">
                                <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                    <i class="bx bx-food-menu fs-4"></i>
                                </span>
                                <a href="app-invoice-list.html" class="stretched-link">برنامه صورتحساب</a>
                                <small class="text-muted mb-0">مدیریت حساب‌ها</small>
                                </div>
                            </div>
                            <div class="row row-bordered overflow-visible g-0">
                                <div class="dropdown-shortcuts-item col">
                                <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                    <i class="bx bx-user fs-4"></i>
                                </span>
                                <a href="app-user-list.html" class="stretched-link">برنامه کاربر</a>
                                <small class="text-muted mb-0">مدیریت کاربران</small>
                                </div>
                                <div class="dropdown-shortcuts-item col">
                                <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                    <i class="bx bx-check-shield fs-4"></i>
                                </span>
                                <a href="app-access-roles.html" class="stretched-link">مدیریت نقش‌‌ها</a>
                                <small class="text-muted mb-0">مجوزها</small>
                                </div>
                            </div>
                            <div class="row row-bordered overflow-visible g-0">
                                <div class="dropdown-shortcuts-item col">
                                <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                    <i class="bx bx-pie-chart-alt-2 fs-4"></i>
                                </span>
                                <a href="index.html" class="stretched-link">داشبورد</a>
                                <small class="text-muted mb-0">پروفایل کاربر</small>
                                </div>
                                <div class="dropdown-shortcuts-item col">
                                <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                    <i class="bx bx-cog fs-4"></i>
                                </span>
                                <a href="pages-account-settings-account.html" class="stretched-link">تنظیمات</a>
                                <small class="text-muted mb-0">تنظیمات حساب</small>
                                </div>
                            </div>
                            <div class="row row-bordered overflow-visible g-0">
                                <div class="dropdown-shortcuts-item col">
                                <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                    <i class="bx bx-help-circle fs-4"></i>
                                </span>
                                <a href="pages-help-center-landing.html" class="stretched-link">مرکز راهنمایی</a>
                                <small class="text-muted mb-0">سوالات متداول و مقالات</small>
                                </div>
                                <div class="dropdown-shortcuts-item col">
                                <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                    <i class="bx bx-window-open fs-4"></i>
                                </span>
                                <a href="modal-examples.html" class="stretched-link">مودال‌ها</a>
                                <small class="text-muted mb-0">پاپ‌آپ‌های کاربردی</small>
                                </div>
                            </div>
                            </div>
                        </div>
                        </li> -->
                        <!-- Quick links -->
    
                        <!-- Notification -->
                        <!-- <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-2">
                        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                            <i class="bx bx-bell bx-sm"></i>
                            <span class="badge bg-danger rounded-pill badge-notifications">5</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end py-0">
                            <li class="dropdown-menu-header border-bottom">
                            <div class="dropdown-header d-flex align-items-center py-3">
                                <h5 class="text-body mb-0 me-auto secondary-font">اعلان‌ها</h5>
                                <a href="javascript:void(0)" class="dropdown-notifications-all text-body" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark all as read"><i class="bx fs-4 bx-envelope-open"></i></a>
                            </div>
                            </li>
                            <li class="dropdown-notifications-list scrollable-container">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                    <div class="avatar">
                                        <img src="{{url('media/images/Users/Profile/noImage.png')}}" alt class="w-px-40 h-auto rounded-circle">
                                    </div>
                                    </div>
                                    <div class="flex-grow-1">
                                    <h6 class="mb-1">تبریک می‌گوییم کلارک</h6>
                                    <p class="mb-1">شما نشان فروشنده برتر ماه را برنده شدید</p>
                                    <small class="text-muted">1 ساعت قبل</small>
                                    </div>
                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                    <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                    <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                                    </div>
                                </div>
                                </li>
                                <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                    <div class="avatar">
                                        <span class="avatar-initial rounded-circle bg-label-danger">اک</span>
                                    </div>
                                    </div>
                                    <div class="flex-grow-1">
                                    <h6 class="mb-1">دیوید بکهام</h6>
                                    <p class="mb-1">درخواست شما را قبول کرد.</p>
                                    <small class="text-muted">12 ساعت قبل</small>
                                    </div>
                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                    <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                    <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                                    </div>
                                </div>
                                </li>
                                <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                    <div class="avatar">
                                        <img src="assets/img/avatars/2.png" alt class="w-px-40 h-auto rounded-circle">
                                    </div>
                                    </div>
                                    <div class="flex-grow-1">
                                    <h6 class="mb-1">پیام جدید</h6>
                                    <p class="mb-1">شما پیام جدید از ناتالی دارید</p>
                                    <small class="text-muted">1 ساعت قبل</small>
                                    </div>
                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                    <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                    <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                                    </div>
                                </div>
                                </li>
                                <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                    <div class="avatar">
                                        <span class="avatar-initial rounded-circle bg-label-success"><i class="bx bx-cart"></i></span>
                                    </div>
                                    </div>
                                    <div class="flex-grow-1">
                                    <h6 class="mb-1">هورا! شما سفارش جدید دارید</h6>
                                    <p class="mb-1">شرکت گوگل یک سفارش جدید ثبت کرد</p>
                                    <small class="text-muted">1 روز قبل</small>
                                    </div>
                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                    <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                    <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                                    </div>
                                </div>
                                </li>
                                <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                    <div class="avatar">
                                        <img src="assets/img/avatars/9.png" alt class="w-px-40 h-auto rounded-circle">
                                    </div>
                                    </div>
                                    <div class="flex-grow-1">
                                    <h6 class="mb-1">برنامه مورد تایید قرار گرفت</h6>
                                    <p class="mb-1">برنامه پروژه مدیریت شما پذیرفته شد.</p>
                                    <small class="text-muted">2 روز قبل</small>
                                    </div>
                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                    <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                    <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                                    </div>
                                </div>
                                </li>
                                <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                    <div class="avatar">
                                        <span class="avatar-initial rounded-circle bg-label-success"><i class="bx bx-pie-chart-alt"></i></span>
                                    </div>
                                    </div>
                                    <div class="flex-grow-1">
                                    <h6 class="mb-1">گزارش ماهانه ایجاد شد</h6>
                                    <p class="mb-1">گزارش ماهانه ماه خرداد ایجاد شد</p>
                                    <small class="text-muted">3 روز قبل</small>
                                    </div>
                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                    <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                    <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                                    </div>
                                </div>
                                </li>
                                <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                    <div class="avatar">
                                        <img src="assets/img/avatars/5.png" alt class="w-px-40 h-auto rounded-circle">
                                    </div>
                                    </div>
                                    <div class="flex-grow-1">
                                    <h6 class="mb-1">ارسال درخواست ارتباط</h6>
                                    <p class="mb-1">پیتر یک درخواست ارتباط برای شما ارسال کرد</p>
                                    <small class="text-muted">4 روز قبل</small>
                                    </div>
                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                    <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                    <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                                    </div>
                                </div>
                                </li>
                                <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                    <div class="avatar">
                                        <img src="assets/img/avatars/6.png" alt class="w-px-40 h-auto rounded-circle">
                                    </div>
                                    </div>
                                    <div class="flex-grow-1">
                                    <h6 class="mb-1">پیام جدید از جین</h6>
                                    <p class="mb-1">شما پیام جدید از سمت جین دارید</p>
                                    <small class="text-muted">5 روز قبل</small>
                                    </div>
                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                    <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                    <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                                    </div>
                                </div>
                                </li>
                                <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                    <div class="avatar">
                                        <span class="avatar-initial rounded-circle bg-label-warning"><i class="bx bx-error"></i></span>
                                    </div>
                                    </div>
                                    <div class="flex-grow-1">
                                    <h6 class="mb-1">میزان مصرف CPU بالاست</h6>
                                    <p class="mb-1">میران مصرف CPU در حال حاضر 88.63% است</p>
                                    <small class="text-muted">5 روز قبل</small>
                                    </div>
                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                    <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                    <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                                    </div>
                                </div>
                                </li>
                            </ul>
                            </li>
                            <li class="dropdown-menu-footer border-top">
                            <a href="javascript:void(0);" class="dropdown-item d-flex justify-content-center p-3">
                                مشاهده همه اعلان‌ها
                            </a>
                            </li>
                        </ul>
                        </li> -->
                        <!--/ Notification -->
    
                        <!-- User -->
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                            <div class="avatar avatar-online">
                            <img src="{{url('media/images/Users/Profile/noImage.png')}}" alt class="rounded-circle">
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                            <button class="dropdown-item btn-link">
                                <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                    <img src="{{url('media/images/Users/Profile/noImage.png')}}" alt class="rounded-circle">
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-semibold d-block">{{$currentUser->username ?? '???'}}</span>
                                    <small>{{$currentUser->name ?? ''}} {{$currentUser->last_name ?? ''}} </small>
                                </div>
                                </div>
                            </button>
                            </li>
                            <li>
                            <div class="dropdown-divider"></div>
                            </li>
                            <li>
                            <a class="dropdown-item" href="{{route('PAdminUsers')}}?action=profile">
                                <i class="bx bx-user me-2"></i>
                                <span class="align-middle">پروفایل من</span>
                            </a>
                            </li>
                            <!-- <li>
                            <a class="dropdown-item" href="pages-account-settings-account.html">
                                <i class="bx bx-cog me-2"></i>
                                <span class="align-middle">تنظیمات</span>
                            </a>
                            </li> -->
                            <div class="dropdown-divider"></div>
                            </li>
                            <li>
                            <a class="dropdown-item" href="{{route('home')}}?action=help">
                                <i class="bx bx-support me-2"></i>
                                <span class="align-middle">راهنمایی</span>
                            </a>
                            </li>
                            <li>
                            <a class="dropdown-item" href="{{route('home')}}?action=showLastUpdate">
                                <i class="bx bx-refresh me-2"></i>
                                <span class="align-middle">آخرین به روزرسانی</span>
                            </a>
                            </li>                            
                            <li>
                            <div class="dropdown-divider"></div>
                            </li>
                            <li>
                            <a class="dropdown-item" href="{{route('home')}}?action=logout">
                                <i class="bx bx-power-off me-2"></i>
                                <span class="align-middle">خروج</span>
                            </a>
                            </li>
                        </ul>
                        </li>
                        <!--/ User -->
                    </ul>
                    </div>
    
                    <!-- Search Small Screens -->
                    <div class="navbar-search-wrapper search-input-wrapper d-none">
                    <input type="text" class="form-control search-input container-fluid border-0" placeholder="جستجو ..." aria-label="Search...">
                    <i class="bx bx-x bx-sm search-toggler cursor-pointer"></i>
                    </div>
                </div>
                </nav>            

                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        @if($breadcrumb ?? false)
                        <nav aria-label="breadcrumb" style="padding-bottom: 25px;">
                            <ol class="lh-1-85 breadcrumb breadcrumb-style2 mb-0">
                                @foreach ($breadcrumb as $label => $url)
                                @if (!$loop->last)
                                <li class="breadcrumb-item">
                                    <a href="{{ $url }}">{{ $label }}</a>
                                </li>
                                @else
                                <li class="breadcrumb-item active">{{ $label }}</li>
                                @endif
                                @endforeach
                            </ol>
                        </nav> 
                        @endif  
                        @if(($card ?? '' )!= '')
                        <div class="row">
                            <div class="col-lg-12 col-md-12 mb-4">
                                <div class="card h-100">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="card-title mb-0">{{$currentMenu}}</h5>
                                    </div>
                                    <div class="card-body pb-2" style="position: relative;">
                                        <div class="d-flex justify-content-around align-items-center flex-wrap mb-4">
                                            @yield('content')                    
                                        </div>
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
  <script src="{{url('Templates/first/assets/vendor/libs/jquery/jquery.js')}}"></script>
  <script src="{{url('Templates/first/assets/vendor/libs/popper/popper.js')}}"></script>
  <script src="{{url('Templates/first/assets/vendor/js/bootstrap.js')}}"></script>
  <script src="{{url('Templates/first/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
  {{-- <script src="{{url('Templates/first/assets/vendor/libs/hammer/hammer.js')}}"></script> --}}
  <script src="{{url('Templates/first/assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>
  <script src="{{url('Templates/first/assets/vendor/js/menu.js')}}"></script>
  {{-- <script src="{{url('Templates/first/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script> --}}
  {{-- <script src="{{url('Templates/first/assets/js/main.js')}}"></script> --}}
  {{-- <script src="{{url('Templates/first/assets/js/dashboards-analytics.js')}}"></script> --}}
  <script src="{{url('Templates/first/assets/vendor/libs/select2/select2.js')}}"></script>
  <script src="{{url('Templates/first/assets/vendor/libs/quill/katex.js')}}"></script>
  <script src="{{url('Templates/first/assets/vendor/libs/quill/quill.js')}}"></script>  
  <script src="{{url('Templates/first/assets/js/app-email.js')}}"></script>
  <script src="{{url('media/plugin/tinymce/tinymce.min.js')}}"></script>
  <script src="{{url('Templates/first/assets/vendor/libs/select2/i18n/fa.js')}}"></script>
    @if(($mix ?? '') != '')
        @foreach ($mix as $item)
            @vite($item)
        @endforeach
    @endif
    <script>
tinymce.init({
    selector: '#notetext',
    
    height: 300,
    plugins: [
        'advlist lists charmap print hr',
        'wordcount insertdatetime',
        'table directionality paste textcolor directionality'
    ],
    
    language: "fa",

    toolbar: 'bold italic underline strikethrough | ltr rtl | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | fontsizeselect | forecolor backcolor',
    
    fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt 42pt 72pt',
    directionality: 'rtl',

});
        function updateClock() {
            const now = new Date();

            // Update time
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            document.getElementById('hours').textContent = hours;
            document.getElementById('minutes').textContent = minutes;
            document.getElementById('seconds').textContent = seconds;

            // Update Shamsi date
            const optionsShamsi = { year: 'numeric', month: 'long', day: 'numeric' };
            const formattedDateShamsi = new Intl.DateTimeFormat('fa-IR', optionsShamsi).format(now);
            document.getElementById('date-shamsi').textContent = `${formattedDateShamsi}`;

            // Update Miladi date
            const optionsMiladi = { year: 'numeric', month: 'long', day: 'numeric' };
            const formattedDateMiladi = new Intl.DateTimeFormat('en-US', optionsMiladi).format(now);
            document.getElementById('date-miladi').textContent = `${formattedDateMiladi}`;
        }

        setInterval(updateClock, 1000);
        updateClock();
    </script>
    <style>
        .digital-clock {
            background-color: #0D1B24;
            color: #ffffff;
            padding: 20px 40px;
            /* border-radius: 15px; */
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
            font-size: 48px;
            font-weight: bold;
            text-align: center;
            font-family: 'Courier New', Courier, monospace;
        }

        .time {
            display: flex;
            gap: 10px;
            align-items: center;
            justify-content: center;
        }

        .time span {
            width: 1ch;
            text-align: center;
            font-size: 1em;
        }

        .colon {
            animation: blink 1s step-start infinite;
            color: #d33;
            padding-right: 15px;
        }

        .date {
            margin-top: 10px;
            font-size: 18px;
            color: #aaa;
        }

        .date-shamsi,
        .date-miladi {
            margin-top: 5px;
            font-size: 16px;
        }

        @keyframes blink {
            50% { opacity: 0; }
        }
    </style>
</body>
</html>