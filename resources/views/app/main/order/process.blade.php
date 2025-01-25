<!DOCTYPE html>
<html lang="en">
<head>
    @include('app.layout.css')
</head>
<body>
@include('app.layout.loading')
<style>
    .client-price p {
        color: #17cdaf !important;
    }
</style>
<div class="wrapper home-page">
    <section class="header-section">
        <div class="container">
            <div class="header-area">
                <div class="title-area">
                    <div class="announce">
                        <img src="{{asset('pcb')}}/v3/img/logo.2326676b.png" alt="">
                    </div>
                </div>
                <div class="balance-area">
                    <img src="{{asset('pcb')}}/v3/img/wolrd.png" alt="">
                </div>
            </div>
        </div>
    </section>

    <section style="background: #fff">
        <div class="container">
            <div style="margin-top: 15px">
                <img style="width: 100%" src="{{asset('pcb')}}/v3/img/company.46c6ee39.png">
            </div>
        </div>
    </section>

    <section style="background: #fff;margin-top: 20px;">
        <div class="container">
            <h2 class="sec_title">Income Processing</h2>
            <div style="margin-top: 15px">
                <div style="overflow: hidden;">
                    <?php
                        $vipsIds = \App\Models\Purchase::where('user_id', auth()->user()->id)
                            ->where('status', 'active')->get()->pluck('package_id')->toArray();

                        $vips = \App\Models\Package::whereIn('id', $vipsIds)->where('status', 'active')->get();
                    ?>
                    @if($vips->count() > 0)
                        @foreach($vips as $vip)
                                <?php
                                $myVip = \App\Models\Purchase::where('user_id', auth()->user()->id)
                                    ->where('package_id', $vip->id)
                                    ->where('status', 'active')->first();
                                ?>
                            <div class="vip_item">
                                <div class="vipImage">
                                    <img style="width: 100%;" src="{{asset(view_image($vip->photo))}}">
                                </div>
                                <div class="vipTitle">
                                    <h5>{{$vip->name}}</h5>
                                    <div class="rate">
                                        <img src="{{asset('pcb')}}/v3/img/rate.png">
                                        <img src="{{asset('pcb')}}/v3/img/rate.png">
                                        <img src="{{asset('pcb')}}/v3/img/rate.png">
                                        <img src="{{asset('pcb')}}/v3/img/rate.png">
                                    </div>
                                </div>
                                <div class="vipPrice">
                                    <h5>{{price($myVip->amount)}}</h5>
                                    <h5>QTY: {{$myVip->qty}}</h5>
                                </div>
                                <div class="vipBuy">
                                    <a href="javascript:void(0)">
                                        Running...
                                    </a>
                                </div>
                            </div>
                        @endforeach
                        @else
                            <h3 class="empty">Empty For Process</h3>
                        @endif
                </div>
            </div>
        </div>
    </section>
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
