<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Quiz extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'number',
        'quiz_start',
        'is_online',
        'quiz_master_id',
        'quiz_winner_id'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'quiz_start' => 'datetime',
        'is_online' => 'boolean'
    ];

    /**
     * Get the quiz master associated with the quiz.
     */
    public function quizMaster()
    {
        return $this->hasOne(User::class, 'id', 'quiz_master_id');
    }

    /**
     * Get the quiz winner associated with the quiz.
     */
    public function quizWinner()
    {
        return $this->hasOne(User::class, 'id', 'quiz_winner_id');
    }
}
