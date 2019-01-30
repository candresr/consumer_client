<?php
/**
 * Created by PhpStorm.
 * User: nomada
 * Date: 29/01/19
 * Time: 08:12 AM
 */

require 'vendor/autoload.php';

use Aw\Nusoap\NusoapClient;


try{
    // Endpoint a consumir
    $cliente = new NusoapClient('http://ambientepruebas.asistenciabolivar.com:805/SIAB-Core-CienCuadrasApi-web/crearCaso?wsdl');

    //Parametros de entrada
    $crearCaso = array(
        'tipoAlistamiento' => 'cortesia',
        'ciudadServicio' => 14000, //int
        'direccionInmueble' => '123 calle false',
        'barrioInmueble' => 'bronx',
        'nombreContacto' => 'Homero',
        'telefonoContacto' => 1234567890, //int
        'tipoInmueble' => 'casa',
        'estadoInmueble' => 'venta',
        'nitInmobiliaria' => 98765432, //int
        'nombreInmobiliaria' => 'real state',
        'nombreConsultor' => 'Flandres',
        'telefonoConsultor' => 1234567890,
        'nombrePersonaFactura' => 'Bart',
        'numeroDocumentoPersonaFactura' => 2587,
        'direccionPersonaFactura' => '712 Red Bark Lane',
        'numeroCotizacion' => '30',
        'comisionInmobiliaria' => 1, //int
        'descripcionComision' => 'dinero',
        'correoElectronicoContacto' => 'homero@correo.com',
        'correoInmobiliaria' => 'realstate@correo.com',
        'correoPersonaFactura' => 'bart@correo.com',
        'latitudInmueble' => 4.6603236, //int
        'longitudinmueble' => -74.1053734, //int
        'nombreCliente' => 'lisa',
        'nombreContactoInmobiliaria' => 'Burn',
        'numeroContactoInmobiliaria' => '3103334455'
    );
    $res = $cliente->call('crearCasoCiencuadras',$crearCaso, 'crearCasoCiencuadras'); //funcion en el servidor que recibe los datos al momento se define crearCaso
    $err = $cliente->getError();
    if ($err) {
        echo 'Constructor error -> ' . $err;
        exit();
    }else{
        print_r($cliente->response);
    }

//    print_r($cliente->response);

} catch (Exception $ex){

    var_dump($ex->getMessage());
    die();

}