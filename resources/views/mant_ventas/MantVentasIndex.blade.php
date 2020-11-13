@extends('../layouts/plantilla_mantenimientos')


@section('titulo')
Mantenimientos Pizzeria "La Buena Pizza"
@endsection

@section('titulo-Mantenimientos')
    Ventas
@endsection

@section('importar_css_arriba')
    <link href="{{ asset('css/colors.css') }}" rel="stylesheet">
@endsection

@section('cuerpo_seccion')

    <table id="tablaCRUD" class="table table-striped table-bordered" style="width:100%";>
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Id</th>
            <th>Cliente</th>
            <th>Monto Final</th>
            <th>Direccion/Distrito</th>
            <th>Personal Entrega</th>
            <th>Estado Venta</th>

            <th>Visualizar</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($listaVentas as $i)
            <tr>
            <td>{{$i->created_at}}</td>
            <td>{{$i->ventadelivery_id}}</td>
            <td>{{$i->per_nombres . " ". $i->per_apellidos}}</td>
            <td>{{$i->vnt_monto_final}}</td>
            <td>{{$i->lugar_direccion. " ". $i->lugar_distrito}}</td>
            <td>{{$i->peen_nombres. " ". $i->peen_apellidos}}</td>
            <td>
                @if ($i->vnt_estado=="cancelado")
                    <span class="naranja">{{$i->vnt_estado}}</span>
                @elseif ($i->vnt_estado=="en camino")
                    <span class="azul">{{$i->vnt_estado}}</span>    
                @else
                    <span class="verde">{{$i->vnt_estado}}</span>    
                @endif
            </td>

            <td style="text-align:center"> <a href="{{route('ventas_delivery.show', $i->ventadelivery_id)}}" name="detalle" class="btn btn-primary"> Detalle </a></td>

        </tr>
        @endforeach
</table>
@endsection






