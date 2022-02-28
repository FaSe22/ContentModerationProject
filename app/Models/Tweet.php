<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property mixed $user
 * @property mixed $user_id
 * @property mixed $id
 */
class Tweet extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    /**
     * @return BelongsTo
     * @author Sebastian Faber <sebastian@startup-werk.de>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }



}
