<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function showDashboard() {
        $classes = SchoolClass::whereHas('teachers', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->get();

        return view('teacher.dashboard',[
            'title' => 'Dashboard',
            'classes' => $classes,
        ]);
    }

    public function showClass($classCode) {
        $class = SchoolClass::where('code', $classCode)->firstOrFail();
        $students = $class->students()->get()->sortBy('name');

        return view('teacher.class',[
            'title' => $class->code,
            'class' => $class,
            'students' => $students,
        ]);
    }
}
