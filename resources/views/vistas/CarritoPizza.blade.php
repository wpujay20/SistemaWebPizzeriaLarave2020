
@extends('../layouts/plantilla_importaciones')

<!DOCTYPE HTML>

		@section('titulo')
		Carrito
		@endsection

        @section('cuerpo_seccion')

<body class="single is-preload">
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
                                        <th style="font-size: 20px" class="card-body align-right">Total a Pagar:</th>
                                        <th style="font-size: 20px">S/. {{Cart::getTotal()}}</th>
                                        <th></th>
                                    </tr>
								<tbody>
                            </table>
                            <?php
                                // SDK de Mercado Pago
                                //require __DIR__ .  '/vendor/autoload.php';
                                require '../vendor/autoload.php';


                                // Agrega credenciales
                                MercadoPago\SDK::setAccessToken('TEST-2941640367030214-081821-27d9f068ff19cbc1a885608db6889a86-627932043');

                                // Crea un objeto de preferencia
                                $preference = new MercadoPago\Preference();
                                $preference->back_urls = array(
                                    "success" => "http://sistemawebpizzerialarave2020.test:9090/hola", // redireccionar a la lsita de pedidos
                                    "failure" => "http://sistemawebpizzerialarave2020.test:9090/",
                                    "pending" => "http://www.tu-sitio/pending"

                                );

                                $preference->auto_return = "approved";

                                // Crea un ítem en la preferencia
                                $item = new MercadoPago\Item();
                                $item->title = 'Monto Total';
                                $item->quantity = 1;
                                $item->unit_price = Cart::getTotal();
                                $preference->items = array($item);
                                $preference->save();

                                ?>
                                {{-- {!! Form::open(['url' => '/ventas_delivery/create','method' => 'post','files'=>true]) !!} --}}
                                {!! Form::open(['url' => 'pagar','method' => 'post']) !!}
                                {{ csrf_field()}}


                                    <H5>¡Por favor Ingrese los datos que se requiere para que su pedido llegue vía Delivery!</H5>
                                <table>
                                    <thead>
										<td>Direccion:</td>
										<td><input type="text" placeholder="Ingrese su Dirección" id="direc"name="direc"   required></td>
									</thead>
                                    <thead>
										<td>Referencia:</td>
										<td><input type="text" placeholder="Ingrese una Rederencia"  id="refe"name="refe"  required></td>
									</thead>
									<thead>
										<td>Distrito:</td>
										<td>
											<select name="distrito" id="distrito" >
												<option value="">--Distritos Disponibles--</option>
												<option value="Villa el Salvado">Villa el Salvador</option>
												<option value="Villa Maria del Triunfo">Villa Maria del Triunfo</option>
												<option value="Pachacamac">Pachacamac</option>
												<option value="Lurín">Lurín</option>
											</select>
										</td>
									</thead>
                                </table>
                                <button type="submit">PROCEDER A PAGAR</button>

                                {!! form::close()   !!}
                                {{-- <script src="{{asset('js/carrito.js')}}"></script>
                                <button disabled style="margin-left: 500px;" id="btn" type="submit">
                                    <script src="{{asset('js/MercadoPago.js')}}" data-preference-id="<?php   echo $preference->id; ?>">
                                    prefer = new Array();
                                    prefer=$('preference').val();
                                    alert(prefer);


                                    </script>
                                </button> --}}
                                <form action="{{route('cart.removeitem')}}" method="POST">
                                    @csrf
                                <input type="hidden" name="pizza_id" value="{{$item->id}}">
                                <button type="submit" style="" class="btn button">Cancelar Pago</button>
                                </form>

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
                                        <p>Para Proceder a Pagar debe de Iniciar Sesión</p>

                                        <a href=" {{route('login')}}" class="btn btn-success">Proceder a Pagar</a>




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
