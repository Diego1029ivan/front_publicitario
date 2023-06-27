<?php

/**GET DE PRODUCTO*/
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost:75/admin/compra', // Agregué "http://" para especificar el protocolo
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
          <h1 class="h3 mb-2 text-gray-800">Compras</h1>
          <p class="mb-4">Desarrollo de CRUD para compra de productos</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="categoriaTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Descripción</th>
                      <th>total</th>
                      <th>fecha</th>
                      <th>Comprador</th>
                      <th>DNI</th>
                      <th>Estado</th>
                      <th>Acciones</th>
                    </tr>

                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Descripción</th>
                      <th>total</th>
                      <th>fecha</th>
                      <th>Comprador</th>
                      <th>DNI</th>
                      <th>Estado</th>
                      <th>Acciones</th>

                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($decodedResponse as $compra) { ?>
                      <tr>
                        <td><?= $compra->idCompra ?></td>
                        <td><?= $compra->descripcion ?></td>
                        <td><?= $compra->total ?></td>
                        <td><?= $compra->fecha ?></td>
                        <td><?= $compra->usuario->nombre." ".$compra->usuario->apellido ?></td>
                        <td><?= $compra->usuario->dni ?></td>
                        <td><?= $compra->estado ?></td>


                        <td>
                          <a href="#" data-toggle="modal" data-target="#editModal" data-id="<?= $compra->idCompra ?>"><i class="fas fa-edit"></i></a>
                         
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
          <h5 class="modal-title" id="exampleModalLabel">Editar Estado</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="user">
            
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="">Id</label>
                <input type="text" disabled class="form-control form-control-user" id="editComId">
                <input type="text" hidden class="form-control form-control-user" id="editComIdDistrito">
                <input type="text" hidden class="form-control form-control-user" id="editComIdUsuario">
                <input type="text" hidden class="form-control form-control-user" id="editComDesc">
                <input type="text" hidden class="form-control form-control-user" id="editComFecha">
              </div>
              <div class="col-sm-6">
                <label for="">Comprador</label>
                <input type="text" disabled class="form-control form-control-user" id="editComC" >
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="">Estado</label>
                <select name="select" id="editselect" class="form-control">
                  <option value="Pendiente">Pendiente</option>
                  <option value="Pagado">Pagado</option>
                  <option value="Cancelado">Cancelado</option>
                </select>
              </div>
              <div class="col-sm-6">
                <label for="">Costo de compra</label>
                <input type="number" disabled class="form-control form-control-user"id="editComCosto">
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
    $(document).ready(function() {
      $('#editModal').on('show.bs.modal', function(event) {
        let button = $(event.relatedTarget);
        let comId = button.data('id');

        // Aquí realizas la solicitud para obtener los datos de la categoría con el ID correspondiente
        let apiUrl = 'http://localhost:75/admin/compra/' + comId;

        let requestOptions = {
          method: 'GET',
          redirect: 'follow'
        };

        fetch(apiUrl, requestOptions)
          .then(response => response.json())
          .then(result => {

            $('#editComId').val(result.idCompra);
            $('#editComIdDistrito').val(result.distrito.idDistrito);
            $('#editComIdUsuario').val(result.usuario.idUsuario);
            $('#editComDesc').val(result.descripcion);
            $('#editComFecha').val(result.fecha);
            $('#editComC').val(result.usuario.nombre+" "+result.usuario.apellido);
            $('#editselect').val(result.estado);
            $('#editComCosto').val(result.total);
            //console.log(result)

            
          })
          .catch(error => console.log('error', error));
      });
    });
    $('#guardarBtn').click(function() {
      Swal.fire({
        title: 'Estas seguro?',
        text: "Actualizará el Producto",
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

            
              "idCompra": $('#editComId').val(),
              "descripcion": $('#editComDesc').val(),
              "total": $('#editComCosto').val(),
              "fecha": $('#editComFecha').val(),
              "usuario": {
                  "idUsuario": $('#editComIdUsuario').val()
                  
              },
              "distrito": {
                  "idDistrito": $('#editComIdDistrito').val(),
              },
              "estado": $('#editselect').val(),
          
          
          });
          //console.log(raw)
          let requestOptions = {
            method: 'PUT',
            headers: myHeaders,
            body: raw,
            redirect: 'follow'
          };

          fetch("http://localhost:75/admin/compra", requestOptions)
            .catch(error => console.log('error', error));
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Compra Actualizada',
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