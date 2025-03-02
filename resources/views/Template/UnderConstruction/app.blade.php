<html lang="fa" class=" js cssanimations"><head>
    <meta charset="utf-8">
    <title>مدیریت محتوی پیشگامان</title>
    <meta name="description" content="مدیریت محتوی پیشگامان">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="templates/UnderConstruction/img/favicon.png">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="templates/UnderConstruction/img/favicon-retina-ipad.png">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="templates/UnderConstruction/img/favicon-retina-iphone.png">
    <!-- Standard iPad Touch Icon--> 
    <link rel="apple-touch-icon" sizes="72x72" href="templates/UnderConstruction/img/favicon-standard-ipad.png">
    <!-- Standard iPhone Touch Icon--> 
    <link rel="apple-touch-icon" sizes="57x57" href="templates/UnderConstruction/img/favicon-standard-iphone.png">

    <!-- ============== Resources style ============== -->
    <link rel="stylesheet" href="templates/UnderConstruction/css/style.css">

    <!-- Modernizr runs quickly on page load to detect features -->
    <script src="templates/UnderConstruction/js/modernizr.custom.js"></script>
</head>

<body onload="start()" onresize="resize()" onorientationchange="resize()" class="mCustomScrollbar _mCS_1 mCS-dir-rtl"><div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" tabindex="0"><div id="mCSB_1_container" class="mCSB_container" style="position:relative; top:0; left:0;" dir="rtl">

    <!-- Page preloader -->
    <div id="loading" class="" style="opacity: 0; transform: scaleX(1) scaleY(1); transform-origin: 50% 50% 0px; display: none;">
        <div id="preloader" class="" style="opacity: 0;">
            <span></span>
            <span></span>
            <div id="preloader_text">در حال بارگذاری ...</div>
        </div>
    </div>

    <!-- Overlay -->
    <div class="global-overlay">
        <div class="overlay">
            <canvas id="starfield" width="1366" height="329" style="position: absolute;"></canvas>
        </div>
    </div>

    <!-- START - Home Part -->
    <section id="home-wrap" class="" style="opacity: 1; display: block;">

        <!-- Stars Overlay - Uncomment the next 3 lines to activate the effect-->

        <!-- 
        <div id="stars"></div>
        <div id="stars2"></div>
        <div id="stars3"></div>
        -->

        <div class="content">

            <h1 class="text-intro secondary-font animated-middle fadeInUp"><span class="polyfy-title">به فرموده رهبر انقلاب</span></h1>

            <p class="text-intro animated-middle fadeInUp">فضای مجازی به اندازه انقلاب اسلامی اهمیت دارد و عرصه فرهنگی عرصه جهاد است.</p>

            <a href="login"  class="light-btn text-intro animated-middle fadeInUp" style="background:bisque;color: red">ورود به ناحیه کاربری</a>
            <a href="#" id="open-more-info" data-target="info-wrap" class="light-btn text-intro animated-middle fadeInUp">اطلاعات بیشتر</a>


        </div> <!-- /. content -->

        <!-- Social icons -->
        <div class="social-icons text-intro animated-middle fadeInUp">

            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-google-plus"></i></a>
            <a href="#"><i class="fa fa-telegram"></i></a>

        </div> <!-- /. social-icons -->

    </section>
    <!-- END - Home Part -->

    <!-- START - More Informations Part -->
    <section id="info-wrap">

        <div class="hero">

            <div class="center-text">

                <h6 class="darky secondary-font">جهاد علمی و نرم‌افزاری</h6>

                <p>
                    رهبر انقلاب از سال‌ها پیش مساله جنبش نرم‌افزاری و نهضت تولید علم را مطرح کردند و در بیانیه گام دوم نیز بر اهمیت مساله علم و پژوهش تاکید کرده و حتی علم را رکن امنیت پایدار کشور دانستند و اشاره کردند که باید در بستر حوزه و دانشگاه باید رویکرد جهاد علمی اتفاق بیفتد.<br>
                    باید برای ساخت ایران قوی همت کنیم و در برابر آرایش جنگی دشمن و تولید محتوا موضعی فعال و مبتکرانه در پیش بگیریم و یکی از مظاهر ایران قوی، قوت گرفتن در فضای مجازی حاکم بر زندگی انسان‌ها است که باید با برنامه‌ریزی دقیق، فعال و مبتکرانه صورت بگیرد.                    
                </p>

            </div> <!-- /. center-text -->

        </div> <!-- /. hero -->

    </section>



    <!-- Root element of PhotoSwipe, the gallery. Must have class pswp. -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

        <!-- Background of PhotoSwipe. 
It's a separate element as animating opacity is faster than rgba(). -->
        <div class="pswp__bg"></div>

        <!-- Slides wrapper with overflow:hidden. -->
        <div class="pswp__scroll-wrap">

            <!-- Container that holds slides. 
PhotoSwipe keeps only 3 of them in the DOM to save memory.
Don't modify these 3 pswp__item elements, data is added later on. -->
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
            <div class="pswp__ui pswp__ui--hidden">

                <div class="pswp__top-bar">

                    <!--  Controls are self-explanatory. Order can be changed. -->

                    <div class="pswp__counter"></div>

                    <button class="pswp__button pswp__button--close" title="بستن (Esc)"></button>

                    <button class="pswp__button pswp__button--share" title="اشتراک گذاری"></button>

                    <button class="pswp__button pswp__button--fs" title="تمام صفحه"></button>

                    <button class="pswp__button pswp__button--zoom" title="بزرگ/کوچک نمایی"></button>

                    <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                    <!-- element will get class pswp__preloader--active when preloader is running -->
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div> 
                </div>

                <button class="pswp__button pswp__button--arrow--left" title="قبلی">
                </button>

                <button class="pswp__button pswp__button--arrow--right" title="بعدی">
                </button>

                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>

            </div>

        </div>

    </div>
    <!-- /. Root element of PhotoSwipe. Must have class pswp. -->

<!-- ///////////////////\\\\\\\\\\\\\\\\\\\ -->
<!-- ********** Resources jQuery ********** -->
<!-- \\\\\\\\\\\\\\\\\\\/////////////////// -->

<!-- * Libraries jQuery, Easing and Bootstrap - Be careful to not remove them * -->
<script src="templates/UnderConstruction/js/jquery.min.js"></script>
<script src="templates/UnderConstruction/js/jquery.easings.min.js"></script>
<script src="templates/UnderConstruction/js/bootstrap.min.js"></script>

<!-- Accelerated JavaScript animation JS file -->
<script src="templates/UnderConstruction/js/velocity.min.js"></script> 

<!-- Accelerated JavaScript animation UI JS file -->
<script src="templates/UnderConstruction/js/velocity.ui.min.js"></script> 

<!-- Newsletter plugin -->
<script src="templates/UnderConstruction/js/notifyMe.js"></script>

<!-- Contact form plugin -->
<script src="templates/UnderConstruction/js/contact-me.js"></script>

<!-- Scroll plugin -->
<script src="templates/UnderConstruction/js/jquery.mousewheel.js"></script>

<!-- Custom Scrollbar plugin -->
<script src="templates/UnderConstruction/js/jquery.mCustomScrollbar.js"></script>

<!-- Popup Newsletter Form -->
<script src="templates/UnderConstruction/js/classie.js"></script>
<script src="templates/UnderConstruction/js/dialogFx.js"></script>

<!-- PhotoSwipe Core JS file -->
<script src="templates/UnderConstruction/js/photoswipe.js"></script> 

<!-- PhotoSwipe UI JS file -->
<script src="templates/UnderConstruction/js/photoswipe-ui-default.js"></script>

<!-- Star Wars plugin -->
<script src="templates/UnderConstruction/js/starfield.js"></script>

<!-- Main JS File -->
<script src="templates/UnderConstruction/js/main.js"></script>

<!--[if lt IE 10]><script type="text/javascript" src="js/placeholder.js"></script><![endif]-->



</div><div id="mCSB_1_scrollbar_vertical" class="mCSB_scrollTools mCSB_1_scrollbar mCS-light mCSB_scrollTools_vertical" style="display: block;"><div class="mCSB_draggerContainer"><div id="mCSB_1_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; display: block; height: 66px; max-height: 319px;" oncontextmenu="return false;"><div class="mCSB_dragger_bar" style="line-height: 30px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div></body></html>