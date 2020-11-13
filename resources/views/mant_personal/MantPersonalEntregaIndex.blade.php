@extends('../layouts/plantilla_mantenimientos')


@section('titulo')
Mantenimientos Pizzeria "La Buena Pizza"
@endsection

@section('titulo-Mantenimientos')
Personal de Entrega
@endsection

@section('cuerpo_seccion')

    <table id="tablaCRUD" class="table table-striped table-bordered" style="width:100%";>

    <thead>
        <tr>
            <th>Id</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Telefono</th>
            <th>Estado</th>
            <th>Eliminar</th>
            <th>Editar</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($listapersonalEntrega as $i)
            <tr>
            <td>{{$i->personalentrega_id}}</td>
            <td>{{$i->peen_nombres}}</td>
            <td>{{$i->peen_apellidos}}</td>
            <td>{{$i->peen_telefono}}</td>
            <td>{{$i->nombre_estado}}</td>

            <td style="text-align:center"> <a href="{{route("personal.edit", $i->personalentrega_id)}}" name="editar" class="btn btn-warning"> Editar </a></td>

            <td style="text-align:center">
                {!! Form::open(['action' => ['UsuariosController@destroy', $i->personalentrega_id]]) !!}

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


<button type="button" class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg">Agregar nuevo Personal </button>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">


        <form method="post" action="personal">
            {{csrf_field()}}

            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="color:rgb(218, 126, 22)" class="modal-title" id="exampleModalLabel">Agregar Personal de Entrega</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                            <div class="form-group">
                                <label>Estado Actual</label>
                                <select class="form-control" name="estado">
                                    @foreach ($listaEstados as $key)
                                        <option value="{{$key->estadopersonal_id}}"> {{$key->nombre_estado}} </option>
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label > Nombres </label>
                                <input name="nombres" type="text" class="form-control"aria-describedby="emailHelp" placeholder="Ingresar Nombre">
                            </div>
                            <div class="form-group">
                                <label>Apellidos</label>
                                <input name="apellidos" type="text" class="form-control" placeholder="Ingresar Apellidos">
                            </div>
                            <div class="form-group">
                                <label > Telefono </label>
                                <input name="telefono" type="text" class="form-control"placeholder="Ingresar Telefono">
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







