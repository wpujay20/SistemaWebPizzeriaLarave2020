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
						<h2>Historial de Compras</h2>
					</div>
                </header>
                <h3>Mis Pedidos</h3>
				<div class="container" >
                    <div class="row "  >
                        <div  class="col" style="display:inline;margin:5px;"  >
						<div class="card" style="width: 100%; float: middle" style="text-align: center; margin:2px auto">
							<div class="card-body">
							
                            
                             @if($pedido==null)
                             <H4>Sin compras registradas</H4>
                             @else
                             <table>
                                <thead>
                                    <tr>
                                    <th>Monto Total</th>
									<th>Lugar de Entrega</th>
                                    <th>Distrito</th>
                                    <th>Estado</th>
                                    <th>Visualizar</th>
                                    </tr>
                                </thead>
                                    @foreach ($pedido as $item)
                                    <tr>
                                    <td>{{$item->vnt_monto_final}}</td>
                                    <td>{{$item->lugar_direccion}} </td>
                                    <td>{{$item->lugar_distrito}} </td>
                                    <td>{{$item->vnt_estado}} </td>
                                    <form action="" method="POST">
                                        @csrf
                                    <input type="hidden" name="ventaid" value="{{$item->ventadelivery_id}}">
                                     <td><button type="submit" >Ver detalle</button></td>   
                                    </form>
                                    </tr>
                                         @endforeach
                             </table>
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
