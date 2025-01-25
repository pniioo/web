<html lang="en">
 <head> 
  <meta charset="UTF-8"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <link rel="stylesheet" type="text/css" href="{{asset('public/tra/css/common.css')}}"> 
  <link rel="stylesheet" type="text/css" href="{{asset('public/tra/css/main.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('public/tra/css/login.css')}}"> 
  <link rel="stylesheet" href="/static/loading/loading.css"> 
  <title>Document</title> 
 </head> 
 
 
 
 
 
 
 
 <form action="{{url('register')}}" id="reg" method="post">@csrf
    <div class="area">
 
 
 </head> 
 <body> 
  <img class="bjt" src="{{asset('public/tra/img/bjt.png')}}" alt=""> 
  <img class="logo" src="{{asset('public/tra/img/logo.png')}}" alt=""> 
  <div class="modeBox"> 
   <p>We connect vital resources to power and build the world</p> 
   <div class="logoBox"> 
    <div class="form_box"> 
     <div class="formImg"> 
      <p>Mobile number</p> 
     </div> 
     <div class="form"> 
      <input type="text" class="check_number_func_1" name="phone" maxlength="10" placeholder="Enter your Mobile number"> 
     </div> 
     <!--<div class="formImg"> 
      <p>Captcha</p> 
     </div>
     <div class="form"> 
      <input class="otpipt check_number_func_1" maxlength="4" type="text" name="captcha" placeholder="Enter Captchavalue"{{old('captcha')}}"> 
      <img class="capcha "src="{{$captcha_code}}="">
     </div> -->
     <div class="formImg"> 
      <p>Password</p> 
     </div> 
     <div class="form"> 
      <input type="Password" name="password" placeholder="Password ( ≥6 characters )"> 
     </div> 
     <div class=" formImg">
    <p>reffal</p>
     </div>
     <div class="form"> 
      <input type="text" name="ref_by" placeholder="Please enter your invite code"
                       value="{{isset($ref_by) && !empty($ref_by) && $ref_by != null ? $ref_by : \App\Models\User::select('ref_id')->first()->ref_id}}"> 
     </div> 
    </div> 
    <a href="javascript:;" id="sign_btn"> <button class="loginB">Sign up</button> </a> 
   </div> 
   <span>Already have an account ? <a href="{{url('login')}}">Login</a></span> 
  </div> 
     </div>
        </div>
    </div>
</form>


@include('alert-message')

<script>
    function submitForRegistration()
    {
        document.querySelector('.load').style.display='block';
        let captcha = document.querySelector('input[name="captcha"]').value;
        let code = '{{$captcha_code}}';
        if (captcha != code){
            document.querySelector('.load').style.display='none';
            message('Invalid Captcha');
            return true;
        }
        document.getElementById('reg').submit()
    }
</script>

</body>
</html>