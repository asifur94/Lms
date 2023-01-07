<?php

namespace App\Http\Livewire;


use Livewire\Component;


class CourseEdit extends Component
{
    public $name;
    public $description;
    public $price;
    public $selectedDays = [];
    public $time;
    public $end_date;



    public function render()
    {
        return view('livewire.course-edit');
    }


    public function formSubmit() {
        $this->validate();

    }
}
