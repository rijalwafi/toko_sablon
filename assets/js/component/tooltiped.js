document.addEventListener('DOMContentLoaded', function () {
  var elems = document.querySelectorAll('.tooltipped');
  let options = {
    exitDelay: 1000 ,
    enterDelay: 200,
    margin: 5,
    inDuration: 300,
    outDuration: 550,
    position: 'top',
    transitionMovement: 10,
  };
  M.Tooltip.init(elems, options);
});
