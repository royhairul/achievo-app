<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    public string $type;
    public bool $isLogin;
    public string $dataUser;
    /**
     * Create a new component instance.
     */
    public function __construct($type = '', $isLogin = false, $dataUser = '')
    {
        $this->type = $type;
        $this->isLogin = $isLogin;
        $this->dataUser = $dataUser;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar');
    }
}
