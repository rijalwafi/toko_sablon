let navigation = document.getElementById('sidebarList');
let lists = navigation.querySelectorAll('.navigation > ul > li');
for (let i = 0; i < lists.length; i++) {
  lists[i].addEventListener('click', function () {
    let current = document.getElementsByClassName('active');
    current[0].className = current[0].className.replace('active', '');
    this.className += 'active';
  });
}
