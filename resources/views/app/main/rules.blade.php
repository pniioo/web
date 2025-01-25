<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>
    <title>{{env('APP_NAME')}} | Rules of making money</title>
    <!-- favicon icon -->
    <link rel="icon" href="{{asset('footbal')}}/assets/image/favicon.jpeg">
    <!-- === Font awesome === -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- === Google Fonts === -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- === Css Area Start === -->
    <link rel="stylesheet" href="{{asset('footbal')}}/assets/css/global.css">
    <link rel="stylesheet" href="{{asset('footbal')}}/assets/css/style.css">
    <style>
body{
        touch-action: manipulation;
    }
</style>
</head>

<body>
<div class="announce-page">
    <!-- back section -->
    <header class="header-section">
        <div class="container">
            <div class="header-area">
                <div class="back-icon-area" onclick="window.location.href='{{route('mine')}}'">
                    <img src="{{asset('footbal')}}/assets/image/icon/back.png" alt="">
                </div>
                <div class="title-area">
                    <h2>Rules of making money</h2>
                </div>
            </div>
            <div class="notic-list-wrap">
                <div class="item-wrap">
                    <div class="flex title">
                        <p>{{env('APP_NAME')}} Earnings information:</p>
                    </div>
                    <p class="content" style="margin-top: 10px;">
                        1. exoftion is a cryptocurrency mining company, exoftion can invest or earn in different ways.
                        When you make an investment, you are an exoftion VIP member.
                    </p>
                    <p class="content" style="margin-top: 20px;">
                        2. If you invest between 500-5000, then you vip1, and according to vip1 you can earn 5% daily profit from your investment money.
                        Similarly when you invest 5001-10000, then you vip2, and according to vip2 you can earn 7% profit from your investment money.
                        Similarly when you invest 10001-25000, then you vip3, and according to vip3 you can earn 9% profit from your investment money.
                        Similarly when you invest 25001-50,000, then you vip4, and according to vip4 you can earn 11% profit from your investment money.
                    </p>
                    <p style="margin-top: 20px;">
                        Calculate : <br>
                        vip1: (500-5000)=5% [ 500×5%=25 Tk],[5000×5%=250 Tk]<br>

                        Vip2 : (5001-10000)=7% [5001×7%=350 Tk],[10000×7%=700 Tk]<br>

                        Vip3 : (10001-25000)=9% [10001×9%=900.09],[25000×9%=2250]<br>

                        Vip4 : (25001-50000)=11%<br>
                        [25001×11%=2750]<br>
                        [50000×11%=5500]<br>
                    </p>
                    <p style="margin-top: 10px;margin-bottom:50px">
                        3. You can earn from your membership at exoftion.
                    </p>
                </div>
            </div>
        </div>
    </header>
</div>
</body>
</html>
