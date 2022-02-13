<?php

namespace App\View\Components\modals;

use Illuminate\View\Component;

class EditTask extends Component
{
    public $categories;
    public $projects;
    public $tasks;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tasks,$categories, $projects)
    {
        $this->categories = $categories;
        $this->projects = $projects;
        $this->tasks = $tasks;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modals.edit-task');
    }
}
