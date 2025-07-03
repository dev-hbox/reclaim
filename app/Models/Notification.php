<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Notification extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // This is the user who TRIGGERED the notification (e.g., liked the post)
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    // This is the post/comment/etc. linked to the notification
    public function related()
    {
        return $this->morphTo(__FUNCTION__, 'related_type', 'related_id');
    }
}
