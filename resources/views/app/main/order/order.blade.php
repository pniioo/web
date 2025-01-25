<html lang="en">
 <head> 
  <meta charset="UTF-8"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1, maximum-scale=1, user-scalable=no"> 
  <link rel="stylesheet" type="text/css" href="{{asset('public/tra/css/common.css')}}"> 
  <link rel="stylesheet" type="text/css" href="{{asset('public/tra/css/main.css')}}"> 
  <link rel="stylesheet" type="text/css" href="{{asset('public/tra/css/order.css')}}"> 
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
    It shows "0/X days" when you've just purchased and activated the product as its first day of operating hasn't ended yet. It will turns to 1/X at the time of 0 PM, which is the time every product returns the daily income to the client's balance. 
  </div> 
  <div class="incomeBox"> 
   <div class="incomeItem"> 
    <span>My device</span> 
    <p>{{\App\Models\Purchase::where('user_id', auth()->id())->where('status', 'active')->count()}}</p> 
   </div> 
   <div class="incomeItem"> 
    <span>Daily Income</span> 
    <p>{{price(\App\Models\Purchase::where('user_id', auth()->user()->id)->where('status', 'active')->sum('daily_income'))}}
                            </p> 
   </div> 
  </div> 
  <div class="chooseBox"> 
   <img src="{{asset('public/tra/img/coins2.png')}}" alt=""> 
   <p>Order Detail</p> 
  </div> 
  <?php
                use App\Models\Package;
                use App\Models\Purchase;
                //$packages = Package::whereIn('id', my_vips())->orderByDesc('id')->get();
                $packages = Purchase::where('user_id', \auth()->id())->where('status', 'active')->orderByDesc('id')->get();
                ?>
                @foreach($packages as $plan)

                    @php

                        $element = $plan->package;
                        $purchase_running = Purchase::where('user_id', auth()->id())->where('package_id', $element->id)->where('status', 'active')->first();
                        $nextTime = \Carbon\Carbon::parse($plan->next_return_date);
                        $formattedDateTime = \Carbon\Carbon::parse($plan->created_at)->format('d.m.y H:i A');
                        $formattedNextDateTime = \Carbon\Carbon::parse($plan->next_return_date)->format('d M H:i A');
                        $dailyEarn = $element->commission_with_avg_amount / $element->validity;
                    @endphp
  <div class="orderBoxAll"> 
   <div class="orderBox"> 
    <div class="orderTime"> 
     <p>{{$element->status}}</p> 
     <span>{{$element->package_id}}</span> 
    </div> 
    <div class="orderInfoBox"> 
     <div class="orderInfo"> 
      <div class="infoColor"> 
       <p>Product:</p> 
       <p class="color1">{{$element->name}}</p> 
      </div> 
      <div class="infoColor2"> 
       <p>Price:</p> 
       <span class="color1">{{price($element->price)}}</span> 
      </div> 
     </div> 
     <div class="orderInfo"> 
      <div class="infoColor"> 
       <p>Daily Return:</p> 
       <span class="color1">{{price($dailyEarn)}}</span> 
      </div> 
      <div class="infoColor2"> 
       <p>Total Return:</p> 
       <span class="color1">{{price($element->commission_with_avg_amount)}}</span> 
      </div> 
     </div> 
     <div class="orderInfo"> 
      <div class="infoColor"> 
       <p>Already Return:</p> 
       <span class="color1">{{ price($dailyEarn * $plan->count_return) }}</b></span> 
      </div> 
      <div class="infoColor2"> 
       <p>Duration:</p> 
       <span  class="color1">{{$element->validity}}days</span> 
      </div> 
     </div> 
    </div> 
   </div> 
  </div> 
 @endforeach