<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::query()->create([
             'name' => 'Acc cho anh iem',
             'email' => 'taikhoan',
             'password' => '123',
             'level' => 0
         ]);
        User::query()->create([
            'name' => 'Admin Lok',
            'email' => 'admin',
            'password' => '123456780',
            'level' => 1
        ]);

    }
}
