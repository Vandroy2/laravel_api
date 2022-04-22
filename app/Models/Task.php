<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @Task
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $card_id
 * @property int $created_at
 *
 * @property-read Card $card
 */

class Task extends Model
{
    use HasFactory;

    protected  $fillable = [

        'name',
        'description',
        'card_id',
    ];

    /**
     * @return BelongsTo
     */

    public function card(): BelongsTo
    {
        return $this->belongsTo(Card::class);
    }
}
