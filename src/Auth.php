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
    private $access_token = null;

    /**
     * @return null
     */
    public function getAccessToken()
    {
        return $this->access_token;
    }

    /**
     * @param null $access_token
     */
    public function setAccessToken($access_token)
    {
        $this->access_token = $access_token;
    }

    /**
     * @return string
     */
    public function getSessionPath()
    {
        return $this->sessionPath;
    }


    public function __construct($data){

        $this->username = AlmArray::get($data, 'username');
        $this->password = AlmArray::get($data, 'password');
        $this->identificacion = AlmArray::get($data, 'identificacion');
        $this->client = new Client();
        $this->loadToken();
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

        return $this->createToken($res);
    }
    public function createToken($res){

        $res = json_decode($res->getBody()->getContents(), true);

        if (!file_exists(__DIR__.'/'.$this->sessionPath)){
            mkdir(__DIR__.'/var');
            chmod(__DIR__.'/var',0777);
        }

        $token = $res; //['Resultado']['Token'];
        AlmArray::saveToFile($token, __DIR__.'/'.$this->sessionPath);
        return true;
    }



    public function loadToken(){

        $token = AlmArray::loadFromFile( __DIR__.'/'.$this->sessionPath);

        $this->access_token = AlmArray::get($token['Resultado'], 'Token');
        $this->setAccessToken($this->access_token);

    }
}