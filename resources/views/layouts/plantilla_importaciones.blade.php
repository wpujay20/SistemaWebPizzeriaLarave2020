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
			<link rel="shortcut icon" href="{{asset('images/buena_pizza_logo.jpg')}}" >

			<link rel="stylesheet" href="{{asset('css/main.css')}}"/>
			<link rel="stylesheet" href="{{asset('css/index_estilos.css')}}"/>

		@yield('importar_css_arriba')
		@yield('importar_js_arriba')

	</head>
	<body class="is-preload">

		<!-- zona de cabecera - este menu esta brindando a los demas blades  -->

			<header id="header">
				<a href="{{url("index_buena_pizza")}}">
					<img src="{{asset('images/Captura.PNG')}}" width="50px" height="50px">
				</a>
					<h2 class="index_titulo">La buena pizza</h2>
				<nav class="links">
					<ul>

                    <li><a href="{{route('CatalogoPizzas.index')}}">Catálogo de Pizzas</a> </li>
						<li>{{link_to('promociones', $title = "Promociones")}}</li>
					</ul>
				</nav>
				<nav class="main">
					<ul>
						<li class="menu">
							<a style="text-indent:0px; margin:10px 50px" href="#menu"><img src="{{asset('images/menu.png')}}" width="35px" height="35px"></a>
						</li>
					</ul>
				</nav>
			</header>



		<!-- zona de menu lateral - este menu esta brindando a los demas blades  -->
		<section id="menu">

			<!-- Links -->
			<section>
				<ul class="links">
					<li>
						<a href="{{route("PerfilDeUsuario.show", 13)}}" name="Perfil">
							<h3>Mi Perfil</h3>
						</a>
						<p><span> Aqui podrás gestionar los datos de tu perfil</span></p>
					</li>
					<li>
						<a href="" name="Perfil">
							<h3>Tus Pedidos</h3>
						</a>
						<p><span>Puedes hacer el seguimiento de tu pedido, asi como ver tu historial de compras y facturas</span></p>
					</li>
				</ul>
			</section>
			<!-- Actions -->
			<section>
				<ul class="actions stacked">
					<li>
						{{link_to('login', $title = "Iniciar Sesión", $attributes = array('class' => 'button large fit'))}}
					</li>
				</ul>
			</section>
		</section>


			@yield('cuerpo_seccion')

		<div>

			@yield('zonaInferior')
		</div>
    </div>





    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <!--    Datatables-->
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>
		<script>
			var menu = new cbpHorizontalSlideOutMenu( document.getElementById( 'cbp-hsmenu-wrapper' ) );
				$(document).ready(function () {
				$('#tablaCRUD').DataTable(
					{
						"lengthMenu": [[10, 25, 50], [10, 25, 50]],
						"language": {
							"url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
							}
					}
				);
			});
		</script>

			<script src="{{asset('js/browser.min.js')}}"></script>
			<script src="{{asset('js/breakpoints.min.js')}}"></script>
			<script src="{{asset('js/util.js')}}"></script>
			<script src="{{asset('js/main.js')}}"></script>

		@yield('importar_js_abajo')

	</body>
</html>
