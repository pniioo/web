<html lang="en">
 <head> 
  <meta charset="UTF-8"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1, maximum-scale=1, user-scalable=no"> 
  <link rel="stylesheet" type="text/css" href="{{asset('public/tra/css/common.css')}}"> 
  <link rel="stylesheet" type="text/css" href="{{asset('public/tra/css/main.css')}}"> 
  <link rel="stylesheet" type="text/css" href="{{asset('public/tra/css/team.css')}}"> 
  <link rel="stylesheet" href="{{asset('public/tra/css/loading.css')}}">
  <title>Document</title>
 </head> 
 <body> 
  <!-- 头部 --> 
  <div class="head"> 
   <div class="backBox"> 
    <img class="back" src="{{asset('public/tra/img/back.png')}}" alt="" onclick="window.history.go(-1)"> 
   </div> 
   <p>My Team</p> 
   <div class="arrows"></div> 
  </div> 
  <div class="excessiveBox">
    You will be able to earn 30% of level 1 referral 's deposit amount as commission, 4% of level 2's and 1% of level 3's. 
  </div> 
  <div class="chooseBox"> 
   <img src="{{asset('public/tra/img/usersgroup.png')}}" alt=""> 
   <p>Referral: <span class="header_active_number_count"></span>/<i class="header_total_number_count"></i></p> 
  </div> 
  <div class="incomeBox"> 
   <div class="incomeItem"> 
    <span>Team Size</span> 
    <p class="header_total_money_number">{{$team_size}}</p> 
   </div> 
   <div class="incomeItem"> 
    <span>Total Withdraw</span> 
    <p class="header_today_money_number">{{price($lvTotalWithdraw)}}</p> 
   </div> 
  </div> 
  <div class="levelBoxAll"> 
   <div class="levelList level1"> 
    <div class="levelbar"> 
     <div class="levelName"> 
      <p>Level - 01 &nbsp;&nbsp;</p> 
      <span>30%</span> 
     </div> 
     <a href="#"> 
      <div class="flexre"> 
       <p>Check</p> 
       <img src="{{asset('public/tra/img/more.png')}}" alt=""> 
      </div> </a> 
    </div> 
    <div class="levelBox"> 
     <div class="boxAll"> 
      <div class="boxItem1"></div> 
      <div class="boxItem2">
       Referral
      </div> 
      <div class="boxItem3">
       Deposit
      </div> 
      <div class="boxItem4">
       Total Withdraw
      </div> 
     </div>
      <div class="boxAll">
      <div class="boxItem1">
       Total
      </div> 
      <div class="boxItem2"> 
       <p> <i>{{$first_level_users->count()}}<span class="level_day_active_number"></span></i>/{{$first_level_users->count()}}<span class="level_all_day_total_number"></span> </p> 
      </div> 
      <div class="boxItem3">
       <p> <i>{{price($lv1Recharge)}}<span class="level_active_number"></span></i>/{{price($lv1Recharge)}}<span class="level_total_number"></span> </p> 
      </div>
      <div class="boxItem4">
       <p> <i>{{price($lv1Withdraw)}}<span class="level_active_number"></span></i>/{{price($lv1Withdraw)}}<span class="level_total_number"></span> </p> 
      </div>
     </div> 
     <div class="boxAll"> 
      <div class="boxItem1">
       Total
      </div> 
      <div class="boxItem2"> 
       <p> <i>{{$first_level_users->count()}}<span class="level_active_number"></span></i>/{{$first_level_users->count()}}<span class="level_total_number"></span> </p> 
      </div> 
      <div class="boxItem3">
       <p> <i>{{price($lv1Recharge)}}<span class="level_active_number"></span></i>/{{price($lv1Recharge)}}<span class="level_total_number"></span> </p> 
      </div>
      <div class="boxItem4">
       <p> <i>{{price($lv1Withdraw)}}<span class="level_active_number"></span></i>/{{price($lv1Withdraw)}}<span class="level_total_number"></span> </p> 
      </div>
     </div>
    </div> 
   </div> 
   <div class="levelList level2"> 
    <div class="levelbar"> 
     <div class="levelName"> 
      <p>Level - 02 &nbsp;&nbsp;</p> 
      <span>4%</span> 
     </div> 
     <a href="#"> 
      <div class="flexre"> 
       <p>Check</p> 
       <img src="{{asset('public/tra/img/more.png')}}" alt=""> 
      </div> </a> 
    </div> 
    <div class="levelBox"> 
     <div class="boxAll"> 
      <div class="boxItem1"></div> 
      <div class="boxItem2">
       Referral
      </div> 
      <div class="boxItem3">
       Deposit
      </div> 
      <div class="boxItem4">
       Total Withdraw
      </div> 
     </div> 
     <div class="boxAll"> 
      <div class="boxItem1">
       Total
      </div> 
      <div class="boxItem2"> 
       <p> <i>{{$second_level_users->count()}}<span class="level_day_active_number"></span></i>/{{$second_level_users->count()}}<span class="level_all_day_total_number"></span> </p> 
      </div> 
      <div class="boxItem3">
       <p> <i>{{price($lv2Recharge)}}<span class="level_active_number"></span></i>/{{price($lv2Recharge)}}<span class="level_total_number"></span> </p> 
      </div>
      <div class="boxItem4">
       <p> <i>{{price($lv2Withdraw)}}<span class="level_active_number"></span></i>/{{price($lv2Withdraw)}}<span class="level_total_number"></span> </p> 
      </div>
     </div> 
     <div class="boxAll"> 
      <div class="boxItem1">
       Total
      </div> 
      <div class="boxItem2"> 
       <p> <i>{{$second_level_users->count()}}<span class="level_active_number"></span></i>/{{$second_level_users->count()}}<span class="level_total_number"></span> </p> 
      </div> 
      <div class="boxItem3">
       <p> <i>{{price($lv2Recharge)}}<span class="level_active_number"></span></i>/{{price($lv2Recharge)}}<span class="level_total_number"></span> </p> 
      </div> 
      <div class="boxItem4">
       <p> <i>{{price($lv2Withdraw)}}<span class="level_active_number"></span></i>/{{price($lv2Withdraw)}}<span class="level_total_number"></span> </p> 
      </div>
     </div> 
    </div> 
   </div> 
   <div class="levelList level3"> 
    <div class="levelbar"> 
     <div class="levelName"> 
      <p>Level - 03 &nbsp;&nbsp;</p> 
      <span>1%</span> 
     </div> 
     <a href="#"> 
      <div class="flexre"> 
       <p>Check</p> 
       <img src="{{asset('public/tra/img/more.png')}}" alt=""> 
      </div> </a> 
    </div> 
    <div class="levelBox"> 
     <div class="boxAll"> 
      <div class="boxItem1"></div> 
      <div class="boxItem2">
       Referral
      </div> 
      <div class="boxItem3">
       Deposit
      </div> 
      <div class="boxItem4">
       Total Withdraw
      </div> 
     </div> 
     <div class="boxAll"> 
      <div class="boxItem1">
       Total
      </div> 
      <div class="boxItem2"> 
       <p> <i>{{$third_level_users->count()}}<span class="level_day_active_number"></span></i>/{{$third_level_users->count()}}<span class="level_all_day_total_number"></span> </p> 
      </div> 
      <div class="boxItem3">
       <p> <i>{{price($lv3Recharge)}}<span class="level_active_number"></span></i>/{{price($lv3Recharge)}}<span class="level_total_number"></span> </p> 
      </div>
      <div class="boxItem4">
       <p> <i>{{price($lv3Withdraw)}}<span class="level_active_number"></span></i>/{{price($lv3Withdraw)}}<span class="level_total_number"></span> </p> 
      </div>
     </div> 
     <div class="boxAll"> 
      <div class="boxItem1">
       Total
      </div> 
      <div class="boxItem2"> 
       <p> <i>{{$third_level_users->count()}}<span class="level_active_number"></span></i>/{{$third_level_users->count()}}<span class="level_total_number"></span> </p> 
      </div> 
      <div class="boxItem3">
       <p> <i>{{price($lv3Recharge)}}<span class="level_active_number"></span></i>/{{price($lv3Recharge)}}<span class="level_total_number"></span> </p> 
      </div>
      <div class="boxItem4">
       <p> <i>{{price($lv3Withdraw)}}<span class="level_active_number"></span></i>/{{price($lv3Withdraw)}}<span class="level_total_number"></span> </p> 
      </div>
     </div> 
    </div> 
   </div> 
  </div> 
   <!-- menu area -->
    @include('app.layout.manu')
</div>

<!-- === Script Area === -->
<meta name="csrf-token" content="{{csrf_token()}}">
<script src="{{asset('assets/toast.js')}}"></script>
@include('alert-message')
<!-- menu area -->
@include('app.layout.js')

</body>
</html>