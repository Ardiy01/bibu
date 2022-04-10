<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public $id;
    public $label;
    public $name;
    public $type;
    public $value;
    public $readonly;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $id = "",
        $label = "",
        $name = "",
        $type = "",
        $value = "",
        $readonly = false
    )
    {
        //
        $this->id = $id;
        $this->label = $label;
        $this->name = $name;
        $this->type = $type;
        $this->value = $value;
        $this->readonly = $readonly;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input');
    }
}
