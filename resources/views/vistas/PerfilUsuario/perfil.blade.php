
@extends('../layouts/plantilla_importaciones')

<!DOCTYPE HTML>
<html>
<head>
	@section('titulo')
		Perfil de Usuario
	@endsection

	@section('importar_css_arriba')
		
	@endsection

</head>

<body class="single is-preload">

	@section('cuerpo_seccion')

	

	<!-- Wrapper -->
	<div id="wrapper">
		<!-- Main -->
		<div id="main">
			<!-- Perfil -->
			<article class="post">
				<header>
					<div class="title">
						<h2><label href="#">Mi perfil - {{$Perfil[0]->tipo_nombre}} </label></h2>
					</div>
				</header>
						{!! Form::model($Perfil[0], ['method'=>'post',  'action'=>['PerfilDeUsuarioController@update', $Perfil[0]->persona_id]])!!}

							{{csrf_field()}}
							{{method_field('PUT') }}

							<table>
								<tr>
									<td>{{Form::label('Nombre')}}</td>
									<td>{{Form::text('per_nombres', $Perfil[0]->per_nombres,['class'=>'form-control'])}}</td>
								</tr>
								<tr>
									<td>{{Form::label('Apellidos')}}</td>
									<td>{{Form::text('per_apellidos', $Perfil[0]->per_apellidos,['class'=>'form-control'])}} </td>
								</tr>
								<tr>
									<td>{{Form::label('DNI')}}</td>
									<td>{{Form::text('per_dni', $Perfil[0]->per_dni,['class'=>'form-control'])}} </td>
								</tr>
								<tr>
									<td>{{Form::label('Telefono')}}</td>
									<td>{{Form::text('per_telefono', $Perfil[0]->per_telefono,['class'=>'form-control'])}} </td>
								</tr>
								<tr>
									<tr>
									<td>{{Form::label('Correo')}}</td>
									<td>{{Form::text('usu_correo', $Perfil[0]->usu_correo,['class'=>'form-control'])}} </td>
								</tr>
									<td>{{Form::label('Contraseña')}}</td>
									<td>{{Form::text('usu_pass', $Perfil[0]->usu_pass,['class'=>'form-control'])}} </td>
								</tr>
	
								<tr>
									<td colspan="2" align="center" class="botones">
										{{link_to('index_buena_pizza', $title = "Regresar", $attributes = array("class"=>"button medium"), $secure = null)}}					
										{{Form::submit('Modificar Perfil')}}
									</td>   
								</tr>
						</table>
						{!! Form::close() !!}	
			</article>
		</div>
	</div>
	@endsection
</body>

</html>