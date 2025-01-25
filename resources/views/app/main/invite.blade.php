<html lang="en">
 <head> 
  <meta charset="UTF-8"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1, maximum-scale=1, user-scalable=no"> 
  <link rel="stylesheet" type="text/css" href="{{asset('public/tra/css/common.css')}}"> 
  <link rel="stylesheet" type="text/css" href="{{asset('public/tra/css/main.css')}}"> 
  <link rel="stylesheet" type="text/css" href="{{asset('public/tra/css/share.css')}}"> 
  <link rel="stylesheet" href="{{asset('public/tra/css/loading.css')}}">
  <title>Document</title>
 </head> 
 <body>
  <style>
  p.hdghcdgcvgdvc {
        position: absolute;
        bottom: 43px;
        font-size: 21px;
        margin-left: 10px;
        color: #db1e09;
        font-weight: 600;
    }
    .referralLink {
        margin: 0 12px;
        background: #ff000012;
        padding: 14px 12px;
        /* white-space: nowrap; */
        overflow: hidden;
        border-radius: 6px;
        margin-top: 11px;
    }
    .buy_confirm a {
        text-decoration: none;
        font-weight: 500;
        font-weight: 500;
        background: #db1e09;
        padding: 10px 63px;
        font-size: 19px;
        color: #fff;
        border-radius: 6px;
        margin-top: 20px;
        /* width: 100%; */
        margin: 20px 12px;
        display: block;
        box-shadow: 0px 3px 0px #000;
    }


  </style>
  <!-- 头部 --> 
  <div class="head"> 
   <p></p> 
   <img class="logo" src="{{asset('public/tra/img/logo.png')}}" alt=""> 
   <p></p> 
  </div> 
  <div class="referBox"> 
   <div class="earnBox"> 
    <span>Refer and Earn</span> 
    <p>30% + 4% + 1% </p> 
   </div> 
   <img src="{{asset('public/tra/img//and.png')}}" alt=""> 
  </div> 
  <p class="throughP"> Earn <i>30%</i> commission of level 1 referrals' deposit amount immediately right after his payment. Make sure they register through your referral link. Earn <i>4%</i> commission of level 2 referrals' deposit amount immediately right after his payment. Earn <i>1%</i> commission of level 3's. </p> 
  <div class="chooseBox"> 
   <img src="{{asset('public/tra/img/linkimg.png')}}" alt=""> 
   <p>My Referral Link</p> 
  </div> 
   <div class="copyBox">
    <p class="copyp">{{url('register').'?inviteCode='.auth()->user()->ref_id}}</p>
   <a>  <button class="copyBtn copy-href="javascript:void(0)" onclick="copyLink('{{url('register').'?inviteCode='.auth()->user()->ref_id}}')"">Copy Link </button></a>
 </div>
  <div class="chooseBox"> 
   <img src="{{asset('public/tra/img/coins2.png')}}" alt=""> 
   <p>Referral Income</p> 
  </div> 
  <!--<div class="incomeBox"> 
   <div class="incomeItem"> 
    <span>Team Size</span> 
    <p></p> 
   </div> 
   <div class="incomeItem"> 
    <span>Team deposit</span> 
    <p></p> 
   </div> 
  </div> -->
  <a href="my-team"> <button class="checkBtn">Check</button> </a> 
  <div class="base_nav">-->
 @include('alert-message')
<script>
    function copyLink(text)
    {
        const body = document.body;
        const input = document.createElement("input");
        body.append(input);
        input.style.opacity = 0;
        input.value = text.replaceAll(' ', '');
        input.select();
        input.setSelectionRange(0, input.value.length);
        document.execCommand("Copy");
        input.blur();
        input.remove();
        message('Copied success..')
    }
</script>

</body>
</html>