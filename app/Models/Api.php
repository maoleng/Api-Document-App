<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function method()
    {
        return $this->belongsTo(Method::class, 'method_id', 'id');
    }

    public function getUniqueNameAttribute()
    {
        return str_replace(' ', '', $this->name);
    }
}
