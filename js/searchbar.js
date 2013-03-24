init();

function init() {
  document.getElementById('search-box').addEventListener('mouseover', handleMouseOver);
  document.getElementById('term').addEventListener('keyup', handleTermKeyUp);
}

function handleMouseOver() {
  this.children[0].focus();
}

function handleTermKeyUp() {
  if (this.value !== '')
    this.className = 'stay';
  else
    this.className = '';
}