@extends('../layouts/plantilla_importaciones')

<!DOCTYPE HTML>
<html>

	<head>
		@section('titulo')
		Catalogo de pizzas
		@endsection
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="/css/main.css" />


	@section('importar_css_arriba')

	@endsection
	</head>

<body class="single is-preload">

	@section('cuerpo_seccion')

	<!-- Wrapper -->
	<div id="wrapper">


		<!-- Main -->
		<div id="main">

			<!-- Post -->
			<article class="post">
				<header>
					<div class="title">
						<h2><a href="#"></a></h2>
						<p>Encuentre una gran y deliciosa variedad de sabores</p>
					</div>


				</header>

				<div class="container">
                        <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-warning">Go somewhere</a>
                        </div>
{{ $listaPizzas}}

				</div>



				<footer>
					<ul class="stats">
						<li><a href="#">Anterior</a></li>
						<li><a href="#" class="icon solid fa-comment">Siguiente</a></li>
					</ul>
				</footer>

			</article>

		</div>

	</div>

	@endsection
</body>

</html>
