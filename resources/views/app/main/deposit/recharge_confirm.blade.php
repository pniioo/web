<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Balance-Recharge</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
    <link rel="stylesheet" href="{{asset('rahat/app.css')}}">
</head>
<body>
<style>
  input[type="text"] {
        width: 92%;
        margin: auto;
        margin-left: 1px;
        font-size: 14px;
        padding: 12px 10px;
        border: 1px solid #00000038;
        border-radius: 5px;
    }
    button {
        background: #db1e09;
        padding: 10px 60px;
        border-radius: 50px;
        color: #fff;
        border: none;
    }
    .card.mt-2 {
        background: #db1e09;
        text-align: center;
        margin-top: 4px;
        padding: 14px 0;
        border-radius: 8px;
    }
    input[type="text"] {
    width: 92%;
    margin: auto;
    margin-left: 1px;
    font-size: 14px;
    padding: 12px 10px;
    border: 1px solid #00000038;
    border-radius: 5px;
}
</style>

<?php
$bkash = '01739277654';
$nagad = '01743905160';
?>

<div class="page_title">
    <div onclick="window.location.href='{{url('recharge')}}'"><img src="{{asset('icons8-left-chevron-25.png')}}" alt=""></div>
    <div>Recharge</div>
    <div></div>
</div>


<div class="card mt-2">
    <div class="card-body">
        <h3 class="header_title" style="margin: 0;color: #fff;">{{price($amount)}}</h3>
        <p class="header_count" style="margin: 0;color: #fff;">Countdown</p>
        <h3 class="header_time" style="margin: 0;color: #fff;"><span id="timer" data-hours="00" data-minutes="10" data-seconds="00"></span></h3>
    </div>
</div>

<form action="{{route('recharge.confirm.submit')}}" method="post">@csrf
    <div style="margin: 0 10px;">
        <div style="width: 170px;margin: auto;overflow: hidden">
            <div style="width: 60%;float: left;font-weight: bold;margin-top: 12px;font-size: 27px;">{{$payment_method->name}}</div>
            <div style="width: 40%;float: left;">
                <img style="width: 60px;margin-top: 6px;" src="{{asset($payment_method->photo)}}" alt="">
            </div>
        </div>


        <div style="overflow: hidden;">
            <ul style="margin: 0;padding: 0;overflow: hidden">
                <li style="display: flex;justify-content: space-between;    display: flex;
    justify-content: space-between;
    padding: 21px 0;
    border-bottom: 1px solid #00000036;">
                    <div style="color: #00000054">Account Method</div>
                    <div>{{$payment_method->name}}&nbsp;&nbsp; <img onclick="copyLink( '{{$payment_method->name}}' )" style="width: 20px" src="https://img.icons8.com/small/16/copy.png" alt=""></div>
                </li>
            </ul>
        </div>

       <div style="overflow: hidden;">
            <ul style="margin: 0;padding: 0;overflow: hidden">
                <li style="display: flex;justify-content: space-between;    display: flex;
    justify-content: space-between;
    padding: 21px 0;
    border-bottom: 1px solid #00000036;">
                    <div style="color: #00000054">Bank Name</div>
                    <div> MoniePoint MFB&nbsp;&nbsp;</div>
                </li>
            </ul>
        </div>

<div style="overflow: hidden;">
            <ul style="margin: 0;padding: 0;overflow: hidden">
                <li style="display: flex;justify-content: space-between;    display: flex;
    justify-content: space-between;
    padding: 21px 0;
    border-bottom: 1px solid #00000036;">
                    <div style="color: #00000054">Acc Name</div>
                    <div> AJA&nbsp;&nbsp;</div>
                </li>
            </ul>
        </div>

        <div style="overflow: hidden;">
            <ul style="margin: 0;padding: 0;overflow: hidden">
                <li style="display: flex;justify-content: space-between;    display: flex;
    justify-content: space-between;
    padding: 21px 0;
    border-bottom: 1px solid #00000036;">
                    <div style="color: #00000054">Account</div>
                    <div>{{$payment_method->address}}&nbsp;&nbsp; <img onclick="copyLink( '{{$payment_method->address}}' )" style="width: 20px" src="https://img.icons8.com/small/16/copy.png" alt=""></div>
                </li>
            </ul>
        </div>

        <div>
            <p style="color: #c32828;font-size: 12px;">***Transfers can only be made to the same type of account. For example, {{$payment_method->name}} only {{$payment_method->name}} -can be transferred to</p>
            <p style="color: #c32828;font-size: 12px;">***The transfer amount must be filled in as you created it, otherwise the deposit will not be successful''</p>
            <h4 style="font-size: 18px;">Please fill in the Sender Account Name after sending money successfully</h4>
            <p style="color: #c32828;font-size: 12px;">Do not cancel the deposit order once the money transfer is complete.</p>
            <br><br>
            <input type="text" placeholder="Enter Sender Name"  name="transaction_id" required>
            <input type="hidden" name="paymethod" value="{{$payment_method->id}}">
            <input type="hidden" name="amount" value="{{$amount}}">
            <div style="text-align: center;margin-top: 30px;">
                <button type="submit">Confirm payment</button>
            </div>
        </div>
    </div>
</form>
@include('alert-message')
<script>
    function copyLink(text)
    {
        const body = document.body;
        const input = document.createElement("input");
        body.append(input);
        input.style.opacity = 0;
        input.value = text.replaceAll(' ', '');
        input.select();
        input.setSelectionRange(0, input.value.length);
        document.execCommand("Copy");
        input.blur();
        input.remove();
        message('Copied success..')
    }
</script>



<script>
    var clock = document.getElementById('timer');

    var hour = 0;
    if (sessionStorage.getItem('hour')){
        hour = sessionStorage.getItem('hour');
    }
    clock.setAttribute('data-hours', hour);

    var minute = 30;
    if (sessionStorage.getItem('minute')){
        minute = sessionStorage.getItem('minute');
    }
    clock.setAttribute('data-minutes', minute);

    var second = 0;
    if (sessionStorage.getItem('second')){
        second = sessionStorage.getItem('second');
    }
    clock.setAttribute('data-seconds', second);
</script>
<script>
    const oneSec = 1000,
        container = document.getElementById('timer');

    let dataHours 	= container.getAttribute('data-hours'),
        dataMinutes = container.getAttribute('data-minutes'),
        dataSeconds = container.getAttribute('data-seconds'),
        timerEnd 		= container.getAttribute('data-timer-end'),
        timerOnEndMsg = "data-timer-end";

    if (dataHours == '' || dataHours == null || dataHours == NaN) {
        dataHours = "0";
    }
    if (dataMinutes == '' || dataMinutes == null || dataMinutes == NaN) {
        dataMinutes = "0";
    }
    if (dataSeconds == '' || dataSeconds == null || dataSeconds == NaN) {
        dataSeconds = "0";
    }

    let hoursSpan = document.createElement('span'),
        minutesSpan = document.createElement('span'),
        secondsSpan = document.createElement('span'),
        separator1 = document.createElement('span'),
        separator2 = document.createElement('span'),
        separatorValue = ":",
        max = 59,
        s = parseInt(dataSeconds) > max ? max : parseInt(dataSeconds),
        m = parseInt(dataMinutes) > max ? max : parseInt(dataMinutes),
        h = parseInt(dataHours);

    secondsSpan.classList.add('time');
    minutesSpan.classList.add('time');
    hoursSpan.classList.add('time');
    separator1.classList.add('separator');
    separator1.textContent = separatorValue;
    separator2.classList.add('separator');
    separator2.textContent = separatorValue;

    checkValue = (value)=>{
        if (value < 10) {
            return "0" + value;
        } else {
            return value;
        }
    }

    hoursSpan.textContent = checkValue(dataHours);
    minutesSpan.textContent = checkValue(dataMinutes);
    secondsSpan.textContent = checkValue(dataSeconds);

    timer = (sv,mv,hv)=>{

        s = parseInt(sv);
        m = parseInt(mv);
        h = parseInt(hv);

        if (s > 0) {
            return s -= 1;
        } else {
            s = max;
            if (m > 0) {
                return m -= 1;
            } else {
                m = max;
                if (h > 0) {
                    return h -= 1;
                }
            }
        }
    }

    finished = ()=>{
        max = 0;
        let timerEnd = container.getAttribute(timerOnEndMsg);
        container.setAttribute(timerOnEndMsg, 'true');
        if (timerEnd == '' || timerEnd == null) {
            sessionStorage.clear()
            container.textContent = "timer-end";
        } else {
            container.textContent = timerEnd;
        }
    }

    counter = setInterval(()=>{

        if (h == 0 && m == 0 && s == 0) {
            clearInterval(counter, finished());
        }

        if (s >= 0) {
            timer(s,m,h);

            sessionStorage.setItem('second', checkValue(s))
            sessionStorage.setItem('minute', checkValue(m))
            sessionStorage.setItem('hour', checkValue(h))

            hoursSpan.textContent   = checkValue(h);
            minutesSpan.textContent = checkValue(m);
            secondsSpan.textContent = checkValue(s);
        }
    }, oneSec);

    let children = [minutesSpan, separator2, secondsSpan];

    for (child of children) {
        container.appendChild(child);
    }

</script>

</body>
</html>
