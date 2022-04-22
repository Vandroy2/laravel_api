<?php

namespace App\Services;

use App\Components\ImportDataClient;
use App\Models\Country;
use GuzzleHttp\Exception\GuzzleException;

//-----------------в данном методе получаем данные из api и записываем нужные поля в базу данных
//--параметры подключения к api с помощью Guzzle указаны в файле app/Components/ImportDataClient.php

class ImportDataService
{
    /**
     * @throws GuzzleException
     */
    public static function importData()
    {
        //---Инициализация класса
        $import = new ImportDataClient();

        //--Получение ответа от api-----
        $response =$import->client->request('GET');

        //--получение данных в нужном формате----

        $data = json_decode($response->getBody()->getContents());

        //--запись нужных полей в базу данных

        foreach ($data as $array)
        {
            foreach ($array as $item)
            {

                //----Дублирование массива для уникальности полей--

                Country::query()->firstOrCreate(
                    [
                        'name'=> $item->Nation,

                        'census_year'=> $item->Year,

                        'people_quantity'=> $item->Population,],
                    [

                    'name'=> $item->Nation,

                    'census_year'=> $item->Year,

                    'people_quantity'=> $item->Population,
                ]);
                break;
            }
            break;
        }
                //---возвращаем объект---------------
            return Country::query()->firstOrFail();
    }

}
