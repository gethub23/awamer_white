<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class NotifyAll extends Component
{
    public $type;

    /**
     * Create a new component instance.
     * @param $type
     */
    public $route ;
    public $singleName ;

    public function __construct($route , $singleName)
    {
        $this->route      = $route ;
        $this->singleName = $singleName ;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.admin.notify-all');
    }
}
