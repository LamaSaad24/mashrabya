<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        \App\Models\User::create([
            'name' => 'lama',
            'email' => 'lama@gmail.com',
            'password'=> Hash::make('12345')
        ]);

        \App\Models\Blogger::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password'=> Hash::make('12345')
        ]);
    }
}
