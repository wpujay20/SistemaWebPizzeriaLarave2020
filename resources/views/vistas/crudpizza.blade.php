<!DOCTYPE HTML>
<html>

<head>
    <TItle>Mantenimiento Pizzas</TItle>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="/css/main.css" />
</head>
<!-- jQuery library -->
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
<body class="is-preload">

    <div>
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
                    <li><select id="op" name="op">
                    <option selected="selected" disabled="disabled">Mantenimientos</option>
                            <option value="/Perfil">Perfil</option>
                            <option value="/Trabajadores">Trabajadores</option>
                            <option value="/Usuarios">Usuarios</option>
                            <option value="/Personal de Entrega">Personal de entregas</option>
                    </select></li>
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


        <!--Mantenimientos-->
    <article class="post">

        <section>

                <h3>Mantinimientos:</h3>
                
            <h4>Pizzas:</h4>
            <div class="table-wrapper">
                <table class="alt">
                    <thead>
                        <tr>
                            <td>ID pizza</td>
                            <th>Id tipo pizza</th>
                            <th>Nombre</th>
                            <td>Precio</td>
                            <td>Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>01</td>
                            <td>Pizza</td>
                            <td>S/. 10</td>
                            <td>
                                
                                <a href="#" class="button icon solid fa-upload">ELIMINAR</a>
                                <a href="#" class="button icon solid fa-upload"> EDITAR </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <a href="#" class="button icon solid fa-upload">AÑADIR</a>
            </div><br>
            <h4>Tipo pizza:</h4>
            <div class="table-wrapper">
                <table class="alt">
                    <thead>
                        <tr>
                            <td>ID tipo pizza</td>
                            <th>nombre tipo</th>
                            <th>cantidad de porciones</th>
                            <td>descripción</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>01</td>
                            <td>Pizza grande 1</td>
                            <td>5</td>
                            <td>Pizza grande de cerdo y piña</td>
                            <td>
                                <a href="#" class="button icon solid fa-upload">ELIMINAR</a>
                                <a href="#" class="button icon solid fa-upload"> EDITAR </a>
                            </td>
                        </tr>
                    </tbody>
                </table><a href="#" class="button icon solid fa-upload">AÑADIR</a>
            </div><br>
        </section>


    </article>
    </div>

    <!-- Scripts -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/browser.min.js"></script>
    <script src="/js/breakpoints.min.js"></script>
    <script src="/js/util.js"></script>
    <script src="/js/main.js"></script>
</body>

</html>