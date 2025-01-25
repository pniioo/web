<!DOCTYPE html>
<html lang="en">
<head>
    @include('app.layout.css')
</head>

<body>
@include('app.layout.loading')
<div class="wrapper home-page s11">
    <!-- notice section -->
    <section class="header-section sdsd" style="height: 165px;">
        <div class="container">
            <div class="header-area">
                <div style="color: #fff;" onclick="window.location.href='{{route('mine')}}'"> <i class="fa fa-chevron-left"></i> </div>
                <div class="title-area">
                    <h3 style="color: #fff;">Flowing income</h3>
                </div>
                <div></div>
            </div>

            <div style="display: flex;justify-content: space-between;margin-top: 30px;">
                <div>
                    <img style="width: 40px" src="https://ffst.vip/uploads/images/image_2023-08-03_15-38-40.png">
                </div>
                <div style="color: #fff;font-weight: bold">8801933690400</div>
                <div>
                    <img style="width: 20px;" src="https://www.ffst.com/static/images/my/level2-inactive.png">
                    <img style="width: 20px;" src="https://www.ffst.com/static/images/my/level2-inactive.png">
                    <img style="width: 20px;" src="https://www.ffst.com/static/images/my/level2-inactive.png">
                    <img style="width: 20px;" src="https://www.ffst.com/static/images/my/level2-inactive.png">
                    <img style="width: 20px;" src="https://www.ffst.com/static/images/my/level2-inactive.png">
                </div>
                <div></div>
            </div>

            <div style="display: flex;justify-content: space-between;margin-top: 0px;" class="ppp">
                <div></div>
                <div>
                    <h4>0 USDT</h4>
                    <span>Cumulative income</span>
                </div>
                <div>
                    <h4>0 USDT</h4>
                    <span>Income last month</span>
                </div>
            </div>
        </div>


        <!-- menu area -->
    @include('app.layout.manu')
<!-- === Script Area === -->
@include('app.layout.js')


</body>
</html>
