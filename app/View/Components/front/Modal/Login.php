<?php

namespace App\View\Components\Front\Modal;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Login extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.front.modal.login');
    }
}
