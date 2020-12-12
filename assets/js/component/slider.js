const el = document.addEventListener('DOMContentLoaded', () => {
  const el = document.querySelectorAll('.slider');
  const options = {
    indicators: true,
    height: 400,
    duration: 500,
    interval: 5000,
  };
  M.Slider.init(el, options);
});
