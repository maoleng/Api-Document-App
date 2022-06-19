<?php


use App\Models\User;

if (! function_exists('getName')) {
    function getName() {
        return User::query()->where('id', session()->get('id'))->first()->name;
    }
}

