@extends('app.layout.app')
@section('header_content')
    <style>
        section.profile_photo {
            position: absolute;
            top: 90px;
            left: 50%;
            transform: translate(-50%, 0px);
        }
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
        header.no-background {
            background-color: #fff !important;
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
        input.invite {
            width: 100%;
            border: none;
            color: #000;
            font-size: 11px;
        }
    </style>
@endsection
@section('app_content')
    <!-- Page content start -->

    <main class="margin" style="margin-top: 0">
            <section class="container">
                @forelse($datas as $data)
                <div class="alert alert-dark text-light" style="background-color: #036dd6">
                    <h6> <div class="badge badge-danger" style="background-color: #40b300">{{$data->notice_type}}</div> {{$data->notice_title}}</h6>
                    <p>{{$data->notice_desc}}</p>
                    <p class="text-light-info mt-4">Notice published: {{\Carbon\Carbon::parse($data->created_at)->format('Y-m-d')}}</p>
                </div>
                @empty
                    <div class="alert alert-danger text-light">
                        <h4>OOPs Not not found!</h4>
                    </div>
                @endforelse



                <div class="form-divider"></div>
            </section>

            <footer>
            </footer>
    </main>
    <!-- Page content end -->
@endsection
