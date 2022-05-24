<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Notification extends Component
{
    private $notifications = array(
        "success" => array(),
        "danger" => array(),
        "dark" => array()
    );

    protected $listeners = ['addNotification'];

    public static function success( Component $livewire, string $message )
    {
        $livewire->emit( 'addNotification', 'success', $message );
    }

    public static function danger( Component $livewire, string $message )
    {
        $livewire->emit( 'addNotification', 'danger', $message );
    }

    public static function dark( Component $livewire, string $message )
    {
        $livewire->emit( 'addNotification', 'dark', $message );
    }

    public function mount()
    {
        $this->clear();
    }

    public function render()
    {
        $messages = $this->notifications; // thats a new array and no reference
        $this->clear();
        return view('livewire.notification', [ 'notifications' => $messages ]);
    }

    public function addNotification( string $type, string $message )
    {
        $this->notifications[ $type ][] = $message;
    }

    private function clear()
    {
        $this->notifications = array(
            "success" => array(),
            "danger" => array(),
            "dark" => array()
        );
    }
}
