@extends('app.layout.app')
@section('header_content')
    <link rel="stylesheet" href="{{asset('app/')}}/assets/select2.min.css">
    <link rel="stylesheet" href="{{asset('app/')}}/assets/style.css">
    <style>
        .search-button {
            width: unset;
        }
        .modal-backdrop.show {
            display: none;
        }
        .navi-menu-button {
            width: unset;
        }
        header.no-background {
            background-color: #fff !important;
        }
        footer {
            margin-bottom: 0px;
        }
        a.view_ledger {
            background: rgb(60 10 85) !important;
            padding: 10px 33px;
            color: #fff;
            border-radius: 53px;
        }
    </style>
@endsection
@section('app_content')
    <link rel="stylesheet" href="{{asset('app/css/extra.css')}}">
    <main class="margin" style="margin-top: 0">
        <section class="check-section clearfix">
            <div class="title-area">
                <h2>{{translator('daily check-in')}}</h2>
                <p style="color: #fff">{{translator('Keep singing every day to get rich reward for free')}}</p>
            </div>
            <div class="reward-area clearfix">


                @foreach($datas as $key=>$data)
                    <div class="single-reward"
                         @if(!$data->ledger)
                            onclick="window.location.href='{{route('user.get_draw_bonus', $data->id)}}'"
                         @endif
                         style="background: @if($data->ledger) rgb(126 71 154) @endif"
                    >
                        <div class="reward-logo">
                            <img style="width: 43px" src="{{view_image($data->icon)}}">
                        </div>
                        <div class="reward-info">
                            <h3>{{$key+1}}</h3>
                            <p>{{$data->amount}}USDT</p>
                            <img src="{{asset('app/assets/img/check.png')}}">
                        </div>
                    </div>
                @endforeach
            </div>

            <div>
                <a href="{{route('user.draw.ledger')}}" class="view_ledger">{{translator('View Ledger')}}</a>
            </div>
        </section>

        <div style="height: 50px"></div>
    </main>
@endsection
