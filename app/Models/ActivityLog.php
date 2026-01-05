<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $fillable = ['action', 'subject_type', 'subject_id', 'causer_id', 'meta'];

    protected $casts = [
        'meta' => 'array',
    ];

    public function subject()
    {
        return $this->morphTo(__FUNCTION__, 'subject_type', 'subject_id');
    }

    public function causer()
    {
        return $this->belongsTo(User::class, 'causer_id');
    }
}
