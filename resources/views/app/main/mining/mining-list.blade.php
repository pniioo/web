@extends('app.layout.app')
@section('header_content')
    <style>
        .card-section .card-area {
            background: transparent;
        }
        .modal-backdrop {
            display: none;
        }
        .modal-content {
            border: none;
            box-shadow: 0px 5px 8px #f1000085;
        }
         footer{
             background: #614D7C;
         }
    </style>
@endsection
@section('app_content')
    <link rel="stylesheet" href="{{asset('app/vip')}}/assets/css/style.css">
    <style>
        .card-section .product-info .price::after {
            display: none;
        }
        .card-section .card-area {
            display: unset;
        }
        .card-area .card-body .card-btn .btn {
            display: block;
            width: 100%;
            border: none;
        }
    </style>

    <section class="card-section clearfix">
        <div class="container">
            <div class="card-area">
                <div class="row">
                    @if($datas->count() > 0)
                    @foreach($datas as $purchase)
                        <?php
                        $mining = \App\Models\Mining::where('user_id', auth()->id())
                            ->where('purchase_id', $purchase->id)
                            ->where('package_id', $purchase->package->id)
                            ->orderByDesc('id')->first();
                        ?>
                        <div class="col-md-12 @if(!$loop->last) mb-3 @endif">
                            <div class="card" style="">
                                <img class="card-img-top" style="height: 170px" src="{{view_image($purchase->package->photo)}}" alt="Card image cap">
                                <div class="card-body">
                                    <ul>
                                        <li>
                                            <span>{{translator('Price')}}</span>
                                            <span>{{$purchase->package->price}} {{setting('currency')}}</span>
                                        </li>
                                        <li>
                                            <span>{{translator('Account')}}</span>
                                            <span>1 TH/S-100TH/S</span>
                                        </li>
                                        <li>
                                            <span>{{translator('Income')}}</span>
                                            <span>{{$purchase->package->package_commission}} {{setting('currency')}}</span>
                                        </li>
                                        <li>
                                            <span>{{translator('Time')}}</span>
                                            <span>{{$purchase->package->validity}} {{translator('Days')}}</span>
                                        </li>
                                        <li>
                                            <span>{{translator('Limit')}}</span>
                                            <span>{{translator('per person')}}</span>
                                        </li>

                                    </ul>
                                    <div class="card-btn">
{{--                                        <a href="{{route('user.deposit')}}" class="btn ">Recharge</a>--}}
                                        <a href="{{route('mining.status', $purchase->id)}}" class="btn btn-primary" style="color: #fff;background: #614D7C !important;">
                                            @if($mining && $mining->running_status == 'start')
                                                Running...
                                            @elseif($mining && $mining->running_status == 'stop')
                                                Start Now
                                            @elseif(!$mining)
                                                Not Yet
                                            @else
                                                View Result
                                            @endif
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @else
                        <div class="alert alert-success">
                            {{translator('Please  first invest in our platform')}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <footer></footer>
@endsection
