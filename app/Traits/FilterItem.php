<?php

namespace App\Traits;

use Carbon\Carbon;

trait FilterItem
{
//---фильтрация элементов--------------
    public function filterItem($item)
    {
        if (strlen($item->name) > 8)

         {
             return  $item->query()
                 ->where('created_at', "<", Carbon::now()->subHours(3))
                 ->where('updated_at', ">", Carbon::now()->subMinutes(40));
         }

         return false;
    }
}
