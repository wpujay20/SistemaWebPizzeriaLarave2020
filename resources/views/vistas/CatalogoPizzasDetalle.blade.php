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
			

				<div class="container" >
                    <div class="row "  >
                        <div  class="col" style="display:inline;margin:5px;"  >
                       <div class="card" style="width: 45%; float: left" style="text-align: center; margin:2px auto">
                        <img src="{{asset('images/'.$detallepizza->pizza_img .'') }} " class="card-img-top" alt="...">
                            
						</div>
						<div class="card" style="width: 52%; float: middle" style="text-align: center; margin:2px auto">
							<div class="card-body">
                                <h3 class="card-title">{{$detallepizza->pizza_nombre}}</h3>
								<p class="card-text">{{$detallepizza->pizza_descripcion}}.</p>
								<p class="card-text">Precio : S/.{{$detallepizza->pizza_precio}}</p>
								
								<p class="card-text">Cantidad: 
									<select style=" width: 5rem">
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
										<option>6</option>
										<option>7</option>
										<option>8</option>
									</select>
								</p>
								<button>Añadir al Carrito</button>
							</div>	
						</div>
					</div>
				</div>
				</div>
				
				<br>
				<header>
					<div class="title">
						<h2><a href="#">Tambien te puede interesar...</a></h2>
						{{-- <p>Encuentre una gran y deliciosa variedad de sabores</p> --}}
					</div>
				</header>
				<footer>
	
					<div class="container" >
						<div class="row "  >
							@foreach ($listaPizzas as $item)
							<div  class="col-md-3" style="display:inline;margin:5px;"  >
						   <div class="card" style="width: 15rem;" style="text-align: center; margin:2px auto">
							<img src="{{asset('images/'.$item->pizza_img .'') }} " class="card-img-top" alt="...">
								<div class="card-body">
									<h5 class="card-title">{{$item->pizza_nombre}}</h5>
									{{-- <p class="card-text">{{$item->pizza_descripcion}}.</p> --}}
									<p class="card-text">Tamaño: {{$item->tpi_tamano}}</p>
									<p class="card-text">Precio: {{$item->pizza_precio}}</p>
								<a href="{{ route('CatalogoPizzas.show', $item->pizza_id) }}" class="btn btn-warning">Visualizar</a>
								</div>
							</div>
						</div>
						@endforeach
					</div>
					</div>
				</footer>

			</article>

		</div>

	</div>

	@endsection
</body>

</html>
