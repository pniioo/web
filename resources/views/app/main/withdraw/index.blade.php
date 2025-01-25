<html lang="en">
 <head> 
  <meta charset="UTF-8"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1, maximum-scale=1, user-scalable=no"> 
  <link rel="stylesheet" type="text/css" href="{{asset('public/tra/css/common.css')}}"> 
  <link rel="stylesheet" type="text/css" href="{{asset('public/tra/css/main.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('public/tra/css/withdraw.css')}}"> 
  <link rel="stylesheet" href="{{asset('public/tra/css/loading.css')}}">
  <title>Document</title> 
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
 <body> 
  <!-- 头部 --> 
  <form action="{{route('user.withdraw.request')}}" method="post">@csrf
  <div class="head"> 
   <p></p> 
   <img class="logo" src="{{asset('public/tra/img/logo.png')}}" alt=""> 
   <p></p> 
  </div> 
  <div class="balanceAll"> 
   <div class="balanceBox"> 
    <div class="balanceItem"> 
     <span>Withdraw Balance</span> 
     <p>{{price(\auth()->user()->income)}}</p> 
    </div> 
   </div> 
  </div> 
  <div class="amountBox"> 
   <span>Amount</span> 
   <input type="text" class="myInput" name="amount" placeholder="Please enter the withdrawal" amount class="amount_input"
   required>
                        <input type="hidden" name="gateway_method" value="{{auth()->user()->gateway_method}}">
                        <input type="hidden" name="gateway_number" value="{{auth()->user()->gateway_address}}">
                    
                
   <p>Process Time: 7x 24h</p> 
   <p>Min Withdrawal: {{price(setting('minimum_withdraw'))}}</p> 
   <p>Fees: {{setting('withdraw_charge')}}%</p> 
   <button class="withdrawBtn" onclick="withdraw()">Withdraw</button> 
  </div> 
  <div class="chooseBox"> 
   <img src="{{asset('public/tra/img/coins2.png')}}" alt=""> 
   <p>Withdraw Record</p> 
  </div>
  </div>
  @foreach(\App\Models\Withdrawal::where('user_id', user()->id)->orderByDesc('id')->get() as $element)
  <div class="today2 withdrawrecord"> 
   <div class="today_title2">
    <div class="">
     {{$element->created_at}}
    </div> 
    <div class="">
     {{price($element->final_amount)}}
    </div> 
    <div class="">
        @if($element->status == 'approved')
                            Success
                        @elseif($element->status == 'rejected')
                            Cancel
                        @else
                            Proccessing
                        @endif
    </div> 
   </div> 
   <div class="data-list"></div> 
  </div> 
  @if($loop->last)
            @else
            @endif
        @endforeach
  <!-- 无数据 --> 
  <div class="w empty" style="display: none;"> 
   <img src="/uploads/material/w.png" alt=""> 
   <p>No record</p> 
  </div> 
 


</div>
</div>
</div>

</form>

@include('app.layout.manu')

<!-- === Script Area === -->
<meta name="csrf-token" content="{{csrf_token()}}">
<script src="{{asset('assets/toast.js')}}"></script>
@include('alert-message')
<!-- menu area -->
@include('app.layout.js')
</body>
</html>