document.addEventListener('DOMContentLoaded', function () {
  const side = document.querySelectorAll('.sidenav');
  const options = {
    edge: 'right',
    draggable: true,
    inDuration: 300,
    outDuration: 270,
  };
  M.Sidenav.init(side, options);

  const sidenavAdmin = document.querySelectorAll('.sidenavAdmin');
  const opsi = {
    edge: 'right',
    draggable: false,
    inDuration: 300,
    outDuration: 270,
  };
  M.Sidenav.init(sidenavAdmin, opsi);
});
