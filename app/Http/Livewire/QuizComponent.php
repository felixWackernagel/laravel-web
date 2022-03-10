<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Quiz;

class QuizComponent extends Component
{
    public function render()
    {
        return view('livewire.quiz', [
            'items' => Quiz::all()
        ]);
    }
}
