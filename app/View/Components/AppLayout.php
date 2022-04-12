<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    /**
     * The page title.
     *
     * @var string
     */
    public $pageTitle;

    /**
     * Create the component instance.
     *
     * @param  string  $pageTitle
     * @return void
     */
    public function __construct($pageTitle = '')
    {
        $this->pageTitle = $pageTitle;
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.app');
    }
}
