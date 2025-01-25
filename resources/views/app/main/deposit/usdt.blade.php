<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{env('APP_NAME')}}</title>
    <!-- favicon icon -->
    <link rel="icon" href="{{asset('footbal')}}/--assets/image/favicon.jpeg">
    <!-- === Font awesome === -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- === Google Fonts === -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- === Css Area Start === -->
    <link rel="stylesheet" href="{{asset('footbal')}}/--assets/css/global.css">
    <link rel="stylesheet" href="{{asset('footbal')}}/--assets/css/animate.css">
    <link rel="stylesheet" href="{{asset('footbal')}}/--assets/css/recharge.css">
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
    <img class="loading_img" src="{{asset('footbal')}}/--assets/image/loding.jpg"
         style="position: fixed;z-index: 999;width: 100px;top: 50%;left: 50%;transform: translate(-50%, -50%);">
</div>
<div class="recharge-page">
    <!-- header area -->
    <header class="header-section">
        <div class="container">
            <div class="header-area">
                <div class="back-icon-area" onclick="window.location.href = '{{route('recharge')}}'">
                    <img src="{{asset('footbal')}}/--assets/image/icon/back.png">
                </div>
                <div class="title-area">
                    <h2>Recharge</h2>
                </div>
            </div>
        </div>
    </header>

    <section style="padding: 0 15px">
        <div class="qr">
            <div style="text-align: center">
                <img src="{{asset('footbal/--assets/image/qr.svg')}}">
            </div>
            <p style="text-align: center;
                    margin-top: 11px;
                    font-size: 17px;
                    color: #000000c4;">This address only acceptUSDT</p>
        </div>

        <div>
            <p style="color: #000000a8;
                        font-size: 18px;">Mainnet</p>
            <h3 style="font-size: 18px;
                        margin-top: 5px;">TRC20</h3>
        </div>
        <div style="margin-top: 25px">
            <p style="color: #000000a8;
                        font-size: 18px;">Wallet address</p>
            <div style="display: flex;justify-content: space-between;margin-top: 8px">
                <h3 style="font-size: 18px;
                        ">{{\Illuminate\Support\Str::random(25)}}</h3>
                <div>
                    <img onclick="clipBoard('{{\Illuminate\Support\Str::random(25)}}')" src="{{asset('footbal/--assets/image/copy.png')}}">
                </div>
            </div>
        </div>
        <style>
            input.usdt {
                width: 100%;
                padding: 15px 10px;
                border-radius: 50px;
            }
        </style>
        <div style="margin-top: 30px">
            <form action="{{route('usdt.recharge')}}" method="post">
                @csrf
                <div class="recharge-input-area">
                    <input type="number" id="getAmount" placeholder="Please enter usdt amount" oninput="bdt_convert(this)" required name="usdt">
                    <p style="margin: 0;margin-top: 8px;text-align: right;margin-right: 8px;font-size: 15px">BDT=<span class="bdt_amount">0.00</span></p>
                    <button class="rn-btn">Submit</button>
                </div>
            </form>
        </div>
    </section>
</div>
<script src="{{asset('footbal')}}/--assets/js/jquery-3.7.0.min.js"></script>
<script src="{{asset('footbal')}}/--assets/js/script.js"></script>
<script>
    var rate = '{{setting('rate')}}';
    function bdt_convert(_this){
        document.querySelector('.bdt_amount').innerHTML = _this.value * rate;
    }
    function clipBoard(text) {
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
        message("Address copied")
    }
</script>
</body>
</html>
