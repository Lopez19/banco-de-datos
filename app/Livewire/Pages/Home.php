<?php

namespace App\Livewire\Pages;

use App\Models\Saber;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Home extends Component
{

    public $saberes;

    public function mount()
    {
        $this->saberes = Saber::limit(6)->get();
    }

    #[Layout('layouts.app')]
    public function render(): \Illuminate\View\View
    {
        return view('livewire.pages.home');
    }
}
