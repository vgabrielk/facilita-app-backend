<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SelectDropdown extends Component
{
    public $name;
    public $options;
    public $label;

    public function __construct($name, $options, $label = null)
    {
        $this->name = $name;
        $this->options = $options;
        $this->label = $label;
    }

    public function render()
    {
        return view('components.select-dropdown');
    }
}
