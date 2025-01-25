@extends('app.layout.app')
@section('header_content')
    <style>
        .wrapper-inline {
            background-color: #285e611c;
        }
    </style>
    <style>
        .search-button {
            width: unset;
        }
        .navi-menu-button {
            width: unset;
        }
        .second_slider_item {
            width: 320px;
            margin-left: 72px;
        }
        .owl-item.cloned {
            width: 300px !important;
        }

        .second_slider_container .owl-carousel .owl-stage-outer {
            height: 170px !important;
        }
        .second_slider_item {
            margin-left: 72px;
            width: 100%;
        }
        .owl-carousel .owl-item img {
            display: block;
            width: 300px;
            height: 150px;
        }
        .second_slider_item {
            box-shadow: 0 5px 10px #00000000;
            padding: 5px 2px;
        }
        footer {
            margin-bottom: 0px;
        }
        header.no-background {
            background-color: #22222205 !important;
        }
        h3.logo {
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            letter-spacing: 2px;
            margin: 0;
            margin-top: 5px;
        }
    </style>
@endsection
@section('app_content')
    <style>
        .table td, .table th {
            padding: 4px 10px;
            vertical-align: top;
            border-top: 1px solid #e9ecef;
            font-size: 15px;
        }
        .small, small {
            font-size: 11px;
        }
    </style>

    <section class="badger">
        <div class="container">
            <div class="card header_box_card">
                <div class="card-body header_box">
                    <div class="row">
                        <div class="col-5">
                            <h3 class="my-balance" style="margin-top: 12px">{{auth()->user()->balance}}<small>USDT</small> </h3>
                        </div>
                        <div class="col-7">
                            <h4 style="color: #000; font-size: 15px">{{translator('Your All Withdrawals Recurred')}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="vip_cards_box">
        <div class="container">
            @foreach($withdraws as $withdraw)
                <div class="card vip_card">
                <div class="card-body vip_card_body">
                    <div class="row mt-2">
                        <div class="col-12">
                            <div class="d-flex justify-content-between">
                                <div><h2 class="vip_title_hiro">{{translator('Withdraw Details')}}</h2></div>
                                <div class="fa_checker">
                                    <input id="check-one" class="effect-one" type="checkbox" @if($withdraw->status == 'approved') checked  @endif>
                                    <label for="check-one" @if($withdraw->status == 'pending') style="background: yellow" @endif>
                                        <span class="inner"></span>
                                        <span class="icon"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-bordered">
                                <tr>
                                    <td>{{translator('Withdraw Method')}}</td>
                                    <td>{{$withdraw->payment_method->name}}</td>
                                </tr>
                                <tr>
                                    <td>{{translator('Withdraw Amount')}}</td>
                                    <td>{{$withdraw->amount}}<small>USDT</small> </td>
                                </tr>
                                <tr>
                                    <td>{{translator('Withdraw Charge')}}</td>
                                    <td>{{$withdraw->charge}}<small>USDT</small> </td>
                                </tr>
                                <tr>
                                    <td>{{translator('Final Amount')}}</td>
                                    <td>{{$withdraw->final_amount * setting('rate')}}<small>BDT</small></td>
                                </tr>
                                @if($withdraw->status == 'approved')
                                    <tr>
                                        <td>{{translator('Trx ID')}}</td>
                                        <td>{{$withdraw->trx ?? '--'}}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td>{{translator('Currency')}}</td>
                                    <td>{{$withdraw->currency}}</td>
                                </tr>
                                <tr>
                                    <td>{{translator('Date & Time')}}</td>
                                    <td>{{$withdraw->created_at}}</td>
                                </tr>
                                <tr>
                                    <td>{{translator('Status')}}</td>
                                    <td>
                                        @if($withdraw->status == 'approved')
                                            <div class="badge badge-success">Approved</div>
                                        @elseif($withdraw->status == 'pending')
                                            <div class="badge badge-warning">Pending</div>
                                        @elseif($withdraw->status == 'rejected')
                                            <div class="badge badge-danger">Rejected</div>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <footer></footer>
@endsection
