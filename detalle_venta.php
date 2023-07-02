<?php
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://pub.spring.informaticapp.com:9000/admin/venta', // Agregué "http://" para especificar el protocolo
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
  CURLOPT_URL => 'http://pub.spring.informaticapp.com:9000/admin/distrito', // Agregué "http://" para especificar el protocolo
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
          <h1 class="h3 mb-2 text-gray-800">Venta</h1>
          <p class="mb-4">Desarrollo de CRUD Venta</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">


            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="categoriaTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Celular</th>
                      <th>Correo</th>
                      <th>Direccion</th>
                      <th>Distrito</th>
                      <th>Provincia</th>
                      <th>Departamento</th>
                      <th>Venta</th>
                      <th>Comprovante</th>
                      <th>fechaHora</th>
                      <th>Total</th>
                      <th>Estado</th>
                      <th>Acciones</th>
                    </tr>

                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Celular</th>
                      <th>Correo</th>
                      <th>Direccion</th>
                      <th>Distrito</th>
                      <th>Provincia</th>
                      <th>Departamento</th>
                      <th>Venta</th>
                      <th>Comprovante</th>
                      <th>fechaHora</th>
                      <th>Total</th>
                      <th>Estado</th>
                      <th>Acciones</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($decodedResponse as $venta) { ?>
                      <tr>
                        <td><?= $venta->idVenta ?></td>
                        <td><?= $venta->usuario->nombre ?></td>
                        <td><?= $venta->usuario->celular ?></td>
                        <td><?= $venta->usuario->correo ?></td>
                        <td><?= $venta->usuario->direccion ?></td>
                        <td><?= $venta->distrito->nombre ?></td>
                        <td><?= $venta->distrito->provincia->nombre ?></td>
                        <td><?= $venta->distrito->provincia->departamento->nombre ?></td>
                        <td><?= $venta->tipoVenta ?></td>
                        <td><?= $venta->tipoComprobante ?></td>
                        <td><?= $venta->fechaHora ?></td>
                        <td><?= $venta->total ?></td>
                        <td><?= $venta->estado ?></td>
                        <td>
                          <a href="#" data-toggle="modal" data-target="#editModal" data-id="<?= $venta->idVenta ?>"><i class="fas fa-edit"></i></a>
                          <!-- <a href="#" class="borrarUsuario" data-id="<?= $venta->idVenta ?>"><i class="fas fa-trash-alt"></i></a> -->
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
          <h5 class="modal-title" id="exampleModalLabel">Editar Venta</h5>
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
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="">Estado</label>
                <select name="editselect" id="editselect" class="form-control">
                  <option value="Pendiente">Pendiente</option>
                  <option value="Pagado">Pagado</option>
                  <option value="Cancelado">Cancelado</option>
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
    let tipoVenta = "";
    let iddistroto = 0;
    let tipoComprobante = "";
    let fechaHora = "";
    let total = "";
    let idUsuario = "";
    $(document).ready(function() {
      $('#editModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var usuarioId = button.data('id');

        // Aquí realizas la solicitud para obtener los datos de la categoría con el ID correspondiente
        var apiUrl = 'http://pub.spring.informaticapp.com:9000/admin/venta/' + usuarioId;

        var requestOptions = {
          method: 'GET',
          redirect: 'follow'
        };

        fetch(apiUrl, requestOptions)
          .then(response => response.json())
          .then(result => {
            tipoVenta = result.tipoVenta;
            idUsuario = result.usuario.idUsuario;
            iddistroto = result.distrito.idDistrito;
            tipoComprobante = result.tipoComprobante;
            fechaHora = result.fechaHora;
            total = result.total;
            $('#editUsuarioId').val(result.idVenta);
            $('#editselect').val(result.estado);
          })
          .catch(error => console.log('error', error));
      });
    });
    $('#guardarBtn').click(function() {
      Swal.fire({
        title: 'Estas seguro?',
        text: "Actualizará La Venta",
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
            "idVenta": $('#editUsuarioId').val(),
            "usuario": {
              "idUsuario": idUsuario
            },
            "distrito": {
              "idDistrito": iddistroto
            },
            "tipoVenta": tipoVenta,
            "tipoComprobante": tipoComprobante,
            "fechaHora": fechaHora,
            "total": total,
            "estado": $('#editselect').val()
          });
          //console.log(raw)
          var requestOptions = {
            method: 'PUT',
            headers: myHeaders,
            body: raw,
            redirect: 'follow'
          };
          console.log(raw);
          fetch("http://pub.spring.informaticapp.com:9000/admin/venta", requestOptions)
            .catch(error => console.log('error', error));
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Venta Actualizado',
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
  </script>
</body>

</html>