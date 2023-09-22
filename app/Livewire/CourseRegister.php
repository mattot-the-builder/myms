<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;

class CourseRegister extends Component
{
    public $courses;
    public $course_date;
    public $course_started_at;
    public $course_ended_at;
    public $course_id;


    public function mount()
    {
        $this->courses = Course::all();
    }

    public function render()
    {
        return view('livewire.course-register');
    }

    public function updateCourse($id)
    {
        $course = Course::find($id);

        $this->course_date = $course->date;
        $this->course_started_at = $course->started_at;
        $this->course_ended_at = $course->ended_at;
        // dd($this->course->date);
    }

    public function store()
    {

    }

}
