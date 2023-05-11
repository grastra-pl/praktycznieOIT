  var color    = ['#ca7','#7ac','#77c','#aac','#a7c','#ac7', "#caa"];
  var stopAngel = [];
  var ctx = canvas.getContext("2d");
  var width = document.getElementById('canvas').width; 
  var center = width/2;    
  var deg = 260;
  var speed = 5;
  var slowDownRand = 0;
  var label =[];

  var isStopped = false;
  var lock = false;
  var id = 1;
  var winner;

  function btn(){
    var idd=0;

    for(let i=0; i<id; i++){
        idd++;
        var lol = document.getElementById(idd.toString()).value;
        label[i]= lol.toString();
      };
      console.log(label);
      var slices = label.length;
      sliceDeg = 360/slices;

    drawImg(sliceDeg);

  } 
  function add() {
    
    if(id==8){
    alert("nie mozesz wiecej");
    }else {
    id++;
    var html = '<div >\
    '+id+'.<input type="text" id="'+id+'">\
    </div>';
    document.getElementById("form").innerHTML+=html;
    }
    }


  function rand(min, max) {
    return Math.random() * (max - min) + min;
  }

  function oddEven(num) {
    return num % 2 ?  true : false;
  }

  function deg2rad(deg){ return deg * Math.PI/180; }

  function drawSlice(index, deg, color){
    var sAngel;
    var current =  (index <= 0) ? deg : stopAngel[index - 1];
    if (oddEven(index)) {
      if (current <= 0) {
        sAngel = Math.abs(Math.floor(260 + sliceDeg + 10 ));      
      } else {
        sAngel = Math.abs(Math.floor(current - sliceDeg + 10));
      }
      current = sAngel;
      stopAngel.push(current);
    } else {
      if (current <= 0) {
        sAngel = Math.abs(Math.floor(260 + sliceDeg - 10));      
      } else {
        sAngel = Math.abs(Math.floor(current - sliceDeg - 10));
      }
      current = sAngel;
      stopAngel.push(current);
    }
    stopAngel.push
    ctx.beginPath();
    console.log(ctx);
    ctx.fillStyle = color;
    ctx.moveTo(center, center);
    ctx.arc(center, center, center, deg2rad(deg), deg2rad(deg+sliceDeg), false);
    ctx.lineTo(center, center);
    ctx.fill();
  }



  function drawText(deg, text) {
    ctx.save();
    ctx.translate(center, center);
    ctx.rotate(deg2rad(deg));
    ctx.textAlign = "right";
    ctx.fillStyle = "#fff";
    ctx.font = '14px';
    ctx.fillText(text, 130, 10);
    ctx.restore();
  }

  function drawImg() {
    var slices = label.length;
    sliceDeg = 360/slices;
    ctx.clearRect(0, 0, width, width);

    for(let i=0; i<label.length; i++){
      drawSlice(i, deg, color[i]);
      drawText(deg+sliceDeg/2, label[i]);
      deg += sliceDeg;
    }
    console.log("Stop Angel " + stopAngel);
  }



  function anim() {
    isStopped = true;
    deg += speed;
    deg %= 360;


    if(!isStopped && speed<3){
      speed = speed+1 * 0.1;
    }

    if(isStopped){
      if(!lock){
        lock = true;
        slowDownRand = rand(0.994, 0.998);
      } 
      speed = speed>0.2 ? speed*=slowDownRand : 0;
    }



    drawImg();
    window.requestAnimationFrame(anim);
  }

  function start() {

    
    var ele = document.getElementById("canvas");
    ele.classList.add("spin-wheel");
    setTimeout(function() {
      ele.classList.remove("spin-wheel");
      deg= stopAngel[Math.floor(Math.random() * label.length)];
      if(label.length>=7){
      winner = Math.abs(Math.floor(((label.length - (deg / sliceDeg)) % label.length)-1));}
      if(label.length<=6){
        winner = Math.abs(Math.floor(((label.length - (deg / sliceDeg)) % label.length)));
        if(winner ==0){
          winner = winner +5;
        }
        if(winner==5 && label.length<4){
          winner++;
        }
      }
      
      console.log(winner);
      drawImg();
      results(winner);
    }, 3000); 

  }

function results(winner){
  var doc = document.getElementById("script");
  doc.innerHTML = '<p>Wygrywa : '+label[winner-1]+'<p> <button onclick="Delete()"> Usun z kola </button>';
}

function Delete(){
  label.splice(winner-1,1);
  console.log(label);
  drawImg();
}
    

