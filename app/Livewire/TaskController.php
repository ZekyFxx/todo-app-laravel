<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Layout;
use App\Models\Tasks;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class TaskController extends Component
{
    #[Title('ZTask - Your tasks')]
    #[Layout('layouts/app')]

    #[Validate('required|min:3')] 
    public $text = '';

    public function delete($task_id)
    {
        Tasks::destroy($task_id);
    }
    public function done(int $task_id,bool $task_done = false)
    {
        $Task = new Tasks;
        $Task->where(['id' => $task_id])->update(['task_done'=>$task_done]);
    }
    public function add()
    {
 
        $this->validate();
        $Tasks = new Tasks;
        $Tasks->task_description = $this->text;
        $Tasks->author = Auth::user()->name;
        $Tasks->save();

        $this->reset('text');
    }
    public function render()
    {
        return view('dashboard',
            [
                'tasks' => Tasks::where(['task_done' => false])->get(),
                'tasks_done' => Tasks::where(['task_done' => true])->get()
            ]);
    }
}
