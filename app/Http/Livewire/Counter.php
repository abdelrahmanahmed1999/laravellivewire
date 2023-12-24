<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $num=10;
    public $name="abdo";

    public function render()
    {
        return view('livewire.counter');
    }


    public function increament(){
        $this->num++;
    }

    public function decreament(){
        $this->num--;
    }
}
