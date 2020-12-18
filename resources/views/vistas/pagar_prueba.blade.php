@extends('../layouts/plantilla_importaciones')


@section('titulo')
		Pagar
@endsection


@section('cuerpo_seccion')

 <?php
// SDK de Mercado Pago
//require __DIR__ .  '/vendor/autoload.php';
require '../vendor/autoload.php';


// Agrega credenciales
MercadoPago\SDK::setAccessToken('TEST-2941640367030214-081821-27d9f068ff19cbc1a885608db6889a86-627932043');

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();

$preference->back_urls = array(                                                             // ESTA INFORMACIÓN VIENE DEL COMPACT DEL MÉTODO DEL CONTROLADOR  PROCESARPAGO
    "success" => "http://sistemawebpizzerialarave2020.test:9090/procesar_pago/?direc=".$datos['direc']."&refe=".$datos['refe'] ."&distrito=".$datos['distrito'] ."", // redireccionar a la lsita de pedidos
    "failure" => "http://www.tu-sitio/failure",
    "pending" => "http://www.tu-sitio/pending"
);

$preference->auto_return = "approved";
 


Cart::session(Auth::user()->id)->getContent();
// Crea un ítem en la preferencia
$item = new MercadoPago\Item();

$item->title = 'Monto Total';
$item->quantity = 1;
$item->unit_price = Cart::getTotal();
$preference->items = array($item);
$preference->save();

?>

<center>


        <script  src="https://www.mercadopago.com.pe/integrations/v1/web-payment-checkout.js"
            data-preference-id="<?php echo $preference->id; ?>">
        </script>
 
</center>

@endsection










