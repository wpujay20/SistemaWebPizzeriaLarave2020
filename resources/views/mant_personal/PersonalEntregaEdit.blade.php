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

{!! Form::model($personalEntrega,[ 'route' => ['personal.update',$personalEntrega->personalentrega_id], 'method'=>'PUT' ]) !!}
    <table>
        <tr>
            <td>{{Form::label('Nombres')}}</td>
            <td>{{Form::text('peen_nombres', $personalEntrega->peen_nombres,['class'=>'form-control'])}}</td>
        </tr>
        <tr>
            <td>{{Form::label('Apellidos')}}</td>
            <td>{{Form::text('peen_apellidos', $personalEntrega->peen_apellidos,['class'=>'form-control'])}} </td>
        </tr>
        <tr>
            <td>{{Form::label('Telefono')}}</td>
            <td>{{Form::text('peen_telefono', $personalEntrega->peen_telefono,['class'=>'form-control'])}} </td>
        </tr>
        <tr>
            <td>{{Form::label('Estado')}}</td>

            <td>
                <select class="form-control" name="estado_id">
                    @foreach ($listaEstados as $key)
                        <option value="{{$key->estadopersonal_id}}"> {{$key->nombre_estado}} </option>
                    @endforeach
                </select>
            </td>
        </tr>
        
        <tr>
            <td colspan="2" align="center" class="botones">
                {{link_to('personal', $title = "Regresar", $attributes = array('class' => 'btn btn-secondary'))}}
                {{Form::submit('Editar',['class'=>'btn btn-warning'])}}
                
            </td>   
        </tr>
</table>
{!! Form::close() !!}




@endsection


@section('zonaBotones')
    
@endsection