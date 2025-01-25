@extends('app.layout.app')
@section('header_content')
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
            background-color: #337d0e1a !important;
        }
        footer {
            margin-bottom: 0px;
        }
    </style>
    <div class="search-button" data-search="open">
        <h3 class="logo">{{env('APP_NAME')}}</h3>
    </div>
@endsection
@section('app_content')
    <section class="w_banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="w_banner_box .card" style="background: linear-gradient(#00fa4a30,#4ba6e033), url(http://localhost/rngpawer/app/img/slider/w_banner.jpg)">
                        <div class="card-body">
                            <table class="">
                                <tr>
                                    <td>Total Assets</td>
                                    <td> {{price(auth()->user()->balance)}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container mt-2">
            <div class="row">
                <div class="col-12">
                    <div class="w_form">
                        <div>
                            <h4 style="color: #03521e" class="text-center">{{$data ? $data->bonus_name : "Bonus Not Available"}}</h4>
                        </div>
                        <form action="javascript:void(0)" onsubmit="submitBonusRequest()" id="withdraw_form" method="post" enctype="multipart/form-data">@csrf
                            <div class="amount w_input_box mt-5">
                                <label for="bonus_code" style="color: #03521e">Enter bonus code. we hope get your bonus code from our service</label>
                                <input type="text" id="bonus_code" placeholder="Please input number" name="bonus_code" class="w_input">
                            </div>

                            <div class="amount w_input_box mt-2">
                                <input type="submit" class="w_submit" value="Request Bonus">
                            </div>
                        </form>
                    </div>
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
            var loader = document.querySelector('.loader');
            var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            var code = document.querySelector('input[name="bonus_code"]').value
            //must need
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            if (code != ''){
                loader.style.display = 'block'
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
                        code = ''
                        if (res.status === true)
                        {
                            Toast.fire({
                                icon: 'success',
                                title: res.message
                            })
                            loader.style.display = 'none';
                            window.location = '{{route('user.bonus-preview')}}';
                        }else {
                            Toast.fire({
                                icon: 'error',
                                title: res.message
                            })
                            loader.style.display = 'none';
                        }
                    })
                    .catch(err => console.log(err));
            }else {
                loader.style.display = 'block'
                setTimeout(function (){
                    loader.style.display = 'none';
                    Toast.fire({
                        icon: 'error',
                        title: 'OOPs. Please Enter Bonus Code!'
                    })
                }, 2000)
            }
        }
    </script>
@endsection
