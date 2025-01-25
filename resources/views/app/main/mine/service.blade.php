<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Balance-Recharge</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
</head>
<body>
<style>
    input[type="text"] {
        width: 92%;
        margin: auto;
        margin-left: 1px;
        font-size: 10px;
        padding: 12px 10px;
        border: 1px solid #00000038;
        border-radius: 5px;
    }
    button {
        background: #db1e09;
        padding: 10px 60px;
        border-radius: 50px;
        color: #fff;
        border: none;
    }
    .page_title{
        background: #db1e09;
        padding: 12px 0;
        text-align: center;
        color: #fff;
    }
    .method_bosx {
        width: 85px;
        height: 85px;
        background: #0000000a;
        border-radius: 11px;
        float: left;
        margin: 0 7px;
    }
    body {
        background: #0000000d;
    }
    .method_bosx img {
        width: 80px !important;
        height: 80px !important;
        border-radius: 10px;
    }
    select {
        width: 98%;
        padding: 12px 0;
        margin-left: 1px;
        margin-top: 20px;
        border: none;
        border-bottom: 1px solid #0000003b;
    }
    .cur {
        background: #fff;
        padding: 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: #000;
        margin: 12px 0;
        border-radius: 5px;
    }
</style>
<div class="page_title" style="background: #db1e09;display: flex;justify-content: space-between;padding: 12px 12px;">
    <div onclick="window.location.href='{{route('mine')}}'"><i class="fa fa-chevron-left"></i></div>
    <div>Our Customer Service</div>
    <div></div>
</div>


<div class="cur" onclick="window.location.href='{{setting('customer_service_one')}}'">
    <div><img src="{{asset('icons8-telegram.gif')}}" alt=""></div>
    <div>Customer service one</div>
    <div><i class="fa fa-chevron-right"></i></div>
</div>

<div class="cur" onclick="window.location.href='{{setting('customer_service_two')}}'">
    <div><img src="{{asset('icons8-telegram.gif')}}" alt=""></div>
    <div>Customer service Two</div>
    <div><i class="fa fa-chevron-right"></i></div>
</div>

@include('alert-message')

</body>
</html>
