<?php

/**GET DE PRODUCTO*/
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost:75/admin/producto', // Agregué "http://" para especificar el protocolo
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

/**GET DE CATEGORÍA*/
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost:75/admin/categoria', // Agregué "http://" para especificar el protocolo
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
  $decodeCate = json_decode($response);

  if ($decodeCate === null) {
    echo 'Error al decodificar la respuesta JSON.';
  }
}

/**GET DE MARCA*/
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost:75/admin/marca', // Agregué "http://" para especificar el protocolo
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
  $decodeMarca = json_decode($response);

  if ($decodeMarca === null) {
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
          <h1 class="h3 mb-2 text-gray-800">Producto</h1>
          <p class="mb-4">Desarrollo de CRUD para categorías de productos</a>.</p>

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
                      <th>Imagen</th>
                      <th>Precio</th>
                      <th>Marca</th>
                      <th>Categoría</th>
                      <th>Cantidad</th>
                      <th>Fec. Caducidad</th>
                      <th>Estado</th>
                      <th>Acciones</th>
                    </tr>

                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Imagen</th>
                      <th>Precio</th>
                      <th>Marca</th>
                      <th>Categoría</th>
                      <th>Cantidad</th>
                      <th>Fec. Caducidad</th>
                      <th>Estado</th>
                      <th>Acciones</th>


                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($decodedResponse as $producto) { ?>
                      <tr>
                        <td><?= $producto->idProducto ?></td>
                        <td><?= $producto->nombres ?></td>

                        <td>
                          <?php
                          if ($producto->productoImg == "img.png" || $producto->productoImg == "") { ?>
                            <img src="http://localhost:75/admin/uploads/img/img2.png" alt="imagen" width="100px">
                          <?php } else {  ?>
                            <img src="http://localhost:75/admin/uploads/img/<?= $producto->productoImg ?>" alt="imagen" width="100px">
                          <?php } ?>
                        </td>
                        <td><?= $producto->precioProducto ?></td>
                        <td><?= $producto->marca->nombres ?></td>
                        <td><?= $producto->categoria->nombres ?></td>
                        <td><?= $producto->cantidad ?></td>
                        <td><?= $producto->fechaCaducidad ?></td>
                        <td><?php if ($producto->estado == "Activo") { ?>
                            <span class="badge badge-success"><?= $producto->estado ?></span>
                          <?php } else { ?>
                            <span class="badge badge-danger"><?= $producto->estado ?></span>
                          <?php } ?>


                        </td>


                        <td>
                          <a href="#" data-toggle="modal" data-target="#editModal" data-id="<?= $producto->idProducto ?>"><i class="fas fa-edit"></i></a>
                          <a href="#" class="borrarProducto" data-id="<?= $producto->idProducto ?>"><i class="fas fa-trash-alt"></i></a>
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
          <h5 class="modal-title" id="exampleModalLabel">Editar Producto</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="user">
            <div class="form-group">
              <label for="">Nombre</label>
              <input type="text" class="form-control form-control-user" id="editProdName">

            </div>
            <div class="form-group row">

              <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="">ID</label>
                <input type="text" disabled class="form-control form-control-user" id="editProdId">
              </div>
              <div class="col-sm-6">
                <label for="">Cantidad</label>
                <input type="number" class="form-control form-control-user" id="editProdCant">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="">Categoría</label>
                <select name="selecteditCat" id="selecteditCat" class="form-control">
                  <?php foreach ($decodeCate as $cate) { ?>
                    <option value="<?= $cate->idCategoria ?>"><?= $cate->nombres ?></option>

                  <?php } ?>
                </select>
              </div>
              <div class="col-sm-6">
                <label for="">Marca</label>
                <select name="selecteditMarca" id="selecteditMarca" class="form-control">
                  <?php foreach ($decodeMarca as $marca) { ?>
                    <option value="<?= $marca->idMarca ?>"><?= $marca->nombres ?></option>

                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="">Estado</label>
                <select name="select" id="editselect" class="form-control">
                  <option value="Activo">Activo</option>
                  <option value="Inactivo">Inactivo</option>
                </select>
              </div>
              <div class="col-sm-6">
                <label for="">Fecha</label>
                <input type="date" class="form-control form-control-user" id="editProdFecha">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-6">
                <label for="editProdprecio">Precio</label>
                <input type="number" class="form-control form-control-user" id="editProdprecio" min="1">
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
          <h5 class="modal-title" id="exampleModalLabel">Crear Producto</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="user">

            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="">Nombre</label>
                <input type="text" class="form-control form-control-user" id="crearProdName">
              </div>
              <div class="col-sm-6">
                <label for="">Cantidad</label>
                <input type="number" class="form-control form-control-user" id="crearProdCant" min="1">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="">Categoría</label>
                <select name="selectCat" id="selectCat" class="form-control">
                  <?php foreach ($decodeCate as $cate) { ?>
                    <option value="<?= $cate->idCategoria ?>"><?= $cate->nombres ?></option>

                  <?php } ?>
                </select>
              </div>
              <div class="col-sm-6">
                <label for="">Marca</label>
                <select name="selectMarca" id="selectMarca" class="form-control">
                  <?php foreach ($decodeMarca as $marca) { ?>
                    <option value="<?= $marca->idMarca ?>"><?= $marca->nombres ?></option>

                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="">Estado</label>
                <select name="select" id="crearselect" class="form-control">
                  <option value="Activo">Activo</option>
                  <option value="Inactivo">Inactivo</option>
                </select>
              </div>
              <div class="col-sm-6">
                <label for="">Fecha</label>
                <input type="date" class="form-control form-control-user" id="crearProdFecha">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-6">
                <label for="crearProdprecio">Precio</label>
                <input type="number" class="form-control form-control-user" id="crearProdprecio" min="1">
              </div>
              <div class="col-sm-6">
                <label for="crearImagen">Imagen Producto</label>
                <input type="file" class="form-control form-control-user" id="crearImagen">
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
  <script src="js/exit.js"></script>
  <script>
    let productoImg = "";
    $(document).ready(function() {
      $('#editModal').on('show.bs.modal', function(event) {
        let button = $(event.relatedTarget);
        let prodId = button.data('id');

        // Aquí realizas la solicitud para obtener los datos de la categoría con el ID correspondiente
        let apiUrl = 'http://localhost:75/admin/producto/' + prodId;

        let requestOptions = {
          method: 'GET',
          redirect: 'follow'
        };

        fetch(apiUrl, requestOptions)
          .then(response => response.json())
          .then(result => {
            productoImg = result.productoImg;
            $('#editProdId').val(result.idProducto);
            $('#editProdName').val(result.nombres);
            $('#editProdCant').val(result.cantidad);
            $('#selecteditMarca').val(result.marca.idMarca);
            $('#selecteditCat').val(result.categoria.idCategoria);
            $('#editProdFecha').val(result.fechaCaducidad);
            $('#editProdprecio').val(result.precioProducto);
            $('#editselect').val(result.estado);
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

            "idProducto": $('#editProdId').val(),
            "nombres": $('#editProdName').val(),
            "marca": {
              "idMarca": $('#selecteditMarca').val()
            },
            "categoria": {
              "idCategoria": $('#selecteditCat').val()
            },
            "cantidad": $('#editProdCant').val(),
            "precioProducto": $('#editProdprecio').val(),
            "productoImg": productoImg,
            "fechaCaducidad": $('#editProdFecha').val(),
            "estado": $('#editselect').val()



          });
          //console.log(raw)
          let requestOptions = {
            method: 'PUT',
            headers: myHeaders,
            body: raw,
            redirect: 'follow'
          };

          fetch("http://localhost:75/admin/producto", requestOptions)
            .catch(error => console.log('error', error));
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Producto Creado',
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
        text: "Creará la categoría",
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


            "nombres": $('#crearProdName').val(),
            "marca": {
              "idMarca": $('#selectMarca').val(),
            },
            "categoria": {
              "idCategoria": $('#selectCat').val(),
            },
            "cantidad": $('#crearProdCant').val(),
            "fechaCaducidad": $('#crearProdFecha').val(),
            "precioProducto": $('#crearProdprecio').val(),
            "productoImg": "",
            "estado": $('#crearselect').val()
          });
          // console.log(raw)
          var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: raw,
            redirect: 'follow'
          };

          fetch("http://localhost:75/admin/producto", requestOptions)
            .catch(error => console.log('error', error))
            .then(response => response.json())
            .then((data) => {
              console.log(data)
              const archivo = document.getElementById("crearImagen").files[0];
              let formData = new FormData();
              formData.append("archivo", archivo);
              formData.append("id", data.idProducto);
              fetch("http://localhost:75/admin/producto/upload", {
                  method: "POST",
                  body: formData,
                })
                .then(response => response.json())
                .then((data) => {
                  console.log(data)
                  Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Producto creado',
                    showConfirmButton: false,
                    timer: 1400
                  })

                  $('#crearModal').modal('hide');
                  setTimeout(function() {
                    location.reload(); // Recargar la página después de un tiempo de espera
                  }, 1500);

                })
                .catch(error => console.log(error));


            })


        }

      })

    });

    $('.borrarProducto').click(function(event) {


      var prodId = $(this).data('id'); //reconocer el numero directo del id

      // Aquí realizas la solicitud para obtener los datos de la categoría con el ID correspondiente
      var apiUrl = 'http://localhost:75/admin/producto/' + prodId;
      //console.log(apiUrl,categoryId)
      Swal.fire({
        title: 'Estas seguro?',
        text: "Se borrará el producto",
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
            title: 'Producto Borrado',
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