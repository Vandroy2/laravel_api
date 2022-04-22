<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


/**
 * @Card
 *
 * @property int $id
 * @property string $name
 * @property int $listId
 * @property int $created_at
 *
 * @property-read ListD $list
 * @property-read Collection|Task $tasks
 *
 */

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'list_id',
    ];

    /**
     * @return BelongsTo
     */

    public function list(): BelongsTo
    {
        return $this->belongsTo(ListD::class);
    }

    /**
     * @return BelongsToMany
     */

    public function tasks(): BelongsToMany
    {
        return $this->belongsToMany(Task::class);
    }
}
