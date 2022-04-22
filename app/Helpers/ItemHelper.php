<?php

namespace App\Helpers;

class ItemHelper
{
    public static function destroyItem($item, $relation = null)
    {
        if ($relation)
        {
            $relation->delete();
        }
        $item->delete();
    }
}
