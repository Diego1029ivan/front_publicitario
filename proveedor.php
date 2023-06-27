<?php
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost:75/admin/proveedor', // Agregué "http://" para especificar el protocolo
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);

if ($response === false) {
  echo 'Error en la solicitud cURL: ' . curl_error($curl);
} else {
  $decodedResponse = json_decode($response);

  if ($decodedResponse === null) {
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
          <h1 class="h3 mb-2 text-gray-800">Proveedor</h1>
          <p class="mb-4">Desarrollo de CRUD para proveedor de productos</a>.</p>

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
                      <th>N. Compañía</th>
                      <th>Dirección</th>
                      <th>Teléfono</th>
                      <th>Correo</th>
                      <th>Representante</th>
                      <th>Estado</th>
                      <th># Tarjeta</th>
                      <th>RUC</th>
                      <th>Acciones</th>

                    </tr>

                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>N. Compañía</th>
                      <th>Dirección</th>
                      <th>Teléfono</th>
                      <th>Correo</th>
                      <th>Representante</th>
                      <th>Estado</th>
                      <th># Tarjeta</th>
                      <th>RUC</th>
                      <th>Acciones</th>

                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($decodedResponse as $proveedor) { ?>
                      <tr>
                        <td><?= $proveedor->idProveedor ?></td>
                        <td><?= $proveedor->nomCompania ?></td>
                        <td><?= $proveedor->direccion ?></td>
                        <td><?= $proveedor->telefono ?></td>
                        <td><?= $proveedor->correo ?></td>
                        <td><?= $proveedor->nombre ?></td>
                        <td><?= $proveedor->estado ?></td>
                        <td><?= $proveedor->ntarjeta ?></td>
                        <td><?= $proveedor->ruc ?></td>


                        <td>
                          <a href="#" data-toggle="modal" data-target="#editModal" data-id="<?= $proveedor->idProveedor ?>"><i class="fas fa-edit"></i></a>
                          <a href="#" class="borrarProv" data-id="<?= $proveedor->idProveedor ?>"><i class="fas fa-trash-alt"></i></a>
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
      <!-- Footer -->
      <?php include('componentes/footer.php'); ?>
      <!-- End of Footer -->
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
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Modal-->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar el proveedor</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="user">
            <div class="form-group">
              <label for="">N. Compañía</label>
              <input type="text" class="form-control form-control-user" id="editProvNameC">

            </div>


            <div class="form-group row">

              <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="">ID</label>
                <input type="text" disabled class="form-control form-control-user" id="editProvID">
              </div>
              <div class="col-sm-6">
                <label for="">Dirección</label>
                <input type="text" class="form-control form-control-user" id="editProvDirec">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="">Teléfono</label>
                <input type="number" class="form-control form-control-user" id="editProvTelef">
              </div>
              <div class="col-sm-6">
                <label for="">Correo</label>
                <input type="email" class="form-control form-control-user" id="editProvCorreo">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="">Representante</label>
                <input type="text" class="form-control form-control-user" id="editProvRepre">
              </div>
              <div class="col-sm-6">
                <label for="">Estado</label>
                <select name="select" id="editselect" class="form-control">
                  <option value="Activo">Activo</option>
                  <option value="Inactivo">Inactivo</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="">Tarjeta</label>
                <input type="text" class="form-control form-control-user" id="editProvTarjeta">
              </div>
              <div class="col-sm-6">
                <label for="">RUC</label>
                <input type="text" class="form-control form-control-user" id="editProvRuc">
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
          <h5 class="modal-title" id="exampleModalLabel">Crear la Proveedor</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="user">

            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="">N. Compañía</label>
                <input type="text" class="form-control form-control-user" id="crearProvNameC">
              </div>
              <div class="col-sm-6">
                <label for="">Dirección</label>
                <input type="text" class="form-control form-control-user" id="crearProvDirec">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="">Teléfono</label>
                <input type="number" class="form-control form-control-user" id="crearProvTelef">
              </div>
              <div class="col-sm-6">
                <label for="">Correo</label>
                <input type="email" class="form-control form-control-user" id="crearProvCorreo">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="">Representante</label>
                <input type="text" class="form-control form-control-user" id="crearProvRepre">
              </div>
              <div class="col-sm-6">
                <label for="">Estado</label>
                <select name="select" id="crearselect" class="form-control">
                  <option value="Activo">Activo</option>
                  <option value="Inactivo">Inactivo</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="">Tarjeta</label>
                <input type="text" class="form-control form-control-user" id="crearProvTarjeta">
              </div>
              <div class="col-sm-6">
                <label for="">RUC</label>
                <input type="text" class="form-control form-control-user" id="crearProvRuc">
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
        let button = $(event.relatedTarget);
        let provId = button.data('id');

        // Aquí realizas la solicitud para obtener los datos de la categoría con el ID correspondiente
        let apiUrl = 'http://localhost:75/admin/proveedor/' + provId;

        let requestOptions = {
          method: 'GET',
          redirect: 'follow'
        };

        fetch(apiUrl, requestOptions)
          .then(response => response.json())
          .then(result => {
            $('#editProvID').val(result.idProveedor);
            $('#editProvNameC').val(result.nomCompania);
            $('#editProvDirec').val(result.direccion);
            $('#editProvTelef').val(result.telefono);
            $('#editProvCorreo').val(result.correo);
            $('#editProvRepre').val(result.nombre);
            $('#editselect').val(result.estado);
            $('#editProvTarjeta').val(result.ntarjeta);
            $('#editProvRuc').val(result.ruc);
          })
          .catch(error => console.log('error', error));
      });
    });
    $('#guardarBtn').click(function() {
      Swal.fire({
        title: 'Estas seguro?',
        text: "Actualizará el proveedor",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, actualizar!'
      }).then((result) => {
        if (result.isConfirmed) {

          var myHeaders = new Headers();
          myHeaders.append("Content-Type", "application/json");

          var raw = JSON.stringify({
            "idProveedor": $('#editProvID').val(),
            "nomCompania": $('#editProvNameC').val(),
            "direccion": $('#editProvDirec').val(),
            "telefono": $('#editProvTelef').val(),
            "correo": $('#editProvCorreo').val(),
            "nombre": $('#editProvRepre').val(),
            "estado": $('#editselect').val(),
            "ntarjeta": $('#editProvTarjeta').val(),
            "ruc": $('#editProvRuc').val(),
          });
          //console.log(raw)
          var requestOptions = {
            method: 'PUT',
            headers: myHeaders,
            body: raw,
            redirect: 'follow'
          };

          fetch("http://localhost:75/admin/proveedor", requestOptions)
            .catch(error => console.log('error', error));
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Proveedor Actualizado',
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
        text: "Creará un nuevo Proveedor",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, crear!'
      }).then((result) => {
        if (result.isConfirmed) {

          var myHeaders = new Headers();
          myHeaders.append("Content-Type", "application/json");

          var raw = JSON.stringify({

            "nomCompania": $('#crearProvNameC').val(),
            "direccion": $('#crearProvDirec').val(),
            "telefono": $('#crearProvTelef').val(),
            "correo": $('#crearProvCorreo').val(),
            "nombre": $('#crearProvRepre').val(),
            "estado": $('#crearselect').val(),
            "ntarjeta": $('#crearProvTarjeta').val(),
            "ruc": $('#crearProvRuc').val(),

          });
          //console.log(raw)
          var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: raw,
            redirect: 'follow'
          };

          fetch("http://localhost:75/admin/proveedor", requestOptions)
            .catch(error => console.log('error', error));
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Proveedor Nuevo',
            showConfirmButton: false,
            timer: 1400
          })

          $('#crearModal').modal('hide');
          setTimeout(function() {
            location.reload(); // Recargar la página después de un tiempo de espera
          }, 1500);

        }

      })

    });

    $('.borrarProv').click(function(event) {


      var provId = $(this).data('id'); //reconocer el numero directo del id

      // Aquí realizas la solicitud para obtener los datos de la categoría con el ID correspondiente
      var apiUrl = 'http://localhost:75/admin/proveedor/' + provId;
      //console.log(apiUrl,categoryId)
      Swal.fire({
        title: 'Estas seguro?',
        text: "Se borrará el proveedor",
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
            title: 'Proveedor Borrado',
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