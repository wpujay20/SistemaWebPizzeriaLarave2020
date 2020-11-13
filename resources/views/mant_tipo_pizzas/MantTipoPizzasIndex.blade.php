@extends('../layouts/plantilla_mantenimientos')


@section('titulo')
Mantenimientos Pizzeria "La Buena Pizza"
@endsection

@section('titulo-Mantenimientos')
Tipos de Pizzas
@endsection

@section('cuerpo_seccion')

<table id="tablaCRUD" class="table table-striped table-bordered" style="width:100%;">

    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Tamaño</th>
            <th>Descripcion</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($listaTiposPizzas as $i)
        <tr>
            <td>{{$i->tipopizza_id}}</td>
            <td>{{$i->tpi_nombre}}</td>
            <td>{{$i->tpi_tamano}}</td>
            <td>{{$i->tpi_descripcion}}</td>


            <td style="text-align:center"> <a href="{{route("tipo_pizzas.edit", $i->tipopizza_id)}}" name="editar" class="btn btn-warning"> Editar </a>
            </td>

            <td style="text-align:center">
                {!! Form::open(['action' => ['tipo_pizzasController@destroy', $i->tipopizza_id]]) !!}

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


<button type="button" class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg">Agregar Pizza
</button>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form method="post" action="tipo_pizzas">
            {{csrf_field()}}

            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="color:rgb(218, 126, 22)" class="modal-title" id="exampleModalLabel">Agregar un nuevo Tipo de Pizza</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> Nombre </label>
                        <input  name="tpi_nombre" type="text" class="form-control" aria-describedby="emailHelp"
                            placeholder="Ingresar Nombre">
                    </div>
                    <div class="form-group">
                        <label>Tamaño </label>
                        <input  name="tpi_tamano" type="text" class="form-control" placeholder="Ingresar Tamaño">
                    </div>
                    <div class="form-group">
                        <label> Descripcion </label>
                        <textarea  class="form-control" name="tpi_descripcion" id="tpi_descripcion" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input  type="submit" class="btn btn-primary" value="Añadir" />
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>


            </div>
    </div>
    </form>

</div>
</div>
@endsection