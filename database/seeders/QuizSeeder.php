<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Quiz;
use App\Models\User;


class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id = User::where('email', '=', 'bob@doe.de')->first()->id;

        Quiz::create([
            'number' => 1,
            'quiz_start' => date("Y-m-d H:i:s"),
            'is_online' => 0,
            'quiz_master_id' => $user_id,
            'quiz_winner_id' => $user_id
        ]);
        Quiz::create([
            'number' => 2,
            'quiz_start' => date("Y-m-d H:i:s"),
            'is_online' => 1,
            'quiz_master_id' => $user_id,
            'quiz_winner_id' => $user_id
        ]);
    }
}
