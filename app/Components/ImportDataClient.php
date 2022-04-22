<?php

namespace App\Components;

use GuzzleHttp\Client;

class ImportDataClient
{
    public $client;

    public function __construct()
    {
        $this->client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://datausa.io/api/data?drilldowns=Nation&measures=Population',
            // You can set any number of default request options.
            'timeout'  => 2.0,
            'verify' => false,
        ]);
    }


}
