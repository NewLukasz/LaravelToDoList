<?php

namespace App\View\Components\modals;

use Illuminate\View\Component;

class deleteCategoryOrProject extends Component
{
    public $type;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type)
    {
        $this->type=$type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modals.delete-category-or-project');
    }
}