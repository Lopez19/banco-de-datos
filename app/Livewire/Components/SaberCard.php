<?php

namespace App\Livewire\Components;

use Illuminate\View\View;
use Livewire\Component;

class SaberCard extends Component
{
    public $saber;

    public function render(): View
    {
        return view('livewire.components.saber-card');
    }
}
