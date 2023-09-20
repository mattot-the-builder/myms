<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseRegistration;
use App\Models\Invoice;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // index
    public function index()
    {
        // $courses = Course::all();
        // return view('user.course.index', compact('courses'));
        return view('user.course.index');
    }

    // register form
    public function registerForm()
    {
        $courses = Course::all();
        return view('user.register.create', compact('courses'));
    }

    // store function
    public function store()
    {
        $course_registration = new CourseRegistration();
        $course_registration->user_id = auth()->user()->id;
        // dd(request()->has('is_sponsored'));

        $course_registration->fill(request()->all());

        $course_registration->is_sponsored = request()->has('is_sponsored') ? 1 : 0;
        // return $course_registration->is_sponsored;

        if ($course_registration->save()) {
            $invoice = new Invoice();
            $invoice->course_registration_id = $course_registration->id;
            $invoice->save();
            return view('user.register.invoice', compact('invoice'));
            // return $invoice;
            # code...
        } else {
            dd('failed');
        }
    }

}
