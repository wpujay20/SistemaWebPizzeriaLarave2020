
@extends('../layouts/plantilla_importaciones')
<!DOCTYPE HTML>

<html>

<head>
	<title>Login</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="/css/main.css" />
</head>

<body class="single is-preload">

	<!-- Wrapper -->
	<div id="wrapper">

		<!-- Header -->
		<header id="header">
			<a href="/">
				<img src="images/Captura.PNG" width="50px" height="50px">
			</a><a href="/">
				<h1>La buena pizza</h1>
			</a>
			<nav class="links">
				<ul>
					<li><a href="/Catalogo">Catalogo de Pizzas</a></li>
					<li><a href="/Promos">Promociones</a></li>
				</ul>
			</nav>
			<nav class="main">
				<ul>

					<li class="menu">
						<a class="fa-bars" href="#menu">Menu</a>
					</li>
				</ul>
			</nav>
		</header>

		<!-- Menu -->
		<section id="menu">

			<!-- Search -->
			<section>
				<form class="search" method="get" action="#">
					<input type="text" name="query" placeholder="Buscar" />
				</form>
			</section>

			<!-- Links -->
			<section>
				<ul class="links">
					<li>
						<a href="#">
							<h3>Pizza 1</h3>
							<p>Descripción</p>
						</a>
					</li>
					<li>
						<a href="#">
							<h3>Pizza 2</h3>
							<p>Descripción</p>
						</a>
					</li>
					<li>
						<a href="#">
							<h3>Pizza 3</h3>
							<p>Descripción</p>
						</a>
					</li>
					<li>
						<a href="#">
							<h3>Pizza 4</h3>
							<p>Descripción</p>
						</a>
					</li>
				</ul>
			</section>

			<!-- Actions -->
			<section>
				<ul class="actions stacked">
					<li><a href="/Login" class="button large fit">Iniciar Sesión</a></li>
				</ul>
			</section>

		</section>

		<!-- Main -->
		<div id="main">

			<!-- Post -->
			<article class="post">
				<header>
					<div class="title">
						<h2><a href="#">Formulario Login</a></h2>

					</div>
					<div class="meta">
						<time class="published" datetime="2015-11-01"></time>
						<a href="/" class="author"><span class="name">La buena pizza</span><img
								src="images/Captura.PNG" alt="" /></a>
					</div>
				</header>

				<body>
					<form  method="POST" action="/login">
                                                {{ csrf_field() }}
						<label for="fname">Correo electronico:</label>
						<input type="email" id="fname" name="usu_correo" required><br>
						<label for="lname">Contraseña:</label>
						<input type="password" id="lname" name="usu_pass" required>
						<br>
						<button type="submit" >Iniciar sesión</button><br><br>
						<h1>¿No cuentas con una cuenta?<a href="/Registro"> REGISTRARSE</a></h1>
					</form>
				</body>

			</article>

		</div>

		<!-- Footer -->
			<section id="footer">
				<ul class="icons" ></ul>
					<a href="#" class="icon brands fa-twitter"><span class="label"></span>Twitter&nbsp;</span></a>
					<a href="#" class="icon brands fa-facebook-f"><span class="label"></span>Facebook&nbsp;</span></a>
					<a href="#" class="icon brands fa-instagram"><span class="label"></span>Instagram&nbsp;</span></a>
				<a href="#" class="icon solid fa-rss"><span class="label">RSS </span></a>
					<a href="#" class="icon solid fa-envelope"><span class="label"></span>Email</span></a>
				</ul>
				<p class="copyright">&copy; Derechos de copyright <a><br>La buena pizza.</a>&nbsp;
					<a href="/Terminos y Condiciones">Terminos y condiciones.</a></p>
			</section>

	</div>

	<!-- Scripts -->
	<script src="/js/jquery.min.js"></script>
	<script src="/js/browser.min.js"></script>
	<script src="/js/breakpoints.min.js"></script>
	<script src="/js/util.js"></script>
	<script src="/js/main.js"></script>

</body>

</html>
