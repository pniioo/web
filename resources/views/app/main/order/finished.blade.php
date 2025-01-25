<!DOCTYPE html>
<html lang="en">
<head>
    @include('app.layout.css')
</head>
<body>
@include('app.layout.loading')
<style>
    .client-price p {
        color: #17cdaf !important;
    }
</style>
<div class="wrapper home-page">
    <section class="header-section">
        <div class="container">
            <div class="header-area">
                <div class="title-area">
                    <div class="announce">
                        <img src="{{asset('pcb')}}/v3/img/logo.2326676b.png" alt="">
                    </div>
                </div>
                <div class="balance-area">
                    <img src="{{asset('pcb')}}/v3/img/wolrd.png" alt="">
                </div>
            </div>
        </div>
    </section>

    <section style="background: #fff">
        <div class="container">
            <div style="margin-top: 15px">
                <img style="width: 100%" src="{{asset('pcb')}}/v3/img/company.46c6ee39.png">
            </div>
        </div>
    </section>


    <div class="amount_receiver">
        <p style="font-size: 16px;font-weight: bold">Receivable Income</p>
        <h3 style="margin-top: 35px;" id="amount">{{price($my_receive_able_amount)}}</h3>
        <button class="r_btn" type="button" onclick="user_received_amount()">Receive</button>
    </div>

    <div class="received_record" style="margin-top: 180px;padding: 0 20px;">
        <?php
            $commissions = \App\Models\Commission::where('user_id', user()->id)->where('status', 'received')->orderByDesc('id')->get();
        ?>
        @foreach($commissions as $commission)
        <div>
            <div style="display: flex;justify-content: space-between;">
                <div>{{$commission->date}}</div>
                <div>{{price($commission->amount)}}</div>
            </div>
            <hr class="divider" style="margin: 7px 0;">
        </div>
        @endforeach
    </div>
    <!-- menu area -->
    @include('app.layout.manu')
</div>

<!-- === Script Area === -->
<meta name="csrf-token" content="{{csrf_token()}}">
<script src="{{asset('assets/toast.js')}}"></script>
@include('alert-message')
<!-- menu area -->
@include('app.layout.js')

<meta name="csrf-token" content="{{csrf_token()}}">
<script>
    function user_received_amount()
    {
        document.querySelector('.loader_boss').style.display = 'block';

        fetch('{{route('user.received.amount')}}', {
            method: "POST",
            headers: {
                "Content-type": "application/json; charset=UTF-8",
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
            .then(response => response.json())
            .then(res => {
                if (res.status == true){
                    document.getElementById('amount').innerText = 'Tk. 0.00'
                    window.location.reload();
                }
                document.querySelector('.loader_boss').style.display = 'none';
                message(res.message);
            })
            .catch(err => console.log(err));
    }
</script>
</body>
</html>
