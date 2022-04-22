<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * @Country
 *
 * @property integer $id
 * @property string $name
 * @property integer $censusYear
 * @property integer $peopleQuantity
 */

class Country extends Model
{

    protected $fillable = [
        'name',
        'census_year',
        'people_quantity',
    ];
}
