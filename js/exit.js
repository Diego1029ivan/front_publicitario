let exit = document.getElementById("exit");
exit.addEventListener("click", function () {
  sessionStorage.clear();
  localStorage.clear();
  window.location.href = "/front_publicitario/login/index.html";
});
