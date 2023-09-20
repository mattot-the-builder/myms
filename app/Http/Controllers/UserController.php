<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // index
    public function index()
    {
        $courses = Course::all();
        return view('user.course.index', compact('courses'));
    }

    // register form
    public function registerForm()
    {
        return view('user.register.create');
    }

}
