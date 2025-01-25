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
<div class="loader">
    <img class="loading_img" src="{{asset('footbal')}}/assets/image/loding.jpg" style="position: fixed;z-index: 999;width: 100px;top: 50%;left: 50%;transform: translate(-50%, -50%);">
</div>
<div class="setting_container">
    <div class="setting_banner" style="background: url('{{asset('footbal')}}/assets/image/bill-bg.png')">
        <h2>
            <span onclick="window.location.href = '{{route('mine')}}'"><i class="fa fa-chevron-left"></i></span>
            Account Settings
        </h2>
    </div>

    <div class="setting_body">
        <ul>
            <li>
                <div>Nick name</div>
                <div onclick="open_se_modal('name')">@if(auth()->user()->name) <span style="color: #000">{{auth()->user()->name}}</span> @else {{'(Unbound)'}} @endif <i class="fa fa-chevron-right"></i></div>
            </li>

            <li>
                <div>bKash</div>
                <div onclick="open_se_modal('easypaisa')">@if(auth()->user()->bkash) <span style="color: #000">{{auth()->user()->bkash}}</span> @else {{'(Unbound)'}} @endif  <i class="fa fa-chevron-right"></i></div>
            </li>

            <li>
                <div>Nagad</div>
                <div onclick="open_se_modal('jazzcash')">@if(auth()->user()->nagad) <span style="color: #000">{{auth()->user()->nagad}}</span> @else {{'(Unbound)'}} @endif <i class="fa fa-chevron-right"></i></div>
            </li>

            <li>
                <div>USDT</div>
                <div onclick="open_se_modal('usdtmodal')">@if(auth()->user()->usdt) <span style="color: #000">Already set</span> @else {{'(Unbound)'}} @endif <i class="fa fa-chevron-right"></i></div>
            </li>

            <li>
                <div>Withdraw password</div>
                <div onclick="open_se_modal('usdt')">@if(auth()->user()->w_password) <span style="color: #000">{{auth()->user()->w_password}}</span> @else {{'(Unbound)'}} @endif  <i class="fa fa-chevron-right"></i></div>
            </li>

            <li>
                <div>Login password</div>
                <div>
                    <a href="{{route('login_password')}}">(Unbound) <i class="fa fa-chevron-right"></i></a>
                </div>
            </li>

        </ul>
    </div>
</div>

<div class="modal1 usdtmodal" style="opacity: 0;z-index: -1">
    <div class="modal1_body">
        <div class="modal1_body_header">
            <h2>USDT</h2>
            <div class="modal1_close" onclick="modal1_close('usdtmodal')"><i class="fa fa-close"></i></div>
        </div>

        <div class="modal1_body_content">
            <form action="{{route('setting.update.usdt')}}" method="post"> @csrf
                <div>
                    <label for="usdt">USDT</label>
                </div>
                <div>
                    <input type="text" id="usdt" name="usdt" placeholder="Enter your usdt address">
                </div>

                <div style="margin-top: 25px">
                    <button type="submit"
                            class="btn download-btn"
                            style="border: none;text-align: center;display: unset;font-size: 24px;height: 45px;"
                    >Revise</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal1 name" style="opacity: 0;z-index: -1">
    <div class="modal1_body">
        <div class="modal1_body_header">
            <h2>Nick name</h2>
            <div class="modal1_close" onclick="modal1_close('name')"><i class="fa fa-close"></i></div>
        </div>

        <div class="modal1_body_content">
            <form action="{{route('setting.update.name')}}" method="post"> @csrf
                <div>
                    <label for="name">name</label>
                </div>
                <div>
                    <input type="text" id="name" name="name" placeholder="Please fill in the holder's full name">
                </div>

                <div style="margin-top: 25px">
                    <button type="submit"
                            class="btn download-btn"
                            style="border: none;text-align: center;display: unset;font-size: 24px;height: 45px;"
                    >Revise</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal1 easypaisa" style="opacity: 0;z-index: -1">
    <div class="modal1_body">
        <div class="modal1_body_header">
            <h2>bKash Account</h2>
            <div class="modal1_close" onclick="modal1_close('easypaisa')"><i class="fa fa-close"></i></div>
        </div>

        <div class="modal1_body_content">
            <form action="{{route('setting.bkash.account')}}" method="post"> @csrf
                <div>
                    <label for="easypaisa">bKash</label>
                </div>
                <div>
                    <input type="number" id="easypaisa" name="bkash" placeholder="Enter bKash account">
                </div>

                <div style="margin-top: 25px">
                    <button class="btn download-btn"
                            style="border: none;text-align: center;display: unset;font-size: 24px;height: 45px;"
                    >Revise</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal1 jazzcash" style="opacity: 0;z-index: -1">
    <div class="modal1_body">
        <div class="modal1_body_header">
            <h2>Nagad</h2>
            <div class="modal1_close" onclick="modal1_close('jazzcash')"><i class="fa fa-close"></i></div>
        </div>

        <div class="modal1_body_content">
            <form action="{{route('setting.nagad.account')}}" method="post"> @csrf
                <div>
                    <label for="jazzcash">Nagad account</label>
                </div>
                <div>
                    <input type="text" id="jazzcash" name="nagad" placeholder="Enter nagad account">
                </div>

                <div style="margin-top: 25px">
                    <button class="btn download-btn"
                            style="border: none;text-align: center;display: unset;font-size: 24px;height: 45px;"
                    >Revise</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal1 usdt" style="opacity: 0;z-index: -1">
    <div class="modal1_body">
        <div class="modal1_body_header">
            <h2>Withdraw</h2>
            <div class="modal1_close" onclick="modal1_close('usdt')"><i class="fa fa-close"></i></div>
        </div>

        <div class="modal1_body_content">
            <form action="{{route('setting.withdraw.password')}}" method="post"> @csrf
                <div>
                    <label for="usdt">Withdraw Password</label>
                </div>
                <div>
                    <input type="text" id="usdt" name="wpass" placeholder="Please enter withdraw password">
                </div>

                <div style="margin-top: 25px">
                    <button
                        type="submit"
                        class="btn download-btn"
                            style="border: none;text-align: center;display: unset;font-size: 24px;height: 45px;"
                    >Revise</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{asset('footbal')}}/assets/js/jquery-3.7.0.min.js"></script>
<script src="{{asset('footbal')}}/assets/js/script.js"></script>
<script>
    function modal1_close(div){
        document.querySelector('.'+div).style.opacity = '0';
        document.querySelector('.'+div).style.zIndex = '-1';
        document.querySelector('.'+div).style.transition = '1s';
    }

    function open_se_modal(div)
    {
        document.querySelector('.'+div).style.opacity = '1';
        document.querySelector('.'+div).style.zIndex = '1';
        document.querySelector('.'+div).style.transition = '1s';
    }
</script>
</body>
</html>
