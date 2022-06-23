<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use JsonException as JsonExceptionAlias;

class Method extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name', 'url', 'sample_body', 'sample_response', 'note',
    ];

    public function headers(): HasMany
    {
        return $this->hasMany(Header::class, 'method_id', 'id');
    }

    public function bodies(): HasMany
    {
        return $this->hasMany(Body::class, 'method_id', 'id');
    }

    public function responses(): HasMany
    {
        return $this->hasMany(Response::class, 'method_id', 'id');
    }

    public function getBeautyMethodNameAttribute(): string
    {
        return strtoupper($this->name);
    }

    public function getBadgeColorByMethodAttribute(): string
    {
        return match ($this->name) {
            'get' => 'badge-primary',
            'post' => 'badge-success',
            'put' => 'badge-warning',
            'delete' => 'badge-secondary',
            default => null,
        };
    }

    public function getBeautifulUrlAttribute()
    {
        if(strpos($this->url, ':')) {
            return str_replace('{', '', explode('{', $this->url)[0]);
        }
        return $this->url;
    }

    public function getValueToolTipUrlAttribute(): array|string|null
    {
        if(strpos($this->url, ':')) {
            return str_replace('}', '', explode(':', $this->url)[1]);
        }
        return null;
    }

    public function getKeyToolTipUrlAttribute(): ?string
    {
        if(strpos($this->url, ':')) {
            return explode('{', explode(':', $this->url)[0])[1];
        }
        return null;
    }

    public function getBeautifulJsonBodyAttribute(): bool|string
    {

        return json_encode(json_decode($this->sample_body, JSON_UNESCAPED_UNICODE ), JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE );
    }

    public function getBeautifulJsonResponseAttribute(): bool|string
    {
        return json_encode(json_decode($this->sample_response, JSON_UNESCAPED_UNICODE ), JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    }
}

