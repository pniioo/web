<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}} | User-Registration-Verification-code</title>
    <style>
        .searchbox-wrap {
            display: flex;
            width: 100%;
            margin-top: 8%;
            margin-left: auto;
            margin-right: auto;
        }
        .searchbox-wrap input {
            flex: 1;
            padding: 30px 6px;
            font-size: 1.1em;
            -webkit-border-top-left-radius: 25px;
            -webkit-border-bottom-left-radius: 25px;
            -moz-border-radius-topleft: 25px;
            -moz-border-radius-bottomleft: 25px;
            border-top-left-radius: 25px;
            border-bottom-left-radius: 25px;
            box-shadow: none;
            border: none;
            box-shadow: 2px 4px 6px rgba(0,0,0,0.19);
        }
        .searchbox-wrap button {
            padding-right: 10px;
            background-color: #fff;
            -webkit-border-top-right-radius: 25px;
            -webkit-border-bottom-right-radius: 25px;
            -moz-border-radius-topright: 25px;
            -moz-border-radius-bottomright: 25px;
            border-top-right-radius: 25px;
            border-bottom-right-radius: 25px;
            box-shadow: 5px 4px 6px rgba(0,0,0,0.19);
            border: none;
            cursor: pointer;
        }
        .searchbox-wrap button span {
            margin-left: 0;
            padding: 10px 20px;
            font-size: 0.9em;
            text-transform: uppercase;
            font-weight: 300;
            color: #fff;
            background-color: #F54E59;
            border-radius: 20px;
            box-shadow: 2px 4px 6px rgba(0,0,0,0.19);
        }
        .searchbox-wrap button span:hover {
            background-color: #d6121f;
            box-shadow: 2px 2px 4px rgba(0,0,0,0.19);
        }
        .searchbox-wrap a {
            width: 100%;
            text-align: center;
        }


        .form-row.no-padding {
            margin: 15px 0;
        }
        section {
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(36,242,84,0.7819502801120448) 0%, rgba(12,223,207,1) 0%, rgba(1,168,79,1) 62%);
        }
        .form-row-group.with-icons .form-row i {
            padding: 0 9px;
        }
        .form-row-group.with-icons .form-row .form-element {
            padding: 0 30px;
        }
        .form-element {
            display: block;
            border: 1px solid #000;
            padding: 2px 3px;
            border-radius: 6px;
        }

    </style>
</head>
<body>
<section style="text-align: center">
    <img src="{{asset('app')}}/img/content/onboard2.png">
</section>
<div class="msg" style="margin-top: 10px;margin-left: 10px; display: none">
    <small style="color: red">The code us invalid</small>
</div>
<div class="msg" style="margin-top: 10px;margin-left: 10px;">
    <small style="color: red" id="timer" data-hours="0" data-minutes="2" data-seconds="0"></small>
</div>
<div class="searchbox-wrap" style="margin-top: 10px">
    <input type="text" placeholder="Email Verification Code" name="code">
    <button onclick="verify()"><span>Verify</span> </button>
</div>

<div class="searchbox-wrap">
    <a href="{{route('register', $user->id)}}">
        <button style="box-shadow:none; margin-left:0;"><span style="background: #4ef567">Back Registration</span> </button>
    </a>
</div>
<script>
    var code = '{{$user->code}}';
    var id = '{{$user->id}}';
    function verify()
    {
        var inputCode = document.querySelector('input[name="code"]');
        if (inputCode.value === code){
            window.location.href = '{{url('verified-login')}}'+'/'+id+'/'+code
            document.querySelector('.msg').style.display = 'none'
        }else
        {
            document.querySelector('.msg').style.display = 'block'
        }
    }
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
            container.textContent = "timer-end";
            //time is finished
            window.location.href = '{{url('user-verification_time_out')}}'+'/'+id
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

    // let children = [hoursSpan, separator1, minutesSpan, separator2, secondsSpan];
    let children = [minutesSpan, separator2, secondsSpan];

    for (child of children) {
        container.appendChild(child);
    }

</script>
</body>
</html>
