<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'source', 'path', 'size', 'active', 'method_id',
    ];
    public $timestamps = false;

    protected $casts = [
        'active' => 'bool',
    ];

    public function method(): BelongsTo
    {
        return $this->belongsTo(Method::class, 'method_id', 'id');
    }
}
