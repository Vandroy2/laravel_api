<?php

namespace App\Models;


use App\Traits\FilterItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * @Desk
 *
 * @property int $id
 * @property string $name
 * @property int $created_at
 *
 * @property-read Collection|ListD $lists
 */

class Desk extends Model
{
    use HasFactory, FilterItem;

    protected $fillable = ['name'];

    /**
     * @return HasMany
     */

    public function lists(): HasMany
    {
        return $this->hasMany(ListD::class);
    }



}


