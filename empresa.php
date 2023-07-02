<?php
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost:75/admin/empresa', // Agregué "http://" para especificar el protocolo
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
  CURLOPT_URL => 'http://localhost:75/admin/perfil', // Agregué "http://" para especificar el protocolo
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
          <h1 class="h3 mb-2 text-gray-800">Empresa</h1>
          <p class="mb-4">Desarrollo de CRUD para Empresa</a>.</p>

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
                      <th>Dirección</th>
                      <th>Telefono</th>
                      <th>Correo</th>
                      <th>Ruc</th>
                      <th>Estado</th>
                      <th>Acciones</th>
                    </tr>

                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Dirección</th>
                      <th>Telefono</th>
                      <th>Correo</th>
                      <th>Ruc</th>
                      <th>Estado</th>
                      <th>Acciones</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($decodedResponse as $empresa) { ?>
                      <tr>
                        <td><?= $empresa->idEmpresa ?></td>
                        <td><?= $empresa->nombre ?></td>
                        <td><?= $empresa->direccion ?></td>
                        <td><?= $empresa->telefono ?></td>
                        <td><?= $empresa->correo ?></td>
                        <td><?= $empresa->ruc ?></td>
                        <td><?= $empresa->estado ?></td>

                        <td>
                          <a href="#" data-toggle="modal" data-target="#editModal" data-id="<?= $empresa->idEmpresa ?>"><i class="fas fa-edit"></i></a>
                          <a href="#" class="borrarUsuario" data-id="<?= $empresa->idEmpresa ?>"><i class="fas fa-trash-alt"></i></a>
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
  <!-- Logout Modal-->
  <?php include('componentes/modalSession.php'); ?>

  <!-- Edit Modal-->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Empresa</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="user">
            <div class="form-group">

              <label for="">ID</label>
              <input type="text" disabled class="form-control form-control-user" id="editEmpresaId">
            </div>
            <div class="row">
              <div class="form-group col-sm-6">
                <label for="crearEmpresaNombre1">Nombre</label>
                <input type="text" class="form-control form-control-user" id="crearEmpresaNombre1">
              </div>
              <div class="form-group col-sm-6">
                <label for="crearEmpresaDireccion1">Direccion</label>
                <input type="text" class="form-control form-control-user" id="crearEmpresaDireccion1">
              </div>
            </div>

            <div class="row">
              <div class="form-group col-sm-6">
                <label for="crearEmpresaTelefono1">Telefono</label>
                <input type="text" class="form-control form-control-user" id="crearEmpresaTelefono1">
              </div>
              <div class="form-group col-sm-6">
                <label for="crearEmpresaCorreo1">Correo</label>
                <input type="text" class="form-control form-control-user" id="crearEmpresaCorreo1">
              </div>
            </div>
            <div class="row ">
              <div class="form-group col-sm-6">
                <label for="crearEmpresaRuc1">Ruc</label>
                <input type="text" class="form-control form-control-user" id="crearEmpresaRuc1">
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
          <h5 class="modal-title" id="exampleModalLabel">Crear Empresa</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="user">
            <div class="row">
              <div class="form-group col-sm-6">
                <label for="crearEmpresaNombre">Nombre</label>
                <input type="text" class="form-control form-control-user" id="crearEmpresaNombre">
              </div>
              <div class="form-group col-sm-6">
                <label for="crearEmpresaDireccion">Direccion</label>
                <input type="text" class="form-control form-control-user" id="crearEmpresaDireccion">
              </div>
            </div>

            <div class="row">
              <div class="form-group col-sm-6">
                <label for="crearEmpresaTelefono">Telefono</label>
                <input type="text" class="form-control form-control-user" id="crearEmpresaTelefono">
              </div>
              <div class="form-group col-sm-6">
                <label for="crearEmpresaCorreo">Correo</label>
                <input type="text" class="form-control form-control-user" id="crearEmpresaCorreo">
              </div>
            </div>
            <div class="row ">
              <div class="form-group col-sm-6">
                <label for="crearEmpresaRuc">Ruc</label>
                <input type="text" class="form-control form-control-user" id="crearEmpresaRuc">
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
        var apiUrl = 'http://localhost:75/admin/empresa/' + usuarioId;

        var requestOptions = {
          method: 'GET',
          redirect: 'follow'
        };

        fetch(apiUrl, requestOptions)
          .then(response => response.json())
          .then(result => {
            $('#editEmpresaId').val(result.idEmpresa);
            $('#crearEmpresaNombre1').val(result.nombre);
            $('#crearEmpresaDireccion1').val(result.direccion);
            $('#crearEmpresaTelefono1').val(result.telefono);
            $('#crearEmpresaCorreo1').val(result.correo);
            $('#crearEmpresaRuc1').val(result.ruc);
            $('#crearselect1').val(result.estado);
          })
          .catch(error => console.log('error', error));
      });
    });
    $('#guardarBtn').click(function() {
      Swal.fire({
        title: 'Estas seguro?',
        text: "Actualizará Empresa",
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
            "idEmpresa": $('#editEmpresaId').val(),
            "nombre": $('#crearEmpresaNombre1').val(),
            "direccion": $('#crearEmpresaDireccion1').val(),
            "telefono": $('#crearEmpresaTelefono1').val(),
            "correo": $('#crearEmpresaCorreo1').val(),
            "ruc": $('#crearEmpresaRuc1').val(),
            "estado": $('#crearselect1').val()
          });
          //console.log(raw)
          var requestOptions = {
            method: 'PUT',
            headers: myHeaders,
            body: raw,
            redirect: 'follow'
          };

          fetch("http://localhost:75/admin/empresa", requestOptions)
            .catch(error => console.log('error', error));
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Empresa Actualizado',
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
        text: "Actualizará Empresa",
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
            "nombre": $('#crearEmpresaNombre').val(),
            "direccion": $('#crearEmpresaDireccion').val(),
            "telefono": $('#crearEmpresaTelefono').val(),
            "correo": $('#crearEmpresaCorreo').val(),
            "ruc": $('#crearEmpresaRuc').val(),
            "estado": $('#crearselect').val()
          });

          var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: raw,
            redirect: 'follow'
          };

          fetch("http://localhost:75/admin/empresa", requestOptions)
            .catch(error => console.log('error', error));
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Empresa Actualizado',
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
      var apiUrl = 'http://localhost:75/admin/empresa/' + usuarioId;

      Swal.fire({
        title: 'Estas seguro?',
        text: "Se borrará Empresa",
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
            title: 'Empresa Borrado',
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