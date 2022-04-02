<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id'                => 1,
            'name'              => 'Bas Leeuwerik',
            'email'             => 'bas@mail.nl',
            'email_verified_at' => now(),
            'password'          => bcrypt('password'),
            'remember_token'    => Str::random(10),
        ]);

        User::factory()->count(100)->create();
    }
}
