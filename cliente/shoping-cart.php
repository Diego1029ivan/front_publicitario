
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Shoping Cart</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">
	
<?php include('componentes/header.php'); ?>

	

	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div>
		

	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart" id="cartTable">
								<tbody id="cartBody">
								<tr class="table_head">
									<th class="column-1">Producto</th>
									<th class="column-2"></th>
									<th class="column-3">Precio</th>
									<th class="column-4">Cantidad</th>
									<th class="column-5">Total</th>
								</tr>

								
								</tbody>
							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							

							<div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10"
							id="actualizar-precio">
								Actualizar carrito
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Valor Total
						</h4>

						
						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2" >
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2" id="total">
									$0
								</span>
							</div>
						</div>

						<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Proceder al pago
						</button>
					</div>
				</div>
			</div>
		</div>
	</form>
		
	
		
	<?php include('componentes/footer.php'); ?>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script>
		
		let cartTable = $('#cartTable');
		let cartBody = $('#cartBody');
		let productList = JSON.parse(sessionStorage.getItem('productList')) || [];
		let total = 0;
		productList.forEach(product => {
		let imagen=''
		if(product.imagen== "img.png" || product.imagen == ""){
			imagen = 'http://localhost:75/admin/uploads/img/img2.png';
		}else{
			imagen = 'http://localhost:75/admin/uploads/img/'+product.imagen;
		}
		let row = $(`<tr class="table_row" ></tr>`);
		row.attr('data-product-id', product.id);
		let imageCell = $('<td class="column-1"></td>');
		// Crea y agrega el contenido para la celda de imagen aquí
		// Por ejemplo:
		let image = $(`<div class="how-itemcart1">
						<img src="${imagen}" alt="IMG">
					</div>`);
		// image.attr('src', product.image);
		imageCell.append(image);
		row.append(imageCell);

		let nameCell = $('<td class="column-2"></td>');
		nameCell.text(product.name);
		row.append(nameCell);

		let priceCell = $('<td class="column-3"></td>');
		priceCell.text('$ ' + product.price.toFixed(2));
		row.append(priceCell);

		let quantityCell = $('<td class="column-4"></td>');
		// Crea y agrega el contenido para la celda de cantidad aquí
		// Por ejemplo:
		let quantityInput = $(`<div class="wrap-num-product flex-w m-l-auto m-r-0">
								<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
									<i class="fs-16 zmdi zmdi-minus"></i>
								</div>

								<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product2" value="${product.quantity}">

								<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
									<i class="fs-16 zmdi zmdi-plus"></i>
								</div>
							</div>`);
		
		quantityCell.append(quantityInput);
		row.append(quantityCell);

		let totalCell = $('<td class="column-5 subtotal-cell"></td>');
		totalCell.text('$ ' + (product.price * product.quantity).toFixed(2));
		row.append(totalCell);
		total += product.price * product.quantity;
		
		cartBody.append(row);
		$('#total').text('$' + total.toFixed(2));
		});
		
		
		$(document).on('click', '#actualizar-precio', function() {
        // Obtener las filas de la tabla
        let rows = $('#cartBody').find('tr');

        // Recorrer las filas de la tabla
        let totalPrice = 0;
        let productList = JSON.parse(sessionStorage.getItem('productList')) || [];
        rows.each(function() {
            let row = $(this);
			let productId = row.data('product-id');
			if(productId){
					
					let quantity = parseInt(row.find('.num-product').val());
					let price = parseFloat(row.find('.column-3').text().replace('$', ''));
					//console.log(productId, quantity, price, "prueba si existe");
					console.log(productId)
					// Verificar si la cantidad es un número válido
					if (!isNaN(quantity)) {
						//console.log("si existe catida")
						// Actualizar la cantidad en el sessionStorage
						let product = productList.find(product => product.id == productId);
						if (product) {
							//console.log("si existe")
							product.quantity = quantity;
							//console.log("si existe");
						}

						// Calcular el subtotal del producto y sumarlo al precio total
						let subtotal = price * quantity;
						row.find('.subtotal-cell').text('$ ' + subtotal.toFixed(2));
						totalPrice += subtotal;
					} else {
						//console.log("Error: La cantidad no es un número válido.");
					}
				}
				});

				// Guardar la lista de productos actualizada en el sessionStorage
				sessionStorage.setItem('productList', JSON.stringify(productList));

				// Actualizar el precio total en el elemento <span>
				$('#total').text('$ ' + totalPrice.toFixed(2));
				
            	// Obtener el elemento <ul> del carrito
				let cartItemsList = document.querySelector('.header-cart-wrapitem');

				// Limpiar el contenido actual del carrito
				cartItemsList.innerHTML = '';

				// Recorrer la lista de productos en el sessionStorage
				//let productList = JSON.parse(sessionStorage.getItem('productList')) || [];
				productList.forEach(product => {
				// Crear un nuevo elemento <li> para cada producto
				let item = document.createElement('li');
				item.classList.add('header-cart-item');

				// Crear y agregar el contenido del producto al <li> 
				// Aquí puedes personalizar cómo se muestra cada producto en el carrito
				item.innerHTML = `
					<div class="header-cart-item-img">
					<img src="${product.image}" alt="Product Image">
					</div>
					<div class="header-cart-item-txt">
					<a href="#" class="header-cart-item-name">${product.name}</a>
					<span class="header-cart-item-info">
						${product.quantity} x $${product.price.toFixed(2)}
					</span>
					</div>
				`;

				// Agregar el elemento <li> al carrito
				cartItemsList.appendChild(item);
				});
				swal("Actualizando","el carrito fue actualizado!", "success");
    });
	
	
	</script>

</body>
</html>