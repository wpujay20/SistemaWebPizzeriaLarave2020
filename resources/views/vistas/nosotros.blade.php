<!DOCTYPE HTML>
<!--
	Future Imperfect by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
	<title>La Buena Pizza</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="/css/main.css" />
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(function(){
      // bind change event to select
      $('#op').on('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
    });
</script>
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
					<input type="text" name="query" placeholder="Search" />
				</form>
			</section>

			<!-- Links -->
			<header id="header">
				<a href="/">
					<img src="images/Captura.PNG" width="50px" height="50px">
				</a><a href="/">
					<h1>La buena pizza</h1>
				</a>
				<nav class="links">
					<ul>
						<li><a href="pages//Catalogo">Catalogo de Pizzas</a></li>
						<li><a href="#">Promociones</a></li>
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

			<!-- Actions -->
			<section>
				<ul class="actions stacked">
					<li><a href="#" class="button large fit">Log In</a></li>
				</ul>
			</section>

		</section>

		<!-- Main -->
		<div id="main">

			<!-- Perfil -->
			<article class="post">
				<header>
                    <div class="title">
                        <h2><a >Información de la empresa</a></h2>

                    </div>
                    <div class="meta">
                        <time class="published" datetime="2015-11-01"></time>
                        <a class="author"><span class="name">La buena pizza</span><img
                                src="/images/images/Captura.PNG" alt="" /></a>
                    </div>
                </header>

				<body>
					<div class="title">
                        <h2><a >¿Quienes Somos?</a></h2>

                    </div>
					<p>Texto</p>
					<div class="title">
                        <h2><a>Ubicación</a></h2>

                    </div>
					<img src="/images/direccion.jpg" alt="">

					
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


	<!-- JavaScripts -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
	<script src="/js/jquery.min.js"></script>
	<script src="/js/browser.min.js"></script>
	<script src="/js/breakpoints.min.js"></script>
	<script src="/js/util.js"></script>
	<script src="/js/main.js"></script>

</body>

</html>