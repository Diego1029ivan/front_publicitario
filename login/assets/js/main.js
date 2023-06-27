document.addEventListener("DOMContentLoaded", function () {
  var inputs = document.getElementsByTagName("input");
  for (var i = 0; i < inputs.length; i++) {
    inputs[i].setAttribute("autocomplete", "off");
  }
});

/*=============== SHOW HIDDEN - PASSWORD ===============*/
const showHiddenPass = (loginPass, loginEye) => {
  const input = document.getElementById(loginPass),
    iconEye = document.getElementById(loginEye);

  iconEye.addEventListener("click", () => {
    // Change password to text
    if (input.type === "password") {
      // Switch to text
      input.type = "text";

      // Icon change
      iconEye.classList.add("ri-eye-line");
      iconEye.classList.remove("ri-eye-off-line");
    } else {
      // Change to password
      input.type = "password";

      // Icon change
      iconEye.classList.remove("ri-eye-line");
      iconEye.classList.add("ri-eye-off-line");
    }
  });
};

showHiddenPass("login-pass", "login-eye");

document.getElementById("controlsuario").addEventListener("submit", (event) => {
  event.preventDefault();
  console.log("teste");
  const email = document.getElementById("email").value;
  const passaword = document.getElementById("login-pass").value;

  if (email === "" || passaword === "") {
    alert("Preencha todos os campos");
    return;
  }
  if (email === "admin@gmail.com" && passaword === "admin") {
    window.location.href = "../index.php";
    return;
  }
  if (email !== "admin" || passaword !== "admin") {
    alert("Credenciais inválidas");
    return;
  }
});
