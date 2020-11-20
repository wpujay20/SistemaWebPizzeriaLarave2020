
<!DOCTYPE HTML>
<html>
<head>
<title>Registrate</title>
<link rel="shortcut icon" href="{{asset('images/buena_pizza_logo.jpg')}}" >
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container" style="padding: 50px">
        <form method="post" action="PerfilDeUsuario">
            {{csrf_field()}}
    
            <div class="content">
                
                    <h4 style="color:rgb(218, 126, 22)" class="modal-title" id="exampleModalLabel">Registrate</h4>
                    </button>
                
                <div class="modal-body">
                            <div class="form-group">
                                <label >Nombres</label>
                                <input name="per_nombres" type="text" class="form-control"aria-describedby="emailHelp" placeholder="Ingresar Nombre">
                            </div>
                            <div class="form-group">
                                <label>Apellidos </label>
                                <input name="per_apellidos" type="text" class="form-control" placeholder="Ingresar Apellidos">
                            </div>

                            <div class="form-group">
                                <label>Telefono </label>
                                <input name="per_telefono" type="text" class="form-control" placeholder="Ingresar Telefono">
                            </div>
                            <div class="form-group">
                                <label>DNI </label>
                                <input name="per_dni" type="text" class="form-control" placeholder="Ingresar DNI">
                            </div>
                            <div class="form-group">
                                <label>Correo </label>
                                <input name="usu_correo" type="text" class="form-control" placeholder="Ingresar Correo">
                            </div>
                            <div class="form-group">
                                <label>Contraseña </label>
                                <input name="usu_pass" type="text" class="form-control" placeholder="Ingresar Contraseña">
                            </div>
                            
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Registrarse"/>
                        {{link_to('login', $title = "Regresar", $attributes = array('class' => 'btn btn-secondary'))}}

                    </div>
                
                    </div>
            </div>
        </form>
        
    </div> 

    
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>
