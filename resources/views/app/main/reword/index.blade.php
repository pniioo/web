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
        .btn.download-btn {
            font-size: 15px !important;
        }
    </style>
</head>
<body>
@include('alert-message')
@include('app.layout.loading')
<link rel="stylesheet" href="{{asset('app/css/loading.css')}}">
<div class="loader_boss" style="display: none">
    <svg class="spinner">
        <circle>
            <animateTransform attributeName="transform" type="rotate" values="-90;810" keyTimes="0;1" dur="2s" repeatCount="indefinite"></animateTransform>
            <animate attributeName="stroke-dashoffset" values="0%;0%;-157.080%" calcMode="spline" keySplines="0.61, 1, 0.88, 1; 0.12, 0, 0.39, 0" keyTimes="0;0.5;1" dur="2s" repeatCount="indefinite"></animate>
            <animate attributeName="stroke-dasharray" values="0% 314.159%;157.080% 157.080%;0% 314.159%" calcMode="spline" keySplines="0.61, 1, 0.88, 1; 0.12, 0, 0.39, 0" keyTimes="0;0.5;1" dur="2s" repeatCount="indefinite"></animate>
        </circle>
    </svg>
    <div>
        <span>Loading...</span>
    </div>
</div>
<div class="loader">
    <img class="loading_img" src="{{asset('footbal')}}/assets/image/loding.jpg" style="position: fixed;z-index: 999;width: 100px;top: 50%;left: 50%;transform: translate(-50%, -50%);">
</div>
<div class="setting_container">
    <div class="setting_banner" style="background: url('{{asset('footbal/assets/image/assets_bg.png')}}');padding: 50px 0;padding-bottom: 180px">
        <h2>
            <span style="top: 54px" onclick="window.location.href='{{route('mine')}}'"><i class="fa fa-chevron-left"></i></span>
            Award
        </h2>
    </div>

    <div class="setting_body" style="width: 92%;top: 120px;left: 50%;transform: translate(-50%);padding: 20px 10px 30px 10px;">
        <div class="service_header">

        </div>
        <style>
            .invitation_link {
                font-size: 16px;
                color: rgb(18, 87, 48);
            }
            .invitation_box {
                background: rgb(18 87 48 / 13%);
                overflow: hidden;
                border-radius: 5px;
                padding: 3px 0px;
                margin-top: 15px;
            }
            .invitation_btn {
                background: rgb(18, 87, 48);
                color: #fff;
                text-align: center;
                height: 100%;
                padding: 15px 0;
                font-size: 15px;
                border-radius: 0 8px 8px 0;
            }
        </style>

        <div class="row mt-1">
            <div class="col-12">
                <div class="title">
                    <h2>Invitation code</h2>
                    <h1 style="color: rgb(18, 87, 48);margin-top: 10px">0000121 (<small><i>copy</i></small>)</h1>
                </div>

                <div class="title" style="margin-top: 20px">
                    <h2>Invitation link</h2>
                    <div style="position: relative" class="invitation_box">
                        <div class="invitation_link" style="width: 80%;float: left">
                            {{url('register').'?ref_by='.auth()->user()->ref_id.'&invite_type=user&invite='.rand(000000, 999999).'&lang=en'}}
                        </div>
                        <div class="invitation_btn" style="width: 20%;float: left" onclick="copy_generation('{{url('register').'?ref_by='.auth()->user()->ref_id.'&invite_type=user&invite='.rand(000000, 999999).'&lang=en'}}')">
                            Copy
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .gift_box {
                width: 50px;
                height: 50px;
                margin: auto;
                background: #e5d900;
                text-align: center;
                line-height: 50px;
                border-radius: 50px;
                margin-top: 10px;
            }
            .r_item_kamal {
                background: #fff;
                position: absolute;
                top: 85px;
                border-radius: 10px 10px 0 0;
                padding: 19px 10px;
            }
            .r_item_kamal p {
                font-size: 14px;
                margin-left: 8px;
                color: #000000cf;
            }

        </style>
        <div class="reword_item_banner" style="margin-top: 30px">
            <div class="r_banner" style="position: relative">
                <img style="width: 100%" src="{{asset('footbal')}}/assets/image/fund-banner.png">
                <div class="r_item_kamal">
                    <div style="display: flex;justify-content: space-between">
                        <div>
                            <div class="gift_box" style="text-align: center">
                                <img src="{{asset('footbal')}}/assets/image/gift.png">
                            </div>
                        </div>
                        <div>
                            <p>Invite and register <span style="color: #12773d">30</span> users. you can get a special <span style="color: #12773d">VIP</span> and increment you daily income from <span style="color: #12773d">refer commission</span>, <span>and others commission</span> </p>
                        </div>
                    </div>
                    <div style="display: flex;justify-content: space-between;margin-top: 15px">
                        <div>
                            <h3 style="font-size: 18px"><span style="color: rgb(18, 87, 48)">{{$refer_users->count()}} </span> / 30</h3>
                            <p style="margin-left: 0">Number of invites</p>
                        </div>
                        <div>
                            <button
{{--                                class="@if($refer_users->count() >= 30 && auth()->user()->bonus_vip == '0') btn active @else btn active @endif"--}}
                                class="btn active"
                                style="border: none"
                                onclick="fillup_30_user()"
                            >
                                Receive
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div class="reword_item_banner" style="margin-top: 30px">
            <div class="r_banner" style="position: relative">
                <div class="r_item_kamal">
                    <div style="display: flex;justify-content: space-between">
                        <div>
                            <div class="gift_box" style="text-align: center">
                                <img src="{{asset('footbal')}}/assets/image/gift.png">
                            </div>
                        </div>
                        <div>
                            <p style="margin-top: 20px">Invite level 1 user first purchase bonus you can received.</p>
                        </div>
                    </div>
                    <div style="display: flex;justify-content: space-between;margin-top: 15px">
                        <div>

                        </div>
                        <div>
                            <button
                                class="btn active"
                                style="border: none"
                                onclick="get_first_time_purchase_income(this)"
                            >
                                @if(auth()->user()->first_time_bonus == 1)
                                Received
                                @else
                                    Receive
                                @endif
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<meta name="csrf-token" content="{{csrf_token()}}">
<script src="{{asset('footbal')}}/assets/js/jquery-3.7.0.min.js"></script>
<script src="{{asset('footbal')}}/assets/js/script.js"></script>
<script>
    var amount = '{{$amount}}';
    function get_first_time_purchase_income(_this)
    {
        if (amount > 0){
            var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            document.querySelector('.loader_boss').style.display = 'block';

            fetch('{{route('user.get_first_time_refer_bonus')}}', {
                method: "POST",
                headers: {
                    "Content-type": "application/json; charset=UTF-8",
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify({amount: amount}),
            })
                .then(response => response.json())
                .then(res => {
                    document.querySelector('.loader_boss').style.display = 'none';
                    message(res.message);
                    _this.innerHTML = 'Received'
                })
                .catch(err => console.log(err));
        }else {
            var received = _this.innerHTML
            message('Not Yet');
        }
    }
</script>
<script>
    var referUsers = '{{$refer_users->count()}}';
    var checkerBonusVip = '{{\Illuminate\Support\Facades\Auth::user()->bonus_vip}}';
    function fillup_30_user()
    {
        if (checkerBonusVip == '1'){
            message('Already get it');
            return true;
        }
        if (referUsers >= 30){
            var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            document.querySelector('.loader_boss').style.display = 'block';

            fetch('{{route('user.get_bonus_vip')}}', {
                method: "POST",
                headers: {
                    "Content-type": "application/json; charset=UTF-8",
                    'X-CSRF-TOKEN': csrfToken
                }
            })
                .then(response => response.json())
                .then(res => {
                    document.querySelector('.loader_boss').style.display = 'none';
                    if (res.status === true)
                    {
                        message(res.message);
                        window.location.reload();
                    }else {
                        message(res.message);
                    }
                })
                .catch(err => console.log(err));
        }else {
            message('Need more refer!');
        }
    }

    function copy_generation(text)
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
        message("Copy success")
    }
</script>
</body>
</html>

