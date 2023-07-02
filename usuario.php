<?php
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://pub.spring.informaticapp.com:9000/admin/usuario', // Agregué "http://" para especificar el protocolo
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

$curl2 = curl_init();

curl_setopt_array($curl2, array(
  CURLOPT_URL => 'http://pub.spring.informaticapp.com:9000/admin/perfil', // Agregué "http://" para especificar el protocolo
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);
$response2 = curl_exec($curl2);
curl_close($curl);
curl_close($curl2);

if ($response === false) {
  echo 'Error en la solicitud cURL: ' . curl_error($curl);
} else {
  $decodedResponse = json_decode($response);

  if ($decodedResponse === null) {
    echo 'Error al decodificar la respuesta JSON.';
  }
}

if ($response2 === false) {
  echo 'Error en la solicitud cURL: ' . curl_error($curl2);
} else {
  $decodedResponse2 = json_decode($response2);

  if ($decodedResponse2 === null) {
    echo 'Error al decodificar la respuesta JSON.';
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">


  <?php include('componentes/title.php'); ?>


  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include('componentes/sidebar.php'); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php include('componentes/topbar.php'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Usuario</h1>
          <p class="mb-4">Desarrollo de CRUD para usuario</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">

              <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#crearModal">Crear</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="categoriaTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Correo</th>
                      <th>Celular</th>
                      <th>Dirección</th>
                      <th>DNI</th>
                      <th>Rol</th>
                      <th>Estado</th>
                      <th>Acciones</th>

                    </tr>

                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Correo</th>
                      <th>Celular</th>
                      <th>Dirección</th>
                      <th>DNI</th>
                      <th>Rol</th>
                      <th>Estado</th>
                      <th>Acciones</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($decodedResponse as $usuario) { ?>
                      <tr>
                        <td><?= $usuario->idUsuario ?></td>
                        <td><?= $usuario->nombre ?></td>
                        <td><?= $usuario->apellido ?></td>
                        <td><?= $usuario->correo ?></td>
                        <td><?= $usuario->celular ?></td>
                        <td><?= $usuario->direccion ?></td>
                        <td><?= $usuario->dni ?></td>
                        <td><?= $usuario->perfil->nombres ?></td>
                        <td><?= $usuario->estado ?></td>

                        <td>
                          <a href="#" data-toggle="modal" data-target="#editModal" data-id="<?= $usuario->idUsuario ?>"><i class="fas fa-edit"></i></a>
                          <a href="#" class="borrarUsuario" data-id="<?= $usuario->idUsuario ?>"><i class="fas fa-trash-alt"></i></a>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include('componentes/footer.php'); ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php include('componentes/modalSession.php'); ?>

  <!-- Edit Modal-->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar el Usuario</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="user">
            <div class="form-group">

              <label for="">ID</label>
              <input type="text" disabled class="form-control form-control-user" id="editUsuarioId">
            </div>
            <div class="row">
              <div class="form-group col-sm-6">
                <label for="crearUsuarioName">Nombre</label>
                <input type="text" class="form-control form-control-user" id="crearUsuarioName">
              </div>
              <div class="form-group col-sm-6">
                <label for="crearUsuarioapellido">Apellido</label>
                <input type="text" class="form-control form-control-user" id="crearUsuarioapellido">
              </div>
            </div>

            <div class="row">
              <div class="form-group col-sm-6">
                <label for="crearUsuariocorreo">Correo</label>
                <input type="email" class="form-control form-control-user" id="crearUsuariocorreo">
              </div>
              <div class="form-group col-sm-6">
                <label for="crearUsuariocelular">Celular</label>
                <input type="number" class="form-control form-control-user" id="crearUsuariocelular">
              </div>

            </div>
            <div class="form-group">
              <label for="crearUsuariodireccion">Dirreción</label>
              <input type="text" class="form-control form-control-user" id="crearUsuariodireccion">
            </div>

            <div class="form-group">
              <label for="crearUsuarioDNI">DNI</label>
              <input type="text" class="form-control form-control-user" id="crearUsuarioDNI">
            </div>
            <div class="row">
              <div class="form-group col-sm-6">
                <label for="crearRol">Rol</label>
                <select name="select" id="crearRol" class="form-control">
                  <?php foreach ($decodedResponse2 as $rol) { ?>
                    <option value="<?= $rol->idperfil ?>"><?= $rol->nombres ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group col-sm-6">
                <label for="">Estado</label>
                <select name="select" id="crearselect" class="form-control">
                  <option value="Activo">Activo</option>
                  <option value="Inactivo">Inactivo</option>
                </select>
              </div>
            </div>

          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="#" id="guardarBtn">Guardar</a>
        </div>

      </div>
    </div>
  </div>

  <!-- crear Modal-->
  <div class="modal fade" id="crearModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Crear el Usuario</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="user">
            <div class="row">
              <div class="form-group col-sm-6">
                <label for="crearUsuarioName1">Nombre</label>
                <input type="text" class="form-control form-control-user" id="crearUsuarioName1">
              </div>
              <div class="form-group col-sm-6">
                <label for="crearUsuarioapellido1">Apellido</label>
                <input type="text" class="form-control form-control-user" id="crearUsuarioapellido1">
              </div>
            </div>

            <div class="row">
              <div class="form-group col-sm-6">
                <label for="crearUsuariocorreo1">Correo</label>
                <input type="email" class="form-control form-control-user" id="crearUsuariocorreo1">
              </div>
              <div class="form-group col-sm-6">
                <label for="crearUsuariocelular1">Celular</label>
                <input type="number" class="form-control form-control-user" id="crearUsuariocelular1">
              </div>

            </div>
            <div class="form-group">
              <label for="crearUsuariodireccion1">Dirreción</label>
              <input type="text" class="form-control form-control-user" id="crearUsuariodireccion1">
            </div>

            <div class="form-group">
              <label for="crearUsuarioDNI1">DNI</label>
              <input type="text" class="form-control form-control-user" id="crearUsuarioDNI1">
            </div>
            <div class="row">
              <div class="form-group col-sm-6">
                <label for="crearRol">Rol</label>
                <select name="select" id="crearRol1" class="form-control">
                  <?php foreach ($decodedResponse2 as $rol) { ?>
                    <option value="<?= $rol->idperfil ?>"><?= $rol->nombres ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group col-sm-6">
                <label for="">Estado</label>
                <select name="select" id="crearselect1" class="form-control">
                  <option value="Activo">Activo</option>
                  <option value="Inactivo">Inactivo</option>
                </select>
              </div>
            </div>

          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="#" id="crearBtn">Guardar</a>
        </div>

      </div>
    </div>
  </div>


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

  <script>
    $(document).ready(function() {
      $('#editModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var usuarioId = button.data('id');

        // Aquí realizas la solicitud para obtener los datos de la categoría con el ID correspondiente
        var apiUrl = 'http://pub.spring.informaticapp.com:9000/admin/usuario/' + usuarioId;

        var requestOptions = {
          method: 'GET',
          redirect: 'follow'
        };

        fetch(apiUrl, requestOptions)
          .then(response => response.json())
          .then(result => {
            $('#editUsuarioId').val(result.idUsuario);
            $('#crearUsuarioName').val(result.nombre);
            $('#crearUsuarioapellido').val(result.apellido);
            $('#crearUsuariocorreo').val(result.correo);
            $('#crearUsuariocelular').val(result.celular);
            $('#crearUsuariodireccion').val(result.direccion);
            $('#crearUsuarioDNI').val(result.dni);
            $('#crearRol').val(result.perfil.idperfil);
            $('#select').val(result.estado);
          })
          .catch(error => console.log('error', error));
      });
    });
    $('#guardarBtn').click(function() {
      Swal.fire({
        title: 'Estas seguro?',
        text: "Actualizará el usuario",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, actualizo!'
      }).then((result) => {
        if (result.isConfirmed) {

          var myHeaders = new Headers();
          myHeaders.append("Content-Type", "application/json");

          let raw = JSON.stringify({
            "idUsuario": $('#editUsuarioId').val(),
            "nombre": $('#crearUsuarioName').val(),
            "apellido": $('#crearUsuarioapellido').val(),
            "correo": $('#crearUsuariocorreo').val(),
            "celular": $('#crearUsuariocelular').val(),
            "direccion": $('#crearUsuariodireccion').val(),
            "dni": $('#crearUsuarioDNI').val(),
            "perfil": {
              "idperfil": $('#crearRol').val()
            },
            "estado": $('#crearselect').val()
          });
          //console.log(raw)
          var requestOptions = {
            method: 'PUT',
            headers: myHeaders,
            body: raw,
            redirect: 'follow'
          };

          fetch("http://pub.spring.informaticapp.com:9000/admin/usuario", requestOptions)
            .catch(error => console.log('error', error));
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Usuario Actualizado',
            showConfirmButton: false,
            timer: 1400
          })

          $('#editModal').modal('hide');
          setTimeout(function() {
            location.reload(); // Recargar la página después de un tiempo de espera
          }, 1500);

        }

      })

    });

    $('#crearBtn').click(function() {
      Swal.fire({
        title: 'Estas seguro?',
        text: "Actualizará el usuario",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, actualizar!'
      }).then((result) => {
        if (result.isConfirmed) {
          let myHeaders = new Headers();
          myHeaders.append("Content-Type", "application/json");

          let raw = JSON.stringify({

            "nombre": $('#crearUsuarioName1').val(),
            "apellido": $('#crearUsuarioapellido1').val(),
            "correo": $('#crearUsuariocorreo1').val(),
            "celular": $('#crearUsuariocelular1').val(),
            "direccion": $('#crearUsuariodireccion1').val(),
            "dni": $('#crearUsuarioDNI1').val(),
            "perfil": {
              "idperfil": $('#crearRol1').val()
            },

            "estado": $('#crearselect1').val()
          });

          var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: raw,
            redirect: 'follow'
          };

          console.log(raw);

          fetch("http://pub.spring.informaticapp.com:9000/admin/usuario", requestOptions)
            .catch(error => console.log('error', error));
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Usuario Actualizado',
            showConfirmButton: false,
            timer: 1400
          })

          $('#crearModal').modal('hide');
          setTimeout(function() {
            location.reload();
          }, 1500);

        }

      })

    });

    $('.borrarUsuario').click(function(event) {


      var usuarioId = $(this).data('id'); //reconocer el numero directo del id

      // Aquí realizas la solicitud para obtener los datos de los usuarios con el ID correspondiente
      var apiUrl = 'http://pub.spring.informaticapp.com:9000/admin/usuario/' + usuarioId;

      Swal.fire({
        title: 'Estas seguro?',
        text: "Se borrará el usuario",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Borrar!'
      }).then((result) => {
        if (result.isConfirmed) {

          var requestOptions = {
            method: 'DELETE',
            redirect: 'follow'
          };

          fetch(apiUrl, requestOptions)
            .then(response => response.text())
            .catch(error => console.log('error', error));
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Usuario Borrado',
            showConfirmButton: false,
            timer: 1400
          })


          setTimeout(function() {
            location.reload(); // Recargar la página después de un tiempo de espera
          }, 1500);

        }

      })

    });
  </script>
</body>

</html>