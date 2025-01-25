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
    .wrapper {
        background: #0000000f;
    }
</style>
<div class="wrapper home-page">

    <div style="height: 200px;position: relative;background: url('{{asset('v_banner.jpeg')}}');background-size: cover;">
        <div style="display: flex;justify-content: space-between;padding: 15px;">
            <div style="color: #fff;font-size: 18px;" onclick="window.location.href='{{route('dashboard')}}'"><i class="fa fa-chevron-left"></i></div>
            <div style="color: #fff;font-size: 22px;text-shadow: 3px 1px black;">VIP Details</div>
            <div></div>
        </div>
        <div style="height: 340px;">
            <div class="ssdsdsd">
                <h3 style="text-transform: uppercase;font-size: 25px;font-weight: normal">Find A Key</h3>
                <div style="margin-top: 50px;display: flex;justify-content: space-between;">
                    <div>
                        <div>Initial investment price:</div>
                        <div style="margin-top: 10px;color: red">{{price(100)}}</div>
                        <div style="margin-top: 20px;">Cycle: 360day</div>
                    </div>
                    <div>
                        <div>Project size:</div>
                        <div style="margin-top: 10px;">{{price(36000)}}</div>
                        <div style="margin-top: 20px;">Daily dividend</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="ssdsdsd sded" style="position: unset;top: unset;margin: auto;transform: unset;padding-bottom: 100px;">
            <h3 style="text-transform: uppercase;font-size: 18px;font-weight: normal;text-align: center;position:relative;">project introduction</h3>
            <div>
                <h2 style="font-weight: normal;margin-top: 25px;">Description</h2>
                <p style="font-size: 18px;margin-top: 12px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <div>
                <a href="javascript:void(0)" onclick="openPurchaseModal()" style="padding: 8px 0;" class="subscript_btn">Subscribe now</a>
            </div>
        </div>
    </div>


    <div class="purchase_box" style="opacity: 0;z-index: -1;transition: .4s;">
        <div class="purchase_container">
            <div class="closet" onclick="closePurchaseModal()"><i class="fa fa-close"></i></div>
            <div style="display: flex;">
                <div>
                    <img style="width: 60px;" src="{{asset(view_image($vip->photo))}}">
                </div>
                <div><h3 style="margin-top: 7px;">{{$vip->title}}</h3></div>
            </div>

            <div style="width: 70%;margin-left: auto;margin-top: 10px">
                <div style="display: flex;justify-content: space-between;">
                    <div style="color: #00000075">Price</div>
                    <div style="color: red;" id="price">{{price($vip->price)}}</div>
                </div>
                <div style="display: flex;justify-content: space-between;margin-top: 10px;">
                    <div style="color: #00000075">Income</div>
                    <div style="font-weight: 600;color: #000;" id="24Comission">{{price($vip->commission_with_avg_amount / $vip->validity)}}</div>
                </div>
                <div style="display: flex;justify-content: space-between;margin-top: 10px;">
                    <div style="color: #00000075">Time Cycle</div>
                    <div style="font-weight: 600;color: #000;">24 Hour</div>
                </div>
            </div>

            <div style="margin-top: 25px;">
                <div style="margin:auto;width: 200px;">
                    <div style="display: flex;justify-content: space-between">
                        <div class="inDec" id="minus">-</div>
                        <div class="qty_input"><input id="qty" type="text" value="1" style="font-size: 20px;padding-left: 10px"></div>
                        <div class="inDec" id="plus">+</div>
                    </div>
                </div>
            </div>

            <div>
                <button
                    class="subscript_btn"
                    id="con_btn"
                    style="border: none;font-size: 16px;width: 100%;border-top-left-radius: unset;margin-top:8px;"
                    type="button"
                    onclick="submit_purchase()"
                >Purchase Confirm</button>
            </div>
        </div>
    </div>

    <meta name="csrf-token" content="{{csrf_token()}}">
    <input type="hidden" name="id" value="{{$vip->id}}">
    <input type="hidden" name="final_price">
    <input type="hidden" name="final_commission">
    <input type="hidden" name="qty">

    <script>
        var price = '<?= $vip->price; ?>';
        var amount24 = '<?= $vip->commission_with_avg_amount / $vip->validity ?>';

        const plus = document.getElementById('plus');
        const minus = document.getElementById('minus');
        const qty = document.getElementById('qty');

        const input_final_price = document.querySelector('input[name="final_price"]');
        const input_final_commission= document.querySelector('input[name="final_commission"]');
        const input_final_qty = document.querySelector('input[name="qty"]');

        const comission24Element = document.getElementById('24Comission');
        const priceElement = document.getElementById('price');

        var count = qty.value;

        const formatToCurrency = amount => {
            return "Tk. " + parseFloat(amount).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
        };

        plus.addEventListener('click', increment)
        minus.addEventListener('click', decrement)

        var finalPrice,finalCommission;

        function increment(){
            count++;
            qty.value = count;
            finalPrice = price * count;
            finalCommission = amount24 * count;
            priceElement.innerText = formatToCurrency(finalPrice);
            comission24Element.innerText = formatToCurrency(finalCommission);

            input_final_price.value = finalPrice;
            input_final_commission.value = finalCommission;
            input_final_qty.value = count;
        }

        function decrement(){
            count--;

            finalPrice = input_final_price.value - price;
            finalCommission = input_final_commission.value - amount24;

            if (count < 1){
                count = 1;

                finalPrice = price;
                finalCommission = amount24;
            }
            qty.value = count;

            input_final_price.value = finalPrice;
            input_final_commission.value = finalCommission;
            input_final_qty.value = count;

            priceElement.innerText = formatToCurrency(finalPrice);
            comission24Element.innerText = formatToCurrency(finalCommission);
        }

        function closePurchaseModal()
        {
            let layer = document.querySelector('.purchase_box');
            layer.style.opacity = 0;
            layer.style.zIndex = -1;
            layer.style.transision = '.4s';
        }
        function openPurchaseModal()
        {
            let layer = document.querySelector('.purchase_box');
            layer.style.opacity = 1;
            layer.style.zIndex = 1;
            layer.style.transision = '.4s';
        }


        function submit_purchase()
        {
            var id = document.querySelector('input[name="id"]').value;
            var qty = document.querySelector('input[name="qty"]').value;
            var amount = document.querySelector('input[name="final_price"]').value;
            var daily_income = document.querySelector('input[name="final_commission"]').value;

            document.getElementById('con_btn').setAttribute('onclick', '');
            document.getElementById('con_btn').innerHTML = 'Working...';

            var data = {
                id: id,
                qty: qty,
                amount: amount,
                daily_income: daily_income
            }

            fetch('{{route('purchase.confirmation')}}', {
                method: "POST",
                body: JSON.stringify(data),
                headers: {
                    "Content-type": "application/json; charset=UTF-8",
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
                .then(response => response.json())
                .then(res => {
                    if (res.status == true){
                        message('Success');
                        closePurchaseModal()
                    }
                    if (res.status == false){
                        message(res.message);
                    }
                    document.getElementById('con_btn').setAttribute('onclick', 'submit_purchase()');
                    document.getElementById('con_btn').innerHTML = 'Purchase confirm';
                })
                .catch(err => console.log(err));
        }
    </script>

    <!-- menu area -->
    @include('app.layout.manu')
</div>

<!-- === Script Area === -->
<meta name="csrf-token" content="{{csrf_token()}}">
<script src="{{asset('assets/toast.js')}}"></script>
@include('alert-message')
<!-- menu area -->
@include('app.layout.js')
</body>
</html>
