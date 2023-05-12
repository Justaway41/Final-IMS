<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BoxContainer extends Component
{
    public $title;
    public function render()
    {

        return view('livewire.box-container');
    }
}
