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
						<h2>CARRITO DE COMPRAS</h2>
					</div>
				</header>

				<div class="container" >
                    <div class="row "  >
                        <div  class="col" style="display:inline;margin:5px;"  >
						<div class="card" style="width: 100%; float: middle" style="text-align: center; margin:2px auto">
							<div class="card-body">
							@if(Auth::check())
                                        @if(count(Cart::session(Auth::user()->id)->getContent())>0)
						    
                            <h3>Carrito de Compras</h3>
							<table>
								<thead>
									<th></th>
									<th>Pizza</th>
									<th>Cantidad</th>
									<th>Precio</th>
                                    <th>Precio Total</th>
                                    <th></th>
								</thead>
								<tbody>
									@foreach (Cart::session(Auth::user()->id)->getContent() as $item)
									<tr>
										<td><img width="100px" style="align" src="{{asset('images/' . $item->attributes['pizza_img'] .'')}}"></td>
										<td>{{$item->name}}</td>
										<td>{{$item->quantity}}</td>
                                        <td>{{$item->price}}</td>
                                        <td>{{$item->price*$item->quantity}}</td>
										<td>
											<form action="{{route('cart.removeitem')}}" method="POST">
												@csrf
											<input type="hidden" name="pizza_id" value="{{$item->id}}">
											<button type="submit" style="" class="btn button">Quitar</button>
											</form>
										</td>
									</tr>
                                    @endforeach
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th class="card-body align-right">Total a Pagar:</th>
                                        <th><span>S/. {{Cart::getTotal()}}</span></th>
                                        <th></th>
                                       
                                    </tr>
								<tbody>
                            </table>
                            
                                        @else
                                        <span><p>Aun no tienes pizzas en tu carrito :c</p></span>
                                        @endif
                                @else
                                    @if(count(Cart::getContent())>0)
                                
                                    <table>
                                        <thead>
                                            <th></th>
                                            <th>Pizza</th>
                                            <th>Cantidad</th>
                                            <th>Precio</th>
                                            <th>Precio Total</th>
                                            <th></th>
                                        </thead>
                                        <tbody>
                                    @foreach (Cart::getContent() as $item)
									<tr>
										<td><img width="100px" src="{{asset('images/' . $item->attributes['pizza_img'] .'')}}"></td>
										<td>{{$item->name}}</td>
										<td>{{$item->quantity}}</td>
										<td>{{$item->price}}</td>
                                        <td>{{$item->price*$item->quantity}}</td>
										<td>
											<form action="{{route('cart.removeitem')}}" method="POST">
												@csrf
											<input type="hidden" name="pizza_id" value="{{$item->id}}">
											<button type="submit" class="btn button">Quitar</button>
											</form>
										</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th style="font-size: 20px">Total a Pagar:</th>
                                        <th style="font-size: 20px">S/. {{Cart::getTotal()}}</th>
                                        <th></th>
                                    </tr>
                                    <tbody>
                                    </table>
                                    
                                    @else
                                    <span><p>Aun no tienes pizzas en tu carrito :c</p></span>
                                @endif
                                	
                                    
								

                            @endif
                            
							</div>	
						</div>
					</div>
				</div>
				</div>
				
				

			</article>

		</div>

	</div>

	@endsection
</body>

</html>
