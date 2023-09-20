<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;

class CourseRegister extends Component
{
    public $courses;
    public $course_id = 2;


    public function mount()
    {
        // $this->courses = Course::all();
    }

    public function render()
    {
        return view('livewire.course-register');
    }

    public function store()
    {

    }

}
