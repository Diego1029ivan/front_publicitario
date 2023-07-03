
(function ($) {
    "use strict";
    // Obtener la lista de productos del sessionStorage
    let productList = JSON.parse(sessionStorage.getItem('productList')) || [];
    document.addEventListener('DOMContentLoaded', function() {
        // Obtener el elemento <ul> del carrito
        let cartItemsList = document.querySelector('.header-cart-wrapitem');
      
        // Limpiar el contenido actual del carrito
        cartItemsList.innerHTML = '';
        
        // Obtener la lista de productos del sessionStorage
        let productList = JSON.parse(sessionStorage.getItem('productList')) || [];
        
        // Recorrer la lista de productos y agregarlos al carrito
        productList.forEach(product => {
        let imagen=''
        let idProd = product.id
        // Crear un nuevo elemento <li> para cada producto
        let item = document.createElement('li');
        item.classList.add('header-cart-item');
        item.classList.add('flex-w');
        item.classList.add('flex-t');
        item.classList.add('m-b-12');
        item.setAttribute('data-product-id',idProd)
        // data-product-id="${idProd}"
        if(product.imagen == "img.png" || product.imagen == ""){
        imagen = 'http://localhost:75/admin/uploads/img/img2.png';
        }else{
        imagen = 'http://localhost:75/admin/uploads/img/'+product.imagen;
        }
        // Crear y agregar el contenido del producto al <li> 
        // Aquí puedes personalizar cómo se muestra cada producto en el carrito
          item.innerHTML = `
         
            <div class="header-cart-item-img block3-pic hov-img0">
              <img src="${imagen}" alt="Product Image">
              <a href="#" class="block3-btn flex-c-m stext-103 cl2  bg0 bor2 hov-btn4 p-lr-15 trans-04 js-borrar-prod">
                    x
                  </a>
            </div>
            <div class="header-cart-item-txt p-t-8">
              <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">${product.name}</a>
              <span class="header-cart-item-info">
                ${product.quantity} x $${product.price.toFixed(2)}
              </span>
            </div>
            
          `;
      
          // Agregar el elemento <li> al carrito
          cartItemsList.appendChild(item);
        });
      });
      updateNotificationCount();
            updateTotalPrice();
    // Recorrer la lista de productos y agregar los elementos li al carrito
    productList.forEach(function(productName) {
        let cartItem = `
        <li class="header-cart-item flex-w flex-t m-b-12">
            <div class="header-cart-item-img block3-pic hov-img0">
            <img src="images/item-cart-01.jpg" alt="IMG">
                <a href="#" class="block3-btn flex-c-m stext-103 cl2  bg0 bor2 hov-btn4 p-lr-15 trans-04 js-borrar-prod">
                        x
                </a>
            </div>
            <div class="header-cart-item-txt p-t-8">
            <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                ${productName}
            </a>
            <span class="header-cart-item-info">
                1 x $19.00
            </span>
            </div>
        </li>
        `;
        $('.header-cart-wrapitem').append(cartItem);
    });
    updateNotificationCount();
    /*[ Load page ]
    ===========================================================*/
    $(".animsition").animsition({
        inClass: 'fade-in',
        outClass: 'fade-out',
        inDuration: 1500,
        outDuration: 800,
        linkElement: '.animsition-link',
        loading: true,
        loadingParentElement: 'html',
        loadingClass: 'animsition-loading-1',
        loadingInner: '<div class="loader05"></div>',
        timeout: false,
        timeoutCountdown: 5000,
        onLoadEvent: true,
        browser: [ 'animation-duration', '-webkit-animation-duration'],
        overlay : false,
        overlayClass : 'animsition-overlay-slide',
        overlayParentElement : 'html',
        transition: function(url){ window.location.href = url; }
    });
    
    /*[ Back to top ]
    ===========================================================*/
    var windowH = $(window).height()/2;

    $(window).on('scroll',function(){
        if ($(this).scrollTop() > windowH) {
            $("#myBtn").css('display','flex');
        } else {
            $("#myBtn").css('display','none');
        }
    });

    $('#myBtn').on("click", function(){
        $('html, body').animate({scrollTop: 0}, 300);
    });


    /*==================================================================
    [ Fixed Header ]*/
    var headerDesktop = $('.container-menu-desktop');
    var wrapMenu = $('.wrap-menu-desktop');

    if($('.top-bar').length > 0) {
        var posWrapHeader = $('.top-bar').height();
    }
    else {
        var posWrapHeader = 0;
    }
    

    if($(window).scrollTop() > posWrapHeader) {
        $(headerDesktop).addClass('fix-menu-desktop');
        $(wrapMenu).css('top',0); 
    }  
    else {
        $(headerDesktop).removeClass('fix-menu-desktop');
        $(wrapMenu).css('top',posWrapHeader - $(this).scrollTop()); 
    }

    $(window).on('scroll',function(){
        if($(this).scrollTop() > posWrapHeader) {
            $(headerDesktop).addClass('fix-menu-desktop');
            $(wrapMenu).css('top',0); 
        }  
        else {
            $(headerDesktop).removeClass('fix-menu-desktop');
            $(wrapMenu).css('top',posWrapHeader - $(this).scrollTop()); 
        } 
    });


    /*==================================================================
    [ Menu mobile ]*/
    $('.btn-show-menu-mobile').on('click', function(){
        $(this).toggleClass('is-active');
        $('.menu-mobile').slideToggle();
    });

    var arrowMainMenu = $('.arrow-main-menu-m');

    for(var i=0; i<arrowMainMenu.length; i++){
        $(arrowMainMenu[i]).on('click', function(){
            $(this).parent().find('.sub-menu-m').slideToggle();
            $(this).toggleClass('turn-arrow-main-menu-m');
        })
    }

    $(window).resize(function(){
        if($(window).width() >= 992){
            if($('.menu-mobile').css('display') == 'block') {
                $('.menu-mobile').css('display','none');
                $('.btn-show-menu-mobile').toggleClass('is-active');
            }

            $('.sub-menu-m').each(function(){
                if($(this).css('display') == 'block') { console.log('hello');
                    $(this).css('display','none');
                    $(arrowMainMenu).removeClass('turn-arrow-main-menu-m');
                }
            });
                
        }
    });


    /*==================================================================
    [ Show / hide modal search ]*/
    $('.js-show-modal-search').on('click', function(){
        $('.modal-search-header').addClass('show-modal-search');
        $(this).css('opacity','0');
    });

    $('.js-hide-modal-search').on('click', function(){
        $('.modal-search-header').removeClass('show-modal-search');
        $('.js-show-modal-search').css('opacity','1');
    });

    $('.container-search-header').on('click', function(e){
        e.stopPropagation();
    });


    /*==================================================================
    [ Isotope ]*/
    var $topeContainer = $('.isotope-grid');
    var $filter = $('.filter-tope-group');

    // filter items on button click
    $filter.each(function () {
        $filter.on('click', 'button', function () {
            var filterValue = $(this).attr('data-filter');
            $topeContainer.isotope({filter: filterValue});
        });
        
    });

    // init Isotope
    $(window).on('load', function () {
        var $grid = $topeContainer.each(function () {
            $(this).isotope({
                itemSelector: '.isotope-item',
                layoutMode: 'fitRows',
                percentPosition: true,
                animationEngine : 'best-available',
                masonry: {
                    columnWidth: '.isotope-item'
                }
            });
        });
    });

    var isotopeButton = $('.filter-tope-group button');

    $(isotopeButton).each(function(){
        $(this).on('click', function(){
            for(var i=0; i<isotopeButton.length; i++) {
                $(isotopeButton[i]).removeClass('how-active1');
            }

            $(this).addClass('how-active1');
        });
    });

    /*==================================================================
    [ Filter / Search product ]*/
    $('.js-show-filter').on('click',function(){
        $(this).toggleClass('show-filter');
        $('.panel-filter').slideToggle(400);

        if($('.js-show-search').hasClass('show-search')) {
            $('.js-show-search').removeClass('show-search');
            $('.panel-search').slideUp(400);
        }    
    });

    $('.js-show-search').on('click',function(){
        $(this).toggleClass('show-search');
        $('.panel-search').slideToggle(400);

        if($('.js-show-filter').hasClass('show-filter')) {
            $('.js-show-filter').removeClass('show-filter');
            $('.panel-filter').slideUp(400);
        }    
    });




    /*==================================================================
    [ Cart ]*/
    $('.js-show-cart').on('click',function(){
        $('.js-panel-cart').addClass('show-header-cart');
    });

    $('.js-hide-cart').on('click',function(){
        $('.js-panel-cart').removeClass('show-header-cart');
    });

    /*==================================================================
    [ Cart ]*/
    $('.js-show-sidebar').on('click',function(){
        $('.js-sidebar').addClass('show-sidebar');
    });

    $('.js-hide-sidebar').on('click',function(){
        $('.js-sidebar').removeClass('show-sidebar');
    });

    /*==================================================================
    [ +/- num product ]*/
    $(document).on('click', '.btn-num-product-down', function() {
        var numProduct = Number($(this).next().val());
        if (numProduct > 0) $(this).next().val(numProduct - 1);
    });

    $(document).on('click', '.btn-num-product-up', function() {
        var numProduct = Number($(this).prev().val());
        $(this).prev().val(numProduct + 1);
    });

    /*==================================================================
    [ Rating ]*/
    $('.wrap-rating').each(function(){
        var item = $(this).find('.item-rating');
        var rated = -1;
        var input = $(this).find('input');
        $(input).val(0);

        $(item).on('mouseenter', function(){
            var index = item.index(this);
            var i = 0;
            for(i=0; i<=index; i++) {
                $(item[i]).removeClass('zmdi-star-outline');
                $(item[i]).addClass('zmdi-star');
            }

            for(var j=i; j<item.length; j++) {
                $(item[j]).addClass('zmdi-star-outline');
                $(item[j]).removeClass('zmdi-star');
            }
        });

        $(item).on('click', function(){
            var index = item.index(this);
            rated = index;
            $(input).val(index+1);
        });

        $(this).on('mouseleave', function(){
            var i = 0;
            for(i=0; i<=rated; i++) {
                $(item[i]).removeClass('zmdi-star-outline');
                $(item[i]).addClass('zmdi-star');
            }

            for(var j=i; j<item.length; j++) {
                $(item[j]).addClass('zmdi-star-outline');
                $(item[j]).removeClass('zmdi-star');
            }
        });
    });
    
    /*==================================================================
    [ Show modal1 ]*/
    $('.js-show-modal1').on('click',function(e){
        e.preventDefault();
        $('.js-modal1').addClass('show-modal1');
    });

    $('.js-hide-modal1').on('click',function(){
        $('.js-modal1').removeClass('show-modal1');
    });

    /*[ Show modal2 ]*/
    $('.js-show-modal2').on('click',function(e){
        e.preventDefault();
        $('.js-modal2').addClass('show-modal2');
    });

    $('.js-hide-modal2').on('click',function(){
        $('.js-modal2').removeClass('show-modal2');
    });


    	/*---------------------------------------------*/

		$(document).on('click', '.js-addcart-detail', function() {
            let nameProduct = $('#detalleNombre').text();
            let idProd = $('#idProd').val();
            let imagenUrl = $('#referencia').val();
            let cantProd = $('.num-product').val();
            let precioProduct = $('#precioProd').text();
            let productList = JSON.parse(sessionStorage.getItem('productList')) || [];
            // Verificar si el producto ya existe en la lista
            let isProductExists = productList.some(product => product.id === idProd);
            let imagen=''
            if(imagenUrl== "img.png" || imagenUrl == ""){
                imagen = 'http://localhost:75/admin/uploads/img/img2.png';
            }else{
                imagen = 'http://localhost:75/admin/uploads/img/'+imagenUrl;
            }
            if (isProductExists) {
                swal(nameProduct, "ya está en el carrito!", "error");
                return;
            }
            let cartItem = `
              <li class="header-cart-item flex-w flex-t m-b-12" data-product-id="${idProd}">
                <div class="header-cart-item-img block3-pic hov-img0">
                  <img src="${imagen}" alt="IMG">
                  <a href="#" class="block3-btn flex-c-m stext-103 cl2  bg0 bor2 hov-btn4 p-lr-15 trans-04 js-borrar-prod">
                    x
                  </a>
                </div>
                <div class="header-cart-item-txt p-t-8">
                  <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                    ${nameProduct}
                  </a>
                  <span class="header-cart-item-info">
                  ${cantProd} x S/. ${precioProduct}
                  </span>
                </div>
              </li>
            `;
          
            $('.header-cart-wrapitem').append(cartItem);
          
            // Obtener la lista de productos actualizada
            //let productList = JSON.parse(sessionStorage.getItem('productList')) || [];
            productList.push({ id: idProd, name: nameProduct,price: parseFloat(precioProduct), quantity: parseInt(cantProd),imagen: imagenUrl});
          
            // Guardar la lista de productos en el sessionStorage
            sessionStorage.setItem('productList', JSON.stringify(productList));
          
            updateNotificationCount();
            updateTotalPrice();
            swal(nameProduct, "fue agregado al carrito!", "success");
          });

        /**BORRAR */
        $(document).on('click', '.js-borrar-prod', function() {
            let $productItem = $(this).closest('li.header-cart-item');
            let productId = $productItem.attr('data-product-id');
          
            // Eliminar el producto de la lista en el sessionStorage
            let productList = JSON.parse(sessionStorage.getItem('productList')) || [];
            productList = productList.filter(product => product.id !== productId);
            sessionStorage.setItem('productList', JSON.stringify(productList));
          
            // Remover el elemento de la lista visualmente
            $productItem.remove();
          
            updateNotificationCount();
            updateTotalPrice();
          });
	
        
        function updateNotificationCount() {
            let productList = JSON.parse(sessionStorage.getItem('productList')) || [];
            
            let itemCount = productList.length;
            console.log(itemCount)
            // $(".header-cart-wrapitem li").each(function(){
        	//     itemCount++
                
        	// });

            //var itemCount = $('.header-cart-wrapitem ul.header-cart-wrapitem').children('li').length;
            $('.js-show-cart').attr('data-notify', itemCount);
            //console.log("conteo",itemCount)
          };

          function updateTotalPrice() {
            let productList = JSON.parse(sessionStorage.getItem('productList')) || [];
            let totalPrice = productList.reduce((total, product) => total + product.price * product.quantity, 0);
            
            $('.header-cart-total').text('Total: $' + totalPrice.toFixed(2));

          }

          /*pago*/
        

})(jQuery);