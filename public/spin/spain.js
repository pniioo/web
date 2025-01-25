var spinBtn = document.querySelector('#spin-btn')
var spinArrow = document.querySelector('#spin_round')

var spinerImage = document.getElementById('spinerImage');

let value = Math.ceil(Math.random() * 3000);
function spinToWin() {
    spinerImage.style.transition = '5s';
    spinerImage.style.transform = 'rotate('+ value +'deg)';

    for (let i=0; i<value;i++){
        if (value >= 380){
            value = value - 360
        }else {

        }
    }

    /** Start Calculate Amount Using Rotate DEG**/
    var amount = 0
    if (value >= 22 && value <= 60){
        amount = 90
    }else if(value >= 61 && value <= 100){
        amount = 80
    }else if(value >= 101 && value <= 140){
        amount = 70
    }else if(value >= 141 && value <= 180){
        amount = 60
    }else if(value >= 181 && value <= 220){
        amount = 50
    }else if(value >= 221 && value <= 260){
        amount = 40
    }else if(value >= 261 && value <= 300){
        amount = 30
    }else if(value >= 301 && value <= 340){
        amount = 20
    }else if(value >= 341 && value <= 380){
        amount = 10
    }
    console.log(amount)
    /** End Calculate Amount **/
}

spinArrow.addEventListener('click', function(){
    spinToWin()
})
