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
<body>
<div class="wrapper profile-page" style="padding-top: 0">
    <div style="display: flex;justify-content: space-between;background: #db1e09;color: #fff;padding: 12px 16px;">
        <div onclick="window.location.href='{{route('user.team')}}'"><i class="fa fa-chevron-left"></i></div>
        <div>Team Level {{$step}}</div>
        <div></div>
    </div>
    <style>
        i.fa.fa-arrow-down {
            background: #db1e09;
            width: 25px;
            height: 25px;
            text-align: center;
            line-height: 25px;
            color: #fff;
            border-radius: 50px;
            margin-right: 5px;
        }
        i.fa.fa-arrow-up {
            background: #db1e09;
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
    <div class="container" id="withdraw" style="display: block">
        <div class="container" id="recharge" style="display: block">
            <div style="margin-top: 20px">
                @foreach(collect($users) as $key=>$element)
                    <div class="_card" style="margin-top: 12px; background: #fff;
    padding: 13px 0;
    border-radius: 7px;">
                        <div style="padding: 0 15px;display: flex;justify-content: space-between;">
                            <div style="font-weight: 600;"><i class="fa fa-check"></i> ID</div>
                            <div style="font-weight: 600;color: #007fff;">{{$element->ref_id}}({{$key}}</div>
                        </div>
                        <div style="padding: 0 15px;display: flex;justify-content: space-between;">
                            <div style="margin-left: 32px">{{substr($element->phone, 0, 3)}}******{{substr(strrev($element->phone), 0, 2)}}</div>
                            <div>
                                {{date(\Carbon\Carbon::parse($element->created_at)->format('Y-m-d'))}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- menu area -->
@include('app.layout.manu')

<!-- === Script Area === -->
@include('app.layout.js')

</body>
</html>
