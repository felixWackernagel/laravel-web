<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

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
            'name' => 'Bob Doe',
            'email' => 'bob@doe.de',
            'email_verified_at' => date("Y-m-d H:i:s"),
            'password' => '$2y$10$TV1aGyLWYyF0vKhFiMNFdeLL/nY39je9wo.CILCTDnrweyCBP5U4q',
        ]);
    }
}
