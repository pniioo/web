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
    <style>
        .area {
            background: url("{{asset('public/rahat/bg.png')}}");
            background-size: contain;
            height: 100vh;
            background-attachment: fixed;
            position: fixed;
            width: 100%;
        }
        .login_note h5 {
            font-size: 22px;
            margin-top: 32px;
        }
        .login_note p {
            font-size: 12px;
            margin-top: 7px;
            color: #00000059;
        }
        input.custom_input {
            border-radius: 0;
        }
    </style>
</head>
<!--<div class="load" style="position: absolute;z-index: 99;top: 50%;left: 50%;transform: translate(-50%, -50%); display: none;">
    <img  style="width: 60px;" src="{{asset('public/rahat/load.gif')}}" alt="">
</div>-->
<form action="javascript:void(0)" method="post">
<body>
        <!--<div class="area">
        <h4 class="title" style="color: #fff;">FORTINET ASSETS</h4>
        <p class="title_p" style="color: #fff;">Welcome To FORTINET ASSETS Where You Earn Unlimited Income</p>
        <div class="form_area">--
            <div class="input_flex">
                <input type="text" class="custom_input" name="phone" placeholder="Please enter your phone number">
                <span class="icon_face"><i class="fa fa-mobile"></i>+234</span>
            </div>

            <div class="input_flex">
                <input type="password" name="password" class="custom_input" placeholder="Please enter your password number">
                <span class="icon_face globalIcon"><i class="fa fa-lock"></i></span>
            </div>--

            <div class="input_flex">
                <button type="button" class="login_btn" onclick="submitForLogin()">Login</button>
            </div>

            <div class="input_flex">
                <div class="account_text">No Account? <a href="{{url('register')}}">Register</a></div>
            </div>

            <div class="login_note">
                <h5>Login Notes:</h5>
                <p> Dear members kindly be informed that Official staff will never ask for your password or reach out to you directly. Contact from individuals claiming to be staff is likely a scam. Remember, your password cannot be changed, so do not share it to ensure the safety of your funds. </p>
            </div>-->
            
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
      <input type="text" class="custom_input" name="phone" placeholder="Enter your Mobile number"> 
     </div> 
     <div class="formImg"> 
      <p>Password</p> 
     </div> 
     <div class="form"> 
      <input type="password" name="password" class="custom_input" placeholder="Password ( ≥6 characters )"> 
     </div> 
    </div> 
    <button type="button" class="loginB" onclick="submitForLogin()">Login</button>
            </div>
        </div>
    </div>
</form>
@include('alert-message')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script>
    function submitForLogin()
    {
        var phone = document.querySelector('input[name="phone"]').value;
        var password = document.querySelector('input[name="password"]').value;
        //document.querySelector('.load').style.display='block';

        if (phone != ''){
            if (password != ''){
                var data = {
                    phone: phone,
                    password: password
                }
                fetch('{{route('login.submit')}}',
                    {
                        method:"POST",
                        body:JSON.stringify(data),
                        headers: {'Content-type': 'application/json; charset=UTF-8',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')}})
                    .then(response => response.json())
                    .then(data => {
                        //document.querySelector('.load').style.display='none';
                        message(data.message)
                        if (data.status == true){
                            window.location.href = data.url
                        }
                    }).catch();
            }else {
                message('Enter password');
            }
        }else{
            message('Enter phone number');
        }
    }
</script>
</body>
</html>