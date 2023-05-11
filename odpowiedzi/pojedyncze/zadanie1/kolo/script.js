let container = document.querySelector(".container");
let btn = document.getElementById("spin");
let deg = 0;
let result = document.querySelector(".arrow");

btn.onclick = function () {
  deg = Math.floor(5000 + Math.random() * 5000); 
  container.style.transform = "rotate(" + deg + "deg)"; 
  setTimeout(() => {
    
    
  }, 5000); 
};
let form = document.getElementById("input-form");

form.addEventListener("submit", function(event) {
  event.preventDefault();

  let sectors = document.querySelectorAll(".container div");

  for (let i = 0; i < sectors.length; i++) {
    sectors[i].innerHTML = document.getElementById("one").value;
    document.getElementById("one").value = document.getElementById("two").value;
    document.getElementById("two").value = document.getElementById("three").value;
    document.getElementById("three").value = document.getElementById("four").value;
    document.getElementById("four").value = document.getElementById("five").value;
    document.getElementById("five").value = document.getElementById("six").value;
    document.getElementById("six").value = document.getElementById("seven").value;
    document.getElementById("seven").value = document.getElementById("eight").value;
    document.getElementById("eight").value = "";
  }
});