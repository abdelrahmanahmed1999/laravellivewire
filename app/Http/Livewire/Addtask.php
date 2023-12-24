<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;

class Addtask extends Component
{
    public $title;
    protected $rules=[
        'title'=>'required|max:15'
    ];

    public function mount(){
        $this->title="please insert a validate title";
    }

    public function render()
    {
        return view('livewire.addtask');
    }

    public function updated($title){
        $this->validateOnly($title);
    }

    public function storeTask(){
        $this->validate();
        Task::create([
            'title' => $this->title,
            'status' => true
        ]);
        $this->title='';
        $this->emit('taskadded');

        session()->flash('message',"Task Added Successfully");
    }
}
