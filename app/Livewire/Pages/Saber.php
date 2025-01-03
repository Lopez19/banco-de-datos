<?php

namespace App\Livewire\Pages;

use App\Models\Saber as ModelsSaber;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Saber extends Component
{

    public ModelsSaber $saber;

    #[Layout('layouts.app')]
    public function render(): View
    {
        return view('livewire.pages.saber');
    }
}
