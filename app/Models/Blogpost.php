<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property mixed $user
 * @property mixed $user_id
 */
class Blogpost extends Model
{
    use HasFactory;


    /**
     * @return BelongsTo
     * @author Sebastian Faber <sebastian@startup-werk.de>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
