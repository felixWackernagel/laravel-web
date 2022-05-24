<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Quiz;
use App\Models\User;
use App\Http\Livewire\Notification;
use App\Http\Livewire\TrimAndNullEmptyStrings;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class QuizComponent extends Component {

    use TrimAndNullEmptyStrings;

    public $items, $number, $quiz_id, $quiz_winner, $quiz_master, $users;
    public $isModalOpen = false;

    public function render() {
        $this->items = Quiz::orderBy('number', 'ASC')->get();
        $this->users = User::all();
        return view('livewire.quiz');
    }

    public function closeModal() {
        $this->isModalOpen = false;
    }

    public function create() {
        $this->resetInput();
        $this->isModalOpen = true;
        $this->number = Quiz::max('number') + 1;
    }

    private function resetInput() {
        $this->quiz_id = null;
        $this->number = null;
        $this->quiz_winner = null;
        $this->quiz_master = null;
    }

    public function store() {
        $isNew = is_null( $this->quiz_id );

        $this->validate( [ 
            'number' => [
                'required',
                'numeric',
                Rule::unique('quizzes', 'number')->ignore( $this->quiz_id )
            ] 
        ] );
    
        $quiz = Quiz::updateOrCreate(
            [
                'id' => $this->quiz_id
            ], 
            [
                'number' => $this->number,
                'quiz_winner_id' => $this->quiz_winner,
                'quiz_master_id' => $this->quiz_master
            ]
        );
        $this->closeModal();
        $this->resetInput();

        Notification::success( $this, trans( 'dkq.quiz_' . ($isNew ? 'created' : 'updated'), ['number' => $quiz->number] ) );
    }

    public function edit( $id ) {
        $quiz = Quiz::findOrFail( $id );
        $this->quiz_id = $id;
        $this->number = $quiz->number;
        $this->quiz_winner = is_null( $quiz->quizWinner ) ? null : $quiz->quizWinner->id;
        $this->quiz_master = is_null( $quiz->quizMaster ) ? null : $quiz->quizMaster->id;
        
        $this->isModalOpen = true;
    }

    public function online( $id, $isOnline ) {
        $quiz = Quiz::findOrFail( $id );
        $quiz->is_online = $isOnline;
        $quiz->save();

        Notification::success( $this, trans( 'dkq.quiz_is_' . ($isOnline ? 'online' : 'offline'), ['number' => $quiz->number] ) );
    }

    public function delete( $id ) {
        $quiz = Quiz::find( $id );
        $quiz->delete();

        Notification::success( $this, trans( 'dkq.quiz_deleted', ['number' => $quiz->number] ) );
    }
}
