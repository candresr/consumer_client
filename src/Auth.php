<?php

namespace ConsumerClient;

use ConsumerClient\Util\AlmArray;
use ConsumerClient\Util\AlmDate;
use ConsumerClient\Util\AlmValidator;
use GuzzleHttp\Client;

class Auth {

    private $sessionPath = "/var/session";
    private $client;
    private $api = "http://157.56.180.214/WebApi/api";
    private $username;
    private $password;
    private $identificacion;

    public function __construct($data){

        $this->username = AlmArray::get($data, 'username');
        $this->password = AlmArray::get($data, 'password');
        $this->identificacion = AlmArray::get($data, 'identificacion');
        $this->client = new Client();
    }

    public function auth()
    {

        $res = $this->client->post($this->api . "/Autentication",  [
            'query' => array(
                'identificacion' => $this->identificacion,
                'nombreusuario' => $this->username,
                'clave' => $this->password
            )
        ]);
        ;
        return $this->createToken($res);
    }
    public function createToken($res){

        $res = json_decode($res->getBody()->getContents(), true);

        if (!file_exists(__DIR__.'/'.$this->sessionPath)){
            mkdir(__DIR__.'/var');
            chmod(__DIR__.'/var',0777);
        }

        $token = $res['Resultado']['Token'];
        AlmArray::saveToFile($token, __DIR__.'/'.$this->sessionPath);
        return true;
    }

    /**
     * @return string
     */
    public function getSessionPath()
    {
        return $this->sessionPath;
    }
}