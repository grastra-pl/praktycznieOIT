const player = document.querySelector('.player');
​
document.addEventListener('keydown', function(event) {
  if (event.key === 'ArrowUp') {
    player.style.top = player.offsetTop - 25 + 'px';
  } else if (event.key === 'ArrowDown') {
    player.style.top = player.offsetTop + 25 + 'px';
  } else if (event.key === 'ArrowLeft') {
    player.style.left = player.offsetLeft - 25 + 'px';
  } else if (event.key === 'ArrowRight') {
    player.style.left = player.offsetLeft + 25 + 'px';
  }
});
