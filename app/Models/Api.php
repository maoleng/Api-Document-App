<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Api extends Model
{
    use HasFactory;


    protected $fillable = [
        'name', 'order', 'group_id', 'method_id',
    ];

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }

    public function method(): BelongsTo
    {
        return $this->belongsTo(Method::class, 'method_id', 'id');
    }

    public function getUniqueNameAttribute(): string
    {
        return Str::random(10);
    }
}
