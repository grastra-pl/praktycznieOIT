  const color    = ['#ca7','#7ac','#77c','#aac','#a7c','#ac7', "#caa"];
  const ctx = canvas.getContext("2d");
  const width = document.getElementById('canvas').width; 
  const center = width/2;

  let globalDeg = 0;
  let speed = 5;
  let slowDownRand = 0;
  let label =[];
  let lock = false;
  let id = 1;
  let winner;

  function draw(){
    let idd=0;

    for(let i=0; i<id; i++){
        idd++;
        let lol = document.getElementById(idd.toString()).value;
        label[i]= lol.toString();
      };

    drawImg();
  }

  function calculateSliceDeg() {
    const slices = label.length;
    sliceDeg = 360/slices;
  }

  function add() {
    if(id==8){
      alert("nie mozesz wiecej");
      return;
    }
    id++;
    const html = `<div >${id}.<input type="text" id="${id}"></div>`;
    document.getElementById("form").innerHTML+=html;
  }

  function rand(min, max) {
    return Math.random() * (max - min) + min;
  }

  function oddEven(num) {
    return num % 2 ?  true : false;
  }

  function deg2rad(deg){ return deg * Math.PI/180; }

  function drawSlice(deg, color){
    ctx.beginPath();
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
    calculateSliceDeg();
    drawSlices();
  }

  function showResults() {
    winner = Math.floor(label.length - (globalDeg / sliceDeg) % label.length);
    results();
  }

  function anim() {
    if (speed == 0) {
      showResults();
      return;
    }

    globalDeg += speed;
    globalDeg %= 360;

    if(!lock){
        lock = true;
        slowDownRand = rand(0.994, 0.998);
    } 
    speed = speed>0.2 ? speed*=slowDownRand : 0;

    drawImg();
    window.requestAnimationFrame(anim);
  }

  function drawSlices() {
    ctx.clearRect(0, 0, width, width);
    let deg = globalDeg + 270;
    for(let i=0; i<label.length; i++){
      drawSlice(deg, color[i]);
      drawText(deg+sliceDeg/2, label[i]);
      deg += sliceDeg;
    }
  }

  function start() {
    lock = false;
    speed = 5;
    window.requestAnimationFrame(anim);
  }

function results(){
  var doc = document.getElementById("script");
  doc.innerHTML = `<p>Wygrywa : ${label[winner]}<p> <button onclick="Delete()"> Usun z kola </button>`;
}

function Delete(){
  label.splice(winner,1);
  drawImg();
}
    

