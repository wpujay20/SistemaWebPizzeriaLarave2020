@extends('../layouts/plantilla_mantenimientos')


@section('titulo')
Mantenimientos Pizzeria "La Buena Pizza"
@endsection

@section('importar_css_arriba')
    <style>
        td{
            padding: 6px;
        }
        table{
            margin: 5px auto;
        }
    </style>
        <link href="{{ asset('css/Show_DetalleVentas.css') }}" rel="stylesheet">

@endsection


@section('cuerpo_seccion')

<table>
    <tr>
        <td><label>Fecha y Hora de venta:</label></td>
        <td><p>{{$listaVentasEdit[0]->created_at}}</p></td>
    </tr>
    <tr>
        <td><label>Cliente:</label></td>
        <td><p> {{$listaVentasEdit[0]->per_nombres. " ". $listaVentasEdit[0]->per_apellidos}}</p></td>
    </tr>
    <tr>
        <td><label>Direccion de Entrega:</label></td>
        <td><p>{{$listaVentasEdit[0]->lugar_direccion . "-".$listaVentasEdit[0]->lugar_distrito }}</p></td>
    </tr>
    <tr>
        <td><label>Personal de Entrega:</label></td>
        <td><p>{{$listaVentasEdit[0]->peen_nombres . " ".$listaVentasEdit[0]->peen_apellidos }}</p></td>
    </tr>
    <tr>
        <td><label>Estado de Venta:</label></td>
        <td><p>
            @if ($listaVentasEdit[0]->vnt_estado=="cancelado")
                <span class="naranja">{{$listaVentasEdit[0]->vnt_estado}}</span>
            @elseif ($listaVentasEdit[0]->vnt_estado=="en camino")
                <span class="azul">{{$listaVentasEdit[0]->vnt_estado}}</span>    
            @else
                <span class="verde">{{$listaVentasEdit[0]->vnt_estado}}</span>    
            @endif
            </p>
        </td>
    </tr>
</table>







{!! Form::model($listaVentasEdit[0], ['method'=>'post', 
                            'action'=>['VentasController@update',
                            $listaVentasEdit[0]->ventadelivery_id]])!!}
    {{csrf_field()}}
    {{method_field('PUT') }}

    <table>
        <tr>
            <td>{{Form::label('Estado')}}</td>
            <td>{{Form::select('vnt_estado',['en camino'=>'en camino','cancelado'=>'cancelado','entregado'=>'entregado'],'vnt_estado',['class'=>'form-control','placeholder'=>'Seleccione Estado']) }}</td>
        </tr>
        <tr>
            <td colspan="2" align="center" class="botones">
                {{link_to('ventas_delivery', $title = "Regresar", $attributes = array('class' => 'btn btn-secondary'))}}
                {{Form::submit('Editar',['class'=>'btn btn-warning'])}}
            </td>   
        </tr>
</table>
{!! Form::close() !!}

@endsection


@section('zonaBotones')
@endsection