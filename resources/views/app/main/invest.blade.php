<!DOCTYPE html>
<html lang="en">
<head>
    @include('app.layout.css')
</head>
<body>
@include('app.layout.loading')
<link rel="stylesheet" href="{{asset('footbal/assets/css/invest.css')}}">
<div class="invest_header">
    <div onclick="window.location.href='{{route('dashboard')}}'"><i class="fa fa-chevron-left"></i></div>
    <div>Smart Investment</div>
    <div></div>
</div>


<div class="invest_box">

    <div class="box" style="margin-bottom: 30px">
        <div>
            <img src="{{asset('footbal/v_badeg.png')}}"> <span style="font-weight: 600;
    color: #00ffbd;
    font-size: 25px;">
                {{$level ? $level->level : 'VIP 0'}}
            </span>
            <div style="font-weight: 600;color: #063ffc;">Deposit - {{price(user()->invest_balance)}}</div>
        </div>
    </div>


    @foreach($improvements as $improvement)
    <div class="box">
        <div style="text-align: center">
            <img src="{{asset('footbal/re.PNG')}}">
            <div class="vip_badge">{{$improvement->level}}</div>
        </div>
        <div>
            <h3 class="deposit_text">Deposit Quantity</h3>
            <p class="amount_around">{{$improvement->amount_limit}}-{{$improvement->between_amount}}</p>
        </div>
        <div>
            <h3 class="daily_income">Daily income</h3>
            <p class="daily_commission">{{number_format($improvement->commission, 2)}}%</p>
        </div>
    </div>
    @endforeach
</div>


<!-- menu area -->
@include('app.layout.manu')
<!-- === Script Area === -->
@include('app.layout.js')
</body>
</html>
