<?php
/**
 * Created by PhpStorm.
 * User: nomada
 * Date: 28/01/19
 * Time: 11:05 AM
 */

namespace ConsumerClient\Resource;

class Siab
{
    private $url;
    public function __construct(){
        $this->url = 'http://ambientepruebas.asistenciabolivar.com:805/SIAB-Core-CienCuadrasApi-web/crearCaso';
    }

    function crearUserCiencuadras($data = []){

        $soap_request  = "<?xml version=\"1.0\"?>\n";
        $soap_request .= "<soapenv:Envelope xmlns:soapenv=\"http://schemas.xmlsoap.org/soap/envelope/\" xmlns:ws=\"http://ws.ciencuadras.siab.asistenciabolivar.com.co/\">\n";
        $soap_request .= "<soapenv:Header/>\n";
        $soap_request .= "<soapenv:Body>\n";
        $soap_request .= "<ws:crearCasoCiencuadras>\n";
        $soap_request .= "<datosCaso>\n";
        $soap_request .= "<tipoAlistamiento>cortesia</tipoAlistamiento>\n";
        $soap_request .= "<ciudadServicio>14000</ciudadServicio>\n";
        $soap_request .= "<direccionInmueble>123 calle false</direccionInmueble>\n";
        $soap_request .= "<barrioInmueble>bronx</barrioInmueble>\n";
        $soap_request .= "<nombreContacto>Homero</nombreContacto>\n";
        $soap_request .= "<telefonoContacto>1234567890</telefonoContacto>\n";
        $soap_request .= "<tipoInmueble>casa</tipoInmueble>\n";
        $soap_request .= "<estadoInmueble>venta</estadoInmueble>\n";
        $soap_request .= "<nitInmobiliaria>98765432</nitInmobiliaria>\n";
        $soap_request .= "<nombreInmobiliaria>real state</nombreInmobiliaria>\n";
        $soap_request .= "<nombreConsultor>Flandres</nombreConsultor>\n";
        $soap_request .= "<telefonoConsultor>1234567890</telefonoConsultor>\n";
        $soap_request .= "<nombrePersonaFactura>Bart</nombrePersonaFactura>\n";
        $soap_request .= "<numeroDocumentoPersonaFactura>2587</numeroDocumentoPersonaFactura>\n";
        $soap_request .= "<direccionPersonaFactura>712 Red Bark Lane</direccionPersonaFactura>\n";
        $soap_request .= "<numeroCotizacion>30</numeroCotizacion>\n";
        $soap_request .= "<comisionInmobiliaria>1</comisionInmobiliaria>\n";
        $soap_request .= "<descripcionComision>dinero</descripcionComision>\n";
        $soap_request .= "<correoElectronicoContacto>homero@correo.com</correoElectronicoContacto>\n";
        $soap_request .= "<correoInmobiliaria>realstate@correo.com</correoInmobiliaria>\n";
        $soap_request .= "<correoPersonaFactura>bart@correo.com</correoPersonaFactura>\n";
        $soap_request .= "<latitudInmueble>4.6603236</latitudInmueble>\n";
        $soap_request .= "<longitudinmueble>-74.1053734</longitudinmueble>\n";
        $soap_request .= "<nombreCliente>lisa</nombreCliente>\n";
        $soap_request .= "<nombreContactoInmobiliaria>Burn</nombreContactoInmobiliaria>\n";
        $soap_request .= "<numeroContactoInmobiliaria>3103334455</numeroContactoInmobiliaria>\n";
        $soap_request .= "</datosCaso>\n";
        $soap_request .= "</ws:crearCasoCiencuadras>\n";
        $soap_request .= "</soapenv:Body>\n";
        $soap_request .= "</soapenv:Envelope>\n";


//    $fields_query = http_build_query($crearCaso);
        ob_start();
        $out = fopen('php://output', 'w');
        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $soap_request);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_STDERR, $out);
        $response = curl_exec($ch);

        fclose($out);
        $debug = ob_get_clean();
        echo "DEBUG => ".$debug;

        curl_close ($ch);
        echo "Responce : ".$response;

        return $response;
    }

}