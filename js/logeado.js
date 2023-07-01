const user = JSON.parse(localStorage.getItem("usuario"));
if (user === null) {
  window.location.href = "/front_publicitario/login/index.html";
}
