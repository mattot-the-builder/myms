<?php

namespace App\Livewire;

use App\Models\CourseRegistration;
use Livewire\Component;

class RegistrationView extends Component
{
    public $course_registrations;
    public $course_registration;

    public function mount()
    {
        $course = auth()->user()->courseRegistrations->last()->course;
        $this->course_name = $course->name;
        $this->course_date = $course->date;
        $this->course_started_at = $course->started_at;
        $this->course_ended_at = $course->ended_at;

        $this->course_registration = auth()->user()->courseRegistrations->last();
    }

    public function update($id)
    {
        $course = CourseRegistration::find($id);
        $this->course_name = $course->name;
        $this->course_date = $course->date;
        $this->course_started_at = $course->started_at;
        $this->course_ended_at = $course->ended_at;
    }

    public function render()
    {
        return view('livewire.registration-view');
    }

}
