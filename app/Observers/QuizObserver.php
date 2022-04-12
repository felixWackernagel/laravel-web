<?php

namespace App\Observers;

use App\Models\Quiz;
use Illuminate\Support\Facades\Log;

class QuizObserver
{
    /**
     * Handle the Quiz "created" event.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return void
     */
    public function created(Quiz $quiz)
    {
        Log::debug( 'Quiz created', ['id' => $quiz->id] );
    }

    /**
     * Handle the Quiz "updated" event.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return void
     */
    public function updated(Quiz $quiz)
    {
        Log::debug( 'Quiz updated', ['id' => $quiz->id] );
    }

    /**
     * Handle the Quiz "deleted" event.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return void
     */
    public function deleted(Quiz $quiz)
    {
        Log::debug( 'Quiz deleted', ['id' => $quiz->id] );
    }

    /**
     * Handle the Quiz "restored" event.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return void
     */
    public function restored(Quiz $quiz)
    {
        Log::debug( 'Quiz restored', ['id' => $quiz->id] );
    }

    /**
     * Handle the Quiz "force deleted" event.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return void
     */
    public function forceDeleted(Quiz $quiz)
    {
        Log::debug( 'Quiz force deleted', ['id' => $quiz->id] );
    }
}
