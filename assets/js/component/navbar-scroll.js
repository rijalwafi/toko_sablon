let downScroll = window.pageYOffset;
window.onscroll = () => {
  let upScroll = window.pageYOffset;
  if (downScroll > upScroll) {
    document.getElementById("navbarTop").style.top = "0";
  } else {
    document.getElementById("navbarTop").style.top = "-70px";
  }
  downScroll = upScroll;
};
