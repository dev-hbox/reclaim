<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaveLesson extends Model
{
    protected $guarded = [];


    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id', 'id');
    }
}
