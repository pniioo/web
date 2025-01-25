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
    </style>

@endsection
@section('app_content')
    <link rel="stylesheet" href="{{asset('app/vip')}}/assets/css/style.css">
    <style>
        .card-section .product-info .price::after {
            display: none;
        }
    </style>

    <section class="card-section clearfix">
        <div class="container">
            <div class="card-area">
                <div class="row">
                    @foreach($vips as $vip)
                        <?php
                        $alreadyPurchase = \App\Models\Purchase::where('package_id', $vip->id)->where('user_id', user()->id)->where('status', 'active')->first();
                        ?>
                    <div class="col-md-12 @if(!$loop->last) mb-3 @endif">
                        <div class="card" style="">
                            <img class="card-img-top" style="height: 170px" src="{{view_image($vip->photo)}}" alt="Card image cap">
                            <div class="card-body">
                                <ul>
                                    <li>

                                        <span>{{translator('Price')}}</span>
                                        <span>{{$vip->price}} {{setting('currency')}}</span>
                                    </li>
                                    <li>
                                        <span>{{translator('Account')}}</span>
                                        <span>1 TH/S-100TH/S</span>
                                    </li>
                                    <li>
                                        <span>{{translator('Income')}}</span>
                                        <span>{{$vip->package_commission}} {{setting('currency')}}</span>
                                    </li>
                                    <li>
                                        <span>{{translator('Time')}}</span>
                                        <span>{{$vip->validity}} {{translator('Days')}}</span>
                                    </li>
                                    <li>
                                        <span>{{translator('Limit')}}</span>
                                        <span>{{translator('per person')}}</span>
                                    </li>

                                </ul>
                                <div class="card-btn">
                                    <a href="{{route('user.deposit')}}" class="btn ">{{translator('Recharge')}}</a>
                                    <a href="javascript:void(0)" class="btn btn-primary" @if(!$alreadyPurchase) data-toggle="modal" data-target="#exampleModal{{$vip->id}}" @endif @if($alreadyPurchase) style="padding: 7px 30px;background: #4d7df38a;border: none" @endif>{{translator($alreadyPurchase ? 'Registered' : 'Buy')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>


                        <div class="modal fade" id="exampleModal{{$vip->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{translator('Confirm Purchase')}}</h5>

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="product-info" style="width: 100%">
                                            <p class="brand">mac 5</p>
                                            <h4 class="price">
                                                {{$vip->price}}{{setting('currency')}}
                                                <span>rate: <p> 1.85</p></span>
                                            </h4>
                                            <p class="info">{{translator('total purchase restriction')}}:10000</p>
                                            <p class="info">{{translator('total number of purchase')}}:10000</p>
                                            <p class="info info-v">vip:  {{$vip->name}}</p>
                                            <h3 class="status">{{$vip->validity}} {{translator('days')}}</h3>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="{{route('purchase.confirmation', $vip->id)}}" class="btn">{{translator($alreadyPurchase ? 'Registered' : 'Buy')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <footer></footer>
    @push('scripts')
        <script>
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            var userBalance = '{{auth()->user()->balance}}';

            function purchase_package(vip) {
                if (vip) {
                    var url = '{{url('/purchase/vip')}}';
                    window.location.href = url + '/' + vip
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: 'VIP not selected.'
                    })
                }
            }
        </script>

        <script>
            function activate_package() {
                Toast.fire({
                    icon: 'error',
                    title: 'This VIP is activate!'
                })
            }
        </script>
    @endpush
@endsection
