<html lang="en">
 <head> 
  <meta charset="UTF-8"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1, maximum-scale=1, user-scalable=no"> 
  <link rel="stylesheet" type="text/css" href="{{asset('public/tra/css/common.css')}}"> 
  <link rel="stylesheet" type="text/css" href="{{asset('public/tra/css/main.css')}}"> 
  <link rel="stylesheet" type="text/css" href="{{asset('public/tra/css/record.css')}}"> 
  <link rel="stylesheet" href="{{asset('public/tra/css/loading.css')}}">
  <title>Document</title>
 </head> 
 <body>
<!-- 头部 -->
<div class="head">
    <div class="backBox">
        <img class="back" src="{{asset('public/tra/img/back.png')}}" alt="" onclick="window.history.go(-1)">
    </div>
    <p>Payment Record</p>
    <div class="arrows"></div>
</div>
<div class="excessiveBox">
    Due to the excessive number of orders, please upload your payment voucher after you pay for the order, so that
    our staff can match it more quickly and accurately.
</div>
@foreach(\App\Models\Deposit::where('user_id', user()->id)->orderByDesc('id')->get() as $element)

<!--<div class="recordBoxAll paymentrecord data-list"><div class="recordBox">-->
<div class="recordBoxAll paymentrecord data-list">
        <div class="timeBox">
            <p>{{$element->created_at}}</p>
            <span>{{$element->oid}}</span>
        </div>
        <div class="amountBox">
            <div class="amountItem">
                <span>Amount:</span>
                <p>{{price($element->final_amount)}}</p>
            </div>
            <p class="confirmingColor">@if($element->status == 'approved')
                                Success
                            @elseif($element->status == 'rejected')
                                Cancel
                            @else
                                Processing
                            @endif</p>
            <a href="{{setting('customer_service_one')}}">
                <button class="uploadBtn">Upload</button>
            </a>        </div>
    @if($loop->last)
                @else
                @endif
            @endforeach
<div class="w empty" style="display: none;">
    <img src="/uploads/material/w.png" alt="">
    <p>No record</p>
</div>