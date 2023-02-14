<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use App\Models\Student;
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

    public function feedbackStudent($studentId){
        $student = Student::findOrFail($studentId);

        $student->requires_feedback = false;
        $student->save();

        return redirect()->route('teacher_class', ['classCode' => $student->class->code]);
    }

    public function processFeedback(Request $request, $studentId, $page){
        $student = Student::findOrFail($studentId);

        $student->feedback()->create([
            'teacher_id' => auth()->user()->teacher->id,
            'student_id' => $student->id,
            'page' => $page,
            'feedback' => $request->feedback,
        ]);

        return redirect()->route($page, ['studentSlug' => $student->slug]);
    }

}
