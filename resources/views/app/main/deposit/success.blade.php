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
        font-size: 10px;
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
        margin-top: 4px;
        padding: 14px 0;
        border-radius: 8px;
    }
</style>

<div class="page_title">
    <div></div>
    <div>Recharge Completed</div>
    <div></div>
</div>


<div class="card mt-2">
    <div class="card-body">
        <ul>
            <li style="color: #fff;">Recharge Successfully Completed. Wait for admin approval.</li>
        </ul>
    </div>
</div>
<h3 class="header_time" style="margin: 0;color: #fff; opacity: 0;"><span id="timer" data-hours="00" data-minutes="0" data-seconds="1"></span></h3>

@include('alert-message')
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
            window.location.href='{{route('user.deposit')}}';
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
