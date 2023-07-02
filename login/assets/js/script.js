const submitBtn = document.querySelector(".submit-btn"),
  phone = document.querySelector("#phone"),
  password = document.querySelector("#user-password"),
  passwordConfirm = document.querySelector("#user-password-confirm"),
  email = document.querySelector("#mail"),
  errorDisplayers = document.getElementsByClassName("error"),
  inputFields = document.querySelectorAll("input"),
  cardContainer = document.querySelector(".card-container"),
  outroOverlay = document.querySelector(".outro-overlay"),
  direccion = document.querySelector("#f-direccion"),
  dni = document.querySelector("#f-dni");

let count = 2;

function onValidation(current, messageString, booleanTest) {
  let message = current;
  message.textContent = messageString;
  booleanTest != 0 ? ++count : count;
}

for (let i = 0; i < inputFields.length; i++) {
  let currentInputField = inputFields[i];
  let currentErrorDisplayer = errorDisplayers[i];

  currentInputField.addEventListener("keyup", (e) => {
    let message = currentErrorDisplayer;
    e.target.value != ""
      ? onValidation(currentErrorDisplayer, "", 0)
      : onValidation(currentErrorDisplayer, "*This field is Required", 0);
  });
}

phone.addEventListener("keyup", (e) => {
  let message = errorDisplayers[3];
  e.target.value == e.target.value.replace(/\D/g, "")
    ? onValidation(message, "", 1)
    : onValidation(message, "*Please enter valid number", 0);
});

email.addEventListener("keyup", (e) => {
  let message = errorDisplayers[2];
  mail.value.includes("@") & mail.value.includes(".com")
    ? onValidation(message, "", 1)
    : onValidation(message, "*Ingrese un correo valido", 0);
});

password.addEventListener("keyup", (e) => {
  let message = errorDisplayers[4];
  password.value.length >= 6
    ? onValidation(message, "", 1)
    : onValidation(message, "Password requerido minimo 6 charecters", 0);
});

passwordConfirm.addEventListener("keyup", (e) => {
  let message = errorDisplayers[5];
  password.value === e.target.value
    ? onValidation(message, "", 1)
    : onValidation(message, "*Password no son iguales", 0);
});
direccion.addEventListener("keyup", (e) => {
  let message = errorDisplayers[6];
  direccion.value.length >= 10
    ? onValidation(message, "", 1)
    : onValidation(message, "Direccion requires minimo 10 charecters", 0);
});
dni.addEventListener("keyup", (e) => {
  let message = errorDisplayers[7];
  dni.value.length >= 9
    ? onValidation(message, "", 1)
    : onValidation(message, "DNI requires minimo 9 charecters", 0);
});

submitBtn.addEventListener("click", (e) => {
  e.preventDefault();
  if (count > 5) {
    usuario = {
      nombre: document.querySelector("#f-name").value,
      apellido: document.querySelector("#l-apellido").value,
      correo: document.querySelector("#mail").value,
      contrasena: document.querySelector("#user-password").value,
      celular: document.querySelector("#phone").value,
      direccion: document.querySelector("#f-direccion").value,
      dni: document.querySelector("#f-dni").value,
      username: document.querySelector("#f-name").value,
      estado: "Activo",
      perfil: {
        idperfil: 1,
      },
    };
    register(usuario).then((data) => {
      console.log(data);
      Swal.fire({
        icon: "success",
        title: "Usuario registrado correctamente",
        showConfirmButton: false,
        timer: 1500,
      }).then(
        () => {
          window.location.href =
            "http://localhost/front_publicitario/login/index.html";
        },
        (error) => {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Algo salio mal!",
          });
        }
      );
    });
  } else {
    for (let i = 0; i < errorDisplayers.length; i++) {
      errorDisplayers[i].textContent = "*This field is Required";
    }
  }
});

const register = async (usuario) => {
  const url = `http://localhost:75/admin/usuario`;
  const resp = await fetch(url, {
    method: "POST",
    body: JSON.stringify(usuario),
    headers: {
      "Content-Type": "application/json",
    },
  });
  const data = await resp.json();
  return data;
};
