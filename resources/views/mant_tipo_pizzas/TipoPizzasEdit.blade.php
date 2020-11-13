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
            margin: 10px auto;
        }


    </style>
@endsection



@section('cuerpo_seccion')


{!! Form::model($TipoPizzaEdit, ['method'=>'post',
                            'action'=>['tipo_pizzasController@update',
                            $TipoPizzaEdit->tipopizza_id]])!!}
    {{csrf_field()}}
    {{method_field('PUT') }}

    <table>
        <tr>
            <td>{{Form::label('Nombre')}}</td>
            <td>{{Form::text('tpi_nombre', $TipoPizzaEdit->tpi_nombre,['class'=>'form-control'])}}</td>
        </tr>
        <tr>
            <td>{{Form::label('Tamaño')}}</td>
            <td>{{Form::text('tpi_tamano', $TipoPizzaEdit->tpi_tamano,['class'=>'form-control'])}} </td>
        </tr>
        <tr>
            <td>{{Form::label('Descripcion del Tipo de Pizza')}}</td>
            <td>{{
                    Form::textarea('tpi_descripcion', null, [
                    'class'      => 'form-control',
                    'rows'       => 3, 
                    'name'       => 'tpi_descripcion',
                    'id'         => 'tpi_descripcion',
                    'onkeypress' => "return nameFunction(event);"
                ])
                }} </td>
        </tr>

        <tr>
            <td colspan="2" align="center" class="botones">
                {{link_to('tipo_pizzas', $title = "Regresar", $attributes = array('class' => 'btn btn-secondary'))}}
                {{Form::submit('Editar',['class'=>'btn btn-warning'])}}
                
            </td>   
        </tr>
</table>
{!! Form::close() !!}




@endsection


@section('zonaBotones')
    
@endsection