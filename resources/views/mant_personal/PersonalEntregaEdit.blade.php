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


{!! Form::model($personalentrega_edit[0] , ['method'=>'post', 
                            'action'=>['PersonalEntregaController@update',
                            $personalentrega_edit[0]->personalentrega_id]])!!}
    {{csrf_field()}}
    {{method_field('PUT') }}

    <table>
        <tr>
            <td>{{Form::label('Nombres')}}</td>
            <td>{{Form::text('peen_nombres', $personalentrega_edit[0]->peen_nombres,['class'=>'form-control'])}}</td>
        </tr>
        <tr>
            <td>{{Form::label('Apellidos')}}</td>
            <td>{{Form::text('peen_apellidos', $personalentrega_edit[0]->peen_apellidos,['class'=>'form-control'])}} </td>
        </tr>
        <tr>
            <td>{{Form::label('Telefono')}}</td>
            <td>{{Form::text('peen_telefono', $personalentrega_edit[0]->peen_telefono,['class'=>'form-control'])}} </td>
        </tr>
        <tr>
            <td>{{Form::label('Estado')}}</td>

            <td>
                <select class="form-control" name="estadopersonal_id">
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