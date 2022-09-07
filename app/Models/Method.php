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
        $url = $this->url;
        preg_match_all('/\{.*\}/U', $url, $matches);
        foreach ($matches[0] as $matches) {
            $arr = explode(':', $matches);
            $new_url = '<span data-toggle="tooltip" title="" data-original-title=' . $arr[1] . '>' . $arr[0] . '</span>';
            $url = str_replace($matches, $new_url, $url);
        }
        return str_replace(array('}', '{'), '', $url);
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

