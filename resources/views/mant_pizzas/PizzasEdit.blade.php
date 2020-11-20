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


{!! Form::model($PizzaEdit[0] , ['method'=>'post', 'files' =>true,
                            'action'=>['PizzasController@update',
                            $PizzaEdit[0]->pizza_id]])!!}
    {{csrf_field()}}
    {{method_field('PUT') }}

    <table>
        <tr>
            <td>{{Form::label('Nombre')}}</td>
            <td>{{Form::text('pizza_nombre', $PizzaEdit[0]->pizza_nombre,['class'=>'form-control'])}}</td>
        </tr>
        <tr>
            <td>{{Form::label('Precio')}}</td>
            <td>{{Form::text('pizza_precio', $PizzaEdit[0]->pizza_precio,['class'=>'form-control'])}} </td>
        </tr>
        <tr>
            <td>{{Form::label('Descripcion de la Pizza')}}</td>
            <td>{{
                    Form::textarea('pizza_descripcion', null, [
                    'class'      => 'form-control',
                    'rows'       => 3, 
                    'name'       => 'pizza_descripcion',
                    'id'         => 'pizza_descripcion',
                    'onkeypress' => "return nameFunction(event);"
                ])
                }} </td>
        </tr>
        <tr>
            <td>{{Form::label('Tipo de Pizza')}}</td>
            <td>
                <select class="form-control" name="tipopizza_id">
                    @foreach ($listaTiposPizzas as $key)
                        <option value="{{$key->tipopizza_id}}"> {{$key->tpi_nombre. " - ". $key->tpi_tamano}}</option>
                    @endforeach
                </select>
            </td>
        </tr>


        <tr>
            <td>{{Form::label('Imagen')}}</td>
            <td>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Subir</span>
                        </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="pizza_img" name="pizza_img">
                        <label class="custom-file-label" for="inputGroupFile01">Elegir Imagen</label>
                    </div>
                </div>             
            </td>
        </tr>


        <tr>
            <td colspan="2" align="center" class="botones">
                {{link_to('pizzas', $title = "Regresar", $attributes = array('class' => 'btn btn-secondary'))}}
                {{Form::submit('Editar',['class'=>'btn btn-warning'])}}
                
            </td>   
        </tr>
</table>
{!! Form::close() !!}




@endsection


@section('zonaBotones')
    
@endsection