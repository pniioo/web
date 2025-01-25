<!DOCTYPE html>
<html lang="en">
<head>
    @include('app.layout.css')
</head>
<body>
@include('app.layout.loading')
<div class="wrapper home-page">
    <style>
        .wrapper {
            background: #99999921;
        }
    </style>

    <div class="activateArea"
         style="margin-top: 13px;border-radius: 13px;background: #fff;padding: 15px;margin-right: 15px;margin-left: 15px;">
        <div class="sgstyvcgv">
            <img style="width: 100%;" src="{{asset($package->photo)}}" alt="">


            <p style="margin: 0;font-size: 16px;color: #000; text-align: center;margin-top: 15px;">{{$package->name}}</p>

            <p style="color: #00000052;font-size: 14px;margin-top: 20px;">
                {{$package->title}}
            </p>
        </div>
    </div>


    <div class="activateArea"
         style="margin-top: 13px;border-radius: 13px;background: #fff;padding: 15px;margin-right: 15px;margin-left: 15px;">
        <div class="sgstyvcgv">
            <p style="margin: 0;font-size: 16px;color: #000; text-align: center;margin-top: 15px;">{{$package->name}}</p>

            <div style="display: flex;justify-content: space-between;padding: 12px;">
                <div>Price</div>
                <div>{{price($package->price)}}</div>
            </div>
            <div style="display: flex;justify-content: space-between;padding: 12px;">
                <div>Daily Income</div>
                <div>{{price($package->commission_with_avg_amount / $package->validity)}}</div>
            </div>
            <div style="display: flex;justify-content: space-between;padding: 12px;">
                <div>Validity</div>
                <div>{{$package->validity}}Day</div>
            </div>

            <div class="prof_btn">
                <button onclick="window.location.href='{{route('purchase.confirmation', $package->id)}}'">Confirm Now</button>
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
</body>
</html>
