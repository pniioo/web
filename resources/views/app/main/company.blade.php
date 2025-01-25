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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
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

        input[type="text"]::placeholder {
            color: #000;
        }

        button.gift_btn {
            background: linear-gradient(180deg, #67d830, #12773d);
            border: none;
            width: 100%;
            padding: 15px 0;
            color: #fff;
            font-size: 18px;
            border-radius: 50px;
            margin-top: 46px;
        }

        .setting_body {
            top: 164px;
        }
    </style>
</head>
<body>
@include('alert-message')
<link rel="stylesheet" href="{{asset('app/css/loading.css')}}">
<div class="loader_boss" style="display: none">
    <svg class="spinner">
        <circle>
            <animateTransform attributeName="transform" type="rotate" values="-90;810" keyTimes="0;1" dur="2s"
                              repeatCount="indefinite"></animateTransform>
            <animate attributeName="stroke-dashoffset" values="0%;0%;-157.080%" calcMode="spline"
                     keySplines="0.61, 1, 0.88, 1; 0.12, 0, 0.39, 0" keyTimes="0;0.5;1" dur="2s"
                     repeatCount="indefinite"></animate>
            <animate attributeName="stroke-dasharray" values="0% 314.159%;157.080% 157.080%;0% 314.159%"
                     calcMode="spline" keySplines="0.61, 1, 0.88, 1; 0.12, 0, 0.39, 0" keyTimes="0;0.5;1" dur="2s"
                     repeatCount="indefinite"></animate>
        </circle>
    </svg>
    <div>
        <span>Loading...</span>
    </div>
</div>
<div class="loader">
    <img class="loading_img" src="{{asset('footbal')}}/assets/image/loding.jpg"
         style="position: fixed;z-index: 999;width: 100px;top: 50%;left: 50%;transform: translate(-50%, -50%);">
</div>
<div class="setting_container">
    <div class="setting_banner" style="background: url('{{asset('footbal')}}/assets/image/bill-bg.png')">
        <h2 style="display: flex;justify-content: space-between;margin: 0 20px">
            <div style="font-size: 15px" onclick="window.location.href = '{{route('mine')}}'"><i
                    class="fa fa-chevron-left"></i></div>
            <div style="font-size: 18px">Welcome to {{env('APP_NAME')}}</div>
            <div style="font-size: 13px"></div>
        </h2>
        <p>Thanks for created your account in our platform</p>
    </div>

    <div class="setting_body">
        <p style="font-size: 18px;margin-bottom: 20px;">
            Welcome to {{env('APP_NAME')}}, a company dedicated to providing professional sports field construction,
            investment, and rental services.
        </p>
        <p style="font-size: 18px;margin-bottom: 20px;">
            We specialize in delivering top-quality sports facilities for a verity of events and activities, including
            games, tournaments, including games, tournaments, training sessions, and more. Our team is committed to
            providing exceptional customer service and ensuring that our clients have access to the best facilities
            available.
        </p>
        <div>
            <img style="width: 100%;border-radius: 5px;margin-bottom: 10px;" src="{{asset(setting('logo'))}}">
        </div>

        <p style="font-size: 18px;margin-bottom: 20px;">
            Whether you are looking to invest in a sports facility or rent a space for your team or event, we have the
            expertise and resources to make it happen. Contact CFC today to learn more about our services and how we can
            help you achieve your goals.
        </p>

        <div>
            <img style="width: 100%;border-radius: 5px;" src="{{asset(setting('logo'))}}">
        </div>
    </div>
</div>
<script src="{{asset('footbal')}}/assets/js/jquery-3.7.0.min.js"></script>
<script src="{{asset('footbal')}}/assets/js/script.js"></script>
</body>
</html>
