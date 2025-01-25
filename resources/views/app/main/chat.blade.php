<!DOCTYPE html>
<html lang="en">
<head>
    @include('app.layout.css')
</head>

<body>
@include('app.layout.loading')
<div class="wrapper home-page" style="background: #008aff12">
    <!-- notice section -->
    <section class="header-section" style="height: 200px;background: url('{{asset('pcb')}}/v3/img/chat-bg.807a7483.png');background-size: cover;">
        <div class="container">
            <div class="header-area">
                <div></div>
                <div class="title-area">
                    <div class="announce">
                        <h3>Chat </h3>
                    </div>
                </div>
                <div></div>
            </div>
        </div>
        <section style="background: #fff;
    margin-top: 115px;
    height: 100px;
    border-radius: 12px 12px 0 0;
    padding: 14px 0;">
            <div class="container">
                <h2 class="sec_title">Channel</h2>
                <div style="margin-top: 15px;font-weight: bold">
                    <img style="width: 30px" src="{{asset('pcb')}}/v3/img/rate.png">&nbsp;&nbsp;&nbsp; FFST GROUP INC CHANNEL
                </div>
            </div>
        </section>
    </section>


    <!--  Custom Tab  -->
    <section class="tb_section" style="background: #fff;margin-top:60px;">
        <!--  Custom Tab Menu -->
        <div class="Tb_menu">
            <ul>
                <li class="Tm_active" onclick="TbActiveFunction(this, 1)">Message</li>
                <li onclick="TbActiveFunction(this, 2)">Group</li>
                <li onclick="TbActiveFunction(this, 3)">Recharged</li>
                <li onclick="TbActiveFunction(this, 4)">Not Recharged</li>
            </ul>
        </div>

        <!--  Custom Tab Container -->
        <div class="Tb_content1" style="padding: 0 10px;">
            1
        </div>
        <div class="Tb_content2" style="padding: 0 10px;display: none">
            2
        </div>
        <div class="Tb_content3" style="padding: 0 10px;display: none">
            3
        </div>
        <div class="Tb_content4" style="padding: 0 10px;display: none">
            4
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
        let Tb_content4 = document.querySelector('.Tb_content4');

        for (let i = 0; i < li.length; i++) {
            if (li[i].classList.contains('Tm_active')) {
                li[i].classList.remove('Tm_active');
            }
        }
        _this.classList.add('Tm_active');

        if (tab_number === 1) {
            Tb_content2.style.display = 'none';
            Tb_content3.style.display = 'none';
            Tb_content4.style.display = 'none';
            Tb_content1.style.display = 'block';
        } else if (tab_number === 2) {
            Tb_content1.style.display = 'none';
            Tb_content3.style.display = 'none';
            Tb_content4.style.display = 'none';
            Tb_content2.style.display = 'block';
        } else if (tab_number === 3) {
            Tb_content1.style.display = 'none';
            Tb_content2.style.display = 'none';
            Tb_content4.style.display = 'none';
            Tb_content3.style.display = 'block';
        } else if (tab_number === 4) {
            Tb_content1.style.display = 'none';
            Tb_content2.style.display = 'none';
            Tb_content3.style.display = 'none';
            Tb_content4.style.display = 'block';
        }
    }
</script>

</body>
</html>
