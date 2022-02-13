<?php

namespace App\View\Components\forms;

use Illuminate\View\Component;

class AddNewTask extends Component
{
    public $categories;
    public $projects;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($categories, $projects)
    {
        $this->categories=$categories;
        $this->projects=$projects;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.add-new-task');
    }
}
