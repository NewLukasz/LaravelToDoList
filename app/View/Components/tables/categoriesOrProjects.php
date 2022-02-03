<?php

namespace App\View\Components\tables;

use Illuminate\View\Component;

class categoriesOrProjects extends Component
{

    public $type;
    public $dataArrayWithProjectsOrCategories;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $dataArrayWithProjectsOrCategories)
    {
        $this->type=$type;
        $this->dataArrayWithProjectsOrCategories=$dataArrayWithProjectsOrCategories;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tables.categories-or-projects');
    }
}
