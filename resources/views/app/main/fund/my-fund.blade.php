<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{env('APP_NAME')}}</title>
    <!-- favicon icon -->
    <link rel="icon" href="{{asset('footbal')}}/assets/image/favicon.ico">
    <!-- === Font awesome === -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- === Css Area Start === -->
    <link rel="stylesheet" href="{{asset('footbal')}}/assets/css/global.css">
    <link rel="stylesheet" href="{{asset('footbal')}}/assets/css/animate.css">
    <link rel="stylesheet" href="{{asset('footbal')}}/assets/css/style.css">
    <script src="{{asset('assets/toast.js')}}"></script>
</head>
<body>
<div class="loader">
    <img class="loading_img" src="{{asset('footbal')}}/assets/image/loding.jpg" style="position: fixed;z-index: 999;width: 100px;top: 50%;left: 50%;transform: translate(-50%, -50%);">
</div>
@include('alert-message')
<div class="wrapper fund-page">
    <div class="container">
        <div class="fund-header">
            <div class="page-title">
                <h2>My fund List</h2>
            </div>
            <div class="fund-bill">
                <a href="{{route('me.fund')}}">
                    <img src="{{asset('footbal')}}/assets/image/content/bill.png" alt="">
                    <span>Bills</span>
                </a>
            </div>
        </div>
        <!-- fund list -->
        <div class="fund-list">
            @foreach($fundInvests as $fund)
                @if($fund->status == 'active')
                    <div class="single-list">
                        <div class="fund-title">
                            <img src="{{asset('footbal')}}/assets/image/content/fund-growth.png" alt="">
                            <h3>{{$fund->fund->name}}</h3>
                            <p style="color: #12773d">Invest {{price($fund->price)}}</p>
                        </div>
                        <div class="fund-details">
                            <div class="single-details">
                                <h4>{{$fund->fund->validity}}days</h4>
                                <p>Project cycle</p>
                            </div>
                            <div class="single-details">
                                <h4>{{$fund->fund->commission}}%</h4>
                                <p>Rate of return</p>
                            </div>
                            <div class="single-details">
                                <a href="javascript:void(0)" class="btn">Invested</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
<!-- menu area -->
<div class="menu-area">
    <ul class="menu">
        <li class="menu-item">
            <a href="{{route('dashboard')}}">
                <span class="menu-content">
                    <span class="menu-icon">
                        <img src="{{asset('footbal')}}/assets/image/menu/home.png" alt="">
                        <img src="{{asset('footbal')}}/assets/image/menu/active-home.png" alt="" class="image-active">
                    </span>
                    <span class="menu-name">home</span>
                </span>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('order')}}">
                        <span class="menu-content">
                            <span class="menu-icon">
                                <img src="{{asset('footbal')}}/assets/image/menu/notice.png" alt="">
                                <img src="{{asset('footbal')}}/assets/image/menu/motic-active.png" alt="" class="image-active">
                            </span>
                            <span class="menu-name">order</span>
                        </span>
            </a>
        </li>
        <li class="menu-item active">
            <a href="{{route('fund')}}">
                        <span class="menu-content">
                            <span class="menu-icon">
                                <img src="{{asset('footbal')}}/assets/image/menu/stock.png" alt="">
                                <img src="{{asset('footbal')}}/assets/image/menu/stock-active.png" alt="" class="image-active">
                            </span>
                            <span class="menu-name">fund</span>
                        </span>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('team')}}">
                        <span class="menu-content">
                            <span class="menu-icon">
                                <img src="{{asset('footbal')}}/assets/image/menu/apps.png" alt="">
                                <img src="{{asset('footbal')}}/assets/image/menu/apps-active.png" alt="" class="image-active">
                            </span>
                            <span class="menu-name">team</span>
                        </span>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('mine')}}">
                        <span class="menu-content">
                            <span class="menu-icon">
                                <img src="{{asset('footbal')}}/assets/image/menu/profile.png" alt="">
                                <img src="{{asset('footbal')}}/assets/image/menu/profile-active.png" alt="" class="image-active">
                            </span>
                            <span class="menu-name">mine</span>
                        </span>
            </a>
        </li>
    </ul>
</div>

<script src="{{asset('footbal')}}/assets/js/jquery-3.7.0.min.js"></script>
<script src="{{asset('footbal')}}/assets/js/script.js"></script>
</body>
</html>
