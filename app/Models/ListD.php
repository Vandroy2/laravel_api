<?php

namespace App\Models;

use App\Traits\FilterItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;

/**
 * @ListD
 *
 * @property int $id
 * @property string $name
 * @property int $deskId
 * @property int $created_at
 *
 * @property-read Desk $desk
 * @property-read Collection|Card $cards
 *
 */

class ListD extends Model
{
    use HasFactory , FilterItem;

    protected $table = 'lists';

    protected $fillable = [
        'name',
        'desk_id'
    ];

    /**
     * @return BelongsTo
     */

    public function desk(): BelongsTo
    {
        return $this->belongsTo(Desk::class);
    }

    /**
     * @return BelongsToMany
     */

    public function cards(): BelongsToMany
    {
        return $this->belongsToMany(Card::class);
    }


}
