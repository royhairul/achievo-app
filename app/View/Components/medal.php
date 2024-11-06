<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class medal extends Component
{
    public string $class;
    public string $stroke;

    public function __construct($class)
    {
        $this->class = $class;
        $this->stroke = str_replace('fill', 'stroke', $class);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.medal');
    }
}
