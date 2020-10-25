<!DOCTYPE html>
<html lang="es" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>@yield('titulo')</title>
		<meta name="description" content="Blueprint: Horizontal Slide Out Menu" />
		<meta name="keywords" content="horizontal, slide out, menu, navigation, responsive, javascript, images, grid" />
		<meta name="author" content="Codrops"/>
        
        <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- Datatables  -->
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css"/>  
            
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('images/buena_pizza_logo.jpg') }}" rel="shortcut icon">
        <link href="{{ asset('css/default.css') }}" rel="stylesheet">
        <link href="{{ asset('css/component.css') }}" rel="stylesheet">
        <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">

        @yield('importar_css_arriba')

        <script type="text/javascript" src="{{ asset('js/modernizr.custom.js') }}"></script>

        @yield('importar_js_arriba')
	</head>
	<body>
		<div class="container">
			<header class="clearfix">				
				<div class="logo"><img src="images/buena_pizza_logo.jpg"/></div>

				<h1>Mantenimientos</h1>
			</header>	
			<div class="main">
				<nav class="cbp-hsmenu-wrapper" id="cbp-hsmenu-wrapper">
					<div class="cbp-hsinner">
						<ul class="cbp-hsmenu">
							<li>
								<a href="#"></a>
							</li>
							<li>
								<a href="#">Personas</a>
								<ul class="cbp-hssubmenu cbp-hssub-rows">
									<li><a href="#"><img src="images/personal_entrega.png" alt="img07"/><span>Personal de Entrega</span></a></li>
									<li><a href="#"><img src="images/grupo.png" alt="img08"/><span>Usuarios</span></a></li>
								</ul>
							</li>
							<li>
								<a href="#">Pizzas</a>
							</li>
							<li><a href="#">Ventas</a></li>
							<li><a href="">Cerrar Sesion</a></li>
						</ul>
					</div>
				</nav>
            </div>

            
        </div>
    <div class="cuerpo">

        <section>
            @yield('cuerpo_seccion')
        </section>
    </div>
    

    <div class="pie">
        <footer>
            Pizzeria "La buena Pizza" - Todos los derechos Reservados
            @yield('footer') 
        </footer>
    </div>

    <!-- Optional JavaScript -->
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
        <!--    Datatables-->
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>  
        @yield('importar_js_abajo')
        <script src="{{ asset('js/cbpHorizontalSlideOutMenu.min.js') }}"></script>
		<script>
			var menu = new cbpHorizontalSlideOutMenu( document.getElementById( 'cbp-hsmenu-wrapper' ) );
		</script>
	</body>
</html>
