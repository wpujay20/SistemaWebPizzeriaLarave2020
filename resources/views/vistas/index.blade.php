
@extends('../layouts/plantilla_importaciones')

<!DOCTYPE HTML>
<html>
<head>
	@section('titulo')
		Index
	@endsection

	@section('importar_css_arriba')

	@endsection

</head>



@section('cuerpo_seccion')

	<div id="wrapper">
		<!-- Header -->


		<!-- Main -->
		<div id="main">
            

			<!-- Post -->
			<article class="post">
				<header>
					<div class="title">
						<h2><a href="">Nueva Pizza</a></h2>
						<p>Presentamos la novedad que hasta el momento sigue teniendo muy buenas reseñas de nuestros comensales</p>
					</div>
					<div class="meta">
						<time class="published" style="font-size:1em">{{$lista}}
						</time>
					</div>
				</header>
				<a href="" class="image featured"><img src="{{asset('images/pic01.jpg')}}" alt="" /></a>
				<footer>
					<ul class="actions">
						<li>
							{{link_to('CatalogoPizzas', $title = "Ver en Catalogo", $attributes = array("class"=>"button large"), $secure = null)}}
						</li>
					</ul>
				</footer>
			</article>




			<!-- Post -->
			<article class="post">
				<header>
					<div class="title">
						<h2><a href="">La Clasica</a></h2>
						<p>Una excelente combinacion de sabores e ingredientes que se mantendrá por siempre</p>
					</div>

				</header>
				<a href="" class="image featured"><img src="{{asset('images/pic02.jpg')}}" alt="" /></a>
				<footer>
					<ul class="actions">
						<li>{{link_to('CatalogoPizzas', $title = "Ver en Catalogo", $attributes = array("class"=>"button large"), $secure = null)}}</li>
					</ul>
				</footer>
			</article>



			<!-- Pagination -->

		</div>

		<!-- Sidebar -->
		<section id="sidebar">

			<!-- Intro -->
			<section id="intro">
				<a href="" class="logo"><img src="{{asset('images/Captura.PNG')}}" alt="" /></a>
				<header>
					<h2>LA BUENA PIZZA</h2>
					<p>El lugar donde esta<br><a>"LA BUENA PIZZA"</a></p>
				</header>
			</section>

			<!-- Mini Posts -->
			<section>
				<div class="mini-posts">

					<!-- Mini Post -->
					<article class="mini-post">
						<header>
							<h3><a href="/Pizza Famosa">Americana</a></h3>

						</header>
						<a href="" class="image"><img src="{{asset('images/pic04.jpg')}}" alt="" /></a>
					</article>

					<!-- Mini Post -->
					<article class="mini-post">
						<header>
							<h3><a href="/Pizza Famosa">Italiana</a></h3>

						</header>
						<a href="" class="image"><img src="{{asset('images/pic05.jpg')}}" alt="" /></a>
					</article>

					<!-- Mini Post -->
					<article class="mini-post">
						<header>
							<h3><a href="/Pizza Famosa">Pizzas Medianas</a></h3>

						</header>
						<a href="" class="image"><img src="{{asset('images/pic06.jpg')}}" alt="" /></a>
					</article>

					<!-- Mini Post -->
					<article class="mini-post">
						<header>
							<h3><a href="/Pizza Famosa">Pizzas Familiares</a></h3>

						</header>
						<a href="" class="image"><img src="{{asset('images/pic07.jpg')}}" alt="" /></a>
					</article>

				</div>
			</section>


			<!-- LISTA DE PROMOCIONES -->
			<section>
				<ul class="posts">
					<li>
						<article>
							<header>
								<h3><a href="/Pizza Famosa">Promo</a></h3>
								<time class="published" datetime="2015-10-20">October 20, 2015</time>
							</header>
							<a href="" class="image"><img src="{{asset('images/pic08.jpg')}}" alt="" /></a>
						</article>
					</li>
					<li>
						<article>
							<header>
								<h3><a href="/Pizza Famosa">Promo</a></h3>
								<time class="published" datetime="2015-10-15">October 15, 2015</time>
							</header>
							<a href="" class="image"><img src="{{asset('images/pic09.jpg')}}" alt="" /></a>
						</article>
					</li>
					<li>
						<article>
							<header>
								<h3><a href="/Pizza Famosa">EPromo</a></h3>
								<time class="published" datetime="2015-10-10">October 10, 2015</time>
							</header>
							<a href="" class="image"><img src="{{asset('images/pic10.jpg')}}" alt="" /></a>
						</article>
					</li>
					<li>
						<article>
							<header>
								<h3><a href="/Pizza Famosa">MPromo</a></h3>
								<time class="published" datetime="2015-10-08">October 8, 2015</time>
							</header>
							<a href="" class="image"><img src="{{asset('images/pic11.jpg')}}" alt="" /></a>
						</article>
					</li>
					<li>
						<article>
							<header>
								<h3><a href="/Pizza Famosa">Promo</a></h3>
								<time class="published" datetime="2015-10-06">October 7, 2015</time>
							</header>
							<a href="" class="image"><img src="{{asset('images/pic12.jpg')}}" alt="" /></a>
						</article>
					</li>
				</ul>
			</section>

			<!-- About -->
			<section class="blurb">
				<h2>Información</h2>
				<p>Somos un restaurante familiar que pasado de generación en generacion.</p>
			</section>
		</section>
@endsection


@section('zonaInferior')

@endsection


</html>
