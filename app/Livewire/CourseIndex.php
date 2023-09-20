<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;

class CourseIndex extends Component
{
    public $courses;
    public $course;

    public function mount()
    {
        $this->courses = Course::all();
        $this->course = Course::latest()->first();
    }

    public function render()
    {
        return view('livewire.course-index');
    }

    public function setCourse($id)
    {
        $this->course = Course::find($id);
    }
}
