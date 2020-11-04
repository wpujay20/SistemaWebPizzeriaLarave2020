@extends('../layouts/plantilla_mantenimientos')


@section('titulo')
Mantenimientos Pizzeria "La Buena Pizza"
@endsection


@section('cuerpo_seccion')

    <table id="tablaCRUD" class="table table-striped table-bordered" style="width:100%";>

    <thead>
        <tr>
            <th>Id</th>
            <th>TipoUsuario</th>
            <th>Correo</th>
            <th>Contraseña</th>
            <th>Estado</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>DNI</th>
            <th>Telefono</th>
            <th>Eliminar</th>
            <th>Editar</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($listaUsuarios as $i)
            <tr>
            <td>{{$i->usuario_id}}</td>
            <td>{{$i->tipo_nombre}}</td>
            <td>{{$i->usu_correo}}</td>
            <td>{{$i->usu_pass}}</td>
            <td>{{$i->usu_estado}}</td>
            <td>{{$i->per_nombres}}</td>
            <td>{{$i->per_apellidos}}</td>
            <td>{{$i->per_dni}}</td>
            <td>{{$i->per_telefono}}</td>
            <th> <a href="{{route("usuarios.edit", $i->persona_id)}}" name="editar" class="btn btn-warning"> Editar </a></th>
            <th><a href="" name="editar" class="btn btn-danger"> Eliminar </a></th>
        </tr>
        @endforeach
</table>
@endsection






@section('zonaBotones')
    
<button type="button" class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg">Crear Nuevo Usuario</button>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">


        <form method="post" action="usuarios">
            {{csrf_field()}}

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                            <div class="form-group">
                                <label>Tipo de Usuario</label>
                                <select class="form-control" name="tipo_usuario">
                                    @foreach ($listatipo_usuario as $key)
                                        <option value="{{$key->tipousu_id}}"> {{$key->tipo_nombre}} </option>
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label > Correo </label>
                                <input name="correo" type="email" class="form-control"aria-describedby="emailHelp" placeholder="Ingresar Correo">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Contrsaeña</label>
                                <input name="contra" type="password" class="form-control" placeholder="Contraseña">
                            </div>
                            <div class="form-group">
                                <label > Nombres </label>
                                <input name="nombre" type="text" class="form-control"placeholder="Ingresar Nombres">
                            </div>
                            <div class="form-group">
                                <label > Apellidos </label>
                                <input name="apellido" type="text" class="form-control"placeholder="Ingresar Apellidos">
                            </div>
                            <div class="form-group">
                                <label > DNI </label>
                                <input name="dni" type="text" class="form-control"placeholder="Ingresar DNI">
                            </div>
                            <div class="form-group">
                                <label > Telefono </label>
                                <input name="telefono" type="text" class="form-control"placeholder="Ingresar Telefono">
                            </div>
                
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Crear"/>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    
                    </div>
                
                    </div>
            </div>
        </form>
    </div>
</div>
@endsection







