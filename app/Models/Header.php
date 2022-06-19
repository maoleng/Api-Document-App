<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'key', 'value', 'method_id'
    ];
}
