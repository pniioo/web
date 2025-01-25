<!DOCTYPE html>
<html lang="en">
<head>
    @include('app.layout.css')
</head>

<body>
@include('app.layout.loading')
<div class="wrapper home-page" style="background: #008aff12">
    <!-- notice section -->
    <section class="header-section" style="height: 200px;background: #00d5ff59">
        <div class="container">
            <div class="header-area">
                <div></div>
                <div class="title-area">
                    <div class="announce">
                        <h3>Group Purchase</h3>
                    </div>
                </div>
                <div class="balance-area">
                    <h4 style="font-weight: normal"></h4>
                </div>
            </div>
        </div>
    </section>
    <section class="header-section" style="height: 150px !important;background: #fff">
        <div class="sec_area">
            <div class="sec_banner">
                <img src="{{asset('pcb')}}/v3/img/组 9773_副本_副本1.png">
            </div>

            <div class="three_item">
                <div>
                    <img src="{{asset('pcb')}}/v3/img/buy-status1.png">
                    <div style="color: #000; font-weight: bold;font-size: 14px;margin-top: 8px;">Process</div>
                </div>
                <div>
                    <img src="{{asset('pcb')}}/v3/img/buy-status2.png">
                    <div style="color: #000; font-weight: bold;font-size: 14px;margin-top: 8px;">Failed to join</div>
                </div>
                <div>
                    <img src="{{asset('pcb')}}/v3/img/buy-status3.png">
                    <div style="color: #000; font-weight: bold;font-size: 14px;margin-top: 8px;">Success to join</div>
                </div>
            </div>
        </div>
    </section>


    <!--  Custom Tab  -->
    <section class="tb_section">
        <!--  Custom Tab Menu -->
        <div class="Tb_menu">
            <ul>
                <li class="Tm_active" onclick="TbActiveFunction(this, 1)">Exercises</li>
                <li onclick="TbActiveFunction(this, 2)">Zone A</li>
                <li onclick="TbActiveFunction(this, 3)">Zone B</li>
            </ul>
        </div>

        <?php
            $coming_soon = \App\Models\Coming::get();
        ?>

        <!--  Custom Tab Container -->
        <div class="Tb_content1" style="padding: 0 10px;">
            <div style="overflow: hidden;">
                @foreach($coming_soon as $element)
                    @if($element->step == 'zone_a')
                        <div class="vip_item" style="background: url('{{asset(view_image($element->photo))}}');background-size: cover;">
                            <div class="vipTitle">
                                <div class="priceBedge">
                                    {{env('APP_NAME')}} {{price($element->price)}}
                                </div>
                                <div class="comming_desc" style="display: flex;justify-content: space-between;">
                                    <div>
                                        <div class="rate">
                                            @for($i=3;$i<=5;$i++)
                                                <img style="width:15px" src="{{asset('pcb')}}/v3/img/rate.png">
                                            @endfor
                                        </div>
                                        <small>Coming soon</small>
                                    </div>
                                    <div>
                                        <i class="fa fa-arrow-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="Tb_content2" style="display: none">
            @foreach($coming_soon as $element)
                @if($element->step == 'zone_b')
                    <div class="vip_item" style="background: url('{{asset(view_image($element->photo))}}');background-size: cover;">
                        <div class="vipTitle">
                            <div class="priceBedge">
                                {{env('APP_NAME')}} {{price($element->price)}}
                            </div>
                            <div class="comming_desc" style="display: flex;justify-content: space-between;">
                                <div>
                                    <div class="rate">
                                        @for($i=3;$i<=5;$i++)
                                            <img style="width:15px" src="{{asset('pcb')}}/v3/img/rate.png">
                                        @endfor
                                    </div>
                                    <small>Coming soon</small>
                                </div>
                                <div>
                                    <i class="fa fa-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="Tb_content3" style="display: none">
            @foreach($coming_soon as $element)
                @if($element->step == 'zone_c')
                    <div class="vip_item" style="background: url('{{asset(view_image($element->photo))}}');background-size: cover;">
                        <div class="vipTitle">
                            <div class="priceBedge">
                                {{env('APP_NAME')}} {{price($element->price)}}
                            </div>
                            <div class="comming_desc" style="display: flex;justify-content: space-between;">
                                <div>
                                    <div class="rate">
                                        @for($i=3;$i<=5;$i++)
                                            <img style="width:15px" src="{{asset('pcb')}}/v3/img/rate.png">
                                        @endfor
                                    </div>
                                    <small>Coming soon</small>
                                </div>
                                <div>
                                    <i class="fa fa-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>

    <!-- menu area -->
    @include('app.layout.manu')
</div>

<!-- === Script Area === -->
@include('app.layout.js')

<script>
    function TbActiveFunction(_this, tab_number) {
        let li = document.querySelector('.Tb_menu').querySelectorAll('li');
        let Tb_content1 = document.querySelector('.Tb_content1');
        let Tb_content2 = document.querySelector('.Tb_content2');
        let Tb_content3 = document.querySelector('.Tb_content3');

        for (let i = 0; i < li.length; i++) {
            if (li[i].classList.contains('Tm_active')) {
                li[i].classList.remove('Tm_active');
            }
        }
        _this.classList.add('Tm_active');

        if (tab_number === 1) {
            Tb_content2.style.display = 'none';
            Tb_content3.style.display = 'none';
            Tb_content1.style.display = 'block';
        } else if (tab_number === 2) {
            Tb_content1.style.display = 'none';
            Tb_content3.style.display = 'none';
            Tb_content2.style.display = 'block';
        } else if (tab_number === 3) {
            Tb_content1.style.display = 'none';
            Tb_content2.style.display = 'none';
            Tb_content3.style.display = 'block';
        }
    }
</script>

</body>
</html>
