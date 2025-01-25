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
        header.no-background {
            background-color: #fff !important;
        }
        footer {
            margin-bottom: 0px;
        }
        .thead-dark th{
            background: #38a61c
        }
    </style>
@endsection
@section('app_content')
    <!-- Page content start -->

    <style>
        .thead-dark th{
            background: #38a61c !important;
        }
        .thead-dark th {
            background: #38a61c !important;
            font-size: 12px;
            padding: 9px 5px !important;
        }
        .table td, .table th {
            font-size: 11px;
        }
    </style>
    <main class="margin" style="margin-top: 0">
        <section class="container">
            <h4 class="mt-5 font-weight-bold" style="color:#000; text-align: center">Income Summary</h4>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>VIP Label</th>
                        <th>VIP Price</th>
                        <th>Hourly earning</th>
                        <th>Daily Income</th>
                        <th>The Term</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datas as $key => $data)

                        <tr>
                            <td style="background: #ffc90054">LV.{{$key}}</td>
                            <td>{{price($data->price)}}</td>
                            <td>{{price($data->commission_with_avg_amount / $data->hours)}}</td>
                            <td>{{price(($data->commission_with_avg_amount / $data->hours) * 24)}}</td>
                            <td>{{$data->validity.'days'}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </section>

        <section class="container mt-4">
            @foreach($datas as $key => $data)
                <p class="my-3" style="font-weight: bold;color: #000">{{$key+1}}: {{$data->desc}}</p>
            @endforeach
        </section>
        <footer>
        </footer>
    </main>
    <!-- Page content end -->
@endsection
