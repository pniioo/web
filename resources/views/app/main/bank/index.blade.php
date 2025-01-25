<html lang="en">
 <head> 
  <meta charset="UTF-8"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1, maximum-scale=1, user-scalable=no"> 
  <link rel="stylesheet" type="text/css" href="{{asset('public/tra/css/common.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('public/tra/css/main.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('public/tra/css/card.css')}}"> 
  <!--<link rel="stylesheet" href="{{asset('public/tra/css/loading.css')}}">-->
  <title>Document</title> 
 </head> 
 <body> 
  <!-- 头部 --> 
  <div class="head"> 
   <div class="backBox"> 
    <img class="back" src="{{asset('public/tra/img/back.png')}}" alt="" onclick="window.history.go(-1)"> 
   </div> 
   @php
    $user = auth()->user();
@endphp
   <p>Bind Bank Card</p> 
   <div class="arrows"></div> 
  </div> 
  <form action="{{route('user.bank_setup_confirm')}}" method="post">@csrf
  <img class="cardimage" src="{{asset('public/tra/img/cardimage.png')}}" alt=""> 
  <div class="cardBox"> 
   <p>Please check your bank card information carefully</p> 
   <div class="form_box"> 
    <div class="form"> 
     <div class="formNameBox"> 
      <p>Account Holder’s Name</p> 
     </div> 
     <div class="ipt_box"> 
      <input type="text" placeholder="Account Number" value="{{ $user->gateway_address }}" name="gateway_address">
    </div>
    </div> 
    <div class="form"> 
     <div class="formNameBox"> 
      <p>Bank Name</p> 
     </div> 
     <div class="ipt_box ipt_box2"> 
      <select name="gateway_method" id="">
          @foreach(\App\Models\BankList::where('status', '1')->get() as $elemenet)
                <option value="{{$elemenet->bank_code}}" @if($user->gateway_method == $elemenet->bank_code) selected @endif>{{$elemenet->name}}</option>
                @endforeach
                </select> 
     </div> 
    </div> 
    <div class="form"> 
     <div class="formNameBox"> 
      <p>Account Number</p> 
     </div> 
     <div class="ipt_box"> 
      <input type="text" placeholder="Account Name" value="{{ $user->realname }}" name="realname">
     </div> 
    </div> 
    <button class="cardSubmit" onclick="card_submit()">Submit</button> 
   </div> 
  
</div> 
 



@include('alert-message')

</body>
</html>