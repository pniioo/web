@extends('app.layout.app')
@section('header_content')
    <style>
        .search-button {
            width: unset;
        }
        .navi-menu-button {
            width: unset;
        }
        footer {
            margin-bottom: 0px;
            background: #fff;
        }
        img.help_img {
            width: 100%;
            border-radius: 14px;
        }
        img.help_img_icon {
            width: 50px;
        }
        ul {
            list-style: none;
            margin: 0;
            padding: 0;
            margin-top: 20px;
        }
        li {
            color: #000;
            font-size: 16px;
            padding: 14px 0;
        }
    </style>
@endsection
@section('app_content')

    <main class="margin" style="margin-top: 0">
        <section class="container">
            <div class="row">
                <div class="col-12">
                    <div>
                        <img class="help_img" src="{{asset('app/img/meta-help-center.png')}}">
                    </div>
                </div>
            </div>
        </section>

        <section class="container">
            <div class="row">
                <div class="col-12">
                    <ul>
                        <li>
                            <a href="{{\App\Models\Setting::first()->whatsapp}}">
                                <img class="help_img_icon" src="{{asset('app/img/whatsapp.png')}}">
                                {{env('APP_NAME')}} {{translator('official customer service')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{\App\Models\Setting::first()->telegram}}">
                                <img class="help_img_icon" src="{{asset('app/img/telegram.svg.png')}}">
                                {{translator('Telegram official group')}}
                            </a>
                        </li>
                        <li>
                            1. It is a service center. You can discuss your external problems with customer service.

                        </li>
                        <li>
                            2. Be sure to wait patiently after you discuss the issues.


                        </li>
                        <li>
                            3. You can contact customer service 24 hours, customer service can solve your account problems.

                        </li>
                        
                        <li>

4. Keep an eye on Telegram discussion groups if you want to know more! Discussion time 10:00:00-18:00:00
                        </li>
                        <li>


                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <footer>
        </footer>
    </main>
@endsection
