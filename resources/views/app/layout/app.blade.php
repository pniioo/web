<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>{{env('APP_NAME')}}</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('app')}}/css/animate.css">
    <link rel="stylesheet" type="text/css" href="{{asset('app')}}/css/cryptocoins.css">
    <link rel="stylesheet" type="text/css" href="{{asset('app')}}/css/global.style.css">
    <link rel="stylesheet" href="{{asset('app')}}/css/swiper.min.css">
    <link rel="stylesheet" href="{{asset('app')}}/css/jqcandlestick.css">
    <link rel="stylesheet" type="text/css" href="{{asset('app')}}/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('app')}}/plugins/turbo-slider/turbo.css">
    <link rel="stylesheet" href="{{asset('app')}}/css/slick-theme.css">
    <link rel="stylesheet" href="{{asset('app')}}/css/slick.css">
    <link rel="stylesheet" href="{{asset('app/developer/withdraw.css')}}">
    <link rel="stylesheet" href="{{asset('app')}}/css/style.css">
    <link rel="stylesheet" href="{{asset('app/developer/developer.css')}}">
    <link rel="icon" href="{{asset('footbal')}}/assets/image/favicon.jpeg">
    <style>
        img.rng_logo {
            width: 90px;
        }
        h4.to_time {
            margin-top: 11px;
            font-size: 18px;
            text-align: right;
            margin-right: 8px;
            color: #38a61c;
        }
        ul.bottom-menu.list-unstyled.list-inline li img {
            width: 20px;
            margin: auto;
        }
        footer {
             margin-bottom: 0px;
        }
        .btn-primary:not(:disabled):not(.disabled).active:focus, .btn-primary:not(:disabled):not(.disabled):active:focus, .show>.btn-primary.dropdown-toggle:focus {
            box-shadow: 0 0 0 0.2rem transparent;
        }
        .btn-primary.focus, .btn-primary:focus {
            box-shadow: 0 0 0 3px transparent;
            outline: none;
            border: none;
        }
        footer{
            background: #614D7C;
        }

        ::-webkit-scrollbar {
            width: 5px !important;
        }
    </style>
</head>
<body>
<div class="loader">
    <img src="{{asset('app/img/loading.gif')}}" alt="Loading">
</div>
{{--Loading--}}
<script src="{{asset('assets')}}/toast.js"></script>
<link rel="stylesheet" href="{{asset('app/css/loading.css')}}">
<div class="loader_boss" style="display: none">
    <svg class="spinner">
        <circle>
            <animateTransform attributeName="transform" type="rotate" values="-90;810" keyTimes="0;1" dur="2s" repeatCount="indefinite"></animateTransform>
            <animate attributeName="stroke-dashoffset" values="0%;0%;-157.080%" calcMode="spline" keySplines="0.61, 1, 0.88, 1; 0.12, 0, 0.39, 0" keyTimes="0;0.5;1" dur="2s" repeatCount="indefinite"></animate>
            <animate attributeName="stroke-dasharray" values="0% 314.159%;157.080% 157.080%;0% 314.159%" calcMode="spline" keySplines="0.61, 1, 0.88, 1; 0.12, 0, 0.39, 0" keyTimes="0;0.5;1" dur="2s" repeatCount="indefinite"></animate>
        </circle>
    </svg>
    <div>
        <span>Loading...</span>
    </div>
</div>
{{--End loading--}}
@include('alert-message')
<div class="wrapper ">
    <div class="wrapper-inline">
{{--    <div class="">--}}
        @yield('header_content')
        <div class="bottom-menu-section">
            <ul class="bottom-menu list-unstyled list-inline">
                <li>
                    <a href="{{route('dashboard')}}">
                        <img src="{{asset('app/nav/hhhhh.png')}}" alt="">
                        <p>Home</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('vip')}}">
                        <img src="{{asset('app/nav/vvvvvv.png')}}" alt="">
                        <p>Machine</p>
                    </a>
                </li>
                <li>

                    <a href="{{route('user.mining')}}">
                        <img src="{{asset('app/nav/ttttt.png')}}" alt="">
                        <p>Mining</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('user.team')}}">
                        <img src="{{asset('app/nav/tmtmtmt.png')}}" alt="">
                        <p>My Team</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('my.profile')}}" style="color: #000">
                        <img src="{{asset('app/nav/m.png')}}" alt="">
                        <p>Account</p>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Page content start -->
        @yield('app_content')
        <!-- Page content end -->
    </div>
</div>

<div class="sweet-loader">
    <div class="box">
        <div class="circle1"></div>
        <div class="circle2"></div>
        <div class="circle3"></div>
    </div>
</div>
<script src="{{asset('app')}}/js/jquery-3.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
<script src="{{asset('app')}}/js/swiper.min.js"></script>
<script src="{{asset('app')}}/js/jquery.jqcandlestick.min.js"></script>
<script src="{{asset('common')}}/sweetalert2.js"></script>
<script src="{{asset('app')}}/js/global.script.js"></script>
<script src="{{asset('app')}}/js/slick.min.js"></script>
<style>
    ::-webkit-scrollbar {
        width: 5px !important;
    }
</style>
@stack('scripts')
<script type="text/javascript">
    $("#accordion").on("hide.bs.collapse show.bs.collapse", e => {
        $(e.target)
            .prev()
            .find("i:last-child")
            .toggleClass("fa-minus fa-plus");
    });


    var url = "{{ route('changeLang') }}";

    function changeLanguage(lang) {
        window.location.href = url + "?lang=" + lang ;
    }
    document.querySelector('.loader_boss').style.display = 'block';
    window.onload = function() {
        setTimeout(function (){
            document.querySelector('.loader_boss').style.display = 'none';
        }, 1000)
    }

</script>
</body>
</html>
