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

        footer {
            margin-bottom: 0px;
        }

        header.no-background {
            background-color: #22222205 !important;
        }

    </style>
@endsection
@section('app_content')
    <style>
        .table td, .table th {
            padding: 4px 10px;
            vertical-align: top;
            border-top: 1px solid #e9ecef;
            font-size: 10px;
        }
    </style>

    <section class="badger">
        <div class="container">
            <div class="card header_box_card">
                <div class="card-body header_box">
                    <div class="row">
                        <div class="col-5">
                            <h3 class="my-balance" style="margin-top: 12px">{{price(auth()->user()->balance)}}</h3>
                        </div>
                        <div class="col-7">
                            <h4 style="color: #000; font-size: 15px;margin-top: 8px;">VIP Details</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="vip_cards_box">
        <div class="container">
            <div class="card vip_card">
                <div class="card-body vip_card_body">
                    <div class="row mt-2">
                        <div class="col-12">
                            <div class="d-flex justify-content-between">
                                <div><h2 class="vip_title_hiro"><i class="fa fa-check"
                                                                   style="color: var(--vip-main)"></i> {{$vip->name}} All Details
                                    </h2></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-bordered">
                                <tr>
                                    <td>VIP Name</td>
                                    <td>{{$vip->name}}</td>
                                </tr>
                                <tr>
                                    <td>VIP Title</td>
                                    <td>{{\Illuminate\Support\Str::words($vip->title, 8)}}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="d-inline-block" style="padding-top: 20px">VIP Photo</span>
                                    </td>
                                    <td>
                                        <img src="{{view_image($vip->photo)}}" class="rounded" width="100" alt="VIP">
                                    </td>
                                </tr>
                                <tr>
                                    <td>VIP Price</td>
                                    <td>{{price($vip->price)}}</td>
                                </tr>

                                <tr>
                                    <td>VIP code</td>
                                    <td>{{$vip->code}}</td>
                                </tr>

                                <tr>
                                    <td>VIP validity</td>
                                    <td>{{$vip->validity}}Days</td>
                                </tr>
                                <tr>
                                    <td>VIP hours</td>
                                    <td>{{$vip->hours}}hours</td>
                                </tr>
                                <tr>
                                    <td>Per Hour Income</td>
                                    <td>{{price($vip->hours / $vip->package_commission)}}</td>
                                </tr>
                                <tr>
                                    <td>Commission Amount </td>
                                    <td>{{price($vip->package_commission)}}</td>
                                </tr>
                                <tr>
                                    <td>Average Amount</td>
                                    <td>{{price($vip->commission_with_avg_amount)}}</td>
                                </tr>
                                <tr>
                                    <td>Sponsor Income</td>
                                    <td>{{price($vip->sponsor_income)}}</td>
                                </tr>
                                <tr>
                                    <td>First Refer</td>
                                    <td>{{price($vip->first_ref)}}</td>
                                </tr>
                                <tr>
                                    <td>Second Refer</td>
                                    <td>{{price($vip->second_ref)}}</td>
                                </tr>
                                <tr>
                                    <td>Third Refer</td>
                                    <td>{{price($vip->third_ref)}}</td>
                                </tr>
                            </table>

                            <div class="col-12 text-center">
                                <a href="{{route('purchase.confirmation', $vip->id)}}" class="btn btn-dark">Confirm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer></footer>
@endsection
