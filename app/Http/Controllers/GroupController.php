<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Support\Facades\URL;

class GroupController extends Controller
{
    public function index(): array
    {
        $groups = Group::query()->get('name')->toArray();
        $data = [];
        foreach ($groups as $group) {
            $data[] = $group['name'];
        }
        return $data;
    }
}
