<!DOCTYPE html>
<html lang="en">
<head>
    @include('app.layout.css')
    <style>
        .service-page .service-banner-section .banner-area::before{
            background:unset;
        }
        .service-page .service-info-area {
            gap: 8px;
        }
    </style>
</head>

<body>
<div class="service-page">
    <!-- header area -->
    <header class="header-section">
        <div class="container">
            <div class="header-area">
                <div class="back-icon-area" onclick="window.location.href = '{{route('mine')}}'">
                    <img src="{{asset('footbal')}}/assets/image/back-w.png" alt="">
                </div>
                <div class="title-area">
                    <h2>Total Balance History</h2>
                </div>
            </div>
        </div>
    </header>
    <!-- Service-Banner -->
    <section class="service-banner-section">
        <div class="container">
            <div class="banner-area">
            </div>
        </div>
    </section>
    <!-- service info -->
    <section class="service-info-section">
        <div class="container">
            <div class="service-info-area">
                <div class="single-service-info">
                    <div class="service-name">
                        <img src="{{asset('public')}}/icons8-taka-60.png">
                        <p>
                            <span>Investment amount</span>
                            <span></span>
                        </p>
                    </div>
                    <div class="connect-btn"><a href="javascript:void(0)" class="serve-btn">{{price(auth()->user()->invest_balance)}}</a></div>
                </div>

                <div class="single-service-info">
                    <div class="service-name">
                        <img src="{{asset('public')}}/icons8-taka-60.png">
                        <p>
                            <span>Invest Commission</span>
                            <span></span>
                        </p>
                    </div>
                    <div class="connect-btn"><a href="javascript:void(0)" class="serve-btn">{{price($invest_commission)}}</a></div>
                </div>

                <div class="single-service-info">
                    <div class="service-name">
                        <img src="{{asset('public')}}/icons8-taka-60.png">
                        <p>
                            <span>Spin Commission</span>
                            <span></span>
                        </p>
                    </div>
                    <div class="connect-btn"><a href="javascript:void(0)" class="serve-btn">{{price($spin_commission)}}</a></div>
                </div>

                <div class="single-service-info">
                    <div class="service-name">
                        <img src="{{asset('public')}}/icons8-taka-60.png">
                        <p>
                            <span>Checkin Commission</span>
                            <span></span>
                        </p>
                    </div>
                    <div class="connect-btn"><a href="javascript:void(0)" class="serve-btn">{{price($checkin_commission)}}</a></div>
                </div>

                <div class="single-service-info">
                    <div class="service-name">
                        <img src="{{asset('public')}}/icons8-taka-60.png">
                        <p>
                            <span>Recharge Commission</span>
                            <span></span>
                        </p>
                    </div>
                    <div class="connect-btn"><a href="javascript:void(0)" class="serve-btn">{{price($rechargeCommission)}}</a></div>
                </div>

                <div class="single-service-info">
                    <div class="service-name">
                        <img src="{{asset('public')}}/icons8-taka-60.png">
                        <p>
                            <span>Refer Commission</span>
                            <span></span>
                        </p>
                    </div>
                    <div class="connect-btn"><a href="javascript:void(0)" class="serve-btn">{{price($refer_commission)}}</a></div>
                </div>
                <hr>
                <div class="single-service-info">
                    <div class="service-name">
                        <img src="{{asset('public')}}/icons8-taka-60.png">
                        <p>
                            <span style="font-size: 3.5vw;color: #000">Last Withdrawable Amount</span>
                            <span></span>
                        </p>
                    </div>
                    <div class="connect-btn"><a href="javascript:void(0)" class="serve-btn">{{price(auth()->user()->commission_balance)}}</a></div>
                </div>

            </div>
        </div>
    </section>
</div>


<!-- menu area -->
@include('app.layout.manu')

<!-- === Script Area === -->
@include('app.layout.js')

</body>
</html>
