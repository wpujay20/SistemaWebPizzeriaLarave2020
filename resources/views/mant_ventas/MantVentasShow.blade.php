@extends('../layouts/plantilla_mantenimientos')


@section('titulo')
Mantenimientos Pizzeria "La Buena Pizza"
@endsection

@section('titulo-Mantenimientos')
    Detalle de Venta
@endsection

@section('importar_css_arriba')
    <link href="{{ asset('css/Show_DetalleVentas.css') }}" rel="stylesheet">
@endsection

@section('cuerpo_seccion')

<div class="datos_superiores">


    <table>
        <tr>
            <td><label>Fecha y Hora de venta:</label></td>
            <td><p>{{$DetalleVentas[0]->created_at}}</p></td>
        </tr>
        <tr>
            <td><label>Cliente:</label></td>
            <td><p> {{$DetalleVentas[0]->per_nombres. " ". $DetalleVentas[0]->per_apellidos}}</p></td>
        </tr>
        <tr>
            <td><label>Direccion de Entrega:</label></td>
            <td><p>{{$DetalleVentas[0]->lugar_direccion . "-".$DetalleVentas[0]->lugar_distrito }}</p></td>
        </tr>
        <tr>
            <td><label>Estado de Venta:</label></td>
            <td><p>
                @if ($DetalleVentas[0]->vnt_estado=="cancelado")
                    <span class="naranja">{{$DetalleVentas[0]->vnt_estado}}</span>
                @elseif ($DetalleVentas[0]->vnt_estado=="en camino")
                    <span class="azul">{{$DetalleVentas[0]->vnt_estado}}</span>    
                @else
                    <span class="verde">{{$DetalleVentas[0]->vnt_estado}}</span>    
                @endif
                </p>
            </td>
        </tr>
    </table>

    


    <div class="boton">{{link_to('ventas_delivery', $title = "Regresar", $attributes = array('class' => 'btn btn-secondary'))}}</div>
</div>

    <div class="container">
        <table id="tablaCRUD" class="table table-striped table-bordered" style="width:100%";>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre Pizza</th>
                <th>Tipo Pizza</th>
                <th>Tamaño Pizza</th>
                <th>Precio .U</th>
                <th>Cantidad</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($DetalleVentas as $i)
                <tr>
                <td>{{$i->detalleventa_id}}</td>
                <td>{{$i->pizza_nombre}}</td>
                <td>{{$i->tpi_nombre}}</td>
                <td>{{$i->tpi_tamano}}</td>
                <td>{{$i->pizza_precio}}</td>
                <td>{{$i->det_cantidad}}</td>

            </tr>
            @endforeach
    </table>

    <div class="final">
        <p> <label>Total:</label>
            {{$DetalleVentas[0]->vnt_monto_final}}
        </p>
    </div>
</div>




@endsection






