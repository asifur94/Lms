<?php

namespace App\Http\Livewire;


use App\Models\Course;
use App\Models\Curriculum;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class CourseEdit extends Component
{

    public $course_id;
    public $name;
    public $image;
    public $day;
    public $description;
    public $price;
    public $selectedDays = [];
    public $time;


    public function mount(){
        $course = Course::findOrFail($this->course_id);


       $this->name = $course->name;
       $this->image = $course->image;
       $this->price = $course->price;
       $this->description = $course->description;

    }
    public function render()
    {
        return view('livewire.course-edit',['name'=>$this->name]);
    }





    protected $rules = [
        'name' => 'required|unique:courses,name',
        'description' => 'required',
        'image' => 'required',
        'price' => 'required',
    ];


    public function courseEdit() {
        $this->validate();
        $course = Course::findOrFail($this->course_id);

        $course->name = $this->name;
        $course->description = $this->description;
        $course->price = $this->price;
        $course->image = $this->image;
        $course->save();


//        $course_id = $course->id;
//        foreach($this->selectedDays as $day) {
//
//            $i = 1;
//            $start_date = new DateTime(Carbon::now());
//            $end_date =   new DateTime($this->end_date);
//            $interval =  new DateInterval('P1D');
//            $date_range = new DatePeriod($start_date, $interval, $end_date);
//            foreach ($date_range as $date) {
//                if($date->format("l") === "Sunday"){
//                    $curriculum = Curriculum::create([
//                        'name' => $this->name.' '.$i++,
//                        'course_id' => $course_id,
//                    ]);
//                }
//            }
//            $i++;
//        }

        flash()->addSuccess('Course created successfully');


    }
}
