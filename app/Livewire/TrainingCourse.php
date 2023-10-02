<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;

class TrainingCourse extends Component
{
    public $courses;
    public $course_id;
    public $course_name;
    public $course_fee;
    public $course_contents;
    public $course_date_start;
    public $course_date_end;
    public $course_started_at;
    public $course_ended_at;
    public $course_time;

    public function mount()
    {
        $this->courses = Course::all();
        $course = Course::latest()->first();
        if ($course) {
            $this->course_id = $course->id;
            $this->course_name = $course->name;
            $this->course_fee = $course->fee;
            $this->course_contents = $course->contents;
            $this->course_date_start = $course->date_start;
            $this->course_date_end = $course->date_end;
            $this->course_started_at = $course->started_at;
            $this->course_ended_at = $course->ended_at;
        }
    }


    public function render()
    {
        return view('livewire.training-course');
    }

    public function setCourse($id)
    {
        $course = Course::find($id);
        $this->course_id = $course->id;
        $this->course_name = $course->name;
        $this->course_fee = $course->fee;
        $this->course_contents = $course->contents;
        $this->course_date_start = $course->date_start;
        $this->course_date_end = $course->date_end;
        $this->course_started_at = $course->started_at;
        $this->course_ended_at = $course->ended_at;
        // dd($course);
    }
}
