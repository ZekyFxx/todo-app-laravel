<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Tasks;
use Illuminate\Support\Facades\Auth;

class TaskController extends Component
{
    public $text = '';
    public function delete($task_id)
    {
        Tasks::destroy($task_id);
    }
    public function add()
    {
        $Tasks = new Tasks;
        $Tasks->task_description = $this->text;
        $Tasks->author = Auth::user()->name;
        $Tasks->save();
        $this->reset('text');
    }
    public function render()
    {
        return view('dashboard',['tasks' => Tasks::all()]);
    }
}
