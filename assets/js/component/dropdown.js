document.addEventListener('DOMContentLoaded', function () {
  const elems = document.querySelectorAll('.dropdown-trigger');

  const options = {
    alignment: 'left',
    autoTrigger: true,
    constraintWidth: true,
    closeOnClick: true,
    hover: false,
    inDuration: 150,
    outDuration: 250,
    coverTrigger: false,
  };
  M.Dropdown.init(elems, options);
});
document.addEventListener('DOMContentLoaded', function () {
  var elems = document.querySelectorAll('select');
  let options = {};
  M.FormSelect.init(elems, options);
});
