<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>

    <title>{{env('APP_NAME')}} | announcement</title>
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
                    <h2>Announcement</h2>
                </div>
            </div>
            <div class="notic-list-wrap">
                <div class="item-wrap">
                    <div class="flex title">
                        <p>Platform notification!</p><span class="time">17:43
                                06/06</span>
                    </div>
                    <p class="content">
                        Exoftion is the world’s largest, online commercial real estate exchange. Our platform empowers
                        brokers, sellers and buyers with data-driven technology and comprehensive marketing tools to
                        expand market visibility and decrease time to close.
                    </p>
                </div>
                <div class="item-wrap">
                    <div class="flex title">
                        <p>Platform notification!</p><span class="time">16:36
                                19/05</span>
                    </div>
                    <p class="content">
                        From identifying untapped investment opportunities to precision-matching properties to the right
                        buyers, Exoftion technology has completely transformed the commercial real estate transaction
                        process over the last 10 years. Our focus remains fixed on driving new innovations and
                        continuing to save brokers, buyers and sellers time and money.
                    </p>
                </div>
                <div class="item-wrap">
                    <div class="flex title">
                        <p>Welcome to "{{env('APP_NAME')}}"</p><span class="time">16:36
                                19/05</span>
                    </div>
                    <p class="content">
                        With Exoftion, brokers and sellers tap into a digital platform that makes it easy to onboard assets, evaluate the success of
                        complimentary marketing campaigns in real-time and follow up on the strongest pre-qualified leads.
                    </p>
                </div>

                <div class="item-wrap">
                    <div class="flex title">
                        <p>Welcome to "{{env('APP_NAME')}}"</p><span class="time">16:36
                                19/05</span>
                    </div>
                    <p class="content">
                        Buyers are precision-matched with properties aligned with their investment goals, with unprecedented access to market analysis and due diligence documents to help them securely acquire properties online, with conf
                    </p>
                </div>

            </div>
        </div>
    </header>
</div>
</body>
</html>
