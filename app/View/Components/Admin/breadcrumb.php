<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class breadcrumb extends Component
{
    public $singleName ; 
    public $moreButtons ; 
    public $addbutton ; 
    public $deletebutton ; 
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($singleName  , $addbutton, $deletebutton , $moreButtons = null)
    {
        $this->singleName = $singleName ;
        $this->moreButtons = $moreButtons ;
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
        return view('components.admin.breadcrumb');
    }
}
