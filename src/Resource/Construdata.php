<?php
/**
 * Created by PhpStorm.
 * User: nomada
 * Date: 30/01/19
 * Time: 09:56 AM
 */

namespace ConsumerClient\Resource;
use ConsumerClient\Util\AlmArray;
use GuzzleHttp\Client;


class Construdata
{
    private $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function listarCategorias($data){

        $token = AlmArray::get($data, 'token');
        $url = AlmArray::get($data, 'url');
        $function = AlmArray::get($data, 'function');
        $info = AlmArray::get($data, 'data') ? AlmArray::get($data, 'data') : '';
dump($info);
        $res = $this->client->get($url . $function, [
            'query' => $data
        ]);
        return  json_decode($res->getBody()->getContents(), true);

    }
}