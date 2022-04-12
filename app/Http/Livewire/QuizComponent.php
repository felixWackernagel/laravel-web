<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Quiz;
use App\Http\Livewire\Notification;

class QuizComponent extends Component {
    public $items, $number, $quiz_id;
    public $isModalOpen = false;

    public function render() {
        $this->items = Quiz::orderBy('number', 'ASC')->get();
        return view('livewire.quiz');
    }

    public function closeModal() {
        $this->isModalOpen = false;
    }

    public function create() {
        $this->resetInput();
        $this->isModalOpen = true;
    }

    private function resetInput() {
        $this->quiz_id = null;
        $this->number = null;
    }

    public function store() {
        $this->validate([
            'number' => 'required|numeric|unique:quizzes'
        ]);
    
        $quiz = Quiz::updateOrCreate(
            ['id' => $this->quiz_id], 
            ['number' => $this->number]
        );
        
        $this->closeModal();
        $this->resetInput();

        Notification::success( $this, 'Quiz ' . $quiz->number . ' created.' );
    }

    public function edit( $id ) {
        $quiz = Quiz::findOrFail( $id );
        $this->quiz_id = $id;
        $this->number = $quiz->number;
        
        $this->isModalOpen = true;
    }

    public function delete( $id ) {
        $quiz = Quiz::find( $id );
        $quiz->delete();

        Notification::success( $this, 'Quiz ' . $quiz->number . ' deleted.' );
    }
}
