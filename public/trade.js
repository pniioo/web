function randomIntFromInterval(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min)
}
const count = n => String((Math.abs(n))).length;

document.getElementById('btcPercent').innerText = "+2."+randomIntFromInterval(11, 99)+"%";
document.getElementById('bnbPercent').innerText = "+1."+randomIntFromInterval(11, 99)+"%";
document.getElementById('trxPercent').innerText = "+2."+randomIntFromInterval(11, 99)+"%";
document.getElementById('ethPercent').innerText = "+2."+randomIntFromInterval(11, 99)+"%";
document.getElementById('dogePercent').innerText = "+0."+randomIntFromInterval(11, 99)+"%";
document.getElementById('xrpPercent').innerText = "+1."+randomIntFromInterval(11, 99)+"%";
document.getElementById('sqlPercent').innerText = "-0."+randomIntFromInterval(11, 99)+"%";
document.getElementById('ltcPercent').innerText = "-3."+randomIntFromInterval(11, 99)+"%";
document.getElementById('adaPercent').innerText = "+2."+randomIntFromInterval(11, 99)+"%";
document.getElementById('linkPercent').innerText = "+3."+randomIntFromInterval(11, 99)+"%";
document.getElementById('dotPercent').innerText = "+1."+randomIntFromInterval(11, 99)+"%";
document.getElementById('avaxPercent').innerText = "+2."+randomIntFromInterval(11, 99)+"%";
document.getElementById('bchPercent').innerText = "-3."+randomIntFromInterval(11, 99)+"%";
document.getElementById('xmrPercent').innerText = "+2."+randomIntFromInterval(11, 99)+"%";


//Down background
document.getElementById('sqlPercent').parentElement.style.background = '#f85963';
document.getElementById('sqlPercent').style.background = '#f85963';

document.getElementById('ltcPercent').parentElement.style.background = '#f85963';
document.getElementById('ltcPercent').style.background = '#f85963';

document.getElementById('bchPercent').parentElement.style.background = '#f85963';
document.getElementById('bchPercent').style.background = '#f85963';

//Start btc
function btc()
{
    // var amount = 31046.9900; //31046 separate two
    var firstAmount = 31;
    var secondAmount = Math.floor(146 + Math.random() * 999);
    var afterPoint = Math.floor(1000 + Math.random() * 9000);

    var countDigit = count(secondAmount);
    if(countDigit > 3){
        secondAmount = Math.floor(146 + Math.random() * 999);
        var countDigit2 = count(secondAmount);
        if(countDigit2 > 3){
            secondAmount = Math.floor(146 + Math.random() * 999);
            var countDigit3 = count(secondAmount);
            if(countDigit3 > 3){
                secondAmount = Math.floor(146 + Math.random() * 999);
            }
        }
    }

    document.getElementById('btcAmount').innerText = firstAmount + "" + secondAmount + "." + afterPoint;
}
setInterval(function (){
    btc()
}, (Math.floor(Math.random() * 10) + 1)+'000')

function btc_percent(){
    document.getElementById('btcPercent').innerText = "+2."+randomIntFromInterval(11, 99)+"%";
}

setInterval(function (){
    btc_percent()
}, randomIntFromInterval(5, 15)+'000')
//end btc



//Start BNB
function bnb()
{
    var firstAmount = 2;
    var secondAmount = Math.floor(11 + Math.random() * 99);
    var afterPoint = Math.floor(1000 + Math.random() * 9000);

    var countDigit = count(secondAmount);
    if(countDigit > 2){
        secondAmount = Math.floor(11 + Math.random() * 99);
        var countDigit2 = count(secondAmount);
        if(countDigit2 > 2){
            secondAmount = Math.floor(11 + Math.random() * 99);
            var countDigit3 = count(secondAmount);
            if(countDigit3 > 2){
                secondAmount = Math.floor(11 + Math.random() * 99);
            }
        }
    }

    document.getElementById('bnbAmount').innerText = firstAmount + "" + secondAmount + "." + afterPoint;
}
setInterval(function (){
    bnb()
}, (Math.floor(Math.random() * 10) + 1)+'000')

function bnb_percent(){
    document.getElementById('bnbPercent').innerText = "+1."+randomIntFromInterval(11, 99)+"%";
}

setInterval(function (){
    bnb_percent()
}, randomIntFromInterval(5, 15)+'000')
//end BNb






//Start trx
function trx()
{
    var firstAmount = 0;
    var afterPoint = Math.floor(1000 + Math.random() * 9000);

    document.getElementById('trxAmount').innerText = firstAmount + "." + afterPoint;
}
setInterval(function (){
    trx()
}, (Math.floor(Math.random() * 10) + 1)+'000')

function trx_percent(){
    document.getElementById('trxPercent').innerText = "+2."+randomIntFromInterval(11, 99)+"%";
}

setInterval(function (){
    trx_percent()
}, randomIntFromInterval(5, 15)+'000')
//end trx






//Start eth
function eth()
{
    // var amount = 31046.9900; //31046 separate two
    var firstAmount = 19;
    var secondAmount = Math.floor(14 + Math.random() * 99);
    var afterPoint = Math.floor(1000 + Math.random() * 9000);

    var countDigit = count(secondAmount);
    if(countDigit > 2){
        secondAmount = Math.floor(11 + Math.random() * 99);
        var countDigit2 = count(secondAmount);
        if(countDigit2 > 2){
            secondAmount = Math.floor(11 + Math.random() * 99);
            var countDigit3 = count(secondAmount);
            if(countDigit3 > 2){
                secondAmount = Math.floor(11 + Math.random() * 99);
            }
        }
    }

    document.getElementById('ethAmount').innerText = firstAmount + "" + secondAmount + "." + afterPoint;
}
setInterval(function (){
    eth()
}, (Math.floor(Math.random() * 10) + 1)+'000')

function eth_percent(){
    document.getElementById('ethPercent').innerText = "+2."+randomIntFromInterval(11, 99)+"%";
}

setInterval(function (){
    eth_percent()
}, randomIntFromInterval(7, 15)+'000')
//end trx




//Start doge
function doge()
{
    var firstAmount = 0;
    var afterPoint = Math.floor(1000 + Math.random() * 9000);

    document.getElementById('dogeAmount').innerText = firstAmount + "." + afterPoint;
}
setInterval(function (){
    doge()
}, (Math.floor(Math.random() * 10) + 1)+'000')

function doge_percent(){
    document.getElementById('dogePercent').innerText = "+0."+randomIntFromInterval(11, 99)+"%";
}

setInterval(function (){
    doge_percent()
}, randomIntFromInterval(7, 30)+'000')
//end trx



//Start xrp
function xrp()
{
    var firstAmount = 0;
    var afterPoint = Math.floor(1000 + Math.random() * 9000);

    document.getElementById('xrpAmount').innerText = firstAmount + "." + afterPoint;
}
setInterval(function (){
    xrp()
}, (Math.floor(Math.random() * 10) + 1)+'000')

function xrp_percent(){
    document.getElementById('xrpPercent').innerText = "+1."+randomIntFromInterval(11, 99)+"%";
}

setInterval(function (){
    xrp_percent()
}, randomIntFromInterval(5, 15)+'000')
//end xrp




//Start sql
function sql()
{
    var firstAmount = 1;
    var secondAmount = Math.floor(1 + Math.random() * 9);
    var afterPoint = Math.floor(1000 + Math.random() * 9000);

    var countDigit = count(secondAmount);
    if(countDigit > 1){
        secondAmount = Math.floor(1 + Math.random() * 9);
        var countDigit2 = count(secondAmount);
        if(countDigit2 > 1){
            secondAmount = Math.floor(1 + Math.random() * 9);
            var countDigit3 = count(secondAmount);
            if(countDigit3 > 1){
                secondAmount = Math.floor(1 + Math.random() * 9);
            }
        }
    }

    document.getElementById('sqlAmount').innerText = firstAmount + "" + secondAmount + "." + afterPoint;
}
setInterval(function (){
    sql()
}, (Math.floor(Math.random() * 10) + 1)+'000')

function sql_percent(){
    document.getElementById('sqlPercent').parentElement.style.background = '#f85963';
    document.getElementById('sqlPercent').style.background = '#f85963';

    document.getElementById('sqlPercent').innerText = "-0."+randomIntFromInterval(11, 99)+"%";
}

setInterval(function (){
    sql_percent()
}, randomIntFromInterval(5, 15)+'000')
//end sql







//Start LTC
function ltc()
{
    var firstAmount = 10;
    var secondAmount = Math.floor(1 + Math.random() * 9);
    var afterPoint = Math.floor(1000 + Math.random() * 9000);

    var countDigit = count(secondAmount);
    if(countDigit > 1){
        secondAmount = Math.floor(1 + Math.random() * 9);
        var countDigit2 = count(secondAmount);
        if(countDigit2 > 1){
            secondAmount = Math.floor(1 + Math.random() * 9);
            var countDigit3 = count(secondAmount);
            if(countDigit3 > 1){
                secondAmount = Math.floor(1 + Math.random() * 9);
            }
        }
    }

    document.getElementById('ltcAmount').innerText = firstAmount + "" + secondAmount + "." + afterPoint;
}
setInterval(function (){
    ltc()
}, (Math.floor(Math.random() * 10) + 1)+'000')

function ltc_percent(){
    document.getElementById('ltcPercent').innerText = "-3."+randomIntFromInterval(11, 99)+"%";
}

setInterval(function (){
    ltc_percent()
}, randomIntFromInterval(5, 15)+'000')
//end LTC


//Start ada
function ada()
{
    var firstAmount = 0;
    var afterPoint = Math.floor(1000 + Math.random() * 9000);

    document.getElementById('adaAmount').innerText = firstAmount + "." + afterPoint;
}
setInterval(function (){
    ada()
}, (Math.floor(Math.random() * 10) + 1)+'000')

function ada_percent(){
    document.getElementById('adaPercent').innerText = "+2."+randomIntFromInterval(11, 99)+"%";
}

setInterval(function (){
    ada_percent()
}, randomIntFromInterval(7, 30)+'000')
//end ada



//Start link
function link()
{
    var firstAmount = 6;
    var afterPoint = Math.floor(1000 + Math.random() * 9000);

    document.getElementById('linkAmount').innerText = firstAmount + "." + afterPoint;
}
setInterval(function (){
    link()
}, (Math.floor(Math.random() * 10) + 1)+'000')

function link_percent(){
    document.getElementById('linkPercent').innerText = "+3."+randomIntFromInterval(11, 99)+"%";
}

setInterval(function (){
    link_percent()
}, randomIntFromInterval(7, 30)+'000')
//end link



//Start dot
function dot()
{
    var firstAmount = 5;
    var afterPoint = Math.floor(1000 + Math.random() * 9000);

    document.getElementById('dotAmount').innerText = firstAmount + "." + afterPoint;
}
setInterval(function (){
    dot()
}, (Math.floor(Math.random() * 10) + 1)+'000')

function dot_percent(){
    document.getElementById('dotPercent').innerText = "+1."+randomIntFromInterval(11, 99)+"%";
}

setInterval(function (){
    dot_percent()
}, randomIntFromInterval(5, 15)+'000')
//end dot



//Start avax
function avax()
{
    var firstAmount = 13;
    var afterPoint = Math.floor(1000 + Math.random() * 9000);

    document.getElementById('avaxAmount').innerText = firstAmount + "." + afterPoint;
}
setInterval(function (){
    avax()
}, (Math.floor(Math.random() * 10) + 1)+'000')

function avax_percent(){
    document.getElementById('avaxPercent').innerText = "+2."+randomIntFromInterval(11, 99)+"%";
}

setInterval(function (){
    avax_percent()
}, randomIntFromInterval(5, 15)+'000')
//end avax



//Start BCH
function bch()
{
    var firstAmount = 28;
    var secondAmount = Math.floor(1 + Math.random() * 9);
    var afterPoint = Math.floor(1000 + Math.random() * 9000);

    var countDigit = count(secondAmount);
    if(countDigit > 1){
        secondAmount = Math.floor(1 + Math.random() * 9);
        var countDigit2 = count(secondAmount);
        if(countDigit2 > 1){
            secondAmount = Math.floor(1 + Math.random() * 9);
            var countDigit3 = count(secondAmount);
            if(countDigit3 > 1){
                secondAmount = Math.floor(1 + Math.random() * 9);
            }
        }
    }

    document.getElementById('bchAmount').innerText = firstAmount + "" + secondAmount + "." + afterPoint;
}
setInterval(function (){
    bch()
}, (Math.floor(Math.random() * 10) + 1)+'000')

function bch_percent(){
    document.getElementById('bchPercent').innerText = "-3."+randomIntFromInterval(11, 99)+"%";
}

setInterval(function (){
    bch_percent()
}, randomIntFromInterval(5, 15)+'000')
//end bch





//Start BNB
function xmr()
{
    var firstAmount = 16;
    var secondAmount = Math.floor(1 + Math.random() * 9);
    var afterPoint = Math.floor(1000 + Math.random() * 9000);

    var countDigit = count(secondAmount);
    if(countDigit > 1){
        secondAmount = Math.floor(1 + Math.random() * 9);
        var countDigit2 = count(secondAmount);
        if(countDigit2 > 1){
            secondAmount = Math.floor(1 + Math.random() * 9);
            var countDigit3 = count(secondAmount);
            if(countDigit3 > 1){
                secondAmount = Math.floor(1 + Math.random() * 9);
            }
        }
    }

    document.getElementById('xmrAmount').innerText = firstAmount + "" + secondAmount + "." + afterPoint;
}
setInterval(function (){
    xmr()
}, (Math.floor(Math.random() * 10) + 1)+'000')

function xmr_percent(){
    document.getElementById('xmrPercent').innerText = "+2."+randomIntFromInterval(11, 99)+"%";
}

setInterval(function (){
    xmr_percent()
}, randomIntFromInterval(5, 15)+'000')
//end BNb
