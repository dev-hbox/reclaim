<?php

namespace App\Models;

use App\Models\UserAnswer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Profile extends Model
{
    protected $guarded = [];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function userAnswers(): HasManyThrough
    {
        return $this->hasManyThrough(UserAnswer::class, User::class, 'id', 'user_id', 'user_id', 'id');
    }
}
