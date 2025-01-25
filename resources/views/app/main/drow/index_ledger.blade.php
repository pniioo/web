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
        td {
            color: #fff;
        }
        td {
            width: 50%;
        }
    </style>
@endsection
@section('app_content')
    {{--    --}}
    <link rel="stylesheet" href="{{asset('app/css/extra.css')}}">
    <main class="margin" style="margin-top: 0">
        <div>
            <h4 style="font-size: 18px;text-align: center;margin-top: 25px;color: #000;">{{translator('My Draw Ledgers')}}</h4>
        </div>
        @foreach($datas as $data)
         <div class="card my-1" style="border: none">
             <div class="card-body" style="background: rgb(60 10 85)">
                 <table class="table table-responsive" style="width: 100%;margin-bottom: 0;padding-bottom: 0;">
                     <tr>
                         <td>{{translator('Amount')}}</td>
                         <td>{{$data->amount}}USDT</td>
                     </tr>
                     <tr>
                         <td>{{translator('Date')}}</td>
                         <td>{{$data->current_date}}</td>
                     </tr>
                 </table>
             </div>
         </div>
        @endforeach
        <div style="height: 50px"></div>
    </main>
@endsection
