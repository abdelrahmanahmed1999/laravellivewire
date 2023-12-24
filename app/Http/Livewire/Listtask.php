<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;
use Livewire\WithPagination;

class Listtask extends Component
{
    use WithPagination;
    protected $listeners=[
        'taskadded'=>'$refresh',
        'updaterecord'=>'updaterecord'
    ];
    protected $paginationTheme='bootstrap';
    protected $tasks;
    public $totalTasks;

    public function render()
    {
        $this->tasks=Task::latest()->paginate(5);
        $this->totalTasks = Task::count();

        return view('livewire.listtask',[
            'tasks' => $this->tasks,
            'totalTasks' => $this->totalTasks
        ]);
    }

    public function deleterecord($id){
        Task::find($id)->delete();
        $this->tasks=Task::latest()->paginate(5);
        $this->totalTasks = Task::count();
        session()->flash('message',"Task Deleted Successfully");
        $this->emit('$refresh');
    }


    public function updaterecord($id, $newTitle){

        Task::find($id)->update([
            'title' => $newTitle,
        ]);
        $this->tasks=Task::latest()->paginate(5);
        session()->flash('message',"Task Updated Successfully");
        $this->emit('$refresh');
    }


}
