<html lang="en">
 <head> 
  <meta charset="UTF-8"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1, maximum-scale=1, user-scalable=no"> 
  <link rel="stylesheet" type="text/css" href="{{asset('public/tra/css/common.css')}}"> 
  <link rel="stylesheet" type="text/css" href="{{asset('public/tra/css/main.css')}}"> 
  <link rel="stylesheet" type="text/css" href="{{asset('public/tra/css/profile.css')}}"> 
  <link rel="stylesheet" href="{{asset('public/tra/css/home.css')}}">
  <title>Document</title> 
 </head> 
 <body> 
 
 
 
 <div class="base_nav"> 
   <a href="{{route('dashboard')}}">
    <div class="nav"> 
     <img class="nav_img" src="{{asset('public/tra/img\76879399687bd35680464ebc02e88e50.png')}}" alt=""> 
     <span>Home</span> 
    </div> </a> 
   <a href="{{route('user.withdraw')}}">
    <div class="nav"> 
     <img class="nav_img" src="{{asset('public/tra/img\c59d53eb5bf9516417ff452ef7c1f855.png')}}" alt=""> 
     <span>Withdraw</span> 
    </div> </a> 
   <a href="{{route('user.team')}}">
    <div class="nav"> 
     <img class="nav_img" src="{{asset('public/tra/img\5b88bce55df9d41836a84efe712da6c4.png')}}" alt=""> 
     <span>team</span> 
    </div> </a> 
   <a href="about-us"> 
    <div class="nav"> 
     <img class="nav_img" src="{{asset('public/tra/img\92ced97b4494c5517b22f73cc7252613.png')}}" alt=""> 
     <span>About us</span> 
    </div> </a> 
   <a href="{{url('mine')}}">
    <div class="nav"> 
     <img class="nav_img" src="{{asset('public/tra/img/1aa42fc8a4af9992b0f764590412c2e2.png')}}" alt=""> 
     <span>Profile</span> 
    </div> </a> 
  </div> 