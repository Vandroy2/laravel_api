<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CountryResource;
use App\Services\ImportDataService;
use GuzzleHttp\Exception\GuzzleException;



class CountryController extends Controller
{
    /**
     * @throws GuzzleException
     */
    public function getDataFields(): CountryResource
    {
        //-----из объекта Country, который возвращает ImportDataService с помощью CountryResource возвращаем
        // нужные поля
        return new CountryResource(ImportDataService::importData());
    }
}
