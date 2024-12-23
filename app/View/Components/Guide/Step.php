<?php

namespace App\View\Components\Guide;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Step extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public bool $isDark = false,
        public int $id = 0,
        public string $image = ''
    ) {
        $this->isDark = $isDark;
        $this->id = $id;
        $this->image = $image;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.guide.step');
    }
}
