<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class editModel extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $singleName ; 

    public function __construct($singleName)
    {
        $this->singleName = $singleName ; 
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.admin.edit-model');
    }
}
