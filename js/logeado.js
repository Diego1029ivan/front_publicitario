const user = JSON.parse(localStorage.getItem("usuario"));
if (
  user === null ||
  user === undefined ||
  user.perfil.nombres === "ROLE_USER"
) {
  window.location.href = "/front_publicitario/login/index.html";
}
