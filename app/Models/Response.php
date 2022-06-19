<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'field', 'data_type', 'description', 'method_id'
    ];
}
