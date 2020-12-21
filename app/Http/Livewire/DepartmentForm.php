<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Department;

class DepartmentForm extends Component
{   
    public $name = 'Fahad';
    public $success = false;

    //this function will save department
    public function submit(){
        Department::create(['name'=> $this->name]);
        $this->success = true;
    }

    //this function will innitiate departemnt 
    public function mount($departmentId=null){
        if($departmentId){
            $this->name = Department::findorfail($departmentId)->name;
        }
    }

    public function render()
    {
        return view('livewire.department-form');
    }
}
