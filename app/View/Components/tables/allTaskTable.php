<?php

namespace App\View\Components\tables;

use Illuminate\View\Component;

class allTaskTable extends Component
{
    public $tasks;
    public $categories;
    public $projects;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tasks, $categories, $projects)
    {
        $this->tasks=$tasks;
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
        return view('components.tables.all-task-table');
    }
}
