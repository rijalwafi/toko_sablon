document.addEventListener("DOMContentLoaded", function () {
  const obj = document.querySelectorAll(".collapsible");
  const options = {
    accordion: true,
    inDuration: 300,
    outDuration: 300,
  };
  M.Collapsible.init(obj, options);
});
