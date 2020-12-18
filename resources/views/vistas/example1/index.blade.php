


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Boleta</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="{{asset('images/buena_pizza_logo.jpg')}}">
      </div>
      <h1>La Buena Pizza</h1>
      <div id="project">
        <div><span>CLIENTE</span>{{$venta[0]->per_nombres." ".$venta[0]->per_apellidos}}</div>
        <div><span>DIRECCION</span> {{$venta[0]->lugar_direccion}} </div>
        <div><span>EMAIL</span> <a href="mailto:{{$venta[0]->email}}">{{$venta[0]->email}}</a></div>
        <div><span>FECHA</span> {{$venta[0]->created_at}}</div>
      </div>


      <div id="project" style="margin-left: 370px">
        <div>La Buena Pizza</div>
        <div>Sector 7 Grupo 4 Mz B lt 14 <br>cruce Av. 200 millas con pastor sevilla <br/> Villa El Salvador, Lima PE</div>
        <div>952 343 540</div>
        <div><a href="https://www.facebook.com/LaBuenaPizzaOficial/">LaBuenaPizzaOficial FB</a></div> 
      </div>

      

    </header>
    <main>
      <table>
        <thead> 
          <tr>
            <th class="service">PIZZA</th>
            <th class="desc">TAMAÑO</th>
            <th>DESCRIPTION</th>
            <th>PRECIO</th>
            <th>CANTIDAD</th>
            <th>MONTO</th>
          </tr>
        </thead>
        <tbody>
          @foreach($venta as $item)
          <tr>
            <td class="service">{{$item->pizza_nombre}}</td>
            <td class="desc">{{$item->tpi_tamano}}</td>
            <td class="desc">{{$item->pizza_descripcion}}</td> 
            <td class="unit">{{$item->pizza_precio}}</td>
            <td class="qty">{{$item->det_cantidad}}</td>
            <td class="total">{{$item->det_subtotal}}</td> 
          </tr>
          @endforeach
          <tr>
            <td class="grand total"></td>
            <td colspan="4" class="grand total"><h3>TOTAL :</h3></td>
            <td class="grand total"><h3>S/.{{$venta[0]->vnt_monto_final}}</h3></td>
          </tr>
        </tbody>
      </table>
     
    </main>
    <footer>
      <h2> La Buena Pizza 2020</h2>
    </footer>
  </body>
</html>