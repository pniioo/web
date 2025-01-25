@extends('app.layout.app')
@section('header_content')
    <link rel="stylesheet" href="{{asset('app/')}}/assets/style.css">
    <style>
        .wrapper-inline {
            width: unset !important;
        }
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
            background-color: #337d0e1a !important;
        }
        footer {
            margin-bottom: 0px;
            background: #fff;
        }
        img.fi_g {
            width: 100%;
            margin-top: 22px;
        }
    </style>
@endsection
@section('app_content')
    <section>
        <div class="container mt-2">
            <div class="row">
                <div class="col-12">
                    <style>
                        input.gif_code {
                            width: 100%;
                            height: 40px;
                            border-radius: 5px;
                            border: 1px solid #ff000045;
                            padding: 0px 15px;
                            color: #000;
                            text-align: center;
                        }
                        input::-webkit-input-placeholder {/* Chrome/Opera/Safari/Edge */
                            color: #ff000045;
                            text-align: center;
                            letter-spacing: 2px;
                            font-size: 20px;
                        }

                        input::-ms-input-placeholder { /* Microsoft Edge */
                            color: #ff000045;
                            text-align: center;
                            letter-spacing: 2px;
                            font-size: 20px;
                        }

                        input:-ms-input-placeholder {/* IE 10+ */
                            color: #ff000045;
                            text-align: center;
                            letter-spacing: 2px;
                            font-size: 20px;
                        }
                        button.gif_btn {
                            display: block;
                            width: 100%;
                            margin-top: 12px;
                            border: none;
                            background: #ff00004a;
                            padding: 13px 0;
                            color: #fff;
                            font-size: 16px;
                            border-radius: 5px;
                        }
                    </style>

                    <div>
                        <img class="fi_g" src="{{asset('app/img/giff_banner.png')}}">
                        <form action="javascript:void(0)">
                            <input type="text" placeholder="{{translator('Please fill gift code')}}" name="bonus_code" class="gif_code" oninput="go_gi()">
                            <button class="gif_btn" onclick="submitBonusRequest()">{{translator('Exchange')}}</button>
                        </form>
                    </div>

                    <script>
                        function go_gi(){
                            document.querySelector('.gif_btn').style.background = 'red'
                        }
                    </script>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
        </div>
    </footer>
    <script>
        function submitBonusRequest()
        {
            var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            var code = document.querySelector('input[name="bonus_code"]').value
            document.querySelector('.loader_boss').style.display = 'block';
            if (code != ''){
                var data = {
                    bonus_code: code,
                }
                fetch('{{route('user.submit-bonus')}}', {
                    method: "POST",
                    body: JSON.stringify(data),
                    headers: {
                        "Content-type": "application/json; charset=UTF-8",
                        'X-CSRF-TOKEN': csrfToken
                    }
                })
                    .then(response => response.json())
                    .then(res => {
                        document.querySelector('.loader_boss').style.display = 'none';
                        code = ''
                        if (res.status === true)
                        {
                            message(res.message);
                            window.location = '{{route('user.bonus-preview')}}';
                        }else {
                            message(res.message);
                        }
                    })
                    .catch(err => console.log(err));
            }else {
                setTimeout(function (){
                    message('OOPs. Please Enter Bonus Code!')
                }, 2000)
            }
        }
    </script>
@endsection
