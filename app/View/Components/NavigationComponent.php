<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NavigationComponent extends Component
{
    /**
     * The navigation title.
     *
     * @var string
     */
    public $title;

    /**
     * Create the component instance.
     *
     * @param  string  $title
     * @return void
     */
    public function __construct($title = '')
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('components.navigation');
    }
}
