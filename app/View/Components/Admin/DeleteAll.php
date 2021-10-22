<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class DeleteAll extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $route ; 
    public function __construct($route)
    {
        $this->route = $route ;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.admin.delete-all');
    }
}
