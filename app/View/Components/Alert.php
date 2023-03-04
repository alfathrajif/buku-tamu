<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{

    public $message, $content, $close, $icon;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($message, $content, $close, $icon)
    {
        $this->message = $message;
        $this->content = $content;
        $this->close = $close;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
