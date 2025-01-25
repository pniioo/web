<!DOCTYPE html>
<html lang="en">
<head>
    @include('app.layout.css')
    <link rel="stylesheet" href="{{asset('footbal')}}/assets/css/p_slider.css">
</head>
<body>
@include('app.layout.loading')
<style>
    .client-price p {
        color: #17cdaf !important;
    }
</style>
<div style="display: flex;justify-content: space-between;background: #1da6ef;padding: 15px">
    <div style="color: #fff;" onclick="window.location.href='{{route('mine')}}'"><i class="fa fa-chevron-left"></i></div>
    <div style="color: #fff;font-weight: bold;">My Direct Push</div>
    <div></div>
</div>

<div class="wrapper home-page" style="background: #008aff12">

    <div class="d_card" style="display: flex;justify-content: space-around;padding: 16px;margin: 0 15px;background: #fff;margin-top: 15px">
        <div class="rowil1 rowil_active" onclick="rowil1(this)" style="color: #77777770;font-weight: bold;font-size: 14px">Recharged</div>
        <div class="rowil2" onclick="rowil2(this)" style="color: #77777770;font-weight: bold;font-size: 14px">Not Recharged</div>
    </div>

    <div class="rowil1_content">
        <div class="d_card" style="padding: 16px;margin: 0 15px;background: #fff;margin-top: 15px">
            <h4 style="color: #1da6ef;">Currently pushing 0 people</h4>
        </div>
    </div>

    <div class="rowil2_content" style="display: none;">
        <div class="d_card" style="padding: 16px;margin: 0 15px;background: #fff;margin-top: 15px">
            <h4 style="color: #1da6ef;">Currently pushing 2 people</h4>
        </div>

        <div class="d_card" style="margin: 0 15px;margin-top: 15px;">
            <div style="overflow: hidden;margin-top: 15px; background: #fff;padding: 13px 10px;border-radius: 5px;">
                <div style="width: 12%;margin-right: 2%;float: left;">
                    <img src="https://ffst.vip/uploads/images/image_2023-08-03_15-38-40.png" style="width: 40px;">
                </div>
                <div style="width: 83%;margin-right: 2%;float: right;">
                    <div style="display: flex;justify-content: space-between;">
                        <div style="font-size: 14px;color: #000;font-weight: 500">sbhsdbc</div>
                        <div style="font-size: 14px;color: #000;font-weight: 500">881933690444</div>
                        <div style="font-size: 14px;color: #000;font-weight: 500">ID: 14511514</div>
                    </div>
                    <div style="display: flex;justify-content: space-between;margin-top: 10px;">
                        <div style="font-size: 14px;color: #000;font-weight: 500">2023-02-03 02:00:00</div>
                        <div style="font-size: 14px;color: red;font-weight: 500">Invalid</div>
                    </div>
                </div>

                <div style="font-size: 14px;color: #000;font-weight: 500;margin-top: 65px">
                    Referral code: 1001010
                </div>
            </div>

            <div style="overflow: hidden;margin-top: 20px; background: #fff;padding: 13px 10px;border-radius: 5px;">
                <div style="width: 12%;margin-right: 2%;float: left;">
                    <img src="https://ffst.vip/uploads/images/image_2023-08-03_15-38-40.png" style="width: 40px;">
                </div>
                <div style="width: 83%;margin-right: 2%;float: right;">
                    <div style="display: flex;justify-content: space-between;">
                        <div style="font-size: 14px;color: #000;font-weight: 500">sbhsdbc</div>
                        <div style="font-size: 14px;color: #000;font-weight: 500">881933690444</div>
                        <div style="font-size: 14px;color: #000;font-weight: 500">ID: 14511514</div>
                    </div>
                    <div style="display: flex;justify-content: space-between;margin-top: 10px;">
                        <div style="font-size: 14px;color: #000;font-weight: 500">2023-02-03 02:00:00</div>
                        <div style="font-size: 14px;color: red;font-weight: 500">Invalid</div>
                    </div>
                </div>

                <div style="font-size: 14px;color: #000;font-weight: 500;margin-top: 65px">
                    Referral code: 1001010
                </div>
            </div>

            <div style="overflow: hidden;margin-top: 20px; background: #fff;padding: 13px 10px;border-radius: 5px;">
                <div style="width: 12%;margin-right: 2%;float: left;">
                    <img src="https://ffst.vip/uploads/images/image_2023-08-03_15-38-40.png" style="width: 40px;">
                </div>
                <div style="width: 83%;margin-right: 2%;float: right;">
                    <div style="display: flex;justify-content: space-between;">
                        <div style="font-size: 14px;color: #000;font-weight: 500">sbhsdbc</div>
                        <div style="font-size: 14px;color: #000;font-weight: 500">881933690444</div>
                        <div style="font-size: 14px;color: #000;font-weight: 500">ID: 14511514</div>
                    </div>
                    <div style="display: flex;justify-content: space-between;margin-top: 10px;">
                        <div style="font-size: 14px;color: #000;font-weight: 500">2023-02-03 02:00:00</div>
                        <div style="font-size: 14px;color: red;font-weight: 500">Invalid</div>
                    </div>
                </div>

                <div style="font-size: 14px;color: #000;font-weight: 500;margin-top: 65px">
                    Referral code: 1001010
                </div>
            </div>
        </div>
    </div>

    <!-- menu area -->
    @include('app.layout.manu')
</div>

<!-- === Script Area === -->
<meta name="csrf-token" content="{{csrf_token()}}">
<script src="{{asset('assets/toast.js')}}"></script>
@include('alert-message')
<!-- menu area -->
@include('app.layout.js')

<script>
    function rowil1(_this){
        let rowil1 = document.querySelector('.rowil1');
        let rowil2 = document.querySelector('.rowil2');
        let rowil1_content = document.querySelector('.rowil1_content');
        let rowil2_content = document.querySelector('.rowil2_content');

        if (rowil2.classList.contains('rowil_active')){
            rowil2.classList.remove('rowil_active')
        }
        rowil1.classList.add('rowil_active')

        rowil2_content.style.display='none';
        rowil1_content.style.display='block';
    }
    function rowil2(_this){
        let rowil1 = document.querySelector('.rowil1');
        let rowil2 = document.querySelector('.rowil2');
        let rowil1_content = document.querySelector('.rowil1_content');
        let rowil2_content = document.querySelector('.rowil2_content');

        if (rowil1.classList.contains('rowil_active')){
            rowil1.classList.remove('rowil_active')
        }
        rowil2.classList.add('rowil_active')

        rowil1_content.style.display='none';
        rowil2_content.style.display='block';
    }
</script>
</body>
</html>
