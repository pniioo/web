<html lang="en">
 <head> 
  <meta charset="UTF-8"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1, maximum-scale=1, user-scalable=no"> 
  <link rel="stylesheet" type="text/css" href="{{asset('public/tra/css/common.css')}}"> 
  <link rel="stylesheet" type="text/css" href="{{asset('public/tra/css/main.css')}}"> 
  <link rel="stylesheet" type="text/css" href="{{asset('public/tra/css/profile.css')}}"> 
  <link rel="stylesheet" href="{{asset('public/tra/css/loading.css')}}">
  <title>Document</title> 
 </head> 
 <body> 
  <!-- 头部 --> 
  <div class="head"> 
   <p></p> 
   <img class="logo" src="{{asset('public/tra/img/logo.png')}}" alt=""> 
   <p></p> 
  </div> 
  <div class="balanceAll"> 
   <div class="balanceBox"> 
    <img src="{{asset('public/tra/img/ibma.png')}}" alt=""> 
    <div class="balanceItem"> 
     <span>ID {{auth()->user()->username}}</span> 
     <p>{{price(auth()->user()->income)}}</p> 
     <span>withdraw Balance</span> 
    </div> 
   </div> 
  </div>
  <a href='{{route('user.deposit')}}'>
  <div class="chooseBox"> 
   <img src="{{asset('public/tra/img/BackgroundEraser_20241116_100204334.png')}}" alt=""> 
   <p>recharge</p>
  </div> </a>
  <div class="menuBox"> 
   <a href='{{route('user.bank')}}'> 
    <div class="menuItemBox"> 
     <div class="itemBox"> 
      <img src="{{asset('public/tra/img/a638c12d02c52c58b4d66e432131abbe.png')}}" alt=""> 
      <p>Bind Bank Card</p> 
     </div> 
     <img src="{{asset('public/tra/img/menur.png')}}" alt=""> 
    </div> </a> 
   <a href='{{route('user.withdraw')}}'> 
    <div class="menuItemBox"> 
     <div class="itemBox"> 
      <img src="{{asset('public/tra/img/b0e6c62ea0482d0c997d84c89196ed22.png')}}" alt=""> 
      <p>Withdraw</p> 
     </div> 
     <img src="{{asset('public/tra/img/menur.png')}}" alt=""> 
    </div> </a> 
   <a href='{{route('record')}}'> 
    <div class="menuItemBox"> 
     <div class="itemBox"> 
      <img src="{{asset('public/tra/img/6b6e0b532c83f9ac178b7dc5ac11440f.png')}}" alt=""> 
      <p>Payment Record</p> 
     </div> 
     <img src="{{asset('public/tra/img/menur.png')}}" alt=""> 
    </div> </a> 
   <a href="{{route('pgroup')}}"> 
    <div class="menuItemBox"> 
     <div class="itemBox"> 
      <img src="{{asset('public/tra/img/197944c7040ed0fea305af946ed10777.png')}}" alt=""> 
      <p>Order</p> 
     </div> 
     <img src="{{asset('public/tra/img/menur.png')}}" alt=""> 
    </div> </a> 
   <a href="{{route('user.invite')}}"> 
    <div class="menuItemBox"> 
     <div class="itemBox"> 
      <img src="{{asset('public/tra/img/4f88458d3e43024ada9395e4e87d4a94.png')}}" alt=""> 
      <p>Referral Program</p> 
     </div> 
     <img src="{{asset('public/tra/img/menur.png')}}" alt=""> 
    </div> </a> 
   <a href="my-team"> 
    <div class="menuItemBox"> 
     <div class="itemBox"> 
      <img src="{{asset('public/tra/img/b58c420b9c5d2033d1ad112ba0a8fb7a.png')}}" alt=""> 
      <p>My Team</p> 
     </div> 
     <img src="{{asset('public/tra/img/menur.png')}}" alt=""> 
    </div> </a> 
   <a href="/about-us"> 
    <div class="menuItemBox"> 
     <div class="itemBox"> 
      <img src="{{asset('public/tra/img/d89243220c160fc08946b2f02b65da0b.png')}}" alt=""> 
      <p>About Us</p> 
     </div> 
     <img src="{{asset('public/tra/img/menur.png')}}" alt=""> 
    </div> </a> 
   <!--<a href="/index/faq"> 
    <div class="menuItemBox"> 
     <div class="itemBox"> 
      <img src="{{asset('public/tra/img/d7a975fc62dbf6bb374b00fe4ff03295.png')}}" alt=""> 
      <p>FAQ</p> 
     </div> 
     <img src="{{asset('public/tra/img/menur.png')}}" alt=""> 
    </div> </a> -->
   <a href="{{setting('customer_service_one')}}"> 
    <div class="menuItemBox"> 
     <div class="itemBox"> 
      <img src="{{asset('public/tra/img/5dfb191ab74e0e29143efb6e394e6a32.png')}}" alt=""> 
      <p>Subscribe To Our Channel</p> 
     </div> 
     <img src="{{asset('public/tra/img/menur.png')}}" alt=""> 
    </div> </a> 
   <a href="{{setting('customer_service_two')}}"> 
    <div class="menuItemBox"> 
     <div class="itemBox"> 
      <img src="{{asset('public/tra/img/29fd6fd94209de052780511a2164d40b.png')}}" alt=""> 
      <p>Customer Service</p> 
     </div> 
     <img src="{{asset('public/tra/img/menur.png')}}" alt=""> 
    </div> </a> 
   <a href='{{route('logout')}}'> 
    <div class="menuItemBox"> 
     <div class="itemBox"> 
      <img src="{{asset('public/tra/img/6b7c5c567450153a9d10e3e4cc281ef4.png')}}" alt=""> 
      <p>LOG OUT</p> 
     </div> 
     <img src="{{asset('public/tra/img/menur.png')}}" alt=""> 
    </div> </a> 
  </div> 
 

<!-- menu area -->
    @include('app.layout.manu')


</div>



<!-- === Script Area === -->
@include('app.layout.js')
</body>
</html>
   