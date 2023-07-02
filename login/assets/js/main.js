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
  const username = document.getElementById("username").value;
  const passaword = document.getElementById("login-pass").value;

  login(username, passaword).then(
    (data) => {
      if (data.mensaje === "Usuario y/o contraseña incorrectos") {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "Usuario y/o contraseña incorrectos",
        });
        return false;
      }

      if (data.mensaje === "Inicio de sesión exitoso") {
        localStorage.setItem("usuario", JSON.stringify(data.usuario));

        if (data.usuario.perfil.nombres === "ROLE_USER") {
          window.location.href = "../cliente/index.php";
        } else if (data.usuario.perfil.nombres === "ROLE_ADMIN") {
          window.location.href = "../index.php";
        } else if (data.usuario.perfil.nombres === "ROLE_SUPADMIN") {
          window.location.href = "../index.php";
        }

        return false;
        // window.location.href = "../index.php";
      }
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Algo salio mal! Intentalo de nuevo",
      });
    },

    (error) => {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Algo salio mal! Intentalo de nuevo",
      });
    }
  );
});

//funcion login fetch api login usuario
const login = async (username, password) => {
  const response = await fetch("http://localhost:75/admin/login", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      username: username,
      contrasena: password,
    }),
  });
  const data = await response.json();
  return data;
};
