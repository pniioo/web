<!DOCTYPE html>
<html lang="en">
<head>
    @include('app.layout.css')
</head>
<style>
    .card {
        padding: 12px;
        box-shadow: 0px -2px 0px rgb(0, 54, 202);
        border-radius: 5px;
        margin: 10px 0;
        background: #29be00;
    }
</style>
<style>
    i.fa.fa-arrow-down {
        background: #e8c110;
        width: 25px;
        height: 25px;
        text-align: center;
        line-height: 25px;
        color: #fff;
        border-radius: 50px;
        margin-right: 5px;
    }
    i.fa.fa-arrow-up {
        background: #e8c110;
        width: 25px;
        height: 25px;
        text-align: center;
        line-height: 25px;
        color: #fff;
        border-radius: 50px;
        margin-right: 5px;
    }
    hr.hr {
        margin: 15px 0 0 0;
    }
</style>
<body>
<div class="wrapper profile-page" style="padding-top: 0">
    <div style="display: flex;justify-content: space-between;background: rgb(0, 100, 166);color: #fff;padding: 12px 16px;">
        <div onclick="window.location.href='{{route('mine')}}'"><i class="fa fa-chevron-left"></i></div>
        <div>Check-in Ledger</div>
        <div></div>
    </div>

    <div class="container" id="recharge" style="display: block">
        @if($checkins->count() > 0)
        @foreach($checkins as $element)
                <div class="_card" style="margin-top: 12px">
                    <div style="padding: 0 15px;display: flex;justify-content: space-between;">
                        <div style="font-weight: 600;"><i class="fa fa-arrow-up"></i> Date</div>
                        <div style="font-weight: 600;color: #007fff;">+{{$element->amount}}</div>
                    </div>
                    <div style="padding: 0 15px;display: flex;justify-content: space-between;">
                        <div style="margin-left: 32px">{{$element->created_at}}</div>
                        <div>Amount</div>
                    </div>
                </div>
                @if($loop->last)
                @else
                    <hr class="hr">
                @endif
        @endforeach
            @else
                <h4 style="color: rgb(0, 100, 166);text-align: center;margin-top: 20px">Data not found</h4>
            @endif
    </div>
</div>

<!-- menu area -->
@include('app.layout.manu')

<!-- === Script Area === -->
@include('app.layout.js')
</body>
</html>
