window.addEventListener('resize', function(){
    c.clearRect(0,0,cW,cH);
    clockStart();
});

function clockStart(){
    var canvas = document.querySelector('canvas');

    var c = canvas.getContext('2d');
    canvas.width = 250;
    canvas.height = 200;
    var cW = canvas.width;
    var cH = canvas.height;

    c.strokeStyle = 'Lime';
    c.lineWidth = 10;
    c.lineCap = 'round';
    c.shadowBlur = 20;
    c.shadowColor = c.strokeStyle;

    function degToRad(degree){
        var factor = Math.PI/180;
        return degree * factor;
    }

    function renderTime(){
        var now = new Date();
        var today = now.toDateString();
        var time = now.toLocaleTimeString();
        var hours = now.getHours();
        var minutes = (now.getMinutes() + 5);
        var seconds = (now.getSeconds() + 5);
        var milliseconds = now.getMilliseconds();
        var newSeconds = seconds + (milliseconds/1000);

        //Background
        var gradient = c.createRadialGradient(cW/2, cH/2, 5, cW/2, cH/2, 400);
        gradient.addColorStop(0, 'rgba(0, 200, 0)');
        gradient.addColorStop(1, 'Purple');

        c.fillStyle = gradient;
        c.fillRect(0, 0, cW, cH);

        //Hours
        c.beginPath();
        c.arc(cW/2, cH/2, 80, degToRad(270), degToRad(hours * 15) - 90);
        c.stroke();

        //Minutes
        c.beginPath();
        c.arc(cW/2, cH/2, 60, degToRad(270), degToRad(minutes * 6) - 90);
        c.stroke();

        //Seconds
        c.beginPath();
        c.arc(cW/2, cH/2, 40, degToRad(270), degToRad(newSeconds * 6) - 90);
        c.stroke();

        //Date
        c.font = 'bold 20px Arial';
        c.fillStyle = 'White';
        c.fillText(today, 50, cH/2);

        //Time
        c.font = '17px Arial';
        c.fillStyle = 'White';
        c.fillText(time, 75, 130);
    }
    setInterval(renderTime, 1);
}
clockStart();
