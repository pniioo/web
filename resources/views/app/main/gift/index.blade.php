<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{env('APP_NAME')}}</title>
    <!-- favicon icon -->
    <link rel="icon" href="{{asset('footbal')}}/assets/image/favicon.ico">
    <!-- === Font awesome === -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- === Css Area Start === -->
    <link rel="stylesheet" href="{{asset('footbal')}}/assets/css/global.css">
    <link rel="stylesheet" href="{{asset('footbal')}}/assets/css/style.css">
    <link rel="stylesheet" href="{{asset('footbal')}}/assets/css/setting.css">
    <style>
        .gift_box {
            width: 60px;
            height: 60px;
            margin: auto;
            background: #e5d900;
            text-align: center;
            line-height: 60px;
            border-radius: 50px;
        }
        form.gift_box_form {
            margin: 45px 20px;
        }
        label {
            font-size: 18px;
        }
        input[type="text"] {
            width: 100%;
            padding: 14px 8px;
            font-size: 16px;
            color: #000;
            border-radius: 9px;
            margin-top: 5px;
            border: none;
            background: #00000017;
        }
        input[type="text"]::placeholder{
            color: #000;
        }
        button.gift_btn {
            background: #db1e09;
            border: none;
            width: 100%;
            padding: 15px 0;
            color: #fff;
            font-size: 18px;
            border-radius: 50px;
            margin-top: 46px;
        }
        form.gift_box_form {
            margin: 45px 20px;
            background: #fff;
            padding: 25px 15px;
            border-radius: 10px;
        }
        .setting_body {
            top: 164px;
        }
        body{
            background: #db1e09;
        }
        form.gift_box_form {
            margin: 0 20px;
        }
        form.gift_box_form {
            margin: 0 20px;
            position: absolute;
            width: 300px;
            left: 46%;
            top: 59%;
            transform: translate(-50%, -50%);
        }
        form.gift_box_form {
    margin: 0 20px;
    position: absolute;
    width: 300px;
    left: 46%;
    top: 45%;
    transform: translate(-50%, -50%);
}
    </style>
</head>
<body>
<link rel="stylesheet" href="{{asset('rahat/app.css')}}">
@include('alert-message')
<div class="setting_container">
    <div class="page_title">
        <div onclick="window.location.href='{{route('mine')}}'"><i class="fa fa-chevron-left"></i></div>
        <div>Exchange</div>
        <div></div>
    </div>
   <div style="text-align: center;
    " id="pre">
       <img src="{{asset('images__3_-removebg-preview.png')}}" alt="">
   </div>
   <div style="display: none;
    position: absolute;
    z-index: 99;
    top: 8%;
    left: 50%;
    transform: translate(-50%, 50%);
    border-radius: 50% !important;
    overflow: hidden;" id="wi">
       <img style="width: 100%;" src="{{asset('giphy (1).gif')}}" alt="">
   </div>
    <form action="javascript:void(0)" method="" class="gift_box_form"> @csrf
        <label for="gift">Gift code</label>
        <div>
            <input type="text" name="bonus_code" placeholder="Please enter  code">
        </div>

        <div>
            <button class="gift_btn" onclick="submitBonusRequest()">Receive</button>
        </div>
    </form>

</div>
<meta name="csrf-token" content="{{csrf_token()}}">
<script src="{{asset('footbal')}}/assets/js/jquery-3.7.0.min.js"></script>
<script src="{{asset('footbal')}}/assets/js/script.js"></script>

<script>
    function submitBonusRequest()
    {
        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var code = document.querySelector('input[name="bonus_code"]').value
        document.getElementById('wi').style.display='block';
        document.getElementById('pre').style.display='none';
        if (code != ''){
            var data = {
                bonus_code: code,
            }
            fetch('{{route('user.submit-bonus')}}', {
                method: "POST",
                body: JSON.stringify(data),
                headers: {
                    "Content-type": "application/json; charset=UTF-8",
                    'X-CSRF-TOKEN': csrfToken
                }
            })
                .then(response => response.json())
                .then(res => {
                    document.querySelector('input[name="bonus_code"]').value = '';
                console.log(document.querySelector('input[name="bonus_code"]').value)

                        setTimeout(function(){
                            document.getElementById('wi').style.display='none';
                            document.getElementById('pre').style.display='block';

                            message(res.message);
                        }, 4000);

                        setTimeout(function(){
                          message(res.message);
                        }, 4000);

                })
                .catch(err => console.log(err));
        }else {
            setTimeout(function (){
                message('OOPs. Please Enter Bonus Code!')
            }, 2000)
        }
    }
</script>
</body>
</html>
