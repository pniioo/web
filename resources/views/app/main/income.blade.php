<!DOCTYPE html>
<html lang="en">

<head>
    @include('app.layout.css')
</head>

<body>
@include('app.layout.loading')
<div class="income-box">
    <div class="nav-top">
        <div class="info-cont flex">
            <p class="info-name">Income</p>
            <div class="right-deposit">
                <p onclick="window.location.href='{{route('recharge')}}'">Recharge</p>
            </div>
        </div>
        <div class="forzen">
            <div class="leftl">
                <div class="bettingrew"><span class="van-popover__wrapper"><span style="position: relative;">Total
                                transaction rewards </span></span>
                    <p>{{price($total_reword)}}</p>
                </div>
                <div class="bottom"><span>Today transaction rewards</span>
                    <p>{{price($total_reword)}}</p>
                </div>
            </div>
            <div class="right1">
                <div class="bettingrew"><span>Total transaction amount</span>
                    <p>{{price(auth()->user()->balance)}}</p>
                </div>
                <div class="bottom"><span>Total estimated profit</span>
                    <p>{{price(auth()->user()->commission_balance)}}</p>
                </div>
            </div>
        </div>
        <hr style="margin-top: 20px">
        @if($incomes->count() > 0)
            @foreach($incomes as $income)
                <div class="forzen">
                    <div class="leftl">
                        <div class="bettingrew"><span class="van-popover__wrapper">
                                <span style="position: relative;">
                                        Received date</span></span>
                            <p>{{$income->created_at}}</p>
                        </div>
                    </div>
                    <div class="right1">
                        <div class="bettingrew"><span>Amount Commission</span>
                            <p>{{price($income->amount)}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div></div>
            <h4 style="color: rgb(0, 100, 166);text-align: center;margin-top: 20px">Data not found</h4>
            <div></div>
        @endif
    </div>
</div>
<!-- menu area -->
@include('app.layout.manu')

<!-- === Script Area === -->
@include('app.layout.js')

</body>
</html>
