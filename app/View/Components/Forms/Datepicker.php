<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Datepicker extends Component
{
    public $label;
    public $name;
    public $type;
    public $minDate;
    public $maxDate;
    public function __construct($label = '', $name = '', $type = '', $minDate = '', $maxDate = '')
    {
        $this->label = $label;
        $this->name = $name;
        $this->type = $type;
        $this->minDate = $minDate;
        $this->maxDate = $maxDate;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.datepicker');
    }
}
