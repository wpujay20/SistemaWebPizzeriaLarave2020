@extends('../layouts/plantilla_mantenimientos')


@section('titulo')
Mantenimientos Pizzeria "La Buena Pizza"
@endsection

@section('titulo-Mantenimientos')
Pizzas
@endsection

@section('cuerpo_seccion')

    <table id="tablaCRUD" class="table table-striped table-bordered" style="width:100%";>

    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>TipoPizza</th>
            <th>Tamaño</th>
            <th>Descripcion</th>
            <th>Imagen</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($listaPizzas as $i)
            <tr>
            <td>{{$i->pizza_id}}</td>
            <td>{{$i->pizza_nombre}}</td>
            <td>{{$i->pizza_precio}}</td>
            <td>{{$i->tpi_nombre}}</td>
            <td>{{$i->tpi_tamano}}</td>
            <td>{{$i->pizza_descripcion}}</td>

            <td> 
                @if ($i->pizza_img != "Sin Imagen")
                    <img src="images/{{$i->pizza_img}}" width="80px" height="auto">
                @else
                    {{"Sin Imagen"}}
                @endif
            </td>


            <td> <a href="{{route("pizzas.edit", $i->pizza_id)}}" name="editar" class="btn btn-warning"> Editar </a></td>

            <td>
                {!! Form::open(['action' => ['PizzasController@destroy', $i->pizza_id]]) !!}

                    {{csrf_field()}}
                    {{method_field('DELETE') }}
                    
                    {{Form::submit('Eliminar',['class'=>'btn btn-danger'])}}
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
</table>
@endsection


@section('zonaBotones')


<button type="button" class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg">Agregar Pizza </button>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form method="post" action="pizzas" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="color:rgb(218, 126, 22)" class="modal-title" id="exampleModalLabel">Agregar Pizzas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                            <div class="form-group">
                                <label > Nombre </label>
                                <input name="pizza_nombre" type="text" class="form-control"aria-describedby="emailHelp" placeholder="Ingresar Nombre">
                            </div>
                            <div class="form-group">
                                <label>Precio </label>
                                <input name="pizza_precio" type="text" class="form-control" placeholder="Ingresar Precio">
                            </div>
                            <div class="form-group">
                                <label > Descripcion </label>
                                <textarea class="form-control"  name="pizza_descripcion" id="Descripcion" rows="3"></textarea>                                
                            </div>
                            <div class="form-group">
                                <label>Tipo de pizza</label>
                                <select class="form-control" name="tipopizza_id">
                                    @foreach ($listaTiposPizzas as $key)
                                        <option value="{{$key->tipopizza_id}}"> {{$key->tpi_nombre." - "}} {{$key->tpi_tamano}}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                            <label > Imagen </label><br>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Subir</span>
                                        </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="pizza_img" name="pizza_img">
                                        <label class="custom-file-label" for="inputGroupFile01">Elegir Imagen</label>
                                    </div>
                                </div>
                            </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Añadir"/>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    
                    </div>
                
                    </div>
            </div>
        </form>
        
    </div>
</div>
@endsection







