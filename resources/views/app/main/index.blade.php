<html lang="en">
 <head> 
  <meta charset="UTF-8"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1, maximum-scale=1, user-scalable=no"> 
  <link rel="stylesheet" type="text/css" href="{{asset('public/tra/css/common.css')}}"> 
 <!-- <link rel="stylesheet" type="text/css" href="{{asset('public/tra/css/swiper-bundle.min.css')}}">-->
  <link rel="stylesheet" href="{{asset('public/tra/css/main.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('public/tra/css/home.css')}}"> 
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
  <!-- 轮播图 --
  <div class="slideshow flex-col"> 
   <div class="swiper mySwiper swiper-initialized swiper-horizontal swiper-android swiper-backface-hidden"> 
    <div class="swiper-wrapper" id="swiper-wrapper-d669cd325c4a74f1" aria-live="off" style="transform: translate3d(-339px, 0px, 0px); transition-duration: 0ms;">--
    <!- <div class="swiper-slide swiper-slide-duplicate swiper-slide-prev" data-swiper-slide-index="2" role="group" aria-label="3 / 3" style="width: 329px; margin-right: 10px;"> 
      <a href="/share/share"> <img src="{{asset('public/tra/img/64892d86d71f56208328d83563b93040.png')}}')}}" alt=""> </a> 
     </div> --
     <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="0" role="group" aria-label="1 / 3" style="width: 329px; margin-right: 10px;"> 
      <a href="/index/aboutus"> <img src="{{asset('public/tra/img/47576bb853347031b3e361e7c268efb5.png')}}" alt=""> </a> 
     </div> 
     <!--<div class="swiper-slide swiper-slide-next" data-swiper-slide-index="1" role="group" aria-label="2 / 3" style="width: 329px; margin-right: 10px;"> 
      <a href="javascript:;"> <img src="{{asset('public/tra/img/5698aba4d57d5f1ad15e7880d71c6f93.png')}}" alt=""> </a> 
     </div> --
     <div class="swiper-slide swiper-slide-duplicate-prev" data-swiper-slide-index="2" role="group" aria-label="3 / 3" style="width: 329px; margin-right: 10px;"> 
      <a href="/share/share"> <img src="{{asset('public/tra/img/64892d86d71f56208328d83563b93040.png')}}" alt=""> </a> 
     </div>--
     <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active" data-swiper-slide-index="0" role="group" aria-label="1 / 3" style="width: 329px; margin-right: 10px;"> --
      <a href="/index/aboutus"> <img src="{{asset('public/tra/img/47576bb853347031b3e361e7c268efb5.png')}}" alt=""> </a> 
     </div>
    </div> -->
    <!--<div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal">
     <span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1" aria-current="true"></span>
     <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span>
     <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span>
    </div> --
    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
   </div> 
  </div> -->
  <div class="balanceAll"> 
   <div class="balanceBox"> 
    <img src="{{asset('public/tra/img/ibma.png')}}" alt=""> 
    <div class="balanceItem"> 
     <span>ID {{auth()->user()->username}}</span> 
     <p>{{price(auth()->user()->balance)}}</p> 
     <span> deposit Balance</span> 
    </div> 
   </div> 
  </div> 
@foreach(\App\Models\Package::where('status', 'active')->get() as $element)
            <?php
            $myVip = \App\Models\Purchase::where('user_id', auth()->id())->where('package_id', $element->id)->where('status', 'active')->first();
            ?>
  <div class="productAl"> 
   <div class="productBox"> 
    <img src="{{asset($element->photo)}}" alt=""> 
    <div class="productItem"> 
     <p>Product:</p> 
     <span>Handysize - 28,000 DWT</span> 
    </div> 
    <div class="productItem"> 
     <p>Price:</p> 
     <span class="productColor">{{price($element->price)}}</span> 
    </div> 
    <div class="productItem"> 
     <p>Duration:</p> 
     <span><i class="productColor">{{$element->validity}}</i> days</span> 
    </div> 
    <div class="productItem"> 
     <p>Daily ROI:</p> 
     <span class="productColor">{{$element->ROI}}</span> 
    </div> 
    <div class="productItem"> 
     <p>Daily Return:</p> 
     <span class="productColor">{{price($element->commission_with_avg_amount / $element->validity)}}</span> 
    </div> 
    <div class="productItem"> 
     <p>Total Return:</p> 
     <span class="productColor">{{price($element->commission_with_avg_amount)}}</span> 
    </div> 
    <a href="{{route('package.details',$element->id)}}"> <button class="buyBtn">Buy</button> </a> 
   </div> 
  
 @endforeach

</div>
    

<!-- menu area -->
    @include('app.layout.manu')


</div>



<!-- === Script Area === -->
@include('app.layout.js')
</body>
</html>
   