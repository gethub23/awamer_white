<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class table extends Component
{
    public $addbutton ; 
    public $deletebutton ; 

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($addbutton = null , $deletebutton = null)
    {
        $this->addbutton = $addbutton ;
        $this->deletebutton = $deletebutton ;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.admin.table');
    }
}
