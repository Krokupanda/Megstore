<?php
require "./assets/less/lessc.inc.php";
function autoCompileLess($inputFile, $outputFile)
{
    // load the cache
    $cacheFile = $inputFile . ".cache";
    if (file_exists($cacheFile)) {
        $cache = unserialize(file_get_contents($cacheFile));
    } else {
        $cache = $inputFile;
    }
    $less = new lessc;
    $newCache = $less->cachedCompile($cache);
    if (!is_array($cache) || $newCache["updated"] > $cache["updated"]) {
        file_put_contents($cacheFile, serialize($newCache));
        file_put_contents($outputFile, $newCache['compiled']);
    }
}
autoCompileLess('./assets/less/style.less', './assets/css/style.css');
// class="col-xs-6 wow fadeIn" data-wow-delay="0.3s" data-wow-duration="0.6s"
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<meta name="viewport" content="width=1300px">-->
    <link rel="stylesheet" href="./assets/fonts/stylesheet.css" type="text/css" />
    <link rel="stylesheet" href="./assets/css/style.css" type="text/css" />
</head>

<body>
    <div class="wrapper">
        <div id="mobile-menu">
            <div class="block">
                <ul>
                    <li><a href=""><span>Link</span></a></li>
                    <li><a href=""><span>Link</span></a></li>
                    <li><a href=""><span>Link</span></a></li>
                    <li><a href=""><span>Link</span></a></li>
                </ul>
            </div>
        </div>

        <header>
            <a class="logo" href="">
                Me<span>g</span>
            </a>
            <a href="#" class="cart">
                <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.85785 18.993C5.13222 19.0637 4.39991 18.975 3.71212 18.7331C3.02432 18.4913 2.39763 18.1022 1.87585 17.593C1.45318 16.9952 1.16458 16.3131 1.02979 15.5934C0.895003 14.8737 0.917195 14.1334 1.09485 13.423L1.77485 8.13905C1.91276 7.24274 2.33316 6.41383 2.97485 5.77303C3.54155 5.22956 4.29769 4.92826 5.08285 4.93304C5.18829 3.84462 5.69523 2.83447 6.50487 2.09946C7.31452 1.36446 8.36885 0.957275 9.46235 0.957275C10.5559 0.957275 11.6102 1.36446 12.4198 2.09946C13.2295 2.83447 13.7364 3.84462 13.8419 4.93304H13.8999C15.5089 4.93304 16.7738 6.17503 17.2108 8.17403L17.9109 13.635C18.0353 14.3167 18.0131 15.0171 17.8459 15.6895C17.6786 16.362 17.3701 16.9911 16.9409 17.535C16.441 18.0404 15.8384 18.4324 15.1737 18.6845C14.5091 18.9365 13.7981 19.0428 13.0888 18.996L5.85785 18.993ZM3.05785 8.33904L2.38185 13.601C2.23593 14.1298 2.20397 14.6835 2.2881 15.2255C2.37223 15.7675 2.57052 16.2854 2.86985 16.745C3.26925 17.11 3.74338 17.3835 4.25924 17.5465C4.77509 17.7095 5.32028 17.7582 5.85685 17.689H13.0999C13.6293 17.7371 14.1628 17.6687 14.663 17.4885C15.1631 17.3083 15.6177 17.0207 15.9949 16.646C16.3112 16.2099 16.5294 15.7106 16.6347 15.1823C16.74 14.6539 16.7298 14.1091 16.6049 13.585L15.9409 8.39304C15.6409 7.04304 14.8839 6.23203 13.9099 6.23203H5.07885C4.05885 6.23603 3.29985 7.01903 3.05785 8.34003V8.33904ZM12.5318 4.93104C12.4266 4.19209 12.0582 3.51595 11.4944 3.0268C10.9306 2.53765 10.2093 2.26835 9.46285 2.26835C8.71644 2.26835 7.9951 2.53765 7.43131 3.0268C6.86752 3.51595 6.49914 4.19209 6.39385 4.93104H12.5318ZM11.9999 9.95803C11.8313 9.96309 11.6674 9.90269 11.5425 9.78948C11.4175 9.67627 11.3413 9.51907 11.3298 9.35087C11.3183 9.18266 11.3724 9.01653 11.4807 8.88735C11.589 8.75817 11.7432 8.67599 11.9109 8.65804L11.9999 8.65304H12.0389C12.2074 8.64797 12.3713 8.70839 12.4962 8.8216C12.6212 8.93481 12.6974 9.09201 12.7089 9.26022C12.7204 9.42842 12.6663 9.59454 12.558 9.72372C12.4497 9.8529 12.2955 9.93509 12.1279 9.95304L12.0389 9.95803H11.9999ZM6.94485 9.95803C6.77633 9.96309 6.6124 9.90269 6.48746 9.78948C6.36253 9.67627 6.28631 9.51907 6.27479 9.35087C6.26328 9.18266 6.31736 9.01653 6.4257 8.88735C6.53404 8.75817 6.68822 8.67599 6.85585 8.65804L6.94485 8.65304H6.98285C7.15137 8.64797 7.3153 8.70839 7.44024 8.8216C7.56517 8.93481 7.6414 9.09201 7.65291 9.26022C7.66443 9.42842 7.61034 9.59454 7.502 9.72372C7.39366 9.8529 7.23949 9.93509 7.07185 9.95304L6.98285 9.95803H6.94485Z" fill="white" />
                </svg>
            </a>

            <ul>
                <li><a href="#">Store</a></li>
                <li><a href="#">About</a></li>
                <li>
                    <button>
                        <span></span>
                    </button>
                </li>
            </ul>
            <div class="avatar">
                <img src="assets/img/user.png" alt="">
            </div>

            <div class="menu">
                <!-- Кнопка Мобильного Меню -->
                <button id="burger-menu">
                    <div class="box box_item1"></div>
                    <div class="box box_item2"></div>
                    <div class="box box_item3"></div>
                </button>
            </div>
        </header>

        <div class="main">
            проверка
        </div>
        <!-- <button class="md-trigger" data-modal="modal-1">Модальное окно</button> -->

    </div>
    <div class="md-modal md-effect-1" id="modal-1">
        <div class="md-content">
            <h3>Модальные окна</h3>
            <div>
                <p> Это модальное окно. Вы можете выполнять следующие действия с ним:</p>
                <ul>
                    <li><strong>Читать:</strong> модальные окна, вероятно, несут важную текстовую информацию, так что не забудьте прочитать то, что в них написано.</li>
                    <li><strong>Смотреть:</strong> модальные окна несут визуальную информацию, на которую приятно смотреть.</li>
                    <li><strong>Закрыть:</strong> нажмите на кнопку, чтобы закрыть модальное окно.</li>
                </ul>
                <button class="md-close">Закрыть!</button>
            </div>
        </div>
    </div>
    <div class="md-overlay"></div><!-- the overlay element -->

    <link rel="stylesheet" href="./assets/css/animate.css" type="text/css" />

    <!-- FOR MODAL -->
    <script src="./assets/js/classie.js"></script>
    <script src="./assets/js/modalEffects.js"></script>
    <script>
        var polyfilter_scriptpath = './assets/js/';
    </script>
    <script src="./assets/js/cssParser.js"></script>
    <script src="./assets/js/css-filters-polyfill.js"></script>
    <!-- FOR MODAL -->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/jquery.maskedinput.js"></script>
    <script src="./assets/js/wow.min.js"></script>

    <!-- https://github.com/verlok/vanilla-lazyload#-getting-started---html -->
    <script src="./assets/js/lazyload.js"></script>

    <!-- Counter -->
    <script src="./assets/js/counter/jquery.cookie.js"></script>
    <script src="./assets/js/counter/jquery.plugin.js"></script>
    <script src="./assets/js/counter/jquery.countdown.js"></script>
    <script src="./assets/js/counter/jquery.countdown-ru.js"></script>
    <script>
        var endDateTime = new Date();
        var nowDateTime = new Date(3600 * 24 * 1000);
    </script>
    <!-- End Counter -->
    <script src="https://www.youtube.com/iframe_api"></script>
    <script src="./assets/js/script.js"></script>

    <link rel="stylesheet" href="./assets/css/swiper/swiper-bundle.min.css">
    <script src="./assets/js/swiper/swiper-bundle.min.js"></script>

    <script>
        var lazyLoadInstance = new LazyLoad({});
        /*
        var swiper = new Swiper('.slider', {
            observer: true,
            observeParents: true,
            navigation: {
                nextEl: '.btn-next',
                prevEl: '.btn-prev',
            },
        });
        
        */
    </script>
</body>

</html>