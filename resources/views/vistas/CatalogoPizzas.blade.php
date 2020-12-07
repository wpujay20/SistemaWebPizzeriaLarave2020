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
						<h2><a href="#">CATÁLOGO DE PIZZAS</a></h2>
						<p>Encuentre una gran y deliciosa variedad de sabores</p>
					</div>
				</header>

				<div class="container" >
                    <div class="row "  >
                        @foreach ($listaPizzas as $item)
                        <div  class="col-md-3" style="display:inline;margin:5px;"  >
                       <div class="card" style="width: 15rem;" style="text-align: center; margin:2px auto">
                        <img src="{{asset('images/'.$item->pizza_img .'') }} " class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$item->pizza_nombre}}</h5>
                                <p class="card-text">{{$item->pizza_descripcion}}.</p>
                                <a href="#" class="btn btn-warning">Visualizar</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
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
