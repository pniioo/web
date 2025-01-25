@extends('app.layout.app')
@section('header_content')
    <style>
        .card-section .card-area {
            background: transparent;
        }
        .modal-backdrop {
            display: none;
        }
        .modal-content {
            border: none;
            box-shadow: 0px 5px 8px #f1000085;
        }
        .wrapper-inline {
            background-color: #614D7C !important;
        }

    </style>

@endsection
@section('app_content')
    <link rel="stylesheet" href="{{asset('app/vip')}}/assets/css/style.css">
    <style>
        .card-section .product-info .price::after {
            display: none;
        }
        .card-section .card-area {
            display: unset;
        }
        .card-area .card-body .card-btn .btn {
            display: block;
            width: 100%;
            border: none;
        }
        .timer {
            font-weight: bolder;
            text-align: center;
            font-size: 18px;
        }
    </style>

    <section class="card-section clearfix">
        <div class="container">
            <div class="card-area">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style="">
                            <img class="card-img-top" style="height: 170px" src="{{view_image($purchase->package->photo)}}" alt="Card image cap">
                            <div class="card-body">
                                <ul>
                                    <li>
                                        <span>{{translator('VIP Name')}}</span>
                                        <span style="color: #614D7C !important;">{{$purchase->package->name}}</span>
                                    </li>
                                    <li>
                                        <span>{{translator('After 24 hours')}}</span>
                                        <span>{{$existingMining ? $existingMining->amount_24_hour : 0}} {{setting('currency')}}</span>
                                    </li>
                                    <li>
                                        <span>{{translator('Income')}}</span>
                                        <span>{{$purchase->package->package_commission}} {{setting('currency')}}</span>
                                    </li>
                                    <li>
                                        <span>{{translator('Total Days')}}</span>
                                        <span>{{$purchase->package->validity}} {{translator('Days')}}</span>
                                    </li>
                                    <li>
                                        <span>{{translator('Expire Date')}}</span>
                                        <span>{{$existingMining ? $existingMining->vip_validity : 'N/A'}}</span>
                                    </li>
                                </ul>
                                <div class="card-btn" style="display: unset">
                                    <div class="timer">
                                        <i class="fa-regular fa-clock"></i>
                                        <span class="counter"
                                              data-end-hours="{{$time['hours']}}"
                                              data-end-minutes="{{$time['minutes']}}"
                                              data-end-seconds="{{$time['seconds']}}"
                                              data-timer-end-message="@if($existingMining && $existingMining->running_status == 'end') VIP validity over @else Mining time stop @endif"
                                        >
                                        <span id="hours">00</span>:<span id="minutes">00</span>:<span id="seconds">00</span>
                                    </span>
                                    </div>
                                    <a href="javascript:void(0)" class="btn btn-primary" style="color: #fff;background: #614D7C !important;"
                                           @if(!empty($existingMining) && $existingMining->running_status == 'start')
                                                style="background: var(--color-success) !important;"
                                           @else
                                                style="background: red !important;"
                                           @endif
                                                id="mining_start_btn"
                                           @if(!empty($existingMining) && $existingMining->running_status == 'stop')
                                                onclick="mining_start('{{$purchase->id}}')"
                                           @elseif(!empty($existingMining) && $existingMining->running_status == 'end')
                                                onclick="message('Mining time is over. Please start again.')"
                                           @elseif(!empty($existingMining) && $existingMining->running_status == 'start')
                                                onclick="message('Mining is running.')"
                                           @else
                                                onclick="mining_start('{{$purchase->id}}')"
                                           @endif
                                    >
                                        @if(!empty($existingMining) && $existingMining->running_status == 'stop')
                                            Stop Mining
                                        @elseif(!empty($existingMining) && $existingMining->running_status == 'end')
                                            End Mining
                                        @elseif(!empty($existingMining) && $existingMining->running_status == 'start')
                                            Running...
                                        @else
                                            Start Now
                                        @endif
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Alys Hidden For Maintains -->
    <svg class="circle__progressbar" width="300" height="0" viewBox="0 0 318 318" xmlns="http://www.w3.org/2000/svg">
        <circle cx="150" cy="150" r="150" class="circle__progressbar__progress"></circle>
        <circle cx="150" cy="150" r="150" class="circle__progressbar__progress" data-circle="progress" id="progress"></circle>
    </svg>

    <script src="{{asset('common')}}/sweetalert2.js"></script>
    <script>
        @if($existingMining)
        const hoursElement = document.querySelector('#hours');
        const minutesElement = document.querySelector('#minutes');
        const secondsElement = document.querySelector('#seconds');
        let counterElement = document.querySelector('.counter');
        const progressbarElement = document.querySelector('[data-circle="progress"]');
        const progressbarTotalLength = progressbarElement.getTotalLength();

        progressbarElement.style.strokeDasharray = progressbarTotalLength;
        progressbarElement.style.strokeDashoffset = progressbarTotalLength;

        // Get the countup time inputs from the Dom
        const countupHours = parseInt((24 - 1) - counterElement.dataset.endHours);
        const countupMinutes = parseInt((60 - 1) - counterElement.dataset.endMinutes);
        const countupSeconds = parseInt((60 - 1) - counterElement.dataset.endSeconds);

        // Get the countdown time inputs from the Dom
        const countdownHours = parseInt(counterElement.dataset.endHours);
        const countdownMinutes = parseInt(counterElement.dataset.endMinutes);
        const countdownSeconds = parseInt(counterElement.dataset.endSeconds);

        // Convert the inputs to milliseconds and set the start date & target date
        const countupTime = (countupHours * 60 * 60 + countupMinutes * 60 + countupSeconds) * 1000;
        const countdownTime = (countdownHours * 60 * 60 + countdownMinutes * 60 + countdownSeconds) * 1000;

        const startDate = new Date().getTime() - countupTime;
        const targetDate = new Date().getTime() + countdownTime;

        // Update the countdown every second
        const countdown = setInterval(() => {
            // Get the current date and time
            const now = new Date().getTime();

            // Calculate the remaining time
            const remainingTime = targetDate - now;
            const elapsedTime = now - startDate;

            // Calculate countdown hours, minutes, and seconds
            const countdownHours = Math.floor(remainingTime / (60 * 60 * 1000));
            const countdownMinutes = Math.floor((remainingTime % (60 * 60 * 1000)) / (60 * 1000));
            const countdownSeconds = Math.floor((remainingTime % (60 * 1000)) / 1000);

            hoursElement.innerText = countdownHours < 10 ? `0${countdownHours}` : countdownHours;
            minutesElement.innerText = countdownMinutes < 10 ? `0${countdownMinutes}` : countdownMinutes;
            secondsElement.innerText = countdownSeconds < 10 ? `0${countdownSeconds}` : countdownSeconds;

            // Calculate seconds
            const countupSeconds = Math.floor(elapsedTime / 1000);

            progressbarElement.style.strokeDashoffset = progressbarTotalLength - (progressbarTotalLength * countupSeconds) / (24 * 60 * 60);

            // Stop the countdown when the target date is reached
            if (remainingTime <= 0) {
                clearInterval(countdown);

                var _data = {
                    mining_id: '{{$existingMining->id}}'
                }

                //Call ajax when 24 hour completed
                fetch('{{url('mining-finish')}}', {
                    method: "POST",
                    body: JSON.stringify(_data),
                    headers: {
                        "Content-type": "application/json; charset=UTF-8",
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                    .then(response => response.json())
                    .then(res => {
                        console.log(res)
                        if (res.status === true){
                            message(res.message)
                            window.location.reload()
                        }else {
                            message(res.message)
                        }
                    })
                    .catch(err => console.log(err));

                document.querySelector('.header__icon').style.background = 'red';
                counterElement.innerText = counterElement.dataset.timerEndMessage;
            }
        }, 1000); // Update every second
        @endif
    </script>
    <script>
        function mining_start(purchase_id)
        {
            let _data = {
                purchase_id
            }

            fetch('{{url('start-mining')}}', {
                method: "POST",
                body: JSON.stringify(_data),
                headers: {
                    "Content-type": "application/json; charset=UTF-8",
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
                .then(response => response.json())
                .then(res => {
                    if (res.status === true){
                        message(res.message)
                        var start_btn = document.getElementById('mining_start_btn')
                        if (res.mining_status === 'stop'){
                            start_btn.setAttribute('onclick', 'mining_start("{{$purchase->id}}")');
                        }else if(res.mining_status === 'start'){
                            start_btn.setAttribute('onclick', 'message("Mining is running.")');
                        }else if(res.mining_status === 'end'){
                            start_btn.setAttribute('onclick', 'message("Mining time is over.")');
                        }else {
                            start_btn.setAttribute('onclick', 'mining_start("{{$purchase->id}}")');
                        }
                        window.location.reload()
                    }else {
                        message(res.message)
                    }
                })
                .catch(err => console.log(err));
        }
    </script>
@endsection
