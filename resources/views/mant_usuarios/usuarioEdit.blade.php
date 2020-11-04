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


{!! Form::model($usuario_edit[0] , ['method'=>'post', 
                            'action'=>['UsuariosController@update',
                            $usuario_edit[0]->persona_id]])!!}
    {{csrf_field()}}
    {{method_field('PUT') }}

    <table>
        <tr>
            <td>{{Form::label('Nombre')}}</td>
            <td>{{Form::text('per_nombres', $usuario_edit[0]->per_nombres,['class'=>'form-control'])}}</td>
        </tr>
        <tr>
            <td>{{Form::label('Apellidos')}}</td>
            <td>{{Form::text('per_apellidos', $usuario_edit[0]->per_apellidos,['class'=>'form-control'])}} </td>
        </tr>
        <tr>
            <td>{{Form::label('DNI')}}</td>
            <td>{{Form::text('per_dni', $usuario_edit[0]->per_dni,['class'=>'form-control'])}} </td>
        </tr>
        <tr>
            <td>{{Form::label('Telefono')}}</td>
            <td>{{Form::text('per_telefono', $usuario_edit[0]->per_telefono,['class'=>'form-control'])}} </td>
        </tr>
        <tr>
            <tr>
            <td>{{Form::label('Correo')}}</td>
            <td>{{Form::text('usu_correo', $usuario_edit[0]->usu_correo,['class'=>'form-control'])}} </td>
        </tr>
            <td>{{Form::label('Contraseña')}}</td>
            <td>{{Form::text('usu_pass', $usuario_edit[0]->usu_pass,['class'=>'form-control'])}} </td>
        </tr>
        <tr>
            <td>{{Form::label('Tipo de Usuario')}}</td>

            <td>
                @if ($usuario_edit[0]->tipo_nombre == "administrador")
                    {{Form::select('tipo_nombre', ['administrador' => 'administrador', 'cliente' => 'cliente'],null,[ 'class' => 'form-control'])}}
                @else
                    {{Form::select('tipo_nombre', ['cliente' => 'cliente', 'administrador' => 'administrador'],null,['class' => 'form-control'])}}
                @endif
            </td>
        </tr>
        <tr>
            <td>{{Form::label('Estado')}}</td>
            <td>
                @if ($usuario_edit[0]->usu_estado == "habilitado")
                    {{Form::select('usu_estado', ['habilitado' => 'habilitado', 'deshabilitado' => 'deshabilitado'],null,[ 'class' => 'form-control'])}}
                @else
                    {{Form::select('usu_estado', ['deshabilitado' => 'deshabilitado', 'habilitado' => 'habilitado'],null,['class' => 'form-control'])}}
                @endif
            </td>
        </tr>

        <tr>
            <td colspan="2" align="center" class="botones">
                {{link_to('usuarios', $title = "Regresar", $attributes = array('class' => 'btn btn-secondary'))}}
                {{Form::submit('Editar',['class'=>'btn btn-warning'])}}
                
            </td>   
        </tr>
</table>
{!! Form::close() !!}

@endsection


@section('zonaBotones')
    
@endsection