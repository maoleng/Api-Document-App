<?php


use App\Models\User;
use Illuminate\Support\Facades\URL;

if (! function_exists('getName')) {
    function getName() {
        return User::query()->where('id', session()->get('id'))->first()->name;
    }
}

if (! function_exists('getUrl')) {
    function getUrl($name): string
    {
        return URL::to("/$name");
    }
}
