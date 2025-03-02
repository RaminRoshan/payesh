<!DOCTYPE html>
<html lang="fa" class="light-style customizer-hide" dir="rtl" data-theme="theme-default" data-Templates/first/assets-path="Templates/first/assets/" data-template="vertical-menu-template">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <title>ورود به ناحیه کاربری | بیستون</title>
    <meta name="description" content="ورود به ناحیه کاربری | بیستون">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="{{ config('app.url') }}">
    <link rel="icon" type="image/x-icon" href="Templates/first/assets/img/favicon/favicon.ico">

    <link rel="stylesheet" href="Templates/first/assets/vendor/fonts/boxicons.css">
    <link rel="stylesheet" href="Templates/first/assets/vendor/fonts/fontawesome.css">
    <link rel="stylesheet" href="Templates/first/assets/vendor/fonts/flag-icons.css">
    <link rel="stylesheet" href="Templates/first/assets/vendor/css/rtl/core.css" class="template-customizer-core-css">
    <link rel="stylesheet" href="Templates/first/assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css">
    <link rel="stylesheet" href="Templates/first/assets/css/demo.css">
    <link rel="stylesheet" href="Templates/first/assets/vendor/css/rtl/rtl.css">
    <link rel="stylesheet" href="Templates/first/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="Templates/first/assets/vendor/libs/typeahead-js/typeahead.css">
    <link rel="stylesheet" href="Templates/first/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css">
    <link rel="stylesheet" href="Templates/first/assets/vendor/css/pages/page-auth.css">
    <script src="Templates/first/assets/vendor/js/helpers.js"></script>
    <script src="Templates/first/assets/js/config.js"></script>
  </head>

  <body>
    <div class="authentication-wrapper authentication-cover">
      <div class="authentication-inner row m-0">
        <div class="d-none d-lg-flex col-lg-7 col-xl-9 align-items-center" style="
            background-image: url('Templates/first/assets/img/pages/login-light.jpg');
            background-size: cover;
        ">
        </div>
        <div class="d-flex col-12 col-lg-5 col-xl-3 align-items-center authentication-bg p-sm-5 p-4">
          <div class="w-px-400 mx-auto">
            <!-- Logo -->
            <div class="app-brand mb-4">
              <a href="index.html" class="app-brand-link gap-2 mb-2">
                <span class="app-brand-text demo h3 mb-0 fw-bold">ورود به سامانه بیستون</span>
              </a>
            </div>
            @yield('content')
          </div>
        </div>
      </div>
    </div>
    <script src="Templates/first/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="Templates/first/assets/vendor/libs/popper/popper.js"></script>
    <script src="Templates/first/assets/vendor/js/bootstrap.js"></script>
    <script src="Templates/first/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="Templates/first/assets/vendor/libs/hammer/hammer.js"></script>
    <script src="Templates/first/assets/vendor/libs/i18n/i18n.js"></script>
    <script src="Templates/first/assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="Templates/first/assets/vendor/js/menu.js"></script>
    <script src="Templates/first/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
    <script src="Templates/first/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
    <script src="Templates/first/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>
    <script src="Templates/first/assets/js/main.js"></script>
    <script src="Templates/first/assets/js/pages-auth.js"></script>
    @if(($mix ?? '') != '')
        @foreach ($mix as $item)
            @vite($item)
        @endforeach
    @endif    
  </body>
</html>
