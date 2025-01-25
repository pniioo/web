@extends('app.layout.app')
@section('header_content')
    <link rel="stylesheet" href="{{asset('public/app/')}}/assets/style.css">
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
@endsection
@section('app_content')

    <section>
        <div class="container mt-2">
            <div class="row">
                <div class="col-12">
                    <div class="w_form">
                        <p style="color: rgb(126 71 154);margin-top: 15px">You can change your password. but must know your current password and your phone number.</p>
                        <form action="{{route('user.change.password.confirmation')}}" id="withdraw_form" method="post" enctype="multipart/form-data">@csrf
                            <div class="amount w_input_box">
                                <input type="text" name="number" placeholder="Please enter your phone number" class="w_input" required>
                            </div>

                            <div class="amount w_input_box">
                                <input type="password" placeholder="Please enter your old password" name="old_password" class="w_input" value="" required>
                            </div>

                            <div class="amount w_input_box">
                                <input type="password" placeholder="Please enter your new password" name="new_password" class="w_input" value="" required>
                            </div>

                            <div class="amount w_input_box">
                                <input type="password" placeholder="Please enter your confirm password" name="confirm_password" class="w_input" value="" required>
                            </div>

                            <div class="amount w_input_box mt-2">
                                <input type="submit" class="w_submit" value="Change Password" style="background: rgb(126 71 154)">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.getElementById('withdraw_form').addEventListener('submit', function (){
            var amount = document.querySelector('input[name="amount"]');
            var method = document.querySelector('input[name="pay_method"]');
            var number = document.querySelector('input[name="number"]');
            var loader = document.querySelector('.loader');
            if (amount.value == ''){
                amount.style.border = '1px solid #e79494';
            }else if (method.value == ''){
                document.querySelector('.method_box').style.border = '1px solid #e79494';
            }else if (number.value == ''){
                number.style.border = '1px solid #e79494';
            }else{
                amount.style.border = '1px solid #03521e69';
                number.style.border = '1px solid #03521e69';
                loader.style.display = 'block';

                var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                var data = {
                    amount: amount.value,
                    number: number.value,
                    pay_method: method.value,
                }
                fetch('{{route('user.withdraw.request')}}', {
                    method: "POST",
                    body: JSON.stringify(data),
                    headers: {
                        "Content-type": "application/json; charset=UTF-8",
                        'X-CSRF-TOKEN': csrfToken
                    }
                })
                    .then(response => response.json())
                    .then(res => {
                        //must need
                        var Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });
                        if (res.status === true)
                        {
                            message(res.message)
                            window.location = '{{route('user.withdraw.preview')}}';
                        }else {
                            message(res.message)
                            loader.style.display = 'none';
                        }
                    })
                    .catch(err => console.log(err));
            }
        });

        var channel = document.getElementById('channel');
        channel.addEventListener('click', function (){
            document.querySelector('section.channel_box').style.right = 0;
        })

        function channelControl(channelId, channelName)
        {
            var text = document.getElementById('view_channel_text');
            text.innerHTML = channelName + ' Channel';
            document.querySelector('section.channel_box').style.right = 100+'%';
            document.querySelector('input[name="pay_method"]').value = channelId;
        }
    </script>
@endsection
