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

<style>
    .congratulation{
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1000;
    }
    .congratulation .congratulation_box {
        width: 70%;
        height: 165px;
        border-radius: 10px;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }
    .congratulation_box img {
        width: 100%;
        height: 100%;
        border-radius: 7px;
    }
    .congratulation_close {
        position: absolute;
        top: 10px;
        right: 10px;
        color: #000;
        font-size: 20px;
        background: #ffffff85;
        width: 25px;
        height: 25px;
        border-radius: 25px;
        line-height: 28px;
        text-align: center;
    }
</style>

<style>
    .fund_modal {
        width: 100%;
        height: 100%;
        background: #00000069;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 999;
    }
    .fund_container {
        width: 85%;
        background: #fff;
        padding: 17px 15px;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        border-radius: 10px;
        position: absolute;
        text-align: center;
        padding-bottom: 0;
    }
    h3.fund_header {
        font-size: 18px;
        margin-bottom: 10px;
    }
    .fund_btn_group {
        margin-top: 26px;
    }
    input.fund_form {
        width: 90%;
        border: none;
        padding: 10px 6px;
        background: #0cff0517;
        border-radius: 3px;
    }
    button.fund_btn {
        display: block;
        margin: 5px 1px;
        width: 100%;
        padding: 10px 0;
        border-radius: 7px;
        border: none;
    }
    .confirm_btn {
        background: linear-gradient(180deg,#67d830,#12773d);
        color: #fff;
    }
</style>


<div class="congratulation" style="@if($congratulation == true) display: block; @else display: none; @endif">
    <div class="congratulation_box">
        <img src="{{asset('footbal/assets/image/congratulation.gif')}}">

        <div class="congratulation_close" onclick="congratulation()">
            <i class="fa fa-close"></i>
        </div>
    </div>
</div>

<div class="wrapper fund-page">
    <div class="container">
        <div class="fund-header">
            <div class="page-title">
                <h2>fund</h2>
            </div>
            <div class="fund-bill">
                <a href="{{route('me.fund')}}">
                    <img src="{{asset('footbal')}}/assets/image/content/bill.png" alt="">
                    <span>Bills</span>
                </a>
            </div>
        </div>
        <!-- fund banner -->
        <div class="fund-banner">
            <div class="banner-content">
                <p>Exclusive to users who have recharged and purchased product </p>
            </div>
            <div class="banner-img">
                <img src="{{asset('footbal')}}/assets/image/fund-banner.png" alt="">
            </div>
        </div>
        <!-- fund list -->
        <div class="fund-list">
            <div class="title">
                <img src="{{asset('footbal')}}/assets/image/content/fund-list.png" alt="">
            </div>
            @foreach($funds as $fund)
                @if($fund->status == 'active')
                    <?php
                    $activeFundsArray = \App\Models\FundInvest::where('user_id', auth()->user()->id)
                    ->where('status', 'active')
                    ->get()
                    ->pluck('fund_id')
                    ->toArray();
                    ?>
                    <div class="single-list">
                        <div class="fund-title">
                            <img src="{{asset('footbal')}}/assets/image/content/fund-growth.png" alt="">
                            <h3>{{$fund->name}}</h3>
                        </div>
                        <div class="fund-details">
                            <div class="single-details">
                                <h4>{{$fund->validity}}days</h4>
                                <p>Project cycle</p>
                            </div>
                            <div class="single-details">
                                <h4>{{$fund->commission}}%</h4>
                                <p>Rate of return</p>
                            </div>
                            <div class="single-details">
                                <a href="javascript:void(0)"
                                   @if(in_array($fund->id, $activeFundsArray))
                                        onclick="message('Already Invested')"
                                        class="btn"
                                   @else
                                        onclick="open_fund_modal('fund_modal{{$fund->id}}')"
                                        class="btn active"
                                   @endif
                                   >
                                    @if(in_array($fund->id, $activeFundsArray))
                                        Invested
                                    @else
                                        Buy
                                    @endif
                                </a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="single-list">
                        <div class="fund-title">
                            <img src="{{asset('footbal')}}/assets/image/content/fund-growth.png" alt="">
                            <h3>{{$fund->name}}</h3>
                            <div>Price: {{price($fund->price)}}</div>
                        </div>
                        <div class="fund-details">
                            <div class="single-details">
                                <h4>{{$fund->validity}}days</h4>
                                <p>Project cycle</p>
                            </div>
                            <div class="single-details">
                                <h4>{{$fund->commission}}%</h4>
                                <p>Rate of return</p>
                            </div>
                            <div class="single-details">
                                <a href="javascript:void(0)" onclick="message('Not yet open')" class="btn ">Not open</a>
                            </div>
                        </div>
                    </div>
                @endif
                    <div class="fund_modal" id="fund_modal{{$fund->id}}" style="display: none">
                        <div class="fund_container">
                            <h3 class="fund_header">{{$fund->commission}}% {{$fund->validity}}day contract cycle</h3>
                            <form action="{{route('fund.invest.confirm', $fund->id)}}" method="post">
                                @csrf
                                <div class="fund_form">
                                    <input type="text" class="fund_form" name="fund_amount" placeholder="Enter the purchase amount" required>
                                </div>
                                <div class="fund_form fund_btn_group">
                                    <button type="submit" class="fund_btn confirm_btn">Confirm</button>
                                    <button type="button" class="fund_btn cancle" onclick="fund_modal_close('fund_modal{{$fund->id}}')">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
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
<script>
    window.onload = function(){
        document.querySelector(".loading_img").style.display = "none";
    }

    function open_fund_modal(div) {
        document.getElementById(div).style.display = 'block';
    }

    function fund_modal_close(div)
    {
        document.getElementById(div).style.display = 'none';
    }

    function congratulation()
    {
        document.querySelector('.congratulation').style.display = 'none';
        message('Successful. fund commission added your balance.');
    }
</script>
</body>
</html>
