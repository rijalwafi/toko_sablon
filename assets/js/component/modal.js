document.addEventListener('DOMContentLoaded', function () {
  const el = document.querySelectorAll('.modal');
  const options = {
    opacity: 0.5,
    inDuration: 250,
    outDuration: 250,
    prefentScrolling: false,
    dismissable: true,
    startingTop: '4%',
    endingTop: '10%',
  };
  M.Modal.init(el, options);
});
