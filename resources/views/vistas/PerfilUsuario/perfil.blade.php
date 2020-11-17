
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
					<form action="/">
						<div style="display: flex;justify-content: space-between; ">
							<div style="width: 40%;">
								<label for="fname">Nombre:</label>
								<input value="{{$Perfil[0]->per_nombres}}" type="text" id="fname" name="fname" placeholder="Nombre" disabled> </div>
							<div style="width: 55%;">
								<label for="fname">Apellidos:</label>
								<input value="{{$Perfil[0]->per_apellidos}}" type="text" id="fname" name="fname" placeholder="Apellidos" disabled></div>
						</div><br>
						<div style="display: flex;justify-content: space-between;">
							<div style="width: 45%;">
								<label for="fname">N° DNI:</label>
								<input  value="{{$Perfil[0]->per_dni}}" type="text" id="fname" name="fname" placeholder="DNI" disabled ></div>
								
							<div style="width: 50%;">
								<label for="fname">Telefono movil:</label>
								<input value="{{$Perfil[0]->per_telefono}}"  type="text" id="fname" name="fname" placeholder="Movil celular" disabled></div>
						</div><br>
						<label for="lname">Correo Electronico:</label>
						<input type="email" value="{{$Perfil[0]->usu_correo}}" id="lname" name="lname" placeholder="Correo@example.com" disabled>
						<br>
						
						<label for="lname">Contraseña:</label>
						<input value="{{$Perfil[0]->usu_pass}}" type="password" id="lname" name="lname" placeholder="Contraseña" disabled>
						<br>
						<button type="submit" id="mp">Mofidicar perfil</button><br><br>
					</form>
			</article>

		</div>
	
	</div>
	@endsection
</body>

</html>